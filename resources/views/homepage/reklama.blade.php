<div class="swiper mySwiper xl:w-10/12 lg:w-11/12 md:w-10/12 h-60 overflow-hidden rounded-xl mt-12 ">
    <div class="swiper-wrapper">
        @foreach ($reklamas as $reklama )
            <div class="swiper-slide w-full items-center  mt-12" >
                <div class="flex border-xl sm:w-10/12 h-36 w-3/4 lg:w-11/12 mx-auto">
                    <div class="w-1/2 lg:pl-8  md:pl-6 sm:pl-4 lg:w-5/12">
                        <h1 class="sm:text-lg text-base md:text-2xl font-semibold mb-4 lg:mr-0 md:mr-12">{{ $reklama->getTranslatedAttribute('title',Session::get('lang') , 'fallbackLocale') }}</h1>
                        <p class="sm:text-base text-sm md:text-lg mb-4">{{ $reklama->getTranslatedAttribute('comment',Session::get('lang') , 'fallbackLocale') }}</p>
                        <a href="/categories/1" class="py-2 sm:px-4 px-2 border-solid md:text-base text-xs bg-green-200 rounded-md">{{__("Создать задание")
                            }}</a>
                    </div>
                    <div class="w-1/2 lg:pr-8 md:pr-6 sm:pr-4 lg:w-7/12 rounded-lg">
                        <img src="{{ asset('storage/'.$reklama->image) }}"
                             class="object-cover rounded-lg object-right-bottom w-full h-full  "
                             alt="">
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="text-white swiper-button-next"></div>
    <div class="text-white swiper-button-prev"></div>
</div>
<!-- Swiper JS -->
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<script src="{{ asset('js/home.js') }}"></script>
