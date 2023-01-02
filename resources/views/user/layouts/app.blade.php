<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Aroma Shop - @yield('title')</title>
    <link rel="icon" href="{{ asset('frontend/img/Fevicon.png') }}" type="image/png">
    <link rel="stylesheet" href="{{ asset('frontend/vendors/bootstrap/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/vendors/fontawesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/vendors/themify-icons/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/vendors/nice-select/nice-select.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/vendors/owl-carousel/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/vendors/owl-carousel/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}">

    @yield('style')
</head>
<body>

    @include('user.partials.header')

    <main class="site-main">
        @yield('content')
    </main>

    @include('user.partials.footer')

    <script src="{{ asset('frontend/vendors/jquery/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('frontend/vendors/bootstrap/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('frontend/vendors/skrollr.min.js') }}"></script>
    <script src="{{ asset('frontend/vendors/owl-carousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('frontend/vendors/nice-select/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('frontend/vendors/jquery.ajaxchimp.min.js') }}"></script>
    <script src="{{ asset('frontend/vendors/mail-script.js') }}"></script>
    <script src="{{ asset('frontend/js/main.js') }}"></script>

    @yield('js')
</body>
</html>