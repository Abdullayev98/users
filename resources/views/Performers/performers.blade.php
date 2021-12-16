@extends('layouts.app')

@section('content')

    <div class="flex flex-row container mx-auto mx-40 my-8">

{{-----------------------------------------------------------------------------------}}
{{--                             Left column                                       --}}
{{-----------------------------------------------------------------------------------}}

        <div class="flex flex-col basis-1/3 px-8">
            <div class="flex flex-row shadow-lg rounded-lg mb-8">
                <div class="basis-1/2 h-24 bg-contain bg-no-repeat bg-center" style="background-image: url(images/like.png);">
                </div>
                <div class="basis-1/2 text-xs text-gray-700 text-left my-auto">
                    Станьте исполнителем <br> U-ser. И начните <br> зарабатывать.   
                </div>
            </div>


            <div>
                <div class="bg-white max-w-xl mx-auto" x-data="{selected:1}">
                    <ul class="shadow-box">    
                        

{{--------------------------|    Курьерские услуги     |-----------------------------}}

                        <li class="relative">
                            <button type="button" class="mb-4 text-left font-bold text-blue-500" @click="selected !== 1 ? selected = 1 : selected = null; style='text-black-700'">
                                <div class="flex items-center justify-between">
                                    <span class="">
                                        Курьерские услуги					
                                    </span>
                                </div>
                            </button>
                            <div class="relative overflow-hidden transition-all max-h-0 duration-700" style="max-height: 0;" x-ref="container1" x-bind:style="selected == 1 ? 'max-height: ' + $refs.container1.scrollHeight + 'px' : ''">
                                <div class="ml-4 text-blue-500">
                                    <a href="#">Услуги пешего курьера</a> <br>
                                    <a href="#">Услуги курьера на легковом авто</a> <br>
                                    <a href="#">Купить и доставить</a> <br>
                                    <a href="#">Срочная доставка</a> <br>
                                    <a href="#">Доставка продуктов</a> <br>
                                    <a href="#">Доставка еды из ресторанов</a> <br>
                                    <a href="#">Курьер на день</a> <br>
                                    <a href="#">Другая посылка</a> <br>
                                </div>
                            </div>
                        </li> 

{{-----------------------------------------------------------------------------------}}
{{--                            Ремонт и строительство                             --}}

                        <li class="relative">
                            <button type="button" class="mb-4 text-left" @click="selected !== 2 ? selected = 2 : selected = null">
                                <div class="flex items-center justify-between">
                                    <span class="font-bold">
                                        Ремонт и строительство			
                                    </span>
                                </div>
                            </button>
                            <div class="relative overflow-hidden transition-all max-h-0 duration-700" style="max-height: 0;" x-ref="container2" x-bind:style="selected == 2 ? 'max-height: ' + $refs.container2.scrollHeight + 'px' : ''">
                                <div class="ml-4 text-blue-500">
                                    <a href="#">Мастер на час</a> <br>
                                    <a href="#">Ремонт под ключ</a> <br>
                                    <a href="#">Сантехнические работы</a> <br>
                                    <a href="#">Электромонтажные работы</a> <br>
                                    <a href="#">Отделочные работы</a> <br>
                                    <a href="#">Потолки</a> <br>
                                    <a href="#">Полы</a> <br>
                                    <a href="#">Плиточные работы</a> <br>
                                    <a href="#">Сборка и ремонт мебели</a> <br>
                                    <a href="#">Установка и ремонт дверей, замков</a> <br>
                                    <a href="#">Окна, остекление, балконы</a> <br>
                                    <a href="#">Кровельные и фасадные работы</a> <br>
                                    <a href="#">Отопление, водоснабжение, канализация</a> <br>
                                    <a href="#">Изоляционные работы</a> <br>
                                    <a href="#">Строительно-монтажные работы</a> <br>
                                    <a href="#">Крупное строительство</a> <br>
                                    <a href="#">Охранные системы</a> <br>
                                    <a href="#">Что-то другое</a> <br>
                                </div>
                            </div>
                        </li>

