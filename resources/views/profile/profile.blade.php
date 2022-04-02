@extends("layouts.app")

@section("content")

    <link rel="stylesheet" href="{{ asset('/css/profile.css') }}">
    <link href="https://releases.transloadit.com/uppy/v2.1.0/uppy.min.css" rel="stylesheet">
    <div class="w-11/12  mx-auto text-base mt-4">
        <div class="grid lg:grid-cols-3 grid-cols-2 lg:w-5/6 w-full mx-auto">
            {{-- user ma'lumotlari --}}
            <div class="col-span-2 w-full mx-auto">
                @include('components.profileFigure')
                {{-- user ma'lumotlari tugashi --}}
                <div class="content mt-20 ">
                    <div class= "grid md:grid-cols-10 w-full items-center">
                        <ul class=" md:col-span-9 items-center w-3/4 md:w-full" id="tabs">
                            <li class=" md:mr-5 mr-1 inline-block"><a href="/profile" class=" text-lg font-bold block text-gray-700 border-b-4 border-green-500 pb-3" id="default-tab">{{__('Обо мне')}}</a></li>
                            <li class=" md:mr-5 mr-1 inline-block"><a href="/profile/cash" class=" text-lg text-gray-600">{{__('Счет')}}
                                    </a></li>
                            <li class=" md:mr-5 mr-1 inline-block md:hidden block"><a href="/profile/settings" class="text-lg text-gray-600" id="settingsText">{{__('Настройки')}}
                                    </a></li>

                        </ul>
                        <div class="md:col-span-1 md:block hidden text-gray-600 ml-4" id="settingsIcon"><a href="/profile/settings"><i class="fas fa-cog text-2xl"></i></a></div>

                    </div>
                    <hr>
                    {{-- ABOUT-ME start --}}
                    <div class="about-me block" id="tab-profile">
                        <div class="about-a-bit mt-10">
                            <h4 class="inline font-bold text-lg text-gray-700">{{__('Немного о себе')}}</h4>
                                @if ($user->description == Null)
                                    <span class="ml-10">
                                        <i class="fas fa-pencil-alt inline text-gray-700"></i>
                                        <p class="inline text-gray-500 cursor-pointer" id="padd">{{__('Добавить')}}</p>
                                    </span>
                                    <p class="text-red-400 desc mt-4" >
                                        {{__('Заказчики ничего о вас не знают. Добавьте информацию о вашем опыте.')}}</p>
                                @else
                                    <span class="ml-10">
                                        <i class="fas fa-pencil-alt inline text-gray-700"></i>
                                        <p class="inline text-gray-500 cursor-pointer" id="padd">{{__('Редактировать')}}</p>
                                    </span>
                                    <p class="mt-3 w-4/5 desc">{{$user->description}}</p>
                                @endif
                                <form action="{{route('edit.description')}}" method="POST" class="formdesc hidden">
                                    @csrf
                                    <textarea name="description" name="description"
                                              class="w-full h-32 border border-gray-400 focus:outline-none focus:border-yellow-500 py-2 px-4 mt-3"
                                              @if (!$user->description) placeholder="{{__('Введите описание')}}"@endif
                                    >@if ($user->description){{$user->description}}@endif</textarea><br>
                                    <input type="submit" class="bg-blue-400 hover:bg-blue-500 text-white py-2 px-6 rounded cursor-" id="s1" value="{{__('Сохранить')}}">
                                    <a id="s2" class="border-dotted border-b-2 mx-4 pb-1 text-gray-500 hover:text-red-500 hover:border-red-500" href="">{{__('Отмена')}}
                                        </a>
                                </form>
                        </div>
                        <h4 class="font-bold mt-5 text-gray-700">{{__('Примеры работ')}}</h4>
                        <div class="example-of-works w-full my-10">
                           <a href="/profile/create">
                               <button class="bg-green-500 px-8 py-3 rounded-md text-white text-2xl">
                                   <i class="fas fa-camera"></i>
                                   <span>{{__('Создать фотоальбом')}}</span>
                               </button>
                           </a>
                        </div>
                        <div class="grid xl:grid-cols-3 md:grid-cols-2 grid-cols-1 w-full mx-auto">
                        @foreach($portfolios as $portfolio)

                                <a href="{{ route('portfolio', $portfolio->id) }}" class="border my-6 border-gray-400 mr-auto w-56 h-48 mr-6 sm:mb-0 mb-8">
                                <img src="{{  count(json_decode($portfolio->image)) == 0 ? '': asset('storage/'.json_decode($portfolio->image)[0])  }}" alt="#" class="w-56 h-48">

                                <div class="h-12 flex relative bottom-12 w-full bg-black opacity-75 hover:opacity-100 items-center">
                                    <p class="w-2/3 text-center text-base text-white">{{$portfolio->comment}}</p>
                                   <div class="w-1/3 flex items-center">
                                        <i class="fas fa-camera float-right text-white text-2xl m-2"></i>
                                        <span class="text-white">{{count(json_decode($portfolio->image)??[])}}</span>
                                   </div>
                                </div>
                            </a>
                        @endforeach


                        </div>
                    </div>
                    <div class="mt-8">
                                <p class="text-2xl font-semibold">
                                    {{__('Виды выполняемых работ')}}
                                </p>
                                <div class="my-4">
                                    <ul class="pl-10 leading-7">
                                        @foreach(explode(',', $user->category_id) as $user_cat)
                                            @foreach($categories as $cat)
                                                @if($cat->id == $user_cat)
                                        <li>
                                            <a href="/categories/{{$cat->parent_id}}" class="underline">
                                                {{ $cat->getTranslatedAttribute('name',Session::get('lang') , 'fallbackLocale') }}
                                            </a>
                                        </li>
                                                @endif
                                            @endforeach
                                            @endforeach
                                    </ul>
                                </div>
                            </div>
                    {{-- about-me end --}}
                </div>
            </div>
                {{-- right-side-bar --}}

            @include('auth.profile-side-info')
                {{-- tugashi o'ng tomon ispolnitel --}}
        </div>
    </div>

    <script src="{{ asset('js/profile/profile.js') }}"></script>
    @if($user->role_id == 2)
        <script>
        if($('.tooltip-2').length === 0){
            $( "<div data-tooltip-target='tooltip-animation_2' class='mx-4 tooltip-2' ><img src='{{ asset("images/best_gray.png") }}'alt='' class='w-24'><div id='tooltip-animation_2' role='tooltip' class='inline-block  sm:w-2/12 w-1/2 absolute invisible z-10 py-2 px-3 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-sm opacity-0 transition-opacity duration-300 tooltip dark:bg-gray-700'><p class='text-center'>{{__('Невходит в ТОП-20 всех исполнителей User.uz')}}</p><div class='tooltip-arrow' data-popper-arrow></div> </div></div>" ).insertAfter( $( ".tooltip-1" ) );
        }
    </script>
    @endif
    @include('sweetalert::alert')
@endsection
