<x-app-layout>
        
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">Patient Registry Form</h4>
                </div><!-- end card header -->
                <div class="card-body">
                    <form action="{{ route('patient-registry.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-xxl-3 col-md-6">
                                <div class="row mb-3">
                                    <label for="uniquePatientId" class="form-label col-6"><strong>Unique Patient ID</strong></label>
                                    <div class="col-6">
                                        <input type="text" class="form-control" id="uniquePatientId" name="unique_patient_id" placeholder="Auto-generated" readonly>
                                        @error('unique_patient_id')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row mb-2">
                                    <div class="col-lg-3">
                                        <label for="email" class="form-label">Email</label>
                                    </div>
                                    <div class="col-lg-9">
                                        <input type="email" name="email" class="form-control" id="email" placeholder="Enter your email" value="{{ old('email') }}">
                                        @error('email')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row mb-2">
                                    <div class="col-lg-3">
                                        <label for="password" class="form-label">Password</label>
                                    </div>
                                    <div class="col-lg-9">
                                        <input type="password" name="password" class="form-control" id="password" placeholder="Enter your password">
                                        @error('password')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row mb-2">
                                    <div class="col-lg-3">
                                        <label for="name" class="form-label">Full Name</label>
                                    </div>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter your full name" value="{{ old('name') }}">
                                        @error('name')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-lg-3">
                                        <label for="dob" class="form-label">Date Of Birth</label>
                                    </div>
                                    <div class="col-lg-9">
                                        <input type="date" class="form-control" id="dob" name="dob" placeholder="Enter your date of birth" value="{{ old('dob') }}">
                                        @error('dob')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-lg-3">
                                        <label for="age" class="form-label">Age</label>
                                    </div>
                                    <div class="col-lg-9">
                                        <input type="number" class="form-control" id="age" name="age" placeholder="Enter your age" value="{{ old('age') }}">
                                        @error('age')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-lg-3">
                                        <label for="gender" class="form-label">Gender</label>
                                    </div>
                                    <div class="col-lg-9">
                                        <select class="form-select" id="gender" name="gender">
                                            <option value="Male" {{ old('gender') == 'Male' ? 'selected' : '' }}>Male</option>
                                            <option value="Female" {{ old('gender') == 'Female' ? 'selected' : '' }}>Female</option>
                                            <option value="Other" {{ old('gender') == 'Other' ? 'selected' : '' }}>Other</option>
                                        </select>
                                        @error('gender')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-lg-3">
                                        <label for="bloodGroup" class="form-label">Blood Group</label>
                                    </div>
                                    <div class="col-lg-9">
                                        <select class="form-select" id="bloodGroup" name="blood_group">
                                            <option value="A+" {{ old('blood_group') == 'A+' ? 'selected' : '' }}>A+</option>
                                            <option value="A-" {{ old('blood_group') == 'A-' ? 'selected' : '' }}>A-</option>
                                            <option value="B+" {{ old('blood_group') == 'B+' ? 'selected' : '' }}>B+</option>
                                            <option value="B-" {{ old('blood_group') == 'B-' ? 'selected' : '' }}>B-</option>
                                            <option value="O+" {{ old('blood_group') == 'O+' ? 'selected' : '' }}>O+</option>
                                            <option value="O-" {{ old('blood_group') == 'O-' ? 'selected' : '' }}>O-</option>
                                            <option value="K+" {{ old('blood_group') == 'K+' ? 'selected' : '' }}>K+</option>
                                            <option value="K-" {{ old('blood_group') == 'K-' ? 'selected' : '' }}>K-</option>
                                            <option value="AB+" {{ old('blood_group') == 'AB+' ? 'selected' : '' }}>AB+</option>
                                            <option value="AB-" {{ old('blood_group') == 'AB-' ? 'selected' : '' }}>AB-</option>
                                            <option value="Unknown" {{ old('blood_group') == 'Unknown' ? 'selected' : '' }}>Unknown</option>
                                        </select>
                                        @error('blood_group')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div> <!--end col-->
    
                            <div class="col-md-6">
                                <div class="row mb-2">
                                    <div class="col-lg-3">
                                        <label for="heightFeet" class="form-label">Height</label>
                                    </div>
                                    <div class="col-lg-9">
                                        <!-- Multiple Inputs -->
                                        <div class="input-group">
                                            <input type="number" class="form-control" id="heightFeet" name="height_feet" placeholder="Feet" value="{{ old('height_feet') }}">
                                            <span class="input-group-text">Feet</span>
                                            <input type="number" class="form-control" id="heightInches" name="height_inches" placeholder="Inches" value="{{ old('height_inches') }}">
                                            <span class="input-group-text">Inches</span>
                                        </div>
                                        @error('height_feet')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                        @error('height_inches')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-lg-3">
                                        <label for="weightKg" class="form-label">Weight</label>
                                    </div>
                                    <div class="col-lg-9">
                                        <!-- Multiple Inputs -->
                                        <div class="input-group">
                                            <input type="number" class="form-control" id="weightKg" name="weight_kg" placeholder="KGs" value="{{ old('weight_kg') }}">
                                            <span class="input-group-text">KGs</span>
                                            <input type="number" class="form-control" id="weightPounds" name="weight_pounds" placeholder="Pounds" value="{{ old('weight_pounds') }}">
                                            <span class="input-group-text">Pounds</span>
                                        </div>
                                        @error('weight_kg')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                        @error('weight_pounds')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-lg-3">
                                        <label for="bmi" class="form-label">BMI</label>
                                    </div>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control" id="bmi" name="bmi" placeholder="Auto-generated" value="{{ old('bmi') }}">
                                        @error('bmi')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-lg-3">
                                        <label for="religion" class="form-label">Religion</label>
                                    </div>
                                    <div class="col-lg-9">
                                        <select class="form-select" id="religion" name="religion">
                                            <option value="Islam" {{ old('religion') == 'Islam' ? 'selected' : '' }}>Islam</option>
                                            <option value="Christianity" {{ old('religion') == 'Christianity' ? 'selected' : '' }}>Christianity</option>
                                            <option value="Hinduism" {{ old('religion') == 'Hinduism' ? 'selected' : '' }}>Hinduism</option>
                                            <option value="Buddhism" {{ old('religion') == 'Buddhism' ? 'selected' : '' }}>Buddhism</option>
                                            <option value="Other" {{ old('religion') == 'Other' ? 'selected' : '' }}>Other</option>
                                            <option value="Non-Religious" {{ old('religion') == 'Non-Religious' ? 'selected' : '' }}>Non-Religious</option>
                                        </select>
                                        @error('religion')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-lg-3">
                                        <label for="emergencyContact" class="form-label">Emergency Contact</label>
                                    </div>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control" id="emergencyContact" name="emergency_contact" placeholder="Enter emergency contact" value="{{ old('emergency_contact') }}">
                                        @error('emergency_contact')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div> <!--end col-->
    
                        </div> <!--end row-->
    
                        <div class="col-12 text-start">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!--end col-->
    </div>
    <!--End => Step1-->
    

    @auth
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">Sensitive/Confidential Information</h4>
                </div><!-- end card header -->
                <div class="card-body">
                    <form action="{{ route('sensitive-information.store') }}" method="POST">
                        @csrf
                        <!-- Form Fields -->
                        <div class="row mb-2">
                            <div class="col-lg-2">
                                <label for="sexually_active" class="form-label">Sexually Active</label>
                            </div>
                            <div class="col-lg-2">
                                <select class="form-select" name="sexually_active" id="sexually_active">
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                    <option value="Don't Know">Don't Know</option>
                                    <option value="Unwilling to Disclose">Unwilling to Disclose</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-lg-2">
                                <label for="diabetic" class="form-label">Diabetic</label>
                            </div>
                            <div class="col-lg-2">
                                <select class="form-select" name="diabetic" id="diabetic">
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                    <option value="Don't Know">Don't Know</option>
                                    <option value="Unwilling to Disclose">Unwilling to Disclose</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-lg-2">
                                <label for="allergies" class="form-label">Allergies</label>
                            </div>
                            <div class="col-lg-2">
                                <select class="form-select" name="allergies" id="allergies">
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                    <option value="Don't Know">Don't Know</option>
                                    <option value="Unwilling to Disclose">Unwilling to Disclose</option>
                                </select>
                            </div>
                            <div class="col-lg-4">
                                <label for="allergy_details" class="form-label">If Yes, then write the elements you are allergic to</label>
                            </div>
                            <div class="col-lg-4">
                                <textarea class="form-control" name="allergy_details" id="allergy_details" rows="1" placeholder="Enter your message"></textarea>
                            </div>
                        </div>
                        <!-- Add remaining form fields similar to above fields -->
                        <div class="row mb-2">
                            <div class="col-lg-2">
                                <label for="thyroid" class="form-label">Thyroid</label>
                            </div>
                            <div class="col-lg-2">
                                <select class="form-select" name="thyroid" id="thyroid">
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                    <option value="Don't Know">Don't Know</option>
                                    <option value="Unwilling to Disclose">Unwilling to Disclose</option>
                                </select>
                            </div>
                            <div class="col-lg-4">
                                <label for="thyroid_details" class="form-label">If yes, last test results and date</label>
                            </div>
                            <div class="col-lg-4">
                                <textarea class="form-control" name="thyroid_details" id="thyroid_details" rows="1" placeholder="Enter your message"></textarea>
                            </div>
                        </div>
                        <!-- Continue adding other fields as necessary -->
                        <div class="row mb-2">
                            <div class="col-lg-2">
                                <label for="hypertension" class="form-label">Hypertension</label>
                            </div>
                            <div class="col-lg-2">
                                <select class="form-select" name="hypertension" id="hypertension">
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                    <option value="Don't Know">Don't Know</option>
                                    <option value="Unwilling to Disclose">Unwilling to Disclose</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-lg-2">
                                <label for="cholesterol" class="form-label">Cholesterol</label>
                            </div>
                            <div class="col-lg-2">
                                <select class="form-select" name="cholesterol" id="cholesterol">
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                    <option value="Don't Know">Don't Know</option>
                                    <option value="Unwilling to Disclose">Unwilling to Disclose</option>
                                </select>
                            </div>
                            <div class="col-lg-4">
                                <label for="cholesterol_details" class="form-label">If yes, last test results and date</label>
                            </div>
                            <div class="col-lg-4">
                                <textarea class="form-control" name="cholesterol_details" id="cholesterol_details" rows="1" placeholder="Enter your message"></textarea>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-lg-2">
                                <label for="s_creatinine" class="form-label">S Creatinine</label>
                            </div>
                            <div class="col-lg-2">
                                <select class="form-select" name="s_creatinine" id="s_creatinine">
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                    <option value="Don't Know">Don't Know</option>
                                    <option value="Unwilling to Disclose">Unwilling to Disclose</option>
                                </select>
                            </div>
                            <div class="col-lg-4">
                                <label for="s_creatinine_details" class="form-label">If yes, last test results and date</label>
                            </div>
                            <div class="col-lg-4">
                                <textarea class="form-control" name="s_creatinine_details" id="s_creatinine_details" rows="1" placeholder="Enter your message"></textarea>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-lg-2">
                                <label for="smoking" class="form-label">Smoking</label>
                            </div>
                            <div class="col-lg-2">
                                <select class="form-select" name="smoking" id="smoking">
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                    <option value="Don't Know">Don't Know</option>
                                    <option value="Unwilling to Disclose">Unwilling to Disclose</option>
                                </select>
                            </div>
                            <div class="col-lg-4">
                                <label for="smoking_quantity" class="form-label">If yes, how many a day?</label>
                            </div>
                            <div class="col-lg-4">
                                <textarea class="form-control" name="smoking_quantity" id="smoking_quantity" rows="1" placeholder="Enter your message"></textarea>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-lg-2">
                                <label for="alcohol_intake" class="form-label">Alcohol Intake</label>
                            </div>
                            <div class="col-lg-2">
                                <select class="form-select" name="alcohol_intake" id="alcohol_intake">
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                    <option value="Don't Know">Don't Know</option>
                                    <option value="Unwilling to Disclose">Unwilling to Disclose</option>
                                </select>
                            </div>
                            <div class="col-lg-4">
                                <label for="alcohol_frequency" class="form-label">If yes, what type?</label>
                            </div>
                            <div class="col-lg-4">
                                <select class="form-select" name="alcohol_frequency" id="alcohol_frequency">
                                    <option value="Social Drinker">Social Drinker</option>
                                    <option value="Once in a Year">Once in a Year</option>
                                    <option value="Weekly">Weekly</option>
                                    <option value="Monthly">Monthly</option>
                                    <option value="Daily">Daily</option>
                                    <option value="Unwilling to Disclose">Unwilling to Disclose</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-lg-2">
                                <label for="nameInput" class="form-label">Any Drug Abuse History? </label>
                            </div>
                            <div class="col-lg-2">
                                <select class="form-select" name="drug_abuse_history" id="drug_abuse_history">
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                    <option value="Don't Know">Don't Know</option>
                                    <option value="Unwilling to Disclose">Unwilling to Disclose</option>
                                </select>
                            </div>
                            <div class="col-lg-4">
                                <label for="nameInput" class="form-label">If yes, write down the subtstances </label>
                            </div>
                            <div class="col-lg-4">
                                <textarea class="form-control" name="drug_abuse_details" id="drug_abuse_details" rows="1" placeholder="Enter your message"></textarea>
                            </div>
                        </div>
                        <!-- Continue adding other fields as necessary -->
                        <div class="row mb-3">
                            <div class="col-12 text-center">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
        <!--end col-->
    </div>
    <!--End => Step2-->

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">Genetic Disease Profile</h4>
                </div><!-- end card header -->
                <div class="card-body">
                    <form action="{{ route('genetic-disease-profile.store') }}" method="POST">
                        @csrf

                        <div class="row mb-3">
                            <div class="col-md-4">
                                <!-- Custom Checkboxes -->
                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="checkbox" id="diabetesCheckbox" name="disease_diabetes" value="1">
                                    <label class="form-check-label" for="diabetesCheckbox">
                                        Diabetes
                                    </label>
                                </div>
                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="checkbox" id="strokeCheckbox" name="disease_stroke" value="1">
                                    <label class="form-check-label" for="strokeCheckbox">
                                        Stroke
                                    </label>
                                </div>
                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="checkbox" id="heartDiseasesCheckbox" name="disease_heart" value="1">
                                    <label class="form-check-label" for="heartDiseasesCheckbox">
                                        Heart Diseases
                                    </label>
                                </div>
                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="checkbox" id="hyperExcitationCheckbox" name="disease_hyper" value="1">
                                    <label class="form-check-label" for="hyperExcitationCheckbox">
                                        Hyper Excitation
                                    </label>
                                </div>
                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="checkbox" id="bloodPressureCheckbox" name="disease_pressure" value="1">
                                    <label class="form-check-label" for="bloodPressureCheckbox">
                                        Blood Pressure
                                    </label>
                                </div>
                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="checkbox" id="baldingCheckbox" name="disease_balding" value="1">
                                    <label class="form-check-label" for="baldingCheckbox">
                                        Balding
                                    </label>
                                </div>
                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="checkbox" id="vitiligoCheckbox" name="disease_vitiligo" value="1">
                                    <label class="form-check-label" for="vitiligoCheckbox">
                                        Vitiligo
                                    </label>
                                </div>
                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="checkbox" id="disabilityCheckbox" name="disease_disability" value="1">
                                    <label class="form-check-label" for="disabilityCheckbox">
                                        Disability (Please specify in comment box)
                                    </label>
                                </div>
                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="checkbox" id="psoriasisCheckbox" name="disease_psoriasis" value="1">
                                    <label class="form-check-label" for="psoriasisCheckbox">
                                        Psoriasis
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <label for="additionalComments" class="form-label mt-3">Please mention in case if you have a hereditary disease which is not included in the list</label>
                                <textarea class="form-control" id="additionalComments" name="additional_comments" rows="5" placeholder="Enter additional comments"></textarea>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-12 text-center">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!--end col-->
    </div>
    <!--End => Step3-->

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">Other Personal Information</h4>
                </div><!-- end card header -->
                <div class="card-body">
                    <form method="POST" action="{{ route('personal-information.store') }}">
                        @csrf
    
                        <div class="row mb-3">
                            <div class="col-md-8">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="row mb-2">
                                            <div class="col-lg-5">
                                                <label for="maritalStatus" class="form-label">Marital Status</label>
                                            </div>
                                            <div class="col-lg-7">
                                                <select class="form-select" id="maritalStatus" name="marital_status">
                                                    <option value="Single">Single</option>
                                                    <option value="Married">Married</option>
                                                    <option value="Married with Kids">Married with Kids</option>
                                                    <option value="Divorced">Divorced</option>
                                                    <option value="Widowed">Widowed</option>
                                                    <option value="Unwilling to Disclose">Unwilling to Disclose</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="row mb-2">
                                            <div class="col-lg-5">
                                                <label for="homeAddress" class="form-label">Home Address</label>
                                            </div>
                                            <div class="col-lg-7">
                                                <input type="text" class="form-control" id="homeAddress" name="home_address" placeholder="Enter your home address">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="row mb-2">
                                            <div class="col-lg-5">
                                                <label for="officeAddress" class="form-label">Office Address</label>
                                            </div>
                                            <div class="col-lg-7">
                                                <input type="text" class="form-control" id="officeAddress" name="office_address" placeholder="Enter your office address">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="row mb-2">
                                            <div class="col-lg-5">
                                                <label for="emailAddress" class="form-label">Email Address</label>
                                            </div>
                                            <div class="col-lg-7">
                                                <input type="email" class="form-control" id="emailAddress" name="email_address" placeholder="Enter your email address">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="row mb-2">
                                            <div class="col-lg-5">
                                                <label for="phoneNumber" class="form-label">Phone Number</label>
                                            </div>
                                            <div class="col-lg-7">
                                                <input type="text" class="form-control" id="phoneNumber" name="phone_number" placeholder="Enter your phone number">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="row mb-2">
                                            <div class="col-lg-5">
                                                <label for="lastBloodDonated" class="form-label">Last Blood Donated</label>
                                            </div>
                                            <div class="col-lg-7">
                                                <input type="date" class="form-control" id="lastBloodDonated" name="last_blood_donated">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="row mb-2">
                                            <div class="col-lg-5">
                                                <label for="healthInsurance" class="form-label">Health Insurance #</label>
                                            </div>
                                            <div class="col-lg-7">
                                                <input type="text" class="form-control" id="healthInsurance" name="health_insurance_number" placeholder="Enter your health insurance number">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="row mb-2">
                                            <div class="col-lg-5">
                                                <label for="familyPhysician" class="form-label">Family Physician (If any)</label>
                                            </div>
                                            <div class="col-lg-7">
                                                <input type="text" class="form-control" id="familyPhysician" name="family_physician" placeholder="Enter your family physician's name">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="row mb-2">
                                            <div class="col-lg-5">
                                                <label for="physicianContact" class="form-label">Physician's Contact</label>
                                            </div>
                                            <div class="col-lg-7">
                                                <input type="text" class="form-control" id="physicianContact" name="physician_contact" placeholder="Enter your physician's contact">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="row mb-2">
                                            <div class="col-lg-5">
                                                <label for="pregnancyStatus" class="form-label">Pregnancy Status</label>
                                            </div>
                                            <div class="col-lg-7">
                                                <select class="form-select" id="pregnancyStatus" name="pregnancy_status">
                                                    <option value="Yes">Yes</option>
                                                    <option value="No">No</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="row mb-2">
                                            <div class="col-lg-5">
                                                <label for="menstrualCycle" class="form-label">Menstrual Cycle</label>
                                            </div>
                                            <div class="col-lg-7">
                                                <select class="form-select" id="menstrualCycle" name="menstrual_cycle">
                                                    <option value="Regular">Regular</option>
                                                    <option value="Irregular">Irregular</option>
                                                    <option value="Menopaused">Menopaused</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="row mb-2">
                                            <div class="col-lg-5">
                                                <label for="activityStatus" class="form-label">Activity Status</label>
                                            </div>
                                            <div class="col-lg-7">
                                                <select class="form-select" id="activityStatus" name="activity_status">
                                                    <option value="Immobile/Paralyzed">Immobile/Paralyzed</option>
                                                    <option value="Disabled">Disabled</option>
                                                    <option value="Not Very Active">Not Very Active</option>
                                                    <option value="Moderately Active">Moderately Active</option>
                                                    <option value="Highly Active">Highly Active</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="hereditaryDisease" class="form-label">Please mention if you have a hereditary disease not listed above</label>
                                <textarea class="form-control" id="hereditaryDisease" name="hereditary_disease" rows="10" placeholder="Enter your hereditary disease information"></textarea>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-12 text-center">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!--end col-->
    </div>
    <!--End => Step4-->
    @endauth
</x-app-layout>
