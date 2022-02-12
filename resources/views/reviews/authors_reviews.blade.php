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
                        <a class="text-black font-semibold text-[15px] leading-[1.8rem]" href="/">@lang('lang.authors_CusFeed')</a>
                    </li>
                    <li>
                        <a class="text-blue-500 hover:text-red-500 text-[15px] leading-[1.8rem]" href="/press">@lang('lang.authors_aboutUs')</a>
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
            </div>
            <div class="lg:w-4/5 w-full text-base lg:mt-0 mt-4">
                <h1 class="text-normal lg:text-2xl pb-2 font-semibold">
                @lang('lang.authors_CusFeedAboutUser')
                </h1>
                <p class="pb-5 md:text-base leading-lg">@lang('lang.authors_FeedbackInf')</p>
                <ul class="pt-8">
                    <li class="border border-solid border-2 rounded-md bg-pink-50">
                        <div class="px-8 py-6">
                            <a href="/u1053628" target="_blank" rel="noreferrer noopener" class="block float-left align-top w-16 h-16 overflow-hidden rounded-full shadow-lg border-b-0 mr-4">
                                <img class="rounded-full" src="https://assets.youdo.com/next/_next/static/images/e_zhilina-027471a79969109990245cf940f9f980.jpg">
                            </a>
                            <div class="align-top ml-12 min-h-20">
                                <span>
                                    <a href="/u1053628" target="_blank" rel="noreferrer noopener" class="font-semibold ">Ольга Ивенская</a>
                                </span>
                                <div class="text-base -mt-2 text-gray-400">
                                    <span class="align-middle">
                                        <a href="#">@lang('lang.authors_timeAgo')</a>
                                    </span>
                                </div>
                            </div>
                            <div class="text-base">
                            @lang('lang.authors_feedback')
                            </div>
                            <div class="w-full h-auto py-4">
                                <img src="https://external.ftas3-1.fna.fbcdn.net/safe_image.php?d=AQE6EVXDDxMMJipo&w=540&h=282&url=http%3A%2F%2Fuser.com%2FStatic%2FFBWall_2018_2.jpg&cfs=1&upscale=1&fallback=news_d_placeholder_publisher&ext=emg0&_nc_oe=6f37e&_nc_sid=06c271&ccb=3-5&_nc_hash=AQHUUpFCB2oK2EA7" alt="">
                            </div>
                        </div>
                    </li>
                </ul>
                <a href="categories/1" class="inline-block mt-7 border-0 outline-0 text-center whitespace-nowrap min-w-20 rounded-md text-lg h-5 text-white px-12 bg-[linear-gradient(180deg,#5dbeff,#4096ef)] hover:bg-[linear-gradient(180deg,#a2d8fc,#6eaff1)">@lang('lang.authors_createTask')</a>
            </div>
        </div>
    </div>


    <div class="w-full" >
        <button onclick="topFunction()" id="myBtn" title="Go to top" class="fixed z-10 hidden p-3 bg-gray-100 rounded-full shadow-md bottom-5 right-24 animate-bounce">
            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 10l7-7m0 0l7 7m-7-7v18">
                </path>
            </svg>
        </button>
    </div>

    <script src="{{ asset('js/reviews/reviews.js') }}"></script>

@endsection
