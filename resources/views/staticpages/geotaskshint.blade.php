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
                <div class="w-4/5">
                    <h1 class="font-bold text-5xl">Как это работает?</h1>
                    <p class="w-4/5 mt-10">YouDo — удобный сервис, который позволяет быстро и безопасно находить надежных исполнителей для решения бытовых и бизнес-задач. Достаточно разместить задание на сервисе, и через несколько минут вы начнете получать отклики от исполнителей, которые будут готовы его выполнить.
                    </p><br>
                    <p class="w-4/5">Исполнители проходят <a href="/verification" class="text-blue-600 hover:text-orange-500">специальную проверку</a> администрацией сервиса, поэтому YouDo <a href="/security" class="text-blue-600 hover:text-orange-500">безопасен для заказчиков.</a></p>
                    <iframe class="w-full mb-10 h-96 mt-10" src="https://www.youtube.com/embed/VjDI4YkJG7E"></iframe>

                    <h1 class="font-bold text-4xl mt-10 text-center">Как создать задание на YouDo?</h1>
                    <h3 class="mt-10 text-xl text-center">Выберите категорию</h3>
                    <img src="https://assets.youdo.com/next/_next/static/images/macbook-air2-c3eb51eecd4c26af441f36f2993b2d29.jpg" class="mx-auto"/>
                    <p class="text-xl text-center mt-10">В свободной форме опишите детали вашего задания</p>
                    <img src="https://assets.youdo.com/next/_next/static/images/table-i-need-be98b0992c2295b91e61779ed27c3c94.jpg" class="mx-auto"/>
                </div>
            </div>
        </div>
        <div class="w-4/5 mx-auto mt-20">
            <hr>
        </div>
        <div class="grid grid-cols-2 mt-10 w-4/5 mx-auto">
            <div class="col-span-1 my-auto">
                <div class="w-3/5 mx-auto">
                    <h4 class="text-2xl">Получайте отклики исполнителей</h4>
                    <p>Сразу после создания задания вам начнут поступать отклики от людей, которые готовы его выполнить.</p>
                </div>
            </div>
            <div class="col-span-1">
                <img src="https://assets.youdo.com/next/_next/static/images/create_task-8a473693dc5d602b2ccfe8207576a63d.jpg" class="w-4/5 mx-auto"/>
            </div>
        </div>
        <div class="grid grid-cols-2 mt-10 w-4/5 mx-auto">
            <div class="col-span-1">
                <img src="https://assets.youdo.com/next/_next/static/images/executive_selection-2432f1d3f0d4f10880fc790d2cb390e4.jpg" class="w-4/5 mx-auto"/>
            </div>
            <div class="col-span-1 my-auto">
                <div class="w-3/5 mx-auto">
                    <h4 class="text-2xl">Выберите лучшего исполнителя</h4>
                    <p>Вам остается выбрать среди откликов лучшее по цене или рейтингу исполнителя.</p>
                </div>
            </div>
        </div>
        <div class="grid grid-cols-2 mt-10 w-4/5 mx-auto">
            <div class="col-span-1 my-auto">
                <div class="w-3/5 mx-auto">
                    <h4 class="text-2xl">Завершение задания</h4>
                    <p>После выполнения задания не забудьте подтвердить, что исполнитель выполнил поручение, и написать отзыв о его работе.</p>
                </div>
            </div>
            <div class="col-span-1">
                <img src="https://assets.youdo.com/next/_next/static/images/task_complete-3b15890cc07d8a0317d3382194fe5ebf.jpg" class="mx-auto"/>
            </div>
        </div>
        <div class="w-4/5 mx-auto mt-20">
            <hr>
        </div>
        <div class="grid grid-cols-2 w-4/5 mx-auto my-20">
            <div class="w-4/5 mx-auto text-center py-5 col-span-1 h-auto rounded-xl bg-green-600 hover:bg-green-500">
                <a href="/task/create" class="text-4xl text-white">Создать задание</a>
            </div>
            <div class="col-span-1 py-auto py-5">
                <p>Может быть вы хотите стать <a href="/verification" class="text-blue-500 underline hover:text-orange-400">исполнителем YouDo?</a></p>
            </div>
        </div>


</div>


@endsection
