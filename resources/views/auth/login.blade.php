<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Cable TV Accounting !</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset("/css/bootstrap.min.css") }}" rel="stylesheet">

    <link href="{{ asset("/fonts/css/font-awesome.min.css") }}" rel="stylesheet">

    <!-- Custom styling plus plugins -->
    <link href="{{ asset("/css/custom.css") }}" rel="stylesheet">
    <link href="{{ asset("/css/icheck/flat/green.css") }}" rel="stylesheet">


    <script src="{{ asset("/js/jquery.min.js") }}"></script>

    <!--[if lt IE 9]>
        <script src="../assets/js/ie8-responsive-file-warning.js"></script>
        <![endif]-->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

</head>

<body style="background:#F7F7F7;">

    <div class="">
        <a class="hiddenanchor" id="toregister"></a>
        <a class="hiddenanchor" id="tologin"></a>

        <div id="wrapper">
            <div id="login" class="animate form">
                <section class="login_content">
                    <form method="POST" action="/login">
                        {!! csrf_field() !!}
                        <h1>Please Login</h1>
                        <div>
                            <input type="text" class="form-control" placeholder="Username" name="username" required="" />
                        </div>
                        <div>
                            <input type="password" class="form-control" placeholder="Password" name="password" required="" />
                        </div>
                        <div>
                            <button type="submit" class="btn btn-default submit pull-left">Log in</button>
                            <div class="pull-left remember">
                                <input type="checkbox" name="remember"> <div class="remember-text">Remember Me</div>
                            </div>
                            <a class="reset_pass pull-right" href="#">Lost your password?</a>
                        </div>
                        <div class="clearfix"></div>
                        <div class="separator">
                            <div>
                                <h1><i class="fa fa-globe" style="font-size: 26px;"></i> Cable TV Accounting !</h1>

                                <p>©2015 All Rights Reserved.</p>
                            </div>
                        </div>
                    </form>
                    <!-- form -->
                    @if(count($errors)>0)
                        <div class="alert alert-danger login-error">
                                @foreach($errors->all() as $error)
                                    <p>{{$error}}</p>
                                @endforeach
                        </div>
                    @endif
                </section>
                <!-- content -->
            </div>
        </div>
    </div>

</body>

</html>
