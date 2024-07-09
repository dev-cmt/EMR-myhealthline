<!DOCTYPE html>
<html>
<head>
    <title>Doctor Cost Report</title>
    <style>
        body { font-family: Arial, sans-serif; }
        table { width: 100%; border-collapse: collapse; }
        th, td { padding: 8px 12px; border: 1px solid #ddd; }
        th { background-color: #f4f4f4; }
    </style>
</head>
<body>
    <h2>Doctor Cost Report</h2>
    <table>
        <thead>
            <tr>
                <th>SL#</th>
                <th>Date</th>
                <th>Physician</th>
                <th>App Type</th>
                <th>Cost</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($doctorcost as $key => $row)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $row->time_date_tool }}</td>
                    <td>{{ $row->doctorAppointment->full_name }}</td>
                    <td>{{ $row->appointment }}</td>
                    <td>{{ $row->fee }}</td>
                </tr>
            @endforeach
            <tr>
                <td colspan="4" style="text-align: right;"><strong>Total:</strong></td>
                <td><strong>{{ $totalFee }}</strong></td>
            </tr>
        </tbody>
    </table>
</body>
</html>
