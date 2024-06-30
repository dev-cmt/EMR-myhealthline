<x-app-layout>
    
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">Case Data Entry</h4>
                </div>
                <div class="card-body">
            
                    <div class="row mb-1">
                        <div class="col-lg-4">
                            <label for="nameInput" class="form-label">Date of Primary Identification of Issue</label>
                        </div>
                        <div class="col-lg-4">
                            <input type="date" class="form-control" id="nameInput" placeholder="Enter your name">
                        </div>
                    </div>
                    <div class="row mb-1">
                        <div class="col-lg-4">
                            <label for="websiteUrl" class="form-label">Date of First Visit to Physician</label>
                        </div>
                        <div class="col-lg-4">
                            <input type="date" class="form-control" id="websiteUrl" placeholder="Enter your url">
                        </div>
                    </div>
                    <div class="row mb-1">
                        <div class="col-lg-4">
                            <label for="dateInput" class="form-label">Reccurence</label>
                        </div>
                        <div class="col-lg-4">
                            <select class="form-select" id="inputGroupSelect01">
                                                    
                                <option value="1">Genetic</option>
                                <option value="2">First Time</option>
                                <option value="3">Repetition</option>
                            </select>
                        </div>
                    </div>
           
                    <div class="row mb-1">
                        <div class="col-md-4">
                            
                            <label for="" >Duration of Suffering (Prior to Physician Visit)</label>
                        </div>
                        <div class="col-md-2">
                            <select class="form-select form-control" id="inputGroupSelect01">
                                <option value="1">4</option>
                                <option value="2">5</option>
                                <option value="3">6</option>
                            </select>
                                
                        </div>
                        <div class="col-md-2">
                            <select class="form-select" id="inputGroupSelect01">
                                <option value="1">Hour(s)</option>
                                <option value="2">Day(s)</option>
                                <option value="3">Week(s)</option>
                                <option value="3">Month(s)</option>
                                <option value="3">Year(s)</option>
                            </select>
                        </div>
                    </div>

                    <div class="row mb-1">
                        <div class="col-lg-4">
                            <label for="leaveemails" class="form-label">Area of Problem Identifified</label>
                        </div>
                        <div class="col-lg-4">
                            <input type="text" class="form-control" id="leaveemails" placeholder="">
                        </div>
                    </div>
                    <div class="row mb-1">
                        <div class="col-lg-4">
                            <label for="contactNumber" class="form-label">Type of Ailment</label>
                        </div>
                        <div class="col-lg-4">
                            <select class="form-select" id="inputGroupSelect01">
                                                    
                                <option value="1">Neurological</option>
                                <option value="2">Eye/Visual</option>
                                <option value="3">Orthopedic</option>
                                <option value="4">Abdomen</option>
                                <option value="3">Gastrology</option>
                                <option value="3">Dermatology</option>
                                <option value="3">Oncology</option>
                                <option value="3">Reproductive</option>
                                <option value="3">Other</option>
                                <option value="3">Hand</option>
                                <option value="3">Nail</option>
                                <option value="3">Knee</option>
                                <option value="3">Joints/Muscle</option>
                                <option value="3">Psychometric</option>
                                <option value="3">Functional Rehabilitation</option>
                                <option value="3">Drug Abuse/Rehabilitation</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">Complaint(s) - Click all that applies</h4>
                </div>
                <div class="card-body">

                     
                    <h4 class="card-title mb-0 flex-grow-1"></h4>
                    <div class="card-header align-items-center d-flex">
            
                        
                <div class="col-xxl-3 col-md-3">
                
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">Fever</label>
                    </div>
                    
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">Shortness of Breath</label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">Vomiting</label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">Nausea</label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">Fatigue</label>
                    </div>

                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">
                            Headache
                        </label>
                      </div>

                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">
                            Chest Burn
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">
                            Nerve Pain
                        </label>
                      </div>

                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">
                            Lymph Nodes
                        </label>
                      </div>

                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">
                            Blurry Vision
                        </label>
                      </div>

                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">
                            Eye Pain
                        </label>
                      </div>

                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">
                            Watery Eyes
                        </label>
                      </div>

                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">
                            Excessive Sweating
                        </label>
                      </div>

                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">
                            Joint Pain
                        </label>
                      </div>

                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">
                            Anxiety
                        </label>
                      </div>

                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">
                            Yellowish
                        </label>
                      </div>

                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">
                            Anguish
                        </label>
                      </div>

                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">
                            Constipation
                        </label>
                      </div>

                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">
                            Loose Motion
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">
                            Excess Bleeding
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">
                            Blocked Nose
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">
                            Bloody Cough
                        </label>
                        </div>
                        </div>
                        
                        <div class="col-xxl-3 col-md-3">
                            <div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">
                                        Secretion
                                    </label>
                                    </div>
                                    <div class="form-check">
                                     <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                        <label class="form-check-label" for="flexCheckDefault">
                                            Excessive Thirst
                                        </label>
                                        </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                            <label class="form-check-label" for="flexCheckDefault">
                                                Swelling
                                            </label>
                                            </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                        <label class="form-check-label" for="flexCheckDefault">
                                                    Numbness
                                                </label>
                                                </div>
                                                
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                                    <label class="form-check-label" for="flexCheckDefault">
                                                        Dizziness
                                                    </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                                        <label class="form-check-label" for="flexCheckDefault">
                                                            High Blood Pressure
                                                        </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                                            <label class="form-check-label" for="flexCheckDefault">
                                                                Low Blood Pressure
                                                            </label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                                                <label class="form-check-label" for="flexCheckDefault">
                                                                    High Blood Sugar
                                                                </label>
                                                                </div> 
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                                                    <label class="form-check-label" for="flexCheckDefault">
                                                                        Low Blood Sugar
                                                                    </label>
                                                                    </div>

                                                                    <div class="form-check">
                                                                     <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                                                    <label class="form-check-label" for="flexCheckDefault">
                                                                            Sleeplessness
                                                                    </label>
                                                                        </div>
                                                                        <div class="form-check">
                                                                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                                                            <label class="form-check-label" for="flexCheckDefault">
                                                                                Anemia
                                                                            </label>
                                                                            </div>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                                                                <label class="form-check-label" for="flexCheckDefault">
                                                                                    Difficulty to Stand
                                                                                </label>
                                                                                </div>
                                                                                <div class="form-check">
                                                                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                                                                    <label class="form-check-label" for="flexCheckDefault">
                                                                                        Difficulty to Sit/Lay
                                                                                    </label>
                                                                                    </div>
                                                                                    <div class="form-check">
                                                                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                                                                        <label class="form-check-label" for="flexCheckDefault">
                                                                                            Difficulty to Talk
                                                                                        </label>
                                                                                        </div>
                                                                                        <div class="form-check">
                                                                                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                                                                            <label class="form-check-label" for="flexCheckDefault">
                                                                                                Depression
                                                                                            </label>
                                                                                            </div>
                                                                                            <div class="form-check">
                                                                                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                                                                                <label class="form-check-label" for="flexCheckDefault">
                                                                                                    Suicidal
                                                                                                </label>
                                                                                                </div>
                                                                                                <div class="form-check">
                                                                                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                                                                                    <label class="form-check-label" for="flexCheckDefault">
                                                                                                        Imaginary Entity
                                                                                                    </label>
                                                                                                    </div>
                                                                                                    <div class="form-check">
                                                                                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                                                                                        <label class="form-check-label" for="flexCheckDefault">
                                                                                                            Urinary Difficulty
                                                                                                        </label>
                                                                                                        </div>
                                                                                                        <div class="form-check">
                                                                                                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                                                                                            <label class="form-check-label" for="flexCheckDefault">
                                                                                                                Dry Cough
                                                                                                            </label>
                                                                                                            </div>
                                                                                                            <div class="form-check">
                                                                                                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                                                                                                <label class="form-check-label" for="flexCheckDefault">
                                                                                                                    Mucas Cough
                                                                                                                </label>
                                                                                                                </div>

                                                                                                                <div class="form-check">
                                                                                                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                                                                                                    <label class="form-check-label" for="flexCheckDefault">
                                                                                                                        Cyst
                                                                                                                    </label>
                                                                                                                    </div>
                                                                                                                    <div class="form-check">
                                                                                                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                                                                                                        <label class="form-check-label" for="flexCheckDefault">
                                                                                                                            Bloody Urine
                                                                                                                        </label>
                                                                                                                        </div>   

                            </div>
                        </div>
                        <div class="col-xxl-3 col-md-6">
                            <div>
                                <div class="col-lg-9">
                                    <textarea class="form-control" id="meassageInput" rows="3" placeholder="Enter your message"></textarea>
                                 
                                        <button type="submit" class="btn btn-primary">Save</button>
                                    </div>
                                </div>
        
                        </div>
                    </div>
            </div>
        </div>
        </div>
    </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header align-items-center d-flex">
                            <h4 class="card-title mb-0 flex-grow-1">Examination & Treatment Profile</h4>
                        </div>
                        <div class="card-body">
                <div class="row mb-1">
                    <div class="col-lg-2">
                        <label for="nameInput" class="form-label">Name of Doctor</label>
                    </div>
                    <div class="col-lg-4">
                        <input type="text" class="form-control" id="nameInput" placeholder="">
                    </div>
                </div>
                <div class="row mb-1">
                    <div class="col-lg-2">
                        <label for="designationInput" class="form-label">Designation</label>
                    </div>
                    <div class="col-lg-4">
                        <input type="text" class="form-control" id="designationInput" placeholder="">
                    </div>
                </div>
                <div class="row mb-1">
                    <div class="col-lg-2">
                        <label for=" AddressInput" class="form-label">Chamber Address</label>
                    </div>
                    <div class="col-lg-4">
                        <input type="text" class="form-control" id=" addressInput">
                    </div>
                </div>
                <div class="row mb-1">
                    <div class="col-lg-2">
                        <label for="dateInput" class="form-label">Date of Last Visit</label>
                    </div>
                    <div class="col-lg-4">
                        <input type="date" class="form-control" id="dateInput">
                    </div>
                </div>
                <div class="row mb-1">
                    <div class="col-lg-2">
                        <label for="fees" class="form-label">Fees (Optional)</label>
                    </div>
                    <div class="col-lg-4">
                        <input type="number" class="form-control" id="fees" placeholder="">
                    </div>
                </div>
                
                <div class="row mb-1">
                    <div class="col-lg-2">
                        <label for="meassageInput" class="form-label">Doctor's Comment</label>
                    </div>
                    <div class="col-lg-4">
                        <textarea class="form-control" id="meassageInput" rows="3" placeholder="Enter your message"></textarea>
                    </div>
                </div>

                <div class="row mb-1">
                    <div class="col-lg-2">
                        <label for="disesase" class="form-label">Disease/Diagnosis</label>
                    </div>
                    <div class="col-lg-4">
                        <input type="text" class="form-control" id="disesase" placeholder="">
                    </div>
                </div>

                <div class="row mb-1">
                    <div class="col-lg-2">
                        <label for="disesase" class="form-label">Prescription</label>
                    </div>
                    <div class="col-lg-3"style="width: 33%">
                        <input type="file" class="form-control" id="inputGroupFile01">
                    </div>
                </div>
                
            </div>
        </div>
        </div>
