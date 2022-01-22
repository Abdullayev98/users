@extends('layouts.app')

@section('content')
    <div class="md:container mx-auto pt-5 mt-[30px]">
        <div class="w-full px-12 md:flex md:grid-flow-row md:justify-center md:mx-auto md:max-w-[1300px] mb-4">
            <div class="lg:w-2/12 h-auto mt-5">
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
                <a href class="bg-[url('{{asset('images/shield.svg')}}')] bg-no-repeat"></a>
                <a href="/verification" class="w-[200px] px-[16px] pb-[15px] block rounded-[8px] shadow-xl hover:shadow-md text-[12px] leading-[16px] tracking-[.2px] text-[#444] mt-5 text-center mb-8">
                    <img src="{{asset('images/shield.svg')}}" class="mx-auto pb-3" alt="">
                    @lang('lang.cmi_bePerf')
                </a>
            </div>
            <div class="md:w-9/12 md:mt-10 md:pl-12">
                @foreach ($medias as $media)
                <div class="mb-12">
                    @php
                        \Carbon\Carbon::setLocale('ru');
                    @endphp
                    <div class="italic text-[#828282]">
                    
                        {{ $media->created_at->format('d') }} {{ \Carbon\Carbon::parse($media->created_at)->translatedFormat('F') }}
                    {{ $media->created_at->format('Y') }} @lang('lang.cmi_year').
                    </div>
                    <h1 class="text-[1.4rem] md:text-[1.8rem]">
                        <span class="text-red-500"> {{ $media->getTranslatedAttribute('title',Session::get('lang') , 'fallbackLocale') }}
                    </h1>
                    <p class="mt-4">
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
