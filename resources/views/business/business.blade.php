<!DOCTYPE html>
<html lang="{{setting('language','en')}}" dir="ltr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>ServiceBox </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="{{$app_logo ?? ''}}" />
    <link rel="stylesheet" href="{{asset('vendor/fontawesome-free/css/all.min.css')}}">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,600" rel="stylesheet">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('dist/css/adminlte.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/styles.min.css')}}">
    <script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('js/jquery/jquery.min.js')}}"></script>
</head>

<body>

<header class="h-[140px]" id="header">
    <div class="md:flex md:justify-between grid-col-1 md:col-2 md:max-w-[700px] lg:max-w-[900px] xl:max-w-[1100px] mx-auto">
        <div class="w-full md:float-left md:w-4/12 pt-8">
            <a href="/">
                <img src="https://thumb.tildacdn.com/tild3432-3336-4166-a139-306139383666/-/resize/310x/-/format/webp/logo.png" alt="" class="w-[170px] mx-auto md:m-0">
            </a>
        </div>
        <div class="md:w-8/12 hidden md:block md:ml-[200px] lg:ml-[350px] xl:ml-[450px]">
            <img src="https://thumb.tildacdn.com/tild3461-3238-4161-b339-343236656266/-/resize/810x/-/format/webp/photo.png" alt="" class="w-[400px]">
        </div>
    </div>
</header>
<div class="xl:max-w-full overflow-hidden md:-mb-96 lg:m-0">
    <div class="md:max-w-[1100px] mx-auto xl:py-16">
        <div class="md:relative z-10">
            <div class="max-h-[100px] hidden md:block ml-8 xl:m-0">
                <p class="float-left mt-1">
                    Совместно с &nbsp;
                </p>
                <img class="w-[35px] mr-0" src="https://thumb.tildacdn.com/tild3336-3538-4535-b939-373931323562/-/resize/64x/-/format/webp/min-hh-red.png" alt="">
            </div>
            <div class="z-10 ml-8 xl:m-0">
                <span class="lg:text-[2.5rem] xl:text-[3rem] text-[2rem] ml-10 md:m-0 font-extrabold font-[Arial,sans-serif]">Помогаем бизнесу</span><br>
                <span class="lg:text-[2.5rem] xl:text-[3rem] text-[2rem] ml-10 md:m-0 font-extrabold font-[Arial,sans-serif]">работать с самозанятыми</span>
            </div>
            <div class="md:relative hidden md:block xl:-top-[180px] md:-top-[210px] xl:-right-[550px] md:-right-[550px] z-1">
                <img src="https://thumb.tildacdn.com/tild6664-3164-4261-b435-663833636134/-/format/webp/1.png" alt="">
            </div>
            <div class="md:hidden">
                <img class="mx-auto w-[400px]" src="https://assets.youdo.com/_next/static/media/main-banner-mobile.984038ace813892adcf707f36f8b8508.svg" alt="">
            </div>
            <div class="md:mt-10 md:relative ml-10 xl:m-0 md:-top-[500px] lg:-top-[600px]">
                <div class="mb-5 text-[20px]">
                    <img src="https://thumb.tildacdn.com/tild3633-6230-4539-b935-666465333066/-/format/webp/_1.png" alt="" class="float-left w-[35px]">
                    <h1 class="font-[35px]">&nbsp;Находим исполнителей</h1>
                </div>
                <div class="mb-5 text-[20px]">
                    <img src="https://thumb.tildacdn.com/tild3633-6230-4539-b935-666465333066/-/format/webp/_1.png" alt="" class="float-left w-[35px]">
                    <h1 class="font-[35px]">&nbsp;Автоматизируем документооборот</h1>
                </div>
                <div class="mb-5 text-[20px]">
                    <img src="https://thumb.tildacdn.com/tild3633-6230-4539-b935-666465333066/-/format/webp/_1.png" alt="" class="float-left w-[35px]">
                    <h1 class="font-[35px]">&nbsp;Производим легальные расчеты</h1>
                </div>
            </div>
            <div class="md:mt-10  md:relative -top-[200px] md:relative md:-top-[500px] lg:-top-[600px]">
                <a type="button" href="#contact" class="text-white text-[18px] leading-[1.55] font-[500] bg-center border-transparent bg-[#5a66ff] rounded-[30px] py-3 px-8 ml-10 xl:m-0">Оставить заявку</a>
            </div>
        </div>
    </div>
