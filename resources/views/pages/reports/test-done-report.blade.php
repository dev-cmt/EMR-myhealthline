<x-app-layout>
    @php
        $userId = Auth::user()->id;
    @endphp
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">General Report</h4>
                </div>

                {{-- <div class="card-body">
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

                        </div>
                    </form>
                </div> --}}
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
                        <a href="{{ route('doctor-visit.download', Auth::user()->id) }}" class="btn btn-primary"><i class="ri-download-2-line align-bottom me-1"></i> Download</a>
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
                        <a href="{{ route('doctor-cost.download',Auth::user()->id) }}" class="btn btn-primary"><i class="ri-download-2-line align-bottom me-1"></i> Download</a>
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
                        <a href="{{ route('medicine.download', Auth::user()->id) }}" class="btn btn-primary"><i class="ri-download-2-line align-bottom me-1"></i> Download</a>
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
                        <a href="{{ route('antibiotic.download', Auth::user()->id) }}" class="btn btn-primary"><i class="ri-download-2-line align-bottom me-1"></i> Download</a>
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
                        <a href="{{ route('test-done.download', Auth::user()->id) }}" class="btn btn-primary">
                            <i class="ri-download-2-line align-bottom me-1"></i> Download
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-4 col-md-4 col-sm-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">Pathological Examinations Cost</h4>
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <a href="{{ route('pathological.download', Auth::user()->id) }}" class="btn btn-primary"><i class="ri-download-2-line align-bottom me-1"></i> Download</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Item -->
        <div class="col-xl-4 col-md-4 col-sm-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">Medicines Consumed Cost </h4>
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <a href="{{ route('consume-cost.download', Auth::user()->id) }}" class="btn btn-primary"><i class="ri-download-2-line align-bottom me-1"></i> Download</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-md-4 col-sm-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">Surgical Interventions Cost </h4>
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <a href="{{ route('surgical-cost.download', Auth::user()->id) }}" class="btn btn-primary">
                            <i class="ri-download-2-line align-bottom me-1"></i> Download
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-4 col-md-4 col-sm-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">Cost Per Year</h4>
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <a href="{{ route('cost-per-year.download', Auth::user()->id) }}" class="btn btn-primary"><i class="ri-download-2-line align-bottom me-1"></i> Download</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Item -->
        <div class="col-xl-4 col-md-4 col-sm-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">Cost Per Month </h4>
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <a href="{{ route('cost-per-month.download', Auth::user()->id) }}" class="btn btn-primary"><i class="ri-download-2-line align-bottom me-1"></i> Download</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-md-4 col-sm-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">Vaccination Record </h4>
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <a href="{{ route('vaccination-record.download', Auth::user()->id) }}" class="btn btn-primary">
                            <i class="ri-download-2-line align-bottom me-1"></i> Download
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-md-4 col-sm-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">Years Record</h4>
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <a href="{{route('years-record.report', $userId)}}" class="btn btn-primary">
                            <i class="ri-download-2-line align-bottom me-1"></i> 2 years
                        </a>
                        <a href="{{route('years-record.report', $userId)}}" class="btn btn-primary">
                            <i class="ri-download-2-line align-bottom me-1"></i> 3 years
                        </a>
                        <a href="{{route('years-record.report', $userId)}}" class="btn btn-primary">
                            <i class="ri-download-2-line align-bottom me-1"></i> 5 years
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
