<x-app-layout>
    
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">Case Data Entry</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('case_registry.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="id" value="{{ $caseRegistry->id ?? '' }}">

                        <div class="row mb-1">
                            <div class="col-lg-4">
                                <label for="date_of_primary_identification" class="form-label">Date of Primary Identification of Issue</label>
                            </div>
                            <div class="col-lg-4">
                                <input type="date" name="date_of_primary_identification" id="date_of_primary_identification" class="form-control" value="{{$caseRegistry->date_of_primary_identification ?? ''}}">
                            </div>
                        </div>
                        <div class="row mb-1">
                            <div class="col-lg-4">
                                <label for="date_of_first_visit" class="form-label">Date of First Visit to Physician</label>
                            </div>
                            <div class="col-lg-4">
                                <input type="date" name="date_of_first_visit" id="date_of_first_visit" class="form-control" required>
                            </div>
                        </div>
                        <div class="row mb-1">
                            <div class="col-lg-4">
                                <label for="recurrence" class="form-label">Recurrence</label>
                            </div>
                            <div class="col-lg-4">
                                <select name="recurrence" class="form-select" id="recurrence">
                                    <option value="Genetic">Genetic</option>
                                    <option value="First Time">First Time</option>
                                    <option value="Repetition">Repetition</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-1">
                            <div class="col-lg-4">
                                <label for="duration_of_suffering" class="form-label">Duration of Suffering (Prior to Physician Visit)</label>
                            </div>
                            <div class="col-lg-2">
                                <select class="form-select" name="duration">
                                    @foreach (range(1, 29) as $value)
                                        <option value="{{ $value }}">{{ $value }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-lg-2">
                                <select name="duration_unit" class="form-select">
                                    <option value="Hour(s)">Hour(s)</option>
                                    <option value="Day(s)">Day(s)</option>
                                    <option value="Week(s)">Week(s)</option>
                                    <option value="Month(s)">Month(s)</option>
                                    <option value="Year(s)">Year(s)</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-1">
                            <div class="col-lg-4">
                                <label for="area_of_problem" class="form-label">Area of Problem Identified</label>
                            </div>
                            <div class="col-lg-4">
                                <input type="text" name="area_of_problem" id="area_of_problem" class="form-control" required>
                            </div>
                        </div>
                        <div class="row mb-1">
                            <div class="col-lg-4">
                                <label for="type_of_ailment" class="form-label">Type of Ailment</label>
                            </div>
                            <div class="col-lg-4">
                                <select name="type_of_ailment" id="type_of_ailment" class="form-select">
                                    <option value="Neurological">Neurological</option>
                                    <option value="Eye/Visual">Eye/Visual</option>
                                    <option value="Orthopedic">Orthopedic</option>
                                    <option value="Abdomen">Abdomen</option>
                                    <option value="Gastrology">Gastrology</option>
                                    <option value="Dermatology">Dermatology</option>
                                    <option value="Oncology">Oncology</option>
                                    <option value="Reproductive">Reproductive</option>
                                    <option value="Other">Other</option>
                                    <option value="Hand">Hand</option>
                                    <option value="Nail">Nail</option>
                                    <option value="Knee">Knee</option>
                                    <option value="Joints/Muscle">Joints/Muscle</option>
                                    <option value="Psychometric">Psychometric</option>
                                    <option value="Functional Rehabilitation">Functional Rehabilitation</option>
                                    <option value="Drug Abuse/Rehabilitation">Drug Abuse/Rehabilitation</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <h4 class="card-title my-4 flex-grow-1">Complaint(s) - Click all that applies</h4>
                            </div>
                            <div class="col-md-9">
                                <div class="row">
                                    @foreach($complaints as $complaint)
                                        <div class="col-md-3">
                                            <div class="form-check">
                                                <input type="checkbox" name="mast_complaints[]" value="{{ $complaint->id }}" id="mast_complaints{{ $complaint->id }}" class="form-check-input">
                                                <label for="complaint_{{ $complaint->id }}" class="form-check-label">{{ $complaint->name }}</label>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="col-md-3">
                                <textarea class="form-control" name="additional_complaints" rows="12" placeholder="Enter your message"></textarea>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-12 text-start">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <form action="{{ route('treatment-lab-test.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" value="{{ $optionsalQuestion->id ?? '' }}" name="id">

                <div class="card">
                    <div class="card-header align-items-center d-flex">
                        <h4 class="card-title mb-0 flex-grow-1">Examination & Treatment Profile</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <!-- Doctor's Information -->
                            <div class="col-md-6">
                                <div class="row mb-1">
                                    <label for="doctorName" class="form-label col-lg-5">Name of Doctor</label>
                                    <div class="col-lg-7">
                                        <input type="text" class="form-control" name="doctor_name" id="doctorName" placeholder="">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row mb-1">
                                    <label for="designation" class="form-label col-lg-5">Designation</label>
                                    <div class="col-lg-7">
                                        <input type="text" class="form-control" name="designation" id="designation" placeholder="">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row mb-1">
                                    <label for="chamberAddress" class="form-label col-lg-5">Chamber Address</label>
                                    <div class="col-lg-7">
                                        <input type="text" class="form-control" name="chamber_address" id="chamberAddress">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row mb-1">
                                    <label for="lastVisitDate" class="form-label col-lg-5">Date of Last Visit</label>
                                    <div class="col-lg-7">
                                        <input type="date" class="form-control" name="last_visit_date" id="lastVisitDate">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row mb-1">
                                    <label for="fees" class="form-label col-lg-5">Fees (Optional)</label>
                                    <div class="col-lg-7">
                                        <input type="number" class="form-control" name="fees" id="fees" placeholder="">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row mb-1">
                                    <label for="comments" class="form-label col-lg-5">Doctor's Comment</label>
                                    <div class="col-lg-7">
                                        <textarea class="form-control" name="comments" id="comments" rows="1" placeholder="Enter your message"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row mb-1">
                                    <label for="diseaseDiagnosis" class="form-label col-lg-5">Disease/Diagnosis</label>
                                    <div class="col-lg-7">
                                        <input type="text" class="form-control" name="disease_diagnosis" id="diseaseDiagnosis" placeholder="">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row mb-1">
                                    <label for="prescription" class="form-label col-lg-5">Prescription</label>
                                    <div class="col-lg-7">
                                        <input type="file" class="form-control" name="prescription" id="prescription">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="card-header align-items-center d-flex">
                        <h4 class="card-title mb-0 flex-grow-1">Recommended Pathological/Lab Test(s)</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive table-card">
                            <table id="dataTableUploadTool" class="table table-nowrap table-striped mb-0">
                                <thead class="table-light">
                                    <tr>
                                        <th scope="col">SL</th>
                                        <th scope="col">Name of Test</th>
                                        <th scope="col">Type</th>
                                        <th scope="col">Organ</th>
                                        <th scope="col">Comments</th>
                                        <th scope="col">Cost</th>
                                        <th scope="col">Lab</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($restriction as $row)
                                        
                                    @endforeach
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>
                                            <select class="form-select" name="data[mast_test_id][]">
                                                @foreach ($tests as $item)
                                                <option value="{{ $item->id }}">{{ $item->test_name }}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td>
                                            <select class="form-select" name="data[type][]">
                                                <option value="1">Blood sample</option>
                                                <option value="2">Urine Sample</option>
                                                <option value="3">Stool Sample</option>
                                                <option value="4">Imaging</option>
                                                <option value="5">Genetic</option>
                                                <option value="6">Biopsy</option>
                                            </select>
                                        </td>
                                        <td>
                                            <select class="form-select" name="data[mast_organ_id][]">
                                                @foreach ($organs as $item)
                                                <option value="{{ $item->id }}">{{ $item->organ_name }}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td><textarea name="data[comments][]" rows="1" class="form-control"></textarea></td>
                                        <td><input type="text" name="data[cost][]" class="form-control"></td>
                                        <td><input type="text" name="data[lab][]" class="form-control"></td>
                                        <td><button type="button" class="btn btn-danger btn-sm remove-row">Remove</button></td>
                                    </tr>
                                </tbody>
                                <tfoot class="table-light">
                                    <tr>
                                        <td colspan="7"><button type="button" id="addRowLabTest" class="btn btn-secondary btn-label waves-effect waves-light"><i class="ri-add-line label-icon align-middle fs-16 me-2"></i> Add Row</button></td>
                                        <td><button type="submit" class="btn btn-success btn-label waves-effect waves-light"><i class="ri-check-double-line label-icon align-middle fs-16 me-2"></i> Save</button></td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    
    @push('scripts')
    <script>
        $(document).ready(function() {
            // Add new row
            $('#addRowLabTest').click(function() {
                var newRow = '<tr>' +
                    '<th scope="row"></th>' +
                    '<td><select class="form-select" name="data[mast_test_id][]">@foreach ($tests as $item)<option value="{{ $item->id }}">{{ $item->test_name }}</option>@endforeach</select></td>' +
                    '<td><select class="form-select" name="data[type][]"><option value="1">Blood sample</option><option value="2">Urine Sample</option><option value="3">Stool Sample</option><option value="4">Imaging</option><option value="5">Genetic</option><option value="6">Biopsy</option></select></td>' +
                    '<td><select class="form-select" name="data[mast_organ_id][]">@foreach ($organs as $item)<option value="{{ $item->id }}">{{ $item->organ_name }}</option>@endforeach</select></td>' +
                    '<td><textarea name="data[comments][]" rows="1" class="form-control"></textarea></td>' +
                    '<td><input type="text" name="data[cost][]" class="form-control"></td>' +
                    '<td><input type="text" name="data[lab][]" class="form-control"></td>' +
                    '<td><button type="button" class="btn btn-danger btn-sm remove-row">Remove</button></td>' +
                    '</tr>';

                $('#dataTableUploadTool tbody').append(newRow);
            });
    
            // Remove row
            $(document).on('click', '.remove-row', function() {
                $(this).closest('tr').remove();
            });
        });
    </script>
    @endpush
    

    
    <!-- Recommended Pathological/Lab Test -->
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">Medication/Remedy List & Schedule</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('medication-schedule.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="table-responsive table-card">
                            <table id="medicationTable" class="table table-nowrap table-striped mb-0">
                                <thead class="table-light">
                                    <tr>
                                        <th scope="col">SL</th>
                                        <th scope="col">Type</th>
                                        <th scope="col">Full Name</th>
                                        <th scope="col">Power</th>
                                        <th scope="col">Duration</th>
                                        <th scope="col">Frequency</th>
                                        <th scope="col">Cost (Total)</th>
                                        <th scope="col">Timing</th>
                                        <th scope="col">Anti-Biotic</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ( $medicationSchedule as $key => $row )
                                        <tr>
                                            <th scope="row">{{++$key}}</th>
                                            <td>
                                                <select class="form-select" name="data[1][mast_equipment_id]" disabled>
                                                    @foreach($equipments as $equipment)
                                                        <option value="{{ $equipment->id }}" {{$row->equipment->name == $equipment->name ? 'selected' : ''}}>{{ $equipment->name }}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td><input type="text" name="data[1][full_name]" class="form-control" value="{{$row->full_name}}" disabled></td>
                                            <td>
                                                <select class="form-select" name="data[1][mast_power_id]" disabled>
                                                    @foreach($powers as $power)
                                                        <option value="{{ $power->id }}" {{$row->power->name == $equipment->name ? 'selected' : ''}}>{{ $power->name }}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td>
                                                <select class="form-select" name="data[1][duration]" disabled>
                                                    <option value="3 Days" {{$row->duration == '3 Days' ? 'selected' : '' }}>3 Days</option>
                                                    <option value="7 Days" {{$row->duration == '7 Days' ? 'selected' : '' }}>7 Days</option>
                                                    <option value="10 Days" {{$row->duration == '10 Days' ? 'selected' : '' }}>10 Days</option>
                                                    <option value="14 Days" {{$row->duration == '14 Days' ? 'selected' : '' }}>14 Days</option>
                                                    <option value="21 Days" {{$row->duration == '21 Days' ? 'selected' : '' }}>21 Days</option>
                                                    <option value="28 Days" {{$row->duration == '28 Days' ? 'selected' : '' }}>28 Days</option>
                                                    <option value="1 Month" {{$row->duration == '1 Month' ? 'selected' : '' }}>1 Month</option>
                                                    <option value="2 Months" {{$row->duration == '2 Months' ? 'selected' : '' }}>2 Months</option>
                                                    <option value="3 Months" {{$row->duration == '3 Months' ? 'selected' : '' }}>3 Months</option>
                                                    <option value="6 Months" {{$row->duration == '6 Months' ? 'selected' : '' }}>6 Months</option>
                                                    <option value="Extensive (Undecided)" {{$row->duration == 'Extensive (Undecided)' ? 'selected' : '' }}>Extensive (Undecided)</option>
                                                </select>
                                            </td>
                                            <td><input type="text" name="data[1][frequency]" class="form-control" value="{{$row->frequency}}" disabled></td>
                                            <td><input type="text" name="data[1][cost]" class="form-control" value="{{$row->cost}}" disabled></td>
                                            <td>
                                                <select class="form-select" name="data[1][timing]" disabled>
                                                    <option value="Before meal" {{$row->timing == 'Before meal' ? 'selected' : '' }}>Before meal</option>
                                                    <option value="After meal" {{$row->timing == 'After meal' ? 'selected' : '' }}>After meal</option>
                                                    <option value="On Empty Stomach"> {{$row->timing == 'On Empty Stomach' ? 'selected' : '' }}On Empty Stomach</option>
                                                </select>
                                            </td>
                                            <td>
                                                <select class="form-select" name="data[1][antibiotic]" disabled>
                                                    <option value="Yes" {{$row->antibiotic == 'Yes' ? 'selected' : '' }}>Yes</option>
                                                    <option value="No" {{$row->antibiotic == 'No' ? 'selected' : '' }}>No</option>
                                                    <option value="Not Sure" {{$row->antibiotic == 'Not Sure' ? 'selected' : '' }}>Not Sure</option>
                                                </select>
                                            </td>
                                            <td><button type="button" class="btn btn-danger btn-sm remove-row">Remove</button></td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot class="table-light">
                                    <tr>
                                        <td colspan="9">
                                            <button type="button" id="addRowMedicationSchedule" class="btn btn-secondary btn-label waves-effect waves-light">
                                                <i class="ri-add-line label-icon align-middle fs-16 me-2"></i> Add Row
                                            </button>
                                        </td>
                                        <td>
                                            <button type="submit" class="btn btn-success btn-label waves-effect waves-light">
                                                <i class="ri-check-double-line label-icon align-middle fs-16 me-2"></i> Save
                                            </button>
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    <script>
        $(document).ready(function() {

            var index = $('#medicationTable tbody tr').length + 1;
            addRowMedicationSchedule(index);

            // Add Row button click event
            $('#addRowMedicationSchedule').click(function() {
                var index = $('#medicationTable tbody tr').length + 1;
                addRowMedicationSchedule(index);
            });


            function addRowMedicationSchedule(index){
                var newRow = `<tr>
                    <th scope="row">${index}</th>
                    <td>
                        <select class="form-select" name="data[${index}][mast_equipment_id]">
                            @foreach($equipments as $equipment)
                                <option value="{{ $equipment->id }}">{{ $equipment->name }}</option>
                            @endforeach
                        </select>
                    </td>
                    <td><input type="text" name="data[${index}][full_name]" class="form-control"></td>
                    <td>
                        <select class="form-select" name="data[${index}][mast_power_id]">
                            @foreach($powers as $power)
                                <option value="{{ $power->id }}">{{ $power->name }}</option>
                            @endforeach
                        </select>
                    </td>
                    <td>
                        <select class="form-select" name="data[${index}][duration]">
                            <option value="3 Days">3 Days</option>
                            <option value="7 Days">7 Days</option>
                            <option value="10 Days">10 Days</option>
                            <option value="14 Days">14 Days</option>
                            <option value="21 Days">21 Days</option>
                            <option value="28 Days">28 Days</option>
                            <option value="1 Month">1 Month</option>
                            <option value="2 Months">2 Months</option>
                            <option value="3 Months">3 Months</option>
                            <option value="6 Months">6 Months</option>
                            <option value="Extensive (Undecided)">Extensive (Undecided)</option>
                        </select>
                    </td>
                    <td><input type="text" name="data[${index}][frequency]" class="form-control"></td>
                    <td><input type="text" name="data[${index}][cost]" class="form-control"></td>
                    <td>
                        <select class="form-select" name="data[${index}][timing]">
                            <option value="Before meal">Before meal</option>
                            <option value="After meal">After meal</option>
                            <option value="On Empty Stomach">On Empty Stomach</option>
                        </select>
                    </td>
                    <td>
                        <select class="form-select" name="data[${index}][antibiotic]">
                            <option value="Yes">Yes</option>
                            <option value="No">No</option>
                            <option value="Not Sure">Not Sure</option>
                        </select>
                    </td>
                    <td><button type="button" class="btn btn-danger btn-sm remove-row">Remove</button></td>
                </tr>`;
                $('#medicationTable tbody').append(newRow);
            }




            // Remove Row button click event
            $(document).on('click', '.remove-row', function() {
                $(this).closest('tr').remove();
                updateRowNumbers();
            });

            // Update row numbers function
            function updateRowNumbers() {
                $('#medicationTable tbody tr').each(function(index) {
                    $(this).find('th').text(index + 1);
                });
            }
        });
    </script>
    @endpush

    

    <!-- Surgical/Fixed Intervention(s) -->
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">Surgical/Fixed Intervention(s)</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('surgical-intervention.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                    
                        <div class="table-responsive table-card">
                            <table id="surgicalTable" class="table table-nowrap table-striped mb-0">
                                <thead class="table-light">
                                    <tr>
                                        <th scope="col">SL</th>
                                        <th scope="col">Intervention</th>
                                        <th scope="col">Due Time</th>
                                        <th scope="col">Other Important Details</th>
                                        <th scope="col">Cost</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($surgicalIntervention as $key => $row)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td> 
                                                <select class="form-select" name="data[{{ $key }}][intervention]" disabled>
                                                    <option value="Prosthesis" {{ $row->intervention == "Prosthesis" ? 'selected' : '' }}>Prosthesis</option>
                                                    <option value="Orthosis" {{ $row->intervention == "Orthosis" ? 'selected' : '' }}>Orthosis</option>
                                                    <option value="Surgery (Minor)" {{ $row->intervention == "Surgery (Minor)" ? 'selected' : '' }}>Surgery (Minor)</option>
                                                    <option value="Surgery (Major)" {{ $row->intervention == "Surgery (Major)" ? 'selected' : '' }}>Surgery (Major)</option>
                                                    <option value="Stiches" {{ $row->intervention == "Stiches" ? 'selected' : '' }}>Stiches</option>
                                                    <option value="Amputation" {{ $row->intervention == "Amputation" ? 'selected' : '' }}>Amputation</option>
                                                    <option value="Dismembering" {{ $row->intervention == "Dismembering" ? 'selected' : '' }}>Dismembering</option>
                                                    <option value="Hearing Aid" {{ $row->intervention == "Hearing Aid" ? 'selected' : '' }}>Hearing Aid</option>
                                                    <option value="Plaster (Short Term)" {{ $row->intervention == "Plaster (Short Term)" ? 'selected' : '' }}>Plaster (Short Term)</option>
                                                    <option value="Plaster (Long Term)" {{ $row->intervention == "Plaster (Long Term)" ? 'selected' : '' }}>Plaster (Long Term)</option>
                                                    <option value="Nebulization" {{ $row->intervention == "Nebulization" ? 'selected' : '' }}>Nebulization</option>
                                                </select>
                                            </td>
                                            <td>
                                                <select class="form-select" name="data[{{ $key }}][due_time]" disabled>
                                                    <option value="ASAP" {{ $row->due_time == "ASAP" ? 'selected' : '' }}>ASAP</option>
                                                    <option value="Within 24 Hours" {{ $row->due_time == "Within 24 Hours" ? 'selected' : '' }}>Within 24 Hours</option>
                                                    <option value="Within 2 Days" {{ $row->due_time == "Within 2 Days" ? 'selected' : '' }}>Within 2 Days</option>
                                                    <option value="Within 3 Days" {{ $row->due_time == "Within 3 Days" ? 'selected' : '' }}>Within 3 Days</option>
                                                    <option value="Within 4 Days" {{ $row->due_time == "Within 4 Days" ? 'selected' : '' }}>Within 4 Days</option>
                                                    <option value="Within 1 Week" {{ $row->due_time == "Within 1 Week" ? 'selected' : '' }}>Within 1 Week</option>
                                                    <option value="Within 10 Days" {{ $row->due_time == "Within 10 Days" ? 'selected' : '' }}>Within 10 Days</option>
                                                    <option value="Within 2 Weeks" {{ $row->due_time == "Within 2 Weeks" ? 'selected' : '' }}>Within 2 Weeks</option>
                                                    <option value="Within 3 Weeks" {{ $row->due_time == "Within 3 Weeks" ? 'selected' : '' }}>Within 3 Weeks</option>
                                                    <option value="Within 1 Month" {{ $row->due_time == "Within 1 Month" ? 'selected' : '' }}>Within 1 Month</option>
                                                    <option value="Within 2 Months" {{ $row->due_time == "Within 2 Months" ? 'selected' : '' }}>Within 2 Months</option>
                                                    <option value="Within 3 Months" {{ $row->due_time == "Within 3 Months" ? 'selected' : '' }}>Within 3 Months</option>
                                                    <option value="Within 4 Months" {{ $row->due_time == "Within 4 Months" ? 'selected' : '' }}>Within 4 Months</option>
                                                    <option value="Within 6 Months" {{ $row->due_time == "Within 6 Months" ? 'selected' : '' }}>Within 6 Months</option>
                                                    <option value="No time limit" {{ $row->due_time == "No time limit" ? 'selected' : '' }}>No time limit</option>
                                                </select>
                                            </td>
                                            <td><textarea name="data[{{ $key }}][details]" class="form-control" rows="1" disabled>{{ $row->details }}</textarea></td>
                                            <td><input type="text" name="data[{{ $key }}][cost]" class="form-control" value="{{ $row->cost }}" disabled></td>
                                            <td><button type="button" class="btn btn-danger btn-sm remove-row">Remove</button></td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot class="table-light">
                                    <tr>
                                        <td colspan="5">
                                            <button type="button" id="addRowSurgical" class="btn btn-secondary btn-label waves-effect waves-light">
                                                <i class="ri-add-line label-icon align-middle fs-16 me-2"></i> Add Row
                                            </button>
                                        </td>
                                        <td class="text-end">
                                            <button type="submit" class="btn btn-success btn-label waves-effect waves-light">
                                                <i class="ri-check-double-line label-icon align-middle fs-16 me-2"></i> Save
                                            </button>
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    <script>
        $(document).ready(function() {
            var index = $('#surgicalTable tbody tr').length + 1;
            addRowSurgical(index);

            // Add Row button click event
            $('#addRowSurgical').click(function() {
                var index = $('#surgicalTable tbody tr').length + 1;
                addRowSurgical(index);
            });

            // Function to add a new row
            function addRowSurgical(index) {
                var newRow = `<tr>
                    <td>${index}</td>
                    <td> 
                        <select class="form-select" name="data[${index}][intervention]">
                            <option value="Prosthesis">Prosthesis</option>
                            <option value="Orthosis">Orthosis</option>
                            <option value="Surgery (Minor)">Surgery (Minor)</option>
                            <option value="Surgery (Major)">Surgery (Major)</option>
                            <option value="Stiches">Stiches</option>
                            <option value="Amputation">Amputation</option>
                            <option value="Dismembering">Dismembering</option>
                            <option value="Hearing Aid">Hearing Aid</option>
                            <option value="Plaster (Short Term)">Plaster (Short Term)</option>
                            <option value="Plaster (Long Term)">Plaster (Long Term)</option>
                            <option value="Nebulization">Nebulization</option>
                        </select>
                    </td>
                    <td>
                        <select class="form-select" name="data[${index}][due_time]">
                            <option value="ASAP">ASAP</option>
                            <option value="Within 24 Hours">Within 24 Hours</option>
                            <option value="Within 2 Days">Within 2 Days</option>
                            <option value="Within 3 Days">Within 3 Days</option>
                            <option value="Within 4 Days">Within 4 Days</option>
                            <option value="Within 1 Week">Within 1 Week</option>
                            <option value="Within 10 Days">Within 10 Days</option>
                            <option value="Within 2 Weeks">Within 2 Weeks</option>
                            <option value="Within 3 Weeks">Within 3 Weeks</option>
                            <option value="Within 1 Month">Within 1 Month</option>
                            <option value="Within 2 Months">Within 2 Months</option>
                            <option value="Within 3 Months">Within 3 Months</option>
                            <option value="Within 4 Months">Within 4 Months</option>
                            <option value="Within 6 Months">Within 6 Months</option>
                            <option value="No time limit">No time limit</option>
                        </select>
                    </td>
                    <td><textarea name="data[${index}][details]" class="form-control" rows="1"></textarea></td>
                    <td><input type="text" name="data[${index}][cost]" class="form-control"></td>
                    <td><button type="button" class="btn btn-danger btn-sm remove-row">Remove</button></td>
                </tr>`;
                $('#surgicalTable tbody').append(newRow);
            }

            // Remove Row button click event
            $(document).on('click', '.remove-row', function() {
                $(this).closest('tr').remove();
                updateRowNumbers();
            });

            // Update row numbers function
            function updateRowNumbers() {
                $('#surgicalTable tbody tr').each(function(index) {
                    $(this).find('td:first').text(index + 1);
                });
            }
        });
    </script>
    @endpush




    <div class="row">
        <!-- Other Optional Question(s) -->
        <div class="col-lg-7">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">Other Optional Question(s)</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('optional-questions.store') }}" method="POST">
                        @csrf
                        <input type="hidden" value="{{ $optionsalQuestion->id ?? '' }}" name="id">

                        <div class="row mb-3">
                            <div class="col-lg-9">
                                <label for="admitted_following_diagnosis" class="form-label"><strong>1.</strong> Were you admitted in hospital/Clinic following the diagnosis?</label>
                            </div>
                            <div class="col-lg-3">
                                <select class="form-select" id="admitted_following_diagnosis" name="admitted_following_diagnosis">
                                    <option value="No" {{ isset($optionsalQuestion) && $optionsalQuestion->admitted_following_diagnosis == "No" ? 'selected' : '' }}>No</option>
                                    <option value="Yes" {{ isset($optionsalQuestion) && $optionsalQuestion->admitted_following_diagnosis == "Yes" ? 'selected' : '' }}>Yes</option>
                                </select>                                
                            </div>
                        </div>

                        <div class="row mb-3 admitted-following-diagnosis {{ isset($optionsalQuestion) && $optionsalQuestion->admitted_following_diagnosis == "Yes" ? 'd-flex' : '' }}">
                            <div class="col-lg-9">
                                <label for="hospitalization_duration" class="form-label"><strong>A.</strong> If the answer is yes for Q1, how long?</label>
                            </div>
                            <div class="col-lg-3">
                                <select class="form-select" id="hospitalization_duration" name="hospitalization_duration">
                                    <option value="3 Days" {{ isset($optionsalQuestion) && $optionsalQuestion->hospitalization_duration == "3 Days" ? 'selected' : '' }}>3 Days</option>
                                    <option value="7 Days" {{ isset($optionsalQuestion) && $optionsalQuestion->hospitalization_duration == "7 Days" ? 'selected' : '' }}>7 Days</option>
                                    <option value="10 Days" {{ isset($optionsalQuestion) && $optionsalQuestion->hospitalization_duration == "10 Days" ? 'selected' : '' }}>10 Days</option>
                                    <option value="14 Days" {{ isset($optionsalQuestion) && $optionsalQuestion->hospitalization_duration == "14 Days" ? 'selected' : '' }}>14 Days</option>
                                    <option value="21 Days" {{ isset($optionsalQuestion) && $optionsalQuestion->hospitalization_duration == "21 Days" ? 'selected' : '' }}>21 Days</option>
                                    <option value="28 Days" {{ isset($optionsalQuestion) && $optionsalQuestion->hospitalization_duration == "28 Days" ? 'selected' : '' }}>28 Days</option>
                                    <option value="1 Month" {{ isset($optionsalQuestion) && $optionsalQuestion->hospitalization_duration == "1 Month" ? 'selected' : '' }}>1 Month</option>
                                    <option value="2 Months" {{ isset($optionsalQuestion) && $optionsalQuestion->hospitalization_duration == "2 Months" ? 'selected' : '' }}>2 Months</option>
                                    <option value="3 Months" {{ isset($optionsalQuestion) && $optionsalQuestion->hospitalization_duration == "3 Months" ? 'selected' : '' }}>3 Months</option>
                                    <option value="6 Months" {{ isset($optionsalQuestion) && $optionsalQuestion->hospitalization_duration == "6 Months" ? 'selected' : '' }}>6 Months</option>
                                    <option value="Extensive (Undecided)" {{ isset($optionsalQuestion) && $optionsalQuestion->hospitalization_duration == "Extensive (Undecided)" ? 'selected' : '' }}>Extensive (Undecided)</option>
                                </select>                                
                            </div>
                        </div>

                        <div class="row mb-3 admitted-following-diagnosis {{ isset($optionsalQuestion) && $optionsalQuestion->admitted_following_diagnosis == "Yes" ? 'd-flex' : '' }}">
                            <div class="col-lg-9">
                                <label for="total_cost_incurred" class="form-label"><strong>B.</strong> Total Costs incurred during hospitalization</label>
                            </div>
                            <div class="col-lg-3">
                                <input type="number" class="form-control" id="total_cost_incurred" name="total_cost_incurred" value="{{ isset($optionsalQuestion) ? $optionsalQuestion->total_cost_incurred : '' }}">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-lg-9">
                                <label for="medication_effectiveness" class="form-label"><strong>2.</strong> Did the medication and/or interventions cure the problem completely?</label>
                            </div>
                            <div class="col-lg-3">
                                <select class="form-select" id="medication_effectiveness" name="medication_effectiveness">
                                    <option value="Yes" {{ isset($optionsalQuestion) && $optionsalQuestion->medication_effectiveness == 'Yes' ? 'selected' : '' }}>Yes</option>
                                    <option value="No" {{ isset($optionsalQuestion) && $optionsalQuestion->medication_effectiveness == 'No' ? 'selected' : '' }}>No</option>
                                    <option value="Not Sure" {{ isset($optionsalQuestion) && $optionsalQuestion->medication_effectiveness == 'Not Sure' ? 'selected' : '' }}>Not Sure</option>
                                    <option value="Not Curable" {{ isset($optionsalQuestion) && $optionsalQuestion->medication_effectiveness == 'Not Curable' ? 'selected' : '' }}>Not Curable</option>
                                    <option value="Long Term Intervention Required" {{ isset($optionsalQuestion) && $optionsalQuestion->medication_effectiveness == 'Long Term Intervention Required' ? 'selected' : '' }}>Long Term Intervention Required</option>
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-lg-9">
                                <label for="satisfied_with_treatment" class="form-label"><strong>3.</strong> Are you satisfied with how you were treated (overall)?</label>
                            </div>
                            <div class="col-lg-3">
                                <select class="form-select" id="satisfied_with_treatment" name="satisfied_with_treatment">
                                    <option value="Yes" {{ isset($optionsalQuestion) && $optionsalQuestion->satisfied_with_treatment == 'Yes' ? 'selected' : '' }}>Yes</option>
                                    <option value="No" {{ isset($optionsalQuestion) && $optionsalQuestion->satisfied_with_treatment == 'No' ? 'selected' : '' }}>No</option>
                                </select>                                
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-lg-9">
                                <label for="recommend_physician" class="form-label"><strong>4.</strong> Would you recommend your physician/doctor to others?</label>
                            </div>
                            <div class="col-lg-3">
                                <select class="form-select" id="recommend_physician" name="recommend_physician">
                                    <option value="Yes" {{ isset($optionsalQuestion) && $optionsalQuestion->recommend_physician == 'Yes' ? 'selected' : '' }}>Yes</option>
                                    <option value="No" {{ isset($optionsalQuestion) && $optionsalQuestion->recommend_physician == 'No' ? 'selected' : '' }}>No</option>
                                </select>                                
                            </div>
                        </div>

                        <div class="card-footer d-flex justify-content-end">
                            <button type="submit" class="btn btn-success btn-label waves-effect waves-light">
                                <i class="ri-check-double-line label-icon align-middle fs-16 me-7"></i> Save
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        @push('scripts')
        <script>
            $(document).ready(function() {
                // Function to update visibility and disable/enabled state based on admittedFollowing value
                function updateFields(admittedFollowing) {
                    if (admittedFollowing === 'No') {
                        $('.admitted-following-diagnosis').removeClass('d-flex').hide();
                        $('#hospitalization_duration, #total_cost_incurred').prop('disabled', true);
                    } else {
                        $('.admitted-following-diagnosis').addClass('d-flex').show();
                        $('#hospitalization_duration, #total_cost_incurred').prop('disabled', false);
                    }
                }

                // Initial check on document ready
                var admittedFollowing = $('#admitted_following_diagnosis').val();
                updateFields(admittedFollowing);

                // Event handler for change on #admitted_following_diagnosis
                $('#admitted_following_diagnosis').change(function() {
                    var admittedFollowing = $(this).val();
                    updateFields(admittedFollowing);
                });
            });

        </script>
        @endpush

        <!-- Restriction(s) if any -->
        <div class="col-lg-5">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">Restriction(s) if any</h4>
                </div>
                <div class="card-body">
                    <form id="restrictionForm" action="{{ route('restriction.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="table-responsive table-card">
                            <table id="restrictionTable" class="table table-nowrap table-striped mb-0">
                                <thead class="table-light">
                                    <tr>
                                        <th scope="col">SL</th>
                                        <th scope="col">Type</th>
                                        <th scope="col">Details</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($restriction as $key => $row)
                                        <tr>
                                            <td>{{++$key }}</td>
                                            <td><input type="text" name="types[]" class="form-control" value="{{$row->type}}" disabled></td>
                                            <td><textarea name="details[]" class="form-control" rows="1" disabled>{{$row->details}}</textarea></td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot class="table-light">
                                    <tr>
                                        <td colspan="3">
                                            <button type="button" id="addRowRestriction" class="btn btn-secondary btn-label waves-effect waves-light">
                                                <i class="ri-add-line label-icon align-middle fs-16 me-2"></i> Add Row
                                            </button>
                                        </td>
                                        <td class="text-end">
                                            <button type="submit" class="btn btn-success btn-label waves-effect waves-light">
                                                <i class="ri-check-double-line label-icon align-middle fs-16 me-2"></i> Save
                                            </button>
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>

                    </form>
                </div>
            </div>
        </div>

        @push('scripts')
        <script>
            $(document).ready(function() {

                var index = $('#restrictionTable tbody tr').length + 1;
                addRowRestriction(index);

                // Add Row button click event
                $('#addRowRestriction').click(function() {
                    var index = $('#restrictionTable tbody tr').length + 1;
                    addRowRestriction(index);
                });

                function addRowRestriction(index){
                    var newRow = `<tr>
                        <td>${index}</td>
                        <td><input type="text" name="types[]" class="form-control"></td>
                        <td><textarea name="details[]" class="form-control" rows="1"></textarea></td>
                        <td><button type="button" class="btn btn-danger btn-sm remove-row">Remove</button></td>
                    </tr>`;
                    $('#restrictionTable tbody').append(newRow);
                }

                // Remove Row button click event
                $(document).on('click', '.remove-row', function() {
                    $(this).closest('tr').remove();
                    updateRowNumbers();
                });

                // Update row numbers function
                function updateRowNumbers() {
                    $('#restrictionTable tbody tr').each(function(index) {
                        $(this).find('td:first').text(index + 1);
                    });
                }
            });
        </script>
        @endpush


    </div>

</x-app-layout>