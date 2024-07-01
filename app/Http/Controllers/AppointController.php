<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Information\DoctorAppointment;
use App\Models\Information\DoctorAppointmentDetails;
use Auth;

class AppointController extends Controller
{
    public function doctorAppointment()
    {
        $info = DoctorAppointment::all();
        // dd($info);
        return view('pages.info-doctor-appointment', compact('info'));
    }

    public function saveDoctorAppointment(Request $request)
    {
        // Validate the request data
        $request->validate([
            'full_name' => 'required|string|max:255',
            'designation' => 'required|string|max:255',
            'specialization' => 'required|string|max:255',
            'chamber_address' => 'required|string|max:255',
            'availability_hours' => 'required|string|max:255',
            'contact_number' => 'required|string|max:20',
            'appointment' => 'required|array',
            'day' => 'required|array',
            'time_date_tool' => 'required|array',
            'fee' => 'required|array',
            'note' => 'required|array',
        ]);

        // Save main doctor appointment data
        $doctorAppointment = new DoctorAppointment();
        $doctorAppointment->full_name = $request->full_name;
        $doctorAppointment->designation = $request->designation;
        $doctorAppointment->specialization = $request->specialization;
        $doctorAppointment->chamber_address = $request->chamber_address;
        $doctorAppointment->availability_hours = $request->availability_hours;
        $doctorAppointment->contact_number = $request->contact_number;
        $doctorAppointment->patient_id = Auth::user()->id;
        $doctorAppointment->save();

        // Save each appointment detail
        foreach ($request->appointment as $key => $appointment) {
            $doctorAppointmentDetail = new DoctorAppointmentDetails();
            $doctorAppointmentDetail->appointment = $appointment;
            $doctorAppointmentDetail->day = $request->day[$key];
            $doctorAppointmentDetail->time_date_tool = $request->time_date_tool[$key];
            $doctorAppointmentDetail->fee = $request->fee[$key];
            $doctorAppointmentDetail->note = $request->note[$key];
            $doctorAppointmentDetail->doctor_appointment_id = $doctorAppointment->id;
            $doctorAppointmentDetail->save();
        }

        return redirect()->route('info-doctor-appointment')->with('success', 'Doctor appointment information saved successfully.');
    }

    public function editDoctorAppointment(Request $request)
    {
        $data = DoctorAppointment::find($request->id)->with('appointmentDetails')->get()->toArray();
        
        return response()->json($data);
    }


}
