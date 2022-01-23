@extends('layouts.app')
@section('content')
        <div class="mt-3 text-center text-base">
            <div class="mx-auto flex items-center justify-center w-full">
                <h3 class="font-bold text-2xl block mb-4">
                    Восстановление пароля
                </h3>
            </div>
            <div class="mx-auto flex items-center justify-center w-full">
                <p class="mb-4">
                    Укажите телефон, привязанный к вашей учетной записи. Мы отправим СМС с кодом.
                </p>
            </div>
            <form action="#" method="POST">
                @csrf
                <div>
                    <div class="mb-4">
                        <label class="block text-gray-500 text-sm" for="phone_number">
                            @lang('lang.signup_telnumber')</span>
                        </label>
                        <input type="text" name="phone_number" placeholder="Phone" value="{{ request()->input('phone_number', old('phone_number')) }}"
                            id="phone_number" class="shadow appearance-none border border-slate-300 rounded w-80 py-2 px-3 text-gray-700 mb-3 leading-tight hover:border-amber-500">
                        <br>
                        @if ($errors->has('phone_number'))
                            <span class="text-danger" style="color: red">{{ $errors->first('phone_number') }}</span>
                        @endif
                    </div>
                </div>
                <button type="submit" class="w-80 h-12 rounded-lg bg-green-500 text-gray-200 uppercase font-semibold hover:bg-green-500 text-gray-100 transition mb-4">
                    @lang('lang.contact_send')
                </button>
            </form>
        </div>
@endsection
