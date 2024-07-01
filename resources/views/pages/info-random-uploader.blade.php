<x-app-layout>
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">Random Uploader Tool</h4>
                </div><!-- end card header -->
                <div class="card-body">
                    <form action="{{ route('random-uploader-tool.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="table-responsive table-card">
                            <table id="dataTableUploadTool" class="table table-nowrap table-striped mb-0">
                                <thead class="table-light">
                                    <tr>
                                        <th scope="col">SL</th>
                                        <th scope="col">Document Name</th>
                                        <th scope="col">Sub-Type (If Any)</th>
                                        <th scope="col">Date</th>
                                        <th scope="col">Additional Note(s)</th>
                                        <th scope="col">Upload Tool</th>
                                        <th scope="col">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><h6 class="mt-2">1</h6></td>
                                        <td><input type="text" class="form-control" name="document_name[]"></td>
                                        <td><input type="text" class="form-control" name="sub_type[]"></td>
                                        <td><input type="date" class="form-control" name="date[]"></td>
                                        <td><input type="text" class="form-control" name="additional_note[]"></td>
                                        <td><input type="file" class="form-control" name="upload_tool[]"></td>
                                        <td><button type="button" class="btn btn-danger btn-sm remove-row">Remove</button></td>
                                    </tr>
                                </tbody>
                                <tfoot class="table-light">
                                    <tr>
                                        <td colspan="6"><button type="button" id="addRowSugar" class="btn btn-secondary btn-label waves-effect waves-light"><i class="ri-add-line label-icon align-middle fs-16 me-2"></i> Add Row</button></td>
                                        <td><button type="submit" class="btn btn-success btn-label waves-effect waves-light"><i class="ri-check-double-line label-icon align-middle fs-16 me-2"></i> Save</button></td>
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
            // Add Row Button Click
            $('#addRowSugar').click(function() {
                var rowCount = $('#dataTableUploadTool tbody tr').length + 1;

                var newRow = '<tr>' +
                    '<td><h6 class="mt-2">' + rowCount + '</h6></td>' +
                    '<td><input type="text" class="form-control" name="document_name[]"></td>' +
                    '<td><input type="text" class="form-control" name="sub_type[]"></td>' +
                    '<td><input type="date" class="form-control" name="date[]"></td>' +
                    '<td><input type="text" class="form-control" name="additional_note[]"></td>' +
                    '<td><input type="file" class="form-control" name="upload_tool[]"></td>' +
                    '<td><button type="button" class="btn btn-danger btn-sm remove-row">Remove</button></td>' +
                    '</tr>';

                $('#dataTableUploadTool tbody').append(newRow);
                updateRowNumbers();
            });

            // Remove Row Button Click
            $(document).on('click', '.remove-row', function() {
                $(this).closest('tr').remove();
                updateRowNumbers();
            });

            // Function to update row numbers
            function updateRowNumbers() {
                $('#dataTableUploadTool tbody tr').each(function(index) {
                    $(this).find('td:first-child h6').text(index + 1);
                });
            }
        });
    </script>  
    @endpush
</x-app-layout>
