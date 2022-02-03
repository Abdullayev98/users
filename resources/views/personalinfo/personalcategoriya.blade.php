@extends("layouts.app")

@section("content")
<div class="shadow-2xl sxXE px-10 rounded-md w-full md:w-7/12 mx-auto grid grid-flow-col gap-4 my-5 flex flex-wrap md:flex-wrap-reverse">

    <div сlass="grid-rows-12">
        <div class="container p-5">
            <h3 class="text-2xl font-semibold text-center">@lang('lang.personalinfo_text19')</h3>
            <p class="text-base text-center my-5">
            @lang('lang.personalinfo_text20')
            </p>
            <div class="showcategory">
                <p class="text-base font-semibold cursor-pointer">
                    Курьерские услуги
                </p>
            </div>
            <div class="mt-3 hidecategory hidden">
                <span class="rounded-3xl block sm:block md-block border text-sm py-1 px-5 mt-2">Выбрать все подкатегории</span> <span class="my-2 block rounded-3xl border text-sm py-1 px-5">Услуги пешего курьера</span>
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

                <input type="submit" class="bg-green-500 hover:bg-green-500 w-2/3 cursor-pointer text-white font-bold py-5 px-5 rounded" name="" value="@lang('lang.personalinfo_text21')">

            </div>
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

@endsection