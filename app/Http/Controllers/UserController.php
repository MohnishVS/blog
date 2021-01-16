<?php

namespace App\Http\Controllers;

use App\Models\User;

class UserController extends Controller
{
    public function show($userid)
    {
        $user = User::find($userid);

        if($user) {
            return response()->json($user->colour);
        }

        return response()->json(['message' => 'User not found!'], 200);
        // return response()->json(['user' => User::user()], 200);
    }
}
