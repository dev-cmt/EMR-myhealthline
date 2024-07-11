<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use PDF;

use App\Models\Master\MastComplaint;
use App\Models\Master\MastTest;
use App\Models\Master\MastOrgan;
use App\Models\Master\MastEquipment;
use App\Models\Master\MastPower;
use App\Models\User;

use App\Models\Information\SensitiveInformation;
use App\Models\Information\GeneticDiseaseProfile;
use App\Models\Information\OtherPersonalInformation;
use App\Models\Information\CaseRegistry;
use App\Models\Information\BloodSugarProfiling;
use App\Models\Information\BloodPressureProfiling;
use App\Models\Information\Vaccination;
use App\Models\Information\VaccinationCovid;
use App\Models\Information\RandomUploaderTool;
use App\Models\Information\TreatmentProfile;
use App\Models\Information\LabTest;
use App\Models\Information\MedicationSchedule;
use App\Models\Information\SurgicalIntervention;
use App\Models\Information\OptionsalQuestion;
use App\Models\Information\Restriction;
use App\Models\Information\DoctorAppointment;
use App\Models\Information\DoctorAppointmentDetails;

class Report1Controller extends Controller
{
    public function reportUserIndex()
    {
        $data = null;
        return view('pages.report-user-index', compact('data'));
    }
    // Report => 1
    public function completeProfile()
    {
        $user = Auth::user();

        if ($user) {
            $sensitiveInformation = SensitiveInformation::where('patient_id', $user->id)->first();
            $geneticDiseaseProfile = GeneticDiseaseProfile::where('patient_id', $user->id)->first();
            $otherPersonalInformation = OtherPersonalInformation::where('patient_id', $user->id)->first();
            //---GET Data (casesEdit)
            $caseRegistryList = CaseRegistry::where('patient_id', $user->id)->get();

            $sugarData = BloodSugarProfiling::where('patient_id', Auth::user()->id)->get();
            $pressureData = BloodPressureProfiling::where('patient_id', Auth::user()->id)->get();

            $vaccination = Vaccination::where('patient_id', $user->id)->get();
            $covidData = VaccinationCovid::where('patient_id', $user->id)->get();
            $doctorAppointmentList = DoctorAppointment::where('patient_id', $user->id)->get();
        }

        // $pdf = PDF::loadView('pages.download-report.complete-profile', compact(
        return view('pages.download-report.complete-profile', compact(
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
        ));
        // ))->setPaper('a4', 'portrait');
        // return $pdf->download('Complete-profile.pdf');
    }

    // Report => 3
    public function doctorVisit(Request $request){
        $doctorcost = DoctorAppointmentDetails::with('doctorAppointment')->orderBy('id', 'asc')->get();

        $pdf = PDF::loadView('pages.download-report.doctor-visit', compact('doctorcost'))->setPaper('a4', 'portrait');
        return $pdf->download('Medicines-Used.pdf');
    }
    // Report => 4
    public function medicineDownload(Request $request) {
        $medicine = MedicationSchedule::with('patient', 'power', 'equipment')->orderBy('id', 'asc')->get();

        if ($medicine->isEmpty()) {
            return response()->json(['message' => 'No medicines found.'], 404);
        }

        $pdf = PDF::loadView('pages.download-report.medicine-details', compact('medicine'))->setPaper('a4', 'portrait');
        return $pdf->download('Medicines-Used.pdf');
    }
    // Report => 5
    public function antibioticDownload(Request $request) {
        $antibiotic = MedicationSchedule::with('patient', 'power', 'equipment')
                    ->where('antibiotic', 'Yes')->orderBy('id', 'asc')->get();

        if ($antibiotic->isEmpty()) {
            return response()->json(['message' => 'No medicines found where antibiotic is Yes.'], 404);
        }

        $pdf = PDF::loadView('pages.download-report.antibiotic-details', compact('antibiotic'))->setPaper('a4', 'portrait');
        return $pdf->download('Medicines-Used.pdf');
    }
    // Report => 6
    public function testDownload(Request $request)
    {
        $testDone = LabTest::with('treatmentProfile', 'testName', 'organName')->orderBy('id', 'asc')->get();

        // Generate PDF using the fetched data
        $pdf = PDF::loadView('pages.download-report.test-done-details', compact('testDone'))->setPaper('a4', 'portrait');
        return $pdf->download('Tests-Done.pdf');
    }
    // Report => 7
    public function doctorCost(Request $request){
        $doctorcost = DoctorAppointmentDetails::with('doctorAppointment')->orderBy('id', 'asc')->get();

        // Calculate total fee
        $totalFee = $doctorcost->sum(function ($appointment) {
            return $appointment->fee;
        });

        // Load the view with the calculated data
        $pdf = PDF::loadView('pages.download-report.doctor-cost', compact('doctorcost', 'totalFee'))->setPaper('a4', 'portrait');
        return $pdf->download('Doctor-Cost-Report.pdf');
    }
}
