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
        return $this->hasMany(\App\Entity\Product::class);
    }

    /**
     *  Get the suggest products belong to this category
     */
    public function suggests()
    {
        return $this->hasMany(\App\Entity\SuggestProduct::class);
    }
}
