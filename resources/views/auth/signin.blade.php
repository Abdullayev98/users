@extends('layouts.app')

@section('content')

        <div class="mt-3 text-center text-base">
            <div class="mx-auto flex items-center justify-center w-full">
                <h3 class="font-bold text-2xl block mb-4">
                   @lang('lang.signin_enter')
                </h3>
            </div>
            <div class="mt-4 flex flex-row justify-center">
               <a href="{{route('auth.google')}}"> <button class="w-40 h-12 rounded-lg bg-red-500 text-gray-200 uppercase font-semibold hover:bg-red-700 text-gray-100 transition mb-4 mr-4"> @lang('lang.signin_google')</button></a>
               <a href="{{route("auth.facebook")}}"> <button class="w-40 h-12 rounded-lg bg-blue-500 text-gray-200 uppercase font-semibold hover:bg-blue-700 text-gray-100 transition mb-4"> @lang('lang.signin_facebook')</button></a>
            </div>
            <div class="mx-auto flex items-center justify-center w-full">
                <h3 class="font-bold text-2xl block mb-4 mt-4">
                 @lang('lang.signin_elpocta')
                </h3>
            </div>
            <div>

                <form method="POST" action="{{ route('signin.custom') }}">
                    @csrf
                    <div class="mb-4">
                        <input type="text" name="email" placeholder="Email" id="name" value="{{  old('email') }}"
                               class="shadow focus:outline-none  focus:border-yellow-500 appearance-none border border-slate-300 rounded
                        w-80 py-2 px-3 text-gray-700 mb-3 leading-tight hover:border-amber-500"
                               autofocus>

                        @error('email')
                        <p class="text-red-500">{{ $message }}</p>
                        @enderror

                    </div>
                    <div class="mb-6">
                        <input   type="password" name="password" placeholder="@lang('lang.signin_password')" id="password"
                                 class="shadow focus:outline-none  focus:border-yellow-500 appearance-none border border-slate-300 rounded w-80 py-2 px-3
                        text-gray-700 mb-3 leading-tight hover:border-amber-500">

                        @error('password')
                            <p class="text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    @if(session()->has('message'))
                        <p class="text-red-500 mb-5">
                            Email or Password is not correct. Try again
                        </p>
                    @endif
                    <p></p>
                    <button type="submit"
                            class="w-80 h-12 rounded-lg bg-green-500 text-gray-200 uppercase
                        font-semibold hover:bg-green-500 text-gray-100 transition mb-4">
                        Войти
                    </button>


                </form>

                <p class="mb-4">
                    <a class="text-sky-500" href="{{ route('reset') }}">
                    @lang('lang.signin_passwordforgot')
                    </a>
                </p>
                <p class="mb-4">
                    @lang('lang.singin_withoutUs')
                    <a class="text-sky-500" href="{{ route('register') }}">
                    @lang('lang.signin_registration')
                    </a>
                </p>
            </div>
        </div>

@endsection
