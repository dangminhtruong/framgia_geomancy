<?php

namespace App\Repositories\Eloquents;

use App\Repositories\Contracts\RequestBlueprintRepositoryInterface;
use App\Repositories\Contracts\RequestNotifyRepositoryInterface as RequestNotifyRepository;
use App\Entities\RequestBlueprint;

class RequestBlueprintRepository extends AbstractRepository implements RequestBlueprintRepositoryInterface
{
    protected $model;
    private $requestNotifyRepository;

    function __construct(RequestNotifyRepository $requestNotifyRepository)
    {
        $this->model = $this->model();
        $this->requestNotifyRepository = $requestNotifyRepository;
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

    public function updateRequestBlueprint($request, $id)
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
            ->orderBy('updated_at', 'desc')
            ->orderBy('created_at', 'desc')
            ->get();
    }

    public function getApprovedRequest()
    {
        return $this->model::with(['user'])
            ->where('status', 1)
            ->orderBy('updated_at', 'desc')
            ->orderBy('created_at', 'desc')
            ->get();
    }

    public function getNewRequest()
    {
        return $this->model::with(['user'])
            ->where('status', 0)
            ->orderBy('updated_at', 'desc')
            ->orderBy('created_at', 'desc')
            ->get();
    }

    public function approve($requestId)
    {
        return $this->model::where('id', $requestId)
            ->update(['status' => 1]);
    }


    public function getStatus($requestId)
    {
        return $this->model::where('id', $requestId)
            ->first()->status;
    }

    public function sendNewMessage($message, $requestId)
    {
        $this->requestNotifyRepository->newMessage($message, $requestId);
    }

    public function changeMessageStatus($requestId)
    {
        $this->requestNotifyRepository->changeStatus($requestId);
    }
}
