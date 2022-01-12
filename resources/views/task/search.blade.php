@extends("layouts.app")

@section("content")

<div class="mx-auto w-9/12 my-16">

    <div class="border-b">
      <!-- Tabs -->
        <ul id="tabs" class="inline-flex w-full">
            <li class="font-semibold rounded-t mr-4 pb-3"><a id="default-tab" href="#first">@lang('lang.search_allTasks')</a></li>
            <li class="font-semibold rounded-t pb-3"><a href="#second">@lang('lang.search_recomend')</a></li>
        </ul>
    </div>

    <!-- Tab Contents -->
    <div id="tab-contents">
        <div id="first">

            <div class="grid lg:grid-cols-3 grid-cols-2 container mx-auto">
                <div class="col-span-2">
                    <div class="w-full bg-[#f8f7ee] my-5">
                        <div class="px-5 py-5">
                            <!-- <form action="{{route('search')}}" method="get"> -->
                                <div class="grid grid-cols-4 gap-4 mb-3">

                                    <div class="sm:inline-flex block w-full col-span-4">
                                        <!-- <input class="w-10/12 text-black-700 border border-black rounded mr-4 px-1" type="text" placeholder="Поиск по ключевым словам" name="s" value="{{$s ?? ''}}" aria-label="Full name"> -->
                                        <input id="filter" type="text" class="w-10/12 text-black-700 border border-black rounded mr-4 px-1" placeholder="@lang('lang.search_byKey')">
                                        <button class="sm:w-2/12 w-4/12 bg-green-500 ml-1 py-1 px-1 rounded sm:mt-0 mt-4" id="mpshow">@lang('lang.search_find')</button>
                                    </div>

                                    <div class="sm:inline-flex block w-full col-span-4">
                                        <div class="w-7/12">
                                            <label class="text-xs">@lang('lang.search_location')</label>
                                            <input class="address w-full border border-black rounded text-black-700 py-1 px-1" type="text" id="suggest">
                                        </div>
                                        <div class="sm:w-1/5 w-1/3 sm:ml-5 ml-0">
                                            <label class="text-xs">@lang('lang.search_byMapRadius')</label>
{{--                                            <input type="text" maxlength="7" class="w-full border border-black text-black-700 rounded py-1 px-1">--}}
                                            <select name="" id="" class="w-full border border-black text-black-700 rounded py-1 px-1">
                                                <option value="0">Без ограничений</option>
                                                <option value="1.5">1.5 km</option>
                                                <option value="3">3 km</option>
                                                <option value="5">5 km</option>
                                            </select>
                                        </div>
                                        <div class="sm:w-1/5 w-1/3 sm:ml-5 ml-0">
                                            <label class="text-xs">@lang('lang.search_priceBy')</label>
                                            <input type="text" maxlength="7" class="w-full border border-black text-black-700 rounded py-1 px-1" placeholder="UZS" id="price">
                                        </div>
                                    </div>

                                </div>
                            <!-- </form> -->
                        </div>
                    </div>

                    <div class="col-span-2 lg:col-span-1 lg:hidden block mx-4 lg:mt-0 mt-8 mb-4">
                        <div id="map1" class="h-60 my-5 rounded-lg w-full static"></div>
                        <div class="w-full h-full">

                            <div class="max-w-lg mx-auto">

                                <label class="font-medium rounded-lg text-sm text-center inline-flex items-center ml-5 hover:cursor-pointer">
                                <input type="checkbox" class="all_cat2 mr-1 hover:cursor-pointer"/> @lang('lang.search_allCat')
                                </label>

                                <div class="w-full my-1 for_check2">

                                    @foreach (\TCG\Voyager\Models\Category::withTranslations(['ru', 'uz'])->where('parent_id', null)->get() as $category)
                                        <div x-data={show:false} class="rounded-sm">
                                            <div class="border border-b-0 bg-gray-100" id="headingOne">
                                                <button @click="show=!show" class="underline text-blue-500 hover:text-blue-700 focus:outline-none" type="button">
                                                    <svg class="w-4 h-4 rotate -rotate-90" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                                    </svg>
                                                </button>
                                                    <label class="font-medium rounded-lg text-sm text-center inline-flex items-center hover:cursor-pointer">
                                                    <input type="checkbox" class="par_cat2 mr-1 hover:cursor-pointer" name="{{$category->id}}" id="par{{$category->id}}"/> {{$category->getTranslatedAttribute('name',Session::get('lang') , 'fallbackLocale')}}
                                                    </label>
                                            </div>
                                            <div x-show="show" class="border border-b-0 px-8 py-0">
                                                @foreach (\TCG\Voyager\Models\Category::withTranslations(['ru', 'uz'])->where('parent_id', $category->id)->get() as $category2)

                                                    <div class="par{{$category->id}}">
                                                        <label class="font-medium rounded-lg text-sm text-left inline-flex items-baseline hover:cursor-pointer">
                                                        <input type="checkbox" class="chi_cat2 mr-1 hover:cursor-pointer" name="{{$category2->id}}" id="par{{$category->id}}"/> {{$category2->getTranslatedAttribute('name',Session::get('lang') , 'fallbackLocale')}}
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
                    </div>

                    <div class="">
                        <div class="col-span-2 lg:col-span-1 lg:block hidden mx-4 lg:mt-0 mt-32">
                            <div class="big-map static">

                            </div>
                        </div>
                        <div id="scrollbar" class="w-full h-full blog1">
                            <div class="w-full overflow-y-scroll w-full">
                                <div class="show_tasks">
                                  {{--Show Tasks list --}}
                                </div>
                            </div>
                            <div class="grid grid-cols-3 gap-3 content-center w-full h-full">
                                <div></div>
                                <div class="butt col-span-3 text-center w-full h-full" style="display: none">
                                    <p class="text-center">@lang('lang.search_shown')</p>
                                    <button class="mt-2 px-5 py-1 border border-black rounded hover:cursor-pointer" onclick="tasks_list(k)">@lang('lang.search_showMore')</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-span-2 lg:col-span-1 lg:block hidden mx-4 lg:mt-0 mt-32">
                    <div class="small-map static">

                    </div>
                        <div class="w-full h-full">
                            <div class="max-w-lg mx-auto">
                                <label class="font-medium rounded-lg text-sm text-center inline-flex items-center ml-5 hover:cursor-pointer">
                                  <input type="checkbox" class="all_cat mr-1 hover:cursor-pointer"/> @lang('lang.search_allCat')
                                </label>

                                <div class="w-full my-1 for_check">

                                    @foreach (\TCG\Voyager\Models\Category::withTranslations(['ru', 'uz'])->where('parent_id', null)->get() as $category)
                                        <div x-data={show:false} class="rounded-sm">
                                            <div class="border border-b-0 bg-gray-100" id="headingOne">
                                                <button @click="show=!show" class="underline text-blue-500 hover:text-blue-700 focus:outline-none" type="button">
                                                    <svg class="w-4 h-4 rotate -rotate-90" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                                    </svg>
                                                </button>
                                                    <label class="font-medium rounded-lg text-sm text-center inline-flex items-center hover:cursor-pointer">
                                                      <input type="checkbox" class="par_cat mr-1 hover:cursor-pointer" name="{{$category->id}}" id="par{{$category->id}}"/> {{$category->getTranslatedAttribute('name',Session::get('lang') , 'fallbackLocale')}}
                                                    </label>
                                            </div>
                                            <div x-show="show" class="border border-b-0 px-8 py-0">
                                                @foreach (\TCG\Voyager\Models\Category::withTranslations(['ru', 'uz'])->where('parent_id', $category->id)->get() as $category2)

                                                    <div class="par{{$category->id}}">
                                                        <label class="font-medium rounded-lg text-sm text-left inline-flex items-baseline hover:cursor-pointer">
                                                          <input type="checkbox" class="chi_cat mr-1 hover:cursor-pointer" name="{{$category2->id}}" id="par{{$category->id}}"/> {{$category2->getTranslatedAttribute('name',Session::get('lang') , 'fallbackLocale')}}
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
                </div>
            </div>

        </div>

        <div id="second" class="hidden">
        </div>

    </div>
