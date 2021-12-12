@extends("layouts.app")

@section("content")

        <div class="container sticky mx-auto">


        <div class="grid grid-cols-3 grid-flow-row mt-10 inline-block">


            {{-- user ma'lumotlari --}}
            <div class="col-span-2 px-2 mx-3">
                <figure class="w-full">
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
                <div class="content mt-20 relative">
                    <ul class="relative w-9/10">
                        <li class="inline mr-10"><a href="/home/profile" class=" text-xl font-bold" onclick="changeAtiveTab(event,'tab-profile')">Обо мне</a></li>
                        <li class="inline mr-10"><a href="/home/cash" class=" text-2xl font-bold underline" onclick="changeAtiveTab(event,'tab-cash')">Счет</a></li>
                        <li class="inline mr-10"><a href="/home/profile" class=" text-xl font-bold" onclick="changeAtiveTab(event,'tab-options')">Тарифы</a></li>
                        <li class="inline mr-10"><a href="/home/profile" class=" text-xl font-bold">Страхование</a></li>
                        <li class="inline mr-10 float-right"><a href="/" class="text-black text-xl"><i
                                    class="black fas fa-cogs absolute"></i></a></li>
                        <hr>
                    </ul>
                    {{-- "men haqimda" start --}}
                    <div class="about-me hidden absolute" id="tab-profile">
                        <div class="about-a-bit mt-10">
                            <h4 class="inline font-bold text-lg">Немного о себе</h4>
                            <span class="ml-10">
                                <i class="fas fa-pencil-alt inline text-gray-300"></i>
                                <p class="inline text-gray-300 cursor-pointer">Редактировать</p>
                            </span>
                            <p class="mt-3 w-4/5">Lorem Ipsum is simply dummy text of the printing and typesetting
                                industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                                when an unknown printer took a galley of type and scrambled it to make a type specimen
                                book.</p>
                        </div>
                        <h4 class="font-bold text-lg mt-5">Примеры работ</h4>
                        <div class="example-of-works w-full mt-2 mx-auto flex flex-wrap">

                            <div class="lg:w-1/3 md:w-1/2 w-full p-4 relative">
                                <div class="rounded-xl shadow-lg relative object-center">
                                    <img class="rounded-t-xl z-10 relative"
                                        src="https://ichef.bbci.co.uk/news/999/cpsprodpb/15951/production/_117310488_16.jpg">
                                    <div class="w-full bg-gray-700 hover:bg-gray-500 relative z-40 rounded-b-xl h-10">
                                        <p class="inline ml-4 text-white">text for jobs</p>
                                        <i class="inline fas fa-camera float-right text-white text-xl mr-3 my-1"><span
                                                class="text-sm"> 1</span> </i>
                                    </div>
                                </div>
                            </div>

                            <div class="lg:w-1/3 md:w-1/2 w-full p-4 relative">
                                <div class="rounded-xl shadow-lg relative object-center">
                                    <img class="rounded-t-xl z-10 relative"
                                        src="https://ichef.bbci.co.uk/news/999/cpsprodpb/15951/production/_117310488_16.jpg">
                                    <div class="w-full bg-gray-700 hover:bg-gray-500 relative z-40 rounded-b-xl h-10">
                                        <p class="inline ml-4 text-white">text for jobs</p>
                                        <i class="inline fas fa-camera float-right text-white text-xl mr-3 my-1"><span
                                                class="text-sm"> 1</span></i>
                                    </div>
                                </div>
                            </div>
                            <div class="lg:w-1/3 md:w-1/2 w-full p-4 relative hover:bg-gray-100 cursor-pointer">
                                <div class="rounded-xl ring-1 ring-gray-300 relative object-center w-full h-56">
                                    <i class="fas fa-plus-circle text-gray-300 text-9xl text-center mt-10 w-full"></i>

                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- "men haqimda" end --}}
                    {{-- hisob --}} <div class="cash block absolute w-full" id="tab-cash">
                        <div class="head mt-5">
                            <h2 class="font-bold text-xl">Ваш баланс 0 &#36;</h2>
                            <p class="inline">Пополнить счет на</p>
                            <input class="inline rounded-xl ml-3 w-20 h-10 ring-1" type='number' />
                            <span class="ml-1 text-xl">&#36;</span>
                            <button type="submit"
                                class="inline h-10 rounded-xl ring-0 hover:bg-green-700 text-white bg-green-400 ml-10 w-40">Пополнить
                                счет</button>
                        </div>
                        <div class="relative mt-10 p-5 bg-gray-100 w-full block">
                            <h2 class="inline-block font-bold text-xl">История операций</h2>
                            <label class="text-left inline-block w-1/2">
                                <select class="form-select block w-36 h-10 rounded-xl ring-1 ring-black ml-5">
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
                            <iframe class="w-full mb-10 h-96" src="https://www.youtube.com/embed/Js_5Pal4bOE">
                            </iframe>

                        </div>
                    </div>
                    {{-- hisob end --}}
                </div>

            </div>


            {{-- o`ng tomon ispolnitel --}}
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
            {{-- tugashi o'ng tomon ispolnitel --}}
        </div>




    </div>

    
    <script>
        let modal = document.getElementById("my-modal");

        let btn = document.getElementById("open-btn");

        let button = document.getElementById("ok-btn");
        
        let closebtn = document.getElementById("close-btn");

        closebtn.onclick = function() {
            modal.style.display = "none";
        }

        btn.onclick = function() {
            modal.style.display = "block";
        }
        // We want the modal to close when the OK button is clicked
        button.onclick = function() {
            modal.style.display = "none";
        }

        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>
     

    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>


@endsection