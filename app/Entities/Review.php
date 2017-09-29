<?php

namespace App\Entities;

use App\Entities\BaseEntity;

class Review extends BaseEntity
{
    protected $table = 'review';

    protected $fillable = [
        'rate',
        'comment',
        'users_id',
        'posts_id',
    ];

    /**
     *  Get the user own this review
     */
    public function user()
    {
        return $this->belongsTo(\App\Entity\User::class, 'users_id');
    }

    /**
     *  Get the post own this review
     */
    public function post()
    {
        return $this->belongsTo(\App\Entity\Post::class, 'posts_id');
    }
}
