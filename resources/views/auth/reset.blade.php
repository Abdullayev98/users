@extends('layouts.app')
@section('content')
    <div class="mt-3 text-center text-base">
        <div class="mx-auto flex items-center justify-center w-full">
            <h3 class="font-bold text-2xl block mb-4">
                {{__('Восстановление пароля')}}
            </h3>
        </div>
        <div class="mx-auto flex items-center justify-center w-full">
            <p class="mb-4">
                {{__('Укажите телефон, привязанный к вашей учетной записи. Мы отправим СМС с кодом.')}}
            </p>
        </div>
        <form action="{{route('user.reset_submit')}}" method="POST">
            @csrf
            <div>
                <div class="mb-4">
                    <label class="block text-gray-500 text-sm" for="phone_number">
                  {{__('Телефон немер')}}
                </span>
                    </label>
                    <input type="text" placeholder="+998"
                           value="+998{{ request()->input('phone_number', old('phone_number')) }}"
                           id="phone_number"
                           class="shadow appearance-none border focus:outline-none focus:border-yellow-500 rounded w-80 py-2 px-3 text-gray-700 mb-3 leading-tight">
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
                {{__('Отправить')}}
            </button>
        </form>
    </div>
@endsection



@section("javasript")
    <script src='https://unpkg.com/imask'></script>
    <script src="{{ asset('js/auth/reset.js') }}"></script>
@endsection
