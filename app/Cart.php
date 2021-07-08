<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cart extends Model
{
    use SoftDeletes;
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function getTotalPriceAttribute($price)
    {
        return $price / 100;
    }

    public function setTotalPriceAttribute($price)
    {
        $this->attributes['total_price'] = $price * 100;
    }

    public function getPerPriceAttribute($price)
    {
        return $price / 100;
    }

    public function setPerPriceAttribute($price)
    {
        $this->attributes['per_price'] = $price * 100;
    }
}
