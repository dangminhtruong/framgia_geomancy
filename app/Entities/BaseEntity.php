<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

abstract class BaseEntity extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];
}
