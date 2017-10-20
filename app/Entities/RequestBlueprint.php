<?php

namespace App\Entities;

use App\Entities\BaseEntity;

class RequestBlueprint extends BaseEntity
{
    protected $table = 'request_blueprints';

    protected $fillable = [
        'description',
        'status',
        'improve_blueprints_id',
        'users_id',
    ];

    /**
     *  Get the improve blueprint asscociated with this request
     */
    public function improve()
    {
        return $this->hasOne(ImproveBlueprint::class, 'improve_blueprints_id');
    }

    /**
     *  Get the user own this request
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'users_id');
    }
}
