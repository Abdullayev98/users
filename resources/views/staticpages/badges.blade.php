@extends("layouts.app")

@section('content')

<div class="container w-4/5 mx-auto">

        <div class="grid grid-cols-5 justify-center">
            <div class="col-span-1 mt-7">
                <ul class="mb-5">
                    <li><a  href="/geotaskshint" class="hover:text-red-500 text-md text-blue-600 cursor-pointer">@lang('lang.badgets_howItWorks')</a></li>
                    <li><a  href="/security" class="hover:text-red-500 text-md text-blue-600 cursor-pointer">@lang('lang.badgets_security')</a></li>
                    <li><a  href="/badges" class="hover:text-red-500 text-md font-bold cursor-pointer">@lang('lang.badgets_rating')</a></li>
                </ul>
                <ul class="mb-5">
                    <li><a  href="/reviews" class="hover:text-red-500 text-md text-blue-600 cursor-pointer">@lang('lang.badgets_feedback')</a></li>
                    <li><a  href="/reviews/authors" class="hover:text-red-500 text-md text-blue-600 cursor-pointer">@lang('lang.badgets_customerFeedB')</a></li>
                    <li><a  href="/press" class="hover:text-red-500 text-md text-blue-600 cursor-pointer">@lang('lang.badgets_aboutUs')</a></li>
                </ul>
                <ul>
                    <li><a  href="/geotaskshint" class="hover:text-red-500 text-md text-blue-600 cursor-pointer">@lang('lang.badgets_addsOnserv')</a></li>
                    <li><a  href="/contacts" class="hover:text-red-500 text-md text-blue-600 cursor-pointer">@lang('lang.badgets_Contacts')</a></li>
                    <li><a  href="/job" class="hover:text-red-500 text-md text-blue-600 cursor-pointer">@lang('lang.badgets_vacancy')</a></li>
                </ul>
            </div>
            <div class="col-span-4 ml-5 w-3/4 ">
                <div class="w-full">
                    <h1 class="font-bold text-4xl">@lang('lang.badgets_ratingAndRew')</h1>
                    <p class="mt-5"><a href="#" class="text-blue-600 hover:text-red-400">@lang('lang.badgets_ratingOfPer')</a>@lang('lang.badgets_text1')</p>
                    <p class="mt-5">@lang('lang.badgets_text2')<a href="#" class="text-blue-600 hover:text-red-400">@lang('lang.badgets_detailedRating')</a></p>
                    <p class="mt-5">@lang('lang.badgets_icons')<a href="" class="text-blue-600 hover:text-red-400">@lang('lang.badgets_ratingPage')</a>@lang('lang.badgets_text3')</p>
                    <div class="bg-gray-200">
                        <h2 class="text-3xl p-5">@lang('lang.badgets_typeOfCustomers')</h2>
                        <div class="grid grid-cols-5">
                            <div class="col-span-1 bg-no-repeat w-50 h-24  bg-black" >
                                <img src="https://assets.youdo.com/_next/static/media/gold.e89ccdb62b00976c80fd95166df8b68b.svg"  class="mx-auto" />
                            </div>
                            <div class="col-span-4">
                                <p class=""><span class="text-red-500 italic">@lang('lang.badgets_perOfTheYear')</span>@lang('lang.badgets_text4')</p>
                            </div>
                        </div>
                        <div class="grid grid-cols-5">
                            <div class="col-span-1 bg-no-repeat" style="background-image:url('https://assets.youdo.com/_next/static/media/badge-insurance.f85d1a0eef6ece06a0be8948561b1fc1.svg')">
                            </div>
                            <div class="col-span-4">
                                <p class="mt-5"><span class="text-red-500 italic">@lang('lang.badgets_perService')</span>@lang('lang.badgets_text5')</p>
                            </div>
                        </div>
                        <div></div>
                    </div>
                </div>
            </div>
        </div>
</div>
@endsection
