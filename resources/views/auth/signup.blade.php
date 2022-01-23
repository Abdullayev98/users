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
                            <input type="text" name="name" placeholder="@lang('lang.signup_username')" value="{{ request()->input('name', old('name')) }}"
                            id="name" class="shadow appearance-none border border-slate-300 rounded w-80 py-2 px-3 text-gray-700 mb-3 leading-tight hover:border-amber-500">
                            <br>
                        @if ($errors->has('name'))
                            <span class="text-danger" style="color: red">{{ $errors->first('name') }}</span>
                        @endif
                            <input type="text" name="email" placeholder="@lang('lang.signup_elpocta')" value="{{ request()->input('email', old('email')) }}"
                            id="email_address" class="shadow appearance-none border border-slate-300 rounded w-80 py-2 px-3 text-gray-700 mb-3 leading-tight hover:border-amber-500">
                            <br>
                        @if ($errors->has('email'))
                            <span class="text-danger" style="color: red">{{ $errors->first('email') }}</span>
                        @endif
                            <input type="text" name="phone_number" id="phone_number" placeholder="+998(00)000-00-00" value="{{ request()->input('phone_number', old('phone_number')) }}"
                                id="phone_number" class="shadow appearance-none border border-slate-300 rounded w-80 py-2 px-3 text-gray-700 mb-3 leading-tight hover:border-amber-500">
                            <br>
                        @if ($errors->has('phone_number'))
                            <span class="text-danger" style="color: red">{{ $errors->first('phone_number') }}</span>
                        @endif
                            <input type="password" name="password" placeholder="@lang('lang.signup_password')"
                                id="password" class="shadow appearance-none border border-slate-300 rounded w-80 py-2 px-3 text-gray-700 mb-3 leading-tight hover:border-amber-500" required>
                            <br>
                        @if ($errors->has('password'))
                        <div class="text-danger" style="color: red">{{ $errors->first('password') }}</div>
                        @endif
                            <input type="password" name="password_confirmation" placeholder="@lang('lang.signup_password_confirm')"
                                id="password_confirmation" class="shadow appearance-none border border-slate-300 rounded w-80 py-2 px-3 text-gray-700 mb-3 leading-tight hover:border-amber-500" required>
                            <br>
                    </div>
                </div>
                <button type="submit" class="w-80 h-12 rounded-lg bg-green-500 text-gray-200 uppercase font-semibold hover:bg-lime-600 text-gray-100 transition mb-4">
                    @lang('lang.signup_registration')
                </button>
            </form>
        </div>
        <script src="https://unpkg.com/imask"></script>
        <script>
            var element = document.getElementById('phone_number');
        var maskOptions = {
            mask: '(00)000-00-00',
            lazy: false
        } 
        var mask = new IMask(element, maskOptions);
        
        var element2 = document.getElementById('email');
        var maskOptions2 = {    
            mask:function (value) {
                        if(/^[a-z0-9_\.-]+$/.test(value))
                            return true;
                        if(/^[a-z0-9_\.-]+@$/.test(value))
                            return true;
                        if(/^[a-z0-9_\.-]+@[a-z0-9-]+$/.test(value))
                            return true;
                        if(/^[a-z0-9_\.-]+@[a-z0-9-]+\.$/.test(value))
                            return true;
                        if(/^[a-z0-9_\.-]+@[a-z0-9-]+\.[a-z]{1,4}$/.test(value))
                            return true;
                        if(/^[a-z0-9_\.-]+@[a-z0-9-]+\.[a-z]{1,4}\.$/.test(value))
                            return true;
                        if(/^[a-z0-9_\.-]+@[a-z0-9-]+\.[a-z]{1,4}\.[a-z]{1,4}$/.test(value))
                            return true;
                        return false;
                            },
            lazy: false
        } 
        var mask2 = new IMask(element2, maskOptions2);
        </script>
@endsection
