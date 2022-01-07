@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{asset('css/budget.css')}}">
<!-- Information section -->
<x-roadmap/>
<form class="" action="{{route('task.create.services')}}" method="post">
  @csrf
<div class="mx-auto w-9/12  my-16">
<div class="grid grid-cols-3 gap-x-20">
  <div class="md:col-span-2 col-span-3">
    <div class="w-full text-center text-2xl">
      Ищем исполнителя для задания "{{session('name')}}"
    </div>
    <div class="w-full text-center my-4 text-[#5f5869]">
      Задание заполнено на 71%
    </div>
    <div class="relative pt-1">
      <div class="overflow-hidden h-1 text-xs flex rounded bg-gray-200  mx-auto ">
        <div style="width: 71%" class="shadow-none  flex flex-col text-center whitespace-nowrap text-white justify-center bg-green-500"></div>
      </div>
    </div>
    <div class="shadow-xl w-full mx-auto mt-7 rounded-2xl  w-full p-6 px-20">
      <div class="py-4 mx-auto px-auto text-center text-3xl texl-bold">
        На какой бюджет вы рассчитываете?
      </div>
      <div class="py-4 mx-auto px-auto text-center text-sm texl-bold">

      </div>
      <div class="py-4 mx-auto  text-left ">
        <div class="mb-4">
          <div id="formulario" class="flex flex-col gap-y-4">
            <div class="cube mx-auto">
              <div class="a"></div>
          <div id="slider-range-min"></div>
          </div>
          <input type="text" id="amount" name="amount" value="{{session('soqqa')}}">
          </div>
          <!-- <div class="w-full">
            <input type="checkbox" name="business" value="1"> Я использую YouDo для бизнеса, нужны закрывающие документы
            <p class="text-sm ml-4 mb-4">На ваше задание смогут откликаться только юридические лица, ИП и самозанятые</p>
            <input type="checkbox" name="insurance" value="1"> Отдаю предпочтение застрахованным исполнителям
            <p class="text-sm ml-4">В случае ущерба страховая возместит вам до 100 000 руб. Это бесплатно</p>
          </div> -->
          <div class="mt-4">
             <div class="flex w-full gap-x-4 mt-4">
              <a href="/task/create/date" type="button"  class="w-1/3  border border-[#000]-700 hover:border-[#000] transition-colors rounded-lg py-2 text-center flex justify-center items-center gap-2">
                 Назад
               </a>
               <input type="submit"
              class="bg-[#6fc727] hover:bg-[#5ab82e] w-2/3 cursor-pointer text-white font-bold py-5 px-5 rounded"
              name="" value="Далее">
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

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
@endsection

@section("javasript")
<script>
$(function(){
$("#slider-range-min").slider({
range:"min",
min:1500,
max:15000,
step:2250,
slide:function(event,ui){
$("#amount").val(""+ui.value+" Сум");
$(".a").width(ui.value/150+"%");
if($('.a').css("width") < "15%"){
  $( "#qotaq" ).css('margin-left', '10%');
  }else{
    $( "#qotaq" ).css('margin-left', '-1%');
  }
}
});
$("#amount").val(""+$("#slider-range-min").slider("value")+"");
});
</script>
<script>
  window.onload = function exampleFunction() {
      console.log('The Script will load now.');

      $(".ui-slider-handle").attr("id","qotaq");
  $( "#qotaq" ).css('margin-left', '10%');

      // $(".ui-slider-range-min").html('<a class="ui-slider-handle ui-state-default ui-corner-all" href="#" style="left: 0%;"></a>');
  }
</script>
    <!-- <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script> -->
@endsection