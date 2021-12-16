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
                    <a class="text-blue-500 hover:text-red-500 text-[15px] leading-[1.8rem]" href="/reviews">Отзывы исполнителей</a>
                </li>
                <li>
                    <a class="text-black font-semibold text-[15px] leading-[1.8rem]" href="/">Отзывы заказчиков</a>
                </li>
                <li>
                    <a class="text-blue-500 hover:text-red-500 text-[15px] leading-[1.8rem]" href="">СМИ о нас</a>
                </li>
                <li class="mt-5">
                    <a class="text-blue-500 hover:text-red-500 text-[15px] leading-[1.8rem]" href="">Реклама на сервисе</a>
                </li>
                <li>
                    <a class="text-blue-500 hover:text-red-500 text-[15px] leading-[1.8rem]" href="/contacts">Контакты</a>
                </li>
                <li>
                    <a class="text-blue-500 hover:text-red-500 text-[15px] leading-[1.8rem]" href="">Вакансии</a>
                </li>
            </ul>
        </div>
        <div class="md:w-8/12 mt-8">
            <h1 class="text-[1.5rem] md:text-[1.8rem] lg:text-[2rem] pb-2 font-semibold">
                Отзывы заказчиков о YouDo
            </h1>
            <p class="pb-5 md:text-[14.7px] leading-[1.4rem]">Ежедневно на просторах интернета мы встречаем десятки отзывов наших пользователей о YouDo. Самые яркие и эмоциональные из них собираются на этой странице. Рады поделиться ими с вами!</p>
            <ul class="pt-[20px]">
                <li class="border border-solid border-[2px] rounded-[5px]">
                    <div class="px-[15px] py-[20px]">
                        <a href="/u1053628" target="_blank" rel="noreferrer noopener" class="block float-left align-top w-[40px] h-[40px] overflow-hidden rounded-[4px] shadow-lg border-b-0 ">
                            <img class="rounded-full" src="https://scontent.ftas3-2.fna.fbcdn.net/v/t1.6435-1/cp0/p50x50/64781175_2307123356023656_8909452215765172224_n.jpg?_nc_cat=101&ccb=1-5&_nc_sid=dbb9e7&_nc_ohc=klwahSm_3gMAX_tofan&_nc_ht=scontent.ftas3-2.fna&edm=AN6CN6oEAAAA&oh=00_AT_c80hQdKhYzNueJG2g3yjwbp7xY7zzZQVH117yRHW74g&oe=61E00AC8">
                        </a>
                        <div class="align-top ml-[50px] min-h-[42px]">
                                <span>
                                    <a href="/u1053628" target="_blank" rel="noreferrer noopener" class="font-semibold ">Ольга Ивенская</a>
                                </span>
                            <div class="text-[.9rem] -mt-2 text-[rgba(78,78,78,.5)]">
                                    <span class="align-middle">
                                        <a href="#">около 2 лет назад</a>
                                    </span>
                            </div>
                        </div>
                        <div>
                            Пользуюсь Youdo время от времени, полезная штука. Вчера курьер доставил посылочку к поезду. Весной опытная медсестра наложила полимерный бинт на сломанную ногу. И уборку там заказываю - качественно и недорого. В общем, рекомендую.
                        </div>
                        <div class="w-full h-auto py-4">
                            <img src="https://external.ftas3-1.fna.fbcdn.net/safe_image.php?d=AQE6EVXDDxMMJipo&w=540&h=282&url=http%3A%2F%2Fyoudo.com%2FStatic%2FFBWall_2018_2.jpg&cfs=1&upscale=1&fallback=news_d_placeholder_publisher&ext=emg0&_nc_oe=6f37e&_nc_sid=06c271&ccb=3-5&_nc_hash=AQHUUpFCB2oK2EA7" alt="">
                        </div>
                    </div>
                </li>
            </ul>
            <a href="/tasks" class="inline-block mt-7 border-0 outline-0 text-center whitespace-nowrap min-w-[100px] rounded-[8px] text-[2rem] h-[3.5rem] text-white px-[23px] bg-[linear-gradient(180deg,#5dbeff,#4096ef)] hover:bg-[linear-gradient(180deg,#a2d8fc,#6eaff1)">Создать задание</a>
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
