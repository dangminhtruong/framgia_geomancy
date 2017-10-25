<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class RequestNotification extends Model
{
    protected $table = 'request_notifications';

    protected $fillable = [
        'request_id',
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
     *  Get the request blueprint associated with this notification
     */
    public function request()
    {
        return $this->belongsTo(RequestBlueprint::class, 'request_id');
    }

    /**
     * Format timestamp to diffForHuman
     */
    public function getCreatedAtAttribute($value)
    {
        return \Carbon\Carbon::parse($value)->diffForHumans();
    }
}
