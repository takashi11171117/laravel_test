<?php

namespace App\Http\Controllers\Auth\User;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use Illuminate\Http\Request;

class MeController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:api']);
    }

    public function action(Request $request)
    {
        return new UserResource($request->user());
    }
}
