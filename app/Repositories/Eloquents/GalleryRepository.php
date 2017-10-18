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

    public function findById($id)
    {
        $result = $this->model::find($id);
        return $result;
    }

    public function remove($id)
    {
        $imgRemove = $this->findById($id);
        $imgRemove->delete();
        return "removed";
    }

    public function countImages($blueprintId)
    {
        return $this->model::where('blueprints_id', $blueprintId)->count() + 1;
    }
}
