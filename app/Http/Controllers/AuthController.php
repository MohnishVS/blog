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
    public function registerus(Request $request)
    {

        $request->validate([
            'username' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:4'
        ]);

        $user = User::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => $request->password
        ]);

        if($user!=''){
            $token = $user->createToken('LaravelAuthApp')->accessToken;
            return redirect('login');
        }
    }

    public function loginus(Request $request)
{
    $request->validate([
        'username' => 'required|exists:users,username',
        'password' => 'required'
    ]);


    if (Auth::attempt(['username' => $request->username, 'password' => $request->password])) {
        $Auth_user = Auth::user();
        $user = User::find($Auth_user->username.'-'.now());
        $tokenuser= $user->createToken('LaravelAuthApp')->accessToken;
        return redirect('home');
    }
    else{
        return response()->json([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    // if (Auth::attempt(['username'=>$request->username, 'password'=>$request->password])) {
    //     $user = Auth::user();
    //     $token = $user->createToken($user->username.'-'.now())->accessToken;
    //     return response()->json(['token' => $token], 200);
    // } else {
    //     return response()->json(['error' => 'Unauthorised'], 401);
    // }
}
}
