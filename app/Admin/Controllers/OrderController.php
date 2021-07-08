<?php

namespace App\Admin\Controllers;

use App\Order;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Widgets\Table;

class OrderController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Order';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Order());

        $grid->column('id', __('Id'));
        $grid->column('serial_id', '訂單編號');
        $grid->column('user_id', '用戶ID');
        $grid->column('user.name', '用戶名');
        $grid->column('none', '商品資訊')->expand(function ($model) {
            $cart = $model->products()->get()->map(function ($product) {
                return [
                    $product->id,
                    $product->name,
                    $product->pivot->per_price,
                    $product->pivot->per_amount,
                    $product->pivot->detail,
                ];
            });
            return new Table(['ID', '名稱', '單價', '數量', '細節'], $cart->toArray());
        });
        $grid->column('status', '付款狀態')->radio(config('app.orderStatus'))->filter(config('app.orderStatus'));
        $grid->column('callback_id', '金流單號');
        $grid->column('detail', '金流資訊')->display(function ($detail) {
            json_decode($detail, true);
        });
        $grid->column('receipt', '收據')->display(function ($receipt) {
            $text = '';
            if (!$receipt) {
                return '';
            }
            foreach ($receipt as $k => $v) {
                $text .= "$k : $v<br>";
            }
            return rtrim($text, ',');
        });
        $grid->column('total_price', '總計');

        $grid->filter(function ($filter) {
            $filter->equal('status', '付款狀態')->radio(config('app.orderStatus'));
            $filter->equal('user_id', '用戶ID');
        });

        $grid->actions(function (Grid\Displayers\Actions $actions) {
            $actions->disableView();
            $actions->disableEdit();
        });
        $grid->disableCreateButton();

        return $grid;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Order());

        $form->text('order_id', '訂單編號')->readonly();
        $form->text('user_id', '用戶ID')->readonly();
        $form->radio('status', '付款狀態')->options(config('app.orderStatus'));
        $form->text('callback_id', 'Paypal單號')->readonly();
        // $form->text('detail', __('Detail'));
        $form->display('receipt', '收據')->with(function ($receipt) {
            $text = '';
            if (!$receipt) {
                return '';
            }
            foreach ($receipt as $k => $v) {
                $text .= "$k : $v<br>";
            }
            return rtrim($text, ',');
        });
        $form->text('price', '總計')->readonly();

        return $form;
    }
}
