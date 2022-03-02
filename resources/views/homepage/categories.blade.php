<div class="container md:text-left text-left mx-auto md:px-16 px-4 sm:pt-40 pt-36">
    <div class="text-3xl font-bold">
        {{__('Более')}} {{$users_count}}  {{__('исполнителей')}}
    </div>
    <div class="text-lg mt-4">
        {{__('Исполнители готовы помочь вам в решении самых разнообразных задач')}}
    </div>
    <div class="flex flex-wrap w-11/12 mt-14 mx-auto">
        @foreach ($categories as $category2)
            <a  class="flex flex-row lg:w-1/3 w-full items-center px-2 my-4 lg:border-0 border-b text-gray-500 hover:text-yellow-500 " href="{{route('categories', ['id'=> $category2->id])}}">
                <i class="{{ $category2->ico }} text-xl md:text-3xl"></i><span class="ml-6 text-sm md:text-lg"> {{ $category2->getTranslatedAttribute('name', Session::get('lang') , 'fallbackLocale' )}}</span>
            </a>
        @endforeach
    </div>
    <div class="mb-4 mt-8 text-center text-base">
        <a href="/categories/1">
            <button type="button" class="font-semibold text-yellow-500 hover:text-white border border-yellow-500 duration-300 hover:bg-yellow-500 rounded-md w-64 h-12">
                {{__('Посмотреть все услуги')}}
            </button>
        </a>
    </div>
</div>
