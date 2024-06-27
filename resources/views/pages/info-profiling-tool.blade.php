<x-app-layout>
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">Blood Sugar Profiling</h4>
                </div><!-- end card header -->
                <div class="card-body">
                    <div class="table-responsive table-card">
                        <table class="table table-nowrap table-striped-columns mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th scope="col">Count</th>
                                    <th scope="col">Time</th>
                                    <th scope="col">Reading</th>
                                    <th scope="col">Dietary Information</th>   
                                    <th scope="col">Remark</th>   
                                    <th scope="col">Additional Note</th>   
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1st</td>
                                    <td><input type="time" class="from-control" name=""></td>
                                    <td>
                                        <select name="" id="">
                                            <option value="">4.4</option>
                                            <option value="">4.5</option>
                                            <option value="">4.6</option>
                                            <option value="">4.7</option>
                                            <option value="">4.8</option>
                                            <option value="">4.9</option>
                                            <option value="">5</option>
                                            <option value="">5.1</option>
                                        </select>
                                    </td>
                                    <td>
                                        <select name="" id="">
                                            <option value="">Fasting (Eaten before 6 or more hours)</option>
                                            <option value="">Semi Fasting (Eaten 4 hours before)</option>
                                            <option value="">Digestive (Eaten 2 hours ago)</option>
                                            <option value="">2 Hours After meal</option>
                                        </select>
                                    </td>
                                    <td>$24.05</td>
                                    <td><span class="badge bg-success">Paid</span></td>
                                    <td>
                                        <button type="button" class="btn btn-sm btn-light">Details</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="cardtableCheck02">
                                            <label class="form-check-label" for="cardtableCheck02"></label>
                                        </div>
                                    </td>
                                    <td><a href="#" class="fw-semibold">#VL2109</a></td>
                                    <td>Georgie Winters</td>
                                    <td>07 Oct, 2021</td>
                                    <td>$26.15</td>
                                    <td><span class="badge bg-success">Paid</span></td>
                                    <td>
                                        <button type="button" class="btn btn-sm btn-light">Details</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="cardtableCheck03">
                                            <label class="form-check-label" for="cardtableCheck03"></label>
                                        </div>
                                    </td>
                                    <td><a href="#" class="fw-semibold">#VL2108</a></td>
                                    <td>Whitney Meier</td>
                                    <td>06 Oct, 2021</td>
                                    <td>$21.25</td>
                                    <td><span class="badge bg-danger">Refund</span></td>
                                    <td>
                                        <button type="button" class="btn btn-sm btn-light">Details</button>
                                    </td>
                                </tr>
                                
                            </tbody>
                        </table>
                    </div>

                </div>
                <div class="card-footer d-flex justify-content-between">
                    <button type="button" class="btn btn-secondary btn-label waves-effect waves-light"><i class="ri-add-line label-icon align-middle fs-16 me-2"></i> Add Row</button>
                    <button type="button" class="btn btn-success btn-label waves-effect waves-light"><i class="ri-check-double-line label-icon align-middle fs-16 me-2"></i> Save</button> 
                </div>

            </div>
            <!-- end -->
        </div>
        <!-- end col -->
    </div>
</x-app-layout>