<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name',
        'status',
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

    public function products()
    {
        return $this->hasMany(Product::class);
    }

}