</div>

<div class="md:relative lg:-top-[300px] hidden lg:block">
    <div class="md:relative">
        <img class="w-[60%] md:-mt-[100px] md:-ml-40" src="https://thumb.tildacdn.com/tild6363-3339-4562-b837-643138343233/-/format/webp/21.png" alt="">
    </div>
    <div class="md:relative lg:-top-[400px] float-right xl:-left-[100px] md:max-w-[800px] ml-10 md:m-0">
        <h1 class="md:text-[2.5rem] text-[2rem] md:w-[450px] font-semibold">Ускорьте поиск исполнителей</h1>
        <div class="mt-8">
            <div class="mb-8">
                <img class="w-[55px] float-left" src="https://thumb.tildacdn.com/tild6334-6539-4038-b135-663061623762/-/resize/112x/-/format/webp/_.png" alt="">
                <h1 class="text-[20px]">Собственная база 2.6 млн исполнителей <br> для задач вашего бизнеса</h1>
            </div>
            <div class="mb-8">
                <img class="w-[55px] float-left" src="https://thumb.tildacdn.com/tild6334-6539-4038-b135-663061623762/-/resize/112x/-/format/webp/_.png" alt="">
                <h1 class="text-[20px]">Подбор самозанятых исполнителей по различным критериям</h1>
            </div>
        </div>
    </div>
</div>
<div class="hidden lg:block ">
    <div class="w-md text-center">
        <div class="lg:text-[3.5rem] md:text-[2rem] text-center font-[600] md:-mt-[360px]">Автоматизируйте <br> взаимодействие с самозанятыми</div>
    </div>

    <div class="xl:w-[1300px] lg:w-[900px] mx-auto">
        <iframe class="xl:w-[1100px] xl:h-[600px] lg:w-[900px] lg:h-[500px] mx-auto relative lg:-top-[500px] border rounded-md shadow-xl" src="https://player.vimeo.com/video/564205774?autoplay=1&loop=1&title=0&muted=1&autopause=0&background=1&byline=0&portrait=0" frameborder="0"></iframe>
    </div>
    <div class="md:flex grid-col-1 md:col-2 md:max-w-[1000px] mx-auto md:-mt-[450px]">
        <div class="md:w-[300px] ml-4">
            <img class="md:w-[55px] float-left" src="https://thumb.tildacdn.com/tild6239-3466-4230-a266-626535393136/-/resize/112x/-/format/webp/_.png" alt="">
            <div class="text-[20px] ml-16">Помощь исполнителям в оформлении самозанятости</div>
        </div>
        <div class="md:w-[300px] mx-14">
            <img class="md:w-[55px] float-left" src="https://thumb.tildacdn.com/tild6239-3466-4230-a266-626535393136/-/resize/112x/-/format/webp/_.png" alt="">
            <div class="text-[20px] ml-16">Автоматическое формирование договоров и актов</div>
        </div>
        <div class="md:w-[300px]">
            <img class="md:w-[55px] float-left" src="https://thumb.tildacdn.com/tild6239-3466-4230-a266-626535393136/-/resize/112x/-/format/webp/_.png" alt="">
            <div class="text-[20px] ml-16">Актуальные статусы исполнителей в личном кабинете</div>
        </div>
    </div>
</div>

