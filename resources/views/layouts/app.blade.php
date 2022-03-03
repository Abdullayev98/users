<!DOCTYPE html>
<html lang="{{session('lang')}}" dir="ltr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Universal services </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="image/png" href="{{$app_logo ?? ''}}"/>
    <link rel="stylesheet" href="{{asset('vendor/fontawesome-free/css/all.min.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
            integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="{{ asset('css/fonts/fonts.css') }}">
    <link href="https://releases.transloadit.com/uppy/v2.4.1/uppy.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>


    @yield('style')

    <style>
        body {
            font-family: 'Montserrat', sans-serif;!important;
        }
    </style>
</head>
<body class=" text-xl">

@include('components.preloader')
<x-navbar/>
@yield('content')
<x-footer/>
@include('sweetalert::alert')

<x-modal></x-modal>
</body>


<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    window.replainSettings = {id: '04dd17cf-659c-40c9-8b6e-007f91243f10'};
    (function (u) {
        var s = document.createElement('script');
        s.type = 'text/javascript';
        s.async = true;
        s.src = u;
        var x = document.getElementsByTagName('script')[0];
        x.parentNode.insertBefore(s, x);
    })('https://widget.replain.cc/dist/client.js');
</script>
@yield("javasript")
<script>

    $(document).ready(function ($) {
        var Body = $('body');
        Body.addClass('preloader-site');
        $('#st-cmp-v2').addClass('hidden');
        $('.sharethisbutton').click(function () {
            $('.st-logo').addClass('hidden');
            $('.st-close').attr('style', 'position:fixed !important;top: 20px !important');
            $('.st-disclaimer').addClass('hidden');
        });
    });
    window.addEventListener('load', function () {
        $('.preloader-wrapper').fadeOut();
        var Body = $('body');
        Body.removeClass('preloader-site');
        $('#st-cmp-v2').addClass('hidden');

    })
</script>
</html>
