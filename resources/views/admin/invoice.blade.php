
<!DOCTYPE html>
<html lang="en">
<head>
    
    <style>
        table {

            border: 2px solid skyblue;
            text-align: center;
        }

        th {
            background-color: skyblue;
            padding: 10px;
            font-size: 18px;
            font-weight: bold;
            text-align: center;
            color: black;
        }

        td {
            color: black;
            padding: 10px;
            border: 1px solid skyblue;
        }

        .table_center {
            display: flex;
            justify-content: center;
            align-items: center;
        }
    </style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div class="table_center">
   <table>
    <tr>
        <th>Customer Name</th>
        <th>Address</th>
        <th>Phone</th>
        <th>Product Title</th>
        <th>Price</th>
        <th>Image</th>
    </tr>
    <tr>
        <td>{{ $data->name }}</td>
        <td>{{ $data->rec_address }}</td>
        <td>{{ $data->phone }}</td>
        <td>{{ $data->product->title }}</td>
        <td>{{ $data->product->price }}</td>
        <td><img width="100" src="products/{{ $data->product->image }}" alt=""></td>

    </tr>
   </table>
</div>

</body>
</html>