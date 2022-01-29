@auth()
    @if(!auth()->user()->is_email_verified)
        <div x-data="{ showModal : true }" class="md:py-8 py-6">

            <!-- Modal Background -->
            <div x-show="showModal"
                 class="fixed flex items-center justify-center overflow-auto z-50 bg-black bg-opacity-50 left-0 right-0 top-0 bottom-0"
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
                            На ваш электронный адрес <strong>{{auth()->user()->email}}</strong> было отправлено письмо
                            со ссылкой для
                            подтверждения вашей почты на YouDo.
                        </p>
                        <p class="my-8 text-gray-700 traking-tight">
                            Пройдите по ссылке и активируйте вашу электронную почту.
                        </p>

                        <a class='text-gray-800 send-email border-b sent-email border-dotted @if($errors->has('email') || session()->has('email-message')) hidden @endif border-gray-700 cursor-pointer'
                           href="{{route('user.verify.send')}}">Отправить новое
                            письмо для подтверждения почты</a><br>


                        <a class='text-gray-800 border-b border-dotted border-gray-700 @if($errors->has('email') || session()->has('email-message') ) hidden @endif change-email cursor-pointer'>Указать
                            другую почту</a>

                        <form action="{{route('user.email.change')}}" id="send-data-form" class="@if(!($errors->has('email') || session()->has('email-message')) ) hidden @endif" method="post">
                            @csrf
                            <a class='text-gray-800  border-b sent-email border-dotted border-gray-700 cursor-pointer'
                               id="cancel-email">Отмена</a>
                            <br>
                            <div class="my-2">
                                <input type="text" name="email" placeholder="Email" id="name"
                                       value="{{  old('email').session()->has('email')?session('email'):null  }}"
                                       class="shadow focus:outline-none  focus:border-yellow-500 appearance-none border border-slate-300 rounded
                        w-full py-2 px-3 text-gray-700 mb-1 leading-tight hover:border-amber-500"
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
                                Отправить
                            </button>
                        </form>

                    </div>

                </div>
            </div>
        </div>



    @elseif(!auth()->user()->is_phone_verified)
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


                        <div class="text-2xl md:w-[500px] -mt-5 font-bold font-['Radiance,sans-serif,Noto Sans']">
                            Подтвердите адрес ваш телефонный номер
                        </div>
                        <p class="my-8 text-gray-700 traking-tight">
                            На ваш телефонный номер <strong>{{auth()->user()->phone_number}}</strong> было отправлено письмо
                            со ссылкой для
                            подтверждения вашей почты на YouDo.
                        </p>
                        <p class="my-8 text-gray-700 traking-tight">
                            Пройдите по ссылке и активируйте вашу телефонный номер.
                        </p>

                        <a class='text-gray-800 send-email border-b sent-email border-dotted @if($errors->has('email') || session()->has('email-message') || !auth()->user()->phone_number)) hidden @endif border-gray-700 cursor-pointer'
                           href="{{route('user.verify.send')}}">Отправить новое
                            письмо для подтверждения телефонный номер</a><br>


                        <a class='text-gray-800 border-b border-dotted border-gray-700 @if($errors->has('email') || session()->has('email-message') || !auth()->user()->phone_number) ) hidden @endif change-email cursor-pointer'>Указать
                            другую телефонный номер</a>

                        <form action="{{route('user.email.change')}}" id="send-data-form" class="@if(!($errors->has('email') || session()->has('email-message') || !auth()->user()->phone_number)) hidden @endif" method="post">
                            @csrf
                            <a class='text-gray-800  border-b sent-email border-dotted border-gray-700 cursor-pointer'
                               id="cancel-email">Отмена</a>
                            <br>
                            <div class="my-2">
                                <input type="text" placeholder="Phone Number" id="phone_number"
                                       value="{{  old('email').session()->has('email')?session('email'):null  }}"
                                       class="shadow focus:outline-none  focus:border-yellow-500 appearance-none border border-slate-300 rounded
                        w-full py-2 px-3 text-gray-700 mb-1 leading-tight hover:border-amber-500"
                                       autofocus>
                                <input type="hidden" name="phone_number" id="phone">
                                @if(session()->has('email-message'))
                                    <p class="text-red-500"> {{ session('email-message') }}</p>
                                @endif

                                @error('email')
                                <p class="text-red-500">{{ $message }}</p>
                                @enderror
                            </div>

                            <button class="w-full h-12 rounded-lg bg-green-500 text-gray-200 uppercase
                        font-semibold hover:bg-green-500 text-gray-100 transition mb-4">
                                Отправить
                            </button>
                        </form>

                    </div>

                </div>
            </div>
        </div>



    @endif
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <script src='https://unpkg.com/imask'></script>


    <script>
        $('.change-email').click(function () {
            $('#send-data-form').css('display', 'block')
            $(this).css('display', 'none')
            $('.send-email').css('display', 'none')
        })
        $("#cancel-email").click(function () {
            $('#send-data-form').css('display', 'none')
            $('.change-email').css('display', "initial")
            $('.send-email').css('display', 'initial')
        })
        var element = document.getElementById('phone_number');
        var maskOptions = {
            mask: '+998(00)000-00-00',
            lazy: false
        }
        var mask = new IMask(element, maskOptions);
        $("#phone_number").keyup(function () {
            var text = $(this).val()
            text = text.replace(/[^0-9.]/g, "")
            text = text.slice(3)
            $("#phone").val(text)
        })

    </script>
@endauth
