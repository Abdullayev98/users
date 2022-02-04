@extends('layouts.app')

@include('layouts.fornewtask')

@section('content')
<script>
  var myMap;
  var multiRoute;
  var place, place1="", place2="", place3="", place4="";
</script>
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>


    <script id="map_api" src="https://api-maps.yandex.ru/2.1/?apikey=f4b34baa-cbd1-432b-865b-9562afa3fcdb&lang=@lang('lang.lang_for_map')&onload=onLoad" type="text/javascript">
    </script>

<!-- Information section -->

<form action="{{route("task.create.address.store", $task->id)}}" method="post" >
{{--@if ($category->id == 3 )--}}
{{--    @if(session('cat_id') == 50)--}}
{{--        <form action="{{route('task.create.peopleTransported')}}" method="post">--}}
{{--            @elseif(session('cat_id') == 53)--}}
{{--                <form action="{{route('task.create.date')}}" method="post">--}}
{{--            @else--}}
{{--        <form action="{{route('task.create.cargo')}}" method="post">--}}
{{--    @endif--}}
{{--  <form action="{{route('task.create.cargo')}}" method="post">--}}
{{--  @elseif($category->id == 1)--}}
{{--    @if(session('cat_id') == 22)--}}
{{--      <form action="{{route('task.create.delivery')}}" method="post">--}}
{{--    @elseif(session('cat_id') == 23)--}}
{{--      <form action="{{route('task.create.delivery')}}" method="post">--}}
{{--    @elseif(session('cat_id') == 25)--}}
{{--      <form action="{{route('task.create.delivery')}}" method="post">--}}
{{--      @elseif(session('cat_id') == 28)--}}
{{--      <form action="{{route('task.create.delivery')}}" method="post">--}}
{{--    @elseif(session('cat_id') == 29)--}}
{{--      <form action="{{route('task.create.delivery')}}" method="post">--}}
{{--    @elseif(session('cat_id') == 24)--}}
{{--      <form action="{{route('task.create.buy_delivery')}}" method="post">--}}
{{--    @elseif(session('cat_id') == 27)--}}
{{--      <form action="{{route('task.create.buy_delivery')}}" method="post">--}}
{{--    @else--}}
{{--        <form action="{{route('task.create.buy_delivery')}}" method="post">--}}
{{--    @endif--}}
{{--  @else--}}
{{--  <form action="{{route('task.create.date')}}" method="post">--}}
{{--@endif--}}
  @csrf
