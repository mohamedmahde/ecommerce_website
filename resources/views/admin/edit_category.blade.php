<!DOCTYPE html>
<html>

<head>
    @include('admin.css')

    <style>
        .tex {
            width: 300px;
            height: 40px;



        }

        .div_deg{

            display: flex;
            justify-content: center;
            align-items: center;
            margin: 30px;

        }
       
     
    </style>
</head>

<body>
    @include('admin.header')



    @include('admin.sidebar')
    <!-- Sidebar Navigation end-->
    <div class="page-content">
        <div class="page-header">
            <h1 style="color: whitesmoke">Edit Category</h1>

            <div class="div_deg">
                <form action="{{ url('upadte_category', $data->id) }}" method="POST">
                    @csrf

                    <div>
                        <input class="tex" type="text" name="category" value="{{ $data->category_name }}">

                        <input class="btn btn-primary" type="submit" value="Update Category">
                    </div>
                </form>

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
