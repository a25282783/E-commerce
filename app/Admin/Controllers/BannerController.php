<?php

namespace App\Admin\Controllers;

use App\Banner;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;

class BannerController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Banner';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Banner());

        $grid->column('id', __('Id'));
        $grid->column('banner', __('Banner'))->lightbox(['width' => 100, 'height' => 50, 'zooming' => true]);
        $grid->column('url', '連結');
        $grid->column('title', '標題');
        $grid->column('sub_title', '副標題');

        return $grid;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Banner());

        $form->image('banner', 'Banner(1920x600)')->required()->uniqueName()->resize(1920, 600);
        $form->text('url', '連結');
        $form->text('title', '標題');
        $form->text('sub_title', '副標題');

        return $form;
    }
}
