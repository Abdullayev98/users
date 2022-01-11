@extends("layouts.app")

@section("content")
    <link rel="stylesheet" href="{{asset('css/modal.css')}}">
    <div class="mx-auto w-9/12">
        <div class="mt-8 flex mb-8">

            {{-- left sidebar start --}}
            <div class="w-8/12 float-left">
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

                    <div>
                        <div  class="w-full flex flex-col sm:flex-row justify-center pl-32">
                            <!-- This is an example component -->
                            <div class="max-w-2xl mx-auto">
                                @if (Route::has('login'))
                                    @auth
                                        @if($balance >= 400)
                                        <button class="font-sans text-lg font-semibold bg-[#ff8a00] text-[#fff] hover:bg-orange-500 px-8 pt-2 pb-3 rounded transition-all duration-300 m-2"
                                                type="button"
                                                data-modal-toggle="authentication-modal">
                                            Откликнуться на это задание
                                        </button>
                                        @else
                                            <a href="#" class='btn open-modal' data-modal="#modal1">Откликнуться на это задание</a>

                                            <div class='modal' id='modal1'>
                                                <div class='content'>
                                                    <img src="https://css-static.youdo.com/assets/72082/i/recharge-pig-0ce0730fc21f092f12cc3855956a45d4.svg" alt="">
                                                    <h1 class='title'>Пополните баланс</h1>
                                                    <p>
                                                        Для отклика на вашем балансе должно быть 4000 UZS. Если заказчик захочет с вами связаться, мы автоматически спишем стоимость контакта с вашего счёта.
                                                    </p>
                                                    <p>
                                                        При отклике сумма на балансе не блокируется — можно оставлять отклики и к другим заданиям.
                                                    </p>
                                                    <a class='btn' data-modal="#modal1" href="#">Пополнить</a>
                                                </div>
                                            </div>
                                        @endif
                                    @endauth
                                @else
                                        <button class="font-sans text-lg font-semibold bg-[#ff8a00] text-[#fff] hover:bg-orange-500 px-8 pt-2 pb-3 rounded transition-all duration-300 m-2"
                                                type="button">
                                            <a href="/register">
                                                Откликнуться на это задание
                                            </a>
                                        </button>

                                @endif

                                <!-- Main modal -->
                                <div id="authentication-modal"
                                     aria-hidden="true"
                                     class="btn-preloader hidden overflow-x-hidden overflow-y-auto fixed h-modal md:h-full top-4 left-0 right-0 md:inset-0 z-50 justify-center items-center">
                                    <div class="relative w-full max-w-md px-4 h-full md:h-auto">
                                        <!-- Modal content -->
                                        <div class="bg-white rounded-lg shadow relative dark:bg-gray-700">
                                            <div class="flex justify-end p-2">
                                                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white"
                                                        data-modal-toggle="authentication-modal">
                                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                                    </svg>
                                                </button>
                                            </div>
                                            <form class="space-y-6 px-6 lg:px-8 pb-4 sm:pb-6 xl:pb-8" action="#">
                                                <header>
                                                    <h2 class="font-semibold text-2xl mb-4">Добавить предложение к заказу</h2>
                                                </header>
                                                <form id="ajaxform">
                                                    <main>
                                                        <textarea class="resize-none rounded-md w-full focus:outline-[rgba(255,119,0,4)] border border p-4  transition duration-200 my-4"  type="text" id="form8" rows="4" name="response_desc"></textarea>
                                                        <hr>
                                                        <div class="my-2">
                                                            <label class=" px-2">
                                                                <input type="checkbox" name="notificate" value="1" class="mr-2 my-3 ">Уведомить меня, если исполнителем<br>
                                                            </label>
                                                            <label class=" px-2">
                                                                <input class=" my-3 coupon_question mr-2" type="checkbox" name="coupon_question" value="1" onchange="valueChanged()"/>Указать время актуальности предложения
                                                            </label>
                                                            <br>
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
                                                            <input type="text" checked  name="response_price" class="border rounded-md px-2 border-solid outline-0 mr-3 my-2">SUM
                                                            <input type="text" name="csrf" class="hidden" value="{{ csrf_token() }}">
                                                            <input type="text" name="task_id" class="hidden" value="{{$tasks->id}}">
                                                            <input type="text" name="user_id" class="hidden" value="{{$current_user->id ?? null}}">
                                                        </label>
                                                        <hr>
                                                    </main>
                                                    <footer class="flex justify-center bg-transparent">
                                                        <button
                                                            class="save-data bg-[#ff8a00] font-semibold text-white py-3 w-full rounded-md my-4 hover:bg-orange-500 focus:outline-none shadow-lg hover:shadow-none transition-all duration-300">
                                                            Далее
                                                        </button>
                                                    </footer>
                                                </form>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--  ------------------------ showModal Откликнуться на это задание end  ------------------------  -->
                    <!-- Прелоадер -->
                    <div class="preloader" style="display: none">
                        <div class="preloader__row">
                            <div class="preloader__item"></div>
                            <div class="preloader__item"></div>
                        </div>
                    </div>

                    <!-- Основной контент страницы -->
                    <div class="modal" style="display: none">
                        <div class="modal h-screen w-full fixed left-0 top-0 flex justify-center items-center bg-black bg-opacity-50">
                            <!-- modal -->
                            <div class="bg-white rounded shadow-lg w-10/12 md:w-1/3 text-center text-green-500 py-12 text-3xl">
                                <!-- modal header -->
                                <i class="far fa-check-circle fa-4x py-4"></i>
                                <div class="mx-12">
                                    Ваш отклик успешно отправлен!
                                </div>
                            </div>
                        </div>
                    </div>
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
        </div>

        {{-- right sidebar start --}}
        <div class="w-3/12 lg:mt-0 mt-8">
            <h1 class="text-lg">Заказчик этого задания</h1>
            <div class="flex flex-row mt-4">
                <div class="mr-4">
                    <img src="
                        @if ($current_user->avatar == 'users/default.png')
                    {{ asset("AvatarImages/images/{$current_user->avatar}") }}
                    @else
                    {{ asset("AvatarImages/{$current_user->avatar}") }}
                    @endif" class="border-2 border-gray-400 w-32 h-32" alt="#">
                </div>
                <div class="">
                    <a href="#" class="text-2xl text-blue-500 hover:text-red-500">{{$current_user->name ?? $tasks->user_name}}</a> <br>
                    <a href="#" class="text-xl text-gray-500">
                        @if($current_user->age != "")
                            <p class="inline-block text-m mr-2">
                                {{$current_user->age}}
                                @if($current_user->age>20 && $current_user->age%10==1) @lang('lang.cash_rusYearGod')
                                @elseif ($current_user->age>20 && ($current_user->age%10==2 || $current_user->age%10==3 || $current_user->age%10==1)) @lang('lang.cash_rusYearGoda')
                                @else @lang('lang.cash_rusYearLet')
                                @endif
                            </p>
                        @endif
                    </a>
                </div>
            </div>
        </div>
    </div>

    <style>
        .preloader {
            /*фиксированное позиционирование*/
            position: fixed;
            /* координаты положения */
            left: 0;
            top: 0;
            right: 0;
            bottom: 0;
            /* размещаем блок над всеми элементами на странице (это значение должно быть больше, чем у любого другого позиционированного элемента на странице) */
            z-index: 1001;
            background: rgba(0,0,0,0.4);
        }
        .preloader__row {
            position: relative;
            top: 50%;
            left: 50%;
            width: 70px;
            height: 70px;
            margin-top: -35px;
            margin-left: -35px;
            text-align: center;
            animation: preloader-rotate 2s infinite linear;
        }
        .preloader__item {
            position: absolute;
            display: inline-block;
            top: 0;
            background-color: #337ab7;
            border-radius: 100%;
            width: 35px;
            height: 35px;
            animation: preloader-bounce 2s infinite ease-in-out;
        }
        .preloader__item:last-child {
            top: auto;
            bottom: 0;
            animation-delay: -1s;
        }
        @keyframes preloader-rotate {
            100% {
                transform: rotate(360deg);
            }
        }
        @keyframes preloader-bounce {
            0%,
            100% {
                transform: scale(0);
            }
            50% {
                transform: scale(1);
            }
        }
        .loaded_hiding .preloader {
            transition: 0.3s opacity;
            opacity: 0;
        }
        .loaded .preloader {
            display: none;
        }
    </style>
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
            let user_id = $("input[name=user_id]").val();
            $.ajax({
                url: "/ajax-request",
                type:"POST",
                data:{
                    response_desc:response_desc,
                    notificate:notificate,
                    response_time:response_time,
                    response_price:response_price,
                    task_id:task_id,
                    _token:_token,
                    user_id:user_id
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
            $('.preloader').show();
            $('.btn-preloader').hide();
            $('.bg-opacity-50').hide();
            window.setTimeout(function() {
                $('.preloader').hide();
                $('.modal').show();
            }, 1000);
            window.setTimeout(function() {
                $('.modal').hide();
                window.location.reload();
            }, 3000);
        });
    </script>
    <script>
        const modal = document.querySelector('.modal');
        const showModal = document.querySelector('.show-modal');
        const closeModal = document.querySelectorAll('.close-modal');
        showModal.addEventListener('click', function (){
            modal.classList.remove('hidden')
        });
        closeModal.forEach(close => {
            close.addEventListener('click', function (){
                modal.classList.add('hidden')
            });
        });
    </script>
    <script>
        $(".modal").each(function() {
            $(this).wrap('<div class="overlay"></div>')
        });

        $(".open-modal").on('click', function(e) {
            e.preventDefault();
            e.stopImmediatePropagation;

            var $this = $(this),
                modal = $($this).data("modal");

            $(modal).parents(".overlay").addClass("open");
            setTimeout(function() {
                $(modal).addClass("open");
            }, 350);

            $(document).on('click', function(e) {
                var target = $(e.target);

                if ($(target).hasClass("overlay")) {
                    $(target).find(".modal").each(function() {
                        $(this).removeClass("open");
                    });
                    setTimeout(function() {
                        $(target).removeClass("open");
                    }, 350);
                }

            });

        });

        $(".close-modal").on('click', function(e) {
            e.preventDefault();
            e.stopImmediatePropagation;

            var $this = $(this),
                modal = $($this).data("modal");

            $(modal).removeClass("open");
            setTimeout(function() {
                $(modal).parents(".overlay").removeClass("open");
            }, 50);

        });
    </script>

@endsection
