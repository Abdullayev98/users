@extends("layouts.app")





@section("content")




    <!-- Information section -->
    <!-- <form class="" action="" method="post"> -->

    {{--    Created Road map for Create a New Tast--}}
    <x-roadmap/>
    <div class="mx-auto w-2/3 my-16">
        <div class="grid grid-cols-3 h-full">
            <div class="col-span-2">
                <div class="w-full text-center text-2xl">
                    Поможем найти исполнителя для вашего задания
                </div>
                <div class="w-full text-center my-4 text-[#5f5869]">
                    Задание заполнено на 14%
                </div>
                <div class="relative pt-1">
                    <div class="overflow-hidden h-2 text-xs flex rounded bg-gray-200 mx-auto ">
                        <div style="width: 14%"
                                 class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-[#6fc727]"></div>
                    </div>
                </div>
                <div class="shadow-2xl w-full p-16 mx-auto my-4 rounded-2xl	w-full">
                    <div class="py-4 w-1/2 mx-auto px-auto text-center text-3xl texl-bold">
                        Чем вам помочь?
                    </div>
                    <form action="{{route('task.create.name')}}" method="post">
                        @csrf

                        <div class="py-4 w-11/12 mx-auto px-auto text-left my-4">
                            <div class="mb-4">
                                <label class="block text-[#5f5869] text-sm mb-2" for="username">
                                    Название задания
                                </label>
                                <input
                                    class="shadow appearance-none border focus:shadow-orange-500 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none "
                                    id="username" type="text" placeholder="Например, нужен курьер на несколько доставок" required name="name">
                                {{--                            <div id="content" class="mt-4" style="display:none;">--}}
                                {{--                                <label class="block text-left w-full mx-auto">--}}
                                {{--                                    <select class="form-select block w-5/12 float-left mt-1">--}}
                                {{--                                        <option>Option 1</option>--}}
                                {{--                                        <option>Option 2</option>--}}
                                {{--                                    </select>--}}
                                {{--                                    <select class="form-select block w-5/12 mt-1 float-right">--}}
                                {{--                                        <option>Option 1</option>--}}
                                {{--                                        <option>Option 2</option>--}}
                                {{--                                    </select>--}}
                                {{--                                </label>--}}
                                {{--                            </div>--}}

                                {{--                            <div class="mt-4">--}}
                                {{--                                <label class="text-sm mb-2">--}}
                                {{--                                    <p id="showContent">Подкатегория <span class="underline hover:text-[#5f5869]">Другая посылка</span>--}}
                                {{--                                    </p>--}}
                                {{--                                    <!-- This example requires Tailwind CSS v2.0+ -->--}}

                                {{--                                </label>--}}

                                {{--                                <div  id="content"  class="grid hidden grid-cols-2 gap-5">--}}
                                {{--                                    <div x-data="{ dropdownOpen: false }" class="relative">--}}
                                {{--                                        <button @click="dropdownOpen = !dropdownOpen" class="relative z-10 w-full block border transition rounded-md bg-white p-2 focus:outline-none">--}}
                                {{--                                            {{$current_parent_category->name}}--}}
                                {{--                                        </button>--}}

                                {{--                                        <div x-show="dropdownOpen" @click="dropdownOpen = false" class="fixed inset-0 h-full w-full z-10"></div>--}}

                                {{--                                        <div x-show="dropdownOpen" style="max-height: 200px; width: 100%" class="absolute  overflow-scroll mt-2 py-2 w-48 bg-white rounded-md shadow-xl z-20">--}}

                                {{--                                            @foreach($categories as $category)--}}
                                {{--                                            <a href="{{route("task.create.name", )}}" class="block px-4 py-2 text-sm capitalize text-gray-700 hover:bg-blue-500 hover:text-white">--}}
                                {{--                                                {{$category->name}}--}}
                                {{--                                            </a>--}}
                                {{--                                            @endforeach--}}
                                {{--                                        </div>--}}
                                {{--                                    </div>--}}
                                {{--                                    <div x-data="{ dropdownOpen: false }" class="relative">--}}
                                {{--                                        <button @click="dropdownOpen = !dropdownOpen" class="relative z-10 w-full block border transition rounded-md bg-white p-2 focus:outline-none">--}}
                                {{--                                            {{$current_category->name}}--}}
                                {{--                                        </button>--}}

                                {{--                                        <div x-show="dropdownOpen" @click="dropdownOpen = false" class="fixed inset-0 h-full w-full z-10"></div>--}}

                                {{--                                        <div x-show="dropdownOpen" style="max-height: 200px; width: 100%" class="absolute overflow-scroll mt-2 py-2 w-48 bg-white rounded-md shadow-xl z-20">--}}

                                {{--                                            @foreach($child_categories as $category)--}}
                                {{--                                                <a href="#" class="block px-4 py-2 text-sm capitalize text-gray-700 hover:bg-blue-500 hover:text-white">--}}
                                {{--                                                    {{$category->name}}--}}
                                {{--                                                </a>--}}
                                {{--                                            @endforeach--}}
                                {{--                                        </div>--}}
                                {{--                                    </div>--}}

                                {{--                                </div>--}}
                                {{--                            </div>--}}
                            </div>
                        </div>
                        <input type="submit"
                               class="bg-[#6fc727] hover:bg-[#5ab82e] w-11/12 ml-5 my-4 cursor-pointer text-white font-bold py-5 px-5 rounded"
                               name="" value="Далее">
                    </form>
                </div>
            </div>

            <x-faq>
            {{--            Created Component for Frequently Asked Questions--}}
            </x-faq>
        </div>
    </div>
    <!-- </form> -->



{{--        <script>--}}

{{--        function addInput() {--}}
{{--            var newdiv = document.createElement('div');--}}
{{--            //newdiv.id = dynamicInput[counter];--}}
{{--            newdiv.outerHTML = '';--}}
{{--            document.getElementById('formulario').appendChild(newdiv);--}}
{{--        }--}}

{{--        function removeInput(btn) {--}}
{{--            btn.parentNode.remove();--}}
{{--        }--}}

{{--    </script>--}}
{{--    <script>--}}
{{--        let content = document.getElementById("content")--}}
{{--        let show = document.getElementById("showContent")--}}
{{--        let hide = document.getElementById("hideContent")--}}

{{--        show.addEventListener("click", () => {--}}
{{--            content.style.display = "block"--}}
{{--            show.style.display = "none"--}}
{{--        })--}}

{{--        hide.addEventListener("click", () => {--}}
{{--            content.style.display = "none"--}}
{{--        })--}}
{{--    </script>--}}

{{--    <script>--}}
{{--        window.replainSettings = {id: '38d8d3f0-b690-4857-a153-f1e5e8b462a8'};--}}
{{--        (function (u) {--}}
{{--            var s = document.createElement('script');--}}
{{--            s.type = 'text/javascript';--}}
{{--            s.async = true;--}}
{{--            s.src = u;--}}
{{--            var x = document.getElementsByTagName('script')[0];--}}
{{--            x.parentNode.insertBefore(s, x);--}}
{{--        })('https://widget.replain.cc/dist/client.js');--}}
{{--    </script>--}}

{{--    <script>--}}
{{--        tailwind.config = {--}}
{{--            module.exports = {--}}
{{--                purge: [],--}}
{{--                theme: {--}}
{{--                    screens: {--}}
{{--                        'tablet': '700px',--}}
{{--                    },--}}
{{--                    colors: {--}}
{{--                        'orange': '#ff8a00',--}}
{{--                    },--}}
{{--                    boxShadowColor: {--}}
{{--                        'sabzirang': '#ff8a00',--}}
{{--                    },--}}
{{--                    extend: {--}}
{{--                        boxShadow: {--}}
{{--                            '3xl': '0 35px 60px -15px rgba(0, 0, 0, 0.3)',--}}
{{--                        }--}}
{{--                    }--}}
{{--                }--}}
{{--            }--}}
{{--        }--}}
{{--    </script>--}}
{{--    <script src="https://unpkg.com/tailwindcss-jit-cdn"></script>--}}


    <!-- This example requires Tailwind CSS v2.0+ -->




@endsection


@section("javasript")

    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>


    <script>


        $(".delete-task").click(function (){
            Swal.fire({
                title: 'Введённые данные будут потеряны. <br> Удалить задание?',
                showDenyButton: true,
                confirmButtonText: 'Продожить',
                denyButtonText: `Удалить`,
                cancelButtonText: `Отмена`,
            }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                    Swal.close()
                } else if (result.isDenied) {
                }
            })
        })

    </script>

@endsection
