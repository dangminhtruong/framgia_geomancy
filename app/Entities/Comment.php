<?php

namespace App\Entities;

use App\Entities\BaseEntity;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends BaseEntity
{
    protected $table = 'comments';
    protected $dates = ['deleted_at'];
    protected $fillable = [
        'id',
        'body',
        'users_id',
        'parents_comment_id',
        'commentable_id',
        'commentable_type',
    ];

    public function commentable()
    {
        return $this->morphTo();
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'users_id');
    }
}
