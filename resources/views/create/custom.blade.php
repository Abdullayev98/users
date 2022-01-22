@extends('layouts.app')

@section('content')


<form class="" action="{{route('task.create.housemaid1')}}" method="post">
        @csrf

        <div class="mx-auto w-9/12  my-16">
            <div class="grid grid-cols-3 gap-x-20">
                <div class="md:col-span-2 col-span-3">
                    <div class="w-full text-center text-2xl">
                        @lang('lang.buyd_text') "{{session('name')}}"
                    </div>
                    <div class="w-full text-center my-4 text-[#5f5869]">
                       @lang('lang.design_text')
                    </div>
                    <div class="pt-1">
                        <div class="overflow-hidden h-1 text-xs flex rounded bg-gray-200  mx-auto ">
                            <div style="width: 57%" class="shadow-none  flex flex-col text-center whitespace-nowrap text-white justify-center bg-green-500"></div>
                        </div>
                    </div>

@if($data->type == 'select')
                    <div class="shadow-2xl w-full md:p-16 p-4 mx-auto my-4 rounded-2xl	w-full">
                        <div class="py-4 mx-auto px-auto text-center text-3xl texl-bold">
                        {{-- $data->getTranslatedAttribute('title',Session::get('lang') , 'fallbackLocale') --}}
                        </div>
                        <div class="py-4 mx-auto px-auto text-center text-sm texl-bold">
                        {{-- $data->getTranslatedAttribute('description',Session::get('lang') , 'fallbackLocale') --}}
                        </div>
                        <div class="py-4 mx-auto  text-left ">
                            <div class="mb-4">
                                <div id="formulario" class="flex flex-col gap-y-4">

                                {{-- $data->getTranslatedAttribute('label',Session::get('lang') , 'fallbackLocale') --}}
                                    <select id="where" name="where[]" class="shadow appearance-none border focus:shadow-orange-500 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none"  required>
                                        <option>Помещение</option>
                                        <option>2-@lang('lang.housem_text2')</option>
                                        <option>3-@lang('lang.housem_text2')</option>
                                        <option>4-@lang('lang.housem_text2')</option>
                                        <option>@lang('lang.housem_office')</option>
                                        <option>@lang('lang.housem_text3')</option>
                                    </select>
                        {{-- $data->getTranslatedAttribute('label',Session::get('lang') , 'fallbackLocale') --}}
                                    <select id="how_many" name="how_many[]" type="number" class="shadow appearance-none border focus:shadow-orange-500 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none"  required>
                                        <option>@lang('lang.housem_text5')</option>
                                        <option>@lang('lang.housem_text6')</option>
                                        <option>@lang('lang.housem_text7')</option>
                                        <option>@lang('lang.housem_text8')</option>
                                    </select>
                                </div>
                                <div class="mt-4">
                                    <div class="flex w-full gap-x-4 mt-4">
                                    <a onclick="myFunction()" class="w-1/3  border border-[#000]-700 hover:border-[#000] transition-colors rounded-lg py-2 text-center flex justify-center items-center gap-2">
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
                                               class="bg-[#6fc727] hover:bg-[#5ab82e] w-2/3 cursor-pointer text-white font-bold py-5 px-5 rounded"
                                               name="" value="Далее">

                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>

