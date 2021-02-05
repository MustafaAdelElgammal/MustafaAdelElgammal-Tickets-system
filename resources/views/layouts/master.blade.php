<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="HTML5 Template" />
    <meta name="description" content="Webmin - Bootstrap 4 & Angular 5 Admin Dashboard Template" />
    <meta name="author" content="potenzaglobalsolutions.com" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.css">


    @yield('css')
    @include('layouts.head')
</head>

<body>

    <div class="wrapper" style="font-family: 'Cairo', sans-serif">

        <!--=================================
 preloader -->

        <div id="pre-loader">
            <img src="/assets/images/pre-loader/loader-01.svg" alt="">
        </div>

        <!--=================================
 preloader -->

        @include('layouts.main-header')
        @include('layouts.main-sidebar')

        <!--=================================
 Main content -->
        <!-- main-content -->
        <div class="content-wrapper">

            @yield('page-header')


            @yield('content')

            <!--=================================
 wrapper -->

            <!--=================================
 footer -->

            @include('layouts.footer')
        </div><!-- main content wrapper end-->
    </div>
    </div>
    </div>

    <!--=================================
 footer -->

    @include('layouts.footer-scripts')
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.js"></script>
    <script>
        $(document).ready( function () {
            $('#table_id').DataTable();
        } );
    </script>


</body>

</html>
© 2021 GitHub, Inc.