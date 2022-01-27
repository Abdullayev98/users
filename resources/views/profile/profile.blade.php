@extends("layouts.app")

@section("content")

    <link rel="stylesheet" href="{{ asset('/css/profile.css') }}">
    <div class="2xl:w-3/5 w-10/12  mx-auto text-base mt-4">


        <div class="grid lg:grid-cols-3 grid-cols-2 lg:w-5/6 w-full mx-auto">
                {{-- user ma'lumotlari --}}
            <div class="col-span-2 w-full md:mx-auto mx-4">
                <figure class="w-full">
                    <div class="float-right mr-8 text-gray-500">
                        <i class="far fa-eye"> {{$vcs->count}} @lang('lang.profile_view')</i>
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
                                <div class="rounded-md bg-gray-200 w-40 mt-2 py-1" type="button">
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
                    <div class= "grid md:grid-cols-10 w-full">
                        <ul class=" md:col-span-9 items-center w-3/4 md:w-full" id="tabs">
                            <li class=" md:mr-5 mr-1 inline-block"><a href="/profile" class=" md:text-[18px] text-[14px] font-bold block text-gray-700" id="default-tab">@lang('lang.cash_aboutMe')</a></li>
                            <li class=" md:mr-5 mr-1 inline-block"><a href="/profile/cash" class=" md:text-[18px] text-[14px] text-gray-600">@lang('lang.cash_check')</a></li>
                            <li class=" md:mr-5 mr-1 inline-block md:hidden block"><a href="/profile/settings" class="md:text-[18px] text-[14px] text-gray-600" id="settingsText">@lang('lang.cash_settings')</a></li>

                        </ul>
                        <div class="md:col-span-1 md:block hidden text-gray-600" id="settingsIcon"><a href="/profile/settings"><i class="fas fa-user-cog text-3xl" ></i></a></div>

                    </div>
                    <hr>
                    {{-- ABOUT-ME start --}}
                    <div class="about-me block" id="tab-profile">
                        <div class="about-a-bit mt-10">
                            <h4 class="inline font-bold text-lg text-gray-700">@lang('lang.profile_aboutMe')</h4>
                                @if ($user->description == Null)
                                    <span class="ml-10">
                                        <i class="fas fa-pencil-alt inline text-gray-700"></i>
                                        <p class="inline text-gray-500 cursor-pointer" id="padd">@lang('lang.profile_add')</p>
                                    </span>
                                    <p class="text-red-400 desc mt-4" >@lang('lang.profile_description')</p>
                                @else
                                    <span class="ml-10">
                                        <i class="fas fa-pencil-alt inline text-gray-700"></i>
                                        <p class="inline text-gray-500 cursor-pointer" id="padd">@lang('lang.profile_edit')</p>
                                    </span>
                                    <p class="mt-3 w-4/5 desc">{{$user->description}}</p>
                                @endif
                                <form action="{{route('edit.description')}}" method="POST" class="formdesc hidden">
                                    @csrf
                                    <textarea name="description" name="description" class="w-full h-32 border border-gray-400 py-2 px-4 mt-3" @if (!$user->description) placeholder="Enter description"@endif >@if ($user->description){{$user->description}}@endif
                                    </textarea><br>
                                    <input type="submit" class="bg-blue-400 hover:bg-blue-500 text-white py-2 px-6 rounded cursor-" id="s1" value="@lang('lang.profile_save')">
                                    <a id="s2" class="border-dotted border-b-2 mx-4 pb-1 text-gray-500 hover:text-red-500 hover:border-red-500" href="">@lang('lang.profile_cancel')</a>
                                </form>
                        </div>
                        <h4 class="font-bold mt-5 text-gray-700">@lang('lang.profile_workExample')</h4>
                        <div class="example-of-works w-full mt-2 mx-auto flex flex-wrap">
                            @foreach ($ports as $port)
                                <div class="lg:w-1/3 md:w-1/2 w-full p-4 rounded-xl hover:bg-gray-100 cursor-pointer ">
                                    <div  id="gallery{{$port->id}}" class="rounded-xl shadow-lg  object-center">
                                        <img class="rounded-t-xl z-10 w-full h-40"
                                             src="{{asset("AvatarImages/{$port->image}")}}">
                                        <div class="w-full bg-gray-700 hover:bg-gray-500 grid grid-cols-5 z-40 rounded-b-xl h-10">
                                            <p class="col-span-4 text-white text-center">
                                                @if (strlen($port->comment)>20)
                                                    {{substr($port->comment, 0, 20)}}
                                                @else
                                                    {{$port->comment}}
                                                @endif
                                            </p>
                                            {{-- @lang('lang.profile_textForJobs') --}}
                                            <i class="col-span-1 fas fa-camera text-white text-center text-xl"></i>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            <div id="modal">
                                <img src="" />
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

    {{-- Modal start --}}
    <div class="hidden overflow-x-auto overflow-y-auto fixed inset-0 z-50 outline-none focus:outline-none justify-center items-center" id="modal-id123">
        <div class="relative my-6 mx-auto max-w-3xl" id="modal11">
            <div class="border-0 rounded-lg shadow-2xl px-10 py-10 relative flex mx-auto flex-col w-full bg-white outline-none focus:outline-none">
                <div class=" text-center p-6  rounded-t">
                    <button type="submit"  onclick="toggleModal123('modal-id123')" class=" w-100 h-16 absolute top-1 right-4">
                        <i class="fas fa-times  text-slate-400 hover:text-slate-600 text-xl w-full"></i>
                    </button>
                    <h3 class="font-medium text-3xl block">
                        Выберите регион
                    </h3>
                </div>
                <div class="text-center h-64 w-80 text-base">
                    <form action="{{route('storePicture')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="file" name="image" id="file" class="outline-none mx-auto bg-amber-200 rounded-xl block my-4 py-3 px-5 w-10/12">
                        {{-- <label for="file">
                            <i class="fas fa-camera"></i>
                            <span>@lang('lang.cash_changeImg')</span>
                        </label> --}}

                        <input type="text" name="comment" placeholder="Название фото" class="focus:outline-none border border-solid mx-auto bg-amber-200 rounded-xl block my-8 py-3 px-5 w-10/12">
                        <input type="submit" class="py-2 px-4 bg-green-400 rounded-md text-xl mt-3 mx-auto cursor-pointer">
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
    <script>
        $(document).ready(function(){
            @foreach($ports as $port)
            $("#gallery{{$port->id}}").click(function(){
                $("#modal").show();
                var cat =  $("#gallery{{$port->id}}").children("img").attr("src");
                jQuery("#modal").children("img").attr('src', cat);
            });
            @endforeach
        });
        $('#modal, #modal:before').on('click', function() {
            // fade out filter layer and modal
            $('#modal:before, #modal').fadeOut(200);
        });

        $('#padd').click(function(){
            $('.desc').addClass('hidden')
            $('.formdesc').removeClass('hidden').addClass('block')
        });
        $('#s2').click(function(event){
            event.preventDefault();
            $('.desc').addClass('block').removeClass('hidden');
            $('.formdesc').removeClass('block').addClass('hidden')
        });
    </script>
@endsection
