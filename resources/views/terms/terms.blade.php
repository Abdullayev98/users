<!DOCTYPE html>
<html lang="{{setting('language','en')}}" dir="ltr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{setting('app_name')}} | {{setting('app_short_description')}}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="{{$app_logo ?? ''}}"/>
    <link rel="stylesheet" href="{{asset('vendor/fontawesome-free/css/all.min.css')}}">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,600" rel="stylesheet">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
   
</head>
<body>

<div class="relative pt-6 px-4 sm:px-6 lg:px-8 border-b">
    <nav class="relative flex items-center justify-between sm:h-10 lg:justify-start" aria-label="Global">
        <div class="flex items-center flex-grow flex-shrink-0 lg:flex-grow-0">
            <div class="flex items-center justify-between w-full md:w-auto">
                <a href="#">
                    <img class="h-6 w-auto sm:h-10" src="https://assets.youdo.com/_next/static/media/logo.68780febe8ce798e440ca5786b505cd5.svg">
                </a>
                <div class="-mr-2 flex items-center md:hidden">
                    <button type="button" class="bg-white rounded-md p-2 inline-flex items-center justify-center text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500" aria-expanded="false">

                        <!-- Heroicon name: outline/menu -->
                        <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
        <div class="hidden w-full md:inline-block md:ml-32 md:pr-4 lg:space-x-8 md:space-x-6">
            <a class="font-medium text-gray-500/25 hover:text-gray-500/25 focus:outline-none">Создать задание</a>

            <a href="#" class="font-medium text-gray-500 hover:text-gray-900">Найти задания</a>

            <a href="#" class="font-medium text-gray-500 hover:text-gray-900">Исполнители</a>
            <!--
                            <a href="#" class="font-medium text-gray-500 hover:text-gray-900">Мои заказы</a>
            -->
            {{--                <p class="text-center inline float-right md:float-none  "><a href="#" class="font-medium hover:text-yellow-500">Вход</a> или <a href="#" class="font-medium hover:text-yellow-500">регистрация</a></p>--}}
            <button
                class="text-green-300 rounded-md w-36 absolute right-44  text-base font-medium hover:text-green-700 inline-block"
                id="open-btn">
                <i class="fas fa-wallet inline-block"></i>
                <span class="inline-block">пополнить</span>
            </button>
        </div>
        <p class="w-full text-right inline-block float-right md:float-none mt-6 mb-6"><a href="/home/profile" class="font-medium hover:text-yellow-500">Вход</a> или <a href="#" class="font-medium hover:text-yellow-500">Регистрация</a></p>
    </nav>
    {{-- pay modal start --}}
    <div class="fixed hidden z-50 inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full" id="my-modal">
        <div class="relative top-20 mx-auto p-5 border w-2/5 shadow-lg rounded-md bg-white">
            <div class="mt-3 text-center">
                <button type="submit" id="close-btn" class="px-4 py-4 bg-gray-300 rounded-md w-100 h-16 absolute right-4 top-4 hover:bg-gray-500">
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
                    <input type="checkbox" class="w-5 h-5 rounded-md inline-block "/>
                    <p class="text-md inline-block ml-2">Оформить полис на 7 дней за 15 000 сум</p>
                </div>
                <div class="items-center px-4 py-3">
                    <button id="ok-btn"
                            class="px-4 py-2 bg-green-500 text-white text-xl font-medium rounded-md w-2/5 h-16  shadow-sm hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-300">
                        К оплате x сум
                    </button>
                    <p>* — Порядок выплаты, ограничения и полные условия определены в <a href="/home/oferta" class="cursor-pointer text-sm text-blue-400 underline">Оферте</a></p>
                </div>
            </div>
        </div>
    </div>
    {{-- pay modal end --}}
</div>

