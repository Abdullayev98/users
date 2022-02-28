@extends("layouts.app")

@section('content')

    <div class="container w-4/5 mx-auto">

        <div class="flex lg:flex-row flex-col justify-center mt-6">

            <div class="lg:w-1/5 w-full text-base">
                <ul class="mb-5">
                    <li><a  href="/geotaskshint" class="hover:text-red-500 text-md text-blue-600 cursor-pointer">{{__('Как это работает')}}</a></li>
                    <li><a  href="/security" class="hover:text-red-500 text-md font-bold cursor-pointer">{{__('Безопасность и гарантии')}}</a></li>
                    <li><a  href="/badges" class="hover:text-red-500 text-md text-blue-600 cursor-pointer">{{__('Награды и рейтинг')}}</a></li>
                </ul>
                <ul class="mb-5">
                    <li><a  href="/reviews" class="hover:text-red-500 text-md text-blue-600 cursor-pointer">{{__('Отзывы исполнителей')}}</a></li>
                    <li><a  href="/reviews/authors" class="hover:text-red-500 text-md text-blue-600 cursor-pointer">{{__('Отзывы заказчиков')}}</a></li>
                    <li><a  href="/press" class="hover:text-red-500 text-md text-blue-600 cursor-pointer">{{__('СМИ о нас')}}</a></li>
                </ul>
                <ul>
                    <li><a  href="/geotaskshint" class="hover:text-red-500 text-md text-blue-600 cursor-pointer">{{__('Реклама на сервисе')}}</a></li>
                    <li><a  href="/contacts" class="hover:text-red-500 text-md text-blue-600 cursor-pointer">{{__('Контакты')}}</a></li>
                    <li><a  href="/job" class="hover:text-red-500 text-md text-blue-600 cursor-pointer">{{__('Вакансии')}}</a></li>
                </ul>
            </div>

            <div class="lg:w-4/5 w-full text-base lg:mt-0 mt-4">
                    <div class="">
                        <h1 class="font-medium text-4xl">{{__('Безопасность и гарантии')}}</h1>
                        <br>
                        <p class="">{{__('Одна из главных задач нашего сервиса — создать сообщество надежных исполнителей и заказчиков, которые могут доверять друг другу.')}}</p>
                        <br>
                        <p class="">{{__('Мы приложили максимум усилий, чтобы поиск исполнителя на Universal Services был удобным и безопасным.')}}</p>
                    </div>
                    <div class="flex lg:flex-row flex-col mt-10  mx-auto">
                        <div class="lg:w-1/2 w-full my-auto text-left" >
                            <h3 class="text-2xl font-normal mb-4">{{__('Проверка исполнителей')}}</h3>
                            <p class="w-full ">{{__('Все исполнители заполняют анкету и проходят проверку сервиса. Мы не регистрируем      подозрительные и мошеннические аккаунты. Те, кто прошел автоматическую проверку документов на Universal Services, получают значок «Документы подтверждены».')}}</p>
                            <a  class="  text-blue-500 hover:text-red-500 mt-5">{{__('Подробнее о проверке документов')}}</a>
                        </div>

                        <div class="lg:w-1/2 w-full">
                            <img class="w-76 h-64 mx-auto" src="https://sun9-31.userapi.com/impf/c626417/v626417063/59eb3/Mi90OPQvDa0.jpg?size=560x540&quality=96&sign=9c7a38c94313f19aa9bfc1da41f35f2b&type=album" alt="">
                        </div>
                    </div>
                    <div class="flex lg:flex-row flex-col mt-4  mx-auto">
                        <div class="lg:w-1/2 w-full lg:block hidden">
                            <img class="w-96 h-60 mt-16" src="{{asset('/images/img123.jpg')}}" alt="">
                        </div>
                        <div class="lg:w-1/2 w-full text-left ml-4 mt-4 lg:block hidden w-4/5">
                            <h3 class="text-2xl font-normal mb-4">{{__('Отзывы и рейтинг')}}</h3>
                            <p class="w-full">{{__('После завершения работы мы просим заказчика и исполнителя поделиться отзывами. Отзывы о каждом пользователе можно увидеть в его профиле. Мы проверяем их достоверность и блокируем исполнителей, которые оказывают некачественные услуги или оставляют недостоверные отзывы.')}}</p>
                            <p class="mt-5">{{__('Кроме отзывов оценить уровень исполнителей помогает рейтинг, который рассчитывается в каждой категории заданий. Самых активных исполнителей мы награждаем специальными значками за различные достижения.')}}</p>
                            <a href="/" class="text-blue-500 hover:text-red-500 mt-5">{{__('Подробнее о рейтинге и наградах исполнителей')}}</a>
                        </div>

                        <div class="lg:w-1/2 w-full text-left mt-4 lg:hidden block">
                            <h3 class="text-2xl font-normal mb-4">{{__('Отзывы и рейтинг')}}</h3>
                            <p class="w-full">{{__('После завершения работы мы просим заказчика и исполнителя поделиться отзывами. Отзывы о каждом пользователе можно увидеть в его профиле. Мы проверяем их достоверность и блокируем исполнителей, которые оказывают некачественные услуги или оставляют недостоверные отзывы.')}}</p>
                            <p class="mt-5">{{__('Кроме отзывов оценить уровень исполнителей помогает рейтинг, который рассчитывается в каждой категории заданий. Самых активных исполнителей мы награждаем специальными значками за различные достижения.')}}</p>
                            <a href="/" class="text-blue-500 hover:text-red-500 mt-5">{{__('Подробнее о рейтинге и наградах исполнителей')}}</a>
                        </div>
                        <div class="lg:w-1/2 w-full lg:hidden block">
                            <img class="w-76 h-64 mx-auto" src="{{asset('/images/img123.jpg')}}" alt="">
                        </div>
                    </div>
                    <div class="w-full mt-10">
                        <h3 class="text-3xl mb-5">{{__('Рекомендации по безопасности')}}</h3>
                        <p>{{__('Исполнители не являются сотрудниками Universal Services и несут личную ответственность за качество своей работы. При сотрудничестве с любым исполнителем, даже если он подтвердил паспорт или вы нашли его не на нашем сервисе, мы рекомендуем всегда соблюдать базовые правила безопасности.')}}</p>
                        <ul class="mt-5 list-decimal">
                            <li class="mr-5">{{__('Внимательно изучите отзывы и примеры выполненных заданий.')}}</li>
                            <li class="mr-5">{{__('Перед началом работы попросите исполнителя показать паспорт, сверьте имя в профиле на Universal Services и в документе.')}}</li>
                            <li class="mr-5">{{__('Прописывайте все условия и этапы сотрудничества в договоре или смете (скачать образец договора), составляйте расписки о передаче денег (скачать образец расписки).')}}</li>
                            <li class="mr-5">{{__('Прочитайте наши рекомендации, которые помогут вам избежать неприятных ситуаций:')}}</li>
                        </ul>
                        <a class="block mt-7 text-blue-600 hover:text-orange-300">{{__('Как заказчику не нарваться на мошенника')}}</a>
                        <a class="block text-blue-600 hover:text-orange-300">{{__('Как исполнителю не нарваться на мошенника')}}</a>
                        <h3 class="mt-14 text-3xl mb-5">{{__('Служба поддержки')}}</h3>
                        <p>{{__('Наша служба поддержки ежедневно работает с обращениями пользователей и следит за новыми заданиями. На сервисе запрещено публиковать задания, которые нарушают законодательство или противоречат моральным нормам.')}}</p>
                        <p class="mt-5">{{__('Специалисты отдела мониторинга готовы подключиться к любой сложной ситуации и сделать все возможное, чтобы помочь пользователям ее разрешить.')}}</p>
                        <div class="flex lg:flex-row flex-col mt-10">
                            <div class="sm:w-1/2 w-full mx-auto">
                                <a href="#replain-link">
                                    <button  class="font-sans  text-2xl mx-2 font-medium bg-green-400 text-white hover:bg-green-300 px-10 py-4 rounded">
                                        {{__('Написать в поддержку')}}
                                    </button>
                                </a>
                            </div>
                            <div class="sm:w-1/2 w-full mx-auto lg:mt-0 mt-6">
                                <a href="/contacts">
                                    <button  class="font-sans  text-2xl mx-2 font-medium  text-black-400 ring-1 ring-gray-300 px-14 py-4 rounded">
                                        {{__('Перейти в контакты')}}
                                    </button>
                                </a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection
