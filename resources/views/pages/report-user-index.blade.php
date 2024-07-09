<x-app-layout>
    @php
        $userId = Auth::user()->id;
    @endphp
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">Reports List </h4>
                </div>
            </div>
        </div>
        
        <!-- Item 1-->
        <div class="col-xl-3 col-md-4 col-sm-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">Complete Health Profile </h4>
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        {{-- <a href="javascript:window.print()" class="btn btn-success"><i class="ri-printer-line align-bottom me-1"></i> Print</a> --}}
                        <a href="{{route('complete-profile.report', $userId)}}" class="btn btn-primary"><i class="ri-download-2-line align-bottom me-1"></i> Download</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Item 2-->
        <div class="col-xl-3 col-md-4 col-sm-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">Disease Specific Report </h4>
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <a href="javascript:void(0);" class="btn btn-primary"><i class="ri-download-2-line align-bottom me-1"></i> Download</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Item 3-->
        <div class="col-xl-4 col-md-4 col-sm-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">Physicians/Doctors visited </h4>
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <a href="{{ route('doctor-visit.report') }}" class="btn btn-primary"><i class="ri-download-2-line align-bottom me-1"></i> Download</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Item 4-->
        <div class="col-xl-4 col-md-4 col-sm-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">Medicines Consumed </h4>
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <a href="{{ route('medicine-list.report') }}" class="btn btn-primary"><i class="ri-download-2-line align-bottom me-1"></i> Download</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Item 5-->
        <div class="col-xl-4 col-md-4 col-sm-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">Antibiotics Consumed </h4>
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <a href="{{ route('antibiotic-cost.report') }}" class="btn btn-primary"><i class="ri-download-2-line align-bottom me-1"></i> Download</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Item 6-->
        <div class="col-xl-4 col-md-4 col-sm-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">Tests Done </h4>
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <a href="{{ route('test-done.report') }}" class="btn btn-primary">
                            <i class="ri-download-2-line align-bottom me-1"></i> Download
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Item 7-->
        <div class="col-xl-4 col-md-4 col-sm-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">Cost of Doctor's Consultation </h4>
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <a href="{{ route('doctor-cost.report') }}" class="btn btn-primary"><i class="ri-download-2-line align-bottom me-1"></i> Download</a>
                    </div>
                </div>
            </div>
        </div>


    </div>
</x-app-layout>