<div class="w-full md:w-[800px] lg:w-[900px] xl:w-[1100px] mx-auto bg-[#d9effb] md:rounded-[30px] md:mt-20 mt-12">
    <div class="lg:text-[34px] text-[28px] md:text-[28px] font-bold text-center pt-12">
        Выберите удобный формат работы
    </div>
    <div class="md:flex md:justify-between lg:py-[20px] lg:px-[30px] ml-10 md:m-0">
        <div class="w-10/12 md:w-4/12 md:w-[300px] md:mt-8">
            <img class="hidden md:block" src="https://thumb.tildacdn.com/tild6632-6361-4238-b462-383632613063/-/resize/566x/-/format/webp/1.png" alt="">
            <div class="text-[24px] text-center font-bold pt-8">Личный кабинет</div>
            <div class="text-[18px] text-center pt-4">
                Работайте прямо из браузера, без дополнительных доработок на вашей стороне
            </div>
        </div>
        <div class="w-10/12 md:w-4/12 md:w-[300px] md:mt-8">
            <img class="hidden md:block" src="https://thumb.tildacdn.com/tild6537-3366-4664-b362-306330306335/-/resize/546x/-/format/webp/2.png" alt="">
            <div class="text-[24px] text-center font-bold pt-8">Аккаунт-менеджер</div>
            <div class="text-[18px] text-center pt-4">
                Получите персонального менеджера, который поможет с загрузкой данных и выплатами
            </div>
        </div>
        <div class="w-10/12 md:w-4/12 md:w-[300px] pb-8 md:p-0">
            <img class="hidden md:block" src="https://thumb.tildacdn.com/tild3537-3863-4635-b034-386466633662/-/resize/492x/-/format/webp/3.png" alt="">
            <div class="text-[24px] text-center font-bold pt-4">Интеграция по API</div>
            <div class="text-[18px] text-center pt-4">
                Подключите платформу к своей учетной системе для обмена данными
            </div>
        </div>
    </div>
</div>

<div class="text-center py-8">
    <a type="button" href="#contact" class="text-white text-[18px] leading-[1.55] font-[500] bg-center border-transparent bg-[#5a66ff] rounded-[30px] py-3 px-8">Оставить заявку</a>
</div>

<div class="w-10/12 md:w-full hidden lg:block  mx-auto overflow-hidden md:mt-[80px]">
    <div class="md:relative">
        <div class="md:relative z-10 lg:-ml-24 float-left md:-right-[310px] md:max-w-[400px]">
            <h1 class="md:text-[2.5rem] text-[2rem] md:w-[450px] font-bold  text-center md:text-left">Платите самозанятым без ограничений 24/7</h1>
            <div class="mt-8">
                <div class="mb-8">
                    <img class="md:w-[55px] w-[45px] float-left" src="https://thumb.tildacdn.com/tild6334-6539-4038-b135-663061623762/-/resize/112x/-/format/webp/_.png" alt="">
                    <h1 class="text-[18px] md:text-[20px]">Выплаты на любые карты,<br> реквизиты счета или по номеру телефона</h1>
                </div>
                <div class="mb-8">
                    <img class="md:w-[55px] w-[45px] float-left" src="https://thumb.tildacdn.com/tild6334-6539-4038-b135-663061623762/-/resize/112x/-/format/webp/_.png" alt="">
                    <h1 class="text-[18px] md:text-[20px]">Проверка лимитов и статуса<br> исполнителей перед выплатой</h1>
                </div>
                <div class="mb-8">
                    <img class="md:w-[55px] w-[45px] float-left" src="https://thumb.tildacdn.com/tild6334-6539-4038-b135-663061623762/-/resize/112x/-/format/webp/_.png" alt="">
                    <h1 class="text-[18px] md:text-[20px]">Автоматическое формирование <br> чеков и оплата налогов за самозанятого</h1>
                </div>
            </div>
        </div>
        <div class="md:relative md:-right-[400px]">
            <img class="w-[60%]" src="https://thumb.tildacdn.com/tild3332-3961-4536-b864-653962313732/-/format/webp/31.png" alt="">
        </div>
    </div>
</div>

