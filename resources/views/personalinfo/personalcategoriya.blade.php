@extends("layouts.app")

@section("content")
<div class="shadow-2xl border-t sxXE px-10 rounded-md w-full md:w-7/12 mx-auto grid grid-flow-col gap-4 my-5 flex flex-wrap md:flex-wrap-reverse">
    @php
        $user = auth()->user();
    @endphp
    <div сlass="grid-rows-12">
        <div class="container p-5">
            <h3 class="text-2xl font-semibold text-center">@lang('lang.personalinfo_text19')</h3>
            <p class="text-base text-center my-5">
            @lang('lang.personalinfo_text20')
            </p>
                <form action="{{route('verification.category.store')}}" method="post">
                    @csrf
                    <div class="acordion mt-16">
                        @foreach ($categories as $category )

                            <div class="mb-4 rounded-md border shadow-md">
                                <div
                                    class="accordion text-gray-700 cursor-pointer p-[18px] w-full text-left text-[15px]">
                                    {{ $category->getTranslatedAttribute('name',Session::get('lang') , 'fallbackLocale') }}
                                </div>
                                <div
                                    class="panel overflow-hidden hidden px-[18px] bg-white p-2">
                                    @foreach (\TCG\Voyager\Models\Category::query()->where('parent_id', $category->id)->get() as $category2)
                                        <label class="block">
                                            @php
                                                $cat_arr = explode(",",$user->category_id);
                                                $res_c_arr = array_search($category2->id,$cat_arr);
                                                //dd($res_c_arr);
                                            @endphp
                                            <input type="checkbox"
                                                   @if($res_c_arr !== false) checked
                                                   @endif name="category[]"
                                                   value="{{$category2->id}}"
                                                   class="mr-2 required:border-yellow-500">{{ $category2->getTranslatedAttribute('name',Session::get('lang') , 'fallbackLocale') }}
                                        </label>
                                    @endforeach
                                </div>
                            </div>
                        @endforeach
                    </div>
                   
                <div class="flex w-full gap-x-4 mt-4">
                    <a onclick="myFunction()" class="w-1/3  border border-black-700 hover:border-black transition-colors rounded-lg py-2 text-center flex justify-center items-center gap-2">
                        <!-- <button type="button"> -->
                        @lang('lang.personalinfo_text11')
    
                        <!-- </button> -->
                        <script>
                            function myFunction() {
                                window.history.back();
                            }
                        </script>
                    </a>
    
                    <input type="submit"  class="bg-green-500 hover:bg-green-500 w-2/3 cursor-pointer text-white font-bold py-5 px-5 rounded" name="" value="@lang('lang.personalinfo_text21')">
    
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
@section('javasript')



<script>
    $(".showcategory").click(function() {
        $(".hidecategory").toggle(100)
    })

    var w = window.outerWidth;
    //var h = window.outerHeight;

    // if (window.onload.innerWidth > 500 || window.onresize.innerWidth > 500) {
    //     $(".innerhtml-ctat").text("Стать")
    // } else {
    //     $(".innerhtml-ctat").text("Стать исполнителем")
    // }
</script>
<script>
    var acc = document.getElementsByClassName("accordion");
    var i;

    for (i = 0; i < acc.length; i++) {
        acc[i].addEventListener("click", function () {
            this.classList.toggle("active");
            var panel = this.nextElementSibling;
            if (panel.style.display === "block") {
                panel.style.display = "none";
            } else {
                panel.style.display = "block";
            }
        });
    }
</script>

@endsection