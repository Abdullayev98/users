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
                <div class="font-bold"><a href="#">Курьерские услуги</a></div>
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

            <div>
                <div class="bg-white max-w-xl mx-auto border border-gray-200" x-data="{selected:1}">
                    <ul class="shadow-box">               
                        <li class="relative border-b border-gray-200">
                            <button type="button" class="w-full px-8 py-6 text-left" @click="selected !== 1 ? selected = 1 : selected = null">
                                <div class="flex items-center justify-between">
                                    <span>
                                        Курьерские услуги					
                                    </span>
                                    <span class="ico-plus"></span>
                                </div>
                            </button>
                            <div class="relative overflow-hidden transition-all max-h-0 duration-700" style="max-height: 0;" x-ref="container1" x-bind:style="selected == 1 ? 'max-height: ' + $refs.container1.scrollHeight + 'px' : ''">
                                <div class="p-6">
                                    <p>reCAPTCHA v2 is not going away! We will continue to fully support and improve security and usability for v2.</p>
                                    <p>reCAPTCHA v3 is intended for power users, site owners that want more data about their traffic, and for use cases in which it is not appropriate to show a challenge to the user.</p>
                                    <p>For example, a registration page might still use reCAPTCHA v2 for a higher-friction challenge, whereas more common actions like sign-in, searches, comments, or voting might use reCAPTCHA v3. To see more details, see the reCAPTCHA v3 developer guide.</p>
                                </div>
                            </div>
                        </li>
                
                        <li class="relative border-b border-gray-200">
                            <button type="button" class="w-full px-8 py-6 text-left" @click="selected !== 2 ? selected = 2 : selected = null">
                                <div class="flex items-center justify-between">
                                    <span>
                                        I'd like to run automated tests with reCAPTCHA. What should I do?					
                                    </span>
                                    <span class="ico-plus"></span>
                                </div>
                            </button>
                
                            <div class="relative overflow-hidden transition-all max-h-0 duration-700" style="max-height: 0;" x-ref="container2" x-bind:style="selected == 2 ? 'max-height: ' + $refs.container2.scrollHeight + 'px' : ''">
                                <div class="p-6">
                                    <p>For reCAPTCHA v3, create a separate key for testing environments. Scores may not be accurate as reCAPTCHA v3 relies on seeing real traffic.</p>
                                    <p>For reCAPTCHA v2, use the following test keys. You will always get No CAPTCHA and all verification requests will pass.</p>
                                </div>
                            </div>
                
                        </li>
                
                    
                        <li class="relative border-b border-gray-200">
                            <button type="button" class="w-full px-8 py-6 text-left" @click="selected !== 3 ? selected = 3 : selected = null">
                                <div class="flex items-center justify-between">
                                    <span>
                                        Can I run reCAPTCHA v2 and v3 on the same page?
                                    </span>
                                    <span class="ico-plus"></span>
                                </div>
                            </button>
                
                            <div class="relative overflow-hidden transition-all max-h-0 duration-700" style="max-height: 0;" x-ref="container3" x-bind:style="selected == 3 ? 'max-height: ' + $refs.container3.scrollHeight + 'px' : ''">
                                <div class="p-6">
                                    <p>To do this, load the v3 site key as documented, and then explicitly render v2 using grecaptcha.render.</p>
                                    <p>You are allowed to hide the badge as long as you include the reCAPTCHA branding visibly in the user flow. Please include the following text:</p>
                                    <p>Yes, please use "www.recaptcha.net" in your code in circumstances when "www.google.com" is not accessible.</p>
                <ul>
                <li>First, replace &lt;script src="https://www.google.com/recaptcha/api.js" async defer&gt;&lt;/script&gt; with &lt;script src="https://www.recaptcha.net/recaptcha/api.js" async defer&gt;&lt;/script&gt;</li>
                <li>After that, apply the same to everywhere else that uses "www.google.com/recaptcha/" on your site.</li>
                </ul>
                <p>After that, apply the same to everywhere else that uses "www.google.com/recaptcha/" on your site.</p>
                                </div>
                            </div>
                
                        </li>
                
                            </ul>
                    </div>
                  </div>
            </div>

            <div><a href="#">Ремонт и строительство</a></div>
            <div><a href="#">Грузоперевозки</a></div>
            <div><a href="#">Уборка и помощь по хозяйству</a></div>
            <div><a href="#">Виртуальный помощник</a></div>
            <div><a href="#">Компьютерная помощь</a></div>
            <div><a href="#">Мероприятия и промоакции</a></div>
            <div><a href="#">Дизайн</a></div>
            <div><a href="#">Разработка ПО</a></div>
            <div><a href="#">Фото, видео и аудио</a></div>
            <div><a href="#">Финансовый советник</a></div>
            <div><a href="#">Установка и ремонт техники</a></div>
            <div><a href="#">Красота и здоровье</a></div>
            <div><a href="#">Ремонт цифровой техники</a></div>
            <div><a href="#">Юридическая и бухгалтерская помощь</a></div>
            <div><a href="#">Репетиторы и обучение</a></div>
            <div><a href="#">Ремонт транспорта</a></div>
        </div>

{{-----------------------------------------------------------------------------------}}
{{--                             Right column                                      --}}
{{-----------------------------------------------------------------------------------}}

        <div class="flex flex-row basis-2/3">
            <div class="bg-gray-100 flex flex-row h-40 ">
                <div class="flex flex-col">
                    <div class="flex flex-row">
                        <p>Курьерские услуги: рейтинг исполнителей</p>
                    </div> 
                    <div class="flex flex-row">
                        <p>Только проверенные</p>
                        <p>Сейчас на сайте</p>
                    </div>
                </div>
                <div class="flex flex-col">
                    <p>Город: <a href="#"> Москва </a> </p>
                    <p>Указать метро</p>
                </div>
            </div>
            <div>

            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="//unpkg.com/alpinejs" defer></script>
@endsection