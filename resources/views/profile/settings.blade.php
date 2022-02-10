@extends("layouts.app")

@section("content")

    <div class="w-11/12  mx-auto text-base mt-4">

        <div class="block md:hidden float-right -mr-8 text-gray-500">
            <i class="far fa-eye"> {{$views}}  @lang('lang.profile_view')</i>
        </div>
        <div class="grid lg:grid-cols-3 grid-cols-2 lg:w-5/6 w-full mx-auto">


            {{-- user ma'lumotlari --}}
            <div class="md:col-span-2 col-span-3 px-2 mx-3">
                <figure class="w-full">
                    <div class="hidden md:block float-right mr-8 text-gray-500">
                        <i class="far fa-eye"> {{$views}}  @lang('lang.profile_view')</i>
                    </div>
                    <br>
                    <h2 class="font-bold text-2xl text-gray-800 mb-2">@lang('lang.cash_hello'), {{$user->name}}!</h2>
                    <div class="flex flex-row mt-6">
                        <div class="sm:w-1/3 w-full">
                            <img class="border border-3 border-gray-400 h-40 w-40"
                                 @if ($user->avatar == Null)
                                 src='{{asset("storage/images/default.jpg")}}'
                                 @else
                                 src="{{asset("storage/{$user->avatar}")}}"
                                 @endif alt="">
                            <form action="{{route('update.photo')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="rounded-md bg-gray-200 w-40 mt-2 py-1 text-base" type="button">
                                    <input type="file" id="file" name="avatar" onclick="fileupdate()" class="hidden">
                                    <label for="file" class="p-1">
                                        <i class="fas fa-camera"></i>
                                        <span>@lang('lang.cash_changeImg')</span>
                                    </label>
                                </div>
                                <div class="rounded-md bg-green-400 w-40 hidden mt-3 py-1" type="button" id="buttons"
                                     onclick="fileadd()">
                                    <input type="submit" id="sub1" class="hidden">
                                    <label for="sub1" class="p-1">
                                        <i class="fas fa-save"></i>
                                        <span>@lang('lang.cash_addImg')</span>
                                    </label>
                                </div>
                            </form>
                        </div>

                        <div class="sm:w-2/3 w-full text-base text-gray-500 ml-4">
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
                                <p class="inline-block text-m">
                                    @if($user->location!="")
                                        <i class="fas fa-map-marker-alt"></i>
                                        @lang('lang.cash_city') {{$user->location}}
                                    @else @lang('lang.cash_cityNotGiven')
                                    @endif
                                </p>
                            </span>
                            <p class="mt-2">@lang('lang.cash_created') <a href="#">
                                <span>
                                    {{count($user->tasks??[])}}
                                </span> @lang('lang.cash_task')</a></p>
                            {{-- <p class="mt-4">@lang('lang.cash_rate'): 3.6 </p> --}}
                            <div class="flex mt-6">
                                <div data-tooltip-target="tooltip-animation_1" class="mx-4 tooltip-1">
                                    <img @if ($user->is_email_verified !== Null && $user->is_phone_number_verified !== Null)
                                         src="{{ asset('images/verify.png') }}"
                                         @else
                                         src="{{ asset('images/verify_gray.png') }}"
                                         @endif  alt="" class="w-24">
                                    <div id="tooltip-animation_1" role="tooltip" class="inline-block sm:w-2/12 w-1/2 absolute invisible z-10 py-2 px-3 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-sm opacity-0 transition-opacity duration-300 tooltip dark:bg-gray-700">
                                        <p class="text-center">
                                            @if ($user->is_email_verified !== Null && $user->is_phone_number_verified !== Null)
                                                @lang('lang.profile_icon_verify')
                                            @else
                                                @lang('lang.profile_icon_not_verify')
                                            @endif
                                        </p>
                                        <div class="tooltip-arrow" data-popper-arrow></div>
                                    </div>
                                </div>
                                @if($user->role_id == 2)
                                    @foreach($about as $rating)
                                        @if($rating->id == $user->id)
                                            <div data-tooltip-target="tooltip-animation_2" class="mx-4 tooltip-2" >
                                                <img src="{{ asset('images/best.png') }}"alt="" class="w-24">
                                                <div id="tooltip-animation_2" role="tooltip" class="inline-block  sm:w-2/12 w-1/2 absolute invisible z-10 py-2 px-3 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-sm opacity-0 transition-opacity duration-300 tooltip dark:bg-gray-700">
                                                    <p class="text-center">
                                                        @lang('lang.profile_icon_best')
                                                    </p>
                                                    <div class="tooltip-arrow" data-popper-arrow></div>
                                                </div>
                                            </div>
                                        @else
                                            @continue
                                        @endif
                                    @endforeach
                                    <div data-tooltip-target="tooltip-animation_3" class="mx-4" >
                                        @if($task_count >= 50)
                                            <img src="{{ asset('images/50.png') }}" alt="" class="w-24">
                                        @else
                                            <img src="{{ asset('images/50_gray.png') }}" alt="" class="w-24">
                                        @endif
                                        <div id="tooltip-animation_3" role="tooltip" class="inline-block  sm:w-2/12 w-1/2 absolute invisible z-10 py-2 px-3 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-sm opacity-0 transition-opacity duration-300 tooltip dark:bg-gray-700">
                                            <p class="text-center">
                                                @lang('lang.profile_icon_50')
                                            </p>
                                            <div class="tooltip-arrow" data-popper-arrow></div>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </figure>
                {{-- user ma'lumotlari tugashi --}}
                <div class="content mt-20 ">
                    <div class="grid grid-cols-10">
                        <ul class=" md:col-span-9 col-span-10 md:items-left sitems-center">
                            <li class="inline md:mr-5 mr-1"><a href="/profile"
                                                               class=" text-[14px] md:text-[18px] text-gray-600">@lang('lang.cash_aboutMe')</a>
                            </li>
                            <li class="inline md:mr-5 mr-1"><a href="/profile/cash"
                                                               class=" text-[14px] md:text-[18px] text-gray-600">@lang('lang.cash_check')</a>
                            </li>
                            <li class="inline md:mr-5 mr-1 md:hidden block"><a href="/profile/settings"
                                                                               class="md:text-[18px] text-[14px] text-gray-700"
                                                                               id="settingsText">@lang('lang.cash_settings')</a>
                            </li>

                        </ul>
                        <div class="md:col-span-1 md:block hidden" id="settingsIcon"><a href="/profile/settings"><i
                                        class="fas fa-user-cog text-3xl text-gray-700"></i></a></div>
                    </div>

                    <hr>


                    {{-- settings start --}}
                    <div class="w-full text-base">
                        <!-- settings form TABS -->
                        <div class="w-full mx-auto mt-4  rounded">
                            <!-- Tabs -->
                            <ul id="tabs" class="md:inline-flex block w-full flex-center px-1 pt-2">
                                <li class="xl:px-4 md:px-2 py-2 tab-name md:ring-0 w-full md:w-inherit font-semibold text-gray-800 border-b-2 border-blue-400 opacity-50">
                                    <a id="default-tab"
                                       href="#first">@lang('lang.settings_allSettings')</a></li>
                                <li class="xl:px-4 md:px-2 py-2  tab-name md:ring-0 w-full md:w-inherit font-semibold text-gray-800 opacity-50">
                                    <a href="#second" >@lang('lang.settings_notifs')</a></li>
                                <li class="xl:px-2 md:px-2 py-2 tab-name md:ring-0 w-full md:w-inherit font-semibold text-gray-800 opacity-50">
                                    <a href="#third">@lang('lang.settings_subscribeOnTask')</a></li>
                                <li class="xl:px-4 md:px-2 tab-name py-2  @if($errors->has('password')) error  @endif  md:ring-0 w-full md:w-inherit font-semibold text-gray-800 opacity-50">
                                    <a href="#fourth" >@lang('lang.settings_security')</a></li>
                            </ul>

                            <!-- Tab Contents -->
                            <div id="tab-contents" class="w-full">
                                <div id="first" class="p-4 tab-pane w-full">
                                    {{-- settings/ first tab -> base settings start --}}
                                    <div class="flex justify-left w-full">
                                        <div class="md:w-3/5 w-full md:m-4 m-0">
                                            <h1 class="block w-3/5 text-left text-gray-800 text-3xl font-bold mb-6">@lang('lang.settings_personalData')</h1>
                                            <form action="{{route('updateData')}}" class="w-full" method="POST">
                                                @csrf
                                                <div class="w-full mb-4">
                                                    <label class="mb-2 text-md md:block text-gray-400"
                                                           for="name">@lang('lang.settings_name')</label>
                                                    <input
                                                            class="focus:outline-none  rounded-xl border py-2 px-3 w-full text-grey-900"
                                                            type="text" name="name" id="name"
                                                            value="{{$user->name??old('email')}}"
                                                            required>
                                                    @error('name')
                                                    <p class="text-red-500">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                                <div class="w-full block w-full mb-4">
                                                    <label class="mb-2 text-md md:block text-gray-400"
                                                           for="email">Email</label>
                                                    <input
                                                            class="focus:outline-none  rounded-xl border py-2 px-3 w-full text-grey-900"
                                                            type="email" name="email" id="email"
                                                            value="{{ $user->email??old('email')}}">
                                                    @error('email')
                                                    <p class="text-red-500">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                                <div class="w-full block w-full mb-4">
                                                    <label class="mb-2 text-md md:block text-gray-400"
                                                           for="phone_number">@lang('lang.settings_phone')</label>
                                                    <input
                                                            class="focus:outline-none  rounded-xl border py-2 px-3 w-full text-grey-900"
                                                            type="text" id="phone_number"
                                                            @if (!$user->phone_number) placeholder="+998(00)000-00-00"
                                                            @else
                                                            value="+998{{$user->phone_number}}"
                                                            @endif >
                                                    @error('phone_number')
                                                    <p class="text-red-500">{{ $message }}</p>
                                                    @enderror
                                                    <input type="hidden" name="phone_number"
                                                           value="{{$user->phone_number}}" id="phone">
                                                </div>
                                                <div class="w-full block w-full mb-4">
                                                    <label class="mb-2 text-md md:block text-gray-400"
                                                           for="age">@lang('lang.settings_age')</label>
                                                    <input
                                                            class="focus:outline-none  rounded-xl border py-2 px-3 w-full text-grey-900"
                                                            min="18" type="number" name="age" id="age"
                                                            value="{{$user->age}}">
                                                    @error('age')
                                                    <p class="text-red-500">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                                <div class="w-full block w-full mb-4">
                                                    <label class="mb-2 text-md md:block text-gray-400"
                                                           for="textarea">@lang('lang.settings_otherSet')</label>
                                                    <textarea class="border rounded-xl py-2 px-3 w-full text-grey-900 outline-none"
                                                              name="description"
                                                              id="textarea">{{old('description')??$user->description}}</textarea>
                                                    @error('description')
                                                    <p class="text-red-500">{{ $message }}</p>
                                                    @enderror

                                                </div>
                                                <div class="w-full block w-full mb-4">
                                                    <label class="mb-2 text-md md:block text-gray-400"
                                                           for="location">@lang('lang.settings_city')</label>
                                                    <select class="border rounded-xl py-2 px-3 w-full text-grey-900 outline-none"
                                                            name="location">
                                                        <option value="">@lang('lang.settings_choose')</option>

                                                        @foreach($regions as $region)
                                                            <option
                                                                    value="{{$region->getTranslatedAttribute('name',Session::get('lang') , 'fallbackLocale')}}" {{$region->getTranslatedAttribute('name',Session::get('lang') , 'fallbackLocale') == $user->location??old('location') ? 'selected' : null}}>{{$region->getTranslatedAttribute('name',Session::get('lang') , 'fallbackLocale')}}</option>
                                                        @endforeach

                                                    </select>

                                                    @error('location')
                                                    <p class="text-red-500">{{ $message }}</p>
                                                    @enderror

                                                </div>
                                                <input type="submit"
                                                       class="block xl:w-3/5 lg:w-3/4 sm:w-3/5 w-full text-center bg-green-400 hover:bg-green-600 text-white uppercase p-4 rounded-xl mb-5"
                                                       name="submit1" value="@lang('lang.settings_save')">
                                                <hr>
                                            </form>

                                            <a href="{{ route('users.delete', $user->id) }}" onclick="ConfirmDelete()"
                                               class="block xl:w-3/5 lg:w-3/4 sm:w-3/5 w-full text-center bg-red-400 hover:bg-red-600 text-white mt-5 uppercase p-4 rounded-xl">@lang('lang.settings_profile')</a>
                                        </div>
                                    </div>
                                    {{-- settings/ first tab -> base settings end--}}
                                </div>
                                <div id="second" class="hidden tab-pane tab-pane p-4">
                                    {{-- settings/ second tab -> enable notification start --}}
                                    <div class="md:w-4/5 w-full mt-5">
                                        <h3 class="font-bold text-3xl">@lang('lang.settings_takeNotif')</h3>
                                        <div class="grid grid-cols-10 mt-5">
                                            <input type="checkbox" class="w-5 h-5 col-span-1 my-auto mx-auto"/>
                                            <span class="col-span-9 ml-2">@lang('lang.settings_systemNotif')</span>
                                        </div>
                                        <div class="grid grid-cols-10 mt-5">
                                            <input type="checkbox" class="w-5 h-5 col-span-1 my-auto mx-auto"/>
                                            <span class="col-span-9 ml-2">@lang('lang.settings_wantNews')</span>
                                        </div>
                                        <button
                                                class="block  md:w-1/2 w-full mt-10 bg-green-400 hover:bg-green-600 text-white uppercase p-4 rounded-xl"
                                                type="submit">@lang('lang.settings_save')</button>
                                    </div>
                                    {{-- settings/ second tab -> enable notification end --}}
                                </div>
                                <div id="third" class="hidden tab-pane tab-pane p-4">
                                    {{-- settings/ third tab start -> subscribe for some tasks --}}
                                    <div class="sm:w-4/5 w-full mt-10">
                                        <h3 class="font-bold text-3xl mb-7">1. @lang('lang.settings_chooseCat')</h3>
                                        {{-- choosing categories --}}
                                        <form action="{{route('get.category')}}" method="post">
                                            @csrf
                                            <div class="acordion mt-16">
                                                @foreach ($categories as $category )

                                                    <div class="mb-4 rounded-md border shadow-md">
                                                        <div
                                                                class="accordion text-gray-700 cursor-pointer p-[18px] w-full text-left text-[15px]">
                                                            {{ $category->getTranslatedAttribute('name',Session::get('lang') , 'fallbackLocale') }}
                                                        </div>
                                                        <div
                                                                class="panel overflow-hidden hidden px-[18px] bg-white p-2">
                                                            @foreach (\TCG\Voyager\Models\Category::query()->where('parent_id', $category->id)->get() as $category2)
                                                                <label class="block">
                                                                    @php
                                                                        $cat_arr = explode(",",$user->category_id);
                                                                        $res_c_arr = array_search($category2->id,$cat_arr);
                                                                        //dd($res_c_arr);
                                                                    @endphp
                                                                    <input type="checkbox"
                                                                           @if($res_c_arr !== false) checked
                                                                           @endif name="category[]"
                                                                           value="{{$category2->id}}"
                                                                           class="mr-2 required:border-yellow-500">{{ $category2->getTranslatedAttribute('name',Session::get('lang') , 'fallbackLocale') }}
                                                                </label>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                            <input
                                                    class="focus:outline-none  block md:w-3/5 w-full text-center bg-green-400 hover:bg-green-600 text-white uppercase p-4 rounded-xl mb-5"
                                                    type="submit" name="submit" value="@lang('lang.settings_save')">
                                        </form>
                                        <script>
                                            var acc = document.getElementsByClassName("accordion");
                                            var i;

                                            for (i = 0; i < acc.length; i++) {
                                                acc[i].addEventListener("click", function () {
                                                    this.classList.toggle("active");
                                                    var panel = this.nextElementSibling;
                                                    if (panel.style.display === "block") {
                                                        panel.style.display = "none";
                                                    } else {
                                                        panel.style.display = "block";
                                                    }
                                                });
                                            }
                                        </script>

                                        {{-- choosing categories end --}}

                                        {{-- notification type --}}
                                        {{-- <div class="notification">
                                            <h3 class="font-bold text-3xl mb-7 mt-10">3. @lang('lang.settings_notifTypes')</h3>
                                            <p class="mt-5">@lang('lang.settings_nofifMeBy')</p>

                                            <input type="checkbox" class="inline w-4 h-4" />
                                            <i class="far fa-envelope inline mr-1"></i>
                                            <span class="inline">E-mail</span>

                                            <input type="checkbox" class="inline w-4 h-4 ml-10"/>
                                            <i class="fas fa-mobile-alt inline mr-1"></i>
                                            <span class="inline">@lang('lang.settings_push')</span>

                                        </div> --}}
                                        {{-- notification type end --}}
                                        {{-- task recommmendation --}}

                                    </div>
                                    {{-- settings/ third tab end -> subscribe for some tasks --}}
                                </div>
                                <div id="fourth"
                                     class="hidden tab-pane @if($errors->has('password')) error  @endif py-4">
                                    <!-- component -->
                                    <script src="https://cdn.js delivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.js"
                                            defer></script>


                                    <div class="container max-w-full me-auto">
                                        <div class="">
                                            <div class="max-w-sm me-auto">
                                                <div class="relative flex flex-wrap">
                                                    <div class="w-full relative">
                                                        <div class="mt-6">
                                                            <h2 class="font-bold text-black text-3xl">
                                                                @lang('lang.settings_changePassword')
                                                            </h2>
                                                            <ul class="mt-10">
                                                                <li class="flex gap-2 mt-2">
                                                                    <i class="fas fa-check"></i>
                                                                    <p class="text-sm">@lang('lang.settings_moreThanEight')</p>
                                                                </li>
                                                            </ul>
                                                            <form class="mt-8"
                                                                  action="{{route('account.password.reset')}}"
                                                                  method="post">
                                                                @csrf

                                                                <div class="mx-auto max-w-lg">
                                                                    <div class="py-2" x-data="{ show: true }">
                                                                        <span
                                                                                class="px-1 text-sm text-gray-600">@lang('lang.settings_newPassword')</span>
                                                                        <div class="relative">
                                                                            <input placeholder="" name="password"
                                                                                   :type="show ? 'password' : 'text'"
                                                                                   class="text-md block px-3 py-2 rounded-lg w-full
                                                    bg-white border-2 border-gray-300 placeholder-gray-600 shadow-md
                                                    focus:placeholder-gray-500
                                                    focus:bg-white
                                                    focus:border-yellow-400
                                                    focus:outline-none">
                                                                            <div
                                                                                    class="absolute inset-y-0 right-0 pr-3 flex items-center text-sm leading-5">

                                                                                <svg class="h-4 text-gray-700"
                                                                                     fill="none" @click="show = !show"
                                                                                     :class="{'hidden': show, 'block':!show }"
                                                                                     xmlns="http://www.w3.org/2000/svg"
                                                                                     viewbox="0 0 576 512">
                                                                                    <path fill="currentColor"
                                                                                          d="M572.52 241.4C518.29 135.59 410.93 64 288 64S57.68 135.64 3.48 241.41a32.35 32.35 0 0 0 0 29.19C57.71 376.41 165.07 448 288 448s230.32-71.64 284.52-177.41a32.35 32.35 0 0 0 0-29.19zM288 400a144 144 0 1 1 144-144 143.93 143.93 0 0 1-144 144zm0-240a95.31 95.31 0 0 0-25.31 3.79 47.85 47.85 0 0 1-66.9 66.9A95.78 95.78 0 1 0 288 160z">
                                                                                    </path>
                                                                                </svg>

                                                                                <svg class="h-4 text-gray-700"
                                                                                     fill="none" @click="show = !show"
                                                                                     :class="{'block': show, 'hidden':!show }"
                                                                                     xmlns="http://www.w3.org/2000/svg"
                                                                                     viewbox="0 0 640 512">
                                                                                    <path fill="currentColor"
                                                                                          d="M320 400c-75.85 0-137.25-58.71-142.9-133.11L72.2 185.82c-13.79 17.3-26.48 35.59-36.72 55.59a32.35 32.35 0 0 0 0 29.19C89.71 376.41 197.07 448 320 448c26.91 0 52.87-4 77.89-10.46L346 397.39a144.13 144.13 0 0 1-26 2.61zm313.82 58.1l-110.55-85.44a331.25 331.25 0 0 0 81.25-102.07 32.35 32.35 0 0 0 0-29.19C550.29 135.59 442.93 64 320 64a308.15 308.15 0 0 0-147.32 37.7L45.46 3.37A16 16 0 0 0 23 6.18L3.37 31.45A16 16 0 0 0 6.18 53.9l588.36 454.73a16 16 0 0 0 22.46-2.81l19.64-25.27a16 16 0 0 0-2.82-22.45zm-183.72-142l-39.3-30.38A94.75 94.75 0 0 0 416 256a94.76 94.76 0 0 0-121.31-92.21A47.65 47.65 0 0 1 304 192a46.64 46.64 0 0 1-1.54 10l-73.61-56.89A142.31 142.31 0 0 1 320 112a143.92 143.92 0 0 1 144 144c0 21.63-5.29 41.79-13.9 60.11z">
                                                                                    </path>
                                                                                </svg>

                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="py-2" x-data="{ show: true }">
                                                                        <span
                                                                                class="px-1 text-sm text-gray-600">@lang('lang.settings_repeatPassword')</span>
                                                                        <div class="relative">
                                                                            <input placeholder=""
                                                                                   name="password_confirmation"
                                                                                   :type="show ? 'password' : 'text'"
                                                                                   class="text-md block px-3 py-2 rounded-lg w-full
                                                    bg-white border-2 border-gray-300 placeholder-gray-600 shadow-md
                                                    focus:placeholder-gray-500
                                                    focus:bg-white
                                                    focus:border-yellow-400
                                                    focus:outline-none">
                                                                        </div>
                                                                    </div>

                                                                    @error('password')
                                                                    <p class="text-red-500">{{ $message }}</p>
                                                                    @enderror
                                                                    <button type="submit" class="mt-16 text-lg font-semibold
                                                    bg-green-400 w-50 text-white rounded-lg
                                                    px-6 py-3 block shadow-xl hover:text-white hover:bg-green-500">
                                                                        @lang('lang.settings_saveNewPass')
                                                                    </button>
                                                                </div>
                                                            </form>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- scripts --}}
                    </div>
                </div>
            </div>
            {{-- right-side-bar --}}
            @include('auth.profile-side-info')
            {{-- tugashi o'ng tomon ispolnitel --}}
        </div>
    </div>
    <script src="https://unpkg.com/imask"></script>

    <script>

        let tabsContainer = document.querySelector("#tabs");

        let tabTogglers = tabsContainer.querySelectorAll("a");
        console.log(tabTogglers);

        tabTogglers.forEach(function (toggler) {
            toggler.addEventListener("click", function (e) {
                e.preventDefault();

                let tabName = this.getAttribute("href");

                let tabContents = document.querySelector("#tab-contents");

                for (let i = 0; i < tabContents.children.length; i++) {

                    tabTogglers[i].parentElement.classList.remove("border-blue-400", "border-b", "-mb-px", "opacity-100");
                    tabContents.children[i].classList.remove("hidden");
                    if ("#" + tabContents.children[i].id === tabName) {
                        continue;
                    }
                    tabContents.children[i].classList.add("hidden");

                }
                e.target.parentElement.classList.add("border-blue-400", "border-b-4", "-mb-px", "opacity-100");
            });
        });

        document.getElementById("default-tab").click();
        var element = document.getElementById('phone_number');
        var maskOptions = {
            mask: '+998 00 000-00-00',
            lazy: false
        }
        var mask = new IMask(element, maskOptions);

        $("#phone_number").keyup(function () {
            var text = $(this).val()
            text = text.replace(/[^0-9.]/g, "")
            text = text.slice(3)
            $("#phone").val(text)
        })

        if ($('#tab-contents').children(".error").length) {
            $('#tab-contents').children('.tab-pane').addClass('hidden')
            $('.error').removeClass('hidden')
            $('#tabs').children('.tab-name').removeClass("border-blue-400 border-b-4  -mb-px opacity-100")
            $('#tabs').children('.error').addClass("border-blue-400 border-b-4  -mb-px opacity-100")

        }

        function fileupdate() {
            var x = document.getElementById("buttons");
            x.style.display = "block";
        }

        function fileadd() {
            var x = document.getElementById("baatton");
            x.classList.add("hidden");
        }

        function ConfirmDelete() {
            var result = confirm(" @lang('lang.settings_delete')");
            if (result == true) {
                window.location.href = "http://" + window.location.hostname + "/profile/delete";
                return true;
            } else {
                console.log(result);
                return false;
            }
        }
    </script>
@endsection
