@extends('layouts.app')

@section('content')
<a href="{{route('Site.blog',['id'=>$last2->id])}}">
<div class="px-8 h-screen border-t-8 w-10/12 mx-auto bg-[url({{asset($last2->img)}})] bg-cover">
</div>
<div class="w-10/12 mx-auto my-8">
<p class="text-3xl font-bold">{{$last2->title}}</p>
<p class="text-xl">{{$last2->text}}</p>
</div>
</a>
@foreach($news as $new)
<a href="{{route('Site.blog',['id'=>$new->id])}}">
<div class="w-10/12 mx-auto">
    <div class="m-2 bg-white rounded-lg shadow-xl lg:flex lg:max-w-11/12">
        <img src="{{asset($new->img)}}" alt="Image Not Found"
            class="w-1/1 lg:w-1/2 rounded-l-2xl">
        <div class="p-6 bg-gray-50">
            <h2 class="mb-2 text-2xl font-bold text-gray-900">{{$new->title}}</h2>
            <p class="text-gray-600">{{$new->text}}</p>
        </div>
    </div>
  </div>
  </a>
@endforeach

@endsection
