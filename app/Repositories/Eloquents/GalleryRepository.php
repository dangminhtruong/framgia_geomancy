<?php

namespace App\Repositories\Eloquents;

use App\Repositories\Contracts\GalleryRepositoryInterface;
use App\Entities\Gallery;

class GalleryRepository extends AbstractRepository implements GalleryRepositoryInterface
{
    protected $model;

    function __construct()
    {
        $this->model = $this->model();
    }

    public function model()
    {
        return Gallery::class;
    }

    public function create($data)
    {
        $result = $this->model::create($data);
        return $result;
    }
}
