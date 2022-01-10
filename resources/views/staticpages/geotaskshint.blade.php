@extends("layouts.app")

@section('content')

<div class="container w-4/5 mx-auto">

        <div class="grid grid-cols-5 justify-center">
            <div class="col-span-1 mt-7">
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
            <div class="col-span-4 ml-1">
                <div class="w-4/5">
                    <h1 class="font-bold text-5xl">@lang('lang.geoT_titleHow')</h1>
                    <p class="w-4/5 mt-10">@lang('lang.geoT_aboutComp')
                    </p><br>
                    <p class="w-4/5">@lang('lang.geoT_perSec1')<a href="/verification" class="text-blue-600 hover:text-orange-500">@lang('lang.geoT_perSec2')</a> @lang('lang.geoT_perSec3')<a href="/security" class="text-blue-600 hover:text-orange-500">@lang('lang.geoT_perSec4')</a></p>
                    <iframe class="w-full mb-10 h-96 mt-10" src="https://www.youtube.com/embed/VjDI4YkJG7E"></iframe>

                    <h1 class="font-bold text-4xl mt-10 text-center">@lang('lang.geoT_howToCreate')</h1>
                    <h3 class="mt-10 text-xl text-center">@lang('lang.geoT_chooseCat')</h3>
                    <img src="https://assets.youdo.com/next/_next/static/images/macbook-air2-c3eb51eecd4c26af441f36f2993b2d29.jpg" class="mx-auto"/>
                    <p class="text-xl text-center mt-10">@lang('lang.geoT_giveDetails')</p>
                    <img src="https://assets.youdo.com/next/_next/static/images/table-i-need-be98b0992c2295b91e61779ed27c3c94.jpg" class="mx-auto"/>
                </div>
            </div>
        </div>
        <div class="w-4/5 mx-auto mt-20">
            <hr>
        </div>
        <div class="grid grid-cols-2 mt-10 w-4/5 mx-auto">
            <div class="col-span-1 my-auto">
                <div class="w-3/5 mx-auto">
                    <h4 class="text-2xl">@lang('lang.geoT_takeFeedback')</h4>
                    <p>@lang('lang.geoT_afterCreating')</p>
                </div>
            </div>
            <div class="col-span-1">
                <img src="https://assets.youdo.com/next/_next/static/images/create_task-8a473693dc5d602b2ccfe8207576a63d.jpg" class="w-4/5 mx-auto"/>
            </div>
        </div>
        <div class="grid grid-cols-2 mt-10 w-4/5 mx-auto">
            <div class="col-span-1">
                <img src="https://assets.youdo.com/next/_next/static/images/executive_selection-2432f1d3f0d4f10880fc790d2cb390e4.jpg" class="w-4/5 mx-auto"/>
            </div>
            <div class="col-span-1 my-auto">
                <div class="w-3/5 mx-auto">
                    <h4 class="text-2xl">@lang('lang.geoT_chooseBest')</h4>
                    <p>@lang('lang.geoT_chooseByPrice')</p>
                </div>
            </div>
        </div>
        <div class="grid grid-cols-2 mt-10 w-4/5 mx-auto">
            <div class="col-span-1 my-auto">
                <div class="w-3/5 mx-auto">
                    <h4 class="text-2xl">@lang('lang.geoT_endingTask')</h4>
                    <p>@lang('lang.geoT_afterFinish')</p>
                </div>
            </div>
            <div class="col-span-1">
                <img src="https://assets.youdo.com/next/_next/static/images/task_complete-3b15890cc07d8a0317d3382194fe5ebf.jpg" class="mx-auto"/>
            </div>
        </div>
        <div class="w-4/5 mx-auto mt-20">badges
            <hr>
        </div>
        <div class="grid grid-cols-2 w-4/5 mx-auto my-20">
            <div class="w-4/5 mx-auto text-center py-5 col-span-1 h-auto rounded-xl bg-green-600 hover:bg-green-500">
                <a href="categories/1" class="text-4xl text-white">@lang('lang.geoT_createTask')</a>
            </div>
            <div class="col-span-1 py-auto py-5">
                <p>@lang('lang.geoT_itCanBe')<a href="/verification" class="text-blue-500 underline hover:text-orange-400">@lang('lang.geoT_forPerf')</a></p>
            </div>
        </div>


</div>


@endsection
