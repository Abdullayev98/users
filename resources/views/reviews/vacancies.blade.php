@extends('layouts.app')


@section('content')
    <div class="container w-4/5 mx-auto">
        <div class="flex lg:flex-row flex-col justify-center mt-6">
            <div class="lg:w-1/5 w-full text-base">
                <ul>
                    <li>
                        <a class="text-blue-500 hover:text-red-500" href="/geotaskshint">@lang('lang.review_howItWorks')</a>
                    </li>
                    <li>
                        <a class="text-blue-500 hover:text-red-500" href="/security">@lang('lang.review_security')</a>
                    </li>
                    <li>
                        <a class="text-blue-500 hover:text-red-500" href="/badges">@lang('lang.review_rewards')</a>
                    </li>
                    <li class="mt-5">
                        <a class="text-blue-500 hover:text-red-500" href="/reviews">@lang('lang.review_PerFeed')</a>
                    </li>
                    <li>
                        <a class="text-blue-500 hover:text-red-500" href="/author-reviews">@lang('lang.review_CusFeed')</a>
                    </li>
                    <li>
                        <a class="text-blue-500 hover:text-red-500" href="/press">@lang('lang.review_aboutUs')</a>
                    </li>
                    <li class="mt-5">
                        <a class="text-blue-500 hover:text-red-500" href="">@lang('lang.review_addsInServ')</a>
                    </li>
                    <li>
                        <a class="text-blue-500 hover:text-red-500" href="/contacts">@lang('lang.review_contacts')</a>
                    </li>
                    <li>
                        <a class="text-black font-semibold" href="/vacancies">@lang('lang.review_vacancy')</a>
                    </li>
                </ul>
                <a href class="bg-no-repeat" style="background: url('{{asset('images/shield.svg')}}');"></a>
                <a href="/verification" class="w-10/12 px-10 pb-[15px] block rounded-md shadow-xl hover:shadow-md text-base leading-md tracking-sm text-gray-700 mt-5 text-center">
                    <img src="{{asset('images/shield.svg')}}" class="mx-auto pb-3" alt="">
                    @lang('lang.review_bePerformer')
                </a>
            </div>
            <div class="lg:w-4/5 w-full text-base lg:mt-0 mt-4">
                <h1 class="text-2xl font-semibold ">
                @lang('lang.review_vacancy')
                </h1>
                <img src="https://www.roi-selling.com/hs-fs/hub/444749/file-1929610769-jpg/blog-files/team-.jpg" alt="" class="my-4">
                <h1 class="text-2xl font-semibold my-4">@lang('lang.vac_whoWeAre')</h1>
                <p class="my-5 text-base">@lang('lang.vac_about1')</p>
                <p class="my-5 text-base">@lang('lang.vac_about2')</p>
                <p class="my-5 text-base">@lang('lang.vac_about3')</p>
                <p class="my-5 text-base">@lang('lang.vac_about4')</p>
                <p class="my-5 text-base">@lang('lang.vac_about5')</p>
                <p class="my-5 text-base">@lang('lang.vac_about6')</p>
                <h1 class="text-2xl font-semibold ">
                @lang('lang.vac_whatWeOffer')
                </h1>
                <div class="ml-8 my-3 text-base">
                    <li class="my-2">@lang('lang.vac_offer1')</li>
                    <li class="my-2">@lang('lang.vac_offer2')</li>
                    <li class="my-2">@lang('lang.vac_offer3')</li>
                    <li class="my-2">@lang('lang.vac_offer4')</li>
                    <li class="my-2">@lang('lang.vac_offer5')</li>
                    <li class="my-2">@lang('lang.vac_offer6')</li>
                    <li class="my-2">@lang('lang.vac_offer7')</li>
                    <li class="my-2">@lang('lang.vac_offer8')</li>
                    <li class="my-2">@lang('lang.vac_offer9')</li>
                    <li class="my-2">@lang('lang.vac_offer10')</li>
                    <li class="my-2">@lang('lang.vac_offer11')</li>
                </div>

                <div class="acordion mt-16">
                    <div class="mb-4 rounded-md border shadow-md">
                        <button class="rounded-md accordion text-gray-700 cursor-pointer p-8 w-full text-left text-lg outline-none transition duration-400 italic font-[latoregular,sans-serif] hover:bg-gray-200">@lang('lang.vac_vacancy1')</button>
                        <div class="panel overflow-hidden hidden px-8 bg-white p-4">
                            <div class="text-[#7f7f7f]">
                                <div class=" text-base">
                                    <h1 class="font-semibold">@lang('lang.vac_require')</h1>
                                    <li class="my-2"> Амбициозные и интересные задачи; </li>
                                    <li class="my-2"> Конкурентоспособная «белая» заработная плата; </li>
                                    <li class="my-2"> Возможность внести свои инициативы и увидеть результат своей работы; </li>
                                    <li class="my-2"> Адекватное руководство, компетентный коллектив, низкий уровень бюрократии; </li>
                                    <li class="my-2"> Оформление по ТК РФ; </li>
                                    <li class="my-2"> Полная занятость, полный день; </li>
                                    <li class="my-2"> Гибкий график работы: время начала с 8:00 до 12:00 и окончания с 17:00 до 21:00 соответственно, перерыв на обед — один час; </li>
                                    <li class="my-2"> Возможность работать как в офисе (офис находится в 7 — 10 минутах пешком от метро Фрунзенская / Парк Культуры), так и удаленно из дома; </li>
                                    <li class="my-2"> Современная техника — компьютеры с 32Gb оперативной памяти, SSD, два монитора; </li>
                                    <li class="my-2"> Корпоративные мероприятия; </li>
                                    <li class="my-2"> Оплачиваемое участие в профильных конференциях. </li>
                                </div>
                                <a
                                    href="mailto:e.kiselev@user.ru?subject=%D0%92%D0%B0%D0%BA%D0%B0%D0%BD%D1%81%D0%B8%D1%8F%20-%20%D0%92%D0%B5%D0%B4%D1%83%D1%89%D0%B8%D0%B9%20%D0%BC%D0%B5%D0%BD%D0%B5%D0%B4%D0%B6%D0%B5%D1%80%20%D0%BF%D0%BE%20%D0%B4%D0%B8%D1%80%D0%B5%D0%BA%D1%82-%D0%BC%D0%B0%D1%80%D0%BA%D0%B5%D1%82%D0%B8%D0%BD%D0%B3%D1%83"
                                    type="button"
                                    target="_self"
                                    class="bg-green-500 hover:bg-green-500 text-white py-3 px-6 rounded-md text-lg my-4">
                                    @lang('lang.vac_reply')
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="mb-4 rounded-md border shadow-md">
                        <button class="rounded-md accordion text-[#444] cursor-pointer p-8 w-full text-left text-[15px] outline-none transition duration-400 italic font-[latoregular,sans-serif] text-[2rem] hover:bg-gray-200">@lang('lang.vac_vacancy2')</button>
                        <div class="panel overflow-hidden hidden px-8 bg-white">
                            <div class="text-gray-600">
                                <div class="text-base">
                                    <h1 class="font-semibold text-xl">@lang('lang.vac_require')</h1>
                                    <li class="my-2"> Амбициозные и интересные задачи;</li>
                                    <li class="my-2"> Конкурентоспособная «белая» заработная плата;</li>
                                    <li class="my-2"> Возможность внести свои инициативы и увидеть результат своей работы;</li>
                                    <li class="my-2"> Адекватное руководство, компетентный коллектив, низкий уровень бюрократии;</li>
                                    <li class="my-2"> Оформление по ТК РФ;</li>
                                    <li class="my-2"> Полная занятость, полный день;</li>
                                    <li class="my-2">  Гибкий график работы: время начала с 8:00 до 12:00 и окончания с 17:00 до 21:00 соответственно, перерыв на обед — один час;</li>
                                    <li class="my-2"> Возможность работать как в офисе (офис находится в 7 — 10 минутах пешком от метро Фрунзенская / Парк Культуры), так и удаленно из дома;</li>
                                    <li class="my-2"> Современная техника — компьютеры с 32Gb оперативной памяти, SSD, два монитора;</li>
                                    <li class="my-2"> Корпоративные мероприятия;</li>
                                    <li class="my-2"> Оплачиваемое участие в профильных конференциях.</li>
                                </div>
                                <a
                                    href="mailto:e.kiselev@user.ru?subject=%D0%92%D0%B0%D0%BA%D0%B0%D0%BD%D1%81%D0%B8%D1%8F%20-%20%D0%92%D0%B5%D0%B4%D1%83%D1%89%D0%B8%D0%B9%20%D0%BC%D0%B5%D0%BD%D0%B5%D0%B4%D0%B6%D0%B5%D1%80%20%D0%BF%D0%BE%20%D0%B4%D0%B8%D1%80%D0%B5%D0%BA%D1%82-%D0%BC%D0%B0%D1%80%D0%BA%D0%B5%D1%82%D0%B8%D0%BD%D0%B3%D1%83"
                                    type="button"
                                    target="_self"
                                    class="bg-green-500 hover:bg-green-500 text-white py-3 px-6 rounded-md text-base my-4">
                                    @lang('lang.vac_reply')
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="mb-4 rounded-md border shadow-md">
                        <button class="rounded-md accordion text-gray-600 cursor-pointer p-8 w-full text-left text-[15px] outline-none transition duration-400 italic font-[latoregular,sans-serif] text-[2rem] hover:bg-gray-200">@lang('lang.vac_vacancy3')</button>
                        <div class="panel overflow-hidden hidden px-8 bg-white">
                            <div class="text-gray-600">
                                <div class="text-base">
                                    <h1 class="font-semibold">@lang('lang.vac_require')</h1>
                                    <li class="my-2"> Амбициозные и интересные задачи;</li>
                                    <li class="my-2"> Конкурентоспособная «белая» заработная плата;</li>
                                    <li class="my-2"> Возможность внести свои инициативы и увидеть результат своей работы;</li>
                                    <li class="my-2"> Адекватное руководство, компетентный коллектив, низкий уровень бюрократии;</li>
                                    <li class="my-2">  Оформление по ТК РФ;</li>
                                    <li class="my-2"> Полная занятость, полный день;</li>
                                    <li class="my-2"> Гибкий график работы: время начала с 8:00 до 12:00 и окончания с 17:00 до 21:00 соответственно, перерыв на обед — один час;</li>
                                    <li class="my-2"> Возможность работать как в офисе (офис находится в 7 — 10 минутах пешком от метро Фрунзенская / Парк Культуры), так и удаленно из дома;</li>
                                    <li class="my-2"> Современная техника — компьютеры с 32Gb оперативной памяти, SSD, два монитора;</li>
                                    <li class="my-2"> Корпоративные мероприятия;</li>
                                    <li class="my-2"> Оплачиваемое участие в профильных конференциях.</li>
                                </div>
                                <a
                                    href="mailto:e.kiselev@user.ru?subject=%D0%92%D0%B0%D0%BA%D0%B0%D0%BD%D1%81%D0%B8%D1%8F%20-%20%D0%92%D0%B5%D0%B4%D1%83%D1%89%D0%B8%D0%B9%20%D0%BC%D0%B5%D0%BD%D0%B5%D0%B4%D0%B6%D0%B5%D1%80%20%D0%BF%D0%BE%20%D0%B4%D0%B8%D1%80%D0%B5%D0%BA%D1%82-%D0%BC%D0%B0%D1%80%D0%BA%D0%B5%D1%82%D0%B8%D0%BD%D0%B3%D1%83"
                                    type="button"
                                    target="_self"
                                    class="bg-green-500 hover:bg-green-500 text-white py-3 px-6 rounded-md text-[18px] my-4">
                                    @lang('lang.vac_reply')
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
