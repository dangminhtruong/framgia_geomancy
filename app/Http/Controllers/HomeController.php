<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Contracts\BlueprintRepositoryInterface as BlueprintRepository;
use App\Repositories\Contracts\ProductRepositoryInterface as ProductRepository;


class HomeController extends Controller
{
    private $blueprintRepository;
    private $productRepository;

    public function __construct(
        BlueprintRepository $blueprintRepository,
        ProductRepository $productRepository
    )
    {
        $this->productRepository = $productRepository;
        $this->blueprintRepository = $blueprintRepository;
    }

    public function index()
    {
        $topTopics = $this->blueprintRepository->getTopTopic();
        return view('welcome', compact('topTopics', 'topTopicImage'));
    }
}
