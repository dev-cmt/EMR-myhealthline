<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Information\DoctorAppointment;
use App\Modeels\Information\DoctorAppointmentDetails;
use Auth;

class AppointController extends Controller
{
    public function doctorAppointMent(){

        return view('pages.info-doctor-appointment');
    }

    public function saveDoctorAppointment(Request $request)
    {
        // Validate the request data if necessary
        $request->validate([
            'full_name' => 'required|string|max:255',
            'contact_number' => 'required|numeric',
            'specialization' => 'required|string|max:255',
            'designation' => 'required|string|max:255',
            'chamber_address' => 'required|string',
            'availability_hours' => 'required|string',
            'appointment_type' => 'required|array',
            'appointment_type.*' => 'required|string|max:255',
            'day' => 'required|array',
            'day.*' => 'required|string|max:255',
            'appointment_datetime' => 'required|array',
            'appointment_datetime.*' => 'required|date',
            'fee' => 'required|array',
            'fee.*' => 'required|numeric',
            'note' => 'nullable|array',
            'note.*' => 'nullable|string|max:255'
        ]);

        // Save main doctor appointment data
        $user = new DoctorAppointment();
        $user->full_name = $request->input('full_name');
        $user->designation = $request->input('designation');
        $user->specialization = $request->input('specialization');
        $user->chamber_address = $request->input('chamber_address');
        $user->availability_hours = $request->input('availability_hours');
        $user->contact_number = $request->input('contact_number');
        $user->patient_id = Auth::user()->id;
        $user->save();

        // Save each appointment detail
        $appointmentTypes = $request->input('appointment_type');
        $appointmentDays = $request->input('day');
        $appointmentDatetimes = $request->input('appointment_datetime');
        $fees = $request->input('fee');
        $notes = $request->input('note');

        for ($i = 0; $i < count($appointmentTypes); $i++) {
            $data = new DoctorAppointmentDetails();
            $data->doctor_appointment_id = $user->id;
            $data->appointment_type = $appointmentTypes[$i];
            $data->day = $appointmentDays[$i];
            $data->appointment_datetime = $appointmentDatetimes[$i];
            $data->fee = $fees[$i];
            $data->note = $notes[$i] ?? '';
            $data->star_rating = 1; // example static value
            $data->additional_comments = 'test'; // example static value
            $data->save();
        }

        return redirect()->route('info-doctor-appointment')->with('success', 'Doctor appointment information saved successfully.');
    }

}
