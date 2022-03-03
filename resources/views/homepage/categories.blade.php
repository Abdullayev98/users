<div class="w-10/12 md:text-left text-left mx-auto md:px-16 px-4 pt-10">
    <div class="text-3xl font-bold">
        {{__('Более')}} {{$users_count}}  {{__('исполнителей')}}
    </div>
    <div class="text-lg mt-4">
        {{__('Исполнители готовы помочь вам в решении самых разнообразных задач')}}
    </div>
    <div class="float-left mt-14 w-full">
        @foreach ($categories as $category2)
            <a  class="float-left items-center px-2 my-2 rounded-md ml-2 h-12 lg:border-0 border-b shadow-xl hover:text-yellow-500 " href="{{route('categories', ['id'=> $category2->id])}}" style="box-shadow: 2px 2px gray;">
{{--                <img src="{{ asset('/images/icons/') }}{{$category2->ico }}" alt="">--}}
                <i class="{{ $category2->ico }} text-xl md:text-3xl"></i><span class="ml-6 text-sm md:text-base"> {{ $category2->getTranslatedAttribute('name', Session::get('lang') , 'fallbackLocale' )}}</span>
            </a>
        @endforeach
        <div class="float-left  pt-5 pl-4 ">
            <a href="/categories/1" class="bg-blue-900 w-full text-white px-2 py-3 rounded-lg my-2">
                {{__('Посмотреть все услуги')}}
            </a>
        </div>

    </div>
</div>
