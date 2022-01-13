@extends('layouts.app')

@section('content')

    <!-- Information section -->
    <x-roadmap/>
    <form class="" action="{{route('task.create.location')}}" method="post">
        @csrf
        <div class="mx-auto w-9/12  my-16">
            <div class="grid grid-cols-3 gap-x-20">
                <div class="col-span-2">
                    <div class="w-full text-center text-2xl">
                        Ищем исполнителя для задания "{{session('name')}}"
                    </div>
                    <div class="w-full text-center my-4 text-[#5f5869]">
                        Задание заполнено на 33%
                    </div>
                    <div class="relative pt-1">
                        <div class="overflow-hidden h-1  flex rounded bg-gray-200  mx-auto ">
                            <div style="width: 86%" class="shadow-none  flex flex-col text-center whitespace-nowrap text-white justify-center bg-green-500"></div>
                        </div>
                    </div>
                    <div class="shadow-xl w-full mx-auto mt-7 rounded-2xl	w-full p-6 px-20">
                        <div class="py-4 mx-auto px-auto text-center text-3xl texl-bold">
                            Какие услуги понадобятся?
                        </div>

                        <div class="py-4 mx-auto  text-left ">
                            <div class="mb-4">
                                <div id="formulario" class="flex flex-col gap-y-4">

                                    <div>

                                        <div class="mb-3 xl:w-full">
                                            @foreach ($categories as $category)
                                                <label class="md:w-2/3 block mt-6">
                                                    <input class="mr-2  h-4 w-4" type="checkbox" value="{{$category}}" name="services[]">
                                                    <span class="text-lg text-slate-900">
                                                    {{$category}}
                                                    </span>
                                                </label>
                                            @endforeach
{{--                                            <input type="checkbox" id="a1"--}}
{{--                                                   name="a1[]" value="1">--}}
{{--                                            <label for="a1">Помыть окна</label>--}}
{{--                                            <br>--}}
{{--                                            <br>--}}
{{--                                            <input type="checkbox" id="a2"--}}
{{--                                                   name="a2" value="1">--}}
{{--                                            <label for="a2[]">Погладить белье</label>--}}
{{--                                            <br>--}}
{{--                                            <br>--}}
{{--                                            <input type="checkbox" id="a3"--}}
{{--                                                   name="a3" value="1">--}}
{{--                                            <label for="a3[]">Помыть посуду</label>--}}
{{--                                            <br>--}}
{{--                                            <br>--}}
{{--                                            <input type="checkbox" id="a4"--}}
{{--                                                   name="a4[]" value="1">--}}
{{--                                            <label for="a4">Внутри холод-ка</label>--}}
{{--                                            <br>--}}
{{--                                            <br>--}}
{{--                                            <input type="checkbox" id="a5"--}}
{{--                                                   name="a5[]" value="1">--}}
{{--                                            <label for="a5">Внутри духовки</label>--}}
{{--                                            <br>--}}
{{--                                            <br>--}}
{{--                                            <input type="checkbox" id="a6"--}}
{{--                                                   name="a6" value="1">--}}
{{--                                            <label for="a6[]">Внутри СВЧ-печи</label>--}}
{{--                                            <br>--}}
{{--                                            <br>--}}
{{--                                            <input type="checkbox" id="a7"--}}
{{--                                                   name="a7[]" value="1">--}}
{{--                                            <label for="a7">Внутри шкафов</label>--}}
                                        </div>
                                    </div>

                                    <div>
                                        <!-- <span class="underline hover:text-[#5f5869] text-lg decoration-dotted cursor-pointer float-right">Приватная информация</span> -->
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
                                                   name="" value="Далее">
                                        </div>
                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-span">
                    <x-faq/>
                </div>
            </div>
        </div>
    </form>


@endsection