<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

abstract class BaseEntity extends Model
{
    protected $dates = ['deleted_at'];
}
