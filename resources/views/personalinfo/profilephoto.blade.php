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
                <input type="file" name="file" id="file" onclick="fileupdate()" class="hidden">
                <label for="file" class="border cursor-pointer text-sm rounded-2xl	py-1.5 px-4">
                    <i class="fas fa-camera mr-1"></i>
                    <span>{{__('Загрузить фото')}}</span>
                </label>
                <form action="{{route('verification.photo.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
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
<link rel="stylesheet" href="{{ asset('path/ijaboCropTool.min.css') }}">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="{{ asset('path/ijaboCropTool.min.js') }}"></script>
<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.css" rel="stylesheet">
<script>
    $('#file').ijaboCropTool({
        preview: '.image-previewer',
        setRatio: 1,
        allowedExtensions: ['jpg', 'jpeg', 'png'],
        buttonsText: ['{{__('Сохранить')}}', '{{__('Отмена')}}'],
        buttonsColor: ['#30bf7d', '#ee5155', -15],
        processUrl: '{{ route('profile.image.store') }}',
        withCSRF: ['_token', '{{ csrf_token() }}'],
        fileName: 'image',
        onSuccess: function (message, element, status) {
            window.location.href = "{{ route('verification.photo') }}";
        },
        onError: function (message, element, status) {
            alert(message);
        }
    });
</script>
@endsection