<div class="mx-auto w-9/12  my-16">
<div class="grid grid-cols-3 gap-x-20">
  <div class="md:col-span-2 col-span-3">
    <div class="w-full text-center text-2xl">
      @lang('lang.budget_lookingFor') "{{$task->name}}"
    </div>
    <div class="w-full text-center my-4 text-gray-400">
      @lang('lang.loc_percent')
    </div>
    <div class=" pt-1">
      <div class="overflow-hidden h-1 text-xs flex rounded bg-gray-200  mx-auto ">
        <div style="width: 55%" class="shadow-none  flex flex-col text-center whitespace-nowrap text-white justify-center bg-green-500"></div>
      </div>
    </div>
    <div class="shadow-2xl w-full md:p-16 p-4 mx-auto my-4 rounded-2xl	w-full">
      <div class="py-4 mx-auto px-auto text-center text-3xl texl-bold">
        @lang('lang.loc_whereTask')
      </div>
      <div class="py-4 mx-auto px-auto text-center text-sm texl-bold">
        @lang('lang.loc_giveLocation')
      </div>
      <div class="py-4 mx-auto  text-left ">
        <div class="mb-4">
          <div id="formulario" class="flex flex-col gap-y-4">

            <div class="flex items-center rounded-lg border py-1">
                <button class="flex-shrink-0 border-transparent text-teal-500 text-md py-1 px-2 rounded focus:outline-none" type="button">
                  A
                </button>
                <input autocomplete="off" oninput="myFunction()" id="suggest0" class="appearance-none bg-transparent w-full text-gray-700 mr-3 py-1 px-2 leading-tight focus:outline-none" type="text" placeholder="@lang('lang.search2_location')" value="{{session('location2')}}" name="location0" required>
                <button id="getlocal" class="flex-shrink-0 border-transparent border-4 text-teal-500 hover:text-teal-800 text-sm py-1 px-2 rounded" type="button">   <svg class="h-4 w-4 text-purple-500"  width="12" height="12" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">  <path stroke="none" d="M0 0h24v24H0z"/>  <path d="M21 3L14.5 21a.55 .55 0 0 1 -1 0L10 14L3 10.5a.55 .55 0 0 1 0 -1L21 3" /></svg>  </button>


              </div>
              <input name="coordinates0" type="hidden" id="coordinate">
            <div id="addinput" class="flex gap-y-2 flex-col">


            </div>
          </div>
          <div class="mt-4">
            <button id="addbtn" type="button"  class="w-full border-dashed border border-black rounded-lg py-2 text-center flex justify-center items-center gap-2" name="button">
              <svg class="h-4 w-4 text-gray-500 "  fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
              </svg>
              <span >@lang('lang.loc_add')</span>
             </button>
             <div id="map" class="h-60 mt-4 rounded-lg w-full" ></div>
             <div class="flex w-full gap-x-4 mt-4">
             <a onclick="backfunctionlocation()" class="w-1/3 cursor-pointer  border border-black-700 hover:border-black transition-colors rounded-lg py-2 text-center flex justify-center items-center gap-2">
                                            <!-- <button type="button"> -->
                                            @lang('lang.notes_back')
                                            <!-- </button> -->
                                            <script>
                                                function backfunctionlocation() {
                                                    window.history.back();
                                                }
                                            </script>
                                        </a>

               <input type="submit" class="bg-green-500 hover:bg-green-500 w-2/3 cursor-pointer text-white font-bold py-5 px-5 rounded" name="" value="@lang('lang.name_next')">

             </div>


          </div>
        </div>
      </div>
    </div>
  </div>
    <x-faq/>
</div>
</div>


</form>


@endsection

@section("javasript")

