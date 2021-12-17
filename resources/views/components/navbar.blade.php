
<nav class="relative flex items-center mx-6 md:w-10/12 md:mx-auto justify-between  lg:justify-start font-[sans-serif]" aria-label="Global">
    <div class="flex items-center flex-grow flex-shrink-0 lg:flex-grow-0">
        <div class="flex items-center justify-between w-full md:w-auto">
            <a href="/">
                <img src="{{asset('/images/logo.png')}}" class="overflow-hidden h-16 py-2" alt="" />
            </a>
        </div>
        <nav class="relative md:w-10/12 lg:w-auto px-4 py-4 flex justify-end items-center bg-white">
            <div class="lg:hidden">
                <button class="navbar-burger flex items-center text-yellow-500 p-3">
                    <svg class="block h-4 w-4 fill-current" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <title>Mobile menu</title>
                        
                        <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"></path>
                    </svg>
                </button>
            </div>
        </nav>
        <div class="navbar-menu relative z-50 hidden">
            <div class="navbar-backdrop fixed inset-0 bg-gray-800 opacity-25"></div>
            <nav class="fixed top-0 left-0 bottom-0 flex flex-col w-5/6 max-w-sm py-6 px-6 bg-white border-r overflow-y-auto">
                <div class="flex items-center mb-8">
                    <a class="mr-auto text-3xl font-bold leading-none" href="#">
                        <svg class="h-12" alt="logo" viewBox="0 0 10240 10240">

                        </svg>
                    </a>
                    <button class="navbar-close">
                        <svg class="h-6 w-6 text-gray-400 cursor-pointer hover:text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>
                <div>
                    <ul>
                        <li class="mb-1">
                            <a class="block p-4 text-sm font-semibold text-gray-400 hover:bg-blue-50 hover:text-blue-600 rounded" href="#">Создать задание</a>
                        </li>
                        <li class="mb-1">
                            <a class="block p-4 text-sm font-semibold text-gray-400 hover:bg-blue-50 hover:text-blue-600 rounded" href="#">About Us</a>
                        </li>
                        <li class="mb-1">
                            <a class="block p-4 text-sm font-semibold text-gray-400 hover:bg-blue-50 hover:text-blue-600 rounded" href="#">Services</a>
                        </li>
                        <li class="mb-1">
                            <a class="block p-4 text-sm font-semibold text-gray-400 hover:bg-blue-50 hover:text-blue-600 rounded" href="#">Pricing</a>
                        </li>
                        <li class="mb-1">
                            <a class="block p-4 text-sm font-semibold text-gray-400 hover:bg-blue-50 hover:text-blue-600 rounded" href="#">Contact</a>
                        </li>
                    </ul>
                </div>
                <div class="mt-auto">
                    <div class="pt-6">
                        <p class="w-4/12 text-right inline-block float-right text-gray-500 md:float-none mt-6 mb-6">
                            <a href="{{ route('login') }}"  class="font-medium border-b border-black border-dotted hover:border-yellow-500 hover:text-yellow-500">Вход</a> или 
                            <a href="{{ route('register') }}"  class=" border-b border-black border-dotted font-medium text-gray-500 hover:text-yellow-500 hover:border-yellow-500">Регистрация</a>
                            <a href="{{ route('logout') }}" class="font-medium border-b border-black border-dotted hover:border-yellow-500 hover:text-yellow-500">Выход</a>
                        </p>

                    </div>
                    <p class="my-4 text-xs text-center text-gray-400">
                        <span>Copyright © 2021</span>
                    </p>
                </div>
            </nav>
        </div>
    </div>
    <div class="hidden w-full lg:inline-block xl:ml-24 lg:ml-12 md:pr-4 lg:space-x-8 md:space-x-6">
        <div class="group inline-block">
            <button class="font-medium text-gray-500 hover:text-[#ffa200] focus:outline-none">
                <span class="pr-1  font-[sans-serif] flex-1">Создать задание</span>
                <span></span>
            </button>
            <ul class="bg-white border rounded-md transform scale-0 group-hover:scale-100 absolute transition duration-150 ease-in-out origin-top ">
                @foreach (\TCG\Voyager\Models\Category::query()->where('parent_id', null)->get() as $category)
                    <li class="py-2 px-4 rounded-sm hover:bg-gray-200">
                        <button class="w-full text-left flex items-center outline-none focus:outline-none">
                            <span class="pr-1 flex-1">{{ $category->name }}</span>
                            <span class="mr-auto">
                                <svg class="fill-current h-4 w-4 transition duration-150 ease-in-out" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                                </svg>
                            </span>
                        </button>
                        <ul class="bg-white border rounded-sm absolute top-0 right-0 transition duration-150 ease-in-out origin-top-left w-100">

                            @foreach (\TCG\Voyager\Models\Category::query()->where('parent_id', $category->id)->get() as $category2)
                                <li class="rounded-sm">
                                    <a class=" py-3 px-5 w-full block hover:bg-gray-100" href="/task/create?category_id={{ $category2->id }}">
                                        {{ $category2->name }}
                                    </a>
                                </li>
                            @endforeach

                        </ul>
                    </li>
                @endforeach
            </ul>
        </div>

        <style>
            /* since nested groupes are not supported we have to use
               regular css for the nested dropdowns
            */
            li>ul {
                transform: translatex(100%) scale(0)
            }

            li:hover>ul {
                transform: translatex(101%) scale(1)
            }

            li>button svg {
                transform: rotate(-90deg)
            }

            li:hover>button svg {
                transform: rotate(-270deg)
            }

            .group:hover .group-hover\:scale-100 {
                transform: scale(1)
            }

            .group:hover .group-hover\:-rotate-180 {
                transform: rotate(180deg)
            }

            .scale-0 {
                transform: scale(0)
            }

            .min-w-32 {
                min-width: 8rem
            }
        </style>
        <a href="{{ route('task.search') }}" class="font-medium delete-task text-gray-500 hover:text-[#ffa200]">Найти задания</a>

        <a href="/performers" class="font-medium text-gray-500 hover:text-[#ffa200]">Исполнители</a>
   
    </div>

    @if (Route::has('login'))
        @auth
            <p class="w-full text-right inline-block float-right md:float-none mt-6 mb-6 mr-6">
                <button href="#" class="font-medium hover:text-yellow-500 mr-3">
                    
                <!-- component -->
            <!-- This is an example component -->
            <div class="max-w-lg mx-auto">
    
                  <button type="button" data-dropdown-toggle="dropdown1"><i class="text-2xl text-slate-400 hover:text-orange-500 far fa-bell"></i></button>

              <!-- Dropdown menu -->
           <div class="hidden bg-white text-base z-50 list-none divide-y divide-gray-100 rounded shadow my-4"           id="dropdown1">
              <div class="px-4 py-3">
                 <span class="block text-base font-bold">Уведомления</span>
              </div>
              <ul class="py-1" aria-labelledby="dropdown1">
               <li>
               <a href="#" class="text-sm font-bold hover:bg-gray-100 text-gray-700 block px-4 py-2"> <i class="fas fa-star"></i>Осталось только установить пароль</a>
               </li>
               <li>
               <a href="#" class="text-sm hover:bg-gray-100 text-gray-700 block px-4 py-2">В раздел "Настройки"</a>
               </li>
             <ul class="py-1" aria-labelledby="dropdown1">
             <li>
            <a href="#" class="bg-slate-100 text-sm italic text-green-600 hover:text-red-600 underline decoration-dotted  block px-4 py-2">Отметить все как прочитанное</a>
         </li>
        </ul>
    </div>

    
