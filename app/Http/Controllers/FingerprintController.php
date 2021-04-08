<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Company;
use App\Models\Fingerprint;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class FingerprintController extends Controller
{
    function saveAttendance(Request $request)
    {
        $attendance = new Attendance();
        $attendance->user_id = $request->input('user_id');
        $attendance->company_id = $request->input('company_id');
        $attendance->branch_id = $request->input('branch_id');
        $attendance->timestamp = Carbon::now()->addHour(7);
        
        $attendance->status = $request->input('status');
        if (  $attendance->status == "in") {
            $time = Carbon::now()->addHour(7)->format('H:i');
            $lateCompany = Company::where('id', $attendance->company_id)->first();
            //Carbon::createFromFormat('H:i', '9:00')->format('H:i')
            if ($time > $lateCompany->late_time) {
                $attendance->late = "late";
            } else {
                $attendance->late = "-";
            }

            $attendance->save();
            return response()->json("save attendance checkIn" . "$time", 200);
        } else {
            $attendance->late = "-";
            $attendance->save();
            return response()->json("save attendance checkOut", 200);
        }
        
    }


    function editProfile(Request $request)
    {

        $profile = User::where('id', $request->id)->first();
        $profile->update(['name' => $request->input('user_name')]);
        $fingerprint = Fingerprint::where('id', $profile->fingerprint_id)->first();
        $fingerprint->first_fingerprint = $request->input('first_fingerprint');
        $fingerprint->second_fingerprint = $request->input('second_fingerprint');
        $fingerprint->save();
        return response()->json("edit profile success", 200);
    }

    function saveProfile(Request $request)
    {


        $fingerprint = new Fingerprint();
        $fingerprint->first_fingerprint = $request->input('first_fingerprint');
        $fingerprint->second_fingerprint = $request->input('second_fingerprint');
        $fingerprint->save();

        $profile = new User();
        $profile->name = $request->input('user_name');
        $profile->fingerprint_id = $fingerprint->id;
        $profile->company_id = $request->input("company_id");
        $profile->branch_id = $request->input("branch_id");

        $profile->save();


        return response()->json("save profile success", 200);
    }
}
