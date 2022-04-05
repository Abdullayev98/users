@extends('layouts.app')

@section('content')

<div class="w-9/12 mx-auto mt-32 mb-64">

    <h1 class="text-4xl text-black font-bold">Правила сервиса</h1>
    <div class="mt-24">
        <a href="{{route('file_download.download')}}" class="text-gray-500 hover:text-red-500 border-b-2 border-gray-500 hover:border-red-500">
            Правила сервиса Universal Services
        </a>
    </div>
</div>

@endsection