<!DOCTYPE HTML>
<html class="full" lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <title>Nudigo Travel Happy</title>


    <meta content="text/html;charset=utf-8" http-equiv="Content-Type">
    <meta name="keywords" content="Template, html, premium, themeforest"/>
    <meta name="description" content="Traveler - Premium template for travel companies">
    <meta name="author" content="Tsoy">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- GOOGLE FONTS -->
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,400,300,600' rel='stylesheet'
          type='text/css'>
    <!-- /GOOGLE FONTS -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{ asset('css/all.min.css')}}">
    <link rel="stylesheet" href="{{ asset('css/icomoon.css')}}">
    <link rel="stylesheet" href="{{ asset('css/font-awesome.css')}}">
    <link rel="stylesheet" href="{{ asset('css/styles.css')}}">
    <link rel="stylesheet" href="{{ asset('css/mystyles.css?v=1.3')}}">
    <script type="text/javascript" src="{{ asset('js/modernizr.js')}}"></script>


</head>

<body class="full">

<!-- FACEBOOK WIDGET -->
<div id="fb-root"></div>
<script>
    (function (d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s);
        js.id = id;
        js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.0";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
</script>
<!-- /FACEBOOK WIDGET -->
<div class="global-wrap">

    <div class="full-page text-center">
        <div class="bg-holder full">
            <!-- <div class="bg-mask-darken"></div> -->
            <div class="bg-img" style="background-image:url({{ asset('img/1024x487.png') }});"></div>
            <div class="bg-holder-content full">
                <a class="logo-holder" href="{{url('/')}}">
                    <img src="{{ asset('img/logo.png') }}" alt="Nudigo Travel Happy" title="Nudigo"/>
                </a>
                <div class="full-center">
                    <div class="container">
                        <h2>Travel Happy starts NOW!</h2>
                        <div class="gap"></div>
                        <div class="row">
                            <div class="col-md-4 col-md-offset-4">
                                {{--<div class="btn btn-primary"><a style="color: white;" href="http://travelhappy.nudigo.com">SEARCH FLIGHTS</a></div>--}}
                                {{--<br><br>--}}
                                <div class="btn btn-primary" data-toggle="modal" data-target="#modal-4">Team Login</div>
                                <br><br>
                                {{--<div class="btn btn-primary" data-toggle="modal" data-target="#modal-5">REGISTER</div>--}}
                                {{--<br><br>--}}
                            </div>
                        </div>
                    </div>
                </div>
                <!-- <ul class="list footer-social">
                    <li>
                        <a class="fa fa-facebook round box-icon-normal animate-icon-bounce" href="#"></a>
                    </li>
                    <li>
                        <a class="fa fa-twitter round box-icon-normal animate-icon-bounce" href="#"></a>
                    </li>
                    <li>
                        <a class="fa fa-dribbble round box-icon-normal animate-icon-bounce" href="#"></a>
                    </li>
                    <li>
                        <a class="fa fa-linkedin round box-icon-normal animate-icon-bounce" href="#"></a>
                    </li>
                    <li>
                        <a class="fa fa-pinterest round box-icon-normal animate-icon-bounce" href="#"></a>
                    </li>
                </ul> -->
            </div>
        </div>
    </div>
    <!-- Modal Login -->
    <div class="modal fade" id="modal-4" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form class="" id="login-form"  method="POST">
                    {{ csrf_field() }}
                    <input type="hidden" id="action_login" value="{{ route('team.login') }}">
                    <div class="modal-header">
                        <h5 class="modal-title text-center" id="exampleModalLabel">Login</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">


                        <div class="row">

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input id="email-login" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>
                                    <span class="invalid-feedback" role="alert" id="email_error_login"></span>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Password</label>
                                    <input id="password-login" type="password" class="form-control" name="password" required>
                                    <input id="user_type" value="2" type="hidden" class="form-control" name="user_type" >

                                </div>
                            </div>

                        </div>
                    {{--<input class="btn btn-primary" type="submit" value="Save Passenger" />--}}

                    <!-- <h5 class="text-center">Brisbane to Auckland</h5><br>
                    <h5 class="text-center">BNE-AKL  | Flight: NZ234</h5><br>
                    <h5 class="text-center">Terminal 1</h5> -->
                    </div>
                    <div class="modal-footer">
                        {{--<button type="submit" class="btn btn-secondary" >Close</button>--}}
                        <div class="text-center">
                            <button id="signin" type="submit" class="btn btn-primary">Login</button>
                        </div>
                    </div>
                    {{--<h3 class="mb0">Signup</h3>--}}
                </form>


            </div>
        </div>
    </div>


    <div id="loader"><h5>Authenticating Please Wait...</h5></div>

    <script type="text/javascript">

        var base_url = "{{url('/')}}";

    </script>


    <script type="text/javascript" src="{{ asset('js/jquery.js')}}"></script>
    <script type="text/javascript" src="{{ asset('js/bootstrap.js')}}"></script>
    <script type="text/javascript" src="{{ asset('js/ajax.js')}}"></script>
</div>
</body>

</html>


