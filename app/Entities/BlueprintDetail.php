<?php

namespace App\Entities;

use App\Entities\BaseEntity;

class BlueprintDetail extends BaseEntity
{
    protected $table = 'blueprint_detail';

    protected $fillable = [
        'quantity',
        'blueprints_id',
        'products_id',
    ];

    /**
     *  Get the blueprint that own this detail
     */
    public function blueprint()
    {
        return $this->belongsTo(\App\Entity\Blueprint::class, 'blueprints_id');
    }

    /**
     *  Get the product associated with this detail
     */
    public function product()
    {
        return $this->hasOne(\App\Entity\Product::class, 'products_id');
    }
}
