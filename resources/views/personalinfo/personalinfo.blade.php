@extends("layouts.app")

@section("content")
<script>
    var myMap;
    var multiRoute;
    var place, place1 = "",
        place2 = "",
        place3 = "",
        place4 = "";
</script>
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>


<script id="map_api" src="https://api-maps.yandex.ru/2.1/?apikey=f4b34baa-cbd1-432b-865b-9562afa3fcdb&lang=@lang('lang.lang_for_map')&onload=onLoad" type="text/javascript">
</script>

<div class="container-sm md:-mx-0 mx-auto my-3">
    <div class="border-3 bg-gren">

    </div>
    <div class="shadow-2xl px-10 rounded-md w-full sm:w-7/12 mx-auto grid grid-flow-col gap-4 my-5 flex-wrap md:flex-wrap-reverse">
        <div class="text-center grid-rows-12 p-5 hidShad">
            <p class="text-2xl font-semibold mt-5">
                @lang('lang.personalinfo_text1')
            </p>
            <p class="text-base mt-5 mb-5 px-5">
                @lang('lang.personalinfo_text2')
            </p>
            <button href="#" id="btnclck" class="text-base my-3 px-7 rounded-md py-3 bg-green-700 text-white mb-2">
                @lang('lang.personalinfo_text16')
            </button>
            <div class="flex justify-center mt-4">
                <img src="{{asset('images/personalinfo.png')}}" alt="">
            </div>
        </div>
        <div class="grid-rows-12 px-5 pb-5  showshad hidden">
            <div class="container p-5">
                <p class="text-2xl font-semibold mb-3 text-center ">
                    <span class="p-5">@lang('lang.personalinfo_text3')</span>
                </p>
                <p class="text-base mt-3 text-center ">
                    @lang('lang.personalinfo_text4')
                </p>
                <form class="mt-4 w-full">
                    @csrf
                    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
                    <link rel="stylesheet" type="text/css" href="https://npmcdn.com/flatpickr/dist/themes/material_blue.css">
                    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
                    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
                    <script src="https://npmcdn.com/flatpickr/dist/l10n/ru.js"></script>
                    <script src="https://npmcdn.com/flatpickr/dist/l10n/uz_latn.js"></script>
                    <div>
                        <div class="flex items-center rounded-lg border py-1">
                            <button class="flex-shrink-0 border-transparent text-teal-500 text-md py-1 px-2 rounded focus:outline-none" type="button">
                                A
                            </button>
                            <input autocomplete="off" oninput="myFunction()" id="suggest0" class="appearance-none bg-transparent w-full text-gray-700 mr-3 py-1 px-2 leading-tight focus:outline-none" type="text" placeholder="@lang('lang.search2_location')" value="{{session('location2')}}" name="location0" required>
                            <button id="getlocal" class="flex-shrink-0 border-transparent border-4 text-teal-500 hover:text-teal-800 text-sm py-1 px-2 rounded" type="button"> <svg class="h-4 w-4 text-purple-500" width="12" height="12" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" />
                                    <path d="M21 3L14.5 21a.55 .55 0 0 1 -1 0L10 14L3 10.5a.55 .55 0 0 1 0 -1L21 3" />
                                </svg> </button>


                        </div>
                        <div class="mt-3">
                            <label class="text-gray-500 text-sm" for="name">@lang('lang.personalinfo_text6')</label>
                            <input type="text" id="name" class="block px-2 w-full border  border-grey-300 py-2 rounded-lg shadow-sm focus:outline-none focus:border-yellow-200 focus:ring focus:ring-yellow-300" />
                        </div>
                        <div class="mt-3 mb-3">
                            <label class="text-gray-500 text-sm" for="lastname">@lang('lang.personalinfo_text7')</label>
                            <input type="text" id="lastname" class="block px-2 w-full border  border-grey-300 py-2 rounded-lg shadow-sm focus:outline-none focus:border-indigo-200 focus:ring focus:ring-yellow-300" />
                        </div>
                        <label for="date" class="mt-3 text-gray-500 text-sm">@lang('lang.personalinfo_text8')</label>
                        <div class="flatpickr inline-block flex flex-shrink">
                            <div class="flex-shrink">
                                <input type="text" placeholder="@lang('lang.calendar')" data-input class=" bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm text-xs rounded-lg focus:ring-yellow-300 focus:border-yellow-300 block pl-10 p-2.5 dark:bg-gray-700 dark:border-yellow-300 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required> <!-- input is mandatory -->
                            </div>
                            <div class="transform hover:scale-125">
                                <a class="input-button w-1 h-1  pl-1  " title="toggle" data-toggle>
                                    <i class="far fa-calendar-alt fill-current text-green-600"></i>
                                </a>
                            </div>
                            <div class="transform hover:scale-125 ">
                                <a class="input-button w-1 h-1 sm:pl-3 pl-1  " title="clear" data-clear>
                                    <i class="fas fa-trash-alt stroke-current text-red-600 "></i>
                                </a>
                            </div>
                        </div>
                        <div class="flex w-full gap-x-4 mt-4">
                            <a onclick="myFunction()" class="w-1/3  border border-black-700 hover:border-black transition-colors rounded-lg py-2 text-center flex justify-center items-center gap-2">
                                <!-- <button type="button"> -->
                                @lang('lang.personalinfo_text11')

                                <!-- </button> -->
                                <script>

                                </script>
                            </a>
                            <input type="submit" class="bg-green-500 hover:bg-green-500 w-2/3 cursor-pointer text-white font-bold py-5 px-5 rounded" name="" value="@lang('lang.personalinfo_text10')">
                        </div>
                </form>
                <p class="text-xs text-center pt-3">
                    @lang('lang.personalinfo_text9')
                </p>
            </div>
        </div>
    </div>
