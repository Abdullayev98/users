<div class="bg-blue-100">
    <div class="w-11/12 md:w-9/12 mx-auto pb-24">
        <div class="text-3xl md:text-4xl mx-auto py-16 text-center">
            {{__('Основные преимущества Universal Services')}}
        </div>
        <div class="grid lg:grid-cols-4 grid-cols-4 grid-cols-1 w-full md:w-11/12 mx-auto gap-y-12">
            @foreach ($advants as $advant )
                <div class="col-span-1 md:my-auto sm:mr-0 mr-4 rounded-lg">
                    <img src="{{ asset('storage/'.$advant->image) }}" class="md:w-32 md:h-32 h-24 w-24 rounded-lg"  alt="">
                </div>
                <div class="col-span-3 ml-5">
                    <h4 class="font-semibold text-xl md:text-2xl">{{$advant->getTranslatedAttribute('title',Session::get('lang') , 'fallbackLocale')}}</h4>
                    <p class="text-base">{{$advant->getTranslatedAttribute('description',Session::get('lang') , 'fallbackLocale')}}</p>
                </div>
            @endforeach
        </div>
    </div>
</div>
