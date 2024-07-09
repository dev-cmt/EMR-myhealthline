<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;


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
use Exception;

class ReportController extends Controller
{
    public function reportUserIndex()
    {
        $data = null;
        
        return view('pages.report-user-index', compact('data'));
    }
    public function completeHealthProfileReport()
    {
        $user = Auth::user();
        $sensitiveInformation = null;
        $geneticDiseaseProfile = null;
        $otherPersonalInformation = null;

        if ($user) {
            $sensitiveInformation = SensitiveInformation::where('patient_id', $user->id)->first();
            $geneticDiseaseProfile = GeneticDiseaseProfile::where('patient_id', $user->id)->first();
            $otherPersonalInformation = OtherPersonalInformation::where('patient_id', $user->id)->first();
        }
        return view('pages.download-report.complete-health-profile', compact('user'));
    }
}
