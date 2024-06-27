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
                                    <div class="input-group mb-3">
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
                                    <div class="input-group mb-3">
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
    <!--end row-->

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">Sensitive/Confidential Information</h4>
                </div><!-- end card header -->
                <div class="card-body">
                    <!--Row Item-->
                    <div class="row mb-2">
                        <div class="col-lg-2">
                            <label for="nameInput" class="form-label">Sexually Active</label>
                        </div>
                        <div class="col-lg-2">
                            <select class="form-select" id="inlineFormSelectPref">
                                <option value="1">Yes</option>
                                <option value="2">No</option>
                                <option value="3">Don't Know</option>
                                <option value="4">Unwilling to Disclose</option>
                            </select>
                        </div>
                    </div>
                    <!--Row Item-->
                    <div class="row mb-2">
                        <div class="col-lg-2">
                            <label for="nameInput" class="form-label">Diabetic </label>
                        </div>
                        <div class="col-lg-2">
                            <select class="form-select" id="inlineFormSelectPref">
                                <option value="1">Yes</option>
                                <option value="2">No</option>
                                <option value="3">Don't Know</option>
                                <option value="4">Unwilling to Disclose</option>
                            </select>
                        </div>
                    </div>
                    <!--Row Item-->
                    <div class="row mb-2">
                        <div class="col-lg-2">
                            <label for="nameInput" class="form-label">Allergies</label>
                        </div>
                        <div class="col-lg-2">
                            <select class="form-select" id="inlineFormSelectPref">
                                <option value="1">Yes</option>
                                <option value="2">No</option>
                                <option value="3">Don't Know</option>
                                <option value="4">Unwilling to Disclose</option>
                            </select>
                        </div>
                        <div class="col-lg-4">
                            <label for="nameInput" class="form-label">If Yes, then write the elements you are allergic to</label>
                        </div>
                        <div class="col-lg-4">
                            <textarea class="form-control" id="meassageInput" rows="1" placeholder="Enter your message"></textarea>
                        </div>
                    </div>
                    <!--Row Item-->
                    <div class="row mb-2">
                        <div class="col-lg-2">
                            <label for="nameInput" class="form-label">Thyroid</label>
                        </div>
                        <div class="col-lg-2">
                            <select class="form-select" id="inlineFormSelectPref">
                                <option value="1">Yes</option>
                                <option value="2">No</option>
                                <option value="3">Don't Know</option>
                                <option value="4">Unwilling to Disclose</option>
                            </select>
                        </div>
                        <div class="col-lg-4">
                            <label for="nameInput" class="form-label">If yes, last test results and date </label>
                        </div>
                        <div class="col-lg-4">
                            <textarea class="form-control" id="meassageInput" rows="1" placeholder="Enter your message"></textarea>
                        </div>
                    </div>
                    <!--Row Item-->
                    <div class="row mb-2">
                        <div class="col-lg-2">
                            <label for="nameInput" class="form-label">Hypertension</label>
                        </div>
                        <div class="col-lg-2">
                            <select class="form-select" id="inlineFormSelectPref">
                                <option value="1">Yes</option>
                                <option value="2">No</option>
                                <option value="3">Don't Know</option>
                                <option value="4">Unwilling to Disclose</option>
                            </select>
                        </div>
                    </div>
                    <!--Row Item-->
                    <div class="row mb-2">
                        <div class="col-lg-2">
                            <label for="nameInput" class="form-label">Cholesterol</label>
                        </div>
                        <div class="col-lg-2">
                            <select class="form-select" id="inlineFormSelectPref">
                                <option value="1">Yes</option>
                                <option value="2">No</option>
                                <option value="3">Don't Know</option>
                                <option value="4">Unwilling to Disclose</option>
                            </select>
                        </div>
                        <div class="col-lg-4">
                            <label for="nameInput" class="form-label">If yes, last test results and date</label>
                        </div>
                        <div class="col-lg-4">
                            <textarea class="form-control" id="meassageInput" rows="1" placeholder="Enter your message"></textarea>
                        </div>
                    </div>
                    <!--Row Item-->
                    <div class="row mb-2">
                        <div class="col-lg-2">
                            <label for="nameInput" class="form-label">S Cretanine</label>
                        </div>
                        <div class="col-lg-2">
                            <select class="form-select" id="inlineFormSelectPref">
                                <option value="1">Yes</option>
                                <option value="2">No</option>
                                <option value="3">Don't Know</option>
                                <option value="4">Unwilling to Disclose</option>
                            </select>
                        </div>
                        <div class="col-lg-4">
                            <label for="nameInput" class="form-label">If yes, last test results and date </label>
                        </div>
                        <div class="col-lg-4">
                            <textarea class="form-control" id="meassageInput" rows="1" placeholder="Enter your message"></textarea>
                        </div>
                    </div>
                    <!--Row Item-->
                    <div class="row mb-2">
                        <div class="col-lg-2">
                            <label for="nameInput" class="form-label">Smoking</label>
                        </div>
                        <div class="col-lg-2">
                            <select class="form-select" id="inlineFormSelectPref">
                                <option value="1">Yes</option>
                                <option value="2">No</option>
                                <option value="3">Don't Know</option>
                                <option value="4">Unwilling to Disclose</option>
                            </select>
                        </div>
                        <div class="col-lg-4">
                            <label for="nameInput" class="form-label">If yes, how many a day? </label>
                        </div>
                        <div class="col-lg-4">
                            <textarea class="form-control" id="meassageInput" rows="1" placeholder="Enter your message"></textarea>
                        </div>
                    </div>
                    <!--Row Item-->
                    <div class="row mb-2">
                        <div class="col-lg-2">
                            <label for="nameInput" class="form-label">Alcohol Intake </label>
                        </div>
                        <div class="col-lg-2">
                            <select class="form-select" id="inlineFormSelectPref">
                                <option value="1">Yes</option>
                                <option value="2">No</option>
                                <option value="3">Don't Know</option>
                                <option value="4">Unwilling to Disclose</option>
                            </select>
                        </div>
                        <div class="col-lg-4">
                            <label for="nameInput" class="form-label">If yes, what type? </label>
                        </div>
                        <div class="col-lg-4">
                            <select class="form-select" id="inlineFormSelectPref">
                                <option value="1">Social Drinker </option>
                                <option value="2">Once in a Year </option>
                                <option value="3">Weekly</option>
                                <option value="4">Monthly</option>
                                <option value="5">Daily</option>
                                <option value="6">Unwilling to Disclose</option>
                            </select>
                        </div>
                    </div>
                    <!--Row Item-->
                    <div class="row mb-2">
                        <div class="col-lg-2">
                            <label for="nameInput" class="form-label">Any Drug Abuse History? </label>
                        </div>
                        <div class="col-lg-2">
                            <select class="form-select" id="inlineFormSelectPref">
                                <option value="1">Yes</option>
                                <option value="2">No</option>
                                <option value="3">Don't Know</option>
                                <option value="4">Unwilling to Disclose</option>
                            </select>
                        </div>
                        <div class="col-lg-4">
                            <label for="nameInput" class="form-label">If yes, write down the subtstances </label>
                        </div>
                        <div class="col-lg-4">
                            <textarea class="form-control" id="meassageInput" rows="1" placeholder="Enter your message"></textarea>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-12 text-center">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </div>


                </div>
            </div>
        </div>
        <!--end col-->
    </div>
    <!--end row-->

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">Genetic Disease Profile</h4>
                </div><!-- end card header -->
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <!-- Custom Checkboxes -->
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox" id="formCheck6" checked>
                                <label class="form-check-label" for="formCheck6">
                                    Diabetes
                                </label>
                            </div>
                            <!-- Custom Checkboxes -->
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox" id="formCheck6" checked>
                                <label class="form-check-label" for="formCheck6">
                                    Stroke
                                </label>
                            </div>
                            <!-- Custom Checkboxes -->
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox" id="formCheck6" checked>
                                <label class="form-check-label" for="formCheck6">
                                    Heart Diseases
                                </label>
                            </div>
                            <!-- Custom Checkboxes -->
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox" id="formCheck6" checked>
                                <label class="form-check-label" for="formCheck6">
                                    Hyper Excitation
                                </label>
                            </div>
                            <!-- Custom Checkboxes -->
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox" id="formCheck6" checked>
                                <label class="form-check-label" for="formCheck6">
                                    Blood Pressure
                                </label>
                            </div>
                            <!-- Custom Checkboxes -->
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox" id="formCheck6" checked>
                                <label class="form-check-label" for="formCheck6">
                                    Balding
                                </label>
                            </div>
                            <!-- Custom Checkboxes -->
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox" id="formCheck6" checked>
                                <label class="form-check-label" for="formCheck6">
                                    Vitiligo
                                </label>
                            </div>
                            <!-- Custom Checkboxes -->
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox" id="formCheck6" checked>
                                <label class="form-check-label" for="formCheck6">
                                    Disabillity (Please sepcify in comment box)
                                </label>
                            </div>
                            <!-- Custom Checkboxes -->
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox" id="formCheck6" checked>
                                <label class="form-check-label" for="formCheck6">
                                    Psoriasis
                                </label>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <label for="meassageInput" class="form-label">Please mention in case if you have a hereditary disease which is not included in the list</label>
                            <textarea class="form-control" id="meassageInput" rows="10" placeholder="Enter your message"></textarea>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-12 text-center">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </div>


                </div>
            </div>
        </div>
        <!--end col-->
    </div>
    <!--end row-->

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">Other Personal Information</h4>
                </div><!-- end card header -->
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-md-8">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="row mb-2">
                                        <div class="col-lg-5">
                                            <label for="nameInput" class="form-label">Marital Status</label>
                                        </div>
                                        <div class="col-lg-7">
                                            <select class="form-select" id="inlineFormSelectPref">
                                                <option value="1">Single</option>
                                                <option value="2">Married</option>
                                                <option value="3">Married with Kids</option>
                                                <option value="4">Divorced</option>
                                                <option value="5">Widowed</option>
                                                <option value="6">Unwilling to Disclose	</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="row mb-2">
                                        <div class="col-lg-5">
                                            <label for="nameInput" class="form-label">Home Address</label>
                                        </div>
                                        <div class="col-lg-7">
                                            <input type="text" class="form-control" id="nameInput" placeholder="Enter your name">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="row mb-2">
                                        <div class="col-lg-5">
                                            <label for="nameInput" class="form-label">Office Address</label>
                                        </div>
                                        <div class="col-lg-7">
                                            <input type="text" class="form-control" id="nameInput" placeholder="Enter your name">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="row mb-2">
                                        <div class="col-lg-5">
                                            <label for="nameInput" class="form-label">Email Address</label>
                                        </div>
                                        <div class="col-lg-7">
                                            <input type="text" class="form-control" id="nameInput" placeholder="Enter your name">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="row mb-2">
                                        <div class="col-lg-5">
                                            <label for="nameInput" class="form-label">Phone Number</label>
                                        </div>
                                        <div class="col-lg-7">
                                            <input type="text" class="form-control" id="nameInput" placeholder="Enter your name">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="row mb-2">
                                        <div class="col-lg-5">
                                            <label for="nameInput" class="form-label">Last Blood Donated</label>
                                        </div>
                                        <div class="col-lg-7">
                                            <input type="date" class="form-control" id="nameInput" placeholder="Enter your name">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="row mb-2">
                                        <div class="col-lg-5">
                                            <label for="nameInput" class="form-label">Health Insurance #</label>
                                        </div>
                                        <div class="col-lg-7">
                                            <input type="text" class="form-control" id="nameInput" placeholder="Enter your name">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="row mb-2">
                                        <div class="col-lg-5">
                                            <label for="nameInput" class="form-label">Family Physician (If any)</label>
                                        </div>
                                        <div class="col-lg-7">
                                            <input type="text" class="form-control" id="nameInput" placeholder="Enter your name">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="row mb-2">
                                        <div class="col-lg-5">
                                            <label for="nameInput" class="form-label">Physician's Contact</label>
                                        </div>
                                        <div class="col-lg-7">
                                            <input type="text" class="form-control" id="nameInput" placeholder="Enter your name">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="row mb-2">
                                        <div class="col-lg-5">
                                            <label for="nameInput" class="form-label">Pregnancy Status</label>
                                        </div>
                                        <div class="col-lg-7">
                                            <select class="form-select" id="inlineFormSelectPref">
                                                <option value="1">Yes</option>
                                                <option value="2">No</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="row mb-2">
                                        <div class="col-lg-5">
                                            <label for="nameInput" class="form-label">Menstrual Cycle</label>
                                        </div>
                                        <div class="col-lg-7">
                                            <select class="form-select" id="inlineFormSelectPref">
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
                                            <label for="nameInput" class="form-label">Activity Status</label>
                                        </div>
                                        <div class="col-lg-7">
                                            <select class="form-select" id="inlineFormSelectPref">
                                                <option value="1">Immobile/Paralyzed</option>
                                                <option value="2">Disabled</option>
                                                <option value="3">Not Very Active</option>
                                                <option value="3">Moderately Active</option>
                                                <option value="3">Highly Active</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="meassageInput" class="form-label">Please mention in case if you have a hereditary disease which is not included in the list</label>
                            <textarea class="form-control" id="meassageInput" rows="10" placeholder="Enter your message"></textarea>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-12 text-center">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </div>


                </div>
            </div>
        </div>
        <!--end col-->
    </div>
    <!--end row-->
</x-app-layout>
