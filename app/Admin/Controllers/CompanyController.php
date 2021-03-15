<?php

namespace App\Admin\Controllers;

use App\Company;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;

class CompanyController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Company';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Company());

        $grid->column('id', __('Id'));
        $grid->column('banner', __('Banner'))->lightbox(['width' => 100, 'height' => 50, 'zooming' => true]);
        $grid->column('title1', '第一段標題');
        $grid->column('content', '第一段內容')->limit(30);
        $grid->column('main', '下方橫的標題');
        $grid->column('title2', '第二段標題');
        $grid->column('main_title1', '下方第1段標題');
        $grid->column('main_desc1', '下方第1段敘述');
        $grid->column('main_title2', '下方第2段標題');
        $grid->column('main_desc2', '下方第2段敘述');
        $grid->column('main_title3', '下方第3段標題');
        $grid->column('main_desc3', '下方第3段敘述');
        $grid->column('main_title4', '下方第4段標題');
        $grid->column('main_desc4', '下方第4段敘述');

        return $grid;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Company());

        $form->image('banner', 'Banner(1200x500)')->uniqueName()->resize(1200, 500);
        $form->text('title1', '第一段標題');
        $form->ckeditor('content', '第一段內容');
        $form->text('main', '下方橫的標題');
        $form->text('title2', '第二段標題');
        $form->text('main_title1', '下方第1段標題');
        $form->text('main_desc1', '下方第1段敘述');
        $form->text('main_title2', '下方第2段標題');
        $form->text('main_desc2', '下方第2段敘述');
        $form->text('main_title3', '下方第3段標題');
        $form->text('main_desc3', '下方第3段敘述');
        $form->text('main_title4', '下方第4段標題');
        $form->text('main_desc4', '下方第4段敘述');

        return $form;
    }
}
