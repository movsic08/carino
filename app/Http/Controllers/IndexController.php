<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Schedule; 

class IndexController extends Controller
{
    public function StaffDetails($id){

        $staff = User::findOrFail($id);

        return view('frontend.staff.staff-details',compact('staff'));

    } // End Method 










    public function Schedule()
    {
        return view('frontend.schedule.add-schedule');
    } // End Method

    public function StoreSchedule(Request $request){

        if (Auth::check()) {

            Schedule::insert([

                'user_id' => Auth::user()->id,
                'visit_date' => $request->visit_date,
                'visit_time' => $request->visit_time,
                'message' => $request->message,
                'created_at' => Carbon::now(), 
            ]);

             $notification = array(
            'message' => 'Send Request Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);


        }else{

           $notification = array(
            'message' => 'Plz Login Your Account First',
            'alert-type' => 'error'
        );

        return redirect()->back()->with($notification);

        }
    }

    
    
}
