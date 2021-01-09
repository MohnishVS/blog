<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class reguser extends Controller
{
    function registeruser(Request $req)
    {
        $data= $req->input();
        if($user = DB::table('users')->where('username', $data['username'])->first()){
            $response = ["message" => "user already exists"];
            return response($response, 422);
        }
        else{
            DB::table('users')->insertGetId([
                'username'=> $data['username'],
                'email' => $data['email'],
                'password' => $data['password'],
                "created_at" =>  \Carbon\Carbon::now(),
                "updated_at" => \Carbon\Carbon::now(),
            ]);
            return redirect('login');
        }

    }
}
