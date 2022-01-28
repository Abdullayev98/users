@extends("layouts.app")

@section("content")
{{--@foreach($users as $user)--}}
    <div class="w-10/12 mx-auto">
        <div class="grid grid-cols-3  grid-flow-row mt-10">
        {{-- left sidebar start --}}
            <div class="md:col-span-2 col-span-3 px-2 mx-3">
                <figure class="w-full">
                    <div class="top-0 right-0 float-right text-gray-500 text-sm">
                        <i class="far fa-eye"> {{$views}}  @lang('lang.profile_view')</i>
                    </div>
                   <div>
                     @if($user->active_status == 1)
                       <p class="text-green-500"><i class="fa fa-circle text-xs text-green-500 float-left mr-2 mt-[5px]" > </i>@lang('lang.exe_online')</p>
                       @else
                       <p class="text-gray-500">@lang('lang.exe_offline')</p>
                       @endif
                       <h1 class="text-3xl font-bold ">{{$user->name}}</h1>
                   </div>

                   <div class="flex w-full mt-6">
                    <div class="flex-initial w-1/3">
                      <img class="h-48 w-44" 
                      @if ($user->avatar == Null)
                      src='{{asset("images/default_img.jpg")}}'
                      @else
                      src="{{asset("AvatarImages/{$user->avatar}")}}"
                      @endif alt="">
                    </div>
                    <div class="flex-initial w-2/3 lg:ml-0 ml-6">
                        <div class="font-medium text-lg">
                          @if($user->phone_verified_at && $user->email_verified_at)
                            <i class="fas fa-check-circle text-green-500 text-2xl"></i>
                            <span>@lang('lang.exe_docsAccept')</span>
                            @endif
                        </div>
                        <div class="w-2/3 text-base text-gray-500 lg:ml-0 ml-4">
                            @if($user->age != "")
                                <p class="inline-block mr-2">
                                    {{$user->age}}
                                    @if($user->age>20 && $user->age%10==1) @lang('lang.cash_rusYearGod')
                                    @elseif ($user->age>20 && ($user->age%10==2 || $user->age%10==3 || $user->age%10==1)) @lang('lang.cash_rusYearGoda')
                                    @else @lang('lang.cash_rusYearLet')
                                    @endif
                                </p>
                            @endif

                            <span class="inline-block">
                                <i class="fas fa-map-marker-alt"></i>
                                <p class="inline-block text-m">
                                    @if($user->location!="") {{$user->location}} @lang('lang.cash_city')
                                    @else @lang('lang.cash_cityNotGiven')
                                    @endif
                                </p>
                            </span>
                            
                        </div>
                        <div class="text-gray-500 text-base mt-6">
                            <span>@lang('lang.exe_create') {{$task_count}} @lang('lang.exe_counttask')</span> ,
                            @if ($reviews_count == 1)
                            <span>Получил {{$reviews_count}} Отзыв</span>
                            @elseif ($reviews_count > 1 && $reviews_count > 5)
                            <span>Получил {{$reviews_count}} Отзыва</span>
                            @else
                            <span>Получил {{$reviews_count}} Отзывов</span>
                            @endif
                        </div>
                        {{-- <div class="text-gray-500 text-base mt-1">
                            <span>@lang('lang.exe_averageRating'): 4,9</span>
                             <i  class="fas fa-star text-amber-500"></i><i  class="fas fa-star text-amber-500"></i><i  class="fas fa-star text-amber-500"></i><i  class="fas fa-star text-amber-500"></i><i  class="fas fa-star text-amber-500"></i>
                            <span class="text-cyan-500 hover:text-red-600">(197 @lang('lang.exe_feedbacks'))</span>
                        </div> --}}
                         <div class="flex gap-2 my-5">
                            <a href="/badges">
                                <img class="w-20" src="{{ asset('images/insuranceIcon.png') }}" alt="#">
                            </a>
                            <a href="/badges" data-bs-toggle="popover" data-bs-placement="top" data-bs-content="Top popover">
                                <img class="w-20" src="{{ asset('images/goldenCup.png') }}" alt="#">
                            </a>
                         </div>
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
                    {{-- <div class="mt-4 mb-4 bg-orange-100 py-4 rounded-xl">
                        <p class="ml-6"> @lang('lang.exe_pushBtn')<a class="text-red-500 hover:text-red-900" onclick="toggleModal12('modal-id12')" href="#">@lang('lang.exe_giveTbtn')</a>. <br>
                            @lang('lang.exe_work')</p>
                    </div> --}}
                </div>
                <p>{{$user->description}}</p>

                <div class="py-12">
                    <ul class="d-flex flex-col gap-y-5">
                        @if (isset($reviews))
                        @foreach ($reviews as $review)
                            @if($review->user_id == $user->id)
                        <li class="d-flex flex-col my-10 rounded-lg">
                            <a href="#" target="_blank" rel="noreferrer noopener" class="w-1 h-1 overflow-hidden rounded-full border-b-0">
                                <img class="UsersReviews_picture__aB22p" src="https://shivinfotech.co/assests/images/download.png">
                            </a>
                            <div class="align-top ml-12 min-h-10">
                            <span>
                                @if ($user->id == $review->reviewer_id)
                                <a href="/performers/{{$user->id}}" target="_blank" rel="noreferrer noopener" class="text-blue-500 ">{{$user->name}}</a>
                                @endif
                            </span>
                                <div class="text-4 text-[rgba(78,78,78,.5)]">
                                <span class="align-middle">
                                    @if ($user->id == $review->reviewer_id)
                                    @if ($user->role_id == 2)
                                    Отзыв:
                                    @if ($review->good_bad == 1)
                                    <i class="far fa-thumbs-up"></i>
                                    @else
                                    <i class="far fa-thumbs-down"></i>
                                    @endif
                                    Исполнитель
                                    @else
                                    Отзыв:
                                    @if ($review->good_bad == 1)
                                    <i class="far fa-thumbs-up"></i>
                                    @else
                                    <i class="far fa-thumbs-down"></i>
                                    @endif
                                    Заказчик
                                    @endif
                                    @endif
                                </span>
                                </div>
                            </div>
                            <div class="p-5 mt-3 mr-0 mb-8 bg-yellow-50 shadow-[-1px_1px_2px] shadow-gray-300 rounded-2.5 relative text-gray-600 text-[14.7px] leading-[1.1rem] before:content-[''] before:w-0 before:h-0 before:absolute before:top-[-11px] before:left-[-9px] before:z-[2] before:rotate-[-45deg before:border-transparent border-b-gray-100 border-solid rounded-md">
                                <div class="text-gray-500 py-4">
                                    @foreach ($tasks as $task)
                                    @if ($task->id == $review->task_id)
                                    <i class="far fa-thumbs-up"></i> Задание "{{$task->name}}" выполнено
                                    @endif
                                    @endforeach
                                </div>
                                <hr>
                                <div class="py-4">
                                    {{$review->description}} lorem
                                </div>
                            </div>
                        </li>
                        @endif
                        @endforeach
                        @endif
                    </ul>
                </div>

                <h1 class="mt-12 text-3xl font-medium">@lang('lang.exe_typeOfDone')</h1>
                @foreach($categories as $category)
                 @if($category->id == $user->category_id)
               <div class="mt-8">
                    <a class="text-2xl font-medium hover:text-red-500 underline underline-offset-4 ">{{$category->name}}</a>
                    <!-- <p class="mt-2 text-gray-400 text-lg">1 место в рейтинге категории в г. Санкт-Петербург, выполнено 199 заданий <br>
                        20 место в общем рейтинге категории</p> -->
               </div>
               <div>
                  <ul>
                    @foreach($child_categories as $cat)
                    @if($cat->parent_id == $category->id)
                    <li class="mt-2 text-gray-500"><a class="hover:text-red-500 underline underline-offset-4"  href="#">{{$cat->name}}</a> </li>
                    @endif
                    @endforeach
                    <!-- <li class="mt-2 text-gray-500"><a class="hover:text-red-500 underline underline-offset-4"  href="#">Услуги пешего курьера</a>  ................................................1 место</li> -->
                    <!-- <li class="mt-2 text-gray-500"><a class="hover:text-red-500 underline underline-offset-4"  href="#">Другая посылка</a>  ...............................................................1 место</li>
                    <li class="mt-2 text-gray-500"><a class="hover:text-red-500 underline underline-offset-4"  href="#">Срочная доставка</a>  ..........................................................1 место</li>
                    <li class="mt-2 text-gray-500"><a class="hover:text-red-500 underline underline-offset-4"  href="#">Доставка продуктов</a>  .....................................................1 место</li>
                    <li class="mt-2 text-gray-500"><a class="hover:text-red-500 underline underline-offset-4"  href="#">Купить и доставить</a>  .......................................................2 место</li>
                    <li class="mt-2 text-gray-500"><a class="hover:text-red-500 underline underline-offset-4"  href="#">Услуги курьера на легковом авто</a>  .........................4 место</li>
                    <li class="mt-2 text-gray-500"><a class="hover:text-red-500 underline underline-offset-4"  href="#">Доставка еды из ресторанов</a>(нет выполненных заданий) </li>
                    <li class="mt-2 text-gray-500"><a class="hover:text-red-500 underline underline-offset-4"  href="#">Курьер на день</a>(нет выполненных заданий)</li> -->
                  </ul>
               </div>
                @endif
              @endforeach
            </div>
        {{-- left sidebar end --}}

        {{-- right sidebar start --}}
            <div class="md:col-span-1 col-span-3  md:mx-2 mx-auto inline-block w-4/5 float-right right-20  h-auto">
                <div class="mt-16 border p-8 rounded-lg border-gray-300">
                    <div>
                        <h1 class="font-medium text-2xl">@lang('lang.exe_performer')</h1>
                        <p class="text-gray-400">@lang('lang.exe_since') {{date('d-m-Y', strtotime($user->created_at))}}</p>
                    </div>
                    <div class="">
                        <!-- <div class="flex w-full mt-4">
                            <div class="flex-initial w-1/4">
                                <i class="text-white far fa-file-image text-2xl bg-green-500 py-3 px-4 rounded-lg"></i>
                            </div>
                            <div class="flex-initial w-3/4 xl:ml-0 ml-8">
                                <h2 class="font-medium text-lg">Документы</h2>
                                <p>Документы проверены</p>
                            </div>
                        </div> -->
                        <div class="flex w-full mt-4">
                            <div class="flex-initial w-1/4">
                                <i class="fas fa-phone-alt py-1 px-2 text-2xl bg-amber-500 rounded-lg"></i>
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
                                <i class="text-white far fa-envelope text-2xl bg-blue-500 py-1 px-2 rounded-lg"></i>
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
                                <i class="text-white far fa-address-book text-2xl bg-blue-400 py-3 px-4 rounded-lg"></i>
                            </div>
                            <div class="flex-initial w-3/4 xl:ml-0 ml-8">
                                <h2 class="font-medium text-lg">Вконтакте</h2>
                                <p>Подтвержден</p>
                            </div>
                        </div> -->
                        <!-- <div class="flex w-full mt-4">
                            <div class="flex-initial w-1/4">
                                <i class=" fab fa-apple text-2xl bg-gray-400 text-white py-3 px-4 rounded-lg"></i>
                            </div>
                            <div class="flex-initial w-3/4 xl:ml-0 ml-8">
                                <h2 class="font-medium text-lg">Apple ID</h2>
                                <p>Подтвержден</p>
                            </div>
                        </div> -->
                    </div>
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
              <p class="my-4   text-center">
                @lang('lang.exe_createTFirst')
              </p>
            </div>
            <!--footer-->
            <div class="flex mx-auto items-center justify-end p-6 rounded-b mb-8">
                <div class="mt-4 ">
                    <a class="px-10 py-4 text-center font-sans  text-xl  font-semibold bg-green-500 text-white hover:bg-green-500  h-12 rounded-md text-xl" href="/categories/1" >@lang('lang.exe_createTask')</a>
                </div>
            </div>
          </div>
        </div>
      </div>
      <div class="hidden opacity-25 fixed inset-0 z-40 bg-black" id="modal-id12-backdrop"></div>
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
