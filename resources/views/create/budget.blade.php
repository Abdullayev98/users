@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{asset('css/budget.css')}}">
<!-- Information section -->
<x-roadmap/>
<!-- <form class="" action="" method="post"> -->
<div class="mx-auto w-9/12  my-16">
<div class="grid grid-cols-3 gap-x-20">
  <div class="col-span-2">
    <div class="w-full text-center text-2xl">
      Ищем исполнителя для задания " "
    </div>
    <div class="w-full text-center my-4 text-[#5f5869]">
      Задание заполнено на 71%
    </div>
    <div class="relative pt-1">
      <div class="overflow-hidden h-1 text-xs flex rounded bg-gray-200  mx-auto ">
        <div style="width: 71%" class="shadow-none  flex flex-col text-center whitespace-nowrap text-white justify-center bg-green-500"></div>
      </div>
    </div>
    <div class="shadow-xl w-full mx-auto mt-7 rounded-2xl	w-full p-6 px-20">
      <div class="py-4 mx-auto px-auto text-center text-3xl texl-bold">
        На какой бюджет вы рассчитываете?
      </div>
      <div class="py-4 mx-auto px-auto text-center text-sm texl-bold">

      </div>
      <div class="py-4 mx-auto  text-left ">
        <div class="mb-4">
          <div id="formulario" class="flex flex-col gap-y-4">
            <div class="cube">
              <div class="a"></div>
          <div id="slider-range-min"></div>
          </div>
          <input type="text" id="amount">
          </div>
          <div class="w-full">
            <input type="checkbox" name="" value=""> Я использую YouDo для бизнеса, нужны закрывающие документы
            <p class="text-sm ml-4 mb-4">На ваше задание смогут откликаться только юридические лица, ИП и самозанятые</p>
            <input type="checkbox" name="" value=""> Отдаю предпочтение застрахованным исполнителям
            <p class="text-sm ml-4">В случае ущерба страховая возместит вам до 100 000 руб. Это бесплатно</p>
          </div>
          <div class="mt-4">
             <div class="flex w-full gap-x-4 mt-4">
              <button type="button"  class="w-1/3  border border-[#000]-700 hover:border-[#000] transition-colors rounded-lg py-2 text-center flex justify-center items-center gap-2">
                 Назад
               </button>
               <input type="submit"
              class="bg-[#6fc727] hover:bg-[#5ab82e] w-2/3 cursor-pointer text-white font-bold py-5 px-5 rounded"
              name="" value="Далее">
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
<!-- </form> -->

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
@endsection

@section("javasript")
<script>
$(function(){
$("#slider-range-min").slider({
range:"min",
value:5,
min:100000,
max:500000,
slide:function(event,ui){
$("#amount").val(""+ui.value+" Сум");
$(".a").width(ui.value/5000+"%");
}
});
$(".ui-slider-handle").text("");
$("#amount").val(""+$("#slider-range-min").slider("value")+" сум");
});
</script>
    <!-- <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script> -->
@endsection
