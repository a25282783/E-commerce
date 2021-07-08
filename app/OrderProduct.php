<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{
    protected $table = 'order_products';
    protected $guarded = [];
    protected $attributes = [
        'detail' => '[]',
    ];

    public function getPerPriceAttribute($price)
    {
        return $price / 100;
    }

    public function setPerPriceAttribute($price)
    {
        $this->attributes['per_price'] = $price * 100;
    }

    public function getDetailAttribute($detail)
    {
        if (is_array($detail)) {
            return $detail;
        } else {
            $detail = json_decode($detail, true);
            return array_filter($detail, function ($value) {
                return !is_null($value) && $value !== '';
            });
        }

    }

}
