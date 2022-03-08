@extends("layouts.app")
@section('content')
    <div class="w-11/12  mx-auto text-base mt-4">
        <div class="grid lg:grid-cols-3 grid-cols-2 lg:w-5/6 w-full mx-auto">

            {{-- user ma'lumotlari --}}
            <div class="col-span-2 w-full mx-auto">

                @include('components.profileFigure')

                <div class="content  mt-20 ">
                    <div class="grid md:grid-cols-10 w-full">
                        <ul class="md:col-span-9 col-span-10 items-center w-3/4 md:w-full">
                            <li class="inline mr-1 md:mr-5"><a href="/profile"
                                    class="md:text-[18px] text-[14px] text-gray-600">{{__('Обо мне')}}</a></li>
                            <li class="inline mr-1 md:mr-5"><a href="/profile/cash"
                                    class="md:text-[18px] text-[14px] font-bold text-gray-700">{{__('Счет')}}</a>
                            </li>
                            <li class=" md:mr-5 mr-1 inline-block md:hidden block"><a href="/profile/settings"
                                    class="md:text-[18px] text-[14px] text-gray-600"
                                    id="settingsText">{{__('Настройки')}}</a></li>
                        </ul>
                        <div class="md:col-span-1 md:block hidden" id="settingsIcon"><a href="/profile/settings"><i
                                    class="fas fa-user-cog text-3xl text-gray-600"></i></a></div>
                    </div>
                    <hr>

                    {{-- cash start --}}
                    <div class="cash block  w-full" id="tab-cash">
                        <div class="head mt-5">
                            <h2 class="font-semibold text-2xl text-gray-700 mb-4">{{__('Ваш баланс')}}
                                @if ($balance == null) 0
                                @else {{ amount_format($balance->balance) }}
                                @endif
                            </h2>
                            <p class="inline">{{__('Пополнить счет на')}}</p>
                            <input
                                class="focus:outline-none focus:border-yellow-500  inline rounded-xl xl:ml-3 ring-1 text-2xl text-center h-18 w-36  pb-1"
                                onkeyup="myText.value = this.value" oninput="inputCash()" onkeypress='validate(event)'
                                id="myText1" type='text' min="4000" maxlength="7" value="4000" />
                            <span class="xl:ml-1 xl:text-xl lg:text-lg text-xl">UZS</span>
                            <button onclick="toggleModal()" type="submit" id="button2"
                                class="md:inline block xl:ml-10 lg:ml-2 mx-auto mt-5 md:mt-0 h-10 rounded-xl ring-0 hover:bg-green-600 text-white bg-green-500 md:w-40 w-full">
                                {{__('Пополнить счет')}}
                            </button>
                        </div>
                        <div class="relative mt-10 p-5 bg-gray-100 w-full block">
                            <h2 class="inline-block font-medium text-2xl text-gray-700">{{__('История операций')}}</h2>
                            <label class="text-left md:inline-block w-full  md:w-1/2">
                                <select
                                    class="form-select block md:w-36 w-full h-10 rounded-xl focus:outline-none ring-1 ring-black md:0 md:ml-5">
                                    <option>{{__('за месяц')}}</option>
                                    <option>{{__('за неделю')}}</option>
                                    <option>{{__('за год')}}</option>
                                    <option>{{__('за период')}}</option>
                                </select>
                            </label>

                            <ul id="tabs" class="flex sm:flex-row flex-col rounded-sm w-full shadow bg-gray-200 mt-4">
                                <div id="first_tab" class="w-full text-center">
                                    <a id="default-tab" href="#first"
                                        class="inline-block relative py-1 w-full">{{__('Все операции')}}</a>
                                </div>
                                <div class="w-full text-center">
                                    <a href="#second"
                                        class="inline-block relative py-1 w-full">{{__('Пополнения счета')}}</a>
                                </div>
                                <div id="three_tab" class="w-full text-center">
                                    <a href="#third"
                                        class="inline-block relative py-1 w-full">{{__('Списания со счета')}}</a>
                                </div>
                            </ul>
                            <div id="tab-contents">
                                <div id="first" class="py-4">
                                    <table class="" id="example">
                                        <thead>
                                            <th class="text-center w-1/4 border">{{__('Дата транзакции')}}</th>
                                            <th class="text-center w-1/4 border">{{__('Сумма транзакции')}}</th>
                                            <th class="text-center w-1/4 border">{{__('Оператор')}}</th>
                                        </thead>
                                        <tbody>
                                            @if ($transactions)
                                                @foreach ($transactions as $transaction)
                                                    <tr>
                                                        <td class="text-center w-1/4 border">
                                                            {{ $transaction->created_at->format('d.m.Y') }}</td>
                                                        <td class="text-center w-1/4 border">{{ amount_format($transaction->amount) }}</td>
                                                        <td class="text-center w-1/4 border">{{ $transaction->method }}
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                                <div id="second" class="hidden py-4">
                                    <table class="" id="example">
                                        <thead>
                                            <th class="text-center w-1/4 border">{{__('Дата транзакции')}}</th>
                                            <th class="text-center w-1/4 border">{{__('Сумма транзакции')}}</th>
                                            <th class="text-center w-1/4 border">{{__('Оператор')}}</th>
                                        </thead>
                                        <tbody>
                                            @foreach ($transactions as $transaction)
                                                <tr>

                                                    <td class="text-center w-1/4 border">
                                                        {{ $transaction->created_at->format('d.m.Y') }}</td>
                                                    <td class="text-center w-1/4 border">{{ amount_format($transaction->amount) }}</td>
                                                    <td class="text-center w-1/4 border">{{ $transaction->method }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div id="third" class="hidden py-4">
                                    @foreach ($transactions as $transaction)
                                        <td>{{ $transaction->action }}</td>
                                    @endforeach
                                </div>
                                <div id="third" class="py-4">
                                    {{$transactions->links()}}
                                </div>
                            </div>
                        </div>
                        <div class="FAQ reltive block w-full mt-5 text-gray-600">
                            <h2 class="font-medium text-2xl text-gray-700">{{__('Частые вопросы')}}</h2>
                            <h4 class="font-medium text-lg mt-2 text-gray-700">
                                {{__('Условия работы с Universal Services.')}}</h4>
                            <p class="text-base">{{__('Universal Services списывает с исполнителей фиксированную оплату за возможность оставлять к заданиям
    отклики с контактными данными. Стоимость одного отклика зависит от категории заданий и
    начинается от 20 uzs. Оплата за отклики не возвращается.')}}</p>
                            <h4 class="font-medium text-lg mt-2 text-gray-700">
                                {{__('Какая минимальная сумма для пополнения счета?')}}</h4>
                            <p class="text-base">{{__('4000 UZS.')}}</p>
                            <h4 class="font-medium text-lg mt-2 text-gray-700">
                                {{__('Как сделать возврат денег со своего счета в Universal Services?')}}</h4>
                            <p class="text-base"><a href="/profile"
                                    class="text-blue-500">{{__('Оформить запрос на возврат денег')}}</a> -
                                {{__('кликните по этой ссылке и укажите сумму, которую вы хотите вернуть. Как правило, деньги
    перечисляются на тот же счет, с которого производилось пополнение баланса в Universal Services, в
    течение 5 рабочих дней с учетом комиссии платежной системы.')}}</p>
                        </div>
                    </div>
                    {{-- cash end --}}
                </div>

            </div>


            {{-- right-side-bar --}}
            <div class="lg:col-span-1 col-span-2 rounded-xl ring-1 ring-gray-300 h-auto text-gray-600 sm:ml-8 ml-0">
                <div class="mt-6 ml-4">
                    <h3 class="font-medium text-gray-700 text-3xl">{{__('Исполнитель')}}</h3>
                    <p>{{__('на Universal Services с 12 сентября 2021 г.')}}</p>
                </div>
                <div class="contacts">
                    <div class="ml-4 h-20 grid grid-cols-4 content-center">
                        <div class="w-12 h-12 text-center mx-auto my-auto py-2 bg-gray-300 rounded-xl col-span-1"
                            style="background-color: orange;">
                            <i class="fas fa-phone-alt text-white text-2xl"></i>
                        </div>
                        <div class="ml-3 col-span-3">
                            <h5 class="font-bold text-gray-700 block">{{__('Телефон')}}</h5>
                            @if ($user->phone_number != '')
                                <p class="text-gray-600 block ">{{ $user->phone_number }}</p>
                            @else
                                {{__('нет номера')}}
                            @endif
                        </div>
                    </div>
                    <div class="telefon ml-4 h-20 grid grid-cols-4 content-center">
                        <div class="w-12 h-12 text-center mx-auto my-auto py-2 bg-gray-300 rounded-xl col-span-1"
                            style="background-color: #0091E6;">
                            <i class="far fa-envelope text-white text-2xl"></i>
                        </div>
                        <div class="ml-3 col-span-3">
                            <h5 class="font-bold text-gray-700 block">Email</h5>
                            <p class="text-sm break-all">{{ $user->email }}</p>
                        </div>
                    </div>
                </div>
                <p class="mx-5 my-4">
                    {{__('Повысьте доверие пользователей к себе — привяжите ваши аккаунты социальных сетей к профилю Servicebox. Мы обязуемся не раскрывать ваши контакты.')}}</p>
                <div class="telefon ml-4 h-20 grid grid-cols-4 content-center">
                    <div class="w-12 h-12 text-center mx-auto my-auto py-2 bg-gray-300 rounded-xl col-span-1"
                        style="background-color: #4285F4;">
                        <i class="fab fa-google text-white text-2xl"></i>
                    </div>
                    <div class="ml-3 col-span-3">
                        <h5 class="font-bold text-gray-700 block text-md">Google</h5>
                        <a href="https://www.google.com/" target="_blank"
                            class="block text-sm">{{__('Привязать')}}</a></p></a>
                    </div>
                </div>
                <div class="telefon ml-4 h-20 grid grid-cols-4 content-center">
                    <div class="w-12 h-12 text-center mx-auto my-auto py-2 bg-gray-300 rounded-xl col-span-1"
                        style="background-color: #4285F4;">
                        <i class="fab fa-facebook-f text-white text-2xl"></i>
                    </div>
                    <div class="ml-3 col-span-3">
                        <h5 class="font-bold text-gray-700 block text-md">Facebook</h5>
                        <a href="https://www.facebook.com/" target="_blank"
                            class="block text-sm">{{__('Привязать')}}</a>
                    </div>
                </div>
            </div>
            {{-- tugashi o'ng tomon ispolnitel --}}
        </div>
    </div>



    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('js/profile/cash.js') }}"></script>
@endsection
