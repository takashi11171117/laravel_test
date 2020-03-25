<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HogeController extends Controller
{
    public function example(Request $request)
    {
        $user = $request->user();
        dd($user);
    }
}
