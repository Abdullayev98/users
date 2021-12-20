@extends("layouts.app")

@section("content")

    <div class="container lg:w-4/5 p-5 w-full my-10 mx-auto">


        <div class="grid md:grid-cols-3 grid-flow-row mt-10 inline-block">


            {{-- user ma'lumotlari --}}
            <div class="col-span-2 md:mx-3 mx-0">
                <figure class="w-full">
                    <div class="top-0 right-0 float-right text-gray-500 text-sm">
                        <i class="far fa-eye"></i>
                        <span>15 просмотров профиля</span>
                    </div>
                    <br>
                    <h2 class="font-bold text-2xl">Здравствуйте, Цезар!</h2>
                    <div class="grid grid-cols-3 mx-auto md:mx-1">
                        <div class="col-span-1 object-center w-40 h-50">
                            <img class="rounded-min mx-left overflow-hidden"
                                src="https://data.whicdn.com/images/322027365/original.jpg?t=1541703413" alt="" width="384"
                                height="512">
                            <button class="rounded-md bg-gray-200 w-40 mt-2 px-2" type="button">
                                <i class="fas fa-camera"></i>
                                <span>Изменить фото</span>
                            </button>
                        </div>
                        <div class="sm:col-span-1 col-span-3 md:ml-3 md:mt-1 mt-5">
                            <p class="inline-block text-m mr-2">34 год</p>
                            <span class="inline-block">
                                <i class="fas fa-map-marker-alt"></i>
                                <p class="inline-block text-m">Москва город</p>
                            </span>
                            <p class="mt-2">Создал <a href="#"><span>1</span></span> задание</a></p>
                            <p class="mt-4">Оценка: 3.6 </p>
                        </div>
                    </div>
                </figure>

                <div class="content  mt-20 ">
                    <div class="grid md:grid-cols-10 w-full">
                        <ul class="md:col-span-9 col-span-10 items-center w-3/4 md:w-full">
                            <li class="inline mr-1 md:mr-5"><a href="/home/profile" class="md:text-[18px] text-[14px]" >Обо мне</a></li>
                            <li class="inline mr-1 md:mr-5"><a href="/profile/cash" class="md:text-[18px] text-[14px] font-bold" >Счет</a></li>
                            {{-- <li class="inline mr-1 md:mr-5"><a href="/home/profile" class="md:text-[18px] text-[14px]" >Тарифы</a></li>
                            <li class="inline mr-1 md:mr-5"><a href="/home/profile" class="md:text-[18px] text-[14px]">Страхование</a></li> --}}
                            <li class=" md:mr-5 mr-1 inline-block md:hidden block"><a href="/profile/settings" class="md:text-[18px] text-[14px]" id="settingsText">Настройки</a></li>

                        </ul>
                        <div class="md:col-span-1 md:block hidden" id="settingsIcon"><a href="/profile/settings"><i class="fas fa-user-cog text-3xl" ></i></a></div>
                    </div>
                    <hr>

                    {{-- "about-me" start --}}

                    {{-- "about-me" end --}}
                    {{-- cash --}} <div class="cash block  w-full" id="tab-cash">
                        <div class="head mt-5">
                            <h2 class="font-bold text-xl">Ваш баланс 0 &#36;</h2>
                            <p class="inline">Пополнить счет на</p>
                            <input class="inline rounded-xl ml-3 w-20 h-10 ring-1" type='number' />
                            <span class="ml-1 text-xl">&#36;</span>
                            <button type="submit"
                                class="md:inline block md:ml-10 mx-auto mt-5 md:mt-0 h-10 rounded-xl ring-0 hover:bg-green-700 text-white bg-green-400 md:w-40 w-full">Пополнить
                                счет</button>
                        </div>
                        <div class="relative mt-10 p-5 bg-gray-100 w-full block">
                            <h2 class="inline-block font-bold text-xl">История операций</h2>
                            <label class="text-left md:inline-block w-full  md:w-1/2">
                                <select class="form-select block md:w-36 w-full h-10 rounded-xl ring-1 ring-black md:0 md:ml-5">
                                    <option>за месяц</option>
                                    <option>за неделю</option>
                                    <option>за год</option>
                                    <option>за период</option>
                                </select>
                            </label>
                            <ul class="mt-5">
                                <li class="inline ml-5"><a href="/home/profile">Все операции</a></li>
                                <li class="inline ml-5 underline text-[#0091e6]"><a href="/home/profile">Пополнения
                                        счета</a></li>
                                <li class="inline ml-5 underline text-[#0091e6]"><a href="/home/profile">Списания со
                                        счета</a></li>
                            </ul>
                            <p class="italic ml-5 mt-3">За данный период транзакций не было</p>
                        </div>
                        <div class="FAQ reltive block w-full mt-5">
                            <h2 class="font-bold text-xl">Частые вопросы</h2>
                            <h4 class="font-bold text-md mt-2">Условия работы с YouDo.</h4>
                            <p>YouDo списывает с исполнителей фиксированную оплату за возможность оставлять к заданиям
                                отклики с контактными данными. Стоимость одного отклика зависит от категории заданий и
                                начинается от 20 рублей. Оплата за отклики не возвращается.</p>
                            <h4 class="font-bold text-md mt-2">Какая минимальная сумма для пополнения счета?</h4>
                            <p>400 рублей.</p>
                            <h4 class="font-bold text-md mt-2">Как сделать возврат денег со своего счета в YouDo?</h4>
                            <p><a href="/home/profile" class="text-blue-500">Оформить запрос на возврат денег</a> -
                                кликните по этой ссылке и укажите сумму, которую вы хотите вернуть. Как правило, деньги
                                перечисляются на тот же счет, с которого производилось пополнение баланса в YouDo, в
                                течение 5 рабочих дней с учетом комиссии платежной системы.</p>
                            <h3 class="font-bold text-lg mt-2">Если у вас остались вопросы об условиях работы с YouDo,
                                посмотрите это обучающее видео:</h3>
                            <iframe class="w-full h-auto" src="https://www.youtube.com/embed/Js_5Pal4bOE">
                            </iframe>

                        </div>
                    </div>
                    {{-- cash end --}}
                </div>

            </div>


            {{--right-side-bar--}}
            <div class="md:col-span-1 col-span-3 md:mx-2 mx-auto md:mt-0 mt-5 inline-block w-4/5 float-right right-20 rounded-xl ring-1 ring-gray-100 h-auto ">
                <div class="mt-6 ml-4">
                    <h3 class="font-bold">Исполнитель</h3>
                    <p>на YouDo с 12 сентября 2021 г.</p>
                </div>
                <div class="contacts relative ">
                    <div class="ml-4 h-20 grid grid-cols-4">
                        <div class="w-10 h-10 text-center mx-auto py-2 my-auto rounded-xl col-span-1"
                            style="background-color: orange;">
                            <i class="fas fa-phone-alt text-white"></i>
                        </div>
                        <div class="ml-3 col-span-3">
                            <h5 class="font-bold text-black block mt-2">Телефон</h5>
                            <p class="text-black block ">+998xx xxx-xx-xx</p>
                        </div>
                    </div>
                    <div class="telefon ml-4 h-20 grid grid-cols-4">
                        <div class="w-10 h-10 text-center mx-auto my-auto py-2 rounded-xl col-span-1"
                            style="background-color: #0091E6;">
                            <i class="far fa-envelope text-white"></i>
                        </div>
                        <div class="ml-3 col-span-3">
                            <h5 class="font-bold text-black block mt-2">Email</h5>
                            <p class="text-black block ">user@yandex.ru</p>
                        </div>
                    </div>
                    <div class="telefon ml-4 h-20 grid grid-cols-4">
                        <div class="w-10 h-10 text-center mx-auto my-auto py-2 rounded-xl col-span-1"
                            style="background-color: #4285F4;">
                            <i class="fab fa-google text-white"></i>
                        </div>
                        <div class="ml-3 col-span-3">
                            <h5 class="font-bold text-black block mt-2">Google</h5>
                            <p class="text-black block ">Подтвержден</p>
                        </div>
                    </div>
                </div>
                <p class="mx-5 my-4">Повысьте доверие пользователей к себе — привяжите ваши аккаунты социальных
                    сетей к профилю Servicebox. Мы обязуемся не раскрывать ваши контакты.</p>
                <div class="telefon ml-4 h-20 grid grid-cols-4">
                    <div class="w-10 h-10 text-center mx-auto my-auto py-2 bg-gray-300 rounded-xl col-span-1">
                        <i class="fas fa-fingerprint text-white"></i>
                    </div>
                    <div class="ml-3 col-span-3">
                        <h5 class="font-bold text-black block mt-2 text-md">OneID</h5>
                        <a href="#" class=" block text-sm">Привязать</a>
                    </div>
                </div>
                <div class="telefon ml-4 h-20 grid grid-cols-4">
                    <div class="w-10 h-10 text-center mx-auto my-auto py-2 bg-gray-300 rounded-xl col-span-1">
                        <i class="far fa-envelope text-white"></i>
                    </div>
                    <div class="ml-3 col-span-3">
                        <h5 class="font-bold text-black block mt-2 text-md">mail.ru</h5>
                        <a href="#" class=" block text-sm">Привязать</a>
                    </div>
                </div>
                <div class="telefon ml-4 h-20 grid grid-cols-4">
                    <div class="w-10 h-10 text-center mx-auto my-auto py-2 bg-gray-300 rounded-xl col-span-1">
                        <i class="fab fa-facebook-f text-white"></i>
                    </div>
                    <div class="ml-3 col-span-3">
                        <h5 class="font-bold text-black block mt-2 text-md">Facebook</h5>
                        <a href="#" class=" block text-sm">Привязать</a>
                    </div>
                </div>
                <div class="telefon ml-4 h-20 grid grid-cols-4">
                    <div class="w-10 h-10 text-center mx-auto my-auto py-2 bg-gray-300 rounded-xl col-span-1">
                        <i class="fab fa-twitter text-white"></i>
                    </div>
                    <div class="ml-3 col-span-3">
                        <h5 class="font-bold text-black block mt-2 text-md">Twitter</h5>
                        <a href="#" class=" block text-sm">Привязать</a>
                    </div>
                </div>
                <div class="telefon ml-4 h-20 grid grid-cols-4">
                    <div class="w-10 h-10 text-center mx-auto my-auto py-2 bg-gray-300 rounded-xl col-span-1">
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




    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
@endsection
