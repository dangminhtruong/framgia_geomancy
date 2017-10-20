<?php

namespace App\Entities;

use App\Entities\BaseEntity;

class Topic extends BaseEntity
{
    protected $table = 'topics';

    protected $fillable = [
        'name',
        'description',
    ];

    /**
     *  Get the blueprint belong to this topic
     */
    public function blueprints()
    {
        return $this->hasMany(Blueprint::class, 'topics_id');
    }
}
