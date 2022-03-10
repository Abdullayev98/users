@extends('layouts.app')

@section('content')
    <div class="w-10/12 mx-auto mt-8">
        <div class="lg:w-7/12 w-full">
            <div class="bg-yellow-50 p-8 rounded-md my-6 flex flex-wrap">
                Portfilio Name
                <input class="border focus:outline-none focus:border-yellow-500 mb-6 text-sm border-gray-200 rounded-md w-full px-4 py-2" type="text" disabled value="{{$portfolio->comment}}">
                Portfolio Description
                <input class="border focus:outline-none focus:border-yellow-500 mb-6 text-sm border-gray-200 rounded-md w-full px-4 py-2" type="text" disabled value="{{$portfolio->description}}">


            @foreach(json_decode($portfolio->image) as $image)
                <img class="w-40 h-40 m-2" src="{{asset('storage/'.$image)}}" alt="Images not found">
                {{--@dd($image);--}}
            @endforeach
            </div>

            <form action="{{ route('portfolio.delete', $portfolio->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div id="photos" class="bg-yellow-50 p-8 rounded-md my-6"></div>
                <input type="submit" class="bg-red-500 hover:bg-red-700 text-white py-2 px-10 mb-4 rounded" value="Удалить">
             </form>
        </div>
    </div>
@endsection
