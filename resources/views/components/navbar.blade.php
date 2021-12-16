
<nav class="relative flex items-center mx-6 md:w-10/12 md:mx-auto justify-between  lg:justify-start font-[sans-serif]" aria-label="Global">
    <div class="flex items-center flex-grow flex-shrink-0 lg:flex-grow-0">
        <div class="flex items-center justify-between w-full md:w-auto">
            <a href="/">
                <img src="{{asset('/images/logo.png')}}" class="overflow-hidden h-16 py-2" alt="" />
            </a>
        </div>
        <nav class="relative md:w-10/12 lg:w-auto px-4 py-4 flex justify-end items-center bg-white">
            <div class="lg:hidden">
                <button class="navbar-burger flex items-center text-yellow-500 p-3">
                    <svg class="block h-4 w-4 fill-current" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <title>Mobile menu</title>
                        
                        <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"></path>
                    </svg>
                </button>
            </div>
        </nav>
        <div class="navbar-menu relative z-50 hidden">
            <div class="navbar-backdrop fixed inset-0 bg-gray-800 opacity-25"></div>
            <nav class="fixed top-0 left-0 bottom-0 flex flex-col w-5/6 max-w-sm py-6 px-6 bg-white border-r overflow-y-auto">
                <div class="flex items-center mb-8">
                    <a class="mr-auto text-3xl font-bold leading-none" href="#">
                        <svg class="h-12" alt="logo" viewBox="0 0 10240 10240">

                        </svg>
                    </a>
                    <button class="navbar-close">
                        <svg class="h-6 w-6 text-gray-400 cursor-pointer hover:text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>
                <div>
                    <ul>
                        <li class="mb-1">
                            <a class="block p-4 text-sm font-semibold text-gray-400 hover:bg-blue-50 hover:text-blue-600 rounded" href="#">Создать задание</a>
                        </li>
                        <li class="mb-1">
                            <a class="block p-4 text-sm font-semibold text-gray-400 hover:bg-blue-50 hover:text-blue-600 rounded" href="#">About Us</a>
                        </li>
                        <li class="mb-1">
                            <a class="block p-4 text-sm font-semibold text-gray-400 hover:bg-blue-50 hover:text-blue-600 rounded" href="#">Services</a>
                        </li>
                        <li class="mb-1">
                            <a class="block p-4 text-sm font-semibold text-gray-400 hover:bg-blue-50 hover:text-blue-600 rounded" href="#">Pricing</a>
                        </li>
                        <li class="mb-1">
                            <a class="block p-4 text-sm font-semibold text-gray-400 hover:bg-blue-50 hover:text-blue-600 rounded" href="#">Contact</a>
                        </li>
                    </ul>
                </div>
                <div class="mt-auto">
                    <div class="pt-6">
                        @if (Route::has('login'))
                            @auth
                                <p class="w-full text-right inline-block float-right md:float-none mt-6 mb-6 mr-6">
                                    <button href="#" class="font-medium hover:text-yellow-500">
                                        <i class="far fa-bell"></i>
                                    </button>
                                    <button href="#" class="font-medium hover:text-yellow-500">
                                        <i class="far fa-user"></i>
                                    </button>
                                </p>
                            @else
                                <p class="w-full text-right inline-block float-right md:float-none mt-6 mb-6">
                                    <a href="{{ route('login') }}" class="font-medium hover:text-yellow-500">
                                        Вход
                                    </a>
                                    или
                                    <a href="{{ route('register') }}" class="font-medium hover:text-yellow-500">
                                        Регистрация
                                    </a>
                                    <a href="{{ route('logout') }}" class="btn btn-danger">
                                        Sign-out
                                    </a>
                                </p>
                            @endauth
                        @endif

                    </div>
                    <p class="my-4 text-xs text-center text-gray-400">
                        <span>Copyright © 2021</span>
                    </p>
                </div>
            </nav>
        </div>
    </div>
    <div class="hidden w-full lg:inline-block xl:ml-24 lg:ml-12 md:pr-4 lg:space-x-8 md:space-x-6">
        <div class="group inline-block">
            <button class="font-medium text-gray-500 hover:text-[#ffa200] focus:outline-none">
                <span class="pr-1  font-[sans-serif] flex-1">Создать задание</span>
                <span></span>
            </button>
            <ul class="bg-white border rounded-md transform scale-0 group-hover:scale-100 absolute transition duration-150 ease-in-out origin-top ">
                @foreach (\TCG\Voyager\Models\Category::query()->where('parent_id', null)->get() as $category)
                    <li class="py-2 px-4 rounded-sm hover:bg-gray-200">
                        <button class="w-full text-left flex items-center outline-none focus:outline-none">
                            <span class="pr-1 flex-1">{{ $category->name }}</span>
                            <span class="mr-auto">
                                <svg class="fill-current h-4 w-4 transition duration-150 ease-in-out" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                                </svg>
                            </span>
                        </button>
                        <ul class="bg-white border rounded-sm absolute top-0 right-0 transition duration-150 ease-in-out origin-top-left w-100">

                            @foreach (\TCG\Voyager\Models\Category::query()->where('parent_id', $category->id)->get() as $category2)
                                <li class="rounded-sm">
                                    <a class=" py-3 px-5 w-full block hover:bg-gray-100" href="/task/create?category_id={{ $category2->id }}">
                                        {{ $category2->name }}
                                    </a>
                                </li>
                            @endforeach

                        </ul>
                    </li>
                @endforeach
            </ul>
        </div>

        <style>
            /* since nested groupes are not supported we have to use
               regular css for the nested dropdowns
            */
            li>ul {
                transform: translatex(100%) scale(0)
            }

            li:hover>ul {
                transform: translatex(101%) scale(1)
            }

            li>button svg {
                transform: rotate(-90deg)
            }

            li:hover>button svg {
                transform: rotate(-270deg)
            }

            /* Below styles fake what can be achieved with the tailwind config
               you need to add the group-hover variant to scale and define your custom
               min width style.
                 See https://codesandbox.io/s/tailwindcss-multilevel-dropdown-y91j7?file=/index.html
                 for implementation with config file
            */
            .group:hover .group-hover\:scale-100 {
                transform: scale(1)
            }

            .group:hover .group-hover\:-rotate-180 {
                transform: rotate(180deg)
            }

            .scale-0 {
                transform: scale(0)
            }

            .min-w-32 {
                min-width: 8rem
            }
        </style>
        <a href="{{ route('task.search') }}" class="font-medium delete-task text-gray-500 hover:text-[#ffa200]">Найти задания</a>

        <a href="/performers" class="font-medium text-gray-500 hover:text-[#ffa200]">Исполнители</a>
        {{--<!--
                        <a href="#" class="font-medium text-gray-500 hover:text-gray-900">Мои заказы</a>
        -->
         <p class="text-center inline float-right md:float-none  "><a href="#" class="font-medium hover:text-yellow-500">Вход</a> или <a href="#" class="font-medium hover:text-yellow-500">регистрация</a></p>
         <button
         class="text-green-300 rounded-md w-36 absolute right-44  text-base font-medium hover:text-green-700 inline-block"
         id="open-btn">
         <i class="fas fa-wallet inline-block"></i>
         <span class="inline-block">пополнить</span>
         </button> --}}
    </div>
    @if (Route::has('login'))
        @auth
            <p class="w-full text-right inline-block float-right md:float-none mt-6 mb-6 mr-6">
                <button href="#" class="font-medium hover:text-yellow-500 mr-3">
                    <i class="far fa-bell"></i>
                </button>
                <button href="#" class="font-medium hover:text-yellow-500 mr-3">
                    <i class="far fa-user"></i>
                </button>
                <a href="{{ route('logout') }}" class="btn btn-danger">
                    Sign-out
                </a>
            </p>
        @else
            <p class="w-full text-right inline-block float-right md:float-none mt-6 mb-6">
                <a href="{{ route('login') }}" class="font-medium hover:text-yellow-500">
                    Вход
                </a>
                или
                <a href="{{ route('register') }}" class="font-medium hover:text-yellow-500">
                    Регистрация
                </a>
            </p>
        @endauth
    @endif
    
