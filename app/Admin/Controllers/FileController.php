<?php

namespace App\Admin\Controllers;

use App\File;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;

class FileController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'File';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new File());

        $grid->column('id', __('Id'));
        $grid->column('title', '標題');
        $grid->column('path', '文件路徑');

        return $grid;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new File());

        $form->text('title', '標題');
        $form->file('path', '文件(PDF Only)')->uniqueName()->rules('mimes:pdf')->downloadable();

        return $form;
    }
}
