@extends('layouts.app')

@section('content')

    <div class="text-sm w-full bg-gray-200 my-4 py-3">
        <p class="w-8/12 mx-auto text-gray-500 font-normal">@lang('lang.perf_youreInUser') <br>
            @lang('lang.perf_forOffer')</p>
    </div>
    <div class="xl:w-8/12 mx-auto mt-16 text-base">
        <div class="grid grid-cols-3 ">

            {{-----------------------------------------------------------------------------------}}
            {{--                             Left column                                       --}}
            {{-----------------------------------------------------------------------------------}}

            <div class="lg:col-span-1 col-span-3 px-8">
                <a href="/verification" class="flex flex-row shadow-lg rounded-lg mb-8">
                    <div class="w-1/2 h-24 bg-contain bg-no-repeat bg-center" style="background-image: url({{asset('images/like.png')}});">
                    </div>
                    <div class="font-bold text-xs text-gray-700 text-left my-auto">
                        @lang('lang.perfCat_becomePerf')
                    </div>
                </a>

                <div>
                    <div class="max-w-md mx-left">
                        @foreach (\TCG\Voyager\Models\Category::query()->where('parent_id', null)->get() as $category)
                            <div x-data={show:false} class="rounded-sm">
                                <div class="my-3 text-blue-500 hover:text-red-500 cursor-pointer" id="{{ str_replace(' ', '', $category->name) }}">
                                    {{ $category->getTranslatedAttribute('name',Session::get('lang') , 'fallbackLocale') }}
                                </div>
                                <div id="{{$category->slug}}" class="px-8 py-1 hidden">
                                    @foreach (\TCG\Voyager\Models\Category::query()->where('parent_id', $category->id)->get() as $category2)

                                        <div>
                                            <a href="/perf-ajax/{{ $category2->id }}" class="text-blue-500 cursor-pointer hover:text-red-500 my-1 send-request" data-id="{{$category2->id}}">{{ $category2->getTranslatedAttribute('name',Session::get('lang') , 'fallbackLocale') }}</a>
                                        </div>

                                    @endforeach
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="lg:col-span-2 col-span-3 lg:mt-0 mt-16">
                <div class="bg-gray-100 h-40 rounded-xl w-full sm:mx-0 mx-auto">
                    <div class="font-bold text-2xl mx-8 py-4">
                        <p>@lang('lang.perfCat_allPerf')</p>
                    </div>
                    <div class="form-check flex flex-row mx-8 mt-10">
                        <input class="focus:outline-none  form-check-input h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-black-600 checked:border-black-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer"
                               type="checkbox" value="1" onchange="check()" id="online">
                        <label class="form-check-label inline-block text-gray-800" for="online">
                            @lang('lang.perfCat_nowInSite')
                        </label>
                    </div>
                </div>
                <div class="sortable">
                @foreach($users as $user)
                    <div class="score scores{{$user->id}} w-12/12 m-5 h-[200px] flex md:flex-none overflow-hidden md:overflow-visible mb-10 " id="{{$user->id}}" about="">
                        <div class="w-34 float-left">
                            <img class="rounded-lg w-32 h-32 bg-black mb-4 mr-4" @if ($user->avatar == Null)src='{{asset("storage/images/default.jpg")}}' @else src="{{asset("storage/{$user->avatar}")}}" @endif alt="avatar">
                            <div class="flex flex-row items-center text-base">
                                <p class="text-black ">@lang('lang.perfCat_feedbacks')</p>
                                <i class="far fa-thumbs-up text-blue-500 ml-1 mb-1 like{{$user->id}}"></i>
                                <span class="text-gray-800 mr-2">{{ $user->reviews()->where('good_bad',1)->count()}}</span>
                                <i class="far fa-thumbs-down mt-0.5 text-blue-500 dislike{{$user->id}}"></i>
                                <span class="text-gray-800 ">{{ $user->reviews()->where('good_bad',0)->count()}}</span>
                            </div>
                            <div class="flex flex-row stars{{$user->id}}">
                            </div>
                            <script>
                                $(document).ready(function(){
                                    var good = $(".like{{$user->id}}").text();
                                    var bad = $(".dislike{{$user->id}}").text();
                                    var allcount = good * 5;
                                    var coundlikes = (good * 1) + (bad * 1);
                                    var overallStars = allcount / coundlikes;
                                    var star = overallStars.toFixed();
                                    if (!isNaN(star)) {
                                        for (let i = 0; i < star; i++) {
                                            $(".stars{{$user->id}}").append('<i class="fas fa-star text-yellow-500"></i>');
                                        }
                                        for (let u = star; u < 5; u++) {
                                            $(".stars{{$user->id}}").append('<i class="fas fa-star text-gray-500"></i>');
                                        }
                                    }else {
                                        for (let e = 0; e < 5; e++) {
                                            $(".stars{{$user->id}}").append('<i class="fas fa-star text-gray-500"></i>');
                                        }
                                    }
                                });
                            </script>
                        </div>
                        <div class="w-4/5 md:float-none md:float-none">
                            <div >
                                <a class="user" href="performers/{{$user->id}}">
                                    <p class="lg:text-3xl text-2xl underline text-blue-500 performer-page{{$user->id}} hover:text-red-500" id="{{$user->id}}"> {{$user->name}}</p>
                                </a>
                            </div>
                            <div>
                                @if($user->active_status == 1)
                                    <p class="text-sm text-green-500 my-3"><i class="fa fa-circle text-xs text-green-500 mr-2 mt-1"> </i> @lang('lang.exe_online')</p>

                                @else
                                    <p class="text-sm text-gray-500 my-3">@lang('lang.exe_offline')</p>
                                @endif

                            </div>
                            <div>
                                <p class="text-base  leading-0  ">
                                    {{substr($user->description, 0, 100)}}...

                                </p>
                            </div>
                            <div class="mt-6">
                                @auth
                                @if($tasks->count() > 0)
                                    <a id="open{{$user->id}}" class="cursor-pointer rounded-lg py-2 px-1 md:px-3 font-bold bg-yellow-500 hover:bg-yellow-600 transition duration-300 text-white">
                                        Предложить задание
                                    </a>
                                @else
                                    <a href="#"  onclick="toggleModal12('modal-id12')" class="hidden lg:block">
                                        <button class="rounded-lg py-2 px-1 md:px-3 font-bold bg-yellow-500 hover:bg-yellow-600 transition duration-300 text-white mt-3">@lang('lang.exe_giveTbtn')</button>
                                    </a>
                                @endif
                                @endauth
                            </div>
                        </div>
                    </div>
                @endforeach
                </div>
            </div>
        </div>
        <div id="modal_content" class="modal_content fixed top-0 left-0 h-full w-full bg-black bg-opacity-50 hidden text-center">
            <div class="modal relative bg-white w-5/12 mx-auto p-10 rounded-md justify-center mt-48 ease-in transition duration-500">
                <h1 class="text-3xl font-semibold">Выберите задание, которое хотите предложить исполнителью</h1>
                @foreach($tasks as $task)
                    <label>
                        <input type="text" name="tasks_id" class="hidden" value="{{ $task->id }}">
                    </label>
                @endforeach

