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

}
}
