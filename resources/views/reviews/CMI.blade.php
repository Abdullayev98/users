@extends('layouts.app')

@section('content')
    <div class="container w-4/5 mx-auto">
        <div class="flex lg:flex-row flex-col justify-center mt-6">
            <div class="lg:w-1/5 w-full text-base">
                <ul>
                    <li>
                        <a class="text-blue-500 hover:text-red-500 text-[15px] leading-[1.8rem]" href="/geotaskshint">@lang('lang.authors_howItWorks')</a>
                    </li>
                    <li>
                        <a class="text-blue-500 hover:text-red-500 text-[15px] leading-[1.8rem]" href="/security">@lang('lang.authors_security')</a>
                    </li>
                    <li>
                        <a class="text-blue-500 hover:text-red-500 text-[15px] leading-[1.8rem]" href="/badges">@lang('lang.authors_rewards')</a>
                    </li>
                    <li class="mt-5">
                        <a class="text-blue-500 hover:text-red-500 text-[15px] leading-[1.8rem]" href="/reviews">@lang('lang.authors_PerFeed')</a>
                    </li>
                    <li>
                        <a class="text-blue-500 hover:text-red-500 text-[15px] leading-[1.8rem]" href="/author-reviews">@lang('lang.authors_CusFeed')</a>
                    </li>
                    <li>
                        <a class="text-black font-semibold text-[15px] leading-[1.8rem]" href="/press">@lang('lang.authors_aboutUs')</a>
                    </li>
                    <li class="mt-5">
                        <a class="text-blue-500 hover:text-red-500 text-[15px] leading-[1.8rem]" href="">@lang('lang.authors_addsInServ')</a>
                    </li>
                    <li>
                        <a class="text-blue-500 hover:text-red-500 text-[15px] leading-[1.8rem]" href="/contacts">@lang('lang.authors_contacts')</a>
                    </li>
                    <li>
                        <a class="text-blue-500 hover:text-red-500 text-[15px] leading-[1.8rem]" href="/vacancies">@lang('lang.authors_vacancy')</a>
                    </li>
                </ul>
                <a href class="bg-no-repeat" style="background: url('{{asset('images/shield.svg')}}');"></a>
                <a href="/verification" class="w-10/12 px-10 pb-[15px] block rounded-md shadow-xl hover:shadow-md text-base leading-md tracking-sm text-gray-700 mt-5 text-center">
                    <img src="{{asset('images/shield.svg')}}" class="mx-auto pb-3" alt="">
                    @lang('lang.review_bePerformer')
                </a>
            </div>
            <div class="lg:w-4/5 w-full text-base lg:mt-0 mt-4">
                @foreach ($medias as $media)
                <div class="mb-12">
                    @php
                        \Carbon\Carbon::setLocale('ru');
                    @endphp
                    <div class="italic text-gray-600">

                        {{ $media->created_at->format('d.m.Y') }} @lang('lang.cmi_year').
                    </div>
                    <h1 class="text-base md:text-lg">
                        <span class="text-red-500"> {{ $media->getTranslatedAttribute('title',Session::get('lang') , 'fallbackLocale') }}
                    </h1>
                    <p class="mt-4 text-base">
                    @lang('lang.cmi_yandex1')

                        <a class="text-blue-500 hover:text-black" href="/"> {{ $media->getTranslatedAttribute('description',Session::get('lang') , 'fallbackLocale') }}</a>

                        @lang('lang.cmi_yandex3')</p>
                </div>
                @endforeach
            </div>
        </div>
    </div>


    <div class="w-full" x-data="topBtn">
        <button onclick="topFunction()" id="myBtn" title="Go to top" class="fixed z-10 hidden p-3 bg-gray-100 rounded-full shadow-md bottom-10 right-10 animate-bounce">
            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 10l7-7m0 0l7 7m-7-7v18">
                </path>
            </svg>
        </button>
    </div>


    <script>
        //Get the button
        var mybutton = document.getElementById("myBtn");

        // When the user scrolls down 20px from the top of the document, show the button
        window.onscroll = function() {
            scrollFunction()
        };

        function scrollFunction() {
            if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                mybutton.style.display = "block";
            } else {
                mybutton.style.display = "none";
            }
        }

        // When the user clicks on the button, scroll to the top of the document
        function topFunction() {
            document.body.scrollTop = 0;
            document.documentElement.scrollTop = 0;
        }
    </script>

@endsection
