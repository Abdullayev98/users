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
            <div class="col-span-4 ml-1">
                <div class="w-4/5">
                    <h1 class="font-bold text-4xl">Рейтинг исполнителей и награды</h1>
                    <p><a href="#" class="text-blue-600 hover:text-red-400">Рейтинг исполнителей</a> считается в каждой категории отдельно и обновляется раз в сутки. От него зависит, на каком месте окажется отклик исполнителя в откликах на задание. Чем выше рейтинг в категории, тем выше размещается отклик и тем больше шансов получить задание.</p>
                </div>
            </div>
        </div>
</div>
@endsection
