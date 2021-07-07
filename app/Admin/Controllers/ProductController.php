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
        $grid->column('price', '價格');
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
        $form->textarea('intro', '關於產品');
        $form->image('prev_img', '預覽照片(600x900)')->uniqueName()->resize(600, 900);
        $form->multipleImage('img', '多選照片(900x900)')->uniqueName()->removable()->resize(900, 900);
        $form->number('amount', '庫存')->default(0)->required()->min(0);
        $form->number('price', '價格')->default(0)->required()->min(0);
        $form->text('spec', '商品尺寸');
        $form->text('weight', '商品重量');
        $form->text('place', '商品產地');
        $form->textarea('ship_way', '運送方式');
        $form->textarea('refund_way', '退換貨方式');
        $form->divider('以下輸入請以","做分隔，例如該產品有紅色及黃色，請輸入：紅色,黃色');
        $form->text('color', '可選顏色');
        $form->text('size', '可選尺寸');
        $form->text('pack', '可選裝訂');
        $form->radio('status', '顯示狀態')->options([0 => '隱藏', 1 => '顯示'])->default(1);

        return $form;
    }
}
