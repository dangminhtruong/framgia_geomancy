<?php

namespace App\Entities;

use App\Entities\BaseEntity;

class OrderDetail extends BaseEntity
{
    protected $table = 'order_detail';

    protected $fillable = [
        'quantity',
        'price_per_product',
        'products_id',
        'orders_id'
    ];

    /**
     *  Get the order own this detail
     */
    public function order()
    {
        return $this->belongsTo(\App\Entity\Order::class, 'orders_id');
    }

    /**
     *  Get the product associated with this detail
     */
    public function product()
    {
        return $this->hasOne(\App\Entity\Product::class, 'products_id');
    }
}
