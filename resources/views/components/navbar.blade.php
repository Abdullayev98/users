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
            <button
             class="text-green-300 rounded-md w-36 absolute right-44  text-base font-medium hover:text-green-700 inline-block"
             id="open-btn">
                 <i class="fas fa-wallet inline-block"></i>
                 <span class="inline-block">пополнить</span>
             </button>
        </div>
        <p class="w-full text-right inline-block float-right md:float-none mt-6 mb-6"><a href="/home/profile" class="font-medium hover:text-yellow-500">Вход</a> или <a href="#" class="font-medium hover:text-yellow-500">Регистрация</a></p>
    </nav>
{{-- pay modal start --}}
    <div class="fixed hidden z-50 inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full" id="my-modal">
        <div class="relative top-20 mx-auto p-5 border w-2/5 shadow-lg rounded-md bg-white">
            <div class="mt-3 text-center">
                <button type="submit" id="close-btn" class="px-4 py-4 bg-gray-300 rounded-md w-100 h-16 absolute right-4 top-4 hover:bg-gray-500">
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
                    <input type="checkbox" class="w-5 h-5 rounded-md inline-block "/>
                    <p class="text-md inline-block ml-2">Оформить полис на 7 дней за 15 000 сум</p>
                </div>
                <div class="items-center px-4 py-3">
                    <button id="ok-btn"
                        class="px-4 py-2 bg-green-500 text-white text-xl font-medium rounded-md w-2/5 h-16  shadow-sm hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-300">
                        К оплате x сум
                    </button>
                    <p>* — Порядок выплаты, ограничения и полные условия определены в <a href="/home/oferta" class="cursor-pointer text-sm text-blue-400 underline">Оферте</a></p>
                </div>
            </div>
        </div>
    </div>
{{-- pay modal end --}}
</div>

