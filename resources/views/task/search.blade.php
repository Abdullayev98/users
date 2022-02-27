@extends("layouts.app")

@section("content")

    <div class="mx-auto w-11/12 xl:w-9/12 my-8 md:my-16">
        <div class="grid lg:grid-cols-5 grid-cols-5 container mx-auto text-sm">
            <div class="col-span-5 lg:col-span-3">
                <div class="w-full bg-yellow-50 my-5 rounded-md">
                    <div class="px-5 py-5 hidden md:block">
                    <!-- <form action="{{route('search')}}" method="get"> -->
                        <div class="grid grid-cols-4 gap-4 mb-3">

                            <div class="sm:inline-flex block w-full col-span-4 relative">
                            <!-- <input class="focus:outline-none  w-10/12 text-black-700 border border-black rounded mr-4 px-1" type="text" placeholder="Поиск по ключевым словам" name="s" value="{{$s ?? ''}}" aria-label="Full name"> -->
                                <input id="filter" type="text"
                                       class="focus:outline-none focus:border-yellow-500 focus:placeholder-transparent w-4/5 py-1 px-3 text-black-700 border-2 rounded-md border-neutral-400 focus:shadow-sm focus:shadow-sky-500 mr-4"
                                       placeholder="{{__('Поиск по ключевым словам')}}">
                                <img src="images/close.png" class="fill-current absolute left-3/4 top-2 cursor-pointer" id="svgClose" hidden>
                                <button
                                    class="sm:w-2/12 w-4/12 bg-green-500 hover:bg-green-600 ml-1 py-1 px-1 rounded-md sm:mt-0 text-white" id="findBut"
                                >{{__('Найти')}}</button>
                            </div>

                            <div class="md:inline-flex  block w-full col-span-4 ">
                                <div class="w-8/12 md:w-4/5 relative">
                                    <label class="lg:text-base md:text-sm mb-1 text-neutral-400">{{__('Город, адрес, метро, район...')}}</label>
                                    <div class="">
                                        <input
                                            class="relative bg-white address float-left py-1 px-2 text-black-700 border-2 rounded-md focus:shadow-sm w-full text-black-700 focus:border-yellow-500 focus:outline-none  float-left bg-transparent border-0 mr-3.5 h-full"
                                        type="text" id="suggest">
                                            <svg class="absolute right-2 bottom-1.5 h-4 w-4 text-purple-500" id="geoBut" width="12" height="12" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">  <path stroke="none" d="M0 0h24v24H0z"/>  <path d="M21 3L14.5 21a.55 .55 0 0 1 -1 0L10 14L3 10.5a.55 .55 0 0 1 0 -1L21 3" /></svg>
                                            <img src="images/close.png" class="absolute right-2 bottom-1.5 cursor-pointer" id="closeBut" hidden>
{{--                                        </button>--}}
                                    </div>
                                </div>
                            </div>
                            <div class="md:inline-flex  block w-full col-span-4 ">
                                <div class="md:w-2/5 pr-5">
                                    <label class="lg:text-base md:text-sm mb-1 text-neutral-400">{{__('Радиус поиска')}}</label>
                                    <select name="" id="selectGeo" class="focus:outline-none  py-1 px-2 w-full text-gray-700 border-2 rounded-md focus:shadow-sm focus:border-yellow-500 text-lg-left text-black-700 rounded" onchange="">
                                        <option value="0">{{__('Без ограничений')}}</option>
                                        <option value="1.5">1.5 {{__('км')}}</option>
                                        <option value="3">3 {{__('км')}}</option>
                                        <option value="5">5 {{__('км')}}</option>
                                        <option value="10">10 {{__('км')}}</option>
                                        <option value="15">15 {{__('км')}}</option>
                                        <option value="20">20 {{__('км')}}</option>
                                        <option value="30">30 {{__('км')}}</option>
                                        <option value="50">50 {{__('км')}}</option>
                                        <option value="75">75 {{__('км')}}</option>
                                        <option value="100">100 {{__('км')}}</option>
                                        <option value="200">200 {{__('км')}}</option>
                                    </select>
                                </div>
                                <div class="relative pl-5 md:w-2/5">
                                    <label class="lg:text-base md:text-sm mb-1 text-neutral-400">{{__('Стоимость заданий')}}</label>
                                    <input type="number" min="1" max="999999999" class="focus:outline-none focus:border-yellow-500 focus:placeholder-transparent w-full border-md py-1 px-2 text-black-700 border-2 rounded-md border-neutral-400 focus:shadow-sm focus:shadow-sky-500  text-black-700" placeholder="UZS" id="price">
                                    <img src="images/close.png" class="absolute right-2 bottom-2.5 cursor-pointer" id="prcClose" hidden>
                                </div>
                            </div>
                            <div class="inline-flex  block w-full col-span-4">
                                <label class="inline-flex items-center mt-3">
                                    <input type="checkbox" id="remJob" class="focus:outline-none form-checkbox checkboxByAs  h-5 w-5 text-orange-400">
                                    <span class="sm:ml-2 ml-0.5 text-gray-700 lg:text-sm">{{__('Удалённая работа')}}</span>
                                </label>
                                <label class="inline-flex items-center mt-3 xl:ml-3 sm:ml-2 ml-0.5">
                                    <input type="checkbox" id="noResp" class="focus:outline-none form-checkbox  h-5 w-5 text-orange-400">
                                    <span class="sm:ml-2  ml-0.5 text-gray-700 lg:text-sm">{{__('Задания без откликов')}}</span>
                                </label>
                            </div>
                        </div>
                        <!-- </form> -->
                    </div>
                </div>



