<?php

namespace App\Admin\Controllers;

use App\Service;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;

class ServiceController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Service';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Service());

        $grid->column('id', __('Id'));
        $grid->column('title', '標題');
        $grid->column('content', '內容')->limit(50);

        return $grid;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Service());

        $form->text('title', '標題');
        $form->ckeditor('content', '內容');

        return $form;
    }
}
