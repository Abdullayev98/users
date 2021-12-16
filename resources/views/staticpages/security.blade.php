@extends("layouts.app")

@section('content')

    <div class="container w-4/5 mx-auto">

        <div class="grid grid-cols-5 justify-center">
            <div class="col-span-1 mt-7">
                <ul class="mb-5">
                    <li><a  href="/geotaskshint" class="hover:text-red-500 text-md font-bold cursor-pointer">Как это работает</a></li>
                    <li><a  href="/security" class="hover:text-red-500 text-md text-blue-600 cursor-pointer">Безопасность и гарантии</a></li>
                    <li><a  href="/badges" class="hover:text-red-500 text-md text-blue-600 cursor-pointer">Награды и рейтинг</a></li>
                </ul>
                <ul class="mb-5">
                    <li><a  href="/reviews" class="hover:text-red-500 text-md text-blue-600 cursor-pointer">Отзывы исполнителей</a></li>
                    <li><a  href="/reviews/authors" class="hover:text-red-500 text-md text-blue-600 cursor-pointer">Отзывы заказчиков</a></li>
                    <li><a  href="/press" class="hover:text-red-500 text-md text-blue-600 cursor-pointer">СМИ о нас</a></li>
                </ul>
                <ul>
                    <li><a  href="/geotaskshint" class="hover:text-red-500 text-md text-blue-600 cursor-pointer">Реклама на сервисе</a></li>
                    <li><a  href="/contacts" class="hover:text-red-500 text-md text-blue-600 cursor-pointer">Контакты</a></li>
                    <li><a  href="/job" class="hover:text-red-500 text-md text-blue-600 cursor-pointer">Вакансии</a></li>
                </ul>
            </div>
            <div class="col-span-4 ml-1">
                    <div class="w-full">
                        <div class="w-4/5">
                            <h1 class="font-bold text-5xl">Безопасность и гарантии</h1>
                            <br>
                            <p class="">Одна из главных задач нашего сервиса — создать сообщество надежных исполнителей и заказчиков, которые могут доверять друг другу.</p>
                            <br>
                            <p class="">Мы приложили максимум усилий, чтобы поиск исполнителя на YouDo был удобным и безопасным.</p>
                        </div>
                        <div class="grid grid-cols-10">
                            <div class="col-span-3 bg-no-repeat mt-20" style="background-image: url('https://assets.youdo.com/_next/static/media/sbr-screen.a2f6a92627c5306e984799eec1143662.png')">

                            </div>
                            
                            <div class="col-span-7 p-5">
                                <h3 class="text-2xl mb-5">Сделка без риска</h3>
                                <p class="w-full">Сервис «<a href="#" class="text-blue-500 hover:text-red-500">Сделка без риска</a>» позволяет безопасно оплачивать задания и получать деньги на банковскую карту. В момент выбора исполнителя оплата резервируется на специальном счете и хранится там до успешного завершения работ.</p>
                                <p>При оплате задания через Сделку без риска YouDo гарантирует возврат денег, если что-то пойдет не так, а исполнитель может быть уверен, что получит согласованную оплату без задержек.</p>
                                <p>Также YouDo компенсирует до 10 000 рублей, если в результате действий исполнителя заказчику причинен материальный ущерб.</p>
                                <a href="#" class="text-blue-500 hover:text-red-500">Подробнее о Сделке без риска</a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection
