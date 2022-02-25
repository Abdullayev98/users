@extends('layouts.app')
<!-- test -->
@section('content')
    @if ($message = Session::get('success'))
        <div  id="modal-id2" class="alert alert-success alert-block">
            <div class="flex flex-row justify-between items-center bg-green-500 border-t border-b text-white px-4 py-2
            font-bold">{{ $message }}
              <button onclick="toggleModal2()" type="button" class="bg-red-500 hover:bg-blue-200 py px-2 rounded-full text-xl font-bold right-0 close" data-dismiss="alert"><i class="text-white hover:text-red-500 fas fa-times"></i></button>
            </div>
        </div>
    @endif

{{--    header blog--}}
    @include('homepage.header')

    <div class="fixed hidden inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full" id="my-modal">
        <!--modal content-->
        <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
            @include('profile.login')
        </div>
    </div>

    <main>
{{--        categories section--}}
        @include('homepage.categories')

{{--        cards section--}}
        @include('homepage.blogs')

{{--        reklamas section--}}
        @include('homepage.reklama')

{{--        How is this possible section--}}
        @include('homepage.home_economy')

{{--        advantages section--}}
        @include('homepage.advantages')

{{--        mobile buttons section--}}
        @include('homepage.mobile_section')

{{--        What is being ordered at Universal Service right now--}}
        @include('homepage.posts_section')
    </main>

    <div class="w-full">
        <button onclick="topFunction()" id="myBtn" title="Go to top" class="fixed z-10 hidden p-3 bg-gray-100 rounded-full shadow-md bottom-5 right-24 animate-bounce">
            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 10l7-7m0 0l7 7m-7-7v18">
                </path>
            </svg>
        </button>
    </div>
    <!-- Swiper JS -->
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script src="{{ asset('js/home.js') }}"></script>

@endsection
