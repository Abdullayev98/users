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
<body class="bg-slate-200">
    <section class="bg-[#494A4C] py-8">
        <div class="lg:w-8/12 mx-auto w-10/12">
                <div class="sm:block lg:flex flex-column justify-between ">
                    <a href="#"> <img class="w-32 mb-4 lg:mb-0" src="{{asset('images/logo.png')}}"></a>
                
                    <a href="/" class="text-white hover:text-gray-400"> 
                        <i class="fa fa-link"></i>
                            Перейти на сайт YouDo  
                    </a>
                </div>
                <h1 class="text-white text-3xl font-light  my-6">Ответы на частые вопросы и рекомендации от YouDo</h1>
                {{-- input --}}
            <form class="">
                <div class="flex relative mx-auto w-full">
                    <button type="submit" class="absolute left-5 top-5">
                        <svg class="text-white h-6 w-6 fill-current" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 56.966 56.966" style="enable-background:new 0 0 56.966 56.966;" xml:space="preserve" width="512px" height="512px">
                            <path d="M55.146,51.887L41.588,37.786c3.486-4.144,5.396-9.358,5.396-14.786c0-12.682-10.318-23-23-23s-23,10.318-23,23  s10.318,23,23,23c4.761,0,9.298-1.436,13.177-4.162l13.661,14.208c0.571,0.593,1.339,0.92,2.162,0.92  c0.779,0,1.518-0.297,2.079-0.837C56.255,54.982,56.293,53.08,55.146,51.887z M23.984,6c9.374,0,17,7.626,17,17s-7.626,17-17,17  s-17-7.626-17-17S14.61,6,23.984,6z" />
                        </svg>
                    </button>
                    <input id="inp" class="bg-[#6d6e70] border-none outline-none transition h-16 pl-16 rounded-md focus:outline-none focus:bg-white w-full text-black text-lg hover:bg-[#7a7b7d]" type="search" name="search" placeholder="Поиск ответов..." />
                </div>                    
            </form>
        </div>                   
    </section>
   
    <section class="mt-7">
        <div class="w-10/12 lg:w-8/12 mx-auto md:flex flex-row justify-center items-center bg-white py-5 px-8 rounded-md shadow-lg shadow-indigo-300/40">
            <img src="{{asset('images/faq-chat-png.png')}}" alt="" class="h-20 md:m-5 mx-auto ">
            <div class="px-6 py-3">
                <h4 class="text-[#515254] text-[18px] mb-1">Как пользоваться сервисом</h4>
                <p class="leading-6 text-[#565867] mb-3 pr-3 text-[16px]">Рассказываем, как заказать услугу или стать исполнителем, а ещё как общаться на сервисе. Новым исполнителям: как взять первое задание и начать зарабатывать. И немного о самых важных правилах площадки. </p>
                <div class="flex flex-row items-center">
                    <img src="{{asset('images/avatar-avtor-image.png')}}" alt="avatar" class="h-8 rounded-full mr-3 object-cover ">
                    
                        <div class="flex flex-col">
                            <a href="#" class="text-slate-500 text-sm">16 статей в этой коллекции </a>
                            <span class="text-sm">Автор:<a href="#" class="text-slate-600"> Агния</a> </span> 
                        </div>
                </div>
            </div>
        </div>
    </section>

    <section class="mt-7 mb-7">
        <div class="w-10/12 lg:w-8/12 mx-auto md:flex flex-row justify-start items-center bg-white py-5 px-8 rounded-md shadow-lg shadow-indigo-400/40">
            <img src="{{asset('images/banned-account-icon.png')}}" alt="" class="h-20 md:m-5 mx-auto ">
            <div class="px-6 py-3">
                <h4 class="text-[#515254] text-[18px] mb-1">Проблемы с доступом к аккаунту</h4>
                <p class="leading-6 text-[#565867] mb-3 pr-3 text-[16px]">Даже если доступ к аккаунту утерян, его можно восстановить самостоятельно.  </p>
                <div class="flex flex-row items-center">
                    <img src="{{asset('images/avatar-avtor-image.png')}}" alt="avatar" class="h-8 rounded-full mr-3 object-cover ">
                    
                        <div class="flex flex-col">
                            <a href="#" class="text-slate-500 text-sm">16 статей в этой коллекции </a>
                            <span class="text-sm">Автор:<a href="#" class="text-slate-600"> Агния</a> </span> 
                        </div>
                </div>
            </div>
        </div>
    </section>

    <footer class="bg-white w-full flex flex-col p-8 justify-center items-center">
        <h2>YouDo.com</h2>
        <p>Мы используем Intercom</p>
    </footer>



    <script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
<script src="https://cdn.tailwindcss.com"></script>
<script>
    $(function() {
    $("#inp").focus(function(){
        $("svg").removeClass("text-white");
        $("svg").addClass("text-black");
    });
});
</script>
</body>