@extends('layouts.app')


@section('content')
    @if ($message = Session::get('success'))
        <div  id="modal-id2" class="alert alert-success alert-block">
            <div class="flex flex-row justify-between items-center bg-green-500 border-t border-b text-white px-4 py-2
            font-bold">{{ $message }}
              <button onclick="toggleModal2()" type="button" class="bg-red-500 hover:bg-blue-200 py px-2 rounded-full text-xl font-bold right-0 close" data-dismiss="alert"><i class="text-white hover:text-red-500 fas fa-times"></i></button>
            </div>
        </div>
    @endif
    <link rel="stylesheet" href="{{ asset ('/css/header.css') }}">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css"/>
    <div class="HomepageHeaderSection">
        <div class="video-bg">
            @if(setting('site.Video_bg') != null)
            @php
            $array_video = json_decode(setting('site.Video_bg'), true);
                $str_replace = str_replace("\\","/",$array_video);
            @endphp
            <video src="storage/{{$array_video['0']['download_link']}}" type="video/mp4" autoplay muted loop></video>
            @else
            @php
                $pp = setting('site.foto_bg');
                $str_replace = str_replace("\\","/",$pp);
            @endphp
{{--            <img src="storage/{{$str_replace}}" alt="rasm yoq">--}}
            <img src="{{ asset('/images/uborka1.jpg') }}" alt="rasm yoq">
            @endif
            <div class="effects"></div>
            <div class="video-bg__content"></div>
        </div>
    </div>
    <div class="relative z-999 top-0 left-50">
        <div class="w-xl">
            <main class="md:w-7/12 w-10/12 mx-auto">
                <div class="text-center pt-24">
                    <h1 class="font-bold text-white text-4xl lg:text-5xl">
                        <span class="block">@lang('lang.header_title')</span>
                    </h1>
                    <p class="mt-3 text-sm md:text-base text-white sm:mt-5 sm:mx-auto md:mt-3 md:md:mt-2 mb-3">
                        @lang('lang.header_sub')
                    </p>
                    <div class="mx-auto">
                        <div class="lg:w-10/12 w-full mx-auto flex-1">
                            <input name="TypeList" list="TypeList" type="text" id="header_input" placeholder="@lang('lang.header_exampleSearch')"
                                   class="input_text w-full md:px-4 px-2 py-2.5 md:py-3 rounded-md focus:placeholder-transparent focus:outline-none focus:border-yellow-500 flex-1 md:text-xl text-lg">
                                <datalist id="TypeList">
                                    @foreach(\TCG\Voyager\Models\Category::query()->where('parent_id','!=',NULL)->get() as $category)
                                        <option
                                            value="{{ $category->getTranslatedAttribute('name',Session::get('lang') , 'fallbackLocale') }}" id="{{ $category->id }}">{{ $category->getTranslatedAttribute('name',Session::get('lang') , 'fallbackLocale') }}</option>
                                    @endforeach
                                </datalist>
                                <a href="" type="submit" id="createhref"
                                   class="float-right sm:block hidden md:text-xl text-lg border bg-yellow-500 z-0 border-transparent rounded-md md:px-3.5 px-2 pt-2 pb-1.5 md:py-2.2 mr-1 md:mt-2 mt-2.5 -ml-24 md:-top-14 -top-14 relative text-white">
                                    @lang('lang.header_orderBtn')
                                </a>
                                <a href="" type="submit" id="createhref"
                                   class="float-right sm:hidden block  md:text-xl  text-lg border bg-yellow-500 z-0 border-transparent rounded-md md:px-3.5 px-2 pt-2 pb-1.5 md:py-2 mr-1 md:mt-2 mt-2.5 -ml-24 md:-top-14 -top-14 relative text-white">
                                    Заказать
                                </a>
                                <div class="text-left mt-2 text-gray-300 font-semibold underline-offset-1 text-xs">
                                    @lang('lang.header_example')<a href="/task/create?category_id=22" id="span_demo" onclick="myFunction()" class="hover:text-slate-400  hover:text-gray-200 cursor-pointer"> @lang('lang.random_cat')</a>
                                </div>
                        </div>
                    </div>
                    <div class="flex flex-row sm:w-1/2 w-5/6 mx-auto mt-8 items-center text-blue-300 hover:text-blue-400">
                        <a href="{{route('verification')}}"><i class="text-blue fas fa-shield-alt text-2xl mx-2"></i></a>
                        <a href="{{route('verification')}}"> <p class="text-base underline">@lang('lang.header_bePerformer')</p></a>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <div class="fixed hidden inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full" id="my-modal">
        <!--modal content-->
        <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
            @include('profile.login')
        </div>
    </div>
    <main>
        <div class="container md:text-left text-left mx-auto md:px-16 px-4 sm:pt-40 pt-36">
            <div class="text-4xl font-bold text-center">
                @lang('lang.header_over') {{$users_count}}  @lang('lang.header_performers')
            </div>
            <div class="text-base text-center mt-4">
            @lang('lang.body_helpers')
            </div>
            <div class="flex flex-wrap w-11/12 mt-14 mx-auto">
                @foreach ($categories as $category2)
                    <a  class="flex flex-row lg:w-1/3 w-full items-center my-4 lg:border-0 border-b text-gray-500 hover:text-yellow-500 " href="{{route('categories', ['id'=> $category2->id])}}">
                        <i class="{{ $category2->ico }} text-xl md:text-3xl"></i><span class="ml-6 text-sm md:text-lg"> {{ $category2->getTranslatedAttribute('name', Session::get('lang') , 'fallbackLocale' )}}</span>
                    </a>
                @endforeach
            </div>
            <div class="mb-4 mt-8 text-center text-base">
                <a href="/categories/1">
                    <button type="button" class="font-semibold border hover:border-black duration-300 rounded-md w-64 h-12">@lang('lang.body_allService')
                    </button>
                </a>
            </div>
            <div class="grid md:grid-cols-3 grid-cols-1 my-8">
                @foreach ($trusts as $trust)
                    <div class="text-center">
                        <img src="/storage/{{$trust->image}}"
                            class="mx-auto lg:h-72 lg:w-72 w-52 h-52" alt="">
                        <h1 class="font-bold my-4">{{ $trust->getTranslatedAttribute('title',Session::get('lang') , 'fallbackLocale') }}</h1>
                        <p class="text-sm">{{ $trust->getTranslatedAttribute('description',Session::get('lang') , 'fallbackLocale') }}</p>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="bg-gray-50">
        <div class="swiper mySwiper xl:w-10/12 lg:w-11/12 md:w-10/12 h-60 overflow-hidden rounded-xl mt-12 ">
            <div class="swiper-wrapper">
                @foreach ($reklamas as $reklama )
                <div class="swiper-slide w-full items-center  mt-12" >
                    <div class="flex border-xl sm:w-10/12 w-3/4 lg:w-11/12 mx-auto">
                        <div class="w-1/2 lg:pl-8  md:pl-6 sm:pl-4 lg:w-5/12">
                            <h1 class="sm:text-lg text-base md:text-2xl font-semibold mb-4 lg:mr-0 md:mr-12">{{ $reklama->getTranslatedAttribute('title',Session::get('lang') , 'fallbackLocale') }}</h1>
                            <p class="sm:text-base text-sm md:text-lg mb-4">{{ $reklama->getTranslatedAttribute('comment',Session::get('lang') , 'fallbackLocale') }}</p>
                            <a href="/categories/1" class="py-2 sm:px-4 px-2 border-solid md:text-base text-xs bg-green-200 rounded-md">@lang('lang.navbar_createTask')</a>
                        </div>
                        <div class="w-1/2 lg:pr-8 md:pr-6 sm:pr-4 lg:w-7/12 ">
                            <img src="/storage/{{$reklama->image}}"
                                 class="object-cover object-right-bottom w-full h-full  "
                                 alt="">
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="text-white swiper-button-next"></div>
            <div class="text-white swiper-button-prev"></div>
        </div></div>
        <div class="w-full bg-gradient-to-r from-white via-gray-400 to-white h-1 rounded-full"></div>
        <div class="w-full bg-gradient-to-r from-white via-gray-100 to-white">
            <div class="container text-center mx-auto px-16">
                <div class="text-4xl mx-auto py-10 md:py-16">
                @lang('lang.body_economy')
                </div>
                <div class="grid md:grid-cols-2 grid-cols-1 mt-8 w-11/12 mx-auto">

