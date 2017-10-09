<?php

namespace App\Entities;

use App\Entities\BaseEntity;

class Type extends BaseEntity
{
    protected $table = 'types';

    protected $fillable = [
        'name',
        'description',
    ];

    /**
     *  Get the posts belong to this type
     */
    public function posts()
    {
        return $this->hasMany(\App\Entities\Post::class);
    }
}
