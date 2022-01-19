@extends('layouts.app')

@section('content')
    @if(session('cat_id') == 28)
    <form class="" action="{{route('task.create.avto_delivery')}}" method="post">
    @else
        <form class="" action="{{route('task.create.date')}}" method="post">
    @endif
        @csrf

        <div class="mx-auto w-9/12  my-16">
            <div class="grid grid-cols-3 gap-x-20">
                <div class="md:col-span-2 col-span-3">
                    <div class="w-full text-center text-2xl">
                    @lang('lang.buyd_text') "{{session('name')}}"
                    </div>
                    <div class="w-full text-center my-4 text-[#5f5869]">
                    @lang('lang.buyd_text1')
                    </div>
                    <div class="pt-1">
                        <div class="overflow-hidden h-1 text-xs flex rounded bg-gray-200  mx-auto ">
                            <div style="width: 60%" class="shadow-none  flex flex-col text-center whitespace-nowrap text-white justify-center bg-green-500"></div>
                        </div>
                    </div>
                    <div class="shadow-2xl w-full md:p-16 p-4 mx-auto my-4 rounded-2xl	w-full">
                        <div class="py-4 mx-auto px-auto text-center text-3xl texl-bold">
                            @lang('lang.cargo_howBig')
                        </div>
                        <div class="py-4 mx-auto px-auto text-center text-sm texl-bold">
                        @lang('lang.buyd_text2')
                        </div>
                        <div class="py-4 mx-auto  text-left ">
                            <div class="mb-4">
                                <div id="formulario" class="flex flex-col gap-y-4">
                                        @lang('lang.buyd_text3')
                                        <input max='50' id="delivey_weight" name="delivey_weight" type="text" onkeypress='validate(event)' class="shadow appearance-none border focus:shadow-orange-500 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none"  required>
                                        @lang('lang.buyd_text4')
                                        <input max='100' id="delivey_length" name="delivey_length" type="text" onkeypress='validate(event)' class="shadow appearance-none border focus:shadow-orange-500 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none"  required>
                                        @lang('lang.buyd_text5')
                                        <input max='100' id="delivey_width" name="delivey_width" type="text" onkeypress='validate(event)' class="shadow appearance-none border focus:shadow-orange-500 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none"  required>
                                        Высота, м
                                        <input max='100' id="delivey_height" name="delivey_height" type="text" onkeypress='validate(event)' class="shadow appearance-none border focus:shadow-orange-500 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none"  required>
                                        @lang('lang.delivery_text')
                                        <input id="delivey_budget" name="delivey_budget" type="text" onkeypress='validate(event)' class="shadow appearance-none border focus:shadow-orange-500 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none"  required>
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
                </div>
                <x-faq/>
            </div>
        </div>
    </form>

    <script>
        $(".delete-task").click(function (){
        Swal.fire({
            title: '@lang('lang.name_deleteAsk')',
            showDenyButton: true,
            confirmButtonText: '@lang('lang.name_continue')',
            denyButtonText: '@lang('lang.name_delete')',
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.close()
            } else if (result.isDenied) {
                window.location.href = '/';
                return false;
            }
        })
    })
        $('div').removeClass('group');
        $('ul').removeClass('group-hover');
        $('button').removeClass('hover:text-[#ffa200]');
        $('button').removeClass('text-gray-500');
        $('button').addClass('text-gray-400');
    </script>

@endsection
