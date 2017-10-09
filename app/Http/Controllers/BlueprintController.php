<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RequireBlueprintRequest;
use App\Entities\User;
use App\Entities\Topic;
use App\Entities\RequestBlueprint;
use App\Framgia\Response\FlashResponse;
use App\Framgia\Response\FormResponse;
use App\Repositories\Eloquents\BlueprintRepository;
use App\Repositories\Eloquents\TopicRepository;
use Hash;

class BlueprintController extends Controller
{
    private $blueprintRepository;
    private $topicRepository;
    public function __construct(FlashResponse $flashResponse, FormResponse $formResponse, 
        BlueprintRepository $blueprintRepository, TopicRepository $topicRepository)
    {
        $this->flashResponse = $flashResponse;
        $this->formResponse = $formResponse;
        $this->blueprintRepository = $blueprintRepository;
        $this->topicRepository = $topicRepository;
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

    public function getCreateBlueprint(){
        $topics = $this->topicRepository->getAllTopics();
        return view('blueprint.create_blueprint', compact('topics'));
    }

    public function postCreateBlueprint(){

    }
}
