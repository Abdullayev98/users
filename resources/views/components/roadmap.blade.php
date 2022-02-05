<div class="bg-gray-100 bg-center bg-cover mt-4 h-40 py-4 hidden md:block">
    <div class="row-start-2 row-span-2 xl:w-10/12 mx-auto h-full">
        <div class="grid grid-cols-3 gap-6 h-full">
            <div class="text-left h-full">
                <div class="grid grid-cols-3 h-full">
                    <div class="step w-full text-center h-full text-8xl pt-4 text-gray-500">1</div>
                    <div class="w-full col-span-2">
                        <div class="text-left md:text-base lg:text-xl font-bold pt-4 w-full h-1/2 text-gray-800">@lang('lang.roadmap_describeatask')</div>
                        <div class="text-left text-sm w-full h-1/2 text-gray-600">@lang('lang.roadmap_text')</div>
                    </div>
                </div>
            </div>
            <div class="text-left h-full">
                <div class="grid grid-cols-3 h-full">
                    <div class="step w-full text-center h-full  text-8xl pt-4 text-gray-500">2</div>
                    <div class="w-full col-span-2">
                        <div class="text-left md:text-base lg:text-xl font-bold pt-4 w-full h-1/2 text-gray-800">@lang('lang.roadmap_text1')</div>
                        <div class="text-left text-sm w-full h-1/2 text-gray-600">@lang('lang.roadmap_text2')</div>
                    </div>
                </div>
            </div>
            <div class="text-left h-full">
                <div class="grid grid-cols-3 h-full">
                    <div class="step w-full text-center h-full  text-8xl pt-4 text-gray-500">3</div>
                    <div class="w-full col-span-2">
                        <div class="text-left md:text-base lg:text-xl font-bold pt-4 w-full h-1/2 text-gray-800">@lang('lang.roadmap_text3')</div>
                        <div class="text-left text-sm w-full h-1/2 text-gray-600">@lang('lang.roadmap_text4')</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $('div').removeClass('group');
    $('ul').removeClass('group-hover');
    $('button').removeClass('hover:text-yellow-500');
    $('button').removeClass('text-gray-500');
    $('button').addClass('text-gray-400');
  </script>
