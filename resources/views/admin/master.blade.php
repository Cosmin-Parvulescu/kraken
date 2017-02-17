<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title') - @yield('titledetails')</title>

    <!-- Bootstrap core CSS -->
    <link href="/lib/vendor/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>

<div class="container-fluid">
    <div class="row">
        <ol class="breadcrumb">
            @yield('breadcrumbs')
        </ol>
    </div>
</div>

<div class="container-fluid">

    @yield('content')

</div>

<script src="/lib/vendor/jquery/dist/jquery.min.js"></script>
<script src="/lib/vendor/bootstrap/dist/js/bootstrap.min.js"></script>

<script src="/lib/vendor/tinymce/tinymce.min.js"></script>

<script>
    $(function () {
        tinymce.init({
            selector: "textarea",
            plugins: [
                "advlist autolink lists link image charmap print preview anchor",
                "searchreplace visualblocks code fullscreen",
                "insertdatetime media table contextmenu paste"
            ],
            toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
        });

        @yield('footerscript')


    });
</script>
</body>

</html>