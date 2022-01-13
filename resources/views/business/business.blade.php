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
    <div class="md:flex md:justify-between grid-col-1 md:col-2 md:max-w-[700px] lg:max-w-[900px] xl:max-w-[1300px] mx-auto">
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
<div class="xl:max-w-[1300px] overflow-hidden">
    <div class="md:max-w-[1100px] mx-auto xl:py-16">
        <div class="md:relative z-10">
            <div class="max-h-[100px] hidden md:block ml-8 xl:m-0">
                <p class="float-left mt-1">
                    @lang('lang.business_togetherwith') &nbsp;
                </p>
                <img class="w-[35px] mr-0" src="https://thumb.tildacdn.com/tild3336-3538-4535-b939-373931323562/-/resize/64x/-/format/webp/min-hh-red.png" alt="">
            </div>
            <div class="z-10 ml-8 xl:m-0">
                <span class="lg:text-[2.5rem] xl:text-[3rem] text-[2rem] ml-10 md:m-0 font-extrabold font-[Arial,sans-serif]">@lang('lang.business_forbusiness')</span><br>
                <span class="lg:text-[2.5rem] xl:text-[3rem] text-[2rem] ml-10 md:m-0 font-extrabold font-[Arial,sans-serif]">@lang('lang.business_workinown')</span>
            </div>
            <div class="md:relative hidden md:block xl:-top-[180px] md:-top-[210px] xl:-right-[550px] md:-right-[550px] z-1">
                <img src="https://thumb.tildacdn.com/tild6664-3164-4261-b435-663833636134/-/format/webp/1.png" alt="">
            </div>
            <div class="md:hidden">
                <img class="mx-auto w-[400px]" src="{{asset('images/manyhands.png')}}" alt="">
            </div>
            <div class="md:mt-10 md:relative ml-10 xl:m-0 md:-top-[500px] lg:-top-[600px]">
                <div class="mb-5 text-[20px]">
                    <img src="https://thumb.tildacdn.com/tild3633-6230-4539-b935-666465333066/-/format/webp/_1.png" alt="" class="float-left w-[35px]">
                    <h1 class="font-[35px]">&nbsp;@lang('lang.business_foundperson')</h1>
                </div>
                <div class="mb-5 text-[20px]">
                    <img src="https://thumb.tildacdn.com/tild3633-6230-4539-b935-666465333066/-/format/webp/_1.png" alt="" class="float-left w-[35px]">
                    <h1 class="font-[35px]">&nbsp;@lang('lang.business_avtodocument')</h1>
                </div>
                <div class="mb-5 text-[20px]">
                    <img src="https://thumb.tildacdn.com/tild3633-6230-4539-b935-666465333066/-/format/webp/_1.png" alt="" class="float-left w-[35px]">
                    <h1 class="font-[35px]">&nbsp;@lang('lang.business_legal')</h1>
                </div>
            </div>
            <div class="md:mt-10  md:relative -top-[200px] md:relative md:-top-[500px] lg:-top-[600px]">
                <a type="button" href="#contact" class="text-white text-[18px] leading-[1.55] font-[500] bg-center border-transparent bg-[#5a66ff] rounded-[30px] py-3 px-8 ml-10 xl:m-0">@lang('lang.business_submitaplication')</a>
            </div>
        </div>
    </div>
</div>

<div class="md:relative lg:-top-[400px] hidden lg:block">
    <div class="md:relative">
        <img class="w-[60%] md:-mt-[100px] md:-ml-40" src="https://thumb.tildacdn.com/tild6363-3339-4562-b837-643138343233/-/format/webp/21.png" alt="">
    </div>
    <div class="md:relative lg:-top-[400px] float-right xl:-left-[100px] md:max-w-[800px] ml-10 md:m-0">
        <h1 class="md:text-[2.5rem] text-[2rem] md:w-[450px] font-semibold">@lang('lang.business_fastfoundperson')</h1>
        <div class="mt-8">
            <div class="mb-8">
                <img class="w-[55px] float-left" src="https://thumb.tildacdn.com/tild6334-6539-4038-b135-663061623762/-/resize/112x/-/format/webp/_.png" alt="">
                <h1 class="text-[20px]">@lang('lang.business_owndatabaseperformers')<br> @lang('lang.business_foryourbusinesswork')</h1>
            </div>
            <div class="mb-8">
                <img class="w-[55px] float-left" src="https://thumb.tildacdn.com/tild6334-6539-4038-b135-663061623762/-/resize/112x/-/format/webp/_.png" alt="">
                <h1 class="text-[20px]">@lang('lang.business_selectionofselfemployedperformersaccordingtovariouscriteria')</h1>
            </div>
        </div>
    </div>
