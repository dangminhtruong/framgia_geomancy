<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Contracts\RequestBlueprintRepositoryInterface as RequestBlueprintRepository;

class RequestBlueprintController extends Controller
{
    private $requestBlueprintRepository;

    function __construct(
        RequestBlueprintRepository $requestBlueprintRepository
    )
    {
        $this->requestBlueprintRepository = $requestBlueprintRepository;
    }

    public function viewRequestMessage($id)
    {
        $requestBlueprint = $this->requestBlueprintRepository->findById($id);

        return view('user.view _request_message', compact('requestBlueprint'));
    }

    public function sendRequestMessage(Request $request)
    {
        $this->requestBlueprintRepository->sendNewMessage($request->message, $request->requestId);
        $requestBlueprint = $this->requestBlueprintRepository->findById($request->requestId);

        return view('blueprint.sub_pages.respon_message', compact('requestBlueprint'))->render();
    }
}
