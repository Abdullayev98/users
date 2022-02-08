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
                               class="border border-gray-200 rounded-md shadow-sm focus:outline-none p-2 mb-4 w-full"
                               value="{{ $task->name }}">
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
                            <option
                                value="{{ $category->id }}" {{ $category->id == $task->category_id ? 'selected' : null }} >{{ $category->name }}</option>
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
                               name="budget" value="{{ $task->price }}"
                               class="border border-gray-200 rounded-md shadow-sm focus:outline-none p-2 mb-4 w-full">

                    </label>
                </div>
                <div>
                    <label class="text-xs text-gray-500">
                        Опишите пожелания и детали, чтобы исполнители лучше оценили вашеу задачу
                        <textarea type="number"
                                  name="description"
                                  class="border border-gray-200 rounded-md shadow-sm focus:outline-none p-2 mb-4 w-full">{{ $task->description }}</textarea>
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
                                <option value="1"{{ $task->date_type == 1 ? 'selected' : null }} id="1">Начать работу</option>
                                <option value="2" {{ $task->date_type == 2 ? 'selected' : null }}   id="2">Закончить работу</option>
                                <option value="3" {{ $task->date_type == 3 ? 'selected' : null }}  id="3">Указать период</option>
                            </select>
                        </div>
                        @if($task->start_date)
                            <div id="start-date" class=" hidden " style="display: inline-block;">
                                <div class="flatpickr inline-block flex">
                                    <div class="flex ">
                                        <input type="hidden" name="start_date" placeholder="Какой месяц.." data-input=""
                                               class="focus:outline-none w-full text-left bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm text-xs rounded-lg focus:ring-blue-500 focus:border-blue-500 block pl-3 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 flatpickr-input"
                                               required="" value="{{ $task->start_date }}">
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
                        @endif

                        @if($task->end_date)
                            <div id="start-date" class=" hidden " style="display: inline-block;">
                                <div class="flatpickr inline-block flex">
                                    <div class="flex ">
                                        <input type="hidden" name="start_date" placeholder="Какой месяц.." data-input=""
                                               class="focus:outline-none w-full text-left bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm text-xs rounded-lg focus:ring-blue-500 focus:border-blue-500 block pl-3 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 flatpickr-input"
                                               required="" value="{{ $task->end_date }}">
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
                        @endif
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
                                       type="text" placeholder="Город, Улица, Дом" value="{{ json_decode($task->address)->location }}" name="location0">
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
                            <input name="coordinates0" type="hidden" id="coordinate" >
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
                                    <button id="addbtn" type="button"  class="w-full border-dashed border border-black rounded-lg py-2 text-center flex justify-center items-center gap-2" name="button">
                                        <svg class="h-4 w-4 text-gray-500 "  fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                        </svg>
                                        <span >@lang('lang.loc_add')</span>
                                    </button>
                                    <div id="map" class="h-60 mt-4 rounded-lg w-full" ></div>
                                    <div class="flex w-full gap-x-4 mt-4">
                                        <a onclick="backfunctionlocation()" class="w-1/3 cursor-pointer  border border-black-700 hover:border-black transition-colors rounded-lg py-2 text-center flex justify-center items-center gap-2">
                                            <!-- <button type="button"> -->
                                        @lang('lang.notes_back')
                                        <!-- </button> -->
                                            <script>
                                                function backfunctionlocation() {
                                                    window.history.back();
                                                }
                                            </script>
                                        </a>

                                        <input type="submit" class="bg-green-500 hover:bg-green-500 w-2/3 cursor-pointer text-white font-bold py-5 px-5 rounded" name="" value="@lang('lang.name_next')">

                                    </div>


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
                            <option value="{{$task->category->max/5}}">
                                {{$task->category->max/5}} UZS
                            </option>
                            <option value="{{$task->category->max/5*2}}">
                                {{$task->category->max/5*2}} UZS
                            </option>
                            <option value="{{$task->category->max/5*3}}">
                                {{$task->category->max/5*3}} UZS
                            </option>
                            <option value="{{$task->category->max/5*4}}">
                                {{$task->category->max/5*4}} UZS
                            </option>
                            <option value="{{$task->category->max}}">
                                {{$task->category->max/5}} UZS
                            </option>
                        </select>
                    </div>
                    <div class="my-4 text-base">
                    <span>
                        или укажите другую сумму &nbsp
                    </span>
                        <input
                            class="border border-gray-200 md:mx-4 md:px-2 py-2 pr-2 rounded-md focus:outline-none text-right"
                            placeholder="SUMMA" name="budget" value="{{ $task->price }}">SUM
                        @error('budget')
                        <p class="text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="text-base my-4 ">
                    <h1 class="text-xl font-semibold py-2">Ваши контакты</h1>
                    <input id="phone_number"
                           class="text-base border border-gray-200 md:w-1/2 focus:outline-none py-2 px-3 rounded-md"
                           type="text" value="{{ $task->phone }}"
                           placeholder="+998(00)000-00-00">
                    <input type="hidden" id="phone" name="phone" {{ $task->phone }}>
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


    <script src='https://unpkg.com/imask'></script>

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
        var element = document.getElementById('phone');
        var maskOptions = {
            mask: '+998(00)000-00-00',
            lazy: false
        }
        var mask = new IMask(element, maskOptions);

        $("#phone_number").keyup(function () {
            var text = $(this).val()
            text = text.replace(/[^0-9.]/g, "")
            text = text.slice(3)
            $("#phone").val(text)
        })
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



@endsection


@section("javasript")


    <script src="{{ asset('js/location.js') }}"></script>



@endsection
