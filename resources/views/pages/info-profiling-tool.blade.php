<x-app-layout>

    @php
        function ordinal($number) {
            $suffixes = ["th", "st", "nd", "rd", "th", "th", "th", "th", "th", "th"];
            $index = $number % 100;
            if ($index >= 11 && $index <= 13) {
                return $number . 'th';
            } else {
                return $number . $suffixes[$number % 10];
            }
        }
    @endphp

    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs nav-justified nav-border-top nav-border-top-success mb-3" id="" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link {{ Session::has('step2') ? '' : 'active' }} " id="section1" data-bs-toggle="tab" href="#nav-border-step1" role="tab" aria-selected="false">
                            <i class="ri-user-line align-middle me-1"></i> Blood Sugar Profiling
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Session::has('step2') ? 'active' : '' }}" id="section2" data-bs-toggle="tab" href="#nav-border-step2" role="tab" aria-selected="false">
                            <i class="ri-user-line align-middle me-1"></i> Blood Pressure Profiling
                        </a>
                    </li>
                </ul>
                <!--Blood Sugar Profiling-->
                <div class="tab-content text-muted">
                    <div class="tab-pane {{ Session::has('step2') ? '' : 'active show' }}" id="nav-border-step1" role="tabpanel">

                        <form action="{{ route('blood-sugar-profiling.store') }}" method="POST">
                            @csrf
                            <div class="card-body">
                                <div class="table-responsive table-card">
                                    <table id="dataTableSugar" class="table table-nowrap table-striped mb-0">
                                        <!-- Blood Sugar Profiling Table -->
                                        <thead class="table-light">
                                            <tr>
                                                <th scope="col">Count</th>
                                                <th scope="col">Time</th>
                                                <th scope="col">Reading</th>
                                                <th scope="col">Dietary Information</th>   
                                                <th scope="col">Remark</th>   
                                                <th scope="col">Additional Note</th>   
                                                <th scope="col">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($sugarData as $key => $row)
                                                <tr>
                                                    <td><h6 class="mt-2">{{ $key + 1 }}st</h6></td>
                                                    <td><input type="time" class="form-control" name="time[]" value="{{ $row->time }}" disabled></td>
                                                    <td>
                                                        <select class="form-select" name="reading[]" disabled>
                                                            <option value="4.4" {{ $row->reading == '4.4' ? 'selected': '' }}>4.4</option>
                                                            <option value="4.5" {{ $row->reading == '4.5' ? 'selected': '' }}>4.5</option>
                                                            <option value="4.6" {{ $row->reading == '4.6' ? 'selected': '' }}>4.6</option>
                                                            <option value="4.7" {{ $row->reading == '4.7' ? 'selected': '' }}>4.7</option>
                                                            <option value="4.8" {{ $row->reading == '4.8' ? 'selected': '' }}>4.8</option>
                                                            <option value="4.9" {{ $row->reading == '4.9' ? 'selected': '' }}>4.9</option>
                                                            <option value="5" {{ $row->reading == '5' ? 'selected': '' }}>5</option>
                                                            <option value="5.1" {{ $row->reading == '5.1' ? 'selected': '' }}>5.1</option>
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <select class="form-select" name="dietary_information[]" disabled>
                                                            <option value="Hypo (Dangerously Low)" {{ $row->dietary_information == 'Hypo (Dangerously Low)' ? 'selected': '' }}>Hypo (Dangerously Low)</option>
                                                            <option value="Low" {{ $row->dietary_information == 'Low' ? 'selected': '' }}>Low</option>
                                                            <option value="Normal" {{ $row->dietary_information == 'Normal' ? 'selected': '' }}>Normal</option>
                                                            <option value="High" {{ $row->dietary_information == 'High' ? 'selected': '' }}>High</option>
                                                            <option value="Hyper (Dangerously High)" {{ $row->dietary_information == 'Hyper (Dangerously High)' ? 'selected': '' }}>Hyper (Dangerously High)</option>
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <select class="form-select" name="remark[]" disabled>
                                                            <option value="Fasting (Eaten before 6 or more hours)" {{ $row->remark == 'Fasting (Eaten before 6 or more hours)' ? 'selected': '' }}>Fasting (Eaten before 6 or more hours)</option>
                                                            <option value="Semi Fasting (Eaten 4 hours before)" {{ $row->remark == 'Semi Fasting (Eaten 4 hours before)' ? 'selected': '' }}>Semi Fasting (Eaten 4 hours before)</option>
                                                            <option value="Digestive (Eaten 2 hours ago)" {{ $row->remark == 'Digestive (Eaten 2 hours ago)' ? 'selected': '' }}>Digestive (Eaten 2 hours ago)</option>
                                                            <option value="2 Hours After meal" {{ $row->remark == '2 Hours After meal' ? 'selected': '' }}>2 Hours After meal</option>
                                                        </select>
                                                    </td>
                                                    <td><textarea class="form-control" name="additional_note[]" rows="1" disabled>{{ $row->additional_note }}</textarea></td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="card-footer d-flex justify-content-between">
                                <button type="button" id="addRowSugar" class="btn btn-secondary btn-label waves-effect waves-light"><i class="ri-add-line label-icon align-middle fs-16 me-2"></i> Add Row</button>
                                <button type="submit" class="btn btn-success btn-label waves-effect waves-light"><i class="ri-check-double-line label-icon align-middle fs-16 me-2"></i> Save</button> 
                            </div>
                        </form>

                    </div>
                </div>
                <!--Blood Pressure Profiling -->
                <div class="tab-content text-muted">
                    <div class="tab-pane {{ Session::has('step2') ? 'active show' : '' }}" id="nav-border-step2" role="tabpanel">

                        <form action="{{ route('blood-pressure-profiling.store') }}" method="POST">
                            @csrf
                            <div class="card-body">
                                <div class="table-responsive table-card">
                                    <table id="dataTablePressure" class="table table-nowrap table-striped mb-0">
                                        <!-- Blood Pressure Profiling Table -->
                                        <thead class="table-light">
                                            <tr>
                                                <th scope="col">Count</th>
                                                <th scope="col">Time</th>
                                                <th scope="col">Systolic</th>
                                                <th scope="col">Diastolic</th>
                                                <th scope="col">Heart Rate (BPM)</th>
                                                <th scope="col">Additional Note</th>
                                                <th scope="col">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($pressureData as $key =>  $row)
                                                <tr>
                                                    <td><h6 class="mt-2">{{ ordinal($key + 1) }}</h6></td>
                                                    <td><input type="time" class="form-control" name="time[]" value="{{$row->time}}" disabled></td>
                                                    <td>
                                                        <select class="form-select" name="systolic[]" disabled>
                                                            @foreach (range(50, 200) as $value)
                                                                <option value="{{ $value }}" {{$row->systolic ==  $value ? 'selected' : '' }}>{{ $value }}</option>
                                                            @endforeach
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <select class="form-select" name="diastolic[]" disabled>
                                                            @foreach (range(30, 125) as $value)
                                                                <option value="{{ $value }}" {{$row->diastolic ==  $value ? 'selected' : '' }}>{{ $value }}</option>
                                                            @endforeach
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <select class="form-select" name="heart_rate_bpm[]" disabled>
                                                            @foreach (range(30, 130) as $value)
                                                                <option value="{{ $value }}" {{$row->heart_rate_bpm ==  $value ? 'selected' : '' }}>{{ $value }}</option>
                                                            @endforeach
                                                        </select>
                                                    </td>
                                                    <td><textarea class="form-control" name="additional_note[]" rows="1" disabled>{{$row->additional_note}}</textarea></td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="card-footer d-flex justify-content-between">
                                <button type="button" id="addRowPressure" class="btn btn-secondary btn-label waves-effect waves-light"><i class="ri-add-line label-icon align-middle fs-16 me-2"></i> Add Row</button>
                                <button type="submit" class="btn btn-success btn-label waves-effect waves-light"><i class="ri-check-double-line label-icon align-middle fs-16 me-2"></i> Save</button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>

    @push('scripts')
    <script>
        $(document).ready(function() {

            var sugarCount = $('#dataTableSugar tbody tr').length + 1;
            var pressureCount = $('#dataTablePressure tbody tr').length + 1;

            if(sugarCount == 1){
                addRowSugar(sugarCount);
            }
            if(pressureCount == 1){
                addRowPressure(pressureCount);
            }

            function ordinal(number) {
                const suffixes = ["th", "st", "nd", "rd"];
                const v = number % 100;
                return number + (suffixes[(v - 20) % 10] || suffixes[v] || suffixes[0]);
            }


            // Add Row Functionality for Blood Sugar Profiling
            $('#addRowSugar').click(function() {
                var rowCount = $('#dataTableSugar tbody tr').length + 1;
                addRowSugar(rowCount);
            });

            function addRowSugar(rowCount){
                var newRow = `
                    <tr>
                        <td><h6 class="mt-2">${ordinal(rowCount)}</h6></td>
                        <td><input type="time" class="form-control" name="time[]"></td>
                        <td>
                            <select class="form-select" name="reading[]">
                                <option value="4.4">4.4</option>
                                <option value="4.5">4.5</option>
                                <option value="4.6">4.6</option>
                                <option value="4.7">4.7</option>
                                <option value="4.8">4.8</option>
                                <option value="4.9">4.9</option>
                                <option value="5">5</option>
                                <option value="5.1">5.1</option>
                            </select>
                        </td>
                        <td>
                            <select class="form-select" name="dietary_information[]">
                                <option value="Hypo (Dangerously Low)">Hypo (Dangerously Low)</option>
                                <option value="Low">Low</option>
                                <option value="Normal">Normal</option>
                                <option value="High">High</option>
                                <option value="Hyper (Dangerously High)">Hyper (Dangerously High)</option>
                            </select>
                        </td>
                        <td>
                            <select class="form-select" name="remark[]">
                                <option value="Fasting (Eaten before 6 or more hours)">Fasting (Eaten before 6 or more hours)</option>
                                <option value="Semi Fasting (Eaten 4 hours before)">Semi Fasting (Eaten 4 hours before)</option>
                                <option value="Digestive (Eaten 2 hours ago)">Digestive (Eaten 2 hours ago)</option>
                                <option value="2 Hours After meal">2 Hours After meal</option>
                            </select>
                        </td>
                        <td><textarea class="form-control" name="additional_note[]" rows="1"></textarea></td>
                        <td><button type="button" class="btn btn-danger btn-sm remove-row">Remove</button></td>
                    </tr>
                `;
                $('#dataTableSugar tbody').append(newRow);
            }
            function addRowPressure(rowCount){
                var newRow = `
                    <tr>
                        <td><h6 class="mt-2">${ordinal(rowCount)}</h6></td>
                        <td><input type="time" class="form-control" name="time[]"></td>
                        <td>
                            <select class="form-select" name="systolic[]">
                                @foreach (range(50, 200) as $value)
                                    <option value="{{ $value }}">{{ $value }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                            <select class="form-select" name="diastolic[]">
                                @foreach (range(30, 125) as $value)
                                    <option value="{{ $value }}">{{ $value }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                            <select class="form-select" name="heart_rate_bpm[]">
                                @foreach (range(30, 130) as $value)
                                    <option value="{{ $value }}">{{ $value }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td><textarea class="form-control" name="additional_note[]" rows="1"></textarea></td>
                        <td><button type="button" class="btn btn-danger btn-sm remove-row">Remove</button></td>
                    </tr>
                `;
                $('#dataTablePressure tbody').append(newRow);
            }
    
            // Add Row Functionality for Blood Pressure Profiling
            $('#addRowPressure').click(function() {
                var rowCount = $('#dataTablePressure tbody tr').length + 1;
                addRowPressure(rowCount);
            });
    
            // Remove Row Functionality
            $(document).on('click', '.remove-row', function() {
                $(this).closest('tr').remove();
                // Update count in remaining rows
                updateRowNumbers();
            });
    
            // Function to update row numbers
            function updateRowNumbers() {
                $('#dataTableSugar tbody tr').each(function(index) {
                    $(this).find('td:first-child h6').text((index + 1) + 'st');
                });
                $('#dataTablePressure tbody tr').each(function(index) {
                    $(this).find('td:first-child h6').text((index + 1) + 'st');
                });
            }
        });
    </script>
    @endpush






    @push('scripts')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

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
    @endpush
</x-app-layout>
