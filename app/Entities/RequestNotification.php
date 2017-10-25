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
        return $this->hasOne(User::class, 'users_id');
    }

    /**
     *  Get the request blueprint associated with this notification
     */
    public function request()
    {
        return $this->hasOne(RequestBlueprint::class, 'request_id');
    }
}
