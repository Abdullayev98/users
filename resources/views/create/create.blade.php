<!DOCTYPE html>
<html lang="'en'" dir="ltr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="{{$app_logo ?? ''}}"/>
    <link rel="stylesheet" href="{{asset('vendor/fontawesome-free/css/all.min.css')}}">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,600" rel="stylesheet">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('dist/css/adminlte.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/styles.min.css')}}">
</head>
<style>
  .btn {
    @apply font-bold py-2 px-4 rounded;
  }
  .btn-blue {
    @apply bg-blue-500 text-white;
  }
  .btn-blue:hover {
    @apply bg-blue-700;
  }
</style>
<body>



<div>
    <div class="relative pt-6 px-4 sm:px-6 lg:px-8 border-b">
        <nav class="relative flex items-center justify-between sm:h-10 lg:justify-start" aria-label="Global">
            <div class="flex items-center flex-grow flex-shrink-0 lg:flex-grow-0">
                <div class="flex items-center justify-between w-full md:w-auto">
                    <a href="#">
                        <img class="h-6 w-auto sm:h-10" src="https://assets.youdo.com/_next/static/media/logo.68780febe8ce798e440ca5786b505cd5.svg">
                    </a>
                    <div class="-mr-2 flex items-center md:hidden">
                        <button type="button" class="bg-white rounded-md p-2 inline-flex items-center justify-center text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500" aria-expanded="false">

                            <!-- Heroicon name: outline/menu -->
                            <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
            <div class="hidden w-full md:inline-block md:ml-32 md:pr-4 lg:space-x-8 md:space-x-6">
                <a class="font-medium text-gray-500/25 hover:text-gray-500/25 focus:outline-none">Создать задание</a>

                <a href="#" class="font-medium text-gray-500 hover:text-gray-900">Найти задания</a>

                <a href="#" class="font-medium text-gray-500 hover:text-gray-900">Исполнители</a>
<!--
                <a href="#" class="font-medium text-gray-500 hover:text-gray-900">Мои заказы</a>
-->
{{--                <p class="text-center inline float-right md:float-none  "><a href="#" class="font-medium hover:text-yellow-500">Вход</a> или <a href="#" class="font-medium hover:text-yellow-500">регистрация</a></p>--}}

            </div>
            <p class="w-full text-right inline float-right md:float-none"><a href="#" class="font-medium hover:text-yellow-500">Вход</a> или <a href="#" class="font-medium hover:text-yellow-500">Регистрация</a></p>
        </nav>
    </div>

    <!--
      Mobile menu, show/hide based on menu open state.

      Entering: "duration-150 ease-out"
        From: "opacity-0 scale-95"
        To: "opacity-100 scale-100"
      Leaving: "duration-100 ease-in"
        From: "opacity-100 scale-100"
        To: "opacity-0 scale-95"
    -->



<!-- Information section -->
<div class="bg-[#f5f5fa] bg-center bg-cover mt-4 h-40 py-4 invisible lg:visible">
  <div class="row-start-2 row-span-2 mx-56 h-full">
    <div class="grid grid-cols-3 gap-6 h-full">
      <div class="text-left h-full">
        <div class="grid grid-cols-3 h-full">
        <div class="step w-full text-center h-full text-8xl pt-4 text-[#a199aa]">1</div>
        <div class="w-full col-span-2">
          <div class="text-left text-xl font-bold pt-4 w-full h-1/2">Опишите задание</div>
          <div class="text-left text-sm w-full h-1/2 text-[#a199aa] ">Мы оповестим о нём подходящих исполнителей.</div>
        </div>
        </div>
      </div>
      <div class="text-left h-full">
        <div class="grid grid-cols-3 h-full">
        <div class="step w-full text-center h-full  text-8xl pt-4 text-[#a199aa]">2</div>
        <div class="w-full col-span-2">
          <div class="text-left text-xl font-bold pt-4 w-full h-1/2 ">Получите отклики</div>
          <div class="text-left text-sm w-full h-1/2 text-[#a199aa]">Заинтересованные исполнители предложат свои услуги.</div>
        </div>
        </div>
      </div>
      <div class="text-left h-full">
        <div class="grid grid-cols-3 h-full">
        <div class="step w-full text-center h-full  text-8xl pt-4 text-[#a199aa]">3</div>
        <div class="w-full col-span-2">
          <div class="text-left text-xl font-bold pt-4 w-full h-1/2 ">Выберите исполнителя</div>
          <div class="text-left text-sm w-full h-1/2 text-[#a199aa]">Обращайте внимание на проверенных исполнителей.</div>
        </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="mx-auto w-3/4 my-16">
