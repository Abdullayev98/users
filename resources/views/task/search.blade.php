@extends("layouts.app")

@section("content")

    <div class="mx-auto w-9/12 my-16">

        <div class="border-b container mx-auto">
            <!-- Tabs -->
            <ul id="tabs" class="inline-flex w-full">
                <li class="font-semibold rounded-t mr-4 pb-3"><a id="default-tab" href="#first">@lang('lang.search_allTasks')</a></li>
                <li class="font-semibold rounded-t pb-3"><a href="#second">@lang('lang.search_recomend')</a></li>
            </ul>
        </div>

        <!-- Tab Contents -->
        <div id="tab-contents">
            <div id="first">

                <div class="grid lg:grid-cols-3 grid-cols-2 container mx-auto">
                    <div class="col-span-2">
                        <div class="w-full bg-[#f8f7ee] my-5 rounded-md">
                            <div class="px-5 py-5">
                            <!-- <form action="{{route('search')}}" method="get"> -->
                                <div class="grid grid-cols-4 gap-4 mb-3">

                                    <div class="sm:inline-flex block w-full col-span-4">
                                    <!-- <input class="w-10/12 text-black-700 border border-black rounded mr-4 px-1" type="text" placeholder="Поиск по ключевым словам" name="s" value="{{$s ?? ''}}" aria-label="Full name"> -->
                                        <input id="filter" type="text"
                                               class="w-10/12 p-2 px-3 text-black-700 border-2 rounded-md border-neutral-400 focus:border-sky-500 focus:shadow-sm focus:shadow-sky-500 mr-4"
                                               placeholder="@lang('lang.search_byKey')">
                                        <button
                                            class="sm:w-2/12 w-4/12 bg-lime-500 hover:bg-lime-600 ml-1 py-1 px-1 rounded-md sm:mt-0 mt-4 text-white"
                                            >@lang('lang.search_find')</button>
                                    </div>

                                    <div class="md:inline-flex block w-full col-span-4">
                                        <div class="w-7/12 lg:w-7/12 md:w-7/12">
                                            <label class="text-md mb-1 text-neutral-400">@lang('lang.search_location')</label>
                                            <input
                                                class="address p-2 px-3 text-black-700 border-2 rounded-md border-neutral-400 focus:border-sky-500 focus:shadow-sm focus:shadow-sky-500  w-full text-black-700"
                                                type="text" id="suggest">
                                            <button id="mpshow" class="flex-shrink-0 focus:outline-none text-teal-500 text-sm mt-3 ml-2 rounded absolute left-[38%]" type="button">
                                                <svg class="h-4 w-4 text-purple-500"  width="12" height="12" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">  <path stroke="none" d="M0 0h24v24H0z"/>  <path d="M21 3L14.5 21a.55 .55 0 0 1 -1 0L10 14L3 10.5a.55 .55 0 0 1 0 -1L21 3" /></svg>
                                            </button>
                                        </div>
<<<<<<< HEAD
                                        <div class="sm:w-1/5 w-1/3 sm:ml-5 ml-0">
                                            <label class="text-md mb-1 text-neutral-400">@lang('lang.search_byMapRadius')</label>
                                            <select name="" id="selectGeo" class="py-2 px-3 text-black-700 border-2 rounded-md border-neutral-400 focus:border-sky-500 focus:shadow-sm focus:shadow-sky-500  text-lg-left text-black-700 rounded py-1 w-full" onchange="r=$('#selectGeo').val();">
=======
                                        <div class="w-2/5 xl:w-1/4 xl:ml-1 lg:w-2/6 lg:ml-1 md:w-3/12  md:ml-2 ml-0">
                                            <label class="text-sm lg:text-sm md:text-xs mb-1 text-neutral-400">@lang('lang.search_byMapRadius')</label>
                                            <select name="" id=""
                                                    class="  py-2 px-3 text-black-700 border-2 rounded-md border-neutral-400 focus:border-sky-500 focus:shadow-sm focus:shadow-sky-500  text-lg-left text-black-700 rounded py-1 w-full">
