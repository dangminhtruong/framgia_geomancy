<?php

namespace App\Entities;

use App\Entities\BaseEntity;

class Product extends BaseEntity
{
    protected $table = 'products';

    protected $fillable = [
        'categories_id',
        'name',
        'slug',
        'price',
        'stock',
        'attribute',
        'del_flg'
    ];

    /**
     *  Get the category own this product
     */
    public function category()
    {
        return $this->belongsTo(\App\Entity\Category::class, 'categories_id');
    }
}
