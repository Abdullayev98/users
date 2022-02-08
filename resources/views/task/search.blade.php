@extends("layouts.app")

@section("content")

    <div class="mx-auto w-11/12 xl:w-9/12 my-8 md:my-16">
        <div class="grid lg:grid-cols-5 grid-cols-5 container mx-auto text-sm">
            <div class="col-span-5 lg:col-span-3">
                <div class="w-full bg-yellow-50 my-5 rounded-md">
                    <div class="px-5 py-5 hidden md:block">
                    <!-- <form action="{{route('search')}}" method="get"> -->
                        <div class="grid grid-cols-4 gap-4 mb-3">

                            <div class="sm:inline-flex block w-full col-span-4 relative">
                            <!-- <input class="focus:outline-none  w-10/12 text-black-700 border border-black rounded mr-4 px-1" type="text" placeholder="Поиск по ключевым словам" name="s" value="{{$s ?? ''}}" aria-label="Full name"> -->
                                <input id="filter" type="text"
                                       class="focus:outline-none focus:placeholder-transparent w-10/12 py-1 px-3 text-black-700 border-2 rounded-md border-neutral-400 focus:border-sky-500 focus:shadow-sm focus:shadow-sky-500 mr-4"
                                       placeholder="@lang('lang.search_byKey')">
                                <svg class="h-4 w-4 text-gray-400 fill-current absolute left-3/4 top-2" id="svgClose" width="12" height="12" viewBox="0 0 26 26" stroke-width="2" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"><path d="M 21.734375 19.640625 L 19.636719 21.734375 C 19.253906 22.121094 18.628906 22.121094 18.242188 21.734375 L 13 16.496094 L 7.761719 21.734375 C 7.375 22.121094 6.746094 22.121094 6.363281 21.734375 L 4.265625 19.640625 C 3.878906 19.253906 3.878906 18.628906 4.265625 18.242188 L 9.503906 13 L 4.265625 7.761719 C 3.882813 7.371094 3.882813 6.742188 4.265625 6.363281 L 6.363281 4.265625 C 6.746094 3.878906 7.375 3.878906 7.761719 4.265625 L 13 9.507813 L 18.242188 4.265625 C 18.628906 3.878906 19.257813 3.878906 19.636719 4.265625 L 21.734375 6.359375 C 22.121094 6.746094 22.121094 7.375 21.738281 7.761719 L 16.496094 13 L 21.734375 18.242188 C 22.121094 18.628906 22.121094 19.253906 21.734375 19.640625 Z"/></svg>
                                <button
                                    class="sm:w-2/12 w-4/12 bg-green-500 hover:bg-green-600 ml-1 py-1 px-1 rounded-md sm:mt-0 text-white" onclick="ajaxFilter()"
                                >@lang('lang.search_find')</button>
                            </div>

                            <div class="md:inline-flex  block w-full col-span-4">
                                <div class="w-8/12 md:w-7/12 relative">
                                    <label class="text-xs mb-1 text-neutral-400">@lang('lang.search_location')</label>
                                    <div class="bg-white address float-left py-1 px-3 text-black-700 border-2 rounded-md border-neutral-400 focus:border-sky-500 focus:shadow-sm focus:shadow-sky-500  w-full text-black-700">
                                        <input
                                            class="focus:outline-none float-left bg-transparent border-0 w-11/12 h-full focus:outline-none"
                                        type="text" id="suggest">
                                        <button id="mpshow" class="flex-shrink-0 focus:outline-none float-right text-teal-500 mt-1 text-sm rounded" type="button">
                                            <svg class="h-4 w-4 text-purple-500" id="geoBut" width="12" height="12" hidden viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">  <path stroke="none" d="M0 0h24v24H0z"/>  <path d="M21 3L14.5 21a.55 .55 0 0 1 -1 0L10 14L3 10.5a.55 .55 0 0 1 0 -1L21 3" /></svg>
                                            <svg class="h-4 w-4 text-gray-400 fill-current" id="closeBut" width="12" height="12" hidden viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">  <path d="M 21.734375 19.640625 L 19.636719 21.734375 C 19.253906 22.121094 18.628906 22.121094 18.242188 21.734375 L 13 16.496094 L 7.761719 21.734375 C 7.375 22.121094 6.746094 22.121094 6.363281 21.734375 L 4.265625 19.640625 C 3.878906 19.253906 3.878906 18.628906 4.265625 18.242188 L 9.503906 13 L 4.265625 7.761719 C 3.882813 7.371094 3.882813 6.742188 4.265625 6.363281 L 6.363281 4.265625 C 6.746094 3.878906 7.375 3.878906 7.761719 4.265625 L 13 9.507813 L 18.242188 4.265625 C 18.628906 3.878906 19.257813 3.878906 19.636719 4.265625 L 21.734375 6.359375 C 22.121094 6.746094 22.121094 7.375 21.738281 7.761719 L 16.496094 13 L 21.734375 18.242188 C 22.121094 18.628906 22.121094 19.253906 21.734375 19.640625 Z"/></svg>
                                        </button>
                                    </div>
                                </div>

                                <div class="w-4/12 lg:w-4/12 lg:ml-1 md:ml-1">
                                    <label class="text-xs mb-1 text-neutral-400">@lang('lang.search_byMapRadius')</label>
                                    <select name="" id="selectGeo" class="focus:outline-none  py-1 px-1 text-black-700 border-2 rounded-md border-neutral-400 focus:border-sky-500 focus:shadow-sm focus:shadow-sky-500 text-lg-left text-black-700 rounded" onchange="r=$('#selectGeo').val(); if(r>0){$('#geoBut').show()}else {$('#geoBut').hide()}; enDis(r); map_pos(k)">
                                        <option value="0">@lang('lang.search_byMapRadiusNo')</option>
                                        <option value="1.5">1.5 @lang('lang.search_km')</option>
                                        <option value="3">3 @lang('lang.search_km')</option>
                                        <option value="5">5 @lang('lang.search_km')</option>
                                        <option value="10">10 @lang('lang.search_km')</option>
                                        <option value="15">15 @lang('lang.search_km')</option>
                                        <option value="20">20 @lang('lang.search_km')</option>
                                        <option value="30">30 @lang('lang.search_km')</option>
                                        <option value="50">50 @lang('lang.search_km')</option>
                                        <option value="75">75 @lang('lang.search_km')</option>
                                        <option value="100">100 @lang('lang.search_km')</option>
                                        <option value="200">200 @lang('lang.search_km')</option>
                                    </select>
                                </div>
                                <div class="relative w-5/12 2xl:w-3/12 xl:w-4/12 xl:ml-2 lg:w-5/12 lg:ml-1 md:w-4/12 md:ml-1 sm:w-5/12">
                                    <label class="text-xs mb-1 text-neutral-400">@lang('lang.search_priceBy')</label>
                                    <input type="text" maxlength="7" class="focus:outline-none focus:placeholder-transparent w-full border-md py-1 px-2 text-black-700 border-2 rounded-md border-neutral-400 focus:border-sky-500 focus:shadow-sm focus:shadow-sky-500  text-black-700" placeholder="UZS" id="price">
                                    <svg class="h-4 w-4 text-gray-400 fill-current absolute top-7 left-28" id="svgClose" width="12" height="12" viewBox="0 0 26 26" stroke-width="2" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"><path d="M 21.734375 19.640625 L 19.636719 21.734375 C 19.253906 22.121094 18.628906 22.121094 18.242188 21.734375 L 13 16.496094 L 7.761719 21.734375 C 7.375 22.121094 6.746094 22.121094 6.363281 21.734375 L 4.265625 19.640625 C 3.878906 19.253906 3.878906 18.628906 4.265625 18.242188 L 9.503906 13 L 4.265625 7.761719 C 3.882813 7.371094 3.882813 6.742188 4.265625 6.363281 L 6.363281 4.265625 C 6.746094 3.878906 7.375 3.878906 7.761719 4.265625 L 13 9.507813 L 18.242188 4.265625 C 18.628906 3.878906 19.257813 3.878906 19.636719 4.265625 L 21.734375 6.359375 C 22.121094 6.746094 22.121094 7.375 21.738281 7.761719 L 16.496094 13 L 21.734375 18.242188 C 22.121094 18.628906 22.121094 19.253906 21.734375 19.640625 Z"/></svg>
                                </div>
                            </div>
                            <div class="inline-flex  block w-full col-span-4">
                            <label class="inline-flex items-center mt-3">
                                <input type="checkbox" class="focus:outline-none form-checkbox checkboxByAs  h-5 w-5 text-orange-400"
                                ><span class="sm:ml-2 ml-0.5 text-gray-700 lg:text-sm">@lang('lang.search_remoteJob')</span>
                            </label>
                            <label class="inline-flex items-center mt-3 xl:ml-3 sm:ml-2 ml-0.5">
                                <input type="checkbox" class="focus:outline-none form-checkbox  h-5 w-5 text-orange-400"
                                ><span class="sm:ml-2  ml-0.5 text-gray-700 lg:text-sm">@lang('lang.search_noCallback')</span>
                            </label>
                            <label class="inline-flex items-center mt-3 xl:ml-3 sm:ml-2 ml-0.5">
                                <input type="checkbox" class="focus:outline-none form-checkbox  h-5 w-5 text-orange-400"
                                ><span class="sm:ml-2  ml-0.5 text-gray-700 lg:text-sm">@lang('lang.search_onlyVacancy')</span>
                            </label>
                            </div>
                        </div>
                        <!-- </form> -->
                    </div>
                </div>