>>>>>>> b1de539386e8121c3c10c8e9f9e09d62f463abdc
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
                                        <div class="w-2/5 xl:w-1/4 xl:ml-1 lg:w-2/6 lg:ml-1 md:w-3/12  md:ml-2 ml-0">
                                            <label class=" text-sm  md:text-xs mb-1 text-neutral-400">@lang('lang.search_priceBy')</label>
                                            <input type="text" maxlength="7"
                                                   class="w-full  border-md  p-2 px-3 text-black-700 border-2 rounded-md border-neutral-400 focus:border-sky-500 focus:shadow-sm focus:shadow-sky-500  text-black-700"
                                                   placeholder="UZS" id="price">
                                        </div>
                                    </div>
                                    <label class="inline-flex items-center mt-3">
                                        <input type="checkbox" class="form-checkbox  h-5 w-5 text-orange-400"
                                        ><span class="ml-2 text-gray-700">@lang('lang.search_remoteJob')</span>
                                    </label>
                                    <label class="inline-flex items-center mt-3">
                                        <input type="checkbox" class="form-checkbox  h-5 w-5 text-orange-400"
                                        ><span class="ml-2 text-gray-700">@lang('lang.search_noCallback')</span>
                                    </label>
                                    <label class="inline-flex items-center mt-3">
                                        <input type="checkbox" class="form-checkbox  h-5 w-5 text-orange-400"
                                        ><span class="ml-2 text-gray-700">@lang('lang.search_onlyVacancy')</span>
                                    </label>
                                </div>


                                <!-- </form> -->
                            </div>
                        </div>

                        <div class="col-span-2 lg:col-span-1 lg:hidden block mx-4 lg:mt-0 mt-8 mb-4">
                            <div id="map1" class="h-60 my-5 rounded-lg w-full static"></div>
                            <div class="w-full h-full">

                                <div class="max-w-lg mx-auto">

                                    <label
                                        class="font-medium rounded-lg text-sm text-center inline-flex items-center ml-5 hover:cursor-pointer">
                                        <input type="checkbox"
                                               class="all_cat2 mr-1 hover:cursor-pointer"/> @lang('lang.search_allCat')
                                    </label>

                                    <div class="w-full my-1 for_check2">

                                        @foreach (\TCG\Voyager\Models\Category::withTranslations(['ru', 'uz'])->where('parent_id', null)->get() as $category)
                                            <div x-data={show:false} class="rounded-sm">
                                                <div class="border border-b-0 bg-gray-100" id="headingOne">
                                                    <button @click="show=!show"
                                                            class="underline text-blue-500 hover:text-blue-700 focus:outline-none"
                                                            type="button">
                                                        <svg class="w-4 h-4 rotate -rotate-90" fill="none"
                                                             stroke="currentColor" viewBox="0 0 24 24"
                                                             xmlns="http://www.w3.org/2000/svg">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                  stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                                        </svg>
                                                    </button>
                                                    <label
                                                        class="font-medium rounded-lg text-sm text-center inline-flex items-center hover:cursor-pointer">
                                                        <input type="checkbox"
                                                               class="par_cat2 mr-1 hover:cursor-pointer"
                                                               name="{{$category->id}}"
                                                               id="par{{$category->id}}"/> {{$category->getTranslatedAttribute('name',Session::get('lang') , 'fallbackLocale')}}
                                                    </label>
                                                </div>
                                                <div x-show="show" class="border border-b-0 px-8 py-0">
                                                    @foreach (\TCG\Voyager\Models\Category::withTranslations(['ru', 'uz'])->where('parent_id', $category->id)->get() as $category2)

                                                        <div class="par{{$category->id}}">
                                                            <label
                                                                class="font-medium rounded-lg text-sm text-left inline-flex items-baseline hover:cursor-pointer">
                                                                <input type="checkbox"
                                                                       class="chi_cat2 mr-1 hover:cursor-pointer"
                                                                       name="{{$category2->id}}"
                                                                       id="par{{$category->id}}"/> {{$category2->getTranslatedAttribute('name',Session::get('lang') , 'fallbackLocale')}}
                                                            </label>
                                                        </div>

                                                    @endforeach
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>

                                </div>

                                <script
                                    src="https://unpkg.com/@themesberg/flowbite@latest/dist/flowbite.bundle.js"></script>

                            </div>
                        </div>

                        <div class="">
                            <div class="col-span-2 lg:col-span-1 lg:block hidden mx-4 lg:mt-0 mt-32">
                                <div class="big-map static">

                                </div>
                            </div>
                            <div class="b-tasks-sorting">
                                <div class="inline-flex items-center my-5">
                                    <span class="title__994cd">@lang('lang.search_filter')</span>
                                    <a href="/task-search" data-sort-type="1" class="mx-5">@lang('lang.search_byDate')</a>
                                    <button data-sort="nomer"  data-sort-type="2"  class="srt-nomer focus:outline-none mx-5 active">@lang('lang.search_byHurry')</button>
                                    <button id="as" data-sort-type="3"  class="mx-5 ">@lang('lang.search_byRemote')</button>
                                </div>
                            </div>
                            <div id="scrollbar" class="w-full h-full blog1">
                                <div class="w-full w-full">
                                    <div class="show_tasks">
                                        {{--Show Tasks list --}}
                                    </div>
                                </div>
                                <div class="grid grid-cols-3 gap-3 content-center w-full h-full">
                                    <div></div>
                                    <div class="butt col-span-3 text-center w-full h-full">
                                        <p class="text-center">@lang('lang.search_shown')</p>
                                        <button class="mt-2 px-5 py-1 border border-black rounded hover:cursor-pointer"
                                        onclick="tasks_show()">@lang('lang.search_showMore')</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-span-2 lg:col-span-1 lg:block hidden mx-4 lg:mt-0 mt-32">
                        <div class="small-map static">

                        </div>
                        <div class="w-full h-full">
                            <div class="max-w-lg mx-auto">
                                <label class="inline-flex items-center mt-3">
                                    <input type="checkbox" class="form-checkbox all_cat mr-1  h-5 w-5 text-orange-400"
                                    ><span class="ml-2 text-gray-700">@lang('lang.search_allCat')</span>
                                </label>
                                {{--                                <label--}}
                                {{--                                    class="font-medium rounded-lg text-sm text-center inline-flex items-center ml-5 hover:cursor-pointer">--}}
                                {{--                                    <input type="checkbox"--}}
                                {{--                                           class="all_cat mr-1 hover:cursor-pointer"/> @lang('lang.search_allCat')--}}
                                {{--                                </label>--}}

                                <div class="w-full my-1 for_check">

                                    @foreach (\TCG\Voyager\Models\Category::withTranslations(['ru', 'uz'])->where('parent_id', null)->get() as $category)
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
                                                <label class="inline-flex items-center mt-3">
                                                    <input type="checkbox" class="form-checkbox par_cat mr-1  hover:cursor-pointer h-5 w-5 text-orange-400"
                                                           name="{{$category->id}}"
                                                           id="par{{$category->id}}"><span class="ml-2 text-gray-700">{{$category->getTranslatedAttribute('name',Session::get('lang') , 'fallbackLocale')}}</span>
                                                </label>
                                                {{--                                                <label--}}
                                                {{--                                                    class="font-medium rounded-lg text-sm text-center inline-flex items-center hover:cursor-pointer">--}}

                                                {{--                                                    <input type="checkbox" class="par_cat mr-1  hover:cursor-pointer"--}}
                                                {{--                                                           name="{{$category->id}}"--}}
                                                {{--                                                           id="par{{$category->id}}"/> {{$category->getTranslatedAttribute('name',Session::get('lang') , 'fallbackLocale')}}--}}
                                                {{--                                                </label>--}}
                                            </div>
                                            <div x-show="show" class="border-b-0 px-8 py-0">
                                                @foreach (\TCG\Voyager\Models\Category::withTranslations(['ru', 'uz'])->where('parent_id', $category->id)->get() as $category2)

                                                    <div class="par{{$category->id}}">
                                                        <label class="inline-flex items-center mt-3">
                                                            <input type="checkbox" class="form-checkbox chi_cat mr-1   hover:cursor-pointer h-5 w-5 text-orange-400"
                                                                   name="{{$category2->id}}"
                                                                   id="par{{$category->id}}"><span class="ml-2 text-gray-700">{{$category2->getTranslatedAttribute('name',Session::get('lang') , 'fallbackLocale')}}</span>
                                                        </label>
                                                        {{--                                                        <label--}}
                                                        {{--                                                            class="font-medium rounded-lg text-sm text-left inline-flex items-baseline hover:cursor-pointer">--}}
                                                        {{--                                                            <input type="checkbox"--}}
                                                        {{--                                                                   class="chi_cat mr-1 hover:cursor-pointer"--}}
                                                        {{--                                                                   name="{{$category2->id}}"--}}
                                                        {{--                                                                   id="par{{$category->id}}"/> {{$category2->getTranslatedAttribute('name',Session::get('lang') , 'fallbackLocale')}}--}}
                                                        {{--                                                        </label>--}}
                                                    </div>

                                                @endforeach
                                            </div>
                                        </div>
                                    @endforeach
                                </div>

                            </div>

                            <script
                                src="https://unpkg.com/@themesberg/flowbite@latest/dist/flowbite.bundle.js"></script>

                        </div>
                    </div>
                </div>

            </div>

            <div id="second" class="hidden">