{{--                <form action="" method="POST">--}}
                    @csrf
                    <select name="tasks" id="task_name" onchange="showDiv(this)" class="appearance-none focus:outline-none border border-solid border-gray-500 rounded-lg text-gray-500 px-6 py-2 text-lg mt-6 hover:text-yellow-500  hover:border-yellow-500 hover:shadow-xl shadow-yellow-500 mx-auto block"><br>

                        @foreach($tasks as $task)
                            @auth
                                <option value="{{ $task->id }}">
                                    {{ $task->name }}
                                </option>
                            @endauth
                        @endforeach
                        <option value="1">
                            + новое задание
                        </option>
                    </select>
                <label>
                    <input type="text" name="csrf" class="hidden" value="{{ csrf_token() }}">
                </label>

                <div id="hidden_div">
                        <button type="submit" onclick="myFunction()" class="cursor-pointer bg-red-500 text-white rounded-lg p-2 px-4 mt-4">
                            Предложить работу
                        </button>
                        <p class="py-7">Каждое задание можно предложить пяти исполнителям из каталога. исполнители получат СМС со ссылкой на ваше задание.</p>
                    </div>



                <a href="/categories/1">
                    <button id="hidden_div2" class="cursor-pointer bg-green-500 text-white rounded-lg p-2 px-4 mt-6 mx-auto" style="display: none;">
                        Создать новое задание
                    </button>
                </a>

                <button class="cursor-pointer close text-gray-400 font-bold rounded-lg p-2 px-4 mt-6 absolute -top-6 right-0 text-2xl">
                    x
                </button>
            </div>
        </div>
        <div id="modal" style="display: none">
            <div class="modal h-screen w-full fixed left-0 top-0 flex justify-center items-center bg-black bg-opacity-50">
                <div class="bg-white rounded shadow-lg w-10/12 md:w-1/3 text-center py-12">
                    <h1 class="text-2xl font-bold namem"></h1>
                    <div class="mx-auto mt-8">
                        @lang('lang.modal_alert1')
                    </div>
                    <button onclick="myFunction1()" class="cursor-pointer bg-green-500 text-white rounded-lg p-2 px-4 mt-6 mx-auto">
                        ok
                    </button>
                </div>
            </div>
        </div>
        {{-- Modal start --}}
        <div class="hidden overflow-x-hidden overflow-y-auto bg-black bg-opacity-50 fixed inset-0 z-50 outline-none focus:outline-none justify-center items-center" id="modal-id12">
            <div class="relative w-auto my-6 mx-auto max-w-3xl"  id="modal-id12">
                <div class="border-0 rounded-lg shadow-lg relative flex flex-col w-full bg-white outline-none focus:outline-none">
                    <div class=" text-center p-12  rounded-t">
                        <button type="submit"  onclick="toggleModal12('modal-id12')" class="rounded-md w-100 h-16 absolute top-1 right-4">
                            <i class="fas fa-times  text-slate-400 hover:text-slate-600 text-xl w-full"></i>
                        </button>
                        <h3 class="font-medium text-4xl block mt-4">
                            @lang('lang.exe_youHaventT')
                        </h3>
                    </div>
                    <!--body-->
                    <div class="relative p-6 flex-auto">
                        <p class="my-4  text-lg  text-center">
                            @lang('lang.exe_createTFirst')
                        </p>
                    </div>
                    <div class="flex mx-auto items-center justify-end p-6 rounded-b mb-8">
                        <div class="mt-4 ">
                            <a class="px-10 py-4 text-center font-sans  text-xl  font-semibold bg-green-500 text-white hover:bg-green-600  h-12 rounded-md text-xl" href="/categories/1" >@lang('lang.exe_createTask')</a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- Основной контент страницы -->
    <div id="modal" style="display: none">
        <div class="modal h-screen w-full fixed left-0 top-0 flex justify-center items-center bg-black bg-opacity-50">
            <!-- modal -->
            <div class="bg-white rounded shadow-lg w-10/12 md:w-1/3 text-center py-12">
                <!-- modal header -->
                <h1 class="text-2xl font-bold">Вы предложили задание "Test" исполнителю Елена Б.</h1>
                <div class="mx-auto mt-8">
                    Мы отправили ему уведомление.
                </div>
                <button onclick="myFunction1()" class="cursor-pointer bg-green-500 text-white rounded-lg p-2 px-4 mt-6 mx-auto">
                    ok
                </button>
            </div>
        </div>
    </div>
    @csrf

    {{-- Modal start --}}
    <div class="hidden overflow-x-hidden overflow-y-auto fixed inset-0 z-50 outline-none focus:outline-none justify-center items-center" id="modal-id12">
        <div class="relative w-auto my-6 mx-auto max-w-3xl"  id="modal-id12">
            <div class="border-0 rounded-lg shadow-lg relative flex flex-col w-full bg-white outline-none focus:outline-none">
                <div class=" text-center p-12  rounded-t">
                    <button type="submit"  onclick="toggleModal12('modal-id12')" class="rounded-md w-100 h-16 absolute top-1 right-4">
                        <i class="fas fa-times  text-slate-400 hover:text-slate-600 text-xl w-full"></i>
                    </button>
                    <h3 class="font-medium text-4xl block mt-4">
                        @lang('lang.exe_youHaventT')
                    </h3>
                </div>
                <!--body-->
                <div class="relative p-6 flex-auto">
                    <p class="my-4   text-center">
                        @lang('lang.exe_createTFirst')
                    </p>
                </div>
                <!--footer-->
                <div class="flex mx-auto items-center justify-end p-6 rounded-b mb-8">
                    <div class="mt-4 ">
                        <a class="px-10 py-4 text-center font-sans  text-xl  font-semibold bg-green-500 text-white hover:bg-green-500  h-12 rounded-md text-xl" href="/categories/1" >@lang('lang.exe_createTask')</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="hidden opacity-25 fixed inset-0 z-40 bg-black" id="modal-id12-backdrop"></div>
    </div>
    <script>
        @foreach (\TCG\Voyager\Models\Category::query()->where('parent_id', null)->get() as $category)
        $( "#{{ str_replace(' ', '', $category->name) }}" ).click(function() {
            if ($("#{{$category->slug}}").hasClass("hidden")) {
                $("#{{$category->slug}}").removeClass('hidden');
            }else{
                $("#{{$category->slug}}").addClass('hidden');
            }
        });
        @endforeach
    </script>
    <script type="text/javascript">
        function toggleModal12(modalID12){
            document.getElementById(modalID12).classList.toggle("hidden");
            document.getElementById(modalID12 + "-backdrop").classList.toggle("hidden");
            document.getElementById(modalID12).classList.toggle("flex");
            document.getElementById(modalID12 + "-backdrop").classList.toggle("flex");
        }
    </script>
    <script>
        function check() {
            // Get the checkbox
            var checkBox = document.getElementById("online");
            // Get the output text
            @foreach($users as $user)
            var {{ str_replace(' ', '', $user->name) }} = document.getElementById("{{$user->id}}");
            // If the checkbox is checked, display the output text
            if (checkBox.checked == true){
                if ({{$user->active_status}} == 0) {
                    {{ str_replace(' ', '', $user->name) }}.classList.add("hidden");
                }
            } else {
                {{ str_replace(' ', '', $user->name) }}.classList.remove("hidden");
            }
            @endforeach
        }
    </script>
    {{-- Modal end --}}
    <script>
        @foreach($users as $user)
        $("#open{{$user->id}}").click(function(){
            var username = $(".{{$user->id}}").text();
            var namem = $(".namem").text('@lang('lang.modal_alert')'+username );
            $(".modal_content").show();
            let user_id = $('.{{$user->id}}').attr('id');
            $.ajax({
                url: "/give-task",
                type:"POST",
                data:{
                    user_id:user_id,
                    _token: $('meta[name="csrf-token"]').attr('content')
                },
                success:function(response){
                    console.log(response);
                    if(response) {
                        $('.success').text(response.success);
                    }
                },
                error: function(error) {
                    console.log(error);
                }
            });
        });
        $(".close").click(function(){
            $(".modal_content").hide();
        });
        @endforeach
    </script>
    <script type="text/javascript">
        function showDiv(select) {
            if (select.value == 0) {
                document.getElementById('hidden_div').style.display = "block";
            }if(select.value == 1) {
                document.getElementById('hidden_div').style.display = "none";
                document.getElementById('hidden_div2').style.display = "block";
            } else {
                document.getElementById('hidden_div2').style.display = "none";
                document.getElementById('hidden_div').style.display = "block";

            }
        }
    </script>

    <script>
        function myFunction() {
            document.getElementById('modal').style.display = "block";
            document.getElementById('modal_content').style.display = "none";
            let task_id = $( "#task_name" ).val();
            $.ajax({
                url: "/give-task",
                type:"POST",
                data:{
                    task_id:task_id,
                    _token: $('meta[name="csrf-token"]').attr('content')
                },
                success:function(response){
                    console.log(response);
                    if(response) {
                        $('.success').text(response.success);
                    }
                },
                error: function(error) {
                    console.log(error);
                }
            });
        };
        function myFunction1() {
            document.getElementById('modal').style.display = "none";
            document.getElementById('modal_content').style.display = "none";
        };
    </script>
@endsection

@section('javasript')
    <script src="//unpkg.com/alpinejs" defer></script>
    <script>
        $(".score").slice(0,2).attr('about',1);
    </script>
    <script>
        @foreach($users as $user)
        $('.performer-page{{$user->id}}').click(function(){
            $.ajax({
                url: "/performers/{{$user->id}}",
                type:"GET",
                data:{
                    about:$( ".scores{{$user->id}}" ).attr( 'about' ),
                    _token: $('meta[name="csrf-token"]').attr('content')
                },
                success:function(response){
                    console.log(response);
                    if(response) {
                        $('.success').text(response.success);
                    }
                },
                error: function(error) {
                    console.log(error);
                }
            });
        });
        @endforeach
        $('.send-request').click(function (){
            $.ajax({
                url : '/performers-by-category', //PHP file to execute
                type : 'GET', //method used POST or GET
                data : {'category_id' : $(this).data('id')}, // Parameters passed to the PHP file
                success : function(result){ // Has to be there !
                },

                error : function(result, statut, error){ // Handle errors

                }

            });
        })
    </script>
@endsection

