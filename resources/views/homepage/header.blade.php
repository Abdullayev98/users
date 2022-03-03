<link rel="stylesheet" href="{{ asset ('/css/header.css') }}">
<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css"/>


{{--<div class="HomepageHeaderSection">--}}
{{--    <div class="video-bg">--}}
{{--        @if(setting('site.Video_bg') != null)--}}
{{--            @php--}}
{{--                $array_video = json_decode(setting('site.Video_bg'), true);--}}
{{--                    $str_replace = str_replace("\\","/",$array_video);--}}
{{--            @endphp--}}
{{--            <video src="{{asset('storage/'.$array_video['0']['download_link'])}}" type="video/mp4" autoplay muted loop></video>--}}
{{--        @else--}}
{{--            @php--}}
{{--                $pp = setting('site.foto_bg');--}}
{{--                $str_replace = str_replace("\\","/",$pp);--}}
{{--            @endphp--}}
{{--            --}}{{--            <img src="storage/{{$str_replace}}" alt="rasm yoq">--}}
{{--            <img src="{{ asset('/images/uborka1.jpg') }}" alt="rasm yoq">--}}
{{--        @endif--}}
{{--        <div class="effects"></div>--}}
{{--        <div class="video-bg__content"></div>--}}
{{--    </div>--}}
{{--</div>--}}
<div class="left-50" style="background: #FFF5E5; height: 500px;">
    <div class="w-xl">
        <main class="w-10/12 mx-auto grid grid-cols-2">
            <div class="pt-24 grid-cols-1">
                <h1 class="font-bold text-4xl lg:text-5xl">
                    <span class="block">{{__('Освободим вас от забот')}}</span>
                </h1>
                <p class="mt-3 text-sm md:text-base sm:mt-5 sm:mx-auto md:mt-3 md:md:mt-2 mb-3">
                    {{__('Поможем найти надежного исполнителя для любых задач')}}
                </p>
                <div class="mx-auto">
                    <div class="lg:w-10/12 w-full flex-1 mt-8">
                        <input name="TypeList" list="TypeList" type="text" id="header_input" placeholder="{{__('Чем вам помочь...')}}"
                               class="input_text w-full md:px-4 px-2 py-2.5 md:py-3 rounded-xl focus:placeholder-transparent focus:outline-none focus:border-yellow-500 flex-1 md:text-xl text-lg">
                        <datalist id="TypeList">
                            @foreach(\TCG\Voyager\Models\Category::query()->where('parent_id','!=',NULL)->get() as $category)
                                <option
                                    value="{{ $category->getTranslatedAttribute('name',Session::get('lang') , 'fallbackLocale') }}" id="{{ $category->id }}">{{ $category->getTranslatedAttribute('name',Session::get('lang') , 'fallbackLocale') }}</option>
                            @endforeach
                        </datalist>
                        <a href="" type="submit" id="createhref"
                           class="float-right sm:block hidden md:text-xl text-lg border bg-blue-900 z-0 border-transparent rounded-xl md:px-3.5 px-2 pt-2 pb-1.5 md:py-2.2 mr-1 md:mt-2 mt-2.5 -ml-24 md:-top-14 -top-14 relative text-white">
                            {{__('Заказать услугу')}}
                        </a>
                        <a href="" type="submit" id="createhref"
                           class="float-right sm:hidden block  md:text-xl  text-lg border bg-blue-900 z-0 border-transparent rounded-xl md:px-3.5 px-2 pt-2 pb-1.5 md:py-2 mr-1 md:mt-2 mt-2.5 -ml-24 md:-top-14 -top-14 relative text-white">
                            Заказать
                        </a>
{{--                        <div class="text-left mt-2 text-gray-300 font-semibold underline-offset-1 text-xs">--}}
{{--                            {{__('Например:')}}--}}
{{--                            <a href="/task/create?category_id=22" id="span_demo" onclick="myFunction()" class="hover:text-slate-400  hover:text-gray-200 cursor-pointer">--}}
{{--                                {{__('Услуги пешего курьера')}}--}}
{{--                            </a>--}}
{{--                        </div>--}}
                        <div class="mt-8">
                            <a class="cursor-pointer">
                                <i class="fab fa-instagram text-yellow-500 mx-2"></i>
                            </a>
                            <a class="cursor-pointer">
                                <i class="fab fa-telegram text-yellow-500 mx-2"></i>
                            </a>
                            <a class="cursor-pointer">
                                <i class="fab fa-youtube text-yellow-500 mx-2"></i>
                            </a>
                            <a class="cursor-pointer">
                                <i class="fab fa-facebook text-yellow-500 mx-2"></i>
                            </a>
                        </div>
                    </div>
                </div>
{{--                <div class="flex flex-row sm:w-1/2 w-5/6 mx-auto mt-8 items-center text-blue-300 hover:text-blue-400">--}}
{{--                    <a href="{{route('verification')}}"><i class="text-blue fas fa-shield-alt text-2xl mx-2"></i></a>--}}
{{--                    <a href="{{route('verification')}}"> <p class="text-base underline">--}}
{{--                            {{__('стать исполнителем и начать зарабатывать')}}</p></a>--}}
{{--                </div>--}}
            </div>
            <div class="grid-cols-1">
                <div>
                    <img src="{{ asset('/images/bg_line.png') }}" alt="Line" class="absolute z-1 h-full" style=" height: 500px;">
                    <img src="{{ asset('/images/Ellipse1.png') }}" alt="" class="relative z-10 top-6 ml-16" style=" height: 450px;">
                </div>
            </div>
        </main>
    </div>
</div>
