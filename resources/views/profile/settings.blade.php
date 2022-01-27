@extends("layouts.app")

@section("content")

    <div class="2xl:w-3/5 w-10/12  mx-auto text-base mt-4">


        <div class="grid lg:grid-cols-3 grid-cols-2 lg:w-5/6 w-full mx-auto">


                 {{-- user ma'lumotlari --}}
            <div class="md:col-span-2 col-span-3 px-2 mx-3">
                <figure class="w-full">
                    <div class="float-right mr-8 text-gray-500">
                        <i class="far fa-eye"> {{$views}}  @lang('lang.profile_view')</i>
                    </div>
                    <br>
                    <h2 class="font-bold text-2xl text-gray-800 mb-2">@lang('lang.cash_hello'), {{$user->name}}!</h2>
                    <div class="flex flex-row 2xl:w-11/12 w-full mt-6">
                        <div class="sm:w-1/3 w-full">                           
                                <img class="border border-3 border-gray-400 h-40 w-40"
                                @if ($user->avatar == Null)
                                src='{{asset("images/default_img.jpg")}}'
                                @else
                                src="{{asset("AvatarImages/{$user->avatar}")}}"
                                @endif alt="">
                            <form action="{{route('updateSettingPhoto')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="rounded-md bg-gray-200 w-40 mt-2 py-1 text-base" type="button">
                                    <input type="file" id="file" name="avatar" onclick="fileupdate()" class="hidden">
                                    <label for="file" class="p-3">
                                        <i class="fas fa-camera"></i>
                                        <span>@lang('lang.cash_changeImg')</span>
                                    </label>
                                </div>
                                <div class="rounded-md bg-green-400 w-40 hidden mt-3 py-1" type="button" id="buttons" onclick="fileadd()">
                                    <input type="submit" id="sub1" class="hidden">
                                    <label for="sub1" class="p-3">
                                        <i class="fas fa-save"></i>
                                        <span>@lang('lang.cash_addImg')</span>
                                    </label>
                                </div>
                            </form>
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
                            <p class="mt-2">@lang('lang.cash_created') <a href="#">
                                <span>
                                    @if ($task == Null) 0
                                    @else {{$task}}
                                    @endif
                                </span> @lang('lang.cash_task')</a></p>
                            {{-- <p class="mt-4">@lang('lang.cash_rate'): 3.6 </p> --}}
                        </div>
                    </div>
                </figure>   
                    {{-- user ma'lumotlari tugashi --}}
                <div class="content mt-20 ">
                  <div class="grid grid-cols-10">
                    <ul class=" md:col-span-9 col-span-10 md:items-left sitems-center">
                        <li class="inline md:mr-5 mr-1"><a href="/profile" class=" text-[14px] md:text-[18px] text-gray-600">@lang('lang.cash_aboutMe')</a></li>
                        <li class="inline md:mr-5 mr-1"><a href="/profile/cash" class=" text-[14px] md:text-[18px] text-gray-600">@lang('lang.cash_check')</a></li>
                        <li class="inline md:mr-5 mr-1 md:hidden block"><a href="/profile/settings" class="md:text-[18px] text-[14px] text-gray-700" id="settingsText">@lang('lang.cash_settings')</a></li>

                    </ul>
                    <div class="md:col-span-1 md:block hidden" id="settingsIcon"><a href="/profile/settings"><i class="fas fa-user-cog text-3xl text-gray-700"></i></a></div>
                </div>

                <hr>


                        {{-- settings start --}}
                    <div class= "w-full text-base">
                            <!-- settings form TABS -->
                        <div class="w-full mx-auto mt-4  rounded">
                            <!-- Tabs -->
                            <ul id="tabs" class="md:inline-flex block w-full flex-center px-1 pt-2">
                                <li class="xl:px-4 md:px-2 py-2  rounded-xl md:ring-0 w-full md:w-inherit font-semibold text-gray-800 border-b-2 border-blue-400 rounded-t opacity-50"><a id="default-tab" href="#first">@lang('lang.settings_allSettings')</a></li>
                                <li class="xl:px-4 md:px-2 py-2  rounded-xl md:ring-0 w-full md:w-inherit font-semibold text-gray-800 rounded-t opacity-50"><a href="#second">@lang('lang.settings_notifs')</a></li>
                                <li class="xl:px-2 md:px-2 py-2  rounded-xl md:ring-0 w-full md:w-inherit font-semibold text-gray-800 rounded-t opacity-50"><a href="#third">@lang('lang.settings_subscribeOnTask')</a></li>
                                <li class="xl:px-4 md:px-2 py-2  rounded-xl md:ring-0 w-full md:w-inherit font-semibold text-gray-800 rounded-t opacity-50"><a href="#fourth">@lang('lang.settings_security')</a></li>
                            </ul>

<!-- Tab Contents -->
                            <div id="tab-contents" class="w-full">
                                <div id="first" class="p-4 w-full">
{{-- settings/ first tab -> base settings start --}}
                                    <div class="flex justify-left w-full">
                                        <div class="md:w-3/5 w-full md:m-4 m-0">
                                            <h1 class="block w-3/5 text-left text-gray-800 text-3xl font-bold mb-6">@lang('lang.settings_personalData')</h1>
                                            <form action="{{route('updateData')}}" class="w-full" method="POST">
                                                @csrf
                                                <div class="w-full mb-4">
                                                    <label class="mb-2 text-md md:block text-gray-400" for="name">@lang('lang.settings_name')</label>
                                                    <input class="rounded-xl border py-2 px-3 w-full text-grey-900" type="text" name="name" id="name" value="{{$user->name}}" required>
                                                </div>
                                                <div class="w-full block w-full mb-4">
                                                    <label class="mb-2 text-md md:block text-gray-400" for="email">Email</label>
                                                    <input class="rounded-xl border py-2 px-3 w-full text-grey-900" type="email" name="email" id="email" value="{{$user->email}}">
                                                </div>
                                                <div class="w-full block w-full mb-4">
                                                    <label class="mb-2 text-md md:block text-gray-400" for="phone_number">Phone number</label>
                                                    <input class="rounded-xl border py-2 px-3 w-full text-grey-900" type="text" name="phone_number" id="phone_number"
                                                    @if ($user->phone_number=="") placeholder="+998(00)000-00-00"
                                                    @else value="{{$user->phone_number}}"
                                                    @endif >
                                                </div>
                                                <div class="w-full block w-full mb-4">
                                                    <label class="mb-2 text-md md:block text-gray-400" for="age">@lang('lang.settings_age')</label>
                                                    <input class="rounded-xl border py-2 px-3 w-full text-grey-900" min="18" type="number" name="age" id="age" value="{{$user->age}}">
                                                </div>
                                                <div class="w-full block w-full mb-4">
                                                    <label class="mb-2 text-md md:block text-gray-400" for="textarea">@lang('lang.settings_otherSet')</label>
                                                    <textarea class="border rounded-xl py-2 px-3 w-full text-grey-900" name="description" id="textarea">{{$user->description}}</textarea>
                                                </div>
                                                <div class="w-full block w-full mb-4">
                                                    <label class="mb-2 text-md md:block text-gray-400" for="location">@lang('lang.settings_city')</label>
                                                    <select class="border rounded-xl py-2 px-3 w-full text-grey-900" name="location">
                                                        <option value="Toshkent" {{ $user->location=='Toshkent' ? 'selected' : '' }}>Toshkent</option>
                                                        <option value="Farg'ona" {{ $user->location=='Farg\'ona' ? 'selected' : '' }}>Farg'ona</option>
                                                        <option value="Namangan" {{ $user->location=='Namangan'?'selected':'' }}>Namangan</option>
                                                        <option value="Andijon" {{ $user->location=='Andijon' ? 'selected' : '' }}>Andijon</option>
                                                        <option value="Toshkent viloyati" {{ $user->location=='Toshkent viloyati' ? 'selected' : '' }}>Toshkent viloyati</option>
                                                        <option value="Samarqand" {{ $user->location=='Samarqand' ? 'selected' : '' }}>Samarqand</option>
                                                        <option value="Sirdaryo" {{ $user->location=='Sirdaryo' ? 'selected' : '' }}>Sirdaryo</option>
                                                        <option value="Jizzax" {{ $user->location=='Jizzax' ? 'selected' : '' }}>Jizzax</option>
                                                        <option value="Buxoro" {{ $user->location=='Buxoro' ? 'selected' : '' }}>Buxoro</option>
                                                        <option value="Navoiy" {{ $user->location=='Navoiy' ? 'selected' : '' }}>Navoiy</option>
                                                        <option value="Xorazm" {{ $user->location=='Xorazm' ? 'selected' : '' }}>Xorazm</option>
                                                        <option value="Qashqadryo" {{ $user->location=='Qashqadryo' ? 'selected' : '' }}>Qashqadryo</option>
                                                        <option value="Surxondaryo" {{ $user->location=='Surxondaryo' ? 'selected' : '' }}>Surxondaryo</option>
                                                        <option value="Qoraqalpog'iston" {{ $user->location=='Qoraqalpog\'iston' ? 'selected' : '' }}>Qoraqalpog'iston</option>
                                                    </select>
                                                </div>
                                                <div class="w-full block w-full mb-4">
                                                    <label class="mb-2 text-md md:block text-gray-400" for="role">@lang('lang.settings_profileType')</label>
                                                    <select class="border rounded-xl py-2 px-3 w-full text-grey-900" name="role">
                                                        <option value="2" {{ $user->role_id==2 ? 'selected' : '' }}>@lang('lang.settings_performer')</option>
                                                        <option value="3" {{ $user->role_id==3 ? 'selected' : '' }}>@lang('lang.settings_customer')</option>
                                                    </select>
                                                </div>
                                                <input type="submit"class="block md:w-3/5 w-full text-center bg-green-400 hover:bg-green-600 text-white uppercase p-4 rounded-xl mb-5" name="submit1" value="Сохранить">
                                                <hr>
                                            </form>

                                            <a  onclick="ConfirmDelete()" class="block md:w-3/5 w-full text-center bg-red-300 hover:bg-red-600 mt-5 uppercase p-4 rounded-xl">@lang('lang.settings_profile')</a>
                                        </div>
                                    </div>
{{-- settings/ first tab -> base settings end--}}
                                </div>
                                <div id="second" class="hidden p-4">
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
                                        <button class="block  md:w-1/2 w-full mt-10 bg-green-400 hover:bg-green-600 text-white uppercase p-4 rounded-xl" type="submit">@lang('lang.settings_save')</button>
                                    </div>
{{-- settings/ second tab -> enable notification end --}}
                                </div>
                                <div id="third" class="hidden p-4">
{{-- settings/ third tab start -> subscribe for some tasks --}}
                                    <div class="sm:w-4/5 w-full mt-10">
                                        <h3 class="font-bold text-3xl mb-7">1. @lang('lang.settings_chooseCat')</h3>
    {{-- choosing categories --}}
                                        <form action="{{route('get.category')}}" method="post">
                                            @csrf
                                            <div class="acordion mt-16">
                                                @foreach ($categories as $category )

                                                <div class="mb-4 rounded-md border shadow-md">
                                                    <div class="accordion text-gray-700 cursor-pointer p-[18px] w-full text-left text-[15px]">
                                                        {{$category->name}}
                                                    </div>
                                                    <div class="panel overflow-hidden hidden px-[18px] bg-white p-2">
                                                        @foreach (\TCG\Voyager\Models\Category::query()->where('parent_id', $category->id)->get() as $category2)
                                                        <label class="block">
                                                            @php
                                                            $cat_arr = explode(",",$user->category_id);
                                                            $res_c_arr = array_search($category2->id,$cat_arr);
                                                            //dd($res_c_arr);
                                                        @endphp
                                                            <input type="checkbox" @if($res_c_arr !== false) checked @endif name="category[]" value="{{$category2->id}}" class="mr-2 required:border-yellow-500" >{{$category2->name}}
                                                        </label>
                                                        @endforeach
                                                    </div>
                                                </div>
                                                @endforeach
                                            </div>
                                            <input class="block md:w-3/5 w-full text-center bg-green-400 hover:bg-green-600 text-white uppercase p-4 rounded-xl mb-5" type="submit" name="submit" value="Сохранить">
                                        </form>
                                        <script>
                                            var acc = document.getElementsByClassName("accordion");
                                            var i;

                                            for (i = 0; i < acc.length; i++) {
                                                acc[i].addEventListener("click", function() {
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
                                <div id="fourth" class="hidden p-4">
                                    Fourth tab
                                </div>
                            </div>
                        </div>
{{-- scripts --}}
                        <script>
                        let tabsContainer = document.querySelector("#tabs");

                        let tabTogglers = tabsContainer.querySelectorAll("a");
                        console.log(tabTogglers);

                        tabTogglers.forEach(function(toggler) {
                        toggler.addEventListener("click", function(e) {
                        e.preventDefault();

                        let tabName = this.getAttribute("href");

                        let tabContents = document.querySelector("#tab-contents");

                        for (let i = 0; i < tabContents.children.length; i++) {

                        tabTogglers[i].parentElement.classList.remove("border-blue-400", "border-b",  "-mb-px", "opacity-100");  tabContents.children[i].classList.remove("hidden");
                        if ("#" + tabContents.children[i].id === tabName) {
                        continue;
                        }
                        tabContents.children[i].classList.add("hidden");

                        }
                        e.target.parentElement.classList.add("border-blue-400", "border-b-4", "-mb-px", "opacity-100");
                        });
                        });

                        document.getElementById("default-tab").click();

                        </script>
                    </div>
                </div>
            </div>
            {{-- right-side-bar --}}
        <div class="lg:col-span-1 col-span-2 full rounded-xl ring-1 ring-gray-300 h-auto w-72 ml-8 text-gray-600">
            <div class="mt-6 ml-4">
                <h3 class="font-medium text-gray-700 text-3xl">@lang('lang.profile_performer')</h3>
                <p>@lang('lang.profile_since')</p>
            </div>
            <div class="contacts">
                <div class="ml-4 h-20 grid grid-cols-4">
                    <div class="w-14 h-14 text-center mx-auto my-auto py-3 rounded-xl col-span-1"
                        style="background-color: orange;">
                        <i class="fas fa-phone-alt text-white"></i>
                    </div>
                    <div class="ml-3 col-span-3">
                        <h5 class="font-bold text-gray-700 block mt-2">@lang('lang.profile_phone')</h5>
                        @if ($user->phone_number!="")
                            <p class="text-gray-600 block ">{{$user->phone_number}}</p>
                        @else
                            @lang('lang.profile_noNumber')
                        @endif
                    </div>
                </div>
                <div class="telefon ml-4 h-20 grid grid-cols-4">
                    <div class="w-14 h-14 text-center mx-auto my-auto py-3 rounded-xl col-span-1"
                        style="background-color: #0091E6;">
                        <i class="far fa-envelope text-white"></i>
                    </div>
                    <div class="ml-3 col-span-3">
                        <h5 class="font-bold text-gray-700 block mt-2">Email</h5>
                        <p class="text-sm">{{$user->email}}</p>
                    </div>
                </div>
                {{-- <div class="telefon ml-4 h-20 grid grid-cols-4">
                    <div class="w-14 h-14 text-center mx-auto my-auto py-3 rounded-xl col-span-1"
                        style="background-color: #4285F4;">
                        <i class="fab fa-google text-white"></i>
                    </div>
                    <div class="ml-3 col-span-3">
                        <h5 class="font-bold text-gray-700 block mt-2">Google</h5>
                        <p class="font-bold text-gray-700 block ">@lang('lang.profile_confirmed')</p>
                    </div>
                </div> --}}
            </div>
            <p class="mx-5 my-4">@lang('lang.cash_boost')</p>
            <div class="telefon ml-4 h-20 grid grid-cols-4">
                <div class="w-12 h-12 text-center mx-auto my-auto py-2 bg-gray-300 rounded-xl col-span-1"
                    style="background-color: #4285F4;">
                    <i class="fab fa-google text-white"></i>
                </div>
                <div class="ml-3 col-span-3">
                    <h5 class="font-bold text-gray-700 block mt-2 text-md">Google</h5>
                    <a href="https://www.google.com/" target="_blank" class="block text-sm">@lang('lang.cash_bind')</a></p></a>
                </div>
            </div>
            <div class="telefon ml-4 h-20 grid grid-cols-4">
                <div class="w-12 h-12 text-center mx-auto my-auto py-2 bg-gray-300 rounded-xl col-span-1"
                    style="background-color: #4285F4;">
                    <i class="fab fa-facebook-f text-white"></i>
                </div>
                <div class="ml-3 col-span-3">
                    <h5 class="font-bold text-gray-700 block mt-2 text-md">Facebook</h5>
                    <a href="https://www.facebook.com/" target="_blank" class="block text-sm">@lang('lang.cash_bind')</a>
                </div>
            </div>
            {{-- @foreach ($user->Socials as $social)
            @if ($social->social_name == 'OneID')
            <div class="telefon ml-4 h-20 grid grid-cols-4">
                <div class="w-14 h-14 text-center mx-auto my-auto py-3 bg-gray-300 rounded-xl col-span-1">
                    <i class="fas fa-fingerprint text-white"></i>
                </div>
                <div class="ml-3 col-span-3">
                    <h5 class="font-bold text-gray-700 block mt-2 text-md">OneID</h5>
                    <a href="#" class=" block text-sm">@lang('lang.cash_bind')</a>
                </div>
            </div>
            @endif
            @if ($social->social_name == 'mail.ru')
            <div class="telefon ml-4 h-20 grid grid-cols-4">
                <div class="w-14 h-14 text-center mx-auto my-auto py-3 bg-gray-300 rounded-xl col-span-1">
                    <i class="far fa-envelope text-white"></i>
                </div>
                <div class="ml-3 col-span-3">
                    <h5 class="font-bold text-gray-700 block mt-2 text-md">mail.ru</h5>
                    <a href="#" class=" block text-sm">@lang('lang.cash_bind')</a>
                </div>
            </div>
            @endif
            @if ($social->social_name == 'Facebook')
            <div class="telefon ml-4 h-20 grid grid-cols-4">
                <div class="w-14 h-14 text-center mx-auto my-auto py-3 bg-gray-300 rounded-xl col-span-1">
                    <i class="fab fa-facebook-f text-white"></i>
                </div>
                <div class="ml-3 col-span-3">
                        <h5 class="font-bold text-gray-700 block mt-2 text-md">Facebook </h5>
                        <a href="{{$social->social_link}}" target="_blank" class=" block text-sm">{{$social->social_name}}</a>
                </div>
            </div>
            @endif
            @if ($social->social_name == 'Twitter')
            <div class="telefon ml-4 h-20 grid grid-cols-4">
                <div class="w-14 h-14 text-center mx-auto my-auto py-3 bg-gray-300 rounded-xl col-span-1">
                    <i class="fab fa-twitter text-white"></i>
                </div>
                <div class="ml-3 col-span-3">
                    <h5 class="font-bold text-gray-700 block mt-2 text-md">Twitter</h5>
                    <a href="#" class=" block text-sm">@lang('lang.cash_bind')</a>
                </div>
            </div>
            @endif
            @if ($social->social_name == 'AppleID')
            <div class="telefon ml-4 h-20 grid grid-cols-4">
                <div class="w-14 h-14 text-center mx-auto my-auto py-3 bg-gray-300 rounded-xl col-span-1">
                    <i class="fab fa-apple text-white"></i>
                </div>
                <div class="ml-3 col-span-3">
                    <h5 class="font-bold text-gray-700 block mt-2 text-md">AppleID</h5>
                    <a href="#" class=" block text-sm">@lang('lang.cash_bind')</a>
                </div>
            </div>
            @endif
            @endforeach --}}
        </div>
            {{-- tugashi o'ng tomon ispolnitel --}}
        </div>
    </div>
    <script src="https://unpkg.com/imask"></script>

    <script>
        var element = document.getElementById('phone_number');
    var maskOptions = {
        mask: '+998 00 000-00-00',
        lazy: false
    }
    var mask = new IMask(element, maskOptions);

    var element2 = document.getElementById('email');
    var maskOptions2 = {
        mask:function (value) {
                    if(/^[a-z0-9_\.-]+$/.test(value))
                        return true;
                    if(/^[a-z0-9_\.-]+@$/.test(value))
                        return true;
                    if(/^[a-z0-9_\.-]+@[a-z0-9-]+$/.test(value))
                        return true;
                    if(/^[a-z0-9_\.-]+@[a-z0-9-]+\.$/.test(value))
                        return true;
                    if(/^[a-z0-9_\.-]+@[a-z0-9-]+\.[a-z]{1,4}$/.test(value))
                        return true;
                    if(/^[a-z0-9_\.-]+@[a-z0-9-]+\.[a-z]{1,4}\.$/.test(value))
                        return true;
                    if(/^[a-z0-9_\.-]+@[a-z0-9-]+\.[a-z]{1,4}\.[a-z]{1,4}$/.test(value))
                        return true;
                    return false;
                        },
        lazy: false
    }
    var mask2 = new IMask(element2, maskOptions2);
      </script>
    <script type="text/javascript">
        function fileupdate(){
            var x = document.getElementById("buttons");
                x.style.display = "block";
        }
        function fileadd(){
          var x = document.getElementById("baatton");
                x.classList.add("hidden");
        }

        function ConfirmDelete()
        {   var result = confirm("Are you sure you want to delete?");
            if(result == true )
            {
                window.location.href = "http://" +window.location.hostname+"/profile/delete";
                return true;
            }else{
                console.log(result);
                return false;
            }
        }
    </script>
@endsection
