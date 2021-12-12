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
    <link href="https://cdn.jsdelivr.net/npm/@tailwindcss/custom-forms@0.2.1/dist/custom-forms.css" rel="stylesheet"/>
    <link rel="stylesheet" href="{{asset('dist/css/adminlte.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/styles.min.css')}}">
    <script src="https://api-maps.yandex.ru/2.1/?lang=ru_RU&amp;apikey=<ваш API-ключ>" type="text/javascript"></script>
<script src="icon_customImage.js" type="text/javascript"></script>
</head>
<style>
   #map {
        width: 100%; height: 100%; padding: 0; margin: 0;
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
<!-- <form class="" action="" method="post"> -->
<div class="mx-auto w-2/3 my-16">
<div class="grid grid-cols-3">
  <div class="col-span-2">
    <div class="w-full text-center text-2xl">
      Ищем исполнителя для задания " "
    </div>
    <div class="w-full text-center my-4 text-[#5f5869]">
      Задание заполнено на 29%
    </div>
    <div class="relative pt-1">
      <div class="overflow-hidden h-2 text-xs flex rounded bg-gray-200 w-3/4 mx-auto ">
        <div style="width: 29%" class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-green-500"></div>
      </div>
    </div>
    <div class="shadow-lg w-full mx-auto mt-4 h-full rounded-2xl	w-full">
      <div class="py-4 w-1/2 mx-auto px-auto text-center text-3xl texl-bold">
        Где выполнить задание?
      </div>
      <div class="py-4 w-1/2 mx-auto px-auto text-center text-sm texl-bold">
        Укажите адрес или место, чтобы найти исполнителя рядом с вами.
      </div>
      <div class="py-4 w-11/12 mx-auto px-auto text-left my-4">
        <div class="mb-4">
          <div id="formulario">
          <div class="flex items-center rounded-lg border shadow-xl py-2">
              <button class="flex-shrink-0 border-transparent text-teal-500 text-md py-1 px-2 rounded focus:outline-none" type="button">
                A
              </button>
              <input class="appearance-none bg-transparent w-full text-gray-700 mr-3 py-1 px-2 leading-tight focus:outline-none" type="text" placeholder="Город, Улица, Дом" aria-label="Full name">
              <button class="flex-shrink-0 border-transparent border-4 text-teal-500 hover:text-teal-800 text-sm py-1 px-2 rounded" type="button">
                <svg class="h-4 w-4 text-purple-500"  width="12" height="12" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">  <path stroke="none" d="M0 0h24v24H0z"/>  <path d="M21 3L14.5 21a.55 .55 0 0 1 -1 0L10 14L3 10.5a.55 .55 0 0 1 0 -1L21 3" /></svg>
              </button>
          </div>
          </div>
          <div class="mt-4">
            <button type="button" onClick="addInput();" class="w-full border-dashed border border-[#000] rounded-lg h-12 text-center" name="button">
              <svg class="h-4 w-4 text-gray-500 float-left"  fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
              </svg>
              <span >Добавить ещё адрес</span>
             </button>
             <div id="map"></div>
          </div>
        </div>
        <a href="/create/task"><input type="submit" class="bg-inherit border border-[#000] float-left w-1/3 ml-5 my-4 text-black font-bold py-2 px-4 rounded" name="" value="Назад"></a>
        <input type="submit" class="bg-[#6fc727] hover:bg-[#5ab82e] w-1/2 float-right ml-5 my-4 text-white font-bold py-2 px-4 rounded" name="" value="Далее">
      </div>
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
<!-- </form> -->

<script>

  function addInput(){
    var newdiv = document.createElement('div');
    //newdiv.id = dynamicInput[counter];
    newdiv.outerHTML = '';
    document.getElementById('formulario').appendChild(newdiv);
  }

  function removeInput(btn){
      btn.parentNode.remove();
  }

</script>
  <script>
  let content = document.getElementById("content")
let show = document.getElementById("showContent")
let hide = document.getElementById("hideContent")

show.addEventListener("click", () => {
  content.style.display = "block"
  show.style.display = "none"
})

hide.addEventListener("click", () => {
  content.style.display = "none"
})
  </script>

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
<script src="{{asset('js/maps.js')}}"></script>
<script src="https://cdn.tailwindcss.com"></script>
<script src="{{asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

</body>
</html>
