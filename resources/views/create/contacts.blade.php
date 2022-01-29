@extends('layouts.app')

@include('layouts.fornewtask')

@section('content')
    <link rel="stylesheet" href="{{ asset('/css/tabs.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
          integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <!-- Information section -->
    <x-roadmap/>

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
                    <div class="py-4 mx-auto px-auto text-center text-3xl font-semibold">
                        @auth()
                            Ваши контакты
                        @endauth
                        @guest()
                            Авторизация
                        @endguest
                    </div>
                    <div class="w-10/12 mx-auto">
                        @guest()
                            <ul class="nav nav-tabs flex flex-col md:flex-row text-center flex-wrap list-none border-b-0 pl-0 mb-4 justify-center"
                                id="tabs-tab3"
                                role="tablist">
                                <li class="nav-item w-1/2" role="presentation">
                                    <a href="#tabs-home3"
                                       class="nav-link w-full block font-medium text-xs leading-tight uppercase border-x-0 border-t-0 border-b-2 border-transparent px-6 py-3 my-2 hover:border-transparent hover:bg-gray-100 focus:border-transparent active"
                                       id="tabs-home-tab3" data-bs-toggle="pill" data-bs-target="#tabs-home3" role="tab"
                                       aria-controls="tabs-home3"
                                       aria-selected="true">РЕГИСТРАЦИЯ</a>
                                </li>
                                <li class="nav-item w-1/2" role="presentation">
                                    <a href="#tabs-profile3"
                                       class="nav-link w-full block font-medium text-xs leading-tight uppercase border-x-0 border-t-0 border-b-2 border-transparent px-6 py-3 my-2 hover:border-transparent hover:bg-gray-100 focus:border-transparent"
                                       id="tabs-profile-tab3" data-bs-toggle="pill" data-bs-target="#tabs-profile3"
                                       role="tab"
                                       aria-controls="tabs-profile3" aria-selected="false">ВХОД</a>
                                </li>
                            </ul>
                        @endguest
                        <div class="tab-content" id="tabs-tabContent3">
                            <div class="tab-pane fade show active" id="tabs-home3" role="tabpanel"
                                 aria-labelledby="tabs-home-tab3">
                                <div class="py-4 mx-auto  text-left ">
                                    <div class="mb-4">
                                        <div id="formulario" class="flex flex-col gap-y-4">
                                            <div>
                                                <div class="mb-3 xl:w-full">

                                                    @auth()
                                                        <form action="{{route('task.create.contact.store.phone', $task->id)}}"
                                                              method="post">
                                                            @csrf


                                                            <label class="text-sm text-gray-500 mb-2"
                                                                   for="phone">@lang('lang.contact_number')</label>
                                                            <input type="text" name="phone_number"
                                                                   value="+998{{auth()->user()->phone_number}}"
                                                                   id="phone"
                                                                   class="shadow appearance-none border focus:shadow-orange-500 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none "/>
                                                            @error('phone_number')
                                                            <p>{{$message}}</p>
                                                            @enderror
                                                        </form>
                                                    @endauth


                                                    @if(!auth()->check())

                                                        <label class="text-sm text-gray-500 mb-2"
                                                               for="name">@lang('lang.contact_name')</label>

                                                        <input type="text" name="name"
                                                               placeholder="@lang('lang.contact_name')"
                                                               value="{{old('name')}}"
                                                               class="mb-5 shadow appearance-none border   focus:shadow-orange-500 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none "/>
                                                        @error('name')
                                                        <p class="text-red-500">{{$message}}</p>
                                                        @enderror
                                                        <label class="text-sm text-gray-500 mb-2"
                                                               for="email">E-mail</label>
                                                        <input type="email" name="email" placeholder="E-mail"
                                                               value="{!! old('email') !!}"
                                                               class="mb-5 shadow appearance-none border focus:shadow-orange-500 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none "
                                                        />
                                                        @error('email')
                                                        <p class="text-red-500">{{$message}}</p>
                                                        @enderror
                                                        <label class="text-sm text-gray-500 mb-2"
                                                               for="phone">@lang('lang.contact_number')</label>
                                                        <input type="text"
                                                               value="+998{{old('phone_number')}}" id="phone"
                                                               class="shadow appearance-none border focus:shadow-orange-500 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none "/>
                                                        <input type="hidden" name="phone_number" id="phone_number">

                                                        @error('phone_number')
                                                        <p class="text-red-500">{{$message}}</p>
                                                        @enderror
                                                    @else

                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mt-4">
                                        <div class="flex w-full gap-x-4 mt-4">
                                            <a onclick="myFunction()"
                                               class="w-1/3 text-xl  border border-black-700 hover:border-black transition-colors rounded-lg py-2 text-center flex justify-center items-center gap-2">
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
                                                   class="bg-green-500 text-xl hover:bg-green-500 w-2/3 cursor-pointer text-white font-bold py-5 px-5 rounded"
                                                   name="" value="@lang('lang.contact_send')">
                                        </div>


                                    </div>
                                </div>
                            </div>
                            @guest()
                                <div class="tab-pane fade" id="tabs-profile3" role="tabpanel"

                                     aria-labelledby="tabs-profile-tab3">
                                    <form action="" method="POST">
                                        @csrf
                                        <label>
                                            <span class="text-gray-500 text-sm">
                                                Электронная почта
                                            </span>
                                            <input type="text"
                                                   placeholder="E-mail"
                                                   class="mt-2 shadow appearance-none border focus:shadow-orange-500 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none "/>
                                        </label>


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
                                    </form>
                                </div>
                            @endguest
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


@endsection

@section("javasript")
    <script src="https://cdn.jsdelivr.net/npm/tw-elements/dist/js/index.min.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>

    <script src='https://unpkg.com/imask'></script>
    <script>
        $("#phone").attr('placeholder', '+998(__)___-__-__');
        var element = document.getElementById('phone');
        var maskOptions = {
            mask: '+998(00)000-00-00',
            lazy: false
        }
        var mask = new IMask(element, maskOptions);

        function setSelectionRange(input, selectionStart, selectionEnd) {
            if (input.setSelectionRange) {
                input.focus();
                input.setSelectionRange(selectionStart, selectionEnd);
            } else if (input.createTextRange) {
                var range = input.createTextRange();
                range.collapse(true);
                range.moveEnd('character', selectionEnd);
                range.moveStart('character', selectionStart);
                range.select();
            }
        }

        function setCaretToPos(input, pos) {
            setSelectionRange(input, pos, pos);
        }

        $("#phone").keyup(function () {
            var text = $(this).val()
            text = text.replace(/[^0-9.]/g, "")
            text = text.slice(3)
            $("#phone_number").val(text)
        })


    </script>




@endsection
