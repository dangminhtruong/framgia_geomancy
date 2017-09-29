<?php

namespace App\Entities;

use App\Entities\BaseEntity;

class Order extends BaseEntity
{
    protected $table = 'orders';

    protected $fillable = [
        'description',
        'confirm_token',
        'approve_flg',
        'users_id',
    ];

    /**
     *  Get the user own this order
     */
    public function user()
    {
        return $this->belongsTo(\App\Entity\User::class, 'users_id');
    }

    /**
     *  Get the order's detail belong to this order
     */
    public function details()
    {
        return $this->hasMany(\App\Entity\OrderDetail::class);
    }
}