{{--                MOBILE VERSION --}}
                <div class="w-full my-5 rounded-md md:hidden block">
                    <div class="inline-flex block w-full grid grid-cols-3">
                    <!-- <input class="focus:outline-none  w-10/12 text-black-700 border border-black rounded mr-4 px-1" type="text" placeholder="Поиск по ключевым словам" name="s" value="{{$s ?? ''}}" aria-label="Full name"> -->
                        <input id="filter" type="text"
                               class="col-span-3 focus:outline-none focus:placeholder-transparent text-base md:w-10/12 px-4 py-1 text-black border-2 rounded-md border-neutral-400 focus:border-sky-500 focus:shadow-sm focus:shadow-sky-500 md:mr-4 mr-0 bg-gray-200"
                               placeholder="@lang('lang.search_byKey')">

                        <button
                            class="col-span-2 md:w-4/12 w-2/3 md:mt-0 mt-2 bg-green-500 hover:bg-green-600 rounded-md text-white"
                        >@lang('lang.search_find')</button>
                        <div class="col-span-1 flex justify-evenly inline-block md:mt-0 mt-2">
                            <button id="show_2" class=" w-10 md:ml-2  focus:outline-none">
                                <i class="fas fa-bars fa-2x ml-1.5 text-gray-500"></i>
                            </button>
                            <button id="hide_2" class=" w-10 md:ml-2  focus:outline-none" style="display: none">
                                <i class="fas fa-times fa-2x ml-1.5 text-gray-500"></i>
                            </button>
                            <button id="show" class="w-10 md:ml-2 focus:outline-none">
                                <i class="far fa-map fa-2x text-gray-500"></i>
                            </button>
                            <button id="hide" class="w-10 md:ml-2  focus:outline-none" style="display: none">
                                <i class="fas fa-list fa-2x text-gray-500"></i>
                            </button>
                        </div>

                    </div>
                </div>

