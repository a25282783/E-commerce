<?php

namespace App\Admin\Controllers;

use App\News;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;

class NewsController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'News';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new News());

        $grid->column('id', __('Id'));
        $grid->column('prev_img', '預覽圖')->lightbox(['width' => 100, 'height' => 50, 'zooming' => true]);
        $grid->column('banner', __('Banner'))->lightbox(['width' => 100, 'height' => 50, 'zooming' => true]);
        $grid->column('title', '標題');
        $grid->column('content', '內文')->limit(30);

        return $grid;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new News());

        $form->image('prev_img', '預覽圖(600x250)')->required()->uniqueName()->resize(600, 250);
        $form->image('banner', 'Banner(1920x500)')->uniqueName()->resize(1920, 500);
        $form->text('title', '標題');
        $form->ckeditor('content', '內文');

        return $form;
    }
}
