<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Attendance;
use App\Models\Branch;
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

            // หน้า main
            $dataUser = User::with("branch","fingerprint")->where("company_id",$company)->get();

            // หน้า manage branch
            $dataAdmin = Admin::with("company", "branch")->where("company_id",$company)->get();

            return response()->json(["dataUser"=>$dataUser,"dataAdmin"=>$dataAdmin]);
        
        }
        return response()->json("company is null ",400);
    }

    function getDataUser($branch){
        if ($branch != null){
            $dataUser = User::with("branch","fingerprint")->where("branch_id",$branch)->get();
            return response()->json($dataUser);
        }
        return response()->json("not found branch ID", 400);
    }
}

