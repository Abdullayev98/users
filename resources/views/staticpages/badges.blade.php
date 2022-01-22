@extends("layouts.app")

@section('content')

<div class="container w-4/5 mx-auto">

        <div class="flex lg:flex-row flex-col justify-center mt-6">
            <div class="lg:basis-1/5 basis-full lg:m-0 m-8">
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
            <div class="lg:basis-4/5 basis-full lg:m-0 m-8">
                <div class="w-full">
                    <h1 class="font-bold text-4xl">@lang('lang.badgets_ratingAndRew')</h1>
                    <p class="mt-5"><a href="#" class="text-blue-600 hover:text-red-400">@lang('lang.badgets_ratingOfPer')</a>@lang('lang.badgets_text1')</p>
                    <p class="mt-5">@lang('lang.badgets_text2')<a href="#" class="text-blue-600 hover:text-red-400">@lang('lang.badgets_detailedRating')</a></p>
                    <p class="mt-5">@lang('lang.badgets_icons')<a href="" class="text-blue-600 hover:text-red-400">@lang('lang.badgets_ratingPage')</a>@lang('lang.badgets_text3')</p>
                    <div class="bg-gray-200 p-5">
                        <h2 class="text-3xl p-5">@lang('lang.badgets_typeOfCustomers')</h2>
                        <div class="grid grid-cols-5 gap-2">
                            <div class="col-span-1 bg-no-repeat w-50 h-50" >
                                <img src="{{asset('images/goldenCup.png')}}"  class="mx-auto" />
                            </div>
                            <div class="col-span-4">
                                <p class=""><span class="text-red-500 italic">@lang('lang.badgets_perOfTheYear')</span>@lang('lang.badgets_text4')</p>
                            </div>
                        </div>
                        <div class="grid grid-cols-5 gap-2 mt-2">
                            <div class="col-span-1 bg-no-repeat w-50 h-50">
                                <img src="{{asset('images/insuranceIcon.png')}}"  class="mx-auto" />
                            </div>
                            <div class="col-span-4">
                                <p class=""><span class="text-red-500 italic">@lang('lang.badgets_perService')</span>@lang('lang.badgets_text5')</p>
                            </div>
                        </div>
                        <div></div>
                    </div>
                </div>
            </div>
        </div>
</div>
@endsection
