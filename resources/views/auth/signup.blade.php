@extends('layouts.app')

@section('content')

        <div class="mt-3 text-center">
            <div class="mx-auto flex items-center justify-center w-full">
                <h3 class="font-bold text-2xl block my-4">
                    Войти через:
                </h3>
            </div>
            <div class="mt-4 flex flex-row justify-center">
                <a href="login/google"> <button class="w-40 h-12 rounded-lg bg-red-500 text-gray-200 uppercase font-semibold hover:bg-red-700 text-gray-100 transition mb-4 mr-4"> Google</button></a>
                <a href="login/facebook"> <button class="w-40 h-12 rounded-lg bg-blue-500 text-gray-200 uppercase font-semibold hover:bg-blue-700 text-gray-100 transition mb-4"> Facebook</button></a>
            </div>
            <div class="mx-auto flex items-center justify-center w-full">
                <h3 class="font-bold text-2xl block mb-4 mt-4">
                    Завершение регистрации
                </h3>
            </div>
            <form action="{{ route('user.registration') }}" method="POST">
                @csrf
                <div>
                    <div class="mb-4">
                        <label class="block text-gray-500 text-sm" for="name">
                            Имя Фамилия
                        </label>
                        <input type="text" name="name" placeholder="Name" id="name" class="shadow appearance-none border border-slate-300 rounded w-80 py-2 px-3 text-gray-700 mb-3 leading-tight hover:border-amber-500">
                        <br>
                        @if ($errors->has('name'))
                            <span class="text-danger" style="color: red">{{ $errors->first('name') }}</span>
                        @endif

                        <label class="block text-gray-500 text-sm" for="email_address">
                            Электронная почта
                        </label>
                        <input type="text" name="email" placeholder="Email" id="email_address" class="shadow appearance-none border border-slate-300 rounded w-80 py-2 px-3 text-gray-700 mb-3 leading-tight hover:border-amber-500">
                        <br>
                        @if ($errors->has('email'))
                        <span class="text-danger" style="color: red">{{ $errors->first('email') }}</span>
                        @endif

                        <label class="block text-gray-500 text-sm" for="password">
                            Пароль
                        </label>
                        <input type="password" name="password" placeholder="Password" id="password" class="shadow appearance-none border border-slate-300 rounded w-80 py-2 px-3 text-gray-700 mb-3 leading-tight hover:border-amber-500">
                        <br>
                        @if ($errors->has('password'))
                        <span class="text-danger" style="color: red">{{ $errors->first('password') }}</span>
                        @endif

                    </div>
                </div>
                <button type="submit" class="w-80 h-12 rounded-lg bg-lime-500 text-gray-200 uppercase font-semibold hover:bg-lime-600 text-gray-100 transition mb-4">
                    Зарегистрация
                </button>
            </form>
        </div>

@endsection
