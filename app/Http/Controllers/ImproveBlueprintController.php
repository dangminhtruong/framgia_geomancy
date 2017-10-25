<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Repositories\Contracts\ImproveBlueprintRepositoryInterface as ImproveBlueprintRepository;
class ImproveBlueprintController extends Controller
{
    private $improveBlueprintRepository;
    public function __construct(ImproveBlueprintRepository $improveBlueprintRepository)
    {
        $this->improveBlueprintRepository = $improveBlueprintRepository;
    }
    public function forkBLueprint($id)
    {
        return $this->improveBlueprintRepository->fork($id);
    }
}