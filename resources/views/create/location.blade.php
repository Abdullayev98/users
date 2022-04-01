@extends('layouts.app')

@include('layouts.fornewtask')

@section('content')
    <script>
        let userAddress;
        var myMap;
        var multiRoute;
        var place, place1 = "", place2 = "", place3 = "", place4 = "", place5 = "", place6 = "", place7 = "",
            place8 = "", place9 = "";
    </script>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>

    <script id="map_api"
            src="https://api-maps.yandex.ru/2.1/?apikey=f4b34baa-cbd1-432b-865b-9562afa3fcdb&lang={{__('ru_RU')}}&onload=onLoad"
            type="text/javascript"></script>

    <!-- Information section -->

    <form action="{{route("task.create.address.store", $task->id)}}" method="post">
        @csrf
        <div class="mx-auto sm:w-9/12 w-11/12 my-16">
            <div class="grid grid-cols-3 gap-x-20">
                <div class="lg:col-span-2 col-span-3">
                    <div class="w-full text-center text-2xl">
                        {{__('Ищем исполнителя для задания')}} "{{$task->name}}"
                    </div>
                    <div class="w-full text-center my-4 text-gray-400">
                        {{__('Задание заполнено на 55%')}}
                    </div>
                    <div class=" pt-1">
                        <div class="overflow-hidden h-1 text-xs flex rounded bg-gray-200  mx-auto ">
                            <div style="width: 55%"
                                 class="shadow-none  flex flex-col text-center whitespace-nowrap text-white justify-center bg-yellow-500"></div>
                        </div>
                    </div>
                    <div class="shadow-2xl w-full md:p-16 p-4 mx-auto my-4 rounded-2xl	w-full">

                        <div class="py-4 mx-auto px-auto text-center text-3xl texl-bold">
                            {{__('Где выполнить задание?')}}
                        </div>
                        <div class="py-4 mx-auto px-auto text-center text-sm texl-bold">
                            {{__('Укажите адрес или место, чтобы найти исполнителя рядом с вами.')}}
                        </div>

                        <div class="py-4 mx-auto  text-left ">
                            <div class="mb-4">
                                <div id="formulario" class="flex flex-col gap-y-4">

                                    <div class="flex items-center rounded-lg border py-">
                                        <button
                                            class="flex-shrink-0 border-transparent text-teal-500 text-md py-1 px-2 rounded focus:outline-none"
                                            type="button">
                                            A
                                        </button>
                                        <input autocomplete="off" oninput="myMapFunction()" id="suggest0"
                                               autofocus="autofocus"
                                               class="appearance-none bg-transparent w-full text-gray-700 mr-3 py-1 px-2 leading-tight focus:outline-none focus:border-yellow-500"
                                               type="search" placeholder="{{__('Город, Улица, Дом')}}"
                                               value="{{session('location2')}}" name="location0" required>
                                        <button id="getlocal"
                                                class="flex-shrink-0 border-transparent border-4 text-yellow-500 hover:text-yellow-600 text-sm py-1 px-2 rounded"
                                                type="button">
                                            <svg class="h-4 w-4 text-yellow-500" width="12" height="12"
                                                 viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                                 stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z"/>
                                                <path
                                                    d="M21 3L14.5 21a.55 .55 0 0 1 -1 0L10 14L3 10.5a.55 .55 0 0 1 0 -1L21 3"/>
                                            </svg>
                                        </button>
                                    </div>
                                    <input name="coordinates0" type="hidden" id="coordinate">
                                    <div id="addinput" class="flex gap-y-2 flex-col">


                                        @if($task->category->parent->double_address)
                                            <div class="flex items-center gap-x-2">
                                                <div class="flex items-center rounded-lg border  w-full py-1">
                                                    <button
                                                        class="Alfavit flex-shrink-0 border-transparent text-teal-500 text-md py-1 px-2 rounded focus:outline-none"
                                                        type="button"> B
                                                    </button>
                                                    <input oninput="myMapFunction()" id="suggest1"
                                                           class="appearance-none bg-transparent w-full text-gray-700 mr-3 py-1 px-2 leading-tight focus:outline-none"
                                                           type="search" name="location1"
                                                           placeholder="Город, Улица, Дом" aria-label="Full name">
                                                    <button id="1" onclick="getLocals(this.id)"
                                                            class="flex-shrink-0 border-transparent border-4 text-yellow-500 hover:text-yellow-600 text-sm py-1 px-2 rounded"
                                                            type="button">
                                                        <svg className="h-4 w-4 text-yellow-500" width="18" height="18"
                                                             viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                                             fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                            <path stroke="none" d="M0 0h24v24H0z"/>
                                                            <path
                                                                d="M21 3L14.5 21a.55 .55 0 0 1 -1 0L10 14L3 10.5a.55 .55 0 0 1 0 -1L21 3"/>
                                                        </svg>
                                                    </button>
                                                </div>
                                                <button id="remove_inputs"
                                                        class="bg-white hover:bg-gray-100 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded shadow">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="20"
                                                         fill="none">
                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                              d="M3.25 2.95v-.2A2.75 2.75 0 0 1 6 0h6a2.75 2.75 0 0 1 2.75 2.75v.2h2.45a.8.8 0 0 1 0 1.6H.8a.8.8 0 1 1 0-1.6h2.45zm10 .05v-.25c0-.69-.56-1.25-1.25-1.25H6c-.69 0-1.25.56-1.25 1.25V3h8.5z"
                                                              fill="#666"/>
                                                        <path
                                                            d="M14.704 6.72a.8.8 0 1 1 1.592.16l-.996 9.915a2.799 2.799 0 0 1-2.8 2.802h-7c-1.55 0-2.8-1.252-2.796-2.723l-1-9.994a.8.8 0 1 1 1.592-.16L4.3 16.794c0 .668.534 1.203 1.2 1.203h7c.665 0 1.2-.536 1.204-1.282l1-9.995z"
                                                            fill="#666"/>
                                                        <path
                                                            d="M12.344 7.178a.75.75 0 1 0-1.494-.13l-.784 8.965a.75.75 0 0 0 1.494.13l.784-8.965zm-6.779 0a.75.75 0 0 1 1.495-.13l.784 8.965a.75.75 0 0 1-1.494.13l-.785-8.965z"
                                                            fill="#666"/>
                                                    </svg>
                                                </button>
                                                <input name="coordinates1" type="hidden" id="coordinate1">
                                            </div>
                                        @endif
                                    </div>
                                </div>

                                <div class="mt-4">
                                    <button id="addbtn" type="button"
                                            class="w-full border-dashed border border-black rounded-lg py-2 text-center flex justify-center items-center gap-2"
                                            name="button">
                                        <i class="fas fa-map-marker-alt text-yellow-500"></i>
                                        <span>{{__('Добавить ещё адрес')}}</span>
                                    </button>
                                    <div id="map" class="h-60 mt-4 rounded-lg w-full"></div>
                                    @foreach($task->category->customFieldsInAddress as $data)
                                        @include('create.custom-fields')
                                    @endforeach
                                    <div class="flex w-full mt-4">
                                        <a onclick="backfunctionlocation()"
                                           class="bg-white my-4 cursor-pointer hover:border-yellow-500 text-gray-600 hover:text-yellow-500 transition duration-300 font-normal text-xl py-3 sm:px-8 px-4 rounded-2xl border border-2">
                                            <!-- <button type="button"> -->
                                        {{__('Назад')}}
                                        <!-- </button> -->
                                            <script>
                                                function backfunctionlocation() {
                                                    window.history.back();
                                                }
                                            </script>
                                        </a>

                                        <input type="submit"
                                               style="background: linear-gradient(164.22deg, #FDC4A5 4.2%, #FE6D1D 87.72%);"
                                               class="bg-yellow-500 hover:bg-yellow-600 m-4 cursor-pointer text-white font-normal text-2xl py-3 sm:px-14 px-8 rounded-2xl "
                                               name="" value="{{__('Далее')}}">
                                    </div>


                                </div>
                            </div>
                        </div>


                        <input type="number" id="x" value="{{ $task->category->parent->double_address? 2:1 }}"
                               class="hidden">
                    </div>
                </div>
                <x-faq/>
            </div>
        </div>


    </form>

    <script src="{{ asset('js/location.js') }}"></script>

@endsection
