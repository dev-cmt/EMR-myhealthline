<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Information\SensitiveInformation;
use App\Models\Information\GeneticDiseaseProfile;
use App\Models\Information\OtherPersonalInformation;

use App\Models\Information\BloodSugarProfiling;
use App\Models\Information\BloodPressureProfile;
use App\Models\Information\Vaccination;
use App\Models\Information\PaidVaccination;

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
        $request->validate([
            'unique_patient_id' => 'required|unique:patients',
            'full_name' => 'required',
            'dob' => 'required|date',
            'gender' => 'required',
            'religion' => 'required',
            'blood_group' => 'required',
            'height_feet' => 'required|numeric',
            'height_inches' => 'required|numeric',
            'weight_kg' => 'required|numeric',
            'emergency_contact' => 'required',
            'email' => 'nullable|email|unique:patients',
            'password' => 'required|min:6',
        ]);

        $patient = new Patient([
            'unique_patient_id' => $request->unique_patient_id,
            'full_name' => $request->full_name,
            'dob' => $request->dob,
            'gender' => $request->gender,
            'religion' => $request->religion,
            'blood_group' => $request->blood_group,
            'height_feet' => $request->height_feet,
            'height_inches' => $request->height_inches,
            'weight_kg' => $request->weight_kg,
            'weight_pounds' => $request->weight_kg * 2.20462, // Convert kg to pounds
            'bmi' => $this->calculateBMI($request->height_feet, $request->height_inches, $request->weight_kg),
            'emergency_contact' => $request->emergency_contact,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $patient->save();

        return redirect()->back()->with('success', 'Patient information saved successfully!');
    }

    private function calculateBMI($height_feet, $height_inches, $weight_kg)
    {
        $height_meters = (($height_feet * 12) + $height_inches) * 0.0254;
        return $weight_kg / ($height_meters * $height_meters);
    }

    /**------------------------------
     * Store => sensitive_information
     */
    public function sensitiveInformation(Request $request)
    {
        $request->validate([
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

        SensitiveInformation::create($request->all());

        return redirect()->back()->with('success', 'Health record saved successfully.');
    }
    /**---------------------------------
     * Store => genetic_disease_profiles
     */
    public function geneticDiseaseProfile(Request $request)
    {
        // Validate the request
        $validatedData = $request->validate([
            'diabetes' => 'boolean',
            'stroke' => 'boolean',
            'heart_diseases' => 'boolean',
            'hyper_excitation' => 'boolean',
            'blood_pressure' => 'boolean',
            'balding' => 'boolean',
            'vitiligo' => 'boolean',
            'disability' => 'boolean',
            'psoriasis' => 'boolean',
            'other_diseases' => 'nullable|string',
            'comments' => 'nullable|string',
        ]);

        GeneticDiseaseProfile::create($validatedData);

        // Redirect back with success message or to a confirmation page
        return redirect()->back()->with('success', 'Genetic Disease Profile saved successfully!');
    }
    /**------------------------
     * Store => other_personal_information
     */
    public function otherPersonalInformation(Request $request)
    {
        $request->validate([
            'marital_status' => 'required',
            'home_address' => 'required|string|max:255',
            'office_address' => 'nullable|string|max:255',
            'email_address' => 'nullable|email|max:255',
            'phone_number' => 'nullable|string|max:20',
            'last_blood_donated' => 'nullable|date',
            'health_insurance_number' => 'nullable|string|max:50',
            'family_physician' => 'nullable|string|max:255',
            'physician_contact' => 'nullable|string|max:20',
            'pregnancy_status' => 'required|in:1,2',
            'menstrual_cycle' => 'required|in:1,2,3',
            'activity_status' => 'required|in:1,2,3,4,5',
            'hereditary_disease' => 'nullable|string|max:1000',
        ]);
        
        // Save data to the database
        $info = new OtherPersonalInformation();
        $info->marital_status = $request->input('marital_status');
        $info->home_address = $request->input('home_address');
        $info->office_address = $request->input('office_address');
        $info->email_address = $request->input('email_address');
        $info->phone_number = $request->input('phone_number');
        $info->last_blood_donated = $request->input('last_blood_donated');
        $info->health_insurance_number = $request->input('health_insurance_number');
        $info->family_physician = $request->input('family_physician');
        $info->physician_contact = $request->input('physician_contact');
        $info->pregnancy_status = $request->input('pregnancy_status');
        $info->menstrual_cycle = $request->input('menstrual_cycle');
        $info->activity_status = $request->input('activity_status');
        $info->hereditary_disease = $request->input('hereditary_disease');
        $info->save();

        // Optionally, redirect back or to a success page
        return redirect()->back()->with('success', 'Personal Information saved successfully!');
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
     */
    public function vaccinationRecord()
    {
        return view('pages.info-vaccination-record');
    }
    public function saveVaccinations(Request $request)
    {
        $vaccines = ['BCG', 'Pentavalent', 'HepB', 'HiB', 'MR', 'PCV', 'IPV', 'fIPV', 'T-d'];
        $dose01 = $request->input('dose_01');
        $dose02 = $request->input('dose_02');
        $dose03 = $request->input('dose_03');
        $boosters = $request->input('booster');
        $uploadTools = $request->file('uploader_tool');

        foreach ($vaccines as $index => $vaccine) {
            $vaccination = new Vaccination();
            $vaccination->vaccine = $vaccine;
            $vaccination->dose_01 = $dose01[$index] ?? null;
            $vaccination->dose_02 = $dose02[$index] ?? null;
            $vaccination->dose_03 = $dose03[$index] ?? null;
            $vaccination->booster = $boosters[$index] ?? null;

            if (isset($uploadTools[$index])) {
                $file = $uploadTools[$index];
                $filePath = $file->store('uploads', 'public');
                $vaccination->uploader_tool = $filePath;
            }

            $vaccination->save();
        }

        // Process Paid vaccinations
        $paidVaccines = [
            ['InfluVax Tetra', 'Flu/Influenza'],
            ['Rabix-Vc', 'Rabies'],
            ['IngoVax ACWY', 'Meningitis'],
            ['Hepa B', 'Hepatitis B'],
            ['Vaxphoid', 'Typhoid'],
            ['Vaxitet', 'Tetanus'],
            ['PrevaHAV', 'Hepatitis A'],
            ['ChloVax', 'Cholera'],
            ['PapiloVax', 'Cervical Cancer'],
            ['Varizost', 'Chicken Pox'],
            ['PrenoVax 23', 'Pneumonia']
        ];
        $paidDose01 = $request->input('paid_dose_01');
        $paidDose02 = $request->input('paid_dose_02');
        $paidDose03 = $request->input('paid_dose_03');
        $paidBoosters = $request->input('paid_booster');
        $paidUploadTools = $request->file('paid_uploader_tool');

        foreach ($paidVaccines as $index => $vaccine) {
            $paidVaccination = new PaidVaccination();
            $paidVaccination->market_name = $vaccine[0];
            $paidVaccination->applicable_for = $vaccine[1];
            $paidVaccination->dose_01 = $paidDose01[$index] ?? null;
            $paidVaccination->dose_02 = $paidDose02[$index] ?? null;
            $paidVaccination->dose_03 = $paidDose03[$index] ?? null;
            $paidVaccination->booster = $paidBoosters[$index] ?? null;

            if (isset($paidUploadTools[$index])) {
                $file = $paidUploadTools[$index];
                $filePath = $file->store('uploads', 'public');
                $paidVaccination->uploader_tool = $filePath;
            }

            $paidVaccination->save();
        }

        // Process Covid-19 section
        $vaccination = new Vaccination();
        $vaccination->location = $request->input('location');
        $vaccination->covid_date = $request->input('covid_date');
        $vaccination->manufacturer = $request->input('manufacturer');
        $vaccination->dose_01 = $request->input('covid_dose_01');
        $vaccination->dose_02 = $request->input('covid_dose_02');
        $vaccination->dose_03 = $request->input('covid_dose_03');
        $vaccination->booster = $request->input('covid_booster');
        $vaccination->certificate_number = $request->input('certificate_number');
        $vaccination->antibody_test = $request->input('antibody_test');

        $covidUploadTools = [
            $request->file('covid_uploader_tool_01'),
            $request->file('covid_uploader_tool_02'),
            $request->file('covid_uploader_tool_03'),
            $request->file('covid_uploader_tool_booster')
        ];

        foreach ($covidUploadTools as $file) {
            if ($file) {
                $filePath = $file->store('uploads', 'public');
                $vaccination->uploader_tool = $filePath;
            }
        }

        $vaccination->save();

        return redirect()->back()->with('success', 'Vaccination records saved successfully!');
    }
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






    /**
     * Display a listing of the resource.
     */
    
    public function index()
    {
        $categories = Category::where('status', Category::STATUS_ACTIVE)->orderBy('updated_at', 'desc')->get();
        return view('category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.information-patient.registry-form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryStoreRequest $request)
    {
        try {
            $created = Category::firstOrCreate(['name' => $request->name, 'description' => $request->description, 'user_id' => auth()->user()->id]);

            if ($created) { // inserted success
                \Log::info(" file '" . __CLASS__ . "' , function '" . __FUNCTION__ . "' , Message : Success inserting data : " . json_encode([request()->all()]));
                return redirect()->route('category.index')
                    ->withSuccess('created successfully...!');
            }
            throw new \Exception('fails not created..!', 403);
        } catch (\Illuminate\Database\QueryException $e) { // Handle query exception
            \Log::error(" file '" . __CLASS__ . "' , function '" . __FUNCTION__ . "' , Message : Error Query inserting data : " . $e->getMessage() . '');
            // You can also return a response to the user
            return redirect()
                ->back()
                ->withInput()
                ->with('error', "error occurs failed to proceed...! " . $e->getMessage());
        } catch (\Exception $e) { // Handle any runtime exception
            \Log::error(" file '" . __CLASS__ . "' , function '" . __FUNCTION__ . "' , Message : Error inserting data : " . $e->getMessage() . '');
            return redirect()
                ->back()
                ->withInput()
                ->with('error', "error occurs failed to proceed...! " . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        return view('category.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryUpdateRequest $request, Category $category)
    {
        try {
            $category->updateOrFail(['name' => $request->name, 'description' => $request->description, 'user_id' => auth()->user()->id]);
            \Log::info(" file '" . __CLASS__ . "' , function '" . __FUNCTION__ . "' , Message : Success updating data : " . json_encode([request()->all(), $category]));
            return redirect()->route('category.index')
                ->withSuccess('Updated Successfully...!');
        } catch (\Illuminate\Database\QueryException $e) { // Handle query exception
            \Log::error(" file '" . __CLASS__ . "' , function '" . __FUNCTION__ . "' , Message : Error Query updating data : " . $e->getMessage());
            // You can also return a response to the user
            return redirect()
                ->back()
                ->withInput()
                ->with('error', "error occurs failed to proceed...! " . $e->getMessage());
        } catch (\Exception $e) { // Handle any runtime exception
            \Log::error(" file '" . __CLASS__ . "' , function '" . __FUNCTION__ . "' , Message : Error updating data : " . $e->getMessage() . '');
            return redirect()
                ->back()
                ->withInput()
                ->with('error', "error occurs failed to proceed...! " . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        try {
            $category->delete();
            \Log::info(" file '" . __CLASS__ . "' , function '" . __FUNCTION__ . "' , Message : Success deleting data : " . json_encode([request()->all(), $category]));
            return redirect()->route('category.index')
                ->withSuccess('Deleted Successfully.');
        } catch (\Illuminate\Database\QueryException $e) { // Handle query exception
            \Log::error(" file '" . __CLASS__ . "' , function '" . __FUNCTION__ . "' , Message : Error Query deleting data : " . $e->getMessage() . '');
            // You can also return a response to the user
            return redirect()
                ->back()
                ->withInput()
                ->with('error', "error occurs failed to proceed...! " . $e->getMessage());
        } catch (\Exception $e) { // Handle any runtime exception
            \Log::error(" file '" . __CLASS__ . "' , function '" . __FUNCTION__ . "' , Message : Error deleting data : " . $e->getMessage() . '');
            return redirect()
                ->back()
                ->withInput()
                ->with('error', "error occurs failed to proceed...! " . $e->getMessage());
        }
    }
}
