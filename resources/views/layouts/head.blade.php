
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="{{ asset('assets/img/fav.png') }}" />

    <!-- Title -->
    <title>
        Auto Garage | @yield('title')
    </title>
    <!-- begin::global styles -->
    <link rel="stylesheet" href="{{ asset('assets/vendors/bundle.css') }}" type="text/css">
    <!-- end::global styles -->

    <!-- begin::datepicker -->
    <link rel="stylesheet" href="{{ asset('assets/vendors/datepicker/daterangepicker.css') }}" type="text/css">
    <!-- begin::datepicker -->

    <!-- begin::vmap -->
    <link rel="stylesheet" href="{{ asset('assets/vendors/vmap/jqvmap.min.css') }}" type="text/css">
    <!-- begin::vmap -->

    <!-- begin::custom styles -->
    <link rel="stylesheet" href="{{ asset('assets/css/app.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}" type="text/css">
    <!-- end::custom styles -->
    <link rel="stylesheet" href="{{ asset('font-awesome/css/font-awesome.css') }}">
    <link rel="stylesheet" href="{{ asset('themify-icons/themify-icons.css') }}">

    @yield('header_styles')

</head>