{{--                mobile bar--}}

                <div id="mobile_bar" class="w-full hidden" style="display:none;">
                    <div class="bg-yellow-50 pb-4">
                        <div class=" w-11/12 mx-auto ">
                            <div class="w-full relative">
                                <label class="text-xs mb-1 text-neutral-400">@lang('lang.search_location')</label>
                                <div class="bg-white address float-left py-1 px-3 text-black-700 border-2 rounded-md border-neutral-400 focus:border-sky-500 focus:shadow-sm focus:shadow-sky-500  w-full text-black-700">
                                    <input
                                        class="float-left bg-transparent border-0 w-11/12 h-full focus:outline-none"
                                        type="text" id="suggest">
                                    <button id="mpshow" class="flex-shrink-0 focus:outline-none float-right text-teal-500 mt-1 text-sm rounded" type="button">
                                        <svg class="h-4 w-4 text-purple-500"  width="12" height="12" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">  <path stroke="none" d="M0 0h24v24H0z"/>  <path d="M21 3L14.5 21a.55 .55 0 0 1 -1 0L10 14L3 10.5a.55 .55 0 0 1 0 -1L21 3" /></svg>
                                    </button>
                                </div>
                            </div>
                            <div class="w-full">
                                <label class="text-xs mb-1 text-neutral-400">@lang('lang.search_byMapRadius')</label>
                                <select name="" id="selectGeo" class="w-full py-1 px-1 text-black-700 border-2 rounded-md border-neutral-400 focus:border-sky-500 focus:shadow-sm focus:shadow-sky-500 text-lg-left text-black-700 rounded" onchange="r=$('#selectGeo').val(); enDis(r); map_pos(k)">
                                    <option value="0">@lang('lang.search_byMapRadiusNo')</option>
                                    <option value="1.5">1.5 km</option>
                                    <option value="3">3 km</option>
                                    <option value="5">5 km</option>
                                    <option value="10">10 km</option>
                                    <option value="15">15 km</option>
                                    <option value="20">20 km</option>
                                    <option value="30">30 km</option>
                                    <option value="50">50 km</option>
                                    <option value="75">75 km</option>
                                    <option value="100">100 km</option>
                                    <option value="200">200 km</option>
                                </select>
                            </div>
                        </div>
                    </div>


                    <div class=" w-11/12 mx-auto border-b pb-4">
                        <label class="text-xs mb-1 text-neutral-400">@lang('lang.search_priceBy')</label>
                        <input type="text" maxlength="7" class="w-full focus:placeholder-transparent border-md py-1 px-2 text-black-700 border-2 rounded-md border-neutral-400 focus:border-sky-500 focus:shadow-sm focus:shadow-sky-500  text-black-700" placeholder="UZS" id="price">
                    </div>

                    <div class="w-11/12 mx-auto">
                        <label class="block w-full border-b pb-4 items-center mt-3">
                            <input type="checkbox" class="form-checkbox checkboxByAs mr-4  h-5 w-5 text-orange-400"
                            ><span class="sm:ml-2 ml-0.5 text-gray-700 lg:text-sm">@lang('lang.search_remoteJob')</span>
                        </label>
                        <label class="block w-full border-b pb-4 items-center mt-3 xl:ml-3 sm:ml-2 ml-0.5">
                            <input type="checkbox" class="form-checkbox mr-4  h-5 w-5 text-orange-400"
                            ><span class="sm:ml-2  ml-0.5 text-gray-700 lg:text-sm">@lang('lang.search_noCallback')</span>
                        </label>
                        <label class="block w-full border-b pb-4 items-center mt-3 xl:ml-3 sm:ml-2 ml-0.5">
                            <input type="checkbox" class="form-checkbox mr-4  h-5 w-5 text-orange-400"
                            ><span class="sm:ml-2  ml-0.5 text-gray-700 lg:text-sm">@lang('lang.search_onlyVacancy')</span>
                        </label>
                    </div>
{{--                <div>--}}
{{--                    accordion for categories--}}
{{--                    <div class="max-w-lg mx-auto">--}}
{{--                        <div class="w-full my-1 for_check2">--}}
{{--                            <label--}}
{{--                                class="font-medium rounded-lg text-sm text-center inline-flex items-center ml-5 hover:cursor-pointer">--}}
{{--                                <input type="checkbox" class="all_cat2 mr-1 hover:cursor-pointer"/> @lang('lang.search_allCat')--}}
{{--                            </label>--}}
{{--                                @foreach (\TCG\Voyager\Models\Category::query()->where('parent_id', null)->get() as $category)--}}
{{--                                <div x-data={show:false} class="rounded-sm">--}}
{{--                                    <div @click="show=!show" class="" id="headingOne">--}}
{{--                                        <button--}}
{{--                                                class="underline text-blue-500 hover:text-blue-700 focus:outline-none"--}}
{{--                                                type="button">--}}
{{--                                            <svg class="w-4 h-4 rotate -rotate-90" fill="none"--}}
{{--                                                 stroke="currentColor" viewBox="0 0 24 24"--}}
{{--                                                 xmlns="http://www.w3.org/2000/svg">--}}
{{--                                                <path stroke-linecap="round" stroke-linejoin="round"--}}
{{--                                                      stroke-width="2" d="M19 9l-7 7-7-7"></path>--}}
{{--                                            </svg>--}}
{{--                                        </button>--}}
{{--                                        <label--}}
{{--                                            class="font-medium rounded-lg text-sm text-center inline-flex items-center hover:cursor-pointer">--}}
{{--                                            <input type="checkbox" class="par_cat2 mr-1 hover:cursor-pointer"--}}
{{--                                                   name="{{$category->id}}"--}}
{{--                                                   id="par{{$category->id}}"/> {{$category->getTranslatedAttribute('name',Session::get('lang') , 'fallbackLocale')}}--}}
{{--                                        </label>--}}
{{--                                    </div>--}}
{{--                                    <div x-show="show" class="border border-b-0 px-8 py-0">--}}
{{--                                            @foreach (\TCG\Voyager\Models\Category::query()->where('parent_id', $category->id)->get() as $category2)--}}
{{--                                            <div class="par{{$category->id}}">--}}
{{--                                                <label--}}
{{--                                                    class="font-medium rounded-lg text-sm text-left inline-flex items-baseline hover:cursor-pointer">--}}
{{--                                                    <input type="checkbox"--}}
{{--                                                           class="chi_cat2 mr-1 hover:cursor-pointer"--}}
{{--                                                           name="{{$category2->id}}"--}}
{{--                                                           id="par{{$category->id}}"/> {{$category2->getTranslatedAttribute('name',Session::get('lang') , 'fallbackLocale')}}--}}
{{--                                                </label>--}}
{{--                                            </div>--}}
{{--                                        @endforeach--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            @endforeach--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <script src="https://unpkg.com/@themesberg/flowbite@latest/dist/flowbite.bundle.js"></script>--}}
{{--                </div>--}}

