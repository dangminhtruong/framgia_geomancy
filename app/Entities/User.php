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
        return $this->hasMany(Order::class, 'users_id');
    }

    /**
     *  Get the blueprints belong to this user
     */
    public function blueprints()
    {
        return $this->hasMany(Blueprint::class, 'users_id');
    }

    /**
     *  Get the improve blueprints belong to this user
     */
    public function improves()
    {
        return $this->hasMany(ImproveBlueprint::class, 'users_id');
    }

    /**
     *  Get the posts belong to this user
     */
    public function posts()
    {
        return $this->hasMany(Post::class, 'users_id');
    }

    /**
     *  Get the reviews belong to this user
     */
    public function reviews()
    {
        return $this->hasMany(Review::class, 'users_id');
    }

    /**
     *  Get the requests belong to this user
     */
    public function requests()
    {
        return $this->hasMany(RequestBlueprint::class, 'users_id');
    }

    /**
     *  Convert json to array
     */
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }
}
