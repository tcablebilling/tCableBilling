<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Cable TV Network Accounting</title>

    <!-- Bootstrap core CSS -->

    <link href="{{ URL::asset('css/bootstrap.min.css') }}" rel="stylesheet">

    <link href="{{ URL::asset('fonts/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('css/animate.min.css') }}" rel="stylesheet">

    <!-- Custom styling plus plugins -->
    <link href="{{ URL::asset('css/icheck/flat/green.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('css/datatables/tools/css/dataTables.tableTools.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('css/select/select2.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('css/custom.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('css/jquery-ui.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('css/jquery-ui.structure.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('css/jquery-ui.theme.min.css') }}" rel="stylesheet">

    <script src="{{ URL::asset('js/jquery.min.js') }}"></script>
    <script src="{{ URL::asset('js/jquery-ui.js') }}"></script>

    <!--[if lt IE 9]>
    <script src="../assets/js/ie8-responsive-file-warning.js"></script>
    <![endif]-->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>


<body class="nav-md">

<div class="container body">


    <div class="main_container">

        <div class="col-md-3 left_col">
            <div class="left_col scroll-view">

                @include('partials._sidebar')

            </div>
        </div>

        @include('partials._topnav')
        <!-- page content -->
        <div class="right_col" role="main">
        @yield('content')
            <!-- footer content -->
            <footer class="footer">
                <div class="">
                    <p class="pull-right"><span class="lead">tCableBilling<span id="reg">&reg;</span></span> is an automated cable network billing system. Developed by <a>Khan Mohammad Rashedun-Naby</a>. |
                        <span class="lead"> <i class="fa fa-paw"></i> tCableBilling<span id="reg">&reg;</span></span>
                    </p>
                </div>
                <div class="clearfix"></div>
            </footer>
            <!-- /footer content -->

        </div>
        <!-- /page content -->
    </div>

</div>

<div id="custom_notifications" class="custom-notifications dsp_none">
    <ul class="list-unstyled notifications clearfix" data-tabbed_notifications="notif-group">
    </ul>
    <div class="clearfix"></div>
    <div id="notif-group" class="tabbed_notifications"></div>
</div>

@include('partials._scripts')
</body>

</html>
