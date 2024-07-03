<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

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

class PatientController extends Controller
{
    public static $file, $fileName, $subfolder, $fileUrl, $directory, $update;

    public static function uploadImage($file, $subfolder, $update = null)
    {
        if ($file) {
            // Delete existing file if $update is provided and has a file path
            if ($update && $update->file) {
                $oldFilePath = public_path($update->file);
                if (file_exists($oldFilePath)) {
                    unlink($oldFilePath);
                }
            }

            // Move the uploaded file to the desired directory
            $fileName = $file->getClientOriginalName();
            $userId = auth()->user()->id;
            $directory = public_path("document/{$userId}/{$subfolder}/");

            // Ensure the directory exists; create if it doesn't
            if (!File::isDirectory($directory)) {
                File::makeDirectory($directory, 0777, true, true);
            }

            $file->move($directory, $fileName);
            $fileUrl = "document/{$userId}/{$subfolder}/{$fileName}";
        } else {
            $fileUrl = $update ? $update->file : null;
        }

        return $fileUrl;
    }





    public function generalProfile()
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

        return view('pages.info-general', compact('user', 'sensitiveInformation', 'geneticDiseaseProfile', 'otherPersonalInformation'));
    }


    /**-----------------------
     * Store Patient Registry
     */
    public function patientRegistry(Request $request)
    {
        // Validate request data
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required_if:id,null|email|unique:users,email,' . $request->id,
            'password' => 'required_if:id,null|string|min:8',
            'dob' => 'nullable|date',
            'age' => 'nullable|integer|min:0',
            'gender' => 'nullable|string|in:Male,Female,Other',
            'religion' => 'nullable|string|max:255',
            'blood_group' => 'nullable|string|max:3',
            'height_feet' => 'nullable|numeric|min:0',
            'height_inches' => 'nullable|numeric|min:0',
            'weight_kg' => 'nullable|numeric|min:0',
            'weight_pounds' => 'nullable|numeric|min:0',
            'bmi' => 'nullable|numeric|min:0',
            'emergency_contact' => 'nullable|string|max:255',
            'marital_status' => 'nullable|string|in:Single,Married,Married with Kids,Divorced,Widowed,Unwilling to Disclose',
        ]);

        // Check if validation fails
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Generate unique_patient_id
        $uniquePatientId = $this->generateUniquePatientId($request);

        // If unique_patient_id already exists, add error
        if (User::where('unique_patient_id', $uniquePatientId)->exists()) {
            return redirect()->back()->withErrors(['unique_patient_id' => 'The unique patient ID already exists.'])->withInput();
        }

        // Determine if it's an update or create operation
        if ($request->id) {
            // Update existing record
            $user = User::find($request->id);
            if (!$user) {
                return redirect()->back()->withErrors(['user' => 'User not found.'])->withInput();
            }
        } else {
            // Create new record
            $user = new User();
            $user->email = $request->input('email');
            $user->password = Hash::make($request->input('password'));
        }

        // Populate user fields
        $user->name = $request->input('name');
        $user->dob = $request->input('dob');
        $user->age = $request->input('age');
        $user->gender = $request->input('gender');
        $user->religion = $request->input('religion');
        $user->blood_group = $request->input('blood_group');
        $user->height_feet = $request->input('height_feet');
        $user->height_inches = $request->input('height_inches');
        $user->weight_kg = $request->input('weight_kg');
        $user->weight_pounds = $request->input('weight_pounds');
        $user->bmi = $request->input('bmi');

        // Calculate BMI if height and weight are provided
        // if ($request->input('height_feet') && $request->input('height_inches') && $request->input('weight_kg')) {
        //     $user->bmi = $this->calculateBMI($request->input('height_feet'), $request->input('height_inches'), $request->input('weight_kg'));
        // }

        $user->emergency_contact = $request->input('emergency_contact');
        $user->marital_status = $request->input('marital_status');
        $user->unique_patient_id = $uniquePatientId;

        // Save the user
        $user->save();
        Auth::login($user);

        // Redirect or return response as needed
        return redirect()->back()->with('success', 'User created successfully.');
    }

    private function generateUniquePatientId($request)
    {
        $firstNameInitial = strtoupper(substr($request->input('name'), 0, 1));
        $lastNameInitial = strtoupper(substr(strrchr($request->input('name'), ' '), 1));
        $genderInitial = strtoupper(substr($request->input('gender'), 0, 1));
        $bloodGroupConnotation = strtoupper(substr($request->input('blood_group'), 0, 1));
        $maritalStatusInitial = strtoupper(substr($request->input('marital_status'), 0, 1));
        $uniquePatientId = $firstNameInitial . $lastNameInitial . $genderInitial . $bloodGroupConnotation . Str::random(7) . $maritalStatusInitial;
        return $uniquePatientId;
    }

    private function calculateBMI($feet, $inches, $weightKg)
    {
        $heightInMeters = (($feet * 12) + $inches) * 0.0254;
        return $weightKg / ($heightInMeters * $heightInMeters);
    }



    /**------------------------------
     * Store => sensitive_information
     */
    public function sensitiveInformation(Request $request)
    {
        // Validate the request
        $validatedData = $request->validate([
            'sexually_active' => 'required|in:Yes,Do Not Know,Unwilling to Disclose',
            'diabetic' => 'required|in:Yes,Do Not Know,Unwilling to Disclose',
            'allergies' => 'required|in:Yes,Do Not Know,Unwilling to Disclose',
            'allergy_details' => 'nullable|string',
            'thyroid' => 'required|in:Yes,Do Not Know,Unwilling to Disclose',
            'thyroid_details' => 'nullable|string',
            'hypertension' => 'required|in:Yes,Do Not Know,Unwilling to Disclose',
            'cholesterol' => 'required|in:Yes,Do Not Know,Unwilling to Disclose',
            'cholesterol_details' => 'nullable|string',
            's_creatinine' => 'required|in:Yes,Do Not Know,Unwilling to Disclose',
            's_creatinine_details' => 'nullable|string',
            'smoking' => 'required|in:Yes,Do Not Know,Unwilling to Disclose',
            'smoking_quantity' => 'nullable|integer',
            'alcohol_intake' => 'required|in:Yes,Do Not Know,Unwilling to Disclose',
            'alcohol_frequency' => 'nullable|string',
            'drug_abuse_history' => 'required|in:Yes,Do Not Know,Unwilling to Disclose',
            'drug_abuse_details' => 'nullable|string',
        ]);

        // Add the authenticated user's ID as patient_id
        $validatedData['patient_id'] = auth()->user()->id;

        // Determine if it's an update or create operation
        if ($request->id) {
            // Update existing record
            SensitiveInformation::where('id', $request->id)->update($validatedData);
        } else {
            // Create new record
            SensitiveInformation::create($validatedData);
        }

        // Redirect or respond as needed
        return redirect()->route('dashboard')->with('success', 'Sensitive information saved successfully.');
    }
    /**---------------------------------
     * Store => genetic_disease_profiles
     */
    public function geneticDiseaseProfile(Request $request)
    {
        // Validate the request
        $validatedData = $request->validate([
            'disease_diabetes' => 'boolean',
            'disease_stroke' => 'boolean',
            'disease_heart' => 'boolean',
            'disease_hyper' => 'boolean',
            'disease_pressure' => 'boolean',
            'disease_balding' => 'boolean',
            'disease_vitiligo' => 'boolean',
            'disease_disability' => 'boolean',
            'disease_psoriasis' => 'boolean',
            'additional_comments' => 'nullable|string',
        ]);

        // Assuming you have authenticated user and patient_id
        $validatedData['patient_id'] = auth()->user()->id;

        // Determine if it's an update or create operation
        if ($request->id) {
            // Update existing record
            GeneticDiseaseProfile::where('id', $request->id)->update($validatedData);
        } else {
            // Create new record
            GeneticDiseaseProfile::create($validatedData);
        }

        // Redirect or respond as needed
        return redirect()->route('dashboard')->with('success', 'Genetic disease profile saved successfully.');
    }
    /**------------------------
     * Store => other_personal_information
     */
    public function otherPersonalInformation(Request $request)
    {
        // Validate the request
        $validatedData = $request->validate([
            'marital_status' => 'nullable|in:Single,Married,Married with Kids,Divorced,Widowed,Unwilling to Disclose',
            'home_address' => 'nullable|string',
            'office_address' => 'nullable|string',
            'email_address' => 'nullable|email',
            'phone_number' => 'nullable|string',
            'last_blood_donated' => 'nullable|date',
            'health_insurance_number' => 'nullable|string',
            'family_physician' => 'nullable|string',
            'physician_contact' => 'nullable|string',
            'pregnancy_status' => 'nullable|in:Yes,No',
            'menstrual_cycle' => 'nullable|in:Regular,Irregular,Menopaused',
            'activity_status' => 'nullable|in:Immobile/Paralyzed,Disabled,Not Very Active,Moderately Active,Highly Active',
            'hereditary_disease' => 'nullable|string',
        ]);

        // Assuming you have authenticated user and patient_id
        $validatedData['patient_id'] = auth()->user()->id;

        // Create and save the other personal information record
        OtherPersonalInformation::create($validatedData);

        // Redirect or respond as needed
        return redirect()->route('dashboard')->with('success', 'Other personal information saved successfully.');
    }


    /**--------------------------------------------------------------------------------------------
     * --------------------------------------------------------------------------------------------
     * CASES
     * --------------------------------------------------------------------------------------------
     * --------------------------------------------------------------------------------------------
     */
    public function cases()
    {
        $complaints = MastComplaint::all();
        $tests = MastTest::all();
        $organs = MastOrgan::all();
        $equipments = MastEquipment::all();
        $powers = MastPower::all();

        $caseRegistry = CaseRegistry::where('patient_id', Auth::user()->id)->first();
        $treatmentProfile = TreatmentProfile::where('patient_id', Auth::user()->id)->with('labTests')->first();

        $medicationSchedule = MedicationSchedule::where('patient_id', Auth::user()->id)->get();
        $surgicalIntervention = SurgicalIntervention::where('patient_id', Auth::user()->id)->get();
        $optionsalQuestion = OptionsalQuestion::where('patient_id', Auth::user()->id)->first();
        $restriction = Restriction::where('patient_id', Auth::user()->id)->get();

        return view('pages.info-cases', compact(
            'complaints', 
            'tests', 
            'organs', 
            'equipments', 
            'powers',

            'caseRegistry',
            'treatmentProfile',
            'medicationSchedule',
            'surgicalIntervention',
            'restriction',
            'optionsalQuestion',
        ));
    }

    /**------------------------
     * Store => blood_sugar_profilings
     */
    public function caseRegistry(Request $request)
    {
        $validatedData = $request->validate([
            'date_of_primary_identification' => 'nullable|date',
            'date_of_first_visit' => 'nullable|date',
            'recurrence' => 'nullable|string|max:255',
            'duration' => 'nullable|integer',
            'duration_unit' => 'nullable|string|max:10',
            'area_of_problem' => 'nullable|string|max:255',
            'type_of_ailment' => 'nullable|string|max:255',
            'additional_complaints' => 'nullable|string',
            'mast_complaints' => 'array',
            'mast_complaints.*' => 'integer|exists:mast_complaints,id',
        ]);

        if ($request->id) {
            // Update existing record
            $caseRegistry = CaseRegistry::find($request->id);
        } else {
            // Create new record
            $caseRegistry = new CaseRegistry();
        }

        $caseRegistry->patient_id = Auth::user()->id;
        $caseRegistry->date_of_primary_identification = $request->date_of_primary_identification;
        $caseRegistry->date_of_first_visit = $request->date_of_first_visit;
        $caseRegistry->recurrence = $request->recurrence;
        $caseRegistry->duration_of_suffering = $request->duration . ' ' . $request->duration_unit ?? null;
        $caseRegistry->area_of_problem = $request->area_of_problem;
        $caseRegistry->type_of_ailment = $request->type_of_ailment;
        $caseRegistry->additional_complaints = $request->additional_complaints;
        $caseRegistry->save();

        if (isset($validatedData['mast_complaints'])) {
            $caseRegistry->complaints()->sync($validatedData['mast_complaints']);
        }

        return redirect()->back()->with('success', 'Case registry created successfully!');
    }



    /**-----------------------------------------
     * Store => treatment_profiles OR lab_tests
     */
    public function treatmentLabTest(Request $request)
    {
        // Validate the request data
        $request->validate([
            'doctor_name' => 'nullable|string',
            'designation' => 'nullable|string',
            'chamber_address' => 'nullable|string',
            'last_visit_date' => 'nullable|date',
            'fees' => 'nullable|numeric',
            'comments' => 'nullable|string',
            'disease_diagnosis' => 'nullable|string',
            'prescription' => 'nullable|file|mimes:pdf,jpg,jpeg,png',
            'data.mast_test_id.*' => 'required|integer|exists:lab_tests,id',
            'data.type.*' => 'required|string',
            'data.organ.*' => 'required|integer|exists:organs,id',
            'data.comments.*' => 'nullable|string',
            'data.cost.*' => 'nullable|numeric',
            'data.lab.*' => 'nullable|string',
        ]);

        // Save the treatment profile
        $treatmentProfile = new TreatmentProfile();
        $treatmentProfile->doctor_name = $request->doctor_name;
        $treatmentProfile->designation = $request->designation;
        $treatmentProfile->chamber_address = $request->chamber_address;
        $treatmentProfile->last_visit_date = $request->last_visit_date;
        $treatmentProfile->fees = $request->fees;
        $treatmentProfile->comments = $request->comments;
        $treatmentProfile->disease_diagnosis = $request->disease_diagnosis;

        if ($request->hasFile('prescription')) {
            $treatmentProfile->prescription = $request->file('prescription')->store('prescriptions');
        }

        $treatmentProfile->patient_id = auth()->id(); // or set the patient_id as required
        $treatmentProfile->save();

       // Save the lab tests
        foreach ($request->data['mast_test_id'] as $key => $mast_test_id) {
            $labTest = new LabTest();
            $labTest->mast_test_id = $mast_test_id;
            $labTest->type = $request->data['type'][$key];
            $labTest->mast_organ_id = $request->data['mast_organ_id'][$key];
            $labTest->comments = $request->data['comments'][$key];
            $labTest->cost = $request->data['cost'][$key];
            $labTest->lab = $request->data['lab'][$key];
            $labTest->treatment_profile_id = $treatmentProfile->id;
            $labTest->save();
        }

        return redirect()->back()->with('success', 'Treatment profile and lab tests saved successfully!');
    }
    /**-----------------------------
     * Store => medication_schedules
     */
    public function medicationSchedule(Request $request)
    {
        $validatedData = $request->validate([
            'data.*.mast_equipment_id' => 'required|exists:mast_equipment,id',
            'data.*.full_name' => 'nullable|string',
            'data.*.mast_power_id' => 'required|exists:mast_powers,id',
            'data.*.duration' => 'nullable|string',
            'data.*.frequency' => 'nullable|string',
            'data.*.cost' => 'nullable|string',
            'data.*.timing' => 'nullable|string',
            'data.*.antibiotic' => 'nullable|string',
        ]);

        foreach ($validatedData['data'] as $data) {
            MedicationSchedule::create([
                'patient_id' => auth()->id(),
                'mast_equipment_id' => $data['mast_equipment_id'],
                'full_name' => $data['full_name'],
                'mast_power_id' => $data['mast_power_id'],
                'duration' => $data['duration'],
                'frequency' => $data['frequency'],
                'cost' => $data['cost'],
                'timing' => $data['timing'],
                'antibiotic' => $data['antibiotic'],
            ]);
        }

        return redirect()->back()->with('success', 'Medication schedules saved successfully.');
    }
    /**-----------------------------
     * Store => surgical_interventions
     */
    public function surgicalIntervention(Request $request)
    {
        $data = $request->input('data');

        foreach ($data as $row) {
            SurgicalIntervention::create([
                'patient_id' => auth()->id(),
                'intervention' => $row['intervention'],
                'due_time' => $row['due_time'],
                'details' => $row['details'],
                'cost' => $row['cost'],
            ]);
        }

        // Optionally, you can return a response or redirect
        return redirect()->back()->with('success', 'Surgical interventions saved successfully.');
    }

    /**-----------------------------
     * Store => surgical_interventions
     */
    public function optionsalQuestion(Request $request)
    {
        $data = [
            'patient_id' => auth()->id(),
            'admitted_following_diagnosis' => $request->input('admitted_following_diagnosis'),
            'hospitalization_duration' => $request->input('hospitalization_duration'),
            'total_cost_incurred' => $request->input('total_cost_incurred'),
            'medication_effectiveness' => $request->input('medication_effectiveness'),
            'satisfied_with_treatment' => $request->input('satisfied_with_treatment'),
            'recommend_physician' => $request->input('recommend_physician'),
        ];
    
        if ($request->id) {
            // Update existing record
            $question = OptionsalQuestion::find($request->id);
            if (!$question) {
                return redirect()->back()->with('error', 'Record not found.');
            }
            $question->update($data);
        } else {
            // Create new record
            OptionsalQuestion::create($data);
        }

        // Optionally, return a response or redirect
        return redirect()->back()->with('success', 'Optional questions saved successfully.');
    }
    /**-----------------------------
     * Store => surgical_interventions
     */
    public function restriction(Request $request)
    {
        // Validate incoming requests
        $request->validate([
            'types.*' => 'required|string',
            'details.*' => 'nullable|string',
        ]);

        // Loop through submitted data and store in database
        foreach ($request->types as $index => $type) {
            $restriction = new Restriction();
            $restriction->patient_id = auth()->id();
            $restriction->type = $type;
            $restriction->details = $request->details[$index] ?? null;
            $restriction->save();
        }

        // Optionally, redirect to a success page or back with a success message
        return redirect()->back()->with('success', 'Restrictions saved successfully.');
    }
    /**--------------------------------------------------------------------------------------------
     * --------------------------------------------------------------------------------------------
     * READING PROFILLING TOOL
     * --------------------------------------------------------------------------------------------
     * --------------------------------------------------------------------------------------------
     */
    public function profilingTool()
    {
        $sugarData = BloodSugarProfiling::where('patient_id', Auth::user()->id)->get();
        $pressureData = BloodPressureProfiling::where('patient_id', Auth::user()->id)->get();
        return view('pages.info-profiling-tool', compact('sugarData', 'pressureData'));
    }

    /**------------------------
     * Store => blood_sugar_profilings
     */
    public function bloodSugarProfiling(Request $request)
    {
        $data = $request->validate([
            'time.*' => 'required|date_format:H:i',
            'reading.*' => 'required|numeric',
            'dietary_information.*' => 'required|string',
            'remark.*' => 'required|string',
            'additional_note.*' => 'nullable|string',
        ]);

        foreach ($data['time'] as $index => $time) {
            BloodSugarProfiling::create([
                'time' => $time,
                'reading' => $data['reading'][$index],
                'dietary_information' => $data['dietary_information'][$index],
                'remark' => $data['remark'][$index],
                'additional_note' => $data['additional_note'][$index] ?? null,
                'patient_id' => Auth::user()->id,
            ]);
        }

        return redirect()->back()->with('success', 'Blood sugar data saved successfully.');
    }
    /**------------------------
     * Store => blood_pressure_profilings
     */
    public function bloodPressureProfiling(Request $request)
    {
        // Validate the incoming request data for blood pressure
        $validatedData = $request->validate([
            'time.*' => 'required',
            'systolic.*' => 'required|integer',
            'diastolic.*' => 'required|integer',
            'heart_rate_bpm.*' => 'required|integer',
            'additional_note.*' => 'nullable',
        ]);

        // Process each blood pressure reading and store in the database
        foreach ($validatedData['time'] as $key => $value) {
            BloodPressureProfiling::create([
                'time' => $validatedData['time'][$key],
                'systolic' => $validatedData['systolic'][$key],
                'diastolic' => $validatedData['diastolic'][$key],
                'heart_rate_bpm' => $validatedData['heart_rate_bpm'][$key],
                'additional_note' => $validatedData['additional_note'][$key] ?? null,
                'patient_id' => Auth::user()->id,
            ]);
        }

        // Optionally, you can redirect or respond with a success message
        return redirect()->back()->with('success', 'Blood pressure readings saved successfully!');
    }
    /**--------------------------------------------------------------------------------------------
     * --------------------------------------------------------------------------------------------
     * VACCINATION RECORD
     * --------------------------------------------------------------------------------------------
     * --------------------------------------------------------------------------------------------
    */
    public function vaccinationRecord(Request $request)
    {
        $data = Vaccination::where('patient_id', Auth::user()->id)->get();
        $dataCovid = VaccinationCovid::where('patient_id', Auth::user()->id)->get();

        return view('pages.info-vaccination-record', compact('data', 'dataCovid'));
    }

    public function vaccinationStore(Request $request)
    {
        if($request->hidden_section == 'section one')
        {
            $vaccinestore = new Vaccination;
            $vaccinestore->type = $request->hidden_section;
            $vaccinestore->vaccine_name = $request->vaccine_name;
            $vaccinestore->dose_01 = $request->doseone;
            $vaccinestore->dose_02 = $request->dosetwo;
            $vaccinestore->dose_03 = $request->dosethree;
            $vaccinestore->dose_04 = $request->dosetfour;
            $vaccinestore->dose_05 = $request->dosefive;
            $vaccinestore->booster = $request->booster;
            $vaccinestore->upload_tool = self::uploadImage($request);
            $vaccinestore->patient_id = Auth::user()->id;
            $vaccinestore->save();
        }else if($request->hidden_section == 'section two'){
            $vaccinestore = new Vaccination;
            $vaccinestore->type = $request->hidden_section;
            $vaccinestore->manufacturer = $request->manufacturer;
            $vaccinestore->dose_01 = $request->doseone;
            $vaccinestore->dose_02 = $request->dosetwo;
            $vaccinestore->dose_03 = $request->dosethree;
            $vaccinestore->dose_04 = $request->dosetfour;
            $vaccinestore->dose_05 = $request->dosefive;
            $vaccinestore->booster = $request->booster;
            $vaccinestore->location = $request->location;
            $vaccinestore->certificate_number = $request->certificate;
            $vaccinestore->upload_tool = self::uploadImage($request);
            $vaccinestore->patient_id = Auth::user()->id;
            $vaccinestore->save();
            // $notification = ['message' => 'Vaccination record saved successfully.', 'alert-type' => 'success'];
            // return redirect()->route('info-vaccination-record', ['section' => 'section2'])->with($notification);
        }else{
            $vaccinestore = new Vaccination;
            $vaccinestore->type = $request->hidden_section;
            $vaccinestore->market_name = $request->market_name;
            $vaccinestore->applicable_for = $request->applicable_name;
            $vaccinestore->dose_01 = $request->doseone;
            $vaccinestore->dose_02 = $request->dosetwo;
            $vaccinestore->dose_03 = $request->dosethree;
            $vaccinestore->dose_04 = $request->dosetfour;
            $vaccinestore->dose_05 = $request->dosefive;
            $vaccinestore->booster = $request->booster;
            $vaccinestore->upload_tool = self::uploadImage($request);
            $vaccinestore->patient_id = Auth::user()->id;
            $vaccinestore->save();
        }

        $notification = ['messege' => 'Data has been saved successfully', 'alert-type' => 'success'];
        return redirect()->back()->with($notification);
    }

    public function vaccinationCovid(Request $request)
    {
        $storecoviddata = new VaccinationCovid;
        $storecoviddata->dose_type = $request->vaccine_name;
        $storecoviddata->location = $request->location;
        $storecoviddata->date = $request->date;
        $storecoviddata->manufacturer = $request->manufacturer;
        $storecoviddata->patient_id = Auth::user()->id;
        $storecoviddata->save();
        return redirect()->back();
    }
    public function covidCertificate(Request $request)
    {
        $storecovidfile = new CovidCertificate;
        $storecovidfile->certificate_number = $request->certificateNo;
        $storecovidfile->uploader_tool = self::uploadImage($request);
        $storecovidfile->vaccination_covid_id = $request->vaccination_covid_id;
        $storecovidfile->save();

        return redirect()->back();
    }


    /**--------------------------------------------------------------------------------------------
     * --------------------------------------------------------------------------------------------
     * RANDOM UPLOADER TOOL
     * --------------------------------------------------------------------------------------------
     * --------------------------------------------------------------------------------------------
     */
    public function randomUploaderTool()
    {
        $data = RandomUploaderTool::where('patient_id', Auth::user()->id)->get();
        return view('pages.info-random-uploader', compact('data'));
    }
    /**------------------------
     * Store => random_uploader_tools
     */
    public function saveRandomUploaderTool(Request $request)
    {
        // Validate incoming requests if needed
        $request->validate([
            'document_name.*' => 'required|string|max:255',
            'date.*' => 'required|date',
            'upload_tool.*' => 'required|file',
        ]);

        // Loop through each row submitted in the form
        foreach ($request->document_name as $key => $value) {
            $tool = new RandomUploaderTool();
            $tool->document_name = $request->document_name[$key];
            $tool->sub_type = $request->sub_type[$key] ?? null;
            $tool->date = $request->date[$key];
            $tool->additional_note = $request->additional_note[$key] ?? null;
            $tool->upload_tool = self::uploadImage($request->upload_tool, 'Random Uploader') ?? null;

            // Assuming patient_id is authenticated user ID
            $tool->patient_id = auth()->user()->id;
            $tool->save();
        }

        return back()->with('success', 'Documents uploaded successfully.');
    } 

    public function downloadRandomUploaderTool($id)
    {
        $data = RandomUploaderTool::find($id);
        $file = public_path($data->upload_tool); 

        if (file_exists($file)) {
            return response()->download($file);
        } else {
            abort(404, 'File not found');
        }
    }

    /**--------------------------------------------------------------------------------------------
     * --------------------------------------------------------------------------------------------
     * Doctor's Appointment Setup Tool
     * --------------------------------------------------------------------------------------------
     * --------------------------------------------------------------------------------------------
     */

     public function doctorAppointment()
    {
        $info = DoctorAppointment::where('patient_id', auth()->id())->get();
        return view('pages.info-doctor-appointment', compact('info'));
    }
    /**-----------------------------
     * Store => random_uploader_tools
     */
    public function saveDoctorAppointment(Request $request)
    {
        // Save or update DoctorAppointment record
        if ($request->appointment_id) {
            $doctorAppointment = DoctorAppointment::find($request->appointment_id);
        } else {
            $doctorAppointment = new DoctorAppointment();
        }

        // Populate DoctorAppointment fields
        $doctorAppointment->full_name = $request->full_name;
        $doctorAppointment->designation = $request->designation;
        $doctorAppointment->specialization = $request->specialization;
        $doctorAppointment->chamber_address = $request->chamber_address;
        $doctorAppointment->availability_hours = $request->availability_hours;
        $doctorAppointment->contact_number = $request->contact_number;
        $doctorAppointment->patient_id = auth()->id();
        $doctorAppointment->save();

        // Process each appointment detail
        if ($request->has('moreFile')) {
            foreach ($request->moreFile as $appointmentData) {
                $doctorAppointmentDetail = new DoctorAppointmentDetails();
                $doctorAppointmentDetail->doctor_appointment_id = $doctorAppointment->id;
                // Populate DoctorAppointmentDetails fields
                $doctorAppointmentDetail->appointment = $appointmentData['appointment'];
                $doctorAppointmentDetail->day = $appointmentData['day'];
                $doctorAppointmentDetail->time_date_tool = $appointmentData['time_date_tool'];
                $doctorAppointmentDetail->fee = $appointmentData['fee'];
                $doctorAppointmentDetail->note = $appointmentData['note'];
                $doctorAppointmentDetail->save();
            }
        }

        // Redirect back or return a response as needed
        return redirect()->back()->with('success', 'Appointment details saved successfully!');
    }
    /**------------------------
     * GET => doctor_appointments
     */
    public function editDoctorAppointment(Request $request)
    {
        $data = DoctorAppointment::with('appointmentDetails')->find($request->id)->toArray();
        return response()->json($data);
    }

    /**------------------------
     * DOWONLOAD
     */
    // private function uploadFile($file, $fieldName, $subfolder, $userId)
    // {
    //     if ($file) {
    //         $extension = $file->getClientOriginalExtension();
    //         $filenameToStore = strtoupper($fieldName) . '_' . time() . '.' . $extension;

    //         $folderPath = public_path("document/{$userId}/{$subfolder}");
    //         if (!File::exists($folderPath)) {
    //             File::makeDirectory($folderPath, 0777, true);
    //         }

    //         $file->move($folderPath, $filenameToStore);

    //         return "document/{$userId}/{$subfolder}/{$filenameToStore}";
    //     }

    //     return null;
    // }
   

}
