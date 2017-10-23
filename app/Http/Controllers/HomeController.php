<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Contracts\BlueprintRepositoryInterface as BlueprintRepository;
use App\Repositories\Contracts\ProductRepositoryInterface as ProductRepository;
use App\Repositories\Contracts\RequestBlueprintRepositoryInterface as RequestBlueprintRepository;
use App\Repositories\Contracts\TopicRepositoryInterface as TopicRepository;
use App\Repositories\Contracts\PostRepositoryInterface as PostRepository;

class HomeController extends Controller
{
    private $blueprintRepository;
    private $requestBlueprintRepository;
    private $productRepository;
    private $topicRepositoryInterface;
    private $postRepository;

    public function __construct(
        BlueprintRepository $blueprintRepository,
        ProductRepository $productRepository,
        TopicRepository $topicRepositoryInterface,
        RequestBlueprintRepository $requestBlueprintRepository,
        PostRepository $postRepository
    )
    {
        $this->productRepository = $productRepository;
        $this->blueprintRepository = $blueprintRepository;
        $this->topicRepositoryInterface = $topicRepositoryInterface;
        $this->requestBlueprintRepository = $requestBlueprintRepository;
        $this->postRepository = $postRepository;
    }

    public function index()
    {
        $sixNewestBlueprint = $this->blueprintRepository->getNewestBueprint();
        $sixNewestProduct = $this->productRepository->getTopNewestProduct();
        $newestPost = $this->postRepository->getNewestPost();
        $productSummary = $this->productRepository->countSummary();
        $blueprintSummary = $this->blueprintRepository->countSummary();
        $topicSummary = $this->topicRepositoryInterface->countSummary();
        $requestSummary = $this->requestBlueprintRepository->countSummary();
        return view('welcome', compact(
            'sixNewestBlueprint',
            'sixNewestProduct',
            'productSummary',
            'blueprintSummary',
            'topicSummary',
            'requestSummary',
            'newestPost'
        ));
    }
}
