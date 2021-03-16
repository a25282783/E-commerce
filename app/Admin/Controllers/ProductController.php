<?php

namespace App\Admin\Controllers;

use App\Admin\Selectable\Categories;
use App\Product;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;

class ProductController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Product';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Product());

        $grid->column('id', __('Id'));
        $grid->column('category.name', '產品名稱');
        $grid->column('name', '名稱');
        $grid->column('intro', '短介紹')->limit(30);
        $grid->column('prev_img', '預覽照片')->lightbox([
            'zooming' => true,
            'width' => 150,
            'height' => 150,
        ]);
        $grid->column('img', '照片')->gallery([
            'zooming' => true,
            'width' => 50,
            'height' => 50,
        ]);
        $grid->column('amount', '庫存');
        $grid->column('price', '價格')->display(function () {
            return $this->detail['price'];
        });
        $grid->column('sale', '特價')->display(function () {
            return $this->detail['sale'];
        });
        $grid->column('banner', 'Banner')->lightbox([
            'zooming' => true,
            'width' => 150,
            'height' => 100,
        ]);
        $grid->column('feature', '特色')->limit(30);
        $grid->column('package', '包裹')->limit(30);
        $grid->column('exterior', '外部')->limit(30);
        $grid->column('status', '顯示狀態')->radio([0 => '隱藏', 1 => '顯示']);

        return $grid;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Product());

        $form->belongsTo('category_id', Categories::class, '產品品牌')->rules('required', [
            'required' => '必填',
        ]);
        $form->text('name', '名稱');
        $form->text('intro', '短介紹');
        $form->image('prev_img', '預覽照片(380x380)')->uniqueName()->resize(380, 380);
        $form->multipleImage('img', '多選照片(600x400)')->uniqueName()->removable()->resize(600, 400);
        $form->number('amount', '庫存')->default(0);
        $form->embeds('detail', '詳細設定', function ($form) {
            $form->text('diameter', '直徑');
            $form->text('thickness', '厚度');
            $form->text('bezel', '擋板');
            $form->currency('price', '價格');
            $form->currency('sale', '特價');
        });
        $form->image('banner', 'Banner(1200x450)')->uniqueName()->resize(1200, 450);
        $form->ckeditor('feature', '特色');
        $form->ckeditor('package', '包裹');
        $form->ckeditor('exterior', '外部');
        $form->radio('status', '顯示狀態')->options([0 => '隱藏', 1 => '顯示'])->default(1);

        return $form;
    }
}
