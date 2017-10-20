<?php

namespace App\Entities;

use App\Entities\BaseEntity;

class BlueprintNotification extends BaseEntity
{
    protected $table = 'blueprint_notifications';

    protected $fillable = [
        'blueprints_id',
        'users_id',
        'message',
        'view_flg'
    ];

    /**
     *  Get the user associated with this notification
     */
    public function user()
    {
        return $this->hasOne(User::class, 'users_id');
    }

    /**
     *  Get the blueprint associated with this notification
     */
    public function blueprint()
    {
        return $this->hasOne(Blueprint::class, 'blueprints_id');
    }
}
