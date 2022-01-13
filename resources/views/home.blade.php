@extends('layouts.app')


@section('content')
    @if ($message = Session::get('success'))
        <div  id="modal-id2" class="alert alert-success alert-block">
            <div class="flex flex-row justify-between items-center bg-[#1df700] border-t border-b text-white px-4 py-2
            text-lg font-bold">{{ $message }}
              <button onclick="toggleModal2()" type="button" class="bg-red hover:bg-[#a5f3fc] py px-2 rounded-full text-xl font-bold right-0 close" data-dismiss="alert"><i class="text-white hover:text-red-500 fas fa-times"></i></button>
            </div>
        </div>
    @endif
    <div
        class="bg-[url('https://homecleanhome.co.nz/wp-content/uploads/2015/07/Vacuum-Slider.jpg')] bg-center bg-cover h-[450px] ">
        <div class="container-lg mx-auto bg-[url('{{asset('images/pattern-dotted.svg')}}')] bg-repeat h-[450px] ">
            <main class="xl:w-[800px] lg:w-[700px] md:w-[500px] w-[350px] mx-auto">
                <div class="text-center pt-32">
                    <h1 class="font-bold text-white text-3xl lg:text-6xl md:text-4xl">
                        <span class="block xl:block">@lang('lang.header_title')</span>
                    </h1>
                    <p class="font-semibold mt-3 text-base text-white sm:mt-5 text-sm sm:mx-auto md:mt-5 md:text-lg md:mt-2 mb-3">
                        @lang('lang.header_sub')
                    </p>
                    <div class="w-full mx-auto">
                        <div class="flew bg-white hover:shadow-[0_5px_30px_-0_rgba(255,119,0,4)] transition duration-200 rounded-md mx-auto">
                            <input name="TypeList" list="TypeList" type="text" id="header_input" placeholder="@lang('lang.header_exampleSearch')"
<<<<<<< HEAD
                                   class="w-auto md:left-32 focus:outline-none rounded-md text-black md:text-lg md:pl-2 md:w-2/3 py-3">
                                <datalist  id="TypeList">
=======
                                   class="w-auto md:left-32 focus:outline-none rounded-md text-black md:text-md xl:w-[700px] lg:w-[600px] md:w-[400px] py-3">
                                <datalist id="TypeList">
