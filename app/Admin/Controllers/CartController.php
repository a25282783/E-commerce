<?php

namespace App\Admin\Controllers;

use App\Cart;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;

class CartController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Cart';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Cart());

        $grid->column('id', __('Id'));
        $grid->column('user.name', '用戶名稱');
        $grid->column('product.name', '產品名稱');
        $grid->column('amount', '數量');
        $grid->column('per_price', '單價');
        $grid->column('total_price', '總價');

        return $grid;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Cart());

        $form->text('user_id', '用戶id')->readonly();
        $form->text('product_id', '產品id')->readonly();
        $form->text('amount', '數量')->readonly();

        return $form;
    }
}
