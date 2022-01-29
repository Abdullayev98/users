@extends('layouts.app')

@include('layouts.fornewtask')

@section('content')
<style media="screen">

</style>
<!-- Information section -->
<x-roadmap/>
<script src="https://unpkg.com/@themesberg/flowbite@1.3.0/dist/datepicker.bundle.js"></script>
<form class="" action="{{route('task.create.date.store', $task->id)}}" method="post">
  @csrf

<div class="mx-auto w-9/12  my-16">
<div class="grid grid-cols-3 gap-x-20">
  <div class="md:col-span-2 col-span-3">
    <div class="w-full text-center text-2xl">
      @lang('lang.budget_lookingFor') "{{session('name')}}"
    </div>
    <div class="w-full text-center my-4 text-gray-400">
      @lang('lang.date_percent')
    </div>
    <div class="pt-1">
      <div class="overflow-hidden h-1 text-xs flex rounded bg-gray-200  mx-auto ">
        <div style="width: 70%" class="shadow-none  flex flex-col text-center whitespace-nowrap text-white justify-center bg-green-500"></div>
      </div>
    </div>
    <div class="shadow-2xl w-full md:p-16 p-4 mx-auto my-4 rounded-2xl	w-full">
      <div class="py-4 mx-auto px-auto text-center text-3xl texl-bold">
        @lang('lang.date_startTime')
      </div>
      <div class="py-4 mx-auto px-auto text-center text-sm texl-bold">
        @lang('lang.date_startDate')
      </div>
      <div class="py-4 mx-auto  text-left ">
        <div class="mb-4">
          <div id="formulario" class="flex flex-col gap-y-4">

            <div class="flex items-center ">
                  <select name="date_type" id="periud" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" aria-label="Default select example">
                      <option selected value="1" id="1">@lang('lang.date_startTask')</option>
                      <option value="2" id="2">@lang('lang.date_finishTask')</option>
                      <option value="3" id="3">@lang('lang.date_givePeriod')</option>
                  </select>
            </div>
              <div class="relative flex">
                  <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                      <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path></svg>
                  </div>
                  <input datepicker type="text" id="start_date" name="start_date" value="{{old('start_date')}}" class="focus:outline-none  flex-1 bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Дата" required>
                  <input type="time" name="start_time" value="{{old('start_time')}}" class="focus:outline-none bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                </div>
                <div>
                  <p onclick="date()" id="today" class="text-base text-gray-500 hover:text-yellow-500 float-left mr-4 cursor-pointer">
                    сегодня
                  </p>
                  <p onclick="dateYesterday()" id="tomorrow" class="text-base text-gray-500 hover:text-yellow-500 cursor-pointer w-4/12">
                    завтра
                  </p>
                </div>
              <div class="relative flex" id="datetime" style="display: none;">
                  <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                      <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path></svg>
                  </div>
                  <input datepicker id="end_date" type="text" name="end_date" value="{{old('end_date')}}" class=" flex-1 bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Дата">
                  <input type="time" name="end_time" value="{{old('end_time')}}" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
              </div>
              <div>
                  <p onclick="date1()" style="display: none;" id="today1" class="text-base text-gray-500 hover:text-yellow-500 float-left mr-4 cursor-pointer">
                    сегодня
                  </p>
                  <p onclick="dateYesterday1()" style="display: none;" id="tomorrow1" class="text-base text-gray-500 hover:text-yellow-500 cursor-pointer w-4/12">
                    завтра
                  </p>
                </div>
          </div>
          <div class="mt-4">
             <div class="flex w-full gap-x-4 mt-4">
             <a onclick="myFunction()" class="w-1/3  border border-black-700 hover:border-black transition-colors rounded-lg py-2 text-center flex justify-center items-center gap-2">
                                            <!-- <button type="button"> -->
                                            @lang('lang.notes_back')
                                            <!-- </button> -->
                                            <script>
                                                function myFunction() {
                                                    window.history.back();
                                                }
                                            </script>
                                        </a>
               <input type="submit"
                               class="bg-green-500 hover:bg-green-500 w-2/3 cursor-pointer text-white font-bold py-5 px-5 rounded"
                               name="" value="@lang('lang.name_next')">

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
  $("#periud").change(function(){
    if($(this).val() == 2 ){
      $("#datetime").show();
      $("#today1").show();
      $("#tomorrow1").show();
    }else{
      $("#datetime").hide();
    }

});
</script>
<script>
    function date()
    {
      var dateObj = new Date();
      var month = dateObj.getUTCMonth() + 1; //months from 1-12
      var day = dateObj.getUTCDate();
      var year = dateObj.getUTCFullYear();

      newdate = month + "/" + day + "/" + year;
      document.getElementById("start_date").value = newdate;
    }
    function dateYesterday()
    {
      var dateObj = new Date();
      var month = dateObj.getUTCMonth() + 1; //months from 1-12
      var day = dateObj.getUTCDate()+1;
      var year = dateObj.getUTCFullYear();

      newdate = month + "/" + day + "/" + year;
      document.getElementById("start_date").value = newdate;
    }
    function date1()
    {
      var dateObj = new Date();
      var month = dateObj.getUTCMonth() + 1; //months from 1-12
      var day = dateObj.getUTCDate();
      var year = dateObj.getUTCFullYear();

      newdate = month + "/" + day + "/" + year;
      document.getElementById("end_date").value = newdate;
    }
    function dateYesterday1()
    {
      var dateObj = new Date();
      var month = dateObj.getUTCMonth() + 1; //months from 1-12
      var day = dateObj.getUTCDate()+1;
      var year = dateObj.getUTCFullYear();

      newdate = month + "/" + day + "/" + year;
      document.getElementById("end_date").value = newdate;
    }
</script>
    <!-- <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script> -->
@endsection
