<?php

namespace App\Entities;

use App\Entities\BaseEntity;

class Blueprint extends BaseEntity
{
    protected $table = 'blueprints';

    protected $fillable = [
        'title',
        'description',
        'publish_flg',
        'topics_id',
        'users_id',
    ];

    /**
     *  Get the topic own this blueprint
     */
    public function topic()
    {
        return $this->belongsTo(\App\Entities\Topic::class, 'topics_id');
    }

    /**
     *  Get the user own this blueprint
     */
    public function user()
    {
        return $this->belongsTo(\App\Entities\User::class, 'users_id');
    }

    /**
     *  Get the details belong to this blueprint
     */
    public function details()
    {
        return $this->hasMany(\App\Entities\BlueprintDetail::class);
    }

    /**
     *  Get the suggest products belong to this blueprint
     */
    public function suggests()
    {
        return $this->hasMany(\App\Entities\SuggestProduct::class);
    }

    /**
     *  Get the improve blueprints belong to this blueprint
     */
    public function improves()
    {
        return $this->hasMany(\App\Entities\ImproveBlueprint::class);
    }
}
