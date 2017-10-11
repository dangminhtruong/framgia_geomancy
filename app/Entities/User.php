<?php

namespace App\Entities;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'socialite_id',
        'address',
        'phone',
        'role',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $dates = ['deleted_at'];

    /**
     *  Get the orders belong to this user
     */
    public function orders()
    {
        return $this->hasMany(\App\Entities\Order::class);
    }

    /**
     *  Get the blueprints belong to this user
     */
    public function blueprints()
    {
        return $this->hasMany(\App\Entities\Blueprint::class);
    }

    /**
     *  Get the improve blueprints belong to this user
     */
    public function improves()
    {
        return $this->hasMany(\App\Entities\ImproveBlueprint::class);
    }

    /**
     *  Get the posts belong to this user
     */
    public function posts()
    {
        return $this->hasMany(\App\Entities\Post::class);
    }

    /**
     *  Get the reviews belong to this user
     */
    public function reviews()
    {
        return $this->hasMany(\App\Entities\Review::class);
    }

    /**
     *  Get the requests belong to this user
     */
    public function requests()
    {
        return $this->hasMany(\App\Entities\RequestBlueprint::class);
    }

    /**
     *  Convert json to array
     */
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }
}
