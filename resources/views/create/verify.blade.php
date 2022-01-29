@extends('layouts.app')

@include('layouts.fornewtask')

@section('content')

    <!-- Information section -->
    <form action="{{route('task.create.verification')}}" method="post">
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
                                            @if(auth()->check())
                                                <label for="phone">Verification Code</label>
                                                <input type="number"
                                                       class="shadow appearance-none border focus:shadow-orange-500 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none "
                                                       name="sms_otp">
                                            @endif
                                            @if(session()->has('expired_message'))
                                                <p class="text-red-500">{{Session::get('expired_message')}}</p>
                                            @elseif(session()->has('incorrect_message'))
                                                    <p class="text-red-500">{{Session::get('incorrect_message')}}</p>
                                            @endif

                                     </div>
                                    </div>
                                </div>
                            </div>
                            <input name="for_ver_func" type="hidden" value="{{$task->id}}">
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




@endsection
