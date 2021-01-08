<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class userauth extends Controller
{
    function userlogin(Request $req)
    {
        $data= $req->input();

        if($user = DB::table('users')->where('username', $data['username'])->first()){
            $dbuser = $user->username;
            $dbpass = $user->password;
            if($dbuser == $data['username']){
                if($dbpass == $data['password']){
                    $req->session()->put('user',$data['username']);
                    return redirect('home');
                }
                else{
                    echo 'wrong password';
                }
            }
            else{
                echo 'wrong username';
            }
        }
        else{
            echo "wrong username";
        }
    }
}
