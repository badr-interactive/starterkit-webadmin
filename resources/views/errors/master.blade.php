<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>@yield('title')</title>

    <!-- Bootstrap Core CSS -->
    <link href="{{ asset('assets/css/bootstrap.css') }}" rel="stylesheet" />

    <!-- MetisMenu CSS -->
    <link href="{{ asset('assets/css/metisMenu.css') }}" rel="stylesheet" />

    <!-- Custom Fonts -->
    <link href="{{ asset('assets/css/font-awesome.css') }}" rel="stylesheet" />

    <!-- Custom CSS -->
    <link href="{{ asset('assets/css/sb-admin-2.css') }}" rel="stylesheet" />

    <style type="text/css">
        .error {
          margin: 0 auto;
          text-align: center;
        }

        .error-code {
          bottom: 60%;
          color: #2d353c;
          font-size: 96px;
          line-height: 100px;
        }

        .error-desc {
          font-size: 12px;
          color: #647788;
        }

        .m-b-10 {
          margin-bottom: 10px!important;
        }

        .m-b-20 {
          margin-bottom: 20px!important;
        }

        .m-t-20 {
          margin-top: 20px!important;
        }
    </style>
</head>
<body>
    <div id="wrapper">
        <div id="page-wrapper">
            @yield('content')
        </div>
    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="{{ asset('assets/js/metisMenu.js') }}"></script>

    <!-- Datatables -->
    <script src="{{ asset('assets/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/js/dataTables.bootstrap.min.js') }}"></script>

    <!-- Custom Theme JavaScript -->
    <script src="{{ asset('assets/js/sb-admin-2.js') }}"></script>

    @yield('script')
</body>
</html>
