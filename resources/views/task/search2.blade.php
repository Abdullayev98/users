@extends("layouts.app")

@section("content")

<div class="mx-auto w-9/12 my-16">

        <div class="border-b">
            <!-- Tabs -->
            <ul id="tabs" class="inline-flex w-full">
                <li class="font-semibold rounded-t mr-4 pb-3"><a id="default-tab" href="#first">{{__('Все задания')}}</a></li>
                <li class="font-semibold rounded-t pb-3"><a href="#second">{{__('Рекомендованные')}}</a></li>
            </ul>
        </div>

            <!-- Tab Contents -->
            <div id="tab-contents">
                <div id="first">

                    <div class="grid grid-cols-3 gap-x-10">
                        <div class="col-span-2">
                            <div class="w-full bg-gray-200 mt-5">
                                <div class="px-5 py-5">
{{--                                    <form action="">--}}
                                    <div class="grid grid-cols-4 gap-4 mb-3">

                                        <div class="inline-flex w-full col-span-4">
                                            <input id="suggest" class="w-full focus:outline-none focus:border-yellow-500 text-black-700 border border-black rounded mr-3 px-1" type="text" placeholder="{{__('Город, Улица, Дом')}}" aria-label="Full name">
                                            <button id="mpshow" class="bg-green-500 px-4 py-1 rounded">{{__('Найти')}}</button>
                                        </div>

                                        <div class="col-span-2">
                                            <label class="text-xs">{{__('Город, адрес, метро, район...')}}</label>
                                            <input class="focus:outline-none focus:border-yellow-500  border border-black rounded w-full text-black-700 py-1 px-1" type="text">
                                        </div>

                                        <div class="">
                                            <label class="text-xs">{{__('Радиус поиска')}}</label>
{{--                                            <input tabindex="0" aria-autocomplete="list" class="border border-black rounded text-gray-700 py-1" value="">--}}
                                            <select class="w-full border border-black rounded text-gray-700 py-1">
                                                <option selected></option>
                                                <option value="1">5 km</option>
                                                <option value="2">10 km</option>
                                                <option value="3">15 km</option>
                                                <option value="4">20 km</option>
                                            </select>
                                        </div>

                                        <div class="ml-3">
                                            <label class="text-xs">{{__('Стоимость заданий от')}}</label>
                                            <input type="text" maxlength="7" class="border border-black text-black-700 rounded w-5/6 py-1 px-1" placeholder=" руб." value="">
                                        </div>

                                        <ul class="inline-flex flex-wrap w-full col-span-3">
                                            <div class="col-span-1 mr-5">
                                                <li>
                                                    <input class="focus:outline-none  " type="checkbox" id="" value=""></span>
                                                    <label class="" for="">{{__('Удалённая работа')}}</label>
                                                </li>
                                                <li>
                                                    <input class="focus:outline-none  " type="checkbox" id="" value="">
                                                    <label class="" for="">{{__('Задания без откликов')}}</label>
                                                </li>
                                            </div>
                                            <div class="col-span-1 mr-5">
                                                <li>
                                                    <input class="focus:outline-none  " type="checkbox" id="" value="">
                                                    <label class="" for="">{{__('Только вакансии')}}</label>
                                                </li>
{{--                                                <li>--}}
{{--                                                    <input class="focus:outline-none  " type="checkbox" id="" value="">--}}
{{--                                                    <label class="" for="">{{__('Сделка без риска')}}</label>--}}
{{--                                                </li>--}}
                                            </div>
                                            <div class="col-span-1 mr-5">
                                                <li>
                                                    <input class="focus:outline-none  " type="checkbox" id="" value="">
                                                    <label class="" for="">{{__('Бизнес-задания')}}</label>
                                                </li>
                                            </div>
                                        </ul>
                                    </div>
                                        </form>




                                </div>
                            </div>

                            <div>
                                @foreach($tasks as $task)
                                @endforeach
                            </div>

                        </div>
                        <div class="w-full h-full mt-5">
                            <div id="map" class="h-40 my-5 rounded-lg w-full"></div>
                            <div class="w-full h-full">
                            <x-faq/>
                            </div>
                        </div>
                    </div>

                </div>

                <div id="second" class="hidden">

                </div>
            </div>

















</div>
@endsection

@section("javasript")

    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <script src="https://api-maps.yandex.ru/2.1/?apikey=f4b34baa-cbd1-432b-865b-9562afa3fcdb&lang=ru_RU" type="text/javascript"></script>
    <script type="text/javascript">
        ymaps.ready(init);
            function init() {
                var suggestView1 = new ymaps.SuggestView('suggest');
                var myMap = new ymaps.Map('map', {
                    center: [55.74, 37.58],
                    zoom: 15,
                    controls: []
                });
                var searchControl = new ymaps.control.SearchControl({  });
                myMap.controls.add(searchControl);
                $("#mpshow").click(function(){
                searchControl.search(document.getElementById('suggest').value);
            });
        }
    </script>

    <script>
        let tabsContainer = document.querySelector("#tabs");

        let tabTogglers = tabsContainer.querySelectorAll("a");
        console.log(tabTogglers);

        tabTogglers.forEach(function(toggler) {
            toggler.addEventListener("click", function(e) {
                e.preventDefault();

                let tabName = this.getAttribute("href");

                let tabContents = document.querySelector("#tab-contents");

                for (let i = 0; i < tabContents.children.length; i++) {

                    tabTogglers[i].parentElement.classList.remove("border-orange-400", "border-b",  "opacity-100");  tabContents.children[i].classList.remove("hidden");
                    if ("#" + tabContents.children[i].id === tabName) {
                        continue;
                    }
                    tabContents.children[i].classList.add("hidden");

                }
                e.target.parentElement.classList.add("border-orange-400", "border-b-4", "opacity-100");
            });
        });

        document.getElementById("default-tab").click();

    </script>

@endsection
