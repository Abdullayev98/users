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
      Задание заполнено на 29%
    </div>
    <div class="relative pt-1">
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
                <input class="appearance-none bg-transparent w-full text-gray-700 mr-3 py-1 px-2 leading-tight focus:outline-none" type="text" placeholder="Город, Улица, Дом" aria-label="Full name">
                <button class="flex-shrink-0 border-transparent border-4 text-teal-500 hover:text-teal-800 text-sm py-1 px-2 rounded" type="button">
                  <svg class="h-4 w-4 text-purple-500"  width="12" height="12" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">  <path stroke="none" d="M0 0h24v24H0z"/>  <path d="M21 3L14.5 21a.55 .55 0 0 1 -1 0L10 14L3 10.5a.55 .55 0 0 1 0 -1L21 3" /></svg>
                </button>
            </div>

            <div>
              <div class="flex items-center rounded-lg border  py-1">
                <button class="flex-shrink-0 border-transparent text-teal-500 text-md py-1 px-2 rounded focus:outline-none" type="button">
                  A
                </button>
                <input class="appearance-none bg-transparent w-full text-gray-700 mr-3 py-1 px-2 leading-tight focus:outline-none" type="text" placeholder="Город, Улица, Дом" aria-label="Full name">
                <button class="flex-shrink-0 border-transparent border-4 text-teal-500 hover:text-teal-800 text-sm py-1 px-2 rounded" type="button">
                  <svg class="h-4 w-4 text-purple-500"  width="12" height="12" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">  <path stroke="none" d="M0 0h24v24H0z"/>  <path d="M21 3L14.5 21a.55 .55 0 0 1 -1 0L10 14L3 10.5a.55 .55 0 0 1 0 -1L21 3" /></svg>
                </button>
              </div>
              
            </div> 

            
          </div>
          <div class="mt-4">
            <button type="button" onClick="addInput();" class="w-full border-dashed border border-[#000] rounded-lg h-12 text-center flex justify-center items-center gap-2" name="button">
              <svg class="h-4 w-4 text-gray-500 "  fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
              </svg>
              <span >Добавить ещё адрес</span>
             </button>
             <div id="map"></div>
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