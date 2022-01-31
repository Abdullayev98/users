@extends('layouts.app')

@include('layouts.fornewtask')

@section('style')

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link rel="stylesheet" type="text/css" href="https://npmcdn.com/flatpickr/dist/themes/material_blue.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
          integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <script src="https://npmcdn.com/flatpickr/dist/l10n/ru.js"></script>
    <script src="https://npmcdn.com/flatpickr/dist/l10n/uz_latn.js"></script>

@endsection


@section('content')
    <style media="screen">

    </style>
    <!-- Information section -->
    {{--<script src="https://unpkg.com/@themesberg/flowbite@1.3.0/dist/datepicker.bundle.js"></script>--}}



    <form action="{{route('task.create.date.store', $task->id)}}" novalidate method="post">
        @csrf


        <div class="mx-auto w-9/12  my-16">
            <div class="grid grid-cols-3 gap-x-20">
                <div class="md:col-span-2 col-span-3">
                    <div class="w-full text-center text-2xl">
                        @lang('lang.budget_lookingFor') "{{session('name')}}"
                    </div>
                    <div class="w-full text-center my-4 text-gray-400">
                        @lang('lang.date_percent')
                    </div>
                    <div class="pt-1">
                        <div class="overflow-hidden h-1 text-xs flex rounded bg-gray-200  mx-auto ">
                            <div style="width: 70%"
                                 class="shadow-none  flex flex-col text-center whitespace-nowrap text-white justify-center bg-green-500"></div>
                        </div>
                    </div>
                    <div class="shadow-2xl w-full md:p-16 p-4 mx-auto my-4 rounded-2xl	w-full">
                        <div class="py-4 mx-auto px-auto text-center text-3xl texl-bold">
                            @lang('lang.date_startTime')
                        </div>
                        <div class="py-4 mx-auto px-auto text-center text-sm texl-bold">
                            @lang('lang.date_startDate')
                        </div>
                        <div class="py-4 mx-auto  text-left ">
                            <div class="mb-4">
                                <div id="formulario" class="flex flex-col gap-y-4">

                                    <div class="flex items-center ">
                                        <select name="date_type" id="periud"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                aria-label="Default select example">
                                            <option selected value="1" id="1">@lang('lang.date_startTask')</option>
                                            <option value="2" id="2">@lang('lang.date_finishTask')</option>
                                            <option value="3" id="3">@lang('lang.date_givePeriod')</option>
                                        </select>
                                    </div>

                                    {{--                  <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">--}}
                                    {{--                      <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path></svg>--}}
                                    {{--                  </div>--}}
                                    {{--                  <input datepicker type="text" id="start_date" name="start_date" value="{{old('start_date')}}" class=" flex-1 bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Дата" required>--}}
                                    {{--                  <input type="time" name="start_time" value="{{old('start_time')}}" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>--}}

                                    <div id="start-date" class="@if(!$errors->has('start_date')) hidden @endif">
                                        <div class="flatpickr inline-block flex flex-shrink" >
                                            <div class="flex-shrink">
                                                <input type="text" name="start_date" placeholder="@lang('lang.calendar')"
                                                       data-input
                                                       class=" bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm text-xs rounded-lg focus:ring-blue-500 focus:border-blue-500 block pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                       required> <!-- input is mandatory -->
                                            </div>
                                            @error('start_date')
                                            <p class="text-red-500">{{ $message }}</p>
                                            @enderror
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
                                    </div>
                                    {{--                <div>--}}
                                    {{--                  <p onclick="date()" id="today" class="text-base text-gray-500 hover:text-yellow-500 float-left mr-4 cursor-pointer">--}}
                                    {{--                    сегодня--}}
                                    {{--                  </p>--}}
                                    {{--                  <p onclick="dateYesterday()" id="tomorrow" class="text-base text-gray-500 hover:text-yellow-500 cursor-pointer w-4/12">--}}
                                    {{--                    завтра--}}
                                    {{--                  </p>--}}
                                    {{--                </div>--}}
                                    {{--              <div class="relative flex" id="datetime" style="display: none;">--}}
                                    {{--                  <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">--}}
                                    {{--                      <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path></svg>--}}
                                    {{--                  </div>--}}
                                    {{--                  <input datepicker id="end_date" type="text" name="end_date" value="{{old('end_date')}}" class=" flex-1 bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Дата">--}}
                                    {{--                  <input type="time" name="end_time" value="{{old('end_time')}}" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">--}}
                                    {{--              </div>--}}
                                    {{--              <div>--}}
                                    {{--                  <p onclick="date1()" style="display: none;" id="today1" class="text-base text-gray-500 hover:text-yellow-500 float-left mr-4 cursor-pointer">--}}
                                    {{--                    сегодня--}}
                                    {{--                  </p>--}}
                                    {{--                  <p onclick="dateYesterday1()" style="display: none;" id="tomorrow1" class="text-base text-gray-500 hover:text-yellow-500 cursor-pointer w-4/12">--}}
                                    {{--                    завтра--}}
                                    {{--                  </p>--}}
                                    {{--                </div>--}}
                                    <div id="end-date" class="@if(!$errors->has('end_date')) hidden @endif">
                                        <div class="flatpickr inline-block flex flex-shrink">
                                            <div class="flex-shrink">
                                                <input type="text" name="end_date" placeholder="@lang('lang.calendar')"
                                                       data-input
                                                       class=" bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm text-xs rounded-lg focus:ring-blue-500 focus:border-blue-500 block pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                       required > <!-- input is mandatory -->
                                            </div>
                                            @error('end_date')
                                            <p class="text-red-500">{{ $message }}</p>
                                            @enderror
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
                                    </div>
                                </div>
                                <div class="mt-4">
                                    <div class="flex w-full gap-x-4 mt-4">
                                        <a onclick="myFunction()"
                                           class="w-1/3  border border-black-700 hover:border-black transition-colors rounded-lg py-2 text-center flex justify-center items-center gap-2">
                                            <!-- <button type="button"> -->
                                        @lang('lang.notes_back')
                                        <!-- </button> -->
                                            <script>
                                                function myFunction() {
                                                    window.history.back();
                                                }
                                            </script>
                                        </a>
                                        <button type="submit"
                                                class="bg-green-500 hover:bg-green-500 w-2/3 cursor-pointer text-white font-bold py-5 px-5 rounded"
                                        >@lang('lang.name_next')</button>

                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <x-faq/>
            </div>
        </div>
    </form>
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


        $('#start-date').css('display', 'inline-block');


    </script>


@endsection

@section("javasript")

    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="https://npmcdn.com/flatpickr/dist/l10n/ru.js"></script>
    <script src="https://npmcdn.com/flatpickr/dist/l10n/uz_latn.js"></script>



@endsection
