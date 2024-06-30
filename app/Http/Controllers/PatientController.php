<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

use App\Models\User;
use App\Models\Information\SensitiveInformation;
use App\Models\Information\GeneticDiseaseProfile;
use App\Models\Information\OtherPersonalInformation;

use App\Models\Information\BloodSugarProfiling;
use App\Models\Information\BloodPressureProfile;
use App\Models\Information\Vaccination;
use App\Models\Information\PaidVaccination;
use App\Models\Information\RandomUploaderTool;

use App\Models\Information\DoctorAppointment;
use Exception;

class PatientController extends Controller
{
   

    public function generalProfile()
    {
        return view('pages.info-general');
    }

    /**-----------------------
     * Store Patient Registry
     */
    public function patientRegistry(Request $request)
    {
        // Validate request data
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8',
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

        // If validation passes, create and save the user
        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->dob = $request->input('dob');
        $user->age = $request->input('age');
        $user->gender = $request->input('gender');
        $user->religion = $request->input('religion');
        $user->blood_group = $request->input('blood_group');
        $user->height_feet = $request->input('height_feet');
        $user->height_inches = $request->input('height_inches');
        $user->weight_kg = $request->input('weight_kg');
        $user->weight_pounds = $request->input('weight_pounds');

        // Calculate BMI if height and weight are provided
        if ($request->input('height_feet') && $request->input('height_inches') && $request->input('weight_kg')) {
            $user->bmi = $this->calculateBMI($request->input('height_feet'), $request->input('height_inches'), $request->input('weight_kg'));
        }

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
            'sexually_active' => 'required|in:Yes,No,Don\'t Know,Unwilling to Disclose',
            'diabetic' => 'required|in:Yes,No,Don\'t Know,Unwilling to Disclose',
            'allergies' => 'required|in:Yes,No,Don\'t Know,Unwilling to Disclose',
            'allergy_details' => 'nullable|string',
            'thyroid' => 'required|in:Yes,No,Don\'t Know,Unwilling to Disclose',
            'thyroid_details' => 'nullable|string',
            'hypertension' => 'required|in:Yes,No,Don\'t Know,Unwilling to Disclose',
            'cholesterol' => 'required|in:Yes,No,Don\'t Know,Unwilling to Disclose',
            'cholesterol_details' => 'nullable|string',
            's_creatinine' => 'required|in:Yes,No,Don\'t Know,Unwilling to Disclose',
            's_creatinine_details' => 'nullable|string',
            'smoking' => 'required|in:Yes,No,Don\'t Know,Unwilling to Disclose',
            'smoking_quantity' => 'nullable|integer',
            'alcohol_intake' => 'required|in:Yes,No,Don\'t Know,Unwilling to Disclose',
            'alcohol_frequency' => 'nullable|string',
            'drug_abuse_history' => 'required|in:Yes,No,Don\'t Know,Unwilling to Disclose',
            'drug_abuse_details' => 'nullable|string',
        ]);

        // Add the authenticated user's ID as patient_id
        $validatedData['patient_id'] = auth()->user()->id;

        // Create and save the sensitive information record
        SensitiveInformation::create($validatedData);

        // Redirect or respond as needed
        return redirect()->back()->with('success', 'Sensitive information saved successfully.');
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

        // Create and save the genetic disease profile record
        GeneticDiseaseProfile::create($validatedData);

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
        return view('pages.info-cases');
    }
    /**--------------------------------------------------------------------------------------------
     * --------------------------------------------------------------------------------------------
     * READING PROFILLING TOOL
     * --------------------------------------------------------------------------------------------
     * --------------------------------------------------------------------------------------------
     */
    public function profilingTool()
    {
        return view('pages.info-profiling-tool');
    }

    /**------------------------
     * Store => blood_sugar_profilings
     */
    public function bloodSugarProfiling(Request $request)
    {
        // Validate the incoming request data for blood sugar
        $validatedData = $request->validate([
            'time.*' => 'required',
            'reading.*' => 'required|numeric',
            'dietary_information.*' => 'required',
            'remark.*' => 'required',
            'additional_note.*' => 'nullable',
        ]);

        try {
            // Process each blood sugar reading and store in the database
            foreach ($validatedData['time'] as $key => $value) {
                BloodSugarProfile::create([
                    'time' => $validatedData['time'][$key],
                    'reading' => $validatedData['reading'][$key],
                    'dietary_information' => $validatedData['dietary_information'][$key],
                    'remark' => $validatedData['remark'][$key],
                    'additional_note' => $validatedData['additional_note'][$key] ?? null,
                ]);
            }

            // Optionally, you can redirect or respond with a success message
            return redirect()->back()->with('success', 'Blood sugar readings saved successfully!');
        } catch (\Exception $e) {
            // Handle any exceptions or errors that occur during saving
            return redirect()->back()->with('error', 'Failed to save blood sugar readings. Please try again.');
        }
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

        try {
            // Process each blood pressure reading and store in the database
            foreach ($validatedData['time'] as $key => $value) {
                BloodPressureProfile::create([
                    'time' => $validatedData['time'][$key],
                    'systolic' => $validatedData['systolic'][$key],
                    'diastolic' => $validatedData['diastolic'][$key],
                    'heart_rate_bpm' => $validatedData['heart_rate_bpm'][$key],
                    'additional_note' => $validatedData['additional_note'][$key] ?? null,
                ]);
            }

            // Optionally, you can redirect or respond with a success message
            return redirect()->back()->with('success', 'Blood pressure readings saved successfully!');
        } catch (\Exception $e) {
            // Handle any exceptions or errors that occur during saving
            return redirect()->back()->with('error', 'Failed to save blood pressure readings. Please try again.');
        }
    }
    /**--------------------------------------------------------------------------------------------
     * --------------------------------------------------------------------------------------------
     * VACCINATION RECORD
     * --------------------------------------------------------------------------------------------
     * --------------------------------------------------------------------------------------------


  
    /**--------------------------------------------------------------------------------------------
     * --------------------------------------------------------------------------------------------
     * RANDOM UPLOADER TOOL
     * --------------------------------------------------------------------------------------------
     * --------------------------------------------------------------------------------------------
     */
    public function randomUploaderTool()
    {
        return view('pages.info-random-uploader');
    }
    /**------------------------
     * Store => random_uploader_tools
     */
    public function saveRandomUploaderTool(Request $request)
    {
        $documentNames = $request->input('document_name');
        $subTypes = $request->input('sub_type');
        $dates = $request->input('date');
        $additionalNotes = $request->input('additional_note');
        $uploadTools = $request->file('upload_tool');

        foreach ($documentNames as $index => $documentName) {
            $document = new RandomUploaderTool();
            $document->document_name = $documentName;
            $document->sub_type = $subTypes[$index];
            $document->date = $dates[$index];
            $document->additional_note = $additionalNotes[$index];

            if (isset($uploadTools[$index])) {
                $file = $uploadTools[$index];
                $filePath = $file->store('uploads', 'public');
                $document->upload_tool = $filePath;
            }

            $document->save();
        }
        return redirect()->back()->with('success', 'Documents uploaded successfully.');
    }
    /**--------------------------------------------------------------------------------------------
     * --------------------------------------------------------------------------------------------
     * Doctor's Appointment Setup Tool
     * --------------------------------------------------------------------------------------------
     * --------------------------------------------------------------------------------------------
     */
    public function doctorAppointMent()
    {
        return view('pages.info-doctor-appointment');
    }
    /**------------------------
     * Store => random_uploader_tools
     */

    public function saveDoctorAppointment(Request $request)
    {
        $user = new DoctorAppointment();
        $user->full_name = $request->input('full_name');
        $user->designation = $request->input('designation');
        $user->save();

        return redirect()->route('dashboard')->with('success', 'Other personal information saved successfully.');
    }

}
