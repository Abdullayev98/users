<div class="w-4/5 mx-auto text-left pt-10">
    <div class="text-3xl font-bold">
        {{__('Более')}} {{$users_count}}  {{__('исполнителей')}}
    </div>
    <div class="text-lg mt-4">
        {{__('Исполнители готовы помочь вам в решении самых разнообразных задач')}}
    </div>
    <div class="float-left my-14 w-full md:block hidden">
        @foreach ($categories as $category2)
            <a class="float-left items-center px-2 m-2 rounded-md ml-2 h-12 lg:border-0 border shadow-lg text-gray-600 hover:text-yellow-500 "
               href="{{route('categories', ['id'=> $category2->id])}}" style="box-shadow: 2px 2px gray;">
                {{--                <img src="{{ asset('/images/icons/') }}{{$category2->ico }}" alt="">--}}
                <span class="flex w-full flex-wrap content-center">
                                    <img src="{{ asset('storage/'.$category2->ico) }}" alt=""><span
                        class="ml-6 text-sm md:text-base text-gray-600"> {{ $category2->getTranslatedAttribute('name', Session::get('lang') , 'fallbackLocale' )}}</span>
                </span>

            </a>
        @endforeach
        <div class="float-left  pt-5 pl-4 ">
            <a href="/categories/1" class="bg-blue-900 w-full text-white px-2 py-3 rounded-lg my-2">
                {{__('Посмотреть все услуги')}}
            </a>
        </div>

    </div>

    <div class="flex flex-col float-left my-14 w-full md:hidden block">
        @foreach ($categories as $category2)
            <a class=" flex items-center m-2 text-gray-600 hover:text-yellow-500 "
               href="{{route('categories', ['id'=> $category2->id])}}">
                {{-- <img src="{{ asset('/images/icons/') }}{{$category2->ico }}" alt="">--}}
                <span class="flex w-full flex-wrap content-center">
                <img src="{{ asset('storage/'.$category2->ico) }}" alt=""></i><span
                    class="ml-6 text-lg text-gray-600"> {{ $category2->getTranslatedAttribute('name', Session::get('lang') , 'fallbackLocale' )}}</span>
                </span>
            </a>
        @endforeach
        <div class="float-left pt-5">
            <a href="/categories/1" class="bg-blue-900 w-full text-white px-2 py-3 rounded-lg my-2">
                {{__('Посмотреть все услуги')}}
            </a>
        </div>

    </div>
</div>
