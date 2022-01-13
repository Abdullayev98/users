@extends('layouts.app')

@section('content')
    @if(session('cat_id') == 28)
    <form class="" action="{{route('task.create.avto_delivery')}}" method="post">
    @else
        <form class="" action="{{route('task.create.date')}}" method="post">
    @endif
        @csrf

        <div class="mx-auto w-9/12  my-16">
            <div class="grid grid-cols-3 gap-x-20">
                <div class="md:col-span-2 col-span-3">
                    <div class="w-full text-center text-2xl">
                    Ищем исполнителя для задания "{{session('name')}}"
                    </div>
                    <div class="w-full text-center my-4 text-[#5f5869]">
                    Задание заполнено на 60%
                    </div>
                    <div class="pt-1">
                        <div class="overflow-hidden h-1 text-xs flex rounded bg-gray-200  mx-auto ">
                            <div style="width: 60%" class="shadow-none  flex flex-col text-center whitespace-nowrap text-white justify-center bg-green-500"></div>
                        </div>
                    </div>
                    <div class="shadow-2xl w-full md:p-16 p-4 mx-auto my-4 rounded-2xl	w-full">
                        <div class="py-4 mx-auto px-auto text-center text-3xl texl-bold">
                            @lang('lang.cargo_howBig')
                        </div>
                        <div class="py-4 mx-auto px-auto text-center text-sm texl-bold">
                        Какие параметры посылки?
                        </div>
                        <div class="py-4 mx-auto  text-left ">
                            <div class="mb-4">
                                <div id="formulario" class="flex flex-col gap-y-4">
                                        Вес посылки, кг
                                        <input max='50' id="delivey_weight" name="delivey_weight" type="number" class="shadow appearance-none border focus:shadow-orange-500 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none"  required>
                                        Длина, м
                                        <input max='100' id="delivey_length" name="delivey_length" type="number" class="shadow appearance-none border focus:shadow-orange-500 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none"  required>
                                        Ширина, м
                                        <input max='100' id="delivey_width" name="delivey_width" type="number" class="shadow appearance-none border focus:shadow-orange-500 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none"  required>
                                        Высота, м
                                        <input max='100' id="delivey_height" name="delivey_height" type="number" class="shadow appearance-none border focus:shadow-orange-500 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none"  required>
                                        Ценность посылки, uzs.
                                        <input id="delivey_budget" name="delivey_budget" type="number" class="shadow appearance-none border focus:shadow-orange-500 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none"  required>
                                </div>
                                <div class="mt-4">
                                    <div class="flex w-full gap-x-4 mt-4">
                                    <a onclick="myFunction()" class="w-1/3  border border-[#000]-700 hover:border-[#000] transition-colors rounded-lg py-2 text-center flex justify-center items-center gap-2">
                                            <!-- <button type="button"> -->
                                            @lang('lang.notes_back')
                                            <!-- </button> -->
                                            <script>
                                                function myFunction() {
                                                    window.history.back();
                                                }
                                            </script>
                                        </a>
                                        <input type="submit"
                                               class="bg-[#6fc727] hover:bg-[#5ab82e] w-2/3 cursor-pointer text-white font-bold py-5 px-5 rounded"
                                               name="" value="@lang('lang.name_next')">

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


@endsection