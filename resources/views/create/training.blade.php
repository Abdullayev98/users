@extends('layouts.app')

@section('content')

    <form class="" action="{{route('task.create.learning')}}" method="post">
        @csrf

        <div class="mx-auto w-9/12  my-16">
            <div class="grid grid-cols-3 gap-x-20">
                <div class="md:col-span-2 col-span-3">
                    <div class="w-full text-center text-2xl">
                        Ищем исполнителя для задания "{{session('name')}}"
                    </div>
                    <div class="w-full text-center my-4 text-[#5f5869]">
                        Задание заполнено на 33%
                    </div>
                    <div class="pt-1">
                        <div class="overflow-hidden h-1 text-xs flex rounded bg-gray-200  mx-auto ">
                            <div style="width: 57%" class="shadow-none  flex flex-col text-center whitespace-nowrap text-white justify-center bg-green-500"></div>
                        </div>
                    </div>
                    <div class="shadow-2xl w-full md:p-16 p-4 mx-auto my-4 rounded-2xl	w-full">
                        <div class="py-4 mx-auto px-auto text-center text-3xl texl-bold">
                            Где нужно убраться?
                        </div>
                        <div class="py-4 mx-auto px-auto text-center text-sm texl-bold">
                            Укажите вес и размеры, чтобы исполнители подобрали подходящий транспорт.
                        </div>
                        <div class="py-4 mx-auto  text-left ">
                            <div class="mb-4">
                                <div id="formulario" class="flex flex-col gap-y-4">
                                Частота
                                    <select id="training" name="training" class="shadow appearance-none border focus:shadow-orange-500 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none"  required>
                                        <option>Регулярно</option>
                                        <option>Только одно занятие</option>
                                    </select>
                                    Как часто требуется уборка
                                    <select id="time" name="time" type="number" class="shadow appearance-none border focus:shadow-orange-500 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none"  required>
                                        <option>45 минут</option>
                                        <option>60 минут</option>
                                        <option>90 минут</option>
                                        <option>120 минут</option>
                                        <option>Неважно</option>
                                    </select>
                                </div>
                                <div class="mt-4">
                                    <div class="flex w-full gap-x-4 mt-4">
                                        <a href="/task/create/location" class="w-1/3  border border-[#000]-700 hover:border-[#000] transition-colors rounded-lg py-2 text-center flex justify-center items-center gap-2">
                                            <!-- <button type="button"> -->
                                            Назад
                                            <!-- </button> -->
                                        </a>
                                        <input type="submit"
                                               class="bg-[#6fc727] hover:bg-[#5ab82e] w-2/3 cursor-pointer text-white font-bold py-5 px-5 rounded"
                                               name="" value="Далее">

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
