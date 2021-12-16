@extends('layouts.app')


@section('content')
    <style media="screen">
        #test {
            width: 100px;
            height: 100px;
            position: relative;
            top: 100px;
            bottom: 100px;
            background: green;
        }
    </style>
    <!-- <source srcset="https://assets.youdo.com/next/_next/static/images/frame-79b538237f77d7d37ed14920afcdb8b0.webp" type="image/webp"> -->
    <div
        class="bg-[url('https://assets.youdo.com/next/_next/static/images/frame-79b538237f77d7d37ed14920afcdb8b0.webp')] bg-center bg-cover h-96 ">
        <div class="container-lg mx-auto">
            <main class="xl:mx-96 lg:mx-60 md:mx-48 sm:mx-32">
                <div class="text-center pt-32">
                    <h1 class="font-semibold text-white text-3xl lg:text-5xl md:text-4xl">
                        <span class="block xl:block">Освободим вас от забот</span>
                    </h1>
                    <p class="mt-3 text-base text-white sm:mt-5 text-sm sm:mx-auto md:mt-5 md:text-sm md:mt-2 mb-3">
                        Поможем найти надежного исполнителя для любых задач
                    </p>
                    <div class="w-3/4 mx-auto">
                        <div
                            class="flew w-full bg-white hover:shadow-[0_5px_30px_-0_rgba(255,138,0,4)] transition duration-200 rounded-md mx-auto">
                            {{--                        <input type="text" placeholder="Например, составить иск" class="w-2/3 md: focus:outline-none sm:left-24 rounded-md text-black md:text-md md:pl-2 sm:w-1/2 py-2.5">--}}
                            <input type="text" placeholder="Например, составить иск"
                                   class="w-auto md:left-32 focus:outline-none sm:left-24 rounded-md text-black md:text-md md:pl-2 sm:w-2/3 py-2.5">
                            <button type="submit"
                                    class="float-right border bg-yellow-500  border-transparent font-medium  rounded-md text-white px-3.5 py-1 mr-1 mt-1 md:text-md md:pb-1 text-white">
                                Заказать услугу
                            </button>
                        </div>
                        <div class="text-left mt-2 text-gray-700 underline-offset-1 text-sm">
                            Например: <a href="#" class="hover:text-slate-400">повесить кондиционер</a>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <div class="fixed hidden inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full" id="my-modal">
        <!--modal content-->
        <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
            @include('profile.login')
        </div>
    </div>
    <main>
        <div class="container md:text-center text-left mx-auto mt-8 md:px-16 px-4">
            <div class="text-3xl font-bold text-center">
                Более 2 300 000 исполнителей
            </div>
            <div class="text-sm text-center mt-4">
                готовы помочь вам в решении самых разнообразных задач
            </div>
            <div class="grid md:grid-cols-3 grid-cols-1 w-full">
                <div class="text-gray-500 text-lg my-8">
                    <a href="#" class="hover:text-[#ffa200]">
                        <i class="fas fa-truck-loading text-gray-500 hover:text-[#ffa200]"></i> Курьерские услуги
                    </a>
                </div>
                <div class="text-gray-500 text-lg my-8">
                    <a href="#" class="hover:text-[#ffa200]">
                        <i class="fas fa-hammer text-gray-500"></i> Ремонт и строительство
                    </a>
                </div>
                <div class="text-gray-500 text-lg my-8">
                    <a href="#" class="hover:text-[#ffa200]">
                        <i class="fas fa-shipping-fast text-gray-500"></i> Грузоперевозки
                    </a>
                </div>
                <div class="text-gray-500 text-lg my-8">
                    <a href="#" class="hover:text-[#ffa200]">
                        <i class="fas fa-soap text-gray-500"></i> Уброка и помощ по хозяйству
                    </a>
                </div>
                <div class="text-gray-500 text-lg my-8">
                    <a href="#" class="hover:text-[#ffa200]">
                        <i class="fas fa-hands-helping text-gray-500"></i> Виртуальный помощник
                    </a>
                </div>
                <div class="text-gray-500 text-lg my-8">
                    <a href="#" class="hover:text-[#ffa200]">
                        <i class="fas fa-tv text-gray-500"></i> Компьютерная помощь 
                    </a>
                </div>
                <div class="text-gray-500 text-lg my-8">
                    <a href="#" class="hover:text-[#ffa200]">
                        <i class="fas fa-mug-hot text-gray-500"></i> Мероприятия и промоакции
                    </a>
                </div>
                <div class="text-gray-500 text-lg my-8">
                    <a href="#" class="hover:text-[#ffa200]">
                        <i class="fas fa-mug-hot text-gray-500"></i> Дизайн
                    </a>
                </div>
                <div class="text-gray-500 text-lg my-8">
                    <a href="#" class="hover:text-[#ffa200]">
                        <i class="fas fa-mug-hot text-gray-500"></i> Разработка ПО
                    </a>
                </div>
                <div class="text-gray-500 text-lg my-8">
                    <a href="#" class="hover:text-[#ffa200]">
                        <i class="fas fa-camera-retro text-gray-500"></i> Фото, видео и аудио
                    </a>
                </div>
                <div class="text-gray-500 text-lg my-8">
                    <a href="#" class="hover:text-[#ffa200]">
                        <i class="fas fa- text-gray-500"></i> Финансовый советник
                    </a>
                </div>
                <div class="text-gray-500 text-lg my-8">
                    <a href="#" class="hover:text-[#ffa200]">
                        <i class="fas fa-camera-retro text-gray-500"></i> Установка и ремонт техники
                    </a>
                </div>
                <div class="text-gray-500 text-lg my-8">
                    <a href="#" class="hover:text-[#ffa200]">
                        <i class="fas fa-camera-retro text-gray-500"></i> Красота и здаровье
                    </a>
                </div>
                <div class="text-gray-500 text-lg my-8">
                    <a href="#" class="hover:text-[#ffa200]">
                        <i class="fas fa-camera-retro text-gray-500"></i> Ремонт цифровой техники
                    </a>
                </div>
                <div class="text-gray-500 text-lg my-8">
                    <a href="#" class="hover:text-[#ffa200]">
                        <i class="fas fa-camera-retro text-gray-500"></i> Юридическая и бухгалтерская помощь
                    </a>
                </div>
                <div class="text-gray-500 text-lg my-8">
                    <a href="#" class="hover:text-[#ffa200]">
                        <i class="fas fa-camera-retro text-gray-500"></i> Репетиторы и обучение
                    </a>
                </div>
                <div class="md:col-span-3 col-span-1">
                    <a href="">
                        <button type="button" class="border hover:border-[#000] rounded-md w-64 h-12">Посмотреть все
                            услуги
                        </button>
                    </a>
                </div>
            </div>
            <div class="grid md:grid-cols-4 grid-cols-2 mt-8">
                <div class="text-center">
                    <img src="https://assets.youdo.com/_next/static/media/sbr_176.95ac6c46444100c6bcb6262ed7695c79.png"
                         class="mx-auto" alt="">
                    <div class="font-bold my-4">Удобная и безопасная оплата</div>
                    <div class="text-xs">
                        При оплате через Сделку без риска YouDo вернет деньги, если что-то пойдет не так.
                    </div>
                </div>
                <div class="text-center mx-4">
                    <img
                        src="https://assets.youdo.com/_next/static/media/executor_176.900c31f3bbd110fe153ec59d249ac71b.png"
                        class="mx-auto" alt="">
                    <div class="font-bold my-4">Надежные исполнители</div>
                    <div class="text-xs">
                        «Проверенные исполнители» подтвердили свои документы на YouDo.
                    </div>
                </div>
                <div class="text-center mx-4">
                    <img
                        src="https://assets.youdo.com/_next/static/media/reviews_176.ecbafe84fcaf362f56dad039b6e9756b.png"
                        class="mx-auto" alt="">
                    <div class="font-bold my-4">Доверенные отзывы</div>
                    <div class="text-xs">
                        Более 1 000 000 отзывов от заказчиков помогут выбрать подходящего исполнителя.
                    </div>
                </div>
                <div class="text-center mx-4">
                    <img
                        src="https://assets.youdo.com/_next/static/media/forbusiness_176.05ef3328a82a6661b6c53ff31260b80a.png"
                        class="mx-auto" alt="">
                    <div class="font-bold my-4">YouDo для бизнеса</div>
                    <div class="text-xs">
                        Безналичная оплата бизнес-заданий с предоставлением закрывающих документов.
                    </div>
                </div>
            </div>
            <div class="w-3/4 mx-auto my-8">
                <img
                    src="https://avatars.mds.yandex.net/get-adfox-content/2367573/211006_adfox_1671985_4489405.2ae5b6df3d7a04dc28f071afffa30e99.png/optimize.webp"
                    alt="">
            </div>
        </div>
        <div class="w-full bg-gradient-to-r from-[#fff] via-gray-400 to-[#fff] h-1 rounded-full"></div>
        <div class="w-full bg-gradient-to-r from-[#fff] via-[#f6f8fa] to-[#fff]">
            <div class="container text-center mx-auto px-16">
                <div class="text-4xl w-2/3 mx-auto py-16">
                    С YouDo вы экономите на услугах до 70%*.<br>
                    Как это возможно?
                </div>
                <div class="grid md:grid-cols-2 grid-cols-1 mt-8 w-11/12 mx-auto">
                    <div>
                        <img
                            src="https://assets.youdo.com/next/_next/static/images/hiw-1-be91158a87ea183e3cd3e3dcc56471a5.png"
                            alt="">
                    </div>
                    <div class="text-left">
                        <h3 class="text-4xl my-8">1.Создайте задание</h3>
                        <h5 class="text-2xl my-8">Опишите своими словами задачу, которую требуется выполнить.</h5>
                        <a href="#"><h5 class="text-2xl text-blue-400 underline hover:text-red-500">Создать задание</h5>
                        </a>
                    </div>
                    <div class="text-left my-16 md:block hidden">
                        <h3 class="text-4xl my-8">2.Исполнители предложат вам свои услуги и цены</h3>
                        <h5 class="text-2xl my-8">Уже через пару минут вы начнете получать отклики от исполнителей,
                            готовых выполнить ваше задание.</h5>
                    </div>
                    <div class="my-16 md:block hidden">
                        <img
                            src="https://assets.youdo.com/next/_next/static/images/hiw-2-aa57365db5ca978385ac301a2ef6a5e8.png"
                            alt="">
                    </div>
                    <div class="my-16 md:hidden block">
                        <img
                            src="https://assets.youdo.com/next/_next/static/images/hiw-2-aa57365db5ca978385ac301a2ef6a5e8.png"
                            alt="">
                    </div>
                    <div class="text-left my-16 md:hidden block">
                        <h3 class="text-4xl my-8">2.Исполнители предложат вам свои услуги и цены</h3>
                        <h5 class="text-2xl my-8">Уже через пару минут вы начнете получать отклики от исполнителей,
                            готовых выполнить ваше задание.</h5>
                    </div>
                    <div class="my-16">
                        <img
                            src="https://assets.youdo.com/next/_next/static/images/hiw-3-afd296132a597387954d591bdc9952b2.png"
                            alt="">
                    </div>
                    <div class="text-left my-16">
                        <h3 class="text-4xl my-8">3.Выберите лучший отклик</h3>
                        <h5 class="text-2xl my-8">Вы сможете выбрать подходящего исполнителя, по разным критериям:</h5>
                        <div class="grid grid-cols-2 text-gray-500">
                            <div class=""><i class="fas fa-ruble-sign"> Стоимость услуг</i></div>
                            <div class=""><i class="fas fa-thumbs-up"> Отзывы заказчиков</i></div>
                            <div class=""><i class="fas fa-star"> Рейтинг</i></div>
                            <div class=""><i class="fas fa-user-alt"> Примеры работ</i></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="md:w-1/3 w-1/2 mx-auto h-16">
                <button type="button" class=" bg-yellow-500 border-[#e78900] text-2xl h-16 w-full border-b-4">Разместите
                    задание прямо сейчас
                </button>
                <h5 class="text-xl text-center">и найдите исполнителя за несколько минут</h5>
            </div>
            <div class="w-2/3 mx-auto my-16 text-center">
                <p class="text-xs text-gray-400">*Экономия до 70% рассчитана на основании внутренних исследований и
                    анализа статистических данных ООО «Киберлогистик» за 2020 год, исходя из средней разницы между самым
                    дорогим и самым дешевым откликом исполнителей к размещенному заданию.</p>
            </div>
        </div>
        <div class="bg-[#deeafb]">
            <div class="container mx-auto">
                <div class="text-4xl w-2/3 mx-auto py-16 text-center">
                    Основные преимущества YouDo
                </div>
                <div class="grid grid-cols-4 w-9/12 mx-auto">
                    <div class="">
                        <img src="http://pngimg.com/uploads/ruble/ruble_PNG35.png" class="w-32" alt="">
                    </div>
                    <div class="col-span-3">
                        <h4 class="text-2xl">Выгодные цены</h4>
                        <p class="text-md">У частных исполнителей нет расходов на офис, рекламу, зарплату секретарю и
                            других затрат, которые сервисные компании обычно включают в стоимость своих услуг.</p>
                    </div>
                    <div class=" my-16">
                        <img src="https://www.freeiconspng.com/uploads/white-like-icon-png-20.png" class="w-32" alt="">
                    </div>
                    <div class="col-span-3 my-16">
                        <h4 class="text-2xl">Проверенные исполнители</h4>
                        <p class="text-md">Все исполнители YouDo проходят процедуру верификации, мы проверяем отзывы,
                            разбираемся с жалобами и контролируем качество их работы.</p>
                    </div>
                    <div class=" my-16">
                        <img src="https://www.pngkit.com/png/full/245-2458956_hours-time-icon-png-white.png"
                             class="w-32" alt="">
                    </div>
                    <div class="col-span-3 my-16">
                        <h4 class="text-2xl">Экономия времени</h4>
                        <p class="text-md">На YouDo вы можете найти подходящего исполнителя за несколько минут. Многие
                            из них готовы приступить к работе в тот же день, а иногда в тот же час.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="w-full mx-auto lg:shadow-xl">
            <div
                class="grid md:grid-cols-2 grid-cols-1 md:w-11/12 w-full mx-auto md:bg-none bg-contain bg-right bg-no-repeat bg-[url('https://assets.youdo.com/next/_next/static/images/download_hand-13ced686918d5e0b8a92914b8cc87aaf.png')]">
                <div class="w-full md:mt-64 md:mb-3 mt-0 mx-auto md:bg-transparent bg-[#00000066]">
                    <h4 class="text-3xl md:text-[#000] text-[#ffff]">Персональный помощник в вашем кармане</h4>
                    <p class="text-md mt-8 md:text-[#000] text-[#ffff]">Скачайте наше приложение и пользуйтесь YouDo,
                        где бы вы ни находились.</p>
                    <a href="#">
                        <button type="button" class="w-3/10 bg-[#000] hover:bg-[#ffa200] rounded-md mt-8"><img
                                src="https://assets.youdo.com/_next/static/media/ios.d3a42dd0816a046400b4bb7d2b11067f.svg"
                                alt=""></button>
                    </a>
                    <a href="#">
                        <button type="button" class="w-3/10 bg-[#000] hover:bg-[#ffa200] rounded-md mt-8"><img
                                src="https://assets.youdo.com/_next/static/media/android.1234ba9391753eeb525d4f71a808329e.svg"
                                alt=""></button>
                    </a>
                    <a href="#">
                        <button type="button" class="w-3/10 bg-[#000] hover:bg-[#ffa200] rounded-md mt-8"><img
                                src="https://assets.youdo.com/_next/static/media/appgallery.67baccf681decda41c84b0364830d2e4.svg"
                                alt=""></button>
                    </a>
                </div>
                <div class="h-64 md:block hidden">
                    <img
                        src="https://assets.youdo.com/next/_next/static/images/download_hand-13ced686918d5e0b8a92914b8cc87aaf.png"
                        class="relative float-right bottom-24" alt="">
                </div>
            </div>
        </div>
        <div class="w-full lg:shadow-xl">
            <div class="container mx-auto md:w-2/3 w-11/12">
                <div class="w-2/3 mx-auto my-16 text-center">
                    <h1 class="text-4xl">Новые публикации <a href=""><span
                                class="text-[#4099fb] hover:text-[#ff280c] underline">в блоге</span></a></h1>
                </div>
                <div class="grid md:grid-cols-3 grid-cols-2 mx-auto">
                    <div
                        class="col-span-2 mx-auto w-10/12 md:my-16 h-96 blog1 bg-cover bg-no-repeat bg-[url('https://content0.youdo.com/zi.ashx?i=d36fd188a176881f')]">
                        <div class="w-full h-full bg-[#00000066]">
                            <div class="text-xs text-[#ffff] ml-4 pt-64 h-4">
                                Блог YouDo
                            </div>
                            <div class="text-lg text-[#ffff] ml-4 w-52 pt-8 h-4">
                                Из Фрилансера в СЕО <br> Digital-агентства
                            </div>
                        </div>
                    </div>
                    <div
                        class="mx-auto md:col-span-1 col-span-2 md:w-full w-10/12 h-96 md:my-16 my-8 blog1 bg-[url('https://content9.youdo.com/zi.ashx?i=cf53596d9aeb5742')]">
                        <div class="w-full h-full bg-[#00000066]">
                            <div class="text-xs text-[#ffff] ml-4 pt-64 h-4">
                                Спецпроекты
                            </div>
                            <div class="text-lg text-[#ffff] ml-4 w-52 pt-8 h-4">
                                Станьте <br> сертифицированным <br> мастером Tarkett
                            </div>
                        </div>
                    </div>
                </div>
                <div class="grid md:grid-cols-6 grid-cols-2 mx-auto">
                    <div
                        class="col-span-3 md:w-4/5 w-10/12 mb-8 mx-auto h-96 blog1 bg-[url('https://content7.youdo.com/zi.ashx?i=9acd814387dbd28f')]">
                        <div class="w-full h-full bg-[#00000066]">
                            <div class="text-xs text-[#ffff] ml-4 pt-64 h-4">
                                Спецпроекты
                            </div>
                            <div class="text-lg text-[#ffff] ml-4 w-full pt-8 h-4">
                                Средства для ухода за посудомоечной машиной в подарок
                            </div>
                        </div>
                    </div>
                    <div
                        class="col-span-3 md:w-full w-10/12 md:ml-auto mx-auto h-96 blog1 bg-cover bg-no-repeat bg-[url('https://content0.youdo.com/zi.ashx?i=d3b9516659746950')]">
                        <div class="w-full h-full bg-[#00000066]">
                            <div class="text-xs text-[#ffff] ml-4 pt-64 h-4">
                                Спецпроекты
                            </div>
                            <div class="text-lg text-[#ffff] ml-4 w-full pt-8 h-4">
                                Реили убраться? Получите <br> за это подарок
                            </div>
                        </div>
                    </div>
                </div>
                <div class="w-2/3 mx-auto mt-16 py-8 text-center">
                    <h4 class="text-lg">Хотите стать героем наших историй? Это просто!</h4>
                    <h1 class="text-lg">
                        <a href="">
                <span class="text-[#4099fb] hover:text-[#ff280c] underline">
                  Разместите задание
                </span>
                        </a>
                        или
                        <a href="">
                  <span class="text-[#4099fb] hover:text-[#ff280c] underline">
                    станьте исполнителем.
                  </span>
                        </a>
                    </h1>
                </div>
            </div>
        </div>
        <div class="container mx-auto md:w-2/3 w-11/12">
            <div class="w-full my-16">
                <h1 class="text-4xl">Что заказывают на «Юду» прямо сейчас</h1>
            </div>
            <div class="grid md:grid-cols-3 grid-cols-2 mx-auto mb-72">
                <div id="scrollbar" class="col-span-2 md:w-10/12 w-full h-screen blog1 mt-8">
                    <div class="w-full overflow-y-scroll w-full h-screen">

                        @foreach($tasks as $task)
                            <div class="w-full border-b-2 h-28 hover:bg-blue-100">
                                <div class="icon pt-4">
                                    <i class="fas fa-user-circle text-6xl float-left text-blue-400"></i>
                                </div>
                                <div class="mx-auto w-2/3">
                                    <a href="#" class="text-lg text-blue-400 hover:text-red-400">
                                        {{$task->name}}
                                    </a>
                                    <p class="text-sm mt-4 overflow-hidden whitespace-nowrap text-ellipsis">
                                        {{$task->description}}
                                    </p>
                                </div>
                            </div>
                        @endforeach


                    </div>
                    <div class="mt-4">
                        <button type="button"
                                class=" bg-[#4697fa] border-[#005ccd] text-[#fff] text-2xl h-16 w-full border-b-4">
                            Показать все задания
                        </button>
                    </div>
                </div>
                <div class="w-full md:col-span-1 h-full col-span-2">
                    <div
                        class="md:w-full w-full h-1/3 md:my-8 mt-32 mb-8 bg-center bg-cover bg-[url('https://assets.youdo.com/next/_next/static/images/pennants-executors-d40b155c145cdfa2d0f387a2baef5430.jpg')]">
                        <div class="w-full h-full bg-[#00000066] text-center">
                            <i class="fas fa-user text-[#84e879] text-5xl pt-8"></i>
                            <p class="text-4xl text-[#fff]">Как стать исполнителем</p>
                        </div>
                    </div>
                    <div
                        class="md:w-full w-full h-1/3 my-8 bg-center bg-cover bg-[url('https://assets.youdo.com/next/_next/static/images/pennants-security-e4a7b046a3514fd9957083be30dc1f4f.jpg')]">
                        <div class="w-full h-full bg-[#00000066] text-center">
                            <i class="fas fa-shield-alt text-[#8ae2ed] text-5xl pt-8"></i>
                            <p class="text-4xl text-[#fff]">Безопасность и гарантии</p>
                        </div>
                    </div>
                    <div
                        class="md:w-full w-full h-1/3 my-8 bg-center bg-cover bg-[url('https://assets.youdo.com/next/_next/static/images/pennants-b2b-152e142edc63148dcfe9dfc83a99e62e.jpg')]">
                        <div class="w-full h-full bg-[#00000066] text-center">
                            <p class="text-5xl pt-8 text-[#ffc730]">Надежные исполнители для бизнеса</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script>
        // Grabs all the Elements by their IDs which we had given them
        let modal = document.getElementById("my-modal");

        let btn = document.getElementById("open-btn");

        // let button = document.getElementById("ok-btn");

        // We want the modal to open when the Open button is clicked
        btn.onclick = function () {
            modal.style.display = "block";
        }
        // We want the modal to close when the OK button is clicked
        // button.onclick = function() {
        //     modal.style.display = "none";
        // }
        // The modal will close when the user clicks anywhere outside the modal
        window.onclick = function (event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>

    <script>
        window.replainSettings = {id: '38d8d3f0-b690-4857-a153-f1e5e8b462a8'};
        (function (u) {
            var s = document.createElement('script');
            s.type = 'text/javascript';
            s.async = true;
            s.src = u;
            var x = document.getElementsByTagName('script')[0];
            x.parentNode.insertBefore(s, x);
        })('https://widget.replain.cc/dist/client.js');
    </script>

    <script>
        tailwind.config = {
            module.exports = {
                purge: [],
                theme: {
                    screens: {
                        'tablet': '700px',
                    },
                    colors: {
                        'orange': '#ff8a00',
                    },
                    boxShadowColor: {
                        'sabzirang': '#ff8a00',
                    },
                }
            }
        }
    </script>
    <script>
        setInterval(function () {
            var elem = document.getElementById('scrollbar');
            elem.scrollTop = elem.scrollHeight;
        }, 5000);
    </script>
@endsection
