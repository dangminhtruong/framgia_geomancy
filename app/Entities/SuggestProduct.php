<?php

namespace App\Entities;

use App\Entities\BaseEntity;

class SuggestProduct extends BaseEntity
{
    protected $table = 'suggest_products';

    protected $fillable = [
        'name',
        'price',
        'attribute',
        'blueprints_id',
        'categories_id',
    ];

    /**
     *  Get the blueprint own this suggest product
     */
    public function blueprint()
    {
        return $this->belongsTo(Blueprint::class, 'blueprints_id');
    }

    /**
     *  Get the category own this suggest product
     */
    public function category()
    {
        return $this->belongsTo(Category::class, 'categories_id');
    }
}