<div class="overflow-hidden mx-auto md:mt-16">
    <div class="md:relative flex">
        <div class="hidden lg:block md:relative md:-ml-[100px] md:-mt-[50px]">
            <img class="w-[90%]" src="https://thumb.tildacdn.com/tild6130-6362-4463-b235-663435346337/-/format/webp/4.png" alt="">
            <div class="md:relative md:w-[400px] md:left-[200px] text-[12px] top-4">
                <p class="text-[#9e9e9e]">* Страховые услуги оказывает ООО «Страховая компания «Манго». Лицензии С Л № 4372 и СИ № 4372 от 12.09.2019 г. Выданы Банком России без ограничения срока действия. Сайт: <a class="text-[#ff8562]" href="https://mango.rocks/">www.mango.rocks.</a> <a class="text-[#ff8562]" href="https://blog.youdo.com/mango">Подробнее о правилах и условиях страхования</a></p>
                <p class="text-[#9e9e9e]">** Услуга по страхованию оказывается организацией Страховое акционерное общество «ВСК». Лицензия Банка России СИ № 0621 от 11.09.2015. <a class="text-[#ff8562]" href="https://youdo.com/vsk">Подробнее о правилах и условиях страхования</a></p>
            </div>
        </div>
        <div class="md:relative top-14 w-10/12 lg:w-full mx-auto lg:m-0">
            <h1 class="lg:text-[2.5rem] text-[1.8rem] md:text-[1.7rem] md:text-[1.4rem] md:w-[500px] lg:w-[500px] font-bold font-['Radiance,sans-serif,Noto Sans'] text-center lg:text-left">Привлекайте лучших специалистов</h1>
            <h1 class="lg:text-[1.4rem] lg:text-[1.7rem] text-[1.1rem] text-[#9e9e9e] md:w-[500px] lg:w-[500px] font-bold font-['Radiance,sans-serif,Noto Sans'] text-center lg:text-left">А мы сделаем их работу комфортной</h1>

            <div class="mt-10">
                <div class="mb-8">
                    <img class="w-[45px] md:w-[55px] float-left" src="https://thumb.tildacdn.com/tild3433-3337-4939-a164-643962313362/-/resize/112x/-/format/webp/_.png" alt="">
                    <div class="font-semibold text-[18px] md:text-[24px] ml-16">Выплаты без ограничений</div>
                    <h1 class="text-[16px] md:text-[20px] ml-16">Исполнитель может получать выплаты <br> за каждый заказ, день в день <br> Даже в выходные и праздничные дни</h1>
                </div>
                <div class="mb-10">
                    <img class="w-[45px] md:w-[55px] float-left" src="https://thumb.tildacdn.com/tild3433-3337-4939-a164-643962313362/-/resize/112x/-/format/webp/_.png" alt="">
                    <div class="font-semibold text-[18px] md:text-[24px] ml-16">Страховка от материального ущерба**</div>
                    <h1 class="text-[16px] md:text-[20px] ml-16">Аналог больничного — поддержим исполнителя,<br> если он заболеет и не сможет работать</h1>
                </div>
                <div class="mb-10">
                    <img class="w-[45px] md:w-[55px] float-left" src="https://thumb.tildacdn.com/tild3433-3337-4939-a164-643962313362/-/resize/112x/-/format/webp/_.png" alt="">
                    <div class="font-semibold text-[18px] md:text-[24px] ml-16">Медицинская страховка*</div>
                    <h1 class="text-[16px] md:text-[20px] ml-16">Если что-то пойдет не так, страховая может <br> выплатить до 100 000 рублей за ущерб,<br> причиненный застрахованным исполнителем</h1>
                </div>
                <div class="mb-10">
                    <img class="w-[45px] md:w-[55px] float-left" src="https://thumb.tildacdn.com/tild3433-3337-4939-a164-643962313362/-/resize/112x/-/format/webp/_.png" alt="">
                    <div class="font-semibold text-[18px] md:text-[24px] ml-16">Служба поддержки</div>
                    <h1 class="text-[16px] md:text-[20px] ml-16">Поможем исполнителям получить статус самозанятого, познакомим с платформой и ответим на вопросы</h1>
                </div>
            </div>
        </div>
    </div>
    <div class="text-center mt-4 md:mt-16 md:mb-10">
        <a type="button" href="#contact" class="text-white text-[18px] leading-[1.55] font-[500] bg-center border-transparent bg-[#5a66ff] rounded-[30px] py-3 px-8">Узнай, что такое HR-Лидогенерация</a>
    </div>
</div>

