<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title') - Kikothay.com</title>
    <link rel="shortcut icon" href="{{ asset('asset/front/img/logo - favicon.png')}}" type="image/x-icon">
    <!-- bootstrap css -->
    <link rel="stylesheet" href="{{ asset('asset/front/css/bootstrap.min.css') }}">
    <!-- font-awesome css -->
    <link rel="stylesheet" href="{{ asset('asset/front/font-awesome/css/all.css') }}">
    <!-- custom css -->
    <link rel="stylesheet" href="{{ asset('asset/front/css/style.css') }}">
    <!-- google-font css -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:700,800|Roboto:400,500,700&display=swap"
          rel="stylesheet">
</head>
<body>

<!-- navbar start -->
@include('layout.front.lib.navbar')
<!-- navbar end -->

<!-- hero start -->

<!-- hero end -->

{{-- content --}}

@yield('content')
{{--content end--}}

<!-- footer start -->
@include('layout.front.lib.footer')
<!-- footer end -->

<!-- arrow up start -->
<div>
    <i id="arrowUp" onclick="topFunction()" class="far fa-arrow-alt-circle-up"></i>
</div>
<!-- arrow up end -->


<!-- js for bootstrap -->
<script src="{{ asset('asset/front/js/jquery.min.js') }}"></script>
<script src="{{ asset('asset/front/js/popper.min.js') }}"></script>
<script src="{{ asset('asset/front/js/bootstrap.min.js') }}"></script>

<!-- custom js -->
<script src="{{ asset('asset/front/js/script.js') }}"></script>
<?php
$site = \Illuminate\Support\Facades\Cache::get('site_details');
?>
<script async src="https://www.googletagmanager.com/gtag/js?id={{ $site->analytics }}"></script>

@stack('extra-js')
<script>
    $(document).ready(function () {
        setTimeout(function () {
            $('#message').slideUp(600);
        }, 4000);
    });
</script>

</body>
</html>