</div>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />


@endsection

@section('javasript')



<script>
    $("#btnclck").click(function() {
        $(".hidShad").hide()
        $(".showshad").show()
    })

    function myFunction() {
        $(".hidShad").show()
        $(".showshad").hide()
    }

    flatpickr.localize(flatpickr.l10ns.uz_latn);
    flatpickr.localize(flatpickr.l10ns.ru);
    flatpickr(".flatpickr", {
        wrap: true,
        enableTime: true,
        allowInput: true,
        altInput: true,
        dateFormat: "Y-m-d",
        altFormat: "Y-m-d",

        locale: "@lang('lang.dateLang')",
    }, )
</script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
<script>


        function init_map() {

            myMap = new ymaps.Map('map', {
                center: [41.311151, 69.279737],
                zoom: 13,
                controls: ['zoomControl', 'searchControl']
            });


        }
    ymaps.ready(init_map);




    var x = 1;

    function init() {

        var suggestView0 = new ymaps.SuggestView('suggest0');

        suggestView0.events.add('select', function() {
            myFunction();
        });

        const alp = ["B", "C", "D", "E"];



        $("#getlocal").click(function() {

            var geolocation = ymaps.geolocation;
            geolocation.get({
                mapStateAutoApply: true,
            }).then(function(result) {
                    // Синим цветом пометим положение, полученное через браузер.
                    // Если браузер не поддерживает эту функциональность, метка не будет добавлена на карту.
                    var userAddress = result.geoObjects.get(0).properties.get('text');
                    document.getElementById("suggest0").value = userAddress;
                    document.getElementById("coordinate").value = result.geoObjects.get(0).geometry.getCoordinates();

                },
                function(err) {
                    console.log('Ошибка: ' + err)
                });
            myFunction();

        });


    }

    // Mapga yuklash joyni

    function myFunction() {




        place = document.getElementById("suggest0").value;
        var myGeocoder = ymaps.geocode(place);
        myGeocoder.then(
            function(res) {
                document.getElementById("coordinate").value = res.geoObjects.get(0).geometry.getCoordinates();
                myMap.setCenter(res.geoObjects.get(0).geometry.getCoordinates());
            }

        );




        if (document.getElementById("suggest1")) {
            place1 = document.getElementById("suggest1").value;
            var myGeocoder1 = ymaps.geocode(place1);
            myGeocoder1.then(
                function(res) {
                    document.getElementById("coordinate1").value = res.geoObjects.get(0).geometry.getCoordinates();

                }
            );
        } else {
            place1 = "";
        }

        myMap.destroy();

        function getbound() {
            if (place1 != "") {
                return true;
            } else {
                return false
            }
        }

        multiRoute = new ymaps.multiRouter.MultiRoute({
            referencePoints: [place, place1 /*, place2, place3, place4*/ ],

        }, {
            // Автоматически устанавливать границы карты так, чтобы маршрут был виден целиком.
            boundsAutoApply: getbound()
        });


        myMap = new ymaps.Map('map', {
            center: [41.311151, 69.279737],
            zoom: 13,
            controls: ['zoomControl', 'searchControl']

        });

        myMap.geoObjects.add(multiRoute);

    }
    // end



    ymaps.ready(init);
</script>

</script>


@endsection