<?php

namespace App\Repositories\Eloquents;

use App\Repositories\Contracts\ImproveBlueprintRepositoryInterface;
use App\Repositories\Contracts\BlueprintRepositoryInterface as BlueprintRepository;
use App\Repositories\Contracts\BlueprintDetailRepositoryInterface as BlueprintDetailRepository;
use App\Repositories\Contracts\ImproveDetailRepositoryInterface as ImproveDetailRepository;
use App\Entities\ImproveBlueprint;
use Auth;

class ImproveBlueprintRepository extends AbstractRepository implements ImproveBlueprintRepositoryInterface
{
    protected $model;
    protected $blueprintRepository;
    protected $blueprintDetailRepository;
    protected $improveDetailRepository;

    function __construct(
        ImproveDetailRepository $improveDetailRepository,
        BlueprintRepository $blueprintRepository,
        BlueprintDetailRepository $blueprintDetailRepository
    )
    {
        $this->model = $this->model();
        $this->blueprintRepository = $blueprintRepository;
        $this->blueprintDetailRepository = $blueprintDetailRepository;
        $this->improveDetailRepository = $improveDetailRepository;
    }

    public function model()
    {
        return ImproveBlueprint::class;
    }

    public function create($data)
    {
        return $this->model::create($data);
    }


    public function fork($id)
    {
        if ($this->checkForked($id) == false) {
            $originBlueprint = $this->blueprintRepository->getBlueprintInfo($id);
            $cloneData = [];

            $cloneData = array_add($cloneData, 'description', $originBlueprint->description);
            $cloneData = array_add($cloneData, 'status', 0);
            $cloneData = array_add($cloneData, 'publish_flg', 1);
            $cloneData = array_add($cloneData, 'blueprints_id', $originBlueprint->id);
            $cloneData = array_add($cloneData, 'users_id', Auth::user()->id);
            $improveBlueprint = $this->create($cloneData);

            foreach ($originBlueprint->details as $blueprintDetail) {
                $originDetail = $this->blueprintDetailRepository->findById($blueprintDetail->id);
                $cloneDetailData = [];
                $cloneDetailData = array_add($cloneDetailData, 'quantity', $originDetail->quantity);
                $cloneDetailData = array_add($cloneDetailData, 'improve_blueprints_id', $improveBlueprint->id);
                $cloneDetailData = array_add($cloneDetailData, 'products_id', $originDetail->products_id);
                $cloneDetailData = array_add($cloneDetailData, 'users_id', Auth::user()->id);
                $this->improveDetailRepository->create($cloneDetailData);
            }

            return "forked";
        } else {
            return "you already forked";
        }
    }

    public function checkForked($blueprintId)
    {
        $check = $this->model::where([
            ['blueprints_id', '=', $blueprintId],
            ['users_id', '=', Auth::user()->id]
        ])->count();

        if ($check > 0) {
            return true;
        } else {
            return false;
        }
    }
}
