<?php

namespace App\Repositories\Eloquents;

use App\Repositories\Contracts\SuggestProductRepositoryInterface;
use App\Entities\SuggestProduct;
use Auth;

class SuggestProductRepository extends AbstractRepository implements SuggestProductRepositoryInterface
{
    protected $model;

    function __construct()
    {
        $this->model = $this->model();
    }

    public function model()
    {
        return SuggestProduct::class;
    }

    public function create($data)
    {
        $result = $this->model::create($data);
        return $result;
    }

    public function findById($id)
    {
        $this->model::where('id', $id)->get();
    }

    public function transToJson($data)
    {
        $tojson = [];
        foreach (array_chunk($data, 2) as $key => $value) {
            $tojson[$value[0]] = $value[1];
        }
        return json_encode($tojson);
    }

    public function updateAfterCreate($blueprintId)
    {
        $this->model::where('blueprints_id', Auth::user()->id)->update(['blueprints_id' => $blueprintId]);
    }

    public function checkNameIfExist($suggestName)
    {
        $name = $this->model::where('name', $suggestName)->count();
        return $name;
    }

    public function removeSuggest($id)
    {
        return $this->model::destroy($id);
    }
}
