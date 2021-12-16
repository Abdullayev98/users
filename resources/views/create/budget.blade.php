@extends('layouts.app')

@section('content')

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
            <div class="relative pt-1">
              <div class="overflow-hidden h-2 mb-4 text-xs flex rounded bg-pink-200">
                <div
                  style="width: 30%"
                  class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-pink-500"
                ></div>
              </div>
            </div>
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


@endsection

@section("javasript")
    <!-- <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script> -->
@endsection
