<?php

namespace App\Http\Controllers\Api\V1;

use App\UserAction;
use App\Http\Resources\UserAction as UserActionResource;
use App\Http\Controllers\Controller;

class UserActionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new UserActionResource(UserAction::with(['user'])->get());
    }


}
