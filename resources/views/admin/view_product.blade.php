<!DOCTYPE html>
<html>

<head>
    @include('admin.css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <style>
        .div_deg {

            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 60px;
        }

        .table_deg {
            border: 1px solid greenyellow;

        }

        th {
            background-color: skyblue;
            color: white;
            font-size: 19px;
            font-weight: bold;
            padding: 15px;
        }

        td {

            border: 1px solid skyblue;
            text-align: center;
            color: white
        }
    </style>
</head>

<body>
    @include('admin.header')



    @include('admin.sidebar')
    <!-- Sidebar Navigation end-->
    <div class="page-content">
        <div class="page-header">

            <div class="div_deg">
                <table class="table_deg">
                    <tr>
                        <th>Prodect Tite</th>
                        <th>Description</th>
                        <th>Category</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Image</th>
                    </tr>
                    @foreach ($product as $products)
                        <tr>
                            <td>{{ $products->title }}</td>
                            <td>{!! Str::words($products->descripton,20) !!}</td>
                            <td>{{ $products->category }}</td>
                            <td>{{ $products->price }}</td>
                            <td>{{ $products->quantity }}</td>
                            <td>
                                <img height="120" width="120" src="products/{{ $products->image }}" alt="">
                            </td>
                        </tr>
                    @endforeach


                </table>
            </div>
            <div class="div_deg">
                {{ $product->onEachSide(1)->links() }}

            </div>

        </div>
    </div>
    </div>
    <!-- JavaScript files-->
    <script src="{{ asset('admincss/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('admincss/vendor/popper.js/umd/popper.min.js') }}"></script>
    <script src="{{ asset('admincss/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('admincss/vendor/jquery.cookie/jquery.cookie.js') }}"></script>
    <script src="{{ asset('admincss/vendor/chart.js/Chart.min.js') }}"></script>
    <script src="{{ asset('admincss/vendor/jquery-validation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('admincss/js/charts-home.js') }}"></script>
    <script src="{{ asset('admincss/js/front.js') }}"></script>
</body>

</html>
