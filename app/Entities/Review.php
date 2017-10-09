<?php

namespace App\Entities;

use App\Entities\BaseEntity;

class Review extends BaseEntity
{
    protected $table = 'reviews';

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
        return $this->belongsTo(\App\Entities\User::class, 'users_id');
    }

    /**
     *  Get the post own this review
     */
    public function post()
    {
        return $this->belongsTo(\App\Entities\Post::class, 'posts_id');
    }
}
