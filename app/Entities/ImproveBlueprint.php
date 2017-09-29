<?php

namespace App\Entities;

use App\Entities\BaseEntity;

class ImproveBlueprint extends BaseEntity
{
    protected $table = 'improve_blueprints';

    protected $fillable = [
        'description',
        'status',
        'publish_flg',
        'blueprints_id',
        'users_id',
    ];

    /**
     *  Get the blueprint own this improve
     */
    public function blueprint()
    {
        return $this->belongsTo(\App\Entity\Blueprint::class, 'blueprints_id');
    }

    /**
     *  Get the user own this improve
     */
    public function user()
    {
        return $this->belongsTo(\App\Entity\User::class, 'users_id');
    }

    /**
     *  Get the improve detail belong to this improve blueprint
     */
    public function details()
    {
        return $this->hasMany(\App\Entity\ImproveDetail::class);
    }

    /**
     *  Get the request blueprint associated to this improve blueprint
     */
    public function request()
    {
        return $this->hasOne(\App\Entity\RequestBlueprint::class);
    }
}