{{--                MOBILE VERSION --}}
                <div class="w-full my-5 rounded-md md:hidden block">
                    <div class="inline-flex block w-full grid grid-cols-3">
                        <input id="filter2" type="text"
                               class="col-span-3 focus:outline-none focus:border-yellow-500 focus:placeholder-transparent text-base md:w-10/12 px-4 py-1 text-black border-2 rounded-md border-neutral-400 focus:shadow-sm focus:shadow-sky-500 md:mr-4 mr-0 bg-gray-200"
                               placeholder="{{__('Поиск по ключевым словам')}}">

                        <button
                            id="findBut2" class="col-span-2 md:w-4/12 w-2/3 md:mt-0 mt-2 bg-green-500 hover:bg-green-600 rounded-md text-white"
                        >{{__('Найти')}}</button>
                        <div class="col-span-1 flex justify-evenly inline-block md:mt-0 mt-2">
                            <button id="show_2" class=" w-10 md:ml-2  focus:outline-none">
                                <i class="fas fa-bars fa-2x ml-1.5 text-gray-500"></i>
                            </button>
                            <button id="hide_2" class=" w-10 md:ml-2  focus:outline-none" style="display: none">
                                <i class="fas fa-times fa-2x ml-1.5 text-gray-500"></i>
                            </button>
                            <button id="show" class="w-10 md:ml-2 focus:outline-none">
                                <i class="far fa-map fa-2x text-gray-500"></i>
                            </button>
                            <button id="hide" class="w-10 md:ml-2  focus:outline-none" style="display: none">
                                <i class="fas fa-list fa-2x text-gray-500"></i>
                            </button>
                        </div>

                    </div>
                </div>

{{--                mobile bar--}}

                <div id="mobile_bar" class="w-full hidden" style="display:none;">
                    <div class="bg-yellow-50 pb-4">
                        <div class=" w-11/12 mx-auto ">
                            <div class="w-full relative">
                                <label class="text-xs mb-1 text-neutral-400">{{__('Город, адрес, метро, район...')}}</label>
                                <div class="bg-white address float-left py-1 px-3 text-black-700 border-2 rounded-md border-neutral-400 focus:border-sky-500 focus:shadow-sm focus:shadow-sky-500  w-full text-black-700">
                                    <input class="float-left bg-transparent border-0 w-11/12 h-full focus:outline-none focus:border-yellow-500"
                                        type="text" id="suggest2" placeholder="Mobile">
{{--                                    <button class="flex-shrink-0 focus:outline-none float-right text-teal-500 mt-1 text-sm rounded" type="button">--}}
                                        <svg class="h-4 w-4 text-purple-500" id="geobut2" width="12" height="12" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">  <path stroke="none" d="M0 0h24v24H0z"/>  <path d="M21 3L14.5 21a.55 .55 0 0 1 -1 0L10 14L3 10.5a.55 .55 0 0 1 0 -1L21 3" /></svg>
                                        <img src="images/close.png" class="absolute right-2 bottom-1.5 cursor-pointer" id="closeBut2" hidden>
{{--                                    </button>--}}
                                </div>
                            </div>
                            <div class="w-full">
                                <label class="text-xs mb-1 text-neutral-400">{{__('Радиус поиска')}}</label>
                                <select id="selectGeo2" class="w-full py-1 px-1 text-black-700 border-2 rounded-md border-neutral-400 focus:border-sky-500 focus:shadow-sm focus:shadow-sky-500 text-lg-left text-black-700 rounded">
                                    <option value="0">{{__('Без ограничений')}}</option>
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
                        </div>
                    </div>


                    <div class=" w-11/12 mx-auto border-b pb-4">
                        <label class="text-xs mb-1 text-neutral-400">{{__('Стоимость заданий')}}</label>
                        <input type="text" maxlength="7" class="w-full focus:placeholder-transparent border-md py-1 px-2 text-black-700 border-2 rounded-md border-neutral-400 focus:outline-none focus:border-yellow-500 focus:shadow-sm focus:shadow-sky-500  text-black-700" placeholder="UZS" id="price2">
                        <img src="images/close.png" class="absolute right-2 bottom-2.5 cursor-pointer" id="prcClose2" hidden>
                    </div>

                    <div class="w-11/12 mx-auto">
                        <label class="block w-full border-b pb-4 items-center mt-3">
                            <input type="checkbox" id="remJob2" class="form-checkbox checkboxByAs mr-4  h-5 w-5 text-orange-400"
                            ><span class="sm:ml-2 ml-0.5 text-gray-700 lg:text-sm">{{__('Удалённая работа')}}</span>
                        </label>
                        <label class="block w-full border-b pb-4 items-center mt-3 xl:ml-3 sm:ml-2 ml-0.5">
                            <input type="checkbox" id="noResp2" class="form-checkbox mr-4  h-5 w-5 text-orange-400"
                            ><span class="sm:ml-2  ml-0.5 text-gray-700 lg:text-sm">{{__('Задания без откликов')}}</span>
                        </label>
{{--                        </label>--}}
                    </div>
{{--                mobile bar end--}}

