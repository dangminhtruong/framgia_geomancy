<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RequireBlueprintRequest;
use App\Http\Requests\CreateBlueprintRequest;
use App\Entities\User;
use App\Entities\RequestBlueprint;
use App\Framgia\Response\FlashResponse;
use App\Framgia\Response\FormResponse;
use App\Repositories\Contracts\BlueprintRepositoryInterface as BlueprintRepository;
use App\Repositories\Contracts\TopicRepositoryInterface as TopicRepository;
use App\Repositories\Contracts\GalleryRepositoryInterface as GalleryRepository;
use Hash, Auth;

class BlueprintController extends Controller
{
    private $blueprintRepository;
    private $topicRepository;
    private $galleryRepository;

    public function __construct(
        FlashResponse $flashResponse,
        FormResponse $formResponse,
        BlueprintRepository $blueprintRepository,
        TopicRepository $topicRepository,
        GalleryRepository $galleryRepository
    )
    {
        $this->flashResponse = $flashResponse;
        $this->formResponse = $formResponse;
        $this->blueprintRepository = $blueprintRepository;
        $this->topicRepository = $topicRepository;
        $this->galleryRepository = $galleryRepository;
    }

    public function getRequestFishTanksBlueprint()
    {
        return view('blueprint.request_blueprint');
    }

    public function postRequestFishTanksBlueprint(RequireBlueprintRequest $request)
    {
        $user = User::create([
            'email' => $request->customer_email,
            'name' => $request->customer_name,
            'address' => $request->customer_address,
            'phone' => $request->customer_phone,
            'role' => 0,
            'password' => Hash::make($request->customer_password),
            'remember_token' => $request->_token
        ]);

        $requestBlueprint = RequestBlueprint::create([
            'users_id' => $user->id,
            'description' => $request->customer_description
        ]);

        return $this->flashResponse->success('getRequestFishTanksBlueprint',
            __('Request blueprint successfull !'));
    }

    public function getCreateBlueprint()
    {
        $topics = $this->topicRepository->getAllTopics();
        return view('blueprint.create_blueprint', compact('topics'));
    }

    public function postCreateBlueprint(CreateBlueprintRequest $request)
    {
        $blueprintData = [];
        $blueprintData = array_add($blueprintData, 'title', $request->blueprint_name);
        $blueprintData = array_add($blueprintData, 'description', $request->blueprint_desc);
        $blueprintData = array_add($blueprintData, 'topics_id', $request->topic_id);
        $blueprintData = array_add($blueprintData, 'publish_flg', 1);
        $blueprintData = array_add($blueprintData, 'users_id', Auth::user()->id);
        $addBlueprint = $this->blueprintRepository->create($blueprintData);

        if ($request->hasFile('img')) {
            foreach ($request->file('img') as $files) {
                if (isset($files)) {
                    $galleryData = [];
                    $galleryData = array_add($galleryData, 'image_name', $files->getClientOriginalName());
                    $galleryData = array_add($galleryData, 'blueprints_id', $addBlueprint->id);
                    $galleryAdd = $this->galleryRepository->create($galleryData);
                    $files->move('images/gallery/', $files->getClientOriginalName());
                }
            }
        }

        return $this->flashResponse->success('getCreateBlueprint',
            __('Create blueprint successfull !'));
    }
}
