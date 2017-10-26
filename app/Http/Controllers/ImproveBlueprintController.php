<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Contracts\ImproveBlueprintRepositoryInterface as ImproveBlueprintRepository;
use App\Repositories\Contracts\TopicRepositoryInterface as TopicRepository;
use App\Repositories\Contracts\CategoryRepositoryInterface as CategoryRepository;
use App\Http\Requests\CreateBlueprintRequest;

class ImproveBlueprintController extends Controller
{

    private $improveBlueprintRepository;
    private $topicRepository;
    private $categoryRepository;

    public function __construct(
        ImproveBlueprintRepository $improveBlueprintRepository,
        TopicRepository $topicRepository,
        CategoryRepository $categoryRepository
    )
    {
        $this->improveBlueprintRepository = $improveBlueprintRepository;
        $this->topicRepository = $topicRepository;
        $this->categoryRepository = $categoryRepository;
    }

    public function forkBLueprint($id)
    {
        return $this->improveBlueprintRepository->fork($id);
    }

    public function viewForkedBlueprint($id)
    {
        $forkBlueprintInfo = $this->improveBlueprintRepository->forkBlueprintInfo($id);
        return view('blueprint.view_forked_blueprint', compact('forkBlueprintInfo'));
    }

    public function viewEditForkedBlueprint($id)
    {
        $forkBlueprintInfo = $this->improveBlueprintRepository->forkBlueprintInfo($id);
        $topics = $this->topicRepository->getAllTopics();
        $categories = $this->categoryRepository->getAllCategory();
        return view('blueprint.edit_forked_blueprint', compact('forkBlueprintInfo', 'topics', 'categories'));
    }

    public function postEditForkedBlueprint(Request $request, $id)
    {
        return $this->improveBlueprintRepository->editForkedBlueprint($request, $id);
    }

}
