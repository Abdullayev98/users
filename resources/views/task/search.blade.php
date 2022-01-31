@extends("layouts.app")

@section("content")

    <div class="mx-auto w-9/12 my-16">
        <div class="grid lg:grid-cols-5 grid-cols-5 container mx-auto text-base">
            <div class="col-span-3">
                <div class="w-full bg-yellow-50 my-5 rounded-md">
                    <div class="px-5 py-5">
                    <!-- <form action="{{route('search')}}" method="get"> -->
                        <div class="grid grid-cols-4 gap-4 mb-3">

                            <div class="sm:inline-flex block w-full col-span-4">
                            <!-- <input class="focus:outline-none  w-10/12 text-black-700 border border-black rounded mr-4 px-1" type="text" placeholder="Поиск по ключевым словам" name="s" value="{{$s ?? ''}}" aria-label="Full name"> -->
                                <input id="filter" type="text"
                                       class="text-[15px] w-10/12 p-2 px-3 text-black-700 border-2 rounded-md border-neutral-400 focus:border-sky-500 focus:shadow-sm focus:shadow-sky-500 mr-4"
                                       placeholder="@lang('lang.search_byKey')">
                                <button
                                    class="sm:w-2/12 w-4/12 bg-green-500 hover:bg-green-600 ml-1 py-1 px-1 rounded-md sm:mt-0 mt-4 text-white"
                                >@lang('lang.search_find')</button>
                            </div>

                            <div class="md:inline-flex  block w-full col-span-4">
                                <div class="w-8/12 2xl:6/12 xl:w-9/12 lg:w-8/12 md:w-9/12 relative">
                                    <label class="text-sm md:text-xs mb-1 text-neutral-400">@lang('lang.search_location')</label>
                                    <div class="bg-white text-[14px] address float-left p-2 px-3 text-black-700 border-2 rounded-md border-neutral-400 focus:border-sky-500 focus:shadow-sm focus:shadow-sky-500  w-full text-black-700">
                                        <input
                                            class="float-left bg-transparent border-0 w-11/12 h-full focus:outline-none"
                                        type="text" id="suggest">
                                        <button id="mpshow" class="flex-shrink-0 focus:outline-none float-right text-teal-500 mt-1 text-sm rounded" type="button">
                                            <svg class="h-4 w-4 text-purple-500"  width="12" height="12" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">  <path stroke="none" d="M0 0h24v24H0z"/>  <path d="M21 3L14.5 21a.55 .55 0 0 1 -1 0L10 14L3 10.5a.55 .55 0 0 1 0 -1L21 3" /></svg>
                                        </button>
                                    </div>
                                </div>

                                <div class="w-5/12 2xl:w-3/12 xl:w-4/12 xl:ml-2 lg:w-4/12 lg:ml-1 md:w-4/12 md:ml-1 sm:w-5/12">
                                    <label class="text-sm md:text-xs mb-1 text-neutral-400">@lang('lang.search_byMapRadius')</label>
                                    <select name="" id="selectGeo" class="text-[14px] py-2 px-1 text-black-700 border-2 rounded-md border-neutral-400 focus:border-sky-500 focus:shadow-sm focus:shadow-sky-500 text-lg-left text-black-700 rounded" onchange="r=$('#selectGeo').val(); enDis(r); map_pos(k)">
                                        <option value="0">@lang('lang.search_byMapRadiusNo')</option>
                                        <option value="1.5">1.5 km</option>
                                        <option value="3">3 km</option>
                                        <option value="5">5 km</option>
                                        <option value="10">10 km</option>
                                        <option value="15">15 km</option>
                                        <option value="20">20 km</option>
                                        <option value="30">30 km</option>
                                        <option value="50">50 km</option>
                                        <option value="75">75 km</option>
                                        <option value="100">100 km</option>
                                        <option value="200">200 km</option>
                                    </select>
                                </div>
                                <div class="w-5/12 2xl:w-3/12 xl:w-4/12 xl:ml-2 lg:w-5/12 lg:ml-1 md:w-4/12 md:ml-1 sm:w-5/12">
                                    <label class="text-sm md:text-xs mb-1 text-neutral-400">@lang('lang.search_priceBy')</label>
                                    <input type="text" maxlength="7" class="w-full border-md p-2 text-black-700 border-2 rounded-md border-neutral-400 focus:border-sky-500 focus:shadow-sm focus:shadow-sky-500  text-black-700" placeholder="UZS" id="price">
                                </div>
                            </div>
                            <div class="inline-flex  block w-full col-span-4">
                            <label class="inline-flex items-center mt-3">
                                <input type="checkbox" class="form-checkbox checkboxByAs  h-5 w-5 text-orange-400"
                                ><span class="sm:ml-2 ml-0.5 text-gray-700 xl:text-base lg:text-sm text-xs">@lang('lang.search_remoteJob')</span>
                            </label>
                            <label class="inline-flex items-center mt-3 xl:ml-3 sm:ml-2 ml-0.5">
                                <input type="checkbox" class="form-checkbox  h-5 w-5 text-orange-400"
                                ><span class="sm:ml-2  ml-0.5 text-gray-700 xl:text-base lg:text-sm text-xs">@lang('lang.search_noCallback')</span>
                            </label>
                            <label class="inline-flex items-center mt-3 xl:ml-3 sm:ml-2 ml-0.5">
                                <input type="checkbox" class="form-checkbox  h-5 w-5 text-orange-400"
                                ><span class="sm:ml-2  ml-0.5 text-gray-700 xl:text-base lg:text-sm text-xs">@lang('lang.search_onlyVacancy')</span>
                            </label>
                            </div>
                        </div>
                        <!-- </form> -->
                    </div>
                </div>

