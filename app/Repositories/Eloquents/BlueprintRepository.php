<?php

namespace App\Repositories\Eloquents;

use App\Repositories\Contracts\BlueprintRepositoryInterface;
use App\Repositories\Contracts\GalleryRepositoryInterface as GalleryRepository;
use App\Repositories\Contracts\BlueprintDetailRepositoryInterface as BlueprintDetailRepository;
use App\Repositories\Contracts\SuggestProductRepositoryInterface as SuggestProductRepository;
use App\Repositories\Contracts\TopicRepositoryInterface as TopicRepository;
use App\Framgia\Response\FlashResponse;
use App\Framgia\Response\FormResponse;
use App\Entities\Blueprint;
use App\Entities\RequestBlueprint;
use App\Framgia\Helpers\FramgiaHelper;
use Auth, Hash, DB;
use Carbon\Carbon;
use App\Events\CreateBluePrintDone;

class BlueprintRepository extends AbstractRepository implements BlueprintRepositoryInterface
{
    protected $model;
    private $galleryRepository;
    private $flashResponse;
    private $formResponse;
    private $blueprintDetailRepository;
    private $suggestProductRepository;
    private $topicRepository;

    function __construct(
        GalleryRepository $galleryRepository,
        FlashResponse $flashResponse,
        BlueprintDetailRepository $blueprintDetailRepository,
        FormResponse $formResponse,
        SuggestProductRepository $suggestProductRepository,
        TopicRepository $topicRepository
    )
    {
        $this->model = $this->model();
        $this->galleryRepository = $galleryRepository;
        $this->flashResponse = $flashResponse;
        $this->formResponse = $formResponse;
        $this->blueprintDetailRepository = $blueprintDetailRepository;
        $this->suggestProductRepository = $suggestProductRepository;
        $this->topicRepository = $topicRepository;
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

    public function update()
    {
        $result = $this->model::save($data);
    }

    public function delete($id)
    {
        $blueprintDelete = $this->model::find($id);
        $blueprintDelete->status = 2;
        return $blueprintDelete->save();
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


        if ($request->blueprint_product) {
            foreach ($request->blueprint_product as $id => $quatity) {
                $blueprintDetailData = [];
                $blueprintDetailData = array_add($blueprintDetailData, 'products_id', $id);
                $blueprintDetailData = array_add($blueprintDetailData, 'quantity', $quatity);
                $blueprintDetailData = array_add($blueprintDetailData, 'blueprints_id', $addBlueprint->id);
                $this->blueprintDetailRepository->create($blueprintDetailData);
            }
        }

        $this->suggestProductRepository->updateAfterCreate($addBlueprint->id);

        if (!$request->hasFile('img')) {
            event(new CreateBluePrintDone($addBlueprint));
            return redirect()->route('getCreateDone', [$addBlueprint->id]);
        }

        foreach ($request->file('img') as $files) {
            $plusName = ($this->galleryRepository->countImages($addBlueprint->id) + 1) . '_';
            $galleryData = [];
            $galleryData = array_add($galleryData, 'image_name', $plusName . $files->getClientOriginalName());
            $galleryData = array_add($galleryData, 'blueprints_id', $addBlueprint->id);
            $galleryAdd = $this->galleryRepository->create($galleryData);
            $files->move(config('path.upload_images_path'), $plusName . $files->getClientOriginalName());
        }
        event(new CreateBluePrintDone($addBlueprint));
        return redirect()->route('getCreateDone', [$addBlueprint->id]);
    }

    public function createRequestBlueprint($request)
    {

        $requestBlueprint = RequestBlueprint::create([
            'title' => $request->request_blueprint_title,
            'users_id' => Auth::user()->id,
            'description' => $request->customer_description
        ]);

        return $this->flashResponse->success(
            'getRequestFishTanksBlueprint',
            __('Request blueprint successfull !')
        );
    }

    public function getBlueprintInfo($blueprintId)
    {
        return $this->model::find($blueprintId);
    }

    public function findBlueprintTopic($blueprintId)
    {
        return $this->model::find($blueprintId);
    }

    public function getBlueprintProduct($blueprintId)
    {
        return $this->model::find($blueprintId)->product;
    }

    public function getBlueprintImage($blueprintId)
    {
        return $this->model::find($blueprintId)->gallery;
    }

    public function updateBlueprint($request, $blueprintId)
    {
        $blueprintUpdate = $this->model::find($blueprintId);
        $blueprintUpdate->title = $request->blueprint_name;
        $blueprintUpdate->description = $request->blueprint_desc;
        $blueprintUpdate->topics_id = $request->topic_id;
        $blueprintUpdate->publish_flg = 1;
        $blueprintUpdate->save();

        if ($request->blueprint_product) {
            foreach ($request->blueprint_product as $id => $quatity) {
                $blueprintDetailData = [];
                $blueprintDetailData = array_add($blueprintDetailData, 'products_id', $id);
                $blueprintDetailData = array_add($blueprintDetailData, 'quantity', $quatity);
                $blueprintDetailData = array_add($blueprintDetailData, 'blueprints_id', $blueprintId);
                $this->blueprintDetailRepository->create($blueprintDetailData);
            }
        }

        if (!$request->hasFile('img')) {
            return $this->flashResponse->success(
                'getCreateBlueprint',
                __('Create blueprint successfull !')
            );
        }

        foreach ($request->file('img') as $files) {
            $galleryData = [];
            $galleryData = array_add($galleryData, 'image_name', $files->getClientOriginalName());
            $galleryData = array_add($galleryData, 'blueprints_id', $blueprintId);
            $galleryAdd = $this->galleryRepository->create($galleryData);
            $files->move(config('path.upload_images_path'), $files->getClientOriginalName());
        }
    }

    public function getNewestBueprint()
    {
        $topSixNewest = $this->model::orderBy('id', 'desc')->skip(0)->take(6)->get();
        return $topSixNewest;
    }

    public function countSummary()
    {
        return $this->model::count();
    }

    public function listAllBlueprint()
    {
        return $this->model::with('user')->paginate(16);
    }

    public function listWeekBlueprint()
    {
        $month = Carbon::now()->month;
        return $this->model::whereMonth('created_at', $month)->with('user')->paginate(16);
    }

    public function allUserBlueprint()
    {
        return $this->model::where('users_id', Auth::user()->id)->with('user')->paginate(16);
    }

    public function findById($id)
    {
        return $this->model::find($id);
    }

    public function getRelative($topicId)
    {
        return $this->model::where('topics_id', $topicId)->take(4)->get();
    }

    public function getPendingBlueprints()
    {
        return $this->model::with(['user'])
            ->where('status', 2)
            ->orderBy('updated_at', 'desc')
            ->orderBy('created_at', 'desc')
            ->get();
    }

    public function getApprovedBlueprints()
    {
        return $this->model::with(['user'])
            ->where('status', 1)
            ->orderBy('updated_at', 'desc')
            ->orderBy('created_at', 'desc')
            ->get();
    }

    public function getNewBlueprints()
    {
        return $this->model::with(['user'])
            ->where('status', 0)
            ->orderBy('updated_at', 'desc')
            ->orderBy('created_at', 'desc')
            ->get();
    }

    public function findByIdWithRelation($blueprintId)
    {
        return $this->model::with(['details', 'suggests', 'gallery', 'user'])
            ->find($blueprintId);
    }
}
