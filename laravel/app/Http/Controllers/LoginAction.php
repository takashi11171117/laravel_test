<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Firebase\Auth\Token\Exception\InvalidToken;
use Illuminate\Http\JsonResponse;
use Kreait\Firebase;

class LoginAction extends Controller
{
    public function __construct(Firebase $firebase)
    {
        $this->firebase = $firebase;
    }

    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request): JsonResponse
    {
        $id_token = $request->input('idToken');

        try {
            $verifiedIdToken = $this->firebase->getAuth()
                                ->verifyIdToken($id_token);
        } catch (InvalidToken $e) {
            return response()->json([
                'error' => 'error!!',
            ]);
        }

        $uid = $verifiedIdToken->getClaim('sub');
        $firebase_user = $this->firebase->getAuth()->getUser($uid);

        $user = \App\User::firstOrCreate(
            ['firebase_uid' => $uid],
            ['name' => $firebase_user->displayName]
        );

        $token = $user->createToken('example_token')->accessToken;

        return response()->json([
            'uid' => $uid,
            'name' => $firebase_user->displayName,
            'token' => $token,
        ]);
    }
}
