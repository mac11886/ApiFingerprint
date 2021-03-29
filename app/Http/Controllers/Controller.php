<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Attendance;
use App\Models\Company;
use App\Models\Department;
use App\Models\Fingerprint;
use App\Models\Job;
use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    // $company is parameter like => www.goole.com/kisra 
    function getAllData($company){

        //with("company") company is function in Model 
        if($company != null){
            $dataAdmin = Admin::with("company")->where("company_id",$company)->get();
            $dataAttendance = Attendance::with("user","company")->where("company_id",$company)->get();
            $dataCompanny = Company::where("id",$company)->get();
            $dataDepartment = Department::with("company")->where("company_id",$company)->get();
            $dataFingerprint = Fingerprint::with("user")->get();
            $dataJob = Job::with("department")->get();
            $dataUser = User::with("company","fingerprint","department","job")->where("company_id",$company)->get();
            return response()->json(["dataAttendance"=>$dataAttendance,"dataDepartment"=>$dataDepartment,"dataJob"=>$dataJob,"dataUser"=>$dataUser]);
        
        }
        return response()->json("company is null ",200);
    }
}

