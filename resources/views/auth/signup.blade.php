@extends('layouts.app')

@section('content')

    <div class="mt-3 text-center text-base">
        <div class="mx-auto flex items-center justify-center w-full">
            <h3 class="font-bold text-2xl block my-4 text-gray-700">
            {{__('Зарегистрироваться через:')}}
            </h3>
        </div>
        <div class="mt-4 flex flex-row justify-center mb-3">
            <a class="border-2 py-2 px-12 mx-2 rounded-lg bg-red-500" href="{{route('auth.google')}}"><i class="fab fa-google text-2xl text-white"> </i></a>
            <a class="border-2 py-2 px-4 rounded-lg mx-3 text-2xl font-bold bg-yellow-500 text-white my-auto hidden" href="{{ route('one.auth') }}">
                ONE ID
            </a>
            <a class="border-2 py-2 px-12 mx-2 rounded-lg bg-blue-700" href="{{route("auth.facebook")}}"> <i class="fab fa-facebook text-2xl text-white"></i></a>
        </div>
        <div class="mx-auto flex items-center justify-center w-full">
            <h3 class="font-bold text-2xl block mb-4 text-gray-700">
                {{__('Заполните форму')}}
            </h3>
        </div>
        <form action="{{ route('user.registration') }}" method="POST">
            @csrf
            <div>
                <div class="mb-4">
                    <div class="my-3">
                        <input type="text" name="name" placeholder= "{{__('Имя Фамилия')}}"
                               value="{{ request()->input('name', old('name')) }}"
                               id="name"
                               class="focus:outline-none focus:border-yellow-500 shadow appearance-none border border-slate-300 rounded sm:w-80 w-72 py-2 px-3 text-gray-700 leading-tight hover:border-amber-500">
                        @error('name')
                        <p class="text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="my-3">
                        <input type="text" name="email" placeholder="{{__('Электронная почта')}}"
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

                        <input type="password" name="password" placeholder="{{__('Пароль')}}"
                               id="password" maxlength="20"
                               class=" focus:outline-none focus:border-yellow-500 ml-6 shadow appearance-none border border-slate-300 rounded sm:w-80 w-72 py-2 px-3 text-gray-700 leading-tight hover:border-amber-500"
                               required>
                    <i class="fas fa-eye-slash text-gray-500 relative -left-12" id="eye"></i>
                    </div>
                    <div class="my-3">
                        <input type="password" name="password_confirmation"
                               placeholder="{{__(' Подтвердите пароль')}}"
                               id="password_confirmation" maxlength="20"
                               class="ml-6 focus:outline-none focus:border-yellow-500 shadow appearance-none border border-slate-300 rounded sm:w-80 w-72 py-2 px-3 text-gray-700 mb-3 leading-tight hover:border-amber-500"
                               required>
                        <i class="fas fa-eye-slash text-gray-500 relative -left-12" id="eye1"></i>

                        @error('password')
                        <p class="text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="w-full my-3">
                        <p> <input type="checkbox" name="" id="checkbox1" class="w-4 h-4 mr-2"> Нажимая «Зарегистрироваться», <br> вы соглашаетесь с 
                            <a class="text-blue-600 hover:text-red-500 cursor-pointer" 
                            href="https://www.codegrepper.com" target="_blank">Правилами сайта</a></p>
                    </div>

                    <button type="button" id="btn11"
                            class="sm:w-80 w-72 h-12 rounded-lg bg-gray-500 text-white uppercase font-semibold  transition mb-4">
                        {{__('Зарегистрироваться')}}
                    </button>
                    <button type="submit" id="btn22"
                            class="hidden sm:w-80 w-72 h-12 rounded-lg bg-green-500 hover:bg-green-600 text-white uppercase font-semibold  transition mb-4">
                        {{__('Зарегистрироваться')}}
                    </button>
                </div>

            </div>

        </form>
    </div>

    <script src='https://unpkg.com/imask'></script>
    <script src="{{ asset('js/auth/signup.js') }}"></script>
@endsection
