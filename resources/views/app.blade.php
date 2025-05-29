<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf-token" content="{{ csrf_token() }}">
        <title inertia>{{ config('app.name', 'Laravel') }}</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <!-- Bootstrap CSS -->
     <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
     <!-- Bootstrap Icon CSS -->
     <link href="{{ asset('assets/css/bootstrap-icons.css') }}" rel="stylesheet">
     <!-- Fontawesome all CSS -->
     <link href="{{ asset('assets/css/all.min.css') }}" rel="stylesheet">
     <link href="{{ asset('assets/css/nice-select.css') }}" rel="stylesheet">
     <link href="{{ asset('assets/css/animate.min.css') }}" rel="stylesheet">
     <!--  FancyBox CSS  -->
     <link rel="stylesheet" href="{{ asset('assets/css/jquery.fancybox.min.css') }}">
 
     <!-- Fontawesome CSS -->
     <link href="{{ asset('assets/css/fontawesome.min.css') }}" rel="stylesheet">
     <!-- box icon css -->
     <link rel="stylesheet" href="{{ asset('assets/css/boxicons.min.css') }}">
     <!-- slider CSS -->
     <link rel="stylesheet" href="{{ asset('assets/css/swiper-bundle.min.css') }}">
     <link rel="stylesheet" href="{{ asset('assets/css/slick-theme.css') }}">
     <link rel="stylesheet" href="{{ asset('assets/css/slick.css') }}">
     <!--  Style CSS  -->
     <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <title>NanoEssence</title>
    <link rel="icon" href="{{ asset('assets/img/sm-logo.svg" type="image/gif') }}">
        <!-- Scripts -->
        @routes
        @vite(['resources/js/app.js', "resources/js/Pages/{$page['component']}.vue"])
        @inertiaHead
    </head>
    <body class="font-sans antialiased style-2">
        @inertia
      
    
<!--  Main jQuery  -->
<script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script src="{{ asset('assets/js/jquery-3.6.0.min.js')}}"></script>
<!-- Popper and Bootstrap JS -->
<script src="{{ asset('assets/js/popper.min.js')}}"></script>
<script src="{{ asset('assets/js/jquery.nice-select.min.js')}}"></script>
<!-- Fancybox JS -->
<script src="{{ asset('assets/js/jquery.fancybox.min.js')}}"></script>
<script src="{{ asset('assets/js/bootstrap.min.js')}}"></script>
<script src="{{ asset('assets/js/slick.js')}}"></script>
<!-- Swiper slider JS -->
<script src="{{ asset('assets/js/swiper-bundle.min.js')}}"></script>


<script src="{{ asset('assets/js/waypoints.min.js')}}"></script>
<!-- main js  -->
<script src="{{ asset('assets/js/main.js')}}"></script>
    </body>
</html>
