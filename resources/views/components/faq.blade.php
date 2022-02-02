<div class="my-0 md:col-span-1 col-span-3">
    <div class=" text-left text-2xl text-gray-500 w-11/12 ml-4">
{{--        <div class=" text-left  ml-4">--}}
        @lang('lang.comfaq_ownquestion')
        @foreach(\App\Models\FaqCategories::all() as $faq)
        <p><a href="/questions/{{$faq->id}}" class="text-blue-500 hover:text-yellow-500 hover:underline text-base">{{$faq->title}}</a></p>
        @endforeach
    </div>
</div>
