@extends("layouts.app")



@section("content")
    <script type="text/javascript" src="http://connect.mail.ru/js/loader.js">
    </script>
    <script src="https://api-maps.yandex.ru/2.1/?lang=ru_RU&amp;apikey=f4b34baa-cbd1-432b-865b-9562afa3fcdb"
            type="text/javascript"></script>
    <script>
        ymaps.ready(init);

        function init() {
            var myMap = new ymaps.Map("map", {
                    center: [{{$task->coordinates}}],
                    zoom: 17,
                    controls: [],
                    type: 'yandex#satellite',
                    restrictMapArea: [59.838, 29.511]
                }),

                // Создаем геообъект с типом геометрии "Точка".
                myGeoObject = new ymaps.GeoObject({
                    // Описание геометрии.
                }, {
                    // Опции.
                    // Иконка метки будет растягиваться под размер ее содержимого.
                    preset: 'islands#blackStretchyIcon',
                    // Метку можно перемещать.
                    draggable: true
                });

            myMap.geoObjects
                .add(myGeoObject)
                .add(new ymaps.Placemark([{{$task->coordinates}}], {
                    balloonContent: '{{$task->name}}'
                }, {
                    preset: 'islands#icon',
                    iconColor: '#0095b6'
                }));
        }

    </script>
    <link rel="stylesheet" href="{{asset('css/modal.css')}}">
    @if(isset($task->responses))
        <div class="xl:flex container w-11/12 mx-auto">
            <div class="md:flex mx-auto xl:w-9/12 w-full">
                @else
                    <div class="md:flex mx-auto xl:w-9/12 w-full">
                        @endif
                        <div class="mt-8 lg:flex mb-8 w-full">
                            {{-- left sidebar start --}}
                            <div class="w-full float-left">
                                <h1 class="text-3xl font-bold mb-2">{{$task->name}}</h1>
                                <div class="md:flex flex-row">
                                    <span class="text-black rounded-lg bg-yellow-400 p-2">{{$task->budget}}</span>
                                    @auth()
                                        @if($task->user_id == auth()->user()->id)
                                            <a href="{{ route('searchTask.changetask', $task->id) }}"
                                               class="py-2 px-2 text-gray-500 hover:text-red-500">
                                                <i class="fas fa-pencil-alt"></i>
                                            </a>
                                        @endif
                                    @endauth
                                    @if ($task->email_confirm == 1)
                                        <h1 class="my-2 text-green-400">{{__('Сделка без риска')}}</h1>
                                        <i class="far fa-credit-card text-green-400 mx-3 my-1 text-2xl"></i>
                                    @endif
                                </div>
                                <div class="md:flex flex-row float-left">
                                    @if ($task->show_only_to_performers == 1)
                                        <p class="mt-4 text-gray-400 font-normal">{{__('Заказчик отдает предпочтение застрахованным исполнителям')}}</p>
                                    @endif
                                </div>
                                <div class="md:flex flex-row text-gray-400 mt-4 text-base">
                                    @if ($task->status == 3)
                                        <p class="text-amber-500 font-normal md:border-r-2 border-gray-400 pr-2">{{__('В исполнении')}}</p>
                                    @elseif($task->status < 3)
                                        <p class="text-green-400 font-normal md:border-r-2 border-gray-400 pr-2">{{__('Открыто')}}</p>
                                    @else
                                        <p class="text-red-400 font-normal md:border-r-2 border-gray-400 pr-2">{{__('Закрыто')}}</p>
                                    @endif
                                    <p class="font-normal md:border-r-2 border-gray-400 md:px-2 px-0">{{$task->views }}  {{__('просмотров')}}</p>
                                    <p class="mr-3 md:pl-2 pr-3 md:border-r-2 border-gray-400">{{$task->created_at}}</p>
                                    <p class="pr-3 ">{{ $task->category->getTranslatedAttribute('name') }}</p>
                                    @if($task->user_id == auth()->id())
                                        <form action="{{route("searchTask.delete_task", $task->id)}}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button type="submit"
                                                    class="mr-3 border-l-2  pl-2 pl-3 border-gray-400 text-red-500">
                                                {{__('Отменить')}}
                                            </button>
                                        </form>
                                    @endif
                                </div>

                                <div
                                    class="mt-12 border-2 py-2 lg:w-[600px]  w-[400px] rounded-lg border-orange-100 shadow-2xl">
                                    <div id="map" class="h-64 mb-4 -mt-2"></div>
                                    <div class="ml-4 md:ml-12 flex flex-row my-4">
                                        <h1 class="font-bold h-auto w-48">{{__('Место')}}</h1>
                                        @if($task->address !== NULL)
                                            <p class=" h-auto w-96">{{json_decode($task->address, true)['location']}}</p>
                                        @endif
                                    </div>
                                    <div class="ml-4 md:ml-12 flex flex-row mt-8">
                                        @if($task->date_type == 1)
                                            <h1 class="font-bold h-auto w-48">{{__('Начать работу')}}</h1>
                                        @elseif($task->date_type == 2)
                                            <h1 class="font-bold h-auto w-48">{{__('Закончить работу')}}</h1>
                                        @else
                                            <h1 class="font-bold h-auto w-48">{{__('Указать период')}}</h1>
                                        @endif
                                        <p class=" h-auto w-96">{{ $task->start_date     }}</p>
                                    </div>
                                    <div class="ml-4 md:ml-12 flex flex-row mt-8">
                                        <h1 class="font-bold h-auto w-48">{{__('Бюджет')}}</h1>
                                        <p class=" h-auto w-96">{{$task->budget}}</p>
                                    </div>

                                    @isset($value)
                                        @foreach($task->custom_field_values as $value)
                                            <div class="ml-4 md:ml-12 flex flex-row mt-8">

                                                <h1 class="font-bold h-auto w-48">{{ $value->custom_field->getTranslatedAttribute('title',Session::get('lang') , 'fallbackLocale') }}</h1>
                                                <p class=" h-auto w-96">
                                                    @foreach(json_decode($value->value, true) as $value_obj)
                                                        @if ($loop->last)
                                                            {{$value_obj}}
                                                        @else
                                                            {{$value_obj}},
                                                        @endif
                                                    @endforeach
                                                </p>
                                            </div>
                                        @endforeach
                                    @endisset


                                    <div class="ml-4 md:ml-12 flex flex-row mt-8">
                                        <h1 class="font-bold h-auto w-48">{{__('Оплата задания')}}</h1>
                                        <div class=" h-auto w-96">
                                            <p class="text-blue-400">
                                                @if($task->oplata == 1)
                                                    {{__(' Оплата наличными')}}
                                                @else
                                                    {{__('Оплата через карту')}}
                                                @endif
                                            </p>
                                        </div>
                                    </div>

                                    <div class="ml-4 md:ml-12 flex flex-row mt-8">
                                        <h1 class="font-bold h-auto w-48">{{__('Нужно')}}</h1>
                                        <p class=" h-auto w-96">{{$task->description}}</p>
                                    </div>

                                    <div class="ml-4 md:ml-12 flex flex-wrap mt-8">
                                        <h1 class="font-bold h-auto w-48">{{__('Рисунок')}}</h1>
                                        @foreach(json_decode($task->photos)??[] as $key => $image)
                                            {{--@if ($loop->first)--}}

                                            @if($loop->first)
                                                <div class="relative boxItem">
                                                    <a class="boxItem relative" href="{{ asset('storage/'.$image) }}"
                                                       data-fancybox="img1"
                                                       data-caption="<span>{{  $task->created_at}}</span>">
                                                        <div class="mediateka_photo_content">
                                                            <img src="{{ asset('storage/'.$image) }}" alt="">
                                                        </div>
                                                    </a>
                                                </div>
                                            @endif
                                            {{--@endif--}}
                                        @endforeach
                                    </div>
                                    @if($task->docs == 1)
                                        <div class="ml-4 md:ml-12 flex flex-row mt-8">
                                            <h1 class="font-bold h-auto w-48">{{__('Предоставил(а) документы')}}</h1>
                                        </div>
                                    @else
                                        <div class="ml-4 md:ml-12 flex flex-row mt-8">
                                            <h1 class="font-bold h-auto w-48">{{__('Не предоставил(а) документы')}}</h1>
                                        </div>
                                    @endif

                                    @foreach($task->custom_field_values as $value)
                                        @if($value->value)
                                            <div class="ml-4 md:ml-12 flex flex-row mt-8">
                                                <h1 class="font-bold text-gray-600 h-auto w-48">{{$value->custom_field->title}}</h1>
                                                <div class=" h-auto w-96">
                                                    <p class="text-gray-500">
                                                        {{ json_decode($value->value)[0]  }}
                                                    </p>
                                                </div>
                                            </div>
                                    @endif
                                @endforeach

                                <!--  ------------------------ showModal Откликнуться на это задание  ------------------------  -->

                                    <div>
                                        <div class="w-full flex flex-col sm:flex-row sm:p-6 p-2">
                                            <!-- This is an example component -->
                                            <div class="w-full text-center">
                                                @auth
                                                    @if(getAuthUserBalance() >= 4000 || $task->responses_count< setting('site.free_responses'))
                                                        @if($task->user_id != auth()->id() && $task->status < 3)
                                                            <button
                                                                class="sm:w-4/5 w-full font-sans text-lg pay font-semibold bg-green-500 text-white hover:bg-green-600 px-8 pt-1 pb-2 mt-6 rounded-lg transition-all duration-300"
                                                                id="btn1"
                                                                type="button"
                                                                data-modal-toggle="authentication-modal">
                                                                {{__('Откликнуться за 4000 UZS')}}<br>
                                                                <span class="text-sm">
                                                                {{__('и отправить контакты заказчику')}}<br>
                                                            </span>
                                                            </button>
                                                            <button
                                                                class="sm:w-4/5 w-full font-sans text-lg font-semibold bg-yellow-500 text-white hover:bg-yellow-600 px-8 pt-1 pb-2 mt-6 rounded-lg transition-all duration-300"
                                                                id="btn2"
                                                                type="button"
                                                                data-modal-toggle="authentication-modal">
                                                                {{__('Откликнуться на задание бесплатно')}}<br>
                                                                <span class="text-sm">
                                                                {{__('отклик - 0 UZS, контакт с заказчиком - 5000 UZS')}}
                                                            </span>
                                                            </button>
                                                        @endif
                                                    @elseif(getAuthUserBalance() < 4000 || $response_count_user >= setting('site.free_responses'))
                                                        @if($task->user_id != auth()->id() && $task->status < 3)
                                                            <a class="open-modal"
                                                               data-modal="#modal1">
                                                                <button
                                                                    class='w-1/2 font-sans text-lg font-semibold bg-green-500 text-white hover:bg-green-500 px-8 pt-2 pb-3 mt-6 rounded-lg transition-all duration-300 m-2'>
                                                                    {{__('Откликнуться за 4000 UZS')}}
                                                                </button>
                                                            </a>
                                                            <a class="open-modal"
                                                               data-modal="#modal1">
                                                                <button
                                                                    class='font-sans text-lg font-semibold bg-yellow-500 text-white hover:bg-orange-500 px-8 pt-2 pb-3 mt-6 rounded-lg transition-all duration-300 m-2'>
                                                                    {{__('Откликнуться на задание бесплатно')}}
                                                                </button>
                                                            </a>
                                                            <div class='modal' id='modal1'>
                                                                <div class='content'>
                                                                    <img class="w-64 h-64"
                                                                         src="{{asset('images/cash_icon.png')}}"
                                                                         alt="">
                                                                    <h1 class="title">{{__('Пополните баланс')}}</h1>
                                                                    <p>
                                                                        {{__('Для отклика на вашем балансе должно быть 4000 UZS. Если заказчик захочет с вами связаться, мы автоматически спишем стоимость контакта с вашего счёта.')}}
                                                                    </p>
                                                                    <a class='btn'
                                                                       href="/profile/cash">{{__('Пополнить')}}</a>
                                                                </div>
                                                            </div>
                                                        @endif
                                                    @endif
                                                @else
                                                    <a href="/login">
                                                        <button
                                                            class="sm:w-4/5 w-full mx-auto font-sans mt-8 text-lg  font-semibold bg-yellow-500 text-white hover:bg-orange-500 px-10 py-4 rounded-lg">
                                                            {{__('Откликнуться на это задание')}}
                                                        </button>
                                                    </a>
                                                @endauth
                                                @auth
                                                    @if ($task->performer_id == auth()->user()->id || $task->user_id == auth()->user()->id)
                                                        <button id="sendbutton"
                                                                class="font-sans w-full text-lg font-semibold bg-green-500 hidden text-white hover:bg-green-400 px-12 ml-6 pt-2 pb-3 rounded-lg transition-all duration-300 m-2"
                                                                type="button">
                                                            {{__('Оставить отзыв')}}
                                                        </button>

                                                        @if($task->status == 3)

                                                            {{--                                                            <form action="{{ route('task.completed', $task->id) }}" method="post">--}}
                                                            @csrf
                                                            @if(!$review)
                                                                <button
                                                                    id="modal-open-id5"
                                                                    class=" sm:w-2/5 w-9/12 text-lg font-semibold bg-green-500 text-white hover:bg-green-400 px-12 ml-6  pt-2 pb-3 rounded-lg transition-all duration-300 m-2"
                                                                    type="submit">
                                                                    Завершен
                                                                </button>
                                                                <button
                                                                    id="modal-open-id4"
                                                                    class="not_done  sm:w-2/5 w-9/12 text-lg font-semibold bg-red-500 text-white hover:bg-red-400 px-5 ml-6 pt-2 pb-3 rounded-lg transition-all duration-300 m-2"
                                                                    type="button">
                                                                    Не завершен
                                                                </button>
                                                            @endif
                                                        @endif
                                                    @endif
                                                @endauth
                                                {{--                                        <!-- Main modal -->--}}
                                                <div id="authentication-modal"
                                                     aria-hidden="true"
                                                     class="btn-preloader hidden overflow-x-hidden overflow-y-auto fixed h-modal md:h-full top-4 left-0 right-0 md:inset-0 z-50 justify-center items-center">
                                                    <div
                                                        class="relative w-full max-w-md px-4 h-full md:h-auto">
                                                        <!-- Modal content -->
                                                        <div
                                                            class="bg-white rounded-lg shadow relative dark:bg-gray-700">
                                                            <div class="flex justify-end p-2">
                                                                <button type="button"
                                                                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white"
                                                                        data-modal-toggle="authentication-modal">
                                                                    <svg class="w-5 h-5" fill="currentColor"
                                                                         viewBox="0 0 20 20"
                                                                         xmlns="http://www.w3.org/2000/svg">
                                                                        <path fill-rule="evenodd"
                                                                              d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                                                              clip-rule="evenodd"></path>
                                                                    </svg>
                                                                </button>
                                                            </div>
                                                            <form
                                                                class="space-y-6 px-6 lg:px-8 pb-4 sm:pb-6 xl:pb-8"
                                                                action="{{route("task.response.store", $task->id)}}"
                                                                method="post">
                                                                @csrf
                                                                <header>
                                                                    <h2 class="font-semibold text-2xl mb-4">{{__('Добавить предложение к заказу')}}</h2>
                                                                </header>
                                                                <main>
                                                                <textarea required
                                                                          class="resize-none rounded-md w-full focus:outline-none  focus:border-yellow-500 border border p-4  transition duration-200 my-4"
                                                                          type="text" id="form8" rows="4"
                                                                          name="description"></textarea>
                                                                    <p id="text1" class="hidden text-lg">
                                                                        {{__(' Если заказчик захочет с вами связаться, мы автоматически
                                                                        спишем стоимость контакта с вашего счёта')}}</p>
                                                                    <div class="my-2">
                                                                        <label class=" px-2">
                                                                            <input type="checkbox"
                                                                                   name="notification_on"
                                                                                   class="mr-2 my-3 focus:outline-none  focus:border-yellow-500">{{__('Уведомить меня, если исполнителем')}}
                                                                            <br>
                                                                        </label>
                                                                        <label class="px-2">
                                                                            <input
                                                                                class="focus:outline-none  focus:border-yellow-500   my-3 coupon_question mr-2"
                                                                                type="checkbox"
                                                                                name="coupon_question"
                                                                                value="1"
                                                                                onchange="valueChanged()"/>{{__('Указать время актуальности предложения')}}
                                                                        </label>
                                                                        <br>
                                                                        <select name="response_time"
                                                                                id="AttorneyEmpresa"
                                                                                class="answer text-[16px] focus:outline-none border-gray-500 border rounded-lg hover:bg-gray-100 my-2 py-2 px-5 text-gray-500"
                                                                                style="display: none">
                                                                            <option value="1" class="">
                                                                                1 {{__('часов')}}</option>
                                                                            <option value="2" class="">
                                                                                2 {{__('часов')}}</option>
                                                                            <option value="4" class="">
                                                                                4 {{__('часов')}}</option>
                                                                            <option value="6" class="">
                                                                                6 {{__('часов')}}</option>
                                                                            <option value="8" class="">
                                                                                8 {{__('часов')}}</option>
                                                                            <option value="10" class="">
                                                                                10 {{__('часов')}}</option>
                                                                            <option value="12" class="">
                                                                                12 {{__('часов')}}</option>
                                                                            <option value="24" class="">
                                                                                24 {{__('часов')}}</option>
                                                                            <option value="48" class="">
                                                                                48 {{__('часов')}}</option>
                                                                        </select>
                                                                    </div>
                                                                    <label>
                                                                        <input type="text"
                                                                               onkeypress='validate(event)'
                                                                               checked name="price"
                                                                               class="border rounded-md px-2 border-solid focus:outline-none  focus:border-yellow-500 mr-3 my-2">UZS
                                                                        <input type="text" name="pay"
                                                                               class="pays border rounded-md px-2 border-solid focus:outline-none  focus:border-yellow-500 mr-3 my-2 hidden"
                                                                               value="0">
                                                                        <input type="text"
                                                                               name="task_user_id"
                                                                               class="pays border rounded-md px-2 border-solid focus:outline-none  focus:border-yellow-500 mr-3 my-2 hidden"
                                                                               value="{{$task->user_id}}">
                                                                    </label>
                                                                    <hr>
                                                                </main>
                                                                <footer
                                                                    class="flex justify-center bg-transparent">
                                                                    <button type="submit"
                                                                            class=" bg-yellow-500 font-semibold text-white py-3 w-full rounded-md my-4 hover:bg-orange-500 focus:outline-none shadow-lg hover:shadow-none transition-all duration-300">
                                                                        {{__('Далее')}}
                                                                    </button>
                                                                </footer>

                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--  ------------------------ showModal Откликнуться на это задание end  ------------------------  -->

                                    <!-- Основной контент страницы -->
                                    <div class="modal___1" style="display: none">
                                        <div
                                            class="modal__1 h-screen w-full fixed left-0 top-0 flex justify-center items-center bg-black bg-opacity-50">
                                            <!-- modal -->
                                            <div
                                                class="bg-white rounded shadow-lg w-10/12 md:w-1/3 text-center text-green-500 py-12 text-3xl">
                                                <!-- modal header -->
                                                <i class="far fa-check-circle fa-4x py-4"></i>
                                                <div class="mx-12">
                                                    {{__('Ваш отклик успешно отправлен!')}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @if($task->user_id == auth()->id())
                                @else
                                    <div
                                        class="mt-12 border-2 p-6 lg:w-[600px]  w-[400px] rounded-lg border-orange-100 shadow-lg">
                                        <h1 class="text-3xl font-semibold py-3">{{__('Хотите найти надежного помощника?')}}</h1>
                                        <p class="mb-10">{{__('Universal Services помогает быстро решать любые бытовые и бизнес-задачи.')}}</p>
                                        <a href="/categories/1">
                                            <button
                                                class="font-sans text-lg font-semibold bg-yellow-500 text-white hover:bg-orange-500 px-8 pt-2 pb-3 rounded">
                                                {{__('Создайте свое задание')}}
                                            </button>
                                        </a>
                                    </div>
                                @endif

                                @auth()
                                    @if ($task->user_id == auth()->user()->id)
                                        <div class="">

                                            <div class="text-4xl font-semibold my-6">
                                                @if ($task->responses_count <= 4)
                                                    @if ($task->responses_count == 1)
                                                        {{__('У задания')}} {{$task->responses_count}} {{__('отклик')}}
                                                    @else
                                                        {{__('У задания')}} {{$task->responses_count}} {{__('откликa')}}
                                                    @endif
                                                @else
                                                    {{__('У задания')}} {{$task->responses_count}} {{__('откликов')}}
                                                @endif
                                            </div>
                                            @else
                                                <div class="text-4xl font-semibold my-6">
                                                    {{__('У задания нет откликов')}}
                                                </div>
                                            @endif
                                            <hr>
                                            @endauth

                                            @foreach ($task->responses as $response)
                                                <div class="mb-6">
                                                    <div class="my-10">
                                                        <div class="rounded-md bg-black h-24 float-left mr-5">
                                                            <img class="w-24 h-24"
                                                                 src="https://thumbs.dreamstime.com/b/%D0%B2%D0%B5%D0%BA%D1%82%D0%BE%D1%80-%D0%B7%D0%B5%D0%BB%D0%B5%D0%BD%D0%BE%D0%B3%D0%BE-%D1%86%D0%B2%D0%B5%D1%82%D0%B0-%D0%B7%D0%BD%D0%B0%D1%87%D0%BA%D0%B0-%D1%85%D0%BE%D0%BA%D0%BA%D0%B5%D1%8F-%D0%BD%D0%B0-%D0%BB%D1%8C%D0%B4%D0%B5-%D1%80%D1%83%D0%BA%D0%BE%D0%BF%D0%BE%D0%B6%D0%B0%D1%82%D0%B8%D1%8F-117033775.jpg"
                                                                 alt="">
                                                        </div>
                                                        <div class="">
                                                            <a href="/performers/{{Arr::get('id', $response->user)}}"
                                                               class="text-blue-500 text-xl font-semibold float-left">
                                                                {{Arr::get('name', $response->user)}}
                                                            </a>
                                                            <input type="text" name="performer_id" class="hidden"
                                                                   value="{{Arr::get('id', $response->user)}}">
                                                            <img class="w-7 h-7 ml-2"
                                                                 src="{{asset('images/shield.svg')}}" alt="">
                                                            <div class="text-gray-700">
                                                                <i class="fas fa-star text-yellow-200 mr-1"></i>{{__('4,96 по 63 отзывам')}}
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="bg-gray-100 rounded-[10px] p-4">
                                                        <div class="ml-0">
                                                            <div
                                                                class="text-[17px] text-gray-500 font-semibold">{{__('Стоимость')}} {{$response->price}}
                                                                UZS
                                                            </div>

                                                            <div
                                                                class="text-[17px] text-gray-500 my-5">{{$response->description}}</div>
                                                            @if($response->not_free == 1)
                                                                <div
                                                                    class="text-[17px] text-gray-500 font-semibold my-4">{{__('Телефон исполнителя:')}} {{$response->user->phone_number}}</div>
                                                            @endif

                                                            @auth()
                                                                @if($task->status == 3 && $response->user_id == $task->performer_id)
                                                                    <div class="w-10/12 mx-auto">
                                                                        <a href="{{ route('performers.performer_chat', $response->user->id) }}"
                                                                           class="text-semibold text-center w-[200px] mb-2 md:w-[320px] ml-0 inline-block py-3 px-4 hover:bg-gray-200 transition duration-200 bg-white text-black font-medium border border-gray-300 rounded-md">
                                                                            {{__('Написать в чат')}}
                                                                        </a>

                                                                    </div>
                                                                @elseif($task->status <= 2 && auth()->user()->id == $task->user_id)
                                                                    <form
                                                                        action="{{ route('response.selectPerformer', $response->id) }}"
                                                                        method="post">
                                                                        @csrf
                                                                        <button
                                                                            type="submit"
                                                                            class="cursor-pointer text-semibold text-center w-[200px]
                                                                 md:w-[320px] md:ml-4 inline-block py-3 px-4 bg-white transition
                                                                 duration-200 text-white bg-green-500 hover:bg-green-500 font-medium
                                                                 border border-transparent rounded-md"> {{__('Выбрать исполнителем')}}</button>

                                                                    </form>
                                                                @endif

                                                            @endauth

                                                            <div class="text-gray-400 text-[14px] my-6">
                                                                {{__('Выберите исполнителя, чтобы потом оставить отзыв о работе.')}}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                            </div>
                        </div>
                        {{-- right sidebar start --}}
                        <div class="lg:w-3/12 w-full mt-8 lg:ml-8 ml-0">
                            <div class="mb-10">
                                <h1 class="text-xl font-medium mb-4">{{__('Задание')}} № {{$task->id}}</h1>
                                <div>
                                    <button onclick="toggleModal44()"
                                            class="px-3 py-3 border border-3 ml-4 rounded-md border-gray-500 hover:border-gray-400">
                                        <i class="fas fa-share-alt"></i>
                                    </button>
                                    @if (Auth::check())
                                        <button onclick="toggleModal45()"
                                                class="px-3 py-3 border border-3 ml-4 rounded-md border-gray-500 hover:border-gray-400">
                                            <i class="far fa-flag"></i>
                                        </button>
                                    @else
                                        <button
                                            class="px-3 py-3 border border-3 ml-4 rounded-md border-gray-400">
                                            <i class="far fa-flag"></i>
                                        </button>
                                    @endif
                                </div>

                            </div>
                            <h1 class="text-lg">{{__('Заказчик этого задания')}}</h1>
                            <div class="flex flex-col mt-4">
                                <div class="mb-4">
                                    <img class="border-2 border-radius-500 border-gray-400 w-32 h-32 rounded-lg" alt="#"
                                         src="@if ($task->user->avatar == ''){{ asset("storage/images/default.png") }}
                                         @else{{asset("storage/{$task->user->avatar}") }}" @endif
                                    >
                                </div>
                                <div class="">
                                    @if (Auth::check() && Auth::user()->id == $task->user->id)
                                        <a href="/profile"
                                           class="text-2xl text-blue-500 hover:text-red-500">{{$task->user->name ?? $task->user_name}}
                                        </a>
                                    @else
                                        <a href="/performers/{{$task->user->id}}"
                                           class="text-2xl text-blue-500 hover:text-red-500">{{$task->user->name ?? $task->user_name}}
                                        </a>
                                    @endif

                                    <br>
                                    <a class="text-xl text-gray-500">
                                        @if($task->user->age != "")
                                            <p class="inline-block text-m mr-2">
                                                {{$task->user->age}}
                                                @if($task->user->age>20 && $task->user->age%10==1) {{__('год')}}
                                                @elseif ($task->user->age>20 && ($task->user->age%10==2 || $task->user->age%10==3 || $task->user->age%10==1)) {{__('года')}}
                                                @else {{__('лет')}}
                                                @endif
                                            </p>
                                        @endif
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
        </div>

        {{-- Modal start --}}

        <div
            class="hidden overflow-x-auto bg-black bg-opacity-50 overflow-y-auto fixed inset-0 z-50 outline-none focus:outline-none justify-center items-center"
            id="modal-id4">
            <form id="updatereview" action="{{route('update.sendReview', $task->id)}}" method="POST">
                @csrf
                <div class="relative my-6 mx-auto max-w-xl" id="modal4">
                    <input type="text" hidden name="status" id="status" value="">
                    <div
                        class="border-0 top-32 rounded-lg shadow-2xl px-10 py-10 relative flex mx-auto flex-col w-full bg-white outline-none focus:outline-none">
                        <div class=" text-center  rounded-t">
                            <button id="close-id4"
                                    class=" w-100 h-16 absolute top-1 right-4">
                            </button>
                            <h3 class="font-semibold text-gray-700 text-3xl block">
                                {{__(' Оставить отзыв')}}
                            </h3>
                        </div>
                        <div class="text-center h-56 w-full mx-auto text-base">
                            <div class="">
                                <div class="flex flex-row justify-center w-full my-4 mx-auto">
                                    <label id="class_demo"
                                           class="cursor-pointer w-32 text-gray-500 border rounded-l hover:bg-green-500 transition duration-300 hover:text-white">
                                        <input type="radio" name="good"
                                               class="good border hidden rounded ml-6 w-8/12"
                                               value="1">
                                        <i class="far fa-thumbs-up text-2xl mr-2"></i><span
                                            class="relative -top-1">good</span>
                                    </label>
                                    <label id="class_demo1"
                                           class="cursor-pointer w-32 text-gray-500 border rounded-r hover:bg-red-500 transition duration-300 hover:text-white">
                                        <input type="radio" name="good"
                                               class="good border hidden rounded ml-6  w-8/12"
                                               value="0">
                                        <i class="far fa-thumbs-down text-2xl mr-2"></i><span
                                            class="relative -top-1">bad</span>
                                    </label>
                                </div>
                                <textarea name="comment" class="h-24 block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white shadow-lg drop-shadow-xl
                                        border resize-none w-full border-solid border-gray-200 rounded transition ease-in-out m-0 focus:outline-none  focus:border-yellow-500 "></textarea>

                                <button
                                    class="send-comment font-sans w-full text-lg font-semibold bg-green-500 text-white hover:bg-green-400 px-12 pt-2 pb-3 rounded transition-all duration-300 mt-8"
                                    type="submit">
                                    {{__('Отправить')}}
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="hidden opacity-25 fixed inset-0 z-40 bg-black" id="modal-id4-backdrop"></div>
        {{--        share in webpages--}}

        {{-- share modal start --}}
        <div
            class="hidden overflow-x-auto overflow-y-auto fixed inset-0 z-50 outline-none focus:outline-none        justify-center items-center"
            style="background-color:rgba(0,0,0,0.5)" id="modal-id44">
            <div class="relative w-full my-32 mx-auto max-w-3xl" id="modal44">
                <div
                    class="border-0 rounded-lg shadow-2xl px-10 relative flex mx-auto flex-col sm:w-4/5 w-full bg-white outline-none focus:outline-none">
                    <div class=" text-center p-6  rounded-t">
                        <button type="submit" onclick="toggleModal44()"
                                class="rounded-md w-100 h-16 absolute top-1 right-4 focus:outline-none">
                            <i class="fas fa-times text-xl w-full"></i>
                        </button>
                        <h1 class="font-bold text-3xl block mt-6">
                            {{__('Рассказать о заказе')}}
                        </h1>
                        <p class="my-3">{{__('Расскажите об этом заказе в социальных сетях — оно заслуживает того, чтобы его увидели.')}}</p>
                    </div>
                    <div class="text-center mb-8 flex flex-wrap md:w-4/5 w-full mx-auto">
                        <span class="telegram"><i
                                class="fab fa-telegram px-4 py-3 bg-blue-500 text-white rounded-lg m-4 text-4xl cursor-pointer"></i></span>
                        <span class="instagram"><i
                                class="fab fa-instagram px-4 py-3 bg-red-700 text-white rounded-lg m-4 text-4xl cursor-pointer"></i></span>
                        <span class="whatsapp"><i
                                class="fab fa-whatsapp px-4 py-3 bg-green-700 text-white rounded-lg m-4 text-4xl cursor-pointer"></i></span>
                        <span class="facebook"><i
                                class="fab fa-facebook px-4 py-3 bg-blue-700 text-white rounded-lg m-4 text-4xl cursor-pointer"></i></span>
                        <span class="email"><i
                                class="fas fa-at px-4 py-3 bg-yellow-600 text-white rounded-lg m-4 text-4xl cursor-pointer"></i></span>
                        <span class="twitter"><i
                                class="fab fa-twitter px-3 py-2.5 text-blue-500 text-white rounded-lg m-4 text-4xl cursor-pointer border-2 border-blue-500"></i></span>
                        <span class="linkedin"><i
                                class="fab fa-linkedin px-4 py-3 bg-blue-400 text-white rounded-lg m-4 text-4xl cursor-pointer"></i></span>
                        <span class="google"><i
                                class="fab fa-google px-4 py-3 bg-red-700 text-white rounded-lg m-4 text-4xl cursor-pointer"></i></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="hidden opacity-25 fixed inset-0 z-40 bg-black" id="modal-id45-backdrop"></div>
        {{-- share modal end --}}
        {{-- podelitsa modal start --}}
        <div
            class="hidden overflow-x-auto overflow-y-auto fixed inset-0 z-50 outline-none focus:outline-none        justify-center items-center"
            style="background-color:rgba(0,0,0,0.5)" id="modal-id45">
            <div class="relative w-full my-6 mx-auto max-w-3xl" id="modal44">
                <div
                    class="border-0 rounded-lg shadow-2xl px-10 relative flex mx-auto flex-col sm:w-4/5 w-full bg-white outline-none focus:outline-none">
                    <div class=" text-center p-6  rounded-t">
                        <button type="submit" onclick="toggleModal45()"
                                class="rounded-md w-100 h-16 absolute top-1 right-4 focus:outline-none">
                            <i class="fas fa-times text-xl w-full"></i>
                        </button>
                        <h1 class="font-medium text-3xl block mt-6">
                            {{__('Напишите свое возражение по созданной задаче')}}
                        </h1>
                    </div>
                    <div class="text-center my-6">

                        <form action="{{route('searchTask.comlianse_save')}}" method="POST">
                            @csrf
                            <input type="hidden" name="taskId" value="{{ $task->id }}">
                            <input type="hidden" name="userId"
                                   value="{{ Auth::check() ? Auth::user()->id : $task->user->id}}">
                            <select name="c_type" id=""
                                    class="w-4/5 border-2 border-gray-500 rounded-lg mb-4 py-2 px-2 focus:outline-none hover:border-yellow-500">
                                @foreach ($complianceType as $complType)
                                    <option value="{{$complType->id}}">{{$complType->name}}</option>
                                @endforeach
                            </select>
                            <textarea name="c_text" id=""
                                      class="border-2 border-gray-500 rounded-lg p-2 w-4/5 focus:outline-none hover:border-yellow-500"></textarea>
                            <input type="submit" value="{{__('Отправить')}}"
                                   class="bg-yellow-500 mt-4 py-3 px-5 rounded-lg text-white text-xl cursor-pointer font-medium border-2 border-gray-500 hover:bg-yellow-600">
                        </form>

                    </div>
                </div>
            </div>
        </div>
        <div class="hidden opacity-25 fixed inset-0 z-40 bg-black" id="modal-id45-backdrop"></div>
        {{-- podelitsa modal end --}}

        <script type='text/javascript'
                src='https://platform-api.sharethis.com/js/sharethis.js#property=620cba4733b7500019540f3c&product=inline-share-buttons'
                async='async'></script>
        <input type="hidden" id="task" value="{{ $task->id }}">
        <script src="{{asset('js/tasks/detailed-tasks.js')}}"></script>
        <script src="https://cdn.jsdelivr.net/picturefill/2.3.1/picturefill.min.js"></script>
        <script
            src="https://cdn.rawgit.com/sachinchoolur/lightgallery.js/master/dist/js/lightgallery.js"></script>
        <script src="https://cdn.rawgit.com/sachinchoolur/lg-pager.js/master/dist/lg-pager.js"></script>
        <script src="https://cdn.rawgit.com/sachinchoolur/lg-autoplay.js/master/dist/lg-autoplay.js"></script>
        <script
            src="https://cdn.rawgit.com/sachinchoolur/lg-fullscreen.js/master/dist/lg-fullscreen.js"></script>
        <script src="https://cdn.rawgit.com/sachinchoolur/lg-zoom.js/master/dist/lg-zoom.js"></script>
        <script src="https://cdn.rawgit.com/sachinchoolur/lg-hash.js/master/dist/lg-hash.js"></script>
        <script src="https://cdn.rawgit.com/sachinchoolur/lg-share.js/master/dist/lg-share.js"></script>
        <script type="text/javascript" src="{{ asset('js/lg-thumbnail.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/lg-rotate.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/lg-video.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/fancybox.min.js') }}"></script>
        <link rel="stylesheet" href="{{ asset('css/mediateka.css') }}">
        <link rel="stylesheet" href="{{ asset('css/fancybox.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/lightgallery.css') }}">

        <div style="display: none;">

            @foreach(json_decode($task->photos)??[] as $key => $image)
                @if ($loop->first)

                @else
                    <a style="display: none;" class="boxItem" href="{{ asset('storage/'.$image) }}"
                       data-fancybox="img1"
                       data-caption="<span>{{ $task->created_at }}</span>">
                        <div class="mediateka_photo_content">
                            <img src="{{ asset('storage/'.$image)  }}" alt="">
                        </div>
                    </a>
                @endif
            @endforeach
        </div>

@endsection

