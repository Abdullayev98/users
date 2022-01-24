@extends('layouts.app')

@include('layouts.fornewtask')

@section('content')


    <form class="" action="{{route("task.create.custom.store", $task->id)}}" method="post">
        @csrf

        <div class="mx-auto w-9/12  my-16">
            <div class="grid grid-cols-3 gap-x-20">
                <div class="md:col-span-2 col-span-3">
                    <div class="w-full text-center text-2xl">
                        @lang('lang.buyd_text') "{{session('name')}}"
                    </div>
                    <div class="w-full text-center my-4 text-gray-400">
                        @lang('lang.design_text')
                    </div>
                    <div class="pt-1">
                        <div class="overflow-hidden h-1 text-xs flex rounded bg-gray-200  mx-auto ">
                            <div style="width: 57%"
                                 class="shadow-none  flex flex-col text-center whitespace-nowrap text-white justify-center bg-green-500"></div>
                        </div>
                    </div>

                    <div class="shadow-2xl w-full md:p-16 p-4 mx-auto my-4 rounded-2xl	w-full">
                        @foreach($datas as $data)

                            @if($data->type == 'select')
                                <div class="py-4 mx-auto px-auto text-center text-3xl texl-bold">
                                    {{ $data->getTranslatedAttribute('title',Session::get('lang') , 'fallbackLocale') }}
                                </div>
                                <div class="py-4 mx-auto px-auto text-center text-sm texl-bold">
                                    {{ $data->getTranslatedAttribute('description',Session::get('lang') , 'fallbackLocale') }}
                                </div>
                                <div class="py-4 mx-auto  text-left ">
                                    <div class="mb-4">
                                        <div id="formulario" class="flex flex-col gap-y-4">

                                            {{ $data->getTranslatedAttribute('label',Session::get('lang') , 'fallbackLocale') }}
                                            <select id="where" name="{{$data->name}}[]"
                                                    class="shadow appearance-none border focus:shadow-orange-500 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none"
                                                    required>

                                                @foreach($data->options['options'] as $key => $option)
                                                    <option @if($key == $data->values) selected
                                                            @endif value="{{$option}}">{{$option}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="border-b-4"></div>
                            @endif
                            @if($data->type == 'checkbox')


                                <div class="py-4 mx-auto px-auto text-center text-3xl texl-bold">
                                    {{ $data->getTranslatedAttribute('title',Session::get('lang') , 'fallbackLocale') }}
                                </div>
                                <div class="py-4 mx-auto px-auto text-center text-sm texl-bold">
                                    {{ $data->getTranslatedAttribute('description',Session::get('lang') , 'fallbackLocale') }}
                                </div>

                                <div class="py-4 mx-auto  text-left ">
                                    <div class="mb-4">
                                        <div id="formulario" class="flex flex-col gap-y-4">

                                            <div>

                                                <div class="mb-3 xl:w-full">

                                                    @foreach($data->options['options'] as $key => $option)
                                                        <label class="md:w-2/3 block mt-6">
                                                            <input @if($key == $data->values) checked
                                                                   @endif class="mr-2  h-4 w-4" type="checkbox"
                                                                   value="{{$option}}" name="{{$data->name}}[]">
                                                            <span class="text-slate-900">
                                                    {{$option}}
                                                    </span>
                                                        </label>
                                                    @endforeach

                                                </div>
                                            </div>

                                            <div>
                                                <!-- <span class="underline hover:text-gray-400 decoration-dotted cursor-pointer float-right">Приватная информация</span> -->
                                            </div>


                                        </div>
                                    </div>
                                </div>

                                <div class="border-b-4"></div>
                            @endif
                            @if($data->type == 'radio')

                                <div class="py-4 mx-auto px-auto text-center text-3xl texl-bold">
                                    {{ $data->getTranslatedAttribute('title',Session::get('lang') , 'fallbackLocale') }}
                                </div>
                                <div class="py-4 mx-auto px-auto text-center text-sm texl-bold">
                                    {{ $data->getTranslatedAttribute('description',Session::get('lang') , 'fallbackLocale') }}
                                </div>

                                <div class="py-4 mx-auto  text-left ">
                                    <div class="mb-4">
                                        <div id="formulario" class="flex flex-col gap-y-4">

                                            <div>

                                                <div name="glassSht" class="mb-3 xl:w-full">

                                                    @foreach($data->options['options'] as $key => $option)

                                                        <input @if($key == $data->values) checked @endif type="radio"
                                                               id="{{$key}}" name="{{$data->name}}[]" value="{{$option}}">
                                                        <label for="1">{{$option}}</label>
                                                        <br><br>
                                                    @endforeach

                                                </div>
                                            </div>

                                            <div>
                                                <!-- <span class="underline hover:text-gray-400 decoration-dotted cursor-pointer float-right">Приватная информация</span> -->
                                            </div>


                                        </div>
                                    </div>
                                </div>

                                <div class="border-b-4"></div>
                            @endif
                            @if($data->type == 'input')
                                <div class="py-4 mx-auto px-auto text-center text-3xl texl-bold">
                                    {{ $data->getTranslatedAttribute('title',Session::get('lang') , 'fallbackLocale') }}
                                </div>
                                <div class="py-4 mx-auto px-auto text-center text-sm texl-bold">
                                    {{ $data->getTranslatedAttribute('description',Session::get('lang') , 'fallbackLocale') }}
                                </div>

                                <div class="py-4 mx-auto  text-left ">
                                    <div class="mb-4">
                                        <div id="formulario" class="flex flex-col gap-y-4">
                                            {{ $data->getTranslatedAttribute('label',Session::get('lang') , 'fallbackLocale') }}
                                            <input
                                                placeholder="{{ $data->getTranslatedAttribute('placeholder',Session::get('lang') , 'fallbackLocale') }}"
                                                id="car" name="{{$data->name}}[]" type="text"
                                                class="shadow appearance-none border focus:shadow-orange-500 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none"
                                                required>

                                        </div>
                                    </div>
                                </div>
                                <div class="border-b-4"></div>
                            @endif
                        @endforeach
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
                                       name="" value="@lang('lang.name_next')">

                            </div>


                        </div>

                    </div>
                </div>
                <x-faq/>
            </div>
        </div>


    </form>


@endsection
