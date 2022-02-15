@extends('layouts.app')

@section('content')

    <div class="mt-3 text-center text-base">
        <div class="mx-auto flex items-center justify-center w-full">
            <h3 class="font-bold text-2xl block my-4 text-gray-700">
                @lang('lang.signup_enter')
            </h3>
        </div>
        <div class="mt-4 flex flex-row justify-center mb-3">
            <a class="border-2 py-2 px-6 rounded-lg bg-red-500" href="{{route('auth.google')}}"><i class="fab fa-google text-2xl text-white"> </i></a>
            <a class="border-2 py-2 px-4 rounded-lg mx-3 text-2xl font-bold bg-yellow-500 text-white my-auto" href="{{ route('one.auth') }}">
                ONE ID
            </a>
            <a class="border-2 py-2 px-6 rounded-lg bg-blue-700" href="{{route("auth.facebook")}}"> <i class="fab fa-facebook text-2xl text-white"></i></a>
        </div>
        <div class="mx-auto flex items-center justify-center w-full">
            <h3 class="font-bold text-2xl block mb-4 text-gray-700">
                @lang('lang.signup_endedregistration')
            </h3>
        </div>
        <form action="{{ route('user.registration') }}" method="POST">
            @csrf
            <div>
                <div class="mb-4">
                    <div class="my-3">
                        <input type="text" name="name" placeholder="@lang('lang.signup_username')"
                               value="{{ request()->input('name', old('name')) }}"
                               id="name"
                               class="focus:outline-none focus:border-yellow-500 shadow appearance-none border border-slate-300 rounded sm:w-80 w-72 py-2 px-3 text-gray-700 leading-tight hover:border-amber-500">
                        @error('name')
                        <p class="text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="my-3">
                        <input type="text" name="email" placeholder="@lang('lang.signup_elpocta')"
                               value="{{ request()->input('email', old('email')) }}"
                               id="email_address"
                               class=" focus:outline-none focus:border-yellow-500 shadow appearance-none border border-slate-300 rounded sm:w-80 w-72 py-2 px-3 text-gray-700 leading-tight hover:border-amber-500">
                        @error('email')
                        <p class="text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="my-3">
                        <input type="text" id="phone_number" placeholder="+998(00)000-00-00"
                               value="+998{{ request()->input('phone_number') }}"
                               id="phone_number"
                               class=" focus:outline-none focus:border-yellow-500 shadow appearance-none border border-slate-300 rounded sm:w-80 w-72 py-2 px-3 text-gray-700 leading-tight hover:border-amber-500">
                        <br>
                        <input type="hidden" name="phone_number" id="phone">
                        @error('phone_number')
                        <p class="text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="my-3">

                        <input type="password" name="password" placeholder="@lang('lang.signup_password')"
                               id="password" maxlength="20"
                               class=" focus:outline-none focus:border-yellow-500 ml-6 shadow appearance-none border border-slate-300 rounded sm:w-80 w-72 py-2 px-3 text-gray-700 leading-tight hover:border-amber-500"
                               required>
                    <i class="fas fa-eye-slash text-gray-500 relative -left-12" id="eye"></i>
                    </div>
                    <div class="my-3">
                        <input type="password" name="password_confirmation"
                               placeholder="@lang('lang.signup_password_confirm')"
                               id="password_confirmation" maxlength="20"
                               class="ml-6 focus:outline-none focus:border-yellow-500 shadow appearance-none border border-slate-300 rounded sm:w-80 w-72 py-2 px-3 text-gray-700 mb-3 leading-tight hover:border-amber-500"
                               required>
                        <i class="fas fa-eye-slash text-gray-500 relative -left-12" id="eye1"></i>

                        @error('password')
                        <p class="text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <button type="submit"
                            class="sm:w-80 w-72 h-12 rounded-lg bg-green-500 text-white uppercase font-semibold hover:bg-green-500 transition mb-4">
                        @lang('lang.signup_registration')
                    </button>
                </div>

            </div>

        </form>
    </div>

    <script src='https://unpkg.com/imask'></script>
    <script src="{{ asset('js/auth/signup.js') }}"></script>
@endsection
