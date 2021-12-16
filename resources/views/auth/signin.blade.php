@extends('layouts.app')

@section('content')

        <div class="mt-3 text-center">
            <div class="mx-auto flex items-center justify-center w-full">
                <h3 class="font-bold text-2xl block mb-4">
                    Войти через:
                </h3>
            </div>
            <div class="mt-4 flex flex-row justify-center">
               <a href="login/google"> <button class="w-40 h-12 rounded-lg bg-red-500 text-gray-200 uppercase font-semibold hover:bg-red-700 text-gray-100 transition mb-4 mr-4"> Google</button></a>
               <a href="login/facebook"> <button class="w-40 h-12 rounded-lg bg-blue-500 text-gray-200 uppercase font-semibold hover:bg-blue-700 text-gray-100 transition mb-4"> Facebook</button></a>
            </div>
            <div class="mx-auto flex items-center justify-center w-full">
                <h3 class="font-bold text-2xl block mb-4 mt-4">
                    Войти по электронной почте
                </h3>
            </div>
            <div>
                <form method="POST" action="{{ route('signin.custom') }}">
                    @csrf
                    <div class="mb-4">
                        <label class="block text-gray-500  text-sm " for="email">
                            Электронная почта
                        </label>
                        <input type="text" name="email" placeholder="Email" id="email" 
                        class="shadow appearance-none border border-slate-300 rounded 
                        w-80 py-2 px-3 text-gray-700 mb-3 leading-tight hover:border-amber-500"
                        required autofocus>

                        @if ($errors->has('email'))
                            <span class="text-danger">{{ $errors->first('email') }}</span>
                        @endif
                    </div>
                    <div class="mb-6">
                        <label class="block text-gray-500  text-sm " for="password">
                            Пароль
                        </label>
                        <input   type="password" name="password" placeholder="Password" id="password" required
                        class="shadow appearance-none border border-slate-300 rounded w-80 py-2 px-3 
                        text-gray-700 mb-3 leading-tight hover:border-amber-500">
                        
                        @if ($errors->has('password'))
                            <span class="text-danger">{{ $errors->first('password') }}</span>
                        @endif
                    </div>
                    <button type="submit"
                        class="w-80 h-12 rounded-lg bg-lime-500 text-gray-200 uppercase 
                        font-semibold hover:bg-lime-600 text-gray-100 transition mb-4">
                        Войти
                    </button>
                </form>
                <p class="text-sky-500 text-lg mb-4">
                    <a href="#">
                        Забыли пароль?
                    </a>
                </p>
                <p class="text-lg mb-4">
                    Еще не с нами?
                    <a class="text-sky-500" href="{{ route('register') }}">
                        Зарегистрируйтесь
                    </a>
                </p>
            </div>
        </div>
    
@endsection