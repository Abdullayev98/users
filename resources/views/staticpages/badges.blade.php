@extends("layouts.app")

@section('content')

<div class="container w-4/5 mx-auto">

        <div class="grid grid-cols-5 justify-center">
            <div class="col-span-1 mt-7">
                <ul class="mb-5">
                    <li><a  href="/geotaskshint" class="hover:text-red-500 text-md text-blue-600 cursor-pointer">Как это работает</a></li>
                    <li><a  href="/security" class="hover:text-red-500 text-md text-blue-600 cursor-pointer">Безопасность и гарантии</a></li>
                    <li><a  href="/badges" class="hover:text-red-500 text-md font-bold cursor-pointer">Награды и рейтинг</a></li>
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
            <div class="col-span-4 ml-5 w-3/4 ">
                <div class="w-full">
                    <h1 class="font-bold text-4xl">Рейтинг исполнителей и награды</h1>
                    <p class="mt-5"><a href="#" class="text-blue-600 hover:text-red-400">Рейтинг исполнителей</a> считается в каждой категории отдельно и обновляется раз в сутки. От него зависит, на каком месте окажется отклик исполнителя в откликах на задание. Чем выше рейтинг в категории, тем выше размещается отклик и тем больше шансов получить задание.</p>
                    <p class="mt-5">Основную роль в расчете рейтинга играет количество выполненных заданий. Чтобы занять высокую позицию, выполняйте как можно больше заданий и получайте хорошие оценки. <a href="#" class="text-blue-600 hover:text-red-400">Подробнее о том, как считается рейтинг.</a></p>
                    <p class="mt-5">Значки за различные достижения отображаются в профиле исполнителя, на <a href="" class="text-blue-600 hover:text-red-400">странице рейтинга</a> и рядом с откликами в заданиях. Награды привлекают внимание заказчиков и вызывают больше доверия к их обладателям. Они подчеркивают статус исполнителя и качество оказываемых им услуг наравне с отзывами и оценками.</p>
                    <div class="bg-gray-200">
                        <h2 class="text-3xl p-5">Типы значков</h2>
                        <div class="grid grid-cols-5">
                            <div class="col-span-1 bg-no-repeat w-50 h-24  bg-black" >
                                <img src="https://assets.youdo.com/_next/static/media/gold.e89ccdb62b00976c80fd95166df8b68b.svg"  class="mx-auto" />
                            </div>
                            <div class="col-span-4">
                                <p class=""><span class="text-red-500 italic">Исполнитель года.</span> Присваивается исполнителям, которые заняли первое место в рейтинге по результатам года.</p>
                            </div>
                        </div>
                        <div class="grid grid-cols-5">
                            <div class="col-span-1 bg-no-repeat" style="background-image:url('https://assets.youdo.com/_next/static/media/badge-insurance.f85d1a0eef6ece06a0be8948561b1fc1.svg')">
                            </div>
                            <div class="col-span-4">
                                <p class="mt-5"><span class="text-red-500 italic">Услуги исполнителя застрахованы</span>. Исполнитель подключил услугу страхования материальной ответственности на Universal Services. Если во время выполнения задания что-то сломается или будет нанесён другой материальный ущерб, ВСК выплатит заказчикам компенсацию до 100 тыс. рублей.</p>
                            </div>
                        </div>
                        <div></div>
                    </div>
                </div>
            </div>
        </div>
</div>
@endsection
