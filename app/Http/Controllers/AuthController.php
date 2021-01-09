<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    protected function generateAccessToken($user){
        $token = $user->createToken($user->email.'-'.now());
        return $token->accesstoken;
    }
    public function registerUs(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:4'
        ]);


        $user = User::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);

        return response()->json($user);
    }

    public function login(Request $request)
{
    $request->validate([
        'username' => 'required|exists:users,',
        'password' => 'required'
    ]);

    if( Auth::attempt(['username'=>$request->username, 'password'=>$request->password]) ) {
        $user = Auth::user();

        //$token = $user->createToken($user->email.'-'.now());

        return response()->json([
            //'token' => $token->accessToken
        ]);
    }
}
}
