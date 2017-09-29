<?php

namespace App\Entities;

use App\Entities\BaseEntity;

class Post extends BaseEntity
{
    protected $table = 'posts';

    protected $fillable = [
        'title',
        'body',
        'slug',
        'publish_flg',
        'users_id',
        'types_id',
    ];

    /**
     *  Get the user own this post
     */
    public function user()
    {
        return $this->belongsTo(\App\Entity\User::class, 'users_id');
    }

    /**
     *  Get the type of this post
     */
    public function type()
    {
        return $this->belongsTo(\App\Entity\Type::class, 'types_id');
    }

    /**
     *  Get the reviews belong to this post
     */
    public function reviews()
    {
        return $this->hasMany(\App\Entity\Review::class);
    }
}
