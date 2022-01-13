@extends("layouts.app")

@section("content")

        <div class="container md:w-4/5 p-3 w-full my-10 mx-auto">


        <div class="grid md:grid-cols-3 grid-flow-row mt-10 inline-block">


            {{-- user ma'lumotlari --}}
            <div class="col-span-2 mx-auto">
                <figure class="w-full">
                    <div class="top-0 right-0 float-right text-gray-500 text-sm">
                        <i class="far fa-eye"> @lang('lang.profile_view')</i>
                    </div>
                    <br>
                    <h2 class="font-bold text-2xl mb-2">@lang('lang.cash_hello'), {{$user->name}}!</h2>
                    <div class="grid grid-cols-2">
                        <div class="col-span-1 object-center sm:w-40 h-50">
                            <img class="rounded-min mx-left overflow-hidden" src="{{asset("AvatarImages/{$user->avatar}")}}" alt="" width="384" height="512">
                            <!-- <img class="rounded-min mx-left overflow-hidden" src="{{ asset('storage/app/'.$user->avatar)}}" alt="" width="384" height="512"> -->
                            <form action="{{route('updatephoto',$user->id)}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="rounded-md bg-gray-200 sm:w-40 mt-2 px-2" type="button">
                                    <input type="file" id="file" name="avatar" onclick="fileupdate()" class="hidden">
                                    <label for="file">
                                        <i class="fas fa-camera"></i>
                                        <span>@lang('lang.cash_changeImg')</span>
                                    </label>
                                </div>
                                <div class="rounded-md bg-green-500 w-40 mt-2 px-2 hidden" type="button" id="buttons" onclick="fileadd()">
                                    <input type="submit" id="sub1" class="hidden">
                                    <label for="sub1">
                                        <i class="fas fa-save"></i>
                                        <span>@lang('lang.cash_addImg')</span>
                                    </label>
                                </div>
                            </form>
                        </div>
                        {{-- <div class="relative inline-block object-center  w-40 h-50">
                            <img class="rounded-min mx-left overflow-hidden"
                                src="{{asset($user->avatar)}}" alt="" width="384"
                                height="512">
                                    <button class="rounded-md bg-gray-200 w-40 mt-2 px-2" type="button" onclick="openpopup()">
                                        <i class="fas fa-camera"></i>
                                        <span>@lang('lang.cash_changeImg')</span>
                                    </button>

                        </div> --}}

                        <div class="md:col-span-2 col-span-3 lg:col-span-1 ml-3 mt-1">
                            @if($user->age != "")
                                <p class="inline-block text-m mr-2">
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
                                    @if ($task == Null)  0
                                    @else {{$task}}
                                    @endif
                                </span> @lang('lang.cash_task')</a></p>
                            {{-- <p class="mt-4">@lang('lang.cash_rate'): 3.6 </p> --}}
                        </div>
                    </div>
                </figure>
                {{-- user ma'lumotlari tugashi --}}
                <div class="content mt-20 ">
                    <div class= "grid md:grid-cols-10 w-full">
                        <ul class=" md:col-span-9 items-center w-3/4 md:w-full" id="tabs">
                            <li class=" md:mr-5 mr-1 inline-block"><a href="/home/profile" class=" md:text-[18px] text-[14px] font-bold block " id="default-tab">@lang('lang.cash_aboutMe')</a></li>
                            <li class=" md:mr-5 mr-1 inline-block"><a href="/profile/cash" class=" md:text-[18px] text-[14px]">@lang('lang.cash_check')</a></li>
                            {{-- <li class=" md:mr-5 mr-1 inline-block"><a href="#third" class=" md:text-[18px] text-[14px]">@lang('lang.cash_tariff')</a></li>
                            <li class=" md:mr-5 mr-1 inline-block"><a href="/home/profile" class="md:text-[18px] text-[14px]">@lang('lang.cash_insurance')</a></li> --}}
                            <li class=" md:mr-5 mr-1 inline-block md:hidden block"><a href="/profile/settings" class="md:text-[18px] text-[14px]" id="settingsText">@lang('lang.cash_settings')</a></li>

                        </ul>
                        <div class="md:col-span-1 md:block hidden" id="settingsIcon"><a href="/profile/settings"><i class="fas fa-user-cog text-3xl" ></i></a></div>

                    </div>
                                <hr>
{{-- BOUT-ME start --}}
                    <div class="about-me block" id="tab-profile">
                        <div class="about-a-bit mt-10">
                            <h4 class="inline font-bold text-lg">@lang('lang.profile_aboutMe')</h4>
                            <span class="ml-10">
                                <i class="fas fa-pencil-alt inline text-gray-300"></i>
                                <p class="inline text-gray-300 cursor-pointer">@lang('lang.profile_edit')</p>
                            </span>
                            <p class="mt-3 w-4/5">{{$user->description}}</p>
                        </div>
                        <h4 class="font-bold text-lg mt-5">@lang('lang.profile_workExample')</h4>
                        <div class="example-of-works w-full mt-2 mx-auto flex flex-wrap">

                            <div class="lg:w-1/3 md:w-1/2 w-full p-4 rounded-xl hover:bg-gray-100 cursor-pointer ">
                                <div class="rounded-xl shadow-lg  object-center">
                                    <img class="rounded-t-xl z-10 "
                                        src="https://ichef.bbci.co.uk/news/999/cpsprodpb/15951/production/_117310488_16.jpg">
                                    <div class="w-full bg-gray-700 hover:bg-gray-500 grid grid-cols-5 z-40 rounded-b-xl h-10">
                                        <p class="col-span-4 text-white text-center">@lang('lang.profile_textForJobs')</p>
                                        <i class="col-span-1 fas fa-camera text-white text-center text-xl"><span
                                                class="text-sm"> 1</span> </i>
                                    </div>
                                </div>
                            </div>

                            <div class="lg:w-1/3 md:w-1/2 w-full p-4 rounded-xl hover:bg-gray-100 cursor-pointer">
                                <div class="rounded-xl ring-1 ring-gray-300  object-center w-full h-auto">                   
                                   <a href="#" onclick="toggleModal123('modal-id123')">
                                    <i class="fas fa-plus-circle text-gray-300 text-9xl text-center w-full">
                                    </i> 
                                   </a>
                                </div>
                            </div>
                        </div>
                    </div>
{{-- about-me end --}}
                </div>
            </div>
{{-- right-side-bar --}}
            <div
                class="md:col-span-1 col-span-3 md:mx-2 mx-auto inline-block w-4/5 float-right right-20 rounded-xl ring-1 ring-gray-100 h-auto">
                <div class="mt-6 ml-4">
                    <h3 class="font-bold">@lang('lang.profile_performer')</h3>
                    <p>@lang('lang.profile_since')</p>
                </div>
                <div class="contacts  ">
                    <div class="ml-4 h-20 grid grid-cols-4">
                        <div class="w-14 h-14 text-center mx-auto my-auto py-3 rounded-xl col-span-1"
                            style="background-color: orange;">
                            <i class="fas fa-phone-alt text-white"></i>
                        </div>
                        <div class="ml-3 col-span-3">
                            <h5 class="font-bold text-black block mt-2">@lang('lang.profile_phone')</h5>
                            @if ($user->phone_number!="")
                            <p class="font-bold text-black block ">{{$user->phone_number}}</p>
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
                            <h5 class="font-bold text-black block mt-2">Email</h5>
                            <p class="text-sm">{{$user->email}}</p>
                        </div>
                    </div>
                    {{-- <div class="telefon ml-4 h-20 grid grid-cols-4">
                        <div class="w-14 h-14 text-center mx-auto my-auto py-3 rounded-xl col-span-1"
                            style="background-color: #4285F4;">
                            <i class="fab fa-google text-white"></i>
                        </div>
                        <div class="ml-3 col-span-3">
                            <h5 class="font-bold text-black block mt-2">Google</h5>
                            <p class="font-bold text-black block ">@lang('lang.profile_confirmed')</p>
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
                            <h5 class="font-bold text-black block mt-2 text-md">Google</h5>
                            <a href="https://www.google.com/" target="_blank" class="block text-sm">@lang('lang.cash_bind')</a></p></a>
                        </div>
                    </div>
                    <div class="telefon ml-4 h-20 grid grid-cols-4">
                        <div class="w-12 h-12 text-center mx-auto my-auto py-2 bg-gray-300 rounded-xl col-span-1"
                            style="background-color: #4285F4;">
                            <i class="fab fa-facebook-f text-white"></i>
                        </div>
                        <div class="ml-3 col-span-3">
                            <h5 class="font-bold text-black block mt-2 text-md">Facebook</h5>
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
                        <h5 class="font-bold text-black block mt-2 text-md">OneID</h5>
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
                        <h5 class="font-bold text-black block mt-2 text-md">mail.ru</h5>
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

                            <h5 class="font-bold text-black block mt-2 text-md">Facebook </h5>
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
                        <h5 class="font-bold text-black block mt-2 text-md">Twitter</h5>
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
                        <h5 class="font-bold text-black block mt-2 text-md">AppleID</h5>
                        <a href="#" class=" block text-sm">@lang('lang.cash_bind')</a>
                    </div>
                </div>
                @endif
                @endforeach --}}
            </div>
            {{-- tugashi o'ng tomon ispolnitel --}}
        </div>
    </div>

                       {{-- Modal start --}}
                    <div class="hidden overflow-x-auto overflow-y-auto fixed inset-0 z-50 outline-none focus:outline-none justify-center items-center" id="modal-id123">
                        <div class="relative md:w-1/3 w-1/2  my-6 mx-auto max-w-3xl" id="modal11">
                            <div class="border-0 rounded-lg shadow-2xl px-10 py-10 relative flex mx-auto flex-col w-full bg-white outline-none focus:outline-none">
                                <div class=" text-center p-6  rounded-t">
                                    <button type="submit"  onclick="toggleModal123('modal-id123')" class=" w-100 h-16 absolute top-1 right-4">
                                        <i class="fas fa-times  text-slate-400 hover:text-slate-600 text-xl w-full"></i>
                                    </button>
                                    <h3 class="font-medium text-3xl block">
                                        Выберите регион
                                    </h3>
                                </div>
                                <div class="text-center h-64">
                                   <form action="">
                                       <input type="text" class="outline-none mx-auto bg-amber-200 rounded-xl block my-4 py-3 px-5 w-10/12">
                                       <input type="text" class="outline-none mx-auto bg-amber-200 rounded-xl block my-8 py-3 px-5 w-10/12">
                                       <input type="submit" class="py-2 px-4 bg-lime-500 rounded-md text-xl mt-3 mx-auto cursor-pointer">
                                   </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="hidden opacity-25 fixed inset-0 z-40 bg-black" id="modal-id123-backdrop"></div>
                       {{-- Modal end --}}

                       <script type="text/javascript">
                        function toggleModal123(modalID123){
                          document.getElementById(modalID123).classList.toggle("hidden");
                          document.getElementById(modalID123 + "-backdrop").classList.toggle("hidden");
                          document.getElementById(modalID123).classList.toggle("flex");
                          document.getElementById(modalID123 + "-backdrop").classList.toggle("flex");
                        }
                      </script>

    <script>

        function fileupdate(){
            var x = document.getElementById("buttons");
                x.style.display = "block";

        }
        function fileadd(){
          var x = document.getElementById("buttons");

                x.classList.add("hidden");
        }

    </script>
@endsection