<div class="grid grid-cols-3 h-full">
  <div class="col-span-2">
    <div class="w-full text-center text-2xl">
          Поможем найти исполнителя для вашего задания
    </div>
    <div class="w-full text-center my-4 text-[#5f5869]">
      Задание заполнено на 14%
    </div>
    <div class="relative pt-1">
      <div class="overflow-hidden h-2 text-xs flex rounded bg-gray-200 w-3/4 mx-auto ">
        <div style="width: 14%" class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-green-500"></div>
      </div>
    </div>
    <div class="shadow-lg w-3/4 h-96 mx-auto my-4 rounded-2xl	w-full">
      <div class="py-4 w-1/2 mx-auto px-auto text-center text-3xl texl-bold">
        Чем вам помочь?
      </div>
      <div class="py-4 w-11/12 mx-auto px-auto text-left my-4">
        <div class="mb-4">
          <label class="block text-[#5f5869] text-sm mb-2" for="username">
            Название задания
          </label>
          <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="username" type="text" placeholder="Например, нужен курьер на несколько доставок">
          <div class="mt-4">
            <label class="text-sm mb-2">
              Подкатегория <span class="underline hover:text-[#5f5869]">Другая посылка</span>
            </label>
          </div>
        </div>
      </div>
      <input type="submit" class="bg-[#6fc727] hover:bg-[#5ab82e] w-11/12 ml-5 my-4 text-white font-bold py-2 px-4 rounded" name="" value="Далее">
    </div>
  </div>
  <div class="col-span">
    <div class=" text-left text-2xl text-[#5f5869] w-11/12 ml-4">
      Частые вопросы
  <p><a href="#" class="text-blue-500 hover:text-[#ffa200] hover:underline text-xs">Сколько откликов я получу?</a></p>
  <p><a href="#" class="text-blue-500 hover:text-[#ffa200] hover:underline text-xs">Обязательно ли выбирать исполнителя?</a></p>
  <p><a href="#" class="text-blue-500 hover:text-[#ffa200] hover:underline text-xs">Какую цену установить?</a></p>
  <p><a href="#" class="text-blue-500 hover:text-[#ffa200] hover:underline text-xs">Как оплачивать услуги исполнителя?</a></p>
  <p><a href="#" class="text-blue-500 hover:text-[#ffa200] hover:underline text-xs">Как выбрать надежного исполнителя?</a></p>
  <p><a href="#" class="text-blue-500 hover:text-[#ffa200] hover:underline text-xs">Как не выбрать исполнителем мошенника?</a></p>
    </div>






  </div>
</div>
</div>



    <script>
        window.replainSettings = { id: '38d8d3f0-b690-4857-a153-f1e5e8b462a8' };
        (function(u){var s=document.createElement('script');s.type='text/javascript';s.async=true;s.src=u;
            var x=document.getElementsByTagName('script')[0];x.parentNode.insertBefore(s,x);
        })('https://widget.replain.cc/dist/client.js');
    </script>

    <script>
        tailwind.config = {
            module.exports = {
                purge: [],
                theme: {
                    screens: {
                        'tablet': '700px',
                    },
                    colors: {
                        'orange': '#ff8a00',
                    },
                    boxShadowColor: {
                        'sabzirang': '#ff8a00',
                    },
                    extend: {
                      boxShadow: {
                          '3xl': '0 35px 60px -15px rgba(0, 0, 0, 0.3)',
                        }
                    }
                }
        }
      }
    </script>


<script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
<script src="https://cdn.tailwindcss.com"></script>
<script src="{{asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

</body>
</html>
