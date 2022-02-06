@extends('layouts.app')

@section('content')
    <div>
        @foreach($comment as $comments)

            @php
                $images = explode(',', $comments->image);
                $a = array($images);
            @endphp
        @if(sizeof($images) != 1)
            @for($i = 0; $i <= sizeof($a); $i++)
                <img src="{{asset($images[$i])}}" alt="Images not found">
                {{--@dd($image);--}}
            @endfor
        @else
                <img src="{{asset($images[0])}}" alt="Images not found">
        @endif
        @endforeach
    </div>
@endsection
