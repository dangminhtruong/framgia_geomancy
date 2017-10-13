<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RequireBlueprintRequest;
use App\Http\Requests\CreateBlueprintRequest;
use App\Repositories\Contracts\UserRepositoryInterface as UserRepository;
use App\Repositories\Contracts\BlueprintRepositoryInterface as BlueprintRepository;
use App\Repositories\Contracts\TopicRepositoryInterface as TopicRepository;
use App\Repositories\Contracts\GalleryRepositoryInterface as GalleryRepository;
use App\Repositories\Contracts\CategoryRepositoryInterface as CategoryRepository;
use Hash, Auth;

class BlueprintController extends Controller
{
    private $blueprintRepository;
    private $topicRepository;
    private $galleryRepository;
    private $userRepository;
    private $categoryRepository;

    public function __construct(
        BlueprintRepository $blueprintRepository,
        TopicRepository $topicRepository,
        GalleryRepository $galleryRepository,
        UserRepository $userRepository,
        CategoryRepository $categoryRepository
    )
    {
        $this->blueprintRepository = $blueprintRepository;
        $this->topicRepository = $topicRepository;
        $this->galleryRepository = $galleryRepository;
        $this->userRepository = $userRepository;
        $this->categoryRepository = $categoryRepository;
    }

    public function getRequestFishTanksBlueprint()
    {
        return view('blueprint.request_blueprint');
    }

    public function postRequestFishTanksBlueprint(RequireBlueprintRequest $request)
    {
        return $this->blueprintRepository->createRequestBlueprint($request);
    }

    public function getCreateBlueprint()
    {
        $topics = $this->topicRepository->getAllTopics();
        $categories = $this->categoryRepository->getAllCategory();
        return view('blueprint.create_blueprint', compact('topics', 'categories'));
    }

    public function postCreateBlueprint(CreateBlueprintRequest $request)
    {
        return $this->blueprintRepository->createBlueprint($request);
    }
}
