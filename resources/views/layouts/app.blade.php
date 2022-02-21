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


</head>
<body class=" text-xl">
<style>
    body {
        font-family: 'Montserrat', sans-serif;
    }

    .st0 {
        fill: #DB2091;
    }

    .st1 {
        fill: #009FDC;
    }

    .st2 {
        fill: #FF932B;
    }

    .st3 {
        display: none;
    }

    .st4 {
        display: inline;
    }


    #id1 {
        animation: ani1 -0.5s linear 1s infinite alternate;
    }

    #id2 {
        animation: ani2 -0.5s linear 2s infinite alternate;
    }

    #id3 {
        animation: ani3 -0.5s linear 2s infinite alternate;
    }

    @keyframes ani1 {
        0% {
            opacity: 0;
            fill: #fff;
        }

        100% {
            opacity: 1;
        }
    }

    @keyframes ani2 {
        0% {
            opacity: 1;
        }

        100% {
            opacity: 0;
            fill: #fff;
        }
    }

    @keyframes ani3 {
        0% {
            opacity: 1;
        }

        100% {
            opacity: 0;
            fill: #fff;
        }
    }

    .preloader {
        display: flex;
        align-items: center;
        justify-content: center;
        z-index: 200;
    }

    .preloader {
        width: 400px !important;
        height: 400px !important;
    }

    @media only screen and (max-width: 980px) {
        .preloader {
            height: 200px !important;
            width: 200px !important;
        }
    }
