@extends("layouts.app")

@section("content")
    <link rel="stylesheet" href="{{ asset ('/css/carousel.min.css')}}">
    <script src="{{ asset ('/js/carousel.min.js') }}"></script>

    <div class="container w-10/12 mx-auto sm:my-12 my-4 text-base">
        <div class="text-center">
            <h1 class="text-3xl pt-5 md:text-5xl font-bold">{{__('Выберите категорию задания')}}</h1>
            <h3 class="text-lg my-5 font-semibold text-gray-400 mb-8">{{__('Мы готовы помочь вам в решении самых разнообразных задач')}}</h3>
            <div class="max-w-full container mx-auto lg:hidden">
                <div class="slider">
                    <div class="slider__wrapper">
                        <div class="slider__items sm:w-2/3 w-full">
                            @foreach($categories as $category)
                                <button type="button"
                                        class="slider__item bg-inherit hover:text-yellow-500 border py-1 rounded-full px-4 my-4 text-gray-500 text-left md:text-center text-md md:inline-block block">
                                    <span class="flex w-full flex-wrap content-center">
                               <img src=" {{ asset('storage/'.$category->ico) }}" alt="">
                                        <a href="{{route('categories',['id'=>$category->id])}}" class=" text-center text-lg p-3">
                                        {{$category->getTranslatedAttribute('name',Session::get('lang') , 'fallbackLocale')}}
                                    </a>
                                    </span>
                                </button>
                                <div class="hidden">
                                    <a class="slider__control" data-slide="prev"></a>
                                    <a class="slider__control" data-slide="next"></a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="hidden lg:block">
                @foreach($categories as $category)
                    <button type="button"
                            class="bg-inherit hover:text-yellow-500 border py-1 rounded-full px-4 my-2 mx-2 text-gray-500 border-gray-300 text-left md:text-center text-md md:inline-block block">
                        <span class="flex w-full flex-wrap content-center">
                               <img src=" {{ asset('storage/'.$category->ico) }}" alt="">
                        <a class="text-sm p-3" href="{{route('categories',['id'=>$category->id])}}">
                            {{$category->getTranslatedAttribute('name',Session::get('lang') , 'fallbackLocale')}}
                        </a>
                        </span>

                    </button>
                @endforeach
            </div>


        </div>
        <div class="w-full ml-4 md:text-left md:m-0">
            @foreach($choosed_category as $choosed)
                <h4 class="font-bold text-3xl mt-14 ">{{$choosed->getTranslatedAttribute('name',Session::get('lang') , 'fallbackLocale')}}</h4>
            @endforeach
        </div>
        <div class="flex flex-wrap  mt-8">
            @foreach($child_categories as $category)
                <div class="lg:w-1/3 w-full text-left my-2">
                    <a href="/task/create?category_id={{$category->id}}">
                        <span
                            class="text-gray-900 hover:text-yellow-600 block hover:underline">{{$category->getTranslatedAttribute('name', Session::get('lang') , 'fallbackLocale')}}</span>
                    </a>
                    <hr class="mt-4 lg:hidden block">
                </div>
            @endforeach

        </div>
    </div>
    <script src="{{ asset('js/tasks/changetask.js') }}"></script>

@endsection
