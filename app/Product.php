<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded = [];

    protected $attributes = [
        'img' => '[]',
        'color' => '[]',
        'size' => '[]',
        'pack' => '[]',
    ];

    protected $casts = [
        'img' => 'array',
    ];

    protected static function booted()
    {
        if (request()->is('admin/*')) {
            //
        } else {
            static::addGlobalScope('status', function (Builder $builder) {
                $builder->where('status', 1);
            });
        }
    }

    public function setColorAttribute($value)
    {
        if (!empty($value)) {
            $this->attributes['color'] = json_encode(explode(',', $value));
        } else {
            $this->attributes['color'] = '[]';
        }
    }

    public function getColorAttribute($value)
    {
        if (request()->is('admin/*')) {
            // 後台需變成字串
            $array = json_decode($value, true);
            return implode(',', $array);
        } else {
            // 前台需變成陣列
            return json_decode($value, true);
        }

    }

    public function setSizeAttribute($value)
    {
        if (!empty($value)) {
            $this->attributes['size'] = json_encode(explode(',', $value));
        } else {
            $this->attributes['size'] = '[]';
        }
    }

    public function getSizeAttribute($value)
    {
        if (request()->is('admin/*')) {
            // 後台需變成字串
            $array = json_decode($value, true);
            return implode(',', $array);
        } else {
            // 前台需變成陣列
            return json_decode($value, true);
        }
    }

    public function setPackAttribute($value)
    {
        if (!empty($value)) {
            $this->attributes['pack'] = json_encode(explode(',', $value));
        } else {
            $this->attributes['pack'] = '[]';
        }
    }

    public function getPackAttribute($value)
    {
        if (request()->is('admin/*')) {
            // 後台需變成字串
            $array = json_decode($value, true);
            return implode(',', $array);
        } else {
            // 前台需變成陣列
            return json_decode($value, true);
        }
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function carts()
    {
        return $this->hasMany(Cart::class);
    }

    public function orders()
    {
        return $this->belongsToMany('App\Order', 'order_products')
            ->withPivot('per_price', 'per_amount', 'detail')
            ->withTimestamps();
    }

}
