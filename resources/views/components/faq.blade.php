<div class="lg:col-span-1 col-span-3 lg:mt-0 mt-4">
    <div class="text-left md:ml-4 ml-0">
        <p class="mb-6 font-semibold text-xl text-gray-600">{{__('Частые вопросы')}}</p>
        @foreach(getFaqCategories() as $faq)
       <p class="my-2"> <a href="/questions/{{$faq->id}}" class="my-4 text-gray-500 hover:text-yellow-500 hover:underline text-base">{{ $faq->getTranslatedAttribute('title',Session::get('lang') , 'fallbackLocale') }}</a></p>
        @endforeach
    </div>
</div>

@section("javasript")
    <script src="{{ asset('js/components/faq.js') }}"></script>
@endsection
