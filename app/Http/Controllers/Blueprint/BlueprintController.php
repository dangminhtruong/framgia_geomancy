<?php

namespace App\Http\Controllers\Blueprint;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\RequireBlueprintRequest;
use App\Entities\User;
use App\Entities\RequestBlueprint;
use App\Framgia\Response\FlashResponse;
use App\Framgia\Response\FormResponse;
use Hash;

class BlueprintController extends Controller
{
    public function __construct(FlashResponse $flashResponse, FormResponse $formResponse)
    {
        $this->flashResponse = $flashResponse;
        $this->formResponse = $formResponse;
    }

    public function getRequestFishTanksBlueprint()
    {
        return view('layouts.request_blueprint');
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
}
