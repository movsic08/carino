<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\ScheduleMail;
use App\Models\Schedule;

class StaffScheduleController extends Controller
{
    
    public function StaffScheduleRequest(){
        $usermsg = Schedule::all();
        return view('staff.schedule.schedule-request', compact('usermsg'));
    }
    
    public function StaffDetailsSchedule($id){
        $schedule = Schedule::findOrFail($id);
        return view('staff.schedule.schedule-details', compact('schedule'));
    } // End Method

    public function StaffUpdateSchedule(Request $request){

        $sid = $request->id;

        Schedule::findOrFail($sid)->update([
            'status' => '1',

        ]);

        //// Start Send Email 

       $sendmail = Schedule::findOrFail($sid);

       $data = [
            'visit_date' => $sendmail->visit_date,
            'visit_time' => $sendmail->visit_time,
       ];

       Mail::to($request->email)->send(new ScheduleMail($data));


        /// End Send Email 

         $notification = array(
            'message' => 'You have Confirm Schedule Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('staff.schedule.request')->with($notification);


    } // End Method 
    
    
}
