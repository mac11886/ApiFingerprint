<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use Illuminate\Http\Request;

class FingerprintController extends Controller
{
    function saveAttendance(Request $request){
        $attendance = new Attendance();

        $attendance->user_id = $request->input('user_id');
        $attendance->company_id = $request->input('company_id');
        $attendance->status = $request->input('status');
        $attendance->late = $request->input('late');
        $attendance->timestamp = $request->input('timestamp');
        $attendance->save();
        return response()->json("save attendance ", 200);
    }

    
}