<<<<<<< HEAD
{{--                <div class="grid lg:grid-cols-3 grid-cols-2 container mx-auto">--}}
{{--                    <div class="col-span-2">--}}
{{--                        <div class="w-full bg-[#f8f7ee] my-5 rounded-md">--}}
{{--                        </div>--}}

{{--                        <div class="col-span-2 lg:col-span-1 lg:hidden block mx-4 lg:mt-0 mt-8 mb-4">--}}
{{--                            <div id="map1" class="h-60 my-5 rounded-lg w-full static"></div>--}}
{{--                            <div class="w-full h-full">--}}

{{--                                <div class="max-w-lg mx-auto">--}}

{{--                                    <label--}}
{{--                                        class="font-medium rounded-lg text-sm text-center inline-flex items-center ml-5 hover:cursor-pointer">--}}
{{--                                        <input type="checkbox"--}}
{{--                                               class="all_cat2 mr-1 hover:cursor-pointer"/> @lang('lang.search_allCat')--}}
{{--                                    </label>--}}

{{--                                    <div class="w-full my-1 for_check2">--}}

{{--                                        @foreach (\TCG\Voyager\Models\Category::withTranslations(['ru', 'uz'])->where('parent_id', null)->get() as $category)--}}
{{--                                            <div x-data={show:false} class="rounded-sm">--}}
{{--                                                <div class="border border-b-0 bg-gray-100" id="headingOne">--}}
{{--                                                    <button @click="show=!show"--}}
{{--                                                            class="underline text-blue-500 hover:text-blue-700 focus:outline-none"--}}
{{--                                                            type="button">--}}
{{--                                                        <svg class="w-4 h-4 rotate -rotate-90" fill="none"--}}
{{--                                                             stroke="currentColor" viewBox="0 0 24 24"--}}
{{--                                                             xmlns="http://www.w3.org/2000/svg">--}}
{{--                                                            <path stroke-linecap="round" stroke-linejoin="round"--}}
{{--                                                                  stroke-width="2" d="M19 9l-7 7-7-7"></path>--}}
{{--                                                        </svg>--}}
{{--                                                    </button>--}}
{{--                                                    <label--}}
{{--                                                        class="font-medium rounded-lg text-sm text-center inline-flex items-center hover:cursor-pointer">--}}
{{--                                                        <input type="checkbox"--}}
{{--                                                               class="par_cat2 mr-1 hover:cursor-pointer"--}}
{{--                                                               name="{{$category->id}}"--}}
{{--                                                               id="par{{$category->id}}"/> {{$category->getTranslatedAttribute('name',Session::get('lang') , 'fallbackLocale')}}--}}
{{--                                                    </label>--}}
{{--                                                </div>--}}
{{--                                                <div x-show="show" class="border border-b-0 px-8 py-0">--}}
{{--                                                    @foreach (\TCG\Voyager\Models\Category::withTranslations(['ru', 'uz'])->where('parent_id', $category->id)->get() as $category2)--}}

