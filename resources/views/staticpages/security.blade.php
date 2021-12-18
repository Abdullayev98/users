@extends("layouts.app")

@section('content')

    <div class="container w-4/5 mx-auto">

        <div class="grid grid-cols-5 justify-center">
            <div class="col-span-1 mt-7">
                <ul class="mb-5">
                    <li><a  href="/geotaskshint" class="hover:text-red-500 text-md text-blue-600 cursor-pointer">Как это работает</a></li>
                    <li><a  href="/security" class="hover:text-red-500 text-md font-bold cursor-pointer">Безопасность и гарантии</a></li>
                    <li><a  href="/" class="hover:text-red-500 text-md text-blue-600 cursor-pointer">Награды и рейтинг</a></li>
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
                                <p class="mt-5">При оплате задания через Сделку без риска YouDo гарантирует возврат денег, если что-то пойдет не так, а исполнитель может быть уверен, что получит согласованную оплату без задержек.</p>
                                <p class="mt-5">Также YouDo компенсирует до 10 000 рублей, если в результате действий исполнителя заказчику причинен материальный ущерб.</p>
                                <a href="#" class="text-blue-500 hover:text-red-500 mt-5">Подробнее о Сделке без риска</a>
                            </div>
                        </div>
                        <div class="grid grid-cols-10 h-96 ">
                            <div class="col-span-7 p-5 my-auto" >
                                <h3 class="text-2xl mb-5">Проверка исполнителей</h3>
                                <p class="w-full">Все исполнители заполняют анкету и проходят проверку сервиса. Мы не регистрируем      подозрительные и мошеннические аккаунты. Те, кто прошел автоматическую проверку документов на YouDo, получают значок «Документы подтверждены».
                                </p>
                                <a href="#" class="text-blue-500 hover:text-red-500 mt-5">Подробнее о проверке документов</a>
                            </div>

                            <div class="col-span-3 bg-no-repeat mt-20 bg-auto bg-right" style="background-image: url('https://assets.youdo.com/_next/static/media/documents-screen-shadow.a7af39c38e5cfc27e1ad5862892a3ec8.png')">

                            </div>
                        </div>
                        <div class="grid grid-cols-10 h-96">
                            <div class="col-span-3 bg-no-repeat bg-left " style="background-image: url('https://assets.youdo.com/_next/static/media/reviews-screen-shadow.ff467ea1c88c4b45c03df0eedf99845f.png')">
                            </div>
                            <div class="col-span-7 p-5 my-auto">
                                <h3 class="text-2xl mb-5">Отзывы и рейтинг</h3>
                                <p class="w-full">После завершения работы мы просим заказчика и исполнителя поделиться отзывами. Отзывы о каждом пользователе можно увидеть в его профиле. Мы проверяем их достоверность и блокируем исполнителей, которые оказывают некачественные услуги или оставляют недостоверные отзывы.</p>
                                <p class="mt-5">Кроме отзывов оценить уровень исполнителей помогает рейтинг, который рассчитывается в каждой категории заданий. Самых активных исполнителей мы награждаем специальными значками за различные достижения.</p>
                                <a href="/" class="text-blue-500 hover:text-red-500 mt-5">Подробнее о рейтинге и наградах исполнителей</a>
                            </div>
                        </div>
                        <div class="w-full mt-10">
                            <h3 class="text-3xl mb-5">Рекомендации по безопасности</h3>
                            <p>Исполнители не являются сотрудниками YouDo и несут личную ответственность за качество своей работы. При сотрудничестве с любым исполнителем, даже если он подтвердил паспорт или вы нашли его не на нашем сервисе, мы рекомендуем всегда соблюдать базовые правила безопасности.</p>
                            <ul class="mt-5 list-decimal ml-10">
                                <li class="mr-5">Внимательно изучите отзывы и примеры выполненных заданий.</li>
                                <li class="mr-5">Перед началом работы попросите исполнителя показать паспорт, сверьте имя в профиле на YouDo и в документе.</li>
                                <li class="mr-5">Прописывайте все условия и этапы сотрудничества в договоре или смете (скачать образец договора), составляйте расписки о передаче денег (скачать образец расписки).</li>
                                <li class="mr-5">Прочитайте наши рекомендации, которые помогут вам избежать неприятных ситуаций:</li>
                            </ul>
                            <a class="block mt-7 text-blue-600 hover:text-orange-300">Как заказчику не нарваться на мошенника</a>
                            <a class="block text-blue-600 hover:text-orange-300">Как исполнителю не нарваться на мошенника</a>
                            <h3 class="mt-14 text-3xl mb-5">Служба поддержки</h3>
                            <p>Наша служба поддержки ежедневно работает с обращениями пользователей и следит за новыми заданиями. На сервисе запрещено публиковать задания, которые нарушают законодательство или противоречат моральным нормам.</p>
                            <p class="mt-5">Специалисты отдела мониторинга готовы подключиться к любой сложной ситуации и сделать все возможное, чтобы помочь пользователям ее разрешить.</p>
                            <div class=" grid grid-cols-5 mt-10">
                                <div class=" col-span-2">
                                    <div class="rounded-xl py-5 bg-green-400 w-64 hover:bg-green-300 text-center"><a href="#" class="text-white text-2xl ">Написать в поддержку</a></div>
                                </div>
                                <div class="col-span-3">
                                    <div class="ring-1 ring-gray-300 text-center py-5 rounded-xl col-span-3 w-64">
                                        <a href="/contacts" class="text-2xl">
                                            Перейти в контакты
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection
