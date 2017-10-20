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
        return $this->belongsTo(Blueprint::class, 'blueprints_id');
    }

    /**
     *  Get the user own this improve
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'users_id');
    }

    /**
     *  Get the improve detail belong to this improve blueprint
     */
    public function details()
    {
        return $this->hasMany(ImproveDetail::class, 'improve_blueprints_id');
    }

    /**
     *  Get the request blueprint associated to this improve blueprint
     */
    public function request()
    {
        return $this->hasOne(RequestBlueprint::class, 'improve_blueprints_id');
    }
}
