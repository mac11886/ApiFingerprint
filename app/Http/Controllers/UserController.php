<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Company;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use PhpParser\JsonDecoder;

class UserController extends Controller
{


    //save user  
    function saveUser(Request $request)
    {
        $user = new User();
        $user->name = $request->input('name');
        $user->company_id = $request->input('company_id');
        $user->fingerprint_id = $request->input('fingerprint_id');
        $user->department_id = $request->input('department_id');
        $user->job_id = $request->input('job_id');
        $user->image_path = $request->input('image_path');
        try{
            $user->save();
            return response()->json("success", 200);
        }catch(Exception $e){
            return response()->json("unsuccess",400);
        }
        
        

    }

    //login Admin

    function login(Request $request)
    {
        $admin = Admin::where('username',$request->username)->first();

        if($request->input('password') == $admin->password){
            return response()->json("login success",200);
        }
        return response()->json("login failed",400);
    }
    
    // signup Admin
    function signup(Request $request)
    {
        $company = new Company();
        $company ->name = $request->input('company_name');
        $company->save();
        $admin = new Admin();
        $admin->company_id = $company->id ;
        $admin->name = $request->input('name');
        $admin->username = $request->input('username');
        $admin->password = $request->input('password');
        $admin->save();
        return response()->json("success signup", 200);
    }
}
