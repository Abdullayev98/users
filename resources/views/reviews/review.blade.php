@extends('layouts.app')


@section('content')
    <div class="container w-4/5 mx-auto">
        <div class="flex lg:flex-row flex-col justify-center mt-6">
            <div class="lg:w-1/5 w-full text-base">
                <ul>
                    <li>
                        <a class="text-blue-500 hover:text-red-500" href="/geotaskshint">@lang('lang.review_howItWorks')</a>
                    </li>
                    <li>
                        <a class="text-blue-500 hover:text-red-500" href="/security">@lang('lang.review_security')</a>
                    </li>
                    <li>
                        <a class="text-blue-500 hover:text-red-500" href="/badges">@lang('lang.review_rewards')</a>
                    </li>
                    <li class="mt-5">
                        <a class="text-black font-semibold" href="/rewievs">@lang('lang.review_PerFeed')</a>
                    </li>
                    <li>
                        <a class="text-blue-500 hover:text-red-500" href="/author-reviews">@lang('lang.review_CusFeed')</a>
                    </li>
                    <li>
                        <a class="text-blue-500 hover:text-red-500" href="/press">@lang('lang.review_aboutUs')</a>
                    </li>
                    <li class="mt-5">
                        <a class="text-blue-500 hover:text-red-500" href="">@lang('lang.review_addsInServ')</a>
                    </li>
                    <li>
                        <a class="text-blue-500 hover:text-red-500" href="/contacts">@lang('lang.review_contacts')</a>
                    </li>
                    <li>
                        <a class="text-blue-500 hover:text-red-500" href="/vacancies">@lang('lang.review_vacancy')</a>
                    </li>
                </ul>
                <a href class="bg-no-repeat" style="background: url('{{asset('images/shield.svg')}}');"></a>
                <a href="/verification" class="w-10/12 pb-[15px] block rounded-md shadow-xl hover:shadow-md text-base leading-md tracking-sm text-gray-700 mt-5 text-center">
                    <img src="{{asset('images/shield.svg')}}" class="mx-auto pb-3" alt="">
                    @lang('lang.review_bePerformer')
                </a>
            </div>
            <div class="lg:w-4/5 w-full text-base lg:mt-0 mt-4">
                <h1 class="text-3xl pb-2 font-semibold">
                @lang('lang.review_feedbackAboutUser')
                </h1>
                <p class="pb-5 text-base">@lang('lang.review_text1')</p>
                <p class="pb-5 text-base">@lang('lang.review_text2')</p>
                <ul class="pt-[20px]">
                    <li class="mt-6">
                        <a href="/u1053628" target="_blank" rel="noreferrer noopener" class="block float-left align-top w-18 h-18 overflow-hidden rounded-lg mr-4 shadow-lg border-b-0 ">
                            <img class="UsersReviews_picture__aB22p" src="https://shivinfotech.co/assests/images/download.png">
                        </a>
                        <div class="align-top ml-[50px] h-24">
                            <span>
                                <a href="/u1053628" target="_blank" rel="noreferrer noopener" class="text-blue-400 ">Сергей С.</a>
                            </span>
                            <div class="text-base text-[rgba(78,78,78,.5)]">
                                <span class="align-middle">
                                @lang('lang.review_finished')
                                    <!-- -->
                                    <!-- -->341 @lang('lang.review_task')
                                    <!-- -->@lang('lang.review_rating')
                                    <!-- -->5
                                </span>
                                <div class="inline-block align-middle w-20 h-[16px] bg-[length:16px_16px] relative" style="background-image: url('{{asset('images/star-yellow-light.svg')}}')">
                                    <div class="w-[100%] block h-[16px] absolute top-0 left-0  bg-[length:16px_16px]" style="background-image: url('{{asset('images/star-yellow.svg')}}')"></div>
                                </div>
                            </div>
                        </div>
                        <div class="p-8 mt-[12px] mr-0 mb-[35px] bg-pink-50 shadow-md shadow-current rounded-lg relative text-gray-700 text-base border-pink-100 border-solid">
                            Разные задания&nbsp;— это очень интересно! Главное, есть куда расти в&nbsp;плане навыков. Чувствуешь свою значимость, но&nbsp;не&nbsp;боишься испачкаться.
                        </div>
                    </li>
                    <li class="mt-8">
                        <a href="/u1053628" target="_blank" rel="noreferrer noopener" class="block float-left align-top w-18 h-18 overflow-hidden rounded-lg mr-4 shadow-lg border-b-0 ">
                            <img class="UsersReviews_picture__aB22p" src="https://shivinfotech.co/assests/images/download.png">
                        </a>
                        <div class="align-top ml-[50px] h-24">
                            <span>
                                <a href="/u1053628" target="_blank" rel="noreferrer noopener" class="text-blue-400 ">Сергей С.</a>
                            </span>
                            <div class="text-base text-[rgba(78,78,78,.5)]">
                                <span class="align-middle">
                                @lang('lang.review_finished')
                                    <!-- -->
                                    <!-- -->341 @lang('lang.review_task')
                                    <!-- -->@lang('lang.review_rating')
                                    <!-- -->5
                                </span>
                                <div class="inline-block align-middle w-20 h-[16px] bg-[length:16px_16px] relative" style="background-image: url('{{asset('images/star-yellow-light.svg')}}')">
                                    <div class="w-[100%] block h-[16px] absolute top-0 left-0 bg-[length:16px_16px]" style="url('{{asset('images/star-yellow.svg')}}')"></div>
                                </div>
                            </div>
                        </div>
                        <div class="p-8 mt-[12px] mr-0 mb-[35px] bg-pink-50 shadow-md shadow-current rounded-lg relative text-gray-700 text-base border-pink-100 border-solid">
                            Разные задания&nbsp;— это очень интересно! Главное, есть куда расти в&nbsp;плане навыков. Чувствуешь свою значимость, но&nbsp;не&nbsp;боишься испачкаться.
                        </div>
                    </li>
                    <li class="mt-8">
                        <a href="/u1053628" target="_blank" rel="noreferrer noopener" class="block float-left align-top w-18 h-18 overflow-hidden rounded-lg mr-4 shadow-lg border-b-0 ">
                            <img class="UsersReviews_picture__aB22p" src="https://shivinfotech.co/assests/images/download.png">
                        </a>
                        <div class="align-top ml-[50px] h-24">
                            <span>
                                <a href="/u1053628" target="_blank" rel="noreferrer noopener" class="text-blue-400 ">Сергей С.</a>
                            </span>
                            <div class="text-base text-[rgba(78,78,78,.5)]">
                                <span class="align-middle">
                                @lang('lang.review_finished')
                                    <!-- -->
                                    <!-- -->341 @lang('lang.review_task')
                                    <!-- -->@lang('lang.review_rating')
                                    <!-- -->5
                                </span>
                                <div class="inline-block align-middle w-20 h-[16px] bg-[length:16px_16px] relative" style="background-image: url('{{asset('images/star-yellow-light.svg')}}')">
                                    <div class="w-[100%] block h-[16px] absolute top-0 left-0  bg-[length:16px_16px]" style="background-image: url('{{asset('images/star-yellow.svg')}}')"></div>
                                </div>
                            </div>
                        </div>
                        <div class="p-8 mt-[12px] mr-0 mb-[35px] bg-pink-50 shadow-md shadow-current rounded-lg relative text-gray-700 text-base border-pink-100 border-solid">
                            Разные задания&nbsp;— это очень интересно! Главное, есть куда расти в&nbsp;плане навыков. Чувствуешь свою значимость, но&nbsp;не&nbsp;боишься испачкаться.
                        </div>
                    </li>
                </ul>
                <a href="categories/1" class="inline-block mt-7 border-0 outline-0 text-center whitespace-nowrap min-w-[100px] rounded-[8px] text-[2rem] h-[3.5rem] text-white px-[23px] bg-[linear-gradient(180deg,#5dbeff,#4096ef)] hover:bg-[linear-gradient(180deg,#a2d8fc,#6eaff1)]">@lang('lang.review_createTask')</a>
            </div>
        </div>
    </div>



    <div class="w-full" >
        <button onclick="topFunction()" id="myBtn" title="Go to top" class="fixed z-10 hidden p-3 bg-gray-100 rounded-full shadow-md bottom-10 right-10 animate-bounce">
            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 10l7-7m0 0l7 7m-7-7v18">
                </path>
            </svg>
        </button>
    </div>

    <script src="{{ asset('js/reviews/reviews.js') }}"></script>
@endsection
