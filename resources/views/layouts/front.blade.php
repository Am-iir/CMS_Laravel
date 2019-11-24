<!DOCTYPE html>
<html lang="en">
<head>
    <title>{{ config('app.name', 'Laravel') }}</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <link href="https://fonts.googleapis.com/css?family=Muli:300,400,700|Playfair+Display:400,700,900" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('theme/front/fonts/icomoon/style.css')}}">
    <link rel="stylesheet" href="{{asset('theme/front/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('theme/front/css/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{asset('theme/front/css/jquery-ui.css')}}">
    <link rel="stylesheet" href="{{asset('theme/front/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('theme/front/css/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{asset('theme/front/css/bootstrap-datepicker.css')}}">
    <link rel="stylesheet" href="{{asset('theme/front/fonts/flaticon/font/flaticon.css')}}">
    <link rel="stylesheet" href="{{asset('theme/front/css/aos.css')}}">

    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">


    <link rel="stylesheet" href="{{asset('theme/front/css/style.css')}}">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>

<div class="site-wrap">


    @include('layouts._front.nav')

    @yield('content')

    @include('layouts._front.subscribe')

    @include('layouts._front.footer')

</div>

<script src="{{ asset('js/app.js') }}" defer></script>

<script src="{{asset('theme/front/js/jquery-3.3.1.min.js')}}"></script>
<script src="{{asset('theme/front/js/jquery-migrate-3.0.1.min.js')}}"></script>
<script src="{{asset('theme/front/js/jquery-ui.js')}}"></script>
<script src="{{asset('theme/front/js/popper.min.js')}}"></script>
<script src="{{asset('theme/front/js/bootstrap.min.js')}}"></script>
<script src="{{asset('theme/front/js/owl.carousel.min.js')}}"></script>
<script src="{{asset('theme/front/js/jquery.stellar.min.js')}}"></script>
<script src="{{asset('theme/front/js/jquery.countdown.min.js')}}"></script>
<script src="{{asset('theme/front/js/jquery.magnific-popup.min.js')}}"></script>
<script src="{{asset('theme/front/js/bootstrap-datepicker.min.js')}}"></script>
<script src="{{asset('theme/front/js/aos.js')}}"></script>

<script src="{{asset('theme/front/js/main.js')}}"></script>


</body>
</html>
