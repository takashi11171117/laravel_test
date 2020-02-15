<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\UserResource;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class UserController extends Controller
{
    public function show(int $id)
    {
        $user = User::find($id);

        if (!isset($user)) {
            throw new NotFoundHttpException();
        }

        return new UserResource($user);
    }
}
