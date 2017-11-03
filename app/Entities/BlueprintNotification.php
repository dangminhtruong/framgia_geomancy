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
        return $this->belongsTo(User::class, 'users_id');
    }

    /**
     *  Get the blueprint associated with this notification
     */
    public function blueprint()
    {
        return $this->belongsTo(Blueprint::class, 'blueprints_id');
    }

    /**
     * Format timestamp to diffForHuman
     */
    public function getCreatedAtAttribute($value)
    {
        return \Carbon\Carbon::parse($value)->diffForHumans();
    }
}
