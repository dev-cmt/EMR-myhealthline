<x-app-layout>
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">Personal Vaccination Record</h4>
                </div><!-- end card header -->
                <div class="card-body">
                    <form action="{{ route('vaccinations.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <!-- Section 01 - EPI -->
                        <div class="table-responsive table-card">
                            <h5>Section 01 - EPI</h5>
                            <table id="dataTableVaccination" class="table table-nowrap table-striped mb-0">
                                <thead class="table-light">
                                    <tr>
                                        <th>Vaccine</th>
                                        <th>Dose 01</th>
                                        <th>Dose 02</th>
                                        <th>Dose 03</th>
                                        <th>Booster</th>
                                        <th>Uploader Tool</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach (['BCG', 'Pentavalent', 'HepB', 'HiB', 'MR', 'PCV', 'IPV', 'fIPV', 'T-d'] as $vaccine)
                                    <tr>
                                        <td>{{ $vaccine }}</td>
                                        <td><input type="date" class="form-control" name="dose_01[]"></td>
                                        <td><input type="date" class="form-control" name="dose_02[]"></td>
                                        <td><input type="date" class="form-control" name="dose_03[]"></td>
                                        <td><input type="date" class="form-control" name="booster[]"></td>
                                        <td><input type="file" class="form-control" name="uploader_tool[]"></td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tfoot class="table-light">
                                    <tr>
                                        <td colspan="6">
                                            <button type="submit" class="btn btn-success btn-label waves-effect waves-light"><i class="ri-check-double-line label-icon align-middle fs-16 me-2"></i> Save</button>
                                            <button type="button" class="btn btn-primary btn-label waves-effect waves-light"><i class="ri-alarm-line label-icon align-middle fs-16 me-2"></i> Set Reminder</button>
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>

                        <!-- Section 02 - Covid-19 -->
                        <div class="table-responsive table-card mt-4">
                            <h5>Section 02 - Covid-19</h5>
                            <table id="dataTableCovid" class="table table-nowrap table-striped mb-0">
                                <thead class="table-light">
                                    <tr>
                                        <th>Location</th>
                                        <th>Date</th>
                                        <th>Manufacturer</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><input type="text" class="form-control" name="location"></td>
                                        <td><input type="date" class="form-control" name="covid_date"></td>
                                        <td><input type="text" class="form-control" name="manufacturer"></td>
                                    </tr>
                                    <tr>
                                        <td>Dose 01</td>
                                        <td><input type="date" class="form-control" name="covid_dose_01"></td>
                                        <td><input type="file" class="form-control" name="covid_uploader_tool_01"></td>
                                    </tr>
                                    <tr>
                                        <td>Dose 02</td>
                                        <td><input type="date" class="form-control" name="covid_dose_02"></td>
                                        <td><input type="file" class="form-control" name="covid_uploader_tool_02"></td>
                                    </tr>
                                    <tr>
                                        <td>Dose 03</td>
                                        <td><input type="date" class="form-control" name="covid_dose_03"></td>
                                        <td><input type="file" class="form-control" name="covid_uploader_tool_03"></td>
                                    </tr>
                                    <tr>
                                        <td>Booster</td>
                                        <td><input type="date" class="form-control" name="covid_booster"></td>
                                        <td><input type="file" class="form-control" name="covid_uploader_tool_booster"></td>
                                    </tr>
                                    <tr>
                                        <td>Certificate #</td>
                                        <td><input type="text" class="form-control" name="certificate_number"></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>ANTB</td>
                                        <td><input type="text" class="form-control" name="antibody_test"></td>
                                        <td></td>
                                    </tr>
                                </tbody>
                                <tfoot class="table-light">
                                    <tr>
                                        <td colspan="3">
                                            <button type="submit" class="btn btn-success btn-label waves-effect waves-light"><i class="ri-check-double-line label-icon align-middle fs-16 me-2"></i> Save</button>
                                            <button type="button" class="btn btn-primary btn-label waves-effect waves-light"><i class="ri-alarm-line label-icon align-middle fs-16 me-2"></i> Set Reminder</button>
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>

                        <!-- Section 03 - Paid Ones -->
                        <div class="table-responsive table-card mt-4">
                            <h5>Section 03 - Paid Ones</h5>
                            <table id="dataTablePaidVaccination" class="table table-nowrap table-striped mb-0">
                                <thead class="table-light">
                                    <tr>
                                        <th>Market Name</th>
                                        <th>Applicable for</th>
                                        <th>Dose 01</th>
                                        <th>Dose 02</th>
                                        <th>Dose 03</th>
                                        <th>Booster</th>
                                        <th>Uploader Tool</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ([
                                        ['InfluVax Tetra', 'Flu/Influenza'],
                                        ['Rabix-Vc', 'Rabies'],
                                        ['IngoVax ACWY', 'Meningitis'],
                                        ['Hepa B', 'Hepatitis B'],
                                        ['Vaxphoid', 'Typhoid'],
                                        ['Vaxitet', 'Tetanus'],
                                        ['PrevaHAV', 'Hepatitis A'],
                                        ['ChloVax', 'Cholera'],
                                        ['PapiloVax', 'Cervical Cancer'],
                                        ['Varizost', 'Chicken Pox'],
                                        ['PrenoVax 23', 'Pneumonia']
                                    ] as $vaccine)
                                    <tr>
                                        <td>{{ $vaccine[0] }}</td>
                                        <td>{{ $vaccine[1] }}</td>
                                        <td><input type="date" class="form-control" name="paid_dose_01[]"></td>
                                        <td><input type="date" class="form-control" name="paid_dose_02[]"></td>
                                        <td><input type="date" class="form-control" name="paid_dose_03[]"></td>
                                        <td><input type="date" class="form-control" name="paid_booster[]"></td>
                                        <td><input type="file" class="form-control" name="paid_uploader_tool[]"></td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tfoot class="table-light">
                                    <tr>
                                        <td colspan="7">
                                            <button type="submit" class="btn btn-success btn-label waves-effect waves-light"><i class="ri-check-double-line label-icon align-middle fs-16 me-2"></i> Save</button>
                                            <button type="button" class="btn btn-primary btn-label waves-effect waves-light"><i class="ri-alarm-line label-icon align-middle fs-16 me-2"></i> Set Reminder</button>
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
</x-app-layout>
