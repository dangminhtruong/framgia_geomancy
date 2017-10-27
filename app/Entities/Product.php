<?php

namespace App\Entities;

use App\Entities\BaseEntity;

class Product extends BaseEntity
{
    protected $table = 'products';

    protected $fillable = [
        'categories_id',
        'image',
        'description',
        'name',
        'slug',
        'price',
        'stock',
        'attribute',
        'del_flg'
    ];

    /**
     * Get the category own this product
     */
    public function category()
    {
        return $this->belongsTo(\App\Entities\Category::class, 'categories_id');
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

    /**
     * Convert json to array
     */
    public function getAttributeAttribute($value)
    {
        return json_decode($value);
    }

    /**
     * Format price
     */
    public function getPriceAttribute($value)
    {
        return number_format($value);
    }

    public function blueprint()
    {
        return $this->belongsToMany('App\Entities\Blueprint');
    }

    public function improveDetail()
    {
        return $this->hasMany('App\Entities\ImproveDetail', 'products_id');
    }
}