</div>
<div class="hidden lg:block ">
    <div class="w-md text-center">
        <div class="lg:text-[3.5rem] md:text-[2rem] text-center font-[600] md:-mt-[360px]">@lang('lang.business_automate') <br>@lang('lang.business_interactionwithself-employed')</div>
    </div>

    <div class="xl:w-[1300px] lg:w-[900px] mx-auto">
        <iframe class="xl:w-[1100px] xl:h-[600px] lg:w-[900px] lg:h-[500px] mx-auto relative lg:-top-[500px] border rounded-md shadow-xl" src="https://player.vimeo.com/video/564205774?autoplay=1&loop=1&title=0&muted=1&autopause=0&background=1&byline=0&portrait=0" frameborder="0"></iframe>
    </div>
    <div class="md:flex grid-col-1 md:col-2 md:max-w-[1000px] mx-auto md:-mt-[450px]">
        <div class="md:w-[300px] ml-4">
            <img class="md:w-[55px] float-left" src="https://thumb.tildacdn.com/tild6239-3466-4230-a266-626535393136/-/resize/112x/-/format/webp/_.png" alt="">
            <div class="text-[20px] ml-16">@lang('lang.business_assistancetoperformersinobtainingself-employment')</div>
        </div>
        <div class="md:w-[300px] mx-14">
            <img class="md:w-[55px] float-left" src="https://thumb.tildacdn.com/tild6239-3466-4230-a266-626535393136/-/resize/112x/-/format/webp/_.png" alt="">
            <div class="text-[20px] ml-16">@lang('lang.business_avtodocandact')</div>
        </div>
        <div class="md:w-[300px]">
            <img class="md:w-[55px] float-left" src="https://thumb.tildacdn.com/tild6239-3466-4230-a266-626535393136/-/resize/112x/-/format/webp/_.png" alt="">
            <div class="text-[20px] ml-16">@lang('lang.business_ownpersonroom')</div>
        </div>
    </div>
</div>

<div class="w-full md:w-[800px] mx-auto bg-[#d9effb] md:rounded-[30px] md:mt-20 mt-12">
    <div class="lg:text-[34px] text-[28px] md:text-[28px] font-bold text-center pt-12">
     @lang('lang.business_chooseeasyworkforyou')
    </div>
    <div class="md:flex md:justify-between lg:py-[20px] lg:px-[30px] ml-10 md:m-0">
        <div class="w-10/12 md:w-4/12 md:w-[300px] md:mt-8">
            <img class="hidden md:block" src="https://thumb.tildacdn.com/tild6632-6361-4238-b462-383632613063/-/resize/566x/-/format/webp/1.png" alt="">
            <div class="text-[24px] text-center font-bold pt-8">@lang('lang.business_ownroom')</div>
            <div class="text-[18px] text-center pt-4">
            @lang('lang.business_workinbrouser')
            </div>
        </div>
        <div class="w-10/12 md:w-4/12 md:w-[300px] md:mt-8">
            <img class="hidden md:block" src="https://thumb.tildacdn.com/tild6537-3366-4664-b362-306330306335/-/resize/546x/-/format/webp/2.png" alt="">
            <div class="text-[24px] text-center font-bold pt-8">@lang('lang.business_menengersakk')</div>
            <div class="text-[18px] text-center pt-4">
             @lang('lang.business_text')
            </div>
        </div>
        <div class="w-10/12 md:w-4/12 md:w-[300px] pb-8 md:p-0">
            <img class="hidden md:block" src="https://thumb.tildacdn.com/tild3537-3863-4635-b034-386466633662/-/resize/492x/-/format/webp/3.png" alt="">
            <div class="text-[24px] text-center font-bold pt-4">@lang('lang.business_integrationtapi')</div>
            <div class="text-[18px] text-center pt-4">
               @lang('lang.business_text1')
            </div>
        </div>
    </div>
