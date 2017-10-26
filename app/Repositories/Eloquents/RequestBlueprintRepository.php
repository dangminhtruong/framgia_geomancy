<?php

namespace App\Repositories\Eloquents;

use App\Repositories\Contracts\RequestBlueprintRepositoryInterface;
use App\Entities\RequestBlueprint;

class RequestBlueprintRepository extends AbstractRepository implements RequestBlueprintRepositoryInterface
{
    protected $model;

    function __construct()
    {
        $this->model = $this->model();
    }

    public function model()
    {
        return RequestBlueprint::class;
    }

    public function findById($id)
    {
        $result = $this->model::find($id);
        return $result;
    }

    public function updateRequestBlueprint($id, $request)
    {
        $requestBlueprint = $this->model::find($id);
        $requestBlueprint->title = $request->request_blueprint_title;
        $requestBlueprint->description = $request->edit_description;
        $requestBlueprint->status = 0;
        return $requestBlueprint->save();
    }

    public function delete($id)
    {
        return $this->model::find($id)->delete();
    }

    public function countSummary()
    {
        return $this->model::count();
    }

    public function getPendingRequest()
    {
        return $this->model::with(['user'])
            ->where('status', 2)
            ->get();
    }

    public function getApprovedRequest()
    {
        return $this->model::with(['user'])
            ->where('status', 1)
            ->get();
    }

    public function getNewRequest()
    {
        return $this->model::with(['user'])
            ->where('status', 0)
            ->get();
    }

    public function approve($requestId)
    {
        return $this->model::where('id', $requestId)
            ->update(['status' => 1]);
    }
}
