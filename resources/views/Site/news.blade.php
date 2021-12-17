@extends('layouts.app')

@section('content')
<div class="py-5 px-8 border-t-8">
    <img style="height: 100px; width: 1400px;" class="min-h-screen" src="{{asset('storage/'.$last2->img)}}">
    <p class="text-3xl font-bold">{{$last2->title}}</p>
    <p class="text-xl">{{$last2->text}}</p>
</div>
@foreach($news as $new)
<div class="w-full">
    <div class="m-2 bg-white rounded-lg shadow-xl lg:flex lg:max-w-11/12">
        <img src="{{asset('storage/'.$new->img)}}" alt="Image Not Found"
            class="w-1/1 lg:w-1/2 rounded-l-2xl">
        <div class="p-6 bg-gray-50">
            <h2 class="mb-2 text-2xl font-bold text-gray-900">{{$new->title}}</h2>
            <p class="text-gray-600">{{$new->text}}</p>
        </div>
    </div>
@endforeach

@endsection
