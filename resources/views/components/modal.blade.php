@auth()
    @if(!auth()->user()->is_email_verified)
        <div x-data="{ showModal : true }" class="md:py-8 py-6">

            <!-- Modal Background -->
            <div x-show="showModal"
                 class="fixed flex items-center justify-center overflow-auto z-50 bg-black bg-opacity-40 left-0 right-0 top-0 bottom-0"
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


                        <div class="text-2xl md:w-[500px] -mt-5 font-bold font-['Radiance,sans-serif,Noto Sans']">
                            Подтвердите адрес вашей почты
                        </div>
                        <p class="my-8 text-gray-700 traking-tight">
                            На ваш электронный адрес <strong>{{auth()->user()->email}}</strong> было отправлено письмо со ссылкой для
                            подтверждения вашей почты на YouDo.
                        </p>
                        <p class="my-8 text-gray-700 traking-tight">
                            Пройдите по ссылке и активируйте вашу электронную почту.
                        </p>

                        <a class='text-gray-800 border-b border-dotted border-gray-700' href="{{route('user.verify.send')}}">Отправить новое
                            письмо для подтверждения почты</a><br>

                        <a class='text-gray-800 border-b border-dotted border-gray-700' href="#ddd">Указать другую
                            почту</a>


                    </div>

                </div>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>


    @endif
@endauth
