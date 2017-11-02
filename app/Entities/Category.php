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

    /**
     * Format timestamp to d-m-Y
     */
    public function getCreatedAtAttribute($value)
    {
        return \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $value)->format('d-m-Y');
    }

    /**
     * Format timestamp to d-m-Y
     */
    public function getUpdatedAtAttribute($value)
    {
        return \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $value)->format('d-m-Y');
    }
}
