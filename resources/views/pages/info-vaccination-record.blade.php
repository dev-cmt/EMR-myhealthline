<x-app-layout>
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">

                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs nav-justified nav-border-top nav-border-top-success mb-3" id="" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active " id="section1" data-bs-toggle="tab" href="#nav-border-justified-home" role="tab" aria-selected="false">
                                <i class="ri-home-5-line align-middle me-1"></i> Section 01 (EPI)
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="section2" data-bs-toggle="tab" href="#nav-border-justified-profile" role="tab" aria-selected="false">
                                <i class="ri-user-line me-1 align-middle"></i> Section 02 (Covid-19)
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="section3" data-bs-toggle="tab" href="#nav-border-justified-messages" role="tab" aria-selected="false">
                                <i class="ri-question-answer-line align-middle me-1"></i>Section 03 (Paid Ones)
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content text-muted">
                        <div class="tab-pane active" id="nav-border-justified-home" role="tabpanel">
                            <h6 style="margin: 0px">Section-01-EPI  VPD (Vaccination for Preventable Diseases)</h6>
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" style="float: inline-end;margin-bottom: -6px;margin-top: -20px;">
                                Create
                            </button>

                            <div class="table-responsive" id="sectiononetable">
                               
                            </div>
                            <div class="table-responsive" id="sectiononehide" style="margin-top: 30px">
                                <table id="example3" class="display " style="min-width: 1019px">

                                    <thead>
                                        <tr style="height: 35px;border: 1px solid;background: #2e1919;color: white;">
                                            <th>SL.NO</th>
                                            <th>Vaccine Name</th>
                                            <th>Dose 1</th>
                                            <th>Dose 2</th>
                                            <th>Dose 3</th>
                                            <th>Dose 4</th>
                                            <th>Dose 5</th>
                                            <th>Booster</th>
                                            <th>file</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                       @foreach($vaccinationRecords as $data)
                                         <tr>
                                             <td>{{$loop->iteration}}</td>
                                             <td>{{$data->vaccine_name}}</td>
                                             <td>{{$data->dose_01}}</td>
                                             <td>{{$data->dose_02}}</td>
                                             <td>{{$data->dose_03}}</td>
                                             <td>{{$data->dose_04}}</td>
                                             <td>{{$data->dose_05}}</td>
                                             <td>{{$data->booster}}</td>
                                             <td>
                                                    <img src="{{asset($data->upload_tool)}}" alt="" style="width: 50px;height: 50px">
                                             </td>
                                         </tr>
                                 
                                       @endforeach
                                           
                                    </tbody>
                                 </table>
                                 </table>
                            </div>
                        </div>
                        <div class="tab-pane" id="nav-border-justified-profile" role="tabpanel">
                            @if(session('notification'))
                                <div class="alert alert-{{ session('notification')['alert-type'] }}">
                                    {{ session('notification')['message'] }}
                                </div>
                            @endif
                            <h6 style="margin: 0px">Section-02 (Covid-19)</h6>
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModalcovid" style="float: inline-end;margin-bottom: -6px;margin-top: -20px;">
                                Create
                            </button>

                            {{-- <div class="table-responsive" style="margin-top:40px" id="sectiontwotable">
                               
                            </div> --}}

                            <table id="example3" class="display " style="min-width: 1019px;margin-top:30px">
                                <thead>
                                    <tr style="height: 35px;border: 1px solid;background: #2e1919;color: white;">
                                        <th>SL.NO</th>
                                        <th>Vaccine</th>
                                        <th>Manufacturer</th>
                                        <th>Location</th>
                                        <th>Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                   @foreach($coviddata as $data)
                                     <tr>
                                         <td>{{$loop->iteration}}</td>
                                         <td>{{$data->dose_type}}</td>
                                         <td>{{$data->manufacturer}}</td>
                                         <td>{{$data->location}}</td>
                                         <td>{{$data->date}}</td>
                                     </tr>
                             
                                   @endforeach 
                                </tbody>
                             </table>

                             <div style="margin-top: 35px;">
                                <form action="{{route('store_covid_file_upload')}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                <div class="row">
                                        <div class="col-md-5">
                                            <div class="row">
                                                <label for="manufacturer" class="col-md-6" style="margin-top: 7px">Certificate No : </label>
                                                <div class="col-md-6">
                                                    <input type="text" name="certificateNo" style="margin-left: -83px" id="" value="" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-5">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <input type="file" name="image" id="file" class="form-control" style="margin-left: -83px">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="row">
                                                <div style="margin-left: -300px;">
                                                    <button type="submit" class="btn btn-primary" id="fileUploadButton">File Upload</button>
                                                    <button type="button" class="btn btn-success hidden" id="viewButton" style="margin-right: -35px">View</button>
                                                </div>
                                            </div>
                                        </div>
                                </div>
                            </form>
                             </div>
                        </div>
                        <div class="tab-pane" id="nav-border-justified-messages" role="tabpanel">
                            <h6 style="margin: 0px">Section-03 (Paid Ones)</h6>
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" style="float: inline-end;margin-bottom: -6px;margin-top: -20px;">
                                Create
                            </button>

                            <div class="table-responsive" style="margin-top:40px" id="sectionthreetable">
                               
                            </div>
                        </div>
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
                                <select name="vaccine_name" id="vaccine_name" class="form-control">
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
                                <select name="market_name" id="market_name" class="form-control">
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
                                <select name="applicable_name" id="applicableFor" class="form-control">
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
                            <label for="dose03" class="col-md-6">Dose 04</label>
                            <div class="col-md-6">
                                <input type="date" name="dosetfour" id="dose03" class="form-control">
                            </div>
                        </div>
                        <div class="row mt-2">
                            <label for="dose03" class="col-md-6">Dose 05</label>
                            <div class="col-md-6">
                                <input type="date" name="dosefive" id="dose03" class="form-control">
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

    <div class="modal fade" id="exampleModalcovid" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Create Covid-19</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{route('store_covid_19_vaccine')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="text" id="hiddenid" name="hidden_section" style="display:none">
                        <div class="row mt-2" id="vaccinefield">

                            <label for="" class="col-md-4">Dose Name</label>
                            <div class="col-md-8">
                                <select name="vaccine_name" id="dose_name" class="form-control">
                                    <option value="" selected disabled>Select</option>
                                    <option value="dose 01">dose 01</option>
                                    <option value="dose 02">dose 02</option>
                                    <option value="dose 03">dose 03</option>
                                    <option value="dose 04">dose 04</option>
                                    <option value="dose 05">dose 05</option>
                                    <option value="booster">Booster</option>
                             
                                </select>
                            </div>
                        </div>
                        <div class="row mt-2" id="Manufacturer" >
                            <label for="manufacturer" class="col-md-4">Manufacturer</label>
                            <div class="col-md-8">
                                <input type="text" value="" name="manufacturer" id="manufacturer" class="form-control">
                            </div>
                        </div>
                      
                       
                        <div class="row mt-2" id="location">
                            <label for="location" class="col-md-4">Location</label>
                            <div class="col-md-8">
                                <input type="text" name="location" id="location" class="form-control">
                            </div>
                        </div>
                        <div class="row mt-2" id="location">
                            <label for="location" class="col-md-4">Date</label>
                            <div class="col-md-8">
                                <input type="date" name="date" id="" class="form-control">
                            </div>
                        </div>
                        {{-- <div class="row mt-2" id="Certificate" >
                            <label for="certificate" class="col-md-6">Certificate</label>
                            <div class="col-md-6">
                                <input type="text" name="certificate" id="certificate" value="" class="form-control">
                            </div>
                        </div> --}}
                        {{-- <div class="row mt-2">
                            <label for="file" class="col-md-4">Upload file</label>
                            <div class="col-md-8">
                                <input type="file" name="image" id="file" class="form-control">
                            </div>
                        </div> --}}

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

<script>
    $(function(){
        $(document).on('click', '#section1', function(){
            var section_one = 'section one';
           

            $.ajax({
                url: "{{ route('get_section_one_data') }}",
                type: "GET",
                data: {section_one},
                success:function(data){
                    $('#sectiononetable').html(data);
                }
                document.getElementById('sectiononehide').style.display = 'none';
            });
        });
    });
</script>
{{-- <script>
    $(function(){
        $(document).on('click', '#section2', function(){
            var section_two = 'section two';
           

            $.ajax({
                url: "{{ route('get_section_two_data') }}",
                type: "GET",
                data: {section_two},
                success:function(data){
                    $('#sectiontwotable').html(data);
                }
            });
        });
    });
</script> --}}
<script>
    $(function(){
        $(document).on('click', '#section3', function(){
            var section_three = 'section three';
          

            $.ajax({
                url: "{{ route('get_section_three_data') }}",
                type: "GET",
                data: {section_three},
                success:function(data){
                    $('#sectionthreetable').html(data);
                }
            });
        });
    });
</script>

{{-- <script>
    document.addEventListener('DOMContentLoaded', function() {
        const urlParams = new URLSearchParams(window.location.search);
        const section = urlParams.get('section');
        if (section === 'section2') {
            document.getElementById('section2').click();
            document.getElementById('nav-border-justified-profile').click();
        }
    });
</script> --}}

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const savedVaccines = @json($savedVaccines);
        const selectElement = document.getElementById('vaccine_name');

        savedVaccines.forEach(vaccine => {
            let option = selectElement.querySelector(`option[value="${vaccine}"]`);
            if (option) {
                option.style.display = 'none';
            }
        });
    });


    document.addEventListener('DOMContentLoaded', function() {
        const savedVaccines = @json($marketName);
        const selectElement = document.getElementById('market_name');

        savedVaccines.forEach(vaccine => {
            let option = selectElement.querySelector(`option[value="${vaccine}"]`);
            if (option) {
                option.style.display = 'none';
            }
        });
    });

    document.addEventListener('DOMContentLoaded', function() {
        const savedVaccines = @json($applicableFor);
        const selectElement = document.getElementById('applicableFor');

        savedVaccines.forEach(vaccine => {
            let option = selectElement.querySelector(`option[value="${vaccine}"]`);
            if (option) {
                option.style.display = 'none';
            }
        });
    });

    document.addEventListener('DOMContentLoaded', function() {
        const savedVaccines = @json($validdataforcovid);
        const selectElement = document.getElementById('dose_name');

        savedVaccines.forEach(vaccine => {
            let option = selectElement.querySelector(`option[value="${vaccine}"]`);
            if (option) {
                option.style.display = 'none';
            }
        });
    });
</script>

<script>
    document.getElementById('fileUploadButton').addEventListener('click', function() {
        document.getElementById('viewButton').classList.remove('hidden');
    });
</script>