<script>


  function init_map(){

  myMap = new ymaps.Map('map', {
      center: [ 41.311151, 69.279737],
      zoom: 13,
      controls: ['zoomControl', 'searchControl']
  });


  }
  ymaps.ready(init_map);




     var x = 1;
  function init() {

    var suggestView0 = new ymaps.SuggestView('suggest0');

    suggestView0.events.add('select', function () {
            myFunction();
        });

        const alp = ["B", "C", "D", "E"];
      $("#addbtn").click(function(){
          if(x < 2){
              $("#addinput").append('<div class="flex items-center gap-x-2">' +
                  '<div class="flex items-center rounded-lg border  w-full py-1"> ' +
                  '<button class="flex-shrink-0 border-transparent text-teal-500 text-md py-1 px-2 rounded focus:outline-none" type="button">  '+ alp[x-1] +' </button>' +
                  ' <input oninput="myFunction()" id="suggest'+(x)+'" class="appearance-none bg-transparent w-full text-gray-700 mr-3 py-1 px-2 leading-tight focus:outline-none"' +
                  ' type="text" name="location'+ x +'" placeholder="Город, Улица, Дом" aria-label="Full name"> ' +
                  '  </div><button id="remove_inputs" class="bg-white hover:bg-gray-100 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded shadow"> ' +
                  ' <svg xmlns="http://www.w3.org/2000/svg" width="18" height="20" fill="none"><path fill-rule="evenodd" clip-rule="evenodd" d="M3.25 2.95v-.2A2.75 2.75 0 0 1 6 0h6a2.75 2.75 0 0 1 2.75 2.75v.2h2.45a.8.8 0 0 1 0 1.6H.8a.8.8 0 1 1 0-1.6h2.45zm10 .05v-.25c0-.69-.56-1.25-1.25-1.25H6c-.69 0-1.25.56-1.25 1.25V3h8.5z" fill="#666"/>' +
                  '<path d="M14.704 6.72a.8.8 0 1 1 1.592.16l-.996 9.915a2.799 2.799 0 0 1-2.8 2.802h-7c-1.55 0-2.8-1.252-2.796-2.723l-1-9.994a.8.8 0 1 1 1.592-.16L4.3 16.794c0 .668.534 1.203 1.2 1.203h7c.665 0 1.2-.536 1.204-1.282l1-9.995z" fill="#666"/>' +
                  '<path d="M12.344 7.178a.75.75 0 1 0-1.494-.13l-.784 8.965a.75.75 0 0 0 1.494.13l.784-8.965zm-6.779 0a.75.75 0 0 1 1.495-.13l.784 8.965a.75.75 0 0 1-1.494.13l-.785-8.965z" fill="#666"/></svg> </button> ' +
                  '<input name="coordinates'+ x +'" type="hidden" id="coordinate'+ x +'"> </div>    ');
              x++;
          }else{
              alert("max five field allowed");
          }
          var suggestView = [];
        for(var i=1; i<=x; i++){
          suggestView[i] = new ymaps.SuggestView('suggest'+i);
          suggestView[i].events.add('select', function () {
            myFunction();
        });
        }
      });
      $("#addinput").on("click" ,"#remove_inputs" , function(){
          $(this).parent("div").remove();

              x--;
              myFunction();
      });



      $("#getlocal").click(function(){

        var geolocation = ymaps.geolocation;
          geolocation.get({
              mapStateAutoApply: true,
          }).then(function (result) {
              // Синим цветом пометим положение, полученное через браузер.
              // Если браузер не поддерживает эту функциональность, метка не будет добавлена на карту.
              var userAddress = result.geoObjects.get(0).properties.get('text');
              document.getElementById("suggest0").value = userAddress;
              document.getElementById("coordinate").value = result.geoObjects.get(0).geometry.getCoordinates();

          },
                                  function(err) {
                                      console.log('Ошибка: ' + err)
                                  });
              myFunction();

              });


  }

    // Mapga yuklash joyni

    function myFunction() {




      place = document.getElementById("suggest0").value;
      var myGeocoder = ymaps.geocode(place);
      myGeocoder.then(
          function (res) {
            document.getElementById("coordinate").value = res.geoObjects.get(0).geometry.getCoordinates();
            myMap.setCenter( res.geoObjects.get(0).geometry.getCoordinates());
          }

      );




      if(document.getElementById("suggest1")){
        place1 = document.getElementById("suggest1").value;
        var myGeocoder1 = ymaps.geocode(place1);
        myGeocoder1.then(
            function (res) {
              document.getElementById("coordinate1").value = res.geoObjects.get(0).geometry.getCoordinates();

            }
        );
      } else {
        place1 ="";
      }

      // if(document.getElementById("suggest2")){
      //   place2 = document.getElementById("suggest2").value;
      //   var myGeocoder2 = ymaps.geocode(place2);
      //   myGeocoder2.then(
      //       function (res) {
      //         document.getElementById("coordinate2").value = res.geoObjects.get(0).geometry.getCoordinates();

      //       }
      //   );
      // }
      // else {
      //   place2 ="";
      // }

      // if(document.getElementById("suggest3")){
      //   place3 = document.getElementById("suggest3").value;
      //   var myGeocoder3 = ymaps.geocode(place3);
      //   myGeocoder3.then(
      //       function (res) {
      //         document.getElementById("coordinate3").value = res.geoObjects.get(0).geometry.getCoordinates();

      //       }

      //   );
      // }
      // else {
      //   place3 ="";
      // }

      // if(document.getElementById("suggest4")){
      //   place4 = document.getElementById("suggest4").value;
      //   var myGeocoder4 = ymaps.geocode(place4);
      //   myGeocoder4.then(
      //       function (res) {
      //         document.getElementById("coordinate4").value = res.geoObjects.get(0).geometry.getCoordinates();

      //       }
      //   );
      // } else {
      //   place4 ="";
      // }

      myMap.destroy();

      function getbound(){
        if(place1 != ""){
          return true;
        } else{
          return false
        }
      }

      multiRoute = new ymaps.multiRouter.MultiRoute({
            referencePoints: [place, place1 /*, place2, place3, place4*/],

        }, {
          // Автоматически устанавливать границы карты так, чтобы маршрут был виден целиком.
          boundsAutoApply: getbound()
      });


      myMap = new ymaps.Map('map', {
        center: [ 41.311151,69.279737],
      zoom: 13,
      controls: ['zoomControl', 'searchControl']

        });

        myMap.geoObjects.add(multiRoute);

      }
    // end



    ymaps.ready(init);
  </script>


@endsection
