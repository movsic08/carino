<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use App\Providers\RouteServiceProvider;
use Carbon\Carbon;
use App\Models\Client;

class StaffController extends Controller
{

    public function StaffDashboard()
    {
        // Count the total number of clients
        $totalClients = Client::count();
        
        // Calculate the change from last week instead of last month
        $changeFromLastWeek = Client::where('created_at', '>', Carbon::now()->subWeek())->count();
    
        // Get weekly data from the database
        $weeklyData = [];
        $weeklyLabels = [];
    
        // Generate labels for the last five weeks
        for ($i = 4; $i >= 0; $i--) {
            $startDate = Carbon::now()->subWeeks($i)->startOfWeek();
            $endDate = Carbon::now()->subWeeks($i)->endOfWeek();
    
            // Count the clients added in the current week
            $weeklyClientsCount = (int) Client::whereBetween('created_at', [$startDate, $endDate])->count();
    
            // Ensure the count is a whole number
            $weeklyData[] = intval($weeklyClientsCount);
            $weeklyLabels[] = $startDate->format('M d') . ' - ' . $endDate->format('M d');

        }
    
        return view('staff.staff-dashboard', compact('totalClients', 'changeFromLastWeek', 'weeklyData', 'weeklyLabels'));
    }

    public function StaffLogin()
    {
        return view('staff.staff-login');
    }

    public function StaffRegister(Request $request){


        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
            'role' => 'staff',
            'status' => 'inactive',
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::STAFF);

    } // End Method

    public function StaffLogout(Request $request){
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

         $notification = array(
            'message' => 'Staff Logout Successfully',
            'alert-type' => 'success'
        ); 

        return redirect('/staff/login')->with($notification);
    } // End Method 

    public function StaffProfile(){

        $id = Auth::user()->id;
        $profileData = User::find($id);
        return view('staff.staff-profile-view',compact('profileData'));

     }// End Method 


    public function StaffProfileStore(Request $request){

        $id = Auth::user()->id;
        $data = User::find($id);
        $data->username = $request->username;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->address = $request->address; 

        if ($request->file('photo')) {
            $file = $request->file('photo');
            @unlink(public_path('upload/staff_images/'.$data->photo));
            $filename = date('YmdHi').$file->getClientOriginalName(); 
            $file->move(public_path('upload/staff_images'),$filename);
            $data['photo'] = $filename;  
        }

        $data->save();

        $notification = array(
            'message' => 'Staff Profile Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

     } // End Method  
     
     public function StaffChangePassword(){

        $id = Auth::user()->id;
        $profileData = User::find($id);
        return view('staff.staff-change-password',compact('profileData'));

     }// End Method 


       public function StaffUpdatePassword(Request $request){

        // Validation 
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|confirmed'

        ]);

        /// Match The Old Password

        if (!Hash::check($request->old_password, auth::user()->password)) {

           $notification = array(
            'message' => 'Old Password Does not Match!',
            'alert-type' => 'error'
        );

        return back()->with($notification);
        }

        /// Update The New Password 

        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->new_password)

        ]);

         $notification = array(
            'message' => 'Password Change Successfully',
            'alert-type' => 'success'
        );

        return back()->with($notification); 

     } // End Method

}
