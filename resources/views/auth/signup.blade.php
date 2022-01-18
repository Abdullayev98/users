@extends('layouts.app')

@section('content')

        <div class="mt-3 text-center">
            <div class="mx-auto flex items-center justify-center w-full">
                <h3 class="font-bold text-2xl block my-4">
                 @lang('lang.signup_enter')
                </h3>
            </div>
            <div class="mt-4 flex flex-row justify-center">
                <a href="login/google"> <button class="w-40 h-12 rounded-lg bg-red-500 text-gray-200 uppercase font-semibold hover:bg-red-700 text-gray-100 transition mb-4 mr-4"> @lang('lang.signup_google')</button></a>
                <a href="login/facebook"> <button class="w-40 h-12 rounded-lg bg-blue-500 text-gray-200 uppercase font-semibold hover:bg-blue-700 text-gray-100 transition mb-4"> @lang('lang.signup_facebook')</button></a>
            </div>
            <div class="mx-auto flex items-center justify-center w-full">
                <h3 class="font-bold text-2xl block mb-4 mt-4">
                 @lang('lang.signup_endedregistration')
                </h3>
            </div>
            <form action="{{ route('user.registration') }}" method="POST">
                @csrf
                <div>
                    <div class="mb-4">
                        <label class="block text-gray-500 text-sm" for="name">
                            @lang('lang.signup_username') <span class="text-red-500">*</span>
                        </label>
                            <input type="text" name="name" placeholder="Name" value="{{ request()->input('name', old('name')) }}"
                            id="name" class="shadow appearance-none border border-slate-300 rounded w-80 py-2 px-3 text-gray-700 mb-3 leading-tight hover:border-amber-500">
                        <br>
                        @if ($errors->has('name'))
                            <span class="text-danger" style="color: red">Пользователь с таким именем уже существует!</span>
                        @endif
                        <label class="block text-gray-500 text-sm" for="email_address">
                            @lang('lang.signup_elpocta')
                        </label>
                        <input type="text" name="email" placeholder="Email" value="{{ request()->input('email', old('email')) }}"
                        id="email_address" class="shadow appearance-none border border-slate-300 rounded w-80 py-2 px-3 text-gray-700 mb-3 leading-tight hover:border-amber-500">
                        <br>
                        @if ($errors->has('email'))
                            <span class="text-danger" style="color: red">Пользователь с такой почтой уже существует!</span>
                        @endif
                        <label class="block text-gray-500 text-sm" for="phone_number">
                            @lang('lang.signup_telnumber') <span class="text-red-500">*</span>
                        </label>
                        <input type="text" name="phone_number" placeholder="Phone" value="{{ request()->input('phone_number', old('phone_number')) }}"
                            id="phone_number" class="shadow appearance-none border border-slate-300 rounded w-80 py-2 px-3 text-gray-700 mb-3 leading-tight hover:border-amber-500">
                        <br>
                        @if ($errors->has('phone_number'))
                            <span class="text-danger" style="color: red">{{ $errors->first('phone_number') }}</span>
                        @endif

                        <label class="block text-gray-500 text-sm" for="password">
                            @lang('lang.signup_password') <span class="text-red-500">*</span>
                        </label>
                        <input type="password" name="password" placeholder="Password"
                            id="password" class="shadow appearance-none border border-slate-300 rounded w-80 py-2 px-3 text-gray-700 mb-3 leading-tight hover:border-amber-500" required>
                        <br>
                        @if ($errors->has('password'))
                        <span class="text-danger" style="color: red">{{ $errors->first('password') }}</span>
                        @endif

                    </div>
                </div>
                <button type="submit" class="w-80 h-12 rounded-lg bg-lime-500 text-gray-200 uppercase font-semibold hover:bg-lime-600 text-gray-100 transition mb-4">
                    @lang('lang.signup_registration')
                </button>
            </form>
        </div>

@endsection
