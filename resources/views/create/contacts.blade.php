@extends('layouts.app')

@include('layouts.fornewtask')

@section('content')

    <!-- Information section -->
    <x-roadmap/>
    <form class="" action="{{route('task.create.contact.store', $task->id)}}" method="post">
        @csrf
        <div class="mx-auto w-9/12  my-16">
            <div class="grid md:grid-cols-3 gap-x-20">
                <div class="col-span-2">
                    <div class="w-full text-center text-2xl">
                        @lang('lang.budget_lookingFor') "{{session('name')}}"
                    </div>
                    <div class="w-full text-center my-4 text-gray-400">
                        @lang('lang.contact_percent') 99%
                    </div>
                    <div class="relative pt-1">
                        <div class="overflow-hidden h-1  flex rounded bg-gray-200  mx-auto ">
                            <div style="width: 99%"
                                 class="shadow-none  flex flex-col text-center whitespace-nowrap text-white justify-center bg-green-500"></div>
                        </div>
                    </div>
                    <div class="shadow-xl w-full mx-auto mt-7 rounded-2xl	w-full p-2 md:p-6 px-8">
                        <div class="py-4 mx-auto px-auto text-center text-3xl texl-bold">
                            @lang('lang.contact_details')
                        </div>

                        <div class="py-4 mx-auto  text-left ">
                            <div class="mb-4">
                                <div id="formulario" class="flex flex-col gap-y-4">
                                    <div>
                                        <div class="mb-3 xl:w-full">
                                            @if(!auth()->check())

                                                <label for="name">@lang('lang.contact_name')</label>

                                                <input type="text" name="name"
                                                       placeholder="@lang('lang.contact_name')" value="{{old('name')}}"
                                                       class="shadow appearance-none border   focus:shadow-orange-500 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none "/>
                                                @error('name')
                                                <p class="text-red-500">{{$message}}</p>
                                                @enderror
                                                <label for="email">E-mail</label>
                                                <input type="email" name="email" placeholder="E-mail" value="{!! old('email') !!}"
                                                       class="shadow appearance-none border focus:shadow-orange-500 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none "
                                                />
                                                @error('email')
                                                <p class="text-red-500">{{$message}}</p>
                                                @enderror
                                                <label for="phone">@lang('lang.contact_number')</label>
                                                <input type="text" name="phone_number" value="{{old('phone_number')}}" id="phone"
                                                       class="shadow appearance-none border focus:shadow-orange-500 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none "/>
                                                @error('phone_number')
                                                <p class="text-red-500">{{$message}}</p>
                                                @enderror
                                            @else
                                                <label for="phone">@lang('lang.contact_number')</label>
                                                <input type="text" name="phone_number"
                                                       value="+998{{auth()->user()->phone_number}}" id="phone"
                                                       class="shadow appearance-none border focus:shadow-orange-500 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none "/>
                                                @error('phone_number')
                                                <p>{{$message}}</p>
                                                @enderror
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="mt-4">
                                <div class="flex w-full gap-x-4 mt-4">
                                    <a onclick="myFunction()"
                                       class="w-1/3  border border-black-700 hover:border-black transition-colors rounded-lg py-2 text-center flex justify-center items-center gap-2">
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
                                           name="" value="@lang('lang.contact_send')">
                                </div>


                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-span mt-5 md:mt-0">
                    <x-faq/>
                </div>
            </div>

        </div>
        </div>
    </form>


@endsection

@section("javasript")

    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>

    <script src='https://unpkg.com/imask'></script>
    <script>
    $("#phone").attr('placeholder','+998(__)___-__-__');
        var element = document.getElementById('phone');
        var maskOptions = {
            mask: '+998(00)000-00-00',
            lazy: false
        }

        function setSelectionRange(input, selectionStart, selectionEnd) {
            if (input.setSelectionRange) {
                input.focus();
                input.setSelectionRange(selectionStart, selectionEnd);
            }
            else if (input.createTextRange) {
                var range = input.createTextRange();
                range.collapse(true);
                range.moveEnd('character', selectionEnd);
                range.moveStart('character', selectionStart);
                range.select();
            }
        }

        function setCaretToPos (input, pos) {
            setSelectionRange(input, pos, pos);
        }

        $( "#phone" ).click(function() {
            var mask = new IMask(element, maskOptions);
            setCaretToPos(document.getElementById("phone"), 5);
        });

    </script>


    <script>
        var x = 1;
        const alp = ["B", "C", "D", "E", "F"];
        $("#addbtn").click(function () {
            if (x < 6) {
                $("#addinput").append('<div class="flex items-center gap-x-2"><div class="flex items-center rounded-lg border  w-full py-1"> <button class="flex-shrink-0 border-transparent text-teal-500 text-md py-1 px-2 rounded focus:outline-none" type="button">  ' + alp[x - 1] + ' </button> <input id="suggest' + x + '" class="appearance-none bg-transparent w-full text-gray-700 mr-3 py-1 px-2 leading-tight focus:outline-none" type="text" placeholder="Город, Улица, Дом" aria-label="Full name">  <button id="addinput' + x + '" class="flex-shrink-0 border-transparent border-4 text-teal-500 hover:text-teal-800 text-sm py-1 px-2 rounded" type="button">   <svg class="h-4 w-4 text-purple-500"  width="12" height="12" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">  <path stroke="none" d="M0 0h24v24H0z"/>  <path d="M21 3L14.5 21a.55 .55 0 0 1 -1 0L10 14L3 10.5a.55 .55 0 0 1 0 -1L21 3" /></svg>  </button> </div><button id="remove_inputs" class="bg-white hover:bg-gray-100 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded shadow">  <svg xmlns="http://www.w3.org/2000/svg" width="18" height="20" fill="none"><path fill-rule="evenodd" clip-rule="evenodd" d="M3.25 2.95v-.2A2.75 2.75 0 0 1 6 0h6a2.75 2.75 0 0 1 2.75 2.75v.2h2.45a.8.8 0 0 1 0 1.6H.8a.8.8 0 1 1 0-1.6h2.45zm10 .05v-.25c0-.69-.56-1.25-1.25-1.25H6c-.69 0-1.25.56-1.25 1.25V3h8.5z" fill="#666"/><path d="M14.704 6.72a.8.8 0 1 1 1.592.16l-.996 9.915a2.799 2.799 0 0 1-2.8 2.802h-7c-1.55 0-2.8-1.252-2.796-2.723l-1-9.994a.8.8 0 1 1 1.592-.16L4.3 16.794c0 .668.534 1.203 1.2 1.203h7c.665 0 1.2-.536 1.204-1.282l1-9.995z" fill="#666"/><path d="M12.344 7.178a.75.75 0 1 0-1.494-.13l-.784 8.965a.75.75 0 0 0 1.494.13l.784-8.965zm-6.779 0a.75.75 0 0 1 1.495-.13l.784 8.965a.75.75 0 0 1-1.494.13l-.785-8.965z" fill="#666"/></svg> </button></div> ');

                x++;

            } else {
                alert("max ten field allowed");
            }
        });
        $("#addinput").on("click", "#remove_inputs", function () {
            $(this).parent("div").remove();
            x--;
        });
        console.log(x);
    </script>


@endsection