</nav>


{{-- pay modal start --}}
<div class="fixed hidden z-50 inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full" id="my-modal1">
    <div class="relative top-20 mx-auto p-5 border w-2/5 shadow-lg rounded-md bg-white">
        <div class="mt-3 text-center">
            <button type="submit" id="close-btn1" class="px-4 py-4 bg-gray-300 rounded-md w-100 h-16 absolute right-4 top-4 hover:bg-gray-500">
                <i class="fas fa-times text-white text-3xl w-full"></i>
            </button>
            <div class="mx-auto flex items-center justify-center w-full">
                <h3 class="font-bold text-4xl block">
                    На какую сумму хотите пополнить кошелёк?
                </h3>
            </div>
            <input class="ml-3 mt-10 w-30 h-20 ring-1 rounded-xl ring-gray-100" type='number' />

            <p class="text-sm leading-6 text-gray-400">Сумма пополнения, минимум — 60 000сум</p>
            <div class="mt-2 px-7 py-3">
                <input type="checkbox" class="w-5 h-5 rounded-md inline-block " />
                <p class="text-md inline-block ml-2">Оформить полис на 7 дней за 15 000 сум</p>
            </div>
            <div class="items-center px-4 py-3">
                <button id="ok-btn1" class="px-4 py-2 bg-green-500 text-white text-xl font-medium rounded-md w-2/5 h-16  shadow-sm hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-300">
                    К оплате x сум
                </button>
                <p>* — Порядок выплаты, ограничения и полные условия определены в <a href="/home/oferta" class="cursor-pointer text-sm text-blue-400 underline">Оферте</a></p>
            </div>
        </div>
    </div>
