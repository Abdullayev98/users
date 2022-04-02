@extends("layouts.app")
@section('content')
<link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css" rel="stylesheet">
<link rel="stylesheet" href="{{asset('css/admin/datatable.css')}}">
<style>
    .active {
        background-color: rgb(156 163 175);
        border-radius: 0.125rem;
        color: white;
    }
</style>
    <div class="w-11/12  mx-auto text-base mt-4">
        <div class="grid lg:grid-cols-3 grid-cols-2 lg:w-5/6 w-full mx-auto">

            {{-- user ma'lumotlari --}}
            <div class="col-span-2 w-full mx-auto">

                @include('components.profileFigure')

                <div class="content  mt-20 ">
                    <div class="grid md:grid-cols-10 w-full ">
                        <ul class="md:col-span-9 col-span-10 items-center w-3/4 md:w-full">
                            <li class="inline mr-1 md:mr-5"><a href="/profile"
                                    class="text-lg text-gray-600">{{__('Обо мне')}}</a></li>
                            <li class="inline mr-1 md:mr-5"><a href="/profile/cash"
                                    class="text-lg font-bold text-gray-700 border-b-4 border-green-500 pb-1">{{__('Счет')}}</a>
                            </li>
                            <li class=" md:mr-5 mr-1 inline-block md:hidden block"><a href="/profile/settings"
                                    class="text-lg text-gray-600"
                                    id="settingsText">{{__('Настройки')}}</a></li>
                        </ul>
                        <div class="md:col-span-1 md:block hidden ml-4" id="settingsIcon"><a href="/profile/settings"><i class="fas fa-cog text-2xl"></i></a></div>
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
                                <select id="period"
                                    class="form-select block md:w-36 w-full h-10 rounded-xl focus:outline-none ring-1 ring-black md:0 md:ml-5">
                                    <option value="month">{{__('за месяц')}}</option>
                                    <option value="week">{{__('за неделю')}}</option>
                                    <option value="year">{{__('за год')}}</option>
                                    <option value="test">{{__('за период')}}</option>
                                </select>
                            </label>
                            <div class="hidden flex flex-row items-center my-4" id="ddr">
                              <div>
                                    <p class="text-xl">Период : </p>
                              </div>
                              <div class="mx-4">
                                    <input id="from-date" type="date" class="p-1 rounded-lg border-2 border-gray-300 focus:outline-none">
                              </div>
                              <div>
                                    <input id="to-date" type="date" class="p-1 rounded-lg border-2 border-gray-300 focus:outline-none">
                              </div>
                            </div>
                            <ul id="tabs" class="flex sm:flex-row flex-col rounded-sm w-full shadow bg-gray-200 mt-4">
                                <div class="w-full text-center">
                                    <a id="default-tab" href="#data-table" data-payment="{{ route('user.clickuz.transactions') }}"
                                        class="inline-block relative py-1 w-full payment-type">{{__('Пополнения')}} Click</a>
                                </div>
                                <div class="w-full text-center">
                                    <a href="#data-table"
                                        class="inline-block relative py-1 w-full payment-type">{{__('Пополнения')}} Payme</a>
                                </div>
                                <div class="w-full text-center">
                                    <a href="#data-table"
                                        class="inline-block relative py-1 w-full payment-type">{{__('Пополнения')}} Paynet</a>
                                </div>
                                <div class="w-full text-center">
                                    <a href="#data-table"
                                        class="inline-block relative py-1 w-full payment-type">{{__('Списания со счета')}}</a>
                                </div>
                            </ul>
                            <div id="tab-contents">
                                <div id="data-table" class="py-4">
                                    <div id='recipients' class="p-8 mt-6 lg:mt-0 rounded shadow bg-white">
                                        <table id="example1" class="stripe hover" style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
                                            <thead>
                                            <tr>
                                                <th data-priority="1">Date</th>
                                                <th data-priority="2">Amount</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            </tbody>
                                        </table>
                                    </div>
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
            @include('auth.profile-side-info')
            {{-- tugashi o'ng tomon ispolnitel --}}
        </div>
    </div>
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('js/profile/cash.js') }}"></script>
    <script>
        $('document').ready(function () {
            $('a.payment-type').on('click', function () {
                $('div.w-full').removeClass('active')
                $(this).parent().addClass('active');

                var url = $(this).attr('data-payment');
                var period = $('select#period').val()
                var data = {period: period}
                $.ajax({
                    type: 'GET',
                    url: url,
                    data: data,
                    success: function (res) {
                        var transactions = res['transactions']
                        console.log(res['period'])
                        transactions.forEach(transaction => {
                            $('tbody').append(`
                                <tr>
                                    <td>${transaction['created_at']}</td>
                                    <td>${transaction['amount']}</td>
                                </tr>
                            `);
                        })
                    },
                    error: function (error) {
                        console.log(error)
                    }
                });
            });
        });
    </script>
@endsection