>>>>>>> f20ac100caaab1fc484ce900de0c1c7df80b767e
                                    @foreach(\TCG\Voyager\Models\Category::query()->where('parent_id','!=',NULL)->get() as $category)
                                        <option
                                            value="{{ $category->name }}" id="{{ $category->id }}">{{ $category->name }}</option>
                                            <option
                                            value="{{ $category->name }}" id="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </datalist>
                                <a href="" type="submit" id="createhref"
                                        class="float-right border bg-[#f70]  border-transparent font-medium  rounded-md text-white px-3.5 py-2 mr-1 mt-[3px] md:text-md -ml-24 z-50 relative text-white">
                                    @lang('lang.header_orderBtn')
                                </a>
                                <a href="" type="submit" id="createhref"
                                        class="float-right border bg-[#f70]  border-transparent font-medium  rounded-md text-white px-3.5 py-2 mr-1 mt-[3px] md:text-md -ml-24 z-50 relative text-white">
                                    @lang('lang.header_orderBtn')
                                </a>
                        </div>
                        <div class="text-left mt-2 text-[hsla(0,0%,100%,.7)] underline-offset-1 text-sm">
                        @lang('lang.header_example') {{$random_category}}<span href="#" id="span_demo" onclick="myFunction()" class="hover:text-slate-400 cursor-pointer">@lang('lang.header_airCon')</span>
                        @lang('lang.header_example') {{$random_category}}<span href="#" id="span_demo" onclick="myFunction()" class="hover:text-slate-400 cursor-pointer">@lang('lang.header_airCon')</span>
                        </div>
                    </div>
                    <div class="w-[350px] mx-auto mt-12">
                      <a href="/verification" class="text-[#80e6ff] text-center">
                        <i class="text-blue fas fa-shield-alt float-left mr-0 text-2xl"></i>
                        <p class="ml-0 border-b border-dotted border-[#80e6ff]">@lang('lang.header_bePerformer')</p>
                      </a>
                    </div>
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
        <div class="container md:text-left text-left mx-auto mt-8 md:px-16 px-4">
            {{-- <div class="text-3xl font-bold text-center">
                @lang('lang.header_over2mln')
            </div> --}}
            <div class="text-sm text-center mt-4">
            @lang('lang.body_helpers')
            </div>
            <div class="grid md:grid-cols-3 grid-cols-1 w-full md:mt-0 mt-4">
            @foreach ($categories as $category2)
                <div class="text-gray-500 text-sm my-2 md:my-5 md:border-0 border-b md:p-0 pb-3">
                    <a href="{{route('categories', ['id'=> $category2->id])}}" class="block xl:ml-16">
                        <i class="{{ $category2->ico }} text-gray-500 hover:text-[#ffa200]">  {{ $category2->getTranslatedAttribute('name', Session::get('lang') , 'fallbackLocale' )}}</i>
                    </a>
                </div>
                @endforeach
                <!-- <div class="text-gray-500 text-lg my-8">
                    <a href="#">
                        <i class="fas fa-hammer text-gray-500"></i> Ремонт и строительство
                    </a>
                </div>
                <div class="text-gray-500 text-lg my-8">
                    <a href="#">
                        <i class="fas fa-shipping-fast text-gray-500"></i> Грузоперевозки
                    </a>
                </div>
                <div class="text-gray-500 text-lg my-8">
                    <a href="#">
                        <i class="fas fa-soap text-gray-500"></i> Уброка и помощ по хозяйству
                    </a>
                </div>
                <div class="text-gray-500 text-lg my-8">
                    <a href="#">
                        <i class="fas fa-tv text-gray-500"></i> Компьютерная помощь
                    </a>
                </div>
                <div class="text-gray-500 text-lg my-8">
                    <a href="#">
                        <i class="fas fa-camera-retro text-gray-500"></i> Фото, видео и аудио
                    </a>
                </div> -->
                <div class="md:col-span-3 text-center  col-span-1">
                    <a href="/categories/1">
                        <button type="button" class="font-semibold border hover:border-[#000] rounded-md w-64 h-12">@lang('lang.body_allService')
                        </button>
                    </a>
                </div>
            </div>
            <div class="grid md:grid-cols-3 grid-cols-1 my-8">
                <div class="text-center">
                    <img src="https://thumbs.dreamstime.com/b/%D0%B2%D0%B5%D0%BA%D1%82%D0%BE%D1%80-%D0%B7%D0%B5%D0%BB%D0%B5%D0%BD%D0%BE%D0%B3%D0%BE-%D1%86%D0%B2%D0%B5%D1%82%D0%B0-%D0%B7%D0%BD%D0%B0%D1%87%D0%BA%D0%B0-%D0%BF%D0%BE%D1%80%D1%82%D0%BC%D0%BE%D0%BD%D0%B0-115076170.jpg"
                         class="mx-auto h-[200px] w-[200px]" alt="">
                    <div class="font-bold text-xl my-4">@lang('lang.body_comfortPay')</div>
                    <div class="text-sm">
                    @lang('lang.body_securePay')
                    </div>
                </div>
                <div class="text-center mx-4">
                    <img
                        src="https://thumbs.dreamstime.com/b/%D0%B2%D0%B5%D0%BA%D1%82%D0%BE%D1%80-%D0%B7%D0%B5%D0%BB%D0%B5%D0%BD%D0%BE%D0%B3%D0%BE-%D1%86%D0%B2%D0%B5%D1%82%D0%B0-%D0%B7%D0%BD%D0%B0%D1%87%D0%BA%D0%B0-%D1%85%D0%BE%D0%BA%D0%BA%D0%B5%D1%8F-%D0%BD%D0%B0-%D0%BB%D1%8C%D0%B4%D0%B5-%D1%80%D1%83%D0%BA%D0%BE%D0%BF%D0%BE%D0%B6%D0%B0%D1%82%D0%B8%D1%8F-117033775.jpg"
                        class="mx-auto h-[200px] w-[200px]" alt="">
                    <div class="font-bold text-xl my-4">@lang('lang.body_loyalPerformer')</div>
                    <div class="text-sm">
                    @lang('lang.body_performerDocs')
                    </div>
                </div>
                <div class="text-center mx-4">
                    <img
                        src="https://avatars.mds.yandex.net/get-dialogs/1676983/eb0009385cb3f7e62b66/orig"
                        class="mx-auto h-[150px] w-[150px] m-[25px]" alt="">
                    <div class="font-bold text-xl mb-4 mt-10">@lang('lang.body_feedback')</div>
                    <div class="text-sm">
                    @lang('lang.body_over1mln')
                    </div>
                </div>
            </div>
            <!-- <div class="w-3/4 mx-auto my-8">
                <img
                    src="https://avatars.mds.yandex.net/get-adfox-content/2367573/211006_adfox_1671985_4489405.2ae5b6df3d7a04dc28f071afffa30e99.png/optimize.webp"
                    alt="">
            </div> -->
        </div>
        <div class="w-full bg-gradient-to-r from-[#fff] via-gray-400 to-[#fff] h-1 rounded-full"></div>
        <div class="w-full bg-gradient-to-r from-[#fff] via-[#f6f8fa] to-[#fff]">
            <div class="container text-center mx-auto px-16">
                <div class="md:text-4xl text-[24px] w-3/3 font-semibold mx-auto py-10 md:py-16">
                @lang('lang.body_economy')
                </div>
                <div class="grid md:grid-cols-2 grid-cols-1 mt-8 w-11/12 mx-auto">

