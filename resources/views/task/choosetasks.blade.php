@extends("layouts.app")

@section("content")
    <link rel="stylesheet" href="{{ asset ('/css/carousel.min.css')}}">
    <script src="{{ asset ('/js/carousel.min.js') }}"></script>

    <style>
        *,
        *::before,
        *::after {
            box-sizing: border-box;
        }

        .slider__wrapper {
            overflow: hidden;
        }

        .slider__item {
            flex: 0 0 33.3333333333%;
            max-width: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            color: gray;
            border: 1px solid gray;
            height: 80px;
            border-radius: 10px;
            margin-left: 5px;
        }

    </style>
    <div class="container w-10/12 mx-auto">
        <div class="w-10/12 md:w-8/12 mx-auto text-center">
            <h1 class="text-3xl md:text-5xl font-bold">@lang('lang.chT_chooseCat')</h1>
            <h3 class="text-xl md:text-2xl my-5 text-gray-500">@lang('lang.chT_weHelp')</h3>
            <div class="max-w-full container mx-auto lg:hidden">
                <div class="slider">
                    <div class="slider__wrapper">
                        <div class="slider__items">
                            @foreach($categories as $category)
                                <button type="button"
                                        class="slider__item bg-inherit hover:bg-[#ffebad] border py-1 rounded-full px-4 my-4 text-gray-500 text-left md:text-center text-md md:inline-block block">
                                    <i class="fas {{ $category->ico }}"></i>
                                    <a href="{{route('categories',['id'=>$category->id])}}" class="text-sm lg:text-lg">
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
            <div class="hidden lg:block">
                @foreach($categories as $category)
                    <button type="button"
                            class="bg-inherit hover:bg-[#ffebad] border py-1 rounded-full px-4 my-4 text-gray-500 text-left md:text-center text-md md:inline-block block">
                        <i class="fas {{ $category->ico }}"></i>
                        <a href="{{route('categories',['id'=>$category->id])}}">
                            {{$category->getTranslatedAttribute('name',Session::get('lang') , 'fallbackLocale')}}
                        </a>
                    </button>
                @endforeach
            </div>



        </div>
        <div class="w-full ml-4 md:text-left mt-8 md:m-0">
          @foreach($choosed_category as $choosed)
            <h4 class="font-bold text-3xl">{{$choosed->getTranslatedAttribute('name',Session::get('lang') , 'fallbackLocale')}}</h4>
            @endforeach
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 mt-8">
            @foreach($child_categories as $category)
                <div class="w-full text-left text-left border-b border-solid md:border-0 mt-4 border-[#e9e9e9]">
                    <a href="/task/create?category_id={{$category->id}}"
                       class="text-gray-500 hover:text-[#ffa200] block ml-4 md:ml-0 pb-4 hover:underline">{{$category->getTranslatedAttribute('name', Session::get('lang') , 'fallbackLocale')}}</a>
                </div>
            @endforeach

        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const slider = new ChiefSlider('.slider', {
                loop: false
            });
        });
    </script>
@endsection
