@extends("layouts.app")

@section("content")

    <div class="container mx-auto">


        <div class="grid grid-cols-3  grid-flow-row mt-10">


            {{-- user ma'lumotlari --}}
            <div class="md:col-span-2 col-span-3 px-2 mx-3">
                <figure class="w-full">
                    <div class="top-0 right-0 float-right text-gray-500 text-sm">
                        <i class="far fa-eye"></i>
                        <span>2105 просмотров профиля</span>
                    </div>
                   <div>
                       <p class="text-lg text-gray-500">Был на сайте 1 ч. 8 мин. назад</p>
                       <h1 class="text-3xl font-bold ">Борис Касьянов</h1>
                   </div>

                   <div class="flex w-full mt-6">
                    <div class="flex-initial w-1/3">
                      <img class="h-56 w-56" src="https://avatar.youdo.com/get.userAvatar?AvatarId=7441787&AvatarType=H180W180" alt="#">
                    </div>
                    <div class="flex-initial w-2/3 lg:ml-0 ml-6">
                        <div class="font-medium text-lg">
                            <i class="fas fa-check-circle text-lime-600 text-2xl"></i>
                            <span>Документы подтверждены</span>
                        </div>
                        <div class="text-gray-500 text-base mt-4">
                            <span>20 лет</span>
                            <i class="fas fa-map-marker-alt"></i>
                            <span>Санкт-Петербург</span>
                        </div>
                        <div class="text-gray-500 text-base mt-6">
                            <span>Выполнил 199 заданий, создал 3 задания</span>
                        </div>
                        <div class="text-gray-500 text-base mt-1">
                            <span>Средняя оценка: 4,9</span>
                             <i  class="fas fa-star text-amber-500"></i><i  class="fas fa-star text-amber-500"></i><i  class="fas fa-star text-amber-500"></i><i  class="fas fa-star text-amber-500"></i><i  class="fas fa-star text-amber-500"></i>
                            <span class="text-cyan-500 hover:text-red-600">(197 отзывов)</span>
                        </div>
                        <div class="flex flex-row">
                             <img class="h-24 mt-4 ml-2" src="{{ asset('images/icon_year.svg') }}">
                             <img class="h-24 mt-4 ml-4" src="{{ asset('images/icon_shield.png') }}">
                             <img class="h-20 mt-6 ml-4" src="{{ asset('images/icon_bag.png') }}">
                         </div>
                         <div>
                             <a href="#"><button class="bg-gray-300 text-inherit mt-6 disabled font-bold py-2 px-4 rounded opacity-50 ">
                                Задать вопрос
                              </button></a>
                         </div>
                         <a class="md:hidden block mt-8" href="#">
                            <button  class="bg-amber-600 hover:bg-amber-500 text-2xl text-white font-medium py-4 px-12  rounded">
                                Предложить задание
                            </button>
                        </a>
                    </div>
                  </div>
                </figure>

                <div class="mt-8">
                    <h1 class="text-3xl font-semibold text-gray-700">Обо мне</h1>
                    <div class="mt-4 mb-4 bg-orange-100 py-4 rounded-xl">
                        <p class="ml-6">Чтобы воспользоваться моими услугами, нажмите кнопку <a class="text-red-500" href="#">«Предложить задание»</a>. <br>
                            Сотрудничаю с условием, что о моей работе будет оставлен отзыв на YouDo.</p>
                    </div>
                </div>
                <p>Доброго времени суток, меня зовут Борис, я работал курьером на протяжении трёх лет в таких компаниях как: МигМигом, Sabellino и dostavista (Москва); на данный момент занимаюсь организацией доставок, иногда сам подрабатываю курьером, нахожусь в активном поиске частных лиц, процент беру минимальный, являюсь самозанятым в компании Amway, буду рад с Вами сотрудничать, для обсуждения деталей задания пожалуйста пишите на Вотсап.</p>

                <h1 class="mt-12 text-3xl font-medium">Виды выполняемых работ</h1>

               <div class="mt-8">
                    <a href="#" class="text-2xl font-medium hover:text-red-500 underline underline-offset-4 ">Курьерские услуги</a>
                    <p class="mt-2 text-gray-400 text-lg">1 место в рейтинге категории в г. Санкт-Петербург, выполнено 199 заданий <br>
                        20 место в общем рейтинге категории</p>
               </div>
               <div>
                  <ul>
                    <li class="text-lg mt-2"><a class="hover:text-red-500 underline underline-offset-4 text-gray-500"  href="#">Услуги пешего курьера</a>  ................................................1 место</li>
                    <li class="text-lg mt-2"><a class="hover:text-red-500 underline underline-offset-4 text-gray-500"  href="#">Другая посылка</a>  ...............................................................1 место</li>
                    <li class="text-lg mt-2"><a class="hover:text-red-500 underline underline-offset-4 text-gray-500"  href="#">Срочная доставка</a>  ..........................................................1 место</li>
                    <li class="text-lg mt-2"><a class="hover:text-red-500 underline underline-offset-4 text-gray-500"  href="#">Доставка продуктов</a>  .....................................................1 место</li>
                    <li class="text-lg mt-2"><a class="hover:text-red-500 underline underline-offset-4 text-gray-500"  href="#">Купить и доставить</a>  .......................................................2 место</li>
                    <li class="text-lg mt-2"><a class="hover:text-red-500 underline underline-offset-4 text-gray-500"  href="#">Услуги курьера на легковом авто</a>  .........................4 место</li>
                    <li class="text-lg mt-2"><a class="hover:text-red-500 underline underline-offset-4 text-gray-500"  href="#">Доставка еды из ресторанов</a>(нет выполненных заданий) </li>
                    <li class="text-lg mt-2"><a class="hover:text-red-500 underline underline-offset-4 text-gray-500"  href="#">Курьер на день</a>(нет выполненных заданий)</li>
                  </ul>
               </div>

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
             
            <div class="md:col-span-1 col-span-3  md:mx-2 mx-auto inline-block w-4/5 float-right right-20  h-auto">
                <div class="mt-8 ">
                    <a class="md:block hidden" href="#">
                        <button  class="modal-open bg-amber-600 hover:bg-amber-500 text-2xl text-white font-medium py-4 px-12  rounded">
                            Предложить задание
                        </button>
                    </a>
                    <p class="md:block hidden text-sm text-amber-500 text-center mt-8">Исполнитель получит уведомление и сможет оказать вам свои услуги</p>
                </div>
                <div class="mt-16 border p-8 rounded-lg border-gray-300">
                    <div>
                        <h1 class="font-medium text-2xl">Исполнитель</h1>
                        <p class="text-gray-400">на YouDo с 13 апреля 2021 г.</p>
                    </div>
                    <div class="">
                        <div class="flex w-full mt-4">
                            <div class="flex-initial w-1/4">
                                <i class="text-[#fff] far fa-file-image text-2xl bg-lime-500 py-3 px-4 rounded-lg"></i>
                            </div>
                            <div class="flex-initial w-3/4 xl:ml-0 ml-8">
                                <h2 class="font-medium text-lg">Документы</h2>
                                <p>Документы проверены</p>
                            </div>
                        </div>
                        <div class="flex w-full mt-4">
                            <div class="flex-initial w-1/4">
                                <i class="text-[#fff] fas fa-phone-square text-2xl bg-amber-500 py-3 px-4 rounded-lg"></i>
                            </div>
                            <div class="flex-initial w-3/4 xl:ml-0 ml-8">
                                <h2 class="font-medium text-lg">Телефон</h2>
                                <p>Подтвержден</p>
                            </div>
                        </div>
                        <div class="flex w-full mt-4">
                            <div class="flex-initial w-1/4">
                                <i class="text-[#fff] far fa-envelope text-2xl bg-blue-500 py-3 px-4 rounded-lg"></i>
                            </div>
                            <div class="flex-initial w-3/4 xl:ml-0 ml-8">
                                <h2 class="font-medium text-lg">Email</h2>
                                <p>Подтвержден</p>
                            </div>
                        </div>
                        <div class="flex w-full mt-4">
                            <div class="flex-initial w-1/4">
                                <i class="text-[#fff] far fa-address-book text-2xl bg-blue-400 py-3 px-4 rounded-lg"></i>
                            </div>
                            <div class="flex-initial w-3/4 xl:ml-0 ml-8">
                                <h2 class="font-medium text-lg">Вконтакте</h2>
                                <p>Подтвержден</p>
                            </div>
                        </div>
                        <div class="flex w-full mt-4">
                            <div class="flex-initial w-1/4">
                                <i class=" fab fa-apple text-2xl bg-gray-400 text-[#fff] py-3 px-4 rounded-lg"></i>
                            </div>
                            <div class="flex-initial w-3/4 xl:ml-0 ml-8">
                                <h2 class="font-medium text-lg">Apple ID</h2>
                                <p>Подтвержден</p>
                            </div>
                        </div>
                    </div>
                </div>
           
                <div class="mt-8">
                    <h1 class="text-3xl font-medium">Новые публикации <br><a href="#" class="text-blue-500 hover:text-red-600"> в блоге</a></h1>
                    <img class="mt-4 rounded-xl " src="https://content0.youdo.com/zi.ashx?i=d36fd188a176881f" alt="#">
                    <h1 class="mt-4 font-medium text-xl text-gray-700">Из фрилансера в CEO Digital-агентства</h1>
                    <p class="mt-2 font-normal text-base text-gray-700">Вдохновляющая видео-история <br> исполнителя Александра</p>
                    <hr class="mt-4 mb-4 text-gray-300">
                    <h2 class="font-medium text-xl text-gray-700">Станьте сертифицированным мастером Tarkett</h2>
                    <hr class="mt-4 mb-4 text-gray-300">
                    <h2 class="font-medium text-xl text-gray-700">Средства для ухода за посудомоечной машиной в подарок</h2>
                    <hr class="mt-4 mb-4 text-gray-300">
                    <h2 class="font-medium text-xl text-gray-700">Решили убраться? Получите за это подарок!</h2>
                </div>
            </div>
{{-- right side bar end--}}
        </div>
    </div>

    {{-- Modal start --}}
    
   
    {{-- Modal end --}}

@endsection
