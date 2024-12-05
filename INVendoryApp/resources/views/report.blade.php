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
        h2 {
            font-size: 20px;
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
                <th>Category</th>
                <th>Manufacturer</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($items as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->item_name }}</td>
                    <td>${{ number_format($item->item_price, 2) }}</td>
                    <td>{{ $item->item_quantity }}</td>
                    <td>{{ $item->category->name }}</td>
                    <td>{{ $item->manufacturer->name }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <h2>Total Price:  ${{ number_format($total_price, 2) }}</h2>
</body>
</html>