{{-----------------------------------------------------------------------------------}}
{{--                            Грузоперевозки                                     --}}
                        

                        <li class="relative">
                            <button type="button" class="mb-4 text-left" @click="selected !== 3 ? selected = 3 : selected = null">
                                <div class="flex items-center justify-between">
                                    <span class="font-bold">
                                        Грузоперевозки  
                                    </span>
                                </div>
                            </button>
                            <div class="relative overflow-hidden transition-all max-h-0 duration-700" style="max-height: 0;" x-ref="container2" x-bind:style="selected == 3 ? 'max-height: ' + $refs.container2.scrollHeight + 'px' : ''">
                                <div class="ml-4 text-blue-500">
                                    <a href="#">Перевозка вещей, переезды</a> <br>
                                    <a href="#">Пассажирские перевозки</a> <br>
                                    <a href="#">Строительные грузы и оборудование</a> <br>
                                    <a href="#">Вывоз мусора</a> <br>
                                    <a href="#">Эвакуаторы</a> <br>
                                    <a href="#">Междугородные перевозки</a> <br>
                                    <a href="#">Услуги грузчиков</a> <br>
                                    <a href="#">Перевозка продуктов</a> <br>
                                    <a href="#">Услуги манипулятора</a> <br>
                                    <a href="#">Другой груз</a> <br>
                                </div>
                            </div>
                        </li>

{{-----------------------------------------------------------------------------------}}
{{--                            Уборка и помощь по хозяйству                       --}}

                        <li class="relative">
                            <button type="button" class="mb-4 text-left" @click="selected !== 4 ? selected = 4 : selected = null">
                                <div class="flex items-center justify-between">
                                    <span class="text-blue" @click="class='font-bold';">
                                        Уборка и помощь по хозяйству	
                                    </span>
                                </div>
                            </button>
                            <div class="relative overflow-hidden transition-all max-h-0 duration-700" style="max-height: 0;" x-ref="container4" x-bind:style="selected == 4 ? 'max-height: ' + $refs.container4.scrollHeight + 'px' : ''">
                                <div class="ml-4 text-blue-500">
                                    <a href="#">Поддерживающая уборка</a> <br>
                                    <a href="#">Генеральная уборка</a> <br>
                                    <a href="#">Мытье окон</a> <br>
                                    <a href="#">Вынос мусора</a> <br>
                                    <a href="#">Помощь швеи</a> <br>
                                    <a href="#">Приготовление еды</a> <br>
                                    <a href="#">Глажение белья</a> <br>
                                    <a href="#">Химчистка</a> <br>
                                    <a href="#">Уход за животными</a> <br>
                                    <a href="#">Работы в саду, огороде, на участке</a> <br>
                                    <a href="#">Сиделки</a> <br>
                                    <a href="#">Няни</a> <br>
                                    <a href="#">Что-то другое</a> <br>
                                </div>
                            </div>
                        </li>  
  
{{-----------------------------------------------------------------------------------}}
{{--                            Виртуальный помощник                               --}}

                        <li class="relative">
                            <button type="button" class="mb-4 text-left" @click="selected !== 5 ? selected = 5 : selected = null">
                                <div class="flex items-center justify-between">
                                    <span class="text-blue" @click="class='font-bold';">
                                        Виртуальный помощник  
                                    </span>
                                </div>
                            </button>
                            <div class="relative overflow-hidden transition-all max-h-0 duration-700" style="max-height: 0;" x-ref="container5" x-bind:style="selected == 5 ? 'max-height: ' + $refs.container5.scrollHeight + 'px' : ''">
                                <div class="ml-4 text-blue-500">
                                    <a href="#">Работа с текстом, копирайтинг</a> <br>
                                    <a href="#">Услуги переводчика</a> <br>
                                    <a href="#">Поиск и обработка информации</a> <br>
                                    <a href="#">Работа с числовыми данными</a> <br>
                                    <a href="#">Подготовка презентаций</a> <br>
                                    <a href="#">Расшифровка аудио- и видеозаписей</a> <br>
                                    <a href="#">Размещение на рекламных площадках</a> <br>
                                    <a href="#">Помощь SMM-специалиста</a> <br>
                                    <a href="#">Реклама и продвижение в интернете</a> <br>
                                    <a href="#">Обзвон по базе</a> <br>
                                    <a href="#">Услуги личного помощника</a> <br>
                                    <a href="#">Что-то другое</a> <br>
                                </div>
                            </div>
                        </li> 

