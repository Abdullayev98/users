@extends('layouts.app')


@section('content')
    <div class="container w-4/5 mx-auto mt-12">
        <div class="flex lg:flex-row flex-col justify-center mt-6">
            @include('components.footerpage')
            <div class="lg:w-4/5 w-full text-base lg:mt-0 mt-4">
                <h1 class="text-2xl font-semibold ">
                    {{__('Вакансии')}}
                </h1>
                <img src="https://www.roi-selling.com/hs-fs/hub/444749/file-1929610769-jpg/blog-files/team-.jpg" alt="" class="my-4">
                <h1 class="text-2xl font-semibold my-4">{{__('Кто мы')}}</h1>
                <p class="my-5 text-base">
                    {{__('Universal Services — это удобное мобильное приложение и сайт для заказа любых услуг напрямую у специалистов и поиска клиентов.')}}</p>
                <p class="my-5 text-base">
                    {{__('Пользователи Universal Services ежедневно решают свои бытовые и рабочие задачи, находят заказы и подработку. Сервис помогает миллионам людей экономить деньги и время, делегировать рутинные дела, которые отвлекают от важного. А ещё Universal Services меняет рынок труда, позволяя людям работать в удобное время, без начальников и офиса.')}}</p>
                <p class="my-5 text-base">
                    {{__('Сейчас на сервисе зарегистрированы 5,9 млн пользователей, из которых более 1 млн сами оказывают услуги. На Universal Services легко найти курьера, сантехника, визажиста или бригаду для ремонта. Заказать разработку сайта, организовать свадьбу, переезд и найти исполнителей для тысячи других задач.')}}</p>
                <p class="my-5 text-base">
                    {{__('Задания, в которых нужно личное присутствие специалиста, выполняются во всех регионах России: Москва, Санкт-Петербург, Казань, Нижний Новгород, Екатеринбург и т. д. Уже сейчас создать заказ можно из любой точки мира.')}}</p>
                <p class="my-5 text-base">
                    {{__('Мы активно растем, в том числе за счет больших рекламных кампаний в интернете и по ТВ. Серия роликов «Дела делаются» в 2018 году попала в список победителей рекламного конкурса на Sostav.ru. С момента основания сервис получил множество престижных номинаций и наград. Среди них: премия Рунета, конкурс Forbes «Стартап года», «Золотой сайт» и т. д. В 2017 году Universal Services вошло в список лучших приложений в номинации «Тренды года» в App Store. В 2019 году Universal Services вошло в топ-20 самых дорогих компаний Рунета по версии Forbes.')}}</p>
                <p class="my-5 text-base">
                    {{__('Для решения рабочих задач команда Universal Services использует современные технологии, анализ данных и машинное обучение. Наш главный офис находится в Москве, второй — в Казани. Мы стремимся раскрыть потенциал каждого сотрудника и ищем тех, для кого работа не ограничивается выполнением задач. Людей, которым важно помогать другим и быть частью большого проекта, способного менять мир.')}}</p>
                <h1 class="text-2xl font-semibold ">
                    {{__('Что мы предлагаем?')}}
                </h1>
                <div class="ml-8 my-3 text-base">
                    <li class="my-2">{{__('Амбициозные и интересные задачи;')}}</li>
                    <li class="my-2">{{__('Конкурентоспособная «белая» заработная плата;')}}</li>
                    <li class="my-2">{{__('Возможность внести свои инициативы и увидеть результат своей работы;')}}</li>
                    <li class="my-2">
                        {{__('Адекватное руководство, компетентный коллектив, низкий уровень бюрократии;')}}</li>
                    <li class="my-2">{{__('Оформление по ТК РФ')}}</li>
                    <li class="my-2">{{__('Полная занятость, полный день;')}}</li>
                    <li class="my-2">
                        {{__('Гибкий график работы: время начала с 8:00 до 12:00 и окончания с 17:00 до 21:00 соответственно, перерыв на обед — один час;')}}</li>
                    <li class="my-2">{{__('Возможность работать как в офисе (офис находится в 7 — 10 минутах пешком от метро Фрунзенская / Парк Культуры), так и удаленно из дома;')}}</li>
                    <li class="my-2">
                        {{__('Современная техника — компьютеры с 32Gb оперативной памяти, SSD, два монитора;')}}</li>
                    <li class="my-2">{{__('Корпоративные мероприятия;')}}</li>
                    <li class="my-2">{{__('Оплачиваемое участие в профильных конференциях.')}}</li>
                </div>

                <div class="acordion mt-16">
                    <button class="rounded-md accordion text-gray-700 cursor-pointer p-8 w-full text-left text-lg outline-none transition duration-400 italic font-[latoregular,sans-serif] hover:bg-gray-200">
                        {{__('Ведущий менеджер по директ - маркетингу')}}</button>
                    <div class="mb-4 rounded-md border shadow-md">
                        <div class="panel overflow-hidden hidden px-8 bg-white p-4">
                            <div class="text-[#7f7f7f]">
                                <div class=" text-base">
                                    <h1 class="font-semibold">{{__('Обязанности')}}</h1>
                                    <li class="my-2">{{__('Амбициозные и интересные задачи;')}}</li>
                                    <li class="my-2">{{__('Конкурентоспособная «белая» заработная плата;')}}</li>
                                    <li class="my-2">{{__('Возможность внести свои инициативы и увидеть результат своей работы;')}}</li>
                                    <li class="my-2">
                                        {{__('Адекватное руководство, компетентный коллектив, низкий уровень бюрократии;')}}</li>
                                    <li class="my-2">{{__('Оформление по ТК РФ')}}</li>
                                    <li class="my-2">{{__('Полная занятость, полный день;')}}</li>
                                    <li class="my-2">
                                        {{__('Гибкий график работы: время начала с 8:00 до 12:00 и окончания с 17:00 до 21:00 соответственно, перерыв на обед — один час;')}}</li>
                                    <li class="my-2">{{__('Возможность работать как в офисе (офис находится в 7 — 10 минутах пешком от метро Фрунзенская / Парк Культуры), так и удаленно из дома;')}}</li>
                                    <li class="my-2">
                                        {{__('Современная техника — компьютеры с 32Gb оперативной памяти, SSD, два монитора;')}}</li>
                                    <li class="my-2">{{__('Корпоративные мероприятия;')}}</li>
                                    <li class="my-2">{{__('Оплачиваемое участие в профильных конференциях.')}}</li>
                                </div>
                                <a
                                    href="mailto:e.kiselev@user.ru?subject=%D0%92%D0%B0%D0%BA%D0%B0%D0%BD%D1%81%D0%B8%D1%8F%20-%20%D0%92%D0%B5%D0%B4%D1%83%D1%89%D0%B8%D0%B9%20%D0%BC%D0%B5%D0%BD%D0%B5%D0%B4%D0%B6%D0%B5%D1%80%20%D0%BF%D0%BE%20%D0%B4%D0%B8%D1%80%D0%B5%D0%BA%D1%82-%D0%BC%D0%B0%D1%80%D0%BA%D0%B5%D1%82%D0%B8%D0%BD%D0%B3%D1%83"
                                    type="button"
                                    target="_self"
                                    class="bg-green-500 hover:bg-green-500 text-white py-3 px-6 rounded-md text-lg my-4">
                                    {{__('Откликнуться на вакансию')}}
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="mb-4 rounded-md border shadow-md">
                        <button class="rounded-md accordion text-[#444] cursor-pointer p-8 w-full text-left text-[15px] outline-none transition duration-400 italic font-[latoregular,sans-serif] text-[2rem] hover:bg-gray-200">
                            {{__('QA Automation engineer/Тестировщик-автоматизатор (Java)')}}</button>
                        <div class="panel overflow-hidden hidden px-8 bg-white">
                            <div class="text-gray-600">
                                <div class="text-base">
                                    <h1 class="font-semibold text-xl">{{__('Обязанности')}}</h1>
                                    <li class="my-2">{{__('Амбициозные и интересные задачи;')}}</li>
                                    <li class="my-2">{{__('Конкурентоспособная «белая» заработная плата;')}}</li>
                                    <li class="my-2">{{__('Возможность внести свои инициативы и увидеть результат своей работы;')}}</li>
                                    <li class="my-2">
                                        {{__('Адекватное руководство, компетентный коллектив, низкий уровень бюрократии;')}}</li>
                                    <li class="my-2">{{__('Оформление по ТК РФ')}}</li>
                                    <li class="my-2">{{__('Полная занятость, полный день;')}}</li>
                                    <li class="my-2">
                                        {{__('Гибкий график работы: время начала с 8:00 до 12:00 и окончания с 17:00 до 21:00 соответственно, перерыв на обед — один час;')}}</li>
                                    <li class="my-2">{{__('Возможность работать как в офисе (офис находится в 7 — 10 минутах пешком от метро Фрунзенская / Парк Культуры), так и удаленно из дома;')}}</li>
                                    <li class="my-2">
                                        {{__('Современная техника — компьютеры с 32Gb оперативной памяти, SSD, два монитора;')}}</li>
                                    <li class="my-2">{{__('Корпоративные мероприятия;')}}</li>
                                    <li class="my-2">{{__('Оплачиваемое участие в профильных конференциях.')}}</li>
                                </div>
                                <a
                                    href="mailto:e.kiselev@user.ru?subject=%D0%92%D0%B0%D0%BA%D0%B0%D0%BD%D1%81%D0%B8%D1%8F%20-%20%D0%92%D0%B5%D0%B4%D1%83%D1%89%D0%B8%D0%B9%20%D0%BC%D0%B5%D0%BD%D0%B5%D0%B4%D0%B6%D0%B5%D1%80%20%D0%BF%D0%BE%20%D0%B4%D0%B8%D1%80%D0%B5%D0%BA%D1%82-%D0%BC%D0%B0%D1%80%D0%BA%D0%B5%D1%82%D0%B8%D0%BD%D0%B3%D1%83"
                                    type="button"
                                    target="_self"
                                    class="bg-green-500 hover:bg-green-500 text-white py-3 px-6 rounded-md text-base my-4">
                                    {{__('Откликнуться на вакансию')}}
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="mb-4 rounded-md border shadow-md">
                        <button class="rounded-md accordion text-gray-600 cursor-pointer p-8 w-full text-left text-[15px] outline-none transition duration-400 italic font-[latoregular,sans-serif] text-[2rem] hover:bg-gray-200">
                            {{__('Тестировщик мобильных приложений')}}</button>
                        <div class="panel overflow-hidden hidden px-8 bg-white">
                            <div class="text-gray-600">
                                <div class="text-base">
                                    <h1 class="font-semibold">{{__('Обязанности')}}</h1>
                                    <li class="my-2">{{__('Амбициозные и интересные задачи;')}}</li>
                                    <li class="my-2">{{__('Конкурентоспособная «белая» заработная плата;')}}</li>
                                    <li class="my-2">{{__('Возможность внести свои инициативы и увидеть результат своей работы;')}}</li>
                                    <li class="my-2">
                                        {{__('Адекватное руководство, компетентный коллектив, низкий уровень бюрократии;')}}</li>
                                    <li class="my-2">{{__('Оформление по ТК РФ')}}</li>
                                    <li class="my-2">{{__('Полная занятость, полный день;')}}</li>
                                    <li class="my-2">
                                        {{__('Гибкий график работы: время начала с 8:00 до 12:00 и окончания с 17:00 до 21:00 соответственно, перерыв на обед — один час;')}}</li>
                                    <li class="my-2">{{__('Возможность работать как в офисе (офис находится в 7 — 10 минутах пешком от метро Фрунзенская / Парк Культуры), так и удаленно из дома;')}}</li>
                                    <li class="my-2">
                                        {{__('Современная техника — компьютеры с 32Gb оперативной памяти, SSD, два монитора;')}}</li>
                                    <li class="my-2">{{__('Корпоративные мероприятия;')}}</li>
                                    <li class="my-2">{{__('Оплачиваемое участие в профильных конференциях.')}}</li>
                                </div>
                                <a
                                    href="mailto:e.kiselev@user.ru?subject=%D0%92%D0%B0%D0%BA%D0%B0%D0%BD%D1%81%D0%B8%D1%8F%20-%20%D0%92%D0%B5%D0%B4%D1%83%D1%89%D0%B8%D0%B9%20%D0%BC%D0%B5%D0%BD%D0%B5%D0%B4%D0%B6%D0%B5%D1%80%20%D0%BF%D0%BE%20%D0%B4%D0%B8%D1%80%D0%B5%D0%BA%D1%82-%D0%BC%D0%B0%D1%80%D0%BA%D0%B5%D1%82%D0%B8%D0%BD%D0%B3%D1%83"
                                    type="button"
                                    target="_self"
                                    class="bg-green-500 hover:bg-green-500 text-white py-3 px-6 rounded-md text-[18px] my-4">
                                    {{__('Откликнуться на вакансию')}}
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

    <div class="w-full" >
        <button onclick="topFunction()" id="myBtn" title="Go to top" class="fixed z-10 hidden p-3 bg-gray-100 rounded-full shadow-md bottom-10 right-10 animate-bounce">
            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 10l7-7m0 0l7 7m-7-7v18">
                </path>
            </svg>
        </button>
    </div>

    <script src="{{ asset('js/reviews/reviews.js') }}"></script>

@endsection
