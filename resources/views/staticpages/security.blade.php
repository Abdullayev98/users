@extends("layouts.app")

@section('content')

    <div class="container w-4/5 mx-auto">

        <div class="flex lg:flex-row flex-col justify-center mt-6">
            <div class="lg:basis-1/5 basis-full lg:m-0 m-8">
                <ul class="mb-5">
                    <li><a  href="/geotaskshint" class="hover:text-red-500 text-md text-blue-600 cursor-pointer">@lang('lang.secure_howItWorks')</a></li>
                    <li><a  href="/security" class="hover:text-red-500 text-md font-bold cursor-pointer">@lang('lang.secure_security')</a></li>
                    <li><a  href="/badges" class="hover:text-red-500 text-md text-blue-600 cursor-pointer">@lang('lang.secure_rewards')</a></li>
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
            <div class="lg:basis-4/5 basis-full lg:m-0 m-8">
                    <div class="">
                        <h1 class="font-bold text-5xl">@lang('lang.secure_security')</h1>
                        <br>
                        <p class="">@lang('lang.secure_generalTask')</p>
                        <br>
                        <p class="">@lang('lang.secure_weTry')</p>
                    </div>
                    <div class="flex lg:flex-row flex-col mt-10  mx-auto">
                        <div class="basis-1/2 my-auto text-left" >
                            <h3 class="text-2xl font-medium mb-4">@lang('lang.secure_testPerfs')</h3>
                            <p class="w-full">@lang('lang.secure_testPerfsDet')</p>                          
                            <a href="#" class="text-blue-500 hover:text-red-500 mt-5">@lang('lang.secure_testDocs')</a>
                        </div>

                        <div class="basis-1/2 ">
                            <img class="w-76 h-64 mx-auto" src="https://sun9-31.userapi.com/impf/c626417/v626417063/59eb3/Mi90OPQvDa0.jpg?size=560x540&quality=96&sign=9c7a38c94313f19aa9bfc1da41f35f2b&type=album" alt="">
                        </div>
                    </div>
                    <div class="flex lg:flex-row flex-col mt-4  mx-auto">
                        <div class="basic-1/2 lg:block hidden">
                            <img class="w-96 h-60 mt-16" src="{{asset('/images/img123.jpg')}}" alt="">
                        </div>
                        <div class="basic-1/2 text-left ml-4 mt-4 lg:block hidden w-4/5">
                            <h3 class="text-2xl font-medium mb-4">@lang('lang.secure_ratingAndFeed')</h3>
                            <p class="w-full">@lang('lang.secure_finish1')</p>
                            <p class="mt-5">@lang('lang.secure_finish2')</p>
                            <a href="/" class="text-blue-500 hover:text-red-500 mt-5">@lang('lang.secure_detailedAboutR')</a>
                        </div>

                        <div class="basic-1/2 text-left ml-4 mt-4 lg:hidden block">
                            <h3 class="text-2xl font-medium mb-4">@lang('lang.secure_ratingAndFeed')</h3>
                            <p class="w-full">@lang('lang.secure_finish1')</p>
                            <p class="mt-5">@lang('lang.secure_finish2')</p>
                            <a href="/" class="text-blue-500 hover:text-red-500 mt-5">@lang('lang.secure_detailedAboutR')</a>
                        </div>
                        <div class="basic-1/2 lg:hidden block">
                            <img class="w-76 h-64 mx-auto" src="{{asset('/images/img123.jpg')}}" alt="">
                        </div>
                    </div>
                    <div class="w-full mt-10">
                        <h3 class="text-3xl mb-5">@lang('lang.secure_recomends')</h3>
                        <p>@lang('lang.secure_recomendsText')</p>
                        <ul class="mt-5 list-decimal">
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
                        <div class="flex lg:flex-row flex-col mt-10">
                            <div class="basis-1/2 mx-auto">
                                <a href="#replain-link">
                                    <button  class="font-sans  text-2xl mx-2 font-medium bg-green-400 text-[#fff] hover:bg-green-300 px-10 py-4 rounded">
                                        @lang('lang.secure_writeToSupp')
                                    </button>
                                </a>
                            </div>
                            <div class="basis-1/2 mx-auto lg:mt-0 mt-6">
                                <a href="/contacts">
                                    <button  class="font-sans  text-2xl mx-2 font-medium  text-black-400 ring-1 ring-gray-300 px-14 py-4 rounded">
                                        @lang('lang.secure_goToContacts')
                                    </button>
                                </a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection
