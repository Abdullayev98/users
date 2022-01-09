@extends("layouts.app")

@section("content")
    <div class="container mx-auto w-9/12">
        <div class="grid grid-cols-3  grid-flow-row mt-8 mb-8">

            {{-- left sidebar start --}}
            <div class="lg:col-span-2 col-span-3">
                <h1 class="text-3xl font-bold mb-2">{{$tasks->name}}</h1>
                <div class="flex flex-row">
                    <p class="py-2 px-3 bg-amber-200 text-black-500 rounded-lg">до {{$tasks->budget}}</p>
                    <i class="far fa-credit-card text-green-400 mx-3 my-1 text-2xl"></i>
                    <h1 class="my-2 text-green-400">Сделка без риска</h1>
                    <i class="far fa-question-circle mx-3 my-1 text-2xl text-green-300"></i>
                </div>
                <div class="flex flex-row">
                    <p class="mt-4 text-lg text-gray-400 font-normal">Заказчик отдает предпочтение застрахованным исполнителям</p>
                    <i class="far fa-question-circle mx-3 my-3.5 text-2xl text-gray-400"></i>
                </div>
                <div class="flex flex-row text-gray-400 mt-4">
                    <p class="text-green-400 font-normal border-r-2 border-gray-400 pr-2">Открыто</p>
                    <!-- <p class="mx-3 px-3 border-x-2 border-gray-400">7 просмотров</p> -->
                    <p class="mr-3 pl-2 pr-3 border-r-2 border-gray-400">{{$tasks->created_at}}</p>
                    @foreach($categories as $category)
                        <p>{{$category->name}}</p>
                    @endforeach
                </div>

                <div class="mt-12 border-2 p-6 w-11/12 rounded-lg border-orange-100 shadow-2xl">
                    <div class="ml-12 flex flex-row">
                        <h1 class="text-lg font-bold h-auto w-48">{{$tasks->date_type}}</h1>
                        <p class="text-lg  h-auto w-96">{{$tasks->start_date}}</p>
                    </div>
                    <!-- <div class="ml-12 flex flex-row mt-4">
                        <h1 class="text-lg font-bold h-auto w-48">Завершить</h1>
                        <p class="text-lg  h-auto w-96">26 декабря 2021, 23:00</p>
                    </div> -->
                    <div class="ml-12 flex flex-row mt-8">
                        <h1 class="text-lg font-bold h-auto w-48">Бюджет</h1>
                        <p class="text-lg  h-auto w-96">до {{$tasks->budget}}</p>
                    </div>
                    <!-- <div class="ml-12 flex flex-row mt-4"> -->
                    <!-- <h1 class="text-lg font-bold h-auto w-48">Оплата задания</h1> -->
                    <!-- <div class="flex flex-row  h-auto w-96">
                        <i class="far fa-credit-card text-green-400 text-2xl mr-3"></i>
                        <p class="text-lg">Банковской картой через</p>
                    </div> -->
                    <!-- </div> -->
                    <div class="ml-12 flex flex-row mt-4">
                        <h1 class="text-lg font-bold h-auto w-48">Место</h1>
                        <p class="text-lg  h-auto w-96">{{$tasks->address}}</p>
                    </div>
                    <div class="ml-12 flex flex-row mt-8">
                        <h1 class="text-lg font-bold h-auto w-48">Нужно</h1>
                        <p class="text-lg  h-auto w-96">{{$tasks->description}}</p>
                    </div>
                    <!--  ------------------------ showModal Откликнуться на это задание  ------------------------  -->

                    <div x-data="{ showModal1: false, showModal2: false, showModal3: false }" :class="{'overflow-y-hidden': showModal1 || showModal2 || showModal3}">
                        <div  class="w-full flex flex-col sm:flex-row justify-center pl-32">
                            @auth
                            <button class="font-sans text-lg font-semibold bg-[#ff8a00] text-[#fff] hover:bg-orange-500 px-8 pt-2 pb-3 rounded transition-all duration-300 m-2" @click="showModal2 = true">
                                Откликнуться на это задание
                            </button>
                            @else
                            <button class="font-sans text-lg font-semibold bg-[#ff8a00] text-[#fff] hover:bg-orange-500 px-8 pt-2 pb-3 rounded transition-all duration-300 m-2">
                                Откликнуться на это задание
                            </button>
                            @endauth
                            
                            <!-- Modal -->
                            <div class="fixed inset-0 w-full h-full z-20 bg-black bg-opacity-50 duration-300 overflow-y-auto" x-show="showModal2" x-transition:enter="transition duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition duration-300" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">
                                <div class="relative sm:w-3/4 md:w-1/2 lg:w-1/3 mx-2 sm:mx-auto my-10 opacity-100">
                                    <div class="relative bg-white shadow-lg rounded-lg text-gray-900 z-20" @click.away="showModal2 = false" x-show="showModal2" x-transition:enter="transition transform duration-300" x-transition:enter-start="scale-0" x-transition:enter-end="scale-100" x-transition:leave="transition transform duration-300" x-transition:leave-start="scale-100" x-transition:leave-end="scale-0">
                                        <div class="w-[450px] mx-auto">
                                            <header class="p-3 text-black">
                                                <h2 class="font-semibold text-2xl mb-4">Добавить предложение к заказу</h2>
{{--                                                <!--   dropdown   -->--}}
{{--                                                <button class="text-blue-500 underline hover:text-red-500" type="button" data-dropdown-toggle="notification">--}}
{{--                                                    Использовать шаблон--}}
{{--                                                </button>--}}
{{--                                                <!-- Dropdown menu -->--}}
{{--                                                <div class="hidden bg-white text-base z-50 list-none divide-y divide-gray-100 rounded shadow my-4" id="notification">--}}
{{--                                                    <div class="px-4 py-3">--}}
{{--                                                        <span class="block text-gray-400 text-[14px]">Готовые шаблоны</span>--}}
{{--                                                    </div>--}}
{{--                                                    <ul class="py-1" aria-labelledby="notification">--}}
{{--                                                        <li>--}}
{{--                                                            <a href="#" class="text-sm font-bold hover:bg-gray-100 text-gray-700 block px-4 py-2">--}}
{{--                                                                <div class="text-sm font-bold hover:bg-gray-100 text-gray-700 block px-4 py-2">--}}
{{--                                                                    <span href="#" id="span_textarea" onclick="myFunction()" class="hover:text-slate-400 cursor-pointer">--}}
{{--                                                                        asdasdda--}}
{{--                                                                    </span>--}}
{{--                                                                </div>--}}
{{--                                                            </a>--}}
{{--                                                        </li>--}}
{{--                                                        <li>--}}
{{--                                                            <a href="#" class="text-sm hover:text-red-500 hover:bg-gray-100 text-blue-600 block px-4 py-2">--}}
{{--                                                                + Создать новый шаблон--}}
{{--                                                            </a>--}}
{{--                                                        </li>--}}
{{--                                                    </ul>--}}
{{--                                                </div>--}}
{{--                                                <script src="https://unpkg.com/@themesberg/flowbite@latest/dist/flowbite.bundle.js"></script>--}}
                                            </header>
                                            <main>
                                                <form id="ajaxform">
                                                    <textarea id="textarea_modal" class="resize-none rounded-md w-full focus:outline-[rgba(255,119,0,4)] border border p-4  transition duration-200 my-4"  type="text" id="form8" rows="4" name="response_desc"></textarea>
                                                    <script>
                                                        function myFunction() {
                                                            document.getElementById("textarea_modal").value = document.getElementById("span_textarea").innerHTML;
                                                        }
                                                    </script>
                                                    <hr>
                                                    <div class="my-2">
                                                        <label class=" px-2">
                                                            <input type="checkbox" name="notificate" value="1" class="mr-2 my-3 ">Уведомить меня, если исполнителем<br>
                                                        </label>
                                                        <label class=" px-2">
                                                            <input class=" my-3 coupon_question mr-2" type="checkbox" name="coupon_question" value="1" onchange="valueChanged()"/>Указать время актуальности предложения
                                                        </label><br>
                                                        <select name="response_time" id="AttorneyEmpresa" class="answer text-[16px] focus:outline-none border-gray-500 border rounded-lg hover:bg-gray-100 my-2 py-2 px-5 text-gray-500" style="display: none">
                                                            <option value="1" class="">1 часов</option>
                                                            <option value="2" class="">2 часов</option>
                                                            <option value="4" class="">4 часов</option>
                                                            <option value="6" class="">6 часов</option>
                                                            <option value="8" class="">8 часов</option>
                                                            <option value="10" class="">10 часов</option>
                                                            <option value="12" class="">12 часов</option>
                                                            <option value="24" class="">24 часов</option>
                                                            <option value="48" class="">48 часов</option>
                                                        </select>
                                                    </div>
                                                    <label>
                                                        <input type="text"  name="response_price" class="border rounded-md px-2 border-solid focus:outline-[rgba(255,119,0,4)] mr-3 my-2">SUM
                                                        <input type="text" name="csrf" class="hidden" value="{{ csrf_token() }}">
                                                        <input type="text" name="task_id" class="hidden" value="{{$tasks->id}}">
                                                    </label>
                                                    <hr>
                                            </main>
                                            <footer class="flex justify-center bg-transparent">
                                                <button
                                                    class="save-data bg-[#ff8a00] font-semibold text-white py-3 w-full rounded-md my-4 hover:bg-orange-500 focus:outline-none focus:ring shadow-lg hover:shadow-none transition-all duration-300"
                                                    @click="showModal2 = false">Далее</button>
                                            </footer>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
                    <!--  ------------------------ showModal Откликнуться на это задание end  ------------------------  -->

                </div>

                <div class="mt-12 border-2 p-6 w-11/12 rounded-lg border-orange-100 shadow-lg">
                    <h1 class="text-3xl font-semibold py-3">Хотите найти надежного помощника?</h1>
                    <p class="text-lg mb-10">Universal Services помогает быстро решать любые бытовые и бизнес-задачи.</p>
                    <a href="/categories/1">
                        <button  class="font-sans text-lg font-semibold bg-[#ff8a00] text-[#fff] hover:bg-orange-500 px-8 pt-2 pb-3 rounded">
                            Создайте свое задание
                        </button>
                    </a>
                </div>
                
                <div class="w-[750px]">
                    <div>
                        @if(isset($task_responses))
                        <div class="text-4xl font-semibold my-6">
                            @if ($response_count <= 4)
                            @if ($response_count == 1)
                            У задания {{$response_count}} отклик
                            @else
                            У задания {{$response_count}} откликa
                            @endif
                            @else
                            У задания {{$response_count}} откликов
                            @endif
                        </div>
                        @else
                        <div class="text-4xl font-semibold my-6">
                            У задания нет откликов
                        </div>
                        @endif
                        <hr>
                        @if(isset($task_responses))
                        <div class="flex my-2">
                            <div class="mr-2 bg-[#fff6db] px-2">
                                <a href="#">по рейтингу</a>
                            </div>
                            <div class="mr-2 text-blue-500 border-b border-dotted border-blue-500 hover:text-red-500 hover:border-red-500">
                                <a href="">по времени</a>
                            </div>
                            <div class="mr-2 text-blue-500 border-b border-dotted border-blue-500 hover:text-red-500 hover:border-red-500">
                                <a href="">по отзывам</a>
                            </div>
                        </div>
                        @foreach ($task_responses as $response)
                    <div class="mb-6">
                        <div class="my-10">
                            <div class="rounded-md bg-black h-24 float-left mr-5">
                                <img class="w-24 h-24" src="https://assets.youdo.com/_next/static/media/executor_176.900c31f3bbd110fe153ec59d249ac71b.png" alt="">
                            </div>
                            <div class="">
                                <a href="/performers/{{$response_users->id}}" class="text-blue-500 text-xl font-semibold float-left">
                                    {{$response_users->name}}
                                </a>
                                <img class="w-7 h-7 ml-2" src="https://assets.youdo.com/_next/static/media/shield-only.db76e917d01c0a73d98962ea064216a4.svg" alt="">
                                <div class="text-gray-700">
                                    <i class="fas fa-star text-[#fff0d0] mr-1"></i>4,96 по 63 отзывам
                                </div>
                                <div class="mt-2">
                                    <i class="fas fa-briefcase fa-2x text-blue-300"></i>
                                    <i class="fas fa-shield-alt fa-2x text-green-300"></i>
                                </div>
                            </div>
                        </div>
                        <div class="bg-[#f5f5f5] rounded-[10px] p-4">
                            <div class="ml-10">
                                <div class="text-[17px] text-gray-500 font-semibold">Стоимость {{$response->price}} сум</div>
                                <div class="text-[17px] text-gray-500">Здраствуйте.</div>

                                <div class="text-[17px] text-gray-500 my-5">{{$response->description}}</div>

                                <div class="text-[17px] text-gray-500 font-semibold my-4">Телефон исполнителя: {{$response_users->phone_number}}</div>
                                <div class="">
                                    <a href="/chat/{{$response_users->id}}" class="text-semibold text-center w-[200px] mb-2 md:w-[320px] ml-0 inline-block py-3 px-4 hover:bg-gray-200 transition duration-200 bg-white text-black font-medium border border-gray-300 rounded-md">
                                        Написать в чат
                                    </a>
                                    <a href="#" class="text-semibold text-center w-[200px] md:w-[320px] md:ml-4 inline-block py-3 px-4 bg-white transition duration-200 text-white bg-[#6fc727] hover:bg-[#5ab82e] font-medium border border-transparent rounded-md">
                                        Выбрать исполнителем
                                    </a>
                                </div>
                                <div class="text-gray-400 text-[14px] my-6">
                                    Выберите исполнителя, чтобы потом оставить отзыв о работе.
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    </div>
                    @endif
                </div>

                <div class="mt-12">
                    <h1 class="text-3xl font-medium ">Другие задания в категории</h1>
                    @foreach($same_tasks as $same_task)
                        <div class="mt-4">
                            <a href="#" class="underline text-gray-800 hover:text-red-500 text-lg">{{$same_task->name}}</a>
                            @foreach($users as $user)
                                @if($user->id == $same_task->user_id)
                                    <p class="text-gray-400 text-base">{{$user->name}}, {{$same_task->budget}}</p>
                                @endif
                            @endforeach
                        </div>
                    @endforeach
                </div>
            </div>
            {{-- left sidebar end --}}

            {{-- right sidebar start --}}
            <div class="lg:col-span-1 col-span-3 lg:mt-0 mt-8">
                <h1 class="text-lg">Заказчик этого задания</h1>
                <div class="flex flex-row mt-4">
                    <div class="mr-4">
                        <img src="{{ asset($current_user->avatar ?? $tasks->user_name ) }}" class="border-2 border-gray-400 w-32 h-32" alt="#">
                    </div>
                    <div class="">
                        <a href="#" class="text-2xl text-blue-500 hover:text-red-500">{{$current_user->name ?? $tasks->user_name}}</a> <br>
                        <a href="#" class="text-xl text-gray-500">{{$current_user->email ?? $tasks->user_email}}</a>
                        <!-- <div class="flex flex-row">
                            <p>Отзывы:</p>
                            <i class="far fa-thumbs-up m-1 text-gray-400"></i>  2
                        </div> -->
                    </div>
                </div>
            </div>
            {{-- right sidebar end --}}
        </div>
    </div>
    <script>
        function valueChanged()
        {
            if($('.coupon_question').is(":checked"))
                $(".answer").show();
            else
                $(".answer").hide();
        }
        $(".save-data").click(function(event){
            event.preventDefault();
            let response_desc = $('textarea#form8').val();
            var notificate = null;
            if ($("input[name=notificate]").is(':checked')) {
                var notificate = 1;
            }else{
                var notificate = 0;
            }
            var response_time = null;

            if ($('.answer').is(':visible')) {
                var response_time = 1;
            }
            let response_price = $("input[name=response_price]").val();
            let task_id = $("input[name=task_id]").val();
            let _token = $("input[name=csrf]").val();
            $.ajax({
                url: "/ajax-request",
                type:"POST",
                data:{
                    response_desc:response_desc,
                    notificate:notificate,
                    response_time:response_time,
                    response_price:response_price,
                    task_id:task_id,
                    _token:_token
                },
                success:function(response){
                    console.log(response);
                    if(response) {
                        $('.success').text(response.success);

                    }
                },
                error: function(error) {
                    console.log(error);
                }
            });
        });
    </script>

@endsection