</div>
{{-- pay modal end --}}

<script>
    // Burger menus
    document.addEventListener('DOMContentLoaded', function() {
        // open
        const burger = document.querySelectorAll('.navbar-burger');
        const menu = document.querySelectorAll('.navbar-menu');

        if (burger.length && menu.length) {
            for (var i = 0; i < burger.length; i++) {
                burger[i].addEventListener('click', function() {
                    for (var j = 0; j < menu.length; j++) {
                        menu[j].classList.toggle('hidden');
                    }
                });
            }
        }

        // close
        const close = document.querySelectorAll('.navbar-close');
        const backdrop = document.querySelectorAll('.navbar-backdrop');

        if (close.length) {
            for (var i = 0; i < close.length; i++) {
                close[i].addEventListener('click', function() {
                    for (var j = 0; j < menu.length; j++) {
                        menu[j].classList.toggle('hidden');
                    }
                });
            }
        }

        if (backdrop.length) {
            for (var i = 0; i < backdrop.length; i++) {
                backdrop[i].addEventListener('click', function() {
                    for (var j = 0; j < menu.length; j++) {
                        menu[j].classList.toggle('hidden');
                    }
                });
            }
        }
    });
</script>



@section("javascript")


    <script>
        let modal = document.getElementById("my-modal");
        //login start
        let modal = document.getElementById("my-modal");


        let btn = document.getElementById("open-btn");

        let button = document.getElementById("ok-btn");

        let closebtn = document.getElementById("close-btn");

        closebtn.onclick = function() {
            modal.style.display = "none";
        }

        btn.onclick = function() {
            modal.style.display = "block";
        }
        // We want the modal to close when the OK button is clicked
        button.onclick = function() {
            modal.style.display = "none";
        }


        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
        //login end

        //register start
        let modal2 = document.getElementById("my-modal2");

        let btn2 = document.getElementById("open-btn2");

        let button2 = document.getElementById("ok-btn2");

        let closebtn2 = document.getElementById("close-btn2");

        closebtn2.onclick = function() {
            modal2.style.display = "none";
        }

        btn2.onclick = function() {
            modal2.style.display = "block";
        }
        // We want the modal to close when the OK button is clicked
        button2.onclick = function() {
            modal2.style.display = "none";
        }

        window.onclick = function(event) {
            if (event.target == modal2) {
                modal2.style.display = "none";
            }
        }
        // register end

        //pay modal start
        let modal1 = document.getElementById("my-modal1");

        let btn1 = document.getElementById("open-btn1");

        let button1 = document.getElementById("ok-btn1");

        let closebtn1 = document.getElementById("close-btn1");

        closebtn1.onclick = function() {
            modal1.style.display = "none";
        }

        btn1.onclick = function() {
            modal1.style.display = "block";
        }
        // We want the modal to close when the OK button is clicked
        button1.onclick = function() {
            modal1.style.display = "none";
        }

        window.onclick = function(event) {
            if (event.target == modal1) {
                modal1.style.display = "none";
            }
        }
        // pay modal end

        //
    </script>

@endsection
