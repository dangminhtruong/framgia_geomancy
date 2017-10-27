<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Contracts\SuggestProductRepositoryInterface as SuggestProductRepository;
use Auth;

class SuggestProductController extends Controller
{
    private $suggestProductRepository;

    public function __construct(SuggestProductRepository $suggestProductRepository)
    {
        $this->suggestProductRepository = $suggestProductRepository;
    }

    public function suggetProduct(Request $request)
    {
        $data = [
            'name' => $request->name,
            'price' => $request->price,
            'attribute' => ($request->attri) ? $this->suggestProductRepository->transToJson($request->attri) : null,
            'description' => $request->descript,
            'blueprints_id' => Auth::user()->id,
            'categories_id' => $request->categoryId
        ];
        $suggestProduct = $this->suggestProductRepository->create($data);
        return view('blueprint.sub_pages.blueprint_suggest_respon', compact('suggestProduct'));
    }
}