</div>


                </button>
                <button href="#" class="font-medium hover:text-yellow-500 mr-3">

                  
                <!-- component -->
            <!-- This is an example component -->
            <div class="max-w-lg mx-auto">
    
                  <button type="button" data-dropdown-toggle="dropdown"><i class="text-2xl text-slate-400 hover:text-orange-500  far fa-user"></i></button>

              <!-- Dropdown menu -->
           <div class="hidden bg-white text-base z-50 list-none divide-y divide-gray-100 rounded shadow my-4"           id="dropdown">
              <div class="px-4 py-3">
                 <a href="/profile1"  class="block text-base text-gray-700 hover:text-orange-500">Профиль</a>
              </div>
              <ul class="py-1" aria-labelledby="dropdown">
               <li>
               <a href="/profile/settings" class="text-base text-gray-700 hover:text-orange-500 block px-4 py-2">Настройки</a>
               </li>
               <ul class="py-1" aria-labelledby="dropdown">
            <li>
                <a href="{{ route('logout') }}" class="text-base text-gray-700 hover:text-orange-500 block px-4 py-2">Выход</a>
            </li>
             <ul class="py-1" aria-labelledby="dropdown">
        </ul>
    </div>

    <script src="https://unpkg.com/@themesberg/flowbite@latest/dist/flowbite.bundle.js"></script>
