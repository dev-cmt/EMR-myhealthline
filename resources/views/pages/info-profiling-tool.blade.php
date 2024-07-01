<x-app-layout>
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">Blood Sugar Profiling</h4>
                </div><!-- end card header -->
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
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
                                    <tr>
                                        <td><h6 class="mt-2">1st</h6></td>
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
    </div>

    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">Blood Pressure Profiling</h4>
                </div><!-- end card header -->
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
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
                                    <tr>
                                        <td><h6 class="mt-2">1st</h6></td>
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
                                            <select class="form-select" name="heart_rate[]">
                                                @foreach (range(30, 130) as $value)
                                                    <option value="{{ $value }}">{{ $value }}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td><textarea class="form-control" name="additional_note[]" rows="1"></textarea></td>
                                        <td><button type="button" class="btn btn-danger btn-sm remove-row">Remove</button></td>
                                    </tr>
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
    

    @push('scripts')
    <script>
        $(document).ready(function() {
            // Add Row Functionality for Blood Sugar Profiling
            $('#addRowSugar').click(function() {
                var rowCount = $('#dataTableSugar tbody tr').length + 1;
                var newRow = `
                    <tr>
                        <td><h6 class="mt-2">${rowCount}st</h6></td>
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
            });

    
            // Add Row Functionality for Blood Pressure Profiling
            $('#addRowPressure').click(function() {
                var rowCount = $('#dataTablePressure tbody tr').length + 1;
                var newRow = `
                    <tr>
                        <td><h6 class="mt-2">${rowCount}st</h6></td>
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
                            <select class="form-select" name="heart_rate[]">
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
</x-app-layout>
