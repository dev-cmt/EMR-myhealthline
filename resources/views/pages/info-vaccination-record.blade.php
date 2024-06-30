<x-app-layout>
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                   
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs nav-justified nav-border-top nav-border-top-success mb-3" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="section1" data-bs-toggle="tab" href="#nav-border-justified-home" role="tab" aria-selected="false">
                                <i class="ri-home-5-line align-middle me-1"></i> section 01 EPI
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="section2" data-bs-toggle="tab" href="#nav-border-justified-profile" role="tab" aria-selected="false">
                                <i class="ri-user-line me-1 align-middle"></i> Section 02
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="section3" data-bs-toggle="tab" href="#nav-border-justified-messages" role="tab" aria-selected="false">
                                <i class="ri-question-answer-line align-middle me-1"></i>Section 03
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content text-muted">
                        <div class="tab-pane active" id="nav-border-justified-home" role="tabpanel">
                            <h6 style="margin: 0px">Section-01-EPI  VPD (Vaccination for Preventable Diseases)</h6>
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" style="float: inline-end;margin-bottom: -6px;margin-top: -20px;">
                                Create
                            </button>
                        </div>
                        <div class="tab-pane" id="nav-border-justified-profile" role="tabpanel">
                            <h6 style="margin: 0px">Section-02 (Covid-19)</h6>
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" style="float: inline-end;margin-bottom: -6px;margin-top: -20px;">
                                Create
                            </button>
                        </div>
                        <div class="tab-pane" id="nav-border-justified-messages" role="tabpanel">
                            <h6 style="margin: 0px">Section-03 (Paid Ones)</h6>
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" style="float: inline-end;margin-bottom: -6px;margin-top: -20px;">
                                Create
                            </button>
                        </div>
                    </div>

                    <div class="table-responsive" style="margin-top:40px" id="sectiononetable">
                        <table id="example3" class="display " style="min-width: 845px">
                            <input type="text" id="tableone">
                            <thead>
                                <tr>
                                    <th>SL.NO</th>
                                    <th>Vaccine Name</th>
                                    <th>Dose 1</th>
                                    <th>Dose 2</th>
                                    <th>Dose 3</th>
                                    <th>Booster</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if('section one'){
                                    @foreach ($vaccinationRecords as $data )
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $data->memberName->Saller_name }}</td>
                                        <td>{{ $data->land_owner_name }}</td>
                                        <td>{{ $data->land_area }}</td>
                                        <td>{{ $data->per_dici_cost }}</td>
                                        <td>{{ $data->total_amount }}</td>
                                        <td >
                                            <a href="{{ route('member_land_details_edit',$data->id) }}" class="btn btn-sm btn-success" >Edit</a>
                                            <a href="{{ route('member_land_details_view',$data->id) }}" class="btn btn-sm btn-danger" >View</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                }else if(){
                                    
                                }
                              

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- create modal open -->

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{route('vaccinations.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="text" id="hiddenid" name="hidden_section" style="display:none">
                        <div class="row mt-2" id="vaccinefield">
                            <label for="" class="col-md-6">Vaccine Name</label>
                            <div class="col-md-6">
                                <select name="vaccine_name" id="" class="form-control">
                                    <option value="" selected disabled>Select</option>
                                    <option value="BCG">BCG</option>
                                    <option value="Pentavalent">Pentavalent</option>
                                    <option value="HepB">HepB</option>
                                    <option value="HiB">HiB</option>
                                    <option value="MR">MR</option>
                                    <option value="PCV">PCV</option>
                                    <option value="IPV">IPV</option>
                                    <option value="fiPV">fiPV</option>
                                    <option value="T-d">T-d</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mt-2" id="Manufacturer" style="display: none;">
                            <label for="manufacturer" class="col-md-6">Manufacturer</label>
                            <div class="col-md-6">
                                <input type="text" value="" name="manufacturer" id="manufacturer" class="form-control">
                            </div>
                        </div>
                        <div class="row mt-2" id="marketName" style="display: none">
                            <label for="" class="col-md-6">Market Name</label>
                            <div class="col-md-6">
                                <select name="market_name" id="" class="form-control">
                                    <option value="" selected disabled>Select</option>
                                    <option value="InfluVax Tetra">InfluVax Tetra</option>
                                    <option value="Rabix-Vc">Rabix-Vc</option>
                                    <option value="IngoVax ACWY">IngoVax ACWY</option>
                                    <option value="Hepa B">Hepa B</option>
                                    <option value="Vaxphoid">Vaxphoid</option>
                                    <option value="Vaxitet">Vaxitet</option>
                                    <option value="PrevaHav">PrevaHav</option>
                                    <option value="ChloVax">ChloVax</option>
                                    <option value="PapiloVax">PapiloVax</option>
                                    <option value="Varizost">Varizost</option>
                                    <option value="PrenoVax 23">PrenoVax 23</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mt-2" id="applicablefor" style="display: none">
                            <label for="" class="col-md-6">Applicable for</label>
                            <div class="col-md-6">
                                <select name="applicable_name" id="" class="form-control">
                                    <option value="" selected disabled>Select</option>
                                    <option value="Flu/Influenza">Flu/Influenza</option>
                                    <option value="Rabies">Rabies</option>
                                    <option value="Meningitis">Meningitis</option>
                                    <option value="Hepatitis B">Hepatitis B</option>
                                    <option value="Typhoid">Typhoid</option>
                                    <option value="Tetanus">Tetanus</option>
                                    <option value="Hepatitis A">Hepatitis A</option>
                                    <option value="Cholera">Cholera</option>
                                    <option value="Cervical Cancer">Cervical Cancer</option>
                                    <option value="Chicken Pox">Chicken Pox</option>
                                    <option value="Pneumonia">Pneumonia</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <label for="dose01" class="col-md-6">Dose 01</label>
                            <div class="col-md-6">
                                <input type="date" name="doseone" id="dose01" class="form-control">
                            </div>
                        </div>
                        <div class="row mt-2">
                            <label for="dose02" class="col-md-6">Dose 02</label>
                            <div class="col-md-6">
                                <input type="date" name="dosetwo" id="dose02" class="form-control">
                            </div>
                        </div>
                        <div class="row mt-2">
                            <label for="dose03" class="col-md-6">Dose 03</label>
                            <div class="col-md-6">
                                <input type="date" name="dosethree" id="dose03" class="form-control">
                            </div>
                        </div>
                        <div class="row mt-2">
                            <label for="booster" class="col-md-6">Booster</label>
                            <div class="col-md-6">
                                <input type="date" name="booster" id="booster" class="form-control">
                            </div>
                        </div>
                        <div class="row mt-2" id="location" style="display: none;">
                            <label for="location" class="col-md-6">Location</label>
                            <div class="col-md-6">
                                <input type="text" name="location" id="location" class="form-control">
                            </div>
                        </div>
                        <div class="row mt-2" id="Certificate" style="display: none;">
                            <label for="certificate" class="col-md-6">Certificate</label>
                            <div class="col-md-6">
                                <input type="text" name="certificate" id="certificate" value="" class="form-control">
                            </div>
                        </div>
                        <div class="row mt-2">
                            <label for="file" class="col-md-6">Upload file</label>
                            <div class="col-md-6">
                                <input type="file" name="image" id="file" class="form-control">
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary"> Save </button>
                        </div>
                       
                    </form>
                </div>
               
            </div>
        </div>
    </div>

</x-app-layout>
<script>
      window.onload = function() {
        document.getElementById('hiddenid').value = 'section one';
        document.getElementById('tableone').value = 'section one';
    };

    document.getElementById('section1').addEventListener('click', function () {
        document.getElementById('vaccinefield').style.display = 'flex';
        document.getElementById('Manufacturer').style.display = 'none';
        document.getElementById('marketName').style.display = 'none';
        document.getElementById('applicablefor').style.display = 'none';
        document.getElementById('location').style.display = 'none';
        document.getElementById('Certificate').style.display = 'none';
        document.getElementById('hiddenid').value = 'section one';
        document.getElementById('tableone').value = 'section one';
    });

    document.getElementById('section2').addEventListener('click', function () {
        document.getElementById('vaccinefield').style.display = 'none';
        document.getElementById('Manufacturer').style.display = 'flex';
        document.getElementById('marketName').style.display = 'none';
        document.getElementById('applicablefor').style.display = 'none';
        document.getElementById('location').style.display = 'flex';
        document.getElementById('Certificate').style.display = 'flex';
        document.getElementById('hiddenid').value = 'section two';
        document.getElementById('tableone').value = 'section two';
    });

    document.getElementById('section3').addEventListener('click', function () {
        document.getElementById('vaccinefield').style.display = 'none';
        document.getElementById('Manufacturer').style.display = 'none';
        document.getElementById('marketName').style.display = 'flex';
        document.getElementById('applicablefor').style.display = 'flex';
        document.getElementById('location').style.display = 'none';
        document.getElementById('Certificate').style.display = 'none';
        document.getElementById('hiddenid').value = 'section three';
        document.getElementById('tableone').value = 'section three';
        
    });
</script>