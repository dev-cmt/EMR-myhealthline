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
                        <input type="hidden" value="{{ $user->id ?? '' }}" name="id">

                        <div class="row">
                            <div class="col-xxl-3 col-md-6">
                                <div class="row mb-3">
                                    <label for="uniquePatientId" class="form-label col-6"><strong>Unique Patient ID</strong></label>
                                    <div class="col-6">
                                        <input type="text" class="form-control" id="uniquePatientId" value="{{$user->unique_patient_id ?? ''}}" name="unique_patient_id" placeholder="Auto-generated" disabled>
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
                                        <input type="email" name="email" class="form-control" id="email" placeholder="Enter your email" value="{{ isset($user) ? ($user->email ?? old('email')) : old('email') }}" {{ isset($user) && $user->id ? 'disabled' : '' }}>
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
                                        <input type="password" name="password" class="form-control" id="password" placeholder="Enter your password" {{ isset($user) && $user->id ? 'disabled' : '' }}>
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
                                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter your full name" value="{{ $user->name ?? old('name') }}">
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
                                        <input type="date" class="form-control" id="dob_display" name="dob_display" placeholder="Enter your date of birth" value="{{ isset($user) ? \Carbon\Carbon::parse($user->dob)->format('d-m-Y') : old('dob') }}">
                                        <input type="hidden" id="dob" name="dob" value="{{ $user->dob ?? old('dob') }}">
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
                                        <input type="number" class="form-control" id="age" name="age" placeholder="Enter your age" value="{{ $user->age ?? old('age') }}" readonly>
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
                                            <option value="Male" {{ ($user->gender ?? old('gender')) == 'Male' ? 'selected' : '' }}>Male</option>
                                            <option value="Female" {{ ($user->gender ?? old('gender')) == 'Female' ? 'selected' : '' }}>Female</option>
                                            <option value="Other" {{ ($user->gender ?? old('gender')) == 'Other' ? 'selected' : '' }}>Other</option>
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
                                            <option value="A+" {{ $user->blood_group ?? old('blood_group') == 'A+' ? 'selected' : '' }}>A+</option>
                                            <option value="A-" {{ ($user->blood_group ?? old('blood_group')) == 'A-' ? 'selected' : '' }}>A-</option>
                                            <option value="B+" {{ ($user->blood_group ?? old('blood_group')) == 'B+' ? 'selected' : '' }}>B+</option>
                                            <option value="B-" {{ ($user->blood_group ?? old('blood_group')) == 'B-' ? 'selected' : '' }}>B-</option>
                                            <option value="O+" {{ ($user->blood_group ?? old('blood_group')) == 'O+' ? 'selected' : '' }}>O+</option>
                                            <option value="O-" {{ ($user->blood_group ?? old('blood_group')) == 'O-' ? 'selected' : '' }}>O-</option>
                                            <option value="K+" {{ ($user->blood_group ?? old('blood_group')) == 'K+' ? 'selected' : '' }}>K+</option>
                                            <option value="K-" {{ ($user->blood_group ?? old('blood_group')) == 'K-' ? 'selected' : '' }}>K-</option>
                                            <option value="AB+" {{ ($user->blood_group ?? old('blood_group')) == 'AB+' ? 'selected' : '' }}>AB+</option>
                                            <option value="AB-" {{ ($user->blood_group ?? old('blood_group')) == 'AB-' ? 'selected' : '' }}>AB-</option>
                                            <option value="Unknown" {{ ($user->blood_group ?? old('blood_group')) == 'Unknown' ? 'selected' : '' }}>Unknown</option>
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
                                            <input type="number" class="form-control" id="heightFeet" name="height_feet" placeholder="Feet" value="{{ $user->height_feet ?? old('height_feet') }}">
                                            <span class="input-group-text">Feet</span>
                                            <input type="number" class="form-control" id="heightInches" name="height_inches" placeholder="Inches" value="{{ $user->height_inches ?? old('height_inches') }}">
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
                                            <input type="number" class="form-control" id="weightKg" name="weight_kg" placeholder="KGs" value="{{ $user->weight_kg ?? old('weight_kg') }}">
                                            <span class="input-group-text">KGs</span>
                                            <input type="number" class="form-control" id="weightPounds" name="weight_pounds" placeholder="Pounds" value="{{ $user->weight_pounds ?? old('weight_pounds') }}">
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
                                        <input type="text" class="form-control" id="bmi" name="bmi" placeholder="Input BMI" value="{{ $user->bmi ?? old('bmi') }}">
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
                                            <option value="Islam" {{ ($user->religion ?? old('religion')) == 'Islam' ? 'selected' : '' }}>Islam</option>
                                            <option value="Christianity" {{ ($user->religion ?? old('religion')) == 'Christianity' ? 'selected' : '' }}>Christianity</option>
                                            <option value="Hinduism" {{ ($user->religion ?? old('religion')) == 'Hinduism' ? 'selected' : '' }}>Hinduism</option>
                                            <option value="Buddhism" {{ ($user->religion ?? old('religion')) == 'Buddhism' ? 'selected' : '' }}>Buddhism</option>
                                            <option value="Other" {{ ($user->religion ?? old('religion')) == 'Other' ? 'selected' : '' }}>Other</option>
                                            <option value="Non-Religious" {{ ($user->religion ?? old('religion')) == 'Non-Religious' ? 'selected' : '' }}>Non-Religious</option>
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
                                        <input type="text" class="form-control" id="emergencyContact" name="emergency_contact" placeholder="Enter emergency contact" value="{{ $user->emergency_contact ?? old('emergency_contact') }}">
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
                        <input type="hidden" value="{{ $sensitiveInformation->id ?? '' }}" name="id">

                        <!-- Form Fields -->
                        <div class="row mb-2">
                            <div class="col-lg-2">
                                <label for="sexually_active" class="form-label">Sexually Active</label>
                            </div>
                            <div class="col-lg-2">
                                <select class="form-select" name="sexually_active" id="sexually_active">
                                    <option value="Yes" {{ ($sensitiveInformation && $sensitiveInformation->sexually_active == 'Yes') || old('sexually_active') == 'Yes' ? 'selected' : '' }}>Yes</option>
                                    <option value="No" {{ ($sensitiveInformation && $sensitiveInformation->sexually_active == 'No') || old('sexually_active') == 'No' ? 'selected' : '' }}>No</option>
                                    <option value="Do Not Know" {{ ($sensitiveInformation && $sensitiveInformation->sexually_active == 'Do Not Know') || old('sexually_active') == 'Do Not Know' ? 'selected' : '' }}>Don't Know</option>
                                    <option value="Unwilling to Disclose" {{ ($sensitiveInformation && $sensitiveInformation->sexually_active == 'Unwilling to Disclose') || old('sexually_active') == 'Unwilling to Disclose' ? 'selected' : '' }}>Unwilling to Disclose</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-lg-2">
                                <label for="diabetic" class="form-label">Diabetic</label>
                            </div>
                            <div class="col-lg-2">
                                <select class="form-select" name="diabetic" id="diabetic">
                                    <option value="Yes" {{ ($sensitiveInformation && $sensitiveInformation->diabetic == 'Yes') || old('diabetic') == 'Yes' ? 'selected' : '' }}>Yes</option>
                                    <option value="No" {{ ($sensitiveInformation && $sensitiveInformation->diabetic == 'No') || old('diabetic') == 'No' ? 'selected' : '' }}>No</option>
                                    <option value="Do Not Know" {{ ($sensitiveInformation && $sensitiveInformation->diabetic == 'Do Not Know') || old('diabetic') == 'Do Not Know' ? 'selected' : '' }}>Don't Know</option>
                                    <option value="Unwilling to Disclose" {{ ($sensitiveInformation && $sensitiveInformation->diabetic == 'Unwilling to Disclose') || old('diabetic') == 'Unwilling to Disclose' ? 'selected' : '' }}>Unwilling to Disclose</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-lg-2">
                                <label for="allergies" class="form-label">Allergies</label>
                            </div>
                            <div class="col-lg-2">
                                <select class="form-select" name="allergies" id="allergies">
                                    <option value="Yes" {{ ($sensitiveInformation && $sensitiveInformation->allergies == 'Yes') || old('allergies') == 'Yes' ? 'selected' : '' }}>Yes</option>
                                    <option value="No" {{ ($sensitiveInformation && $sensitiveInformation->allergies == 'No') || old('allergies') == 'No' ? 'selected' : '' }}>No</option>
                                    <option value="Do Not Know" {{ ($sensitiveInformation && $sensitiveInformation->allergies == 'Do Not Know') || old('allergies') == 'Do Not Know' ? 'selected' : '' }}>Don't Know</option>
                                    <option value="Unwilling to Disclose" {{ ($sensitiveInformation && $sensitiveInformation->allergies == 'Unwilling to Disclose') || old('allergies') == 'Unwilling to Disclose' ? 'selected' : '' }}>Unwilling to Disclose</option>
                                </select>
                            </div>
                            <div class="col-lg-4">
                                <label for="allergy_details" class="form-label">If Yes, then write the elements you are allergic to</label>
                            </div>
                            <div class="col-lg-4">
                                <textarea class="form-control" name="allergy_details" id="allergy_details" rows="1" placeholder="Enter your message">{{ $sensitiveInformation->allergy_details ?? old('allergy_details') }}</textarea>
                            </div>
                        </div>
                        <!-- Add remaining form fields similar to above fields -->
                        <div class="row mb-2">
                            <div class="col-lg-2">
                                <label for="thyroid" class="form-label">Thyroid</label>
                            </div>
                            <div class="col-lg-2">
                                <select class="form-select" name="thyroid" id="thyroid">
                                    <option value="Yes" {{ ($sensitiveInformation && $sensitiveInformation->thyroid == 'Yes') || old('thyroid') == 'Yes' ? 'selected' : '' }}>Yes</option>
                                    <option value="No" {{ ($sensitiveInformation && $sensitiveInformation->thyroid == 'No') || old('thyroid') == 'No' ? 'selected' : '' }}>No</option>
                                    <option value="Do Not Know" {{ ($sensitiveInformation && $sensitiveInformation->thyroid == 'Do Not Know') || old('thyroid') == 'Do Not Know' ? 'selected' : '' }}>Don't Know</option>
                                    <option value="Unwilling to Disclose" {{ ($sensitiveInformation && $sensitiveInformation->thyroid == 'Unwilling to Disclose') || old('thyroid') == 'Unwilling to Disclose' ? 'selected' : '' }}>Unwilling to Disclose</option>
                                </select>
                            </div>
                            <div class="col-lg-4">
                                <label for="thyroid_details" class="form-label">If yes, last test results and date</label>
                            </div>
                            <div class="col-lg-4">
                                <textarea class="form-control" name="thyroid_details" id="thyroid_details" rows="1" placeholder="Enter your message">{{ $sensitiveInformation ? $sensitiveInformation->thyroid_details : old('thyroid_details') }}</textarea>
                            </div>
                        </div>
                        <!-- Continue adding other fields as necessary -->
                        <div class="row mb-2">
                            <div class="col-lg-2">
                                <label for="hypertension" class="form-label">Hypertension</label>
                            </div>
                            <div class="col-lg-2">
                                <select class="form-select" name="hypertension" id="hypertension">
                                    <option value="Yes" {{ ($sensitiveInformation && $sensitiveInformation->hypertension == 'Yes') || old('hypertension') == 'Yes' ? 'selected' : '' }}>Yes</option>
                                    <option value="No" {{ ($sensitiveInformation && $sensitiveInformation->hypertension == 'No') || old('hypertension') == 'No' ? 'selected' : '' }}>No</option>
                                    <option value="Do Not Know" {{ ($sensitiveInformation && $sensitiveInformation->hypertension == 'Do Not Know') || old('hypertension') == 'Do Not Know' ? 'selected' : '' }}>Don't Know</option>
                                    <option value="Unwilling to Disclose" {{ ($sensitiveInformation && $sensitiveInformation->hypertension == 'Unwilling to Disclose') || old('hypertension') == 'Unwilling to Disclose' ? 'selected' : '' }}>Unwilling to Disclose</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-lg-2">
                                <label for="cholesterol" class="form-label">Cholesterol</label>
                            </div>
                            <div class="col-lg-2">
                                <select class="form-select" name="cholesterol" id="cholesterol">
                                    <option value="Yes" {{ ($sensitiveInformation && $sensitiveInformation->cholesterol == 'Yes') || old('cholesterol') == 'Yes' ? 'selected' : '' }}>Yes</option>
                                    <option value="No" {{ ($sensitiveInformation && $sensitiveInformation->cholesterol == 'No') || old('cholesterol') == 'No' ? 'selected' : '' }}>No</option>
                                    <option value="Do Not Know" {{ ($sensitiveInformation && $sensitiveInformation->cholesterol == 'Do Not Know') || old('cholesterol') == 'Do Not Know' ? 'selected' : '' }}>Don't Know</option>
                                    <option value="Unwilling to Disclose" {{ ($sensitiveInformation && $sensitiveInformation->cholesterol == 'Unwilling to Disclose') || old('cholesterol') == 'Unwilling to Disclose' ? 'selected' : '' }}>Unwilling to Disclose</option>
                                </select>
                            </div>
                            <div class="col-lg-4">
                                <label for="cholesterol_details" class="form-label">If yes, last test results and date</label>
                            </div>
                            <div class="col-lg-4">
                                <textarea class="form-control" name="cholesterol_details" id="cholesterol_details" rows="1" placeholder="Enter your message">{{ old('cholesterol_details') }}</textarea>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-lg-2">
                                <label for="s_creatinine" class="form-label">S Creatinine</label>
                            </div>
                            <div class="col-lg-2">
                                <select class="form-select" name="s_creatinine" id="s_creatinine">
                                    <option value="Yes" {{ ($sensitiveInformation && $sensitiveInformation->s_creatinine == 'Yes') || old('s_creatinine') == 'Yes' ? 'selected' : '' }}>Yes</option>
                                    <option value="No" {{ ($sensitiveInformation && $sensitiveInformation->s_creatinine == 'No') || old('s_creatinine') == 'No' ? 'selected' : '' }}>No</option>
                                    <option value="Do Not Know" {{ ($sensitiveInformation && $sensitiveInformation->s_creatinine == 'Do Not Know') || old('s_creatinine') == 'Do Not Know' ? 'selected' : '' }}>Don't Know</option>
                                    <option value="Unwilling to Disclose" {{ ($sensitiveInformation && $sensitiveInformation->s_creatinine == 'Unwilling to Disclose') || old('s_creatinine') == 'Unwilling to Disclose' ? 'selected' : '' }}>Unwilling to Disclose</option>
                                </select>
                            </div>
                            <div class="col-lg-4">
                                <label for="s_creatinine_details" class="form-label">If yes, last test results and date</label>
                            </div>
                            <div class="col-lg-4">
                                <textarea class="form-control" name="s_creatinine_details" id="s_creatinine_details" rows="1" placeholder="Enter your message">{{ old('s_creatinine_details', $sensitiveInformation->s_creatinine_details ?? '') }}</textarea>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-lg-2">
                                <label for="smoking" class="form-label">Smoking</label>
                            </div>
                            <div class="col-lg-2">
                                <select class="form-select" name="smoking" id="smoking">
                                    <option value="Yes" {{ (old('smoking') == 'Yes' || (isset($sensitiveInformation) && $sensitiveInformation->smoking == 'Yes')) ? 'selected' : '' }}>Yes</option>
                                    <option value="No" {{ (old('smoking') == 'No' || (isset($sensitiveInformation) && $sensitiveInformation->smoking == 'No')) ? 'selected' : '' }}>No</option>
                                    <option value="Do Not Know" {{ (old('smoking') == 'Do Not Know' || (isset($sensitiveInformation) && $sensitiveInformation->smoking == 'Do Not Know')) ? 'selected' : '' }}>Don't Know</option>
                                    <option value="Unwilling to Disclose" {{ (old('smoking') == 'Unwilling to Disclose' || (isset($sensitiveInformation) && $sensitiveInformation->smoking == 'Unwilling to Disclose')) ? 'selected' : '' }}>Unwilling to Disclose</option>
                                </select>
                            </div>
                            <div class="col-lg-4">
                                <label for="smoking_quantity" class="form-label">If yes, how many a day?</label>
                            </div>
                            <div class="col-lg-4">
                                <textarea class="form-control" name="smoking_quantity" id="smoking_quantity" rows="1" placeholder="Enter your message">{{ old('smoking_quantity', $sensitiveInformation ? $sensitiveInformation->smoking_quantity : '') }}</textarea>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-lg-2">
                                <label for="alcohol_intake" class="form-label">Alcohol Intake</label>
                            </div>
                            <div class="col-lg-2">
                                <select class="form-select" name="alcohol_intake" id="alcohol_intake">
                                    <option value="Yes" {{ ($sensitiveInformation && $sensitiveInformation->alcohol_intake == 'Yes') || old('alcohol_intake') == 'Yes' ? 'selected' : '' }}>Yes</option>
                                    <option value="No" {{ ($sensitiveInformation && $sensitiveInformation->alcohol_intake == 'No') || old('alcohol_intake') == 'No' ? 'selected' : '' }}>No</option>
                                    <option value="Do Not Know" {{ ($sensitiveInformation && $sensitiveInformation->alcohol_intake == 'Do Not Know') || old('alcohol_intake') == 'Do Not Know' ? 'selected' : '' }}>Don't Know</option>
                                    <option value="Unwilling to Disclose" {{ ($sensitiveInformation && $sensitiveInformation->alcohol_intake == 'Unwilling to Disclose') || old('alcohol_intake') == 'Unwilling to Disclose' ? 'selected' : '' }}>Unwilling to Disclose</option>
                                </select>
                            </div>
                            <div class="col-lg-4">
                                <label for="alcohol_frequency" class="form-label">If yes, what type?</label>
                            </div>
                            <div class="col-lg-4">
                                <select class="form-select" name="alcohol_frequency" id="alcohol_frequency">
                                    <option value="Social Drinker" {{ ($sensitiveInformation && $sensitiveInformation->alcohol_frequency == 'Social Drinker') || old('alcohol_frequency') == 'Social Drinker' ? 'selected' : '' }}>Social Drinker</option>
                                    <option value="Once in a Year" {{ ($sensitiveInformation && $sensitiveInformation->alcohol_frequency == 'Once in a Year') || old('alcohol_frequency') == 'Once in a Year' ? 'selected' : '' }}>Once in a Year</option>
                                    <option value="Weekly" {{ ($sensitiveInformation && $sensitiveInformation->alcohol_frequency == 'Weekly') || old('alcohol_frequency') == 'Weekly' ? 'selected' : '' }}>Weekly</option>
                                    <option value="Monthly" {{ ($sensitiveInformation && $sensitiveInformation->alcohol_frequency == 'Monthly') || old('alcohol_frequency') == 'Monthly' ? 'selected' : '' }}>Monthly</option>
                                    <option value="Daily" {{ ($sensitiveInformation && $sensitiveInformation->alcohol_frequency == 'Daily') || old('alcohol_frequency') == 'Daily' ? 'selected' : '' }}>Daily</option>
                                    <option value="Unwilling to Disclose" {{ ($sensitiveInformation && $sensitiveInformation->alcohol_frequency == 'Unwilling to Disclose') || old('alcohol_frequency') == 'Unwilling to Disclose' ? 'selected' : '' }}>Unwilling to Disclose</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-lg-2">
                                <label for="nameInput" class="form-label">Any Drug Abuse History? </label>
                            </div>
                            <div class="col-lg-2">
                                <select class="form-select" name="drug_abuse_history" id="drug_abuse_history">
                                    <option value="Yes" {{ ($sensitiveInformation && $sensitiveInformation->drug_abuse_history == 'Yes') || old('drug_abuse_history') == 'Yes' ? 'selected' : '' }}>Yes</option>
                                    <option value="No" {{ ($sensitiveInformation && $sensitiveInformation->drug_abuse_history == 'No') || old('drug_abuse_history') == 'No' ? 'selected' : '' }}>No</option>
                                    <option value="Do Not Know" {{ ($sensitiveInformation && $sensitiveInformation->drug_abuse_history == 'Do Not Know') || old('drug_abuse_history') == 'Do Not Know' ? 'selected' : '' }}>Don't Know</option>
                                    <option value="Unwilling to Disclose" {{ ($sensitiveInformation && $sensitiveInformation->drug_abuse_history == 'Unwilling to Disclose') || old('drug_abuse_history') == 'Unwilling to Disclose' ? 'selected' : '' }}>Unwilling to Disclose</option>
                                </select>
                            </div>
                            <div class="col-lg-4">
                                <label for="nameInput" class="form-label">If yes, write down the subtstances </label>
                            </div>
                            <div class="col-lg-4">
                                <textarea class="form-control" name="drug_abuse_details" id="drug_abuse_details" rows="1" placeholder="Enter your message">{{($sensitiveInformation && $sensitiveInformation->drug_abuse_details) || old('drug_abuse_details') }}</textarea>
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
                        <input type="hidden" value="{{ $geneticDiseaseProfile->id ?? '' }}" name="id">


                        <div class="row mb-3">
                            <div class="col-md-4">
                                <!-- Custom Checkboxes -->
                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="checkbox" id="diabetesCheckbox" name="disease_diabetes" value="1" {{ $geneticDiseaseProfile->disease_diabetes ?? false ? 'checked' : '' }}>
                                    <label class="form-check-label" for="diabetesCheckbox">
                                        Diabetes
                                    </label>
                                </div>
                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="checkbox" id="strokeCheckbox" name="disease_stroke" value="1" {{ $geneticDiseaseProfile->disease_stroke ?? false ? 'checked' : '' }}>
                                    <label class="form-check-label" for="strokeCheckbox">
                                        Stroke
                                    </label>
                                </div>
                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="checkbox" id="heartDiseasesCheckbox" name="disease_heart" value="1" {{  $geneticDiseaseProfile->disease_heart ?? false ? 'checked' : '' }}>
                                    <label class="form-check-label" for="heartDiseasesCheckbox">
                                        Heart Diseases
                                    </label>
                                </div>
                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="checkbox" id="hyperExcitationCheckbox" name="disease_hyper" value="1" {{  $geneticDiseaseProfile->disease_hyper ?? false ? 'checked' : '' }}>
                                    <label class="form-check-label" for="hyperExcitationCheckbox">
                                        Hyper Excitation
                                    </label>
                                </div>
                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="checkbox" id="bloodPressureCheckbox" name="disease_pressure" value="1" {{ $geneticDiseaseProfile->disease_pressure ?? false ? 'checked' : '' }}>
                                    <label class="form-check-label" for="bloodPressureCheckbox">
                                        Blood Pressure
                                    </label>
                                </div>
                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="checkbox" id="baldingCheckbox" name="disease_balding" value="1" {{ $geneticDiseaseProfile->disease_balding ?? false ? 'checked' : '' }}>
                                    <label class="form-check-label" for="baldingCheckbox">
                                        Balding
                                    </label>
                                </div>
                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="checkbox" id="vitiligoCheckbox" name="disease_vitiligo" value="1" {{ $geneticDiseaseProfile->disease_vitiligo ?? false ? 'checked' : '' }}>
                                    <label class="form-check-label" for="vitiligoCheckbox">
                                        Vitiligo
                                    </label>
                                </div>
                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="checkbox" id="disabilityCheckbox" name="disease_disability" value="1" {{ $geneticDiseaseProfile->disease_disability ?? false ? 'checked' : '' }}>
                                    <label class="form-check-label" for="disabilityCheckbox">
                                        Disability (Please specify in comment box)
                                    </label>
                                </div>
                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="checkbox" id="psoriasisCheckbox" name="disease_psoriasis" value="1" {{ $geneticDiseaseProfile->disease_psoriasis ?? false ? 'checked' : '' }}>
                                    <label class="form-check-label" for="psoriasisCheckbox">
                                        Psoriasis
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <label for="additionalComments" class="form-label mt-3">Please mention in case if you have a hereditary disease which is not included in the list</label>
                                <textarea class="form-control" id="additionalComments" name="additional_comments" rows="5" placeholder="Enter additional comments">{{ $geneticDiseaseProfile->additional_comments ?? '' }}</textarea>
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
                        <input type="hidden" value="{{ $otherPersonalInformation->id ?? '' }}" name="id">

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
                                                    <option value="Single" {{ $otherPersonalInformation && $otherPersonalInformation->marital_status == "Single" ? 'selected': ''}}>Single</option>
                                                    <option value="Married" {{ $otherPersonalInformation && $otherPersonalInformation->marital_status == "Married" ? 'selected': ''}}>Married</option>
                                                    <option value="Married with Kids" {{ $otherPersonalInformation && $otherPersonalInformation->marital_status == "Married with Kids" ? 'selected': ''}}>Married with Kids</option>
                                                    <option value="Divorced" {{ $otherPersonalInformation && $otherPersonalInformation->marital_status == "Divorced" ? 'selected': ''}}>Divorced</option>
                                                    <option value="Widowed" {{ $otherPersonalInformation && $otherPersonalInformation->marital_status == "Widowed" ? 'selected': ''}}>Widowed</option>
                                                    <option value="Unwilling to Disclose" {{ $otherPersonalInformation && $otherPersonalInformation->marital_status == "Unwilling to Disclose" ? 'selected': ''}}>Unwilling to Disclose</option>
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
                                                <input type="text" class="form-control" id="homeAddress" name="home_address" placeholder="Enter your home address" value="{{ $otherPersonalInformation->home_address ?? ''}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="row mb-2">
                                            <div class="col-lg-5">
                                                <label for="officeAddress" class="form-label">Office Address</label>
                                            </div>
                                            <div class="col-lg-7">
                                                <input type="text" class="form-control" id="officeAddress" name="office_address" placeholder="Enter your office address" value="{{ $otherPersonalInformation->office_address ?? ''}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="row mb-2">
                                            <div class="col-lg-5">
                                                <label for="emailAddress" class="form-label">Email Address</label>
                                            </div>
                                            <div class="col-lg-7">
                                                <input type="email" class="form-control" id="emailAddress" name="email_address" placeholder="Enter your email address" value="{{ $otherPersonalInformation->email_address ?? ''}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="row mb-2">
                                            <div class="col-lg-5">
                                                <label for="phoneNumber" class="form-label">Phone Number</label>
                                            </div>
                                            <div class="col-lg-7">
                                                <input type="text" class="form-control" id="phoneNumber" name="phone_number" placeholder="Enter your phone number" value="{{ $otherPersonalInformation->phone_number ?? ''}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="row mb-2">
                                            <div class="col-lg-5">
                                                <label for="lastBloodDonated" class="form-label">Last Blood Donated</label>
                                            </div>
                                            <div class="col-lg-7">
                                                <input type="date" class="form-control" id="lastBloodDonated" name="last_blood_donated" value="{{ $otherPersonalInformation->last_blood_donated ?? ''}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="row mb-2">
                                            <div class="col-lg-5">
                                                <label for="healthInsurance" class="form-label">Health Insurance #</label>
                                            </div>
                                            <div class="col-lg-7">
                                                <input type="text" class="form-control" id="healthInsurance" name="health_insurance_number" placeholder="Enter your health insurance number" value="{{ $otherPersonalInformation->health_insurance_number ?? ''}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="row mb-2">
                                            <div class="col-lg-5">
                                                <label for="familyPhysician" class="form-label">Family Physician (If any)</label>
                                            </div>
                                            <div class="col-lg-7">
                                                <input type="text" class="form-control" id="familyPhysician" name="family_physician" placeholder="Enter your family physician's name" value="{{ $otherPersonalInformation->family_physician ?? ''}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="row mb-2">
                                            <div class="col-lg-5">
                                                <label for="physicianContact" class="form-label">Physician's Contact</label>
                                            </div>
                                            <div class="col-lg-7">
                                                <input type="text" class="form-control" id="physicianContact" name="physician_contact" placeholder="Enter your physician's contact" value="{{ $otherPersonalInformation->physician_contact ?? ''}}">
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
                                                    <option value="Yes" {{ $otherPersonalInformation && $otherPersonalInformation->pregnancy_status == "Yes" ? 'selected': ''}}>Yes</option>
                                                    <option value="No" {{ $otherPersonalInformation && $otherPersonalInformation->pregnancy_status == "No" ? 'selected': ''}}>No</option>
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
                                                    <option value="Regular" {{ $otherPersonalInformation && $otherPersonalInformation->menstrual_cycle == "Regular" ? 'selected': ''}}>Regular</option>
                                                    <option value="Irregular" {{ $otherPersonalInformation && $otherPersonalInformation->menstrual_cycle == "Irregular" ? 'selected': ''}}>Irregular</option>
                                                    <option value="Menopaused" {{ $otherPersonalInformation && $otherPersonalInformation->menstrual_cycle == "Menopaused" ? 'selected': ''}}>Menopaused</option>
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
                                                    <option value="Immobile/Paralyzed" {{ $otherPersonalInformation && $otherPersonalInformation->activity_status == "Immobile/Paralyzed" ? 'selected': ''}}>Immobile/Paralyzed</option>
                                                    <option value="Disabled" {{ $otherPersonalInformation && $otherPersonalInformation->activity_status == "Disabled" ? 'selected': ''}}>Disabled</option>
                                                    <option value="Not Very Active" {{ $otherPersonalInformation && $otherPersonalInformation->activity_status == "Not Very Active" ? 'selected': ''}}>Not Very Active</option>
                                                    <option value="Moderately Active" {{ $otherPersonalInformation && $otherPersonalInformation->activity_status == "Moderately Active" ? 'selected': ''}}>Moderately Active</option>
                                                    <option value="Highly Active" {{ $otherPersonalInformation && $otherPersonalInformation->activity_status == "Highly Active" ? 'selected': ''}}>Highly Active</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="hereditaryDisease" class="form-label">Please mention if you have a hereditary disease not listed above</label>
                                <textarea class="form-control" id="hereditaryDisease" name="hereditary_disease" rows="10" placeholder="Enter your hereditary disease information">{{$otherPersonalInformation->hereditary_disease ?? ''}}</textarea>
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


    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const dobDisplay = document.getElementById('dob_display');
            const dob = document.getElementById('dob');
            const age = document.getElementById('age');

            function formatDateToDMY(date) {
                const parts = date.split('-');
                return `${parts[2]}-${parts[1]}-${parts[0]}`;
            }

            function formatDateToYMD(date) {
                const parts = date.split('-');
                return `${parts[2]}-${parts[1]}-${parts[0]}`;
            }

            function calculateAge(dob) {
                const today = new Date();
                const birthDate = new Date(dob);
                let age = today.getFullYear() - birthDate.getFullYear();
                const monthDifference = today.getMonth() - birthDate.getMonth();
                if (monthDifference < 0 || (monthDifference === 0 && today.getDate() < birthDate.getDate())) {
                    age--;
                }
                return age;
            }

            dobDisplay.addEventListener('change', function() {
                const date = dobDisplay.value;
                if (date.match(/^\d{2}-\d{2}-\d{4}$/)) {
                    dob.value = formatDateToYMD(date);
                    const ageValue = calculateAge(dob.value);
                    age.value = ageValue;
                }
            });

            // Initialize dobDisplay and age if dob is already set
            if (dob.value) {
                dobDisplay.value = formatDateToDMY(dob.value);
                const ageValue = calculateAge(dob.value);
                age.value = ageValue;
            }
        });
    </script>

    <script>
        let algin = document.getElementById('allergies').value;
    </script>
</x-app-layout>
