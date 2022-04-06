
<footer class=" w-full mx-auto mt-32" style="background-color: #242325;">
    <div class="flex md:flex-row flex-col w-4/5 mx-auto rounded-xl relative bottom-20" style="background-color: #F9FAFB">
        <div class="m-5 md:w-2/3 w-11/12">
            <h1 class="font-bold text-xl text-black">{!!__('С Universal Services вы экономите на услугах до 70%. <br> Как это возможно?')!!}</h1>
            <p class="text-base">{{__('Скачайте наше приложение и пользуйтесь Universal Services, где бы вы ни находились.')}}</p>

        </div>
        <div class="my-auto flex xl:flex-row flex-col md:w-1/3 w-full md:m-5 m-0">
            <a class="rounded-md mx-auto my-2 my-auto xl:mr-3" rel="noopener noreferrer" href="#" target="_blank">
                <button type="button" class="bg-black rounded-md hover:bg-yellow-500 md:my-0 my-1"><img src="{{asset('images/download_ios.svg')}}" alt=""> </button>
            </a>
            <a class="rounded-md mx-auto my-auto my-2" rel="noopener noreferrer" href="#" target="_blank">
                <button type="button" class="bg-black rounded-md hover:bg-yellow-500 md:my-0 my-1"><img src="{{asset('images/download_android.svg')}}" alt=""> </button>
            </a>
        </div>
    </div>

   <div class="grid grid-cols-3 gap-2 w-4/5 mx-auto mb-12">
       <div class="lg:col-span-1 col-span-3">
            <img src="{{asset('/images/User_white.png')}}" class="w-40 h-14">
            <p class="text-base text-gray-300 my-6 w-11/12 ml-2">{{__('У частных исполнителей нет расходов на офис, рекламу, зарплату секретарю и других затрат, которые сервисные компании обычно включают в стоимость своих услуг.')}}</p>
            <div class="">
                <a href="{{ setting('site.instagram_url') }}" class="cursor-pointer">
                    <i class="fab fa-instagram text-gray-300 hover:text-yellow-500 mx-2"></i>
                </a>
                <a href="{{ setting('site.telegram_url') }}" class="cursor-pointer">
                    <i class="fab fa-telegram text-gray-300 hover:text-yellow-500 mx-2"></i>
                </a>
                <a href="{{ setting('site.youtube_url') }}" class="cursor-pointer">
                    <i class="fab fa-youtube text-gray-300 hover:text-yellow-500 mx-2"></i>
                </a>
                <a href="{{ setting('site.facebook_url') }}" class="cursor-pointer">
                    <i class="fab fa-facebook text-gray-300 hover:text-yellow-500 mx-2"></i>
                </a>
            </div>
       </div>
       <div class="md:col-span-1 col-span-3 flex flex-col md:mx-auto md:mx-0 lg:mt-0 mt-8">
               <div class="mb-3">
                    <div><i class="fas fa-phone-alt  text-gray-300"></i><span class="font-bold text-gray-300 text-lg ml-4">{{__('Телефон')}}</span></div>
                    <h1 class="text-lg text-gray-300">+998(90)123 12 12</h1>
               </div>
               <div class="my-3">
                    <div><i class="far fa-envelope text-gray-300"></i><span class="font-bold text-gray-300 text-lg ml-4">{{__('Эл.Почта')}}</span></div>
                    <h1 class="text-lg text-gray-300">universal-user@mail.ru</h1>
               </div>
               <div class="my-3">
                    <div><i class="fas fa-map-marker-alt text-gray-300"></i><span class="font-bold text-gray-300 text-lg ml-4">{{__('Локация')}}</span></div>
                    <h1 class="text-lg text-gray-300">{!!__('Улица Хуршида, Ташкент, <br> Узбекистан')!!}</h1>
               </div>
       </div>
       <div class="md:col-span-1 col-span-3 flex flex-col md:mx-auto md:mx-0 lg:mt-0 mt-8">
            <a class="text-gray-300 hover:text-yellow-400 text-lg mb-2" href="/verification">{{__('Как стать исполнителем')}}</a>
            <a class="text-gray-300 hover:text-yellow-400 text-lg my-2" href="/badges">{{__('Награды и рейтинг')}}</a>
            <a class="text-gray-300 hover:text-yellow-400 text-lg my-2" href="/geotaskshint">{{__('Как это работает')}}</a>
            <a class="text-gray-300 hover:text-yellow-400 text-lg my-2" href="/author-reviews">{{__('Отзывы заказчиков')}}</a>
            <a class="text-gray-300 hover:text-yellow-400 text-lg my-2" href="#replain-link">{{__('Служба поддержки')}}</a>
       </div>
   </div>

    <div class="text-center h-12" style="background-color: #1B1B1C">
            <h1 class="text-center text-sm py-4" style="color: #857F7F">© 2022 Universal Services (user.uz)</h1>
    </div>
    <div class="w-full">
        <button onclick="topFunction()" id="myBtn" title="Go to top" class="fixed z-10 hidden p-3 bg-gray-100 rounded-full shadow-md bottom-5 left-20 animate-bounce">
            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 10l7-7m0 0l7 7m-7-7v18">
                </path>
            </svg>
        </button>
    </div>
   
    <!-- Swiper JS -->
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script src="{{ asset('js/home.js') }}"></script>

</footer>
     