{{--                                                        <div class="par{{$category->id}}">--}}
{{--                                                            <label--}}
{{--                                                                class="font-medium rounded-lg text-sm text-left inline-flex items-baseline hover:cursor-pointer">--}}
{{--                                                                <input type="checkbox"--}}
{{--                                                                       class="chi_cat2 mr-1 hover:cursor-pointer"--}}
{{--                                                                       name="{{$category2->id}}"--}}
{{--                                                                       id="par{{$category->id}}"/> {{$category2->getTranslatedAttribute('name',Session::get('lang') , 'fallbackLocale')}}--}}
{{--                                                            </label>--}}
{{--                                                        </div>--}}

{{--                                                    @endforeach--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        @endforeach--}}
{{--                                    </div>--}}

{{--                                </div>--}}

{{--                                <script--}}
{{--                                    src="https://unpkg.com/@themesberg/flowbite@latest/dist/flowbite.bundle.js"></script>--}}

{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="">--}}
{{--                            <div id="scrollbar" class="w-full h-full blog1">--}}
{{--                                <div class="w-full w-full">--}}
{{--                                    <div class="show_tasks">--}}
{{--                                        --}}{{--Show Tasks list --}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="grid grid-cols-3 gap-3 content-center w-full h-full">--}}
{{--                                    <div></div>--}}
{{--                                    <div class="butt col-span-3 text-center w-full h-full" style="display: none">--}}
{{--                                        <p class="text-center">@lang('lang.search_shown')</p>--}}
{{--                                        <button class="mt-2 px-5 py-1 border border-black rounded hover:cursor-pointer"--}}
{{--                                                onclick="tasks_list(k)">@lang('lang.search_showMore')</button>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                    <div class="col-span-2 lg:col-span-1 lg:block hidden mx-4 lg:mt-0 mt-32">--}}
{{--                        <div class="small-map static">--}}

