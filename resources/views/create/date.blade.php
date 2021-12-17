@extends('layouts.app')

@section('content')
<style media="screen">

</style>
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
      Задание заполнено на 57%
    </div>
    <div class="pt-1">
      <div class="overflow-hidden h-1 text-xs flex rounded bg-gray-200  mx-auto ">
        <div style="width: 57%" class="shadow-none  flex flex-col text-center whitespace-nowrap text-white justify-center bg-green-500"></div>
      </div>
    </div>
    <div class="shadow-xl w-full mx-auto mt-7 rounded-2xl	w-full p-6 px-20">
      <div class="py-4 mx-auto px-auto text-center text-3xl texl-bold">
        Когда нужно приступить к работе?
      </div>
      <div class="py-4 mx-auto px-auto text-center text-sm texl-bold">
        Укажите точную дату или период, когда нужно приступить к работе.
      </div>
      <div class="py-4 mx-auto  text-left ">
        <div class="mb-4">
          <div id="formulario" class="flex flex-col gap-y-4">

            <div class="flex items-center rounded-lg border py-1">
                  <select class="form-select appearance-none block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding bg-no-repeat rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:outline-none" aria-label="Default select example">
                      <option selected>Начать работу</option>
                      <option value="1">Закончить работу</option>
                      <option value="2">Указать период</option>
                  </select>
            </div>
            <div class="flex items-center rounded-lg border py-1">
              <input type="date" name="" value="" class="mx-auto">
              <input type="time" name="" value="">
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