</style>
<div class="preloader-wrapper">
    <div class="preloader">
        <svg version="1.1" id="Слой_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
             x="0px" y="0px" viewBox="0 0 200 70" style="enable-background:new 0 0 200 70;" xml:space="preserve"
             width="100%" height="100%">

            <g>
                <g>
                    <g>
                        <path id="id1" class="st0" d="M37.7,40.5v22.2l-8.1,4.8v-27c0-2.6-1.4-5.1-3.7-6.4l-23.6-14l7.9-4.7l19.8,11.8
                    C34.8,30,37.7,35.1,37.7,40.5z"/>
                        <circle id="id2" class="st0" cx="19.4" cy="41.7" r="5.5"/>
                    </g>
                    <g>
                        <path id="id1" class="st1" d="M75.5,20.1l-23.6,14c-2.3,1.3-3.7,3.8-3.7,6.4v27l-8.1-4.8V40.5c0-5.5,2.9-10.6,7.6-13.4l19.8-11.8
                    L75.5,20.1z"/>
                        <circle id="id2" class="st1" cx="58.4" cy="41.7" r="5.5"/>
                    </g>
                    <g>
                        <path id="id1" class="st2" d="M66.4,3.9v9.4L46.8,24.9c-2.4,1.5-5.2,2.2-7.9,2.2c-2.7,0-5.5-0.7-7.9-2.2L11.4,13.3V3.9L35.1,18
                    c2.3,1.4,5.3,1.4,7.6,0L66.4,3.9z"/>
                        <path id="id2" class="st2"
                              d="M44.4,8c0,3.1-2.5,5.5-5.5,5.5c-3.1,0-5.5-2.5-5.5-5.5c0-3.1,2.5-5.5,5.5-5.5C42,2.5,44.4,5,44.4,8z"/>
                    </g>
                </g>
                <g>
                    <path id="id3"
                          d="M89.3,11.4v13c0,4.4,1.9,6.4,4.8,6.4c3.1,0,5-2,5-6.4v-13h4.3v12.7c0,6.9-3.7,9.9-9.4,9.9c-5.4,0-9-2.9-9-9.9V11.4H89.3z"/>
                    <path id="id3" d="M115.7,23.5v2.8h-8.9v-2.8H115.7z"/>
                    <path id="id3" d="M119.2,29.3c1.4,0.8,3.5,1.4,5.7,1.4c2.7,0,4.3-1.2,4.3-3c0-1.7-1.2-2.7-4.2-3.7c-3.9-1.3-6.4-3.3-6.4-6.5
                c0-3.7,3.2-6.4,8.3-6.4c2.5,0,4.4,0.5,5.6,1.1l-1,3.3c-0.8-0.4-2.5-1.1-4.7-1.1c-2.7,0-3.9,1.4-3.9,2.7c0,1.7,1.4,2.5,4.5,3.7
                c4.1,1.5,6,3.4,6,6.6c0,3.6-2.8,6.7-8.9,6.7c-2.5,0-5.1-0.7-6.4-1.4L119.2,29.3z"/>
                    <path id="id3" d="M140.4,26.8c0.1,2.9,2.5,4.2,5.2,4.2c2,0,3.4-0.3,4.7-0.7l0.6,2.8c-1.5,0.6-3.5,1-5.9,1c-5.5,0-8.7-3.2-8.7-8.2
                c0-4.4,2.8-8.7,8.3-8.7c5.5,0,7.3,4.3,7.3,7.8c0,0.8-0.1,1.4-0.2,1.7H140.4z M147.9,24c0-1.5-0.7-3.9-3.5-3.9
                c-2.6,0-3.7,2.3-3.9,3.9H147.9z"/>
                    <path id="id3" d="M155.4,22.8c0-2.2,0-3.7-0.1-5.2h3.7l0.2,3.1h0.1c0.8-2.3,2.8-3.4,4.6-3.4c0.4,0,0.7,0,1,0.1v3.8
                c-0.4-0.1-0.7-0.1-1.3-0.1c-2,0-3.5,1.2-3.8,3.1c-0.1,0.4-0.1,0.8-0.1,1.2v8.4h-4.3V22.8z"/>
                </g>
                <g id="id3">
                    <path d="M84.6,43.2v6.4c0,2.7,1.3,3.7,2.8,3.7c1.7,0,3-1.1,3-3.7v-6.4h0.7v6.3c0,3.3-1.8,4.5-3.8,4.5c-1.9,0-3.5-1.1-3.5-4.3v-6.5
                H84.6z"/>
                    <path d="M93.9,48.1c0-0.7,0-1.2-0.1-1.8h0.7l0.1,1.4h0c0.4-0.9,1.4-1.5,2.6-1.5c0.7,0,2.6,0.4,2.6,3.2v4.5h-0.7v-4.5
                c0-1.4-0.5-2.6-2.1-2.6c-1.1,0-2,0.8-2.3,1.7c-0.1,0.2-0.1,0.4-0.1,0.7v4.7h-0.7V48.1z"/>
                    <path d="M103.6,44.1c0,0.4-0.2,0.7-0.6,0.7c-0.3,0-0.6-0.3-0.6-0.7c0-0.3,0.3-0.7,0.6-0.7C103.4,43.5,103.6,43.8,103.6,44.1z
                 M102.6,53.9v-7.6h0.7v7.6H102.6z"/>
                    <path
                        d="M105.9,46.3l1.8,4.7c0.3,0.7,0.5,1.4,0.7,2h0c0.2-0.6,0.5-1.3,0.8-2l1.8-4.7h0.8l-3.1,7.6h-0.7l-3-7.6H105.9z"/>
                    <path d="M113.5,50c0,2.4,1.3,3.4,2.9,3.4c1.1,0,1.7-0.2,2.1-0.4l0.2,0.6c-0.3,0.2-1.1,0.5-2.4,0.5c-2.2,0-3.5-1.6-3.5-3.8
                c0-2.5,1.4-4.1,3.4-4.1c2.5,0,2.9,2.3,2.9,3.4c0,0.2,0,0.3,0,0.5H113.5z M118.3,49.4c0-1.1-0.4-2.7-2.3-2.7
                c-1.7,0-2.4,1.5-2.5,2.7H118.3z"/>
                    <path d="M121.3,48.6c0-0.8,0-1.5-0.1-2.3h0.7l0,1.5h0c0.3-1,1.1-1.7,2.1-1.7c0.1,0,0.2,0,0.3,0v0.7c-0.1,0-0.2,0-0.4,0
                c-1,0-1.8,0.9-2,2.1c0,0.2-0.1,0.5-0.1,0.7v4.2h-0.7V48.6z"/>
                    <path d="M125.8,52.9c0.4,0.3,1,0.5,1.7,0.5c1.2,0,1.8-0.7,1.8-1.4c0-0.8-0.5-1.3-1.6-1.7c-1.2-0.5-1.9-1.2-1.9-2.1
                c0-1.1,0.9-2,2.3-2c0.7,0,1.3,0.2,1.7,0.5l-0.3,0.6c-0.3-0.2-0.7-0.5-1.5-0.5c-1,0-1.5,0.6-1.5,1.3c0,0.8,0.5,1.1,1.6,1.6
                c1.2,0.5,1.9,1.1,1.9,2.2c0,1.3-1,2.2-2.6,2.2c-0.7,0-1.4-0.2-1.9-0.5L125.8,52.9z"/>
                    <path d="M136.4,53.9l-0.1-1.1h0c-0.4,0.6-1.2,1.3-2.4,1.3c-1.5,0-2.2-1.1-2.2-2.1c0-1.7,1.5-2.8,4.6-2.8V49c0-0.7-0.1-2.2-1.9-2.2
                c-0.7,0-1.4,0.2-1.9,0.6l-0.2-0.5c0.7-0.5,1.5-0.7,2.2-0.7c2.2,0,2.6,1.6,2.6,3v3c0,0.6,0,1.2,0.1,1.8H136.4z M136.2,49.8
                c-1.6,0-3.8,0.2-3.8,2c0,1.1,0.7,1.6,1.5,1.6c1.3,0,2-0.8,2.2-1.5c0.1-0.2,0.1-0.3,0.1-0.5V49.8z"/>
                    <path d="M139.6,42.7h0.7v11.2h-0.7V42.7z"/>
                    <path d="M146.6,52.7c0.6,0.4,1.4,0.7,2.3,0.7c1.6,0,2.6-0.9,2.6-2.2c0-1.2-0.6-1.9-2.2-2.5c-1.7-0.6-2.7-1.5-2.7-2.9
                c0-1.6,1.3-2.7,3.1-2.7c1,0,1.8,0.3,2.1,0.5l-0.3,0.6c-0.3-0.2-1-0.5-1.9-0.5c-1.7,0-2.3,1.1-2.3,1.9c0,1.2,0.7,1.8,2.2,2.4
                c1.8,0.7,2.7,1.5,2.7,3.1c0,1.5-1.1,2.9-3.4,2.9c-0.9,0-2-0.3-2.5-0.7L146.6,52.7z"/>
                    <path d="M154.6,50c0,2.4,1.3,3.4,2.9,3.4c1.1,0,1.7-0.2,2.1-0.4l0.2,0.6c-0.3,0.2-1.1,0.5-2.4,0.5c-2.2,0-3.5-1.6-3.5-3.8
                c0-2.5,1.4-4.1,3.4-4.1c2.5,0,2.9,2.3,2.9,3.4c0,0.2,0,0.3,0,0.5H154.6z M159.5,49.4c0-1.1-0.4-2.7-2.3-2.7
                c-1.7,0-2.4,1.5-2.5,2.7H159.5z"/>
                    <path d="M162.4,48.6c0-0.8,0-1.5-0.1-2.3h0.7l0,1.5h0c0.3-1,1.1-1.7,2.1-1.7c0.1,0,0.2,0,0.3,0v0.7c-0.1,0-0.2,0-0.4,0
                c-1,0-1.8,0.9-2,2.1c0,0.2-0.1,0.5-0.1,0.7v4.2h-0.7V48.6z"/>
                    <path
                        d="M167.5,46.3l1.8,4.7c0.3,0.7,0.5,1.4,0.7,2h0c0.2-0.6,0.5-1.3,0.8-2l1.8-4.7h0.8l-3.1,7.6h-0.7l-3-7.6H167.5z"/>
                    <path d="M176.1,44.1c0,0.4-0.2,0.7-0.6,0.7c-0.3,0-0.6-0.3-0.6-0.7c0-0.3,0.3-0.7,0.6-0.7C175.9,43.5,176.1,43.8,176.1,44.1z
                 M175.1,53.9v-7.6h0.7v7.6H175.1z"/>
                    <path d="M183.9,53.5c-0.3,0.2-1.1,0.5-2.2,0.5c-2.2,0-3.6-1.6-3.6-3.9c0-2.4,1.6-4,3.9-4c0.9,0,1.7,0.3,2,0.5l-0.3,0.6
                c-0.4-0.2-0.9-0.4-1.8-0.4c-2,0-3.1,1.6-3.1,3.3c0,2,1.2,3.3,3,3.3c0.9,0,1.5-0.3,1.9-0.4L183.9,53.5z"/>
                    <path d="M186,50c0,2.4,1.3,3.4,2.9,3.4c1.1,0,1.7-0.2,2.1-0.4l0.2,0.6c-0.3,0.2-1.1,0.5-2.4,0.5c-2.2,0-3.5-1.6-3.5-3.8
                c0-2.5,1.4-4.1,3.4-4.1c2.5,0,2.9,2.3,2.9,3.4c0,0.2,0,0.3,0,0.5H186z M190.8,49.4c0-1.1-0.4-2.7-2.3-2.7c-1.7,0-2.4,1.5-2.5,2.7
                H190.8z"/>
                    <path d="M193.4,52.9c0.4,0.3,1,0.5,1.7,0.5c1.2,0,1.8-0.7,1.8-1.4c0-0.8-0.5-1.3-1.6-1.7c-1.2-0.5-1.9-1.2-1.9-2.1
                c0-1.1,0.9-2,2.3-2c0.7,0,1.3,0.2,1.7,0.5l-0.3,0.6c-0.3-0.2-0.7-0.5-1.5-0.5c-1,0-1.5,0.6-1.5,1.3c0,0.8,0.5,1.1,1.6,1.6
                c1.2,0.5,1.9,1.1,1.9,2.2c0,1.3-1,2.2-2.6,2.2c-0.7,0-1.4-0.2-1.9-0.5L193.4,52.9z"/>
                </g>
            </g>
        </svg>
    </div>
</div>
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