{{-----------------------------------------------------------------------------------}}
{{--                            Компьютерная помощь                                --}}
                                                
                        <li class="relative">
                            <button type="button" class="mb-4 text-left" @click="selected !== 6 ? selected = 6 : selected = null">
                                <div class="flex items-center justify-between">
                                    <span class="text-blue" @click="class='font-bold';">
                                        Компьютерная помощь 
                                    </span>
                                </div>
                            </button>
                            <div class="relative overflow-hidden transition-all max-h-0 duration-700" style="max-height: 0;" x-ref="container3" x-bind:style="selected == 6 ? 'max-height: ' + $refs.container3.scrollHeight + 'px' : ''">
                                <div class="ml-4 text-blue-500">
                                    <a href="#">Ремонт компьютеров и ноутбуков</a> <br>
                                    <a href="#">Установка и настройка операц. систем, программ</a> <br>
                                    <a href="#">Удаление вирусов</a> <br>
                                    <a href="#">Настройка интернета и Wi-Fi</a> <br>
                                    <a href="#">Ремонт и замена комплектующих</a> <br>
                                    <a href="#">Восстановление данных</a> <br>
                                    <a href="#">Настройка и ремонт оргтехники</a> <br>
                                    <a href="#">Консультация и обучение</a> <br>
                                    <a href="#">Что-то другое</a> <br>
                                </div>
                            </div>
                        </li> 

{{-----------------------------------------------------------------------------------}}
{{--                            Мероприятия и промоакции                           --}}
                                                
                        <li class="relative">
                            <button type="button" class="mb-4 text-left" @click="selected !== 7 ? selected = 7 : selected = null">
                                <div class="flex items-center justify-between">
                                    <span class="text-blue" @click="class='font-bold';">
                                        Мероприятия и промоакции	
                                    </span>
                                </div>
                            </button>
                            <div class="relative overflow-hidden transition-all max-h-0 duration-700" style="max-height: 0;" x-ref="container3" x-bind:style="selected == 7 ? 'max-height: ' + $refs.container3.scrollHeight + 'px' : ''">
                                <div class="ml-4 text-blue-500">
                                    <a href="#">Помощь в проведении мероприятий</a> <br>
                                    <a href="#">Раздача промо-материалов</a> <br>
                                    <a href="#">Тайный покупатель</a> <br>
                                    <a href="#">Разнорабочий</a> <br>
                                    <a href="#">Промоутер</a> <br>
                                    <a href="#">Тамада, ведущий, аниматор</a> <br>
                                    <a href="#">Промо-модель</a> <br>
                                    <a href="#">Мерчендайзеры</a> <br>
                                    <a href="#">Комплектовщики</a> <br>
                                    <a href="#">Что-то другое</a> <br>
                                </div>
                            </div>
                        </li> 
                        
{{-----------------------------------------------------------------------------------}}
{{--                            Дизайн                                             --}}
                                                
                        <li class="relative">
                            <button type="button" class="mb-4 text-left" @click="selected !== 8 ? selected = 8 : selected = null">
                                <div class="flex items-center justify-between">
                                    <span class="text-blue" @click="class='font-bold';">
                                        Дизайн      
                                    </span>
                                </div>
                            </button>
                            <div class="relative overflow-hidden transition-all max-h-0 duration-700" style="max-height: 0;" x-ref="container3" x-bind:style="selected == 8 ? 'max-height: ' + $refs.container3.scrollHeight + 'px' : ''">
                                <div class="ml-4 text-blue-500">
                                    <a href="#">Фирменный стиль, логотипы, визитки</a> <br>
                                    <a href="#">Полиграфический дизайн</a> <br>
                                    <a href="#">Иллюстрации, живопись, граффити</a> <br>
                                    <a href="#">Дизайн сайтов и приложений</a> <br>
                                    <a href="#">Интернет-баннеры, оформление соц.сетей</a> <br>
                                    <a href="#">3d-графика, анимация</a> <br>
                                    <a href="#">Инфографика, презентации, иконки</a> <br>
                                    <a href="#">Наружная реклама, стенды, pos-материалы</a> <br>
                                    <a href="#">Архитектура, интерьер, ландшафт</a> <br>
                                    <a href="#">Что-то другое</a> <br>
                                </div>
                            </div>
                        </li> 
                        
