<?php

namespace App\Admin\Controllers;

use App\Order;
use App\Product;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;

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
        $grid->column('order_id', '訂單編號');
        $grid->column('user_id', '用戶ID');
        $grid->column('user.name', '用戶名');
        $grid->column('cart_info', '購物車資訊')->display(function ($cart) {
            $text = '';
            foreach ($cart as $v) {
                $name = Product::find($v['product_id'])->name;
                $amount = $v['amount'];
                $per_price = $v['per_price'];
                $text .= "$name * $amount,$per_price<br>";
            }
            return rtrim($text, ',');
        });
        $grid->column('status', '付款狀態')->using(config('app.orderStatus'));
        $grid->column('callback_id', '金流單號');
        $grid->column('detail', __('Detail'));
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
        $grid->column('price', '總計');

        $grid->filter(function ($filter) {
            $filter->equal('status', '付款狀態')->radio(config('app.orderStatus'));
            $filter->equal('user_id', '用戶ID');
        });

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
        $form->display('cart_info', '購物車資訊')->with(function ($cart) {
            $text = '';
            foreach ($cart as $v) {
                $name = Product::find($v['product_id'])->name;
                $amount = $v['amount'];
                $per_price = $v['per_price'];
                $text .= "$name * $amount,$per_price<br>";
            }
            return rtrim($text, ',');
        });
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
