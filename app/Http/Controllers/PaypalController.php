<?php

namespace App\Http\Controllers;

use App\Order;
use App\Product;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Refund;
use PayPal\Api\Sale;
use PayPal\Api\Transaction;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Rest\ApiContext;

class PaypalController extends Controller
{
    protected $client_id;
    protected $client_secret;
    protected $callback_url;
    protected $paypal;
    const CURRENCY = 'USD';

    public function __construct()
    {
        $this->client_id = config('paypal.client_id');
        $this->client_secret = config('paypal.client_secret');
        $this->callback_url = config('paypal.callback_url');

        $this->paypal = new ApiContext(
            new OAuthTokenCredential(
                $this->client_id,
                $this->client_secret
            )
        );
        $this->paypal->setConfig(
            config('paypal.settings')
        );
    }

    public function pay(Request $request)
    {
        $order_id = $request->input('order_id');
        abort_if(!$order_id, 404);

        $order = Order::find($order_id);
        abort_if(!$order, 404);
        abort_if(!($order->status == 1), 404);

        $payer = new Payer();
        $payer->setPaymentMethod('paypal');

        $items = [];
        foreach ($order->cart_info as $v) {
            $item = new Item();
            $name = Product::find($v['product_id'])->name;
            $amount = $v['amount'];
            $price = $v['per_price'];
            $item->setName($name)
                ->setCurrency(self::CURRENCY)
                ->setQuantity($amount)
                ->setPrice($price);
            $items[] = $item;
        }

        $itemList = new ItemList();
        $itemList->setItems($items);

        $details = new Details();
        $details->setShipping(0)
            ->setSubtotal($order->price);

        $amount = new Amount();
        $amount->setCurrency(self::CURRENCY)
            ->setTotal($order->price)
            ->setDetails($details);

        $transaction = new Transaction();
        $transaction->setAmount($amount)
            ->setItemList($itemList)
            ->setDescription("Daemon")
            ->setInvoiceNumber($order->order_id);

        $redirectUrls = new RedirectUrls();
        $redirectUrls->setReturnUrl($this->callback_url . '?success=true')
            ->setCancelUrl($this->callback_url . '/?success=false');

        $payment = new Payment();
        $payment->setIntent('sale')
            ->setPayer($payer)
            ->setRedirectUrls($redirectUrls)
            ->setTransactions([$transaction]);

        try {
            $payment->create($this->paypal);
        } catch (\PayPal\Exception\PayPalConnectionException $e) {
            Log::debug($e);
            return back();
        }

        $approvalUrl = $payment->getApprovalLink();

        return redirect($approvalUrl);

    }

    public function callback(Request $request)
    {
        $request = $request->all();
        Log::info('callback:' . json_encode($request));
        $success = trim($request['success']);

        if ($success == 'false' && !isset($request['paymentId']) && !isset($request['PayerID'])) {
            return view('results')->with([
                'status' => 'Cancel Payment!',
                'results' => $request,
            ]);
        }

        $paymentId = trim($request['paymentId']);
        $PayerID = trim($request['PayerID']);

        if (!isset($success, $paymentId, $PayerID)) {
            return view('results')->with([
                'status' => 'Payment Fail!',
                'results' => $request,
            ]);
        }

        $payment = Payment::get($paymentId, $this->paypal);
        $execute = new PaymentExecution();
        $execute->setPayerId($PayerID);

        try {
            $payment->execute($execute, $this->paypal);
            // 存回detail
            // $order = Auth::user()->order;
            // $order_detail = $order->detail;
            // if ($order_detail === null) {
            //     $res->detail = ['invoice_id' => $invoice_id];
            // } else {
            //     $order_detail['invoice_id'] = $invoice_id;
            //     $res->detail = $order_detail;
            // }
            // $res->save();
        } catch (Exception $e) {
            return view('results')->with([
                'status' => 'Payment Fail!',
                'results' => $request,
            ]);
        }

        return view('results')->with([
            'status' => 'Payment Success!',
            'results' => $request,
        ]);
    }

    public function notify()
    {
        // 異步回調
        $json = file_get_contents('php://input');
        Log::info('notify:' . json_encode(json_decode($json, true), 128));
        // 存回detail
        // $order = Auth::user()->order;
        // $order_detail = $order->detail;
        // if ($order_detail === null) {
        //     $res->detail = ['invoice_id' => $invoice_id];
        // } else {
        //     $order_detail['invoice_id'] = $invoice_id;
        //     $res->detail = $order_detail;
        // }
        // $res->save();
        return "success";
    }

    public function refund(Request $request)
    {
        try {
            $data = $request->all();

            $txn_id = $data['txn_id']; // 異步回調中拿到的 ID
            $amt = new Amount();
            $amt->setCurrency($data['currency'])
                ->setTotal($data['money']); // 退款的費用

            $refund = new Refund();
            $refund->setAmount($amt);

            $sale = new Sale();
            $sale->setId($txn_id);

            $refundedSale = $sale->refund($refund, $this->paypal);
        } catch (Exception $e) {
            // PayPal 退款失敗
            Log::debug($e->getMessage());
            return response()->json([
                'type' => 'failure',
                'message' => $e->getMessage(),
            ]);
        }
        // 退款完成
        Log::info($refundedSale);
        return response()->json([
            'type' => 'success',
        ]);
    }
}
