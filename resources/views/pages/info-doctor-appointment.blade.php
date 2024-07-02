<x-app-layout>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">Appointment Schedule List</h4>
                </div><!-- end card header -->

                <div class="card-body">
                    <div class="listjs-table" id="customerList">
                        <div class="row g-4 mb-3">
                            <div class="col-sm-auto">
                                <div>
                                    <button type="button" class="btn btn-success" id="modalOpen"><i class="ri-add-line align-bottom me-1"></i> Add</button>
                                    <button class="btn btn-soft-danger" onClick="deleteMultiple()"><i class="ri-delete-bin-2-line"></i></button>
                                </div>
                            </div>
                            <div class="col-sm">
                                <div class="d-flex justify-content-sm-end">
                                    <div class="search-box ms-2">
                                        <input type="text" class="form-control search" placeholder="Search...">
                                        <i class="ri-search-line search-icon"></i>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="table-responsive table-card mt-3 mb-1">
                            <table class="table align-middle table-nowrap" id="customerTable">
                                <thead class="table-light">
                                    <tr>
                                        <th scope="col" style="width: 50px;">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="checkAll" value="option">
                                            </div>
                                        </th>

                                        <th class="sort" data-sort="customer_name">Doctor Name</th>
                                        <th class="sort" data-sort="email">Designation</th>
                                        <th class="sort" data-sort="date">Specialization</th>
                                        <th class="sort" data-sort="phone">Contact</th>
                                        <th class="sort" data-sort="status">Status</th>
                                        <th class="sort" data-sort="action">Action</th>
                                    </tr>
                                </thead>
                                <tbody class="list form-check-all">
                                    @foreach($info as $data)
                                        <tr>
                                            <th scope="row">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="chk_child" value="option1">
                                                </div>
                                            </th>
                                            <td class="customer_name">{{ $data->full_name }}</td>
                                            <td class="email">{{ $data->designation }}</td>
                                            <td class="date">{{ $data->specialization }}</td>
                                            <td class="phone">{{ $data->contact_number }}</td>
                                            <td><span class="badge bg-success-subtle text-success text-uppercase">Active</span></td>
                                            <td>
                                                <div class="d-flex gap-2">
                                                    <div class="edit">
                                                        <button class="btn btn-sm btn-success edit-item-btn" data-id="{{ $data->id }}">Edit</button>
                                                    </div>
                                                    <div class="remove">
                                                        <button class="btn btn-sm btn-danger remove-item-btn" data-bs-toggle="modal" data-bs-target="#deleteRecordModal">Remove</button>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="noresult" style="display: none">
                                <div class="text-center">
                                    <lord-icon src="https://cdn.lordicon.com/msoeawqm.json" trigger="loop" colors="primary:#121331,secondary:#08a88a" style="width:75px;height:75px">
                                    </lord-icon>
                                    <h5 class="mt-2">Sorry! No Result Found</h5>
                                    <p class="text-muted mb-0">We've searched more than 150+ Orders We did not find any
                                        orders for you search.</p>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex justify-content-end">
                            <div class="pagination-wrap hstack gap-2">
                                <a class="page-item pagination-prev disabled" href="javascrpit:void(0);">
                                    Previous
                                </a>
                                <ul class="pagination listjs-pagination mb-0"></ul>
                                <a class="page-item pagination-next" href="javascrpit:void(0);">
                                    Next
                                </a>
                            </div>
                        </div>
                    </div>
                </div><!-- end card -->
            </div>
            <!-- end col -->
        </div>
        <!-- end col -->
    </div>
    <!-- end row -->


    
     <!-- Modal -->
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
                        <input type="hidden" id="setId" name="appointment_id">
                        <div class="row">
                            <div class="col-md-6 mb-2">
                                <label for="full_name" class="form-label">Full Name</label>
                                <input type="text" name="full_name" class="form-control" id="full_name" placeholder="Enter your Full Name" value="{{ old('full_name') }}">
                                @error('full_name')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-2">
                                <label for="designation" class="form-label">Designation</label>
                                <input type="text" name="designation" class="form-control" id="designation" placeholder="Enter your designation" value="{{ old('designation') }}">
                                @error('designation')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-2">
                                <label for="contact_number" class="form-label">Contact Number</label>
                                <input type="text" class="form-control" id="contact_number" name="contact_number" placeholder="Enter your number" value="{{ old('contact_number') }}">
                                @error('contact_number')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-2">
                                <label for="specialization" class="form-label">Specialization</label>
                                <input type="text" class="form-control" id="specialization" name="specialization" placeholder="Enter your specialization" value="{{ old('specialization') }}">
                                @error('specialization')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-2">
                                <label for="availability_hours" class="form-label">Availability Hours</label>
                                <input type="text" class="form-control" id="availability_hours" name="availability_hours" placeholder="Available Hours" value="{{ old('availability_hours') }}">
                                @error('availability_hours')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-2">
                                <label for="chamber_address" class="form-label">Chamber Address</label>
                                <textarea class="form-control" name="chamber_address" id="chamber_address" rows="1" placeholder="Enter your Address">{{ old('chamber_address') }}</textarea>
                                @error('chamber_address')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <br>

                        <!-- Appointment Details Data -->
                        <div class="table-responsive table-card">
                            <table id="items-table" class="table table-nowrap table-striped mb-0">
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
                                <tbody></tbody>
                                <tfoot class="table-light">
                                    <tr>
                                        <td colspan="5"><button type="button" id="addRowFollowUp" class="btn btn-soft-secondary btn-label waves-effect waves-light"><i class="ri-add-line label-icon align-middle fs-16 me-2"></i> Add Follow Up Session</button></td>
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

    @push('scripts')
    <script type="text/javascript">
        $(document).ready(function(){
            // Function to initialize modal and populate initial row
            $('#modalOpen').click(function(){
                // Clear input fields
                $('#full_name, #designation, #specialization, #chamber_address, #availability_hours, #contact_number').val('');
    
                // Clear table body and add first row only if it's not already added
                if ($('#items-table tbody tr').length === 0) {
                    openFirstRow();
                }
    
                // Show the modal
                $('#exampleModal').modal('show');
            });
    
            function openFirstRow(){
                // Add only if no rows exist
                if ($('#items-table tbody tr').length === 0) {
                    $('#items-table tbody').html(`
                        <tr>
                            <td><input type="text" class="form-control" name="moreFile[0][appointment]" value="1st Appointment"></td>
                            <td>
                                <select name="moreFile[0][day]" class="form-control">
                                    <option value="sunday">Sunday</option>
                                    <option value="monday">Monday</option>
                                    <option value="tuesday">Tuesday</option>
                                    <option value="wednesday">Wednesday</option>
                                    <option value="thursday">Thursday</option>
                                    <option value="friday">Friday</option>
                                </select>
                            </td>
                            <td><input type="date" class="form-control" name="moreFile[0][time_date_tool]"></td>
                            <td><input type="number" class="form-control" name="moreFile[0][fee]"></td>
                            <td><textarea name="moreFile[0][note]" class="form-control" rows="1"></textarea></td>
                            <td><button type="button" class="btn btn-outline-success btn-icon waves-effect waves-light"><i class="ri-mail-send-line"></i></button></td>
                        </tr>
                    `);
                }
            }
    
            // Function to handle adding follow-up rows
            var count = 0;
            $('#addRowFollowUp').click(function(){
                count++;
                addRow(count);
            });
    
            function addRow(i){
                // Determine the appropriate ordinal suffix
                var followUpCount = $('#items-table tbody tr').length;
                let suffix = getOrdinalSuffix(followUpCount);
                // alert(followUpCount);

                // Create new row for follow-up and append to the table
                var newRow = `<tr class="tr">
                                <td><input type="text" class="form-control" name="moreFile[${i}][appointment]" value="${followUpCount}${suffix} Follow Up"></td>
                                <td>
                                    <select name="moreFile[${i}][day]" class="form-control">
                                        <option value="sunday">Sunday</option>
                                        <option value="monday">Monday</option>
                                        <option value="tuesday">Tuesday</option>
                                        <option value="wednesday">Wednesday</option>
                                        <option value="thursday">Thursday</option>
                                        <option value="friday">Friday</option>
                                    </select>
                                </td>
                                <td><input type="date" class="form-control" name="moreFile[${i}][time_date_tool]"></td>
                                <td><input type="number" class="form-control" name="moreFile[${i}][fee]"></td>
                                <td><textarea name="moreFile[${i}][note]" class="form-control" rows="1"></textarea></td>
                                <td>
                                    <button type="button" class="btn btn-outline-success btn-icon waves-effect waves-light"><i class="ri-mail-send-line"></i></button>
                                    <button type="button" class="btn btn-danger btn-icon waves-effect waves-light remove-row"><i class="ri-delete-bin-5-line"></i></button>
                                </td>
                            </tr>`;
                                    
                $('#items-table tbody').append(newRow);
            }
    
            // Function to update ordinal suffixes after removing or adding rows
            function updateOrdinalSuffixes() {
                $('#items-table tbody .tr').each(function(index) {
                    let rowNumber = index + 1;
                    let suffix = getOrdinalSuffix(rowNumber);
                    $(this).find('input[name^="moreFile["]').val(`${rowNumber}${suffix} Follow Up`);
                });
            }
    
            // Function to determine ordinal suffix (st, nd, rd, th)
            function getOrdinalSuffix(number) {
                if (number % 10 === 1 && number % 100 !== 11) {
                    return 'st';
                } else if (number % 10 === 2 && number % 100 !== 12) {
                    return 'nd';
                } else if (number % 10 === 3 && number % 100 !== 13) {
                    return 'rd';
                } else {
                    return 'th';
                }
            }
    
            // Attach event handler to initial "Remove" buttons
            $('#items-table').on('click', '.remove-row', function() {
                $(this).closest('tr').remove();
                updateOrdinalSuffixes();
            });
        });
    </script>


    <script type="text/javascript">
        $(document).on('click', '.edit-item-btn', function() {
            var id = $(this).data('id');

            // Clear input fields
            $('#full_name, #designation, #specialization, #chamber_address, #availability_hours, #contact_number').val('');
            $('#items-table tbody').empty(); // Clear existing appointment details

            // Show the modal
            $('#exampleModal').modal('show');

            // AJAX request to fetch doctor appointment data
            $.ajax({
                url: '{{ route('info-doctor-appointment.edit') }}',
                method: 'GET',
                dataType: 'JSON',
                data: {'id': id},
                success: function(response) {
                    // Populate doctor appointment fields
                    $('#setId').val(response.id);
                    $('#full_name').val(response.full_name);
                    $('#designation').val(response.designation);
                    $('#specialization').val(response.specialization);
                    $('#chamber_address').val(response.chamber_address);
                    $('#availability_hours').val(response.availability_hours);
                    $('#contact_number').val(response.contact_number);

                    // Populate appointment details table
                    $.each(response.appointment_details, function(index, detail) {
                        var newRow = '<tr>' +
                            '<td><input type="text" class="form-control" name="moreFile[' + index + '][appointment]" value="' + detail.appointment + '" disabled></td>' +
                            '<td><select name="moreFile[' + index + '][day]" class="form-control" disabled>' +
                                '<option value="sunday" ' + (detail.day === 'sunday' ? 'selected' : '') + '>Sunday</option>' +
                                '<option value="monday" ' + (detail.day === 'monday' ? 'selected' : '') + '>Monday</option>' +
                                '<option value="tuesday" ' + (detail.day === 'tuesday' ? 'selected' : '') + '>Tuesday</option>' +
                                '<option value="wednesday" ' + (detail.day === 'wednesday' ? 'selected' : '') + '>Wednesday</option>' +
                                '<option value="thursday" ' + (detail.day === 'thursday' ? 'selected' : '') + '>Thursday</option>' +
                                '<option value="friday" ' + (detail.day === 'friday' ? 'selected' : '') + '>Friday</option>' +
                            '</select></td>' +
                            '<td><input type="date" class="form-control" name="moreFile[' + index + '][time_date_tool]" value="' + detail.time_date_tool + '" disabled></td>' +
                            '<td><input type="number" class="form-control" name="moreFile[' + index + '][fee]" value="' + detail.fee + '" disabled></td>' +
                            '<td><textarea class="form-control" name="moreFile[' + index + '][note]" rows="1" disabled>' + (detail.note ? detail.note : '') + '</textarea></td>' +
                            '<td><button type="button" class="btn btn-outline-success btn-icon waves-effect waves-light"><i class="ri-mail-send-line"></i></button></td>' +
                            '</tr>';
                        
                        $('#items-table tbody').append(newRow);
                    });
                },
                error: function(xhr, status, error) {
                    console.error(error);
                    alert('Error occurred while fetching data.');
                }
            });
        });

        $(document).on('click', '.remove-row', function() {
            $(this).closest('tr').remove();
        });
    </script>

    
    @endpush

</x-app-layout>
