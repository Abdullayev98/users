@extends("layouts.app")

@include('layouts.fornewtask')

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
                                 class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-green-500"></div>
                    </div>
                </div>
                <div class="shadow-2xl w-full md:p-16 p-4 mx-auto my-4 rounded-2xl	w-full">
                    <div class="py-4 md:w-1/2 w-full mx-auto px-auto text-center md:text-3xl text-xl texl-bold">
                        @lang('lang.name_howCanWeHelpU')
                    </div>
                    <form action="{{route("task.create.name.store", $task->id)}}" method="post">
                        @csrf

                        <div class="py-4 w-11/12 mx-auto px-auto text-left my-4">
                            <div class="mb-4">
                                <label class="block text-[#5f5869] text-sm mb-2" for="username">
                                    @lang('lang.name_taskName')
                                </label>
                                <input
                                    class="shadow appearance-none border focus:shadow-orange-500 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none "
                                    id="username" type="text" placeholder="@lang('lang.name_example')" required name="name" value="{{session('neym')}}">
                            </div>
                            <button type='button' id='button' style="color: grey; hover: red;" onclick="myFunction()">@lang('lang.name_subCat2')</button>
                            <div style="display:none" id="categories">

                            <div class="flex justify-center">
  <div class="my-3 xl:w-50 pr-2">
    <select onchange="func_for_select(Number(this.options[this.selectedIndex].value));" class="form-select appearance-none
      block
      w-full
      px-3
      py-1.5
      text-base
      font-normal
      text-gray-700
      bg-white bg-clip-padding bg-no-repeat
      border border-solid border-gray-300
      rounded
      transition
      ease-in-out
      m-0
      focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" aria-label="Default select example">

        <option selected  disabled>@lang('lang.name_chooseOne')</option>
        @foreach (\TCG\Voyager\Models\Category::withTranslations(['ru', 'uz'])->where('parent_id', null)->get() as $cat_for_p)
        <option value="{{$cat_for_p->id}}">{{ $cat_for_p->getTranslatedAttribute('name',Session::get('lang') , 'fallbackLocale') }}</option>
        @endforeach
    </select>
  </div>
  @foreach (\TCG\Voyager\Models\Category::withTranslations(['ru', 'uz'])->where('parent_id', null)->get() as $cat_for_ch)
  <div id="for_filter_select{{ $cat_for_ch->id }}" class="my-3 xl:w-50 pl-2 hidden for_all_hid_ch">
    <select onchange="window.location.href = this.options[this.selectedIndex].value" class="form-select appearance-none
      block
      w-full
      px-3
      py-1.5
      text-base
      font-normal
      text-gray-700
      bg-white bg-clip-padding bg-no-repeat
      border border-solid border-gray-300
      rounded
      transition
      ease-in-out
      m-0
      focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" aria-label="Default select example">
        <option selected  disabled>Выберите один из пунктов</option>
        @foreach (\TCG\Voyager\Models\Category::withTranslations(['ru', 'uz'])->where('parent_id', $cat_for_ch->id)->get() as $category2)
        <option value="/task/create?category_id={{ $category2->id }}">{{ $category2->getTranslatedAttribute('name',Session::get('lang') , 'fallbackLocale') }}</option>
        @endforeach
    </select>
  </div>
  @endforeach
</div>

<script>
function func_for_select(id) {

    $('.for_all_hid_ch').addClass('hidden');

$('#for_filter_select'+ id +'').removeClass('hidden');
};
</script>


                            </div>
                        </div>
                        <input type="submit"
                               class="bg-green-500 hover:bg-green-500 w-11/12 md:ml-5 ml-2 my-4 cursor-pointer text-white font-bold md:py-5 py-1 px-5 rounded"
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


@endsection
