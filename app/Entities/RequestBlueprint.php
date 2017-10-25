<?php

namespace App\Entities;

use App\Entities\BaseEntity;
use Illuminate\Database\Eloquent\SoftDeletes;

class RequestBlueprint extends BaseEntity
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $table = 'request_blueprints';

    protected $fillable = [
        'title',
        'description',
        'status',
        'improve_blueprints_id',
        'users_id',
    ];

    /**
     *  Get the improve blueprint asscociated with this request
     */
    public function improve()
    {
        return $this->hasOne(ImproveBlueprint::class, 'improve_blueprints_id');
    }

    /**
     *  Get the user own this request
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'users_id');
    }

    /**
     *  Get the notifies of this request
     */
    public function requestNotifies()
    {
        return $this->hasMany(RequestNotification::class, 'request_id')
            ->orderBy('created_at', 'desc');
    }

    /**
     * Format timestamp to d-m-Y
     */
    public function getCreatedAtAttribute($value)
    {
        return \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $value)->format('d-m-Y');
    }

    /**
     * Format timestamp to d-m-Y
     */
    public function getUpdatedAtAttribute($value)
    {
        return \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $value)->format('d-m-Y');
    }
}
