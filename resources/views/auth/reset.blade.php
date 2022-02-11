@extends('layouts.app')
@section('content')
    <div class="mt-3 text-center text-base">
        <div class="mx-auto flex items-center justify-center w-full">
            <h3 class="font-bold text-2xl block mb-4">
                @lang('lang.authors_codeText1')
            </h3>
        </div>
        <div class="mx-auto flex items-center justify-center w-full">
            <p class="mb-4">
                @lang('lang.authors_codeText2')
            </p>
        </div>
        <form action="{{route('password.reset')}}" method="POST">
            @csrf
            <div>
                <div class="mb-4">
                    <label class="block text-gray-500 text-sm" for="phone_number">
                        @lang('lang.signup_telnumber')</span>
                    </label>
                    <input type="text" placeholder="+998"
                           value="+998{{ request()->input('phone_number', old('phone_number')) }}"
                           id="phone_number"
                           class="shadow appearance-none border border-slate-300 rounded w-80 py-2 px-3 text-gray-700 mb-3 leading-tight hover:border-amber-500">
                    <br>


                    @if(session()->has('message'))
                        <p class="text-red-500">{{session('message')}}</p>
                    @endif

                    <input type="hidden" name="phone_number" id="phone">
                    @error('phone_number')
                        <span class="text-danger" style="color: red">{{ $message  }}</span>
                    @enderror
                </div>
            </div>
            <button type="submit"
                    class="w-80 h-12 rounded-lg bg-green-500 text-gray-200 uppercase font-semibold hover:bg-green-500 text-gray-100 transition mb-4">
                @lang('lang.contact_send')
            </button>
        </form>
    </div>
@endsection



@section("javasript")



    <script src='https://unpkg.com/imask'></script>
    <script>
        var element = document.getElementById('phone_number');
        var maskOptions = {
            mask: '+998(00)000-00-00',
            lazy: false
        }
        var mask = new IMask(element, maskOptions);

        $("#phone_number").keyup(function (){
            var text = $(this).val()
                text = text.replace(/[^0-9.]/g, "")
            text = text.slice(3)
            $("#phone").val(text)
            console.log($("#phone").val())
        })

    </script>



@endsection
