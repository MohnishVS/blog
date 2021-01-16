<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Str;
use Laravel\Passport\Token;
// use Laravel\Passport\TokenRepository;
// use Laravel\Passport\RefreshTokenRepository;

class AuthController extends Controller
{
    public function registerus(Request $request)
    {

        $request->validate([
            'username' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:4',
            'colour' => 'required'
        ]);

        $request['remember_token'] = Str::random(10);
        $user = User::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'colour' => $request->colour,
            'remember_token'=> $request['remember_token']
        ]);

        if($user!=''){
            $token = $user->createToken($user->username)->accessToken;

            //echo 'alert("Registered Successfully")';
            return response('registered successfully', 200)
                  ->header('Content-Type', 'text/plain');
        }
        else{
            return response()->json(['message'=>'not registered']);
        }
    }

    public function loginus(Request $request)
    {
        $username=$request->username;
        $password=$request->password;
        $user = User::where('username', $username)->first();
        if(!$user) return response()->json([
            'username' => 'Not found',]);
        if (Auth::attempt(array('username' => $username , 'password' => $password))) {
             $user = User::where('username', $request->username)->first();

            $token = $user->createToken($user->username);
            return response()->json([
                'token' => $token->accessToken]);
            //return redirect('home');
        }
        else{
            return response()->json(['Message' => 'The provided credentials do not match our records.',
            ]);
        }
    }

    public function logoutus(Request $request)
    {
        $token = $request->user()->token();
        $token->revoke();
        $response = ['message' => 'You have been successfully logged out!'];
        return response($response, 200);
    }

}
