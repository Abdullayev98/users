@extends('layouts.app')
@section('content')
        <div class="mt-3 text-center">
            <div class="mx-auto flex items-center justify-center w-full">
                <h3 class="font-bold text-2xl block my-4">
                 {{__('Зарегистрироваться через:')}}
                </h3>
            </div>
            <div class="mt-4 flex flex-row justify-center">
                <a href="login/google"> <button class="w-40 h-12 rounded-lg bg-red-500 text-gray-200 uppercase font-semibold hover:bg-red-700 text-gray-100 transition mb-4 mr-4"> 
                    {{__('Google')}}
                </button></a>
                <a href="login/facebook"> <button class="w-40 h-12 rounded-lg bg-blue-500 text-gray-200 uppercase font-semibold hover:bg-blue-700 text-gray-100 transition mb-4">
                    {{__('Facebook')}}
                </button></a>
            </div>
            <div class="mx-auto flex items-center justify-center w-full">
                <h3 class="font-bold text-2xl block mb-4 mt-4">
                {{__('Заполните форму')}}
                </h3>
            </div>
            <form action="#" method="POST">
                @csrf
                <div>
                    <div class="mb-4">
                        <label class="block text-gray-500 text-sm" for="confirm">
                             <span class="text-red-500">*</span>
                             {{__('смс отправлено')}}
                        </label>
                            <input type="text" name="confirm_otp" placeholder="{{__('смс код')}}" value="{{ request()->input('confirm_otp', old('confirm_otp')) }}"
                            id="confirm_otp" class="shadow appearance-none border rounded w-80 py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:border-yellow-500">
                        <br>
                        @if ($errors->has('смс отправлено'))
                            <span class="text-danger" style="color: red">{{ $errors->first('смс отправлено') }}</span>
                        @endif
                    </div>
                </div>
                <button type="submit" class="w-80 h-12 rounded-lg bg-green-500 text-gray-200 uppercase font-semibold hover:bg-green-500 text-gray-100 transition mb-4">
                    {{__('отправить')}}
                </button>
            </form>
        </div>
@endsection
