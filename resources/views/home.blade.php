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
                    <p class="mt-3 text-sm md:text-xl text-white sm:mt-5 sm:mx-auto md:mt-5 md:md:mt-2 mb-3">
                        @lang('lang.header_sub')
                    </p>
                    <div class="mx-auto">
                        <div class="w-full mx-auto">
                            <input name="TypeList" list="TypeList" type="text" id="header_input" placeholder="@lang('lang.header_exampleSearch')"
                                   class="w-full md:px-4 px-2 py-2.5 md:py-3 rounded-md focus:outline-none md:text-xl">
                                <datalist id="TypeList">
                                    @foreach(\TCG\Voyager\Models\Category::query()->where('parent_id','!=',NULL)->get() as $category)
                                        <option
                                            value="{{ $category->name }}" id="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </datalist>
                                <a href="" type="submit" id="createhref"
                                   class="float-right md:text-xl border bg-yellow-500 z-0 border-transparent rounded-md md:px-3.5 px-2 pt-2 pb-1.5 md:py-2 mr-1 md:mt-2 mt-2.5 -ml-24 md:-top-14 -top-14 relative text-white">
                                    @lang('lang.header_orderBtn')
                                </a>
                        </div>
                    </div>
                      <a href="/verification"  class="text-blue-300 hover:text-blue-400">
                        <div class="flex flex-row sm:w-1/2 w-5/6 mx-auto mt-8 items-center">
                          <i class="text-blue fas fa-shield-alt text-2xl mx-2"></i>
                          <p class="text-base underline">@lang('lang.header_bePerformer')</p>
                        </div>
                      </a>
                </div>
            </main>
        </div>
    </div>

    <script>
         function toggleModal2() {
        document.getElementById("modal-id2").classList.toggle("hidden");
         }
    </script>

    <script>
        function myFunction() {
            document.getElementById("header_input").value = document.getElementById("span_demo").innerHTML;
        }
    </script>

    <div class="fixed hidden inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full" id="my-modal">
        <!--modal content-->
        <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
            @include('profile.login')
        </div>
    </div>
    <main>
        <div class="container md:text-left text-left mx-auto mt-32 md:mt-36 md:px-16 px-4">
            <div class="text-4xl font-bold text-center pt-10">
                @lang('lang.header_over') {{$users_count}}  @lang('lang.header_performers')
            </div>
            <div class="text-base text-center mt-4">
            @lang('lang.body_helpers')
            </div>
            <div class="flex flex-wrap w-11/12 mt-14 mx-auto">
                @foreach ($categories as $category2)
                    <a  class="flex flex-row lg:w-1/3 w-full items-center my-4 lg:border-0 border-b text-gray-500 hover:text-yellow-500 " href="{{route('categories', ['id'=> $category2->id])}}">
                        <i class="{{ $category2->ico }} text-3xl"></i><span class="ml-6 text-lg"> {{ $category2->getTranslatedAttribute('name', Session::get('lang') , 'fallbackLocale' )}}</span>
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
                <div class="text-center">
                    <img src="{{asset('/images/home_page_1.jpg')}}"
                         class="mx-auto lg:h-72 lg:w-72 w-52 h-52" alt="">
                    <h1 class="font-bold my-4">@lang('lang.body_comfortPay')</h1>
                    <p class="text-sm">
                    @lang('lang.body_securePay')
                    </p>
                </div>
                <div class="text-center mx-4">
                    <img
                        src="{{ asset('/images/home_page_3.jpg') }}"
                        class="mx-auto md:h-52 md:w-52 lg:h-72 lg:w-72 w-52 h-52" alt="">
                    <h1 class="font-bold my-4">@lang('lang.body_loyalPerformer')</h1>
                    <p class="text-sm">
                    @lang('lang.body_performerDocs')
                    </p>
                </div>
                <div class="text-center mx-4">
                    <img
                        src="{{ asset('images/home_page_2.jpg') }}"
                        class="mx-auto md:h-52 md:w-52 lg:h-72 lg:w-72 w-52 h-52" alt="">
                    <h1 class="font-bold my-4">@lang('lang.body_feedback')</h1>
                    <p class="text-sm">
                    @lang('lang.body_over1mln')
                    </p>
                </div>
            </div>
        </div>

        <div class="swiper mySwiper lg:w-10/12 h-60 overflow-hidden rounded-xl mt-12">
            <div class="swiper-wrapper">
                @foreach ($reklamas as $reklama )
                <div class="swiper-slide w-full ">
                    <div class="flex border-xl w-10/12 lg:w-11/12 mx-auto">
                        <div class="w-1/2 lg:w-5/12">
                            <h1 class=" text-2xl font-semibold mb-4 lg:mr-0 md:mr-12">{{$reklama->title}}</h1>
                            <p class="text-lg mb-4">{{$reklama->comment}}</p>
                            <a href="/categories/1" class="py-2 px-4 border-solid bg-green-200 rounded-md">Создать задание</a>
                        </div>
                        <div class="w-1/2 lg:w-7/12">
                            <img src="/storage/{{$reklama->image}}"
                                 class="object-cover object-right-bottom w-full h-full rounded-r-xl"
                                 alt="">
                        </div>
                    </div>
                </div>
                @endforeach
                {{-- <div class="swiper-slide w-full ">
                    <div class="flex border-xl w-10/12 lg:w-11/12 mx-auto">
                        <div class="w-1/2 lg:w-5/12">
                            <h1 class=" text-2xl font-semibold mb-4 lg:mr-0 md:mr-12">Добро пожаловать на U-Ser</h1>
                            <p class="text-lg mb-4">«Проверенные исполнители» подтвердили свои документы на Universal Services.</p>
                            <a href="/categories/1" class="py-2 px-4 border-solid bg-green-200 rounded-md">Создать задание</a>
                        </div>
                        <div class="w-1/2 lg:w-7/12">
                            <img src="{{ asset('/images/homepage_slide1.jfif') }}"
                                 class="object-cover object-right-bottom w-full h-full rounded-r-xl"
                                 alt="">
                        </div>
                    </div>
                </div> --}}
            </div>
            <div class="text-white swiper-button-next"></div>
            <div class="text-white swiper-button-prev"></div>
        </div>

        <!-- Swiper JS -->
        <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
        <script>
            var swiper = new Swiper('.mySwiper', {
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev',
                },
            });
        </script>

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
                        <img class="lg:ml-0  mx-auto  w-42 h-42"
                            src="/storage/{{$howitwork->image}}"
{{--                            src="https://assets.youdo.com/next/_next/static/images/hiw-1-be91158a87ea183e3cd3e3dcc56471a5.png"--}}
                            alt="">
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
                        <img class="lg:ml-0  mx-auto w-42 h-42"
                            src="/storage/{{$howitwork->image}}"
{{--                            src="https://assets.youdo.com/next/_next/static/images/hiw-2-aa57365db5ca978385ac301a2ef6a5e8.png"--}}
                            alt="">
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
            <div class="w-2/3 mx-auto my-8 text-center">
                <p class="text-xs text-gray-400">@lang('lang.body_ecomomyText')</p>
            </div>
        </div>
        <div class="bg-blue-100">
            <div class="w-11/12 md:w-9/12 mx-auto pb-24">
                <div class="text-3xl md:text-4xl mx-auto py-16 text-center">
                @lang('lang.body_benefit')
                </div>
                <div class="grid lg:grid-cols-4 grid-cols-4 grid-cols-1 w-full md:w-11/12 mx-auto gap-y-12">
                    @foreach ($advants as $advant )
                    <div class="col-span-1 md:my-auto sm:mr-0 mr-4">
                        <img src="/storage/{{$advant->image}}" class="md:w-32 md:h-32 h-24 w-24" alt="">
                    </div>
                    <div class="col-span-3 ml-5">
                        <h4 class="font-semibold text-xl md:text-2xl">{{$advant->getTranslatedAttribute('title',Session::get('lang') , 'fallbackLocale')}}</h4>
                        <p class="text-base">{{$advant->getTranslatedAttribute('description',Session::get('lang') , 'fallbackLocale')}}</p>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="w-full mx-auto lg:shadow-xl">
            <div
                class="grid md:grid-cols-2 grid-cols-1 md:w-11/12 lg:w-11/12 xl:w-9/12 w-full mx-auto md:bg-none bg-contain bg-right bg-no-repeat" style="background-image: url('{{asset('/images/download_hand_User.png')}}')">
                <div class="w-11/12 sm:pl-0 pl-4 md:mt-64 md:mb-3 mt-0 mx-auto md:bg-transparent">
                    <h4 class="font-semibold text-3xl md:text-black text-gray-500">@lang('lang.body_personalHelper')</h4>
                    <p class="text-base mt-8 md:text-black">@lang('lang.body_downloadApp')</p>
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
                <div class="h-64 md:block hidden">
                    <img
                        src="{{asset('/images/download_hand_User.png')}}"
                        class="relative float-right bottom-5" alt="">
                </div>
            </div>
        </div>
        <div class="container mx-auto md:w-2/3 w-11/12">
            <div class="w-full my-16">
                <h1 class="text-4xl">@lang('lang.body_whatOthersDoing')</h1>
            </div>
            <div class="grid md:grid-cols-3 grid-cols-2 mx-auto mb-48">
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
                        <a href="/task-search/" type="button"
                                class="text-center py-2 bg-blue-500 border-blue-500 text-white text-3xl w-full border-b-4">
                                @lang('lang.body_showAllTasks')
                        </a>
                    </div>
                </div>
                <div class="w-full md:col-span-1 h-full col-span-2">
                <a href="/verification">
                    <div
                        class="md:w-full w-full h-1/3 md:my-8 mt-32 mb-8 bg-center bg-cover" style="background: url('https://www.roi-selling.com/hs-fs/hub/444749/file-1929610769-jpg/blog-files/team-.jpg');">
                        <div class="w-full h-full bg-black bg-opacity-40 text-center">
                            <i class="fas fa-user text-green-300 text-5xl pt-8"></i>
                            <p class="lg:text-4xl xl:text-4xl md:text-2xl text-4xl font-medium text-white">@lang('lang.body_howToJoin')</p>
                        </div>
                    </div>
                </a>
                <a href="/security">
                    <div
                         class="md:w-full w-full h-1/3 my-8 bg-center bg-cover" style="background: url('https://3blaws.s3.amazonaws.com/images/bigstock-Green-energy-biofuel-electric-74257315.jpg');">
                        <div class="w-full h-full bg-black bg-opacity-40 text-center">
                            <i class="fas fa-shield-alt text-blue-400 text-5xl pt-8"></i>
                            <p class="lg:text-4xl xl:text-4xl md:text-2xl text-4xl text-white">@lang('lang.body_security')</p>
                        </div>
                    </div>
                </a>
                   <a href="/performers">
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
    <script>
        // Grabs all the Elements by their IDs which we had given them
        let modal = document.getElementById("my-modal");

        let btn = document.getElementById("open-btn");

        // let button = document.getElementById("ok-btn");

        // We want the modal to open when the Open button is clicked
        btn.onclick = function () {
            modal.style.display = "block";
        }
        // We want the modal to close when the OK button is clicked
        // button.onclick = function() {
        //     modal.style.display = "none";
        // }
        // The modal will close when the user clicks anywhere outside the modal
        window.onclick = function (event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>

    <!-- <script>
        window.replainSettings = {id: '38d8d3f0-b690-4857-a153-f1e5e8b462a8'};
        (function (u) {
            var s = document.createElement('script');
            s.type = 'text/javascript';
            s.async = true;
            s.src = u;
            var x = document.getElementsByTagName('script')[0];
            x.parentNode.insertBefore(s, x);
        })('https://widget.replain.cc/dist/client.js');
    </script> -->
    <script>
        setInterval(function () {
            var elem = document.getElementById('scrollbar');
            elem.scrollTop = elem.scrollHeight;
        }, 5000);
    </script>
    <script>
    function myFunctionesse() {
      var elems = document.getElementsByClassName("chat");
        elems.style.display = "block";
    }
    </script>
    <script>
        $("input[name=TypeList]").focusout(function(){
        });
        $(function() {
        $('#header_input').on('input',function() {
            var opt = $('option[value="'+$(this).val()+'"]');
            $("#createhref").attr("href", '/task/create?category_id='+opt.attr('id'));
        });
        });
    </script>
    <div class="w-full" x-data="topBtn">
        <button onclick="topFunction()" id="myBtn" title="Go to top" class="fixed z-10 hidden p-3 bg-gray-100 rounded-full shadow-md bottom-5 right-24 animate-bounce">
            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 10l7-7m0 0l7 7m-7-7v18">
                </path>
            </svg>
        </button>
    </div>

    <script>
        //Get the button
        var mybutton = document.getElementById("myBtn");

        // When the user scrolls down 20px from the top of the document, show the button
        window.onscroll = function() {
            scrollFunction()
        };

        function scrollFunction() {
            if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                mybutton.style.display = "block";
            } else {
                mybutton.style.display = "none";
            }
        }

        // When the user clicks on the button, scroll to the top of the document
        function topFunction() {
            document.body.scrollTop = 0;
            document.documentElement.scrollTop = 0;
        }
    </script>
    <script>
        module.exports = {
            theme: {
                textColor: {
                    'primary': '#3490dc',
                    'secondary': '#ffed4a',
                    'danger': '#e3342f',
                    'whiteblue': '#80e6ff';
                }
            }
        }
    </script>
@endsection
