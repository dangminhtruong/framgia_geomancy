<?php

namespace App\Entities;

use App\Entities\BaseEntity;

class Category extends BaseEntity
{
    protected $table = 'categories';

    protected $fillable = [
        'name',
        'description',
    ];

    /**
     *  Get products belong to this category
     */
    public function products()
    {
        return $this->hasMany(Product::class, 'categories_id');
    }

    /**
     *  Get the suggest products belong to this category
     */
    public function suggests()
    {
        return $this->hasMany(SuggestProduct::class, 'categories_id');
    }
}
