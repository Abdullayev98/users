@extends("layouts.app")

@section("content")
    <div class="container mx-auto w-9/12">
        <div class="grid grid-cols-3  grid-flow-row mt-8 mb-8">

                {{-- left sidebar start --}}    <script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
            <div class="lg:col-span-2 col-span-3">
                <h1 class="text-3xl font-bold mb-2">{{$tasks->name}}</h1>
                <div class="flex flex-row">
                    <p class="py-2 px-3 bg-amber-200 text-black-500 rounded-lg">до {{$tasks->budget}}</p>
                    <i class="far fa-credit-card text-green-400 mx-3 my-1 text-2xl"></i>
                    <h1 class="my-2 text-green-400">@lang('lang.detT_dealWithoutRisk')</h1>
                    <i class="far fa-question-circle mx-3 my-1 text-2xl text-green-300"></i>
                </div>
                <div class="flex flex-row">
                    <p class="mt-4 text-lg text-gray-400 font-normal">@lang('lang.detT_insuredPer')</p>
                    <i class="far fa-question-circle mx-3 my-3.5 text-2xl text-gray-400"></i>
                </div>
                <div class="flex flex-row text-gray-400 mt-4">
                    <p class="text-green-400 font-normal border-r-2 border-gray-400 pr-2">@lang('lang.detT_open')</p>
                    <!-- <p class="mx-3 px-3 border-x-2 border-gray-400">7 просмотров</p> -->
                    <p class="mr-3 pl-2 pr-3 border-r-2 border-gray-400">{{$tasks->created_at}}</p>
                    @foreach($categories as $category)
                    <p>{{$category->name}}</p>
                    @endforeach
                </div>

                <div class="mt-12 border-2 p-6 w-11/12 rounded-lg border-orange-100 shadow-2xl">
                    <div class="ml-12 flex flex-row">
                        <h1 class="text-lg font-bold h-auto w-48">{{$tasks->date_type}}</h1>
                        <p class="text-lg  h-auto w-96">{{$tasks->start_date}}</p>
                    </div>
                    <!-- <div class="ml-12 flex flex-row mt-4">
                        <h1 class="text-lg font-bold h-auto w-48">Завершить</h1>
                        <p class="text-lg  h-auto w-96">26 декабря 2021, 23:00</p>
                    </div> -->
                    <div class="ml-12 flex flex-row mt-8">
                        <h1 class="text-lg font-bold h-auto w-48">@lang('lang.detT_budget')</h1>
                        <p class="text-lg  h-auto w-96">до {{$tasks->budget}}</p>
                    </div>
                    <!-- <div class="ml-12 flex flex-row mt-4"> -->
                        <!-- <h1 class="text-lg font-bold h-auto w-48">Оплата задания</h1> -->
                        <!-- <div class="flex flex-row  h-auto w-96">
                            <i class="far fa-credit-card text-green-400 text-2xl mr-3"></i>
                            <p class="text-lg">Банковской картой через</p>
                        </div> -->
                    <!-- </div> -->
                    <div class="ml-12 flex flex-row mt-4">
                        <h1 class="text-lg font-bold h-auto w-48">@lang('lang.detT_spot')</h1>
                        <p class="text-lg  h-auto w-96">{{$tasks->address}}</p>
                    </div>
                    <div class="ml-12 flex flex-row mt-8">
                        <h1 class="text-lg font-bold h-auto w-48">@lang('lang.detT_need')</h1>
                        <p class="text-lg  h-auto w-96">{{$tasks->description}}</p>
                    </div>

                    <!--  ------------------------ showModal Откликнуться на это задание  ------------------------  -->

                    <div x-data="{ showModal1: false, showModal2: false, showModal3: false }" :class="{'overflow-y-hidden': showModal1 || showModal2 || showModal3}">
                        <div  class="w-full flex flex-col sm:flex-row justify-center pl-32">
                            <button class="font-sans text-lg font-semibold bg-[#ff8a00] text-[#fff] hover:bg-orange-500 px-8 pt-2 pb-3 rounded transition-all duration-300 m-2" @click="showModal2 = true">
                                Откликнуться на это задание
                            </button>
                            <!-- Modal -->
                            <div class="fixed inset-0 w-full h-full z-20 bg-black bg-opacity-50 duration-300 overflow-y-auto" x-show="showModal2" x-transition:enter="transition duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition duration-300" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">
                                <div class="relative sm:w-3/4 md:w-1/2 lg:w-1/3 mx-2 sm:mx-auto my-10 opacity-100">
                                    <div class="relative bg-[#fff6db] shadow-lg rounded-lg text-gray-900 z-20" @click.away="showModal2 = false" x-show="showModal2" x-transition:enter="transition transform duration-300" x-transition:enter-start="scale-0" x-transition:enter-end="scale-100" x-transition:leave="transition transform duration-300" x-transition:leave-start="scale-100" x-transition:leave-end="scale-0">
                                        <div class="w-[450px] mx-auto">
                                            <header class="p-3 text-black">
                                                <h2 class="font-semibold text-2xl mb-4">Добавить предложение к заказу</h2>
                                                <!--   dropdown   -->
                                                <button class="bg-transparent text-blue-500 underline flex" type="button" data-dropdown-toggle="pattern">
                                                    Использовать шаблон
                                                    <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                                                </button>
                                                <!--   dropdown menu   -->
                                                <div class="hidden bg-white text-base z-50 list-none divide-y divide-gray-100 rounded shadow my-4" id="pattern">
                                                    <div class="px-4 py-3">
                                                        <span class="block text-sm">Bonnie Green</span>
                                                        <span class="block text-sm font-medium text-gray-900 truncate">name@flowbite.com</span>
                                                    </div>
                                                    <ul class="py-1" aria-labelledby="dropdown">
                                                        <li>
                                                            <a href="#" class="text-sm hover:bg-gray-100 text-gray-700 block px-4 py-2">Dashboard</a>
                                                        </li>
                                                        <li>
                                                            <a href="#" class="text-sm hover:bg-gray-100 text-gray-700 block px-4 py-2">Settings</a>
                                                        </li>
                                                        <li>
                                                            <a href="#" class="text-sm hover:bg-gray-100 text-gray-700 block px-4 py-2">Earnings</a>
                                                        </li>
                                                        <li>
                                                            <a href="#" class="text-sm hover:bg-gray-100 text-gray-700 block px-4 py-2">Sign out</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </header>
                                            <main>
                                                <form id="ajaxform">
                                                    <textarea class="rounded-md w-full focus:outline-none my-4"  type="text" id="form8" rows="4" name="response_desc"></textarea>
                                                    <hr>
                                                    <div class="my-2">
                                                        <label>
                                                            <input type="checkbox" name="notificate" value="1" class="mr-2">Уведомить меня, если исполнителем<br>
                                                        </label>
                                                        <label>
                                                            <input class="coupon_question mr-2" type="checkbox" name="coupon_question" value="1" onchange="valueChanged()"/>Указать время актуальности предложения
                                                        </label>
                                                        <select name="response_time" id="AttorneyEmpresa" class="answer" style="display: none">
                                                            <option value="1">1 часов</option>
                                                            <option value="2">2 часов</option>
                                                            <option value="4">4 часов</option>
                                                            <option value="6">6 часов</option>
                                                            <option value="8">8 часов</option>
                                                            <option value="10">10 часов</option>
                                                            <option value="12">12 часов</option>
                                                            <option value="24">24 часов</option>
                                                            <option value="48">48 часов</option>
                                                        </select>
                                                    </div>
                                                    <label>
                                                        <input type="text" name="response_price" class="border border-1 border-solid ">
                                                        <input type="text" name="csrf" class="hidden" value="{{ csrf_token() }}">
                                                        <input type="text" name="task_id" class="hidden" value="{{$tasks->id}}">
                                                    </label>
                                                <hr>
                                            </main>
                                            <footer class="flex justify-center bg-transparent">
                                                <button
                                                    class="save-data bg-green-600 font-semibold text-white py-3 w-full rounded-b-md hover:bg-green-700 focus:outline-none focus:ring shadow-lg hover:shadow-none transition-all duration-300"
                                                    @click="showModal2 = false">Submit</button>
                                                    
                                            </footer>
                                        </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                           {{-- <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script> --}}
                        </div>
                    </div>

                    <!--  ------------------------ showModal Откликнуться на это задание end  ------------------------  -->



                <div class="mt-12 border-2 p-6 w-11/12 rounded-lg border-orange-100 shadow-lg">
                    <h1 class="text-3xl font-semibold py-3">@lang('lang.detT_needForHelper')</h1>
                    <p class="text-lg mb-10">@lang('lang.detT_fastHelp')</p>
                    <a href="/categories/1">
                        <button
                            class="font-sans text-lg font-semibold bg-[#ff8a00] text-[#fff] hover:bg-orange-500 px-8 pt-2 pb-3 rounded"
                            @click="showModal1 = true">
                            @lang('lang.detT_createOwnTask')
                        </button>
                      </a>
                </div>

                <div class="mt-12">
                    <h1 class="text-3xl font-medium ">@lang('lang.detT_otherTask')</h1>
                    @foreach($same_tasks as $same_task)
                    <div class="mt-4">
                        <a href="#" class="underline text-gray-800 hover:text-red-500 text-lg">{{$same_task->name}}</a>
                        @foreach($users as $user)
                        @if($user->id == $same_task->user_id)
                        <p class="text-gray-400 text-base">{{$user->name}}, {{$same_task->budget}}</p>
                        @endif
                        @endforeach
                    </div>
                    @endforeach
                </div>
            </div>
                {{-- left sidebar end --}}

                {{-- right sidebar start --}}
            <div class="lg:col-span-1 col-span-3 lg:mt-0 mt-8">
                <h1 class="text-lg">@lang('lang.detT_ownerOfThisTask')</h1>
                <div class="flex flex-row mt-4">
                    <div class="mr-4">
                        <img src="{{ asset($current_user->avatar ?? $tasks->user_name ) }}" class="border-2 border-gray-400 w-32 h-32" alt="#">
                    </div>
                    <div class="">
                        <a href="#" class="text-2xl text-blue-500 hover:text-red-500">{{$current_user->name ?? $tasks->user_name}}</a> <br>
                        <a href="#" class="text-xl text-gray-500">{{$current_user->email ?? $tasks->user_email}}</a>
                        <!-- <div class="flex flex-row">
                            <p>Отзывы:</p>
                            <i class="far fa-thumbs-up m-1 text-gray-400"></i>  2
                        </div> -->
                    </div>
                </div>
            </div>
                {{-- right sidebar end --}}
        </div>
    </div>
    <script>

    function valueChanged()
    {
        if($('.coupon_question').is(":checked"))   
            $(".answer").show();
        else
            $(".answer").hide();
    }

        $(".save-data").click(function(event){
            event.preventDefault();
            let response_desc = $('textarea#form8').val();
            var notificate = null;
            if ($("input[name=notificate]").is(':checked')) {
                var notificate = 1;
            }else{
                var notificate = 0;
            }
            var response_time = null;
            
            if ($('.answer').is(':visible')) {
                var response_time = 1; 
            }
            let response_price = $("input[name=response_price]").val();
            let task_id = $("input[name=task_id]").val();
            let _token = $("input[name=csrf]").val();
            $.ajax({
              url: "/ajax-request",
              type:"POST",
              data:{
                response_desc:response_desc,
                notificate:notificate,
                response_time:response_time,
                response_price:response_price,
                task_id:task_id,
                _token:_token
              },
              success:function(response){
                console.log(response);
                if(response) {
                  $('.success').text(response.success);
                  
                }
              },
              error: function(error) {
               console.log(error);
              }
             });
        });
      </script>
@endsection
