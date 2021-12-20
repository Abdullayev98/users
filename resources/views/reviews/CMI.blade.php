@extends('layouts.app')

@section('content')
    <div class="md:container mx-auto pt-5 mt-[30px]">
        <div class="w-full px-12 md:flex md:grid-flow-row md:justify-center md:mx-auto md:max-w-[1300px] pb-[130px]">
            <div class="lg:w-2/12 h-auto mt-5">
                <ul>
                    <li>
                        <a class="text-blue-500 hover:text-red-500 text-[15px] leading-[1.8rem]" href="/geotaskshint">Как это работает</a>
                    </li>
                    <li>
                        <a class="text-blue-500 hover:text-red-500 text-[15px] leading-[1.8rem]" href="/security">Безопасность и гарантии</a>
                    </li>
                    <li>
                        <a class="text-blue-500 hover:text-red-500 text-[15px] leading-[1.8rem]" href="/badges">Награды и рейтинг</a>
                    </li>
                    <li class="mt-5">
                        <a class="text-blue-500 hover:text-red-500 text-[15px] leading-[1.8rem]" href="/reviews">Отзывы исполнителей</a>
                    </li>
                    <li>
                        <a class="text-blue-500 hover:text-red-500 text-[15px] leading-[1.8rem]" href="/author-reviews">Отзывы заказчиков</a>
                    </li>
                    <li>
                        <a class="text-black font-semibold text-[15px] leading-[1.8rem]" href="/press">СМИ о нас</a>
                    </li>
                    <li class="mt-5">
                        <a class="text-blue-500 hover:text-red-500 text-[15px] leading-[1.8rem]" href="">Реклама на сервисе</a>
                    </li>
                    <li>
                        <a class="text-blue-500 hover:text-red-500 text-[15px] leading-[1.8rem]" href="/contacts">Контакты</a>
                    </li>
                    <li>
                        <a class="text-blue-500 hover:text-red-500 text-[15px] leading-[1.8rem]" href="/vacancies">Вакансии</a>
                    </li>
                </ul>
                <a href class="bg-[url('https://assets.youdo.com/_next/static/media/shield-only.db76e917d01c0a73d98962ea064216a4.svg')] bg-no-repeat"></a>
                <a href="/verification" class="w-[200px] px-[16px] pb-[15px] block rounded-[8px] shadow-xl hover:shadow-md text-[12px] leading-[16px] tracking-[.2px] text-[#444] mt-5 text-center mb-8">
                    <img src="https://assets.youdo.com/_next/static/media/shield-only.db76e917d01c0a73d98962ea064216a4.svg" class="mx-auto pb-3" alt="">
                    Станьте исполнителем Юду. И начните зарабатывать.
                </a>
            </div>
            <div class="md:w-9/12 md:mt-10 md:pl-12">
                <div class="mb-12">
                    <div class="italic text-[#828282]">
                        6 декабря 2021 г.
                    </div>
                    <h1 class="text-[1.4rem] md:text-[1.8rem]">
                        <span class="text-red-500">ТАСС</span> / YouDo и "Яндекс.Про" составили портрет самозанятого
                    </h1>
                    <p class="mt-4">
                        Совместно с Яндекс.Про провели

                        <a class="text-blue-500 hover:text-black" href="/">исследование</a>

                        и узнали уровень дохода самозанятых, причины, по которым люди переходят на этот режим, а также основные плюсы и минусы, по мнению исполнителей. Кроме того, узнали главные факторы, благодаря которым самозанятые делают выбор в пользу платформенной занятости в России.</p>
                </div>
                <div class="mb-12">
                    <div class="italic text-[#828282]">
                        6 декабря 2021 г.
                    </div>
                    <h1 class="text-[1.4rem] md:text-[1.8rem]">
                        <span class="text-red-500">Российская Газета</span> / Ремонт квартир дорожает из-за роста цен на материалы и услуги рабочих
                    </h1>
                    <p class="mt-4">
                        Поделились с

                        <a class="text-blue-500 hover:text-black" href="/"> Российской Газетой </a>

                        данными о росте стоимости строительства и ремонта, выяснили причины, а также рассказали о том, чего стоит ждать в будущем.</p>
                </div>
                <div class="mb-12">
                    <div class="italic text-[#828282]">
                        11 декабря 2021 г.
                    </div>
                    <h1 class="text-[1.4rem] md:text-[1.8rem]">
                        <span class="text-red-500">РБК</span> / Подорожание техники и электроники толкнуло петербуржцев на вторичный рынок
                    </h1>
                    <p class="mt-4">
                        <a class="text-blue-500 hover:text-black" href="/">Выяснили</a>,

                        где чаще всего встречается повышенный интерес к ремонту домашней техники. В Петербурге спрос на ремонт электроники и гаджетов вырос вдвое за последни три месяца.</p>
                </div>
            </div>
        </div>
    </div>


    <div class="w-full" x-data="topBtn">
        <button onclick="topFunction()" id="myBtn" title="Go to top" class="fixed z-10 hidden p-3 bg-gray-100 rounded-full shadow-md bottom-5 right-24 animate-bounce">
            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 10l7-7m0 0l7 7m-7-7v18">
                </path>
            </svg>
        </button>
    </div>


    <script>
        //Get the button
        var mybutton = document.getElementById("myBtn");

        // When the user scrolls down 20px from the top of the document, show the button
        window.onscroll = function() {
            scrollFunction()
        };

        function scrollFunction() {
            if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                mybutton.style.display = "block";
            } else {
                mybutton.style.display = "none";
            }
        }

        // When the user clicks on the button, scroll to the top of the document
        function topFunction() {
            document.body.scrollTop = 0;
            document.documentElement.scrollTop = 0;
        }
    </script>

@endsection
