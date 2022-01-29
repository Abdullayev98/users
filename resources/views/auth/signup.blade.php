@extends('layouts.app')

@section('content')

    <div class="mt-3 text-center text-base">
        <div class="mx-auto flex items-center justify-center w-full">
            <h3 class="font-bold text-2xl block my-4">
                @lang('lang.signup_enter')
            </h3>
        </div>
        <div class="flex flex-row justify-center">
            <a href="{{route('auth.google')}}">
                <button
                    class="w-40 h-12 rounded-lg bg-red-500 text-gray-200 uppercase font-semibold hover:bg-red-700 text-gray-100 transition mb-4 mr-4"> @lang('lang.signup_google')</button>
            </a>
            <a href="{{route('auth.facebook')}}">
                <button
                    class="w-40 h-12 rounded-lg bg-blue-500 text-gray-200 uppercase font-semibold hover:bg-blue-700 text-gray-100 transition mb-4"> @lang('lang.signup_facebook')</button>
            </a>
        </div>
        <div class="mx-auto flex items-center justify-center w-full">
            <h3 class="font-bold text-2xl block mb-4">
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
                               class=" focus:outline-none focus:border-yellow-500 shadow appearance-none border border-slate-300 rounded w-80 py-2 px-3 text-gray-700 leading-tight hover:border-amber-500">
                        @error('name')
                        <p class="text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="my-3">
                        <input type="text" name="email" placeholder="@lang('lang.signup_elpocta')"
                               value="{{ request()->input('email', old('email')) }}"
                               id="email_address"
                               class=" focus:outline-none focus:border-yellow-500 shadow appearance-none border border-slate-300 rounded w-80 py-2 px-3 text-gray-700 leading-tight hover:border-amber-500">
                        @error('email')
                        <p class="text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="my-3">
                        <input type="text" id="phone_number" placeholder="+998(00)000-00-00"
                               value="+998{{ request()->input('phone_number') }}"
                               id="phone_number"
                               class=" focus:outline-none focus:border-yellow-500 shadow appearance-none border border-slate-300 rounded w-80 py-2 px-3 text-gray-700 leading-tight hover:border-amber-500">
                        <br>
                        <input type="hidden" name="phone_number" id="phone">
                        @error('phone_number')
                        <p class="text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="my-3">

                        <input type="password" name="password" placeholder="@lang('lang.signup_password')"
                               id="password"
                               class=" focus:outline-none focus:border-yellow-500 ml-6 shadow appearance-none border border-slate-300 rounded w-80 py-2 px-3 text-gray-700 leading-tight hover:border-amber-500"
                               required>
                        <i class="fas fa-eye-slash text-gray-500 relative -left-12" id="eye"></i>
                    </div>
                    <div class="my-3">
                        <input type="password" name="password_confirmation"
                               placeholder="@lang('lang.signup_password_confirm')"
                               id="password_confirmation"
                               class="ml-6 focus:outline-none focus:border-yellow-500 shadow appearance-none border border-slate-300 rounded w-80 py-2 px-3 text-gray-700 mb-3 leading-tight hover:border-amber-500"
                               required>
                        <i class="fas fa-eye-slash text-gray-500 relative -left-12" id="eye1"></i>

                        @error('password')
                        <p class="text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <button type="submit"
                            class="w-80 h-12 rounded-lg bg-green-500 text-gray-200 uppercase font-semibold hover:bg-green-500 text-gray-100 transition mb-4">
                        @lang('lang.signup_registration')
                    </button>
                </div>

            </div>

        </form>
    </div>

    <script src='https://unpkg.com/imask'></script>
    <script>
        var element = document.getElementById('phone_number');
        var maskOptions = {
            mask: '+998(00)000-00-00',
            lazy: false
        }
        var mask = new IMask(element, maskOptions);

        $("#phone_number").keyup(function () {
            var text = $(this).val()
            text = text.replace(/[^0-9.]/g, "")
            text = text.slice(3)
            $("#phone").val(text)
        })

    </script>
    <script>
        $(function () {

            $('#eye').click(function () {
                if ($(this).hasClass('fa-eye-slash')) {
                    $(this).removeClass('fa-eye-slash');
                    $(this).addClass('fa-eye');
                    $('#password').attr('type', 'text');
                } else {
                    $(this).removeClass('fa-eye');
                    $(this).addClass('fa-eye-slash');
                    $('#password').attr('type', 'password');
                }
            });

        });
    </script>
    <script>
        $(function () {

            $('#eye1').click(function () {
                if ($(this).hasClass('fa-eye-slash')) {
                    $(this).removeClass('fa-eye-slash');
                    $(this).addClass('fa-eye');
                    $('#password_confirmation').attr('type', 'text');
                } else {
                    $(this).removeClass('fa-eye');
                    $(this).addClass('fa-eye-slash');
                    $('#password_confirmation').attr('type', 'password');
                }
            });

        });
    </script>
@endsection
