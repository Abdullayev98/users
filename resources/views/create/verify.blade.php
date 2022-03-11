@extends('layouts.app')

@include('layouts.fornewtask')

@section('content')

    <!-- Information section -->
    <form action="{{route('task.create.verification')}}" method="post">
        @csrf
        <div class="mx-auto sm:w-9/12 w-11/12  my-16">
            <div class="grid md:grid-cols-3 gap-x-20">
                <div class="lg:col-span-2 col-span-3">
                    <div class="w-full text-center text-2xl">
                        {{__('Ищем исполнителя для задания')}} "{{$task->name}}"
                    </div>
                    <div class="w-full text-center my-4 text-gray-400">
                        {{__('Задание заполнено на')}}99%
                    </div>
                    <div class="relative pt-1">
                        <div class="overflow-hidden h-1  flex rounded bg-gray-200  mx-auto ">
                            <div style="width: 99%"
                                 class="shadow-none  flex flex-col text-center whitespace-nowrap text-white justify-center bg-green-500"></div>
                        </div>
                    </div>
                    <div class="shadow-xl w-full mx-auto mt-7 rounded-2xl	w-full p-2 md:p-6 px-8">
                        <div class="py-4 mx-auto px-auto text-center text-3xl texl-bold">
                            {{__('Уточните детали')}}
                        </div>

                        <div class="py-4 mx-auto  text-left ">
                            <div class="mb-4">
                                <div id="formulario" class="flex flex-col gap-y-4">
                                    <div>
                                        <div class="mb-3 xl:w-full">
                                            @if(auth()->check())
                                                <label for="phone">{{__('Код авторизация')}}</label>
                                                <input type="text" onkeypress='validate(event)'
                                                       class="shadow appearance-none border focus:shadow-orange-500 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-yellow-500 "
                                                       name="sms_otp">
                                            @endif
                                            @if(session()->has('expired_message'))
                                                <p class="text-red-500">{{Session::get('expired_message')}}</p>
                                            @elseif(session()->has('incorrect_message'))
                                                    <p class="text-red-500">{{Session::get('incorrect_message')}}</p>
                                            @endif

                                     </div>
                                    </div>
                                </div>
                            </div>

                                <div class="flex w-full mt-4">
                                <a onclick="myFunction()" 
                                class="bg-white my-4 cursor-pointer hover:border-yellow-500 text-gray-600 hover:text-yellow-500 transition duration-300 font-normal text-2xl py-3 sm:px-8 px-6 rounded-2xl border border-2">
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
                                        style="background: linear-gradient(164.22deg, #FDC4A5 4.2%, #FE6D1D 87.72%);"
                                        class="bg-yellow-500 hover:bg-yellow-600 m-4 cursor-pointer text-white font-normal text-2xl py-3 sm:px-14 px-10 rounded-2xl "
                                         name=""value="{{__('Далее')}}">
                                </div>
                            </div>
                     </div>
                 </div>

               
                    <x-faq/>
             
            </div>

        </div>
        </div>
    </form>


@endsection

@section("javasript")




@endsection
