<?php

namespace App\Admin\Controllers;

use App\Footer;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;

class FooterController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Footer';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Footer());

        $grid->column('id', __('Id'));
        $grid->column('tel', __('Tel'));
        $grid->column('fax', __('Fax'));
        $grid->column('email', __('Email'));
        $grid->column('address', __('Address'));
        $grid->column('payment', __('Payment'))->limit(30);
        $grid->column('shipping', __('Shipping'))->limit(30);
        $grid->column('return', __('Return'))->limit(30);
        $grid->column('service', __('Service'))->limit(30);
        $grid->column('privacy', __('Privacy'))->limit(30);
        $grid->column('mid_banner', '首頁中間banner')->lightbox(['width' => 100, 'height' => 50, 'zooming' => true]);
        $grid->column('mid_title', '首頁中間標題');
        return $grid;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Footer());

        $form->text('tel', __('Tel'));
        $form->text('fax', __('Fax'));
        $form->text('email', __('Email'));
        $form->text('address', __('Address'));
        $form->ckeditor('payment', __('Payment'));
        $form->ckeditor('shipping', __('Shipping'));
        $form->ckeditor('return', __('Return'));
        $form->ckeditor('service', __('Service'));
        $form->ckeditor('privacy', __('Privacy'));
        $form->text('line', 'line');
        $form->text('fb', 'facebook');
        $form->text('ig', 'instagram');
        $form->image('mid_banner', '首頁中間banner(1920x600)')->uniqueName()->resize(1920, 600);
        $form->text('mid_url', '首頁banner連結');
        $form->text('mid_title', '首頁中間標題');
        $form->textarea('mid_text', '首頁中間文字');
        $form->text('mid_video', '首頁中間影音');

        return $form;
    }
}