@php $cnt_for_hiw = 0; @endphp

@foreach($howitworks as $howitwork)

@if(($cnt_for_hiw % 2) == 0)

                    <div>
                        <img class="lg:ml-0  mx-auto  w-42 h-42" src="/storage/{{$howitwork->image}}" alt="">
                    </div>
                    <div class="md:text-left text-center">
                        <h3 class="text-3xl my-8">{{ $howitwork->getTranslatedAttribute('title',Session::get('lang') , 'fallbackLocale') }}</h3>
                        <a href="/categories/1" class="text-blue-500 underline text-xl">@lang('lang.body_createTask')</a>
                    </div>

@else

                    <div class="md:text-left text-center my-16 md:block hidden">
                        <h1 class="text-3xl my-8">{{ $howitwork->getTranslatedAttribute('title',Session::get('lang') , 'fallbackLocale') }}</h1>
                        <h2 class="text-xl">{{ strip_tags($howitwork->getTranslatedAttribute('description',Session::get('lang') , 'fallbackLocale')) }}</h2>
                    </div>
                    <div class="my-16 md:block hidden">
                        <img class="lg:ml-0  mx-auto w-42 h-42" src="/storage/{{$howitwork->image}}" alt="">
                    </div>

                    <div class="my-16 md:hidden block">
                        <img class="lg:ml-0 mx-auto w-42 h-42"
                            src="/storage/{{$howitwork->image}}"
                            alt="">
                    </div>
                    <div class="md:text-left text-center md:hidden block">
                        <h3 class="text-3xl mt-8">{{ $howitwork->getTranslatedAttribute('title',Session::get('lang') , 'fallbackLocale') }}</h3>
                        <a href="/categories/1" class="text-blue-500 underline text-xl">@lang('lang.body_createTask')</a>
                    </div>
                @endif
                    @php $cnt_for_hiw++ @endphp
            @endforeach
                </div>
            </div>
            <div class="text-center w-full mx-auto my-4">
                <a href="/task/create?category_id=31">
                  <button class="text-center py-4 px-5  bg-yellow-500 border-yellow-500 text-3xl border-b-4">
                  @lang('lang.body_putTask')
                  </button>
                </a>
                <div class="text-center text-2xl">
                @lang('lang.body_findPerformer')
                </div>
            </div>
        </div>
        <div class="bg-blue-100">
            <div class="w-11/12 md:w-9/12 mx-auto pb-24">
                <div class="text-3xl md:text-4xl mx-auto py-16 text-center">
                @lang('lang.body_benefit')
                </div>
                <div class="grid lg:grid-cols-4 grid-cols-4 grid-cols-1 w-full md:w-11/12 mx-auto gap-y-12">
                    @foreach ($advants as $advant )
                    <div class="col-span-1 md:my-auto sm:mr-0 mr-4 rounded-lg">
                        <img src="/storage/{{$advant->image}}" class="md:w-32 md:h-32 h-24 w-24 rounded-lg"  alt="">
                    </div>
                    <div class="col-span-3 ml-5">
                        <h4 class="font-semibold text-xl md:text-2xl">{{$advant->getTranslatedAttribute('title',Session::get('lang') , 'fallbackLocale')}}</h4>
                        <p class="text-base">{{$advant->getTranslatedAttribute('description',Session::get('lang') , 'fallbackLocale')}}</p>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="w-full mx-auto shadow-xl md:-mt-20 bg-contain bg-right bg-no-repeat" style="background-image: url('{{asset('/images/download_hand_User.png')}}')">
            <div class="grid md:grid-cols-2 grid-cols-1 md:w-11/12 lg:w-11/12 xl:w-9/12 w-full mx-auto md:bg-transparent  bg-black bg-opacity-50">
                <div class="md:w-11/12 w-5/5 sm:pl-0 pl-4 md:mt-48 md:mb-3 mt-0 md:mx-auto mx-4 md:mt-0 mt-14 md:bg-transparent pb-24">
                    <h4 class="font-semibold text-3xl text-white md:text-gray-500">@lang('lang.body_personalHelper')</h4>
                    <p class="text-base mt-8 text-white md:text-black">@lang('lang.body_downloadApp')</p>
                    <a href="#">
                        <button type="button" class="w-3/10 bg-black hover:bg-yellow-500 rounded-md mt-8"><img
                                src="{{asset('images/download_ios.svg')}}"
                                alt=""></button>
                    </a>
                    <a href="#">
                        <button type="button" class="w-3/10 bg-black hover:bg-yellow-500 rounded-md mt-8"><img
                                src="{{asset('images/download_android.svg')}}"
                                alt=""></button>
                    </a>

                </div>

            </div>
        </div>
        <div class="container mx-auto md:w-2/3 w-11/12">
            <div class="w-full my-16">
                <h1 class="text-4xl">@lang('lang.body_whatOthersDoing')</h1>
            </div>
            <div class="grid md:grid-cols-3 grid-cols-2 mx-auto mb-56">
                <div id="scrollbar" class="col-span-2 md:w-10/12 w-full h-screen blog1 mt-8">
                    <div class="w-full overflow-y-scroll w-full h-screen">

                        @foreach($tasks as $task)
                            <div class="w-full border-b-2 h-28 hover:bg-blue-100 overflow-hidden">
                                <div class="icon pt-4">
                                    <i class="fas fa-user-circle text-6xl mr-4 float-left text-blue-400"></i>
                                </div>
                                <div class="mx-auto w-2/3">
                                    <a href="/detailed-tasks/{{$task->id}}" class="xl:text-2xl md:text-xl text-2xl text-blue-400 hover:text-red-400">
                                        {{$task->name}}
                                    </a>
                                    <p class="text-xl mt-2 overflow-hidden whitespace-nowrap text-ellipsis">
                                        {{$task->description}}
                                    </p>
                                </div>
                            </div>
                        @endforeach


                    </div>
                    <div class="mt-4">
                        <a href="{{route('task.search')}}" type="button"
                                class="text-center py-2 bg-blue-500 border-blue-500 text-white text-3xl w-full border-b-4">
                                @lang('lang.body_showAllTasks')
                        </a>
                    </div>
                </div>
                <div class="w-full md:col-span-1 h-full col-span-2">
                <a href="{{route('verification')}}">
                    <div
                        class="md:w-full w-full h-1/3 md:my-8 mt-32 mb-8 bg-center bg-cover" style="background: url('https://www.roi-selling.com/hs-fs/hub/444749/file-1929610769-jpg/blog-files/team-.jpg');">
                        <div class="w-full h-full bg-black bg-opacity-40 text-center">
                            <i class="fas fa-user text-green-300 text-5xl pt-8"></i>
                            <p class="lg:text-4xl xl:text-4xl md:text-2xl text-4xl font-medium text-white">@lang('lang.body_howToJoin')</p>
                        </div>
                    </div>
                </a>
                <a href="{{route('security')}}">
                    <div
                         class="md:w-full w-full h-1/3 my-8 bg-center bg-cover" style="background: url('https://3blaws.s3.amazonaws.com/images/bigstock-Green-energy-biofuel-electric-74257315.jpg');">
                        <div class="w-full h-full bg-black bg-opacity-40 text-center">
                            <i class="fas fa-shield-alt text-blue-400 text-5xl pt-8"></i>
                            <p class="lg:text-4xl xl:text-4xl md:text-2xl text-4xl text-white">@lang('lang.body_security')</p>
                        </div>
                    </div>
                </a>
                   <a href="{{route('performers')}}">
                        <div
                            class="md:w-full w-full h-1/3 my-8 bg-center bg-cover" style="background: url('https://wallpapercave.com/wp/wp4002616.jpg');">
                            <div class="w-full h-full bg-black bg-opacity-40 text-center">
                                <p class="lg:text-4xl xl:text-4xl md:text-2xl text-4xl pt-12 text-yellow-500">@lang('lang.body_perForBusines')</p>
                            </div>
                        </div>
                   </a>
                </div>
            </div>
        </div>
    </main>
    <div class="w-full">
        <button onclick="topFunction()" id="myBtn" title="Go to top" class="fixed z-10 hidden p-3 bg-gray-100 rounded-full shadow-md bottom-5 right-24 animate-bounce">
            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 10l7-7m0 0l7 7m-7-7v18">
                </path>
            </svg>
        </button>
    </div>
    <!-- Swiper JS -->
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script src="{{ asset('js/home.js') }}"></script>

@endsection
