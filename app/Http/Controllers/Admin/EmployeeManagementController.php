<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use App\Models\Employee;

class EmployeeManagementController extends Controller
{
    public function newEmployeeForm()
    {
        if(Auth::id())
        {
            if(Auth::user()->usertype==1)
            {
                return view('admin.employees.new-employee-form');
            }
            else
            {
                return redirect()->back();
                
            }  
        }
        else
        {
            return redirect('login');
        }
    }

    public function uploadEmployee(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'file' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'firstname' => 'required|string|max:255',
            'middlename' => 'nullable|string|max:255',
            'lastname' => 'required|string|max:255',
            'number' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:employees,email',
            'position' => 'required|string|max:255',
            'password' => 'required|string|min:6',
        ]);

        // Handle file upload
        if ($request->hasFile('file')) {
            $image = $request->file('file');
            $imagename = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('employeeprofile'), $imagename); // Use public_path to specify the public directory
        } else {
            // Handle the case where no image was provided
            return redirect()->back()->with('error', 'Please upload an image.');
        }

        // Create and save the Employee record, including the hashed password
        $employee = new Employee;
        $employee->image = $imagename;
        $employee->firstname = $request->input('firstname');
        $employee->middlename = $request->input('middlename');
        $employee->lastname = $request->input('lastname');
        $employee->phone = $request->input('number');
        $employee->email = $request->input('email');
        $employee->position = $request->input('position');
        $employee->password = Hash::make($request->input('password')); // Hash the password
        $employee->usertype = 2;

        try {
            $employee->save();
            return redirect()->back()->with('message', 'Employee Added Successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred while adding the employee.');
        }
    }


    public function viewEmployeeList()
    {
        $employeeList = Employee::all();

        return view('admin.employees.employee-directory', ['employeeList' => $employeeList]);
    }

    public function editEmployeeProfile($id)
    {
        // Fetch the employee data based on the $id parameter
        $employee = Employee::find($id);

        // Check if the employee exists
        if (!$employee) {
            abort(404); // Display a 404 error page if the employee doesn't exist
        }

        // Load the edit_employee view and pass the employee data
        return view('admin.employees.edit-employee-form', ['employee' => $employee]);
    }

    public function updateEmployeeProfile(Request $request, $id)
    {
        // Validate the form data
        $request->validate([
            'firstname' => 'required|string|max:255',
            'middlename' => 'nullable|string|max:255',
            'lastname' => 'required|string|max:255',
            'number' => 'required|string|max:20',
            'email' => 'required|email|max:255',
            'position' => 'required|string|max:255',
            'file' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust file validation rules as needed
        ]);

        // Find the employee record by ID
        $employee = Employee::findOrFail($id);

        // Update the employee record with the form data
        $employee->update([
            'firstname' => $request->input('firstname'),
            'middlename' => $request->input('middlename'),
            'lastname' => $request->input('lastname'),
            'phone' => $request->input('number'),
            'email' => $request->input('email'),
            'position' => $request->input('position'),
        ]);

        // Handle file upload (if provided)
        if ($request->hasFile('file')) {
            $file = $request->file('file');

            // Generate a unique filename
            $filename = time() . '_' . $file->getClientOriginalName();

            // Store the uploaded file
            $file->storeAs('public/images', $filename);

            // Update the employee's file field with the filename
            $employee->file = $filename;
            $employee->save();
        }

        // Redirect back with a success message
        return redirect()->route('edit-employee', ['id' => $employee->id])->with('message', 'Employee updated successfully');
    }

    public function viewEmployeeProfile($id)
    {
        $employee = Employee::findOrFail($id);

        return view('admin.employees.employee-profile', compact('employee'));
    }

}