@php $cnt_for_hiw = 0; @endphp

@foreach($howitworks as $howitwork)

@if(($cnt_for_hiw % 2) == 0)

                    <div>
                        <img class="ml-20"
                            src="/storage/{{$howitwork->image}}"
                            alt="">
                    </div>
                    <div class="text-left">
                        <h3 class="md:text-4xl text-[24px] font-semibold my-8">{{ $howitwork->getTranslatedAttribute('title',Session::get('lang') , 'fallbackLocale') }}</h3>
                        <a href="/categories/1" class="text-blue-500 underline text-[22px]">@lang('lang.body_createTask')</a>
                    </div>

@else

                    <div class="text-left my-16 md:block hidden">
                        <h3 class="text-4xl font-semibold my-8">{{ $howitwork->getTranslatedAttribute('title',Session::get('lang') , 'fallbackLocale') }}</h3>
                        {{ strip_tags($howitwork->getTranslatedAttribute('description',Session::get('lang') , 'fallbackLocale')) }}
                    </div>
                    <div class="my-16 md:block hidden">
                        <img
                            src="/storage/{{$howitwork->image}}"
                            alt="">
                    </div>

                    <div class="my-16 md:hidden block">
                        <img
                            src="/storage/{{$howitwork->image}}"
                            alt="">
                    </div>
                    <div class="text-left md:hidden block">
                        <h3 class="text-2xl font-semibold mt-8">{{ $howitwork->getTranslatedAttribute('title',Session::get('lang') , 'fallbackLocale') }}</h3>
                        <a href="/categories/1" class="text-blue-500 underline text-[22px]">@lang('lang.body_createTask')</a>
                    </div>
@endif

                    @php $cnt_for_hiw++ @endphp

