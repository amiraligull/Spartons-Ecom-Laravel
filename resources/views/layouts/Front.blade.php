<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- #favicon -->
    <link rel="shortcut icon" href="{{asset('assets/front/images/fav.png')}}" type="image/x-icon">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Hustle | Hustle Club') }}</title>
      <!-- #keywords -->
    <meta name="keywords" content="Baskitball, Hustle">
    <!-- #description -->
    <meta name="description" content="Hustle Club">

    <!-- ==== css dependencies start ==== -->
 <!-- Bootstrap 5 CSS -->
<link rel="stylesheet" href="{{ asset('assets/front/vendor/bootstrap/css/bootstrap.min.css') }}">
<!-- Font Awesome 6 CSS -->
<link rel="stylesheet" href="{{ asset('assets/front/vendor/font-awesome/css/all.min.css') }}">
<!-- Glyphter CSS -->
<link rel="stylesheet" href="{{ asset('assets/front/vendor/glyphter/css/golftio.css') }}">
<!-- Nice Select CSS -->
<link rel="stylesheet" href="{{ asset('assets/front/vendor/nice-select/css/nice-select.css') }}">
<!-- Magnific Popup CSS -->
<link rel="stylesheet" href="{{ asset('assets/front/vendor/magnific-popup/css/magnific-popup.css') }}">
<!-- Slick CSS -->
<link rel="stylesheet" href="{{ asset('assets/front/vendor/slick/css/slick.css') }}">
<!-- Odometer CSS -->
<link rel="stylesheet" href="{{ asset('assets/front/vendor/odometer/css/odometer.css') }}">
<!-- jQuery UI CSS -->
<link rel="stylesheet" href="{{ asset('assets/front/vendor/jquery-ui/jquery-ui.min.css') }}">
<!-- Animate CSS -->
<link rel="stylesheet" href="{{ asset('assets/front/vendor/animate/animate.css') }}">
    <!-- main css -->
<link rel="stylesheet" href="{{ asset('assets/front/css/main.css') }}">
</head>
<body>
    
@include('Front.partials.header')
<div class="main">
    @yield('content')
</div>
@include('Front.partials.footer')
</body>
</html>
