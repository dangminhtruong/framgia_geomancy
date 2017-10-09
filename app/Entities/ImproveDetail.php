<?php

namespace App\Entities;

use App\Entities\BaseEntity;

class ImproveDetail extends BaseEntity
{
    protected $table = 'improve_detail';

    protected $fillable = [
        'quantity',
        'improve_blueprints_id',
        'products_id',
    ];

    /**
     *  Get improve blueprint own this detail
     */
    public function improveBlueprint()
    {
        return $this->belongsTo(\App\Entities\ImproveBlueprint::class, 'improve_blueprints_id');
    }

    /**
     *  Get the product associated to this detail
     */
    public function product()
    {
        return $this->hasOne(\App\Entities\Product::class);
    }
}
