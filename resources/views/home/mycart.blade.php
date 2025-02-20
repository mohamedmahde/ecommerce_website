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
        .cart_vlaue{

            text-align: center;
            margin-bottom: 50px;
            padding: 50px;
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
                    <th>Action</th>
                </tr>
                <?php
                $value = 0 ;


                ?>
                @foreach ($cart as $cart)
                    <tr>
                        <td>{{ $cart->product->title }}</td>
                        <td>{{ $cart->product->price }}</td>
                        <td><img width="150" src="/products/{{ $cart->product->image }}"></td>
                        {{-- <td><a href="{{ url('delete_cart' , $cart->id) }}"></a></td> --}}
                    </tr>
                @endforeach


                <?php
                $value =  $value +  $cart->product->price;


                ?>
            </table>

        </div>
        <div class="cart_vlaue">
            <h3>Total Value of cart is: {{ $value  }}LYD </h3>
        </div>


        @include('home.footer')

</body>

</html>
