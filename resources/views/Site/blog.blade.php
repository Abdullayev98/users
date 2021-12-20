<!DOCTYPE html>
<html lang="{{setting('language','en')}}" dir="ltr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Самые необычные задания ноября</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="{{$app_logo ?? ''}}" />
    <link rel="stylesheet" href="{{asset('vendor/fontawesome-free/css/all.min.css')}}">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,600" rel="stylesheet">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('dist/css/adminlte.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/styles.min.css')}}">
    <script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('js/jquery/jquery.min.js')}}"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment-with-locales.min.js" integrity="sha512-LGXaggshOkD/at6PFNcp2V2unf9LzFq6LE+sChH7ceMTDP0g2kn6Vxwgg7wkPP7AAtX+lmPqPdxB47A0Nz0cMQ==" crossorigin="anonymous"></script>
    <script type="text/javascript" src="{{ URL::asset('js/sizzle.min.js') }}"></script>
</head>
<!--
<style>
    body {
        height: 1000px;
    }

    .container {
        position: fixed;
        top: 0;
        left: 0;
        z-index: 999;
        width: 100%;
        height: 23px;
    }

    #expand {
        background: tomato;
        min-height: 10px;
        max-height:10px;
        min-width: 10%;
        position: absolute;
        will-change: width;
    }
</style>
-->

<body>
<!--

<div class="container">
<div id="expand"></div>
</div>
-->
@foreach($blog as $block)
<div id="header" class="bg-[url('{{asset($block->img)}}')] bg-cover bg-center h-screen">
    <div class="bg-[rgba(0,0,0,.4)] h-screen">
        <div class="md:w-[250px] mx-auto py-5">
            <a href="/">
                <img src="{{asset('/images/logo.png')}}" alt="" />
            </a>
        </div>
        <div class="w-full text-center text-white">
            <div class="md:mt-24 text-[24px] font-bold text-[orange]">
                <!-- ВЫПУСК 62 -->
            </div>
            <div class="py-12 xl:text-[72px] md:text-[44px] text-[34px] font-bold xl:w-[1100px] mx-auto">
                {{$block->title}}
            </div>
            <div class="xl:w-[700px] mx-auto font-['Ubuntu'] md:text-[24px] md:text-[24px] text-[18px]">
                {{$block->text}}
            </div>
            <div class="w-[50px] mx-auto py-8 animate-bounce">
                <a href="#blog">
                    <svg class="t-cover__arrow-svg fill-white" x="0px" y="0px" width="38.417px" height="18.592px" viewBox="0 0 38.417 18.592" style="enable-background:new 0 0 38.417 18.592;">
                        <g>
                            <path d="M19.208,18.592c-0.241,0-0.483-0.087-0.673-0.261L0.327,1.74c-0.408-0.372-0.438-1.004-0.066-1.413c0.372-0.409,1.004-0.439,1.413-0.066L19.208,16.24L36.743,0.261c0.411-0.372,1.042-0.342,1.413,0.066c0.372,0.408,0.343,1.041-0.065,1.413L19.881,18.332C19.691,18.505,19.449,18.592,19.208,18.592z"></path>
                        </g>
                    </svg>
                </a>
            </div>
        </div>
    </div>
</div>

<div class="h-[370px]" id="blog">
    <div class="xl:max-w-[900px] mx-auto py-14">
        <div class="md:w-[300px] w-[200px] h-[300px] bg-cover bg-center bg-[url('https://static.tildacdn.com/tild3261-6438-4463-b165-383633636531/1.gif')] float-left mr-8">

        </div>
        <div class="py-8 xl:w-[800px]">
            <a href="#" class="text-[#ffa200] text-[24px] md:text-[32px] font-bold">Съесть много фастфуда</a>
            <p class="text-[16px] md:text-[18px] py-4 font-[400] leading-[1.55] font-['Ubuntu',Arial,sans-serif]">Тоже считаете, что можете бесконечно есть бургеры с картошечкой? Тогда вот шанс стать звездой YouTube и заработать!</p>
            <a href="#" class="text-[18px] text-[#ffa200] font-[400] font-['Ubuntu',Arial,sans-serif] ">Смотреть →</a>
        </div>
    </div>
