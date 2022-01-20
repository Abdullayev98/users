@extends("layouts.app")

@section('content')

<div class="container w-4/5 mx-auto">

        <div class="flex lg:flex-row flex-col justify-center mt-6">
            <div class="lg:basis-1/5 basis-full lg:m-0 m-8">
                <ul class="mb-5">
                    <li><a  href="/geotaskshint" class="hover:text-red-500 text-md font-bold cursor-pointer">@lang('lang.geoT_howItWorks')</a></li>
                    <li><a  href="/security" class="hover:text-red-500 text-md text-blue-600 cursor-pointer">@lang('lang.geoT_security')</a></li>
                    <li><a  href="/badges" class="hover:text-red-500 text-md text-blue-600 cursor-pointer">@lang('lang.geoT_rewardsAndRat')</a></li>
                </ul>
                <ul class="mb-5">
                    <li><a  href="/reviews" class="hover:text-red-500 text-md text-blue-600 cursor-pointer">@lang('lang.geoT_PerFeedback')</a></li>
                    <li><a  href="/reviews/authors" class="hover:text-red-500 text-md text-blue-600 cursor-pointer">@lang('lang.geoT_CusFeedback')</a></li>
                    <li><a  href="/press" class="hover:text-red-500 text-md text-blue-600 cursor-pointer">@lang('lang.geoT_aboutUs')</a></li>
                </ul>
                <ul>
                    <li><a  href="/geotaskshint" class="hover:text-red-500 text-md text-blue-600 cursor-pointer">@lang('lang.geoT_addsInServ')</a></li>
                    <li><a  href="/contacts" class="hover:text-red-500 text-md text-blue-600 cursor-pointer">@lang('lang.geoT_contacts')</a></li>
                    <li><a  href="/job" class="hover:text-red-500 text-md text-blue-600 cursor-pointer">@lang('lang.geoT_vacancy')</a></li>
                </ul>
            </div>
            <div class="lg:basis-4/5 basis-full xl:ml-0 ml-8">
                <div class="w-full">
                    <h1 class="font-bold text-5xl">@lang('lang.geoT_titleHow')</h1>
                    <p class="w-full mt-10">@lang('lang.geoT_aboutComp')
                    </p><br>
                    <p class="w-full">@lang('lang.geoT_perSec1')<a href="/verification" class="text-blue-600 hover:text-orange-500">@lang('lang.geoT_perSec2')</a> @lang('lang.geoT_perSec3')<a href="/security" class="text-blue-600 hover:text-orange-500">@lang('lang.geoT_perSec4')</a></p>
                    <iframe class="w-full mb-10 h-96 mt-10" width="727" height="409" src="https://www.youtube.com/embed/_nb4qzvpEhE" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

                        

                    <h1 class="font-bold text-4xl mt-10 text-center">@lang('lang.geoT_howToCreate')</h1>
                    <h3 class="mt-10 font-medium text-2xl text-center mb-2">@lang('lang.geoT_chooseCat')</h3>
                    <img src="https://i1.wp.com/composs.ru/wp-content/uploads/2017/03/oshibka_651-7.jpg" class="mx-auto"/>
                    <p class="mt-10 font-medium text-2xl text-center mb-2">@lang('lang.geoT_giveDetails')</p>
                    <img src="https://docs.microsoft.com/en-us/powerapps/maker/portals/media/contact-us-form.png" class="mx-auto"/>
                </div>
            

                <div class="w-full mx-auto my-10">
                    <hr>
                </div>
                <div class="flex lg:flex-row flex-col mt-10 w-4/5 mx-auto">
                    <div class="basis-1/2 my-auto text-center">
                            <h4 class="text-2xl font-medium mb-2">@lang('lang.geoT_takeFeedback')</h4>
                            <p>@lang('lang.geoT_afterCreating')</p>
                    </div>
                    <div class="basis-1/2">
                        <img src="https://f.hubspotusercontent30.net/hubfs/8822336/location-icon-pin-pointer-map%20(2).jpg" class="mx-auto w-80 h-64"/>
                    </div>
                </div>
                <div class="flex lg:flex-row flex-col mt-4 w-4/5 mx-auto">
                    
                        <div class="basic-1/2 lg:block hidden">
                            <img src="https://aviafrezer.ru/assets/images/resources/14/3356.jpg" class="mx-auto w-80 h-52"/>
                        </div>
                        <div class="basic-1/2 text-center ml-4 mt-4 lg:block hidden">
                                <h4 class="text-2xl font-medium mb-2">@lang('lang.geoT_chooseBest')</h4>
                                <p>@lang('lang.geoT_chooseByPrice')</p>
                        </div>
                   
                        <div class="basic-1/2 text-center ml-4 mt-4 lg:hidden block">
                            <h4 class="text-2xl font-medium mb-2">@lang('lang.geoT_chooseBest')</h4>
                            <p class="mb-8">@lang('lang.geoT_chooseByPrice')</p>
                         </div>
                         <div class="basic-1/2 lg:hidden block">
                            <img src="https://aviafrezer.ru/assets/images/resources/14/3356.jpg" class="mx-auto w-80 h-52"/>
                        </div>
                    
                </div>
                <div class="flex lg:flex-row flex-col mt-10 w-4/5 mx-auto">
                    <div class="basis-1/2 my-auto text-center">
                            <h4 class="text-2xl font-medium mb-2">@lang('lang.geoT_endingTask')</h4>
                            <p>@lang('lang.geoT_afterFinish')</p>
                    </div>
                    <div class="basis-1/2 ml-4 lg:mt-0 mt-8">
                        <img src="https://pixy.org/src/58/thumbs350/582432.jpg" class="mx-auto w-72 h-52"/>
                    </div>
                </div>
                <div class="w-4/5 mx-auto mt-20">badges
                    <hr>
                </div>
                <div class="flex lg:flex-row flex-col mt-10 w-4/5 mx-auto">
                    <div class="basis-1/2">
                         <a href="categories/1">
                            <button  class="font-sans  text-2xl  font-medium bg-green-600 text-[#fff] hover:bg-green-500 px-10 py-4 rounded">
                                @lang('lang.geoT_createTask')
                            </button>
                        </a>
                    </div>
                    <div class="basis-1/2 mx-auto lg:mt-0 mt-6">
                        <p>@lang('lang.geoT_itCanBe')<a href="/verification" class="text-blue-500 underline hover:text-orange-400">@lang('lang.geoT_forPerf')</a></p>
                    </div>
                </div>
            </div>
        </div>

</div>


@endsection