{{-----------------------------------------------------------------------------------}}
{{--                            Разработка ПО                                      --}}
                                                
                        <li class="relative">
                            <button type="button" class="mb-4 text-left" @click="selected !== 9 ? selected = 9 : selected = null">
                                <div class="flex items-center justify-between">
                                    <span class="text-blue" @click="class='font-bold';">
                                        Разработка ПО         
                                    </span>
                                </div>
                            </button>
                            <div class="relative overflow-hidden transition-all max-h-0 duration-700" style="max-height: 0;" x-ref="container3" x-bind:style="selected == 9 ? 'max-height: ' + $refs.container3.scrollHeight + 'px' : ''">
                                <div class="ml-4 text-blue-500">
                                    <a href="#">Сайт под ключ</a> <br>
                                    <a href="#">Разработка мобильных приложений</a> <br>
                                    <a href="#">Программирование</a> <br>
                                    <a href="#">Доработка и поддержка сайта</a> <br>
                                    <a href="#">Доработка и настройка 1С</a> <br>
                                    <a href="#">Создание лендингов</a> <br>
                                    <a href="#">Верстка</a> <br>
                                    <a href="#">Скрипты и боты</a> <br>
                                    <a href="#">Что-то другое</a> <br>
                                </div>
                            </div>
                        </li> 

{{-----------------------------------------------------------------------------------}}
{{--                            Фото, видео и аудио                                --}}
                                                
                        <li class="relative">
                            <button type="button" class="mb-4 text-left" @click="selected !== 10 ? selected = 10 : selected = null">
                                <div class="flex items-center justify-between">
                                    <span class="text-blue" @click="class='font-bold';">
                                        Фото, видео и аудио 
                                    </span>
                                </div>
                            </button>
                            <div class="relative overflow-hidden transition-all max-h-0 duration-700" style="max-height: 0;" x-ref="container3" x-bind:style="selected == 10 ? 'max-height: ' + $refs.container3.scrollHeight + 'px' : ''">
                                <div class="ml-4 text-blue-500">
                                    <a href="#">Фотосъемка</a> <br>
                                    <a href="#">Видеосъемка</a> <br>
                                    <a href="#">Запись аудио</a> <br>
                                    <a href="#">Обработка фотографий</a> <br>
                                    <a href="#">Создание видео под ключ</a> <br>
                                    <a href="#">Модели для съемок</a> <br>
                                    <a href="#">Монтаж и цветокоррекция видео</a> <br>
                                    <a href="#">Оцифровка</a> <br>
                                    <a href="#">Что-то другое</a> <br>
                                </div>
                            </div>
                        </li> 

{{-----------------------------------------------------------------------------------}}
{{--                            Финансовый советник                                --}}
                                                
                        <li class="relative">
                            <button type="button" class="mb-4 text-left">
                                <div class="flex items-center justify-between">
                                    <span class="text-blue">
                                        Финансовый советник        
                                    </span>
                                </div>
                            </button>
                        </li> 

{{-----------------------------------------------------------------------------------}}
{{--                            Установка и ремонт техники                         --}}
                                                
                        <li class="relative">
                            <button type="button" class="mb-4 text-left" @click="selected !== 11 ? selected = 11 : selected = null">
                                <div class="flex items-center justify-between">
                                    <span class="text-blue" @click="class='font-bold';">
                                        Установка и ремонт техники  
                                    </span>
                                </div>
                            </button>
                            <div class="relative overflow-hidden transition-all max-h-0 duration-700" style="max-height: 0;" x-ref="container3" x-bind:style="selected == 11 ? 'max-height: ' + $refs.container3.scrollHeight + 'px' : ''">
                                <div class="ml-4 text-blue-500">
                                    <a href="#">Холодильники и морозильные камеры</a> <br>
                                    <a href="#">Стиральные и сушильные машины</a> <br>
                                    <a href="#">Посудомоечные машины</a> <br>
                                    <a href="#">Электрические плиты и панели</a> <br>
                                    <a href="#">Газовые плиты</a> <br>
                                    <a href="#">Духовые шкафы</a> <br>
                                    <a href="#">Вытяжки</a> <br>
                                    <a href="#">Климатическая техника</a> <br>
                                    <a href="#">Водонагреватели, бойлеры, котлы, колонки</a> <br>
                                    <a href="#">Швейные машины</a> <br>
                                    <a href="#">Пылесосы и очистители</a> <br>
                                    <a href="#">Утюги и уход за одеждой</a> <br>
                                    <a href="#">Кофемашины</a> <br>
                                    <a href="#">СВЧ печи</a> <br>
                                    <a href="#">Мелкая кухонная техника</a> <br>
                                    <a href="#">Уход за телом и здоровьем</a> <br>
                                    <a href="#">Строительная и садовая техника</a> <br>
                                    <a href="#">Что-то другое</a> <br>
                                </div>
                            </div>
                        </li> 