<div class="xl:w-[1100px] md:w-[800px] mx-auto md:mt-20">
    <div class="text-[34px] font-bold text-center pt-12 font-['Radiance,sans-serif,Noto Sans']">
        Сотрудничайте с самозанятыми правильно
    </div>
    <h1 class="text-[1.4rem] my-2 mb-8 text-[#9e9e9e] text-center font-bold font-['Radiance,sans-serif,Noto Sans']">Поделимся опытом, как это делать:</h1>
    <div class="md:absolute hidden xl:block md:w-[350px] md:ml-[750px]">
        <a href="">
            <img src="https://thumb.tildacdn.com/tild3063-6433-4561-b635-353731616635/-/resize/700x/-/format/webp/photo.png" alt="">
        </a>
    </div>
    <div>
        <div class="bg-[#e8f4e4] md:rounded-[20px] mb-4 md:mb-8">
            <img class="float-left w-[45px] m-6" src="https://thumb.tildacdn.com/tild6266-3935-4964-b133-316562343939/-/resize/68x/-/format/webp/photo.png" alt="">
            <div class="p-8 lg:text-[24px] ml-16">Участвуем в рабочих группах (при министерствах и <br>ведомствах) и бизнес- ассоциациях по развитию <br> рынка самозанятых</div>
        </div>
        <div class="bg-[#e8f4e4] md:rounded-[20px] mb-4 md:mb-8">
            <img class="float-left w-[45px] m-6" src="https://thumb.tildacdn.com/tild6266-3935-4964-b133-316562343939/-/resize/68x/-/format/webp/photo.png" alt="">
            <div class="p-8 lg:text-[24px] ml-16">Совместно с ФНС России, Рострудом и ОНФ <br> разработали памятку для юридических лиц по <br>безопасной работе с самозанятыми <br>
                <a class="text-blue-500 mt-4" href="https://data.nalog.ru/html/sites/www.npd.nalog.ru/psz270820.pdf">Скачать на сайте ФНС →</a>
            </div>
        </div>
        <div class="bg-[#e8f4e4] md:rounded-[20px]">
            <img class="float-left w-[45px] m-6" src="https://thumb.tildacdn.com/tild6266-3935-4964-b133-316562343939/-/resize/68x/-/format/webp/photo.png" alt="">
            <div class="p-8 lg:text-[24px] ml-16">Совместно с ДПИР Москвы и мбм.мос.ру запустили обучающий онлайн курc для самозанятых исполнителей <br>
                <a class="text-blue-500 mt-4" href="https://data.nalog.ru/html/sites/www.npd.nalog.ru/psz270820.pdf">Скачать на сайте ФНС →</a>
            </div>
        </div>
    </div>
    <div class="text-center py-8">
        <a type="button" href="#contact" class="text-white text-[18px] leading-[1.55] font-[500] bg-center border-transparent bg-[#5a66ff] rounded-[30px] py-3 px-8">Оставить заявку</a>
    </div>
</div>


<div class="xl:w-[1100px] md:w-[800px] mx-auto bg-[#d9effb] md:rounded-[30px] md:my-20">
    <div class="md:max-w-[800px] mx-auto px-12 md:p-0">
        <div class="text-[34px] font-bold text-center pt-12">
            Вебинары
        </div>
        <div class="text-center text-[20px] py-5">
            Так как режим НПД еще молодой, а сформированной практики пока недостаточно, YouDo Бизнес и hh.ru запускают серию обучающих вебинаров, на которых расскажут об особенностях работы с самозанятыми, основных выгодах и рисках для бизнеса.
        </div>
        <div class="font-bold text-center text-[20px] py-5">
            Прошедшие (доступна запись)
        </div>
        <div class="mx-auto bg-white md:max-w-[700px] rounded-[20px] py-4 shadow-xl px-12 md:px-0">
            <div class="md:px-10 md:py-4">
                <div class="h-[150px]">
                    <p class="text-[#9e9e9e] mt-5">Прошел 23 сентября в 13:00</p>
                    <a class="float-left inline leading-normal font-semibold md:w-7/12 text-[20px]" href="#">Вебинар «Как вести документооборот и не попасть в ловушки. Кейс стаффинговой группы ANCOR»</a>
                    <img class="float-right -mt-10 rounded-[10px] hidden md:block md:w-5/12" src="https://thumb.tildacdn.com/tild6565-3765-4961-b536-636663396636/-/resize/486x/-/format/webp/photo_2021-12-03_010.jpeg" alt="">
                </div>
            </div>
        </div>
        <div class="text-center py-8">
            <a type="button" href="#contact" class="text-white text-[18px] leading-[1.55] font-[500] bg-center border-transparent bg-[#5a66ff] rounded-[30px] py-3 px-8">Больше вебинаров</a>
        </div>
    </div>
</div>

<div class="text-center text-[36px] font-bold my-12">
    О нас пишут
