<div class="w-4/5 mx-auto text-center pt-10">
    <div class="text-3xl font-bold">
        {{__('Более')}} {{$users_count}}  {{__('исполнителей')}}
    </div>
    <div class="text-lg mt-4">
        {{__('Исполнители готовы помочь вам в решении самых разнообразных задач')}}
    </div>
    <div class="my-14 w-full text-center md:block hidden">
        @foreach($categories as $category2)
            <button type="button"
                    class="bg-inherit hover:text-yellow-500 border py-1 rounded-full px-4 my-2 mx-2 text-gray-700 border-gray-400 text-left md:text-center text-md md:inline-block block">
                <span class="flex w-full flex-wrap content-center items-center">
                    <img src=" {{ asset('storage/'.$category2->ico) }}" alt="" class="h-8 w-8">
                <a class="text-sm p-3" href="{{route('categories',['id'=>$category2->id])}}">
                    {{$category2->getTranslatedAttribute('name',Session::get('lang') , 'fallbackLocale')}}
                </a>
                </span>

            </button>
        @endforeach
        {{-- <div class="float-left  pt-5 pl-4 ">
            <a href="/categories/1" class="bg-blue-900 w-full text-white px-2 py-3 rounded-lg my-2">
                {{__('Посмотреть все услуги')}}
            </a>
        </div> --}}

    </div>

    <div class="flex flex-col float-left my-14 w-full md:hidden block">
        @foreach ($categories as $category2)
            <a class=" flex items-center m-2 text-gray-600 hover:text-yellow-500 "
               href="{{route('categories', ['id'=> $category2->id])}}">
                {{-- <img src="{{ asset('/images/icons/') }}{{$category2->ico }}" alt="">--}}
                <span class="flex w-full flex-wrap content-center items-center">
                <img src="{{ asset('storage/'.$category2->ico) }}" alt="" class="h-8 w-8 sm:block hidden"></i><span
                    class="sm:ml-4 ml-0 text-base text-gray-600"> {{ $category2->getTranslatedAttribute('name', Session::get('lang') , 'fallbackLocale' )}}</span>
                </span>
            </a>
        @endforeach


    </div>
</div>
