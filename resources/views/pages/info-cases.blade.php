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
                        <input type="hidden" name="patient_id" value="{{ Auth::user()->id }}">
                        <div class="row mb-1">
                            <div class="col-lg-4">
                                <label for="date_of_primary_identification" class="form-label">Date of Primary Identification of Issue</label>
                            </div>
                            <div class="col-lg-4">
                                <input type="date" name="date_of_primary_identification" id="date_of_primary_identification" class="form-control" required>
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
                                                <input type="checkbox" name="complaints[]" value="{{ $complaint->id }}" id="complaint_{{ $complaint->id }}" class="form-check-input">
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
                </div>
    
                <div class="card">
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
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>
                                            <select class="form-select" name="document_name[]">
                                                @foreach ($tests as $item)
                                                <option value="{{ $item->id }}">{{ $item->test_name }}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td>
                                            <select class="form-select" name="type[]">
                                                <option value="1">Blood sample</option>
                                                <option value="2">Urine Sample</option>
                                                <option value="3">Stool Sample</option>
                                                <option value="4">Imaging</option>
                                                <option value="5">Genetic</option>
                                                <option value="6">Biopsy</option>
                                            </select>
                                        </td>
                                        <td>
                                            <select class="form-select" name="organ[]">
                                                @foreach ($organs as $item)
                                                <option value="{{ $item->id }}">{{ $item->organ_name }}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td><textarea name="comments[]" rows="1" class="form-control"></textarea></td>
                                        <td><input type="text" name="cost[]" class="form-control"></td>
                                        <td><input type="text" name="lab[]" class="form-control"></td>
                                        <td><button type="button" class="btn btn-danger btn-sm remove-row">Remove</button></td>
                                    </tr>
                                </tbody>
                                <tfoot class="table-light">
                                    <tr>
                                        <td colspan="7"><button type="button" id="addRow" class="btn btn-secondary btn-label waves-effect waves-light"><i class="ri-add-line label-icon align-middle fs-16 me-2"></i> Add Row</button></td>
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
            $('#addRow').click(function() {
                var newRow = '<tr>' +
                    '<th scope="row"></th>' +
                    '<td><select class="form-select" name="document_name[]">@foreach ($tests as $item)<option value="{{ $item->id }}">{{ $item->test_name }}</option>@endforeach</select></td>' +
                    '<td><select class="form-select" name="type[]"><option value="1">Blood sample</option><option value="2">Urine Sample</option><option value="3">Stool Sample</option><option value="4">Imaging</option><option value="5">Genetic</option><option value="6">Biopsy</option></select></td>' +
                    '<td><select class="form-select" name="organ[]">@foreach ($organs as $item)<option value="{{ $item->id }}">{{ $item->organ_name }}</option>@endforeach</select></td>' +
                    '<td><textarea name="comments[]" rows="1" class="form-control"></textarea></td>' +
                    '<td><input type="text" name="cost[]" class="form-control"></td>' +
                    '<td><input type="text" name="lab[]" class="form-control"></td>' +
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
    




    
<!-- {{-- Recommended Pathological/Lab Test --}} -->
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header align-items-center d-flex">
                <h4 class="card-title mb-0 flex-grow-1">Medication/Remedy List & Schedule</h4>
            </div>
            <div class="card-body">
                <div class="row mb-1" >
                    <table class="table table-bordered border-dark">
                       <thead >
    <tr>
      <th scope="col">SL</th>
      <th scope="col">Type</th>
      <th scope="col">Full Name</th>
      <th scope="col">Power</th>
      <th scope="col">Duration</th>
      <th scope="col">Frequency</th>
      <th scope="col">Cost (Pc)</th>
      <th scope="col">Timing</th>
      <th scope="col">Anti-Biotic</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td style="width: 17%;"> 
        <select class="form-select" id="inputGroupSelect01">
        <option value="1">Capsule</option>
        <option value="1">Tablet</option>
        <option value="1">Ointment</option>                             
        <option value="1">Droplet</option>
        <option value="1">Saline (Oral)</option>
        <option value="1">Saline (IV)</option>                                   
        <option value="1">Injection (IV)</option>
        <option value="2">Injection (IM)</option>
        <option value="3">Vaccination</option>
        <option value="4">Powder</option>
        <option value="3">Physiotherapy</option>
        <option value="3">Audiotherapy</option>
        <option value="3">Aromatherapy</option>
        <option value="3">Speech & Language Therapy</option>
        <option value="3">Occupational Therapy</option>
        <option value="3">Radiotherapy</option>
        <option value="3">Psychotherapy</option>
        <option value="3">Psycho Social Counselling</option>
        <option value="3">Couple Counselling</option>
    </select>
</td>
      <td >
        Maxpro
      </td>
      <td style="width: 11%;">
        <select class="form-select" id="inputGroupSelect01">
        <option value="3">5mg</option>
        <option value="3">10 mg</option>
        <option value="3">20 mg</option>
        <option value="3">25 mg</option>
        <option value="3">40 mg</option>
        <option value="3">50 mg</option>
        <option value="3">60 mg</option> 
        <option value="3">70 mg</option> 
        <option value="3">75 mg</option>                                    
        <option value="3">80 mg</option> 
        <option value="3">100 mg</option> 
        <option value="3">120 mg</option> 
        <option value="3">150 mg</option>
        <option value="3">180 mg</option>  
        <option value="3">200 mg</option> 
        <option value="3">250 mg</option> 
        <option value="3">300 mg</option> 
        <option value="3">350 mg</option> 
        <option value="3">400 mg</option> 
        <option value="3">450 mg</option> 
        <option value="3">500 mg</option> 
        <option value="3">600 mg</option> 
        <option value="3">700 mg</option> 
        <option value="3">800 mg</option> 
        <option value="3">1000 mg</option> 
        <option value="3">1200 mg </option> 
        <option value="3">1500 mg</option> 
        <option value="1">2000 mg</option> 
        </select>
      </td>
      <td style="width:14%;">
        <select class="form-select" id="inputGroupSelect01">
            <option value="1">3 Days</option>
            <option value="1">7 Days</option>
            <option value="1">10 Days</option>                             
            <option value="1">14 Days</option>
            <option value="1">21 Days</option>
            <option value="1">28 Days</option>                                   
            <option value="1">1 Month</option>
            <option value="2">2 Months</option>
            <option value="3">3 Months</option>
            <option value="4">6 Months</option>
            <option value="3">Extensive (Undecided)</option>
          
        </select>
      </td>
      <td></td>
      <td></td>
      
      <td style="width: 16%;">
        <select class="form-select" id="inputGroupSelect01">
            <option value="1">Before meal</option>
            <option value="1">After meal</option>
            <option value="1">On Empty Stomach</option>                             
           
      </td>
       <td> <select class="form-select" id="inputGroupSelect01">
        <option value="1">Yes</option>
        <option value="1">No</option>
        <option value="1">Not Sure</option>
         </select>
        </td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td >
        <select class="form-select" id="inputGroupSelect01">
            <option value="1">Capsule</option>
            <option value="1">Tablet</option>
            <option value="1">Ointment</option>                             
            <option value="1">Droplet</option>
            <option value="1">Saline (Oral)</option>
            <option value="1">Saline (IV)</option>                                   
            <option value="1">Injection (IV)</option>
            <option value="2">Injection (IM)</option>
            <option value="3">Vaccination</option>
            <option value="4">Powder</option>
            <option value="3">Physiotherapy</option>
            <option value="3">Audiotherapy</option>
            <option value="3">Aromatherapy</option>
            <option value="3">Speech & Language Therapy</option>
            <option value="3">Occupational Therapy</option>
            <option value="3">Radiotherapy</option>
            <option value="3">Psychotherapy</option>
            <option value="3">Psycho Social Counselling</option>
            <option value="3">Couple Counselling</option>
  </select>
      </td>
      <td >  
        Fimoxil
     </td>
      <td>
        <select class="form-select" id="inputGroupSelect01">
            <option value="3">5mg</option>
            <option value="3">10 mg</option>
            <option value="3">20 mg</option>
            <option value="3">25 mg</option>
            <option value="3">40 mg</option>
            <option value="3">50 mg</option>
            <option value="3">60 mg</option> 
            <option value="3">70 mg</option> 
            <option value="3">75 mg</option>                                    
            <option value="3">80 mg</option> 
            <option value="3">100 mg</option> 
            <option value="3">120 mg</option> 
            <option value="3">150 mg</option>
            <option value="3">180 mg</option>  
            <option value="3">200 mg</option> 
            <option value="3">250 mg</option> 
            <option value="3">300 mg</option> 
            <option value="3">350 mg</option> 
            <option value="3">400 mg</option> 
            <option value="3">450 mg</option> 
            <option value="3">500 mg</option> 
            <option value="3">600 mg</option> 
            <option value="3">700 mg</option> 
            <option value="3">800 mg</option> 
            <option value="3">1000 mg</option> 
            <option value="3">1200 mg </option> 
            <option value="3">1500 mg</option> 
            <option value="1">2000 mg</option> 
      
        
        </select>
      </td>
      <td style="width:14%;">
        <select class="form-select" id="inputGroupSelect01">
            <option value="1">3 Days</option>
            <option value="1">7 Days</option>
            <option value="1">10 Days</option>                             
            <option value="1">14 Days</option>
            <option value="1">21 Days</option>
            <option value="1">28 Days</option>                                   
            <option value="1">1 Month</option>
            <option value="2">2 Months</option>
            <option value="3">3 Months</option>
            <option value="4">6 Months</option>
            <option value="3">Extensive (Undecided)</option>
          
        </select>
      </td>
      <td></td>

      <td >
                                   
           
      </td>
       <td style="width: 16%;">
         <select class="form-select" id="inputGroupSelect01">
        <option value="1">Before meal</option>
        <option value="1">After meal</option>
        <option value="1">On Empty Stomach</option>
         </select>
     </td>
     <td>
        <select class="form-select" id="inputGroupSelect01">
            <option value="1">Yes</option>
            <option value="1">No</option>
            <option value="1">Not Sure</option>
             </select>
     </td>
    </tr>
    <tr>
        <th scope="row">3</th>
        <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      </tr>
      <tr>
       
            
        </tr>
  </tbody>
 </table>
 <div class="card-footer d-flex justify-content-between">
    <button type="button" id="addRowPressure" class="btn btn-secondary btn-label waves-effect waves-light"><i class="ri-add-line label-icon align-middle fs-16 me-2"></i> Add Row</button>
    <button type="button" class="btn btn-success btn-label waves-effect waves-light"><i class="ri-check-double-line label-icon align-middle fs-16 me-2"></i> Save</button> 
</div>
</div>
</div>
</div>
</div>
</div>

<!-- Surgical/Fixed Intervention(s) -->
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header align-items-center d-flex">
                <h4 class="card-title mb-0 flex-grow-1">Surgical/Fixed Intervention(s)</h4>
            </div>
            <div class="card-body">
                <div class="row mb-1" >
                    <table class="table table-bordered border-dark">
                       <thead >
    <tr>
      <th scope="col">SL</th>
      <th scope="col">Intervention</th>
      <th scope="col">Due Time</th>
      <th scope="col">Other Important Details</th>
      <th scope="col">Cost</th>
      
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td style="width: 19%;"> 
        <select class="form-select" id="inputGroupSelect01">
        <option value="1">Prosthesis</option>
        <option value="1">Orthosis</option>
        <option value="1">Surgery (Minor)</option>                             
        <option value="1">Surgery (Major)</option>
        <option value="1">Stiches</option>
        <option value="1">Amputation</option>                                   
        <option value="1">Dismembering</option>
        <option value="2">Hearing Aid</option>
        <option value="3">Plaster (Short Term)</option>
        <option value="4">Paster (Long Term)</option>
        <option value="3">Nebulization</option>
      
    </select>
</td>
      <td style="width: 18%;">
        <select class="form-select" id="inputGroupSelect01">
            <option value="3">ASAP</option>
            <option value="3">Within 24 Hours </option>
            <option value="3">Within 2 Days</option>
            <option value="3">Within 3 Days</option>
            <option value="3">Within 4 Days</option>
            <option value="3">Within 1 Week</option>
            <option value="3">Within 10 Days</option> 
            <option value="3">Within 2 Weeks</option> 
            <option value="3">Within 3 Weeks</option>                                    
            <option value="3">Within 1 Month</option> 
            <option value="3">Within 2 Months</option> 
            <option value="3">Within 3 Months</option> 
            <option value="3">Within 4 Months</option>
            <option value="3">Within 6 Months</option>  
            <option value="3">No time limit</option> 

            </select>
      </td>
      <td >
       
      </td>
      <td >
       
      </td>
      
      
     

    </tr>
    <tr>
      <th scope="row">2</th>
      <td >
        <select class="form-select" id="inputGroupSelect01">
            <option value="1">Prosthesis</option>
            <option value="1">Orthosis</option>
            <option value="1">Surgery (Minor)</option>                             
            <option value="1">Surgery (Major)</option>
            <option value="1">Stiches</option>
            <option value="1">Amputation</option>                                   
            <option value="1">Dismembering</option>
            <option value="2">Hearing Aid</option>
            <option value="3">Plaster (Short Term)</option>
            <option value="4">Paster (Long Term)</option>
            <option value="3">Nebulization</option>
          
        </select>
      </td>
      <td >  
       
            <select class="form-select" id="inputGroupSelect01">
                <option value="3">ASAP</option>
                <option value="3">Within 24 Hours </option>
                <option value="3">Within 2 Days</option>
                <option value="3">Within 3 Days</option>
                <option value="3">Within 4 Days</option>
                <option value="3">Within 1 Week</option>
                <option value="3">Within 10 Days</option> 
                <option value="3">Within 2 Weeks</option> 
                <option value="3">Within 3 Weeks</option>                                    
                <option value="3">Within 1 Month</option> 
                <option value="3">Within 2 Months</option> 
                <option value="3">Within 3 Months</option> 
                <option value="3">Within 4 Months</option>
                <option value="3">Within 6 Months</option>  
                <option value="3">No time limit</option> 
    
                </select>
     </td>
      <td>
       
      
        
        </select>
      </td>
      <td>
       
      </td>
      
    </tr>
    <tr>
        <th scope="row">3</th>
        <td></td>
      <td></td>
      <td></td>
      <td></td>
      
     
      </tr>
      <tr>
       
            
        </tr>
  </tbody>
 </table>
 <div class="card-footer d-flex justify-content-between">
    <button type="button" id="addRowPressure" class="btn btn-secondary btn-label waves-effect waves-light"><i class="ri-add-line label-icon align-middle fs-16 me-2"></i> Add Row</button>
    <button type="button" class="btn btn-success btn-label waves-effect waves-light"><i class="ri-check-double-line label-icon align-middle fs-16 me-2"></i> Save</button> 
</div>
</div>
</div>
</div>
</div>
</div>


<!-- sdsd -->
<div class="row">
    <div class="col-lg-7">
        <div class="card">
            <div class="card-header align-items-center d-flex">
                <h4 class="card-title mb-0 flex-grow-1">Other Optionsal Question(s)</h4>
            </div>
            
                            <div class="row mb-1">
                                <div class="col-lg-8">
                                    <label for="nameInput" class="form-label">Were you admitted in hospital/Clinic following the diagnosis?</label>
                                </div>
                                <div class="col-lg-3">
                                    <select class="form-select" id="inputGroupSelect01">
                                                            
                                        <option value="1">Yes</option>
                                        <option value="2">No</option>
                                       
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-1">
                                <div class="col-lg-8">
                                    <label for="websiteUrl" class="form-label">1A  If the answer is yes for Q1, how long?</label>
                                </div>
                                <div class="col-lg-3">
                                    <select class="form-select" id="inputGroupSelect01">
                                                            
                                        <option value="1">3 Days</option>
                                        <option value="2">7 Days</option>
                                        <option value="2">10 Days</option>
                                        <option value="2">14 Days</option>
                                        <option value="2">21 Days</option>
                                        <option value="2">28 Days</option>
                                        <option value="2">1 Month</option>
                                        <option value="2">2 Months</option>
                                        <option value="2">3 Months</option>
                                        <option value="2">6 Months</option>
                                        <option value="2">Extensive (Undecided)</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-1">
                                <div class="col-lg-8">
                                    <label for="dateInput" class="form-label">1B  Total Costs incurred during hospitalization</label>
                                </div>
                                <div class="col-lg-3">
                                    <input type="text" class="form-control" id="leaveemails" placeholder="">
                                </div>
                            </div>
                           
                            <div class="row mb-1">
                                <div class="col-md-8">
                                    
                                    <label for="" >2  Did the medication and/or interventions cure the problem completely?</label>
                                </div>
                                <div class="col-md-3">
                                    <select class="form-select" id="inputGroupSelect01">
                                                            
                                        <option value="1">Yes</option>
                                        <option value="2">No</option>
                                        <option value="2"> Not Sure</option>
                                        <option value="2"> Not Curable</option>
                                        <option value="2"> Long Term Intervention Required</option>
                                    </select>
                                           
                                </div>
                                
                              
                               
                            </div>
                
                            <div class="row mb-1">
                                <div class="col-lg-8">
                                    <label for="leaveemails" class="form-label">3 Are you satisfied with how you were treated (overall)?</label>
                                </div>
                                <div class="col-lg-3">
                                    <select class="form-select" id="inputGroupSelect01" >
                                                            
                                        <option value="1">Yes</option>
                                        <option value="2">No</option>
                                       
                                    </select>
                                </div>

                           
                    
                               

</div>
<div class="row mb-1">
    <div class="col-lg-8">
        <label for="leaveemails" class="form-label">4 Would you recommend your physician/doctor to others?</label>
    </div>
    <div class="col-lg-3">
        <select class="form-select" id="inputGroupSelect01" >
                                
            <option value="1">Yes</option>
            <option value="2">No</option>
           
        </select>
    </div>



   

</div>
<div class="card-footer d-flex justify-content-end">
   
    <button type="button" class="btn btn-success btn-label waves-effect waves-light"><i class="ri-check-double-line label-icon align-middle fs-16 me-7"></i> Save</button> 
</div>
</div>

</div>

<!-- sdd -->


<div class="col-lg-5">
    <div class="card">
        <div class="card-header align-items-center d-flex">
            <h4 class="card-title mb-0 flex-grow-1">Restriction(s) if any</h4>
        </div>
        <div class="card-body">
            <div class="row mb-1" >
                <table class="table table-bordered border-dark">
                   <thead >
<tr>
  <th scope="col" style="width: 10%;">SL</th>
  <th scope="col">Type</th>
  <th scope="col">Details</th>
  
</tr>
</thead>
<tbody>
<tr>
  <th scope="row">1</th>
  <td style="width: 19%;"> 
   
</td>
  <td style="width: 18%;">
   
  </td>
  
 
  
  
 

</tr>
<tr>
  <th scope="row">2</th>
  <td >

      
    </select>
  </td>
  <td >  
   
 </td>
 
 
  
</tr>
<tr>
    <th scope="row">3</th>
    <td></td>
  <td></td>
  
  
 
  </tr>
  <tr>
   
        
    </tr>
</tbody>
</table>
<div class="card-footer d-flex justify-content-between">
<button type="button" id="addRowPressure" class="btn btn-secondary btn-label waves-effect waves-light"><i class="ri-add-line label-icon align-middle fs-16 me-2"></i> Add Row</button>
<button type="button" class="btn btn-success btn-label waves-effect waves-light"><i class="ri-check-double-line label-icon align-middle fs-16 me-2"></i> Save</button> 
</div>
</div>
</div>
</div>
</div>
</div>
<div class="card-footer d-flex justify-content-between">
    <button type="button" class="btn btn-warning btn-label waves-effect waves-light"><i class="ri-check-double-line label-icon align-middle fs-16 me-2"></i>  Save Draft</button> 
    <button type="button" class="btn btn-success btn-label waves-effect waves-light"><i class="ri-check-double-line label-icon align-middle fs-16 me-2"></i> Review</button> 
    <button type="button" class="btn btn-success btn-label waves-effect waves-light"><i class="ri-check-double-line label-icon align-middle fs-16 me-2"></i>  Save & Complete</button> 
    <button type="button" class="btn btn-secondary btn-label waves-effect waves-light"><i class="ri-check-double-line label-icon align-middle fs-16 me-2"></i> Next</button> 

    </div>


</x-app-layout>