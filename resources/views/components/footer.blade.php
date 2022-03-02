<footer class=" w-full mx-auto" style="background-color: #242325;">
    <div class="flex md:flex-row flex-col w-2/3 mx-auto rounded-xl relative bottom-20" style="background-color: #F9FAFB">
        <div class="m-5 md:w-2/3 w-11/12">
            <h1 class="font-bold text-xl text-black">С Universal Services вы экономите на услугах до 70%. <br/>
                Как это возможно?</h1>
            <p class="text-base">Скачайте наше приложение и пользуйтесь Universal Services, где бы вы ни находились.</p>
        </div>
        <div class="my-auto flex xl:flex-row flex-col md:w-1/3 w-full md:m-5 m-0">
            <a class="rounded-md mx-auto my-2 xl:mr-3" rel="noopener noreferrer" href="#" target="_blank">
                <button type="button" class="bg-black rounded-md hover:bg-yellow-500"><img src="{{asset('images/download_ios.svg')}}" alt=""> </button>
            </a>
            <a class="rounded-md mx-auto my-2" rel="noopener noreferrer" href="#" target="_blank">
                <button type="button" class="bg-black rounded-md hover:bg-yellow-500"><img src="{{asset('images/download_android.svg')}}" alt=""> </button>
            </a>
        </div>
    </div>

   <div class="flex lg:flex-row flex-col w-2/3 mx-auto mb-12">
       <div class="lg:w-1/3 w-full">
            <img src="{{asset('/images/logo.png')}}" class="w-1/2 h-1/3">
            <p class="text-base text-gray-300 my-6 w-11/12 ml-4">У частных исполнителей нет расходов на офис, рекламу, зарплату секретарю и других затрат,
                 которые сервисные компании обычно включают в стоимость своих услуг.</p>
            <div class="">
                <a class="cursor-pointer">
                    <i class="fab fa-instagram text-gray-300 hover:text-yellow-500 mx-2"></i>
                </a>
                <a class="cursor-pointer">
                    <i class="fab fa-telegram text-gray-300 hover:text-yellow-500 mx-2"></i>
                </a>
                <a class="cursor-pointer">
                    <i class="fab fa-youtube text-gray-300 hover:text-yellow-500 mx-2"></i>
                </a>
                <a class="cursor-pointer">
                    <i class="fab fa-facebook text-gray-300 hover:text-yellow-500 mx-2"></i>
                </a>
            </div>
       </div>
       <div class="lg:w-1/3 w-full flex flex-col mx-auto lg:my-0 my-8">       
               <div class="mb-3">
                    <div><i class="fas fa-phone-alt  text-gray-300"></i><span class="font-bold text-gray-300 text-lg ml-4">Телефон</span></div>
                    <h1 class="text-lg text-gray-300">+998(90)123 12 12</h1>
               </div>
               <div class="my-3">
                    <div><i class="far fa-envelope text-gray-300"></i><span class="font-bold text-gray-300 text-lg ml-4">Эл.Почта</span></div>
                    <h1 class="text-lg text-gray-300">universal-user@mail.ru</h1>
               </div>
               <div class="my-3">
                    <div><i class="fas fa-map-marker-alt text-gray-300"></i><span class="font-bold text-gray-300 text-lg ml-4">Локация</span></div>
                    <h1 class="text-lg text-gray-300">Улица Хуршида, Ташкент, <br/> Узбекистан</h1>
               </div>
       </div>
       <div class="lg:w-1/3 w-full flex flex-col mx-auto">
            <a class="text-gray-300 hover:text-yellow-400 text-lg my-2" href="/verification">{{__('Как')}}&nbsp;{{__('стать')}}&nbsp;{{__('исполнителем')}}</a>
            <a class="text-gray-300 hover:text-yellow-400 text-lg my-2" href="/faq">{{__('Часто задаваемые вопросы')}}</a>
            <a class="text-gray-300 hover:text-yellow-400 text-lg my-2" href="/contacts">{{__('Контакты')}}</a>
            <a class="text-gray-300 hover:text-yellow-400 text-lg my-2" href="/author-reviews">{{__('Отзывы заказчиков')}}</a>
            <a class="text-gray-300 hover:text-yellow-400 text-lg my-2" href="#replain-link">{{__('Служба поддержки')}}</a>
       </div>
   </div>

    <div class="text-center h-12" style="background-color: #1B1B1C">
            <h1 class="text-center text-sm py-4" style="color: #857F7F">© 2022 Universal Services (user.uz)</h1>
    </div>
</footer>
