@extends('layouts.app')

@section('content')
    <div class="container w-4/5 mx-auto mt-12">
        <div class="flex lg:flex-row flex-col justify-center mt-6">
            @include('components.footerpage')
            <div class="lg:w-4/5 w-full text-base lg:mt-0 mt-4">
                @foreach ($medias as $media)
                <div class="mb-12">
                    @php
                        \Carbon\Carbon::setLocale('ru');
                    @endphp
                    <div class="italic text-gray-600">

                        {{ $media->created_at->format('d.m.Y') }} {{__('г')}}.
                    </div>
                    <h1 class="text-base md:text-lg">
                        <span class="text-red-500"> {{ $media->getTranslatedAttribute('title',Session::get('lang') , 'fallbackLocale') }}
                    </h1>
                    <p class="mt-4 text-base">
                        {{__('Совместно с Яндекс.Про провели')}}

                        <a class="text-blue-500 hover:text-black" href="/"> {{ $media->getTranslatedAttribute('description',Session::get('lang') , 'fallbackLocale') }}</a>

                        {{__('и узнали уровень дохода самозанятых, причины, по которым люди переходят на этот режим, а также основные плюсы и минусы, по мнению исполнителей. Кроме того, узнали главные факторы, благодаря которым самозанятые делают выбор в пользу платформенной занятости в России.')}}</p>
                </div>
                @endforeach
            </div>
        </div>
    </div>


    <div class="w-full" >
        <button onclick="topFunction()" id="myBtn" title="Go to top" class="fixed z-10 hidden p-3 bg-gray-100 rounded-full shadow-md bottom-10 right-10 animate-bounce">
            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 10l7-7m0 0l7 7m-7-7v18">
                </path>
            </svg>
        </button>
    </div>


    <script src="{{ asset('js/reviews/reviews.js') }}"></script>

@endsection
