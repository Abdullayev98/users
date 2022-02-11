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
                </div>
            </div>

    <!-- Tab Contents -->
            <div id="tab-contents">
                <div id="first">
                    <div id="scrollbar" class="w-full blog1">
                    <div class="w-full scroll-smooth hover:scroll-auto w-full">
                        <p class="p-5 lenght"></p>
                    @foreach($perform_tasks as $task)

                                <div class="w-full border-t border-solid hover:bg-blue-100 category">
                                    <div class="md:grid md:grid-cols-10 p-2">
                                        @foreach ($categories as $category)
                                            @if ($category->id == $task->category_id)
                                                <i class="{{$category->ico}} text-4xl float-left text-blue-400 mr-2"></i>
                                            @endif
                                        @endforeach
                                        <div class="col-span-6">
                                            <a href="/detailed-tasks/{{$task->id}}" class="text-blue-500 text-xl hover:text-red-500">
                                                {{$task->name}}
                                            </a>
                                            <p class="text-sm mt-2">
                                                {{$task->description}}
                                            </p>
                                            @if ($task->status == 3)
                                                <p class="text-amber-500 font-normal">@lang('lang.detT_inProsses')</p>
                                            @elseif($task->status < 3)
                                                <p class="text-green-400 font-normal">@lang('lang.detT_open')</p>
                                            @else
                                                <p class="text-red-400 font-normal">@lang('lang.detT_close')</p>
                                            @endif
                                        </div>
                                        <div class="col-span-3 md:text-right categoryid">
                                            <p class="text-xl font-medium text-gray-600">{{$task->budget}}</p>
                                            @foreach ($categories as $category)
                                                @if($category->id == $task->category_id)
                                                    <span class="text-sm text-gray-500 hover:text-red-600 my-3" about="{{$category->id}}">{{ $category->getTranslatedAttribute('name',Session::get('lang') , 'fallbackLocale') }}</span>
                                                @endif
                                            @endforeach
                                            <p class="text-sm text-gray-500"> @lang("lang.detT_callback3") {{$task->responses->where('task_id',$task->id)->count()}}</p>
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
                                <p class="p-5 lenght2"></p>
                            @foreach($tasks as $task)
                                    <div class="w-full border-t border-solid hover:bg-blue-100 category2 my-5">
                                        <div class="md:grid md:grid-cols-10 p-2">
                                            @foreach ($categories as $category)
                                                @if ($category->id == $task->category_id)
                                                    <i class="{{$category->ico}} text-4xl float-left text-blue-400 mr-2"></i>
                                                @endif
                                            @endforeach
                                            <div class="col-span-6">
                                                <a href="/detailed-tasks/{{$task->id}}" class="text-blue-500 text-xl hover:text-red-500">
                                                    {{$task->name}}
                                                </a>
                                                <p class="text-sm mt-2">
                                                    {{$task->description}}
                                                </p>
                                                @if ($task->status == 3)
                                                    <p class="text-amber-500 font-normal">@lang('lang.detT_inProsses')</p>
                                                @elseif($task->status < 3)
                                                    <p class="text-green-400 font-normal">@lang('lang.detT_open')</p>
                                                @else
                                                    <p class="text-red-400 font-normal">@lang('lang.detT_close')</p>
                                                @endif
                                            </div>
                                            <div class="col-span-3 md:text-right categoryid">
                                                <p class="text-xl font-medium text-gray-600">{{$task->budget}}</p>
                                                @foreach ($categories as $category)
                                                    @if($category->id == $task->category_id)
                                                        <span class="text-sm text-gray-500 hover:text-red-600 my-3" about="{{$category->id}}">{{ $category->getTranslatedAttribute('name',Session::get('lang') , 'fallbackLocale') }}</span>
                                                    @endif
                                                @endforeach
                                                    <p class="text-sm text-gray-500"> @lang("lang.detT_callback3") {{$task->responses->where('task_id',$task->id)->count()}}</p>
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
                    <button class="font-medium hover:text-red-500 rounded-lg text-sm text-center inline-flex items-center mb-1 allshow" type="button">@lang('lang.mytasks_allCat')</button>

                    <div class="w-full my-1">
                        @foreach (\TCG\Voyager\Models\Category::query()->where('parent_id', null)->get() as $category)
                            <div x-data={show:false} class="rounded-sm">
                                <div class="my-3 text-blue-500 hover:text-red-500 cursor-pointer" id="{{ str_replace(' ', '', $category->name) }}">
                                    {{ $category->getTranslatedAttribute('name',Session::get('lang') , 'fallbackLocale') }}
                                </div>
                                <div id="{{$category->slug}}" class="px-8 py-1 hidden">
                                    @foreach (\TCG\Voyager\Models\Category::query()->where('parent_id', $category->id)->get() as $category2)

                                        <div class="child_cat">
                                            <a  class="text-blue-500 hover:text-red-500 my-1 send-request cursor-pointer" id="{{$category2->id}}" data-id="{{$category2->id}}">{{ $category2->getTranslatedAttribute('name',Session::get('lang') , 'fallbackLocale') }}</a>
                                        </div>

                                    @endforeach
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section("javasript")

    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <script src="https://api-maps.yandex.ru/2.1/?lang={{app()->getLocale()}}&apikey=f4b34baa-cbd1-432b-865b-9562afa3fcdb"
            type="text/javascript"></script>
    <script type="text/javascript">
        let mytaskCoordinates = [];
        mytaskCoordinates = $.parseJSON(JSON.stringify({!! $datas !!}));
        console.log(mytaskCoordinates.length);

        ymaps.ready(function () {
            var myMap = new ymaps.Map('map', {
                    center: [41.311081, 69.240562],
                    zoom: 9,
                    behaviors: ['default', 'scrollZoom']
                }, {
                    searchControlProvider: 'yandex#search'
                }),
                clusterer = new ymaps.Clusterer({

                    preset: 'islands#invertedVioletClusterIcons',

                    groupByCoordinates: false,

                    clusterDisableClickZoom: true,
                    clusterHideIconOnBalloonOpen: false,
                    geoObjectHideIconOnBalloonOpen: false
                }),

                getPointData = function (index) {
                let status = mytaskCoordinates[index].status;
                    if(status == 4){
                    return {
                        balloonContentBody: '<p>Название: <a class="text-blue-500" href="detailed-tasks/'+mytaskCoordinates[index].id+'">' + mytaskCoordinates[index].name +'</a></p>',
                        clusterCaption: 'Задание <strong> №' + mytaskCoordinates[index].id + '</strong>',
                        balloonContentFooter:'Статус задания:<strong>Закрыто</strong>'
                        };
                    }else if(status == 3){
                        return {
                            balloonContentBody: '<p>Название: <a class="text-blue-500" href="detailed-tasks/'+mytaskCoordinates[index].id+'">' + mytaskCoordinates[index].name +'</p>',
                            clusterCaption: 'Задание <strong> №' + mytaskCoordinates[index].id + '</strong>',
                            balloonContentFooter:'Статус задания:<strong>В Исполнении</strong>'
                        };
                    }else{
                        return {
                            balloonContentBody: '<p>Название: <a class="text-blue-500" href="detailed-tasks/'+mytaskCoordinates[index].id+'">' + mytaskCoordinates[index].name +'</p>',
                            clusterCaption: 'Задание <strong> №' + mytaskCoordinates[index].id + '</strong>',
                            balloonContentFooter:'Статус задания:<strong>Открыто</strong>'
                        };
                    }
                },

                getPointOptions = function () {
                    return {
                        preset: 'islands#violetIcon'
                    };
                },
                points = [
                        @foreach($datas as $data)
                            [{{$data->coordinates}}],
                        @endforeach
                ],
                geoObjects = [];


            for(var i = 0, len = points.length; i < len; i++) {
                geoObjects[i] = new ymaps.Placemark(points[i], getPointData(i), getPointOptions());
            }


            clusterer.options.set({
                gridSize: 80,
                clusterDisableClickZoom: true
            });


            clusterer.add(geoObjects);
            myMap.geoObjects.add(clusterer);



            myMap.setBounds(clusterer.getBounds(), {
                checkZoomRange: true
            });
        });
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
    <script>
        @foreach (\TCG\Voyager\Models\Category::query()->where('parent_id', null)->get() as $category)
        $( "#{{ str_replace(' ', '', $category->name) }}" ).click(function() {
            if ($("#{{$category->slug}}").hasClass("hidden")) {
                $("#{{$category->slug}}").removeClass('hidden');
            }else{
                $("#{{$category->slug}}").addClass('hidden');
            }
        });
        @foreach (\TCG\Voyager\Models\Category::query()->where('parent_id', $category->id)->get() as $category2)
        $( "#{{$category2->id}}" ).click(function() {
            var category = $(".categoryid").children("span");
            $( category ).each(function() {

                if ($(this).attr("about") != {{$category2->id}}){
                    $(this).parents(".category").hide();
                }else {
                    $(this).parents(".category").show();
                }
                if ($(this).attr("about") != {{$category2->id}}){
                    $(this).parents(".category2").hide();
                }else {
                    $(this).parents(".category2").show();
                }
            });
        });
        @endforeach
        @endforeach
        $( ".allshow" ).click(function() {
            var category = $(".categoryid").children("span");
            $( category ).each(function() {
                if ($(this).parents(".category").is(":hidden")){
                    $(this).parents(".category").show();
                }
                if ($(this).parents(".category2").is(":hidden")){
                    $(this).parents(".category2").show();
                }
            });
        });
    </script>
    <script>
        $(document).ready(function(){
            var category = $(".category");
            var category2 = $(".category2");
            $(".lenght2").text(`@lang("lang.mytask_avarage")` + category2.length);
            if (category.is(":visible")){
                    $(".lenght").text(`@lang("lang.mytask_avarage")` + category.length);
                }
        });
    </script>
    <script>
        $(document).ready(function(){

        });
    </script>
@endsection