{{-----------------------------------------------------------------------------------}}
{{--                            Красота и здоровье                                 --}}
                                                
                        <li class="relative">
                            <button type="button" class="mb-4 text-left" @click="selected !== 12 ? selected = 12 : selected = null">
                                <div class="flex items-center justify-between">
                                    <span class="text-blue" @click="class='font-bold';">
                                        Красота и здоровье 
                                    </span>
                                </div>
                            </button>
                            <div class="relative overflow-hidden transition-all max-h-0 duration-700" style="max-height: 0;" x-ref="container3" x-bind:style="selected == 12 ? 'max-height: ' + $refs.container3.scrollHeight + 'px' : ''">
                                <div class="ml-4 text-blue-500">
                                    <a href="#">Услуги косметолога</a> <br>
                                    <a href="#">Эпиляция</a> <br>
                                    <a href="#">Брови и ресницы</a> <br>
                                    <a href="#">Услуги визажиста</a> <br>
                                    <a href="#">Тату и пирсинг</a> <br>
                                    <a href="#">Парикмахерские услуги</a> <br>
                                    <a href="#">Ногтевой сервис</a> <br>
                                    <a href="#">Массаж</a> <br>
                                    <a href="#">Стилисты и имиджмейкеры</a> <br>
                                    <a href="#">Психологи и психотерапевты</a> <br>
                                    <a href="#">Услуги медсестры</a> <br>
                                    <a href="#">Персональный тренер</a> <br>
                                    <a href="#">Что-то другое</a> <br>
                                </div>
                            </div>
                        </li> 

{{-----------------------------------------------------------------------------------}}
{{--                            Ремонт цифровой техники                            --}}
                                                
                        <li class="relative">
                            <button type="button" class="mb-4 text-left" @click="selected !== 13 ? selected = 13 : selected = null">
                                <div class="flex items-center justify-between">
                                    <span class="text-blue" @click="class='font-bold';">
                                        Ремонт цифровой техники  
                                    </span>
                                </div>
                            </button>
                            <div class="relative overflow-hidden transition-all max-h-0 duration-700" style="max-height: 0;" x-ref="container3" x-bind:style="selected == 13 ? 'max-height: ' + $refs.container3.scrollHeight + 'px' : ''">
                                <div class="ml-4 text-blue-500">
                                    <a href="#">Планшеты и телефоны</a> <br>
                                    <a href="#">Аудиотехника и системы</a> <br>
                                    <a href="#">Телевизоры и мониторы</a> <br>
                                    <a href="#">Автомобильная электроника</a> <br>
                                    <a href="#">Видео/фототехника</a> <br>
                                    <a href="#">Игровые приставки</a> <br>
                                    <a href="#">Спутниковые и эфирные антенны</a> <br>
                                    <a href="#">Часы и хронометры</a> <br>
                                    <a href="#">Что-то другое</a> <br>
                                </div>
                            </div>
                        </li>

{{-----------------------------------------------------------------------------------}}
{{--                            Юридическая и бухгалтерская помощь                 --}}
                                                
                        <li class="relative">
                            <button type="button" class="mb-4 text-left" @click="selected !== 14 ? selected = 14 : selected = null">
                                <div class="flex items-center justify-between">
                                    <span class="text-blue" @click="class='font-bold';">
                                            
                                    </span>
                                </div>
                            </button>
                            <div class="relative overflow-hidden transition-all max-h-0 duration-700" style="max-height: 0;" x-ref="container3" x-bind:style="selected == 14 ? 'max-height: ' + $refs.container3.scrollHeight + 'px' : ''">
                                <div class="ml-4 text-blue-500">
                                    <a href="#"></a> <br>
                                </div>
                            </div>
                        </li> 
{{-----------------------------------------------------------------------------------}}
{{--                            Репетиторы и обучение                              --}}
                                                
                        <li class="relative">
                            <button type="button" class="mb-4 text-left" @click="selected !== 15 ? selected = 15 : selected = null">
                                <div class="flex items-center justify-between">
                                    <span class="text-blue" @click="class='font-bold';">
                                            
                                    </span>
                                </div>
                            </button>
                            <div class="relative overflow-hidden transition-all max-h-0 duration-700" style="max-height: 0;" x-ref="container3" x-bind:style="selected == 15 ? 'max-height: ' + $refs.container3.scrollHeight + 'px' : ''">
                                <div class="ml-4 text-blue-500">
                                    <a href="#"></a> <br>
                                </div>
                            </div>
                        </li> 

