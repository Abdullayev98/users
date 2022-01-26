@extends("layouts.app")

@section("content")

<div class="mx-auto w-10/12 my-10">
    <div class="lg:grid lg:grid-cols-3 lg:gap-x-10 text-base">
        <div class="col-span-2">
            <div class="">
                <!-- Tabs -->
                <div class="w-full bg-gray-50 rounded-md px-5 py-5 border-gray-100">

                    <ul  id="tabs" class="flex rounded-sm sm:w-96 w-full divide-x shadow bg-gray-200">
                        <div id="first_tab" class="w-full text-center">
                            <a id="default-tab" href="#first" class="inline-block relative py-1 w-full">@lang('lang.mytasks_iAmPerformer')</a>
                        </div>
                        <div id="second_tab" class="w-full text-center">
                            <a href="#second" class="inline-block relative py-1 w-full">@lang('lang.mytasks_iAmCustomer')</a>
                        </div>
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
                            @auth
                            @if ($task->performer_id == auth()->user()->id)
                            <div>
                                <div class="w-full border hover:bg-blue-100 h-24 ">
                                    <div class="w-11/12 h-12 m-4">
                                        <div class="float-left w-9/12 " id="results">
                                            @foreach ($categories as $category)
                                            @if ($category->id == $task->category_id)
                                            <i class="{{$category->ico}} text-4xl float-left text-blue-400 mr-2"></i>
                                            @endif
                                            @endforeach
                                            <a href="/detailed-tasks/{{$task->id}}" class="text-blue-400 hover:text-red-400">{{$task->name}}</a>
                                            <p class="text-sm ml-12 mt-4">{{$task->address}}</p>
                                        </div>
                                        <div class="float-right w-1/4 text-right " id="about">
                                            <a href="/detailed-tasks/{{$task->id}}" class="text-lg">{{$task->budget}}</a>
                                            @foreach ($categories as $category)
                                            @if ($category->id == $task->category_id)
                                            <p class="text-sm ml-12">{{$category->name}}</p>
                                            @endif
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif
                            @endauth
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
                            @auth
                            @if ($task->user_id == auth()->user()->id)
                                    <div class="w-full border-t border-solid hover:bg-blue-100  my-5">
                                        <div class="md:grid md:grid-cols-10 p-2">
                                            <i class="fas fa-user-circle text-4xl col-span-1 m-auto text-blue-400"></i>
                                            <div class="col-span-6">
                                                <a href="/detailed-tasks/{{$task->id}}" class="text-blue-500 text-xl hover:text-red-500">
                                                    {{$task->name}}
                                                </a>
                                                <p class="text-sm mt-2">
                                                    {{$task->description}}
                                                </p>
                                            </div>
                                            <div class="col-span-3 md:text-right">
                                                <p class="text-xl font-medium text-gray-600">{{$task->budget}} sum</p>
                                                <a href="#" class="text-sm text-gray-500 hover:text-red-600 my-3">@lang('lang.mytasks_sportMaster')</a>
                                                <p class="text-sm text-gray-500">@lang('lang.mytasks_noFeedback')</p>
                                            </div>
                                        </div>
                                    </div>

                                    @endif
                                    @endauth
                            @endforeach

                        </div>
                    </div>

                </div>
            </div>

            <div>
                {{-- <div class="text-4xl font-semibold my-6">
                    @lang('lang.mytask_onTask') {{$task_count}} @lang('lang.mytask_callbacks')
                </div> --}}
                <hr>
                <div>

                </div>

            </div>
        </div>
        <div class="col-span lg:block hidden">
            <div class="w-full h-full mt-5">
                <div id="map" class="h-60 rounded-lg w-full">
                </div>
                <div class="w-full h-full mt-5">
                    <button class="font-medium hover:text-red-500 rounded-lg text-sm text-center inline-flex items-center mb-1" type="button">@lang('lang.mytasks_allCat')</button>

                    <div class="w-full my-1">
                        @foreach (\TCG\Voyager\Models\Category::query()->where('parent_id', null)->get() as $category)
                            <div x-data={show:false} class="rounded-sm">
                                <div class="my-3 text-blue-500 hover:text-red-500 cursor-pointer" id="headingOne">
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

        tabTogglers[i].parentElement.classList.remove("bg-gray-400","rounded-sm","text-white");  tabContents.children[i].classList.remove("hidden");
        if ("#" + tabContents.children[i].id === tabName) {
        continue;
        }
        tabContents.children[i].classList.add("hidden");

        }
        e.target.parentElement.classList.add("bg-gray-400","rounded-sm","text-white");
        });
        });

        document.getElementById("default-tab").click();

        </script>

@endsection