<div class="layout_layoutCommon__2L0X0">
    <div id="LayoutWrapper" class="layout-wrapper">
        <div id="Layout" class="page-content">
            <div class="Terms_terms__1pfe_ b-terms">
                <div class="Terms_content__3GHV7">
                    <h1>Правила сервиса</h1>
                    <a class="Terms_pdfLink__TBF77" href="static/terms/terms-19-10-2021.pdf" target="_blank" rel="noreferrer">Редакция от «19» октября 2021 г.<span>.PDF</span></a>
                </div>
                <div class="Terms_archive__3aE03">
                    <div class="Terms_archive__3aE03">
                        <div><div class="Terms_item__NJ1Mn">

                            </div>
                            <div class="Terms_item__NJ1Mn"><a class="Terms_archiveLink__xvUXS" href="/terms?revision=Terms2021_2">Редакция от&nbsp;«29» июля 2021&nbsp;г.</a></div><div class="Terms_item__NJ1Mn"><a class="Terms_archiveLink__xvUXS" href="/terms?revision=Terms2021_1">Редакция от&nbsp;«20» февраля 2021&nbsp;г.</a></div><div class="Terms_item__NJ1Mn"><a class="Terms_archiveLink__xvUXS" href="/terms?revision=Terms2020_3">Редакция от&nbsp;«17» декабря 2020&nbsp;г.</a></div><div class="Terms_item__NJ1Mn"><a class="Terms_archiveLink__xvUXS" href="/terms?revision=Terms2020_2">Редакция от&nbsp;«10» октября 2020&nbsp;г.</a></div><div class="Terms_item__NJ1Mn"><a class="Terms_archiveLink__xvUXS" href="/terms?revision=Terms2020_1">Редакция от&nbsp;«18» августа 2020&nbsp;г.</a></div><div class="Terms_item__NJ1Mn hidden"><a class="Terms_archiveLink__xvUXS" href="/terms?revision=Terms2019_2">Редакция от&nbsp;«20» августа 2019&nbsp;г.</a></div><div class="Terms_item__NJ1Mn hidden"><a class="Terms_archiveLink__xvUXS" href="/terms?revision=Terms2019_1">Редакция от&nbsp;«22» апреля 2019&nbsp;г.</a></div><div class="Terms_item__NJ1Mn hidden"><a class="Terms_archiveLink__xvUXS" href="/terms?revision=Terms2018_1">Редакция от&nbsp;«08» ноября 2018&nbsp;г.</a></div><div class="Terms_item__NJ1Mn hidden"><a class="Terms_archiveLink__xvUXS" href="/terms?revision=Terms2017_2">Редакция от&nbsp;«01» мая 2017&nbsp;г.</a></div><div class="Terms_item__NJ1Mn hidden"><a class="Terms_archiveLink__xvUXS" href="/terms?revision=Terms2017_1">Редакция от&nbsp;«27» февраля 2017&nbsp;г.</a></div><div class="Terms_item__NJ1Mn hidden"><a class="Terms_archiveLink__xvUXS" href="/terms?revision=Terms2016_2">Редакция от&nbsp;«29» апреля 2016&nbsp;г.</a></div><div class="Terms_item__NJ1Mn hidden"><a class="Terms_archiveLink__xvUXS" href="/terms?revision=Terms2016_1">Редакция от&nbsp;«11» февраля 2016&nbsp;г.</a></div><div class="Terms_item__NJ1Mn hidden"><a class="Terms_archiveLink__xvUXS" href="/terms?revision=Terms2015_1">Редакция от&nbsp;«04» сентября 2015&nbsp;г.</a></div><button class="Terms_more__1e2tX ButtonGhost_m__1VFc_ ButtonGhost_button__1WtQ0" type="button">Прошлые редакции</button></div></div></div><div class="Terms_business__22raL"><a class="Terms_archiveLink__xvUXS" href="/selfemployed/terms">Правила сервиса ЮДУ БИЗНЕС</a></div><div class="Property_property__bqM6g"><h3>Реквизиты</h3><p>Общество с ограниченной ответственностью «Киберлогистик»<br>Адрес для корреспонденции, направления жалоб и предложений:<br>119021, Россия, г. Москва, а/я 21<br>Юридический адрес:<br>121205, Россия, г. Москва, Территория Инновационного Центра «Сколково», улица Нобеля 7, офис 47<br>ИНН 7730194136<br>КПП 773101001<br>ОГРН 5157746302434</p></div></div></div></div></div>





