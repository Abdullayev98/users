@extends('layouts.app')

@include('layouts.fornewtask')

@section('content')

    <link rel="stylesheet" href="{{asset('css/budget_library.css')}}">
    <link rel="stylesheet" href="{{asset('css/budjet.css')}}">
    <!-- Information section -->
    {{--    <form action="{{route('task.create.construction')}}" method="post">--}}
    <form class="" action="{{route('task.create.budget.store', $task->id)}}" method="post">
        @csrf
        <div class="mx-auto w-9/12  my-16">
            <div class="grid grid-cols-3 gap-x-20">
                <div class="lg:col-span-2 col-span-3">
                    <div class="w-full text-center text-2xl">
                        @lang('lang.budget_lookingFor') "{{$task->name}}"
                    </div>
                    <div class="w-full text-center my-4 text-gray-400">
                        @lang('lang.budget_percent')
                    </div>
                    <div class="relative pt-1">
                        <div class="overflow-hidden h-1 text-xs flex rounded bg-gray-200  mx-auto ">
                            <div style="width: 75%" class="shadow-none  flex flex-col text-center whitespace-nowrap text-white justify-center bg-green-500"></div>
                        </div>
                    </div>
                    <div class="shadow-xl w-full mx-auto md:mt-7 rounded-2xl  w-full p-6 md:px-20">
                        <div class="py-4 mx-auto px-auto text-center text-3xl texl-bold">
                            @lang('lang.budget_yourBudget')
                        </div>
                        <div class="py-4 mx-auto  text-left ">
                            <div class="mb-4">
                                <div class="content__38cf1 w-8/12 mx-auto">
                                    <div class="">
                                        <div class="wrapper__1144f white__d3db2">
                                            <div class="desktop__66de4">
                                                <div class="container__dbb1e">
                                                    <div class="rails__0ca6e">
                                                        <svg class="triangle__67899" width="1" height="1" viewBox="0 0 1 1" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path class="back__d97a2" d="M0,1 L1,0 L1,1 L0,1"></path>
                                                        </svg>
                                                        <svg class="triangle__678999" width="1" height="1" viewBox="0 0 1 1" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path class="back__d97a222" d="M0,1 L1,0 L1,1 L0,1"></path>
                                                        </svg>
                                                        <div id="slider-range-min" class="flex"></div>
                                                    </div>
                                                    <div class="handle__27597">

                                                        <input class="focus:outline-none  mt-8" type="text" id="amount" name="amount1" readonly >

                                                    </div>
                                                    <div class="tickWrapper__6685b" style="width: 16.6667%; left: 0%;">
                                                        <div class="dot__b4c97"></div>
                                                        <div class="bar__f0e59"></div>
                                                    </div>
                                                    <div class="tickWrapper__6685b" style="width: 16.6667%; left: 20%;">
                                                        <div class="dot__b4c97"></div>
                                                        <div class="bar__f0e59"></div>
                                                    </div>
                                                    <div class="tickWrapper__6685b" style="width: 16.6667%; left: 40%;">
                                                        <div class="dot__b4c97"></div>
                                                        <div class="bar__f0e59"></div>
                                                    </div>
                                                    <div class="tickWrapper__6685b" style="width: 16.6667%; left: 60%;">
                                                        <div class="dot__b4c97"></div>
                                                        <div class="bar__f0e59"></div>
                                                    </div>
                                                    <div class="tickWrapper__6685b" style="width: 16.6667%; left: 80%;">
                                                        <div class="dot__b4c97"></div>
                                                        <div class="bar__f0e59"></div>
                                                    </div>
                                                    <div class="tickWrapper__6685b" style="width: 16.6667%; left: 100%;">
                                                        <div class="dot__b4c97"></div>
                                                        <div class="bar__f0e59"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>




                            </div>
                                <div class="w-[100px]  md:w-[200px] xl:hidden">
                                    <select id="" name="amount" class="border md:ml-14 bg-green-400  text-white font-semibold rounded-lg text-lg md:text-2xl my-4 px-4 md:px-10 hover:bg-yellow-600">
                                        <option value="0">
                                            @lang('lang.budget_text')
                                        </option>
                                        <option value="от {{$category->max/5}} UZS">
                                            от {{$category->max/5}} UZS
                                        </option>
                                        <option value="от {{$category->max/5 * 2}} UZS">
                                            от {{$category->max/5 * 2}} UZS
                                        </option>
                                        <option value="от {{$category->max/5 * 3}} UZS">
                                            от {{$category->max/5 * 3}} UZS
                                        </option>
                                        <option value="от {{$category->max/5 * 4}} UZS">
                                            от {{$category->max/5 * 4}} UZS
                                        </option>
                                        <option value="до {{$category->max}} UZS">
                                            до {{$category->max}} UZS
                                        </option>
                                    </select>
                                </div>
                                <div class="mt-4">
                                    <div class="flex w-full gap-x-4 mt-4">
                                        <a onclick="myFunction()" class="w-1/3  border border-black-700 hover:border-black transition-colors rounded-lg py-2 text-center flex justify-center items-center gap-2">
                                            <!-- <button type="button"> -->
                                        @lang('lang.notes_back')
                                        <!-- </button> -->
                                            <script>
                                                function myFunction() {
                                                    window.history.back();
                                                }
                                            </script>
                                        </a>
                                        <input type="submit"
                                               class="bg-green-500 hover:bg-green-500 w-2/3 cursor-pointer text-white font-bold py-5 px-5 rounded"
                                               name="" value="@lang('lang.name_next')">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <x-faq/>
                </div>

            </div>
        </div>
    </form>

    <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
@endsection

@section("javasript")

    <script>
        $(function() {
            $("#slider-range-min").slider({
                range: "min",
                value: 0,
                min: {{$category->max}} / 5,
                max: {{$category->max}},
                step: 100,
                slide: function(event, ui) {
                    var maximum = {{$category->max}};
                    if (maximum == ui.value) {
                        $("#amount").val("от " + ui.value + " сум");
                    } else {
                        $("#amount").val("до " + ui.value + " сум");
                    }
                }
            });
            $(".ui-slider-range").css("height", '250px');
            $(".ui-slider-range").css("background", 'linear-gradient(rgb(255, 132, 56)  , rgb(255, 132, 56))');
            $(".ui-slider-range").css("top", '-255px');
            $(".ui-slider-handle").text("<>");
            $("#amount").val($("#slider-range-min").slider("value"));
        });
    </script>
@endsection


