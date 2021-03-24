<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use PhpParser\JsonDecoder;

class UserController extends Controller
{


    //sign up 
    function saveUser(Request $request){
        $user = new User();
        $user ->name = $request->input('name');
        $user ->company_id = $request->input('company_id');
        $user ->fingerprint_id = $request->input('fingerprint_id');
        $user ->department_id = $request->input('department_id');
        $user ->job_id = $request->input('job_id');
        $user ->image_path = $request->input('image_path');
        $user->save();
        return response()->json("succes 101 ",200);
    }
}
