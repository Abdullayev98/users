@extends("layouts.app")

@section("content")
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link rel="stylesheet" type="text/css" href="https://npmcdn.com/flatpickr/dist/themes/material_blue.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
          integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <script src="https://npmcdn.com/flatpickr/dist/l10n/ru.js"></script>
    <script src="https://npmcdn.com/flatpickr/dist/l10n/uz_latn.js"></script>
    {{--    <style>.flatpickr-calendar{width:230px;} </style>--}}
    <style>.flatpickr-calendar {
            max-width: 295px;
            width: 100%;
        } </style>
    <form action="{{ route('task.update', $task->id) }}" method="post">
        @csrf
        @method('put')

        <div class="xl:w-8/12 lg:10/12  mx-auto lg:flex mt-4 md:mt-8">
            <div class="lg:w-8/12 w-11/12 mx-auto bg-yellow-50 py-6 px-12 rounded-md ">
                <h1 class="text-3xl font-semibold">Заполните заявку</h1>
                <div>
                    <label class="text-sm">
                        Мне нужно
                        <input type="text" name="name"
                               class="border border-gray-200 rounded-md shadow-sm focus:outline-none p-2 mb-4 w-full" value="{{ $task->name }}">
                        @error('name')
                        <p class="text-red-500">{{ $message }}</p>
                        @enderror
                    </label>
                </div>
                <div class="md:flex">
                    <select onchange="func_for_select(Number(this.options[this.selectedIndex].value));"
                            class="mr-4 form-select block w-full  px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding bg-no-repeat border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                            aria-label="Default select example">
                        <option disabled>@lang('lang.name_chooseOne')</option>
                        <option>{{ $task->category->name }}</option>
                    </select>

                    <select name="category_id"
                            onchange="func_for_select(Number(this.options[this.selectedIndex].value));"
                            class="form-select block w-full  px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding bg-no-repeat border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                            aria-label="Default select example">
                        <option disabled>@lang('lang.name_chooseOne')</option>
                        @foreach($categories2 as $category)
                            <option value="{{ $category->id }}"  {{ $category->id == $task->category_id ? 'selected' : null }} >{{ $category->name }}</option>
                        @endforeach
                    </select>
                    {{--                    @error('category_id')--}}
                    {{--                    <p class="text-red-500">{{ $message }}</p>--}}
                    {{--                    @enderror--}}
                </div>
                <div class="my-2">
                    <label class="text-xs text-gray-500">
                        Ценность покупки, SUM
                        <input type="number"
                               name=""
                               class="border border-gray-200 rounded-md shadow-sm focus:outline-none p-2 mb-4 w-full">

                    </label>
                </div>
                <div>
                    <label class="text-xs text-gray-500">
                        Опишите пожелания и детали, чтобы исполнители лучше оценили вашеу задачу
                        <textarea type="number"
                                  name="description"
                                  class="border border-gray-200 rounded-md shadow-sm focus:outline-none p-2 mb-4 w-full"></textarea>
                        @error('description')
                        <p class="text-red-500">{{ $message }}</p>
                        @enderror
                    </label>
                </div>
                <div>
                    <label class="text-sm text-gray-500">
                        <input type="checkbox"> Забрать у получителя оплату за товар и вернуть заказчику?
                    </label>
                </div>
                <div class="my-4">
                    <label class="text-sm text-gray-500">
                        Дата и время <br>
                        <div>
                            <select name="date_type" id="periud"
                                    class="bg-gray-50 focus:outline-none border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block md:float-left mb-4 md:mb-0 w-full md:w-6/12 mr-4 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    aria-label="Default select example">
                                <option value="1" id="1">Начать работу</option>
                                <option value="2" id="2">Закончить работу</option>
                                <option value="3" id="3">Указать период</option>
                            </select>
                        </div>
                        <div id="start-date" class=" hidden " style="display: inline-block;">
                            <div class="flatpickr inline-block flex">
                                <div class="flex ">
                                    <input type="hidden" name="start_date" placeholder="Какой месяц.." data-input=""
                                           class="focus:outline-none w-full text-left bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm text-xs rounded-lg focus:ring-blue-500 focus:border-blue-500 block pl-3 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 flatpickr-input"
                                           required="" value="2022-02-17 12:00:0">
                                </div>
                                <div class="flatpickr-calendar w-full sm:text-sm"></div>
                                <div class="transform hover:scale-125">
                                    <a class="input-button w-1 h-1  pl-1 " title="toggle" data-toggle="">
                                        <i class="far fa-calendar-alt fa-2x mt-1 fill-current text-green-600"></i>
                                    </a>
                                </div>
                                <div class="transform hover:scale-125">
                                    <a class="input-button w-1 h-1 md:pl-2 pl-1 " title="clear" data-clear="">
                                        <i class="fas fa-trash-alt fa-2x mt-1 stroke-current text-red-600 "></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </label>
                </div>
                <div>
                    <div class="mb-4">
                        <div id="formulario" class="flex flex-col gap-y-4 text-base">

                            <div class="flex items-center bg-white hover:bg-gray-100  rounded-lg border py-1">
                                <button
                                    class="flex-shrink-0 border-transparent text-teal-500 text-md py-1 px-2 rounded focus:outline-none"
                                    type="button">
                                    A
                                </button>
                                <ymaps
                                    style="z-index: 40000; display: block; position: absolute; width: 521px; top: 483.5px; left: 285.35px;"></ymaps>
                                <input autocomplete="off" oninput="myFunction()" id="suggest0"
                                       class="appearance-none bg-transparent w-full text-gray-700 mr-3 py-1 px-2 leading-tight focus:outline-none"
                                       type="text" placeholder="Город, Улица, Дом" value="" name="location0">
                                @error('location0')
                                <p class="text-red-500">{{ $message }}</p>
                                @enderror
                                <button id="getlocal"
                                        class="flex-shrink-0 border-transparent border-4 text-teal-500 hover:text-teal-800 text-sm py-1 px-2 rounded"
                                        type="button">
                                    <svg class="h-4 w-4 text-purple-500" width="12" height="12" viewBox="0 0 24 24"
                                         stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                                         stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z"></path>
                                        <path
                                            d="M21 3L14.5 21a.55 .55 0 0 1 -1 0L10 14L3 10.5a.55 .55 0 0 1 0 -1L21 3"></path>
                                    </svg>
                                </button>


                            </div>
                            <input name="coordinates0" type="hidden" id="coordinate">
                            <div id="addinput" class="flex gap-y-2 flex-col">


                            </div>
                        </div>
                        <div>
                            <div class="mb-4">
                                <div id="formulario" class="flex flex-col gap-y-4">

                                    <div id="addinput" class="flex gap-y-2 flex-col bg-white hover:bg-gray-100 ">


                                    </div>
                                </div>
                                <div class="mt-4">
                                    <button id="addbtn" type="button"
                                            class="w-full bg-white hover:bg-gray-100 border-dashed border border-black rounded-lg py-2 text-center flex justify-center items-center gap-2"
                                            name="button">
                                        <svg class="h-4 w-4 text-gray-500 " fill="none" viewBox="0 0 24 24"
                                             stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                  d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                  d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                        </svg>
                                        <span class="text-base">@lang('lang.loc_add')</span>
                                    </button>
                                    <div id="map" class="h-60 mt-4 rounded-lg w-full"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <label class="text-base">
                            <input type="checkbox">
                            Отдаю предпочтение застрахованным исполнительям ?
                        </label>
                    </div>
                </div>
                <div class="text-base my-6 bg-white rounded-md shadow-md p-4">
                    <h1 class="text-xl font-semibold py-4">На какой бюджет вы рассчитываете?</h1>
                    <div>
                        <select class="border border-gray-300 rounded-md w-full focus:outline-none py-2 px-4"
                                name="budget" id="budget">
                            <option value="1">
                                1000
                            </option>
                            <option value="1">
                                10000
                            </option>
                            <option value="1">
                                100000
                            </option>
                        </select>
                    </div>
                    <div class="my-4 text-base">
                    <span>
                        или укажите другую сумму &nbsp
                    </span>
                        <input
                            class="border border-gray-200 md:mx-4 md:px-2 py-2 pr-2 rounded-md focus:outline-none text-right"
                            placeholder="SUMMA" name="budget" value="до ">SUM
                        @error('budget')
                        <p class="text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="text-base my-4 ">
                    <h1 class="text-xl font-semibold py-2">Ваши контакты</h1>
                    <input name="phone"
                           class="text-base border border-gray-200 md:w-1/2 focus:outline-none py-2 px-3 rounded-md"
                           type="text"
                           placeholder="+998(00)000-00-00">
                    @error('phone')
                    <p class="text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <div class="text-base my-5 mt-8">
                    <button type="submit"
                            class="text-2xl mr-5 bg-green-500 hover:bg-green-700 text-white px-4 py-2 rounded-md ">
                        Сохранить
                    </button>
                    <a href="#"
                       class="text-xl text-blue-500 hover:text-red-500 border-b border-dotted border-blue-500 hover:border-red-500">Отмена</a>
                </div>
            </div>
            <div class="w-4/12 md:block hidden">
                @include('components.faq')
            </div>
        </div>

    </form>



    <script>
        var myMap;
        var multiRoute;
        var place, place1 = "", place2 = "", place3 = "", place4 = "";
    </script>
    <script id="map_api"
            src="https://api-maps.yandex.ru/2.1/?apikey=f4b34baa-cbd1-432b-865b-9562afa3fcdb&lang=@lang('lang.lang_for_map')&onload=onLoad"
            type="text/javascript">
    </script>
    <script>

        flatpickr.localize(flatpickr.l10ns.uz_latn);
        flatpickr.localize(flatpickr.l10ns.ru);
        flatpickr(".flatpickr",
            {
                wrap: true,
                enableTime: true,
                allowInput: true,
                altInput: true,
                minDate: "today",
                dateFormat: "Y-m-d H:i:s",
                altFormat: "Y-m-d H:i:s",

                locale: "@lang('lang.dateLang')",
            },
        )
        $('#periud').change(function () {
            switch ($(this).val()) {
                case "1":
                    $('#start-date').css('display', 'inline-block');
                    $('#end-date').css('display', 'none');
                    break;
                case "2":
                    $('#start-date').css('display', 'none');
                    $('#end-date').css('display', 'inline-block');
                    break;
                case "3":
                    $('#start-date').css('display', 'inline-block');
                    $('#end-date').css('display', 'inline-block');
                    break;
            }
        })

        @if(!$errors->has('end_date'))
        $('#start-date').css('display', 'inline-block');
        @endif

    </script>

    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="https://npmcdn.com/flatpickr/dist/l10n/ru.js"></script>
    <script src="https://npmcdn.com/flatpickr/dist/l10n/uz_latn.js"></script>

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

            suggestView0.events.add('select', function () {
                myFunction();
            });

            const alp = ["B", "C", "D", "E"];
            $("#addbtn").click(function () {
                if (x < 2) {
                    $("#addinput").append('<div class="flex items-center gap-x-2">' +
                        '<div class="bg-white hover:bg-gray-200 flex items-center rounded-lg border  w-full py-1"> ' +
                        '<button class="flex-shrink-0 border-transparent text-teal-500 text-md py-1 px-2 rounded focus:outline-none" type="button">  ' + alp[x - 1] + ' </button>' +
                        ' <input oninput="myFunction()" id="suggest' + (x) + '" class="appearance-none bg-transparent w-full text-gray-700 mr-3 py-1 px-2 leading-tight focus:outline-none"' +
                        ' type="text" name="location' + x + '" placeholder="Город, Улица, Дом" aria-label="Full name"> ' +
                        '  </div><button id="remove_inputs" class="bg-white hover:bg-gray-100 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded shadow"> ' +
                        ' <svg xmlns="http://www.w3.org/2000/svg" width="18" height="20" fill="none"><path fill-rule="evenodd" clip-rule="evenodd" d="M3.25 2.95v-.2A2.75 2.75 0 0 1 6 0h6a2.75 2.75 0 0 1 2.75 2.75v.2h2.45a.8.8 0 0 1 0 1.6H.8a.8.8 0 1 1 0-1.6h2.45zm10 .05v-.25c0-.69-.56-1.25-1.25-1.25H6c-.69 0-1.25.56-1.25 1.25V3h8.5z" fill="#666"/>' +
                        '<path d="M14.704 6.72a.8.8 0 1 1 1.592.16l-.996 9.915a2.799 2.799 0 0 1-2.8 2.802h-7c-1.55 0-2.8-1.252-2.796-2.723l-1-9.994a.8.8 0 1 1 1.592-.16L4.3 16.794c0 .668.534 1.203 1.2 1.203h7c.665 0 1.2-.536 1.204-1.282l1-9.995z" fill="#666"/>' +
                        '<path d="M12.344 7.178a.75.75 0 1 0-1.494-.13l-.784 8.965a.75.75 0 0 0 1.494.13l.784-8.965zm-6.779 0a.75.75 0 0 1 1.495-.13l.784 8.965a.75.75 0 0 1-1.494.13l-.785-8.965z" fill="#666"/></svg> </button> ' +
                        '<input name="coordinates' + x + '" type="hidden" id="coordinate' + x + '"> </div>    ');
                    x++;
                } else {
                    alert("max five field allowed");
                }
                var suggestView = [];
                for (var i = 1; i <= x; i++) {
                    suggestView[i] = new ymaps.SuggestView('suggest' + i);
                    suggestView[i].events.add('select', function () {
                        myFunction();
                    });
                }
            });
            $("#addinput").on("click", "#remove_inputs", function () {
                $(this).parent("div").remove();

                x--;
                myFunction();
            });


            $("#getlocal").click(function () {

                var geolocation = ymaps.geolocation;
                geolocation.get({
                    mapStateAutoApply: true,
                }).then(function (result) {
                        // Синим цветом пометим положение, полученное через браузер.
                        // Если браузер не поддерживает эту функциональность, метка не будет добавлена на карту.
                        var userAddress = result.geoObjects.get(0).properties.get('text');
                        document.getElementById("suggest0").value = userAddress;
                        document.getElementById("coordinate").value = result.geoObjects.get(0).geometry.getCoordinates();

                    },
                    function (err) {
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
                function (res) {
                    document.getElementById("coordinate").value = res.geoObjects.get(0).geometry.getCoordinates();
                    myMap.setCenter(res.geoObjects.get(0).geometry.getCoordinates());
                }
            );


            if (document.getElementById("suggest1")) {
                place1 = document.getElementById("suggest1").value;
                var myGeocoder1 = ymaps.geocode(place1);
                myGeocoder1.then(
                    function (res) {
                        document.getElementById("coordinate1").value = res.geoObjects.get(0).geometry.getCoordinates();

                    }
                );
            } else {
                place1 = "";
            }

            // if(document.getElementById("suggest2")){
            //   place2 = document.getElementById("suggest2").value;
            //   var myGeocoder2 = ymaps.geocode(place2);
            //   myGeocoder2.then(
            //       function (res) {
            //         document.getElementById("coordinate2").value = res.geoObjects.get(0).geometry.getCoordinates();

            //       }
            //   );
            // }
            // else {
            //   place2 ="";
            // }

            // if(document.getElementById("suggest3")){
            //   place3 = document.getElementById("suggest3").value;
            //   var myGeocoder3 = ymaps.geocode(place3);
            //   myGeocoder3.then(
            //       function (res) {
            //         document.getElementById("coordinate3").value = res.geoObjects.get(0).geometry.getCoordinates();

            //       }

            //   );
            // }
            // else {
            //   place3 ="";
            // }

            // if(document.getElementById("suggest4")){
            //   place4 = document.getElementById("suggest4").value;
            //   var myGeocoder4 = ymaps.geocode(place4);
            //   myGeocoder4.then(
            //       function (res) {
            //         document.getElementById("coordinate4").value = res.geoObjects.get(0).geometry.getCoordinates();

            //       }
            //   );
            // } else {
            //   place4 ="";
            // }

            myMap.destroy();

            function getbound() {
                if (place1 != "") {
                    return true;
                } else {
                    return false
                }
            }

            multiRoute = new ymaps.multiRouter.MultiRoute({
                referencePoints: [place, place1 /*, place2, place3, place4*/],

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
@endsection
