<x-app-layout>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">Patient Registry Form</h4>
                </div><!-- end card header -->
                <div class="card-body">
                    <div class="row">
                        <div class="col-xxl-3 col-md-6">
                            <div class="row mb-3">
                                <label for="basiInput" class="form-label col-6"><strong>Unique Patient ID</strong></label>
                                <label for="basiInput" class="form-label col-6"><strong>XXXXXXXX</strong></label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="row mb-2">
                                <div class="col-lg-3">
                                    <label for="nameInput" class="form-label">Full Name</label>
                                </div>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control" id="nameInput" placeholder="Enter your name">
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-lg-3">
                                    <label for="websiteUrl" class="form-label">Date Of Birth</label>
                                </div>
                                <div class="col-lg-9">
                                    <input type="url" class="form-control" id="websiteUrl" placeholder="Enter your url">
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-lg-3">
                                    <label for="dateInput" class="form-label">Age</label>
                                </div>
                                <div class="col-lg-9">
                                    <input type="date" class="form-control" id="dateInput">
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-lg-3">
                                    <label for="timeInput" class="form-label">Gender</label>
                                </div>
                                <div class="col-lg-9">
                                    <select class="form-select" id="inlineFormSelectPref">
                                        <option value="1">Male</option>
                                        <option value="2">Female</option>
                                        <option value="3">Intersex</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-lg-3">
                                    <label for="leaveemails" class="form-label">Blood Group</label>
                                </div>
                                <div class="col-lg-9">
                                    <select class="form-select" id="inlineFormSelectPref">
                                        <option value="1" selected>A+</option>
                                        <option value="2">A-</option>
                                        <option value="3">B+</option>
                                        <option value="4">B-</option>
                                        <option value="5">O+</option>
                                        <option value="6">O-</option>
                                        <option value="7">K+</option>
                                        <option value="8">K-</option>
                                        <option value="9">AB+</option>
                                        <option value="10">AB-</option>
                                        <option value="11">Unknown</option>
                                    </select>
                                </div>
                            </div>
                        </div> <!--end col-->

                        <div class="col-md-6">
                            <div class="row mb-2">
                                <div class="col-lg-3">
                                    <label for="nameInput" class="form-label">Height</label>
                                </div>
                                <div class="col-lg-9">
                                    <!-- Multiple Inputs -->
                                    <div class="input-group">
                                        <input type="number" aria-label="First name" class="form-control">
                                        <span class="input-group-text">Feet</span>
                                        <input type="number" aria-label="First name" class="form-control">
                                        <span class="input-group-text">Inches</span>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-lg-3">
                                    <label for="websiteUrl" class="form-label">Weight</label>
                                </div>
                                <div class="col-lg-9">
                                    <!-- Multiple Inputs -->
                                    <div class="input-group">
                                        <input type="number" aria-label="First name" class="form-control">
                                        <span class="input-group-text">KGs</span>
                                        <input type="number" aria-label="First name" class="form-control">
                                        <span class="input-group-text">Pounds</span>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-lg-3">
                                    <label for="dateInput" class="form-label">BMI</label>
                                </div>
                                <div class="col-lg-9">
                                    <textarea class="form-control" id="meassageInput" rows="1" placeholder="Enter your message"></textarea>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-lg-3">
                                    <label for="timeInput" class="form-label">Religion</label>
                                </div>
                                <div class="col-lg-9">
                                    <select class="form-select" id="inlineFormSelectPref">
                                        <option value="1">Male</option>
                                        <option value="1">Female</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-lg-3">
                                    <label for="leaveemails" class="form-label">Emergency Contact</label>
                                </div>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control" id="nameInput" placeholder="Enter your name">
                                </div>
                            </div>
                        </div>

                        <div class="col-12 text-center">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!--end col-->
    </div>
    <!--End => Step1-->

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
                                    <input class="form-check-input" type="checkbox" id="diabetesCheckbox" name="diabetes" checked>
                                    <label class="form-check-label" for="diabetesCheckbox">
                                        Diabetes
                                    </label>
                                </div>
                                <!-- Custom Checkboxes -->
                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="checkbox" id="strokeCheckbox" name="stroke" checked>
                                    <label class="form-check-label" for="strokeCheckbox">
                                        Stroke
                                    </label>
                                </div>
                                <!-- Custom Checkboxes -->
                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="checkbox" id="heartDiseasesCheckbox" name="heart_diseases" checked>
                                    <label class="form-check-label" for="heartDiseasesCheckbox">
                                        Heart Diseases
                                    </label>
                                </div>
                                <!-- Custom Checkboxes -->
                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="checkbox" id="hyperExcitationCheckbox" name="hyper_excitation" checked>
                                    <label class="form-check-label" for="hyperExcitationCheckbox">
                                        Hyper Excitation
                                    </label>
                                </div>
                                <!-- Custom Checkboxes -->
                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="checkbox" id="bloodPressureCheckbox" name="blood_pressure" checked>
                                    <label class="form-check-label" for="bloodPressureCheckbox">
                                        Blood Pressure
                                    </label>
                                </div>
                                <!-- Custom Checkboxes -->
                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="checkbox" id="baldingCheckbox" name="balding" checked>
                                    <label class="form-check-label" for="baldingCheckbox">
                                        Balding
                                    </label>
                                </div>
                                <!-- Custom Checkboxes -->
                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="checkbox" id="vitiligoCheckbox" name="vitiligo" checked>
                                    <label class="form-check-label" for="vitiligoCheckbox">
                                        Vitiligo
                                    </label>
                                </div>
                                <!-- Custom Checkboxes -->
                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="checkbox" id="disabilityCheckbox" name="disability" checked>
                                    <label class="form-check-label" for="disabilityCheckbox">
                                        Disability (Please specify in comment box)
                                    </label>
                                </div>
                                <!-- Custom Checkboxes -->
                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="checkbox" id="psoriasisCheckbox" name="psoriasis" checked>
                                    <label class="form-check-label" for="psoriasisCheckbox">
                                        Psoriasis
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <label for="messageInput" class="form-label">Please mention in case if you have a hereditary disease which is not included in the list</label>
                                <textarea class="form-control" id="messageInput" name="other_diseases" rows="10" placeholder="Enter your message"></textarea>
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
                                                    <option value="1">Single</option>
                                                    <option value="2">Married</option>
                                                    <option value="3">Married with Kids</option>
                                                    <option value="4">Divorced</option>
                                                    <option value="5">Widowed</option>
                                                    <option value="6">Unwilling to Disclose</option>
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
                                                    <option value="1">Yes</option>
                                                    <option value="2">No</option>
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
                                                    <option value="1">Regular</option>
                                                    <option value="2">Irregular</option>
                                                    <option value="3">Menopaused</option>
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
                                                    <option value="1">Immobile/Paralyzed</option>
                                                    <option value="2">Disabled</option>
                                                    <option value="3">Not Very Active</option>
                                                    <option value="4">Moderately Active</option>
                                                    <option value="5">Highly Active</option>
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
    <!--end row-->
    
</x-app-layout>