</div>

<div class="text-center py-8">
    <a type="button" href="#contact" class="text-white text-[18px] leading-[1.55] font-[500] bg-center border-transparent bg-[#5a66ff] rounded-[30px] py-3 px-8">@lang('lang.business_submitaplication')</a>
</div>

<div class="w-10/12 md:w-full hidden lg:block  mx-auto overflow-hidden md:mt-[80px]">
    <div class="md:relative">
        <div class="md:relative z-10 lg:-ml-24 float-left md:-right-[210px] md:max-w-[400px]">
            <h1 class="md:text-[2.5rem] text-[2rem] md:w-[450px] font-bold  text-center md:text-left">@lang('lang.business_payforyourownwork24\7')</h1>
            <div class="mt-8">
                <div class="mb-8">
                    <img class="md:w-[55px] w-[45px] float-left" src="https://thumb.tildacdn.com/tild6334-6539-4038-b135-663061623762/-/resize/112x/-/format/webp/_.png" alt="">
                    <h1 class="text-[18px] md:text-[20px]">@lang('lang.business_payforcard')<br> @lang('lang.business_accauntdetailsorphonenumber')</h1>
                </div>
                <div class="mb-8">
                    <img class="md:w-[55px] w-[45px] float-left" src="https://thumb.tildacdn.com/tild6334-6539-4038-b135-663061623762/-/resize/112x/-/format/webp/_.png" alt="">
                    <h1 class="text-[18px] md:text-[20px]">@lang('lang.business_ceklimit')<br> @lang('lang.business_performerbeforepayment')</h1>
                </div>
                <div class="mb-8">
                    <img class="md:w-[55px] w-[45px] float-left" src="https://thumb.tildacdn.com/tild6334-6539-4038-b135-663061623762/-/resize/112x/-/format/webp/_.png" alt="">
                    <h1 class="text-[18px] md:text-[20px]">@lang('lang.business_avtoformation') <br> @lang('lang.business_checkselfemployers')</h1>
                </div>
            </div>
        </div>
        <div class="md:relative md:-right-[240px]">
            <img class="w-[60%]" src="https://thumb.tildacdn.com/tild3332-3961-4536-b864-653962313732/-/format/webp/31.png" alt="">
        </div>
    </div>
</div>

