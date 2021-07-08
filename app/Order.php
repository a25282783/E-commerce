<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use SoftDeletes;
    protected $guarded = [];

    protected $attributes = [
        'detail' => '[]',
        'receipt' => '[]',
    ];

    protected $casts = [
        'detail' => 'array',
        'receipt' => 'array',
    ];

    public function getTotalPriceAttribute($price)
    {
        return $price / 100;
    }

    public function setTotalPriceAttribute($price)
    {
        $this->attributes['total_price'] = $price * 100;
    }

    public function getPayableAttribute($status)
    {
        $status = $this->attributes['status'];
        if (in_array($status, [1, 98, 99])) {
            return true;
        }
        return false;
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function products()
    {
        return $this->belongsToMany('App\Product', 'order_products')
            ->withPivot('per_price', 'per_amount', 'detail')
            ->withTimestamps();
    }

}
