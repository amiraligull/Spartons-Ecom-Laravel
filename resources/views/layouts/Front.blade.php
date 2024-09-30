<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Spartons Care- Online Store') }}</title>
    <!-- #keywords -->
    <meta name="keywords" content="Spartons Care">
    <!-- #description -->
    <meta name="description" content="Spartons Care">
    <!-- ==== css dependencies start ==== -->
    <!-- Favicon -->
    <link rel="icon" href="{{ asset('assets/front/images/favicon.png') }}" type="image/x-icon">
    <!-- Google Font Outfit -->
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin="">
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100..900&display=swap" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/front/css/vendors/fontawesome.css') }}">
    <!-- Iconsax Icon -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/front/css/vendors/iconsax.css') }}">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" id="rtl-link" href="{{ asset('assets/front/css/vendors/bootstrap.css') }}">
    <!-- Swiper Slider -->
    <link rel="stylesheet" type="text/css"
        href="{{ asset('assets/front/css/vendors/swiper-slider/swiper-bundle.min.css') }}">
    <!-- Toastify -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/front/css/vendors/toastify.css') }}">
    <!-- Custom Styles -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/front/css/style.css') }}">
    <!-- Scripts -->
    <script defer src="{{ asset('assets/front/css/landing_page.js') }}"></script>
    <script defer src="{{ asset('assets/front/css/style.js') }}"></script>
    <!-- Landing Page and Style CSS -->
    <link href="{{ asset('assets/front/css/landing_page.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/front/css/style.css') }}" rel="stylesheet">
</head>

<body class="skeleton_body">

    @include('Front.partials.header')
    <div class="main">
        @yield('content')
    </div>
    @include('Front.partials.footer')
</body>

</html>