<div class="overflow-hidden mx-auto md:mt-16">
    <div class="md:relative flex">
        <div class="hidden lg:block md:relative md:-ml-[100px] md:-mt-[50px]">
            <img class="w-[90%]" src="https://thumb.tildacdn.com/tild6130-6362-4463-b235-663435346337/-/format/webp/4.png" alt="">
            <div class="md:relative md:w-[400px] md:left-[200px] text-[12px] top-4">
                <p class="text-[#9e9e9e]">@lang('lang.business_text2') <a class="text-[#ff8562]" href="https://mango.rocks/">@lang('lang.business_saytmango')</a> <a class="text-[#ff8562]" href="https://blog.user.com/mango">@lang('lang.business_text3')</a></p>
                <p class="text-[#9e9e9e]">@lang('lang.lang.business_text4') <a class="text-[#ff8562]" href="https://user.com/vsk">@lang('lang.business_text5')</a></p>
            </div>
        </div>
        <div class="md:relative top-14 w-10/12 lg:w-full mx-auto lg:m-0">
            <h1 class="lg:text-[2.5rem] text-[1.8rem] md:text-[1.7rem] md:text-[1.4rem] md:w-[500px] lg:w-[500px] font-bold font-['Radiance,sans-serif,Noto Sans'] text-center lg:text-left">@lang('lang.business_text6')</h1>
            <h1 class="lg:text-[1.4rem] lg:text-[1.7rem] text-[1.1rem] text-[#9e9e9e] md:w-[500px] lg:w-[500px] font-bold font-['Radiance,sans-serif,Noto Sans'] text-center lg:text-left">@lang('lang.business_text7')</h1>

            <div class="mt-10">
                <div class="mb-8">
                    <img class="w-[45px] md:w-[55px] float-left" src="https://thumb.tildacdn.com/tild3433-3337-4939-a164-643962313362/-/resize/112x/-/format/webp/_.png" alt="">
                    <div class="font-semibold text-[18px] md:text-[24px] ml-16">@lang('lang.business_text8')</div>
                    <h1 class="text-[16px] md:text-[20px] ml-16">@lang('lang.business_text9') <br> @lang('lang.business_everyordereveryday')<br> @lang('lang.business_inholiday')</h1>
                </div>
                <div class="mb-10">
                    <img class="w-[45px] md:w-[55px] float-left" src="https://thumb.tildacdn.com/tild3433-3337-4939-a164-643962313362/-/resize/112x/-/format/webp/_.png" alt="">
                    <div class="font-semibold text-[18px] md:text-[24px] ml-16">@lang('lang.business_text10')</div>
                    <h1 class="text-[16px] md:text-[20px] ml-16">@lang('lang.business_text11')<br> @lang('lang.business_text12')</h1>
                </div>
                <div class="mb-10">
                    <img class="w-[45px] md:w-[55px] float-left" src="https://thumb.tildacdn.com/tild3433-3337-4939-a164-643962313362/-/resize/112x/-/format/webp/_.png" alt="">
                    <div class="font-semibold text-[18px] md:text-[24px] ml-16">@lang('lang.business_text13')</div>
                    <h1 class="text-[16px] md:text-[20px] ml-16">@lang('lang.business_text14') <br> @lang('lang.business_text15')<br> @lang('lang.business_text16')</h1>
                </div>
                <div class="mb-10">
                    <img class="w-[45px] md:w-[55px] float-left" src="https://thumb.tildacdn.com/tild3433-3337-4939-a164-643962313362/-/resize/112x/-/format/webp/_.png" alt="">
                    <div class="font-semibold text-[18px] md:text-[24px] ml-16">@lang('lang.business_supportservice')</div>
                    <h1 class="text-[16px] md:text-[20px] ml-16">@lang('lang.business_text17')</h1>
                </div>
            </div>
        </div>
    </div>
    <div class="text-center mt-4 md:mt-16 md:mb-10">
        <a type="button" href="#contact" class="text-white text-[18px] leading-[1.55] font-[500] bg-center border-transparent bg-[#5a66ff] rounded-[30px] py-3 px-8">@lang('lang.business_text18')</a>
    </div>
</div>

<div class="xl:w-[1100px] md:w-[800px] mx-auto md:mt-20">
    <div class="text-[34px] font-bold text-center pt-12 font-['Radiance,sans-serif,Noto Sans']">
        @lang('lang.business_text19')
    </div>
    <h1 class="text-[1.4rem] my-2 mb-8 text-[#9e9e9e] text-center font-bold font-['Radiance,sans-serif,Noto Sans']">@lang('lang.business_text20')</h1>
    <div class="md:absolute hidden xl:block md:w-[350px] md:ml-[750px]">
        <a href="">
            <img src="https://thumb.tildacdn.com/tild3063-6433-4561-b635-353731616635/-/resize/700x/-/format/webp/photo.png" alt="">
        </a>
    </div>
    <div>
        <div class="bg-[#e8f4e4] md:rounded-[20px] mb-4 md:mb-8">
            <img class="float-left w-[45px] m-6" src="https://thumb.tildacdn.com/tild6266-3935-4964-b133-316562343939/-/resize/68x/-/format/webp/photo.png" alt="">
            <div class="p-8 lg:text-[24px] ml-16">@lang('lang.business_text21')<br>@lang('lang.business_text22') <br> @lang('lang.business_text23')</div>
        </div>
        <div class="bg-[#e8f4e4] md:rounded-[20px] mb-4 md:mb-8">
            <img class="float-left w-[45px] m-6" src="https://thumb.tildacdn.com/tild6266-3935-4964-b133-316562343939/-/resize/68x/-/format/webp/photo.png" alt="">
            <div class="p-8 lg:text-[24px] ml-16">@lang('lang.business_text24') <br> @lang('lang.business_text25') <br>@lang('lang.business_text26') <br>
                <a class="text-blue-500 mt-4" href="https://data.nalog.ru/html/sites/www.npd.nalog.ru/psz270820.pdf">@lang('lang.business_text27')</a>
            </div>
        </div>
        <div class="bg-[#e8f4e4] md:rounded-[20px]">
            <img class="float-left w-[45px] m-6" src="https://thumb.tildacdn.com/tild6266-3935-4964-b133-316562343939/-/resize/68x/-/format/webp/photo.png" alt="">
            <div class="p-8 lg:text-[24px] ml-16">@lang('lang.business_text28') <br>
                <a class="text-blue-500 mt-4" href="https://data.nalog.ru/html/sites/www.npd.nalog.ru/psz270820.pdf">@lang('lang.business_text27')</a>
            </div>
        </div>
    </div>
    <div class="text-center py-8">
        <a type="button" href="#contact" class="text-white text-[18px] leading-[1.55] font-[500] bg-center border-transparent bg-[#5a66ff] rounded-[30px] py-3 px-8">@lang('lang.business_submitaplication')</a>
    </div>
