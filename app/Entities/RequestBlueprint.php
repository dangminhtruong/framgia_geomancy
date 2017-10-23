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
}
