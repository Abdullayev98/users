@extends("layouts.app")





@section("content")




    <!-- Information section -->
    <!-- <form class="" action="" method="post"> -->

    {{--    Created Road map for Create a New Tast--}}
    <x-roadmap/>
    <div class="mx-auto w-2/3 my-16">
        <div class="grid grid-cols-3 h-full">
            <div class="md:col-span-2 col-span-3">
                <div class="w-full text-center md:text-2xl text-xl">
                    @lang('lang.name_helpToFind')
                </div>
                <div class="w-full text-center my-4 text-[#5f5869]">
                    @lang('lang.name_percent')
                </div>
                <div class="pt-1">
                    <div class="overflow-hidden h-2 text-xs flex rounded bg-gray-200 mx-auto ">
                        <div style="width: 14%"
                                 class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-[#6fc727]"></div>
                    </div>
                </div>
                <div class="shadow-2xl w-full md:p-16 p-4 mx-auto my-4 rounded-2xl	w-full">
                    <div class="py-4 md:w-1/2 w-full mx-auto px-auto text-center md:text-3xl text-xl texl-bold">
                        @lang('lang.name_howCanWeHelpU')
                    </div>
                    @if($current_category->id == 60)
                    <form action="{{route('task.create.housemaid')}}" method="post">
                        @elseif($current_parent_category->id == 8)
                        <form action="{{route('task.create.smm')}}" method="post">
                        @elseif($current_parent_category->id == 9)
                        <form action="{{route('task.create.computer')}}" method="post">
                        @elseif($current_parent_category->id == 11)
                        <form action="{{route('task.create.design')}}" method="post">
                        @elseif($current_parent_category->id == 12)
                        <form action="{{route('task.create.it')}}" method="post">
                        @elseif($current_parent_category->id == 13)
                        <form action="{{route('task.create.photo')}}" method="post">
                        @elseif($current_parent_category->id == 15)
                        <form action="{{route('task.create.remont_tex')}}" method="post">
                        @elseif($current_parent_category->id == 16)
                        <form action="{{route('task.create.krosata')}}" method="post">
                        @else
                        <form action="{{route('task.create.name')}}" method="post">
                    @endif
                        @csrf

                        <div class="py-4 w-11/12 mx-auto px-auto text-left my-4">
                            <div class="mb-4">
                                <label class="block text-[#5f5869] text-sm mb-2" for="username">
                                    @lang('lang.name_taskName')
                                </label>
                                <input
                                    class="shadow appearance-none border focus:shadow-orange-500 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none "
                                    id="username" type="text" placeholder="@lang('lang.name_example')" required name="name" value="{{session('neym')}}">
                                    <input type="text" hidden name="cat_id" value="{{$current_category->id}}">
                            </div>
                            <div class="hidden">
                              <input type="text" name="cat_id" value="{{$current_category->id}}" hidden>
                            </div>
                            <h3>@lang('lang.name_subCat') <span id="button" style="color: grey;" onclick="myFunction()">@lang('lang.name_pedCourier')</span></h3>
                            <div style="display:none" id="categories">
                                @foreach ($child_categories as $category2)
                                    <br>
                                        <a class="hover:text-green-500" href="/task/create?category_id={{ $category2->id }}">
                                            {{ $category2->name }}
                                        </a>
                                @endforeach
                            </div>
                        </div>
                        <input type="submit"
                               class="bg-[#6fc727] hover:bg-[#5ab82e] w-11/12 md:ml-5 ml-2 my-4 cursor-pointer text-white font-bold md:py-5 py-1 px-5 rounded"
                               name="" value="@lang('lang.name_next')">
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
        function myFunction() {
            var x = document.getElementById("categories");
            var y = document.getElementById("button");

            if (x.style.display === "none") {
                x.style.display = "block";
                y.style.display = "none";

            } else {
                x.style.display = "none";
                y.style.display = "block";
            }
        }
    </script>
    <script>


        $(".delete-task").click(function (){
            Swal.fire({
                title: '@lang('lang.name_deleteAsk')',
                showDenyButton: true,
                confirmButtonText: '@lang('lang.name_continue')',
                denyButtonText: '@lang('lang.name_delete')',
                cancelButtonText: '@lang('lang.name_cencel')',
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