</div>
<div class="max-w-[1100px] mx-auto flex">
    <div class="md:w-[350px] md:py-6 md:px-8 bg-[#f2f4fa] md:rounded-[20px] px-12">
        <a href="#">
            <img class="w-[150px] pt-4" src="https://static.tildacdn.com/tild3936-6261-4666-b464-643234303239/Forbes_logo.svg" alt="">
            <h3 class="my-4 text-[#2052e9] font-bold">YouDo и HeadHunter запустили платформу для работы бизнеса с самозанятыми</h3>
            <p class="pb-4 text-[14px]">Новость о запуске совместной<br> с hh.ru b2b-платформы YouDo Бизнес</p>
        </a>
    </div>
    <div class="md:w-[350px] md:py-6 md:px-8 bg-[#f2f4fa] rounded-[20px] mx-10 hidden md:block">
        <a href="#">
            <img class="w-[150px] pt-4" src="https://thumb.tildacdn.com/tild3137-6132-4661-b664-373137303936/-/resize/240x/-/format/webp/Rossiya-24_Logosvg.png" alt="">
            <h3 class="my-4 text-[#2052e9] font-bold">Заседание правительственной комиссии по вопросам развития МСП</h3>
            <p class="pb-4 text-[14px]">Сооснователь YouDo Алексей Гидирим принял участие в заседании кабмина по вопросам развития малого и среднего предпринимательства. </p>
        </a>
    </div>
    <div class="md:w-[350px] md:py-6 md:px-8 bg-[#f2f4fa] rounded-[20px] hidden md:block">
        <a href="#">
            <img class="w-[150px] pt-4" src="https://thumb.tildacdn.com/tild6631-6461-4533-b262-616562643131/-/resize/350x/-/format/webp/Logo_Kommersantsvg_1.png" alt="">
            <h3 class="my-4 text-[#2052e9] font-bold">Самозанятые хотят на работу</h3>
            <p class="pb-4 text-[14px]">Весной 2020 года, в самый разгар пандемии коронавируса, мы вместе с сервисом Profi.ru обратились в столичную мэрию с просьбой разрешить самозанятым получать пропуска «для рабочих граждан» для осуществления деятельности во время локдауна.</p>
        </a>
    </div>
</div>

<div class="max-w-[1100px] mx-auto flex mt-10">
    <div class="md:w-[350px] md:py-6 md:px-8 bg-[#f2f4fa] md:rounded-[20px] px-12">
        <a href="#">
            <img class="w-[50px] pt-4 float-left mr-5" src="https://thumb.tildacdn.com/tild6665-3737-4663-b335-646135323834/-/resize/120x/-/format/webp/1200px-Emblem_of_the.png" alt="">
            <img class="w-[50px] pt-4" src="https://thumb.tildacdn.com/tild6630-3933-4238-a263-653566646439/-/resize/118x/-/format/webp/logorostrud.png" alt="">
            <h3 class="my-4 text-[#2052e9] font-bold">Памятка для самозанятых и бизнеса</h3>
            <p class="pb-4 text-[14px]">YouDo совместно с ФНС и Рострудом подготовил памятку, где эксперты разъяснили основные моменты по сотрудничеству бизнеса с самозанятыми. Документ полезен тем, что описывает существующие для обеих сторон риски, поскольку правоприменительная практика только формируется, и не все компании знают, как грамотно работать с самозанятыми.</p>
        </a>
    </div>
    <div class="md:w-[350px] md:py-6 md:px-8 bg-[#f2f4fa] rounded-[20px] mx-10 hidden md:block">
        <a href="#">
            <img class="w-[150px] pt-4" src="https://thumb.tildacdn.com/tild3434-3863-4930-b731-653263316565/-/resize/268x/-/format/webp/logo_web_ru.png" alt="">
            <h3 class="my-4 text-[#2052e9] font-bold">Опрос: половина российских самозанятых тратит весь свой доход на бытовые нужды</h3>
            <p class="pb-4 text-[14px]">Мы провели исследование и узнали, сколько самозанятых совмещают фриланс с основной работой, кто работает исключительно на себя, кто пришёл во фриланс вынужденно из-за коронакризиса, какие причины, что люди совмещают фриланс с наемным трудом и другое.</p>
        </a>
    </div>
    <div class="md:w-[350px] md:py-6 md:px-8 bg-[#f2f4fa] rounded-[20px] hidden md:block">
        <a href="#">
            <img class="w-[150px] pt-4" src="https://thumb.tildacdn.com/tild3137-6132-4661-b664-373137303936/-/resize/240x/-/format/webp/Rossiya-24_Logosvg.png" alt="">
            <h3 class="my-4 text-[#2052e9] font-bold">Ролик к 30-летию ФНС</h3>
            <p class="pb-4 text-[14px]">Поучаствовали в фильме, посвященному юбилею ведомства, рассказали о своем опыте взаимодействия с ФНС и участие в рабочей группе по разработке режима НПД.</p>
        </a>
    </div>
