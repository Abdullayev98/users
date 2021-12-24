
<nav class="z-10 relative flex items-center mx-6 md:w-10/12 md:mx-auto justify-between  lg:justify-start font-[sans-serif]" aria-label="Global">
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
                            <div class="group inline-block">
                                <button class="font-medium text-gray-500 hover:text-[#ffa200] focus:outline-none">
                                    <span class="pr-1  font-[sans-serif] flex-1 block p-4 text-sm font-semibold text-gray-400 hover:bg-blue-50 hover:text-blue-600 rounded">Создать задание</span>
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
                        </li>
                        <li class="mb-1">
                            <a href="{{ route('task.search') }}" class="block p-4 text-sm text-gray-400 hover:bg-blue-50 hover:text-blue-600 rounded font-medium delete-task text-gray-500">Найти задания</a>
                        </li>
                        <li class="mb-1">
                            <a href="/performers" class="block p-4 text-sm rounded font-medium text-gray-500 hover:text-[#ffa200]">Исполнители</a>
                        </li>

                        @if (Route::has('login'))
                            @auth
                                <li class="mb-1">
                                    {{-- icon-1 --}}
                                    <div class="max-w-lg mx-auto ">
                                        <button class="" type="button" data-dropdown-toggle="dropdown4"><i class="ml-6 text-2xl mr-6 text-slate-400 hover:text-orange-500 far fa-bell"></i>
                                        </button>
                                        <!-- Dropdown menu -->
                                        <div class="hidden bg-white text-base z-50 list-none divide-y divide-gray-100 rounded shadow my-4" id="dropdown4">
                                            <div class="px-4 py-3">
                                                <span class="block text-base font-bold">Уведомления</span>
                                            </div>
                                            <ul class="py-1" aria-labelledby="dropdown4">
                                                <li>
                                                    <a href="#" class="text-sm font-bold hover:bg-gray-100 text-gray-700 block px-4 py-2"> <i class="fas fa-star"></i>Осталось только установить пароль</a>
                                                </li>
                                                <li>
                                                    <a href="#" class="text-sm hover:bg-gray-100 text-gray-700 block px-4 py-2">В раздел "Настройки"</a>
                                                </li>
                                                <li>
                                                    <a href="#" class="bg-slate-100 text-sm italic text-green-600 hover:text-red-600 underline decoration-dotted  block px-4 py-2">Отметить все как прочитанное</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </li>
                                <li class="mb-1">
                                    {{-- icon-2 --}}
                                    <div class="max-w-lg mx-auto ml-6">
                                        <button class="" type="button" data-dropdown-toggle="dropdown5"><i class="text-2xl text-slate-400 hover:text-orange-500  far fa-user"></i>
                                        </button>
                                        <!-- Dropdown menu -->
                                        <div class="hidden bg-white text-base z-50 list-none divide-y divide-gray-100 rounded shadow my-4" id="dropdown5">
                                            <ul class="py-1" aria-labelledby="dropdown5">
                                                <li>
                                                    <a href="/profile" class="text-sm hover:bg-gray-100 text-gray-700 block px-4 py-2">Профиль</a>
                                                </li>
                                                <li>
                                                    <a href="/profile/settings" class="text-sm hover:bg-gray-100 text-gray-700 block px-4 py-2">Настройки</a>
                                                </li>
                                                <li>
                                                    <a href="{{ route('logout') }}" class="text-sm hover:bg-gray-100 text-gray-700 block px-4 py-2">Выход</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </li>
                                <li class="mb-1">
                                    {{-- icon-3 --}}
                                    <div class="">
                                        <a href="/chatify">
                                            <i class="ml-6 text-2xl text-slate-400 hover:text-blue-500 far fa-comment-alt"></i>
                                        </a>
                                    </div>
                                </li>
                                <li class="mb-1">
                                    <div class="">
                                        <a href="#" onclick="toggleModal()">
                                            <svg width="24" height="24" fill="none" xmlns="http://www.w3.org/2000/svg" class="ml-6 mt-1 HeaderBalance_icon__2FeBY"><path fill-rule="evenodd" clip-rule="evenodd" d="M19 3.874c0-.953-.382-1.8-1.086-2.334-.7-.531-1.607-.667-2.488-.423h-.003L4.132 4.279a.973.973 0 00-.028.008c-1.127.35-1.986 1.287-2.093 2.563C2.004 6.9 2 6.95 2 7v11.344C2 20.334 3.608 22 5.607 22h12.785c2 0 3.608-1.666 3.608-3.657v-6.686c0-1.785-1.292-3.309-3-3.605V3.874zM4 18.343C4 19.265 4.748 20 5.607 20h12.785c.86 0 1.608-.735 1.608-1.657V16.25h-2a1.25 1.25 0 010-2.5h2v-2.093c0-.923-.748-1.657-1.608-1.657H4v8.343zM4 7.12c0 .507.41.88.813.88H17V3.874c0-.413-.153-.633-.294-.74-.145-.11-.391-.188-.746-.09h-.001L4.686 6.2c-.435.14-.686.46-.686.92z" fill="#5AB82E"></path></svg>
                                        </a>
                                    </div>
                                </li>

                            @else
                                <p class="w-full text-right inline-block float-right md:float-none mt-6 mb-6 lg:block hidden">
                                    <a href="{{ route('login') }}"  class="border-b border-black border-dotted font-medium text-gray-500 hover:text-yellow-500 hover:border-yellow-500 ">Вход</a> или
                                    <a href="{{ route('register') }}"  class=" border-b border-black border-dotted font-medium text-gray-500 hover:text-yellow-500 hover:border-yellow-500">Регистрация</a>
                                </p>
                            @endauth
                        @endif
                </div>
                <div class="mt-auto">
                    <div class="pt-6">
                        <p class="w-11/12 text-left inline-block float-right text-gray-500 md:float-none mt-6 mb-6">
                            <a href="{{ route('login') }}"  class="font-medium border-b border-black border-dotted hover:border-yellow-500 hover:text-yellow-500">Вход</a> или

                            <a href="{{ route('register') }}"  class=" border-b border-black border-dotted font-medium text-gray-500 hover:text-yellow-500 hover:border-yellow-500">Регистрация</a><br>

                        </p>
                    </div>
                </div>
            </nav>
        </div>
    </div>
    <div class="hidden w-full lg:inline-block xl:ml-12 lg:ml-12 md:pr-4 lg:space-x-8 md:space-x-6">
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

            <div class="flex lg:inline-block hidden w-4/12">
                {{-- icon-1 --}}
                <div class="max-w-lg mx-auto float-left">
                    <button class="" type="button" data-dropdown-toggle="dropdown"><i class="text-2xl mr-6 text-slate-400 hover:text-orange-500 far fa-bell"></i>
                    </button>
                    <!-- Dropdown menu -->
                    <div class="hidden bg-white text-base z-50 list-none divide-y divide-gray-100 rounded shadow my-4" id="dropdown">
                        <div class="px-4 py-3">
                            <span class="block text-base font-bold">Уведомления</span>
                        </div>
                        <ul class="py-1" aria-labelledby="dropdown">
                            <li>
                                <a href="#" class="text-sm font-bold hover:bg-gray-100 text-gray-700 block px-4 py-2"> <i class="fas fa-star"></i>Осталось только установить пароль</a>
                            </li>
                            <li>
                                <a href="#" class="text-sm hover:bg-gray-100 text-gray-700 block px-4 py-2">В раздел "Настройки"</a>
                            </li>
                            <li>
                                <a href="#" class="bg-slate-100 text-sm italic text-green-600 hover:text-red-600 underline decoration-dotted  block px-4 py-2">Отметить все как прочитанное</a>
                            </li>
                        </ul>
                    </div>
                </div>

                {{-- icon-2 --}}
                <div class="max-w-lg mx-auto float-left">
                    <button class="" type="button" data-dropdown-toggle="dropdown1"><i class="text-2xl text-slate-400 hover:text-orange-500  far fa-user"></i>
                    </button>
                    <!-- Dropdown menu -->
                    <div class="hidden bg-white text-base z-50 list-none divide-y divide-gray-100 rounded shadow my-4" id="dropdown1">
                        <ul class="py-1" aria-labelledby="dropdown1">
                            <li>
                                <a href="/profile" class="text-sm hover:bg-gray-100 text-gray-700 block px-4 py-2">Профиль</a>
                            </li>
                            <li>
                                <a href="/profile/settings" class="text-sm hover:bg-gray-100 text-gray-700 block px-4 py-2">Настройки</a>
                            </li>
                            <li>
                                <a href="{{ route('logout') }}" class="text-sm hover:bg-gray-100 text-gray-700 block px-4 py-2">Выход</a>
                            </li>
                        </ul>
                    </div>
                </div>

                <script src="https://unpkg.com/@themesberg/flowbite@latest/dist/flowbite.bundle.js"></script>
                {{-- icon-3 --}}
                <div class=" float-left">
                    <a href="/chatify">
                        <i class="pl-5 text-2xl text-slate-400 hover:text-blue-500 far fa-comment-alt"></i>
                    </a>
                </div>

                <div class=" float-left">
                    <a href="#" onclick="toggleModal()">
                        <svg width="24" height="24" fill="none" xmlns="http://www.w3.org/2000/svg" class="ml-6 mt-1 HeaderBalance_icon__2FeBY"><path fill-rule="evenodd" clip-rule="evenodd" d="M19 3.874c0-.953-.382-1.8-1.086-2.334-.7-.531-1.607-.667-2.488-.423h-.003L4.132 4.279a.973.973 0 00-.028.008c-1.127.35-1.986 1.287-2.093 2.563C2.004 6.9 2 6.95 2 7v11.344C2 20.334 3.608 22 5.607 22h12.785c2 0 3.608-1.666 3.608-3.657v-6.686c0-1.785-1.292-3.309-3-3.605V3.874zM4 18.343C4 19.265 4.748 20 5.607 20h12.785c.86 0 1.608-.735 1.608-1.657V16.25h-2a1.25 1.25 0 010-2.5h2v-2.093c0-.923-.748-1.657-1.608-1.657H4v8.343zM4 7.12c0 .507.41.88.813.88H17V3.874c0-.413-.153-.633-.294-.74-.145-.11-.391-.188-.746-.09h-.001L4.686 6.2c-.435.14-.686.46-.686.92z" fill="#5AB82E"></path></svg>
                    </a>
                </div>

            </div>

        @else
            <p class="w-full text-right inline-block float-right md:float-none mt-6 mb-6 lg:block hidden">
                <a href="{{ route('login') }}"  class="border-b border-black border-dotted font-medium text-gray-500 hover:text-yellow-500 hover:border-yellow-500 ">Вход</a> или
                <a href="{{ route('register') }}"  class=" border-b border-black border-dotted font-medium text-gray-500 hover:text-yellow-500 hover:border-yellow-500">Регистрация</a>
            </p>
        @endauth
    @endif
