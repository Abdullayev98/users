@extends('layouts.app')

@section('content')

    <form class="" action="{{route('task.create.date')}}" method="post">
        @csrf

        <div class="mx-auto w-9/12  my-16">
            <div class="grid grid-cols-3 gap-x-20">
                <div class="md:col-span-2 col-span-3">
                    <div class="w-full text-center text-2xl">
                        @lang('lang.budget_lookingFor') "{{session('name')}}"
                    </div>
                    <div class="w-full text-center my-4 text-[#5f5869]">
                        @lang('lang.movers_percent')
                    </div>
                    <div class="pt-1">
                        <div class="overflow-hidden h-1 text-xs flex rounded bg-gray-200  mx-auto ">
                            <div style="width: 68%" class="shadow-none  flex flex-col text-center whitespace-nowrap text-white justify-center bg-green-500"></div>
                        </div>
                    </div>
                    <div class="shadow-2xl w-full md:p-16 p-4 mx-auto my-4 rounded-2xl	w-full">
                        <div class="py-4 mx-auto px-auto text-center text-3xl texl-bold">
                            @lang('lang.cargo_howBig')
                        </div>
                        <div class="py-4 mx-auto px-auto text-center text-sm texl-bold">
                            @lang('lang.cargo_measure')
                        </div>
                        <div class="py-4 mx-auto  text-left ">
                            <div class="mb-4">
                                <div id="formulario" class="flex flex-col gap-y-4">
                                    @if(session('cat_id') != 52)
                                    @lang('lang.movers_loadFlat')
                                    <input id="etaj_po" name="etaj_po" onkeypress='validate(event)' type="text" class="shadow appearance-none border focus:shadow-orange-500 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none"  required>
                                    @lang('lang.movers_elevator')
                                    <select id="lift_po" value="Лифт отсутствует" name="lift_po[]" type="number" class="shadow appearance-none border focus:shadow-orange-500 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none"  required>
                                        <option>@lang('lang.movers_noElevator')</option>
                                        <option>@lang('lang.movers_smElevator')</option>
                                        <option>@lang('lang.movers_cargElevator')</option>
                                    </select>
                                    @lang('lang.movers_flat')
                                    <input id="etaj_za" name="etaj_za" type="text" onkeypress='validate(event)' class="shadow appearance-none border focus:shadow-orange-500 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none"  required>
                                    @lang('lang.movers_elevator')
                                    <select id="lift_za" value="Лифт отсутствует" name="lift_za[]" type="number" class="shadow appearance-none border focus:shadow-orange-500 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none"  required>
                                        <option>@lang('lang.movers_noElevator')</option>
                                        <option>@lang('lang.movers_smElevator')</option>
                                        <option>@lang('lang.movers_cargElevator')</option>
                                    </select>
                                    @else
                                        @lang('lang.movers_loadFlat')
                                        <input id="etaj_po" name="etaj_po" type="number" class="shadow appearance-none border focus:shadow-orange-500 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none"  required>
                                        @lang('lang.movers_elevator')
                                        <select id="lift_po" value="Лифт отсутствует" name="lift_po[]" type="number" class="shadow appearance-none border focus:shadow-orange-500 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none"  required>
                                            <option>@lang('lang.movers_noElevator')</option>
                                            <option>@lang('lang.movers_smElevator')</option>
                                            <option>@lang('lang.movers_cargElevator')</option>
                                        </select>
                                @endif
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
                </div>
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
