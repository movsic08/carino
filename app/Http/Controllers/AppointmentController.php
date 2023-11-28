<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Client;
use App\Models\Appointment;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    public function appointment(Request $request)
    {
        $appointmentData = new appointment;

        $appointmentData->name = $request->name;
        $appointmentData->email = $request->email;
        $appointmentData->phone = $request->phone;
        $appointmentData->date = $request->date;
        $appointmentData->time = $request->time;
        $appointmentData->message = $request->message;
        $appointmentData->status = 'Pending';

        if (Auth::id()) {
            $appointmentData->user_id = Auth::user()->id;
        }

        // Generate appointment number
        $appointmentNumber = $this->generateAppointmentNumber();
        $appointmentData->appointment_number = $appointmentNumber;

        $appointmentData->save();

        session()->flash('success', 'Appointment has been successfully scheduled! Appointment Number: ' . $appointmentNumber);

        return redirect()->back()->with('success', 'Appointment has been successfully scheduled! Appointment Number: ' . $appointmentNumber);
    }

    private function generateAppointmentNumber()
    {
        $year = substr(date('Y'), -2); // Last two digits of the year
        $month = date('m');
        $day = date('d');

        // Generate two random letters
        $randomLetters = chr(rand(65, 90)) . chr(rand(65, 90));

        // Combine the components to form the appointment number
        $appointmentNumber = $year . $month . $day . $randomLetters;

        return $appointmentNumber;
    }


}