</div>
<div class="text-center py-8">
    <a type="button" href="#contact" class="text-white text-[18px] leading-[1.55] font-[500] bg-center border-transparent bg-[#5a66ff] rounded-[30px] py-3 px-8">Больше новостей</a>
</div>


<div class="lg:w-[1100px] md:w-[800px] mx-auto bg-[#fdeac2] md:rounded-[30px] my-20">
    <div class="flex">
        <div class="md:w-[600px] float-left md:ml-16 px-10 md:p-0">
            <div class="text-[24px] md:text-[34px] font-bold md:pt-12 pt-8">
                Зарабатывайте <br> на рекомендациях
            </div>
            <div class="text-[16px] md:text-[20px] py-5">
                Знаете компании, которым мы можем помочь в работе с самозанятыми? Предложите им сотрудничество с YouDo за вознаграждение.
            </div>
            <div x-data="{ showModal : false }" class="md:py-8 py-6">
                <!--
            <a type="button" href="#contact" class="text-white md:text-[18px] leading-[1.55] font-[500] bg-center border-transparent bg-[#5a66ff] rounded-[30px] md:py-3 md:px-8 py-2 px-4">
                Стать портнером
            </a>
-->
                <!-- Button -->
                <button @click="showModal = !showModal" class="text-white md:text-[18px] leading-[1.55] font-[500] bg-center border-transparent bg-[#5a66ff] rounded-[30px] md:py-3 md:px-8 py-2 px-4">Стать портнером</button>

                <!-- Modal Background -->
                <div x-show="showModal" class="fixed flex items-center justify-center overflow-auto z-50 bg-black bg-opacity-40 left-0 right-0 top-0 bottom-0" x-transition:enter="transition ease duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition ease duration-300" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">
                    <!-- Modal -->
                    <div x-show="showModal" class="bg-white rounded-xl shadow-2xl p-6 sm:w-10/12 h-[650px] md:w-4/12 mx-10" @click.away="showModal = false" x-transition:enter="transition ease duration-100 transform" x-transition:enter-start="opacity-0 scale-90 translate-y-1" x-transition:enter-end="opacity-100 scale-100 translate-y-0" x-transition:leave="transition ease duration-100 transform" x-transition:leave-start="opacity-100 scale-100 translate-y-0" x-transition:leave-end="opacity-0 scale-90 translate-y-1">
                        <div class="mx-auto pl-10 my-10 rounded-[20px] text-black">
                            <table>
                                <thead>
                                <div class="text-[2rem] text-[1.8rem] md:w-[500px] font-bold font-['Radiance,sans-serif,Noto Sans']">Оставить заявку</div>
                                </thead>
                                <tbody>
                                <input class="outline-none bg-[#f5f5f5] rounded-[20px] block my-4 py-3 px-5 w-10/12" name="" type="text" placeholder="Имя">
                                <input class="outline-none bg-[#f5f5f5] rounded-[20px] block my-4 py-3 px-5 w-10/12" name="" type="email" placeholder="Email">
                                <input class="outline-none bg-[#f5f5f5] rounded-[20px] block my-4 py-3 px-5 w-10/12" name="" type="text" placeholder="Номер телефона">
                                <textarea class="outline-none bg-[#f5f5f5] rounded-[20px] block my-4 py-3 px-5 w-10/12 h-[150px] " name="" type="text" placeholder="Название компании"></textarea>
                                </tbody>
                                <div class="py-8">
                                    <a type="button" href="#contact" class="text-white w-10/12 text-[18px] leading-[1.55] font-[500] bg-center border-transparent bg-[#5a66ff] rounded-[30px] py-3 md:px-8 text-center">Оставить заявку</a>
                                </div>
                                <div class="text-right space-x-5">
                                    <button @click="showModal = !showModal" class="px-4 py-2 text-sm bg-white rounded-xl border transition-colors duration-150 ease-linear border-gray-200 text-gray-500 focus:outline-none focus:ring-0 font-bold hover:bg-gray-50 focus:bg-indigo-50 focus:text-indigo">Закрыть</button>
                                </div>
                            </table>
                        </div>
                        <!-- Buttons -->

                    </div>
                </div>
            </div>
        </div>
        <div class="md:w-[400px] ml-24 py-8 hidden md:block">
            <img src="https://thumb.tildacdn.com/tild3532-3038-4032-b231-363230613735/-/resize/658x/-/format/webp/5.png" alt="">
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>

