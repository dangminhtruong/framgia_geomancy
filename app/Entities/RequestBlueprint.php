<?php

namespace App\Entities;

use App\Entities\BaseEntity;

class RequestBlueprint extends BaseEntity
{
    protected $table = 'request_blueprint';

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
        return $this->hasOne(\App\Entity\ImproveBlueprint::class, 'improve_blueprints_id');
    }

    /**
     *  Get the user own this request
     */
    public function user()
    {
        return $this->belongsTo(\App\Entity\User::class, 'users_id');
    }
}
