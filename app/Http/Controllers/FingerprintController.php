<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Fingerprint;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class FingerprintController extends Controller
{
    function saveAttendance(Request $request){
        $attendance = new Attendance();

        $attendance->user_id = $request->input('user_id');
        $attendance->company_id = $request->input('company_id');
        $attendance->status = $request->input('status');
        $attendance->late = $request->input('late');
        $attendance->timestamp =Carbon::now();
        $attendance->save();
        return response()->json("save attendance ", 200);
    }

    
    function editProfile (Request $request){

        $profile = User::where('id',$request->id)->first();
        $profile ->update(['name' => $request -> input('user_name')]);
        $profile ->update(['image_path'=> $request -> input('image_path')]);
        $fingerprint = Fingerprint::where('id',$profile->fingerprint_id)->first();
        $fingerprint->first_fingerprint = $request->input('first_fingerprint');
        $fingerprint->second_fingerprint = $request->input('second_fingerprint');
        $fingerprint->save();
        return response()->json("edit profile success",200);
        
    }

    function saveProfile(Request $request){


        $fingerprint = new Fingerprint();
        $fingerprint->first_fingerprint = $request->input('first_fingerprint');
        $fingerprint->second_fingerprint = $request->input('second_fingerprint');
        $fingerprint->save();

        $profile = new User();
        $profile->name = $request->input('user_name');
        $profile->fingerprint_id = $fingerprint->id;
        $profile->company_id = $request ->input("company_id");
        $profile->department_id = $request->input("department_id");
        $profile->job_id = $request->input("job_id");
        $profile->image_path = $request->input("image_path");
        $profile->save();

        return response()->json("save profile success",200);

    }

}
