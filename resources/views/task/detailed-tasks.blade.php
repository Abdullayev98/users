@extends("layouts.app")

@section("content")
    <link rel="stylesheet" href="{{asset('css/modal.css')}}">
    @if(isset($task_responses))
    <div class="flex mx-auto w-9/12">
        @else
      <div class="mx-auto w-9/12">
             @endif
        <div class="mt-8 md:flex mb-8">
            {{-- left sidebar start --}}
            <div class="w-9/12 float-left">
                <h1 class="text-3xl font-bold mb-2">{{$tasks->name}}</h1>
                <div class="flex flex-row">
                    <p class="py-2 px-3 bg-amber-200 text-black-500 rounded-lg">@lang('lang.deteiledT_before') {{$tasks->budget}}</p>
                    @if ($tasks->email_confirm == 1)
                    <h1 class="my-2 text-green-400">@lang('lang.detT_dealWithoutRisk')</h1>
                    <i class="far fa-credit-card text-green-400 mx-3 my-1 text-2xl"></i>
                    @endif
                </div>
                <div class="flex flex-row">
                    @if ($tasks->show_only_to_performers == 1)
                    <p class="mt-4 text-lg text-gray-400 font-normal">@lang('lang.detT_insuredPer')</p>
                    @endif
                </div>
                <div class="flex flex-row text-gray-400 mt-4">
                    @if ($tasks->status == 1)
                    <p class="text-amber-500 font-normal border-r-2 border-gray-400 pr-2">@lang('lang.detT_inProsses')</p>
                    @else
                    <p class="text-green-400 font-normal border-r-2 border-gray-400 pr-2">@lang('lang.detT_open')</p>
                    @endif
                    <!-- <p class="mx-3 px-3 border-x-2 border-gray-400">7 просмотров</p> -->
                    <p class="mr-3 pl-2 pr-3 border-r-2 border-gray-400">{{$tasks->created_at}}</p>
                    @foreach($categories as $category)
                        <p>{{$category->name}}</p>
                    @endforeach
                </div>

                <div class="mt-12 border-2 p-6 lg:w-[600px]  w-[400px] rounded-lg border-orange-100 shadow-2xl">
                    <div class="ml-12 flex flex-row">
                        <h1 class="text-lg font-bold h-auto w-48">{{$tasks->date_type}}</h1>
                        <p class="text-lg  h-auto w-96">{{date('d-m-Y', strtotime($tasks->start_date))}}</p>
                    </div>
                    <div class="ml-12 flex flex-row mt-8">
                        <h1 class="text-lg font-bold h-auto w-48">@lang('lang.detT_budget')</h1>
                        <p class="text-lg  h-auto w-96">до {{$tasks->budget}}</p>
                    </div>
                        @isset($tasks->oplata)
                    <div class="ml-12 flex flex-row mt-8">
                        <h1 class="text-lg font-bold h-auto w-48">@lang('lang.navbar_payment')</h1>
                        <p class="text-lg  h-auto w-96">{{$tasks->oplata}}</p>
                    </div>
                        @endisset
                        @isset($tasks->description)
                    <div class="ml-12 flex flex-row mt-8">
                        <h1 class="text-lg font-bold h-auto w-48">@lang('lang.notes_destcript')</h1>
                        <p class="text-lg  h-auto w-96">{{$tasks->description}}</p>
                    </div>
                        @endisset
                        @isset($tasks->need_movers)
                    <div class="ml-12 flex flex-row mt-8">
                        <h1 class="text-lg font-bold h-auto w-48">@lang('lang.detailedT_needmovers')</h1>
                        <p class="text-lg  h-auto w-96">{{$tasks->need_movers}}</p>
                    </div>
                    @endisset
                    @isset($tasks->car_model)
                    <div class="ml-12 flex flex-row mt-8">
                        <h1 class="text-lg font-bold h-auto w-48">@lang('lang.detailedT_carmodel')</h1>
                        <p class="text-lg  h-auto w-96">{{$tasks->car_model}}</p>
                    </div>
                    @endisset
                    @isset($tasks->car_service)
                    <div class="ml-12 flex flex-row mt-8">
                        <h1 class="text-lg font-bold h-auto w-48">@lang('lang.detailedT_carservice')</h1>
                        <p class="text-lg  h-auto w-96">{{$tasks->car_service}}</p>
                    </div>
                    @endisset
                    @isset($tasks->pobeg)
                    <div class="ml-12 flex flex-row mt-8">
                        <h1 class="text-lg font-bold h-auto w-48">@lang('lang.detailedT_pobeg')</h1>
                        <p class="text-lg  h-auto w-96">{{$tasks->pobeg}}</p>
                    </div>
                    @endisset
                    @isset($tasks->no_texpassport)
                    <div class="ml-12 flex flex-row mt-8">
                        <h1 class="text-lg font-bold h-auto w-48">@lang('lang.detailedT_notexpassport')</h1>
                        <p class="text-lg  h-auto w-96">{{$tasks->no_texpassport}}</p>
                    </div>
                    @endisset
                    @isset($tasks->delivery_weight)
                    <div class="ml-12 flex flex-row mt-8">
                        <h1 class="text-lg font-bold h-auto w-48">@lang('lang.detailedT_deliveryweight')</h1>
                        <p class="text-lg  h-auto w-96">{{$tasks->delivery_weight}}</p>
                    </div>
                    @endisset
                    @isset($tasks->delivery_width)
                    <div class="ml-12 flex flex-row mt-8">
                        <h1 class="text-lg font-bold h-auto w-48">@lang('lang.detailedT_deliverywidth')</h1>
                        <p class="text-lg  h-auto w-96">{{$tasks->delivery_width}}</p>
                    </div>
                    @endisset
                    @isset($tasks->delivery_length)
                    <div class="ml-12 flex flex-row mt-8">
                        <h1 class="text-lg font-bold h-auto w-48">@lang('lang.detailedT_deliverylength')</h1>
                        <p class="text-lg  h-auto w-96">{{$tasks->delivery_length}}</p>
                    </div>
                    @endisset
                    @isset($tasks->delivery_budget)
                    <div class="ml-12 flex flex-row mt-8">
                        <h1 class="text-lg font-bold h-auto w-48">@lang('lang.detailedT_deliverybudget')</h1>
                        <p class="text-lg  h-auto w-96">{{$tasks->delivery_budget}} UZS</p>
                    </div>
                    @endisset
                    @isset($tasks->delivery_car)
                    <div class="ml-12 flex flex-row mt-8">
                        <h1 class="text-lg font-bold h-auto w-48">@lang('lang.detailedT_deliverycar')</h1>
                        <p class="text-lg  h-auto w-96">{{$tasks->delivery_car}}</p>
                    </div>
                    @endisset
                    @isset($tasks->service_delivery)
                    <div class="ml-12 flex flex-row mt-8">
                        <h1 class="text-lg font-bold h-auto w-48">@lang('lang.detailedT_servicedelivery')</h1>
                        <p class="text-lg  h-auto w-96">{{$tasks->service_delivery}}</p>
                    </div>
                    @endisset
                    @isset($tasks->buy_delivery_weight)
                    <div class="ml-12 flex flex-row mt-8">
                        <h1 class="text-lg font-bold h-auto w-48">@lang('lang.detailedT_text')</h1>
                        <p class="text-lg  h-auto w-96">{{$tasks->buy_delivery_weight}}</p>
                    </div>
                    @endisset
                    @isset($tasks->buy_delivery_height)
                    <div class="ml-12 flex flex-row mt-8">
                        <h1 class="text-lg font-bold h-auto w-48">@lang('lang.detailedT_text1')</h1>
                        <p class="text-lg  h-auto w-96">{{$tasks->buy_delivery_height}}</p>
                    </div>
                    @endisset
                    @isset($tasks->buy_delivery_width)
                    <div class="ml-12 flex flex-row mt-8">
                        <h1 class="text-lg font-bold h-auto w-48">@lang('lang.detailedT_text2')</h1>
                        <p class="text-lg  h-auto w-96">{{$tasks->buy_delivery_width}}</p>
                    </div>
                    @endisset
                    @isset($tasks->buy_delivery_length)
                    <div class="ml-12 flex flex-row mt-8">
                        <h1 class="text-lg font-bold h-auto w-48">@lang('lang.detailedT_text3')</h1>
                        <p class="text-lg  h-auto w-96">{{$tasks->buy_delivery_length}}</p>
                    </div>
                    @endisset
                    @isset($tasks->construction_service)
                    <div class="ml-12 flex flex-row mt-8">
                        <h1 class="text-lg font-bold h-auto w-48">@lang('lang.detailedT_text4')</h1>
                        <p class="text-lg  h-auto w-96">{{$tasks->construction_service}}</p>
                    </div>
                    @endisset
                    @isset($tasks->services)
                    <div class="ml-12 flex flex-row mt-8">
                        <h1 class="text-lg font-bold h-auto w-48">@lang('lang.detailedT_text5')</h1>
                        <p class="text-lg  h-auto w-96">{{$tasks->services}}</p>
                    </div>
                    @endisset
                    @isset($tasks->etaj_po)
                    <div class="ml-12 flex flex-row mt-8">
                        <h1 class="text-lg font-bold h-auto w-48">@lang('lang.detailedT_text6')</h1>
                        <p class="text-lg  h-auto w-96">{{$tasks->etaj_po}}</p>
                    </div>
                    @endisset
                    @isset($tasks->lift_po)
                    <div class="ml-12 flex flex-row mt-8">
                        <h1 class="text-lg font-bold h-auto w-48">@lang('lang.detailedT_text7')</h1>
                        <p class="text-lg  h-auto w-96">{{$tasks->lift_po}}</p>
                    </div>
                    @endisset
                    @isset($tasks->etaj_za)
                    <div class="ml-12 flex flex-row mt-8">
                        <h1 class="text-lg font-bold h-auto w-48">@lang('lang.detailedT_text8')</h1>
                        <p class="text-lg  h-auto w-96">{{$tasks->etaj_za}}</p>
                    </div>
                    @endisset
                    @isset($tasks->lift_za)
                    <div class="ml-12 flex flex-row mt-8">
                        <h1 class="text-lg font-bold h-auto w-48">@lang('lang.detailedT_text9')</h1>
                        <p class="text-lg  h-auto w-96">{{$tasks->lift_za}}</p>
                    </div>
                    @endisset
                    @isset($tasks->peopleCount)
                    <div class="ml-12 flex flex-row mt-8">
                        <h1 class="text-lg font-bold h-auto w-48">@lang('lang.detailedT_text10')</h1>
                        <p class="text-lg  h-auto w-96">{{$tasks->peopleCount}}</p>
                    </div>
                    @endisset
                    @isset($tasks->weight)
                    <div class="ml-12 flex flex-row mt-8">
                        <h1 class="text-lg font-bold h-auto w-48">@lang('lang.detailedT_weight')</h1>
                        <p class="text-lg  h-auto w-96">{{$tasks->weight}}</p>
                    </div>
                    @endisset
                    @isset($tasks->length)
                    <div class="ml-12 flex flex-row mt-8">
                        <h1 class="text-lg font-bold h-auto w-48">@lang('lang.detailedT_length')</h1>
                        <p class="text-lg  h-auto w-96">{{$tasks->length}}</p>
                    </div>
                    @endisset
                    @isset($tasks->width)
                    <div class="ml-12 flex flex-row mt-8">
                        <h1 class="text-lg font-bold h-auto w-48">@lang('lang.detailedT_width')</h1>
                        <p class="text-lg  h-auto w-96">{{$tasks->width}}</p>
                    </div>
                    @endisset
                    @isset($tasks->height)
                    <div class="ml-12 flex flex-row mt-8">
                        <h1 class="text-lg font-bold h-auto w-48">@lang('lang.detailedT_height')</h1>
                        <p class="text-lg  h-auto w-96">{{$tasks->height}}</p>
                    </div>
                    @endisset
                    @isset($tasks->glassSht)
                    <div class="ml-12 flex flex-row mt-8">
                        <h1 class="text-lg font-bold h-auto w-48">@lang('lang.detailedT_text11')</h1>
                        <p class="text-lg  h-auto w-96">{{$tasks->glassSht}}</p>
                    </div>
                    @endisset
                    @isset($tasks->service1)
                    <div class="ml-12 flex flex-row mt-8">
                        <h1 class="text-lg font-bold h-auto w-48">@lang('lang.detailedT_text12')</h1>
                        <p class="text-lg  h-auto w-96">{{$tasks->service1}}</p>
                    </div>
                    @endisset
                    @isset($tasks->where)
                    <div class="ml-12 flex flex-row mt-8">
                        <h1 class="text-lg font-bold h-auto w-48">@lang('lang.detailedT_where')</h1>
                        <p class="text-lg  h-auto w-96">{{$tasks->where}}</p>
                    </div>
                    @endisset
                    @isset($tasks->how_many)
                    <div class="ml-12 flex flex-row mt-8">
                        <h1 class="text-lg font-bold h-auto w-48">@lang('lang.detailedT_howmany')</h1>
                        <p class="text-lg  h-auto w-96">{{$tasks->how_many}}</p>
                    </div>
                    @endisset
                    @isset($tasks->smm_service)
                    <div class="ml-12 flex flex-row mt-8">
                        <h1 class="text-lg font-bold h-auto w-48">@lang('lang.detailedT_smm')</h1>
                        <p class="text-lg  h-auto w-96">{{$tasks->smm_service}}</p>
                    </div>
                    @endisset
                    @isset($tasks->computer_service)
                    <div class="ml-12 flex flex-row mt-8">
                        <h1 class="text-lg font-bold h-auto w-48">@lang('lang.detailedT_comser')</h1>
                        <p class="text-lg  h-auto w-96">{{$tasks->computer_service}}</p>
                    </div>
                    @endisset
                    @isset($tasks->design_service)
                    <div class="ml-12 flex flex-row mt-8">
                        <h1 class="text-lg font-bold h-auto w-48">@lang('lang.detailedT_design')</h1>
                        <p class="text-lg  h-auto w-96">{{$tasks->design_service}}</p>
                    </div>
                    @endisset
                    @isset($tasks->it_service)
                    <div class="ml-12 flex flex-row mt-8">
                        <h1 class="text-lg font-bold h-auto w-48">@lang('lang.detailedT_itservice')</h1><!--it mas ay ti-->
                        <p class="text-lg  h-auto w-96">{{$tasks->it_service}}</p>
                    </div>
                    @endisset
                    @isset($tasks->photo_service)
                    <div class="ml-12 flex flex-row mt-8">
                        <h1 class="text-lg font-bold h-auto w-48">@lang('lang.detailedT_photoser')</h1>
                        <p class="text-lg  h-auto w-96">{{$tasks->photo_service}}</p>
                    </div>
                    @endisset
                    @isset($tasks->remont_ustanovka_service)
                    <div class="ml-12 flex flex-row mt-8">
                        <h1 class="text-lg font-bold h-auto w-48">@lang('lang.detaieldT_text13')</h1>
                        <p class="text-lg  h-auto w-96">{{$tasks->remont_ustanovka_service}}</p>
                    </div>
                    @endisset
                    @isset($tasks->remont_tex)
                    <div class="ml-12 flex flex-row mt-8">
                        <h1 class="text-lg font-bold h-auto w-48">@lang('lang.detailedT_text14')</h1>
                        <p class="text-lg  h-auto w-96">{{$tasks->remont_tex}}</p>
                    </div>
                    @endisset
                    @isset($tasks->krosata_service)
                    <div class="ml-12 flex flex-row mt-8">
                        <h1 class="text-lg font-bold h-auto w-48">@lang('lang.detailedT_text15')</h1>
                        <p class="text-lg  h-auto w-96">{{$tasks->krosata_service}}</p>
                    </div>
                    @endisset
                    @isset($tasks->bugalter_service)
                    <div class="ml-12 flex flex-row mt-8">
                        <h1 class="text-lg font-bold h-auto w-48">@lang('lang.detailedT_text16')</h1>
                        <p class="text-lg  h-auto w-96">{{$tasks->bugalter_service}}</p>
                    </div>
                    @endisset
                    @isset($tasks->learning_service)
                    <div class="ml-12 flex flex-row mt-8">
                        <h1 class="text-lg font-bold h-auto w-48">@lang('lang.detailedT_text17')</h1>
                        <p class="text-lg  h-auto w-96">{{$tasks->learning_service}}</p>
                    </div>
                    @endisset
                    @isset($tasks->age)
                    <div class="ml-12 flex flex-row mt-8">
                        <h1 class="text-lg font-bold h-auto w-48">@lang('lang.settings_age')</h1>
                        <p class="text-lg  h-auto w-96">{{$tasks->age}}</p>
                    </div>
                    @endisset
                    @isset($tasks->time)
                    <div class="ml-12 flex flex-row mt-8">
                        <h1 class="text-lg font-bold h-auto w-48">@lang('lang.detailedT_time')</h1>
                        <p class="text-lg  h-auto w-96">{{$tasks->time}}</p>
                    </div>
                    @endisset
                    @isset($tasks->training)
                    <div class="ml-12 flex flex-row mt-8">
                        <h1 class="text-lg font-bold h-auto w-48">@lang('lang.detailedT_training')</h1>
                        <p class="text-lg  h-auto w-96">{{$tasks->training}}</p>
                    </div>
                    @endisset


                    <div class="ml-12 flex flex-row mt-4">
                        <h1 class="text-lg font-bold h-auto w-48">@lang('lang.detT_spot')</h1>
                        <p class="text-lg  h-auto w-96">{{$tasks->address}}</p>
                    </div>
                    <div class="ml-12 flex flex-row mt-8">
                        <h1 class="text-lg font-bold h-auto w-48">@lang('lang.detT_need')</h1>
                        <p class="text-lg  h-auto w-96">{{$tasks->description}}</p>
                    </div>
                       <!--  ------------------------ showModal Откликнуться на это задание  ------------------------  -->

                    <div>
                        <div  class="w-full flex flex-col sm:flex-row justify-center pl-32">
                            <!-- This is an example component -->
                            <div class="max-w-2xl mx-auto mt-4">
                                @auth
                                        @if($balance >= 400)
                                        <button class="font-sans text-lg font-semibold bg-[#ff8a00] text-[#fff] hover:bg-orange-500 px-8 pt-2 pb-3 mt-6 rounded transition-all duration-300 m-2"
                                                type="button"
                                                data-modal-toggle="authentication-modal">
                                            @lang('lang.detT_callback')
                                        </button>
                                        @else
                                            <a href="#" class='btn open-modal' data-modal="#modal1">@lang('lang.detT_callback')</a>
                                            <div class='modal' id='modal1'>
                                                <div class='content'>
                                                    <img src="{{asset('images/cashback.svg')}}" alt="">
                                                    <h1 class='title'>@lang('lang.detT_fill')</h1>
                                                    <p>
                                                        @lang('lang.detT_balanceReq')
                                                    </p>
                                                    <a class='btn' href="/profile/cash">@lang('lang.detT_fill2')</a>
                                                </div>
                                            </div>
                                        @endif
                                @else
                                <a href="/register">
                                    <button  class="font-sans mt-8 text-lg  font-semibold bg-[#ff8a00] text-[#fff] hover:bg-orange-500 px-10 py-4 rounded">
                                        @lang('lang.detailedT_text18')
                                    </button>
                                </a>
                                @endauth
                                @auth
                                @if ($tasks->performer_id == auth()->user()->id || $tasks->user_id == auth()->user()->id)
                                <button id="sendbutton" class="font-sans w-8/12 text-lg font-semibold bg-green-500 text-[#fff] hover:bg-green-400 px-12 ml-6 pt-2 pb-3 rounded transition-all duration-300 m-2"
                                type="button">
                                    @lang('lang.detailedT_text19')
                                </button>
                                <div class="hideform hidden">
                               <div class="flex flex-row w-1/2 my-4 mx-auto">
                                    <label class="mx-4 cursor-pointer">
                                        <input type="radio" name="good" class="good border hidden rounded ml-6 w-8/12" value="1">
                                        <i id="class_demo"  class="text-gray-500 far fa-thumbs-up text-xl"></i>
                                    </label>
                                    <label class="mx-4 cursor-pointer">
                                        <input type="radio" name="good" class="good border hidden rounded ml-6 w-8/12" value="0">
                                        <i id="class_demo1" class="text-gray-500 far fa-thumbs-down text-xl"></i>
                                    </label>
                               </div>
                                <input type="text" name="comment" class="border rounded ml-6 mb-4 bg-amber-100 w-8/12 py-2 text-center font-normal" value="">
                                <button class="send-comment font-sans w-8/12 text-lg font-semibold bg-green-500 text-[#fff] hover:bg-green-400 px-12 ml-6 pt-2 pb-3 rounded transition-all duration-300 m-2"
                                type="button">
                                    @lang('lang.contact_send')
                                </button>
                            </div>
                                @endif
                                @endauth
                                <!-- Main modal -->
                                <div id="authentication-modal"
                                     aria-hidden="true"
                                     class="btn-preloader hidden overflow-x-hidden overflow-y-auto fixed h-modal md:h-full top-4 left-0 right-0 md:inset-0 z-50 justify-center items-center">
                                    <div class="relative w-full max-w-md px-4 h-full md:h-auto">
                                        <!-- Modal content -->
                                        <div class="bg-white rounded-lg shadow relative dark:bg-gray-700">
                                            <div class="flex justify-end p-2">
                                                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white"
                                                        data-modal-toggle="authentication-modal">
                                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                                    </svg>
                                                </button>
                                            </div>
                                            <form class="space-y-6 px-6 lg:px-8 pb-4 sm:pb-6 xl:pb-8" action="#">
                                                <header>
                                                    <h2 class="font-semibold text-2xl mb-4">@lang('lang.detT_addOffers')</h2>
                                                </header>
                                                <form id="ajaxform">
                                                    <main>
                                                        <textarea class="resize-none rounded-md w-full focus:outline-[rgba(255,119,0,4)] border border p-4  transition duration-200 my-4"  type="text" id="form8" rows="4" name="response_desc"></textarea>
                                                        <hr>
                                                        <div class="my-2">
                                                            <label class=" px-2">
                                                                <input type="checkbox" name="notificate" value="1" class="mr-2 my-3 ">@lang('lang.detT_notifMe')<br>
                                                            </label>
                                                            <label class=" px-2">
                                                                <input class=" my-3 coupon_question mr-2" type="checkbox" name="coupon_question" value="1" onchange="valueChanged()"/>@lang('lang.detT_pointTime')
                                                            </label>
                                                            <br>
                                                            <select name="response_time" id="AttorneyEmpresa" class="answer text-[16px] focus:outline-none border-gray-500 border rounded-lg hover:bg-gray-100 my-2 py-2 px-5 text-gray-500" style="display: none">
                                                                <option value="1" class="">1 @lang('lang.detT_hour')</option>
                                                                <option value="2" class="">2 @lang('lang.detT_hour')</option>
                                                                <option value="4" class="">4 @lang('lang.detT_hour')</option>
                                                                <option value="6" class="">6 @lang('lang.detT_hour')</option>
                                                                <option value="8" class="">8 @lang('lang.detT_hour')</option>
                                                                <option value="10" class="">10 @lang('lang.detT_hour')</option>
                                                                <option value="12" class="">12 @lang('lang.detT_hour')</option>
                                                                <option value="24" class="">24 @lang('lang.detT_hour')</option>
                                                                <option value="48" class="">48 @lang('lang.detT_hour')</option>
                                                            </select>
                                                        </div>
                                                        <label>
                                                            <input type="text" checked  name="response_price" class="border rounded-md px-2 border-solid outline-0 mr-3 my-2">UZS
                                                            <input type="text" name="csrf" class="hidden" value="{{ csrf_token() }}">
                                                            <input type="text" name="task_id" class="hidden" value="{{$tasks->id}}">
                                                            <input type="text" name="name_task" class="hidden" value="{{$tasks->name}}">
                                                            <input type="text" name="status" class="hidden" value="1">
                                                            <input type="text" name="user_id" class="hidden" value="{{$current_user->id ?? null}}">
                                                        </label>
                                                        <hr>
                                                    </main>
                                                    <footer class="flex justify-center bg-transparent">
                                                        <button
                                                            class="save-data bg-[#ff8a00] font-semibold text-white py-3 w-full rounded-md my-4 hover:bg-orange-500 focus:outline-none shadow-lg hover:shadow-none transition-all duration-300">
                                                            @lang('lang.detT_next')
                                                        </button>
                                                    </footer>
                                                </form>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--  ------------------------ showModal Откликнуться на это задание end  ------------------------  -->
                    <!-- Прелоадер -->
                    <div class="preloader" style="display: none">
                        <div class="preloader__row">
                            <div class="preloader__item"></div>
                            <div class="preloader__item"></div>
                        </div>
                    </div>

                    <!-- Основной контент страницы -->
                    <div class="modal">
                        <div class="modal h-screen w-full fixed left-0 top-0 flex justify-center items-center bg-black bg-opacity-50">
                            <!-- modal -->
                            <div class="bg-white rounded shadow-lg w-10/12 md:w-1/3 text-center text-green-500 py-12 text-3xl">
                                <!-- modal header -->
                                <i class="far fa-check-circle fa-4x py-4"></i>
                                <div class="mx-12">
                                    @lang('lang.detT_callbackSucces')
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mt-12 border-2 p-6 lg:w-[600px]  w-[400px] rounded-lg border-orange-100 shadow-lg">
                    <h1 class="text-3xl font-semibold py-3">@lang('lang.detT_needForHelper')</h1>
                    <p class="text-lg mb-10">@lang('lang.detT_fastHelp')</p>
                    <a href="/categories/1">
                        <button  class="font-sans text-lg font-semibold bg-[#ff8a00] text-[#fff] hover:bg-orange-500 px-8 pt-2 pb-3 rounded">
                            @lang('lang.detT_createOwnTask')
                        </button>
                    </a>
                </div>

                <div class="lg:w-[700px] w-[400px]">
                    @if (isset($auth_user))
                    @if ($tasks->user_name == $auth_user->name)
                    <div>
                        @if(isset($task_responses))
                            <div class="text-4xl font-semibold my-6">
                                @if ($response_count <= 4)
                                    @if ($response_count == 1)
                                        @lang('lang.detT_onTask') {{$response_count}} отклик
                                    @else
                                        @lang('lang.detT_onTask') {{$response_count}} откликa
                                    @endif
                                @else
                                    @lang('lang.detT_onTask') {{$response_count}} откликов
                                @endif
                            </div>
                        @else
                            <div class="text-4xl font-semibold my-6">
                                @lang('lang.detT_noCallbacks')
                            </div>
                        @endif
                        <hr>
                        @if(isset($task_responses))
                            <div class="flex my-2">
                                <div class="mr-2 bg-[#fff6db] px-2">
                                    <a href="#">@lang('lang.detT_byRating')</a>
                                </div>
                                <div class="mr-2 text-blue-500 border-b border-dotted border-blue-500 hover:text-red-500 hover:border-red-500">
                                    <a href="">@lang('lang.detT_byTime')</a>
                                </div>
                                <div class="mr-2 text-blue-500 border-b border-dotted border-blue-500 hover:text-red-500 hover:border-red-500">
                                    <a href="">@lang('lang.detT_byCallbacks')</a>
                                </div>
                            </div>
                            @foreach ($task_responses as $response)
                                <div class="mb-6">
                                    <div class="my-10">
                                        <div class="rounded-md bg-black h-24 float-left mr-5">
                                            <img class="w-24 h-24" src="https://thumbs.dreamstime.com/b/%D0%B2%D0%B5%D0%BA%D1%82%D0%BE%D1%80-%D0%B7%D0%B5%D0%BB%D0%B5%D0%BD%D0%BE%D0%B3%D0%BE-%D1%86%D0%B2%D0%B5%D1%82%D0%B0-%D0%B7%D0%BD%D0%B0%D1%87%D0%BA%D0%B0-%D1%85%D0%BE%D0%BA%D0%BA%D0%B5%D1%8F-%D0%BD%D0%B0-%D0%BB%D1%8C%D0%B4%D0%B5-%D1%80%D1%83%D0%BA%D0%BE%D0%BF%D0%BE%D0%B6%D0%B0%D1%82%D0%B8%D1%8F-117033775.jpg" alt="">
                                        </div>
                                        <div class="">
                                            <a href="/performers/{{$response_users->id}}" class="text-blue-500 text-xl font-semibold float-left">
                                                {{$response_users->name}}
                                            </a>
                                            <input type="text" name="performer_id" class="hidden" value="{{$response_users->id}}">
                                            <img class="w-7 h-7 ml-2" src="{{asset('images/shield.svg')}}" alt="">
                                            <div class="text-gray-700">
                                                <i class="fas fa-star text-[#fff0d0] mr-1"></i>@lang('lang.detT_numByNum')
                                            </div>
                                            <div class="mt-2">
                                                <i class="fas fa-briefcase fa-2x text-blue-300"></i>
                                                <i class="fas fa-shield-alt fa-2x text-green-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="bg-[#f5f5f5] rounded-[10px] p-4">
                                        <div class="ml-0">
                                            <div class="text-[17px] text-gray-500 font-semibold">@lang('lang.detT_price') {{$response->price}} сум</div>
                                            <div class="text-[17px] text-gray-500">@lang('lang.detT_Hello')</div>

                                            <div class="text-[17px] text-gray-500 my-5">{{$response->description}}</div>

                                            <div class="text-[17px] text-gray-500 font-semibold my-4">@lang('lang.detT_phoneNum') {{$response_users->phone_number}}</div>
                                            <div class="">
                                                <a href="/chat/{{$response_users->id}}" class="text-semibold text-center w-[200px] mb-2 md:w-[320px] ml-0 inline-block py-3 px-4 hover:bg-gray-200 transition duration-200 bg-white text-black font-medium border border-gray-300 rounded-md">
                                                    @lang('lang.detT_writeOnChat')
                                                </a>
                                                <a class=" send-data text-semibold text-center w-[200px] md:w-[320px] md:ml-4 inline-block py-3 px-4 bg-white transition duration-200 text-white bg-[#6fc727] hover:bg-[#5ab82e] font-medium border border-transparent rounded-md">
                                                    @lang('lang.detT_choose')
                                                </a>
                                            </div>
                                            <div class="text-gray-400 text-[14px] my-6">
                                                @lang('lang.detT_choosePerf')
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
                @endif
                @endif
                <div class="mt-12">
                    <h1 class="text-3xl font-medium ">@lang('lang.detT_otherTaskInCat')</h1>
                    @foreach($same_tasks as $same_task)
                        <div class="mt-4">
                            <a href="{{$same_task->id}}" class="underline text-gray-800 hover:text-red-500 text-lg">{{$same_task->name}}</a>
                            @foreach($users as $user)
                                @if($user->id == $same_task->user_id)
                                    <p class="text-gray-400 text-base">{{$user->name}}, {{$same_task->budget}}</p>
                                @endif
                            @endforeach
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

           {{-- right sidebar start --}}
        <div class="w-3/12 lg:mt-0 mt-8">
            <h1 class="text-lg">@lang('lang.detT_ordererThisTask')</h1>
            <div class="flex flex-row mt-4">
                <div class="mr-4">
                    @if (isset($current_user))
                    <img src="
                        @if ($current_user->avatar == 'users/default.png')
                    {{ asset("AvatarImages/images/{$current_user->avatar}") }}
                    @else
                    {{ asset("AvatarImages/{$current_user->avatar}") }}
                    @endif" class="border-2 border-gray-400 w-32 h-32" alt="#">
                    @endif
                </div>
                <div class="">
                    <a href="@if (isset($current_user))/performers/{{$current_user->id}}@else @endif" class="text-2xl text-blue-500 hover:text-red-500">{{$current_user->name ?? $tasks->user_name}}</a> <br>
                    <a href="#" class="text-xl text-gray-500">
                    @if (isset($current_user))
                        @if($current_user->age != "")
                            <p class="inline-block text-m mr-2">
                                {{$current_user->age}}
                                @if($current_user->age>20 && $current_user->age%10==1) @lang('lang.cash_rusYearGod')
                                @elseif ($current_user->age>20 && ($current_user->age%10==2 || $current_user->age%10==3 || $current_user->age%10==1)) @lang('lang.cash_rusYearGoda')
                                @else @lang('lang.cash_rusYearLet')
                                @endif
                            </p>
                        @endif
                        @endif
                    </a>
                </div>
            </div>
        </div>
      </div>
    </div>

    <style>
        .preloader {
            /*фиксированное позиционирование*/
            position: fixed;
            /* координаты положения */
            left: 0;
            top: 0;
            right: 0;
            bottom: 0;
            /* размещаем блок над всеми элементами на странице (это значение должно быть больше, чем у любого другого позиционированного элемента на странице) */
            z-index: 1001;
            background: rgba(0,0,0,0.4);
        }
        .preloader__row {
            position: relative;
            top: 50%;
            left: 50%;
            width: 70px;
            height: 70px;
            margin-top: -35px;
            margin-left: -35px;
            text-align: center;
            animation: preloader-rotate 2s infinite linear;
        }
        .preloader__item {
            position: absolute;
            display: inline-block;
            top: 0;
            background-color: #337ab7;
            border-radius: 100%;
            width: 35px;
            height: 35px;
            animation: preloader-bounce 2s infinite ease-in-out;
        }
        .preloader__item:last-child {
            top: auto;
            bottom: 0;
            animation-delay: -1s;
        }
        @keyframes preloader-rotate {
            100% {
                transform: rotate(360deg);
            }
        }
        @keyframes preloader-bounce {
            0%,
            100% {
                transform: scale(0);
            }
            50% {
                transform: scale(1);
            }
        }
        .loaded_hiding .preloader {
            transition: 0.3s opacity;
            opacity: 0;
        }
        .loaded .preloader {
            display: none;
        }
    </style>
    <script>
        $(document).ready(function(){
            $("#class_demo").click(function(){
                $("#class_demo").removeClass("text-gray-500");
            $("#class_demo").addClass("text-amber-500");
            $("#class_demo1").removeClass("text-amber-500");
            $("#class_demo1").addClass("text-gray-500");
            });
            $("#class_demo1").click(function(){
            $("#class_demo1").removeClass("text-gray-500");
            $("#class_demo1").addClass("text-amber-500");
            $("#class_demo").removeClass("text-amber-500");
            $("#class_demo").addClass("text-gray-500");
            });
        });
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
            let user_id = $("input[name=user_id]").val();
            let name_task = $("input[name=name_task]").val();
            $.ajax({
                url: "/ajax-request",
                type:"POST",
                data:{
                    response_desc:response_desc,
                    notificate:notificate,
                    response_time:response_time,
                    response_price:response_price,
                    task_id:task_id,
                    _token:_token,
                    user_id:user_id,
                    name_task:name_task
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
            $('.preloader').show();
            $('.btn-preloader').hide();
            $('.bg-opacity-50').hide();
            window.setTimeout(function() {
                $('.preloader').hide();
                $('.modal').show();
            }, 1000);
            window.setTimeout(function() {
                $('.modal').hide();
                window.location.reload();
            }, 3000);
        });
    </script>
    <script>
        $(".send-data").click(function(event){
            event.preventDefault();
            let _token = $("input[name=csrf]").val();
            let status = $("input[name=status]").val();
            let task_id = $("input[name=task_id]").val();
            let performer_id = $("input[name=performer_id]").val();
            let name_task = $("input[name=name_task]").val();
            $.ajax({
                url: "/ajax-request",
                type:"POST",
                data:{
                    _token:_token,
                    status:status,
                    task_id:task_id,
                    performer_id:performer_id,
                    name_task:name_task
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
    <script>
        const modal = document.querySelector('.modal');
        const showModal = document.querySelector('.show-modal');
        const closeModal = document.querySelectorAll('.close-modal');
        showModal.addEventListener('click', function (){
            modal.classList.remove('hidden')
        });
        closeModal.forEach(close => {
            close.addEventListener('click', function (){
                modal.classList.add('hidden')
            });
        });
    </script>
    <script>
        $(".modal").each(function() {
            $(this).wrap('<div class="overlay"></div>')
        });

        $(".open-modal").on('click', function(e) {
            e.preventDefault();
            e.stopImmediatePropagation;

            var $this = $(this),
                modal = $($this).data("modal");

            $(modal).parents(".overlay").addClass("open");
            setTimeout(function() {
                $(modal).addClass("open");
            }, 350);

            $(document).on('click', function(e) {
                var target = $(e.target);

                if ($(target).hasClass("overlay")) {
                    $(target).find(".modal").each(function() {
                        $(this).removeClass("open");
                    });
                    setTimeout(function() {
                        $(target).removeClass("open");
                    }, 350);
                }

            });

        });

        $(".close-modal").on('click', function(e) {
            e.preventDefault();
            e.stopImmediatePropagation;

            var $this = $(this),
                modal = $($this).data("modal");

            $(modal).removeClass("open");
            setTimeout(function() {
                $(modal).parents(".overlay").removeClass("open");
            }, 50);

        });
    </script>
    <script>
        $(document).ready(function(){
            $("#sendbutton").click(function(){
                $("#sendbutton").hide();
                $(".hideform").removeClass('hidden');
            });
        });
        $(".send-comment").click(function(event){
            event.preventDefault();
            let good = $(".good:checked").val();
            let comment = $("input[name=comment]").val();
            let _token = $("input[name=csrf]").val();
            let performer_id = $("input[name=performer_id]").val();
            let task_id = $("input[name=task_id]").val();
            let user_id = $("input[name=user_id]").val();
            $.ajax({
                url: "/ajax-request",
                type:"POST",
                data:{
                    good:good,
                    comment:comment,
                    user_id:user_id,
                    performer_id:performer_id,
                    task_id:task_id,
                    _token:_token,
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
            window.setTimeout(function() {
                window.location.reload();
            }, 3000);
        });
    </script>

@endsection