</div>


<div class="xl:w-[1100px] md:w-[800px] mx-auto bg-[#d9effb] md:rounded-[30px] md:my-20">
    <div class="md:max-w-[800px] mx-auto px-12 md:p-0">
        <div class="text-[34px] font-bold text-center pt-12">
            @lang('lang.business_webinars')
        </div>
        <div class="text-center text-[20px] py-5">
           @lang('lang.business_text29')
        </div>
        <div class="font-bold text-center text-[20px] py-5">
            @lang('lang.business_text30')
        </div>
        <div class="mx-auto bg-white md:max-w-[700px] rounded-[20px] py-4 shadow-xl px-12 md:px-0">
            <div class="md:px-10 md:py-4">
                <div class="h-[150px]">
                    <p class="text-[#9e9e9e] mt-5">@lang('lang.business_text31')</p>
                    <a class="float-left inline leading-normal font-semibold md:w-7/12 text-[20px]" href="#">@lang('lang.business_text32')</a>
                    <img class="float-right -mt-10 rounded-[10px] hidden md:block md:w-5/12" src="https://thumb.tildacdn.com/tild6565-3765-4961-b536-636663396636/-/resize/486x/-/format/webp/photo_2021-12-03_010.jpeg" alt="">
                </div>
            </div>
        </div>
        <div class="text-center py-8">
            <a type="button" href="#contact" class="text-white text-[18px] leading-[1.55] font-[500] bg-center border-transparent bg-[#5a66ff] rounded-[30px] py-3 px-8">@lang('lang.business_text33')</a>
        </div>
    </div>
</div>

<div class="text-center text-[36px] font-bold my-12">
    @lang('lang.business_text34')
</div>
<div class="max-w-[1100px] mx-auto flex">
    <div class="md:w-[350px] md:py-6 md:px-8 bg-[#f2f4fa] md:rounded-[20px] px-12">
        <a href="#">
            <img class="w-[150px] pt-4" src="https://static.tildacdn.com/tild3936-6261-4666-b464-643234303239/Forbes_logo.svg" alt="">
            <h3 class="my-4 text-[#2052e9] font-bold">@lang('lang.business_text35')</h3>
            <p class="pb-4 text-[14px]">@lang('lang.business_text36')<br> @lang('lang.business_text37')</p>
        </a>
    </div>
    <div class="md:w-[350px] md:py-6 md:px-8 bg-[#f2f4fa] rounded-[20px] mx-10 hidden md:block">
        <a href="#">
            <img class="w-[150px] pt-4" src="https://thumb.tildacdn.com/tild3137-6132-4661-b664-373137303936/-/resize/240x/-/format/webp/Rossiya-24_Logosvg.png" alt="">
            <h3 class="my-4 text-[#2052e9] font-bold">@lang('lang.business_text38')</h3>
            <p class="pb-4 text-[14px]">@lang('lang.business_text39')</p>
        </a>
    </div>
    <div class="md:w-[350px] md:py-6 md:px-8 bg-[#f2f4fa] rounded-[20px] hidden md:block">
        <a href="#">
            <img class="w-[150px] pt-4" src="https://thumb.tildacdn.com/tild6631-6461-4533-b262-616562643131/-/resize/350x/-/format/webp/Logo_Kommersantsvg_1.png" alt="">
            <h3 class="my-4 text-[#2052e9] font-bold">@lang('lang.business_text40')</h3>
            <p class="pb-4 text-[14px]">@lang('lang.business_text41')</p>
        </a>
    </div>
