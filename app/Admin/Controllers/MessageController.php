<?php

namespace App\Admin\Controllers;

use App\Message;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;

class MessageController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Message';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Message());

        $grid->column('id', __('Id'));
        $grid->column('name', '名稱');
        $grid->column('mobile', '手機');
        $grid->column('email', __('Email'));
        $grid->column('title', '主旨');
        $grid->column('content', '內容')->limit(30);

        return $grid;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Message());

        $form->text('name', '名稱');
        $form->text('mobile', '手機');
        $form->email('email', __('Email'));
        $form->text('title', '主旨');
        $form->textarea('content', '內容');

        return $form;
    }
}
