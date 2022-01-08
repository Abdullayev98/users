@extends("layouts.app")

@section('content')

    <div class="container w-4/5 mx-auto">

        <div class="grid grid-cols-5 justify-center">
            <div class="col-span-1 mt-7">
                <ul class="mb-5">
                    <li><a  href="/geotaskshint" class="hover:text-red-500 text-md text-blue-600 cursor-pointer">@lang('lang.secure_howItWorks')</a></li>
                    <li><a  href="/security" class="hover:text-red-500 text-md font-bold cursor-pointer">@lang('lang.secure_security')</a></li>
                    <li><a  href="/" class="hover:text-red-500 text-md text-blue-600 cursor-pointer">@lang('lang.secure_rewards')</a></li>
                </ul>
                <ul class="mb-5">
                    <li><a  href="/reviews" class="hover:text-red-500 text-md text-blue-600 cursor-pointer">@lang('lang.secure_perFeedback')</a></li>
                    <li><a  href="/reviews/authors" class="hover:text-red-500 text-md text-blue-600 cursor-pointer">@lang('lang.secure_cusFeedback')</a></li>
                    <li><a  href="/press" class="hover:text-red-500 text-md text-blue-600 cursor-pointer">@lang('lang.secure_aboutUs')</a></li>
                </ul>
                <ul>
                    <li><a  href="/geotaskshint" class="hover:text-red-500 text-md text-blue-600 cursor-pointer">@lang('lang.secure_addsInServ')</a></li>
                    <li><a  href="/contacts" class="hover:text-red-500 text-md text-blue-600 cursor-pointer">@lang('lang.secure_contacts')</a></li>
                    <li><a  href="/job" class="hover:text-red-500 text-md text-blue-600 cursor-pointer">@lang('lang.secure_vacancy')</a></li>
                </ul>
            </div>
            <div class="col-span-4 ml-1">
                    <div class="w-full">
                        <div class="w-4/5">
                            <h1 class="font-bold text-5xl">@lang('lang.secure_security')</h1>
                            <br>
                            <p class="">@lang('lang.secure_generalTask')</p>
                            <br>
                            <p class="">@lang('lang.secure_weTry')</p>
                        </div>
{{--                        <div class="grid grid-cols-10">--}}
{{--                            <div class="col-span-3 bg-no-repeat mt-20" style="background-image: url('https://assets.youdo.com/_next/static/media/sbr-screen.a2f6a92627c5306e984799eec1143662.png')">--}}

{{--                            </div>--}}

{{--                            <div class="col-span-7 p-5">--}}
{{--                                <h3 class="text-2xl mb-5">@lang('lang.secure_dealWithoutRisk')</h3>--}}
{{--                                <p class="w-full">@lang('lang.secure_service')«<a href="#" class="text-blue-500 hover:text-red-500">@lang('lang.secure_dealWithoutRisk')</a>»@lang('lang.secure_paymentSecur')</p>--}}
{{--                                <p class="mt-5">@lang('lang.secure_garanty')</p>--}}
{{--                                <p class="mt-5">@lang('lang.secure_inThisCase')</p>--}}
{{--                                <a href="#" class="text-blue-500 hover:text-red-500 mt-5">@lang('lang.secure_detailed')</a>--}}
{{--                            </div>--}}
{{--                        </div>--}}
                        <div class="grid grid-cols-10 h-96 ">
                            <div class="col-span-7 p-5 my-auto" >
                                <h3 class="text-2xl mb-5">@lang('lang.secure_testPerfs')</h3>
                                <p class="w-full">@lang('lang.secure_testPerfsDet')
                                </p>
                                <a href="#" class="text-blue-500 hover:text-red-500 mt-5">@lang('lang.secure_testDocs')</a>
                            </div>

                            <div class="col-span-3 bg-no-repeat mt-20 bg-auto bg-right" style="background-image: url('https://assets.youdo.com/_next/static/media/documents-screen-shadow.a7af39c38e5cfc27e1ad5862892a3ec8.png')">

                            </div>
                        </div>
                        <div class="grid grid-cols-10 h-96">
                            <div class="col-span-3 bg-no-repeat bg-left " style="background-image: url('https://assets.youdo.com/_next/static/media/reviews-screen-shadow.ff467ea1c88c4b45c03df0eedf99845f.png')">
                            </div>
                            <div class="col-span-7 p-5 my-auto">
                                <h3 class="text-2xl mb-5">@lang('lang.secure_ratingAndFeed')</h3>
                                <p class="w-full">@lang('lang.secure_finish1')</p>
                                <p class="mt-5">@lang('lang.secure_finish2')</p>
                                <a href="/" class="text-blue-500 hover:text-red-500 mt-5">@lang('lang.secure_detailedAboutR')</a>
                            </div>
                        </div>
                        <div class="w-full mt-10">
                            <h3 class="text-3xl mb-5">@lang('lang.secure_recomends')</h3>
                            <p>@lang('lang.secure_recomendsText')</p>
                            <ul class="mt-5 list-decimal ml-10">
                                <li class="mr-5">@lang('lang.secure_carefull')</li>
                                <li class="mr-5">@lang('lang.secure_carefull2')</li>
                                <li class="mr-5">@lang('lang.secure_carefull3')</li>
                                <li class="mr-5">@lang('lang.secure_carefull4')</li>
                            </ul>
                            <a class="block mt-7 text-blue-600 hover:text-orange-300">@lang('lang.secure_beAware')</a>
                            <a class="block text-blue-600 hover:text-orange-300">@lang('lang.secure_beAware2')</a>
                            <h3 class="mt-14 text-3xl mb-5">@lang('lang.secure_beAware3')</h3>
                            <p>@lang('lang.secure_beAware4')</p>
                            <p class="mt-5">@lang('lang.secure_beAware5')</p>
                            <div class=" grid grid-cols-5 mt-10">
                                <div class=" col-span-2">
                                    <div class="rounded-xl py-5 bg-green-400 w-64 hover:bg-green-300 text-center"><a href="#replain-link" class="text-white text-2xl ">@lang('lang.secure_writeToSupp')</a></div>
                                </div>
                                <div class="col-span-3">
                                    <div class="ring-1 ring-gray-300 text-center py-5 rounded-xl col-span-3 w-64">
                                        <a href="/contacts" class="text-2xl">
                                        @lang('lang.secure_goToContacts')
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection
