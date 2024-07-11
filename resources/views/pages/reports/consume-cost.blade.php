<!DOCTYPE html>
<html>
<head>
    <title>Doctor Cost Report</title>
    <style>
        body { font-family: Arial, sans-serif; }
        table { width: 100%; border-collapse: collapse; }
        th, td { padding: 8px 12px; border: 1px solid #ddd; }
        th { background-color: #f4f4f4; }
        .header { margin-bottom: 20px; }
        .total { font-weight: bold; text-align: right; }
        .align { text-align: right; }
    </style>
</head>
<body>
    <h2>Medicines Consumed Cost Report</h2>

    <div class="header">
        <p><strong>User Name:</strong> {{ Auth::user()->name }}</p>
    </div>

    <table>
        <thead>
            <tr>
                <th>SL#</th>
                <th>Date</th>
                <th>Full Name</th>
                <th>Power</th>
                <th>Duration</th>
                <th>Cost</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($consume as $key => $row)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $row->created_at->format('Y-m-d') }}</td>
                    <td>{{ $row->full_name }}</td>
                    <td>{{ $row->power->name }}</td>
                    <td>{{ $row->duration }}</td>
                    <td class="align">{{ $row->cost }}</td>
                </tr>
            @endforeach
            <tr>
                <td colspan="5" style="text-align: right;"><strong>Total:</strong></td>
                <td class="total"><strong>{{ $totalFee }}</strong></td>
            </tr>
        </tbody>
    </table>
</body>
</html>
