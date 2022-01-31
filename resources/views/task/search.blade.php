@extends("layouts.app")

@section("content")

    <div class="mx-auto xl:w-9/12 w-11/12 md:my-16">
        <div class="grid lg:grid-cols-5 grid-cols-5 container mx-auto text-base">
            <div class="lg:col-span-3 col-span-5">
                <div class="w-full bg-yellow-50 my-5 rounded-md md:block hidden">
                    <div class="px-5 py-5">
                    <!-- <form action="{{route('search')}}" method="get"> -->
                        <div class="grid grid-cols-4 gap-4 mb-3">

                            <div class="inline-flex block w-full col-span-4">
                            <!-- <input class="focus:outline-none  w-10/12 text-black-700 border border-black rounded mr-4 px-1" type="text" placeholder="Поиск по ключевым словам" name="s" value="{{$s ?? ''}}" aria-label="Full name"> -->





                                <input id="filter" type="text"
                                       class="focus:outline-none focus:border-yellow-200 text-base w-10/12 px-4 py-1 text-black-700 border-2 rounded-md border-neutral-400 focus:border-sky-500 focus:shadow-sm focus:shadow-sky-500 mr-4"
                                       placeholder="@lang('lang.search_byKey')">

                                <button
                                    class="sm:w-2/12 w-4/12 bg-green-500 hover:bg-green-600 rounded-md text-white"
                                >@lang('lang.search_find')</button>








                                <div class="flex text-center md:hidden block">
                                    <button class="w-10 ml-2 focus:outline-none">
                                        <img class="ml-1.5" src="https://css-static.youdo.com/i/icons/filters_btn.svg" alt="">
                                    </button>
                                    <button class="w-10  focus:outline-none">
                                        <img class="ml-1.5" src="https://css-static.youdo.com/i/icons/map_btn.svg" alt="">
                                    </button>
                                </div>
                            </div>




                                <div class="md:inline-flex  block w-full col-span-4">
                                    <div class="w-8/12 md:w-7/12 relative">
                                        <label class="text-sm md:text-xs mb-1 text-neutral-400">@lang('lang.search_location')</label>
                                        <div class="bg-white text-[14px] address float-left py-1 px-2 text-black-700 border-2 rounded-md border-neutral-400 focus:border-sky-500 focus:shadow-sm focus:shadow-sky-500  w-full text-black-700">
                                            <input
                                                class="focus:outline-none focus:border-yellow-200 float-left bg-transparent border-0 w-11/12 h-full focus:outline-none"
                                                type="text" id="suggest">
                                            <button id="mpshow" class="flex-shrink-0 focus:outline-none float-right text-teal-500 mt-1 text-sm rounded" type="button">
                                                <svg class="h-4 w-4 text-purple-500"  width="12" height="12" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">  <path stroke="none" d="M0 0h24v24H0z"/>  <path d="M21 3L14.5 21a.55 .55 0 0 1 -1 0L10 14L3 10.5a.55 .55 0 0 1 0 -1L21 3" /></svg>
                                            </button>
                                        </div>
                                    </div>

                                    <div class="w-5/12 xl:w-4/12 xl:ml-2 lg:w-4/12 lg:ml-1 md:w-4/12 md:ml-1 sm:w-5/12">
                                        <label class="text-xs mb-1 text-neutral-400">@lang('lang.search_byMapRadius')</label>
                                        <select name="" id="selectGeo" class="text-[14px] py-1 px-1 text-black-700 border-2 rounded-md border-neutral-400 focus:border-sky-500 focus:shadow-sm focus:shadow-sky-500 text-lg-left text-black-700 rounded" onchange="r=$('#selectGeo').val(); enDis(r); map_pos(k)">
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
                                        <input type="text" maxlength="7" class="focus:outline-none focus:border-yellow-200 w-full border-md py-1 px-2 text-black-700 border-2 rounded-md border-neutral-400 focus:border-sky-500 focus:shadow-sm focus:shadow-sky-500  text-black-700" placeholder="UZS" id="price">
                                    </div>
                                </div>
                                <div class="inline-flex  block w-full col-span-4">
                                    <label class="inline-flex items-center mt-3">
                                        <input type="checkbox" class="form-checkbox checkboxByAs  h-4 w-4 text-orange-400"
                                        ><span class="sm:ml-2 ml-0.5 text-black mr-3 lg:text-sm text-xs">@lang('lang.search_remoteJob')</span>
                                    </label>
                                    <label class="inline-flex items-center mt-3 xl:ml-3 sm:ml-2 ml-0.5">
                                        <input type="checkbox" class="form-checkbox  h-4 w-4 text-orange-400"
                                        ><span class="sm:ml-2  ml-0.5 text-black mr-3 lg:text-sm text-xs">@lang('lang.search_noCallback')</span>
                                    </label>
                                    <label class="inline-flex items-center mt-3 xl:ml-3 sm:ml-2 ml-0.5">
                                        <input type="checkbox" class="form-checkbox  h-4 w-4 text-orange-400"
                                        ><span class="sm:ml-2  ml-0.5 text-black mr-3 lg:text-sm text-xs">@lang('lang.search_onlyVacancy')</span>
                                    </label>
                                </div>





                        </div>
                        <!-- </form> -->
                    </div>
                </div>



