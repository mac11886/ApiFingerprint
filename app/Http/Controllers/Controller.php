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



    function getAllData(){
        //with("company") company is function in Model 
        
        $dataAdmin = Admin::with("company")->get();
        $dataAttendance = Attendance::with("user","company")->get();
        $dataCompanny = Company::get();
        $dataDepartment = Department::with("company")->get();
        $dataFingerprint = Fingerprint::with("user")->get();
        $dataJob = Job::with("department")->get();
        $dataUser = User::with("company")->get();
        return response()->json(["dataAdmin"=>$dataAdmin,"dataAttendance"=>$dataAttendance,"dataCompany"=>$dataCompanny,"dataDepartment"=>$dataDepartment,"dataFingerprint"=>$dataFingerprint,"dataJob"=>$dataJob,"dataUser"=>$dataUser]);
    }
}


// return response()->json(["dataAdmin"=>$dataAdmin,"dataAttendance"=>$dataAttendance,"dataCompany"=>$dataCompanny,"dataDepartment"=>$dataDepartment,"dataFingerprint"=>$dataFingerprint,"dataJob"=>$dataJob,"dataUser"=>$dataUser]);
