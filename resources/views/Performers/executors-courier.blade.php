@extends("layouts.app")

@section("content")
@foreach($users as $user)
    <div class="xl:w-[1200px] lg:w-[900px] md:w-[700px] mx-auto">
        <div class="grid grid-cols-3  grid-flow-row mt-10">
        {{-- left sidebar start --}}
            <div class="md:col-span-2 col-span-3 px-2 mx-3">
                <figure class="w-full">
                    <div class="top-0 right-0 float-right text-gray-500 text-sm">
                        <i class="far fa-eye"></i>
                        @foreach($vcs as $vc)
                        <span>{{$vc->count}} @lang('lang.exe_viewProfile')</span>
                        @endforeach
                    </div>
                   <div>
                     @if($user->active_status == 1)
                       <p class="text-lg text-green-500"><i class="fa fa-circle text-xs text-green-500 float-left mr-2 mt-[5px]" > </i>@lang('lang.exe_online')</p>
                       @else
                       <p class="text-lg text-gray-500">@lang('lang.exe_offline')</p>
                       @endif
                       <h1 class="text-3xl font-bold ">{{$user->name}}</h1>
                   </div>

                   <div class="flex w-full mt-6">
                    <div class="flex-initial w-1/3">
                      <img class="h-56 w-56" src="{{ asset($user->avatar) }}" alt="#">
                    </div>
                    <div class="flex-initial w-2/3 lg:ml-0 ml-6">
                        <div class="font-medium text-lg">
                          @if($user->phone_verified_at && $user->email_verified_at)
                            <i class="fas fa-check-circle text-lime-600 text-2xl"></i>
                            <span>@lang('lang.exe_docsAccept')</span>
                            @endif
                        </div>
                        <div class="text-gray-500 text-base mt-4">
                            <span>{{$user->age}} @lang('lang.exe_rusYearLet')</span>
                            <i class="fas fa-map-marker-alt"></i>
                            <span>{{$user->location}}</span>
                        </div>
                        <div class="text-gray-500 text-base mt-6">
                            <span>@lang('lang.exe_done')</span>
                        </div>
                        <div class="text-gray-500 text-base mt-1">
                            <span>@lang('lang.exe_averageRating'): 4,9</span>
                             <i  class="fas fa-star text-amber-500"></i><i  class="fas fa-star text-amber-500"></i><i  class="fas fa-star text-amber-500"></i><i  class="fas fa-star text-amber-500"></i><i  class="fas fa-star text-amber-500"></i>
                            <span class="text-cyan-500 hover:text-red-600">(197 @lang('lang.exe_feedbacks'))</span>
                        </div>
                        <!-- <div class="flex flex-row">
                             <img class="h-24 mt-4 ml-2" src="{{ asset('images/icon_year.svg') }}">
                             <img class="h-24 mt-4 ml-4" src="{{ asset('images/icon_shield.png') }}">
                             <img class="h-20 mt-6 ml-4" src="{{ asset('images/icon_bag.png') }}">
                         </div> -->
                         <div>
                             <a href="{{url('performers/chat',['id'=>$user->id])}}">
                                 <button class="bg-gray-300 text-inherit mt-6 disabled font-bold py-2 px-4 rounded opacity-50 ">
                                    @lang('lang.exe_ask')
                                </button>
                             </a>
                         </div>
                         <a class="md:hidden block mt-8" href="#">
                            <button  class="bg-amber-600 hover:bg-amber-500 md:text-2xl text-white font-medium py-4 md:px-12  rounded">
                                @lang('lang.exe_giveTask')
                            </button>
                        </a>
                    </div>
                  </div>
                </figure>

                <div class="mt-8">
                    <h1 class="text-3xl font-semibold text-gray-700">@lang('lang.exe_aboutMe')</h1>
                    <div class="mt-4 mb-4 bg-orange-100 py-4 rounded-xl">
                        <p class="ml-6"> @lang('lang.exe_pushBtn')<a class="text-red-500 hover:text-red-900" onclick="toggleModal12('modal-id12')" href="#">@lang('lang.exe_giveTbtn')</a>. <br>
                            @lang('lang.exe_work')</p>
                    </div>
                </div>
                <p>{{$user->description}}</p>

                <h1 class="mt-12 text-3xl font-medium">@lang('lang.exe_typeOfDone')</h1>
                @foreach($categories as $category)
                 @if($category->id == $user->category_id)
               <div class="mt-8">
                    <a href="#" class="text-2xl font-medium hover:text-red-500 underline underline-offset-4 ">{{$category->name}}</a>
                    <!-- <p class="mt-2 text-gray-400 text-lg">1 место в рейтинге категории в г. Санкт-Петербург, выполнено 199 заданий <br>
                        20 место в общем рейтинге категории</p> -->
               </div>
               <div>
                  <ul>
                    @foreach($child_categories as $cat)
                    @if($cat->parent_id == $category->id)
                    <li class="text-lg mt-2 text-gray-500"><a class="hover:text-red-500 underline underline-offset-4"  href="#">{{$cat->name}}</a> </li>
                    @endif
                    @endforeach
                    <!-- <li class="text-lg mt-2 text-gray-500"><a class="hover:text-red-500 underline underline-offset-4"  href="#">Услуги пешего курьера</a>  ................................................1 место</li> -->
                    <!-- <li class="text-lg mt-2 text-gray-500"><a class="hover:text-red-500 underline underline-offset-4"  href="#">Другая посылка</a>  ...............................................................1 место</li>
                    <li class="text-lg mt-2 text-gray-500"><a class="hover:text-red-500 underline underline-offset-4"  href="#">Срочная доставка</a>  ..........................................................1 место</li>
                    <li class="text-lg mt-2 text-gray-500"><a class="hover:text-red-500 underline underline-offset-4"  href="#">Доставка продуктов</a>  .....................................................1 место</li>
                    <li class="text-lg mt-2 text-gray-500"><a class="hover:text-red-500 underline underline-offset-4"  href="#">Купить и доставить</a>  .......................................................2 место</li>
                    <li class="text-lg mt-2 text-gray-500"><a class="hover:text-red-500 underline underline-offset-4"  href="#">Услуги курьера на легковом авто</a>  .........................4 место</li>
                    <li class="text-lg mt-2 text-gray-500"><a class="hover:text-red-500 underline underline-offset-4"  href="#">Доставка еды из ресторанов</a>(нет выполненных заданий) </li>
                    <li class="text-lg mt-2 text-gray-500"><a class="hover:text-red-500 underline underline-offset-4"  href="#">Курьер на день</a>(нет выполненных заданий)</li> -->
                  </ul>
               </div>
                @endif
              @endforeach
            </div>
        {{-- left sidebar end --}}

        {{-- right sidebar start --}}
            <div class="md:col-span-1 col-span-3  md:mx-2 mx-auto inline-block w-4/5 float-right right-20  h-auto">
                <div class="mt-8 ">
                    <a class="md:block hidden" href="#">
                        <button  class="bg-amber-600 hover:bg-amber-500 text-2xl text-white font-medium py-4 px-12  rounded" onclick="toggleModal12('modal-id12')">
                            @lang('lang.exe_giveTask')
                        </button>
                    </a>
                    <p class="md:block hidden text-sm text-amber-500 text-center mt-8">@lang('lang.exe_perfTakesNotif')</p>
                </div>
                <div class="mt-16 border p-8 rounded-lg border-gray-300">
                    <div>
                        <h1 class="font-medium text-2xl">@lang('lang.exe_performer')</h1>
                        <p class="text-gray-400">@lang('lang.exe_since')</p>
                    </div>
                    <div class="">
                        <!-- <div class="flex w-full mt-4">
                            <div class="flex-initial w-1/4">
                                <i class="text-[#fff] far fa-file-image text-2xl bg-lime-500 py-3 px-4 rounded-lg"></i>
                            </div>
                            <div class="flex-initial w-3/4 xl:ml-0 ml-8">
                                <h2 class="font-medium text-lg">Документы</h2>
                                <p>Документы проверены</p>
                            </div>
                        </div> -->
                        <div class="flex w-full mt-4">
                            <div class="flex-initial w-1/4">
                                <i class="text-[#fff] fas fa-phone-square text-2xl bg-amber-500 py-3 px-4 rounded-lg"></i>
                            </div>
                            <div class="flex-initial w-3/4 xl:ml-0 ml-8">
                                <h2 class="font-medium text-lg">@lang('lang.exe_phone')</h2>
                                @if($user->phone_verified_at)
                                <p>@lang('lang.exe_verified')</p>
                                @else
                                <p>@lang('lang.exe_notVerified')</p>
                                @endif
                            </div>
                        </div>
                        <div class="flex w-full mt-4">
                            <div class="flex-initial w-1/4">
                                <i class="text-[#fff] far fa-envelope text-2xl bg-blue-500 py-3 px-4 rounded-lg"></i>
                            </div>
                            <div class="flex-initial w-3/4 xl:ml-0 ml-8">
                                <h2 class="font-medium text-lg">Email</h2>
                                @if($user->email_verified_at)
                                <p>@lang('lang.exe_verified')</p>
                                @else
                                <p>@lang('lang.exe_notVerified')</p>
                                @endif
                            </div>
                        </div>
                        <!-- <div class="flex w-full mt-4">
                            <div class="flex-initial w-1/4">
                                <i class="text-[#fff] far fa-address-book text-2xl bg-blue-400 py-3 px-4 rounded-lg"></i>
                            </div>
                            <div class="flex-initial w-3/4 xl:ml-0 ml-8">
                                <h2 class="font-medium text-lg">Вконтакте</h2>
                                <p>Подтвержден</p>
                            </div>
                        </div> -->
                        <!-- <div class="flex w-full mt-4">
                            <div class="flex-initial w-1/4">
                                <i class=" fab fa-apple text-2xl bg-gray-400 text-[#fff] py-3 px-4 rounded-lg"></i>
                            </div>
                            <div class="flex-initial w-3/4 xl:ml-0 ml-8">
                                <h2 class="font-medium text-lg">Apple ID</h2>
                                <p>Подтвержден</p>
                            </div>
                        </div> -->
                    </div>
                </div>
                <div class="mt-8">
                    <h1 class="text-3xl font-medium">@lang('lang.exe_newPost')<br><a href="#" class="text-blue-500 hover:text-red-600">@lang('lang.exe_inBlog')</a></h1>
                    <img class="mt-4 rounded-xl " src="https://content0.youdo.com/zi.ashx?i=d36fd188a176881f" alt="#">
                    <h1 class="mt-4 font-medium text-xl text-gray-700">@lang('lang.exe_fromTo')</h1>
                    <p class="mt-2 font-normal text-base text-gray-700">('lang.exe_motivation')</p>
                    <hr class="mt-4 mb-4 text-gray-300">
                    <h2 class="font-medium text-xl text-gray-700">@lang('lang.exe_becomeMaster')</h2>
                    <hr class="mt-4 mb-4 text-gray-300">
                    <h2 class="font-medium text-xl text-gray-700">@lang('lang.exe_prize')</h2>
                    <hr class="mt-4 mb-4 text-gray-300">
                    <h2 class="font-medium text-xl text-gray-700">@lang('lang.exe_takeItForFree')</h2>
                </div>
            </div>
        {{-- right sidebar end --}}
        </div>
    </div>


    {{-- Modal start --}}
      <div class="hidden overflow-x-hidden overflow-y-auto fixed inset-0 z-50 outline-none focus:outline-none justify-center items-center" id="modal-id12">
        <div class="relative w-auto my-6 mx-auto max-w-3xl"  id="modal-id12">
          <div class="border-0 rounded-lg shadow-lg relative flex flex-col w-full bg-white outline-none focus:outline-none">
            <div class=" text-center p-12  rounded-t">
                  <button type="submit"  onclick="toggleModal12('modal-id12')" class="rounded-md w-100 h-16 absolute top-1 right-4">
                    <i class="fas fa-times  text-slate-400 hover:text-slate-600 text-xl w-full"></i>
                  </button>
                <h3 class="font-medium text-4xl block mt-4">
                    @lang('lang.exe_youHaventT')
                </h3>
            </div>
            <!--body-->
            <div class="relative p-6 flex-auto">
              <p class="my-4  text-lg  text-center">
                @lang('lang.exe_createTFirst')
              </p>
            </div>
            <!--footer-->
            <div class="flex mx-auto items-center justify-end p-6 rounded-b mb-8">
                <div class="mt-4 ">
                    <a class="px-10 py-4 text-center font-sans  text-xl  font-semibold bg-lime-500 text-[#fff] hover:bg-lime-600  h-12 rounded-md text-xl" href="/categories/1" >@lang('lang.exe_createTask')</a>
                </div>
            </div>
          </div>
        </div>
      </div>
      <div class="hidden opacity-25 fixed inset-0 z-40 bg-black" id="modal-id12-backdrop"></div>
      @endforeach
      <script type="text/javascript">
        function toggleModal12(modalID12){
          document.getElementById(modalID12).classList.toggle("hidden");
          document.getElementById(modalID12 + "-backdrop").classList.toggle("hidden");
          document.getElementById(modalID12).classList.toggle("flex");
          document.getElementById(modalID12 + "-backdrop").classList.toggle("flex");
        }
      </script>
    {{-- Modal end --}}
@endsection
