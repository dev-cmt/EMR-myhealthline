<!DOCTYPE html>
<html>
<head>
    <title>Test Done Report</title>
    <style>
        body { font-family: Arial, sans-serif; }
        table { width: 100%; border-collapse: collapse; }
        th, td { padding: 8px 12px; border: 1px solid #ddd; }
        th { background-color: #f4f4f4; }
        .header { margin-bottom: 20px; }
        .align {  text-align: right; }
    </style>
</head>
<body>
    <h2>Test Done Report</h2>

    <div class="header">
        <p><strong>User Name:</strong> {{ Auth::user()->name }}</p>
    </div>

    <table>
        <thead>
            <tr>
                <th>SL#</th>
                <th>Date</th>
                <th>Test Name</th>
                <th>Test Type</th>
                <th>Organ</th>
                <th>Cost</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($testDone as $key => $row)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $row->created_at->format('Y-m-d') }}</td>
                    <td>{{ $row->testName->test_name }}</td>
                    <td>{{ $row->type }}</td>
                    <td>{{ $row->organName->organ_name }}</td>
                    <td class="align">{{ $row->cost }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
