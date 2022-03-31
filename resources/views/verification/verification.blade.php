@extends('layouts.app')


@section('content')
    <div style="background-image: url('https://images.pexels.com/photos/5588400/pexels-photo-5588400.jpeg?auto=compress&amp;cs=tinysrgb&amp;fit=crop&amp;h=768&amp;w=1688')"
         class="h-screen bg-no-repeat mb-32">
        <div class="text-center my-auto pt-48">
            <p class="text-4xl lg:text-6xl font-bold text-white ">{{__('Станьте исполнителем Universal Services')}}</p>
            <p class="mt-8 mb-12 text-white text-xl lg:text-2xl">{!!__('Universal Services поможет найти новых клиентов и зарабатывать <br> на выполнении любых услуг.')!!}</p>
            @auth
                <a href="{{ route('verification.info') }}">
                    @else
                        <a href="/register">
                            @endauth
                            <button  class="px-10 py-4 font-sans  text-lg  font-semibold bg-yellow-500 hover:bg-yellow-600 text-white rounded-md text-xl">
                                {{__('СТАТЬ ИСПОЛНИТЕЛЕМ')}}
                            </button>
                        </a>
        </div>
    </div>


    <div class="container mx-auto px-2">
        <div class="w-10/12 mx-auto text-center mb-16">
            <h1 class="text-4xl font-bold">{{__('Преимущества')}}</h1>
            <p class="font-bold mt-16">{{__('Станьте исполнителем и выполняйте интересные задания от заказчиков  в удобное для вас время.')}}</p>
            <div class="grid md:grid-cols-4 grid-cols-1 gap-4 pt-16 container mx-auto font-bold text-xl">
                <div>
                    <img class="mx-auto" src="https://assets.youdo.com/_next/static/media/money.bd687ef7e0abebf2c7822c7c9e527522.png" alt="#">
                    <p>{{__('Достойный заработок')}}</p>
                </div>
                <div>
                    <img class="mx-auto" src="{{asset('images/User_watch.png')}}" alt="#">
                    <p>{{__('Свободный график')}}</p>
                </div>
                <div>
                    <img class="mx-auto" src="{{asset('images/User_security.png')}}" alt="#">
                    <p>{{__('Безопасный сервис')}}</p>
                </div>
                <div>
                    <img class="mx-auto" src="{{asset('images/User_cash.png')}}" alt="#">
                    <p>{{__('Экономия на рекламе')}}</p>
                </div>
            </div>
        </div>

        <div class="zakaz w-9/12 mx-auto text-center font-serif my-32">
            <div class="info">
                <h2 class="zakaz_title font-sans text-5xl pb-8 font-bold">{{__('Как получить заказ')}}</h2>
                <p class="zakaz_text font-sans text-xl pb-16 font-medium">{{__('На Universal Services исполнители сами выбирают заказы и клиентов. Это просто.')}}</p>
                <div class="process grid lg:grid-cols-5 grid-cols-1 items-center">
                    <div class="info ">
                        <div>
                            <p class="process_number text-purple-600 text-8xl pb-4">1</p>
                            <p class="process_text text-lg text-black">{{__('Станьте исполнителем и заполните профиль')}}</p>
                        </div>
                    </div>
                    <div>
                        <img class="object-cover lg:block hidden   w-10/12 shrink" src="{{asset('images/arrow.svg')}}" alt="">
                    </div>
                    <div class="info ">
                        <div>
                            <p class="process_number text-purple-600 text-8xl pb-4">2</p>
                            <p class="process_text text-lg text-black">{{__('Выберите задание и откликнитесь на него')}}</p>
                        </div>
                    </div>
                    <div>
                        <img class="object-cover lg:block hidden   w-10/12 shrink" src="{{asset('images/arrow.svg')}}" alt="">
                    </div>
                    <div class="info ">
                        <div>
                            <p class="process_number text-purple-600 text-8xl pb-4">3</p>
                            <p class="process_text text-lg text-black">{{__('Получите оплату сразу же после выполнения задания')}}</p>
                        </div>
                    </div>


                </div>
            </div>
            @auth
                <a href="{{ route('verification.info') }}">
                    @else
                        <a href="/register">
                            @endauth
                            <button  class="font-sans mt-8 text-lg  font-semibold bg-yellow-500 hover:bg-yellow-600 text-white px-10 py-4 rounded">
                                {{__('СТАТЬ ИСПОЛНИТЕЛЕМ')}}
                            </button>
                        </a>
        </div>


        {{-- 1 --}}
        <div class="flex lg:flex-row flex-col container mx-auto">
            <div class="lg:w-3/5 w-full">
                <img class="lg:mx-0 mx-auto" src="{{asset('images/performer1.jpg')}}" alt="#">
            </div>
            <div class="lg:w-2/5 w-full lg:text-left text-center lg:mt-0 mt-4 lg:ml-8">
                <h1 class="font-bold text-3xl">{{__('Достойный заработок')}}</h1>
                <p class="mt-6 text-lg">{{__('Зарабатывайте на заказах с Universal Services без ограничений. Используйте сервис для подработки или начните развивать собственное дело.')}}</p>
                <div>
                    <hr class="mt-8 mb-8">
                    <p class="mb-12">{{__('Максимальный заказ на Universal Services.com был почти на 100 000 uzs, я несколько дней решал проблему, за которую никто не хотел браться.')}}</p>
                    @auth
                        <a href="{{ route('verification.info') }}">
                            @else
                                <a href="/register">
                                    @endauth
                                    <button  class="font-sans  text-lg  font-semibold bg-yellow-500 hover:bg-yellow-600 text-white px-10 py-4 rounded">
                                        {{__('Начать зарабатывать')}}
                                    </button>
                                </a>
                </div>
            </div>
        </div>

        {{-- 2 --}}
        <div class="flex lg:flex-row flex-col container mx-auto my-16">
            <div class="lg:w-2/5 w-full lg:block hidden lg:text-left text-center">
                <h1 class="font-bold text-3xl">{{__('Свободный график')}}</h1>
                <p class="mt-6 text-lg">.{{__('На Universal Services вы работаете на себя и сами выбираете заказчиков. Выполняйте задания в удобное для вас время и устраивайте выходные, когда захотите')}}</p>
                <div>
                    <hr class="mt-8 mb-8">
                    <p class="mb-12">{{__('Сервис мне очень помог в наработке клиентской базы, что всегда очень сложно сделать в салоне. У меня уже есть заказчики, которые приходят на стрижку или окрашивание в третий, четвертый раз, то есть становятся постоянными клиентами.')}}</p>
                    @auth
                        <a href="{{ route('verification.info') }}">
                            @else
                                <a href="/register">
                                    @endauth
                                    <button  class="font-sans  text-lg  font-semibold bg-yellow-500 hover:bg-yellow-600 text-white px-10 py-4 rounded">
                                        {{__('Начать работать на себя')}}
                                    </button>
                                </a>
                </div>
            </div>
            <div class="lg:w-3/5 w-full lg:block hidden">
                <img class="ml-4 xl:float-right float-none" src="{{asset('images/performer2.jpg')}}" alt="#">
            </div>

            <div class=" lg:hidden block ">
                <img class="lg:mx-0 mx-auto" src="{{asset('images/performer2.jpg')}}" alt="#">
            </div>
            <div class="lg:hidden block lg:text-left text-center lg:mt-0 mt-4">
                <h1 class="font-bold text-3xl">{{__('Свободный график')}}</h1>
                <p class="mt-6 text-lg">{{__('На Universal Services вы работаете на себя и сами выбираете заказчиков. Выполняйте задания в удобное для вас время и устраивайте выходные, когда захотите')}}</p>
                <div>
                    <hr class="mt-8 mb-8">
                    <p class="mb-12">{{__('Я считаю, что user.uz — это уникальный сервис возможностей. Его безусловное преимущество в том, что вы можете самостоятельно выбирать для себя график работы, заказы, клиентов, формировать свой доход.')}}</p>
                    @auth
                        <a href="{{ route('verification.info') }}">
                            @else
                                <a href="/register">
                                    @endauth
                                    <button  class="font-sans  text-lg  font-semibold bg-yellow-500 hover:bg-yellow-600 text-white px-10 py-4 rounded">
                                        {{__('Начать работать на себя')}}
                                    </button>
                                </a>
                </div>
            </div>
        </div>

        {{-- 3 --}}
        <div class="flex lg:flex-row flex-col container mx-auto">
            <div class="lg:w-3/5 w-full">
                <img class="lg:mx-0 mx-auto" src="{{asset('images/performer3.jpg')}}" alt="#">
            </div>
            <div class="lg:w-2/5 w-full lg:text-left text-center lg:mt-0 mt-4 lg:ml-8">
                <h1 class="font-bold text-3xl">{{__('Безопасность сервиса')}}</h1>
                <p class="mt-6 text-lg">{{__('итайте отзывы о заказчиках и выполняйте задания со Сделкой без риска: при успешном завершении работы вы гарантированно получите оплату на карту.')}}</p>
                <div>
                    <hr class="mt-8 mb-8">
                    <p class="mb-12">{{__('Со Сделкой без риска не переживаешь, что оплата не поступит. Если что, задание закрывается автоматически')}}</p>
                    @auth
                        <a href="{{ route('verification.info') }}">
                            @else
                                <a href="/register">
                                    @endauth
                                    <button  class="font-sans  text-lg  font-semibold bg-yellow-500 hover:bg-yellow-600 text-white px-10 py-4 rounded">
                                        {{__('Получить статус исполнителя')}}
                                    </button>
                                </a>
                </div>
            </div>
        </div>

        {{-- 4 --}}
        <div class="flex lg:flex-row flex-col container mx-auto my-16">
            <div class="lg:w-2/5 w-full lg:block hidden lg:text-left text-center">
                <h1 class="font-bold text-3xl">{{__('Экономия на рекламе')}}</h1>
                <p class="mt-6 text-lg">{{__('Больше не нужно тратить деньги на собственный сайт и рекламу — выбирайте задания и отправляйте отклики заказчикам, которым услуга нужна прямо сейчас.')}}</p>
                <div>
                    <hr class="mt-12 mb-8">
                    <p class="mb-12">{{__('Сервис мне очень помог в наработке клиентской базы, что всегда очень сложно сделать в салоне. У меня уже есть заказчики, которые приходят на стрижку или окрашивание в третий, четвертый раз, то есть становятся постоянными клиентами.')}}</p>
                    @auth
                        <a href="{{ route('verification.info') }}">
                            @else
                                <a href="/register">
                                    @endauth
                                    <button  class="font-sans  text-lg  font-semibold bg-yellow-500 hover:bg-yellow-600 text-white px-10 py-4 rounded">
                                        {{__('СТАТЬ ИСПОЛНИТЕЛЕМ')}}
                                    </button>
                                </a>
                </div>
            </div>
            <div class="lg:w-3/5 w-full lg:block hidden">
                <img class="ml-4 xl:float-right float-none" src="{{asset('images/performer4.jpg')}}" alt="#">
            </div>

            <div class="lg:hidden block">
                <img class="lg:mx-0 mx-auto" src="{{asset('images/performer4.jpg')}}" alt="#">
            </div>
            <div class="lg:hidden block lg:text-left text-center lg:mt-0 mt-4">
                <h1 class="font-bold text-3xl">{{__('Экономия на рекламе')}}</h1>
                <p class="mt-6 text-lg">{{__('Больше не нужно тратить деньги на собственный сайт и рекламу — выбирайте задания и отправляйте отклики заказчикам, которым услуга нужна прямо сейчас.')}}</p>
                <div>
                    <hr class="mt-8 mb-8">
                    <p class="mb-12">{{__('Сервис мне очень помог в наработке клиентской базы, что всегда очень сложно сделать в салоне. У меня уже есть заказчики, которые приходят на стрижку или окрашивание в третий, четвертый раз, то есть становятся постоянными клиентами.')}}</p>
                    @auth
                        <a href="{{ route('verification.info') }}">
                            @else
                                <a href="/register">
                                    @endauth
                                    <button  class="font-sans  text-lg  font-semibold bg-yellow-500 hover:bg-yellow-600 text-white px-10 py-4 rounded">
                                        {{__('СТАТЬ ИСПОЛНИТЕЛЕМ')}}
                                    </button>
                                </a>
                </div>
            </div>
        </div>




        <div class="w-10/12 mx-auto text-center my-16 hidden">
            <h1 class="font-bold text-4xl">{{__('Условия сотрудничества с Universal Services')}}</h1>
            <p class="text-xl mt-8 font-medium">{!!__('Сервис не берёт комиссию за выполненный заказ. <br> Вы оплачиваете только отклики к заданиям и сами выбираете клиентов.')!!}</p>
        </div>

        <div class="w-10/12 mx-auto grid md:grid-cols-2 grid-cols-1 container mb-16 hidden">
            <div class="grid-cols-1  float-left p-8 rounded-lg w-5/6 shadow-2xl md:ml-0 mx-auto md:mb-0 mb-8">
                <div class="float-left">
                    <h1 class="font-medium text-2xl">{{__('Безлимитный тариф')}}</h1>
                    <p class="mt-4">{!!__('Неограниченное количество откликов <br> к заказам на 15, 30 или 90 дней.')!!}</p>
                    <button class="bg-transparent mt-10  text-black-700 font-semibold  py-2 px-4 border border-slate-400 hover:border-slate-900 rounded">
                        {{__('Выбрать тариф')}}
                    </button>
                </div>
                <div class="float-right ">
                    <img class="w-24 h-24" src="{{asset('images/unlim_User.svg')}}" alt="#">
                </div>
            </div>

            <div class="grid-cols-1 float-right p-8 rounded-lg w-5/6 shadow-2xl md:mr-0  mx-auto ">
                <div class="float-left">
                    <h1 class="font-medium text-2xl">{{__('Базовый тариф')}}</h1>
                    <p class="mt-4">{!!__('Фиксированное количество откликов: 25, <br> 50 или 100. Сроком на 30 дней.')!!}</p>
                    <button class="bg-transparent mt-10  text-black-700 font-semibold  py-2 px-4 border border-slate-400 hover:border-slate-900 rounded">
                        {{__('Выбрать тариф')}}
                    </button>
                </div>
                <div class="float-right">
                    <img class="w-24 h-24" src="{{asset('images/basic_User.svg')}}" alt="#">
                </div>
            </div>
        </div>


        <div class="text-center my-16">
            <h1 class="font-bold text-4xl">{!!__('Зарабатывайте и добивайтесь <br> своих целей с Universal Services')!!}</h1>
            <p class="text-xl mt-8 font-medium">{{__('Наши исполнители делают это каждый день.')}}</p>
        </div>

        <div class="flex lg:flex-row flex-col container mx-auto">
            <div class="lg:w-2/3 w-full">
                <iframe class="rounded-lg h-full w-5/6 lg:mx-0 mx-auto" width="644" height="362" src="https://www.youtube.com/embed/2J7xlDH4QkA" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
            <div class="lg:w-1/3 w-full lg:mt-0 mt-8 lg:text-left text-center">
                <p class=" text-lg">{{__('Universal Services помогает мне оставаться свободным. Несмотря на то, что график плотный, я решаю сам, не кто-то мне говорит, когда мне встать, куда приехать, что сделать.')}}</p>
                <h1 class="font-bold text-6xl mt-4">65 000</h1>
                <p class="text-lg font-medium mt-4">{!!__('Средний месячный доход <br> в категории «Курьерские услуги»')!!}</p>
                <div class="mt-16">
                    @auth
                        <a href="{{ route('verification.info') }}">
                            @else
                                <a href="/register">
                                    @endauth
                                    <button  class="font-sans  text-lg  font-semibold bg-yellow-500 hover:bg-yellow-600 text-white px-10 py-4 rounded">
                                        {{__('СТАТЬ ИСПОЛНИТЕЛЕМ')}}
                                    </button>
                                </a>
                </div>
            </div>
        </div>


        <div class="grid md:grid-cols-3 grid-cols-1 container mx-auto  md:my-32 my-16">
            <div class="grid-cols-1 shadow-2xl p-8 rounded-lg m-4 ">
                <p class="text-base">{{__('Открыла для себя такую штуку, как сервис Universal Services. Выполняешь задания — платят. Отличная замена обычной «работе на работе» ради денег')}}. ...</p>
                <button onclick="toggleModal8('modal-id8')" class="text-base text-gray-500 hover:text-yellow-400 hover:border-yellow-400 border-solid border-b-2">{{__('Читать дальше')}}</button>
            </div>
            <div class="grid-cols-1 shadow-2xl p-8 rounded-lg m-4">
                <p class="text-base">{{__('Очень крутой сервис, напоминает Uber. Удобно пользоваться, особенно со стороны заказчика — быстро и дешево решаются любые сложные')}}</p>
                <button onclick="toggleModal9('modal-id9')" class="text-base text-gray-500 hover:text-yellow-400 hover:border-yellow-400 border-solid border-b-2">{{__('Читать дальше')}}</button>
            </div>
            <div class="grid-cols-1 shadow-2xl p-8 rounded-lg m-4">
                <p class="text-base">{{__('Начала потихоньку зарабатывать на поездку. Я остановилась на сайте Universal Services. Там есть много интересных предложений и сама система')}}</p>
                <button onclick="toggleModal10('modal-id10')" class="text-base text-gray-500 hover:text-yellow-400 hover:border-yellow-400 border-solid border-b-2">{{__('Читать дальше')}}</button>
            </div>
        </div>

        <div class="flex lg:flex-row flex-col container mx-auto my-16">
            <div class="lg:w-2/5 w-full lg:block hidden lg:text-left text-center xl:ml-0 ml-4">
                <p class=" text-lg">{{__('Сейчас уже дорос уровень до того, что я снимаю и клиентов клиентов. Одни клиенты рекомендуют меня своим друзьям, знакомым. И много, конечно, заказов идет с Universal Services.')}}</p>
                <h1 class="font-bold text-6xl mt-4">70 000</h1>
                <p class="text-lg font-medium mt-4">{!!__('Средний месячный доход <br> в категории «Фото и видеоуслуги»')!!}</p>
                <div class="mt-16">
                    @auth
                        <a href="{{ route('verification.info') }}">
                            @else
                                <a href="/register">
                                    @endauth
                                    <button  class="font-sans  text-lg  font-semibold bg-yellow-500 hover:bg-yellow-600 text-white px-10 py-4 rounded">
                                        {{__('СТАТЬ ИСПОЛНИТЕЛЕМ')}}
                                    </button>
                                </a>
                </div>
            </div>
            <div class="lg:w-3/5 w-full lg:block hidden ml-8">
                <iframe class="rounded-lg h-full ml-4 xl:float-right float-none" width="644" height="362" src="https://www.youtube.com/embed/2J7xlDH4QkA" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>

            <div class="lg:hidden block mx-auto">
                <iframe class="rounded-lg h-full sm:h-[300px] w-full sm:w-[600px] lg:mx-0 mx-auto" src="https://www.youtube.com/embed/2J7xlDH4QkA" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
            <div class="lg:col-span-1 lg:mt-0 mt-8 lg:hidden block lg:text-left text-center mb-12">
                <p class="mt-6 text-lg">{{__('Сейчас уже дорос уровень до того, что я снимаю и клиентов клиентов. Одни клиенты рекомендуют меня своим друзьям, знакомым. И много, конечно, заказов идет с Universal Services.')}}</p>
                <h1 class="font-bold text-6xl mt-4">70 000</h1>
                <p class="text-lg font-medium mt-4">{!!__('Средний месячный доход <br> в категории «Фото и видеоуслуги»')!!}</p>
                <div class="mt-16">
                    @auth
                        <a href="{{ route('verification.info') }}">
                            @else
                                <a href="/register">
                                    @endauth
                                    <button  class="font-sans  text-lg  font-semibold bg-yellow-500 hover:bg-yellow-600 text-white px-10 py-4 rounded">
                                        {{__('СТАТЬ ИСПОЛНИТЕЛЕМ')}}
                                    </button>
                                </a>
                </div>
            </div>
        </div>
    </div>

    {{-- Modal1 start --}}
    <div class="hidden overflow-x-auto overflow-y-auto fixed inset-0 z-50 outline-none focus:outline-none justify-center items-center" style="background-color: rgba(0, 0, 0,0.5)" id="modal-id8">
        <div class="relative my-6 mx-auto w-4/5 max-w-3xl" id="modal-id8">
            <div class="border-0 rounded-lg shadow-2xl px-10 py-10 relative flex mx-auto flex-col w-full bg-white outline-none focus:outline-none">
                <div class="text-center h-full w-full text-base">
                    <h1 class="mb-8">{{__('Открыла для себя такую штуку, как сервис Universal Services. Выполняешь задания — платят. Отличная замена обычной «работе на работе» ради денег.(Щас похоже было на рекламу : Задания разные, найдутся даже для тех, кто ничего не умеет. Достаточно уметь говорить, ну или совсем на крайняк — ходить ')}}</h1>
                    <button onclick="toggleModal8('modal-id8')" class="font-sans  text-xl  font-medium bg-green-500 hover:bg-green-600 text-white px-6 py-2 rounded">{{__('Отмена')}}</button>
                </div>
            </div>
        </div>
    </div>
    <div class="hidden opacity-25 fixed inset-0 z-40 bg-black" id="modal-id8-backdrop"></div>
    {{-- Modal1 end --}}
    {{-- Modal2 start --}}
    <div class="hidden overflow-x-auto overflow-y-auto fixed inset-0 z-50 outline-none focus:outline-none justify-center items-center" style="background-color: rgba(0, 0, 0,0.5)" id="modal-id9">
        <div class="relative my-6 mx-auto w-4/5 max-w-3xl" id="modal-id9">
            <div class="border-0 rounded-lg shadow-2xl px-10 py-10 relative flex mx-auto flex-col w-full bg-white outline-none focus:outline-none">
                <div class="text-center h-full w-full text-base">
                    <h1 class="mb-8">{{__('Очень крутой сервис, напоминает Uber. Удобно пользоваться, особенно со стороны заказчика — быстро и дешево решаются любые сложныеи не очень проблемы. Как исполнитель, работающий по безлимитным пакетам, могу сказать, что стоимость полностью отбил, остался в плюсе, думаю насчет продления. Было бы круто, чтобы сервис работал по всему Узбекистану, например, в Ташкенте. Прилетел отдыхать на месяц, по 3 часа в день работаешь — остался на 2 месяца. Процветания и успехов вам! Очень рад сотрудничеству!')}}</h1>
                    <button onclick="toggleModal9('modal-id9')" class="font-sans  text-xl  font-medium bg-green-500 hover:bg-green-600 text-white px-6 py-2 rounded">{{__('Отмена')}}</button>
                </div>
            </div>
        </div>
    </div>
    <div class="hidden opacity-25 fixed inset-0 z-40 bg-black" id="modal-id9-backdrop"></div>
    {{-- Modal2 end --}}
    {{-- Modal3 start --}}
    <div class="hidden overflow-x-auto overflow-y-auto fixed inset-0 z-50 outline-none focus:outline-none justify-center items-center" style="background-color: rgba(0, 0, 0,0.5)" id="modal-id10">
        <div class="relative my-6 mx-auto w-4/5 max-w-3xl" id="modal-id10">
            <div class="border-0 rounded-lg shadow-2xl px-10 py-10 relative flex mx-auto flex-col w-full bg-white outline-none focus:outline-none">
                <div class="text-center h-full w-full text-base">
                    <h1 class="mb-8">{{__('Начала потихоньку зарабатывать на поездку. Я остановилась на сайте Universal Services. Там есть много интересных предложений и сама система сайта мне очень импонирует.Так что медленно, но верно я иду к своей цели!')}}</h1>
                    <button onclick="toggleModal10('modal-id10')" class="font-sans  text-xl  font-medium bg-green-500 hover:bg-green-600 text-white px-6 py-2 rounded">{{__('Отмена')}}</button>
                </div>
            </div>
        </div>
    </div>
    <div class="hidden opacity-25 fixed inset-0 z-40 bg-black" id="modal-id10-backdrop"></div>
    <script src="{{ asset('js/verification/verification.js') }}"></script>
@endsection
