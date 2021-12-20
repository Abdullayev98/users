@extends("layouts.app")

@section("content")

    <div class="container mx-auto">


        <div class="grid grid-cols-3  grid-flow-row mt-10">


            {{-- user ma'lumotlari --}}
            <div class="md:col-span-2 col-span-3 px-2 mx-3">
                <figure class="w-full">
                    <div class="top-0 right-0 float-right text-gray-500 text-sm">
                        <i class="far fa-eye"></i>
                        <span>15 просмотров профиля</span>
                    </div>
                    <br>
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
                    <div class="inline-block ml-3 mt-1">
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
                <div class="content mt-20 ">
                <div class="grid grid-cols-10">
                    <ul class=" md:col-span-9 col-span-10 md:items-left sitems-center">
                        <li class="inline md:mr-5 mr-1"><a href="/home/profile" class=" text-[14px] md:text-[18px]">Обо мне</a></li>
                        <li class="inline md:mr-5 mr-1"><a href="/profile/cash" class=" text-[14px] md:text-[18px]">Счет</a></li>
                        <li class="inline md:mr-5 mr-1"><a href="/profile" class=" text-[14px] md:text-[18px]">Тарифы</a></li>
                        <li class="inline md:mr-5 mr-1"><a href="/home/profile" class=" text-[14px] md:text-[18px]">Страхование</a></li>
                        <li class="inline md:mr-5 mr-1 md:hidden block"><a href="/profile/settings" class="md:text-[18px] text-[14px]" id="settingsText">Настройки</a></li>

                    </ul>
                    <div class="md:col-span-1 md:block hidden" id="settingsIcon"><a href="/profile/settings"><i class="fas fa-user-cog text-3xl" ></i></a></div>
                </div>

                <hr>


{{-- settings start --}}
                    <div class= "w-full">
<!-- settings form TABS -->
                        <div class="w-full mx-auto mt-4  rounded">
                            <!-- Tabs -->
                            <ul id="tabs" class="md:inline-flex block w-full flex-center px-1 pt-2">
                                <li class="px-4 py-2  rounded-xl md:ring-0 w-full md:w-inherit font-semibold text-gray-800 border-b-2 border-blue-400 rounded-t opacity-50"><a id="default-tab" href="#first">Общие настройки</a></li>
                                <li class="px-4 py-2  rounded-xl md:ring-0 w-full md:w-inherit font-semibold text-gray-800 rounded-t opacity-50"><a href="#second">Уведомления</a></li>
                                <li class="px-4 py-2  rounded-xl md:ring-0 w-full md:w-inherit font-semibold text-gray-800 rounded-t opacity-50"><a href="#third">Подписка на задания</a></li>
                                <li class="px-4 py-2  rounded-xl md:ring-0 w-full md:w-inherit font-semibold text-gray-800 rounded-t opacity-50"><a href="#fourth">Безопасность</a></li>
                            </ul>

<!-- Tab Contents -->
                            <div id="tab-contents" class="w-full">
                                <div id="first" class="p-4 w-full">
{{-- settings/ first tab -> base settings start --}}
                                    <div class="flex justify-left w-full">
                                        <div class="md:w-3/5 w-full md:m-4 m-0">
                                            <h1 class="block w-3/5 text-left text-gray-800 text-3xl font-bold mb-6">Личные данные</h1>
                                            <form action="/" class="w-full" method="post">
                                                <div class="w-full mb-4">
                                                    <label class="mb-2 text-md md:block text-gray-400" for="first_name">Имя</label>
                                                    <input class="rounded-xl border py-2 px-3 w-full text-grey-900" type="text" name="first_name" id="first_name">
                                                </div>
                                                <div class="w-full mb-4">
                                                    <label class="mb-2 text-md md:block text-gray-400" for="last_name">Фамилия</label>
                                                    <input class="rounded-xl border py-2 px-3 w-full text-grey-900" type="text" name="last_name" id="last_name">
                                                </div>
                                                <div class="w-full block w-full mb-4">
                                                    <label class="mb-2 text-md md:block text-gray-400" for="email">Email</label>
                                                    <input class="rounded-xl border py-2 px-3 w-full text-grey-900" type="email" name="email" id="email">
                                                </div>
                                                <div class="w-full block w-full mb-4">
                                                    <label class="mb-2 text-md md:block text-gray-400" for="email">Phone number</label>
                                                    <input class="rounded-xl border py-2 px-3 w-full text-grey-900" type="number" name="number" id="number">
                                                </div>
                                                <div class="w-full block w-full mb-4">
                                                    <label class="mb-2 text-md md:block text-gray-400" for="Date">Дата рождения</label>
                                                    <input class="rounded-xl border py-2 px-3 w-full text-grey-900" type="date" name="date" id="date">
                                                </div>
                                                <div class="w-full block w-full mb-4">
                                                    <label class="mb-2 text-md md:block text-gray-400" for="textarea">Другие сведения</label>
                                                    <textarea class="border rounded-xl py-2 px-3 w-full text-grey-900" name="textarea" id="textarea"></textarea>
                                                </div>
                                                <div class="w-full block w-full mb-4">
                                                    <label class="mb-2 text-md md:block text-gray-400" for="Select">Город</label>
                                                    <select class="border rounded-xl py-2 px-3 w-full text-grey-900">
                                                        <option>Ташкент</option>
                                                        <option>Jakarta</option>
                                                        <option>Bandung</option>
                                                        <option>Mojokerto</option>
                                                    </select>
                                                </div>

                                                <a href="#" class="block md:w-3/5 w-full text-center bg-green-400 hover:bg-green-600 text-white uppercase text-lg p-4 rounded-xl mb-5" type="submit">Сохранить</a>
                                                <hr>
                                                <a href="#" class="block md:w-3/5 w-full text-center hover:bg-gray-300 mt-5 uppercase text-lg p-4 rounded-xl" type="submit">Удалить профиль</a>
                                            </form>
                                        </div>
                                    </div>
{{-- settings/ first tab -> base settings end--}}
                                </div>
                                <div id="second" class="hidden p-4">
{{-- settings/ second tab -> enable notification start --}}
                                    <div class="md:w-4/5 w-full mt-5">
                                        <h3 class="font-bold text-3xl">Получать уведомления:</h3>
                                        <div class="grid grid-cols-10 mt-5">
                                            <input type="checkbox" class="w-5 h-5 col-span-1 my-auto mx-auto"/>
                                            <span class="col-span-9 ml-2">Системные уведомления</span>
                                        </div>
                                        <div class="grid grid-cols-10 mt-5">
                                            <input type="checkbox" class="w-5 h-5 col-span-1 my-auto mx-auto"/>
                                            <span class="col-span-9 ml-2">Я хочу получать новости сайта</span>
                                        </div>
                                        <button class="block  md:w-1/2 w-full mt-10 bg-green-400 hover:bg-green-600 text-white uppercase text-lg p-4 rounded-xl" type="submit">Сохранить</button>
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
                                                                class="px-4 py-4 bg-gray-300 rounded-md w-100 h-16 right-4 top-4 hover:bg-gray-500">
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
                class="md:col-span-1 col-span-3  md:mx-2 mx-auto inline-block w-4/5 float-right right-20 rounded-xl ring-1 ring-gray-100 h-auto">
                <div class="mt-6 ml-4">
                    <h3 class="font-bold">Исполнитель</h3>
                    <p>на YouDo с 12 сентября 2021 г.</p>
                </div>
                <div class="contacts relative ">
                    <div class="ml-4 h-20 grid grid-cols-4">
                        <div class="w-12 h-12 text-center mx-auto my-auto py-2 rounded-xl col-span-1"
                            style="background-color: orange;">
                            <i class="fas fa-phone-alt text-white"></i>
                        </div>
                        <div class="ml-3 col-span-3">
                            <h5 class="font-bold text-black block mt-2">Телефон</h5>
                            <p class="text-black text-sm block ">+998xx xxx-xx-xx</p>
                        </div>
                    </div>
                    <div class="telefon ml-4 h-20 grid grid-cols-4">
                        <div class="w-12 h-12 text-center mx-auto my-auto py-2 rounded-xl col-span-1"
                            style="background-color: #0091E6;">
                            <i class="far fa-envelope text-white"></i>
                        </div>
                        <div class="ml-3 col-span-3">
                            <h5 class="font-bold text-black block mt-2">Email</h5>
                            <p class="text-black text-sm block ">user@yandex.ru</p>
                        </div>
                    </div>
                    <div class="telefon ml-4 h-20 grid grid-cols-4">
                        <div class="w-12 h-12 text-center mx-auto my-auto py-2 rounded-xl col-span-1"
                            style="background-color: #4285F4;">
                            <i class="fab fa-google text-white"></i>
                        </div>
                        <div class="ml-3 col-span-3">
                            <h5 class="font-bold text-black block mt-2">Google</h5>
                            <p class="text-black text-sm block ">Подтвержден</p>
                        </div>
                    </div>
                </div>
                <p class="mx-5 my-4">Повысьте доверие пользователей к себе — привяжите ваши аккаунты социальных
                    сетей к профилю Servicebox. Мы обязуемся не раскрывать ваши контакты.</p>
                <div class="telefon ml-4 h-20 grid grid-cols-4">
                    <div class="w-12 h-12 text-center mx-auto my-auto py-2 bg-gray-300 rounded-xl col-span-1">
                        <i class="fas fa-fingerprint text-white"></i>
                    </div>
                    <div class="ml-3 col-span-3">
                        <h5 class="font-bold text-black block mt-2 text-md">OneID</h5>
                        <a href="#" class=" block text-sm">Привязать</a>
                    </div>
                </div>
                <div class="telefon ml-4 h-20 grid grid-cols-4">
                    <div class="w-12 h-12 text-center mx-auto my-auto py-2 bg-gray-300 rounded-xl col-span-1">
                        <i class="far fa-envelope text-white"></i>
                    </div>
                    <div class="ml-3 col-span-3">
                        <h5 class="font-bold text-black block mt-2 text-md">mail.ru</h5>
                        <a href="#" class=" block text-sm">Привязать</a>
                    </div>
                </div>
                <div class="telefon ml-4 h-20 grid grid-cols-4">
                    <div class="w-12 h-12 text-center mx-auto my-auto py-2 bg-gray-300 rounded-xl col-span-1">
                        <i class="fab fa-facebook-f text-white"></i>
                    </div>
                    <div class="ml-3 col-span-3">
                        <h5 class="font-bold text-black block mt-2 text-md">Facebook</h5>
                        <a href="#" class=" block text-sm">Привязать</a>
                    </div>
                </div>
                <div class="telefon ml-4 h-20 grid grid-cols-4">
                    <div class="w-12 h-12 text-center mx-auto my-auto py-2 bg-gray-300 rounded-xl col-span-1">
                        <i class="fab fa-twitter text-white"></i>
                    </div>
                    <div class="ml-3 col-span-3">
                        <h5 class="font-bold text-black block mt-2 text-md">Twitter</h5>
                        <a href="#" class=" block text-sm">Привязать</a>
                    </div>
                </div>
                <div class="telefon ml-4 h-20 grid grid-cols-4">
                    <div class="w-12 h-12 text-center mx-auto my-auto py-2 bg-gray-300 rounded-xl col-span-1">
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
