@extends('layouts.app')

@section('content')

        <div class="mt-3 text-center text-base">
            <div class="mx-auto flex items-center justify-center w-full">
                <h3 class="font-bold text-2xl block mb-4 text-gray-700">
                   @lang('lang.signin_enter')
                </h3>
            </div>
            <div class="mt-4 flex flex-row justify-center">
                <a class="border-2 py-2 px-6 rounded-lg bg-red-500" href="{{route('auth.google')}}"><i class="fab fa-google text-2xl text-white"> </i></a>
                <a class="border-2 py-2 px-4 rounded-lg mx-3 text-2xl font-bold bg-yellow-500 text-white my-auto" href="{{ route('one.auth') }}">
                    ONE ID
                </a>
               <a class="border-2 py-2 px-6 rounded-lg bg-blue-700" href="{{route("auth.facebook")}}"> <i class="fab fa-facebook text-2xl text-white"></i></a>
            </div>
            <div class="mx-auto flex items-center justify-center w-full">
                <h3 class="font-bold text-2xl block mb-4 mt-4 text-gray-700">
                 @lang('lang.signin_elpocta')
                </h3>
            </div>
            <div>

                <form method="POST" action="{{ route('signin.custom') }}" class="flex flex-col justify-items-center justify-items-center">
                    @csrf
                    <div class="mb-4">
                        <input type="text" name="email" placeholder="Email" id="name" value="{{  old('email') }}"
                               class="shadow focus:outline-none  focus:border-yellow-500 appearance-none border border-slate-300 rounded
                        sm:w-80 w-60 py-2 px-3 text-gray-700 mb-3 leading-tight hover:border-amber-500"
                               autofocus>

                        @error('email')
                        <p class="text-red-500">{{ $message }}</p>
                        @enderror

                    </div>

                    <div class="mb-6">
                        <input   type="password" name="password" placeholder="@lang('lang.signin_password')" id="password"
                                 class="ml-6 shadow focus:outline-none  focus:border-yellow-500 appearance-none border border-slate-300 rounded sm:w-80 w-60 py-2 px-3
                        text-gray-700 mb-3 leading-tight hover:border-amber-500">
                        <i class="fas fa-eye-slash text-gray-500 relative -left-12" id="eye"></i>

                        @error('password')
                            <p class="text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    @if(session()->has('message'))
                        <p class="text-red-500 mb-5">
                            @lang('login.emailError')
                        </p>
                    @endif
                    <div>
                        <button type="submit"
                                class="sm:w-80 w-40 h-12 rounded-lg bg-green-500 text-white uppercase
                        font-semibold hover:bg-green-500 transition mb-4">
                            @lang('lang.singin_button')
                        </button>
                    </div>

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

        <script>
            $(function () {

                $('#eye').click(function () {
                    if ($(this).hasClass('fa-eye-slash')) {
                        $(this).removeClass('fa-eye-slash');
                        $(this).addClass('fa-eye');
                        $('#password').attr('type', 'text');
                        $('#password_confirmation').attr('type', 'text');
                    } else {
                        $(this).removeClass('fa-eye');
                        $(this).addClass('fa-eye-slash');
                        $('#password').attr('type', 'password');
                        $('#password_confirmation').attr('type', 'password');
                    }
                });

            });
        </script>
@endsection