{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}

=======
                                <script
                                    src="https://unpkg.com/@themesberg/flowbite@latest/dist/flowbite.bundle.js"></script>

                            </div>
                        </div>

                        <div class="">
                            <div id="scrollbar" class="w-full h-full blog1">
                                <div class="w-full w-full">
                                    <div class="show_tasks">
                                        {{--Show Tasks list --}}
                                    </div>
                                </div>
                                <div class="grid grid-cols-3 gap-3 content-center w-full h-full">
                                    <div></div>
                                    <div class="butt col-span-3 text-center w-full h-full" style="display: none">
                                        <p class="text-center">@lang('lang.search_shown')</p>
                                        <button class="mt-2 px-5 py-1 border border-black rounded hover:cursor-pointer"
                                                onclick="tasks_list(k)">@lang('lang.search_showMore')</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-span-2 lg:col-span-1 lg:block hidden mx-4 lg:mt-0 mt-32">
                        <div class="small-map static">

                        </div>
                    </div>
                </div>
>>>>>>> b1de539386e8121c3c10c8e9f9e09d62f463abdc
            </div>
        </div>
    </div>

    <style>
        [class*="copyrights-pane"] {
            display: none !important;
        }
    </style>
    <link href="https://tailwindcomponents.com/css/component.checkboxes.css" rel="stylesheet">
@endsection

