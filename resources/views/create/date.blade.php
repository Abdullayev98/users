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
{{--    <style>.flatpickr-calendar{width:230px;} </style>--}}
    <style>.flatpickr-calendar{max-width: 295px; width: 100%;} </style>
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
                        @lang('lang.budget_lookingFor') "{{$task->name}}"
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
                                            <option {{ old('date_type') == "1" ? 'selected' :null }} value="1" id="1">@lang('lang.date_startTask')</option>
                                            <option  {{ old('date_type') == "2" ? 'selected' :null }}  value="2" id="2">@lang('lang.date_finishTask')</option>
                                            <option  {{ old('date_type') == "3" ? 'selected' :null }} value="3" id="3">@lang('lang.date_givePeriod')</option>
                                        </select>
                                    </div>
                                    <div id="start-date" class="@if(!$errors->has('start_date')) hidden @endif">
                                        <div class="flatpickr inline-block flex">
                                            <div class="flex " >
                                                <input type="text" name="start_date"
                                                       placeholder="@lang('lang.calendar')"
                                                       data-input
                                                       class="w-full max-w-[295px] text-left bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm text-xs rounded-lg focus:ring-blue-500 focus:border-blue-500 block pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                       required> <!-- input is mandatory -->
                                            </div>
                                            <div class="flatpickr-calendar max-w-[295px] w-full sm:text-sm text-[10px]"></div>
                                            <div class="transform hover:scale-125">
                                                <a class="input-button w-1 h-1  pl-1 " title="toggle" data-toggle>
                                                    <i class="far fa-calendar-alt fill-current text-green-600"></i>
                                                </a>
                                            </div>
                                            <div class="transform hover:scale-125">
                                                <a class="input-button w-1 h-1 md:pl-2 pl-1 " title="clear" data-clear>
                                                    <i class="fas fa-trash-alt stroke-current text-red-600 "></i>
                                                </a>
                                            </div>
                                            @error('start_date')
                                            <p class="lg:text-base md:text-xs text-xs pl-1 text-red-500">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div id="end-date" class="@if(!$errors->has('end_date')) hidden @endif">
                                        <div class="flatpickr inline-block flex ">
                                            <div class="flex">
                                                <input type="text" name="end_date" placeholder="@lang('lang.calendar')"
                                                       data-input
                                                       class="w-full max-w-[295px] bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm text-xs rounded-lg focus:ring-blue-500 focus:border-blue-500 block pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                       required> <!-- input is mandatory -->
                                            </div>

                                            <div class="transform hover:scale-125">
                                                <a class="input-button w-1 h-1  pl-1  " title="toggle" data-toggle>
                                                    <i class="far fa-calendar-alt fill-current text-green-600"></i>
                                                </a>
                                            </div>
                                            <div class="transform hover:scale-125">
                                                <a class="input-button w-1 h-1 md:pl-2 pl-1  " title="clear" data-clear>
                                                    <i class="fas fa-trash-alt stroke-current text-red-600 "></i>
                                                </a>
                                            </div>
                                            @error('end_date')
                                            <p class="lg:text-base md:text-sm text-xs pl-1 text-red-500">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                @foreach($task->category->customFieldsInDate as $data)
                                    @include('create.custom-fields')
                                @endforeach
                                <div class="mt-4">
                                    <div class="flex w-full gap-x-4 mt-4">
                                        <a onclick="myFunction()"
                                           class="w-1/3  border cursor-pointer border-black-700 hover:border-black transition-colors rounded-lg py-2 text-center flex justify-center items-center gap-2">
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

        @if(!$errors->has('end_date'))
        $('#start-date').css('display', 'inline-block');
        @endif

    </script>
@endsection

@section("javasript")
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="https://npmcdn.com/flatpickr/dist/l10n/ru.js"></script>
    <script src="https://npmcdn.com/flatpickr/dist/l10n/uz_latn.js"></script>
@endsection
