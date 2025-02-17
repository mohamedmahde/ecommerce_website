<!DOCTYPE html>
<html>

<head>
    @include('admin.css')

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
                        <th>Delete</th>
                    </tr>
                    @foreach ($product as $products)
                        <tr>
                            <td>{{ $products->title }}</td>
                            <td>{!! Str::limit($products->descripton,20) !!}</td>
                            <td>{{ $products->category }}</td>
                            <td>{{ $products->price }}</td>
                            <td>{{ $products->quantity }}</td>
                            <td>
                                <img height="120" width="120" src="products/{{ $products->image }}" alt="">
                            </td>

                            <td><a class="btn btn-danger" onclick="confirmation(event)" href="{{ url('delete_product' , $products->id) }}">Delete</a></td>
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
    <script>
        function confirmation(ev) {
    ev.preventDefault();

    var urlToRedirect = ev.currentTarget.getAttribute('href');
    
    console.log(urlToRedirect);

    swal({
        title: "Are you sure you want to delete this?",
        text: "The deletion will be permanent.",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    })
    .then((willDelete) => {
        if (willDelete) {
            window.location.href = urlToRedirect;
        }
    });
}
    </script>
    <!-- JavaScript files-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

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
