<!DOCTYPE html>
<html>
<head>
    <title>Test Done Report</title>
    <style>
        body { font-family: Arial, sans-serif; }
        table { width: 100%; border-collapse: collapse; }
        th, td { padding: 8px 12px; border: 1px solid #ddd; }
        th { background-color: #f4f4f4; }
    </style>
</head>
<body>
    <h2>Medicines Consumed Report</h2>
    <table>
        <thead>
            <tr>
                <th>SL#</th>
                <th>Equipment</th>
                <th>Name</th>
                <th>Power</th>
                <th>Duration</th>
                <th>Timing</th>
                <th>Cost</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($antibiotic as $key => $row)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $row->equipment->name }}</td>
                    <td>{{ $row->full_name }}</td>
                    <td>{{ $row->power->name }}</td>
                    <td>{{ $row->duration }}</td>
                    <td>{{ $row->timing }}</td>
                    <td>{{ $row->cost }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
