<!DOCTYPE html>
<html lang="{{setting('language','en')}}" dir="ltr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>F.A.Q </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="{{$app_logo ?? ''}}"/>
    <link rel="stylesheet" href="{{asset('vendor/fontawesome-free/css/all.min.css')}}">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,600" rel="stylesheet">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">


</head>

<body>

    <section class="bg-gray-500 py-8 mb-7">
        <div class="lg:w-8/12 mx-auto w-10/12">
                <div class="sm:block lg:flex flex-column justify-between ">
                    <a href="/"> <img class="lg:w-32 md:w-24 sm:w-20 w-16 mb-4 lg:mb-0" src="{{asset('images/logo.png')}}"></a>

                    <a href="/" class="lg:md:text-base sm:text-sm text-xs text-white hover:text-yellow-400">
                        <i class="fa fa-link"></i>
                            @lang('lang.faq-ans_text')
                    </a>
                </div>
                <h1 class="text-white lg:text-3xl md:text-2xl sm:text-xl font-light  my-6">@lang('lang.faq-ans_text1')</h1>
                {{-- input --}}
            <form class="">
                <div class="flex relative mx-auto w-full">
                    <button type="submit" class="absolute left-5 top-5">
                        <svg class="text-white lg:h-6 lg:w-6 md:h-5 md:w-5 h-4 w-4 fill-current" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 56.966 56.966" style="enable-background:new 0 0 56.966 56.966;" xml:space="preserve" width="512px" height="512px">
                            <path d="M55.146,51.887L41.588,37.786c3.486-4.144,5.396-9.358,5.396-14.786c0-12.682-10.318-23-23-23s-23,10.318-23,23  s10.318,23,23,23c4.761,0,9.298-1.436,13.177-4.162l13.661,14.208c0.571,0.593,1.339,0.92,2.162,0.92  c0.779,0,1.518-0.297,2.079-0.837C56.255,54.982,56.293,53.08,55.146,51.887z M23.984,6c9.374,0,17,7.626,17,17s-7.626,17-17,17  s-17-7.626-17-17S14.61,6,23.984,6z" />
                        </svg>
                    </button>
                    <input id="inp" class="bg-gray-400 border-none outline-none transition h-16 pl-16 rounded-md focus:outline-none focus:bg-white w-full text-black lg:md:text-base text-base hover:bg-gray-300" type="search" name="search" placeholder="Поиск ответов..." />
                </div>
            </form>
        </div>
    </section>

    <div class="lg:w-8/12 mx-auto w-10/12 text-gray-500">
        <span class="lg:md:text-base sm:text-sm text-xs">@lang('lang.faq-ans_allcollection')  <i class="fa fa-angle-right text-sm"></i> {{$fc->getTranslatedAttribute('title',Session::get('lang') , 'fallbackLocale')}}</span>
    </div>

     <section class="mt-7">
        <div class="lg:w-10/12 md:w-8/12 mx-auto md:flex flex flex-col justify-start bg-slate-100 py-5 px-8 rounded-md shadow-lg shadow-indigo-300/40">
            <div class="md:flex flex flex-row">
                <img src="{{asset('images/faq-chat-png.png')}}" alt="" class="lg:h-20 md:h-16 sm:h-14 h-10 md:m-5 mx-auto lg:mt-8 md:mt-10 mt-10">
                    <div class="px-6 py-3">
                        <h4 class="lg:text-[28px] md:text-[24px] sm:text-[20px] text-gray-500 text-[16px] mb-1">{{$fc->getTranslatedAttribute('title',Session::get('lang') , 'fallbackLocale')}}</h4>
                        <p class=" lg:text-[16px] md:text-[14px] sm:text-[12px] leading-6 text-gray-400 mb-3 pr-3 text-[10px]">{{$fc->getTranslatedAttribute('description',Session::get('lang') , 'fallbackLocale')}} </p>
                        <div class="flex flex-row items-center">
                            <!-- <img src="{{asset('images/avatar-avtor-image.png')}}" alt="avatar" class="h-8 rounded-full mr-3 object-cover "> -->

                                <!-- <div class="flex flex-col">
                                    <a href="#" class="text-slate-500 text-sm">16 статей в этой коллекции </a>
                                    <span class="text-sm">Автор:<a href="#" class="text-slate-600"> Агния</a> </span>
                                </div> -->
                        </div>
                    </div>
            </div>
            <div class="w-full">
                <h5 class="lg:md:text-base sm:text-sm text-xs font-semibold mb-3">@lang('lang.faq-ans_allquestions')</h5>
            </div>
            <div class="w-full bg-white border border-gray-300 rounded-t-md lg:p-[25px] md:p-[20px] sm:p-[15px] p-[10px] divide-y">
              @foreach($fq as $faq)
                <div class="w-full lg:py-4 md:py-3 sm:py-2 py-1">
                    <!-- <a href="#"> -->
                        <h2 class="text-gray-800 lg:md:text-base sm:text-sm text-xs">{{$faq->getTranslatedAttribute('question',Session::get('lang') , 'fallbackLocale')}}</h2>
                    <!-- </a> -->
                    <p class="text-gray-600 lg:md:text-base sm:text-sm text-xs">{{$faq->getTranslatedAttribute('q_descript',Session::get('lang') , 'fallbackLocale')}}</p>
                    <div class="flex flex-row items-center">
                      <p class="text-gray-600 lg:md:text-base sm:text-sm text-xs">Ответ: {{$faq->getTranslatedAttribute('answer_text',Session::get('lang') , 'fallbackLocale')}}</p>

                                <!-- <img src="{{asset('images/avatar-avtor-image.png')}}" alt="avatar" class="h-8 rounded-full mr-3 object-cover "> -->
                            <!-- <div class="flex flex-col"> -->
                                <!-- <a href="#" class="text-slate-500 text-sm">16 статей в этой коллекции </a> -->
                                <!-- <span class="text-sm">Автор:<a href="#" class="text-slate-600"> Агния</a> </span> -->
                            <!-- </div> -->
                    </div>
                 </div>
                 @endforeach
                <!-- <div class="w-full py-4">
                    <a href="#">
                        <h2 class="text-gray-800 text-xl">Как зарегистрироваться на сайте</h2>
                    </a>
                    <p class="text-gray-600">О возможных вариантах регистрации и этапах этого процесса</p>
                    <div class="flex flex-row items-center">
                                <img src="{{asset('images/avatar-avtor-image.png')}}" alt="avatar" class="h-8 rounded-full mr-3 object-cover ">
                            <div class="flex flex-col">
                                <a href="#" class="text-slate-500 text-sm">16 статей в этой коллекции </a>
                                <span class="text-sm">Автор:<a href="#" class="text-slate-600"> Агния</a> </span>
                            </div>
                    </div>
                </div>
                <div class="w-full py-4">
                    <a href="#">
                        <h2 class="text-gray-800 text-xl">Как зарегистрироваться на сайте</h2>
                    </a>
                    <p class="text-gray-600">О возможных вариантах регистрации и этапах этого процесса</p>
                    <div class="flex flex-row items-center">
                                <img src="{{asset('images/avatar-avtor-image.png')}}" alt="avatar" class="h-8 rounded-full mr-3 object-cover ">
                            <div class="flex flex-col">
                                <a href="#" class="text-slate-500 text-sm">16 статей в этой коллекции </a>
                                <span class="text-sm">Автор:<a href="#" class="text-slate-600"> Агния</a> </span>
                            </div>
                    </div>
                </div> -->
            </div>
        </div>
    </section>


</body>
