<div class="grid md:grid-cols-3 grid-cols-1 my-8">
    @foreach ($trusts as $trust)
        <div class="text-center">
            <img src="{{ asset('storage/'.$trust->image) }}"
                 class="mx-auto w-52 h-52" alt="">
            <h1 class="font-bold my-4">{{ $trust->getTranslatedAttribute('title',Session::get('lang') , 'fallbackLocale') }}</h1>
            <p class="text-sm">{{ $trust->getTranslatedAttribute('description',Session::get('lang') , 'fallbackLocale') }}</p>
        </div>
    @endforeach
</div>
