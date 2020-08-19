<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title') | Restaurant Admin</title>
    <link rel="shortcut icon" href="{{ asset('asset/front/img/logo.png') }}" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">
    <link rel="stylesheet" type="text/css" media="screen" href="{{ asset('asset/front/css/style.css') }}"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>
<body>
<!-- nav section -->

@include('layout.restaurant.lib.navbar')

<!-- side menu -->
@include('layout.restaurant.lib.sidebar')

<!-- app content -->
@yield('content')


@include('layout.restaurant.lib.footer')
@stack('extra-js')
</body>
</html>
