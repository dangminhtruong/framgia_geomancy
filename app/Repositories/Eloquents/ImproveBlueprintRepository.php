<?php

namespace App\Repositories\Eloquents;

use App\Repositories\Contracts\ImproveBlueprintRepositoryInterface;
use App\Repositories\Contracts\BlueprintRepositoryInterface as BlueprintRepository;
use App\Repositories\Contracts\BlueprintDetailRepositoryInterface as BlueprintDetailRepository;
use App\Repositories\Contracts\ImproveDetailRepositoryInterface as ImproveDetailRepository;
use App\Repositories\Contracts\GalleryRepositoryInterface as GalleryRepository;
use App\Entities\ImproveBlueprint;
use Auth;

class ImproveBlueprintRepository extends AbstractRepository implements ImproveBlueprintRepositoryInterface
{
    protected $model;
    protected $blueprintRepository;
    protected $blueprintDetailRepository;
    protected $improveDetailRepository;
    protected $galleryRepository;

    function __construct(
        ImproveDetailRepository $improveDetailRepository,
        BlueprintRepository $blueprintRepository,
        BlueprintDetailRepository $blueprintDetailRepository,
        GalleryRepository $galleryRepository
    )
    {
        $this->model = $this->model();
        $this->blueprintRepository = $blueprintRepository;
        $this->blueprintDetailRepository = $blueprintDetailRepository;
        $this->improveDetailRepository = $improveDetailRepository;
        $this->galleryRepository = $galleryRepository;
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
        $originBlueprint = $this->blueprintRepository->getBlueprintInfo($id);
        $cloneData = [];

        $cloneData = array_add($cloneData, 'title', $originBlueprint->title);
        $cloneData = array_add($cloneData, 'description', $originBlueprint->description);
        $cloneData = array_add($cloneData, 'status', 0);
        $cloneData = array_add($cloneData, 'publish_flg', 1);
        $cloneData = array_add($cloneData, 'topics_id', $originBlueprint->topics_id);
        $cloneData = array_add($cloneData, 'users_id', Auth::user()->id);
        $createClone = $this->blueprintRepository->create($cloneData);

        foreach ($originBlueprint->details as $blueprintDetail) {
            $originDetail = $this->blueprintDetailRepository->findById($blueprintDetail->id);
            $cloneDetailData = [];
            $cloneDetailData = array_add($cloneDetailData, 'quantity', $originDetail->quantity);
            $cloneDetailData = array_add($cloneDetailData, 'blueprints_id', $createClone->id);
            $cloneDetailData = array_add($cloneDetailData, 'products_id', $originDetail->products_id);
            $this->blueprintDetailRepository->create($cloneDetailData);
        }

        foreach ($originBlueprint->gallery as $image) {
            $newImage = [];
            $newImage = array_add($newImage, 'image_name', $image->image_name);
            $newImage = array_add($newImage, 'blueprints_id', $createClone->id);
            $this->galleryRepository->create($newImage);
        }

        return $createClone->id;
    }

    public function forkBlueprintInfo($id)
    {
        $result = $this->model::find($id);
        return $result;
    }

    public function updateImprove($request, $id)
    {
        $update = $this->model::find($id);
        $update->description = $request->blueprint_desc;
        return $update->save();
    }

    public function editForkedBlueprint($request, $id)
    {
        self::updateImprove($request, $id);
        if ($request->improve_product) {
            foreach ($request->improve_product as $product_id => $number) {
                $this->improveDetailRepository->updateQuantity($product_id, $number, $id);
            }
        }
        if ($request->blueprint_product) {
            foreach ($request->blueprint_product as $key => $value) {
                $data = [
                    "quantity" => $value,
                    "improve_blueprints_id" => $id,
                    "products_id" => $key
                ];
                $this->improveDetailRepository->create($data);
            }
        }
    }

    public function delForkedBlueprint($id)
    {
        $delImprove = $this->model::find($id);
        $delImprove->status = 2;
        $delImprove->save();
        return __('deleted');
    }
}
