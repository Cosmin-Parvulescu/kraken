<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">

    <title>@yield('title') - @yield('titledetails')</title>

    <!-- Bootstrap core CSS -->
    <link href="/lib/vendor/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Get rid of this shit ASAP -->
    <style>
        ul.nav li.dropdown:hover ul.dropdown-menu {
            display: block;
        }

        .fb-post {
            margin-top: 10px;
            margin-bottom: 10px;
        }

        p {

        }

        body {
            background: url(http://www.splitshire.com/wp-content/uploads/2014/02/SplitShire_blur10.jpg) no-repeat center center fixed #5D2120;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
        }
    </style>
</head>

<body>

<script>
    window.fbAsyncInit = function () {
        FB.init({
            appId: '146547759032054',
            xfbml: true,
            version: 'v2.4'
        });
    };

    (function (d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) {
            return;
        }
        js = d.createElement(s);
        js.id = id;
        js.src = "//connect.facebook.net/en_US/sdk.js";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
</script>

<div class="navbar-wrapper" style="position: absolute; top: 0; left: 0; right: 0; z-index: 10;">
    <div class="container">
        <div class="row">
            @include('navbar')
        </div>
    </div>
</div>

<div class="container" style="margin-top: 60px;">
    <div class="row">
        <div class="col-lg-5">
            @yield('sidebar')
        </div>

        <div class="col-lg-7">
            @yield('content')
        </div>
    </div>

</div>

<div class="container">
    <div class="row">
        <div class="col-lg-12">
            @include('footer')
        </div>
    </div>
</div>
<!-- /.container -->


<!-- Bootstrap core JavaScript
  ================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="/lib/vendor/jquery/dist/jquery.min.js"></script>
<script src="/lib/vendor/bootstrap/dist/js/bootstrap.min.js"></script>

<script src="/lib/vendor/tinymce/tinymce.min.js"></script>
</body>

</html>