{{--                mobile bar end--}}

{{--                mobile map--}}
                <div id="big-big" class="h-full my-5 rounded-lg w-full static"></div>
{{--                mobile map end--}}

{{--                MOBILE VERSION ENDED --}}

                </div>


                <div class="">
                    <div class="col-span-2 lg:col-span-1 lg:block hidden mx-4 lg:mt-0 mt-32">
                        <div class="big-map static">

                        </div>
                    </div>
                    <div class="b-tasks-sorting hidden md:block">
                        <div class="inline-flex items-center my-5">
                            <span class="title__994cd">@lang('lang.search_filter')</span>

                            <button class="mx-5 byid">@lang('lang.search_byDate')</button>

                            <button id="srochnost" class="  mx-5 active">@lang('lang.search_byHurry')</button>
                            <button id="as" data-sort-type="3"  class="mx-5 ">@lang('lang.search_byRemote')</button>
                        </div>
                    </div>
                    <div id="scrollbar" class="w-full h-full blog1">
                        <div class="w-full">
                            <div class="show_tasks">
                                {{--Show Tasks list --}}
                            </div>
                        </div>

                        <div class="w-full">
                            <div class="no_tasks" hidden>
                                {{--Show no tasks image --}}
                                <div class=" w-3/5 h-3/5 mx-auto">
                                    <img src="images/notlike.png" class="w-full h-full">
                                    <div class="text-center w-full h-full">
                                        <p className="text-4xl"><b>@lang('lang.search_tasksNotFound')</b></p>
                                        <p className="text-xl">@lang('lang.search_tryAnOther')</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="w-full h-full lM" hidden>
                            <ul class="text-center">
                                <li class="text-center">@lang('lang.search_shown')&nbsp;<span id="pnum"></span>&nbsp;из&nbsp;<span id="snum"></span></li>
                                <li><button id="loadMore" class="butt mt-2 px-5 py-1 border border-black rounded hover:cursor-pointer" onclick="tasks_show(), maps_show();">@lang('lang.search_showMore')</button></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-span-5 lg:col-span-2 lg:block hidden mx-4 lg:mt-0 mt-32">
                <div class="small-map static">
                    {{--Map2 show --}}
                </div>
                <div class="w-full h-full">
                    <div class="max-w-lg mx-auto">
                        <label class="inline-flex items-center mt-3">
                            <input type="checkbox" class="form-checkbox all_cat ml-5 h-5 w-5 text-orange-400">
                            <span class="ml-2 text-gray-700">@lang('lang.search_allCat')</span>
                        </label>
                        <div class="w-full my-1 for_check">
                            @foreach (\TCG\Voyager\Models\Category::query()->where('parent_id', null)->get() as $category)
                                <div x-data={show:false} class="rounded-sm">
                                    <div class=" mb-2" id="headingOne">
                                        <button @click="show=!show"
                                                class="underline text-gray-500 hover:text-blue-700 focus:outline-none"
                                                type="button">
                                            <svg class="w-4 h-4 rotate -rotate-90" fill="none"
                                                 stroke="currentColor" viewBox="0 0 24 24"
                                                 xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                      stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                            </svg>
                                        </button>
                                        <label class="inline-flex items-center mt-3 hover:cursor-pointer">
                                            <input type="checkbox" class="form-checkbox par_cat mr-1 h-5 w-5 text-orange-400 hover:cursor-pointer"
                                                   name="{{$category->id}}"
                                                   id="par{{$category->id}}"><span class="ml-2 text-gray-700">{{$category->getTranslatedAttribute('name',Session::get('lang') , 'fallbackLocale')}}</span>
                                        </label>
                                    </div>
                                    <div x-show="show" class="border-b-0 px-8 py-0">
                                            @foreach (\TCG\Voyager\Models\Category::query()->where('parent_id', $category->id)->get() as $category2)
                                            <div class="par{{$category->id}}">
                                                <label class="inline-flex items-center mt-3 hover:cursor-pointer">
                                                    <input type="checkbox" class="form-checkbox chi_cat mr-1 h-5 w-5 text-orange-400 hover:cursor-pointer"
                                                           name="{{$category2->id}}"
                                                           id="par{{$category->id}}"><span class="ml-2 text-gray-700">{{$category2->getTranslatedAttribute('name',Session::get('lang') , 'fallbackLocale')}}</span>
                                                </label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <script src="https://unpkg.com/@themesberg/flowbite@latest/dist/flowbite.bundle.js"></script>
                </div>
            </div>
        </div>
    </div>

    <style>
        [class*="copyrights-pane"]
        {display: none !important;}
    </style>


    <div class="w-full">
        <button onclick="topFunction()" id="myBtn" title="Go to top" class="fixed z-10 hidden p-3 bg-gray-100 rounded-full shadow-md bottom-5 right-24 animate-bounce">
            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 10l7-7m0 0l7 7m-7-7v18">
                </path>
            </svg>
        </button>
    </div>