{{--                MOBILE VERSION --}}
                <div class="w-full my-5 rounded-md md:hidden block">
                    <div class="inline-flex block w-full col-span-4">
                    <!-- <input class="focus:outline-none  w-10/12 text-black-700 border border-black rounded mr-4 px-1" type="text" placeholder="Поиск по ключевым словам" name="s" value="{{$s ?? ''}}" aria-label="Full name"> -->
                        <input id="filter" type="text"
                               class="focus:outline-none text-base w-10/12 px-4 py-1 text-black border-2 rounded-md border-neutral-400 focus:border-sky-500 focus:shadow-sm focus:shadow-sky-500 mr-4 bg-gray-200"
                               placeholder="@lang('lang.search_byKey')">

                        <button
                            class="w-2/12 md:w-4/12 bg-green-500 hover:bg-green-600 rounded-md text-white"
                        >@lang('lang.search_find')</button>
                        <div class="flex text-center">
                            <button class="w-10 ml-2 focus:outline-none">
                                <img class="ml-1.5" src="https://css-static.youdo.com/i/icons/filters_btn.svg" alt="">
                            </button>
                            <button id="show" class="w-10 ml-2 focus:outline-none">
                                <i class="far fa-map fa-2x text-gray-500"></i>
                            </button>
                            <button id="hide" class="w-10 ml-2 focus:outline-none" style="display: none">
                                <i class="fas fa-list fa-2x text-gray-500"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <div class="col-span-2 lg:col-span-1 lg:hidden block mx-4 lg:mt-0 mt-8 mb-4">
                    <div id="map3" class="h-full w-screen my-5 rounded-lg w-full static" style="display: none;"></div>
                </div>

