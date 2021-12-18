@extends('layouts.app')


@section('content')
    <div class="md:container mx-auto pt-5">
        <div class="w-full px-12 md:flex md:grid-flow-row md:justify-center md:mx-auto md:max-w-[1000px] pb-[130px]">
            <div class="md:w-3/12 h-auto md:mt-12 lg:mt-5 border-b md:border-0 md:mr-8">
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
                        <a class="text-black font-semibold text-[15px] leading-[1.8rem]" href="/rewievs">Отзывы исполнителей</a>
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
                        <a class="text-blue-500 hover:text-red-500 text-[15px] leading-[1.8rem]" href="/vacancies">Вакансии</a>
                    </li>
                </ul>
                <a href class="bg-[url('https://assets.youdo.com/_next/static/media/shield-only.db76e917d01c0a73d98962ea064216a4.svg')] bg-no-repeat"></a>
                <a href="/verification" class="w-[200px] px-[16px] pb-[15px] block rounded-[8px] shadow-xl hover:shadow-md text-[12px] leading-[16px] tracking-[.2px] text-[#444] mt-5 text-center">
                    <img src="https://assets.youdo.com/_next/static/media/shield-only.db76e917d01c0a73d98962ea064216a4.svg" class="mx-auto pb-3" alt="">
                    Станьте исполнителем Юду. И начните зарабатывать.
                </a>
            </div>
            <div class="md:w-8/12 mt-8">
                <h1 class="text-[1.5rem] md:text-[1.8rem] lg:text-[2rem] pb-2 font-semibold">
                    Отзывы исполнителей о YouDo
                </h1>
                <p class="pb-5 text-[14.7px] leading-[1.4rem]">Тысячи исполнителей уже получили возможность зарабатывать на YouDo тогда, когда им удобно, выполняя только ту работу, которая им нравится. Нам очень приятно читать отзывы, которые они оставляют о работе сервиса. Именно благодаря им YouDo с каждым днем становится лучше.</p>
                <p class="pb-5 md:text-[14.7px] leading-[1.4rem]">Мы рады, что каждый из исполнителей присоединился к сервису, и гордимся командой наших проверенных пользователей. А их отзывы о нашей работе доказывают, что мы делаем действительно полезный и необходимый для многих продукт.</p>
                <ul class="pt-[20px]">
                    <li class="">
                        <a href="/u1053628" target="_blank" rel="noreferrer noopener" class="block float-left align-top w-[40px] h-[40px] overflow-hidden rounded-[4px] shadow-lg border-b-0 ">
                            <img class="UsersReviews_picture__aB22p" src="//avatar.youdo.com/get.userAvatar?AvatarId=58921&amp;AvatarType=H44W44">
                        </a>
                        <div class="align-top ml-[50px] min-h-[42px]">
                            <span>
                                <a href="/u1053628" target="_blank" rel="noreferrer noopener" class="text-[#0091e6] ">Сергей С.</a>
                            </span>
                            <div class="text-[.9rem] text-[rgba(78,78,78,.5)]">
                                <span class="align-middle">
                                    Выполнил
                                    <!-- -->
                                    <!-- -->341 задание
                                    <!-- -->. Средняя оценка:
                                    <!-- -->5
                                </span>
                                <div class="inline-block align-middle w-[80px] h-[16px] bg-[url('https://assets.youdo.com/_next/static/media/star-yellow-light.060905faef303b513812a0dd81ab6876.svg')] bg-[length:16px_16px] relative">
                                    <div class="w-[100%] block h-[16px] absolute top-0 left-0 bg-[url('https://assets.youdo.com/_next/static/media/star-yellow.fa0c2503fe45dd35115966cd963633ea.svg')]  bg-[length:16px_16px]"></div>
                                </div>
                            </div>
                        </div>
                        <div class="p-[20px] mt-[12px] mr-0 mb-[35px] bg-[#f5f5fa] shadow-[-1px_1px_2px] shadow-[#dcdcdc] rounded-[10px] relative text-[#4e4e4e] text-[14.7px] leading-[1.1rem] before:content-[''] before:w-0 before:h-0 before:absolute before:top-[-11px] before:left-[-9px] before:z-[2] before:rotate-[-45deg before:border-transparent border-b-[#f5f5f5] border-solid">
                            Разные задания&nbsp;— это очень интересно! Главное, есть куда расти в&nbsp;плане навыков. Чувствуешь свою значимость, но&nbsp;не&nbsp;боишься испачкаться.
                        </div>
                    </li>
                    <li class="">
                        <a href="/u1053628" target="_blank" rel="noreferrer noopener" class="block float-left align-top w-[40px] h-[40px] overflow-hidden rounded-[4px] shadow-lg border-b-0 ">
                            <img class="UsersReviews_picture__aB22p" src="//avatar.youdo.com/get.userAvatar?AvatarId=58921&amp;AvatarType=H44W44">
                        </a>
                        <div class="align-top ml-[50px] min-h-[42px]">
                            <span>
                                <a href="/u1053628" target="_blank" rel="noreferrer noopener" class="text-[#0091e6] ">Сергей С.</a>
                            </span>
                            <div class="text-[.9rem] text-[rgba(78,78,78,.5)]">
                                <span class="align-middle">
                                    Выполнил
                                    <!-- -->
                                    <!-- -->341 задание
                                    <!-- -->. Средняя оценка:
                                    <!-- -->5
                                </span>
                                <div class="inline-block align-middle w-[80px] h-[16px] bg-[url('https://assets.youdo.com/_next/static/media/star-yellow-light.060905faef303b513812a0dd81ab6876.svg')] bg-[length:16px_16px] relative">
                                    <div class="w-[100%] block h-[16px] absolute top-0 left-0 bg-[url('https://assets.youdo.com/_next/static/media/star-yellow.fa0c2503fe45dd35115966cd963633ea.svg')]  bg-[length:16px_16px]"></div>
                                </div>
                            </div>
                        </div>
                        <div class="p-[20px] mt-[12px] mr-0 mb-[35px] bg-[#f5f5fa] shadow-[-1px_1px_2px] shadow-[#dcdcdc] rounded-[10px] relative text-[#4e4e4e] text-[14.7px] leading-[1.1rem] before:content-[''] before:w-0 before:h-0 before:absolute before:top-[-11px] before:left-[-9px] before:z-[2] before:rotate-[-45deg before:border-transparent border-b-[#f5f5f5] border-solid">
                            Разные задания&nbsp;— это очень интересно! Главное, есть куда расти в&nbsp;плане навыков. Чувствуешь свою значимость, но&nbsp;не&nbsp;боишься испачкаться.
                        </div>
                    </li>
                    <li class="">
                        <a href="/u1053628" target="_blank" rel="noreferrer noopener" class="block float-left align-top w-[40px] h-[40px] overflow-hidden rounded-[4px] shadow-lg border-b-0 ">
                            <img class="UsersReviews_picture__aB22p" src="//avatar.youdo.com/get.userAvatar?AvatarId=58921&amp;AvatarType=H44W44">
                        </a>
                        <div class="align-top ml-[50px] min-h-[42px]">
                            <span>
                                <a href="/u1053628" target="_blank" rel="noreferrer noopener" class="text-[#0091e6] ">Сергей С.</a>
                            </span>
                            <div class="text-[.9rem] text-[rgba(78,78,78,.5)]">
                                <span class="align-middle">
                                    Выполнил
                                    <!-- -->
                                    <!-- -->341 задание
                                    <!-- -->. Средняя оценка:
                                    <!-- -->5
                                </span>
                                <div class="inline-block align-middle w-[80px] h-[16px] bg-[url('https://assets.youdo.com/_next/static/media/star-yellow-light.060905faef303b513812a0dd81ab6876.svg')] bg-[length:16px_16px] relative">
                                    <div class="w-[100%] block h-[16px] absolute top-0 left-0 bg-[url('https://assets.youdo.com/_next/static/media/star-yellow.fa0c2503fe45dd35115966cd963633ea.svg')]  bg-[length:16px_16px]"></div>
                                </div>
                            </div>
                        </div>
                        <div class="p-[20px] mt-[12px] mr-0 mb-[35px] bg-[#f5f5fa] shadow-[-1px_1px_2px] shadow-[#dcdcdc] rounded-[10px] relative text-[#4e4e4e] text-[14.7px] leading-[1.1rem] before:content-[''] before:w-0 before:h-0 before:absolute before:top-[-11px] before:left-[-9px] before:z-[2] before:rotate-[-45deg before:border-transparent border-b-[#f5f5f5] border-solid">
                            Разные задания&nbsp;— это очень интересно! Главное, есть куда расти в&nbsp;плане навыков. Чувствуешь свою значимость, но&nbsp;не&nbsp;боишься испачкаться.
                        </div>
                    </li>
                    <li class="">
                        <a href="/u1053628" target="_blank" rel="noreferrer noopener" class="block float-left align-top w-[40px] h-[40px] overflow-hidden rounded-[4px] shadow-lg border-b-0 ">
                            <img class="UsersReviews_picture__aB22p" src="//avatar.youdo.com/get.userAvatar?AvatarId=58921&amp;AvatarType=H44W44">
                        </a>
                        <div class="align-top ml-[50px] min-h-[42px]">
                            <span>
                                <a href="/u1053628" target="_blank" rel="noreferrer noopener" class="text-[#0091e6] ">Сергей С.</a>
                            </span>
                            <div class="text-[.9rem] text-[rgba(78,78,78,.5)]">
                                <span class="align-middle">
                                    Выполнил
                                    <!-- -->
                                    <!-- -->341 задание
                                    <!-- -->. Средняя оценка:
                                    <!-- -->5
                                </span>
                                <div class="inline-block align-middle w-[80px] h-[16px] bg-[url('https://assets.youdo.com/_next/static/media/star-yellow-light.060905faef303b513812a0dd81ab6876.svg')] bg-[length:16px_16px] relative">
                                    <div class="w-[100%] block h-[16px] absolute top-0 left-0 bg-[url('https://assets.youdo.com/_next/static/media/star-yellow.fa0c2503fe45dd35115966cd963633ea.svg')]  bg-[length:16px_16px]"></div>
                                </div>
                            </div>
                        </div>
                        <div class="p-[20px] mt-[12px] mr-0 mb-[35px] bg-[#f5f5fa] shadow-[-1px_1px_2px] shadow-[#dcdcdc] rounded-[10px] relative text-[#4e4e4e] text-[14.7px] leading-[1.1rem] before:content-[''] before:w-0 before:h-0 before:absolute before:top-[-11px] before:left-[-9px] before:z-[2] before:rotate-[-45deg before:border-transparent border-b-[#f5f5f5] border-solid">
                            Разные задания&nbsp;— это очень интересно! Главное, есть куда расти в&nbsp;плане навыков. Чувствуешь свою значимость, но&nbsp;не&nbsp;боишься испачкаться.
                        </div>
                    </li>
                </ul>
                <a href="/tasks" class="inline-block mt-7 border-0 outline-0 text-center whitespace-nowrap min-w-[100px] rounded-[8px] text-[2rem] h-[3.5rem] text-white px-[23px] bg-[linear-gradient(180deg,#5dbeff,#4096ef)] hover:bg-[linear-gradient(180deg,#a2d8fc,#6eaff1)]">Создать задание</a>
            </div>
        </div>
    </div>



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