</div>
<div class="h-[370px]">
    <div class="xl:max-w-[900px] mx-auto py-14">
        <div class="md:w-[300px] w-[200px] h-[300px] bg-cover bg-center bg-[url('https://static.tildacdn.com/tild3362-3737-4539-b139-386661366138/2.gif')] float-left mr-8">

        </div>
        <div class="py-8 xl:w-[800px]">
            <a href="#" class="text-[#ffa200] text-[32px] font-bold">Прогнать крысу из-под кресла</a>
            <p class="text-[18px] py-4 font-[400] leading-[1.55] font-['Ubuntu',Arial,sans-serif]">В московской квартире — крыса Шрёдингера. Нужен смельчак, который прогонит хвостатого непрошеного гостя.</p>
            <a href="#" class="text-[18px] text-[#ffa200] font-[400] font-['Ubuntu',Arial,sans-serif] ">Смотреть →</a>
        </div>
    </div>
</div>
<div class="h-[370px]">
    <div class="xl:max-w-[900px] mx-auto py-14">
        <div class="md:w-[300px] w-[200px] h-[300px] bg-cover bg-center bg-[url('https://static.tildacdn.com/tild3430-3931-4630-b265-386133663265/3.gif')] float-left mr-8">

        </div>
        <div class="py-8 xl:w-[800px]">
            <a href="#" class="text-[#ffa200] text-[32px] font-bold">Поехать в Испанию с бабушкой</a>
            <p class="text-[18px] py-4 font-[400] leading-[1.55] font-['Ubuntu',Arial,sans-serif]">Нескучный отдых на берегу моря рядом с боевой бабушкой, изучавшей ядерную физику и поющей в хоре.</p>
            <a href="#" class="text-[18px] text-[#ffa200] font-[400] font-['Ubuntu',Arial,sans-serif] ">Смотреть →</a>
        </div>
    </div>
</div>
<div class="h-[370px]">
    <div class="xl:max-w-[900px] mx-auto py-14">
        <div class="md:w-[300px] w-[200px] h-[300px] bg-cover bg-center bg-[url('https://static.tildacdn.com/tild3533-6131-4830-b666-613933633830/4.gif')] float-left mr-8">

        </div>
        <div class="py-8 xl:w-[800px]">
            <a href="#" class="text-[#ffa200] text-[32px] font-bold">Украсть Рождество</a>
            <p class="text-[18px] py-4 font-[400] leading-[1.55] font-['Ubuntu',Arial,sans-serif]">Разыскивается зелёный, но добрый похититель Рождества, который не будет разбивать детские сердечки, а вдохновит их перед праздниками.</p>
            <a href="#" class="text-[18px] text-[#ffa200] font-[400] font-['Ubuntu',Arial,sans-serif] ">Смотреть →</a>
        </div>
    </div>
</div>
<div class="h-[370px]">
    <div class="xl:max-w-[900px] mx-auto py-14">
        <div class="md:w-[300px] w-[200px] h-[300px] bg-cover bg-center bg-[url('https://static.tildacdn.com/tild3536-3539-4336-a431-393635353336/5.gif')] float-left mr-8">

        </div>
        <div class="py-8 xl:w-[800px]">
            <a href="#" class="text-[#ffa200] text-[32px] font-bold">Построить баню в Бразилии</a>
            <p class="text-[18px] py-4 font-[400] leading-[1.55] font-['Ubuntu',Arial,sans-serif]">Специалисты по строительству бань ликуют: нашелся заказчик за рубежом. Ola, Бразилия!</p>
            <a href="#" class="text-[18px] text-[#ffa200] font-[400] font-['Ubuntu',Arial,sans-serif] ">Смотреть →</a>
        </div>
    </div>
</div>

