<?php

namespace App\Admin\Controllers;

use App\Tech;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;

class TechController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Tech';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Tech());

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
        $form = new Form(new Tech());

        $form->text('title', '標題');
        $form->textarea('content', '內容');

        return $form;
    }
}
