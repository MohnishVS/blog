<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Passport\Token;
use Laravel\Passport\TokenRepository;
use Laravel\Passport\RefreshTokenRepository;

class AuthController extends Controller
{
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
            'password' => bcrypt($request->password)
        ]);

        if($user!=''){
            $token = $user->createToken($user->username.'-'.now())->accessToken;
            return response()->json([
                'token' => $token]);
            //return redirect('login');
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
             $user = Auth::user();

            $token = $user->createToken($user->username.'-'.now());
            return response()->json([
                'token' => $token->accessToken]);
            //return redirect('home');
        }
        else{
            return response()->json(['Message' => 'The provided credentials do not match our records.',
            ]);
        }
    }

    public function logoutus($Userid)
    {


        // $tokenRepository = app(TokenRepository::class);
        //$refreshTokenRepository = app(RefreshTokenRepository::class);

        // Revoke an access token...
        // if($tokenRepository->revokeAccessToken($Userid)){
        //     return response()->json(['user token'=> 'token revoked','token'=>$tokenRepository]);
        // }
        // return response()->json(['user token'=> 'onnum agala', 'token'=>$tokenRepository]);

        // Revoke all of the token's refresh tokens...
        //$refreshTokenRepository->revokeRefreshTokensByAccessTokenId($Userid);
    }

}
