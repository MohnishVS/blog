<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/registerus', [AuthController::class,'registerus']);

Route::post('/loginus', [AuthController::class,'loginus']);

Route::middleware('auth:api')->group(function () {
    // our routes to be protected will go in here
    Route::get('user/{user_id}', [UserController::class,'show']);
    Route::get('/logoutus', [AuthController::class,'logoutus']);
});

//Route::get('/logoutus', [AuthController::class,'logoutus']);

//Route::get('user/{user_id}/details', [UserController::class,'show']);
