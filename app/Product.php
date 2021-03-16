<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded = [];

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

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function setImgAttribute($img)
    {
        if (is_array($img)) {
            $this->attributes['img'] = json_encode($img);
        }
        if (!$img) {
            $this->attributes['img'] = json_encode([]);
        }
    }

    public function getImgAttribute($img)
    {
        return json_decode($img, true);
    }

    public function setDetailAttribute($detail)
    {
        if (is_array($detail)) {
            $this->attributes['detail'] = json_encode($detail);
        }
        if (!$detail) {
            $this->attributes['detail'] = json_encode([]);
        }
    }

    public function getDetailAttribute($detail)
    {
        return json_decode($detail, true);
    }

}