</nav>


{{-- pay modal start --}}
<div class="hidden overflow-x-auto overflow-y-auto fixed inset-0 z-50 outline-none focus:outline-none justify-center items-center" id="modal-id">
    {{-- 1 --}}
    <div class="relative w-auto my-6 mx-auto max-w-3xl" id="modal11">
        <div class="border-0 rounded-lg shadow-2xl relative flex flex-col w-full bg-white outline-none focus:outline-none">
            <div class=" text-center p-6  rounded-t">
                <button type="submit"  onclick="toggleModal()" class="rounded-md w-100 h-16 absolute top-1 right-4">
                    <i class="fas fa-times  text-slate-400 hover:text-slate-600 text-xl w-full"></i>
                </button>
                <h3 class="font-medium text-3xl block mt-6">
                    На какую сумму хотите пополнить <br> кошелёк?
                </h3>
            </div>
            <div class="text-center h-96">
                <div class="w-1/3 mx-auto h-16 border-b" id="demo" onclick="borderColor()">
                    <input class="w-full h-full text-4xl text-center focus:outline-none" maxlength="7" minlength="3" id="myText" oninput="inputFunction()" onkeypress='validate(event)' type="text" value="400">
                </div>
                <p class="text-sm mt-2 leading-6 text-gray-400">Сумма пополнения, минимум — 100 UZS</p>

                <div class="mt-8">
                    <input type="checkbox" id="myCheck" onclick="checkFunction()"  class="w-5 h-5 rounded-md inline-block " />
                    <p class="text-md inline-block ml-2">Оформить полис на 7 дней за 100 UZS</p>
                </div>
                <p class="text-center mt-4  text-gray-400 m-8">
                    Если вы заболеете и не сможете работать, ООО «Страховая компания "Манго"» <br> выплатит вам до 500 UZS за каждый день болезни. *
                </p>

                <div class="mt-16">
                    <a onclick="toggleModal1()" class="px-10 py-4 font-sans  text-xl  font-semibold bg-lime-500 text-[#fff] hover:bg-lime-600  h-12 rounded-md text-xl" id="button" href="#" >К оплате</a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="hidden opacity-25 fixed inset-0 z-40 bg-black" id="modal-id-backdrop"></div>
{{-- 2 --}}
<div class="hidden overflow-x-auto overflow-y-auto fixed inset-0 z-50 outline-none focus:outline-none justify-center items-center" id="modal-id1">
    <div class="relative w-auto my-6 mx-auto max-w-3xl">
        <div class="border-2 shadow-2xl rounded-lg bg-gray-100  relative flex flex-col w-full bg-white outline-none focus:outline-none">
            <div class=" text-center p-6  rounded-t">
                <button type="submit"  onclick="toggleModal1()" class="rounded-md w-100 h-16 absolute top-1 right-4">
                    <i class="fas fa-times  text-slate-400 hover:text-slate-600 text-xl w-full"></i>
                </button>
                <h3 class="font-medium text-3xl block mt-6">
                    Способ оплаты
                </h3>
            </div>

            <div class="container mt-8 mb-12">
                <form action="/ref" method="GET">
                    <input type="hidden" name="user_id" value="1">
                                  <div class="my-3 w-1/2 mx-auto">
                                    <div class="custom-control custom-radio mb-4 text-3xl">
                                      <input id="credit" onClick="doBlock()" name="paymethod" type="radio" value="PayMe" class="custom-control-input">
                                      <label class="custom-control-label" for="credit">PayMe</label>
                                    </div>
                                    <div class="custom-control custom-radio text-3xl">
                                      <input id="debit" onClick="doBlock()" name="paymethod" value="Click" type="radio" class="custom-control-input">
                                      <label class="custom-control-label" for="debit">Click</label>
                                    </div>
                    
                                    <div class="d-none input-group my-5" id="forhid">
                                    <input id="amount_u" type="hidden" name="amount" class="form-control">
                                    </div>
                    
                                  </div>
                    
                                <div class="text-center">
                                    <button type="submit" class="bg-green-500 hover:bg-green-700 text-white text-2xl font-bold py-3 px-8 rounded">Оплата</button>
                                </div>
                    
                    </form>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>
</div>
<div class="hidden opacity-25 fixed inset-0 z-40 bg-black" id="modal-id-backdrop"></div>
<div class="hidden opacity-25 fixed inset-0 z-40 bg-black" id="modal1-id-backdrop"></div>

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
        if(x < 100){
            document.getElementById('button').removeAttribute("onclick");
            document.getElementById('button').classList.remove("bg-lime-500");
            document.getElementById('button').classList.add("bg-gray-500");
            document.getElementById('button').classList.remove("hover:bg-lime-600");
            document.getElementById("button").innerHTML ="К оплате ";
        }else{
            document.getElementById('button').setAttribute("onclick","toggleModal1();");
            document.getElementById('button').classList.remove("bg-gray-500");
            document.getElementById('button').classList.add("bg-lime-500");
            document.getElementById('button').classList.add("hover:bg-lime-600");
            document.getElementById("button").innerHTML ="К оплате ";
        }
    }
    function checkFunction() {
        var x = document.getElementById("myText").value;
        var checkBox = document.getElementById("myCheck");
        if (checkBox.checked == true){
            document.getElementById("button").innerHTML ="К оплате ";
        } else {
            document.getElementById("button").innerHTML ="К оплате " ;
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
</script>

@section("javascript")

@endsection