@endsection

@section("javasript")

{{--    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>--}}
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <script src="https://api-maps.yandex.ru/2.1/?apikey=f4b34baa-cbd1-432b-865b-9562afa3fcdb&lang=@lang('lang.lang_for_map')" type="text/javascript"></script>
    <script src="{{asset('js/search_tasks.js')}}"></script>
{{--    <script src="/js/search_tasks.js"></script>--}}
    <script>

        // module.exports = {
        //     plugins: [require('@tailwindcss/forms')]
        // };

        function first_ajax(id, filter, address, price) {
            $.ajax({
                url: "{{route('tasks.search')}}",
                data: {orderBy: id, fltr: filter, addr: address, prc: price},
                type: 'GET',
                success: function (data) {
                    if (id == 'all') {
                        dataAjax = $.parseJSON(JSON.stringify(data));
                        sixInOne();
                    }
                    if (id == 'klyuch') {
                        dataAjax2 = $.parseJSON(JSON.stringify(data));
                        dataAjaxCheck=2
                        sixInOne();
                    }
                },
                error: function () {
                    alert("Ajax ishida xatolik...");
                }
            });
        }

        enDis(r);
        first_ajax('all');

    </script>
    <script>
        $(document).ready(function() {
            $("#show_2").click(function() {
                $("#hide_2").css('display', 'block');
                $("#show_2").css('display', 'none');
                $("#mobile_bar").css('display', 'block');
            });
            $("#hide_2").click(function() {
                $("#hide_2").css('display', 'none');
                $("#show_2").css('display', 'block');
                $("#mobile_bar").css('display', 'none');
            });
        });

    </script>
    <script>
        $(document).ready(function() {
            $("#show").click(function() {
                map1_show();
                $("#hide").css('display', 'block');
                $("#show").css('display', 'none');
                $("#scrollbar").css('display', 'none');
                $("footer").css('display', 'none');
                $('#big-big').removeClass("hidden");
            });
            $("#hide").click(function() {
                $('#big-big').addClass("hidden");
                $("#hide").css('display', 'none');
                $("#show").css('display', 'block');
                $("#scrollbar").css('display', 'block');
                $("footer").css('display', 'block');
            });
        });

    </script>
    <script type="text/javascript">
        function toggleModal(){
            document.getElementById("modal-id").classList.toggle("hidden");
            document.getElementById("modal-id" + "-backdrop").classList.toggle("hidden");
            document.getElementById("modal-id").classList.toggle("flex");
            document.getElementById("modal-id" + "-backdrop").classList.toggle("flex");
        }
        function toggleModal1(){
            var element = document.getElementById("modal-id-backdrop");
            element.classList.add("hidden");
            var element2 = document.getElementById("modal-id");
            var b = document.getElementById("myText").value;
            var u = document.getElementById("amount_u");
            u.value = b;
            element2.classList.add("hidden");
            document.getElementById("modal-id1").classList.toggle("hidden");
            document.getElementById("modal-id1" + "-backdrop").classList.toggle("hidden");
            document.getElementById("modal-id1").classList.toggle("flex");
            document.getElementById("modal-id1" + "-backdrop").classList.toggle("flex");
        }
        function borderColor() {
            var element = document.getElementById("demo");
            element.classList.add("border-amber-500");
        }
        function inputFunction() {
            var x = document.getElementById("myText").value;
            if(x < 4000){
                document.getElementById('button').removeAttribute("onclick");
                document.getElementById('button').classList.remove("bg-green-500");
                document.getElementById('button').classList.add("bg-gray-500");
                document.getElementById('button').classList.remove("hover:bg-green-500");
                document.getElementById("button").innerHTML ="К оплате " + x +"UZS";
            }else{
                document.getElementById('button').setAttribute("onclick","toggleModal1();");
                document.getElementById('button').classList.remove("bg-gray-500");
                document.getElementById('button').classList.add("bg-green-500");
                document.getElementById('button').classList.add("hover:bg-green-500");
                document.getElementById("button").innerHTML ="К оплате " + x +"UZS";
            }
        }
        function checkFunction() {
            var x = document.getElementById("myText").value;
            var checkBox = document.getElementById("myCheck");
            if (checkBox.checked == true){
                document.getElementById("button").innerHTML ="К оплате " + (parseInt(x) + 10000);
            } else {
                document.getElementById("button").innerHTML ="К оплате " + x  +"UZS";
            }
        }
        function validate(evt) {
            var theEvent = evt || window.event;
            // Handle paste
            if (theEvent.type === 'paste') {
                key = event.clipboardData.getData('text/plain');
            } else {
                // Handle key press
                var key = theEvent.keyCode || theEvent.which;
                key = String.fromCharCode(key);
            }
            var regex = /[0-9]|\./;
            if( !regex.test(key) ) {
                theEvent.returnValue = false;
                if(theEvent.preventDefault) theEvent.preventDefault();
            }
        }
    </script>
    {{-- pay modal end --}}
    <script>
        $('.has-clear input[type="text"]').on('input propertychange', function() {
            var $this = $(this);
            var visible = Boolean($this.val());
            $this.siblings('.form-control-clear').toggleClass('hidden', !visible);
        }).trigger('propertychange');

        $('.form-control-clear').click(function() {
            $(this).siblings('input[type="text"]').val('')
                .trigger('propertychange').focus();
        });
    </script>
@endsection
