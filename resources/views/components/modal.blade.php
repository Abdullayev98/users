@if(!session()->has('not-show'))

    @auth()
        @if(!auth()->user()->is_email_verified || auth()->user()->is_email_verified == 0)
            <div x-data="{ showModal : true }" class="md:py-8 py-6">

                <!-- Modal Background -->
                <div x-show="showModal"
                     class="fixed flex items-center justify-center overflow-auto z-100 bg-black bg-opacity-50 left-0 right-0 top-0 bottom-0"
                     style="z-index: 101;!important;"
                     x-transition:enter="transition ease duration-300" x-transition:enter-start="opacity-0"
                     x-transition:enter-end="opacity-100" x-transition:leave="transition ease duration-300"
                     x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">


                    <!-- Modal -->
                    <div x-show="showModal" class="bg-white rounded-xl shadow-2xl p-6 sm:w-10/12 md:w-5/12 mx-10"
                         @click.away="showModal = false" x-transition:enter="transition ease duration-100 transform"
                         x-transition:enter-start="opacity-0 scale-90 translate-y-1"
                         x-transition:enter-end="opacity-100 scale-100 translate-y-0"
                         x-transition:leave="transition ease duration-100 transform"
                         x-transition:leave-start="opacity-100 scale-100 translate-y-0"
                         x-transition:leave-end="opacity-0 scale-90 translate-y-1">
                        <div class="mx-auto pl-5 py-5 text-black">
                            <div class="text-right -mt-5 ">
                                <button @click="showModal = !showModal"
                                        class="px-4 py-2 text-sm bg-white rounded-xl border transition-colors duration-150 ease-linear border-gray-200 text-gray-500 focus:outline-none focus:ring-0 font-bold hover:bg-gray-50 focus:bg-indigo-50 focus:text-indigo">
                                        x
                                </button>
                            </div>


                            <div
                                class="text-lg m-auto py-5 sm:text-2xl md:w-[500px] -mt-3 font-bold font-['Radiance,sans-serif,Noto Sans']">
                                @lang('lang.modal_email')
                            </div>
                            <p class="text-sm sm:text-xl sm:my-8 xl:my-2 text-gray-700 traking-tight">
                                @lang('lang.modal_addres') <strong>{{auth()->user()->email}}</strong>
                                @lang('lang.modal_addres1')
                            </p>
                            <p class="text-sm sm:text-xl my-2 sm:my-8 text-gray-700 traking-tight">
                                @lang('lang.modal_addres2')
                            </p>

                            <a class='text-sm sm:text-xl text-gray-800 send-email border-b sent-email border-dotted @if($errors->has('email') || session()->has('email-message')) hidden @endif border-gray-700 cursor-pointer'
                               href="{{route('user.verify.send')}}">@lang('lang.modal_addres3')</a><br>


                            <a class='text-sm sm:text-xl text-gray-800 border-b border-dotted border-gray-700 @if($errors->has('email') || session()->has('email-message') ) hidden @endif change-email cursor-pointer'>
                                @lang('lang.modal_addres4')</a>

                            <form action="{{route('user.email.change')}}" id="send-data-form"
                                  class="@if(!($errors->has('email') || session()->has('email-message')) ) hidden @endif"
                                  method="post">
                                @csrf
                                <a class='text-gray-800  border-b sent-email border-dotted border-gray-700 cursor-pointer'
                                   id="cancel-email">@lang('lang.modal_cencel')</a>
                                <br>
                                <div class="my-2">
                                    <input type="text" name="email" placeholder="Email" id="name"
                                           value="{{  old('email').session()->has('email')?session('email'):null  }}"
                                           class="shadow focus:outline-none  focus:border-yellow-500 appearance-none border border-slate-300 rounded
                        w-full py-2 px-3 text-gray-700 mb-1 leading-tight"
                                           autofocus>
                                    @if(session()->has('email-message'))
                                        <p class="text-red-500"> {{ session('email-message') }}</p>
                                    @endif

                                    @error('email')
                                    <p class="text-red-500">{{ $message }}</p>
                                    @enderror
                                </div>

                                <button class="w-full h-12 rounded-lg bg-green-500 text-gray-200 uppercase
                        font-semibold hover:bg-green-500 text-gray-100 transition mb-4">
                                    @lang('lang.modal_send')
                                </button>
                            </form>

                        </div>

                    </div>
                </div>
            </div>



        @elseif(!session()->has('code'))

            @if(!auth()->user()->is_phone_number_verified)
                <div x-data="{ showModal : true }" class="md:py-8 py-6">

                    <!-- Modal Background -->
                    <div x-show="showModal"
                         class="fixed flex items-center justify-center overflow-auto bg-black bg-opacity-40 left-0 right-0 top-0 bottom-0"
                         x-transition:enter="transition ease duration-300" x-transition:enter-start="opacity-0"
                         x-transition:enter-end="opacity-100" x-transition:leave="transition ease duration-300"
                         x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
                         style="z-index:500">


                        <!-- Modal -->
                        <div x-show="showModal" class="bg-white rounded-xl shadow-2xl p-6 sm:w-10/12 md:w-5/12 mx-10"
                             @click.away="showModal = false" x-transition:enter="transition ease duration-100 transform"
                             x-transition:enter-start="opacity-0 scale-90 translate-y-1"
                             x-transition:enter-end="opacity-100 scale-100 translate-y-0"
                             x-transition:leave="transition ease duration-100 transform"
                             x-transition:leave-start="opacity-100 scale-100 translate-y-0"
                             x-transition:leave-end="opacity-0 scale-90 translate-y-1">
                            <div class="mx-auto pl-5 py-5 text-black">
                                <div class="text-right -mt-5 ">
                                    <button @click="showModal = !showModal"
                                            class="px-4 py-2 text-sm bg-white rounded-xl border transition-colors duration-150 ease-linear border-gray-200 text-gray-500 focus:outline-none focus:ring-0 font-bold hover:bg-gray-50 focus:bg-indigo-50 focus:text-indigo">
                                        x
                                    </button>
                                </div>


                                <div
                                    class="text-2xl md:w-[500px] -mt-5 font-bold font-['Radiance,sans-serif,Noto Sans']">
                                    @lang('lang.modal_phone1')
                                </div>
                                <p class="my-8 text-gray-700 traking-tight">
                                    @lang('lang.modal_address1')<strong>{{auth()->user()->phone_number}}</strong>
                                    @lang('lang.modal_address2')
                                </p>
                                <p class="my-8 text-gray-700 traking-tight">
                                    @lang('lang.modal_address4')
                                </p>

                                <a class='text-gray-800 send-email border-b sent-email border-dotted @if($errors->has('phone_number') || session()->has('email-message') || !auth()->user()->phone_number)) hidden @endif border-gray-700 cursor-pointer'
                                   href="{{route('user.verify.phone.send')}}">
                                    @lang('lang.modal_address4')</a><br>


                                <a class='text-gray-800 border-b border-dotted border-gray-700 @if($errors->has('phone_number') || session()->has('email-message') || !auth()->user()->phone_number) ) hidden @endif change-email cursor-pointer'>
                                    @lang('lang.modal_phone')</a>


                                <form action="{{route('user.phone.change')}}" id="send-data-form"
                                      class="@if(!($errors->has('phone_number') || session()->has('email-message') || !auth()->user()->phone_number) || session()->has('code') ) hidden @endif"
                                      method="post">
                                    @csrf
                                    <a class='text-gray-800  border-b sent-email border-dotted border-gray-700 cursor-pointer'
                                       id="cancel-email">@lang('lang.modal_cencel')</a>
                                    <br>
                                    <div class="my-2">
                                        <input type="text" placeholder="@lang('lang.contact_number')" id="phone_number"
                                               value="{{  old('email').session()->has('email')?session('email'):null  }}"
                                               class="shadow focus:outline-none  focus:border-yellow-500 appearance-none border border-slate-300 rounded
                        w-full py-2 px-3 text-gray-700 mb-1 leading-tight hover:border-amber-500"
                                               autofocus>
                                        <input type="hidden" name="phone_number" id="phone">
                                        @if(session()->has('email-message'))
                                            <p class="text-red-500"> {{ session('email-message') }}</p>
                                        @endif

                                        @error('phone_number')
                                        <p class="text-red-500">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <button class="w-full h-12 rounded-lg bg-green-500 text-gray-200 uppercase
                        font-semibold hover:bg-green-500 text-gray-100 transition mb-4">
                                        @lang('lang.modal_send')
                                    </button>
                                </form>

                            </div>

                        </div>
                    </div>
                </div>
            @endif

        @elseif(session()->has('code'))

            <div x-data="{ showModal : true }" class="md:py-8 py-6">

                <!-- Modal Background -->
                <div x-show="showModal"
                     class="fixed flex items-center justify-center overflow-auto z-50 bg-opacity-40 left-0 right-0 top-0 bottom-0"
                     x-transition:enter="transition ease duration-300" x-transition:enter-start="opacity-0"
                     x-transition:enter-end="opacity-100" x-transition:leave="transition ease duration-300"
                     x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">


                    <!-- Modal -->
                    <div x-show="showModal" class="bg-white rounded-xl shadow-2xl p-6 sm:w-10/12 md:w-5/12 mx-10"
                         @click.away="showModal = false" x-transition:enter="transition ease duration-100 transform"
                         x-transition:enter-start="opacity-0 scale-90 translate-y-1"
                         x-transition:enter-end="opacity-100 scale-100 translate-y-0"
                         x-transition:leave="transition ease duration-100 transform"
                         x-transition:leave-start="opacity-100 scale-100 translate-y-0"
                         x-transition:leave-end="opacity-0 scale-90 translate-y-1">
                        <div class="mx-auto pl-5 py-5 text-black">
                            <div class="text-right -mt-5 ">
                                <button @click="showModal = !showModal"
                                        class="px-4 py-2 text-sm bg-white rounded-xl border transition-colors duration-150 ease-linear border-gray-200 text-gray-500 focus:outline-none focus:ring-0 font-bold hover:bg-gray-50 focus:bg-indigo-50 focus:text-indigo">
                                    x
                                </button>
                            </div>

                            <form action="{{route('user.verify.phone.submit')}}" method="post">
                                @csrf
                                <input type="text" placeholder="@lang('lang.modal_code')" name="code"
                                       class="shadow focus:outline-none  focus:border-yellow-500 appearance-none border border-slate-300 rounded
                        w-full py-2 px-3 text-gray-700 mb-1 leading-tight hover:border-amber-500"
                                       autofocus>

                                <p class="text-red-500">{{session('code')}}</p>

                                @error('code')
                                <p class="text-red-500">{{ $message }}</p>
                                @enderror
                                <button class="w-full h-12 rounded-lg bg-green-500 text-gray-200 uppercase
                        font-semibold hover:bg-green-500 text-gray-100 transition mb-4">
                                    @lang('lang.modal_send')
                                </button>

                            </form>


                        </div>
                    </div>
                </div>


                @endif


                @section("javasript")
                    <script src="https://unpkg.com/imask"></script>

                    <script src="{{ asset('js/components/modal.js') }}"></script>
                @endsection
        @endauth



    @endif
