@extends("layouts.app")

@section("content")
    <div class="container mx-auto w-full my-8">
        <div class="w-1/2 ml-20">
            <div class="">
                <h1 class="text-5xl font-bold mb-4"> @lang('lang.contact_title')</h1>
                <p class="my-6">
                    @lang('lang.contact_text')
                </p>
                <a href="#replain-link">
                    <button type="submit" class="text-white bg-[#6fc727] hover:bg-[#5ab82e] focus:ring-4 focus:ring-[#6fc727] font-medium rounded-lg text-sm px-5 py-2.5 text-center">@lang('lang.contact_text1')</button>
                </a>
            </div>
        </div>

        <div class="flex flex-row">
            <div class="lg:basis-1/2 basis-0"></div>
            <div class="lg:basis-1/2 basis-full flex md:flex-row flex-col lg:ml-0 ml-20 lg:mt-0 mt-8">
                <div class="mt-8">
                    <h1 class="font-bold text-2xl mb-2"> @lang('lang.contact_text11')</h1>
                     <p> @lang('lang.contact_text12')</p>
                </div>
                <div class="ml-4">
                    <img class="w-48 h-48" src="https://clipartspub.com/images/software-clipart-clip-art-9.jpg" alt="#">
                </div>
            </div>
        </div>
    </div>
@endsection
