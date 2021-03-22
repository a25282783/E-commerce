<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cart extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'user_id',
        'product_id',
        'amount',
        'per_price',
        'total_price',
        'receipt',
    ];

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

    public function setReceiptAttribute($receipt)
    {
        if (is_array($receipt)) {
            $this->attributes['receipt'] = json_encode($receipt);
        }
    }

    public function getReceiptAttribute($receipt)
    {
        return json_decode($receipt, true);
    }
}
