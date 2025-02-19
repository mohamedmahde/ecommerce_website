<!DOCTYPE html>
<html>

<head>
    @include('home.css')
    <style>
        .dev_deg {

            display: flex;
            justify-content: center;
            align-items: center;
            margin: 60px;
        }

        table {
            border: 2px solid black;
            text-align: center;
            width: 800px;
        }

        th {
            border: 2px solid black;
            text-align: center;
            color: white;
            font: 20px;
            font-weight: bold;
            background-color: black;
        }

        td {

            border: 1px solid skyblue;
        }
    </style>
</head>

<body>
    <div class="hero_area">
        @include('home.header')




        <div class="dev_deg">
            <table>
                <tr>
                    <th>Title</th>
                    <th>Price</th>
                    <th>Image</th>
                </tr>
                @foreach ($cart as $cart)
                    <tr>
                        <td>{{ $cart->product->title }}</td>
                        <td>{{ $cart->product->price }}</td>
                        <td><img width="150" src="/products/{{ $cart->product->image }}"></td>
                    </tr>
                @endforeach
            </table>

        </div>


        @include('home.footer')

</body>

</html>
