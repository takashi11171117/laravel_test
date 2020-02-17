<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\User;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function action(LoginRequest $request) {
        $credentials = $request->only('email', 'password');

        if (!$token = auth("api")->attempt($credentials)) {
            return response()->json([
                'errors' => [
                    'email' => ['メールアドレスかパスワードが一致しません']
                ]
            ], 422);
        }

        return $this->respondWithToken($token, $credentials);
    }

    protected function respondWithToken($token)
    {
        return response()->json([
            'token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth("api")->factory()->getTTL() * 60,
        ]);
    }
}
