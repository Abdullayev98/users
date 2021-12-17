@extends("layouts.app")

@section("content")
    <div class="container w-10/12 mx-auto my-16">
        <div class="w-8/12 mx-auto text-center">
            <h1 class="text-5xl font-bold">Выберите категорию задания</h1>
            <h3 class="text-xl text-gray-500">Мы готовы помочь вам в решении самых разнообразных задач</h3>
            @foreach($categories as $category)
                <button type="button"
                        class="bg-inherit hover:bg-[#ffebad] border py-1 rounded-full px-4 my-4 text-gray-500 text-xs">
                    <i class="fas {{ $category->ico }}"></i>
                    <a href="{{route('categories',['id'=>$category->id])}}">
                        {{$category->name}}
                    </a>
                </button>
            @endforeach

        </div>
        <div class="w-1/4">
            <h4 class="font-bold text-xl">Курьерские услуги</h4>
        </div>
        <div class="grid grid-cols-3 mt-8">
            @foreach($child_categories as $category)
                <div class="w-full text-left">
                    <a href="{{url('task/create',['id'=>$category->id])}}"
                       class="py-4 text-gray-500 hover:text-[#ffa200] hover:underline">{{$category->name}}</a>
                </div>
            @endforeach

        </div>
    </div>
@endsection