{{--                MOBILE VERSION ENDED --}}






                <div class="">
                    <div class="col-span-2 lg:col-span-1 lg:block hidden mx-4 lg:mt-0 mt-32">
                        <div class="big-map static">

                        </div>
                    </div>
                    <div class="b-tasks-sorting hidden md:block">
                        <div class="inline-flex items-center my-5">
                            <span class="title__994cd">@lang('lang.search_filter')</span>

                            <button class="focus:outline-none text-sm p-2 bg-yellow-50 mx-5 byid">@lang('lang.search_byDate')</button>

                            <button id="srochnost" class="focus:outline-none text-sm p-2   mx-5 active">@lang('lang.search_byHurry')</button>
                            <button id="as" data-sort-type="3"  class="focus:outline-none text-gray-700 text-sm p-2 mx-5 ">@lang('lang.search_byRemote')</button>
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
            <div id="contents" class="col-span-5 lg:col-span-2 lg:block hidden mx-4 lg:mt-0 mt-32">
                <div class="small-map static">
                    {{--Map2 show --}}
                </div>
                <div class="w-full h-full">
                    <div class="max-w-lg mx-auto">
                        <label class="inline-flex items-center mt-3">
                            <input type="checkbox" class="form-checkbox all_cat mr-1 h-4 w-4 text-orange-400">
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
                                            <input type="checkbox" class="form-checkbox par_cat mr-1 h-4 w-4 accentdarker hover:cursor-pointer"
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


    <div class="w-full" x-data="topBtn">
        <button onclick="topFunction()" id="myBtn" title="Go to top" class="fixed z-10 hidden p-3 bg-gray-100 rounded-full shadow-md bottom-5 right-24 animate-bounce">
            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 10l7-7m0 0l7 7m-7-7v18">
                </path>
            </svg>
        </button>
    </div>

    <script>

        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        accent: '#228aa4',
                        accentlight: '#88BCE2',
                        accentdark: '#4B8CBD',
                        accentdarker: '#4682B0',

                        danger: theme => theme('colors.accent'),
                    }
                }
            }
        }
    </script>
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

        function img_show() {
            $(".show_tasks").empty();
            $(".small-map").empty();
            $(".big-map").empty();
            $(".show_tasks").append(
                `<div class="grid grid-cols-3 gap-3 content-center w-full h-full">
                <div></div>
                <div><img src="{{asset('/images/notlike.png')}}" class="w-full h-full"></div>
                <div></div>
                <div class="col-span-3 text-center w-full h-full">
                    <p class="text-3xl"><b>Задания не найдены</b></p>
                    <p class="text-lg">Попробуйте уточнить запрос или выбрать другие категории</p>
                </div>
                </div>`
            );
            $('.lM').attr("hidden","hidden")
        }

        function tasks_show(){
            let i=1;
            $('.print_block').each(function() {
                if ((this.hidden) && (i <= p) && (s <= dl))
                {
                    this.hidden = false;
                    i++
                    s++
                }
            });
            $('.lM').removeAttr('hidden');
            $('#pnum').html(s)
            $('#snum').html(dl)
            if (s==dl){
                $('.butt').attr("disabled","disabled")
            }
        }

        function map1_show(){
        ymaps.ready(init);
        function init() {
                var myMap1 = new ymaps.Map('map1', {
                        center: [41.317648, 69.230585],
                        zoom: 10,
                        // behaviors: ['default', 'scrollZoom']
                    }, {
                        searchControlProvider: 'yandex#search'
                    }),

                    clusterer = new ymaps.Clusterer({
                        preset: 'islands#invertedVioletClusterIcons',
                        groupByCoordinates: false,
                        clusterDisableClickZoom: true,
                        clusterHideIconOnBalloonOpen: false,
                        geoObjectHideIconOnBalloonOpen: false
                    }),

                    getPointOptions = function () {
                        return {
                            preset: 'islands#violetIcon'
                        };
                    },
                    geoObjects = [];

                for (var i = sGeo; i <= p, sGeo <= dl; i++, sGeo++) {
                        geoObjects[i] = new ymaps.Placemark(dataAjax[i].coordinates, getPointData(i), getPointOptions());
                    }

                clusterer.options.set({
                    gridSize: 80,
                    clusterDisableClickZoom: false
                });
                clusterer.add(geoObjects);
                myMap1.geoObjects.add(clusterer);
                myMap1.setBounds(clusterer.getBounds(), {
                    checkZoomRange: false
                });

                circle = new ymaps.Circle([[41.317648, 69.230585], r*1000], null, { draggable: true }, { fill: false });
                myMap1.geoObjects.add(circle);
        }
        }

        function map_pos(mm) {
            if (mm) {
                k=1;
                $(".small-map").empty();
                $(".big-map").empty();
                $(".small-map").append(
                    `<div id="map2" class="h-52 overflow-hidden my-5 rounded-lg w-full static">
                    <div class="relative float-right z-50 ml-1"><img src="{{asset('images/big-map.png')}}" class="hover:cursor-pointer bg-white w-8 h-auto mt-2 mr-2 p-1 rounded-md drop-shadow-lg" title="Kartani kattalashtirish" onclick="map_pos(0)"/></div>
                    </div>`
                );

                ymaps.ready(init);
                function init() {
                    var myInput = document.getElementById("suggest");
                    var location = ymaps.geolocation;

                        location.get({
                            mapStateAutoApply: true
                        })
                            .then(
                                function(result) {
                                    userCoordinates = result.geoObjects.get(0).geometry.getCoordinates();
                                },
                                function(err) {
                                    console.log('Ошибка: ' + err)
                                }
                            );


                    var suggestView1 = new ymaps.SuggestView('suggest');
                    var myMap2 = new ymaps.Map('map2', {
                        center: userCoordinates,
                        zoom: 10,
                        controls: ['geolocationControl'],
                        behaviors: ['default', 'scrollZoomNo']
                    }, {
                        searchControlProvider: 'yandex#search'
                    });

                    $("#mpshow").click(function(){
                        location.get({
                            mapStateAutoApply: true
                        })
                            .then(
                                function(result) {
                                    myInput.value = result.geoObjects.get(0).properties.get('text');
                                    userCoordinates = result.geoObjects.get(0).geometry.getCoordinates();
                                    // myMap2.geoObjects.add(result.geoObjects)
                                },
                                function(err) {
                                    console.log('Ошибка: ' + err)
                                }
                            );
                    });

                    ///////////////////////////////////////
                    // var myGeocoder = ymaps.geocode(myInput);
                    // myGeocoder.then(
                    //     function (res) {
                    //         alert('Координаты объекта :' + res.geoObjects.get(0).geometry.getCoordinates());
                    //     },
                    //     function (err) {
                    //         alert('Ошибка');
                    //     }
                    // );
                    ///////////////////////////////////////

                    clusterer = new ymaps.Clusterer({
                        preset: 'islands#invertedGreenClusterIcons',
                        hasBalloon: false,
                        groupByCoordinates: false,
                        clusterDisableClickZoom: true,
                        clusterHideIconOnBalloonOpen: false,
                        geoObjectHideIconOnBalloonOpen: false
                    })
                        // getPointData = function (index) {
                        //     return {
                        //         balloonContentHeader: '<font size=3><b><a target="_blank" href="https://yandex.ru">Здесь может быть ваша ссылка</a></b></font>',
                        //         balloonContentBody: '<p>Ваше имя: <input name="login"></p><p>Телефон в формате 2xxx-xxx:  <input></p><p><input type="submit" value="Отправить"></p>',
                        //         balloonContentFooter: '<font size=1>Информация предоставлена: </font> балуном <strong>метки ' + index + '</strong>',
                        //         clusterCaption: 'метка <strong>' + index + '</strong>'
                        //     };
                        // },
                        getPointOptions = function () {
                            return {
                                preset: 'islands#greenIcon'
                            };
                        }
                        geoObjects = [];
                    for (var i = sGeo; i <= p, sGeo <= dl; i++, sGeo++) {
                        dataGeo = [];
                        dataGeo.push(dataAjax[i].coordinates.split(','));
                        geoObjects[i] = new ymaps.Placemark(dataGeo[i], getPointOptions());
                    }
                    clusterer.options.set({
                        gridSize: 80,
                        clusterDisableClickZoom: true
                    });
                    clusterer.add(geoObjects);
                    myMap2.geoObjects.add(clusterer);
                    myMap2.setBounds(clusterer.getBounds(), {
                    checkZoomRange: false
                    });
                    circle = new ymaps.Circle([[userCoordinates[0],userCoordinates[1]], r*1000], null, { draggable: false, fill: false, outline: true, strokeColor: '#32CD32', strokeWidth: 3});
                    myMap2.geoObjects.add(circle);
                }
            } else {
                k=0;
                $(".big-map").empty();
                $(".small-map").empty();
                $(".big-map").append(
                    `<div id="map3" class="h-80 my-5 rounded-lg w-3/3 static align-items-center">
                    <div class="relative float-right z-50 ml-1"><img src="{{asset('images/small-map.png')}}" class="hover:cursor-pointer bg-white w-8 h-auto mt-2 mr-2 p-1 rounded-md drop-shadow-lg" title="Kartani kichiklashtirish" onclick="map_pos(1)"/></div>
                    </div>`
                )
                ymaps.ready(init);
                function init() {
                    var myMap3 = new ymaps.Map('map3', {
                            center: userCoordinates,
                            zoom: 15,
                            controls: ['geolocationControl'],
                            behaviors: ['default', 'scrollZoomNo']
                        }, {
                            searchControlProvider: 'yandex#search'
                        });

                        clusterer = new ymaps.Clusterer({
                            preset: 'islands#invertedGreenClusterIcons',
                            groupByCoordinates: false,
                            clusterDisableClickZoom: true,
                            clusterHideIconOnBalloonOpen: false,
                            geoObjectHideIconOnBalloonOpen: false
                        }),
                        getPointData = function (index) {
                            return {
                                balloonContentHeader: '<font size=3><b><a href="/detailed-tasks/' + dataAjax[index].id + '">' + dataAjax[index].name + '</a></b></font>',
                                balloonContentBody: '<br><font size=4><b><a href="/detailed-tasks/' + dataAjax[index].id + '">' + dataAjax[index].name + '</a></b></font><br><br><font size=3><p>' + dataAjax[index].start_date + ' - ' + dataAjax[index].end_date + '</p></font><br><font size=3><p>' + dataAjax[index].budget + '</p></font>',
                                // balloonContentFooter: '<font size=1>Информация предоставлена: </font> балуном <strong>метки ' + index + '</strong>',
                                clusterCaption: 'Задания <strong>' + dataAjax[index].id + '</strong>'
                            };
                        },
                        getPointOptions = function () {
                            return {
                                preset: 'islands#greenIcon'
                            };
                        }
                        geoObjects = [];
                    for (var i = 0, len = dataGeo.length; i < len; i++) {
                        geoObjects[i] = new ymaps.Placemark(dataGeo[i], getPointData(i), getPointOptions());
                    }
                    clusterer.options.set({
                        gridSize: 80,
                        clusterDisableClickZoom: false
                    });

                    clusterer.add(geoObjects);
                    myMap3.geoObjects.add(clusterer);
                    myMap3.setBounds(clusterer.getBounds(), {
                    checkZoomRange: false
                    });

                    circle = new ymaps.Circle([[userCoordinates[0],userCoordinates[1]], r*1000], null, { draggable: true, fill: false, outline: true, strokeColor: '#32CD32', strokeWidth: 3});
                    myMap3.geoObjects.add(circle);


                }
            }
        }

    </script>



{{--    script for mobile -v--}}
    <script>
        $(document).ready(function() {
            $("#show").click(function() {
                $("#map3").show();
                $("#hide").css('display', 'block');
                $("#show").css('display', 'none');
                $("#scrollbar").css('display', 'none');
                $("footer").css('display', 'none');
            });
            $("#hide").click(function() {
                $("#map3").hide();
                $("#hide").css('display', 'none');
                $("#show").css('display', 'block');
                $("#scrollbar").css('display', 'block');
                $("footer").css('display', 'block');
            });
        });
    </script>
@endsection
