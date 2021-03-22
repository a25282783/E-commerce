<?php

namespace App\Admin\Controllers;

use App\Basic;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Grid\Displayers\Limit;

class BasicController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Basic';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Basic());

        $grid->column('id', __('Id'));
        $grid->column('delivery', '運送方式圖片')->lightbox(['width' => 100, 'height' => 50, 'zooming' => true]);
        $grid->column('delivery_name', '運送方式');
        $grid->column('delivery_desc', '運送方式說明')->limit(40);
        $grid->column('payment', '付款方式圖片')->lightbox(['width' => 100, 'height' => 50, 'zooming' => true]);
        $grid->column('payment_name', '付款方式');
        $grid->column('payment_desc', '付款方式說明')->limit(40);

        return $grid;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Basic());

        $form->image('delivery', '運送方式圖片(170x150)')->uniqueName()->resize(170, 150)->required();
        $form->text('delivery_name', '運送方式')->required();
        $form->textarea('delivery_desc', '運送方式說明');
        $form->image('payment', '付款方式圖片(170x150)')->uniqueName()->resize(170, 150)->required();
        $form->text('payment_name', '付款方式')->required();
        $form->textarea('payment_desc', '付款方式說明');

        return $form;
    }
}
