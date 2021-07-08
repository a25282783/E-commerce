<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{
    protected $table = 'order_products';
    protected $guarded = [];

    public function getPerPriceAttribute($price)
    {
        return $price / 100;
    }

    public function setPerPriceAttribute($price)
    {
        $this->attributes['per_price'] = $price * 100;
    }

}
