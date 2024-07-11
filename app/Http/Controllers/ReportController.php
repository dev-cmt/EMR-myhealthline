<?php

namespace App\Http\Controllers;

use App\Models\Information\BloodPressureProfiling;
use App\Models\Information\BloodSugarProfiling;
use App\Models\Information\CaseRegistry;
use App\Models\Information\DoctorAppointment;
use App\Models\Information\DoctorAppointmentDetails;
use App\Models\Information\GeneticDiseaseProfile;
use App\Models\Information\MedicationSchedule;
use App\Models\Information\Vaccination;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Information\LabTest;
use App\Models\Information\OtherPersonalInformation;
use App\Models\Information\SensitiveInformation;
use App\Models\Information\SurgicalIntervention;
use App\Models\Information\VaccinationCovid;
use PDF;
use Illuminate\Support\Facades\Auth;

class ReportController extends Controller
{
    public function healthProfile(){
        $patient = User::all();
        // dd($patient);
        return view('pages.reports.patient-report', compact('patient'));
    }

    public function profileDetails($id){

        $patient = User::find($id);
        // dd($patient);
        return view('pages.reports.patient-details', compact('patient'));
    }

    public function testDoneReport(){

        return view('pages.reports.test-done-report');
    }

    public function testDownload(Request $request)
    {
        $testDone = LabTest::where('treatment_profile_id', Auth::user()->id)->with('treatmentProfile', 'testName', 'organName')
                    ->orderBy('id', 'asc')
                    ->get();
        // dd($testDone);
        // Generate PDF using the fetched data
        $pdf = PDF::loadView('pages.reports.test-done-details', compact('testDone'))->setPaper('a4', 'portrait');
        return $pdf->download('Tests-Done.pdf');
    }

    public function medicineDownload(Request $request) {
        $medicine = MedicationSchedule::where('case_registry_id', Auth::user()->id)->with('patient', 'power', 'equipment')
                    ->orderBy('id', 'asc')
                    ->get();

        if ($medicine->isEmpty()) {
            return response()->json(['message' => 'No medicines found.'], 404);
        }

        $pdf = PDF::loadView('pages.reports.medicine-details', compact('medicine'))->setPaper('a4', 'portrait');
        return $pdf->download('Medicines-Used.pdf');
    }

    // Report => 3
    public function antibioticDownload(Request $request) {
        $antibiotic = MedicationSchedule::where('case_registry_id', Auth::user()->id)->with('patient', 'power', 'equipment')
                    ->where('antibiotic', 'Yes')
                    ->orderBy('id', 'asc')
                    ->get();

        if ($antibiotic->isEmpty()) {
            return response()->json(['message' => 'No medicines found where antibiotic is Yes.'], 404);
        }

        $pdf = PDF::loadView('pages.reports.antibiotic-details', compact('antibiotic'))->setPaper('a4', 'portrait');
        return $pdf->download('Medicines-Used.pdf');
    }

    // Report => 4
    public function doctorCost(Request $request){
        $doctorcost = DoctorAppointmentDetails::where('doctor_appointment_id', Auth::user()->id)->with('doctorAppointment')
                        ->orderBy('id', 'asc')
                        ->get();

        // Calculate total fee
        $totalFee = $doctorcost->sum(function ($appointment) {
            return $appointment->fee;
        });

        // Load the view with the calculated data
        $pdf = PDF::loadView('pages.reports.doctor-cost', compact('doctorcost', 'totalFee'))->setPaper('a4', 'portrait');
        return $pdf->download('Doctor-Cost-Report.pdf');
    }
    // Report => 5
    public function doctorVisit(Request $request){
        $doctorcost = DoctorAppointmentDetails::where('doctor_appointment_id', Auth::user()->id)->with('doctorAppointment')
                    ->orderBy('id', 'asc')
                    ->get();

        // dd($doctorcost);
        $pdf = PDF::loadView('pages.reports.doctor-visit', compact('doctorcost'))->setPaper('a4', 'portrait');
        return $pdf->download('Medicines-Used.pdf');
    }

