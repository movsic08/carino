<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Appointment;
use App\Notifications\ApprovedAppointments;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\Client;
use Symfony\Component\Mailer\Messenger\SendEmailMessage;





class AdminController extends Controller
{
    public function AdminDashboard()
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
    
        return view('admin.admin-dashboard', compact('totalClients', 'changeFromLastWeek', 'weeklyData', 'weeklyLabels'));
    }
    

    public function AdminDashboard2()
    {
        return view('admin.index');
    }

    public function AdminLogout(Request $request){
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

         $notification = array(
            'message' => 'Admin Logout Successfully',
            'alert-type' => 'success'
        ); 

        return redirect('/admin/login')->with($notification);
    } // End Method 


    public function AdminLogin(){

        return view('admin.admin-login');

    } // End Method 


    public function AdminProfile()
    {
        if (Auth::check()) {
            $id = Auth::user()->id;
            $profileData = User::find($id);
            return view('admin.admin-profile-view', compact('profileData'));
        }
    } //End Method

    public function AdminProfileStore(Request $request)
    {
        $id = Auth::user()->id;
        $data = User::find($id);
        $data->name = $request->name;
        $data->username = $request->username;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->address = $request->address;

        if ($request->file('photo')) {
            $file = $request->file('photo');
            @unlink(public_path('upload/admin_images/'.$data->photo));
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/admin_images'), $filename);
            $data['photo'] = $filename;
        }

        $data->save();
        $notification = array(
            'message' => 'Admin Profile Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification); 
        
    } //End Method

    public function AdminChangePassword(Request $request)
    {
        $id = Auth::user()->id;
        $profileData = User::find($id);

        return view('admin.admin-change-password', compact('profileData'));
    } //End Method


    public function AdminUpdatePassword(Request $request)
    {
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|min:8|different:old_password|confirmed',
        ], [
            'new_password.confirmed' => 'The new password confirmation does not match.',
        ]);

        // Match the old password
        if (!Hash::check($request->old_password, auth()->user()->password)) {
            $notification = [
                'message' => 'Old password does not match',
                'alert-type' => 'error'
            ];

            return redirect()->back()->with($notification);
        }

        // Update the password
        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->new_password)
        ]);

        $notification = [
            'message' => 'Password Changed Successfully',
            'alert-type' => 'success'
        ];

        return redirect()->back()->with($notification);
    }

    /////////// Staff User All Method ////////////


    public function AllStaff(){

        $allstaff = User::where('role','staff')->get();
        return view('admin.staff.staff-directory',compact('allstaff'));
    
      } // End Method 


      public function AddStaff(){

        return view('admin.staff.add-staff');
    
      } // End Method 
    
    
      public function StoreStaff(Request $request){
    
        User::insert([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'password' => Hash::make($request->password),
            'role' => 'staff',
            'status' => 'active', 
        ]);
    
    
           $notification = array(
                'message' => 'Staff Created Successfully',
                'alert-type' => 'success'
            );
    
            return redirect()->route('all.staff')->with($notification); 
    
    
      } // End Method 


      public function EditStaff($id){

        $allstaff = User::findOrFail($id);
        return view('admin.staff.edit-staff',compact('allstaff'));
    
      }// End Method 
    
    
      public function UpdateStaff(Request $request){
    
        $user_id = $request->id;
    
        User::findOrFail($user_id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address, 
        ]);
    
    
           $notification = array(
                'message' => 'Staff Updated Successfully',
                'alert-type' => 'success'
            );
    
            return redirect()->route('all.staff')->with($notification);  
    
      } // End Method 
    
    
      public function DeleteStaff($id){
    
        User::findOrFail($id)->delete();
    
         $notification = array(
                'message' => 'Staff Deleted Successfully',
                'alert-type' => 'success'
            );
    
            return redirect()->back()->with($notification); 
    
      } // End Method
      
      public function changeStatus(Request $request){

        $user = User::find($request->user_id);
        $user->status = $request->status;
        $user->save();
    
        return response()->json(['success'=>'Status Change Successfully']);
    
      } // End Method 



    
    public function showAppointments()
    {
        $appointments = Appointment::all();
        return view('admin.appointments-table', compact('appointments'));
    }

    public function approvedAppointments($id)
    {
        $appointmentData = Appointment::find($id);

        if ($appointmentData) {
            $appointmentData->status = 'Approved';
            $appointmentData->save();

            $message = 'Appointment has been approved successfully!';

            // Check if this is the only record, redirect to index page
            if (Appointment::count() == 1) {
                return redirect()->route('appointments.approved')->with('success', $message);
            }

            return redirect()->back()->with('success', $message);
        } else {
            return redirect()->back()->with('error', 'Appointment not found!');
        }
    }

    public function rejectedAppointments($id)
    {
        $appointmentData = Appointment::find($id);

        if ($appointmentData) {
            $appointmentData->status = 'Rejected';
            $appointmentData->save();

            $message = 'Appointment has been rejected successfully!';

            // Check if this is the only record, redirect to index page
            if (Appointment::count() == 1) {
                return redirect()->route('appointments.manage-assessments')->with('success', $message);
            }

            return redirect()->back()->with('success', $message);
        } else {
            return redirect()->back()->with('error', 'Appointment not found!');
        }
    }

    public function approvedAppointmentsView()
    {
        $approvedAppointments = Appointment::where('status', 'Approved')->get();
        return view('admin.appointments.approved', compact('approvedAppointments'));
    }

    public function emailview($id)
    {
        $appointmentData = Appointment::find($id);

        if (!$appointmentData) {
            return redirect()->back()->with('error', 'Appointment not found!');
        }

        return redirect()->route('admin.appointments.approved')->with('success', 'Email viewed successfully.');
    }


    public function sendemail(Request $request, $id)
    {
        $appointment = Appointment::find($id);

        if ($appointment) {
            $details = [
                'greeting' => $request->greeting,
                'body' => $request->body,
                'actiontext' => $request->actiontext,
                'actionurl' => $request->actionurl,
                'endpart' => $request->endpart,
            ];

            $appointment->notify(new ApprovedAppointments($details));

            return redirect()->back()->with('message', 'Email sent successfully');
        } else {
            return redirect()->back()->with('error', 'Appointment not found!');
        }
    }
}
