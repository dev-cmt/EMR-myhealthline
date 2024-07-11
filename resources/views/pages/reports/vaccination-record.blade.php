<!DOCTYPE html>
<html>
<head>
    <title>Vaccination Record</title>
    <style>
        body { font-family: Arial, sans-serif; }
        table { width: 100%; border-collapse: collapse; margin-bottom: 20px; }
        th, td { padding: 8px 12px; border: 1px solid #ddd; }
        th { background-color: #f4f4f4; }
        .header { margin-bottom: 20px; }
    </style>
</head>
<body>
    <h2>Vaccination Record</h2>

    <div class="header">
        <p><strong>User Name:</strong> {{ $user->name }}</p>
    </div>

    <hr>
    <h3>Section 01 - EPI</h3>
    <!-- VACCINATION RECORD -->
    <div class="row">
        <table class="table table-nowrap table-striped mb-0">
            <thead class="table-light">
                <tr>
                    <th scope="col">#SL</th>
                    <th scope="col">Vaccine Name</th>
                    <th scope="col">Dose 1</th>
                    <th scope="col">Dose 2</th>
                    <th scope="col">Dose 3</th>
                    <th scope="col">Dose 4</th>
                    <th scope="col">Dose 5</th>
                    <th scope="col">Booster</th>
                    {{-- <th scope="col">Document</th> --}}
                </tr>
            </thead>
            <tbody>
                @foreach($vaccination as $row)
                    @if($row->type == 'section one')
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $row->vaccine_name }}</td>
                            <td>{{ $row->dose_01 }}</td>
                            <td>{{ $row->dose_02 }}</td>
                            <td>{{ $row->dose_03 }}</td>
                            <td>{{ $row->dose_04 }}</td>
                            <td>{{ $row->dose_05 }}</td>
                            <td>{{ $row->booster }}</td>
                            {{-- <td>
                                <a href="{{ route('vaccination.download', $row->id) }}" class="btn btn-soft-info btn-sm">
                                    <i class="ri-file-list-3-line align-middle"></i> Download File
                                </a>
                            </td> --}}
                        </tr>
                    @endif
                @endforeach
            </tbody>
        </table>
    </div>

    <hr>
    <h3>Section 02 - Covid-19</h3>
    <!-- VACCINATION RECORD -->
    <div class="row">
        <table class="table table-nowrap table-striped mb-0">
            <thead class="table-light">
                <tr>
                    <th scope="col">Vaccine</th>
                    <th scope="col">Manufacturer</th>
                    <th scope="col">Location</th>
                    <th scope="col">Date</th>
                </tr>
            </thead>
            <tbody>
                @foreach($covidData as $row)
                    <tr>
                        <td>{{ $row->dose_type }}</td>
                        <td>{{ $row->manufacturer }}</td>
                        <td>{{ $row->location }}</td>
                        <td>{{ $row->date }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <hr>
    <h3>Section 03 - Paid Ones</h3>
    <!-- VACCINATION RECORD -->
    <div class="row">
        <table class="table table-nowrap table-striped mb-0">
            <thead class="table-light">
                <tr>
                    <th scope="col">#SL</th>
                    <th scope="col">Market Name</th>
                    <th scope="col">Applicable For</th>
                    <th scope="col">Dose 1</th>
                    <th scope="col">Dose 2</th>
                    <th scope="col">Dose 3</th>
                    <th scope="col">Dose 4</th>
                    <th scope="col">Dose 5</th>
                    <th scope="col">Booster</th>
                </tr>
            </thead>
            <tbody>
                @foreach($vaccination as $row)
                    @if ($row->type == 'section three')
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $row->market_name }}</td>
                            <td>{{ $row->applicable_for }}</td>
                            <td>{{ $row->dose_01 }}</td>
                            <td>{{ $row->dose_02 }}</td>
                            <td>{{ $row->dose_03 }}</td>
                            <td>{{ $row->dose_04 }}</td>
                            <td>{{ $row->dose_05 }}</td>
                            <td>{{ $row->booster }}</td>
                        </tr>
                    @endif
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
