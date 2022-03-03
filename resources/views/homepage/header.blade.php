<link rel="stylesheet" href="{{ asset ('/css/header.css') }}">
<link rel="stylesheet" href="{{ asset('/css/bundle.min.css') }}"/>


<div class="left-50" style="background: #FFF5E5; height: 500px;">
    <div class="w-xl">
        <main class="w-4/5 mx-auto grid grid-cols-2 gap-2">
            <div class="pt-24 lg:col-span-1 col-span-2">
                <h1 class="font-bold text-4xl lg:text-5xl">
                    <span class="block">{{__('Освободим вас от забот')}}</span>
                </h1>
                <p class="mt-3 text-sm md:text-base sm:mt-5 sm:mx-auto md:mt-3 md:md:mt-2 mb-3">
                    {{__('Поможем найти надежного исполнителя для любых задач')}}
                </p>
                <div class="mx-auto">
                    <div class="lg:w-10/12 w-full flex-1 mt-8">
                        <input name="TypeList" list="TypeList" type="text" id="header_input" placeholder="{{__('Чем вам помочь...')}}"
                               class="input_text w-full md:px-4 px-2 py-2.5 md:py-3 rounded-xl focus:placeholder-transparent focus:outline-none focus:border-yellow-500 flex-1 md:text-xl border-0 text-lg">
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
            </div>
            <div class="col-span-1 lg:block hidden">
                <div>
                    <img src="{{ asset('/images/bg_line.png') }}" alt="Line" class="absolute z-1 h-full" style=" height: 500px;">
                </div>
                <div class="relative z-10 top- left-72" style=" height: 500px;">
                    <div>
                        <!-- first -->
                        <div class="">
                            <input class="sr-only peer" type="radio" name="carousel" id="carousel-1" checked />
                            <!-- content #1 -->
                            <div
                                class="absolute top-1/2 transform -translate-x-1/2 -translate-y-1/2 rounded-full shadow-lg transition-all duration-300 opacity-0 peer-checked:opacity-100 peer-checked:z-10 z-0">
                                <img class="rounded-full" style="height: 450px; width: 450px;" src="{{ asset('/images/Ellipse1.png') }}" alt="" />
                                <!-- controls -->
                                <div class="absolute top-1/2 w-full flex justify-between z-20">
                                    <label for="carousel-3" class="inline-block text-red-600 cursor-pointer -translate-x-5 bg-white rounded-full shadow-md active:translate-y-0.5">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm.707-10.293a1 1 0 00-1.414-1.414l-3 3a1 1 0 000 1.414l3 3a1 1 0 001.414-1.414L9.414 11H13a1 1 0 100-2H9.414l1.293-1.293z" clip-rule="evenodd" />
                                        </svg>
                                    </label>
                                    <label for="carousel-2" class="inline-block text-red-600 cursor-pointer translate-x-5 bg-white rounded-full shadow-md active:translate-y-0.5">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-8.707l-3-3a1 1 0 00-1.414 1.414L10.586 9H7a1 1 0 100 2h3.586l-1.293 1.293a1 1 0 101.414 1.414l3-3a1 1 0 000-1.414z" clip-rule="evenodd" />
                                        </svg>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <!-- second -->
                        <div class="">
                            <input class="sr-only peer" type="radio" name="carousel" id="carousel-2" />
                            <!-- content #2 -->
                            <div
                                class="absolute top-1/2 transform -translate-x-1/2 -translate-y-1/2 rounded-full shadow-lg transition-all duration-300 opacity-0 peer-checked:opacity-100 peer-checked:z-10 z-0">
                                <img class="rounded-full" style="height: 450px; width: 450px;" src="{{ asset('/images/Rectangle.png') }}" alt="" />
                                <!-- controls -->
                                <div class="absolute top-1/2 w-full flex justify-between z-20">
                                    <label for="carousel-1" class="inline-block text-blue-600 cursor-pointer -translate-x-5 bg-white rounded-full shadow-md active:translate-y-0.5">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm.707-10.293a1 1 0 00-1.414-1.414l-3 3a1 1 0 000 1.414l3 3a1 1 0 001.414-1.414L9.414 11H13a1 1 0 100-2H9.414l1.293-1.293z" clip-rule="evenodd" />
                                        </svg>
                                    </label>
                                    <label for="carousel-3" class="inline-block text-blue-600 cursor-pointer translate-x-5 bg-white rounded-full shadow-md active:translate-y-0.5">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-8.707l-3-3a1 1 0 00-1.414 1.414L10.586 9H7a1 1 0 100 2h3.586l-1.293 1.293a1 1 0 101.414 1.414l3-3a1 1 0 000-1.414z" clip-rule="evenodd" />
                                        </svg>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <!-- three -->
                        <div class="">
                            <input class="sr-only peer" type="radio" name="carousel" id="carousel-3" />
                            <!-- content #3 -->
                            <div
                                class="absolute top-1/2 transform -translate-x-1/2 -translate-y-1/2 rounded-full shadow-lg transition-all duration-300 opacity-0 peer-checked:opacity-100 peer-checked:z-10 z-0">
                                <img class="rounded-t-lg" style="height: 450px; width: 450px;" src="{{ asset('/images/Ellipse1.png') }}" alt="" />
                                <!-- controls -->
                                <div class="absolute top-1/2 w-full flex justify-between z-20">
                                    <label for="carousel-2" class="inline-block text-yellow-600 cursor-pointer -translate-x-5 bg-white rounded-full shadow-md active:translate-y-0.5">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm.707-10.293a1 1 0 00-1.414-1.414l-3 3a1 1 0 000 1.414l3 3a1 1 0 001.414-1.414L9.414 11H13a1 1 0 100-2H9.414l1.293-1.293z" clip-rule="evenodd" />
                                        </svg>
                                    </label>
                                    <label for="carousel-1" class="inline-block text-yellow-600 cursor-pointer translate-x-5 bg-white rounded-full shadow-md active:translate-y-0.5">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-8.707l-3-3a1 1 0 00-1.414 1.414L10.586 9H7a1 1 0 100 2h3.586l-1.293 1.293a1 1 0 101.414 1.414l3-3a1 1 0 000-1.414z" clip-rule="evenodd" />
                                        </svg>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </main>
    </div>
</div>
<script src="{{ asset('/js/jit_cdn.js') }}"></script>
