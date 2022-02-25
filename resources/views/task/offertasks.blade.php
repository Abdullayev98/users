@extends("layouts.app")

@section("content")

<div class="mx-auto w-9/12 my-16">


            <!-- Tab Contents -->
            <div id="tab-contents">
                <div id="first">

                    <div class="grid grid-cols-3 gap-x-10">
                        <div class="col-span-2">
                            <div class="w-full bg-yellow-100 my-5">
                                <div class="px-5 py-5">

                                    <div class="grid grid-cols-4 gap-4 mb-3">
                                      <a href="/offer-tasks" class="rounded border bg-gradient-to-b from-gray-300 to-gray-400 px-4 py-1">@lang('lang.offerT_iAmPerformer')</a>
                                      <a href="{{ route('task.mytasks') }}" class="rounded border bg-gradient-to-b from-gray-100 to-gray-200 px-4 py-1">@lang('lang.offerT_iAmCustomer')</a>


                                    </div>
                                </div>
                            </div>

                            <div>

                                <div id="scrollbar" class="w-full h-screen blog1">
                                  <div class="w-full overflow-y-scroll w-full h-screen">
                                    <div class="w-full border hover:bg-blue-100">
                                      <div class="w-11/12 h-12 m-4">
                                        <div class="float-left w-9/12">
                                          <i class="fas fa-user-circle text-4xl float-left text-blue-400"></i><a  class="text-blue-400 hover:text-red-400">
                                          @lang('lang.offerT_rateByPhone')
                                          </a>
                                          <p class="text-sm ml-12mt-4">
                                          @lang('lang.offerT_warning')
                                          </p>
                                        </div><div class="float-right w-1/4 text-right">
                                          <a  class="text-lg">100 000 sum</a><p class="text-sm ml-12mt-4">@lang('lang.offerT_sportMaster')</p>
                                          <p class="text-sm ml-12mt-4">@lang('lang.offerT_noFeedback')</p>
                                        </div>
                                      </div>
                                      <div class="w-11/12 h-12 m-4">
                                        <div class="mx-auto w-9/12">
                                          <button type="button" class="bg-yellow-200 py-1 rounded-full px-4 my-4 text-gray-500 text-xs">@lang('lang.offerT_vacancy')</button>
                                          <button type="button" class="bg-blue-50 py-1 rounded-full px-4 my-4 text-gray-500 text-xs">@lang('lang.offerT_freeRespond')</button>
                                          <button type="button" class="bg-red-100 py-1  rounded-full px-4 my-4 text-gray-500 text-xs">🔥@lang('lang.offerT_promo')</button>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>

                                <!-- If page is empty -->
                                <div class="w-1/2 mx-auto">
                                  <img src="{{asset('images/goodboy.svg')}}" alt="">
                                </div>

                            </div>

                        </div>
                        <div class="w-full h-full mt-5">
                            <div id="map" class="h-40 my-5 rounded-lg w-full"></div>
                            <div class="w-full h-full">
                            <x-faq/>
                            </div>
                        </div>
                    </div>

                </div>
             <div id="second" class="hidden">


                </div>

            </div>


</div>
@endsection

@section("javasript")

    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <script src="https://api-maps.yandex.ru/2.1/?apikey=f4b34baa-cbd1-432b-865b-9562afa3fcdb&lang=ru_RU" type="text/javascript"></script>
    <script type="text/javascript">
        ymaps.ready(init);
            function init() {
                var suggestView1 = new ymaps.SuggestView('suggest');
                var myMap = new ymaps.Map('map', {
                    center: [55.74, 37.58],
                    zoom: 15,
                    controls: []
                });
                var searchControl = new ymaps.control.SearchControl({  });
                myMap.controls.add(searchControl);
                $("#mpshow").click(function(){
                searchControl.search(document.getElementById('suggest').value);
            });
        }
    </script>

    <script>
        let tabsContainer = document.querySelector("#tabs");

        let tabTogglers = tabsContainer.querySelectorAll("a");
        console.log(tabTogglers);

        tabTogglers.forEach(function(toggler) {
            toggler.addEventListener("click", function(e) {
                e.preventDefault();

                let tabName = this.getAttribute("href");

                let tabContents = document.querySelector("#tab-contents");

                for (let i = 0; i < tabContents.children.length; i++) {

                    tabTogglers[i].parentElement.classList.remove("border-orange-400", "border-b",  "opacity-100");  tabContents.children[i].classList.remove("hidden");
                    if ("#" + tabContents.children[i].id === tabName) {
                        continue;
                    }
                    tabContents.children[i].classList.add("hidden");

                }
                e.target.parentElement.classList.add("border-orange-400", "border-b-2", "opacity-100");
            });
        });

        document.getElementById("default-tab").click();

    </script>

@endsection
