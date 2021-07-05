<?php

namespace App\Admin\Controllers;

use App\Config;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;

class ConfigController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '網站設定(只取第一筆)';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Config());

        $grid->column('id', __('Id'));
        $grid->column('line', __('Line'));
        $grid->column('fb', __('Fb'));
        $grid->column('messenger', __('Messenger'));
        $grid->column('mail', __('Mail'));

        return $grid;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Config());

        $form->text('line', __('Line'));
        $form->text('fb', __('Fb'));
        $form->text('messenger', __('Messenger'));
        $form->text('mail', __('Mail'));

        return $form;
    }
}
