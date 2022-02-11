@extends("layouts.app")

@section("content")
    <link rel="stylesheet" href="{{ asset ('/css/carousel.min.css')}}">
    <script src="{{ asset ('/js/carousel.min.js') }}"></script>

    <div class="container w-10/12 mx-auto text-base">
        <div class="w-10/12 md:w-8/12 mx-auto text-center">
            <h1 class="text-3xl md:text-5xl font-bold">@lang('lang.chT_chooseCat')</h1>
            <h3 class="text-xl md:text-2xl my-5 text-gray-500">@lang('lang.chT_weHelp')</h3>
            <div class="max-w-full container mx-auto md:hidden">
                <div class="slider" >
                    <div class="slider__wrapper" >
                        <div class="slider__items">
                            @foreach($categories as $category)
                                <button type="button"
                                        class="slider__item bg-inherit hover:bg-yellow-300 border py-1 rounded-full px-4 my-4 text-gray-500 text-left md:text-center text-md md:inline-block block">
                                    <i class="fas sm:mr-4 mr-2 {{ $category->ico }}"></i>
                                    <a href="{{route('categories',['id'=>$category->id])}}" class="text-sm text-center lg:text-lg">
                                        {{$category->getTranslatedAttribute('name',Session::get('lang') , 'fallbackLocale')}}
                                    </a>
                                </button>
                            <div class="hidden">
                                <a href="#" class="slider__control" data-slide="prev"></a>
                                <a href="#" class="slider__control" data-slide="next"></a>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="hidden md:block">
                @foreach($categories as $category)
                    <button type="button"
                            class="bg-inherit hover:bg-yellow-300 border py-1 rounded-full px-4 my-4 text-gray-500 text-left md:text-center text-md md:inline-block block">
                        <i class="fas {{ $category->ico }}"></i>
                        <a href="{{route('categories',['id'=>$category->id])}}">
                            {{$category->getTranslatedAttribute('name',Session::get('lang') , 'fallbackLocale')}}
                        </a>
                    </button>
                @endforeach
            </div>



        </div>
        <div class="w-full ml-4 md:text-left md:m-0">
          @foreach($choosed_category as $choosed)
            <h4 class="font-bold text-3xl mt-14 ">{{$choosed->getTranslatedAttribute('name',Session::get('lang') , 'fallbackLocale')}}</h4>
            @endforeach
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 mt-8">
            @foreach($child_categories as $category)
                <div class="w-full text-left text-left border-b border-solid md:border-0 mt-4 border-gray-200">
                    <a href="/task/create?category_id={{$category->id}}"
                       class="text-gray-500 hover:text-yellow-600 block ml-4 md:ml-0 pb-4 hover:underline">{{$category->getTranslatedAttribute('name', Session::get('lang') , 'fallbackLocale')}}</a>
                </div>
            @endforeach

        </div>
    </div>
    <script src="{{ asset('js/changetask.js') }}"></script>

@endsection