    // Report => 8
    public function pathoLogical(Request $request){
        $pathologi = LabTest::where('treatment_profile_id', Auth::user()->id)->with('treatmentProfile', 'testName', 'organName')->orderBy('id','asc')->get();

        $totalFee = $pathologi->sum(function ($cost) {
            return $cost->cost;
        });

        // dd($pathologi);
        $pdf = PDF::loadView('pages.reports.pathologi-cost', compact('pathologi','totalFee'))->setPaper('a4', 'portrait');
        return $pdf->download('Medicines-Used.pdf');
    }
    // Report => 9
    public function consumeCost(Request $request){
        $consume = MedicationSchedule::where('case_registry_id', Auth::user()->id)->with('equipment', 'power', 'patient')->orderBy('id','asc')->get();

        $totalFee = $consume->sum(function ($cost) {
            return $cost->cost;
        });

        // dd($consume);
        $pdf = PDF::loadView('pages.reports.consume-cost', compact('consume','totalFee'))->setPaper('a4', 'portrait');
        return $pdf->download('Medicines-Used.pdf');
    }
    // Report => 10
    public function surgicalCost(Request $request){
        $surgical = SurgicalIntervention::where('case_registry_id', Auth::user()->id)->orderBy('id','asc')->get();

        $totalFee = $surgical->sum(function ($cost) {
            return $cost->cost;
        });

        // dd($surgical);
        $pdf = PDF::loadView('pages.reports.surgical-cost', compact('surgical','totalFee'))->setPaper('a4', 'portrait');
        return $pdf->download('Medicines-Used.pdf');
    }

    // Report => 11
    public function totalCost() {
        $totalCost = [
            'doctorCost' => DoctorAppointmentDetails::where('doctor_appointment_id', Auth::user()->id)->sum('fee'),
            'pathoLogical' => LabTest::where('treatment_profile_id', Auth::user()->id)->sum('cost'),
            'consumeCost' => MedicationSchedule::where('case_registry_id', Auth::user()->id)->sum('cost'),
            'surgicalCost' => SurgicalIntervention::where('case_registry_id', Auth::user()->id)->sum('cost')
        ];

        // dd('totalCost');

        $pdf = PDF::loadView('pages.reports.total-cost', compact('totalCost'))->setPaper('a4', 'portrait');
        return $pdf->download('Medicines-Used.pdf');
    }

    public function perMonth() {
        $monthlyCost = [
            'doctorCost' => DoctorAppointmentDetails::where('doctor_appointment_id', Auth::user()->id)->sum('fee') / 12,
            'pathoLogical' => LabTest::where('treatment_profile_id', Auth::user()->id)->sum('cost') / 12,
            'consumeCost' => MedicationSchedule::where('case_registry_id', Auth::user()->id)->sum('cost') / 12,
            'surgicalCost' => SurgicalIntervention::where('case_registry_id', Auth::user()->id)->sum('cost') / 12
        ];

        $pdf = PDF::loadView('pages.reports.per-month-cost', compact('monthlyCost'))->setPaper('a4', 'portrait');
        return $pdf->download('Monthly-Cost-Report.pdf');
    }




    public function vaccinationRecord() {
        $user = Auth::user();

        if ($user) {
            $vaccination = Vaccination::where('patient_id', $user->id)->get();
            $covidData = VaccinationCovid::where('patient_id', $user->id)->get();
        } else {
            return redirect()->back()->withErrors('User not authenticated.');
        }

        $pdf = PDF::loadView('pages.reports.vaccination-record', compact('user', 'vaccination', 'covidData'))->setPaper('a4', 'portrait');
        return $pdf->download('Vaccination-Record.pdf');
    }

    public function yearsRecord() {
        $user = Auth::user();

        if (!$user) {
            return redirect()->back()->withErrors('User not authenticated.');
        }

        $sensitiveInformation = SensitiveInformation::where('patient_id', $user->id)->first();
        $geneticDiseaseProfile = GeneticDiseaseProfile::where('patient_id', $user->id)->first();
        $otherPersonalInformation = OtherPersonalInformation::where('patient_id', $user->id)->first();
        $caseRegistryList = CaseRegistry::where('patient_id', $user->id)->get();
        $sugarData = BloodSugarProfiling::where('patient_id', $user->id)->get();
        $pressureData = BloodPressureProfiling::where('patient_id', $user->id)->get();
        $vaccination = Vaccination::where('patient_id', $user->id)->get();
        $covidData = VaccinationCovid::where('patient_id', $user->id)->get();
        $doctorAppointmentList = DoctorAppointment::where('patient_id', $user->id)->get();

        $pdf = PDF::loadView('pages.reports.years-report', compact(
            'user',
            'sensitiveInformation',
            'geneticDiseaseProfile',
            'otherPersonalInformation',
            'caseRegistryList',
            'sugarData',
            'pressureData',
            'vaccination',
            'covidData',
            'doctorAppointmentList'
        ))->setPaper('a4', 'portrait');

        return $pdf->download('Complete-profile.pdf');
    }




}
