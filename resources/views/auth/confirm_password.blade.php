@extends('layouts.app')
@section('content')
    <div class="mt-3 text-center text-base">
        <div class="mx-auto flex items-center justify-center w-full">
            <h3 class="font-bold text-2xl block mb-4">
                {{__('Восстановление пароля')}}
            </h3>
        </div>
        <form action="{{route('user.reset_password_save')}}" method="POST">
            @csrf
            <div>
                <div class="mb-4">
                    <label class="block text-gray-500 text-sm" for="phone_number">
                        {{__('Телефон немер')}}
                        </span>
                    </label>
                    <input type="password" placeholder="Password"
                           id="phone_number" name="password"
                       required
                           class="ml-6 focus:outline-none focus:border-yellow-500 shadow appearance-none border rounded w-80 py-2 px-3 text-gray-700 mb-3 leading-tight">
                        <i class="fas fa-eye-slash text-gray-500 relative -left-12" id="eye"></i>
                    <br>
                    <input type="password" placeholder="Confirm password"
                           id="phone_number" name="password"
                         required  class="shadow focus:outline-none focus:border-yellow-500 appearance-none border rounded w-80 py-2 px-3 text-gray-700 mb-3 leading-tight">
                    <br>
                    @error('code')
                        <span class="text-danger" style="color: red">{{ $message  }}</span>
                    @enderror
                </div>
            </div>
            <button type="submit"
                    class="w-80 h-12 rounded-lg bg-green-500 text-gray-200 uppercase font-semibold hover:bg-green-500 text-gray-100 transition mb-4">
                {{__('Отправить')}}
            </button>
        </form>
    </div>
@endsection



@section("javasript")

    <script src="{{ asset('js/auth/confirm_password.js') }}"></script>
@endsection