{{--                <div class="col-span-2 lg:col-span-1 lg:hidden block mx-4 lg:mt-0 mt-8 mb-4">--}}
{{--                    <div id="map1" class="h-60 my-5 rounded-lg w-full static"></div>--}}
{{--                    <div class="w-full h-full">--}}
{{--                        <div class="max-w-lg mx-auto">--}}
{{--                            <label--}}
{{--                                class="font-medium rounded-lg text-sm text-center inline-flex items-center ml-5 hover:cursor-pointer">--}}
{{--                                <input type="checkbox" class="all_cat2 mr-1 hover:cursor-pointer"/> @lang('lang.search_allCat')--}}
{{--                            </label>--}}
{{--                            <div class="w-full my-1 for_check2">--}}
{{--                                    @foreach (\TCG\Voyager\Models\Category::query()->where('parent_id', null)->get() as $category)--}}
{{--                                    <div x-data={show:false} class="rounded-sm">--}}
{{--                                        <div class="border border-b-0 bg-gray-100" id="headingOne">--}}
{{--                                            <button @click="show=!show"--}}
{{--                                                    class="underline text-blue-500 hover:text-blue-700 focus:outline-none"--}}
{{--                                                    type="button">--}}
{{--                                                <svg class="w-4 h-4 rotate -rotate-90" fill="none"--}}
{{--                                                     stroke="currentColor" viewBox="0 0 24 24"--}}
{{--                                                     xmlns="http://www.w3.org/2000/svg">--}}
{{--                                                    <path stroke-linecap="round" stroke-linejoin="round"--}}
{{--                                                          stroke-width="2" d="M19 9l-7 7-7-7"></path>--}}
{{--                                                </svg>--}}
{{--                                            </button>--}}
{{--                                            <label--}}
{{--                                                class="font-medium rounded-lg text-sm text-center inline-flex items-center hover:cursor-pointer">--}}
{{--                                                <input type="checkbox" class="par_cat2 mr-1 hover:cursor-pointer"--}}
{{--                                                       name="{{$category->id}}"--}}
{{--                                                       id="par{{$category->id}}"/> {{$category->getTranslatedAttribute('name',Session::get('lang') , 'fallbackLocale')}}--}}
{{--                                            </label>--}}
{{--                                        </div>--}}
{{--                                        <div x-show="show" class="border border-b-0 px-8 py-0">--}}
{{--                                                @foreach (\TCG\Voyager\Models\Category::query()->where('parent_id', $category->id)->get() as $category2)--}}
{{--                                                <div class="par{{$category->id}}">--}}
{{--                                                    <label--}}
{{--                                                        class="font-medium rounded-lg text-sm text-left inline-flex items-baseline hover:cursor-pointer">--}}
{{--                                                        <input type="checkbox"--}}
{{--                                                               class="chi_cat2 mr-1 hover:cursor-pointer"--}}
{{--                                                               name="{{$category2->id}}"--}}
{{--                                                               id="par{{$category->id}}"/> {{$category2->getTranslatedAttribute('name',Session::get('lang') , 'fallbackLocale')}}--}}
{{--                                                    </label>--}}
{{--                                                </div>--}}
{{--                                            @endforeach--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                @endforeach--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <script src="https://unpkg.com/@themesberg/flowbite@latest/dist/flowbite.bundle.js"></script>--}}
{{--                    </div>--}}
{{--                </div>--}}
                <div class="">
                    <div class="col-span-2 lg:col-span-1 lg:block hidden mx-4 lg:mt-0 mt-32">
                        <div class="big-map static">

                        </div>
                    </div>
                    <div class="b-tasks-sorting">
                        <div class="inline-flex items-center my-5">
                            <span class="title__994cd">@lang('lang.search_filter')</span>

                            <button class="mx-5 byid">@lang('lang.search_byDate')</button>

                            <button id="srochnost" class="  mx-5 active">@lang('lang.search_byHurry')</button>
                            <button id="as" data-sort-type="3"  class="mx-5 ">@lang('lang.search_byRemote')</button>
                        </div>
                    </div>
                    <div id="scrollbar" class="w-full h-full blog1">
                        <div class="w-full w-full">
                            <div class="show_tasks">
                                {{--Show Tasks list --}}
                            </div>
                        </div>
                        <div class="w-full h-full lM" hidden>
                            <ul class="text-center">
                                <li class="text-center">@lang('lang.search_shown')&nbsp;<span id="pnum"></span>&nbsp;из&nbsp;<span id="snum"></span></li>
                                <li><button id="loadMore" class="butt mt-2 px-5 py-1 border border-black rounded hover:cursor-pointer" onclick="tasks_show(), maps_show();">@lang('lang.search_showMore')</button></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-span-5 lg:col-span-2 lg:block hidden mx-4 lg:mt-0 mt-32">
                <div class="small-map static">
                    {{--Map2 show --}}
                </div>
                <div class="w-full h-full">
                    <div class="max-w-lg mx-auto">
                        <label class="inline-flex items-center mt-3">
                            <input type="checkbox" class="form-checkbox all_cat mr-1 h-5 w-5 text-orange-400">
                            <span class="ml-2 text-gray-700">@lang('lang.search_allCat')</span>
                        </label>
                        <div class="w-full my-1 for_check">
                            @foreach (\TCG\Voyager\Models\Category::query()->where('parent_id', null)->get() as $category)
                                <div x-data={show:false} class="rounded-sm">
                                    <div class=" mb-2" id="headingOne">
                                        <button @click="show=!show"
                                                class="underline text-gray-500 hover:text-blue-700 focus:outline-none"
                                                type="button">
                                            <svg class="w-4 h-4 rotate -rotate-90" fill="none"
                                                 stroke="currentColor" viewBox="0 0 24 24"
                                                 xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                      stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                            </svg>
                                        </button>
                                        <label class="inline-flex items-center mt-3 hover:cursor-pointer">
                                            <input type="checkbox" class="form-checkbox par_cat mr-1 h-5 w-5 text-orange-400 hover:cursor-pointer"
                                                   name="{{$category->id}}"
                                                   id="par{{$category->id}}"><span class="ml-2 text-gray-700">{{$category->getTranslatedAttribute('name',Session::get('lang') , 'fallbackLocale')}}</span>
                                        </label>
                                    </div>
                                    <div x-show="show" class="border-b-0 px-8 py-0">
                                            @foreach (\TCG\Voyager\Models\Category::query()->where('parent_id', $category->id)->get() as $category2)
                                            <div class="par{{$category->id}}">
                                                <label class="inline-flex items-center mt-3 hover:cursor-pointer">
                                                    <input type="checkbox" class="form-checkbox chi_cat mr-1 h-5 w-5 text-orange-400 hover:cursor-pointer"
                                                           name="{{$category2->id}}"
                                                           id="par{{$category->id}}"><span class="ml-2 text-gray-700">{{$category2->getTranslatedAttribute('name',Session::get('lang') , 'fallbackLocale')}}</span>
                                                </label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <script src="https://unpkg.com/@themesberg/flowbite@latest/dist/flowbite.bundle.js"></script>
                </div>
            </div>
        </div>
    </div>

    <style>
        [class*="copyrights-pane"]
        {display: none !important;}
    </style>

    <link href="{{ asset('/css/checkboxes.css') }}" rel="stylesheet">

    <div class="w-full" x-data="topBtn">
        <button onclick="topFunction()" id="myBtn" title="Go to top" class="fixed z-10 hidden p-3 bg-gray-100 rounded-full shadow-md bottom-5 right-24 animate-bounce">
            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 10l7-7m0 0l7 7m-7-7v18">
                </path>
            </svg>
        </button>
    </div>

