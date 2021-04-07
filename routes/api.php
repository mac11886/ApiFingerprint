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

//get all data 
Route::get("/getAllData/{company}", [Controller::class, "getAllData"]);

Route::post('/saveUser', [UserController::class,'saveUser']);
Route::post('/signup',[UserController::class,'signup']);
Route::post('/login', [UserController::class,'login']);
Route::post("/saveCompany",[UserController::class,"saveCompany"]);
Route::post("/editCompany",[UserController::class,"editCompany"]);
Route::post("/saveBranch", [UserController::class, "saveBranch"]);
Route::post("/editBranch", [UserController::class, "editBranch"]);
// Route::post("/saveDepartment",[UserController::class,"saveDepartment"]);
// Route::post("/editDepartment",[UserController::class,"editDepartment"]);
// Route::post("/saveJob",[UserController::class,"saveJob"]);
// Route::post('/editJob',[UserController::class,"editJob"]);




Route::post('/attendance',[FingerprintController::class,'saveAttendance']);
Route::post('/saveProfile',[FingerprintController::class,"saveProfile"]);
Route::post('/editProfile',[FingerprintController::class,"editProfile"]);

