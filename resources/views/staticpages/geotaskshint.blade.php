@extends("layouts.app")

@section('content')

<div class="container w-4/5 mx-auto">

        <div class="flex lg:flex-row flex-col justify-center mt-6">
            <div class="lg:w-1/5 w-full text-base">
                <ul class="mb-5">
                    <li><a  href="/geotaskshint" class="hover:text-red-500 text-md font-bold cursor-pointer">
                        {{__('Как это работает')}}
                    </a></li>
                    <li><a  href="/security" class="hover:text-red-500 text-md text-blue-600 cursor-pointer">
                        {{__('Безопасность и гарантии')}}
                    </a></li>
                    <li><a  href="/badges" class="hover:text-red-500 text-md text-blue-600 cursor-pointer">
                        {{__('Награды и рейтинг')}}
                </a></li>
                </ul>
                <ul class="mb-5">
                    <li><a  href="/reviews" class="hover:text-red-500 text-md text-blue-600 cursor-pointer">
                        {{__('Отзывы исполнителей')}}
                    </a></li>
                    <li><a  href="/reviews/authors" class="hover:text-red-500 text-md text-blue-600 cursor-pointer">
                        {{__('Отзывы заказчиков')}}
                    </a></li>
                    <li><a  href="/press" class="hover:text-red-500 text-md text-blue-600 cursor-pointer">
                        {{__('СМИ о нас')}}
                    </a></li>
                </ul>
                <ul>
                    <li><a  href="/geotaskshint" class="hover:text-red-500 text-md text-blue-600 cursor-pointer">
                        {{__('Реклама на сервисе')}}
                    </a></li>
                    <li><a  href="/contacts" class="hover:text-red-500 text-md text-blue-600 cursor-pointer">
                        {{__('Контакты')}}
                    </a></li>
                    <li><a  href="/job" class="hover:text-red-500 text-md text-blue-600 cursor-pointer">
                        {{__('Вакансии')}}
                    </a></li>
                </ul>
            </div>
            <div class="lg:w-4/5 w-full lg:mt-0 mt-4">
                <div class="w-full">
                    <h1 class="font-semibold text-4xl">
                        {{__('Как это работает?')}}
                    </h1>
                    <p class="w-full mt-10 text-base">
                    {{__('Universal Services — удобный сервис, который позволяет быстро и безопасно находить надежных исполнителей для решения бытовых и бизнес-задач. Достаточно разместить задание на сервисе, и через несколько минут вы начнете получать отклики от исполнителей, которые будут готовы его выполнить.')}}
                    </p><br>
                    <p class="w-full text-base">
                        {{__('Исполнители проходят')}}
                    <a href="/verification" class="text-blue-600 hover:text-orange-500">
                        {{__('пециальную проверку')}}
                    </a> 
                    {{__('администрацией сервиса, поэтому Universal Services')}}
                    <a href="/security" class="text-blue-600 hover:text-orange-500">Станьте исполнителем <br> U-ser. И начните <br> зарабатывать {{__('безопасен для заказчиков.')}}</a></p>
                    <iframe class="w-full mb-10 h-96 mt-10" width="727" height="409" src="https://www.youtube.com/embed/_nb4qzvpEhE" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

                        

                    <h1 class="font-medium text-4xl mt-10 text-center">
                        {{__('Как создать задание на Universal Services?')}}
                    </h1>
                    <h3 class="mt-10 font-medium text-2xl text-center mb-2"></h3>
                    {{__('Выберите категорию')}}
                    <img src="https://i1.wp.com/composs.ru/wp-content/uploads/2017/03/oshibka_651-7.jpg" class="mx-auto"/>
                    <p class="mt-10 font-medium text-2xl text-center mb-2">
                        {{__('В свободной форме опишите детали вашего задания')}}
                    </p>
                    <img src="https://docs.microsoft.com/en-us/powerapps/maker/portals/media/contact-us-form.png" class="mx-auto"/>
                </div>
            

                <div class="w-full mx-auto my-10">
                    <hr>
                </div>
                <div class="flex lg:flex-row flex-col mt-10 sm:w-4/5 w-full mx-auto">
                    <div class="lg:w-1/2 w-full my-auto text-center">
                            <h4 class="text-2xl font-medium mb-2">
                                {{__('Получайте отклики исполнителей')}}
                            </h4>
                            <p>{{__('Сразу после создания задания вам начнут поступать отклики от людей, которые готовы его выполнить.')}}</p>
                    </div>
                    <div class="lg:w-1/2 w-full">
                        <img src="https://f.hubspotusercontent30.net/hubfs/8822336/location-icon-pin-pointer-map%20(2).jpg" class="mx-auto w-80 h-64"/>
                    </div>
                </div>
                <div class="flex lg:flex-row flex-col mt-4 sm:w-4/5 w-full mx-auto">
                    
                        <div class="lg:w-1/2 w-full lg:block hidden">
                            <img src="https://aviafrezer.ru/assets/images/resources/14/3356.jpg" class="mx-auto w-80 h-52"/>
                        </div>
                        <div class="lg:w-1/2 w-full text-center ml-4 mt-4 lg:block hidden">
                                <h4 class="text-2xl font-medium mb-2">{{__('Выберите лучшего исполнителя')}}</h4>
                                <p>{{__('Вам остается выбрать среди откликов лучшее по цене или рейтингу исполнителя.')}}</p>
                        </div>
                   
                        <div class="lg:w-1/2 w-full text-center ml-4 mt-4 lg:hidden block">
                            <h4 class="text-2xl font-medium mb-2">{{__('Выберите лучшего исполнителя')}}</h4>
                            <p class="mb-8">{{__('Вам остается выбрать среди откликов лучшее по цене или рейтингу исполнителя.')}}</p>
                         </div>
                         <div class="lg:w-1/2 w-full lg:hidden block">
                            <img src="https://aviafrezer.ru/assets/images/resources/14/3356.jpg" class="mx-auto w-80 h-52"/>
                        </div>
                    
                </div>
                <div class="flex lg:flex-row flex-col mt-10 sm:w-4/5 w-full mx-auto">
                    <div class="lg:w-1/2 w-full my-auto text-center">
                            <h4 class="text-2xl font-medium mb-2">{{__('Завершение задания')}}</h4>
                            <p>{{__('После выполнения задания не забудьте подтвердить, что исполнитель выполнил поручение, и написать отзыв о его работе.')}}</p>
                    </div>
                    <div class="lg:w-1/2 w-full ml-4 lg:mt-0 mt-8">
                        <img src="https://pixy.org/src/58/thumbs350/582432.jpg" class="mx-auto w-72 h-52"/>
                    </div>
                </div>
                <div class="sm:w-4/5 w-full mx-auto mt-20">badges
                    <hr>
                </div>
                <div class="flex lg:flex-row flex-col mt-10 sm:w-4/5 w-full mx-auto">
                    <div class="lg:w-1/2 w-full lg:text-left text-center">
                         <a href="categories/1">
                            <button  class="font-sans  text-2xl  font-medium bg-green-600 text-white hover:bg-green-500 px-10 py-4 rounded">
                               {{__('Создать задание')}}
                            </button>
                        </a>
                    </div>
                    <div class="lg:w-1/2 w-full mx-auto lg:mt-0 mt-6">
                        <p>{{__('Может быть вы хотите стать')}}<a href="/verification" class="text-blue-500 underline hover:text-orange-400">{{__('исполнителем Universal Services?')}}</a></p>
                    </div>
                </div>
            </div>
        </div>

</div>


@endsection