<!-- right -->
			

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header align-items-center d-flex">
                <h4 class="card-title mb-0 flex-grow-1">Recommended Pathological/Lab Test(s)</h4>
            </div>
            <div class="card-body">
                <div class="row mb-1" >
                    <table class="table table-bordered border-dark">
                       <thead >
    <tr>
      <th scope="col">SL</th>
      <th scope="col">Name of Test</th>
      <th scope="col">Type</th>
      <th scope="col">Organ</th>
      <th scope="col">Comments</th>
      <th scope="col">Cost </th>
      <th scope="col">Lab</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td > 
        <select class="form-select" id="inputGroupSelect01">
        <option value="1">CBC  (Complete Blood Count)</option>
        <option value="1">LP (Lipid Panel/Profile)</option>
        <option value="1">RBS (Random Blood Sugar - Fasting)</option>                             
        <option value="1">TFT/ (Thyroid Function Test)</option>
        <option value="1">S-Cretanine (Kidney/Renal Function Test)</option>
        <option value="1">Urine Examination</option>                                   
        <option value="1">X-Ray (Radiology)</option>
        <option value="2">MRI (Magnetic Reasonance Imagine)</option>
        <option value="3">CT (Computed Tomography)</option>
        <option value="4">Genetic Testing</option>
        <option value="3">Stool Examination</option>
        <option value="3">Dermatology</option>
        <option value="3">Sperm Count Test (Potency Test)</option>
        <option value="3">ECG (Eco Cardiogram)</option>
        <option value="3">EGG (ElectroGastrogram)</option>
        <option value="3">Functionality Test</option>
        <option value="3">Physiotherapy</option>
        <option value="3">Audiotherapy</option>
        <option value="3">Covid-19 (Antigen)</option>
        <option value="3">Covid-19 (RT-PCR)</option>
        <option value="3">HIV Screening</option>
        <option value="3">HPV Screening</option>
        <option value="3">HbA</option>
        <option value="3">HbAg+</option>
        <option value="3">HbC</option>
        <option value="3">USG-A</option>
        <option value="3">USG-C</option>
        <option value="3">H1N1</option>
        <option value="3">ETT (Exercise Tolerance Test)</option>
        <option value="3">ETT (Exercise Tolerance Test)</option>
        <option value="3">HbC</option>
        <option value="3">Angiogram</option>
        <option value="3">Mammography</option>
        <option value="3">Urography</option>
        <option value="3">PFT (Pulmonary Function Test)</option>
        <option value="3">MRS (Magnetic Reasonance Spectography)</option>
        <option value="3">Prenatal/Pregnancy Test</option>
        <option value="3">Endoscopy</option>
        <option value="3">Cerebral Angiography</option>
    </select>
