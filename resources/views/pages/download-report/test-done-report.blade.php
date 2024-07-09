<x-app-layout>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">General Report</h4>
                </div>

                <div class="card-body">
                    <form action="#" method="GET" id="filter-data">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group row">
                                    <label class="col-md-4 col-form-label">From <span class="text-danger">*</span></label>
                                    <div class="col-md-8">
                                        <input type="date" name="start_date" class="form-control" value="{{ $startDate ?? date('Y-m-01') }}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group row">
                                    <label class="col-md-4 col-form-label">To <span class="text-danger">*</span></label>
                                    <div class="col-md-8">
                                        <input type="date" name="end_date" class="form-control" value="{{ $endDate ?? date('Y-m-d') }}">
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="col-md-2">
                                <div class="d-flex justify-content-end">
                                    <button type="submit" class="btn btn-sm btn-danger">
                                        <i class="ti-reload"></i><span class="btn-icon-add"></span>Search
                                    </button>
                                </div>
                            </div> --}}
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-4 col-md-4 col-sm-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">Complete Health Profile </h4>
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        {{-- <a href="javascript:window.print()" class="btn btn-success"><i class="ri-printer-line align-bottom me-1"></i> Print</a> --}}
                        <a href="#" class="btn btn-primary"><i class="ri-download-2-line align-bottom me-1"></i> Download</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Item -->
        <div class="col-xl-4 col-md-4 col-sm-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">Physicians/Doctors visited </h4>
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <a href="{{ route('doctor-visit.download') }}" class="btn btn-primary"><i class="ri-download-2-line align-bottom me-1"></i> Download</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-md-4 col-sm-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">Cost of Doctor's Consultation </h4>
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <a href="{{ route('doctor-cost.download') }}" class="btn btn-primary"><i class="ri-download-2-line align-bottom me-1"></i> Download</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-4 col-md-4 col-sm-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">Medicines Consumed </h4>
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <a href="{{ route('medicine.download') }}" class="btn btn-primary"><i class="ri-download-2-line align-bottom me-1"></i> Download</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Item -->
        <div class="col-xl-4 col-md-4 col-sm-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">Antibiotics Consumed </h4>
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <a href="{{ route('antibiotic.download') }}" class="btn btn-primary"><i class="ri-download-2-line align-bottom me-1"></i> Download</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-md-4 col-sm-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">Tests Done </h4>
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <a href="{{ route('test-done.download') }}" class="btn btn-primary">
                            <i class="ri-download-2-line align-bottom me-1"></i> Download
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
