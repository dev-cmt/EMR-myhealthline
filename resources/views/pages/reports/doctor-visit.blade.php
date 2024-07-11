<!DOCTYPE html>
<html>
<head>
    <title>Medicines Consumed Report</title>
    <style>
        body { font-family: Arial, sans-serif; }
        table { width: 100%; border-collapse: collapse; }
        th, td { padding: 8px 12px; border: 1px solid #ddd; }
        th { background-color: #f4f4f4; }
        .header { margin-bottom: 20px; }
    </style>
</head>
<body>
    <h2>Medicines Consumed Report</h2>

    <div class="header">
        <p><strong>User Name:</strong> {{ Auth::user()->name }}</p>
    </div>
    <table>
        <thead>
            <tr>
                <th>SL#</th>
                <th>Date</th>
                <th>Physician</th>
                <th>App Type</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($doctorcost as $key => $row)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $row->time_date_tool }}</td>
                    <td>{{ $row->doctorAppointment->full_name }}</td>
                    <td>{{ $row->appointment }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