</td>
      <td style="width: 17%;">
        <select class="form-select" id="inputGroupSelect01">
                                            
            <option value="1">Blood sample</option>
            <option value="2">Urine Sample</option>
            <option value="3">Stool Sample</option>
            <option value="4">Imaging</option>
            <option value="3">Genetic</option>
            <option value="3">Biopsy</option>
        </select>
      </td>
      <td style="width: 19%;">
        <select class="form-select" id="inputGroupSelect01">
        <option value="3">Scalp</option>
        <option value="3">Brain</option>
        <option value="3">Forehead</option>
        <option value="3">Eye (right)</option>
        <option value="3">Eye (left)</option>
        <option value="3">Nostrail</option>
        <option value="3">Ear (Right)</option> 
        <option value="3">Ear (Left)</option> 
        <option value="3">Lip (Upper)</option>                                    
        <option value="3">Lip (Lower)</option> 
        <option value="3">Tongue</option> 
        <option value="3">Tonsilitis</option> 
        <option value="3">Trachia/Airway</option>
        <option value="3">Heart</option>  
        <option value="3">Lung (Right)</option> 
        <option value="3">Lung (Left)</option> 
        <option value="3">Intestine (Large)</option> 
        <option value="3">Intenstine (Small)</option> 
        <option value="3">Kidney (Right)</option> 
        <option value="3">Kidney (Left)</option> 
        <option value="3">Thyroid Gland</option> 
        <option value="3">Appendix</option> 
        <option value="3">Bladder</option> 
        <option value="3">Pancreas</option> 
        <option value="3">Endocrine Systems</option> 
        <option value="3">Lymphatic </option> 
        <option value="3">Nerve/Nervous System</option> 
        <option value="1">Skeletal</option>
        <option value="2">Anal</option>
        <option value="3">Esophagus</option>
        <option value="4">Penis</option>
        <option value="3">Navel</option>
        <option value="3">Vagina</option>
        <option value="3">Hip Joint</option>
        <option value="3">Anus</option>
        <option value="3">Nails</option>
        <option value="3">Skin</option>
        <option value="3">Bone</option>
        <option value="3">Hair</option>
        <option value="3">Thigh (Upper)</option>
        <option value="3">Thigh (Lower)</option>
        <option value="3">Knee</option>
        <option value="3">Buttcheeks</option>
        <option value="3">Toe</option>
        <option value="3">Finger(s) (Right Hand)</option>
        <option value="3">Finger(s) (Left hand)</option>
        <option value="3">Finger(s) (Right Toe)</option>
        <option value="3">Finger(s) (Left Toe)</option>
        <option value="3">Ovary (Right)</option>
        <option value="3">Ovary (Left)</option>
        <option value="3">Breast (Right)</option>
        <option value="3">Breast (Left)</option>
        <option value="3">Testicle (Right)</option>
        <option value="3">Testicle (Left)</option>
      
        
        </select>
      </td>
      <td>ANTB</td>
      <td></td>
      <td></td>
      <td><input type="file" class="form-control" id="inputGroupFile01"></td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td >
        <select class="form-select" id="inputGroupSelect01">   
        <option value="1">CBC  (Complete Blood Count)</option>
        <option value="1">LP (Lipid Panel/Profile)</option>
        <option value="1">RBS (Random Blood Sugar - Fasting)</option>                             
        <option value="1">TFT/ (Thyroid Function Test)</option>
        <option value="1">S-Cretanine (Kidney/Renal Function Test)</option>
        <option value="1">Urine Examination</option>
        <option value="1">X-Ray (Radiology)</option>
        <option value="2">MRI (Magnetic Reasonance Imagine)</option>
        <option value="3">CT (Computed Tomography)</option>
        <option value="4">Genetic Testing</option>
        <option value="3">Stool Examination</option>
        <option value="3">Dermatology</option>
        <option value="3">Sperm Count Test (Potency Test)</option>
        <option value="3">ECG (Eco Cardiogram)</option>
        <option value="3">EGG (ElectroGastrogram)</option>
        <option value="3">Functionality Test</option>
        <option value="3">Physiotherapy</option>
        <option value="3">Audiotherapy</option>
        <option value="3">Covid-19 (Antigen)</option>
        <option value="3">Covid-19 (RT-PCR)</option>
        <option value="3">HIV Screening</option>
        <option value="3">HPV Screening</option>
        <option value="3">HbA</option>
        <option value="3">HbAg+</option>
        <option value="3">HbC</option>
        <option value="3">USG-A</option>
  </select>
      </td>
      <td >  
        <select class="form-select" id="inputGroupSelect01">                                   
        <option value="1">Blood sample</option>
        <option value="2">Urine Sample</option>
        <option value="3">Stool Sample</option>
        <option value="4">Imaging</option>
        <option value="3">Genetic</option>
        <option value="3">Biopsy</option>
    </select>
     </td>
      <td>
        <select class="form-select" id="inputGroupSelect01">
        <option value="3">Scalp</option>
        <option value="3">Brain</option>
        <option value="3">Forehead</option>
        <option value="3">Eye (right)</option>
        <option value="3">Eye (left)</option>
        <option value="3">Nostrail</option>
        <option value="3">Ear (Right)</option> 
        <option value="3">Ear (Left)</option> 
        <option value="3">Lip (Upper)</option>                                    
        <option value="3">Lip (Lower)</option> 
        <option value="3">Tongue</option> 
        <option value="3">Tonsilitis</option> 
        <option value="3">Trachia/Airway</option>
        <option value="3">Heart</option>  
        <option value="3">Lung (Right)</option> 
        <option value="3">Lung (Left)</option> 
        <option value="3">Intestine (Large)</option> 
        <option value="3">Intenstine (Small)</option> 
        <option value="3">Kidney (Right)</option> 
        <option value="3">Kidney (Left)</option> 
        <option value="3">Thyroid Gland</option> 
        <option value="3">Appendix</option> 
        <option value="3">Bladder</option> 
        <option value="3">Pancreas</option> 
        <option value="3">Endocrine Systems</option> 
        <option value="3">Lymphatic </option> 
        <option value="3">Nerve/Nervous System</option> 
        <option value="1">Skeletal</option>
        <option value="2">Anal</option>
        <option value="3">Esophagus</option>
        <option value="4">Penis</option>
        <option value="3">Navel</option>
        <option value="3">Vagina</option>
        <option value="3">Hip Joint</option>
        <option value="3">Anus</option>
        <option value="3">Nails</option>
        <option value="3">Skin</option>
        <option value="3">Bone</option>
        <option value="3">Hair</option>
        <option value="3">Thigh (Upper)</option>
        <option value="3">Thigh (Lower)</option>
        <option value="3">Knee</option>
        <option value="3">Buttcheeks</option>
        <option value="3">Toe</option>
        <option value="3">Finger(s) (Right Hand)</option>
        <option value="3">Finger(s) (Left hand)</option>
        <option value="3">Finger(s) (Right Toe)</option>
        <option value="3">Finger(s) (Left Toe)</option>
        <option value="3">Ovary (Right)</option>
        <option value="3">Ovary (Left)</option>
        <option value="3">Breast (Right)</option>
        <option value="3">Breast (Left)</option>
        <option value="3">Testicle (Right)</option>
        <option value="3">Testicle (Left)</option>
      
        
        </select>
      </td>
      <td>ANTB</td>
      <td></td>
      <td></td>
      <td style="width: 12%"> <input type="file" class="form-control" id="inputGroupFile01"></td>
    </tr>
    <tr>
        <th scope="row">3</th>
        <td></td>
      <td></td>
      <td></td>
      <td>ANTB</td>
      <td></td>
      <td></td>
      <td><input type="file" class="form-control" id="inputGroupFile01"></td>
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