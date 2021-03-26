<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\FingerprintController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/saveUser', [UserController::class,'saveUser']);

Route::post('/signup',[UserController::class,'signup']);

Route::post('/login', [UserController::class,'login']);

Route::post('/attendance',[FingerprintController::class,'saveAttendance']);

Route::get("/getAllData", [Controller::class, "getAllData"]);