@elseif($data->type == 'checkbox')


                    <div class="shadow-xl w-full mx-auto mt-7 rounded-2xl	w-full p-6 px-20">
                        <div class="py-4 mx-auto px-auto text-center text-3xl texl-bold">
                        {{-- $data->getTranslatedAttribute('title',Session::get('lang') , 'fallbackLocale') --}}
                        </div>
                        <div class="py-4 mx-auto px-auto text-center text-sm texl-bold">
                        {{-- $data->getTranslatedAttribute('description',Session::get('lang') , 'fallbackLocale') --}}
                        </div>

                        <div class="py-4 mx-auto  text-left ">
                            <div class="mb-4">
                                <div id="formulario" class="flex flex-col gap-y-4">

                                    <div>

                                        <div class="mb-3 xl:w-full">
                                        <label class="md:w-2/3 block mt-6">
                                                    <input class="mr-2  h-4 w-4" type="checkbox" value="Помыть окна" name="services[]">
                                                    <span class="text-lg text-slate-900">
                                                    Помыть окна
                                                    </span>
                                                </label>
                                                                                            <label class="md:w-2/3 block mt-6">
                                                    <input class="mr-2  h-4 w-4" type="checkbox" value="Погладить белье" name="services[]">
                                                    <span class="text-lg text-slate-900">
                                                    Погладить белье
                                                    </span>
                                                </label>
                                                                                            <label class="md:w-2/3 block mt-6">
                                                    <input class="mr-2  h-4 w-4" type="checkbox" value="Помыть посуду" name="services[]">
                                                    <span class="text-lg text-slate-900">
                                                    Помыть посуду
                                                    </span>
                                                </label>
                                                                                            <label class="md:w-2/3 block mt-6">
                                                    <input class="mr-2  h-4 w-4" type="checkbox" value="Внутри холод-ка" name="services[]">
                                                    <span class="text-lg text-slate-900">
                                                    Внутри холод-ка
                                                    </span>
                                                </label>
                                                                                            <label class="md:w-2/3 block mt-6">
                                                    <input class="mr-2  h-4 w-4" type="checkbox" value="Внутри духовки" name="services[]">
                                                    <span class="text-lg text-slate-900">
                                                    Внутри духовки
                                                    </span>
                                                </label>
                                                                                            <label class="md:w-2/3 block mt-6">
                                                    <input class="mr-2  h-4 w-4" type="checkbox" value="Внутри СВЧ-печи" name="services[]">
                                                    <span class="text-lg text-slate-900">
                                                    Внутри СВЧ-печи
                                                    </span>
                                                </label>
                                                                                            <label class="md:w-2/3 block mt-6">
                                                    <input class="mr-2  h-4 w-4" type="checkbox" value="Внутри шкафов" name="services[]">
                                                    <span class="text-lg text-slate-900">
                                                    Внутри шкафов
                                                    </span>
                                                </label>
                                        </div>
                                    </div>

                                    <div>
                                        <!-- <span class="underline hover:text-[#5f5869] text-lg decoration-dotted cursor-pointer float-right">Приватная информация</span> -->
                                    </div>
                                    <div class="mt-4">
                                        <div class="flex w-full gap-x-4 mt-4">
                                        <a onclick="myFunction()" class="w-1/3  border border-[#000]-700 hover:border-[#000] transition-colors rounded-lg py-2 text-center flex justify-center items-center gap-2">
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
                                                   class="bg-[#6fc727] hover:bg-[#5ab82e] w-2/3 cursor-pointer text-white font-bold py-5 px-5 rounded"
                                                   name="" value="Далее">
                                        </div>
                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>

