
<!DOCTYPE html>
<html>
<head>
    <title>Monthly Cost Report</title>
    <style>
        body { font-family: Arial, sans-serif; }
        table { width: 100%; border-collapse: collapse; margin-bottom: 20px; }
        th, td { padding: 8px 12px; border: 1px solid #ddd; }
        th { background-color: #f4f4f4; }
        .total { font-weight: bold; text-align: right; }
        .header { margin-bottom: 20px; }
        .align {  text-align: right; }
    </style>
</head>
<body>
    <h2>Monthly Cost Report</h2>

    <div class="header">
        <p><strong>User Name:</strong> {{ Auth::user()->name }}</p>
    </div>

    <table>
        <thead>
            <tr>
                <th>Category</th>
                <th>Cost</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Doctor Cost</td>
                <td class="align">{{ $monthlyCost['doctorCost'] }}</td>
            </tr>
            <tr>
                <td>Pathological Cost</td>
                <td class="align">{{ $monthlyCost['pathoLogical'] }}</td>
            </tr>
            <tr>
                <td>Medication Cost</td>
                <td class="align">{{ $monthlyCost['consumeCost'] }}</td>
            </tr>
            <tr>
                <td>Surgical Cost</td>
                <td class="align">{{ $monthlyCost['surgicalCost'] }}</td>
            </tr>
            <tr>
                <td class="total">Total</td>
                <td class="total">{{ $monthlyCost['doctorCost'] + $monthlyCost['pathoLogical'] + $monthlyCost['consumeCost'] + $monthlyCost['surgicalCost'] }}</td>
            </tr>
        </tbody>
    </table>
</body>
</html>
