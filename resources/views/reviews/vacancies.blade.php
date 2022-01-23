@extends('layouts.app')


@section('content')
    <div class="md:container mx-auto pt-5 mt-[30px]">
        <div class="w-full px-12 md:flex md:grid-flow-row md:justify-center md:mx-auto md:max-w-[1300px] mb-4">
            <div class="lg:w-2/12 h-auto mt-5">
                <ul>
                    <li>
                        <a class="text-blue-500 hover:text-red-500 text-[15px] leading-[1.8rem]" href="/geotaskshint">@lang('lang.review_howItWorks')</a>
                    </li>
                    <li>
                        <a class="text-blue-500 hover:text-red-500 text-[15px] leading-[1.8rem]" href="/security">@lang('lang.review_security')</a>
                    </li>
                    <li>
                        <a class="text-blue-500 hover:text-red-500 text-[15px] leading-[1.8rem]" href="/badges">@lang('lang.review_rewards')</a>
                    </li>
                    <li class="mt-5">
                        <a class="text-blue-500 hover:text-red-500 text-[15px] leading-[1.8rem]" href="/reviews">@lang('lang.review_PerFeed')</a>
                    </li>
                    <li>
                        <a class="text-blue-500 hover:text-red-500 text-[15px] leading-[1.8rem]" href="/author-reviews">@lang('lang.review_CusFeed')</a>
                    </li>
                    <li>
                        <a class="text-blue-500 hover:text-red-500 text-[15px] leading-[1.8rem]" href="/press">@lang('lang.review_aboutUs')</a>
                    </li>
                    <li class="mt-5">
                        <a class="text-blue-500 hover:text-red-500 text-[15px] leading-[1.8rem]" href="">@lang('lang.review_addsInServ')</a>
                    </li>
                    <li>
                        <a class="text-blue-500 hover:text-red-500 text-[15px] leading-[1.8rem]" href="/contacts">@lang('lang.review_contacts')</a>
                    </li>
                    <li>
                        <a class="text-black font-semibold text-[15px] leading-[1.8rem]" href="/vacancies">@lang('lang.review_vacancy')</a>
                    </li>
                </ul>
                <a href class="bg-[url('{{asset('images/shield.svg')}}')] bg-no-repeat"></a>
                <a href="/verification" class="w-[200px] px-[16px] pb-[15px] block rounded-[8px] shadow-xl hover:shadow-md text-[12px] leading-[16px] tracking-[.2px] text-[#444] mt-5 text-center mb-8">
                    <img src="{{asset('images/shield.svg')}}" class="mx-auto pb-3" alt="">
                    @lang('lang.review_bePerformer')
                </a>
            </div>
            <div class="md:w-9/12 md:mt-2 md:pl-12">
                <h1 class="text-[1.9rem] font-semibold ">
                @lang('lang.review_vacancy')
                </h1>
                <img src="https://www.roi-selling.com/hs-fs/hub/444749/file-1929610769-jpg/blog-files/team-.jpg" alt="" class="my-4">
                <h1 class="text-[1.6rem] font-semibold my-4">@lang('lang.vac_whoWeAre')</h1>
                <p class="my-5">@lang('lang.vac_about1')</p>
                <p class="my-5">@lang('lang.vac_about2')</p>
                <p class="my-5">@lang('lang.vac_about3')</p>
                <p class="my-5">@lang('lang.vac_about4')</p>
                <p class="my-5">@lang('lang.vac_about5')</p>
                <p class="my-5">@lang('lang.vac_about6')</p>
                <h1 class="text-[1.9rem] font-semibold ">
                @lang('lang.vac_whatWeOffer')
                </h1>
                <div class="ml-8 my-3">
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
                        <button class="rounded-md accordion text-[#444] cursor-pointer p-[18px] w-full text-left text-[15px] outline-none transition duration-400 italic font-[latoregular,sans-serif] text-[2rem] hover:bg-gray-200">@lang('lang.vac_vacancy1')</button>
                        <div class="panel overflow-hidden hidden px-[18px] bg-white p-4">
                            <div class="text-[#7f7f7f]">
                                <div>
                                    <h1 class="font-semibold text-[20px]">@lang('lang.vac_require')</h1>
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
                                    href="mailto:e.kiselev@user.ru?subject=%D0%92%D0%B0%D0%BA%D0%B0%D0%BD%D1%81%D0%B8%D1%8F%20-%20%D0%92%D0%B5%D0%B4%D1%83%D1%89%D0%B8%D0%B9%20%D0%BC%D0%B5%D0%BD%D0%B5%D0%B4%D0%B6%D0%B5%D1%80%20%D0%BF%D0%BE%20%D0%B4%D0%B8%D1%80%D0%B5%D0%BA%D1%82-%D0%BC%D0%B0%D1%80%D0%BA%D0%B5%D1%82%D0%B8%D0%BD%D0%B3%D1%83"
                                    type="button"
                                    target="_self"
                                    class="bg-green-500 hover:bg-[#5ab82e] text-white py-3 px-6 rounded-md text-[18px] my-4">
                                    @lang('lang.vac_reply')
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="mb-4 rounded-md border shadow-md">
                        <button class="rounded-md accordion text-[#444] cursor-pointer p-[18px] w-full text-left text-[15px] outline-none transition duration-400 italic font-[latoregular,sans-serif] text-[2rem] hover:bg-gray-200">@lang('lang.vac_vacancy2')</button>
                        <div class="panel overflow-hidden hidden px-[18px] bg-white">
                            <div class="text-[#7f7f7f]">
                                <div>
                                    <h1 class="font-semibold text-[20px]">@lang('lang.vac_require')</h1>
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
                                    href="mailto:e.kiselev@user.ru?subject=%D0%92%D0%B0%D0%BA%D0%B0%D0%BD%D1%81%D0%B8%D1%8F%20-%20%D0%92%D0%B5%D0%B4%D1%83%D1%89%D0%B8%D0%B9%20%D0%BC%D0%B5%D0%BD%D0%B5%D0%B4%D0%B6%D0%B5%D1%80%20%D0%BF%D0%BE%20%D0%B4%D0%B8%D1%80%D0%B5%D0%BA%D1%82-%D0%BC%D0%B0%D1%80%D0%BA%D0%B5%D1%82%D0%B8%D0%BD%D0%B3%D1%83"
                                    type="button"
                                    target="_self"
                                    class="bg-green-500 hover:bg-[#5ab82e] text-white py-3 px-6 rounded-md text-[18px] my-4">
                                    @lang('lang.vac_reply')
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="mb-4 rounded-md border shadow-md">
                        <button class="rounded-md accordion text-[#444] cursor-pointer p-[18px] w-full text-left text-[15px] outline-none transition duration-400 italic font-[latoregular,sans-serif] text-[2rem] hover:bg-gray-200">@lang('lang.vac_vacancy3')</button>
                        <div class="panel overflow-hidden hidden px-[18px] bg-white">
                            <div class="text-[#7f7f7f]">
                                <div>
                                    <h1 class="font-semibold text-[20px]">@lang('lang.vac_require')</h1>
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
                                    href="mailto:e.kiselev@user.ru?subject=%D0%92%D0%B0%D0%BA%D0%B0%D0%BD%D1%81%D0%B8%D1%8F%20-%20%D0%92%D0%B5%D0%B4%D1%83%D1%89%D0%B8%D0%B9%20%D0%BC%D0%B5%D0%BD%D0%B5%D0%B4%D0%B6%D0%B5%D1%80%20%D0%BF%D0%BE%20%D0%B4%D0%B8%D1%80%D0%B5%D0%BA%D1%82-%D0%BC%D0%B0%D1%80%D0%BA%D0%B5%D1%82%D0%B8%D0%BD%D0%B3%D1%83"
                                    type="button"
                                    target="_self"
                                    class="bg-green-500 hover:bg-[#5ab82e] text-white py-3 px-6 rounded-md text-[18px] my-4">
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
