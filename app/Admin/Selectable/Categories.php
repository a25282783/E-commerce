<?php
namespace App\Admin\Selectable;

use App\Category;
use Encore\Admin\Grid\Selectable;

class Categories extends Selectable
{
    public $model = Category::class;

    public function make()
    {
        $this->column('id');
        $this->column('name', '名稱');
    }

}