@endsection

@section("javasript")

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

    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <script src="https://api-maps.yandex.ru/2.1/?apikey=f4b34baa-cbd1-432b-865b-9562afa3fcdb&lang=@lang('lang.lang_for_map')" type="text/javascript"></script>
    <script src="{{asset('js/search_tasks.js')}}"></script>
    <script type="text/javascript">
        let allCheck=1, r=0, m=1, p=10, s=0, sGeo=0, dl=0, k=1;
        let userCoordinates=[[],[]];
        enDis(r);
        first_ajax('all','');
        module.exports = {
            plugins: [require('@tailwindcss/forms'),]
        };
        function first_ajax(id, name) {
            $.ajax({
                url: "{{route('tasks.search')}}",
                // dataType: 'json',
                data: {orderBy: id, fltr: name},
                type: 'GET',
                success: function (data) {
                    dataAjax = $.parseJSON(JSON.stringify(data));
                    fiveInOne1();
                },
                error: function () {
                    alert("Ajax ishida xatolik...");
                }
            });
        }

        {{--function img_show() {--}}
        {{--    $(".show_tasks").empty();--}}
        {{--    $(".small-map").empty();--}}
        {{--    $(".big-map").empty();--}}
        {{--    $(".show_tasks").append(--}}
        {{--        `<div class="grid grid-cols-3 gap-3 content-center w-full h-full">--}}
        {{--        <div></div>--}}
        {{--        <div><img src="{{asset('/images/notlike.png')}}" class="w-full h-full"></div>--}}
        {{--        <div></div>--}}
        {{--        <div class="col-span-3 text-center w-full h-full">--}}
        {{--            <p class="text-3xl"><b>Задания не найдены</b></p>--}}
        {{--            <p class="text-lg">Попробуйте уточнить запрос или выбрать другие категории</p>--}}
        {{--        </div>--}}
        {{--        </div>`--}}
        {{--    );--}}
        {{--    $('.lM').attr("hidden","hidden")--}}
        {{--}--}}

        {{--function tasks_show(){--}}
        {{--    let i=1;--}}
        {{--    $('.print_block').each(function() {--}}
        {{--        if ((this.hidden) && (i <= p) && (s <= dl))--}}
        {{--        {--}}
        {{--            this.hidden = false;--}}
        {{--            i++--}}
        {{--            s++--}}
        {{--        }--}}
        {{--    });--}}
        {{--    $('.lM').removeAttr('hidden');--}}
        {{--    $('#pnum').html(s)--}}
        {{--    $('#snum').html(dl)--}}
        {{--    if (s==dl){--}}
        {{--        $('.butt').attr("disabled","disabled")--}}
        {{--    }--}}
        {{--}--}}

    </script>

@endsection
