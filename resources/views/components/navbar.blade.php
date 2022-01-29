<nav class="z-10 relative flex items-center xl:w-10/12 mx-auto lg:justify-start text-base" aria-label="Global">
    <div class="flex items-center flex-grow flex-shrink-0 lg:flex-grow-0">
      <!--  mobile menu -->
      <!-- <div class="flex justify-between w-11/12 items-center"> -->
        <nav class="relative w-2/12 lg:w-autopy-4 flex justify-start items-center bg-white md:ml-4">
            <div class="lg:hidden">
                <button class="navbar-burger flex items-center text-yellow-500 p-3">
                    <svg class="block h-4 w-4 fill-current" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <title>Mobile menu</title>

                        <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"></path>
                    </svg>
                </button>
            </div>
        </nav>
        <div class="flex justify-center w-10/12 md:w-full">
            <a class="logo cursor-pointer delete-task" href="/">
                <img src="/storage/{!!setting('site.logo')!!}" class="overflow-hidden h-14 lg:h-16 py-2" alt="" />
            </a>
        </div>
        @if (Route::has('login'))
            @auth
        <div class="w-2/12 flex justify-center lg:hidden">
          {{-- icon-1 --}}
          <div class=" float-left ml-8">
                <div class="w-4 h-4 absolute rounded-full bg-red-500 ml-3 text-white text-[12px] text-center">1</div>
              <button class="" type="button" data-dropdown-toggle="notification">
                  <i class="text-xl text-gray-500 hover:text-yellow-500 far fa-bell"></i>
              </button>
              <!-- Dropdown menu -->
              <div class="hidden bg-white text-base z-50 list-none divide-y divide-gray-100 rounded shadow my-4" id="notification">
                  <div class="px-4 py-3">
                      <span class="block text-base font-bold">@lang('lang.navbar_notif')</span>
                  </div>
                  <ul class="py-1" aria-labelledby="notification">
                      <li>
                          <a href="#" class="text-sm font-bold hover:bg-gray-100 text-gray-700 block px-4 py-2"> <i class="fas fa-star"></i>@lang('lang.navbar_justSetPass')</a>
                      </li>
                      <li>
                          <a href="#" class="delete-task text-sm hover:bg-gray-100 text-gray-700 block px-4 py-2">@lang('lang.navbar_settings')</a>
                      </li>
                      <li>
                          <a href="#" class="bg-slate-100 text-sm italic text-green-600 hover:text-red-600 underline decoration-dotted  block px-4 py-2">@lang('lang.navbar_markAsRead')</a>
                      </li>
                  </ul>
              </div>
          </div>
          <div class="ml-4">
              <a href="/chat">
                  <i class="text-xl text-gray-500 hover:text-yellow-500 far fa-comment-alt"></i>
              </a>
          </div>
        </div>
      <!-- </div> -->
      <script src="https://unpkg.com/@themesberg/flowbite@latest/dist/flowbite.bundle.js"></script>
      @endauth
  @endif


        <div class="navbar-menu relative z-50 hidden">
            <div class="navbar-backdrop fixed inset-0 bg-gray-800 opacity-25"></div>
            <nav class="fixed top-0 left-0 bottom-0 flex flex-col w-5/6 max-w-sm py-6 px-6 bg-white border-r overflow-y-auto">
                <div class="flex items-center mb-8">
                    <p class="mr-auto text-3xl font-bold leading-none" href="#">
                        <svg class="h-12" alt="logo" viewBox="0 0 10240 10240">
                        </svg>
                    </p>
                    <button class="navbar-close">
                        <svg class="h-6 w-6 text-gray-400 cursor-pointer hover:text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>
                <div>
                    <ul>
                      @if (Route::has('login'))
                          @auth
                            <li class="mb-1">
                                {{-- icon-2 --}}
                                <div class="max-w-lg mx-auto ml-6">
                                  <a href="/profile" class="delete-task cursor-pointer profiles">
                                    <button class="" type="button" data-dropdown-toggle="dropdownuser"><i class="text-2xl text-gray-500 hover:text-yellow-500  far fa-user"></i>
                                    </button>
                                  </a>
                                </div>
                            </li>
                          @endauth
                      @endif
                        <li class="mb-1">
                            <a href="/categories/1" class="delete-task block p-4 text-sm rounded  text-gray-500 hover:text-yellow-500">@lang('lang.navbar_createTask')</a>
                        </li>
                        <li class="mb-1">
                            <a href="{{ route('task.search') }}" class="block delete-task cursor-pointer p-4 text-sm rounded text-gray-500 hover:text-yellow-500">@lang('lang.navbar_findTask')</a>
                        </li>
                        <li class="mb-1">
                            <a href="/performers" class="delete-task cursor-pointer block p-4 text-sm rounded text-gray-500 hover:text-yellow-500">@lang('lang.navbar_perfs')</a>
                        </li>

                        @if (Route::has('login'))
                            @auth

                            <li class="mb-1">
                                <a href="{{ route('task.mytasks') }}" class="delete-task cursor-pointer block p-4 text-sm rounded text-gray-500 hover:text-yellow-500">@lang('lang.navbar_myTasks')</a>
                            </li>

                                   {{-- icon-3 --}}

                                <li class="">
                                    <div class="float-left mr-6">
                                        <a href="#" onclick="toggleModal()">
                                            <svg width="24" height="24" fill="none" xmlns="http://www.w3.org/2000/svg" class="ml-6 HeaderBalance_icon__2FeBY"><path fill-rule="evenodd" clip-rule="evenodd" d="M19 3.874c0-.953-.382-1.8-1.086-2.334-.7-.531-1.607-.667-2.488-.423h-.003L4.132 4.279a.973.973 0 00-.028.008c-1.127.35-1.986 1.287-2.093 2.563C2.004 6.9 2 6.95 2 7v11.344C2 20.334 3.608 22 5.607 22h12.785c2 0 3.608-1.666 3.608-3.657v-6.686c0-1.785-1.292-3.309-3-3.605V3.874zM4 18.343C4 19.265 4.748 20 5.607 20h12.785c.86 0 1.608-.735 1.608-1.657V16.25h-2a1.25 1.25 0 010-2.5h2v-2.093c0-.923-.748-1.657-1.608-1.657H4v8.343zM4 7.12c0 .507.41.88.813.88H17V3.874c0-.413-.153-.633-.294-.74-.145-.11-.391-.188-.746-.09h-.001L4.686 6.2c-.435.14-.686.46-.686.92z" fill="#5AB82E"></path></svg>
                                        </a>
                                    </div>
                                    <!-- language blog -->
                                    <div class="text-gray-500 mt-2">
                                      <div class="flex">
                                        <a href="{{route('lang', ['lang'=>'uz'])}}" class="hover:text-red-500 mr-2">
                                          UZ
                                        </a>
                                        I
                                        <a href="{{route('lang', ['lang'=>'ru'])}}" class="hover:text-red-500 ml-2">
                                          RU
                                        </a>
                                      </div>
                                    </div>
                                </li>

                                <div class="text-gray-500 hover:text-yellow-500 hover:border-yellow-500 relative top-32 block w-full left-0">
                                  <a href="{{ route('logout') }}" class="delete-task ml-4">@lang('lang.navbar_exit')</a>
                                </div>

                            @else
                            <div class="text-gray-500  relative top-60 block w-[400px] ml-4">
                              <a href="{{ route('login') }}"  class="delete-task border-b border-black border-dotted text-gray-500 hover:text-yellow-500 hover:border-yellow-500 ">@lang('lang.navbar_enter')</a> @lang('lang.navbar_or')
                              <a href="{{ route('register') }}"  class="delete-task border-b border-black border-dotted text-gray-500 hover:text-yellow-500 hover:border-yellow-500">@lang('lang.navbar_reg')</a>
                            </div>
                            @endauth
                        @endif
                </div>
            </nav>
        </div>
    </div>
    <div class="hidden w-7/12 lg:inline-block xl:ml-12 lg:ml-12 text-base">
        <div class="group inline-block mr-4">
            <button class="text-gray-500 hover:text-yellow-500 focus:outline-none">
                <span class="pr-1 flex-1">@lang('lang.navbar_createTask')</span>
                <span></span>
            </button>
            <ul class="bg-white border rounded-md transform scale-0 group-hover:scale-100 absolute transition duration-150 ease-in-out origin-top ">
                @foreach (\TCG\Voyager\Models\Category::withTranslations(['ru', 'uz'])->where('parent_id', null)->get() as $category)
                    <li class="py-2 px-4 rounded-sm hover:bg-gray-100">
                        <button class="w-full text-left flex items-center outline-none focus:outline-none">
                            <span class="pr-1 flex-1 font-semibold text-sm hover:text-blue-700">{{ $category->getTranslatedAttribute('name',Session::get('lang') , 'fallbackLocale') }}</span>
                            <span class="mr-auto">
                                <svg class="fill-current h-4 w-4 transition duration-150 ease-in-out" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                                </svg>
                            </span>
                        </button>
                        <ul class="bg-white border rounded-sm absolute h-full overflow-y-auto top-0 right-0 transition duration-150 ease-in-out origin-top-left w-100">

                            @foreach (\TCG\Voyager\Models\Category::withTranslations(['ru', 'uz'])->where('parent_id', $category->id)->get() as $category2)
                                <li class="rounded-sm">
{{--                                    <a class=" py-3 px-5 w-full block hover:bg-gray-100" href="/task/create?category_id={{ $category2->id }}">--}}
                                    <a class=" py-3 px-5 w-full block hover:bg-gray-100" href="{{route("task.create.name", ['category_id'=>$category2->id])}}">
                                        {{ $category2->getTranslatedAttribute('name',Session::get('lang') , 'fallbackLocale') }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </li>
                @endforeach
            </ul>
        </div>
        <style>
            /* since nested groupes are not supported we have to use
               regular css for the nested dropdowns
            */
            li>ul {
                transform: translatex(100%) scale(0)
            }
            li:hover>ul {
                transform: translatex(101%) scale(1)
            }
            li>button svg {
                transform: rotate(-90deg)
            }
            li:hover>button svg {
                transform: rotate(-270deg)
            }
            .group:hover .group-hover\:scale-100 {
                transform: scale(1)
            }
            .group:hover .group-hover\:-rotate-180 {
                transform: rotate(180deg)
            }
            .scale-0 {
                transform: scale(0)
            }
            .min-w-32 {
                min-width: 8rem
            }
        </style>
        <a href="{{ route('task.search') }}" class="cursor-pointer delete-task text-gray-500 hover:text-yellow-500 mr-4 text-[14px] xl:text-[16px] ">@lang('lang.navbar_findTask')</a>
        <a href="/performers" class="delete-task cursor-pointer text-gray-500 hover:text-yellow-500 text-[14px] mr-4 xl:text-[16px] ">@lang('lang.navbar_perfs')</a>
        @if (Route::has('login'))
            @auth
              <a href="{{ route('task.mytasks') }}" class="delete-task cursor-pointer text-gray-500 hover:text-yellow-500 text-[14px] xl:text-[16px] ">@lang('lang.navbar_myTasks')</a>
            @else
            @endauth
        @endif
    </div>
<?php
use App\Models\Notification;
use Illuminate\Support\Facades\Auth;
?>
    @if (Route::has('login'))
        @auth
    <div class="flex lg:inline-block hidden w-3/12 float-right">
                {{-- icon-1 --}}
                <div class="max-w-lg mx-auto float-left">
@php $count_for_not = 0; @endphp
@foreach(Notification::where('user_id', Auth::user()->id)->get() as $notification)

@php $count_for_not++; @endphp

@endforeach
                <div id="content_count" class="w-4 h-4 absolute rounded-full bg-red-500 ml-3 text-white text-xs text-center">{{$count_for_not}}</div>
                    <button class="" type="button" data-dropdown-toggle="dropdown"><i class="text-2xl mr-6 text-gray-500 hover:text-yellow-500 far fa-bell"></i>
                    </button>
                    <!-- Dropdown menu -->
                    <div class="hidden bg-white text-base z-50 list-none divide-y divide-gray-100 rounded shadow my-4" id="dropdown">
                        <div class="px-4 py-3">
                            <span class="block text-base font-bold">@lang('lang.navbar_notif')</span>
                        </div>
                        <ul class="py-1" aria-labelledby="dropdown">

@foreach(Notification::where('user_id', Auth::user()->id)->get() as $notification)
@if($notification->type == 1)
                            <li>
                                <a href="/detailed-tasks/{{$notification->task_id}}" class="text-sm font-bold hover:bg-gray-100 text-gray-700 block px-4 py-2">{{$notification->name_task}}</a>
                            </li>
@elseif($notification->type == 2)
                            <li>
                                <a href="/detailed-tasks/{{$notification->task_id}}" class="text-sm font-bold hover:bg-gray-100 text-gray-700 block px-4 py-2">У вас новый отклик</a>
                            </li>
@elseif($notification->type == 3)
                            <li>
                                <a href="/detailed-tasks/{{$notification->task_id}}" class="text-sm font-bold hover:bg-gray-100 text-gray-700 block px-4 py-2">Вы получили задание</a>
                            </li>
@elseif($notification->type == 4)
                            <li>
                                <a href="/detailed-tasks/{{$notification->task_id}}" class="text-sm font-bold hover:bg-gray-100 text-gray-700 block px-4 py-2">{{$notification->task_name}}</a>
                            </li>
@endif
@endforeach

<div id="for_append_notifications"></div>

                            <li>
                                <a href="#" class="text-sm font-bold hover:bg-gray-100 text-gray-700 block px-4 py-2"> <i class="fas fa-star"></i>@lang('lang.navbar_justSetPass')</a>
                            </li>
                            <li>
                                <a href="#" class="text-sm hover:bg-gray-100 text-gray-700 block px-4 py-2">@lang('lang.navbar_settings')</a>
                            </li>
                            <li>
                                <a href="#" class="bg-slate-100 text-sm italic text-green-600 hover:text-red-600 underline decoration-dotted  block px-4 py-2">@lang('lang.navbar_markAsRead')</a>
                            </li>
                        </ul>
                    </div>
                </div>

                {{-- icon-3 --}}
                <div class=" float-left">
                    <a class="delete-task" href="/chat">
                        <i class=" text-2xl text-gray-500 hover:text-yellow-500 far fa-comment-alt"></i>
                    </a>
                </div>

                <div class="float-left">
                    <a href="#" onclick="toggleModal()">
                        <svg width="24" height="24" fill="none" xmlns="http://www.w3.org/2000/svg" class="ml-6 mt-1 HeaderBalance_icon__2FeBY"><path fill-rule="evenodd" clip-rule="evenodd" d="M19 3.874c0-.953-.382-1.8-1.086-2.334-.7-.531-1.607-.667-2.488-.423h-.003L4.132 4.279a.973.973 0 00-.028.008c-1.127.35-1.986 1.287-2.093 2.563C2.004 6.9 2 6.95 2 7v11.344C2 20.334 3.608 22 5.607 22h12.785c2 0 3.608-1.666 3.608-3.657v-6.686c0-1.785-1.292-3.309-3-3.605V3.874zM4 18.343C4 19.265 4.748 20 5.607 20h12.785c.86 0 1.608-.735 1.608-1.657V16.25h-2a1.25 1.25 0 010-2.5h2v-2.093c0-.923-.748-1.657-1.608-1.657H4v8.343zM4 7.12c0 .507.41.88.813.88H17V3.874c0-.413-.153-.633-.294-.74-.145-.11-.391-.188-.746-.09h-.001L4.686 6.2c-.435.14-.686.46-.686.92z" fill="#5AB82E"></path></svg>
                    </a>
                </div>


                {{-- icon-2 --}}
                <div class="max-w-lg ml-5 float-left">
                    <button class="" type="button" data-dropdown-toggle="dropdowndesk"><i class="text-2xl text-gray-500 hover:text-yellow-500  far fa-user"></i>
                    </button>
                    <!-- Dropdown menu -->
                    <div class="hidden bg-white text-base z-50 list-none divide-y divide-gray-100 rounded shadow my-4" id="dropdowndesk">
                        <ul class="py-1" aria-labelledby="dropdowndesk">
                            <li>
                                <a href="/profile" class="delete-task cursor-pointer text-sm hover:bg-gray-100 text-gray-700 block px-4 py-2">@lang('lang.navbar_profile')</a>
                            </li>
                            <li>
                                <a href="/profile/settings" class="delete-task cursor-pointer text-sm hover:bg-gray-100 text-gray-700 block px-4 py-2">@lang('lang.navbar_set')</a>
                            </li>
                            <li>
                                <a href="{{ route('logout') }}" class="delete-task text-sm hover:bg-gray-100 text-gray-700 block px-4 py-2">@lang('lang.navbar_exit')</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- language blog -->
            <div class="flex justify-center text-gray-500 hidden lg:block">
              <div class="flex">
                  @if (session('lang') == 'uz')
                  <a href="{{route('lang', ['lang'=>'uz'])}}" class="text-red-500 hover:text-gray-500 mr-2">
                    O'Z
                  </a>
                  I
                  <a href="{{route('lang', ['lang'=>'ru'])}}" class="hover:text-red-500 ml-2">
                    RU
                  </a>
                  @else
                  <a href="{{route('lang', ['lang'=>'uz'])}}" class="hover:text-red-500 mr-2">
                     UZ
                  </a>
                  I
                  <a href="{{route('lang', ['lang'=>'ru'])}}" class="text-red-500 hover:text-gray-500-500 ml-2">
                    RU
                  </a>
                  @endif
              </div>
            </div>



        @else
            <div class="w-[400px] text-right inline-block float-right md:float-none mt-6 mb-6 lg:block hidden mr-4 text-base">
                <a href="{{ route('login') }}"  class="delete-task border-b border-black border-dotted text-gray-500 hover:text-yellow-500 hover:border-yellow-500 ">@lang('lang.navbar_enter')</a> @lang('lang.navbar_or')
                <a href="{{ route('register') }}"  class="delete-task border-b border-black border-dotted text-gray-500 hover:text-yellow-500 hover:border-yellow-500">@lang('lang.navbar_reg')</a>
            </div>
            <!-- language blog -->
            <div class="flex justify-center text-gray-500 hidden lg:block">
                <div class="flex">
                    @if (session('lang') == 'uz')
                    <a href="{{route('lang', ['lang'=>'uz'])}}" class="text-red-500 hover:text-gray-500 mr-2">
                       O'Z
                    </a>
                    I
                    <a href="{{route('lang', ['lang'=>'ru'])}}" class="hover:text-red-500 ml-2">
                      RU
                    </a>
                    @else
                    <a href="{{route('lang', ['lang'=>'uz'])}}" class="hover:text-red-500 mr-2">
                      UZ
                    </a>
                    I
                    <a href="{{route('lang', ['lang'=>'ru'])}}" class="text-red-500 hover:text-gray-500-500 ml-2">
                      RU
                    </a>
                    @endif
                  </div>
            </div>
        @endauth
    @endif
</nav>


{{-- pay modal start --}}
<div class="hidden overflow-x-auto overflow-y-auto fixed inset-0 z-50 outline-none focus:outline-none justify-center items-center" id="modal-id">
    {{-- 1 --}}
    <div class="relative w-auto my-6 mx-auto max-w-3xl" id="modal11">
        <div class="border-0 rounded-lg shadow-2xl px-10 relative flex mx-auto flex-col w-full bg-white outline-none focus:outline-none">
            <div class=" text-center p-6  rounded-t">
                <button type="submit"  onclick="toggleModal()" class="rounded-md w-100 h-16 absolute top-1 right-4">
                    <i class="fas fa-times  text-slate-400 hover:text-slate-600 text-xl w-full"></i>
                </button>
                <h3 class="font-medium text-3xl block mt-6">
                    @lang('lang.navbar_howMuch')
                </h3>
            </div>
            <div class="text-center h-64">
                <div class="w-1/3 mx-auto h-16 border-b" id="demo" onclick="borderColor()">
                    <input class="focus:outline-none  w-full h-full text-4xl text-center focus:outline-none" maxlength="7" minlength="3" id="myText" oninput="inputFunction()" onkeypress='validate(event)' type="text" value="4000">
                </div>
                <p class="text-sm mt-2 leading-6 text-gray-400">@lang('lang.navbar_minimum')</p>

                <!-- <div class="mt-8"> -->
                    <!-- <input type="checkbox" id="myCheck" onclick="checkFunction()"  class="w-5 h-5 rounded-md inline-block " /> -->
                    <!-- <p class="text-md inline-block ml-2">Оформить полис на 7 дней за 10000 UZS</p> -->
                <!-- </div> -->


                <div class="mt-16">
                    <a onclick="toggleModal1()" class="px-10 py-4 font-sans  text-xl  font-semibold bg-green-500 text-white hover:bg-green-500  h-12 rounded-md text-xl" id="button" href="#" >@lang('lang.navbar_toPayment')</a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="hidden opacity-25 fixed inset-0 z-40 bg-black" id="modal-id-backdrop"></div>
{{-- 2 --}}
<div class="hidden overflow-x-auto overflow-y-auto fixed inset-0 z-50 outline-none focus:outline-none justify-center items-center" id="modal-id1">
    <div class="relative w-auto my-6 mx-auto max-w-3xl">
        <div class="border-2 shadow-2xl rounded-lg bg-gray-100 relative flex flex-col w-5/6 mx-auto mt-16 bg-white outline-none focus:outline-none">
            <div class=" text-center p-6  rounded-t">
                <button type="submit"  onclick="toggleModal1()" class="rounded-md w-100 h-16 absolute top-1 right-4">
                    <i class="fas fa-times  text-slate-400 hover:text-slate-600 text-xl w-full"></i>
                </button>
                <h3 class="font-medium text-3xl block mt-6">
                    @lang('lang.navbar_paymentWay')
                </h3>
            </div>

            <div class="container mb-12">
                <form action="/ref" method="GET">
                    <input type="hidden" name="user_id" value="1">
                    <div class="my-3 w-1/2 mx-auto">
                        <div class="custom-control custom-radio mb-4 text-3xl flex flex-row">
                            <input id="credit" onclick="doBlock()" name="paymethod" type="radio" value="PayMe" class="custom-control-input mt-5 w-4 h-4 ">
                            <button type="button" class=" w-52 focus:border-2 focus:border-dashed focus:border-green-500 mx-8" name="button"><label for="credit"><img src="https://cdn.paycom.uz/documentation_assets/payme_01.png" alt=""></label> </button>
                        </div>
                        <div class="custom-control custom-radio my-8 text-3xl flex flex-row">
                          <input id="debit" onclick="doBlock()" name="paymethod" value="Click" type="radio" class="custom-control-input mt-8 w-4 h-4 ">
                          <button type="button" class=" w-52 focus:border-2 focus:border-dashed focus:border-green-500 mx-8" name="button"><label for="debit"><img src="https://docs.click.uz/wp-content/themes/click_help/assets/images/logo.png" alt=""></label> </button>
                        </div>
                        <div class="custom-control custom-radio mb-4 text-3xl flex flex-row">
                            <input id="debit1" onclick="doBlock()" name="paymethod" value="Paynet" type="radio" class="custom-control-input mt-5 w-4 h-4 ">
                            <button type="button" class=" w-52 focus:border-2 focus:border-dashed focus:border-green-500 mx-8" name="button"><label for="debit1"><img src="https://paynet.uz/medias/article/big/134/logo-paynet.png" alt=""></label> </button>
                        </div>
                        <div class="d-none input-group my-5" id="forhid">
                            <input id="amount_u" type="hidden" name="amount" class="form-control">
                        </div>
                    </div>
                    <div class="text-center mt-8">
                        <button type="submit" class="bg-green-500 hover:bg-green-700 text-white text-2xl font-bold py-3 px-8 rounded">@lang('lang.navbar_payment')</button>
                    </div>
                  </form>
            </div>
        </div>
    </div>
</div>

<div class="hidden opacity-25 fixed inset-0 z-40 bg-black" id="modal-id-backdrop"></div>
<div class="hidden opacity-25 fixed inset-0 z-40 bg-black" id="modal1-id-backdrop"></div>
@if(Auth::user() !== NULL)

@php

$array_cats_user = Auth::user()->category_id;
$user = Auth::user()->id;

@endphp

<script src="https://js.pusher.com/7.0/pusher.min.js"></script>
  <script>

    // Enable pusher logging - don't include this in production
    Pusher.logToConsole = true;

    var pusher = new Pusher('1f89b665267dfe7451d6', {
      cluster: 'ap2'
    });

    var channel = pusher.subscribe('my-channel');
    channel.bind('my-event', function(data) {

        if(Number(data["type"]) === 1){

        const for_check_cat_id = [<? echo $array_cats_user ?>];

        let num_cat_id = Number(data["id_cat"]);

        let check_arr = for_check_cat_id.includes(num_cat_id);

if(check_arr === true){
   var content_count = document.getElementById('content_count').innerHTML;
   let count_for_inner = Number(content_count) + 1;
   document.getElementById('content_count').innerHTML = count_for_inner;

   let el_for_create = document.getElementById('for_append_notifications');

   el_for_create.insertAdjacentHTML('afterend', `
<li>
<a href="/detailed-tasks/`+ Number(data["id_task"]) +`" class="text-sm font-bold hover:bg-gray-100 text-gray-700 block px-4 py-2">`+ data["title_task"] +`</a>
</li>
 `);

}

    }

    if(Number(data["type"]) === 2){

  let user_id_for_js2 = Number(<? echo $array_cats_user ?>);

  if(user_id_for_js2 === Number(data["user_id_fjs"])){
   var content_count = document.getElementById('content_count').innerHTML;
   let count_for_inner = Number(content_count) + 1;
   document.getElementById('content_count').innerHTML = count_for_inner;

   let el_for_create = document.getElementById('for_append_notifications');

   el_for_create.insertAdjacentHTML('afterend', `
<li>
<a href="/detailed-tasks/`+ Number(data["id_task"]) +`" class="text-sm font-bold hover:bg-gray-100 text-gray-700 block px-4 py-2">У вас новый отклик</a>
</li>
 `);

}

    }
    if(Number(data["type"]) === 3){

        let user_id_for_js3 = Number(<? echo $array_cats_user ?>);

if(user_id_for_js3 === Number(data["user_id_fjs"])){
 var content_count = document.getElementById('content_count').innerHTML;
 let count_for_inner = Number(content_count) + 1;
 document.getElementById('content_count').innerHTML = count_for_inner;

 let el_for_create = document.getElementById('for_append_notifications');

 el_for_create.insertAdjacentHTML('afterend', `
<li>
<a href="/detailed-tasks/`+ Number(data["id_task"]) +`" class="text-sm font-bold hover:bg-gray-100 text-gray-700 block px-4 py-2">Вы получили задание</a>
</li>
`);

}

    }
    if(Number(data["type"]) === 4){

    const for_check_cat_id = [<? echo $user ?>];

    let num_cat_id = Number(data["user_id"]);

    let check_arr = for_check_cat_id.includes(num_cat_id);

if(check_arr === true){
    var content_count = document.getElementById('content_count').innerHTML;
    let count_for_inner = Number(content_count) + 1;
    document.getElementById('content_count').innerHTML = count_for_inner;

    let el_for_create = document.getElementById('for_append_notifications');

el_for_create.insertAdjacentHTML('afterend', `
<li>
<a href="/detailed-tasks/`+ Number(data["task_id"]) +`" class="text-sm font-bold hover:bg-gray-100 text-gray-700 block px-4 py-2">`+ data["task_name"] +`</a>
</li>
`);

}

}

    });
  </script>
@endif

<script type="text/javascript">
    function toggleModal(){
        document.getElementById("modal-id").classList.toggle("hidden");
        document.getElementById("modal-id" + "-backdrop").classList.toggle("hidden");
        document.getElementById("modal-id").classList.toggle("flex");
        document.getElementById("modal-id" + "-backdrop").classList.toggle("flex");
    }
    function toggleModal1(){
        var element = document.getElementById("modal-id-backdrop");
        element.classList.add("hidden");
        var element2 = document.getElementById("modal-id");
        var b = document.getElementById("myText").value;
        var u = document.getElementById("amount_u");
        u.value = b;
        element2.classList.add("hidden");
        document.getElementById("modal-id1").classList.toggle("hidden");
        document.getElementById("modal-id1" + "-backdrop").classList.toggle("hidden");
        document.getElementById("modal-id1").classList.toggle("flex");
        document.getElementById("modal-id1" + "-backdrop").classList.toggle("flex");
    }
    function borderColor() {
        var element = document.getElementById("demo");
        element.classList.add("border-amber-500");
    }
    function inputFunction() {
        var x = document.getElementById("myText").value;
        if(x < 4000){
            document.getElementById('button').removeAttribute("onclick");
            document.getElementById('button').classList.remove("bg-green-500");
            document.getElementById('button').classList.add("bg-gray-500");
            document.getElementById('button').classList.remove("hover:bg-green-500");
            document.getElementById("button").innerHTML ="К оплате " + x +"UZS";
        }else{
            document.getElementById('button').setAttribute("onclick","toggleModal1();");
            document.getElementById('button').classList.remove("bg-gray-500");
            document.getElementById('button').classList.add("bg-green-500");
            document.getElementById('button').classList.add("hover:bg-green-500");
            document.getElementById("button").innerHTML ="К оплате " + x +"UZS";
        }
    }
    function checkFunction() {
        var x = document.getElementById("myText").value;
        var checkBox = document.getElementById("myCheck");
        if (checkBox.checked == true){
            document.getElementById("button").innerHTML ="К оплате " + (parseInt(x) + 10000);
        } else {
            document.getElementById("button").innerHTML ="К оплате " + x  +"UZS";
        }
    }
    function validate(evt) {
        var theEvent = evt || window.event;
        // Handle paste
        if (theEvent.type === 'paste') {
            key = event.clipboardData.getData('text/plain');
        } else {
            // Handle key press
            var key = theEvent.keyCode || theEvent.which;
            key = String.fromCharCode(key);
        }
        var regex = /[0-9]|\./;
        if( !regex.test(key) ) {
            theEvent.returnValue = false;
            if(theEvent.preventDefault) theEvent.preventDefault();
        }
    }
</script>
{{-- pay modal end --}}

<script>
    // Burger menus
    document.addEventListener('DOMContentLoaded', function() {
        // open
        const burger = document.querySelectorAll('.navbar-burger');
        const menu = document.querySelectorAll('.navbar-menu');
        if (burger.length && menu.length) {
            for (var i = 0; i < burger.length; i++) {
                burger[i].addEventListener('click', function() {
                    for (var j = 0; j < menu.length; j++) {
                        menu[j].classList.toggle('hidden');
                    }
                });
            }
        }
        // close
        const close = document.querySelectorAll('.navbar-close');
        const backdrop = document.querySelectorAll('.navbar-backdrop');
        if (close.length) {
            for (var i = 0; i < close.length; i++) {
                close[i].addEventListener('click', function() {
                    for (var j = 0; j < menu.length; j++) {
                        menu[j].classList.toggle('hidden');
                    }
                });
            }
        }
        if (backdrop.length) {
            for (var i = 0; i < backdrop.length; i++) {
                backdrop[i].addEventListener('click', function() {
                    for (var j = 0; j < menu.length; j++) {
                        menu[j].classList.toggle('hidden');
                    }
                });
            }
        }
    });


    if (document.getElementById('credit').checked) {
      alert('Hello');
    }
</script>

    <script >
            var link = document.location.href.split('/');
            if(link[3] == 'task'){

        $('.delete-task').on('click', function () {

        let for_del_task_in = $(this).attr("href");
       // console.log(for_del_task_in);
		$(this).removeAttr('href');
        Swal.fire({
            title: '@lang('lang.name_deleteAsk')',
            showDenyButton: true,
            confirmButtonText: '@lang('lang.name_continue')',
            denyButtonText: '@lang('lang.name_delete')',
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = document.location.href;
            } else if (result.isDenied) {
if(var_for_id_task != null){
$.ajax({
	url: '/for_del_new_task/'+ var_for_id_task +'',
	method: 'get',
});
}
              window.location.href = for_del_task_in;
                return false;
            }
        });

	    });

            }
    </script>

@section("javascript")

@endsection
