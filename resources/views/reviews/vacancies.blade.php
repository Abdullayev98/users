@extends('layouts.app')


@section('content')
    <div class="md:container mx-auto pt-5 mt-[30px]">
        <div class="w-full px-12 md:flex md:grid-flow-row md:justify-center md:mx-auto md:max-w-[1300px] mb-4">
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
                        <a class="text-blue-500 hover:text-red-500 text-[15px] leading-[1.8rem]" href="/press">СМИ о нас</a>
                    </li>
                    <li class="mt-5">
                        <a class="text-blue-500 hover:text-red-500 text-[15px] leading-[1.8rem]" href="">Реклама на сервисе</a>
                    </li>
                    <li>
                        <a class="text-blue-500 hover:text-red-500 text-[15px] leading-[1.8rem]" href="/contacts">Контакты</a>
                    </li>
                    <li>
                        <a class="text-black font-semibold text-[15px] leading-[1.8rem]" href="/vacancies">Вакансии</a>
                    </li>
                </ul>
                <a href class="bg-[url('https://assets.youdo.com/_next/static/media/shield-only.db76e917d01c0a73d98962ea064216a4.svg')] bg-no-repeat"></a>
                <a href="/verification" class="w-[200px] px-[16px] pb-[15px] block rounded-[8px] shadow-xl hover:shadow-md text-[12px] leading-[16px] tracking-[.2px] text-[#444] mt-5 text-center mb-8">
                    <img src="https://assets.youdo.com/_next/static/media/shield-only.db76e917d01c0a73d98962ea064216a4.svg" class="mx-auto pb-3" alt="">
                    Станьте исполнителем Универсал Сервис. И начните зарабатывать.
                </a>
            </div>
            <div class="md:w-9/12 md:mt-2 md:pl-12">
                <h1 class="text-[1.9rem] font-semibold ">
                    Вакансии
                </h1>
                <img src="https://assets.youdo.com/next/_next/static/images/photo4-8a783577cfab9ce8adc6eb892b8df661.jpg" alt="" class="my-4">
                <h1 class="text-[1.6rem] font-semibold my-4">Кто мы</h1>
                <p class="my-5">Universal Services — это удобное мобильное приложение и сайт для заказа любых услуг напрямую у специалистов и поиска клиентов.</p>
                <p class="my-5">Пользователи Universal Services ежедневно решают свои бытовые и рабочие задачи, находят заказы и подработку. Сервис помогает миллионам людей экономить деньги и время, делегировать рутинные дела, которые отвлекают от важного. А ещё Universal Services меняет рынок труда, позволяя людям работать в удобное время, без начальников и офиса.</p>
                <p class="my-5">Сейчас на сервисе зарегистрированы 5,9 млн пользователей, из которых более 1 млн сами оказывают услуги. На Universal Services легко найти курьера, сантехника, визажиста или бригаду для ремонта. Заказать разработку сайта, организовать свадьбу, переезд и найти исполнителей для тысячи других задач.</p>
                <p class="my-5">Задания, в которых нужно личное присутствие специалиста, выполняются во всех регионах России: Москва, Санкт-Петербург, Казань, Нижний Новгород, Екатеринбург и т. д. Уже сейчас создать заказ можно из любой точки мира.</p>
                <p class="my-5">Мы активно растем, в том числе за счет больших рекламных кампаний в интернете и по ТВ. Серия роликов «Дела делаются» в 2018 году попала в список победителей рекламного конкурса на Sostav.ru. С момента основания сервис получил множество престижных номинаций и наград. Среди них: премия Рунета, конкурс Forbes «Стартап года», «Золотой сайт» и т. д. В 2017 году Universal Services вошло в список лучших приложений в номинации «Тренды года» в App Store. В 2019 году Universal Services вошло в топ-20 самых дорогих компаний Рунета по версии Forbes.</p>
                <p class="my-5">Для решения рабочих задач команда Universal Services использует современные технологии, анализ данных и машинное обучение. Наш главный офис находится в Москве, второй — в Казани.
                    Мы стремимся раскрыть потенциал каждого сотрудника и ищем тех, для кого работа не ограничивается выполнением задач. Людей, которым важно помогать другим и быть частью большого проекта, способного менять мир.</p>
                <h1 class="text-[1.9rem] font-semibold ">
                    Что мы предлагаем?
                </h1>
                <div class="ml-8 my-3">
                    <li class="my-2">Амбициозные и интересные задачи;</li>
                    <li class="my-2">Конкурентоспособная «белая» заработная плата;</li>
                    <li class="my-2">Возможность внести свои инициативы и увидеть результат своей работы;</li>
                    <li class="my-2">Адекватное руководство, компетентный коллектив, низкий уровень бюрократии;</li>
                    <li class="my-2">Оформление по ТК РФ;</li>
                    <li class="my-2">Полная занятость, полный день;</li>
                    <li class="my-2">Гибкий график работы: время начала с 8:00 до 12:00 и окончания с 17:00 до 21:00 соответственно, перерыв на обед — один час;</li>
                    <li class="my-2">Возможность работать как в офисе (офис находится в 7 — 10 минутах пешком от метро Фрунзенская / Парк Культуры), так и удаленно из дома;</li>
                    <li class="my-2">Современная техника — компьютеры с 32Gb оперативной памяти, SSD, два монитора;</li>
                    <li class="my-2">Корпоративные мероприятия;</li>
                    <li class="my-2">Оплачиваемое участие в профильных конференциях.</li>
                </div>

                <div class="acordion mt-16">
                    <div class="mb-4 rounded-md border shadow-md">
                        <button class="rounded-md accordion text-[#444] cursor-pointer p-[18px] w-full text-left text-[15px] outline-none transition duration-400 italic font-[latoregular,sans-serif] text-[2rem] hover:bg-gray-200">Ведущий менеджер по директ - маркетингу </button>
                        <div class="panel overflow-hidden hidden px-[18px] bg-white p-4">
                            <div class="text-[#7f7f7f]">
                                <div>
                                    <h1 class="font-semibold text-[20px]">Обязанности:</h1>
                                    <li class="my-2">Амбициозные и интересные задачи;</li>
                                    <li class="my-2">Конкурентоспособная «белая» заработная плата;</li>
                                    <li class="my-2">Возможность внести свои инициативы и увидеть результат своей работы;</li>
                                    <li class="my-2">Адекватное руководство, компетентный коллектив, низкий уровень бюрократии;</li>
                                    <li class="my-2">Оформление по ТК РФ;</li>
                                    <li class="my-2">Полная занятость, полный день;</li>
                                    <li class="my-2">Гибкий график работы: время начала с 8:00 до 12:00 и окончания с 17:00 до 21:00 соответственно, перерыв на обед — один час;</li>
                                    <li class="my-2">Возможность работать как в офисе (офис находится в 7 — 10 минутах пешком от метро Фрунзенская / Парк Культуры), так и удаленно из дома;</li>
                                    <li class="my-2">Современная техника — компьютеры с 32Gb оперативной памяти, SSD, два монитора;</li>
                                    <li class="my-2">Корпоративные мероприятия;</li>
                                    <li class="my-2">Оплачиваемое участие в профильных конференциях.</li>
                                </div>
                                <a
                                    href="mailto:e.kiselev@youdo.ru?subject=%D0%92%D0%B0%D0%BA%D0%B0%D0%BD%D1%81%D0%B8%D1%8F%20-%20%D0%92%D0%B5%D0%B4%D1%83%D1%89%D0%B8%D0%B9%20%D0%BC%D0%B5%D0%BD%D0%B5%D0%B4%D0%B6%D0%B5%D1%80%20%D0%BF%D0%BE%20%D0%B4%D0%B8%D1%80%D0%B5%D0%BA%D1%82-%D0%BC%D0%B0%D1%80%D0%BA%D0%B5%D1%82%D0%B8%D0%BD%D0%B3%D1%83"
                                    type="button"
                                    target="_self"
                                    class="bg-[#6fc727] hover:bg-[#5ab82e] text-white py-3 px-6 rounded-md text-[18px] my-4">
                                    Откликнуться на вакансию
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="mb-4 rounded-md border shadow-md">
                        <button class="rounded-md accordion text-[#444] cursor-pointer p-[18px] w-full text-left text-[15px] outline-none transition duration-400 italic font-[latoregular,sans-serif] text-[2rem] hover:bg-gray-200">QA Automation engineer/Тестировщик-автоматизатор (Java)</button>
                        <div class="panel overflow-hidden hidden px-[18px] bg-white">
                            <div class="text-[#7f7f7f]">
                                <div>
                                    <h1 class="font-semibold text-[20px]">Обязанности:</h1>
                                    <li class="my-2">Амбициозные и интересные задачи;</li>
                                    <li class="my-2">Конкурентоспособная «белая» заработная плата;</li>
                                    <li class="my-2">Возможность внести свои инициативы и увидеть результат своей работы;</li>
                                    <li class="my-2">Адекватное руководство, компетентный коллектив, низкий уровень бюрократии;</li>
                                    <li class="my-2">Оформление по ТК РФ;</li>
                                    <li class="my-2">Полная занятость, полный день;</li>
                                    <li class="my-2">Гибкий график работы: время начала с 8:00 до 12:00 и окончания с 17:00 до 21:00 соответственно, перерыв на обед — один час;</li>
                                    <li class="my-2">Возможность работать как в офисе (офис находится в 7 — 10 минутах пешком от метро Фрунзенская / Парк Культуры), так и удаленно из дома;</li>
                                    <li class="my-2">Современная техника — компьютеры с 32Gb оперативной памяти, SSD, два монитора;</li>
                                    <li class="my-2">Корпоративные мероприятия;</li>
                                    <li class="my-2">Оплачиваемое участие в профильных конференциях.</li>
                                </div>
                                <a
                                    href="mailto:e.kiselev@youdo.ru?subject=%D0%92%D0%B0%D0%BA%D0%B0%D0%BD%D1%81%D0%B8%D1%8F%20-%20%D0%92%D0%B5%D0%B4%D1%83%D1%89%D0%B8%D0%B9%20%D0%BC%D0%B5%D0%BD%D0%B5%D0%B4%D0%B6%D0%B5%D1%80%20%D0%BF%D0%BE%20%D0%B4%D0%B8%D1%80%D0%B5%D0%BA%D1%82-%D0%BC%D0%B0%D1%80%D0%BA%D0%B5%D1%82%D0%B8%D0%BD%D0%B3%D1%83"
                                    type="button"
                                    target="_self"
                                    class="bg-[#6fc727] hover:bg-[#5ab82e] text-white py-3 px-6 rounded-md text-[18px] my-4">
                                    Откликнуться на вакансию
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="mb-4 rounded-md border shadow-md">
                        <button class="rounded-md accordion text-[#444] cursor-pointer p-[18px] w-full text-left text-[15px] outline-none transition duration-400 italic font-[latoregular,sans-serif] text-[2rem] hover:bg-gray-200">Тестировщик мобильных приложений</button>
                        <div class="panel overflow-hidden hidden px-[18px] bg-white">
                            <div class="text-[#7f7f7f]">
                                <div>
                                    <h1 class="font-semibold text-[20px]">Обязанности:</h1>
                                    <li class="my-2">Амбициозные и интересные задачи;</li>
                                    <li class="my-2">Конкурентоспособная «белая» заработная плата;</li>
                                    <li class="my-2">Возможность внести свои инициативы и увидеть результат своей работы;</li>
                                    <li class="my-2">Адекватное руководство, компетентный коллектив, низкий уровень бюрократии;</li>
                                    <li class="my-2">Оформление по ТК РФ;</li>
                                    <li class="my-2">Полная занятость, полный день;</li>
                                    <li class="my-2">Гибкий график работы: время начала с 8:00 до 12:00 и окончания с 17:00 до 21:00 соответственно, перерыв на обед — один час;</li>
                                    <li class="my-2">Возможность работать как в офисе (офис находится в 7 — 10 минутах пешком от метро Фрунзенская / Парк Культуры), так и удаленно из дома;</li>
                                    <li class="my-2">Современная техника — компьютеры с 32Gb оперативной памяти, SSD, два монитора;</li>
                                    <li class="my-2">Корпоративные мероприятия;</li>
                                    <li class="my-2">Оплачиваемое участие в профильных конференциях.</li>
                                </div>
                                <a
                                    href="mailto:e.kiselev@youdo.ru?subject=%D0%92%D0%B0%D0%BA%D0%B0%D0%BD%D1%81%D0%B8%D1%8F%20-%20%D0%92%D0%B5%D0%B4%D1%83%D1%89%D0%B8%D0%B9%20%D0%BC%D0%B5%D0%BD%D0%B5%D0%B4%D0%B6%D0%B5%D1%80%20%D0%BF%D0%BE%20%D0%B4%D0%B8%D1%80%D0%B5%D0%BA%D1%82-%D0%BC%D0%B0%D1%80%D0%BA%D0%B5%D1%82%D0%B8%D0%BD%D0%B3%D1%83"
                                    type="button"
                                    target="_self"
                                    class="bg-[#6fc727] hover:bg-[#5ab82e] text-white py-3 px-6 rounded-md text-[18px] my-4">
                                    Откликнуться на вакансию
                                </a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>


    <script>
        var acc = document.getElementsByClassName("accordion");
        var i;

        for (i = 0; i < acc.length; i++) {
            acc[i].addEventListener("click", function() {
                this.classList.toggle("active");
                var panel = this.nextElementSibling;
                if (panel.style.display === "block") {
                    panel.style.display = "none";
                } else {
                    panel.style.display = "block";
                }
            });
        }
    </script>

    <div class="w-full" x-data="topBtn">
        <button onclick="topFunction()" id="myBtn" title="Go to top" class="fixed z-10 hidden p-3 bg-gray-100 rounded-full shadow-md bottom-10 right-10 animate-bounce">
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