</div>

                </button>
                
                <div>
                    <a href="#" onclick="toggleModal('modal-id')">
                        <svg width="24" height="24" fill="none" xmlns="http://www.w3.org/2000/svg" class="ml-8  HeaderBalance_icon__2FeBY"><path fill-rule="evenodd" clip-rule="evenodd" d="M19 3.874c0-.953-.382-1.8-1.086-2.334-.7-.531-1.607-.667-2.488-.423h-.003L4.132 4.279a.973.973 0 00-.028.008c-1.127.35-1.986 1.287-2.093 2.563C2.004 6.9 2 6.95 2 7v11.344C2 20.334 3.608 22 5.607 22h12.785c2 0 3.608-1.666 3.608-3.657v-6.686c0-1.785-1.292-3.309-3-3.605V3.874zM4 18.343C4 19.265 4.748 20 5.607 20h12.785c.86 0 1.608-.735 1.608-1.657V16.25h-2a1.25 1.25 0 010-2.5h2v-2.093c0-.923-.748-1.657-1.608-1.657H4v8.343zM4 7.12c0 .507.41.88.813.88H17V3.874c0-.413-.153-.633-.294-.74-.145-.11-.391-.188-.746-.09h-.001L4.686 6.2c-.435.14-.686.46-.686.92z" fill="#5AB82E"></path></svg>
                    </a>
                </div>

            </p>
        @else
            <p class="w-full text-right inline-block float-right md:float-none mt-6 mb-6">
                 <a href="{{ route('login') }}"  class="border-b border-black border-dotted font-medium text-gray-500 hover:text-yellow-500 hover:border-yellow-500 ">Вход</a> или 
                 <a href="{{ route('register') }}"  class=" border-b border-black border-dotted font-medium text-gray-500 hover:text-yellow-500 hover:border-yellow-500">Регистрация</a>
            </p>
        @endauth
    @endif
    


</nav>


