@extends('layouts.app')

@section('content')
    <div>
        @foreach($comment as $comments)

            @php
                $images = explode(',', $comments->image);
                $a = array($images);
            @endphp
        @for($i = 0; $i <= sizeof($a); $i++)
            <img src="{{asset($images[$i])}}" alt="Images not found">
            {{--@dd($image);--}}
        @endfor
        @endforeach
    </div>
@endsection
