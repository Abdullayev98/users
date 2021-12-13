@extends("layouts.app")

@section("content")
    <div class="mx-auto w-9/12 my-16">
        <div class="flex flex-row my-4">
            <a href="#" class="mr-4" data-tab="all">Все задания</a>
            <a href="#" data-tab="recommended">Рекомендованные</a>
        </div>
        <div class="h-1 w-full bg-gray-300"></div>

    <div class="grid grid-cols-3 gap-x-10">
        <div class="col-span-2">
            <div class="w-full bg-gray-200 mt-5">
                <div class="px-5 py-5">
                    <form action="">
                        <div class="flex flex-row">
                            <input id="suggest" class="appearance-none w-full text-gray-700 border border-black rounded mr-3 py-1 px-2 leading-tight focus:outline-none" type="text" placeholder="Город, Улица, Дом" aria-label="Full name">
                            <button id="mpshow" class="bg-green-500 px-4 py-1 rounded">Найти</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>


    <div class="w-50 mt-5">
        <div id="map" class="w-full h-full"></div>
        <x-faq/>
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

@endsection
