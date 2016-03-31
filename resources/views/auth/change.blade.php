<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Fruit About - Reset Password</title>

    <!-- Bootstrap Core CSS -->
    <link href="{{ asset('assets/css/bootstrap.css') }}" rel="stylesheet" />

    <!-- MetisMenu CSS -->
    <link href="{{ asset('assets/css/metisMenu.css') }}" rel="stylesheet" />

    <!-- Custom CSS -->
    <link href="{{ asset('assets/css/sb-admin-2.css') }}" rel="stylesheet" />

    <!-- Custom Fonts -->
    <link href="{{ asset('assets/css/font-awesome.css') }}" rel="stylesheet" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Change Password</h3>
                    </div>
                    <div class="panel-body">
                        <form role="form" action="{{ route('app.change_password') }}" method="POST">
                            <input type="hidden" name="_token" value="{{ Session::token() }}" />
                            <input type="hidden" name="uuid" value="{{ $uuid }}" />
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="New Password" name="password" type="password" autofocus />
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Confirm Password" name="password_confirm" type="password" />
                                </div>
                                <!-- Change this to a button or input when using this as a form -->
                                <button type="submit" class="btn btn-lg btn-success btn-block">Save</a>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="{{ asset('assets/js/metisMenu.js') }}"></script>

    <!-- Custom Theme JavaScript -->
    <script src="{{ asset('assets/js/sb-admin-2.js') }}"></script>

</body>
</html>
