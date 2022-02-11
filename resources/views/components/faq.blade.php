<div class="my-0 md:col-span-1 col-span-3 sm:mt-0 mt-4">
    <div class=" md:text-left text-center text-2xl text-gray-500 md:ml-4 ml-0">
{{--        <div class=" text-left  ml-4">--}}
        @lang('lang.comfaq_ownquestion')
        @foreach(getFaqCategories() as $faq)
        <p><a href="/questions/{{$faq->id}}" class="text-blue-500 hover:text-yellow-500 hover:underline text-base">{{ $faq->getTranslatedAttribute('title',Session::get('lang') , 'fallbackLocale') }}</a></p>
        @endforeach
    </div>
</div>

@section("javasript")
    <script src="{{ asset('js/components/faq.js') }}"></script>
@endsection
