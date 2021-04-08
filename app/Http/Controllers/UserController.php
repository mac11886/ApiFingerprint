<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Branch;
use App\Models\Company;
use App\Models\Department;
use App\Models\Job;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use PhpParser\JsonDecoder;

use function PHPUnit\Framework\returnSelf;

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
        try {
            $user->save();
            return response()->json("success", 200);
        } catch (Exception $e) {
            return response()->json("unsuccess", 400);
        }
    }

    //login Admin

    function login(Request $request)
    {
        $admin = Admin::with("branch")->where('username', $request->username)->first();

        if ($request->input('password') == $admin->password) {
            return response()->json($admin, 200);
        }
        return response()->json("login failed", 400);
    }

    // signup Admin
    function signup(Request $request)
    {
        $company = new Company();
        $company->name = $request->input('company_name');
        $company->save();
        $admin = new Admin();
        $admin->company_id = $company->id;
        $admin->branch_id = 0;
        $admin->role = "super";
        $admin->name = $request->input('name');
        $admin->username = $request->input('username');
        $admin->password = $request->input('password');
        $admin->save();
        return response()->json("success signup", 200);
    }


    // Company

    function saveCompany(Request $request)
    {
        $company = new Company();
        $company->name = $request->input('company_name');
        $company->save();
        return response()->json("save company success ", 200);
    }


    function editCompany(Request $request)
    {
        $company = Company::where('id', $request->id)->first();
        $company->update(["name" => $request->input('company_name')]);
        return response()->json("edit company success", 200);
    }

    // branch

    function saveBranch(Request $request)
    {
        $branch = new Branch();
        $branch->company_id = $request->input("company_id");
        $branch->name = $request->input("branch_name");
        $branch->save();

        $admin = new Admin();
        $admin->company_id = $request->input("company_id");
        $admin->branch_id = $branch->id;
        $admin->role = "-";
        $admin->name = $request->input("name");
        $admin->username = $request->input("username");
        $admin->password = $request->input("password");
        $admin->save();

        // หน้า manage branch
        // return response()->json(["dataUser" => $dataUser, "dataAdmin" => $dataAdmin], 200);
        return response()->json("success", 200);
    }

    function editBranch(Request $request)
    {
        $branchName = $request->input("branch_name");
        $name = $request->input("name");
        $password = $request->input("password");
        $branch_id = $request->input("branch_id");
        $admin_id = $request->input("admin_id");

        $isChange = false;

        $branch = Branch::where("id", $branch_id)->first();
        $admin = Admin::where("id", $admin_id)->first();

        if ($branchName != null) {
            $branch->name = $branchName;
            $branch->save();
        }
        if ($name != null) {
            $admin->name = $name;
            $isChange = true;
        }
        if ($password != null) {
            $admin->password = $password;
            $isChange = true;
        }
        if ($isChange) {
            $admin->save();
        }
        return response()->json("success", 200);
    }

    function setLateTime(Request $request){
        $company = Company::where("id", $request->input("company_id"))->first();
        $company->late_time = $request->input("time");
        $company->save();

        return response()->json("success", 200);
    }

    //Department

    // function saveDepartment(Request $request){
    //     $department = new Department();
    //     $department ->company_id = $request ->input("company_id");
    //     $department -> name = $request -> input('department_name');
    //     $department->save();
    //     return response()->json("save department success",200);
    // }

    // function editDepartment(Request $request){
    //     $department = Department::where('id',$request->id)->first();
    //     $department -> update(["name"=> $request -> input('department_name')]);
    //     return response()->json("edit department success",200);
    // }

    // Job

    // function saveJob(Request $request){
    //     $job = new Job();
    //     $job ->department_id = $request ->input('department_id');
    //     $job -> name = $request ->input('job_name');
    //     $job ->save();
    //     return response()->json("save job success",200);
    // }

    // function editJob(Request $request){
    //     $job = Job::where('id',$request->id)->first();
    //     $job ->update(["name"=> $request -> input('job_name')]);
    //     return response()->json("edit job success",200);
    // }

}
