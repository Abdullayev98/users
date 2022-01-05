@extends("layouts.app")

@section("content")

<div class="mx-auto w-9/12 my-16">

    <div class="border-b">
      <!-- Tabs -->
        <ul id="tabs" class="inline-flex w-full">
            <li class="font-semibold rounded-t mr-4 pb-3"><a id="default-tab" href="#first">Все задания</a></li>
            <li class="font-semibold rounded-t pb-3"><a href="#second">Рекомендованные</a></li>
        </ul>
    </div>

    <!-- Tab Contents -->
    <div id="tab-contents">
        <div id="first">

            <div class="grid lg:grid-cols-3 grid-cols-2 container mx-auto">
                <div class="col-span-2">
                    <div class="w-full bg-[#f8f7ee] my-5">
                        <div class="px-5 py-5">
                            <form action="{{route('search')}}" method="get">
                                <div class="grid grid-cols-4 gap-4 mb-3">

                                    <div class="sm:inline-flex block w-full col-span-4">
                                        <input class="w-10/12 text-black-700 border border-black rounded mr-4 px-1" type="text" placeholder="Поиск по ключевым словам" name="s" value="{{$s ?? ''}}" aria-label="Full name">
                                        <button class="sm:w-2/12 w-4/12 bg-green-500 ml-1 py-1 px-1 rounded sm:mt-0 mt-4">Найти</button>
                                    </div>

                                    <div class="sm:inline-flex block w-full col-span-4">
                                        <div class="w-7/12">
                                            <label class="text-xs">Город, адрес, метро, район...</label>
                                            <input class="w-full border border-black rounded text-black-700 py-1 px-1" type="text" name="a" value="{{$a ?? ''}}">
                                        </div>
                                        <div class="sm:w-1/5 w-1/3 sm:ml-5 ml-0">
                                            <label class="text-xs">Стоимость заданий от</label>
                                            <input type="text" maxlength="7" class="w-full border border-black text-black-700 rounded py-1 px-1" placeholder="UZS" name="p" value="{{$p ?? ''}}">
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                            <div class="col-span-2 lg:col-span-1 lg:hidden block mx-4 lg:mt-0 mt-8 mb-4">
                                <div id="map1" class="h-60 my-5 rounded-lg w-full">
                                <div class="b-tasks-btn-toggle-map-wrapper" title="Свернуть карту"><span class="b-tasks-btn-toggle-map-arrow-up i-mini"></span><span class="b-tasks-btn-toggle-map-arrow-down i-mini"></span></div>
                                </div>
                                <form id="form">
                                    <div class="w-full h-full">

                                        <div class="max-w-lg mx-auto">

                                            <label class="font-medium rounded-lg text-sm text-center inline-flex items-center ml-5 hover:cursor-pointer">
                                            <input type="checkbox" class="all_cat mr-1 hover:cursor-pointer"/> Все категории
                                            </label>

                                            <div class="w-full my-1 for_check">

                                                @foreach (\TCG\Voyager\Models\Category::query()->where('parent_id', null)->get() as $category)
                                                    <div x-data={show:false} class="rounded-sm">
                                                        <div class="border border-b-0 bg-gray-100" id="headingOne">
                                                            <button @click="show=!show" class="underline text-blue-500 hover:text-blue-700 focus:outline-none" type="button">
                                                                <svg class="w-4 h-4 rotate -rotate-90" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                                                </svg>
                                                            </button>
                                                                <label class="font-medium rounded-lg text-sm text-center inline-flex items-center hover:cursor-pointer">
                                                                <input type="checkbox" class="par_cat mr-1 hover:cursor-pointer" id="par{{$category->id}}"/> {{$category->name}}
                                                                </label>
                                                        </div>
                                                        <div x-show="show" class="border border-b-0 px-8 py-0">
                                                            @foreach (\TCG\Voyager\Models\Category::query()->where('parent_id', $category->id)->get() as $category2)

                                                                <div class="par{{$category->id}}">
                                                                    <label class="font-medium rounded-lg text-sm text-left inline-flex items-baseline hover:cursor-pointer">
                                                                    <input type="checkbox" class="chi_cat mr-1 hover:cursor-pointer" id="par{{$category->id}}"/> {{$category2->name}}
                                                                    </label>
                                                                </div>

                                                            @endforeach
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>

                                        </div>

                                        <script src="https://unpkg.com/@themesberg/flowbite@latest/dist/flowbite.bundle.js"></script>

                                    </div>
                                </form>
                                <div id="form2"></div>
                            </div>

                    <div class="">
                        <div id="scrollbar" class="w-full h-full blog1">
                            <div class="w-full overflow-y-scroll w-full">
                                <div class="show_tasks">
                                  {{--Show Tasks list --}}
                                </div>
                            </div>
                            <div class="grid grid-cols-3 gap-3 content-center w-full h-full">
                                <div></div>
                                <div class="butt col-span-3 text-center w-full h-full" style="display: none">
                                    <p class="text-center">Показано 20 из 331</p>
                                    <button class="mt-2 px-5 py-1 border border-black rounded hover:cursor-pointer" onclick="tasks_list(k)">Показать ещё</button>
                                </div>
                            </div>
                        </div>
                                {{-- {{$tasks->links()}}--}}

                         {{--    Navigatsiya ko'rinishi un kere bo'ladigan Input va Button  --}}
                        <input id="suggest" class="hidden" type="text">
                        <button id="mpshow" class="hidden"></button>
                          {{--    Ishonmaganla sinab ko'rishi mumkin --}}
                    </div>

                </div>

                <div class="col-span-2 lg:col-span-1 lg:block hidden mx-4 lg:mt-0 mt-32">
                    <div id="map2" class="h-60 my-5 rounded-lg w-full">
                       <div class="b-tasks-btn-toggle-map-wrapper" title="Свернуть карту"><span class="b-tasks-btn-toggle-map-arrow-up i-mini"></span><span class="b-tasks-btn-toggle-map-arrow-down i-mini"></span></div>
                    </div>
                    <form id="form">
                        <div class="w-full h-full">

                            <div class="max-w-lg mx-auto">

                                <label class="font-medium rounded-lg text-sm text-center inline-flex items-center ml-5 hover:cursor-pointer">
                                  <input type="checkbox" class="all_cat mr-1 hover:cursor-pointer"/> Все категории
                                </label>

                                <div class="w-full my-1 for_check">

                                    @foreach (\TCG\Voyager\Models\Category::query()->where('parent_id', null)->get() as $category)
                                        <div x-data={show:false} class="rounded-sm">
                                            <div class="border border-b-0 bg-gray-100" id="headingOne">
                                                <button @click="show=!show" class="underline text-blue-500 hover:text-blue-700 focus:outline-none" type="button">
                                                    <svg class="w-4 h-4 rotate -rotate-90" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                                    </svg>
                                                </button>
                                                    <label class="font-medium rounded-lg text-sm text-center inline-flex items-center hover:cursor-pointer">
                                                      <input type="checkbox" class="par_cat mr-1 hover:cursor-pointer" id="par{{$category->id}}"/> {{$category->name}}
                                                    </label>
                                            </div>
                                            <div x-show="show" class="border border-b-0 px-8 py-0">
                                                @foreach (\TCG\Voyager\Models\Category::query()->where('parent_id', $category->id)->get() as $category2)

                                                    <div class="par{{$category->id}}">
                                                        <label class="font-medium rounded-lg text-sm text-left inline-flex items-baseline hover:cursor-pointer">
                                                          <input type="checkbox" class="chi_cat mr-1 hover:cursor-pointer" id="par{{$category->id}}"/> {{$category2->name}}
                                                        </label>
                                                    </div>

                                                @endforeach
                                            </div>
                                        </div>
                                    @endforeach
                                </div>

                            </div>

                            <script src="https://unpkg.com/@themesberg/flowbite@latest/dist/flowbite.bundle.js"></script>

                        </div>
                    </form>
                    <div id="form2"></div>
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
                var myMap = new ymaps.Map('map1', {
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

        <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
        <script src="https://api-maps.yandex.ru/2.1/?apikey=f4b34baa-cbd1-432b-865b-9562afa3fcdb&lang=ru_RU" type="text/javascript"></script>
        <script type="text/javascript">
            ymaps.ready(init);
                function init() {
                    var suggestView1 = new ymaps.SuggestView('suggest');
                    var myMap = new ymaps.Map('map2', {
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
                e.target.parentElement.classList.add("border-orange-400", "border-b-2", "opacity-100");
            });
        });

        document.getElementById("default-tab").click();

        $(".rotate").click(function(){
            $(this).toggleClass("rotate-[360deg]");
        });

        // let i = 20;
        // let k = 0;
        let dataAjax = {};

        // img_show();
        $('.all_cat').click();
        $(".for_check input:checkbox").each(function () {
            this.checked = true;
        });
        first_ajax('all')

        function first_ajax(id){
            $.ajax({
                url: "{{route('tasks.search')}}",
                // dataType: 'json',
                data: {orderBy:id},
                type: 'GET',
                success: function(data) {
                    dataAjax = $.parseJSON(JSON.stringify(data));
                    tasks_list(dataAjax)
                },
                error: function() {
                    alert("Ajax ishida xatolik...");
                }
            });
        }

        function img_show() {
            $(".show_tasks").empty();
            $(".show_tasks").append(
                `<div class="grid grid-cols-3 gap-3 content-center w-full h-full">
                <div></div>
                <div><img src="{{asset('/images/notlike.svg')}}" class="w-full h-full"></div>
                <div></div>
                <div class="col-span-3 text-center w-full h-full">
                    <p class="text-3xl"><b>Задания не найдены</b></p>
                    <p class="text-lg">Попробуйте уточнить запрос или выбрать другие категории</p>
                </div>
                </div>`
            );
            $('.butt').attr('style', 'display: none');
        }

        function tasks_list(data){
            $(".show_tasks").empty();
            $.each(data, function(index, data) {
                $(".show_tasks").append(
                    `<div class="w-full border hover:bg-blue-100 h-[100px]">
                    <div class="w-11/12 h-12 m-4">
                    <div class="float-left w-9/12">
                    <i class="fas fa-user-circle text-4xl float-left text-blue-400 mr-2"></i>
                    <a href="/detailed-tasks/data.id" class="text-lg text-blue-400 hover:text-red-400">` + data.name + `</a>
                    <p class="text-sm ml-12 mt-4">` + data.address + `</p>
                    </div>
                    <div class="float-right w-1/4 text-right">
                    <a href="#" class="text-lg">` + data.budget + `</a>
                    <p class="text-sm ml-12">Спортмастер</p>
                    <p class="text-sm ml-12">Нет отзывов</p>
                    </div>
                    </div>
                    </div>`,
                )
            });
        }

        $('.all_cat').click(function () {
            if(this.checked == false) {
                $(".for_check input:checkbox").each(function(){
                    this.checked = false;
                });
                img_show();
            }else {
                $(".for_check input:checkbox").each(function () {
                    this.checked = true;
                });
                first_ajax('all')
            }
        });

        $('.par_cat').click(function () {
            if(this.checked == false) {
                parcat_click_false(this.id)
            } else {
                parcat_click_true(this.id)
            }
        });


        $('.chi_cat').click(function () {
            if (this.checked == false) {
                chicat_click_false(this.id)
            } else {
                chicat_click_true(this.id)
            }
        });

        function parcat_click_true(id) {
            $('.chi_cat').each(function () {
                if (this.id == id) {
                    this.checked = true;
                }
            });
            $('.all_cat').each(function () {
                if (parcat_check()) {
                    this.checked = true;
                } else {
                    this.checked = false;
                }
            });
        }

        function parcat_click_false(id) {
            $('.all_cat').each(function () {
                this.checked = false;
            });
            $('.chi_cat').each(function() {
                if (this.id == id) {
                    this.checked = false;
                }
            });
        }

        function parcat_check(){
            let i = 1;
            $('.par_cat').each(function() {
                if (this.checked == false) {
                    i = 0;
                    return false;
                }
            });
            return i;
        }

        function chicat_click_true(id){
            $('.par_cat').each(function () {
                if (this.id == id) {
                    if (chicat_check(id))
                        this.checked = true;
                }
            });
            $('.all_cat').each(function () {
                if (parcat_check()) {
                    this.checked = true;
                } else {
                    this.checked = false;
                }
            });
        }

        function chicat_click_false(id){
            $('.par_cat').each(function() {
                if (this.id == id) {
                    this.checked = false;
                }
            });
            $('.all_cat').each(function () {
                this.checked = false;
            });
        }

        function chicat_check(id){
            let i = 1;
            $('.chi_cat').each(function() {
                if (this.id == id) {
                    if (this.checked == false) {
                        i = 0;
                        return false;
                    }
                }
            });
            return i;
        }


    </script>
@endsection