<div class="mx-24">
    <footer class="h-auto md:pt-9">
        <div class="flex flex-row md:mb-8 border-b-2 border-[#d9dbe0]">
            <div class="flex md:pb-10">
                <a href="https://sk.ru/" class="inline-block md:w-28 md:h-16 md:mr-24 hover:opacity-80 bg-cover bg-center  bg-[url('https://assets.youdo.com/_next/static/media/sk.1f99725347d9445a272bcc3acd248ad8.svg')]" target="_blank" rel="noopener noreferrer"></a>
            </div>
            <div class="items-start flex justify-between md:pb-10">
                <div class="flex">
                    <div class="flex justify-between flex-nowrap tracking-wide leading-normal ">
                        <ul class="border-box w-3/12 md:pr-18">
                            <li class="md:mb-2 leading-8 text-sm whitespace-nowrap">
                                <a class="text-[#5f5869] whitespace-pre hover:text-[#ffa200] xs:w-full xs:border-b-[#ffa200]" href="/verification">Как&nbsp;стать&nbsp;исполнителем</a>
                            </li>
                            <li class="md:mb-2 leading-8 text-sm whitespace-nowrap">
                                <a class="text-[#5f5869] whitespace-pre hover:text-[#ffa200] xs:w-full xs:border-b-[#ffa200]" href="/faq">Частые вопросы</a>
                            </li>
                            <li class="md:mb-2 leading-8 text-sm whitespace-nowrap">
                                <a class="text-[#5f5869] whitespace-pre hover:text-[#ffa200] xs:w-full xs:border-b-[#ffa200]" href="/contacts">Контакты</a>
                            </li>
                            <li class="md:mb-2 leading-8 text-sm whitespace-nowrap">
                                <a class="text-[#5f5869] whitespace-pre hover:text-[#ffa200] xs:w-full xs:border-b-[#ffa200]" href="/reviews/authors">Отзывы заказчиков</a>
                            </li>
                        </ul>
                        <ul class="border-box w-3/12 md:pr-18">
                            <li class="md:mb-2 leading-8 text-sm whitespace-nowrap">
                                <a class="text-[#5f5869] whitespace-pre hover:text-[#ffa200] xs:w-full xs:border-b-[#ffa200]" href="/youdo-for-business">YouDo для бизнеса</a>
                            </li>
                            <li class="md:mb-2 leading-8 text-sm whitespace-nowrap">
                                <a class="text-[#5f5869] whitespace-pre hover:text-[#ffa200] xs:w-full xs:border-b-[#ffa200]" href="http://blog.youdo.com">Наш блог</a>
                            </li>
                            <li class="md:mb-2 leading-8 text-sm whitespace-nowrap">
                                <a class="text-[#5f5869] whitespace-pre hover:text-[#ffa200] xs:w-full xs:border-b-[#ffa200]" class="js-open-site-support" href="">Служба поддержки</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="ml-auto justify-end md:pb-4 items-start flex">
                <div class="flex justify-between items-center">
                    <span class="lazyload-wrapper">
                        <a class="md:mr-2 rounded-md" rel="noopener noreferrer" href="https://app.appsflyer.com/id560999571?pid=coldunshik&amp;c=youdo" target="_blank">
                            <button type="button" class="w-3/10 bg-[#000] rounded-md mt-8 hover:bg-[#ffa200]"><img src="https://assets.youdo.com/_next/static/media/ios.d3a42dd0816a046400b4bb7d2b11067f.svg" alt=""> </button>
                        </a>
                        <a class="md:mr-2 rounded-md" rel="noopener noreferrer" href="http://app.appsflyer.com/com.sebbia.youdo?pid=coldunshik&amp;c=youdo" target="_blank">
                            <button type="button" class="w-3/10 bg-[#000] rounded-md mt-8 hover:bg-[#ffa200]"><img src="https://assets.youdo.com/_next/static/media/android.1234ba9391753eeb525d4f71a808329e.svg" alt=""> </button>
                        </a>
                        <a class="md:mr-2 rounded-md" rel="noopener noreferrer" href="https://appgallery.cloud.huawei.com/ag/n/app/C101747675?locale=ru_RU&amp;channelId=youdo&amp;id=424fff149df14f2c9f75123706820d5e&amp;s=4DFA8AAFD6CA4AA004756257A93CE9BC6E6F07E2AE3564259878D059C9C07573&amp;detailType=0&amp;v=" target="_blank">
                            <button type="button" class="w-3/10 bg-[#000] rounded-md mt-8 hover:bg-[#ffa200]"><img src="https://assets.youdo.com/_next/static/media/appgallery.67baccf681decda41c84b0364830d2e4.svg" alt=""> </button>
                        </a>
                    </span>
                </div>
            </div>
        </div>
        <div class="md:pb-10 flex justify-between items-center">
            <div class="leading-[20px] text-[12px] tracking-[.2px] text-[#a199aa]">© <!-- -->2021<!-- --> YouDo <span>(youdo.com, youdo.ru, юду.рф)</span> <b>·</b>
                <a href="../terms/terms.blade.php">Правила сервиса</a>
            </div>
            <div class="footer_social__2V9eH">
                <div class="social-buttons_block__2KlOo">
                    <a href="https://www.facebook.com/youdocom" target="_blank" rel="noopener noreferrer" class="social-buttons_btn__3O-WV social-buttons_fb__an97V">

                    </a>
                    <a href="https://www.instagram.com/youdocom" target="_blank" rel="noopener noreferrer" class="social-buttons_btn__3O-WV social-buttons_inst__1Um5u">

                    </a>
                    <a href="https://twitter.com/youdo" target="_blank" rel="noopener noreferrer" class="social-buttons_btn__3O-WV social-buttons_tw__3va5S">

                    </a>
                    <a href="https://vk.com/youdocom" target="_blank" rel="noopener noreferrer" class="social-buttons_btn__3O-WV social-buttons_vk__vMHp0">

                    </a>
                    <a href="https://www.youtube.com/user/youdo" target="_blank" rel="noopener noreferrer" class="social-buttons_btn__3O-WV social-buttons_ytb__1wBWM">

                    </a>
                </div>
            </div>
        </div>
    </footer>
</div>


</body>

<script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
<script src="https://cdn.tailwindcss.com"></script>
</html>
