@extends('layouts.app')

@section('content')
    <div class="w-10/12 mx-auto mt-8">
        <div class="w-7/12">
            <div class="bg-yellow-50 p-8 rounded-md my-6 flex flex-wrap">
                @foreach($comment as $comments)
                Portfilio Name
                <input class="border focus:outline-none mb-6 text-sm border-gray-200 rounded-md w-full px-4 py-2" type="text" disabled value="{{$comments->comment}}">
                Portfolio Description
                <input class="border focus:outline-none mb-6 text-sm border-gray-200 rounded-md w-full px-4 py-2" type="text" disabled value="{{$comments->description}}">


            @php
                $images = explode(',', $comments->image);
                $a = sizeof($images)-1;
            @endphp
            @for($i = 0; $i <= $a; $i++)
                <img class="w-40 h-40 mx-2" src="{{asset($images[$i])}}" alt="Images not found">
                {{--@dd($image);--}}
            @endfor
            </div>

            <form action="/profile/delete/portfolio/{{$comments->id}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div id="photos" class="bg-yellow-50 p-8 rounded-md my-6"></div>
                <input type="submit" class="bg-red-500 hover:bg-red-700 text-white py-2 px-10 w-4/12 mb-4 rounded" value="@lang('lang.profile_save')">
             </form>
                @endforeach
        </div>
    </div>
@endsection
