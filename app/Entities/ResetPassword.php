<?php

namespace App\Entities;

use App\Entities\BaseEntity;

class ResetPassword extends BaseEntity
{
    protected $table = 'password_resets';

    protected $fillable = ['email', 'token', 'created_at'];

    public $timestamps = false;
}