</div>

<div class="max-w-[1100px] mx-auto flex mt-10">
    <div class="md:w-[350px] md:py-6 md:px-8 bg-[#f2f4fa] md:rounded-[20px] px-12">
        <a href="#">
            <img class="w-[50px] pt-4 float-left mr-5" src="https://thumb.tildacdn.com/tild6665-3737-4663-b335-646135323834/-/resize/120x/-/format/webp/1200px-Emblem_of_the.png" alt="">
            <img class="w-[50px] pt-4" src="https://thumb.tildacdn.com/tild6630-3933-4238-a263-653566646439/-/resize/118x/-/format/webp/logorostrud.png" alt="">
            <h3 class="my-4 text-[#2052e9] font-bold">@lang('lang.business_text42')</h3>
            <p class="pb-4 text-[14px]">@lang('lang.business_text43')</p>
        </a>
    </div>
    <div class="md:w-[350px] md:py-6 md:px-8 bg-[#f2f4fa] rounded-[20px] mx-10 hidden md:block">
        <a href="#">
            <img class="w-[150px] pt-4" src="https://thumb.tildacdn.com/tild3434-3863-4930-b731-653263316565/-/resize/268x/-/format/webp/logo_web_ru.png" alt="">
            <h3 class="my-4 text-[#2052e9] font-bold">@lang('lang.business_text44')</h3>
            <p class="pb-4 text-[14px]">@lang('lang.business_text45')</p>
        </a>
    </div>
    <div class="md:w-[350px] md:py-6 md:px-8 bg-[#f2f4fa] rounded-[20px] hidden md:block">
        <a href="#">
            <img class="w-[150px] pt-4" src="https://thumb.tildacdn.com/tild3137-6132-4661-b664-373137303936/-/resize/240x/-/format/webp/Rossiya-24_Logosvg.png" alt="">
            <h3 class="my-4 text-[#2052e9] font-bold">@lang('lang.business_text46')</h3>
            <p class="pb-4 text-[14px]">@lang('lang.business_text47')</p>
        </a>
    </div>
</div>
<div class="text-center py-8">
    <a type="button" href="#contact" class="text-white text-[18px] leading-[1.55] font-[500] bg-center border-transparent bg-[#5a66ff] rounded-[30px] py-3 px-8">@lang('lang.business_manynews')</a>
</div>


<div class="lg:w-[1100px] md:w-[800px] mx-auto bg-[#fdeac2] md:rounded-[30px] my-20">
    <div class="flex">
        <div class="md:w-[600px] float-left md:ml-16 px-10 md:p-0">
            <div class="text-[24px] md:text-[34px] font-bold md:pt-12 pt-8">
                @lang('lang.business_earn') <br> @lang('lang.business_inrek')
            </div>
            <div class="text-[16px] md:text-[20px] py-5">
                @lang('lang.business_text48')
            </div>
            <div class="md:py-8 py-6">
                <a type="button" href="#contact" class="text-white md:text-[18px] leading-[1.55] font-[500] bg-center border-transparent bg-[#5a66ff] rounded-[30px] md:py-3 md:px-8 py-2 px-4">@lang('lang.business_morevebinars')</a>
            </div>
        </div>
        <div class="md:w-[400px] ml-24 py-8 hidden md:block">
            <img src="https://thumb.tildacdn.com/tild3532-3038-4032-b231-363230613735/-/resize/658x/-/format/webp/5.png" alt="">
        </div>
    </div>
