<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Report</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
    </style>
</head>
<body>
    <h1>Database Report</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Part Category</th>
                <th>Manufacturer</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($item_name as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->item_name }}</td>
                    <td>{{ $item->item_price }}</td>
                    <td>{{ $item->item_quantity }}</td>
                    <td>{{ $item->category_id }}</td>
                    <td>{{ $item->manufacturer_id }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>