{{--                mobile map--}}
                <div id="big-big" class="h-full my-5 rounded-lg w-full static"></div>
{{--                mobile map end--}}

{{--                MOBILE VERSION ENDED --}}

                </div>


                <div class="">
                    <div class="col-span-2 lg:col-span-1 lg:block hidden mx-4 lg:mt-0 mt-32">
                        <div class="big-map static">

                        </div>
                    </div>
                    <div class="b-tasks-sorting hidden md:block">
                        <div class="inline-flex items-center my-5">
                            <span class="title__994cd">{{__('Сортировать:')}}</span>
                            <button id="byDate" class="mx-5 active">{{__'по дате публикации')}}</button>
                            <button id="bySroch" class="mx-5 ">{{__('по срочности')}}</button>
                        </div>
                    </div>
                    <div id="scrollbar" class="w-full h-full blog1">
                        <div class="w-full">
                            <div class="show_tasks">
                                {{--Show Tasks list --}}
                            </div>
                        </div>

                        <div class="w-full">
                            <div class="no_tasks" hidden>
                                {{--Show no tasks image --}}
                                <div class=" w-3/5 h-3/5 mx-auto">
                                    <img src="images/notlikes.png" class="w-full h-full">
                                    <div class="text-center w-full h-full">
                                        <p className="text-4xl"><b>{{__('Задания не найдены')}}</b></p>
                                        <p className="text-xl">{{__('Попробуйте уточнить запрос или выбрать другие категории')}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="w-full h-full lM mt-5" hidden>
                            <ul class="text-center">
                                <li class="text-center">{{__('Показано')}}&nbsp;<span id="pnum"></span>&nbsp;из&nbsp;<span id="snum"></span></li>
                                <li><button id="loadMore" class="butt mt-2 px-5 py-1 border border-black rounded hover:cursor-pointer" onclick="tasks_show(), maps_show();">{{__('Показать ещё')}}</button></li>
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
                            <input type="checkbox" class="form-checkbox all_cat ml-5 h-5 w-5 text-orange-400">
                            <span class="ml-2 text-gray-700">{{__('Все категории')}}</span>
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
{{--                    <script src="https://unpkg.com/@themesberg/flowbite@latest/dist/flowbite.bundle.js"></script>--}}
                </div>
            </div>
        </div>
    </div>

    <style>
        [class*="copyrights-pane"]
        {display: none !important;}

        input[type=number]::-webkit-inner-spin-button,
        input[type=number]::-webkit-outer-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }
    </style>


    <div class="w-full">
        <button onclick="topFunction()" id="myBtn" title="Go to top" class="fixed z-10 hidden p-3 bg-gray-100 rounded-full shadow-md bottom-5 right-24 animate-bounce">
            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 10l7-7m0 0l7 7m-7-7v18">
                </path>
            </svg>
        </button>
    </div>

@endsection

@section("javasript")

    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <script src="https://api-maps.yandex.ru/2.1/?apikey=f4b34baa-cbd1-432b-865b-9562afa3fcdb&lang={{__('ru_RU')}}" type="text/javascript"></script>
    <script src="{{asset('js/search_tasks.js')}}"></script>
    <script>


        function first_ajax(id) {
            $.ajax({
                url: "{{route('tasks.search')}}",
                data: {orderBy: id},
                type: 'GET',
                success: function (data) {
                    if (id == 'all') {
                        dataAjax = $.parseJSON(JSON.stringify(data));
                        dataAjaxCheck=1
                        sixInOne();
                    }
                },
                error: function () {
                    alert("Ajax orqali yuklashda xatolik...");
                }
            });
        }
        first_ajax('all');

    </script>

    <script>
        $('#byDate').click(function(){
            $(this).addClass('font-bold')
            $('#bySroch').removeClass('font-bold')
        })
        $('#bySroch').click(function(){
            $(this).addClass('font-bold')
            $('#byDate').removeClass('font-bold')
        })
    </script>
@endsection
