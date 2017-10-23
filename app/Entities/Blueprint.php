<?php

namespace App\Entities;

use App\Entities\BaseEntity;
use Illuminate\Database\Eloquent\SoftDeletes;

class Blueprint extends BaseEntity
{
    use SoftDeletes;
    protected $table = 'blueprints';
    protected $dates = ['deleted_at'];
    protected $fillable = [
        'title',
        'description',
        'publish_flg',
        'topics_id',
        'users_id',
    ];

    /**
     *  Get the topic own this blueprint
     */
    public function topic()
    {
        return $this->belongsTo(Topic::class, 'topics_id');
    }

    /**
     *  Get the user own this blueprint
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'users_id');
    }

    /**
     *  Get the details belong to this blueprint
     */
    public function details()
    {
        return $this->hasMany(BlueprintDetail::class, 'blueprints_id');
    }

    /**
     *  Get the suggest products belong to this blueprint
     */
    public function suggests()
    {
        return $this->hasMany(SuggestProduct::class, 'blueprints_id');
    }

    /**
     *  Get the improve blueprints belong to this blueprint
     */
    public function improves()
    {
        return $this->hasMany(ImproveBlueprint::class, 'blueprints_id');
    }

    /**
     *  Get the products belong to this blueprint
     */
    public function product()
    {
        return $this->belongsToMany(Product::class, 'blueprint_detail', 'blueprints_id', 'products_id')
            ->withPivot('quantity');
    }

    public function gallery()
    {
        return $this->hasMany(Gallery::class, 'blueprints_id', 'id');
    }
}
