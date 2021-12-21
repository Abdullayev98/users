@extends("layouts.app")

@section("content")

        <div class="container md:w-4/5 p-5 w-full my-10 mx-auto">


        <div class="grid md:grid-cols-3 grid-flow-row mt-10 inline-block">


            {{-- user ma'lumotlari --}}
            <div class="col-span-2 mx-auto">
                <figure class="w-full">
                    <div class="top-0 right-0 float-right text-gray-500 text-sm">
                        <i class="far fa-eye"></i>
                        <span>15 просмотров профиля</span>
                    </div>
                    <br>
                    <h2 class="font-bold text-2xl">Здравствуйте, {{$user->name}}!</h2>
                    <div class="grid grid-cols-3">
                        <div class="col-span-1 object-center  w-40 h-50">
                            <img class="rounded-min mx-left overflow-hidden"
                                src="{{asset("AvatarImages/{$user->avatar}")}}" alt="" width="384"
                                height="512">
                            <form action="{{route('updatephoto' ,$user->id)}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="rounded-md bg-gray-200 w-40 mt-2 px-2" type="button">
                                    <input type="file" id="file" name="avatar" onclick="fileupdate()" class="hidden">
                                    <label for="file">
                                        <i class="fas fa-camera"></i>
                                        <span>Изменить фото</span>
                                    </label>
                                </div>


                                <div class="rounded-md bg-green-500 w-40 mt-2 px-2 hidden" type="button" id="baatton" onclick="fileadd()">
                                    <input type="submit" id="sub1" class="hidden" >
                                <div class="rounded-md bg-green-500 w-40 mt-2 px-2 hidden" type="button" id="buttons" onclick="fileadd()">
                                    <input type="submit" id="sub1" class="hidden">
                                    <label for="sub1">
                                        <i class="fas fa-save"></i>
                                        <span>добавлять фото</span>
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
                                        <span>Изменить фото</span>
                                    </button>

                        </div> --}}

                        <div class="sm:col-span-1   col-span-3  md:ml-3 mt-1">
                            <p class="inline-block text-m mr-2">34 год</p>
                            <span class="inline-block">
                                <i class="fas fa-map-marker-alt"></i>
                                <p class="inline-block text-m">Москва город</p>
                            </span>
                            <p class="mt-2">Создал <a href="#"><span>1</span></span> задание</a></p>
                            <p class="mt-4">Оценка: 3.6 </p>
                        </div>
                    </div>
                </figure>
                {{-- user ma'lumotlari tugashi --}}
                <div class="content mt-20 ">
                    <div class= "grid md:grid-cols-10 w-full">
                        <ul class=" md:col-span-9 items-center w-3/4 md:w-full" id="tabs">
                            <li class=" md:mr-5 mr-1 inline-block"><a href="/home/profile" class=" md:text-[18px] text-[14px] font-bold block " id="default-tab">Обо мне</a></li>
                            <li class=" md:mr-5 mr-1 inline-block"><a href="/profile/cash" class=" md:text-[18px] text-[14px]">Счет</a></li>
                            <li class=" md:mr-5 mr-1 inline-block"><a href="#third" class=" md:text-[18px] text-[14px]">Тарифы</a></li>
                            <li class=" md:mr-5 mr-1 inline-block"><a href="/home/profile" class="md:text-[18px] text-[14px]">Страхование</a></li>
                            <li class=" md:mr-5 mr-1 inline-block md:hidden block"><a href="/profile/settings" class="md:text-[18px] text-[14px]" id="settingsText">Настройки</a></li>

                        </ul>
                        <div class="md:col-span-1 md:block hidden" id="settingsIcon"><a href="/profile/settings"><i class="fas fa-user-cog text-3xl" ></i></a></div>

                    </div>
                                <hr>
{{-- BOUT-ME start --}}
                    <div class="about-me block" id="tab-profile">
                        <div class="about-a-bit mt-10">
                            <h4 class="inline font-bold text-lg">Немного о себе</h4>
                            <span class="ml-10">
                                <i class="fas fa-pencil-alt inline text-gray-300"></i>
                                <p class="inline text-gray-300 cursor-pointer">Редактировать</p>
                            </span>
                            <p class="mt-3 w-4/5">Lorem Ipsum is simply dummy text of the printing and typesetting
                                industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                                when an unknown printer took a galley of type and scrambled it to make a type specimen
                                book.</p>
                        </div>
                        <h4 class="font-bold text-lg mt-5">Примеры работ</h4>
                        <div class="example-of-works w-full mt-2 mx-auto flex flex-wrap">

                            <div class="lg:w-1/3 md:w-1/2 w-full p-4 rounded-xl hover:bg-gray-100 cursor-pointer ">
                                <div class="rounded-xl shadow-lg  object-center">
                                    <img class="rounded-t-xl z-10 "
                                        src="https://ichef.bbci.co.uk/news/999/cpsprodpb/15951/production/_117310488_16.jpg">
                                    <div class="w-full bg-gray-700 hover:bg-gray-500 grid grid-cols-5 z-40 rounded-b-xl h-10">
                                        <p class="col-span-4 text-white text-center">text for jobs</p>
                                        <i class="col-span-1 fas fa-camera text-white text-center text-xl"><span
                                                class="text-sm"> 1</span> </i>
                                    </div>
                                </div>
                            </div>

                            <div class="lg:w-1/3 md:w-1/2 w-full p-4 rounded-xl hover:bg-gray-100 cursor-pointer">
                                <div class="rounded-xl ring-1 ring-gray-300  object-center w-full h-auto">
                                    <i class="fas fa-plus-circle text-gray-300 text-9xl text-center w-full"></i>

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
                    <h3 class="font-bold">Исполнитель</h3>
                    <p>на YouDo с 12 сентября 2021 г.</p>
                </div>
                <div class="contacts  ">
                    <div class="ml-4 h-20 grid grid-cols-4">
                        <div class="w-14 h-14 text-center mx-auto my-auto py-3 rounded-xl col-span-1"
                            style="background-color: orange;">
                            <i class="fas fa-phone-alt text-white"></i>
                        </div>
                        <div class="ml-3 col-span-3">
                            <h5 class="font-bold text-black block mt-2">Телефон</h5>
                            <p class="font-bold text-black block ">+998 {{$user->phone_number}}</p>
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
                            <p class="font-bold text-black block ">Подтвержден</p>
                        </div>
                    </div> --}}
                </div>
                <p class="mx-5 my-4">Повысьте доверие пользователей к себе — привяжите ваши аккаунты социальных
                    сетей к профилю Servicebox. Мы обязуемся не раскрывать ваши контакты.</p>
                @foreach ($user->Socials as $social)
                @if ($social->social_name == 'OneID')
                <div class="telefon ml-4 h-20 grid grid-cols-4">
                    <div class="w-14 h-14 text-center mx-auto my-auto py-3 bg-gray-300 rounded-xl col-span-1">
                        <i class="fas fa-fingerprint text-white"></i>
                    </div>
                    <div class="ml-3 col-span-3">
                        <h5 class="font-bold text-black block mt-2 text-md">OneID</h5>
                        <a href="#" class=" block text-sm">Привязать</a>
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
                        <a href="#" class=" block text-sm">Привязать</a>
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
                        <a href="#" class=" block text-sm">Привязать</a>
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
                        <a href="#" class=" block text-sm">Привязать</a>
                    </div>
                </div>
                @endif
                @endforeach
            </div>
            {{-- tugashi o'ng tomon ispolnitel --}}
        </div>
    </div>
    <script>

        function fileupdate(){
            var x = document.getElementById("buttons");
                x.style.display = "block";

        }
        function fileadd(){
          var x = document.getElementById("baatton");

                x.classList.add("hidden");
        }

    </script>
@endsection