@endforeach

                </div>
            </div>
            <div class="text-center md:w-1/2 w-3/4 mx-auto my-4">
                <a href="/task/create?category_id=31">
                  <button class="text-center font-semibold py-4 px-5 sm:ml-12 ml-0 bg-yellow-500 border-[#e78900] text-2xl  border-b-4">
                  @lang('lang.body_putTask')
                  </button>
                </a>
                <div class="text-center text-xl">
                @lang('lang.body_findPerformer')
                </div>
            </div>
            <div class="w-2/3 mx-auto my-8 text-center">
                <p class="text-xs text-gray-400">@lang('lang.body_ecomomyText')</p>
            </div>
        </div>
        <div class="bg-[#deeafb]">
            <div class="container mx-auto">
                <div class="text-4xl w-2/3 mx-auto py-16 text-center">
                @lang('lang.body_benefit')
                </div>
                <div class="grid grid-cols-4 w-9/12 mx-auto">
                    <div class="">
                        <img src="http://pngimg.com/uploads/ruble/ruble_PNG35.png" class="w-32" alt="">
                    </div>
                    <div class="col-span-3">
                        <h4 class="font-semibold text-2xl">@lang('lang.body_bestPrise')</h4>
                        <p class="text-md">@lang('lang.body_bestPriseCon')</p>
                    </div>
                    <div class=" my-16">
                        <img src="https://www.freeiconspng.com/uploads/white-like-icon-png-20.png" class="w-32" alt="">
                    </div>
                    <div class="col-span-3 my-16">
                        <h4 class="font-semibold text-2xl">@lang('lang.body_reliablePer')</h4>
                        <p class="text-md">@lang('lang.body_reliablePerCon')</p>
                    </div>
                    <div class=" my-16">
                        <img src="https://www.pngkit.com/png/full/245-2458956_hours-time-icon-png-white.png"
                             class="w-32" alt="">
                    </div>
                    <div class="col-span-3 my-16">
                        <h4 class="font-semibold text-2xl">@lang('lang.body_timeSaving')</h4>
                        <p class="text-md">@lang('lang.body_timeSavingCon')</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="w-full mx-auto lg:shadow-xl">
            <div
                class="grid md:grid-cols-2 grid-cols-1 md:w-11/12 w-full mx-auto md:bg-none bg-contain bg-right bg-no-repeat bg-[url('{{asset('/images/download_hand_User.png')}}')]">
                <div class="w-full sm:pl-0 pl-4 md:mt-64 md:mb-3 mt-0 mx-auto md:bg-transparent bg-[#00000066]">
                    <h4 class="font-semibold text-3xl md:text-[#000] text-[#ffff]">@lang('lang.body_personalHelper')</h4>
                    <p class="text-md mt-8 md:text-[#000] text-[#ffff]">@lang('lang.body_downloadApp')</p>
                    <a href="#">
                        <button type="button" class="w-3/10 bg-[#000] hover:bg-[#ffa200] rounded-md mt-8"><img
                                src="{{asset('images/download_ios.svg')}}"
                                alt=""></button>
                    </a>
                    <a href="#">
                        <button type="button" class="w-3/10 bg-[#000] hover:bg-[#ffa200] rounded-md mt-8"><img
                                src="{{asset('images/download_android.svg')}}"
                                alt=""></button>
                    </a>

                </div>
                <div class="h-64 md:block hidden">
                    <img
                        src="{{asset('/images/download_hand_User.png')}}"
                        class="relative float-right bottom-24" alt="">
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
                            <div class="w-full border-b-2 h-28 hover:bg-blue-100">
                                <div class="icon pt-4">
                                    <i class="fas fa-user-circle text-6xl float-left text-blue-400"></i>
                                </div>
                                <div class="mx-auto w-2/3">
                                    <a href="/detailed-tasks/{{$task->id}}" class="text-lg text-blue-400 hover:text-red-400">
                                        {{$task->getTranslatedAttribute('name',Session::get('lang') , 'fallbackLocale')}}
                                        {{$task->count()}}
                                    </a>
                                    <p class="text-sm mt-4 overflow-hidden whitespace-nowrap text-ellipsis">
                                        {{$task->getTranslatedAttribute('description',Session::get('lang') , 'fallbackLocale')}}
                                    </p>
                                </div>
                            </div>
                        @endforeach


                    </div>
                    <div class="mt-4">
                        <a href="/task-search/" type="button"
                                class="text-center pt-3 bg-[#4697fa] border-[#005ccd] text-[#fff] text-2xl h-16 w-full border-b-4">
                                @lang('lang.body_showAllTasks')
                        </a>
                    </div>
                </div>
                <div class="w-full md:col-span-1 h-full col-span-2">
                <a href="/verification">
                    <div
                        class="md:w-full w-full h-1/3 md:my-8 mt-32 mb-8 bg-center bg-cover bg-[url('https://www.roi-selling.com/hs-fs/hub/444749/file-1929610769-jpg/blog-files/team-.jpg')]">
                        <div class="w-full h-full bg-[#00000066] text-center">
                            <i class="fas fa-user text-[#84e879] text-5xl pt-8"></i>
                            <p class="lg:text-4xl md:text-2xl  text-3xl text-[#fff]">@lang('lang.body_howToJoin')</p>
                        </div>
                    </div>
                </a>
                <a href="/security">
                    <div
                         class="md:w-full w-full h-1/3 my-8 bg-center bg-cover bg-[url('https://3blaws.s3.amazonaws.com/images/bigstock-Green-energy-biofuel-electric-74257315.jpg')]">
                        <div class="w-full h-full bg-[#00000066] text-center">
                            <i class="fas fa-shield-alt text-[#8ae2ed] text-5xl pt-8"></i>
                            <p class="lg:text-4xl md:text-2xl  text-3xl text-[#fff]">@lang('lang.body_security')</p>
                        </div>
                    </div>
                </a>
                   <a href="/performers">
                        <div
                            class="md:w-full w-full h-1/3 my-8 bg-center bg-cover bg-[url('https://wallpapercave.com/wp/wp4002616.jpg')]">
                            <div class="w-full h-full bg-[#00000066] text-center">
                                <p class="lg:text-4xl md:text-2xl  text-3xl pt-8 text-[#ffc730]">@lang('lang.body_perForBusines')</p>
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
        tailwind.config = {
            module.exports = {
                purge: [],
                theme: {
                    screens: {
                        'tablet': '700px',
                    },
                    colors: {
                        'orange': '#ff8a00',
                    },
                    boxShadowColor: {
                        'sabzirang': '#ff8a00',
                    },
                }
            }
        }
    </script>
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

@endsection
