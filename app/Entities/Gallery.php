<?php

namespace App\Entities;

use App\Entities\BaseEntity;

class Gallery extends BaseEntity
{
    protected $table = 'gallery';

    protected $fillable = [
        'image_name',
        'blueprints_id',
    ];

    /**
     *  Get the blueprint own this gallery
     */
    public function blueprint()
    {
        return $this->belongsTo(Blueprint::class, 'blueprints_id');
    }
}
