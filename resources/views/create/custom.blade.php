@extends('layouts.app')

@include('layouts.fornewtask')

@section('content')


    <form class="" action="{{route("task.create.custom.store", $task->id)}}" method="post">
        @csrf

        <div class="mx-auto sm:w-9/12 w-11/12 my-16">
            <div class="grid grid-cols-3 gap-x-20">
                <div class="md:col-span-2 col-span-3">
                    <div class="w-full text-center text-2xl">
                        {{__('Ищем исполнителя для задания')}} "{{$task->name}}"
                    </div>
                    <div class="w-full text-center my-4 text-gray-400">
                        {{__('Задание заполнено на 25%')}}
                    </div>
                    <div class="pt-1">
                        <div class="overflow-hidden h-1 text-xs flex rounded bg-gray-200  mx-auto ">
                            <div style="width: 57%"
                                 class="shadow-none  flex flex-col text-center whitespace-nowrap text-white justify-center bg-green-500"></div>
                        </div>
                    </div>

                    <div class="shadow-2xl w-full md:p-16 p-4 mx-auto my-4 rounded-2xl	w-full">
                        @foreach($task->category->customFieldsInCustom as $data)
                            @include('create.custom-fields')
                        @endforeach
                        <div class="mt-4">
                            <div class="flex w-full gap-x-4 mt-4">
                                <a onclick="myFunction()"
                                   class="w-1/3 cursor-pointer border border-black-700 hover:border-black transition-colors rounded-lg py-2 text-center flex justify-center items-center gap-2">
                                    <!-- <button type="button"> -->
                                {{__('Назад')}}
                                <!-- </button> -->
                                    <script>
                                        function myFunction() {
                                            window.history.back();
                                        }
                                    </script>
                                </a>
                                <input type="submit"
                                       class="bg-green-500 hover:bg-green-500 w-2/3 cursor-pointer text-white font-bold py-5 px-5 rounded"
                                       name="" value="{{__('Далее')}}">

                            </div>


                        </div>

                    </div>
                </div>
                <x-faq/>
            </div>
        </div>


    </form>


@endsection
