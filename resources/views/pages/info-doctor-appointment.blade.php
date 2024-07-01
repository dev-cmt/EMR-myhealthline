<x-app-layout>
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">Appointment Schedule List</h4>
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal" style="float: right; margin-bottom: -6px; margin-top: -20px;">
                        Create
                    </button>
                </div>
                <div class="table-responsive table-card">
                    <table id="dataTableAppointments" class="table table-nowrap table-striped mb-0">
                        <thead class="table-light">
                            <tr>
                                <th scope="col">#SL</th>
                                <th scope="col">Doctor Name</th>
                                <th scope="col">Designation</th>
                                <th scope="col">Specialization</th>
                                <th scope="col">Contact</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($info as $data)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $data->full_name }}</td>
                                    <td>{{ $data->designation }}</td>
                                    <td>{{ $data->specialization }}</td>
                                    <td>{{ $data->contact_number }}</td>
                                    <td class="float-right" style="width:100px">
                                        <button type="button" class="btn btn-success btn-sm btn-xm p-2" id="edit_details" data-detId="5"  data-id="{{ $data->id }}"> Edit</button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            
        </div>
    </div>

    <!-- create modal open -->
    <div class="modal fade bd-example-modal-lg" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Appointment Schedule</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('info-doctor-appointment.store') }}" method="POST">
                        @csrf
                        <!-- Main Appointment Data -->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row mb-2">
                                    <div class="col-lg-3">
                                        <label for="full_name" class="form-label">Full Name</label>
                                    </div>
                                    <div class="col-lg-9">
                                        <input type="text" name="full_name" class="form-control" id="full_name" placeholder="Enter your Full Name" value="{{ old('full_name') }}">
                                        @error('full_name')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row mb-2">
                                    <div class="col-lg-3">
                                        <label for="designation" class="form-label">Designation</label>
                                    </div>
                                    <div class="col-lg-9">
                                        <input type="text" name="designation" class="form-control" id="designation" placeholder="Enter your designation" value="{{ old('designation') }}">
                                        @error('designation')
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
                                        <label for="contact_number" class="form-label">Contact Number</label>
                                    </div>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control" id="contact_number" name="contact_number" placeholder="Enter your number" value="{{ old('contact_number') }}">
                                        @error('contact_number')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-lg-3">
                                        <label for="specialization" class="form-label">Specialization</label>
                                    </div>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control" id="specialization" name="specialization" placeholder="Enter your specialization" value="{{ old('specialization') }}">
                                        @error('specialization')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row mb-2">
                                    <div class="col-lg-3">
                                        <label for="availability_hours" class="form-label">Availability Hours</label>
                                    </div>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control" id="availability_hours" name="availability_hours" placeholder="Available Hours" value="{{ old('availability_hours') }}">
                                        @error('availability_hours')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-lg-3">
                                        <label for="chamber_address" class="form-label">Chamber Address</label>
                                    </div>
                                    <div class="col-lg-9">
                                        <textarea class="form-control" name="chamber_address" id="chamber_address" rows="1" placeholder="Enter your Address">{{ old('chamber_address') }}</textarea>
                                        @error('chamber_address')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>

                        <!-- Appointment Details Data -->
                        <div class="table-responsive table-card">
                            <table id="dataTableAppointments" class="table table-nowrap table-striped mb-0">
                                <thead class="table-light">
                                    <tr>
                                        <th scope="col">Appointment(s)</th>
                                        <th scope="col">Day</th>
                                        <th scope="col">Time & Date Tool</th>
                                        <th scope="col">Fee</th>
                                        <th scope="col">Note</th>
                                        <th scope="col">Actions</th>
                                    </tr>
                                </thead>
                                <tbody id="appointmentDetails">
                                    <tr>
                                        <td><input type="text" class="form-control" name="appointment[]" value="1st Appointment"></td>
                                        <td>
                                            <select name="day[]" class="form-control">
                                                <option value="sunday">Sunday</option>
                                                <option value="monday">Monday</option>
                                                <option value="tuesday">Tuesday</option>
                                                <option value="wednesday">Wednesday</option>
                                                <option value="thursday">Thursday</option>
                                                <option value="friday">Friday</option>
                                            </select>
                                        </td>
                                        <td><input type="date" class="form-control" name="time_date_tool[]" placeholder="Select Date"></td>
                                        <td><input type="text" class="form-control" name="fee[]" placeholder="Enter Fee"></td>
                                        <td><input type="text" class="form-control" name="note[]" placeholder="Enter Note"></td>
                                        <td><button type="button" class="btn btn-danger btn-sm remove-row">Remove</button></td>
                                    </tr>
                                </tbody>
                                <tfoot class="table-light">
                                    <tr>
                                        <td colspan="5"><button type="button" id="addRowFollowUp" class="btn btn-secondary btn-label waves-effect waves-light"><i class="ri-add-line label-icon align-middle fs-16 me-2"></i> Add Follow Up Session</button></td>
                                        <td><button type="submit" class="btn btn-success btn-label waves-effect waves-light"><i class="ri-check-double-line label-icon align-middle fs-16 me-2 submit_btn"></i> Save</button></td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- <div id="appointmentDetails">

    </div> --}}

    @push('scripts')
    <script>
        $(document).ready(function() {
            $('#addRowFollowUp').click(function() {
                var rowCount = $('#dataTableAppointments tbody tr').length + 1;

                var newRow = '<tr>' +
                    '<td><input type="text" class="form-control" name="appointment[]" value="Follow Up ' + rowCount + '"></td>' +
                    '<td>' +
                        '<select name="day[]" class="form-control">' +
                            '<option value="saturday">Saturday</option>' +
                            '<option value="sunday">Sunday</option>' +
                            '<option value="monday">Monday</option>' +
                            '<option value="tuesday">Tuesday</option>' +
                            '<option value="wednesday">Wednesday</option>' +
                            '<option value="thursday">Thursday</option>' +
                            '<option value="friday">Friday</option>' +
                        '</select>' +
                    '</td>' +
                    '<td><input type="date" class="form-control" name="time_date_tool[]" placeholder="Select Date"></td>' +
                    '<td><input type="text" class="form-control" name="fee[]" placeholder="Enter Fee"></td>' +
                    '<td><input type="text" class="form-control" name="note[]" placeholder="Enter Note"></td>' +
                    '<td><button type="button" class="btn btn-danger btn-sm remove-row">Remove</button></td>' +
                    '</tr>';

                $('#dataTableAppointments tbody').append(newRow);
                updateRowNumbers();
            });

            $(document).on('click', '.remove-row', function() {
                $(this).closest('tr').remove();
                updateRowNumbers();
            });

            function updateRowNumbers() {
                $('#dataTableAppointments tbody tr').each(function(index) {
                    $(this).find('td:first-child input').val('Follow Up ' + (index + 1));
                });
            }
        });
    </script>

    <script>
        $(document).on('click', '#edit_details', function() {
            var id = $(this).data('id');

            $.ajax({
                url: '{{ route('info-doctor-appointment.edit') }}',
                method: 'GET',
                dataType: 'JSON',
                data: {'id': id},
                success: function(response) {
                    // Assuming response is an array with appointment_details loaded
                    // alert('hi');

                    // Example to display appointment details
                    $('#appointmentDetails').empty(); // Clear previous details
                    $.each(response, function(index, doctor) {
                        let doctorDetails = `
                            <div class="appointment">
                                <h3>${doctor.full_name}</h3>
                                <p><strong>Designation:</strong> ${doctor.designation}</p>
                                <p><strong>Specialization:</strong> ${doctor.specialization}</p>
                                <p><strong>Chamber Address:</strong> ${doctor.chamber_address}</p>
                                <p><strong>Availability Hours:</strong> ${doctor.availability_hours}</p>
                                <p><strong>Contact Number:</strong> ${doctor.contact_number}</p>
                                <h4>Appointment Details:</h4>
                                <ul>
                        `;
                        alert(doctor.appointment_details.length);
                        $.each(doctor.appointment_details, function(idx, appointment) {
                            
                            doctorDetails += `
                                <li>
                                    <strong>Appointment:</strong> ${appointment.appointment}<br>
                                    <strong>Day:</strong> ${appointment.day}<br>
                                    <strong>Date:</strong> ${appointment.time_date_tool}<br>
                                    <strong>Fee:</strong> ${appointment.fee}<br>
                                    <strong>Note:</strong> ${appointment.note}<br>
                                </li>
                            `;
                        });

                        doctorDetails += `</ul></div>`;
                        $('#appointmentDetails').append(doctorDetails);
                    });
                },
                error: function(xhr, status, error) {
                    console.error(error);
                    alert('Error occurred while fetching data.');
                }
            });
        });

        // Remove row functionality
        $(document).on('click', '.remove-row', function() {
            $(this).closest('tr').remove();
        });
    </script>


    
    @endpush
</x-app-layout>
