<x-app-layout>

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs nav-justified nav-border-top nav-border-top-success mb-3" id="" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link {{ Session::has('step2') || Session::has('step3') || Session::has('step4') ? '' : 'active' }}" id="section1" data-bs-toggle="tab" href="#nav-border-step1" role="tab" aria-selected="false">
                                <i class="ri-home-5-line align-middle me-1"></i> Patient Registry Form
                            </a>
                        </li>
                        @auth
                        <li class="nav-item">
                            <a class="nav-link {{ Session::has('step2') ? 'active' : '' }}" id="section2" data-bs-toggle="tab" href="#nav-border-step2" role="tab" aria-selected="false">
                                <i class="ri-question-answer-line align-middle me-1"></i> Sensitive/Confidential Info.
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ Session::has('step3') ? 'active' : '' }}" id="section3" data-bs-toggle="tab" href="#nav-border-step3" role="tab" aria-selected="false">
                                <i class="ri-question-answer-line align-middle me-1"></i>Genetic Disease Profile
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ Session::has('step4') ? 'active' : '' }}" id="section3" data-bs-toggle="tab" href="#nav-border-step4" role="tab" aria-selected="false">
                                <i class="ri-question-answer-line align-middle me-1"></i>Other Personal Info.
                            </a>
                        </li>
                        @endauth
                    </ul>
                    
                    <!--Patient Registry Form-->
                    <div class="tab-content text-muted">
                        <div class="tab-pane {{ Session::has('step2') || Session::has('step3') || Session::has('step4') ? '' : 'active show' }}" id="nav-border-step1" role="tabpanel">
                            <form action="{{ route('patient-registry.store') }}" method="POST">
                                @csrf
                                <input type="hidden" value="{{ $user->id ?? '' }}" name="id">
                                
                                <div class="row">
                                    <div class="col-md-6">
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
                                    <div class="col-md-6">
                                        <div class="row mb-2">
                                            <div class="col-lg-3">
                                                <label for="emergencyContact" class="form-label">Emergency Contact</label>
                                            </div>
                                            <div class="col-lg-9">
                                                <input type="text" class="form-control" id="emergencyContact" name="emergency_contact" placeholder="Enter emergency contact" value="{{ $user->emergency_contact ?? old('emergency_contact') }}" {{ isset($user) && $user->id ? 'disabled' : '' }}>
                                                @error('emergency_contact')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row {{ isset($user) && $user->id ? 'd-none' : '' }}">
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
                                                <input type="text" class="form-control" id="name" name="name" placeholder="Enter your full name" value="{{ $user->name ?? old('name') }}" {{ isset($user) && $user->id ? 'disabled' : '' }}>
                                                @error('name')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
        
                                        <div class="row mb-2">
                                            <div class="col-lg-3">
                                                <label for="dob_display" class="form-label">Date Of Birth</label>
                                            </div>
                                            <div class="col-lg-9">
                                                <input type="date" class="form-control" id="dob" name="dob" value="{{ $user->dob ?? old('dob') }}" onchange="calculateAge(this.value)" {{ isset($user) && $user->id ? 'disabled' : '' }}>
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
                                                <input type="number" class="form-control" id="age" name="age" placeholder="Enter your age" value="{{ $user->age ?? old('age') }}" readonly {{ isset($user) && $user->id ? 'disabled' : '' }}>
                                                @error('age')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        
                                        <script>
                                            function calculateAge(dob) {
                                                const today = new Date();
                                                const birthDate = new Date(dob);
                                                let age = today.getFullYear() - birthDate.getFullYear();
                                                const monthDiff = today.getMonth() - birthDate.getMonth();
                                                
                                                if (monthDiff < 0 || (monthDiff === 0 && today.getDate() < birthDate.getDate())) {
                                                    age--;
                                                }
                                                document.getElementById('age').value = age;
                                            }
                                            
                                            // Calculate age on page load if DOB is already set
                                            document.addEventListener('DOMContentLoaded', function() {
                                                const dobInput = document.getElementById('dob');
                                                if (dobInput.value) {
                                                    calculateAge(dobInput.value);
                                                }
                                            });
                                        </script>
        
        
                                        <div class="row mb-2">
                                            <div class="col-lg-3">
                                                <label for="gender" class="form-label">Gender</label>
                                            </div>
                                            <div class="col-lg-9">
                                                <select class="form-select" id="gender" name="gender" {{ isset($user) && $user->id ? 'disabled' : '' }}>
                                                    <option value="">-- Select --</option>
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
                                                <select class="form-select" id="bloodGroup" name="blood_group" {{ isset($user) && $user->id ? 'disabled' : '' }}>
                                                    <option value="">-- Select --</option>
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
                                        <div class="row mb-2">
                                            <div class="col-lg-3">
                                                <label for="mastNationalityId" class="form-label">Nationality</label>
                                            </div>
                                            <div class="col-lg-9">
                                                <select class="form-control" id="mastNationalityId" name="mast_nationality_id" {{ isset($user) && $user->id ? 'disabled' : '' }}>
                                                    <option value="">-- Select --</option>
                                                    @foreach ($nationalities as $row)
                                                        <option value="{{ $row->id }}" {{ ($user->mast_nationality_id ?? old('mast_nationality_id')) == $row->id ? 'selected' : '' }}>
                                                            {{ $row->name }}
                                                        </option>
                                                    @endforeach
                                                </select>                                                
                                                @error('mast_nationality_id')
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
                                                    <input type="number" class="form-control" id="heightFeet" name="height_feet" placeholder="Feet" value="{{ $user->height_feet ?? old('height_feet') }}" {{ isset($user) && $user->id ? 'disabled' : '' }}>
                                                    <span class="input-group-text">Feet</span>
                                                    <input type="number" class="form-control" id="heightInches" name="height_inches" placeholder="Inches" value="{{ $user->height_inches ?? old('height_inches') }}" {{ isset($user) && $user->id ? 'disabled' : '' }}>
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
                                                    <input type="number" class="form-control" id="weightKg" name="weight_kg" placeholder="KGs" value="{{ $user->weight_kg ?? old('weight_kg') }}" {{ isset($user) && $user->id ? 'disabled' : '' }}>
                                                    <span class="input-group-text">KGs</span>
                                                    <input type="number" class="form-control" id="weightPounds" name="weight_pounds" placeholder="Pounds" value="{{ $user->weight_pounds ?? old('weight_pounds') }}" {{ isset($user) && $user->id ? 'disabled' : '' }}>
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
                                                <label for="bmi" class="form-label">BMI (Optional)</label>
                                            </div>
                                            <div class="col-lg-9">
                                                <input type="text" class="form-control" id="bmi" name="bmi" placeholder="Input BMI" value="{{ $user->bmi ?? old('bmi') }}" {{ isset($user) && $user->id ? 'disabled' : '' }}>
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
                                                <select class="form-select" id="religion" name="religion" {{ isset($user) && $user->id ? 'disabled' : '' }}>
                                                    <option value="">-- Select --</option>
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
                                                <label for="maritalStatus" class="form-label">Marital Status</label>
                                            </div>
                                            <div class="col-lg-9">
                                                <select class="form-select" id="maritalStatus" name="marital_status" {{ isset($user) && $user->id ? 'disabled' : '' }}>
                                                    <option value="">-- Select --</option>
                                                    <option value="Single" {{ ($user->marital_status ?? old('marital_status')) == "Single" ? 'selected': ''}}>Single</option>
                                                    <option value="Married" {{ ($user->marital_status ?? old('marital_status')) == "Married" ? 'selected': ''}}>Married</option>
                                                    <option value="Married with Kids" {{ ($user->marital_status ?? old('marital_status')) == "Married with Kids" ? 'selected': ''}}>Married with Kids</option>
                                                    <option value="Divorced" {{ ($user->marital_status ?? old('marital_status')) == "Divorced" ? 'selected': ''}}>Divorced</option>
                                                    <option value="Widowed" {{ ($user->marital_status ?? old('marital_status')) == "Widowed" ? 'selected': ''}}>Widowed</option>
                                                    <option value="Unwilling to Disclose" {{ ($user->marital_status ?? old('marital_status')) == "Unwilling to Disclose" ? 'selected': ''}}>Unwilling to Disclose</option>
                                                </select>  
                                                @error('marital_status')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        
                                        <div class="row mb-2">
                                            <div class="col-lg-3">
                                                <label for="emergencyContact" class="form-label">Address (Optional)</label>
                                            </div>
                                            <div class="col-lg-9">
                                                <input type="text" class="form-control" id="address" name="address" placeholder="Enter address" value="{{ $user->address ?? old('address') }}" {{ isset($user) && $user->id ? 'disabled' : '' }}>
                                                @error('address')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div> <!--end col-->
        
                                </div> <!--end row-->
        
                                <div class="col-12 text-center">
                                    <button type="submit" class="btn btn-success btn-label waves-effect waves-light" {{ isset($user) && $user->id ? 'disabled' : '' }}><i class="ri-check-double-line label-icon align-middle fs-16 me-2"></i> Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!--End => Step1-->

                    @auth
                        <!-- Sensitive/Confidential Info. -->
                        <div class="tab-content text-muted">
                            <div class="tab-pane {{ Session::has('step2') ? 'active show' : '' }}" id="nav-border-step2" role="tabpanel">
                                <form action="{{ route('sensitive-information.store') }}" method="POST">
                                    @csrf
                                    <input type="hidden" value="{{ $sensitiveInformation->id ?? '' }}" name="id">
            
                                    <!-- Sexually Active -->
                                    <div class="row mb-2">
                                        <div class="col-lg-2">
                                            <label for="sexually_active" class="form-label">Sexually Active</label>
                                        </div>
                                        <div class="col-lg-2">
                                            <select class="form-select" name="sexually_active" id="sexually_active">
                                                <option value="">-- Select --</option>
                                                <option value="Yes" {{ ($sensitiveInformation->sexually_active ?? old('sexually_active')) == 'Yes' ? 'selected' : '' }}>Yes</option>
                                                <option value="No" {{ ($sensitiveInformation->sexually_active ?? old('sexually_active')) == 'No' ? 'selected' : '' }}>No</option>
                                                <option value="Do Not Know" {{ ($sensitiveInformation->sexually_active ?? old('sexually_active')) == 'Do Not Know' ? 'selected' : '' }}>Don't Know</option>
                                                <option value="Unwilling to Disclose" {{ ($sensitiveInformation->sexually_active ?? old('sexually_active')) == 'Unwilling to Disclose' ? 'selected' : '' }}>Unwilling to Disclose</option>
                                            </select>
                                            @error('sexually_active')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
            
                                    <!-- Diabetic -->
                                    <div class="row mb-2">
                                        <div class="col-lg-2">
                                            <label for="diabetic" class="form-label">Diabetic</label>
                                        </div>
                                        <div class="col-lg-2">
                                            <select class="form-select" name="diabetic" id="diabetic">
                                                <option value="">-- Select --</option>
                                                <option value="Yes" {{ ($sensitiveInformation->diabetic ?? old('diabetic')) == 'Yes' ? 'selected' : '' }}>Yes</option>
                                                <option value="No" {{ ($sensitiveInformation->diabetic ?? old('diabetic')) == 'No' ? 'selected' : '' }}>No</option>
                                                <option value="Do Not Know" {{ ($sensitiveInformation->diabetic ?? old('diabetic')) == 'Do Not Know' ? 'selected' : '' }}>Don't Know</option>
                                                <option value="Unwilling to Disclose" {{ ($sensitiveInformation->diabetic ?? old('diabetic')) == 'Unwilling to Disclose' ? 'selected' : '' }}>Unwilling to Disclose</option>
                                            </select>
                                            @error('diabetic')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
            
                                    <!-- Allergies -->
                                    <div class="row mb-2">
                                        <div class="col-lg-2">
                                            <label for="allergies" id="allergy_label" class="form-label">Allergies</label>
                                        </div>
                                        <div class="col-lg-2">
                                            <select class="form-select" name="allergies" id="allergies">
                                                <option value="">-- Select --</option>
                                                <option value="Yes" {{ ($sensitiveInformation->allergies ?? old('allergies')) == 'Yes' ? 'selected' : '' }}>Yes</option>
                                                <option value="No" {{ ($sensitiveInformation->allergies ?? old('allergies')) == 'No' ? 'selected' : '' }}>No</option>
                                                <option value="Do Not Know" {{ ($sensitiveInformation->allergies ?? old('allergies')) == 'Do Not Know' ? 'selected' : '' }}>Don't Know</option>
                                                <option value="Unwilling to Disclose" {{ ($sensitiveInformation->allergies ?? old('allergies')) == 'Unwilling to Disclose' ? 'selected' : '' }}>Unwilling to Disclose</option>
                                            </select>
                                            @error('allergies')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-lg-4" id="allergy_label_id" style="display: none;">
                                            <label for="allergy_details" class="form-label">If Yes, then write the elements you are allergic to</label>
                                        </div>
                                        <div class="col-lg-4" id="allergy_details_textArea" style="display: none;">
                                            <textarea class="form-control" name="allergy_details" id="allergy_details" rows="1" placeholder="Enter your message">{{ $sensitiveInformation->allergy_details ?? old('allergy_details') }}</textarea>
                                            @error('allergy_details')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
            
                                    <!-- Thyroid -->
                                    <div class="row mb-2">
                                        <div class="col-lg-2">
                                            <label for="thyroid" class="form-label">Thyroid</label>
                                        </div>
                                        <div class="col-lg-2">
                                            <select class="form-select" name="thyroid" id="thyroid">
                                                <option value="">-- Select --</option>
                                                <option value="Yes" {{ ($sensitiveInformation->thyroid ?? old('thyroid')) == 'Yes' ? 'selected' : '' }}>Yes</option>
                                                <option value="No" {{ ($sensitiveInformation->thyroid ?? old('thyroid')) == 'No' ? 'selected' : '' }}>No</option>
                                                <option value="Do Not Know" {{ ($sensitiveInformation->thyroid ?? old('thyroid')) == 'Do Not Know' ? 'selected' : '' }}>Don't Know</option>
                                                <option value="Unwilling to Disclose" {{ ($sensitiveInformation->thyroid ?? old('thyroid')) == 'Unwilling to Disclose' ? 'selected' : '' }}>Unwilling to Disclose</option>
                                            </select>
                                            @error('thyroid')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-lg-4" id="thyroid_data" style="display: none;">
                                            <label for="thyroid_details" class="form-label">If yes, last test results and date</label>
                                        </div>
                                        <div class="col-lg-4" id="thyroid_details_textArea" style="display: none;">
                                            <textarea class="form-control" name="thyroid_details" id="thyroid_details" rows="1" placeholder="Enter your message">{{ $sensitiveInformation->thyroid_details ?? old('thyroid_details') }}</textarea>
                                            @error('thyroid_details')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
            
                                    <!-- Hypertension -->
                                    <div class="row mb-2">
                                        <div class="col-lg-2">
                                            <label for="hypertension" class="form-label">Hypertension</label>
                                        </div>
                                        <div class="col-lg-2">
                                            <select class="form-select" name="hypertension" id="hypertension">
                                                <option value="">-- Select --</option>
                                                <option value="Yes" {{ ($sensitiveInformation->hypertension ?? old('hypertension')) == 'Yes' ? 'selected' : '' }}>Yes</option>
                                                <option value="No" {{ ($sensitiveInformation->hypertension ?? old('hypertension')) == 'No' ? 'selected' : '' }}>No</option>
                                                <option value="Do Not Know" {{ ($sensitiveInformation->hypertension ?? old('hypertension')) == 'Do Not Know' ? 'selected' : '' }}>Don't Know</option>
                                                <option value="Unwilling to Disclose" {{ ($sensitiveInformation->hypertension ?? old('hypertension')) == 'Unwilling to Disclose' ? 'selected' : '' }}>Unwilling to Disclose</option>
                                            </select>
                                            @error('hypertension')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
            
                                    <!-- Cholesterol -->
                                    <div class="row mb-2">
                                        <div class="col-lg-2">
                                            <label for="cholesterol" class="form-label">Cholesterol</label>
                                        </div>
                                        <div class="col-lg-2">
                                            <select class="form-select" name="cholesterol" id="cholesterol">
                                                <option value="">-- Select --</option>
                                                <option value="Yes" {{ ($sensitiveInformation->cholesterol ?? old('cholesterol')) == 'Yes' ? 'selected' : '' }}>Yes</option>
                                                <option value="No" {{ ($sensitiveInformation->cholesterol ?? old('cholesterol')) == 'No' ? 'selected' : '' }}>No</option>
                                                <option value="Do Not Know" {{ ($sensitiveInformation->cholesterol ?? old('cholesterol')) == 'Do Not Know' ? 'selected' : '' }}>Don't Know</option>
                                                <option value="Unwilling to Disclose" {{ ($sensitiveInformation->cholesterol ?? old('cholesterol')) == 'Unwilling to Disclose' ? 'selected' : '' }}>Unwilling to Disclose</option>
                                            </select>
                                            @error('cholesterol')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-lg-4" id="cholesterol_data" style="display: none;">
                                            <label for="cholesterol_details" class="form-label">If yes, last test results and date</label>
                                        </div>
                                        <div class="col-lg-4" id="cholestrol_details_textArea" style="display: none;">
                                            <textarea class="form-control" name="cholesterol_details" id="cholesterol_details" rows="1" placeholder="Enter your message">{{ $sensitiveInformation->cholesterol_details ?? old('cholesterol_details') }}</textarea>
                                            @error('cholesterol_details')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
            
                                    <!-- S Creatinine -->
                                    <div class="row mb-2">
                                        <div class="col-lg-2">
                                            <label for="s_creatinine" class="form-label">S Creatinine</label>
                                        </div>
                                        <div class="col-lg-2">
                                            <select class="form-select" name="s_creatinine" id="s_creatinine">
                                                <option value="">-- Select --</option>
                                                <option value="Yes" {{ ($sensitiveInformation->s_creatinine ?? old('s_creatinine')) == 'Yes' ? 'selected' : '' }}>Yes</option>
                                                <option value="No" {{ ($sensitiveInformation->s_creatinine ?? old('s_creatinine')) == 'No' ? 'selected' : '' }}>No</option>
                                                <option value="Do Not Know" {{ ($sensitiveInformation->s_creatinine ?? old('s_creatinine')) == 'Do Not Know' ? 'selected' : '' }}>Don't Know</option>
                                                <option value="Unwilling to Disclose" {{ ($sensitiveInformation->s_creatinine ?? old('s_creatinine')) == 'Unwilling to Disclose' ? 'selected' : '' }}>Unwilling to Disclose</option>
                                            </select>
                                            @error('s_creatinine')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-lg-4" id="s_creati" style="display: none;">
                                            <label for="s_creatinine_details" class="form-label">If yes, last test results and date</label>
                                        </div>
                                        <div class="col-lg-4" id="s_creati_details" style="display: none;">
                                            <textarea class="form-control" name="s_creatinine_details" id="s_creatinine_details" rows="1" placeholder="Enter your message">{{ $sensitiveInformation->s_creatinine_details ?? old('s_creatinine_details') }}</textarea>
                                            @error('s_creatinine_details')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <!-- Smoking -->
                                    <div class="row mb-2">
                                        <div class="col-lg-2">
                                            <label for="smoking" class="form-label">Smoking</label>
                                        </div>
                                        <div class="col-lg-2">
                                            <select class="form-select" name="smoking" id="smoking">
                                                <option value="">-- Select --</option>
                                                <option value="Yes" {{ ($sensitiveInformation->smoking ?? old('smoking')) == 'Yes' ? 'selected' : '' }}>Yes</option>
                                                <option value="No" {{ ($sensitiveInformation->smoking ?? old('smoking')) == 'No' ? 'selected' : '' }}>No</option>
                                                <option value="Do Not Know" {{ ($sensitiveInformation->smoking ?? old('smoking')) == 'Do Not Know' ? 'selected' : '' }}>Don't Know</option>
                                                <option value="Unwilling to Disclose" {{ ($sensitiveInformation->smoking ?? old('smoking')) == 'Unwilling to Disclose' ? 'selected' : '' }}>Unwilling to Disclose</option>
                                            </select>
                                            @error('smoking')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-lg-4" id="smoke_ing" style="display: none;">
                                            <label for="smoking_details" class="form-label">If yes, how many a day?</label>
                                        </div>
                                        <div class="col-lg-4" id="smoking_details" style="display: none;">
                                            <textarea class="form-control" name="smoking_details" id="smoking_details" rows="1" placeholder="Enter your message">{{ $sensitiveInformation->smoking_details ?? old('smoking_details') }}</textarea>
                                            @error('smoking_details')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <!-- Alcohol Intake -->
                                    <div class="row mb-2">
                                        <div class="col-lg-2">
                                            <label for="alcohol_intake" class="form-label">Alcohol Intake</label>
                                        </div>
                                        <div class="col-lg-2">
                                            <select class="form-select" name="alcohol_intake" id="alcohol_intake">
                                                <option value="">-- Select --</option>
                                                <option value="Yes" {{ ($sensitiveInformation->alcohol_intake ?? old('alcohol_intake')) == 'Yes' ? 'selected' : '' }}>Yes</option>
                                                <option value="No" {{ ($sensitiveInformation->alcohol_intake ?? old('alcohol_intake')) == 'No' ? 'selected' : '' }}>No</option>
                                                <option value="Do Not Know" {{ ($sensitiveInformation->alcohol_intake ?? old('alcohol_intake')) == 'Do Not Know' ? 'selected' : '' }}>Don't Know</option>
                                                <option value="Unwilling to Disclose" {{ ($sensitiveInformation->alcohol_intake ?? old('alcohol_intake')) == 'Unwilling to Disclose' ? 'selected' : '' }}>Unwilling to Disclose</option>
                                            </select>
                                            @error('alcohol_intake')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-lg-4" id="alcohol" style="display: none;">
                                            <label for="alcohol_intake_details" class="form-label">If yes, what type?</label>
                                        </div>
                                        <div class="col-lg-4" id="alcohol_intake_details" style="display: none;">
                                            <select class="form-select" name="alcohol_intake_details" id="alcohol_intake_details">
                                                <option value="">-- Select --</option>
                                                <option value="Social Drinker" {{ ($sensitiveInformation->alcohol_intake_details ?? old('alcohol_intake_details')) == 'Social Drinker' ? 'selected' : '' }}>Social Drinker</option>
                                                <option value="Once in a Year" {{ ($sensitiveInformation->alcohol_intake_details ?? old('alcohol_intake_details')) == 'Once in a Year' ? 'selected' : '' }}>Once in a Year</option>
                                                <option value="Weekly" {{ ($sensitiveInformation->alcohol_intake_details ?? old('alcohol_intake_details')) == 'Weekly' ? 'selected' : '' }}>Weekly</option>
                                                <option value="Monthly" {{ ($sensitiveInformation->alcohol_intake_details ?? old('alcohol_intake_details')) == 'Monthly' ? 'selected' : '' }}>Monthly</option>
                                                <option value="Daily" {{ ($sensitiveInformation->alcohol_intake_details ?? old('alcohol_intake_details')) == 'Daily' ? 'selected' : '' }}>Daily</option>
                                                <option value="Unwilling to Disclose" {{ ($sensitiveInformation->alcohol_intake_details ?? old('alcohol_intake_details')) == 'Unwilling to Disclose' ? 'selected' : '' }}>Unwilling to Disclose</option>
                                            </select>
                                            @error('alcohol_intake_details')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror                                           
                                        </div>
                                    </div>
            
                                    <!-- Medication History -->
                                    <div class="row mb-2">
                                        <div class="col-lg-2">
                                            <label for="drug_abuse_history" class="form-label">Drug Abuse History</label>
                                        </div>
                                        <div class="col-lg-2">
                                            <select class="form-select" name="drug_abuse_history" id="drug_abuse_history">
                                                <option value="">-- Select --</option>
                                                <option value="Yes" {{ ($sensitiveInformation->drug_abuse_history ?? old('drug_abuse_history')) == 'Yes' ? 'selected' : '' }}>Yes</option>
                                                <option value="No" {{ ($sensitiveInformation->drug_abuse_history ?? old('drug_abuse_history')) == 'No' ? 'selected' : '' }}>No</option>
                                                <option value="Do Not Know" {{ ($sensitiveInformation->drug_abuse_history ?? old('drug_abuse_history')) == 'Do Not Know' ? 'selected' : '' }}>Don't Know</option>
                                                <option value="Unwilling to Disclose" {{ ($sensitiveInformation->drug_abuse_history ?? old('drug_abuse_history')) == 'Unwilling to Disclose' ? 'selected' : '' }}>Unwilling to Disclose</option>
                                            </select>
                                            @error('drug_abuse_history')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-lg-4" id="drug" style="display: none;">
                                            <label for="drug_abuse_details" class="form-label">If yes, write down the subtstances</label>
                                        </div>
                                        <div class="col-lg-4" id="drug_details" style="display: none;">
                                            <textarea class="form-control" name="drug_abuse_details" id="drug_abuse_history_details" rows="1" placeholder="Enter your message">{{ $sensitiveInformation->drug_abuse_details ?? old('drug_abuse_details') }}</textarea>
                                            @error('drug_abuse_history_details')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
            
                                    <!-- Submit Button -->
                                    <div class="row mb-2">
                                        <div class="col-lg-12 text-center">
                                            <button type="button" id="edit-button" class="btn btn-info btn-label waves-effect waves-light {{isset($sensitiveInformation) ? 'd-flex': ''}}">
                                                <i class="ri-check-double-line label-icon align-middle fs-16 me-2"></i> Edit
                                            </button>
                                            <button type="submit" id="save-button" class="btn btn-success btn-label waves-effect waves-light {{isset($sensitiveInformation) ? 'd-none': ''}}">
                                                <i class="ri-check-double-line label-icon align-middle fs-16 me-2"></i> Save
                                            </button>
                                        </div>                                        
                                    </div>
                                </form>

                            </div>
                        </div>
                        <!--Genetic Disease Profile-->
                        <div class="tab-content text-muted">
                            <div class="tab-pane {{ Session::has('step3') ? 'active show' : '' }}" id="nav-border-step3" role="tabpanel">
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
                                            @error('additional_comments')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
            
                                    <div class="row mb-3">
                                        <div class="col-12 text-center">
                                            <button type="submit" class="btn btn-success btn-label waves-effect waves-light"><i class="ri-check-double-line label-icon align-middle fs-16 me-2"></i> Save</button>
                                        </div>
                                    </div>
                                </form>


                            </div>
                        </div>
                        <!--Other Personal Info.-->
                        <div class="tab-content text-muted">
                            <div class="tab-pane {{ Session::has('step4') ? 'active show' : '' }}" id="nav-border-step4" role="tabpanel">
                                <form method="POST" action="{{ route('personal-information.store') }}">
                                    @csrf
                                    <input type="hidden" value="{{ $otherPersonalInformation->id ?? '' }}" name="id">
            
                                    <div class="row mb-3">
                                        <div class="col-md-9">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="row mb-2">
                                                        <div class="col-lg-5">
                                                            <label for="homeAddress" class="form-label">Home Address</label>
                                                        </div>
                                                        <div class="col-lg-7">
                                                            <textarea class="form-control" id="homeAddress" name="home_address" placeholder="Enter your home address" rows="1">{{ $otherPersonalInformation->home_address ?? ''}}</textarea>
                                                            @error('home_address')
                                                                <div class="text-danger">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="row mb-2">
                                                        <div class="col-lg-5">
                                                            <label for="officeAddress" class="form-label">Office Address</label>
                                                        </div>
                                                        <div class="col-lg-7">
                                                            <textarea class="form-control" id="officeAddress" name="office_address" placeholder="Enter your office address" rows="1">{{ $otherPersonalInformation->office_address ?? ''}}</textarea>
                                                            @error('office_address')
                                                                <div class="text-danger">{{ $message }}</div>
                                                            @enderror
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
                                                            @error('email_address')
                                                                <div class="text-danger">{{ $message }}</div>
                                                            @enderror
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
                                                            @error('phone_number')
                                                                <div class="text-danger">{{ $message }}</div>
                                                            @enderror
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
                                                            @error('last_blood_donated')
                                                                <div class="text-danger">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="row mb-2">
                                                        <div class="col-lg-5">
                                                            <label for="healthInsurance" class="form-label">Health Insurance #</label>
                                                        </div>
                                                        <div class="col-lg-7">
                                                            <textarea class="form-control" id="healthInsurance" name="health_insurance_number" placeholder="Enter health insurance No." rows="1">{{ $otherPersonalInformation->health_insurance_number ?? ''}}</textarea>
                                                            @error('health_insurance_number')
                                                                <div class="text-danger">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="row mb-2">
                                                        <div class="col-lg-5">
                                                            <label for="familyPhysician" class="form-label">Family Physician (If any)</label>
                                                        </div>
                                                        <div class="col-lg-7">
                                                            <textarea class="form-control" id="familyPhysician" name="family_physician" placeholder="Enter family physician name" rows="1">{{ $otherPersonalInformation->family_physician ?? ''}}</textarea>
                                                            @error('family_physician')
                                                                <div class="text-danger">{{ $message }}</div>
                                                            @enderror
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
                                                            @error('physician_contact')
                                                                <div class="text-danger">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 {{ $user->gender != 'Female' ? 'd-none' : '' }}">
                                                    <div class="row mb-2">
                                                        <div class="col-lg-5">
                                                            <label for="pregnancyStatus" class="form-label">Pregnancy Status</label>
                                                        </div>
                                                        <div class="col-lg-7">
                                                            <select class="form-select" id="pregnancyStatus" name="pregnancy_status">
                                                                <option value="">-- Select --</option>
                                                                <option value="Yes" {{ $otherPersonalInformation && $otherPersonalInformation->pregnancy_status == "Yes" ? 'selected': ''}}>Yes</option>
                                                                <option value="No" {{ $otherPersonalInformation && $otherPersonalInformation->pregnancy_status == "No" ? 'selected': ''}}>No</option>
                                                            </select>
                                                            @error('pregnancy_status')
                                                                <div class="text-danger">{{ $message }}</div>
                                                            @enderror
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
                                                                <option value="">-- Select --</option>
                                                                <option value="Regular" {{ $otherPersonalInformation && $otherPersonalInformation->menstrual_cycle == "Regular" ? 'selected': ''}}>Regular</option>
                                                                <option value="Irregular" {{ $otherPersonalInformation && $otherPersonalInformation->menstrual_cycle == "Irregular" ? 'selected': ''}}>Irregular</option>
                                                                <option value="Menopaused" {{ $otherPersonalInformation && $otherPersonalInformation->menstrual_cycle == "Menopaused" ? 'selected': ''}}>Menopaused</option>
                                                            </select>
                                                            @error('menstrual_cycle')
                                                                <div class="text-danger">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 {{ $user->gender != 'Female' ? 'd-none' : '' }}">
                                                    <div class="row mb-2">
                                                        <div class="col-lg-5">
                                                            <label for="activityStatus" class="form-label">Activity Status</label>
                                                        </div>
                                                        <div class="col-lg-7">
                                                            <select class="form-select" id="activityStatus" name="activity_status">
                                                                <option value="">-- Select --</option>
                                                                <option value="Immobile/Paralyzed" {{ $otherPersonalInformation && $otherPersonalInformation->activity_status == "Immobile/Paralyzed" ? 'selected': ''}}>Immobile/Paralyzed</option>
                                                                <option value="Disabled" {{ $otherPersonalInformation && $otherPersonalInformation->activity_status == "Disabled" ? 'selected': ''}}>Disabled</option>
                                                                <option value="Not Very Active" {{ $otherPersonalInformation && $otherPersonalInformation->activity_status == "Not Very Active" ? 'selected': ''}}>Not Very Active</option>
                                                                <option value="Moderately Active" {{ $otherPersonalInformation && $otherPersonalInformation->activity_status == "Moderately Active" ? 'selected': ''}}>Moderately Active</option>
                                                                <option value="Highly Active" {{ $otherPersonalInformation && $otherPersonalInformation->activity_status == "Highly Active" ? 'selected': ''}}>Highly Active</option>
                                                            </select>
                                                            @error('activity_status')
                                                                <div class="text-danger">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <label for="hereditaryDisease" class="form-label">Please mention if you have a hereditary disease not listed above</label>
                                            <textarea class="form-control" id="hereditaryDisease" name="hereditary_disease" rows="10" placeholder="Enter your hereditary disease other's information">{{$otherPersonalInformation->hereditary_disease ?? ''}}</textarea>
                                            @error('hereditary_disease')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-12 text-center">
                                            <button type="submit" class="btn btn-success btn-label waves-effect waves-light"><i class="ri-check-double-line label-icon align-middle fs-16 me-2"></i> Save</button>
                                        </div>
                                    </div>
                                </form>


                            </div>
                        </div>
                    @endauth

                    
                </div>
            </div>
        </div>
        <!--end col-->
    </div>


    @push('scripts')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>

    <script>
        @if(Session::has('success'))
            Swal.fire({
                icon: 'success',
                title: 'Success!',
                text: '{{ Session::get('success') }}',
                timer: 3000,
                showConfirmButton: false
            });
        @endif

        @if(Session::has('error'))
            Swal.fire({
                icon: 'error',
                title: 'Error!',
                text: '{{ Session::get('error') }}',
                timer: 3000,
                showConfirmButton: false
            });
        @endif
    </script>

    <script>
        $(document).ready(function() {
            $('#edit-button').on('click', function() {
                $(this).addClass('d-none');
                $('#save-button').removeClass('d-none');
            });
        });
    </script>


    <script>
        //----------------------------------------------------------------
        $(document).ready(function(){
            $('#emergencyContact').mask('00000000000');
        });

        //----------------------------------------------------------------
        document.addEventListener('DOMContentLoaded', function() {
            function toggleTextarea(selectElement, textareaId, labelId) {
                var textarea = document.getElementById(textareaId);
                var label = document.getElementById(labelId);
                if (selectElement.value === 'Yes') {
                    textarea.style.display = 'block';
                    label.style.display = 'block';
                } else {
                    textarea.style.display = 'none';
                    label.style.display = 'none';
                }
            }

            var selects = [
                {id: 'allergies', textareaId: 'allergy_details_textArea', labelId: 'allergy_label_id'},
                {id: 'thyroid', textareaId: 'thyroid_details_textArea', labelId: 'thyroid_data'},
                {id: 'cholesterol', textareaId: 'cholestrol_details_textArea', labelId: 'cholesterol_data'},
                {id: 'drug_abuse_history', textareaId: 'drug_details', labelId: 'drug'},
                {id: 'alcohol_intake', textareaId: 'alcohol_intake_details', labelId: 'alcohol'},
                {id: 'smoking', textareaId: 'smoking_details', labelId: 'smoke_ing'},
                {id: 's_creatinine', textareaId: 's_creati_details', labelId: 's_creati'},
            ];

            selects.forEach(function(select) {
                var selectElement = document.getElementById(select.id);
                toggleTextarea(selectElement, select.textareaId, select.labelId); // Initial check
                selectElement.addEventListener('change', function() {
                    toggleTextarea(selectElement, select.textareaId, select.labelId);
                });
            });
        });
    </script>
    @endpush

</x-app-layout>
