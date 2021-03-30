<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use SoftDeletes;
    protected $guarded = [];

    public function setCartInfoAttribute($cart_info)
    {
        if (is_array($cart_info)) {
            $this->attributes['cart_info'] = json_encode($cart_info);
        }
    }

    public function getCartInfoAttribute($cart_info)
    {
        return json_decode($cart_info, true);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function setDetailAttribute($detail)
    {
        if (is_array($detail)) {
            $this->attributes['detail'] = json_encode($detail);
        }
    }

    public function getDetailAttribute($detail)
    {
        return json_decode($detail, true);
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

    public function getPriceAttribute($price)
    {
        return $price / 100;
    }

    public function setPriceAttribute($price)
    {
        $this->attributes['price'] = $price * 100;
    }

    public function getPayableAttribute($status)
    {
        $status = $this->attributes['status'];
        if (in_array($status, [1, 98, 99])) {
            return true;
        }
        return false;
    }

}
