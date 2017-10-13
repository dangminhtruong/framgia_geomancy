<?php

namespace App\Repositories\Eloquents;

use App\Repositories\Contracts\BlueprintRepositoryInterface;
use App\Repositories\Contracts\GalleryRepositoryInterface as GalleryRepository;
use App\Repositories\Contracts\BlueprintDetailRepositoryInterface as BlueprintDetailRepository;
use App\Repositories\Contracts\SuggestProductRepositoryInterface as SuggestProductRepository;
use App\Framgia\Response\FlashResponse;
use App\Framgia\Response\FormResponse;
use App\Entities\Blueprint;
use App\Entities\RequestBlueprint;
use Auth, Hash;

class BlueprintRepository extends AbstractRepository implements BlueprintRepositoryInterface
{
    protected $model;
    private $galleryRepository;
    private $flashResponse;
    private $formResponse;
    private $blueprintDetailRepository;
    private $suggestProductRepository;

    function __construct(
        GalleryRepository $galleryRepository,
        FlashResponse $flashResponse,
        BlueprintDetailRepository $blueprintDetailRepository,
        FormResponse $formResponse,
        SuggestProductRepository $suggestProductRepository
    )
    {
        $this->model = $this->model();
        $this->galleryRepository = $galleryRepository;
        $this->flashResponse = $flashResponse;
        $this->formResponse = $formResponse;
        $this->blueprintDetailRepository = $blueprintDetailRepository;
        $this->suggestProductRepository = $suggestProductRepository;
    }

    public function model()
    {
        return Blueprint::class;
    }

    public function getAllTopics()
    {
        $result = $this->model::all();
        return $result;
    }

    public function create($data)
    {
        $result = $this->model::create($data);
        return $result;
    }

    public function createBlueprint($request)
    {
        $blueprintData = [];
        $blueprintData = array_add($blueprintData, 'title', $request->blueprint_name);
        $blueprintData = array_add($blueprintData, 'description', $request->blueprint_desc);
        $blueprintData = array_add($blueprintData, 'topics_id', $request->topic_id);
        $blueprintData = array_add($blueprintData, 'publish_flg', 1);
        $blueprintData = array_add($blueprintData, 'users_id', Auth::user()->id);
        $addBlueprint = $this->create($blueprintData);

        $suggestProductData = [];
        $suggestProductData = array_add($suggestProductData, 'name', $request->suggestName);
        $suggestProductData = array_add($suggestProductData, 'categories_id', $request->categoryId);
        $suggestProductData = array_add($suggestProductData, 'price', $request->suggestPrice);
        $suggestProductData = array_add($suggestProductData, 'blueprints_id', $addBlueprint->id);
        $suggestProductData = array_add($suggestProductData, 'attribute', $request->suggestDesc);
        $this->suggestProductRepository->create($suggestProductData);

        if ($request->blueprint_product) {
            foreach ($request->blueprint_product as $productId) {
                $blueprintDetailData = [];
                $blueprintDetailData = array_add($blueprintDetailData, 'quantity', 1);
                $blueprintDetailData = array_add($blueprintDetailData, 'products_id', $productId);
                $blueprintDetailData = array_add($blueprintDetailData, 'blueprints_id', $addBlueprint->id);
                $this->blueprintDetailRepository->create($blueprintDetailData);
            }
        }

        if (!$request->hasFile('img')) {
            return $this->flashResponse->success('getCreateBlueprint',
                __('Create blueprint successfull !'));
        }

        foreach ($request->file('img') as $files) {
            $galleryData = [];
            $galleryData = array_add($galleryData, 'image_name', $files->getClientOriginalName());
            $galleryData = array_add($galleryData, 'blueprints_id', $addBlueprint->id);
            $galleryAdd = $this->galleryRepository->create($galleryData);
            $files->move('images/gallery/', $files->getClientOriginalName());
        }

        return $this->flashResponse->success('getCreateBlueprint',
            __('Create blueprint successfull !'));
    }

    public function createRequestBlueprint($request)
    {

        $requestBlueprint = RequestBlueprint::create([
            'users_id' => Auth::user()->id,
            'description' => $request->customer_description
        ]);

        return $this->flashResponse->success('getRequestFishTanksBlueprint',
            __('Request blueprint successfull !'));
    }
}