</div>

<div id="contact" class="overflow-hidden mx-auto md:mt-16 md:pb-48">
    <div class="md:relative flex">
        <div class="md:relative hidden lg:block md:-ml-36">
            <img src="72.png" alt="">
        </div>
        <div class="md:relative top-24 mx-auto lg:m-0">
            <h1 class="text-[2rem] md:text-[2.5rem] w-[500px] text-center md:text-left md:w-[500px] font-bold font-['Radiance,sans-serif,Noto Sans']">@lang('lang.business_letstalk')</h1>
            <h1 class="text-[1.1rem] md:text-[1.4rem] w-[500px] text-center md:text-left md:w-[500px] font-['Radiance,sans-serif,Noto Sans']">@lang('lang.business_text49')</h1>
            <div class="md:max-w-[500px] mx-auto pl-16 my-10 shadow-2xl rounded-[20px] px-4">
                <table>
                    <thead>
                    <div class="text-[2rem] text-[1.8rem] md:w-[500px] font-bold font-['Radiance,sans-serif,Noto Sans']">@lang('lang.business_submitaplication')</div>
                    </thead>
                    <tbody>
                    <input class="bg-[#f5f5f5] rounded-[20px] block my-4 py-3 px-5 w-10/12" name="" type="text" placeholder="Имя">
                    <input class="bg-[#f5f5f5] rounded-[20px] block my-4 py-3 px-5 w-10/12" name="" type="email" placeholder="Email">
                    <input class="bg-[#f5f5f5] rounded-[20px] block my-4 py-3 px-5 w-10/12" name="" type="text" placeholder="Номер телефона">
                    <input class="bg-[#f5f5f5] rounded-[20px] block my-4 py-3 px-5 w-10/12" name="" type="text" placeholder="Название компании">
                    </tbody>
                    <div class="mt-4 text-[15px] md:text-[18px] font-semibold">
                        @lang('lang.business_text50')
                    </div>
                    <div class="mt-4">
                        <label class="cursor-pointer text-[15px] md:text-[18px]"> &nbsp; <input type="radio" name="#" class="my-2 border-[#5a66ff]">&nbsp;1-30</label><br/>
                        <label class="cursor-pointer text-[15px] md:text-[18px]">&nbsp; <input type="radio" name="#" class="my-2 border-[#5a66ff]">&nbsp;31-100 </label><br/>
                        <label class="cursor-pointer text-[15px] md:text-[18px]"> &nbsp; <input type="radio" name="#" class="my-2 border-[#5a66ff]">&nbsp;101-500</label><br/>
                        <label class="cursor-pointer text-[15px] md:text-[18px]">&nbsp; <input type="radio" name="#" class="my-2 border-[#5a66ff]">&nbsp;500+</label><br/>
                    </div>
                    <div class="py-8">
                        <a type="button" href="#contact" class="text-white w-10/12 text-[18px] leading-[1.55] font-[500] bg-center border-transparent bg-[#5a66ff] rounded-[30px] py-3 md:px-8 text-center">@lang('lang.business_submitaplication')</a>
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
                @lang('lang.business_footer')
            </div>
            <div class="inline">
                <div class="text-bold ml-8 md:-ml-20">
                    <a class="ml-8" href="">@lang('lang.business_aboutus')</a>
                    <a class="ml-8" href="">Facebook</a>
                    <a class="ml-8" href="">Twitter</a>
                    <a class="ml-8" href="">@lang('lang.business_contact')</a>
                    <a href="">@lang('lang.business_text50')</a>
                </div>
            </div>
            <div>
                <a href="#header" class="hidden md:block">@lang('lang.business_tothetop')</a>
            </div>
        </div>
        <div class="max-w-xl mx-auto text-[#9e9e9e] text-[14px] text-center">
           @lang('lang.business_text51')
        </div>
    </div>
</footer>



<script src="https://cdn.tailwindcss.com"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="sweetalert2.all.min.js"></script>
<script src="sweetalert2.min.js"></script>
<link rel="stylesheet" href="sweetalert2.min.css">

</body></html>
