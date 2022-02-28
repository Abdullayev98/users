@extends("layouts.app")


@section("content")

<div class="shadow-2xl border-t px-10 rounded-md w-full md:w-5/12 mx-auto grid grid-flow-col gap-4 my-5 flex-wrap md:flex-wrap-reverse">

    <div сlass="grid-rows-12  md:px-5 px-1 md:pb-5 pb-1">
        <div class="container p-5">
            <div class="text-center">
                @php
                    $user = auth()->user()
                @endphp
                <div class="flex justify-center">
                    <img class="w-20 h-20"
                         @if ($user->avatar == Null)
                         src='{{asset("storage/images/default.jpg")}}'
                         @else
                         src="{{asset("storage/{$user->avatar}")}}"
                         @endif alt="avatar">
                </div>
                <h3 class="text-2xl font-semibold my-3">
                    {{$user->name}}
                </h3>

                <form action="{{route('verification.photo.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <label for="profilephoto" class="border cursor-pointer text-sm rounded-2xl	py-1.5 px-4">{{__('Загрузить фото')}
                        }</label>
                    <input type="file" id="profilephoto" name="avatar" class="hidden">
                    <p class="text-base my-5">
                    {{__('Пользователям с хорошей фотографией больше доверяют. Фото можно добавить потом.')}}
                    </p>
                    <div class="flex w-full gap-x-4 mt-4">
                        <a onclick="myFunction()" class="w-1/3  border border-black-700 hover:border-black transition-colors rounded-lg py-2 text-center flex justify-center items-center gap-2">
                            <!-- <button type="button"> -->
                            {{__('Назад')}}
                            <script>
                                function myFunction() {
                                    window.history.back();
                                }
                            </script>
                        </a>
                        <input type="submit" class="bg-green-500 hover:bg-green-500 w-2/3 cursor-pointer text-white font-bold py-5 px-5 rounded" value="{{__('Далее')}}">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
