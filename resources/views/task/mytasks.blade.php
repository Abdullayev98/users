@extends("layouts.app")

@section("content")

<div class="mx-auto w-10/12 my-10">
    <div class="md:grid md:grid-cols-3 md:gap-x-10">
        <div class="col-span-2">
            <div class="border-b">
                <!-- Tabs -->
                <div class="w-full bg-[#f8f7ee] px-5 py-5">

                    <ul id="tabs" class="inline-flex text-center">
                        <li id="first_tab" class="rounded-t px-3 py-1 md:w-[150px]"><a id="default-tab" href="#first">@lang('lang.mytasks_iAmPerformer')</a></li>

                        <li id="second_tab" class="rounded-t px-3 py-1 md:w-[150px]"><a href="#second">@lang('lang.mytasks_iAmCustomer')</a></li>

                    </ul>
                    <p class="p-5">Всего {{ $tasks->count() }} задание найдено</p>

                </div>
            </div>

    <!-- Tab Contents -->
            <div id="tab-contents">
                <div id="first">
                    <div id="scrollbar" class="w-full blog1">
                    <div class="w-full scroll-smooth hover:scroll-auto w-full">

                            @foreach($tasks as $task)
                            <div class="w-full hover:bg-blue-100 border-t border-solid my-5">
                                <div class="md:grid md:grid-cols-10 p-2">
                                    <i class="fas fa-user-circle text-4xl md:col-span-1 m-auto text-blue-400"></i>
                                    <div class="col-span-6">
                                        <a href="#" class="text-lg text-blue-400 hover:text-red-400">
                                            {{$task->name}}
                                        </a>
                                        <p class="text-sm mt-2">
                                            {{$task->description}}
                                        </p>
                                    </div>

                                    <div class="col-span-3 md:text-right">
                                        <a href="#" class="text-lg">{{$task->budget}} sum</a>
                                        <p class="text-sm">@lang('lang.mytasks_sportMaster')</p>
                                        <p class="text-sm">@lang('lang.mytasks_noFeedback')</p>
                                    </div>

                                </div>
                            </div>

                            @endforeach

                        </div>
                    </div>

                    <input id="suggest" class="hidden" type="text">
                    <button id="mpshow" class="hidden"></button>

                </div>

                <div id="second" class="hidden">

                    <div id="scrollbar" class="w-full blog1">
                            <div class="w-full scroll-smooth hover:scroll-auto w-full">
                            @foreach($tasks as $task)
                                    <div class="w-full border-t border-solid hover:bg-blue-100  my-5">
                                        <div class="md:grid md:grid-cols-10 p-2">
                                            <i class="fas fa-user-circle text-4xl col-span-1 m-auto text-blue-400"></i>
                                            <div class="col-span-6">
                                                <a href="#" class="text-lg text-blue-400  hover:text-red-400">
                                                    {{$task->name}}
                                                </a>
                                                <p class="text-sm mt-2">
                                                    {{$task->description}}
                                                </p>
                                            </div>
                                            <div class="col-span-3 md:text-right">
                                                <a href="#" class="text-lg">{{$task->budget}} sum</a>
                                                <p class="text-sm">@lang('lang.mytasks_sportMaster')</p>
                                                <p class="text-sm">@lang('lang.mytasks_noFeedback')</p>
                                            </div>
                                        </div>
                                    </div>
                            @endforeach

                        </div>
                    </div>

                </div>
            </div>

            <div>
                {{-- <div class="text-4xl font-semibold my-6">
                    У задания {{$task_count}} откликов
                </div> --}}
                <hr>
                <div>

                </div>

            </div>
        </div>
        <div class="col-span md:block hidden">
            <div class="w-full h-full mt-5">
                <div id="map" class="h-60 rounded-lg w-full">
                </div>
                <div class="w-full h-full mt-5">
                    <button class="font-medium hover:text-red-500 rounded-lg text-sm text-center inline-flex items-center mb-1" type="button">@lang('lang.mytasks_allCat')</button>

                    <div class="w-full my-1">
                        @foreach (\TCG\Voyager\Models\Category::query()->where('parent_id', null)->get() as $category)
                            <div x-data={show:false} class="rounded-sm">
                                <div class="border border-b-0 bg-gray-100" id="headingOne">
                                    <button class="font-medium hover:text-red-500 rounded-lg text-sm text-center inline-flex items-center my-1 mx-1" type="button">
                                        {{$category->getTranslatedAttribute('name',Session::get('lang') , 'fallbackLocale')}}
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

        tabTogglers.forEach(function(toggler) {
        toggler.addEventListener("click", function(e) {
        e.preventDefault();

        let tabName = this.getAttribute("href");

        let tabContents = document.querySelector("#tab-contents");

        for (let i = 0; i < tabContents.children.length; i++) {

        tabTogglers[i].parentElement.classList.remove("border-blue-400", "border-b",  "-mb-px", "opacity-100");  tabContents.children[i].classList.remove("hidden");
        if ("#" + tabContents.children[i].id === tabName) {
        continue;
        }
        tabContents.children[i].classList.add("hidden");

        }
        e.target.parentElement.classList.add("border-blue-400", "border-b-4", "-mb-px", "opacity-100");
        });
        });

        document.getElementById("default-tab").click();

        </script>

@endsection