@section("javasript")

    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <script src="https://api-maps.yandex.ru/2.1/?apikey=f4b34baa-cbd1-432b-865b-9562afa3fcdb&lang=@lang('lang.lang_for_map')" type="text/javascript"></script>
    <script src="{{asset('js/search_tasks.js')}}"></script>
    <script type="text/javascript">
        let r=0, m=1, p=10, s=0;
        map_pos(m)
        first_ajax('all');

        // module.exports = {
        //     plugins: [require('@tailwindcss/forms'),]
        // };

        function first_ajax(id) {
            $.ajax({
                url: "{{route('tasks.search')}}",
                // dataType: 'json',
                data: {orderBy: id},
                type: 'GET',
                success: function (data) {
                    dataAjax = $.parseJSON(JSON.stringify(data));
                    tasks_list_all(dataAjax)
                    tasks_show();
                },
                error: function () {
                    alert("Ajax ishida xatolik...");
                }
            });
        }

        function img_show() {
            $(".show_tasks").empty();
            $(".show_tasks").append(
                `<div class="grid grid-cols-3 gap-3 content-center w-full h-full">
                <div></div>
                <div><img src="{{asset('/images/notlike.svg')}}" class="w-full h-full"></div>
                <div></div>
                <div class="col-span-3 text-center w-full h-full">
                    <p class="text-3xl"><b>Задания не найдены</b></p>
                    <p class="text-lg">Попробуйте уточнить запрос или выбрать другие категории</p>
                </div>
                </div>`
            );
            // $('.butt').attr('style', 'display: none');
        }

        function map_pos(mm){
            ymaps.ready(init);
            if(mm){
                m=0;
                $(".big-map").empty();
                $(".small-map").append(
                    `<div id="map2" class="h-60 my-5 rounded-lg w-full static">
                    <div class="relative float-right z-50 ml-1"><img src="{{asset('images/big-map.png')}}" class="hover:cursor-pointer bg-white w-8 h-auto mt-2 mr-2 p-1 rounded-md drop-shadow-lg" title="Kartani kattalashtirish" onclick="map_pos(m)"/></div>
                    </div>`
                ),

                function init() {
                    var location = ymaps.geolocation;
                    // var myMap1 = new ymaps.Map('map1', {
                    //         center: [55.74, 37.58],
                    //         zoom: 15,
                    //         controls: []
                    //         // controls: ['geolocationControl']
                    //     }, {searchControlProvider: 'yandex#search'}
                    // );
                    var myMap2 = new ymaps.Map('map2', {
                            center: [41.317648, 69.230585],
                            zoom: 10,
                            // controls: []
                            controls: ['geolocationControl']
                        }, {searchControlProvider: 'yandex#search'}
                    );

                    $("#mpshow").click(function(){
                        // Получение местоположения и автоматическое отображение его на карте.
                        location.get({
                            mapStateAutoApply: true
                        })
                            .then(
                                function(result) {
                                    // Получение местоположения пользователя.
                                    var userAddress = result.geoObjects.get(0).properties.get('text');
                                    var  myInput = document.getElementById("suggest");
                                    myInput.value = userAddress;
                                    var userCoodinates = result.geoObjects.get(0).geometry.getCoordinates();
                                    console.log(userCoodinates)
                                    // Пропишем полученный адрес в балуне.
                                    // result.geoObjects.get(0).properties.set({
                                    //     balloonContentBody: 'Адрес: ' + userAddress +
                                    //         '<br/>Координаты:' + userCoodinates
                                    // });
                                    // myMap1.geoObjects.add(result.geoObjects)
                                    myMap2.geoObjects.add(result.geoObjects)
                                    // myMap3.geoObjects.add(result.geoObjects)
                                },
                                function(err) {
                                    console.log('Ошибка: ' + err)
                                }
                            );
                    });
                    $("#selectGeo").click(function(){
                        objects = ymaps.geoQuery([
                            // {
                            //     type: 'Point',
                            //     coordinates: [41.417648, 69.330585]
                            // },
                            {
                                type: 'Point',
                                coordinates: [41.327648, 69.270585]
                            },
                            {
                                type: 'Point',
                                coordinates: [41.377648, 69.290585]
                            }
                        ]).addToMap(myMap2),

                            circle = new ymaps.Circle([userCoodinates, r*1000], null, { draggable: true });
                        circle.events.add('drag', function () {
                            // Объекты, попадающие в круг, будут становиться красными.
                            var objectsInsideCircle = objects.searchInside(circle);
                            objectsInsideCircle.setOptions('preset', 'islands#redIcon');
                            // Оставшиеся объекты - синими.
                            objects.remove(objectsInsideCircle).setOptions('preset', 'islands#blueIcon');
                        });

                        // myMap1.geoObjects.add(circle);
                        myMap2.geoObjects.add(circle);
                        // myMap3.geoObjects.add(circle);

                        // var myPlacemark1 = new ymaps.Placemark([userCoodinates], {});
                        var myPlacemark2 = new ymaps.Placemark([userCoodinates], {});
                        // var myPlacemark3 = new ymaps.Placemark([userCoodinates], {});


                        // myMap1.geoObjects.add(myPlacemark1);
                        myMap2.geoObjects.add(myPlacemark2);
                        // myMap3.geoObjects.add(myPlacemark3);
                    });
                }

            }else{
                m=1;
                $(".small-map").empty();
                $(".big-map").append(
                    `<div id="map3" class="h-80 my-5 rounded-lg w-3/3 static align-items-center">
                    <div class="relative float-right z-50 ml-1"><img src="{{asset('images/small-map.png')}}" class="hover:cursor-pointer bg-white w-8 h-auto mt-2 mr-2 p-1 rounded-md drop-shadow-lg" title="Kartani kichiklashtirish" onclick="map_pos(m)"/></div>
                    </div>`
                )
            }

                function init() {
                    var location = ymaps.geolocation;
                    // var myMap1 = new ymaps.Map('map1', {
                    //         center: [55.74, 37.58],
                    //         zoom: 15,
                    //         controls: []
                    //         // controls: ['geolocationControl']
                    //     }, {searchControlProvider: 'yandex#search'}
                    // );
                    var myMap2 = new ymaps.Map('map2', {
                            center: [41.317648, 69.230585],
                            zoom: 10,
                            // controls: []
                            controls: ['geolocationControl']
                        }, {searchControlProvider: 'yandex#search'}
                    );
                    // var myMap3 = new ymaps.Map('map3', {
                    //         center: [41.317648, 69.230585],
                    //         zoom: 10,
                    //         controls: []
                    //         // controls: ['geolocationControl']
                    //     }, {searchControlProvider: 'yandex#search'}
                    // );

                    $("#mpshow").click(function(){
                    // Получение местоположения и автоматическое отображение его на карте.
                    location.get({
                        mapStateAutoApply: true
                    })
                        .then(
                            function(result) {
                                // Получение местоположения пользователя.
                                var userAddress = result.geoObjects.get(0).properties.get('text');
                                var  myInput = document.getElementById("suggest");
                                myInput.value = userAddress;
                                var userCoodinates = result.geoObjects.get(0).geometry.getCoordinates();
                                // Пропишем полученный адрес в балуне.
                                result.geoObjects.get(0).properties.set({
                                    balloonContentBody: 'Адрес: ' + userAddress +
                                        '<br/>Координаты:' + userCoodinates
                                });
                                // myMap1.geoObjects.add(result.geoObjects)
                                myMap2.geoObjects.add(result.geoObjects)
                                // myMap3.geoObjects.add(result.geoObjects)
                            },
                            function(err) {
                                console.log('Ошибка: ' + err)
                            }
                        );
                    });
                    $("#selectGeo").click(function(){
                    objects = ymaps.geoQuery([
                        {
                            type: 'Point',
                            coordinates: [41.417648, 69.330585]
                        },
                        {
                            type: 'Point',
                            coordinates: [41.327648, 69.270585]
                        },
                        {
                            type: 'Point',
                            coordinates: [41.377648, 69.290585]
                        }
                    // ]).addToMap(myMap1,myMap2,myMap3),
                    ]).addToMap(myMap2),

                        circle = new ymaps.Circle([userCoodinates, r*1000], null, { draggable: true });
                    circle.events.add('drag', function () {
                        // Объекты, попадающие в круг, будут становиться красными.
                        var objectsInsideCircle = objects.searchInside(circle);
                        objectsInsideCircle.setOptions('preset', 'islands#redIcon');
                        // Оставшиеся объекты - синими.
                        objects.remove(objectsInsideCircle).setOptions('preset', 'islands#blueIcon');
                    });

                    // myMap1.geoObjects.add(circle);
                    myMap2.geoObjects.add(circle);
                    // myMap3.geoObjects.add(circle);

                    // var myPlacemark1 = new ymaps.Placemark([userCoodinates], {});
                    // var myPlacemark2 = new ymaps.Placemark([userCoodinates], {});
                    // var myPlacemark3 = new ymaps.Placemark([userCoodinates], {});


                    // myMap1.geoObjects.add(myPlacemark1);
                    // myMap2.geoObjects.add(myPlacemark2);
                    // myMap3.geoObjects.add(myPlacemark3);
                    });
                }

            // if (bs == 'big' && k == 0){
            //     $(".small-map").empty();
            //     m=0
            // }
            // if(bs == 'small' && k == 0){
            //     $(".big-map").empty();
            //     m=1
            // }
            // if (bs == 'big' && k == 1){
            //     $(".big-map").empty();
            // }
            // if (bs == 'small' && k == 1){
            //     $(".small-map").empty();
            // }

        }


    </script>

    <script>
        $(function() {
            $("[data-sort]").click(function() {
                var collator = new Intl.Collator(["en", "ru"], {
                        numeric: true,
                        bytime: true,
                        bymonth: true
                    }),
                    rank = this.dataset.sort,
                    order = (this.dataset.order = -(this.dataset.order || -1));
                comparator = (a, b) => order * collator.compare(
                    a.dataset[rank],
                    b.dataset[rank]
                ),
                    items = $(".item").sort(comparator);
                $(".sort-table").append(items);
            });
        });
    </script>
    <script>
        var $btns = $('.btn').click(function() {
            if (this.id == 'all') {
                $('#parent > div').fadeIn(450);
            } else {
                var $el = $('.' + this.id).fadeIn(450);
                $('#parent > div').not($el).hide();
            }
            $btns.removeClass('active');
            $(this).addClass('active');
        })

    </script>

@endsection
