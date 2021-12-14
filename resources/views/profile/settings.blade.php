@extends("layouts.app")

@section("content")

    <div class="container sticky mx-auto">


        <div class="grid grid-cols-3 grid-flow-row mt-10 inline-block">


            {{-- user ma'lumotlari --}}
            <div class="col-span-2 px-2 mx-3 relative">
                <figure class="w-full absolute">
                    <div class="top-0 right-0 float-right text-gray-500 text-sm">
                        <i class="far fa-eye"></i>
                        <span>15 просмотров профиля</span>
                    </div>
                    <h2 class="font-bold text-lg">Здравствуйте, Цезар!</h2>
                    <div class="relative inline-block object-center  w-40 h-50">
                        <img class="rounded-min mx-left overflow-hidden"
                            src="https://data.whicdn.com/images/322027365/original.jpg?t=1541703413" alt="" width="384"
                            height="512">
                        <button class="rounded-md bg-gray-200 w-40 mt-2 px-2" type="button">
                            <i class="fas fa-camera"></i>
                            <span>Изменить фото</span>
                        </button>
                    </div>
                    <div class="inline-block absolute ml-3 mt-1">
                        <p class="inline-block text-m mr-2">34 год</p>
                        <span class="inline-block">
                            <i class="fas fa-map-marker-alt"></i>
                            <p class="inline-block text-m">Москва город</p>
                        </span>
                        <p class="mt-2">Создал <a href="#"><span>1</span></span> задание</a></p>
                        <p class="mt-4">Оценка: 3.6 </p>
                    </div>
                </figure>
                {{-- user ma'lumotlari tugashi --}}
                <div class="content mt-96 w-full absolute">
                    <ul class="relative w-9/10">
                        <li class="inline mr-10"><a href="/home/profile" class=" text-xl font-bold" >Обо мне</a></li>
                        <li class="inline mr-10"><a href="/profile/cash" class=" text-xl font-bold">Счет</a></li>
                        <li class="inline mr-10"><a href="/home/profile" class=" text-xl font-bold" >Тарифы</a></li>
                        <li class="inline mr-10"><a href="/home/profile" class=" text-xl font-bold">Страхование</a></li>
                        <li class="inline mr-10 float-right"><a href="/profile/settings" class="text-black text-2xl"><i
                                    class="black fas fa-cogs absolute"></i></a></li>
                        <hr>
                    </ul>

                
            
{{-- settings start --}}
                    <div class="absolute w-full block">
<!-- settings form TABS -->
                        <div class="w-full mx-auto mt-4  rounded">
                            <!-- Tabs -->
                            <ul id="tabs" class="inline-flex w-full px-1 pt-2 ">
                            <li class="px-4 py-2 -mb-px font-semibold text-gray-800 border-b-2 border-blue-400 rounded-t opacity-50"><a id="default-tab" href="#first">Общие настройки</a></li>
                            <li class="px-4 py-2 font-semibold text-gray-800 rounded-t opacity-50"><a href="#second">Уведомления</a></li>
                            <li class="px-4 py-2 font-semibold text-gray-800 rounded-t opacity-50"><a href="#third">Подписка на задания</a></li>
                            <li class="px-4 py-2 font-semibold text-gray-800 rounded-t opacity-50"><a href="#fourth">Безопасность</a></li>
                            </ul>

<!-- Tab Contents -->
                            <div id="tab-contents" class="w-full">
                                <div id="first" class="p-4 w-full">
{{-- settings/ first tab -> base settings start --}}
                                    <div class="flex justify-left items-center w-full">
                                        <div class="w-3/5 m-4">
                                            <h1 class="block w-3/5 text-left text-gray-800 text-3xl font-bold mb-6">Личные данные</h1>
                                            <form action="/" method="post">
                                                <div class="flex flex-col mb-4">
                                                    <label class="mb-2 text-md text-gray-400" for="first_name">Имя</label>
                                                    <input class="rounded-xl border py-2 px-3 text-grey-900" type="text" name="first_name" id="first_name">
                                                </div>
                                                <div class="flex flex-col mb-4">
                                                    <label class="mb-2 text-md text-gray-400" for="last_name">Фамилия</label>
                                                    <input class="rounded-xl border py-2 px-3 text-grey-900" type="text" name="last_name" id="last_name">
                                                </div>
                                                <div class="flex flex-col mb-4">
                                                    <label class="mb-2 text-md text-gray-400" for="email">Email</label>
                                                    <input class="rounded-xl border py-2 px-3 text-grey-900" type="email" name="email" id="email">
                                                </div>
                                                <div class="flex flex-col mb-4">
                                                    <label class="mb-2 text-md text-gray-400" for="Date">Дата рождения</label>
                                                    <input class="rounded-xl border py-2 px-3 text-grey-900" type="date" name="date" id="date">
                                                </div>
                                                <div class="flex flex-col mb-4">
                                                    <label class="mb-2 text-md text-gray-400" for="textarea">Другие сведения</label>
                                                    <textarea class="border rounded-xl py-2 px-3 text-grey-900" name="textarea" id="textarea"></textarea>
                                                </div>
                                                <div class="flex flex-col mb-4">
                                                    <label class="mb-2 text-md text-gray-400" for="Select">Город</label>
                                                    <select class="border rounded-xl py-2 px-3 text-grey-900">
                                                        <option>Ташкент</option>
                                                        <option>Jakarta</option>
                                                        <option>Bandung</option>
                                                        <option>Mojokerto</option>
                                                    </select>
                                                </div>
                                              
                                                <button class="block w-2/5 bg-green-400 hover:bg-green-600 text-white uppercase text-lg p-4 rounded-xl" type="submit">Сохранить</button>
                                            </form>
                                        </div>
                                    </div>
{{-- settings/ first tab -> base settings end--}}
                                </div>
                                <div id="second" class="hidden p-4">
{{-- settings/ second tab -> enable notification start --}}
                                    <div class="w-4/5 mt-5">
                                        <h3 class="font-bold text-3xl">Получать уведомления:</h3>
                                        <input type="checkbox" class="w-5 h-5 mt-8 inline-block"/>
                                        <span class="inline-block ml-2">Системные уведомления</span>

                                        <input type="checkbox" class="w-5 ml-10 h-5 mt-8 inline-block"/>
                                        <span class="inline-block ml-2">Я хочу получать новости сайта</span>
                                        <button class="block w-1/4 mt-10 bg-green-400 hover:bg-green-600 text-white uppercase text-lg p-4 rounded-xl" type="submit">Сохранить</button>
                                    </div>
{{-- settings/ second tab -> enable notification end --}}
                                </div>
                                <div id="third" class="hidden p-4">
{{-- settings/ third tab start -> subscribe for some tasks --}}
                                    <div class="w-4/5 mt-10">
                                        <h3 class="font-bold text-3xl mb-7">1. Выберите категории</h3>
    {{-- choosing categories --}}
                                        <div class="parentCategory rounded-xl bg-gray-200 px-3 py-3">
                                            <h4 class="font-bold text-gray-900 text-lg">Курьерские услуги</h4>
                                            <div class="childCategory px-10 mb-5">
                                                <div class="firstChild">
                                                    <input type="checkbox" class="w-5 h-5 inline">
                                                    <p class="text-lg inline ml-2">Услуги пешего курьера</p>
                                                </div>
                                            </div>
                                        </div>
    {{-- choosing categories end --}}
    {{-- changing geolocation --}}
                                        <div class="geolocation">
                                            <h3 class="font-bold text-3xl mb-7 mt-10">2. Геопозиция. Ташкент и Ташкентская область</h3>
                                            <p class=" mt-5 text-sm text-left text-gray-600 ">Выберите районы, из которых вы хотите получать уведомления о новых заданиях:</p>
                                            <div class="parentCategory rounded-xl bg-gray-200 px-3 py-3">
                                                <h4 class="font-bold text-gray-900 text-lg">город Ташкент</h4>
                                                <button id="open-btn" class="rounded-xl bg-gray-300 h-10 w-2/5 px-10 mb-5">
                                                    <i class="fas fa-exchange-alt inline mr-3"></i>
                                                    <span class="inline">Изменить район</span>
                                                </button>
                                                <h4 class="font-bold text-gray-900 text-lg">Ташкентская область</h4>
                                                <button id="open-btn" class="rounded-xl bg-gray-300 h-10 w-2/5 px-10 mb-5">
                                                    <i class="fas fa-exchange-alt inline mr-3"></i>
                                                    <span class="inline">Изменить район</span>
                                                </button>
                                                <div>
                                                    <input type="checkbox" class="w-5 h-5 inline">
                                                    <p class="text-sm text-center inline ml-2">Отправлять уведомление, если новое задание находится рядом со мной. Если на вашем телефоне установлено мобильное приложение.</p>
                                                </div>
                                                {{-- changing modal --}}
                                                <div class="fixed hidden z-50 inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full" id="my-modal">
                                                    <div class="relative top-20 mx-auto p-5 border w-2/5 shadow-lg rounded-md bg-white">
                                                        <div class="mt-3 text-center">
                                                            <button type="submit" id="close-btn"
                                                                class="px-4 py-4 bg-gray-300 rounded-md w-100 h-16 absolute right-4 top-4 hover:bg-gray-500">
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
                                                                <button id="ok-btn"
                                                                    class="px-4 py-2 bg-green-500 text-white text-xl font-medium rounded-md w-2/5 h-16  shadow-sm hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-300">
                                                                    К оплате x сум
                                                                </button>
                                                                <p>* — Порядок выплаты, ограничения и полные условия определены в <a href="/home/oferta"
                                                                        class="cursor-pointer text-sm text-blue-400 underline">Оферте</a></p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                
                                                {{-- changing modal end --}}
                                            </div>
                                        </div>  
    {{-- changing geolocation end --}}
    {{-- notification type --}}
                                        <div class="notification">
                                            <h3 class="font-bold text-3xl mb-7 mt-10">3. Типы уведомлений</h3>
                                            <p class="mt-5">Уведомлять меня по:</p>
                                            
                                            <input type="checkbox" class="inline w-4 h-4" />
                                            <i class="far fa-envelope inline mr-1"></i>
                                            <span class="inline">E-mail</span>
                                            
                                            <input type="checkbox" class="inline w-4 h-4 ml-10"/>
                                            <i class="fas fa-mobile-alt inline mr-1"></i>
                                            <span class="inline">Push</span>
                                            
                                        </div>
    {{-- notification type end --}} 
    {{-- task recommmendation --}}
                                        <div class="recommendation">
                                            <h3 class="font-bold text-3xl mb-7 mt-10">3. Типы уведомлений</h3>
                                        </div>
    {{-- task recommendation end --}}
                                    </div>
{{-- settings/ third tab end -> subscribe for some tasks --}}
                                </div>
                                <div id="fourth" class="hidden p-4">
                                    Fourth tab
                                </div>
                            </div>
                        </div>
{{-- scripts --}}
                        <script>
                        let tabsContainer = document.querySelector("#tabs");

                        let tabTogglers = tabsContainer.querySelectorAll("a");
                        console.log(tabTogglers);

                        tabTogglers.forEach(function(toggler) {
                        toggler.addEventListener("click", function(e) {
                        e.preventDefault();

                        let tabName = this.getAttribute("href");

                        let tabContents = document.querySelector("#tab-contents");

                        for (let i = 0; i < tabContents.children.length; i++) {

                        tabTogglers[i].parentElement.classList.remove("border-blue-400", "border-b",  "-mb-px", "opacity-100");  tabContents.children[i].classList.remove("hidden");
                        if ("#" + tabContents.children[i].id === tabName) {
                        continue;
                        }
                        tabContents.children[i].classList.add("hidden");

                        }
                        e.target.parentElement.classList.add("border-blue-400", "border-b-4", "-mb-px", "opacity-100");
                        });
                        });

                        document.getElementById("default-tab").click();

                        </script>
                    </div>
                </div>
            </div>
{{-- right side bar --}}
            <div
                class="col-span-1 mx-2 inline-block absolute w-1/5 float-right right-20 rounded-xl ring-1 ring-gray-100 h-auto lg:visible xl:visible md:visible  sm:invisible">
                <div class="mt-6 ml-4">
                    <h3 class="font-bold">Исполнитель</h3>
                    <p>на YouDo с 12 сентября 2021 г.</p>
                </div>
                <div class="contacts relative ">
                    <div class="ml-4 h-20 grid grid-cols-4">
                        <div class="w-14 h-14 text-center mx-auto my-auto py-3 rounded-xl col-span-1"
                            style="background-color: orange;">
                            <i class="fas fa-phone-alt text-white"></i>
                        </div>
                        <div class="ml-3 col-span-3">
                            <h5 class="font-bold text-black block mt-2">Телефон</h5>
                            <p class="font-bold text-black block ">+998xx xxx-xx-xx</p>
                        </div>
                    </div>
                    <div class="telefon ml-4 h-20 grid grid-cols-4">
                        <div class="w-14 h-14 text-center mx-auto my-auto py-3 rounded-xl col-span-1"
                            style="background-color: #0091E6;">
                            <i class="far fa-envelope text-white"></i>
                        </div>
                        <div class="ml-3 col-span-3">
                            <h5 class="font-bold text-black block mt-2">Email</h5>
                            <p class="font-bold text-black block ">user@yandex.ru</p>
                        </div>
                    </div>
                    <div class="telefon ml-4 h-20 grid grid-cols-4">
                        <div class="w-14 h-14 text-center mx-auto my-auto py-3 rounded-xl col-span-1"
                            style="background-color: #4285F4;">
                            <i class="fab fa-google text-white"></i>
                        </div>
                        <div class="ml-3 col-span-3">
                            <h5 class="font-bold text-black block mt-2">Google</h5>
                            <p class="font-bold text-black block ">Подтвержден</p>
                        </div>
                    </div>
                </div>
                <p class="mx-5 my-4">Повысьте доверие пользователей к себе — привяжите ваши аккаунты социальных
                    сетей к профилю Servicebox. Мы обязуемся не раскрывать ваши контакты.</p>
                <div class="telefon ml-4 h-20 grid grid-cols-4">
                    <div class="w-14 h-14 text-center mx-auto my-auto py-3 bg-gray-300 rounded-xl col-span-1">
                        <i class="fas fa-fingerprint text-white"></i>
                    </div>
                    <div class="ml-3 col-span-3">
                        <h5 class="font-bold text-black block mt-2 text-md">OneID</h5>
                        <a href="#" class=" block text-sm">Привязать</a>
                    </div>
                </div>
                <div class="telefon ml-4 h-20 grid grid-cols-4">
                    <div class="w-14 h-14 text-center mx-auto my-auto py-3 bg-gray-300 rounded-xl col-span-1">
                        <i class="far fa-envelope text-white"></i>
                    </div>
                    <div class="ml-3 col-span-3">
                        <h5 class="font-bold text-black block mt-2 text-md">mail.ru</h5>
                        <a href="#" class=" block text-sm">Привязать</a>
                    </div>
                </div>
                <div class="telefon ml-4 h-20 grid grid-cols-4">
                    <div class="w-14 h-14 text-center mx-auto my-auto py-3 bg-gray-300 rounded-xl col-span-1">
                        <i class="fab fa-facebook-f text-white"></i>
                    </div>
                    <div class="ml-3 col-span-3">
                        <h5 class="font-bold text-black block mt-2 text-md">Facebook</h5>
                        <a href="#" class=" block text-sm">Привязать</a>
                    </div>
                </div>
                <div class="telefon ml-4 h-20 grid grid-cols-4">
                    <div class="w-14 h-14 text-center mx-auto my-auto py-3 bg-gray-300 rounded-xl col-span-1">
                        <i class="fab fa-twitter text-white"></i>
                    </div>
                    <div class="ml-3 col-span-3">
                        <h5 class="font-bold text-black block mt-2 text-md">Twitter</h5>
                        <a href="#" class=" block text-sm">Привязать</a>
                    </div>
                </div>
                <div class="telefon ml-4 h-20 grid grid-cols-4">
                    <div class="w-14 h-14 text-center mx-auto my-auto py-3 bg-gray-300 rounded-xl col-span-1">
                        <i class="fab fa-apple text-white"></i>
                    </div>
                    <div class="ml-3 col-span-3">
                        <h5 class="font-bold text-black block mt-2 text-md">AppleID</h5>
                        <a href="#" class=" block text-sm">Привязать</a>
                    </div>
                </div>
            </div>
{{-- right side bar end--}}
        </div>
    </div>
   

@endsection