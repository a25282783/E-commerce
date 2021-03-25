<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\URL;
use PayPal\Api\Amount;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;
use PayPal\Auth\OAuthTokenCredential;
use Paypal\Exception\PayPalConnectionException;
use PayPal\Rest\ApiContext;

class PaypalController extends Controller
{
    private $_api_context;

    public function __construct()
    {

        $paypal_configuration = config('paypal');
        $this->_api_context = new ApiContext(new OAuthTokenCredential($paypal_configuration['client_id'], $paypal_configuration['secret']));
        $this->_api_context->setConfig($paypal_configuration['settings']);
    }

    public function payWithPaypal()
    {
        return view('paypal.paywithpaypal');
    }

    public function postPaymentWithpaypal(Request $request)
    {
        Log::info('postPaymentWithpaypal:' . json_encode($request->all()));
        $payer = new Payer();
        $payer->setPaymentMethod('paypal');

        $item_1 = new Item();

        $item_1->setName('Product 1')
            ->setCurrency('USD')
            ->setQuantity(1)
            ->setPrice($request->get('amount'));

        $item_list = new ItemList();
        $item_list->setItems(array($item_1));

        $amount = new Amount();
        $amount->setCurrency('USD')
            ->setTotal($request->get('amount'));

        $transaction = new Transaction();
        $transaction->setAmount($amount)
            ->setItemList($item_list)
            ->setDescription('Enter Your transaction description');

        $redirect_urls = new RedirectUrls();
        $redirect_urls->setReturnUrl(URL::route('status'))
            ->setCancelUrl(URL::route('status'));

        $payment = new Payment();
        $payment->setIntent('Sale')
            ->setPayer($payer)
            ->setRedirectUrls($redirect_urls)
            ->setTransactions(array($transaction));
        try {
            $payment->create($this->_api_context);
        } catch (PayPalConnectionException $ex) {
            if (config('app.debug')) {
                session()->put('error', 'Connection timeout');
                return redirect('/paywithpaypal');
            } else {
                session()->put('error', 'Some error occur, sorry for inconvenient');
                return redirect('/paywithpaypal');
            }
        }

        foreach ($payment->getLinks() as $link) {
            if ($link->getRel() == 'approval_url') {
                $redirect_url = $link->getHref();
                break;
            }
        }

        session()->put('paypal_payment_id', $payment->getId());

        if (isset($redirect_url)) {
            return redirect($redirect_url);
        }

        session()->put('error', 'Unknown error occurred');
        return redirect('/paywithpaypal');
    }

    public function getPaymentStatus(Request $request)
    {
        Log::info('getPaymentStatus:' . json_encode($request->all()));
        $payment_id = session('paypal_payment_id');

        session('paypal_payment_id', null);
        if (empty($request->input('PayerID')) || empty($request->input('token'))) {
            session()->put('error', 'Payment failed');
            return redirect('/paywithpaypal');
        }
        $payment = Payment::get($payment_id, $this->_api_context);
        $execution = new PaymentExecution();
        $execution->setPayerId($request->input('PayerID'));
        $result = $payment->execute($execution, $this->_api_context);

        if ($result->getState() == 'approved') {
            session()->put('success', 'Payment success !!');
            return redirect('/paywithpaypal');
        }

        session()->put('error', 'Payment failed !!');
        return redirect('/paywithpaypal');
    }
}