<div class="bg-[#fff8f0]">
    <div class="my-4">
        <div class="max-w-[500px] mx-auto pt-14">
            <h1 class="text-[#ffa200] text-[32px] font-bold text-center ">
                Голосуем за лучшее задание
            </h1>
        </div>
        <div class="text-center text-[18px] md:w-[520px] mx-auto my-4">
            Какое из заданий ноября удивило больше всего? Голосуйте за своего фаворита.
        </div>
        <div class="md:w-[600px] mx-auto">
            <div class="text-center text-[26px] font-bold my-4">
                Лучшее задание:
            </div>
            <div>
                <div class="mt-4">
                    <label class="cursor-pointer text-[18px]"> &nbsp; <input type="radio" name="#" class="my-5 border-[#ffa200]">&nbsp;Съесть много фастфуда 🍔</label><br />
                    <label class="cursor-pointer text-[18px]">&nbsp; <input type="radio" name="#" class="my-5 border-[#ffa200]">&nbsp;Прогнать 🐭 из-под кресла </label><br />
                    <label class="cursor-pointer text-[18px]"> &nbsp; <input type="radio" name="#" class="my-5 border-[#ffa200]">&nbsp;Поехать в Испанию с бабушкой 👵</label><br />
                    <label class="cursor-pointer text-[18px]">&nbsp; <input type="radio" name="#" class="my-5 border-[#ffa200]">&nbsp;Украсть Рождество 🎄</label><br />
                    <label class="cursor-pointer text-[18px]">&nbsp; <input type="radio" name="#" class="my-5 border-[#ffa200]">&nbsp;Построить баню в Бразилии ✈️</label><br />
                </div>
            </div>
            <div class="py-8 text-center">
                <a type="button" href="#contact" class="text-white text-[18px] leading-[1.55] font-[500] bg-center border-transparent bg-[#ffa200] rounded-[30px] py-3 px-8">Выбрать задание</a>
            </div>
        </div>
    </div>
</div>

<div class="w-[300px] mx-auto py-16">
    <div class="bg-white mx-auto">
        <div class="text-[24px]">
            Оцените подборку ноября
        </div>
        <div class="ml-10 my-5">
            <div class="float-left mr-4">
                <img src="https://thumb.tildacdn.com/tild6130-3965-4463-a332-343937336430/-/resize/80x/-/format/webp/Heart_Eyes_Emoji_2.png" class="w-[60px] " alt="">
            </div>
            <div class="float-left mr-4">
                <img src="https://thumb.tildacdn.com/tild3564-3630-4239-a563-323339636564/-/resize/80x/-/format/webp/Slightly_Smiling_Emo.png" class="w-[60px] " alt="">
            </div>
            <div class="float-left">
                <img src="https://thumb.tildacdn.com/tild3332-6264-4837-a139-396264613932/-/resize/80x/-/format/webp/Emoji_Icon__unamused.png" class="w-[60px] " alt="">
            </div>
        </div>
    </div>
</div>

<div class="bg-[#fff8f0] my-16">
    <div class="py-24 text-center">
        <div class="text-[36px] font-bold">
            Понравилась подборка?
        </div>
        <div class="text-[20px] xl:w-[800px] mx-auto my-4">
            Подпишитесь на рассылку нашего блога. Присылаем свежие истории, видео, анонсы спецпроектов или полезные подборки.
        </div>
        <div class="xl:w-[800px] mx-auto">
            <table>
                <input type="text" class="bg-[#f5f5f5] outline-none rounded-[20px] my-4 py-3 px-5 w-8/12 border border-[#ffa200] inline mr-2" />
                <button type="submit" class="text-white text-[18px] leading-[1.55] font-[500] bg-center border-transparent bg-[#ffa200] rounded-[30px] py-3 px-8">Подписаться</button>
            </table>
        </div>
    </div>
</div>

<div class="my-20 lg:max-w-[1300px] md:max-w-[900px] max-w-[600px] mx-auto">
    <div class="text-center my-8 text-[36px] font-bold">
        Не уходите, почитайте еще
    </div>
    <div class="lg:w-[900px] md:w-[800px] xl:w-[1300px] mx-auto md:flex">
      @foreach($last3 as $last)
        <a href="" class="lg:w-[400px] md:w-[200px] ml-16 lg:m-0">
            <img src="{{asset($last->img)}}" alt=""class="lg:w-[300px] w-[650px]">
            <p class="text-gray-500 text-[14px] my-2">
                Истории
            </p>
            <div class="text-[16px] md:text-[24px] font-semibold">
                {{$last->title}}
            </div>
        </a>
        @endforeach
        <!-- <a href="" class="lg:w-[400px] md:w-[200px] mx-12">
            <img src="https://thumb.tildacdn.com/tild6461-3931-4432-b061-633531636334/-/cover/720x468/center/center/-/format/webp/Frame_93.png" alt=""class=" lg:w-[300px] w-[650px]">
            <p class="text-gray-500 text-[14px] my-2">
                Подборки
            </p>
            <div class="text-[16px] md:text-[24px] font-semibold">
                Очень странные дела на YouDo
            </div>
        </a>
        <a href="" class="lg:w-[400px] md:w-[200px]">
            <img src="https://thumb.tildacdn.com/tild6164-3730-4831-a239-303363363038/-/cover/720x468/center/center/-/format/webp/DSCF3327.JPG" alt="" class=" lg:w-[300px] w-[650px]">
            <p class="text-gray-500 text-[14px] my-2">
                Советы
            </p>
            <div class="text-[16px] md:text-[24px] font-semibold">
                Как актерское <br> мастерство помогает в жизни
            </div>
        </a> -->
    </div>