{{-- pay modal start --}}


  <div class="hidden overflow-x-auto overflow-y-auto fixed inset-0 z-50 outline-none focus:outline-none justify-center items-center" id="modal-id">
    <div class="relative w-auto my-6 mx-auto max-w-3xl">
      <!--content-->
      <div class="border-0 rounded-lg shadow-lg relative flex flex-col w-full bg-white outline-none focus:outline-none">
        <!--header-->
        <div class=" text-center p-6  rounded-t">
            <button type="submit"  onclick="toggleModal('modal-id')" class="rounded-md w-100 h-16 absolute top-1 right-4">
                <i class="fas fa-times  text-slate-400 hover:text-slate-600 text-xl w-full"></i>
              </button>
            <h3 class="font-medium text-3xl block mt-6">
                На какую сумму хотите пополнить <br> кошелёк?
            </h3>
        </div>
        <!--body-->
          <div class="text-center h-96">
            <div class="w-1/3 mx-auto h-16 border-b" id="demo" onclick="borderColor()">
                <input class="w-full h-full text-4xl text-center focus:outline-none" maxlength="6"  id="myText" oninput="inputFunction()" onkeypress='validate(event)' type="text" value="400">
            </div>
            <p class="text-sm mt-2 leading-6 text-gray-400">Сумма пополнения, минимум — 400 ₽</p>

         <div class="mt-8">
            <input type="checkbox" id="myCheck" onclick="checkFunction()"  class="w-5 h-5 rounded-md inline-block " />
            <p class="text-md inline-block ml-2">Оформить полис на 7 дней за 100 ₽</p>
         </div>
         <p class="text-center mt-4  text-gray-400 m-8">
            Если вы заболеете и не сможете работать, ООО «Страховая компания "Манго"» <br> выплатит вам до 500 ₽ за каждый день болезни. *
         </p>

         <div class="mt-16">
            <a class="px-10 py-4 font-sans  text-xl  font-semibold bg-lime-500 text-[#fff] hover:bg-lime-600  h-12 rounded-md text-xl" id="button" href="#" ></a>
          </div>

          </div>
       
      </div>
    </div>
  </div>
  <div class="hidden opacity-25 fixed inset-0 z-40 bg-black" id="modal-id-backdrop"></div>
  <script type="text/javascript">
    function toggleModal(modalID){
      document.getElementById(modalID).classList.toggle("hidden");
      document.getElementById(modalID + "-backdrop").classList.toggle("hidden");
      document.getElementById(modalID).classList.toggle("flex");
      document.getElementById(modalID + "-backdrop").classList.toggle("flex");
    }
    function borderColor() {
        var element = document.getElementById("demo");
        element.classList.add("border-amber-500");
        }
        function inputFunction() {
        var x = document.getElementById("myText").value;
        document.getElementById("button").innerHTML ="К оплате " + x +"₽";
        }
        function checkFunction() {
        var x = document.getElementById("myText").value;
        var checkBox = document.getElementById("myCheck");
        if (checkBox.checked == true){
            document.getElementById("button").innerHTML ="К оплате " + sum(x,100) +"₽";
        } else {
            document.getElementById("button").innerHTML ="К оплате " + x  +"₽";
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
{{-- <div class="fixed hidden z-50 inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full" id="my-modal">
    <div class="relative top-20 mx-auto p-5 border w-2/5 shadow-lg rounded-md bg-white">
        <div class="mt-3 text-center">
            <button type="submit"  id="close-btn" class="px-4 py-4 bg-gray-300 rounded-md w-100 h-16 absolute right-4 top-4 hover:bg-gray-500">
                <i class="fas fa-times text-white text-3xl w-full"></i>
            </button>
            <div class="mx-auto flex items-center justify-center w-full">
                <h3 class="font-bold text-4xl block">
                    На какую сумму хотите пополнить кошелёк?
                </h3>
            </div>
            <input class="ml-3 mt-10 w-30 h-20 ring-1 rounded-xl ring-gray-100" type='number' />

            <p class="text-sm leading-6 text-gray-400">Сумма пополнения, минимум — 60 000сум</p>
            <div class="mt-2 px-7 py-3">
                <input type="checkbox" class="w-5 h-5 rounded-md inline-block " />
                <p class="text-md inline-block ml-2">Оформить полис на 7 дней за 15 000 сум</p>
            </div>
            <div class="items-center px-4 py-3">
                <button id="ok-btn" class="px-4 py-2 bg-green-500 text-white text-xl font-medium rounded-md w-2/5 h-16  shadow-sm hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-300">
                    К оплате x сум
                </button>
                <p>* — Порядок выплаты, ограничения и полные условия определены в <a href="/home/oferta" class="cursor-pointer text-sm text-blue-400 underline">Оферте</a></p>
            </div>
        </div>
    </div>
</div> --}}
{{-- pay modal end --}}

<script>
    // Burger menus
    document.addEventListener('DOMContentLoaded', function() {
        // open
        const burger = document.querySelectorAll('.navbar-burger');
        const menu = document.querySelectorAll('.navbar-menu');

        if (burger.length && menu.length) {
            for (var i = 0; i < burger.length; i++) {
                burger[i].addEventListener('click', function() {
                    for (var j = 0; j < menu.length; j++) {
                        menu[j].classList.toggle('hidden');
                    }
                });
            }
        }

        // close
        const close = document.querySelectorAll('.navbar-close');
        const backdrop = document.querySelectorAll('.navbar-backdrop');

        if (close.length) {
            for (var i = 0; i < close.length; i++) {
                close[i].addEventListener('click', function() {
                    for (var j = 0; j < menu.length; j++) {
                        menu[j].classList.toggle('hidden');
                    }
                });
            }
        }

        if (backdrop.length) {
            for (var i = 0; i < backdrop.length; i++) {
                backdrop[i].addEventListener('click', function() {
                    for (var j = 0; j < menu.length; j++) {
                        menu[j].classList.toggle('hidden');
                    }
                });
            }
        }
    });

      //pay modal start
        let modal = document.getElementById("my-modal");

        let btn = document.getElementById("open-btn");

        let button = document.getElementById("ok-btn");

        let closebtn = document.getElementById("close-btn");

        closebtn.onclick = function() {
            modal.style.display = "none";
        }

        btn.onclick = function() {
            modal.style.display = "block";
        }
        // We want the modal to close when the OK button is clicked
        button.onclick = function() {
            modal.style.display = "none";
        }

        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
      // pay modal end

</script>



@section("javascript")


@endsection