</div>

@endsection

@section("javasript")

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <script src="https://api-maps.yandex.ru/2.1/?apikey=f4b34baa-cbd1-432b-865b-9562afa3fcdb&lang=@lang('lang.lang_for_map')" type="text/javascript"></script>
    <script type="text/javascript">
        ymaps.ready(init);
        function init() {
            var myMap1 = new ymaps.Map('map1', {
                center: [55.74, 37.58],
                zoom: 15,
                controls: []
            });

            $("#mpshow").click(function(){

            });
        }
    </script>



    <script type="text/javascript"></script>

    <script type="text/javascript">

        ymaps.ready(init);
        function init() {
            var myMap4 = new ymaps.Map('map4', {
                center: [55.74, 37.58],
                zoom: 15,
                controls: []
            });
            $("#mpshow").click(function(){

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

        $("#filter").keyup(function() {

            // Retrieve the input field text and reset the count to zero
            var filter = $(this).val(),
                count = 0;

            // Loop through the comment list
            $('#results a').each(function() {
                // If the list item does not contain the text phrase fade it out
                if ($(this).text().search(new RegExp(filter, "i")) < 0) {
                    var parent = $(this).parent();
                    var parents = $(parent).parent();
                    // MY CHANGE
                    $(parents).parent().hide();
                    // Show the list item if the phrase matches and increase the count by 1
                } else {
                    var parent = $(this).parent();
                    var parents = $(parent).parent();
                    // MY CHANGE
                    $(parents).parent().show();
                    // $(this).show(); // MY CHANGE
                    count++;
                }
            });
        });

        $(".address").keyup(function() {

            // Retrieve the input field text and reset the count to zero
            var filter = $(this).val(),
                count = 0;

            // Loop through the comment list
            $('#results p').each(function() {
                // If the list item does not contain the text phrase fade it out
                if ($(this).text().search(new RegExp(filter, "i")) < 0) {
                    var parent = $(this).parent();
                    var parents = $(parent).parent();
                    // MY CHANGE
                    $(parents).parent().hide();
                    // Show the list item if the phrase matches and increase the count by 1
                } else {
                    var parent = $(this).parent();
                    var parents = $(parent).parent();
                    // MY CHANGE
                    $(parents).parent().show();
                    // $(this).show(); // MY CHANGE
                    count++;
                }
            });
        });


        $("#price").keyup(function() {

            // Retrieve the input field text and reset the count to zero
            var filter = $(this).val(),
                count = 0;

            // Loop through the comment list
            $('#about a').each(function() {
                // If the list item does not contain the text phrase fade it out
                if ($(this).text().search(new RegExp(filter, "i")) < 0) {
                    var parent = $(this).parent();
                    var parents = $(parent).parent();
                    // MY CHANGE
                    $(parents).parent().hide();
                    // Show the list item if the phrase matches and increase the count by 1
                } else {
                    var parent = $(this).parent();
                    var parents = $(parent).parent();
                    // MY CHANGE
                    $(parents).parent().show();
                    // $(this).show(); // MY CHANGE
                    count++;
                }
            });
        });

        let dataAjax = {};
        $('.all_cat').click();
        $('.all_cat2').click();
        $(".for_check input:checkbox").each(function () {
            this.checked = true;
        });
        $(".for_check2 input:checkbox").each(function () {
            this.checked = true;
        });
        first_ajax('all')
        map_pos('big')

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



        function tasks_list_all(data){
            $(".show_tasks").empty();
            $.each(data, function(index, data) {
                if (data.status != 1) {
                $(".show_tasks").append(
                    `<div>
                    <div class="w-full border hover:bg-blue-100 h-[100px] ">
                    <div class="w-11/12 h-12 m-4">
                    <div class="float-left w-9/12 " id="results">
                    <i class="fas fa-user-circle text-4xl float-left text-blue-400 mr-2"></i>
                    <a href="/detailed-tasks/`+data.id+`" class="text-lg text-blue-400 hover:text-red-400">` + data.name + `</a>
                    <p class="text-sm ml-12 mt-4">` + data.address + `</p>
                    </div>
                    <div class="float-right w-1/4 text-right " id="about">
                    <a href="#" class="text-lg">` + data.budget + `</a>
                    <p class="text-sm ml-12">`+ data.category_name +`</p>
                    </div>
                    </div>
                    </div>
                    </div>`,
                )
            }
            });
        }

        function tasks_list(data){
            $(".show_tasks").empty();
            let id;

            $('.chi_cat').each(function () {
                if (this.checked) {
                    id = this.name
                    $.each(data, function(index, data) {
                        if (data.category_id == id && data.status != 1) {
                            $(".show_tasks").append(
                                `<div>
                    <div class="w-full border hover:bg-blue-100 h-[100px] ">
                    <div class="w-11/12 h-12 m-4">
                    <div class="float-left w-9/12 " id="results">
                    <i class="`+data.icon+` text-4xl float-left text-blue-400 mr-2"></i>
                    <a href="/detailed-tasks/` + data.id + `" class="text-lg text-blue-400 hover:text-red-400">` + data.name + `</a>
                    <p class="text-sm ml-10 mt-1">` + data.address + `</p>
                    </div>
                    <div class="float-right w-1/4 text-right " id="about">
                    <a href="#" class="text-lg">` + data.budget + `</a>
                    <p class="text-sm ml-12">`+ data.category_name +`</p>
                    </div>
                    </div>
                    </div>
                    </div>`,
                            )
                        }
                    });
                }
            });
        }

        $('.all_cat, .all_cat2').click(function () {
            if(this.checked == false) {
                $(".for_check input:checkbox").each(function(){
                    this.checked = false;
                });
                $(".for_check2 input:checkbox").each(function(){
                    this.checked = false;
                });
                $('.all_cat').each(function () {
                    this.checked = false;
                });
                $('.all_cat2').each(function () {
                    this.checked = false;
                });
                img_show();
            }else {
                $(".for_check input:checkbox").each(function () {
                    this.checked = true;
                });
                $(".for_check2 input:checkbox").each(function () {
                    this.checked = true;
                });
                $('.all_cat').each(function () {
                    this.checked = true;
                });
                $('.all_cat2').each(function () {
                    this.checked = true;
                });
                tasks_list_all(dataAjax)
            }
        });

        $('.par_cat, .par_cat2').click(function () {
            if(this.checked == false) {
                parcats_click_false(this.id, this.name)
                if (chicat_check_print()){
                    tasks_list(dataAjax)}
                else{
                    img_show()
                }
            } else {
                parcats_click_true(this.id, this.name)
                tasks_list(dataAjax)
            }
        });

        $('.chi_cat, .chi_cat2').click(function () {
            if (this.checked == false) {
                chicats_click_false(this.id, this.name)
                if (chicat_check_print()){
                    tasks_list(dataAjax)}
                else{
                    img_show()
                }
            } else {
                chicats_click_true(this.id, this.name)
                tasks_list(dataAjax)
            }
        });

        function parcats_click_true(id, name) {
            $('.par_cat').each(function () {
                if (this.name == name) {
                    this.checked = true;
                }
            });
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
            $('.par_cat2').each(function () {
                if (this.name == name) {
                    this.checked = true;
                }
            });
            $('.chi_cat2').each(function () {
                if (this.id == id) {
                    this.checked = true;
                }
            });
            $('.all_cat2').each(function () {
                if (parcat2_check()) {
                    this.checked = true;
                    tasks_list_all(dataAjax)
                } else {
                    this.checked = false;
                }
            });
        }

        function parcats_click_false(id) {
            $('.par_cat').each(function() {
                if (this.id == id) {
                    this.checked = false;
                }
            });
            $('.all_cat').each(function () {
                this.checked = false;
            });
            $('.chi_cat').each(function() {
                if (this.id == id) {
                    this.checked = false;
                }
            });
            $('.par_cat2').each(function() {
                if (this.id == id) {
                    this.checked = false;
                }
            });
            $('.all_cat2').each(function () {
                this.checked = false;
            });
            $('.chi_cat2').each(function() {
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

        function parcat2_check(){
            let i = 1;
            $('.par_cat2').each(function() {
                if (this.checked == false) {
                    i = 0;
                    return false;
                }
            });
            return i;
        }

        function chicats_click_true(id, name){
            $('.chi_cat').each(function() {
                if (this.name == name) {
                    this.checked = true;
                }
            });
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
            $('.chi_cat2').each(function() {
                if (this.name == name) {
                    this.checked = true;
                }
            });
            $('.par_cat2').each(function () {
                if (this.id == id) {
                    if (chicat2_check(id))
                        this.checked = true;
                }
            });
            $('.all_cat2').each(function () {
                if (parcat2_check()) {
                    this.checked = true;
                    tasks_list_all(dataAjax)
                } else {
                    this.checked = false;
                }
            });
        }

        function chicats_click_false(id, name){
            $('.chi_cat').each(function() {
                if (this.name == name) {
                    this.checked = false
                }
            });
            $('.par_cat').each(function() {
                if (this.id == id) {
                    this.checked = false;
                }
            });
            $('.all_cat').each(function () {
                this.checked = false;
            });
            $('.chi_cat2').each(function() {
                if (this.name == name) {
                    this.checked = false
                }
            });
            $('.par_cat2').each(function() {
                if (this.id == id) {
                    this.checked = false;
                }
            });
            $('.all_cat2').each(function () {
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

        function chicat2_check(id){
            let i = 1;
            $('.chi_cat2').each(function() {
                if (this.id == id) {
                    if (this.checked == false) {
                        i = 0;
                        return false;
                    }
                }
            });
            return i;
        }

        function chicat_check_print(){
            let i = 0;
            $('.chi_cat').each(function() {
                if (this.checked) {
                    i = 1;
                    return false;
                }
            });
            return i;
        }

        function map_pos(bs){
            if (bs == 'big'){
                // $('.big-map').attr("id","")
                // $('.big-map').attr("hidden","hidden")
                // $('.small-map').attr("id","map2")
                // $('.small-map').removeAttr("hidden")
                $(".big-map").empty();
                $(".small-map").append(
                    `<div id="map2" class="h-60 my-5 rounded-lg w-full static">
                         <div class="grid grid-cols-6 gap-6 content-center w-full">
                             <div></div><div></div><div></div><div></div><div></div>
                             <div class="text-right w-full h-full">
                                 <div class="absolute z-50 ml-1"><img src="{{asset('images/up-down.png')}}" class="hover:cursor-pointer" title="Kartani kattalashtirish" onclick="map_pos('small')"/></div>
                             </div>
                         </div>
                     </div>`,
                )

                ymaps.ready(init);
                function init() {
                    var myMap2 = new ymaps.Map('map2', {
                        center: [55.74, 37.58],
                        zoom: 15,
                        // controls: []
                        controls: ['geolocationControl']
                    });

//             myMap2.balloon.open(myMap2.getCenter(), {
//                 contentHeader: 'Однажды',
//                 contentBody: 'В студеную зимнюю пору' +
//                     ' <span style="color:red; font-weight:bold">Я</span>' +
//                     ' из лесу <b>вышел</b>',
//             });
//
//             myMap2.hint.open([55.76, 37.38], 'Кто <em>поднимается</em> в гору?');
//
//             var myPlacemark = new ymaps.Placemark([55.7, 37.6], {
//                 balloonContentHeader: 'Однажды',
//                 balloonContentBody: 'В студеную зимнюю пору',
//                 balloonContentFooter: 'Мы пошли в гору',
//                 hintContent: 'Зимние происшествия'
//             });
//
//             myMap2.geoObjects.add(myPlacemark);
//
// // Балун откроется в точке «привязки» балуна — т. е. над меткой.
//             myPlacemark.balloon.open();

                }


            }else{
                // $('.small-map').attr("id","")
                // $('.small-map').attr("hidden","hidden")
                // $('.big-map').attr("id","map2")
                // $('.big-map').removeAttr("hidden")
                $(".small-map").empty();
                $(".big-map").append(
                    `<div id="map3" class="h-80 my-5 rounded-lg w-3/3 static align-items-center">
                         <div class="grid grid-cols-10 gap-10 content-center w-full">
                             <div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div>
                             <div class="text-right w-full h-full">
                                 <div class="absolute z-50"><img src="{{asset('images/up-down.png')}}" class="hover:cursor-pointer ml-1" title="Kartani kichiklashtirish" onclick="map_pos('big')"/></div>
                             </div>
                         </div>
                     </div>`,
                )

                ymaps.ready(init);
                function init() {
                    var myMap3 = new ymaps.Map('map3', {
                        center: [55.74, 37.58],
                        zoom: 15,
                        controls: []
                    });
                    $("#mpshow").click(function(){

                    });
                }


            }
        }


    </script>

@endsection
