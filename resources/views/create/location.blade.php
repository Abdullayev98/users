@extends('layouts.app')

@section('content')

<!-- Information section -->
<x-roadmap/>
{{-- <form class="" action="{{route('')}}" method="post"> --}}
<div class="mx-auto w-9/12  my-16">
<div class="grid grid-cols-3 gap-x-20">
  <div class="col-span-2">
    <div class="w-full text-center text-2xl">
      Ищем исполнителя для задания "{{session()->get('task.name')}}"
    </div>
    <div class="w-full text-center my-4 text-[#5f5869]">
      Задание заполнено на 29% 
    </div>
    <div class=" pt-1">
      <div class="overflow-hidden h-1 text-xs flex rounded bg-gray-200  mx-auto ">
        <div style="width: 29%" class="shadow-none  flex flex-col text-center whitespace-nowrap text-white justify-center bg-green-500"></div>
      </div>
    </div>
    <div class="shadow-xl w-full mx-auto mt-7 rounded-2xl	w-full p-6 px-20">
      <div class="py-4 mx-auto px-auto text-center text-3xl texl-bold">
        Где выполнить задание?
      </div>
      <div class="py-4 mx-auto px-auto text-center text-sm texl-bold">
        Укажите адрес или место, чтобы найти исполнителя рядом с вами.
      </div>
      <div class="py-4 mx-auto  text-left ">
        <div class="mb-4">
          <div id="formulario" class="flex flex-col gap-y-4">

            <div class="flex items-center rounded-lg border py-1">
                <button class="flex-shrink-0 border-transparent text-teal-500 text-md py-1 px-2 rounded focus:outline-none" type="button">
                  A
                </button>
                <input id="suggest" class="appearance-none bg-transparent w-full text-gray-700 mr-3 py-1 px-2 leading-tight focus:outline-none" type="text" placeholder="Город, Улица, Дом" aria-label="Full name">
                <button id="mpshow" class="flex-shrink-0 border-transparent border-4 text-teal-500 hover:text-teal-800 text-sm py-1 px-2 rounded" type="button">
                  <svg class="h-4 w-4 text-purple-500"  width="12" height="12" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">  <path stroke="none" d="M0 0h24v24H0z"/>  <path d="M21 3L14.5 21a.55 .55 0 0 1 -1 0L10 14L3 10.5a.55 .55 0 0 1 0 -1L21 3" /></svg>
                </button>
            </div>
            <div id="addinput" class="flex gap-y-2 flex-col">


            </div>



          </div>
          <div class="mt-4">
            <button id="addbtn" type="button"  class="w-full border-dashed border border-[#000] rounded-lg py-2 text-center flex justify-center items-center gap-2" name="button">
              <svg class="h-4 w-4 text-gray-500 "  fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
              </svg>
              <span >Добавить ещё адрес</span>
             </button>
             <div id="map" class="h-60 mt-4 rounded-lg w-full" ></div>
             <div class="flex w-full gap-x-4 mt-4">
              <button type="button"  class="w-1/3  border border-[#000]-700 hover:border-[#000] transition-colors rounded-lg py-2 text-center flex justify-center items-center gap-2">
                 Назад
               </button>

               <input type="submit" class="bg-[#6fc727] hover:bg-[#5ab82e] w-2/3 cursor-pointer text-white font-bold py-5 px-5 rounded" name="" value="Далее">

             </div>


          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-span">
    <x-faq/>
  </div>
</div>
</div>
{{-- </form> --}}


@endsection

@section("javasript")

    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>


    <script src="https://api-maps.yandex.ru/2.1/?apikey=f4b34baa-cbd1-432b-865b-9562afa3fcdb&lang=ru_RU" type="text/javascript">
    </script>
    <script type="text/javascript">

    ymaps.ready(init);

    function init() {
        var suggestView1 = new ymaps.SuggestView('suggest');



        var myMap = new ymaps.Map('map', {
            center: [55.74, 37.58],
            zoom: 15,
            controls: []
        });
        var searchControl = new ymaps.control.SearchControl({


        });
        myMap.controls.add(searchControl);


        $("#mpshow").click(function(){


        searchControl.search(document.getElementById('suggest').value);




    });

    }


    </script>

<script>
  var x = 1;
  const alp = ["B", "C", "D", "E", "F"];
$("#addbtn").click(function(){
    if(x < 6){
        $("#addinput").append('<div class="flex items-center gap-x-2"><div class="flex items-center rounded-lg border  w-full py-1"> <button class="flex-shrink-0 border-transparent text-teal-500 text-md py-1 px-2 rounded focus:outline-none" type="button">  '+ alp[x-1] +' </button> <input id="suggest'+x+'" class="appearance-none bg-transparent w-full text-gray-700 mr-3 py-1 px-2 leading-tight focus:outline-none" type="text" placeholder="Город, Улица, Дом" aria-label="Full name">  <button id="addinput'+x+'" class="flex-shrink-0 border-transparent border-4 text-teal-500 hover:text-teal-800 text-sm py-1 px-2 rounded" type="button">   <svg class="h-4 w-4 text-purple-500"  width="12" height="12" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">  <path stroke="none" d="M0 0h24v24H0z"/>  <path d="M21 3L14.5 21a.55 .55 0 0 1 -1 0L10 14L3 10.5a.55 .55 0 0 1 0 -1L21 3" /></svg>  </button> </div><button id="remove_inputs" class="bg-white hover:bg-gray-100 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded shadow">  <svg xmlns="http://www.w3.org/2000/svg" width="18" height="20" fill="none"><path fill-rule="evenodd" clip-rule="evenodd" d="M3.25 2.95v-.2A2.75 2.75 0 0 1 6 0h6a2.75 2.75 0 0 1 2.75 2.75v.2h2.45a.8.8 0 0 1 0 1.6H.8a.8.8 0 1 1 0-1.6h2.45zm10 .05v-.25c0-.69-.56-1.25-1.25-1.25H6c-.69 0-1.25.56-1.25 1.25V3h8.5z" fill="#666"/><path d="M14.704 6.72a.8.8 0 1 1 1.592.16l-.996 9.915a2.799 2.799 0 0 1-2.8 2.802h-7c-1.55 0-2.8-1.252-2.796-2.723l-1-9.994a.8.8 0 1 1 1.592-.16L4.3 16.794c0 .668.534 1.203 1.2 1.203h7c.665 0 1.2-.536 1.204-1.282l1-9.995z" fill="#666"/><path d="M12.344 7.178a.75.75 0 1 0-1.494-.13l-.784 8.965a.75.75 0 0 0 1.494.13l.784-8.965zm-6.779 0a.75.75 0 0 1 1.495-.13l.784 8.965a.75.75 0 0 1-1.494.13l-.785-8.965z" fill="#666"/></svg> </button></div>');

        x++;

    }else{
        alert("max ten field allowed");
    }
});
$("#addinput").on("click" ,"#remove_inputs" , function(){
    $(this).parent("div").remove();
        x--;
});
console.log(x);
</script>


@endsection
