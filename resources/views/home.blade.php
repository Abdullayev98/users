<!DOCTYPE html>
<html lang="{{setting('language','en')}}" dir="ltr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{setting('app_name')}} | {{setting('app_short_description')}}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="{{$app_logo ?? ''}}"/>
    <link rel="stylesheet" href="{{asset('vendor/fontawesome-free/css/all.min.css')}}">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,600" rel="stylesheet">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('dist/css/adminlte.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/styles.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/login.css')}}">
</head>
<body>



<div>
    <div class="relative pt-6 px-4 sm:px-6 lg:px-8">
        <nav class="relative flex items-center justify-between sm:h-10 lg:justify-start" aria-label="Global">
            <div class="flex items-center flex-grow flex-shrink-0 lg:flex-grow-0">
                <div class="flex items-center justify-between w-full md:w-auto">
                    <a href="#">
                        <img class="h-6 w-auto sm:h-10" src="https://assets.youdo.com/_next/static/media/logo.68780febe8ce798e440ca5786b505cd5.svg">
                    </a>
                    <div class="mr-2 flex items-center md:hidden">
                        <button type="button" class="bg-white rounded-md p-2 inline-flex items-center justify-center text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500" aria-expanded="false">

                            <!-- Heroicon name: outline/menu -->
                            <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
            <div class="hidden w-full md:inline-block md:ml-32 md:pr-4 lg:space-x-8 md:space-x-6 pt-0 mb-6">
                <a href="#" class="font-medium text-gray-500 hover:text-gray-900">Создать задание</a>

                <a href="#" class="font-medium text-gray-500 hover:text-gray-900">Найти задания</a>

                <a href="#" class="font-medium text-gray-500 hover:text-gray-900">Исполнители</a>
                <a href="/home/profile" class="font-medium text-gray-500 hover:text-gray-900">profil</a>
<!--
                <a href="#" class="font-medium text-gray-500 hover:text-gray-900">Мои заказы</a>
-->
{{--                <p class="text-center inline float-right md:float-none  "><a href="#" class="font-medium hover:text-yellow-500">Вход</a> или <a href="#" class="font-medium hover:text-yellow-500">регистрация</a></p>--}}

            </div>
            <p class="w-full text-right inline float-right md:float-none mb-6"><a href="#" class="font-medium hover:text-yellow-500" id="open-btn">Вход</a> или <a href="#" class="font-medium hover:text-yellow-500">Регистрация</a></p>
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

<div class="bg-[url('https://assets.youdo.com/next/_next/static/images/frame-51209c6822214bfb9166eb41c4dec591.jpg')] bg-center bg-cover h-96 ">
    <div class="container-lg mx-auto">
        <main class="xl:mx-96 lg:mx-60 md:mx-48 sm:mx-32">
            <div class="text-center pt-32">
                <h1 class="font-semibold text-white text-3xl lg:text-5xl md:text-4xl">
                    <span class="block xl:block">Освободим вас от забот</span>
                </h1>
                <p class="mt-3 text-base text-white sm:mt-5 text-sm sm:mx-auto md:mt-5 md:text-sm md:mt-2 mb-3">
                    Поможем найти надежного исполнителя для любых задач
                </p>
                <div class="w-3/4 mx-auto">
                <div class="flew w-full bg-white hover:shadow-[0_5px_30px_-0_rgba(255,138,0,4)] transition duration-200 rounded-md mx-auto">
                    {{--                        <input type="text" placeholder="Например, составить иск" class="w-2/3 md: focus:outline-none sm:left-24 rounded-md text-black md:text-md md:pl-2 sm:w-1/2 py-2.5">--}}
                        <input type="text" placeholder="Например, составить иск" class="w-auto md:left-32 focus:outline-none sm:left-24 rounded-md text-black md:text-md md:pl-2 sm:w-2/3 py-2.5">
                        <button type="submit" class="float-right border bg-yellow-500  border-transparent font-medium  rounded-md text-white px-3.5 py-1 mr-1 mt-1 md:text-md md:pb-1 text-white">
                            Заказать услугу
                        </button>
                    </div>
                    <div class="text-left mt-2 text-gray-700 underline-offset-1 text-sm">
                        Например: <a href="#" class="hover:text-slate-400">повесить кондиционер</a>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>

    <div class="fixed hidden inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full" id="my-modal">
        <!--modal content-->
        <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
            @include('profile.login')
        </div>
    </div>

    <script>
        // Grabs all the Elements by their IDs which we had given them
        let modal = document.getElementById("my-modal");

        let btn = document.getElementById("open-btn");

        // let button = document.getElementById("ok-btn");

        // We want the modal to open when the Open button is clicked
        btn.onclick = function() {
            modal.style.display = "block";
        }
        // We want the modal to close when the OK button is clicked
        // button.onclick = function() {
        //     modal.style.display = "none";
        // }
        // The modal will close when the user clicks anywhere outside the modal
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
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
                }
            }
        }
    </script>


<script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
<script src="https://cdn.tailwindcss.com"></script>
<script src="{{asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

</body>
</html>
