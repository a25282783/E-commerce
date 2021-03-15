<?php

namespace App\Admin\Controllers;

use App\Contact;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;

class ContactController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Contact';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Contact());

        $grid->column('id', __('Id'));
        $grid->column('bg_img', '背景圖')->lightbox(['width' => 100, 'height' => 50, 'zooming' => true]);
        $grid->column('tel', __('Tel'));
        $grid->column('fax', __('Fax'));
        $grid->column('email', __('Email'));
        $grid->column('address', __('Address'));

        return $grid;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Contact());

        $form->image('bg_img', '背景圖(1920x1100)')->uniqueName()->resize(1920, 1100);
        $form->text('tel', __('Tel'));
        $form->text('fax', __('Fax'));
        $form->email('email', __('Email'));
        $form->text('address', __('Address'));

        return $form;
    }
}
