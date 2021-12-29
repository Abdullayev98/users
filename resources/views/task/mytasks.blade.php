@extends("layouts.app")

@section("content")

<div class="mx-auto w-10/12 my-10">
    <div class="md:grid md:grid-cols-3 md:gap-x-10">
        <div class="col-span-2">
            <div class="border-b">
                <!-- Tabs -->
                <div class="w-full bg-[#f8f7ee] px-5 py-5">

                    <ul id="tabs" class="inline-flex text-center">
                        <li class="rounded-t px-3 py-1 md:w-[150px]"><a id="default-tab" href="#first">Я исполнитель</a></li>
                        <li class="rounded-t px-3 py-1 md:w-[150px]"><a href="#second">Я заказчик</a></li>
                    </ul>

                </div>
            </div>

    <!-- Tab Contents -->
            <div id="tab-contents">
                <div id="first">



                    <div id="scrollbar" class="w-full h-screen blog1">
{{--                        <div class="w-full overflow-y-scroll w-full h-screen">--}}
                    <div class="w-full scroll-smooth hover:scroll-auto w-full h-screen">

                            @foreach($tasks as $task)
                            <div class="w-full border hover:bg-blue-100">
                                <div class="w-11/12 h-12 m-4">
                                    <div class="float-left w-9/12">
                                        <i class="fas fa-user-circle text-4xl float-left text-blue-400"></i>
                                        <a href="#" class="text-lg text-blue-400 hover:text-red-400">
                                            {{$task->name}}
                                        </a>
                                        <p class="text-sm ml-12 mt-4">
                                            {{$task->description}}
                                        </p>
                                    </div>

                                    <div class="float-right w-1/4 text-right">
                                        <a href="#" class="text-lg">{{$task->budget}} sum</a>
                                        <p class="text-sm ml-12mt-4">Спортмастер</p>
                                        <p class="text-sm ml-12mt-4">Нет отзывов</p>
                                    </div>

                                </div>
                                <div class="w-11/12 h-12 m-4">
                                    <div class="mx-auto w-9/12">
                                        <button type="button" class="bg-[#ffebad] py-1 rounded-full px-4 my-4 text-gray-500 text-xs">Вакансия</button>
                                        <button type="button" class="bg-[#f4f0ff] py-1 rounded-full px-4 my-4 text-gray-500 text-xs">Бесплатный отклик</button>
                                        <button type="button" class="bg-[#ffe8e8] py-1  rounded-full px-4 my-4 text-gray-500 text-xs">🔥Промо</button>
                                    </div>
                                </div>
                            </div>
                            @endforeach

                        </div>
                    </div>
                    {{--    Navigatsiya ko'rinishi un kere bo'ladigan Input va Button  --}}
                    <input id="suggest" class="hidden" type="text">
                    <button id="mpshow" class="hidden"></button>
                    {{--    Ishonmaganla sinab ko'rishi mumkin --}}

{{--                    <div class="w-1/2 mx-auto">--}}
{{--                        <img src="https://css-static.youdo.com/assets/71201/i/not-found-49ad008e444789b0c0ce43a7456c263f.svg" alt="">--}}
{{--                    </div>--}}
                </div>

                <div id="second" class="hidden">

                    <div id="scrollbar" class="w-full h-screen blog1">
{{--                        <div class="w-full overflow-y-scroll w-full h-screen">--}}
                            <div class="w-full scroll-smooth hover:scroll-auto w-full h-screen">
                                <img src="https://css-static.youdo.com/assets/71201/i/become-an-executor-c1a1be93104435115c3e2d317aa61be6.svg" alt="">
                            @foreach($tasks as $task)
                                @if ($task->count() != 0)
                                    {{$task->count()}}
                                    <!-- If page is empty -->
                                        {{--                                        <div class="w-1/2 mx-auto my-auto">--}}
                                        {{--                    <img src="{{asset('has.svg')}}" alt="">--}}
                                        <img src="https://css-static.youdo.com/assets/71201/i/become-an-executor-c1a1be93104435115c3e2d317aa61be6.svg" alt="">
                                        {{--                                        </div>--}}
                                    @endif
                                    <div class="w-full border hover:bg-blue-100">
                                        <div class="w-11/12 h-12 m-4">
                                            <div class="float-left w-9/12">
                                                <i class="fas fa-user-circle text-4xl float-left text-blue-400"></i>
                                                <a href="#" class="text-lg text-blue-400 hover:text-red-400">
                                                    {{$task->name}}
                                                </a>
                                                <p class="text-sm ml-12mt-4">
                                                    {{$task->description}}
                                                </p>
                                            </div>
                                            <div class="float-right w-1/4 text-right">
                                                <a href="#" class="text-lg">{{$task->budget}} sum</a>
                                                <p class="text-sm ml-12mt-4">Спортмастер</p>
                                                <p class="text-sm ml-12mt-4">Нет отзывов</p>
                                            </div>
                                        </div>
                                        <div class="w-11/12 h-12 m-4">
                                            <div class="mx-auto w-9/12">
                                                <button type="button" class="bg-[#ffebad] py-1 rounded-full px-4 my-4 text-gray-500 text-xs">Вакансия</button>
                                                <button type="button" class="bg-[#f4f0ff] py-1 rounded-full px-4 my-4 text-gray-500 text-xs">Бесплатный отклик</button>
                                                <button type="button" class="bg-[#ffe8e8] py-1  rounded-full px-4 my-4 text-gray-500 text-xs">🔥Промо</button>
                                            </div>
                                        </div>
                                    </div>
                            @endforeach

                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="col-span md:block hidden">
            <div class="w-full h-full mt-5">
                <div id="map" class="h-60 rounded-lg w-full">
                </div>
                <div class="w-full h-full mt-5">
                    <button class="font-medium hover:text-red-500 rounded-lg text-sm text-center inline-flex items-center mb-1" type="button">Все категории</button>

                    <div class="w-full my-1">
                        @foreach (\TCG\Voyager\Models\Category::query()->where('parent_id', null)->get() as $category)
                            <div x-data={show:false} class="rounded-sm">
                                <div class="border border-b-0 bg-gray-100" id="headingOne">
                                    <button class="font-medium hover:text-red-500 rounded-lg text-sm text-center inline-flex items-center my-1" type="button">
                                        {{$category->name}}
                                    </button>
                                </div>
                            </div>
                        @endforeach
                    </div>

                </div>

                {{--                <script src="https://unpkg.com/@themesberg/flowbite@latest/dist/flowbite.bundle.js"></script>--}}
            </div>
        </div>
    </div>
</div>

@endsection

@section("javasript")

    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <script src="https://api-maps.yandex.ru/2.1/?apikey=f4b34baa-cbd1-432b-865b-9562afa3fcdb&lang=ru_RU"
            type="text/javascript"></script>
    <script type="text/javascript">
        ymaps.ready(init);

        function init() {
            var suggestView1 = new ymaps.SuggestView('suggest');
            var myMap = new ymaps.Map('map', {
                center: [55.74, 37.58],
                zoom: 15,
                controls: []
            });
            var searchControl = new ymaps.control.SearchControl({});
            myMap.controls.add(searchControl);
            $("#mpshow").click(function () {
                searchControl.search(document.getElementById('suggest').value);
            });
        }
    </script>

    <script>
        let tabsContainer = document.querySelector("#tabs");

        let tabTogglers = tabsContainer.querySelectorAll("a");
        console.log(tabTogglers);

        tabTogglers.forEach(function (toggler) {
            toggler.addEventListener("click", function (e) {
                e.preventDefault();

                let tabName = this.getAttribute("href");

                let tabContents = document.querySelector("#tab-contents");

                for (let i = 0; i < tabContents.children.length; i++) {
                    tabTogglers[i].parentElement.classList.remove("bg-gray-300");  tabContents.children[i].classList.remove("hidden");
                    tabContents.children[i].classList.remove("hidden");
                    if ("#" + tabContents.children[i].id === tabName) {
                        continue;
                    }
                    tabContents.children[i].classList.add("hidden");
                }
                e.target.parentElement.classList.add("bg-gray-300");
            });
        });
        document.getElementById("default-tab").click();
    </script>

@endsection