{{-----------------------------------------------------------------------------------}}
{{--                            Ремонт транспорта                                  --}}
                                                
                        <li class="relative">
                            <button type="button" class="mb-4 text-left" @click="selected !== 16 ? selected = 16 : selected = null">
                                <div class="flex items-center justify-between">
                                    <span class="text-blue" @click="class='font-bold';">
                                            
                                    </span>
                                </div>
                            </button>
                            <div class="relative overflow-hidden transition-all max-h-0 duration-700" style="max-height: 0;" x-ref="container3" x-bind:style="selected == 16 ? 'max-height: ' + $refs.container3.scrollHeight + 'px' : ''">
                                <div class="ml-4 text-blue-500">
                                    <a href="#"></a> <br>
                                </div>
                            </div>
                        </li> 

                    </ul>
                </div>
            </div>
        </div>

{{-----------------------------------------------------------------------------------}}
{{--                             Right column                                      --}}
{{-----------------------------------------------------------------------------------}}

        <div class="flex flex-col basis-2/3">
            <div class="bg-gray-100 flex flex-row h-40 mb-10" style="width: 700px;">
                <div class="flex flex-col relative">
                    <div class="flex flex-row font-bold text-2xl m-4">
                        <p>Курьерские услуги: рейтинг исполнителей</p>
                    </div> 
                    <div class="flex flex-row m-4 absolute bottom-0 left-0">
                        <div class="form-check flex flex-row mr-6">
                            <input class="form-check-input h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-yellow-600 checked:border-yellow-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" value="" id="verified">
                            <label class="form-check-label inline-block text-gray-800" for="verified">
                                Только проверенные
                            </label>
                        </div>
                        <div class="form-check flex flex- mr-6">
                            <input class="form-check-input h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-black-600 checked:border-black-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" value="" id="online">
                            <label class="form-check-label inline-block text-gray-800" for="online">
                                Сейчас на сайте
                            </label>
                        </div>
                    </div>
                </div>
                <div class="flex flex-col m-4 relative">
                    <div>
                        <p>Город: <a href="#"> Москва </a> </p>
                    </div>
                    <div class="absolute bottom-0 right-0">
                        <p>Указать метро</p>
                    </div>
                </div>
            </div>
            
            <div class="flex flex-row">
                <div class="m-10">
                    <img class="rounded-lg w-40 h-40" src="{{ asset('images/user1.jpg') }}" alt="user">
                    <div class="flex flex-row">
                        <p>Отзывы:</p>
                        <i class="far fa-thumbs-up m-1 text-gray-400"></i>    5128
                        <i class="far fa-thumbs-down m-1 text-gray-400"></i>  21
                    </div>
                    <div class="flex flex-row">
                        <i class="fas fa-star text-yellow-500"></i>
                        <i class="fas fa-star text-yellow-500"></i>
                        <i class="fas fa-star text-yellow-500"></i>
                        <i class="fas fa-star text-yellow-500"></i>
                        <i class="fas fa-star text-yellow-500"></i>
                    </div>
                </div>
                <div class="my-10">
                    <div class="flex flex-row">
                        <p class="text-3xl underline text-blue-500">Денис Б.</p>
                        <img class="h-8 ml-2" src="{{ asset('images/icon_year.svg') }}">
                        <img class="h-8 ml-2" src="{{ asset('images/icon_shield.png') }}">
                        <img class="h-8 ml-2" src="{{ asset('images/icon_bag.png') }}">
                    </div>
                    <div>
                        <p class="text-sm text-gray-500 my-3">Был на сайте 9 мин. назад</p>
                    </div>
                    <div>
                        <p class="text-base" style="width: 500px;">
                            Добрый день! В штате опытные и проверенные курьеры . 
                            На практике прошли все виды курьерских доставок . 
                            За всех курьеров несу материальную ответственность . Способы опл…
                        </p>
                    </div>
                    <div>
                        <button class="rounded-lg py-2 px-3 font-bold bg-yellow-500 text-white mt-3">Предложить задание</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('javasript')
    <script src="//unpkg.com/alpinejs" defer></script>
@endsection