@elseif($data->type == 'radio')

                    <div class="shadow-xl w-full mx-auto mt-7 rounded-2xl	w-full p-6 px-20">
                        <div class="py-4 mx-auto px-auto text-center text-3xl texl-bold">
                        {{-- $data->getTranslatedAttribute('title',Session::get('lang') , 'fallbackLocale') --}}
                        </div>
                        <div class="py-4 mx-auto px-auto text-center text-sm texl-bold">
                        {{-- $data->getTranslatedAttribute('description',Session::get('lang') , 'fallbackLocale') --}}
                        </div>

                        <div class="py-4 mx-auto  text-left ">
                            <div class="mb-4">
                                <div id="formulario" class="flex flex-col gap-y-4">

                                    <div>

                                        <div name="glassSht" class="mb-3 xl:w-full">
                                            <input type="radio" id="1" name="box" value="1">
                                            <label for="1">1 шт.</label>
                                            <br>
                                            <br>
                                            <input type="radio" id="2" name="box" value="2">
                                            <label for="2">2 шт.</label>
                                            <br>
                                            <br>
                                            <input type="radio" id="3" name="box" value="3">
                                            <label for="3">3 шт.</label>
                                            <br>
                                            <br>
                                            <input type="radio" id="4" name="box" value="4">
                                            <label for="4">4 шт.</label>
                                            <br>
                                            <br>
                                            <input type="radio" id="5" name="box" value="5">
                                            <label for="5">5 шт.</label>
                                            <br>
                                            <br>
                                            <input type="radio" id="6" name="box" value="6">
                                            <label for="6">6 шт.</label>
                                            <br>
                                            <br>
                                            <input type="radio" id="7" name="box" value="7">
                                            <label for="7">7 шт.</label>
                                            <br>
                                            <br>
                                            <input type="radio" id="8" name="box" value="8">
                                            <label for="8">8 шт.</label>
                                            <br>
                                            <br>
                                            <input type="radio" id="9" name="box" value="9">
                                            <label for="9">9 шт.</label>
                                            <br>
                                            <br>
                                            <input type="radio" id="0" name="box" value="10">
                                            <label for="0">10 шт.</label>
                                        </div>
                                    </div>

                                    <div>
                                        <!-- <span class="underline hover:text-[#5f5869] text-lg decoration-dotted cursor-pointer float-right">Приватная информация</span> -->
                                    </div>
                                    <div class="mt-4">
                                        <div class="flex w-full gap-x-4 mt-4">
                                        <a onclick="myFunction()" class="w-1/3  border border-[#000]-700 hover:border-[#000] transition-colors rounded-lg py-2 text-center flex justify-center items-center gap-2">
                                            <!-- <button type="button"> -->
                                            Назад                                            <!-- </button> -->
                                            <script>
                                                function myFunction() {
                                                    window.history.back();
                                                }
                                            </script>
                                        </a>
                                            <input type="submit" class="bg-[#6fc727] hover:bg-[#5ab82e] w-2/3 cursor-pointer text-white font-bold py-5 px-5 rounded" name="" value="Далее">
                                        </div>
                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>

@elseif($data->type == 'input')

                    <div class="shadow-2xl w-full md:p-16 p-4 mx-auto my-4 rounded-2xl	w-full">
                        <div class="py-4 mx-auto px-auto text-center text-3xl texl-bold">
                        {{-- $data->getTranslatedAttribute('title',Session::get('lang') , 'fallbackLocale') --}}
                        </div>
                        <div class="py-4 mx-auto px-auto text-center text-sm texl-bold">
                        {{-- $data->getTranslatedAttribute('description',Session::get('lang') , 'fallbackLocale') --}}
                        </div>

                        <div class="py-4 mx-auto  text-left ">
                            <div class="mb-4">
                                <div id="formulario" class="flex flex-col gap-y-4">
                        {{-- $data->getTranslatedAttribute('label',Session::get('lang') , 'fallbackLocale') --}}
                                        <input placeholder="{{-- $data->getTranslatedAttribute('placeholder',Session::get('lang') , 'fallbackLocale') --}}"
                                         id="car" name="car" type="text" class="shadow appearance-none border focus:shadow-orange-500 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none"  required>

                                    </div>
                                <div class="mt-4">
                                    <div class="flex w-full gap-x-4 mt-4">
                                    <a onclick="myFunction()" class="w-1/3  border border-[#000]-700 hover:border-[#000] transition-colors rounded-lg py-2 text-center flex justify-center items-center gap-2">
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
                                               class="bg-[#6fc727] hover:bg-[#5ab82e] w-2/3 cursor-pointer text-white font-bold py-5 px-5 rounded"
                                               name="" value="@lang('lang.name_next')">

                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>
@endif


                </div>
                <x-faq/>
            </div>
        </div>


    </form>


@endsection