<div id="contact" class="overflow-hidden mx-auto md:mt-16 md:pb-48">
    <div class="md:relative flex">
        <div class="md:relative hidden lg:block md:-ml-36">
            <img src="{{asset('/images/72.png')}}" alt="">
        </div>
        <div class="md:relative top-24 mx-auto lg:m-0">
            <h1 class="text-[2rem] md:text-[2.5rem] w-[500px] text-center md:text-left md:w-[500px] font-bold font-['Radiance,sans-serif,Noto Sans']">Давайте поговорим</h1>
            <h1 class="text-[1.1rem] md:text-[1.4rem] w-[500px] text-center md:text-left md:w-[500px] font-['Radiance,sans-serif,Noto Sans']">Мы подробнее расскажем о возможностях платформы и ответим на вопросы</h1>
            <div class="md:max-w-[500px] mx-auto pl-16 my-10 shadow-2xl rounded-[20px] px-4">
                <table>
                    <thead>
                    <div class="text-[2rem] text-[1.8rem] md:w-[500px] font-bold font-['Radiance,sans-serif,Noto Sans']">Оставить заявку</div>
                    </thead>
                    <tbody>
                    <input class="bg-[#f5f5f5] rounded-[20px] block my-4 py-3 px-5 w-10/12" name="" type="text" placeholder="Имя">
                    <input class="bg-[#f5f5f5] rounded-[20px] block my-4 py-3 px-5 w-10/12" name="" type="email" placeholder="Email">
                    <input class="bg-[#f5f5f5] rounded-[20px] block my-4 py-3 px-5 w-10/12" name="" type="text" placeholder="Номер телефона">
                    <input class="bg-[#f5f5f5] rounded-[20px] block my-4 py-3 px-5 w-10/12" name="" type="text" placeholder="Название компании">
                    </tbody>
                    <div class="mt-4 text-[15px] md:text-[18px] font-semibold">
                        Сколько у вас самозанятых?
                    </div>
                    <div class="mt-4">
                        <label class="cursor-pointer text-[15px] md:text-[18px]"> &nbsp; <input type="radio" name="#" class="my-2 border-[#5a66ff]">&nbsp;1-30</label><br/>
                        <label class="cursor-pointer text-[15px] md:text-[18px]">&nbsp; <input type="radio" name="#" class="my-2 border-[#5a66ff]">&nbsp;31-100 </label><br/>
                        <label class="cursor-pointer text-[15px] md:text-[18px]"> &nbsp; <input type="radio" name="#" class="my-2 border-[#5a66ff]">&nbsp;101-500</label><br/>
                        <label class="cursor-pointer text-[15px] md:text-[18px]">&nbsp; <input type="radio" name="#" class="my-2 border-[#5a66ff]">&nbsp;500+</label><br/>
                    </div>
                    <div class="py-8">
                        <a type="button" href="#contact" class="text-white w-10/12 text-[18px] leading-[1.55] font-[500] bg-center border-transparent bg-[#5a66ff] rounded-[30px] py-3 md:px-8 text-center">Оставить заявку</a>
                    </div>
                </table>
            </div>
        </div>
    </div>
</div>




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
                <a href="#header" class="hidden md:block">Наверх</a>
            </div>
        </div>
        <div class="max-w-xl mx-auto text-[#9e9e9e] text-[14px] text-center">
            Информация, размещенная на настоящей странице, не является публичной офертой,
            как она определена в Гражданском кодексе Российской Федерации
        </div>
    </div>
</footer>



<script src="https://cdn.tailwindcss.com"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="sweetalert2.all.min.js"></script>
<script src="sweetalert2.min.js"></script>
<link rel="stylesheet" href="sweetalert2.min.css">

</body></html>