</div>

<div class="bg-[#fff8f0] my-16">
    <div class="text-center py-16">
        <div class="text-[36px] font-bold">
            Понравилась подборка?
        </div>
        <div class="text-[20px] md:w-[800px] mx-auto my-4">
            Скачайте приложение YouDo и создайте своё задание уже сегодня
        </div>
        <div class="mb-5 md:float-left lg:float-none md:w-6/16 mx-auto">
                <span class="">
                    <a class="md:mr-2 rounded-md md:inline-block lg:inline-block xl:inline-block" rel="noopener noreferrer" href="https://app.appsflyer.com/id560999571?pid=coldunshik&amp;c=youdo" target="_blank">
                        <button type="button" class="w-[200px] bg-[#000] rounded-md mt-8">
                            <img src="https://assets.youdo.com/_next/static/media/ios.d3a42dd0816a046400b4bb7d2b11067f.svg" alt="" class="w-[200px]">
                        </button>
                    </a>
                    <a class="md:mr-2 rounded-md md:inline-block md:px-3" rel="noopener noreferrer" href="http://app.appsflyer.com/com.sebbia.youdo?pid=coldunshik&amp;c=youdo" target="_blank">
                        <button type="button" class="w-[200px] bg-[#000] rounded-md mt-8">
                            <img src="https://assets.youdo.com/_next/static/media/android.1234ba9391753eeb525d4f71a808329e.svg" alt="" class="w-[200px]">
                        </button>
                    </a>
                </span>
        </div>
    </div>
</div>
@endforeach
<footer class="bg-black h-[250px] text-white">
    <div class="xl:max-w-[1200px] lg:max-w-[1100px] md:max-w-[800px] mx-auto">
        <div class="md:flex md:justify-between py-12 text-bold">
            <div class="hidden md:block">
                © 2021 YouDo
            </div>
            <div class="inline">
                <div class="text-bold ml-8 md:-ml-20">
                    <a class="ml-8" href="">О нас</a>
                    <a class="ml-8" href="">Facebook</a>
                    <a class="ml-8" href="">Twitter</a>
                    <a class="ml-8" href="">Контакты</a>
                    <a href="">HR-лидогенерация</a>
                </div>
            </div>
            <div>
                <a href="#header" class="hidden sm:block">Наверх</a>
            </div>
        </div>
        <div class="max-w-xl mx-auto text-[#9e9e9e] text-[14px] text-center">
            Информация, размещенная на настоящей странице, не является публичной офертой,
            как она определена в Гражданском кодексе Российской Федерации
        </div>
    </div>
</footer>
</body>

<script>
    $('a[href*="#"]').on('click', function(e) {
        e.preventDefault();

        $('html, body').animate({
            scrollTop: $($(this).attr('href')).offset().top
        }, 300, 'linear');
    });
</script>

<script>
    var expandDiv = document.getElementById("expand");
    var speed = 1;

    function expanding() {
        var scrolltop = window.pageYOffset; // get number of pixels document has scrolled vertically
        var scrollAndSpeed = (scrolltop / speed);
        //Expand using transform
        //expandDiv.style.transform = "scalex( " + Math.min(Math.max(scrollAndSpeed, 1), 10) + ")";

        //Or using width
        expandDiv.style.width = Math.min(Math.max(scrollAndSpeed, 5), 100) + "%";

    }

    window.addEventListener('scroll', function() { // on page scroll
        requestAnimationFrame(expanding); // call parallaxing()
    }, false);
</script>
<script src="https://cdn.tailwindcss.com"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="sweetalert2.all.min.js"></script>
<script src="sweetalert2.min.js"></script>
<link rel="stylesheet" href="sweetalert2.min.css">
<script>
    window.replainSettings = {
        id: '04dd17cf-659c-40c9-8b6e-007f91243f10'
    };
    (function(u) {
        var s = document.createElement('script');
        s.type = 'text/javascript';
        s.async = true;
        s.src = u;
        var x = document.getElementsByTagName('script')[0];
        x.parentNode.insertBefore(s, x);
    })('https://widget.replain.cc/dist/client.js');
</script></html>
