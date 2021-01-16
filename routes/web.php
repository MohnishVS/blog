<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\userauth;
use App\Http\Controllers\reguser;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::post('/', function () {
   return view('login');
});

Route::view("about", 'about.about');

//Route::post("user", [userauth::class,'userlogin']);

Route::get('/login', function () {
    return view('login');
 });

 Route::view('/home', 'home.index');

Route::post('/logout', function () {
    return redirect('login');
 });

Route::get('/register', function () {
    return view('register');
 });

 Auth::routes();
//Route::post("reguser", [reguser::class,'registeruser']);
