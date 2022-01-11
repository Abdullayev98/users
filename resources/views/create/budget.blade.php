@extends('layouts.app')

@section('content')
    <link rel="stylesheet" href="{{asset('css/budjet.css')}}">
    <!-- Information section -->
    <x-roadmap/>
    @if($category->id == 60)
    <form class="" action="{{route('task.create.notes')}}" method="post">
        @elseif(session('parent_id'))
    <form class="" action="{{route('task.create.notes')}}" method="post">
        @else
    <form class="" action="{{route('task.create.services')}}" method="post">
    @endif
        @csrf
        <div class="mx-auto w-9/12  my-16">
            <div class="grid grid-cols-3 gap-x-20">
                <div class="lg:col-span-2 col-span-3">
                    <div class="w-full text-center text-2xl">
                        @lang('lang.budget_lookingFor') "{{session('name')}}"
                    </div>
                    <div class="w-full text-center my-4 text-[#5f5869]">
                        @lang('lang.budget_percent')
                    </div>
                    <div class="relative pt-1">
                        <div class="overflow-hidden h-1 text-xs flex rounded bg-gray-200  mx-auto ">
                            <div style="width: 71%" class="shadow-none  flex flex-col text-center whitespace-nowrap text-white justify-center bg-green-500"></div>
                        </div>
                    </div>
                    <div class="shadow-xl w-full mx-auto md:mt-7 rounded-2xl  w-full p-6 md:px-20">
                        <div class="py-4 mx-auto px-auto text-center text-3xl texl-bold">
                            @lang('lang.budget_yourBudget')
                        </div>
                        <div class="py-4 mx-auto  text-left ">
                            <div class="mb-4">
                                <div id="formulario" class="flex flex-col gap-y-4 xl:block hidden">
                                    <div class="cube">
                                        <div class="a"></div>
                                        <div id="slider-range-min" class="flex"></div>
                                    </div>
                                    <input type="text" id="amount" name="amount" readonly>
{{--                                    <div class="flex ">--}}
{{--                                        <div class="cursor-default">--}}
{{--                                            <div class="w-2 h-2 bg-gray-200 rounded-full -ml-1 -mt-5 z-0"></div>--}}
{{--                                        </div>--}}
{{--                                        <div class="w-[200px]">--}}
{{--                                            <p class="text-[12px]  cursor-default">@lang('lang.budget_sum')</p>--}}
{{--                                        </div>--}}
{{--                                        <div class="">--}}
{{--                                            <p class="text-[12px]  cursor-default">@lang('lang.budget_sum')</p>--}}
{{--                                        </div>--}}
{{--                                        <div class="">--}}
{{--                                            <p class="text-[12px]  cursor-default">@lang('lang.budget_sum') </p>--}}
{{--                                        </div>--}}
{{--                                        <div class="">--}}
{{--                                            <p class="text-[12px]  cursor-default">@lang('lang.budget_sum')</p>--}}
{{--                                        </div>--}}
{{--                                        <div class="">--}}
{{--                                            <p class="text-[12px]  cursor-default">@lang('lang.budget_sum') </p>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
                                </div>
                                <div class="w-[100px]  md:w-[200px] xl:hidden">
                                    <select id="" name="amount" class="border md:ml-14 bg-[#ffa200]  text-white font-semibold rounded-lg text-lg md:text-2xl my-4 px-4 md:px-10 hover:bg-[#ffaa00]">
                                        <option value="0">
                                            Выберите бюджет
                                        </option>
                                        <option value="{{$category->max/5}} UZS">
                                            от {{$category->max/5}} UZS
                                        </option>
                                        <option value="{{$category->max/5 * 2}} UZS">
                                            от {{$category->max/5 * 2}} UZS
                                        </option>
                                        <option value="{{$category->max/5 * 3}} UZS">
                                            от {{$category->max/5 * 3}} UZS
                                        </option>
                                        <option value="{{$category->max/5 * 4}} UZS">
                                            от {{$category->max/5 * 4}} UZS
                                        </option>
                                        <option value="{{$category->max}} UZS">
                                            до {{$category->max}} UZS
                                        </option>
                                    </select>
                                </div>

                                <div class="w-full text-left">
                                    <label>
                                        <input type="checkbox" name="business" value="1"> Я использую YouDo для бизнеса, нужны закрывающие документы
                                    </label>
                                        <p class="text-sm xl:ml-4 mb-4">На ваше задание смогут откликаться только юридические лица, ИП и самозанятые</p>
                                    <label>
                                        <input type="checkbox" name="insurance" value="1"> Отдаю предпочтение застрахованным исполнителям
                                    </label>
                                        <p class="text-sm xl:ml-4">В случае ущерба страховая возместит вам до 100 000 руб. Это бесплатно</p>
                                </div>
                                <div class="mt-4">
                                    <div class="flex w-full gap-x-4 mt-4">
                                        <a href="/task/create/date" type="button"  class="w-1/3  border border-[#000]-700 hover:border-[#000] transition-colors rounded-lg py-2 text-center flex justify-center items-center gap-2">
                                            @lang('lang.budget_back')
                                        </a>
                                        <input type="submit"
                                               class="bg-[#6fc727] hover:bg-[#5ab82e] w-2/3 cursor-pointer text-white font-bold py-5 px-5 rounded"
                                               name="" value="@lang('lang.name_next')">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <x-faq/>
            </div>
        </div>
    </form>

    <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
@endsection

@section("javasript")
    <script>
        $(function() {
            $( "#slider-range-min").slider({
                range: "min",
                value: 0,
                min: {{$category->max}}/5,
                max: {{$category->max}},
                step:{{$category->max}}/5,
                slide: function( event, ui ) {
                    var maximum = {{$category->max}};
                    if (maximum == ui.value) {
                        $("#amount").val( "от " + ui.value + " сум");
                    }else{
                        $("#amount").val( "до " + ui.value + " сум");
                    }

                }
            });
            $(".ui-slider-range").css("height",'55px');
            $(".ui-slider-range").css("background",'linear-gradient(rgb(255, 132, 56), rgb(255, 255, 255))');
            $(".ui-slider-range").css("top",'-1879%');
            $(".ui-slider-handle").text("<>");
            $( "#amount" ).val('от ' + $( "#slider-range-min" ).slider( "value") + " cум");
        });
    </script>

@endsection
