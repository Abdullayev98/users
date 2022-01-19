<div class="bg-[#f5f5fa] bg-center bg-cover mt-4 h-40 py-4 hidden md:block">
    <div class="row-start-2 row-span-2 mx-56 h-full">
        <div class="grid grid-cols-3 gap-6 h-full">
            <div class="text-left h-full">
                <div class="grid grid-cols-3 h-full">
                    <div class="step w-full text-center h-full text-8xl pt-4 text-[#a199aa]">1</div>
                    <div class="w-full col-span-2">
                        <div class="text-left text-xl font-bold pt-4 w-full h-1/2">@lang('lang.roadmap_describeatask')</div>
                        <div class="text-left text-sm w-full h-1/2 text-[#a199aa] ">@lang('lang.roadmap_text')</div>
                    </div>
                </div>
            </div>
            <div class="text-left h-full">
                <div class="grid grid-cols-3 h-full">
                    <div class="step w-full text-center h-full  text-8xl pt-4 text-[#a199aa]">2</div>
                    <div class="w-full col-span-2">
                        <div class="text-left text-xl font-bold pt-4 w-full h-1/2 ">@lang('lang.roadmap_text1')</div>
                        <div class="text-left text-sm w-full h-1/2 text-[#a199aa]">@lang('lang.roadmap_text2')</div>
                    </div>
                </div>
            </div>
            <div class="text-left h-full">
                <div class="grid grid-cols-3 h-full">
                    <div class="step w-full text-center h-full  text-8xl pt-4 text-[#a199aa]">3</div>
                    <div class="w-full col-span-2">
                        <div class="text-left text-xl font-bold pt-4 w-full h-1/2 ">@lang('lang.roadmap_text3')</div>
                        <div class="text-left text-sm w-full h-1/2 text-[#a199aa]">@lang('lang.roadmap_text4')</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(".delete-task").click(function (){
        Swal.fire({
            title: '@lang('lang.name_deleteAsk')',
            showDenyButton: true,
            confirmButtonText: '@lang('lang.name_continue')',
            denyButtonText: '@lang('lang.name_delete')',
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.close()
            } else if (result.isDenied) {
                window.location.href = '/';
                return false;
            }
        })
    })
    $('div').removeClass('group');
    $('ul').removeClass('group-hover');
    $('button').removeClass('hover:text-[#ffa200]');
    $('button').removeClass('text-gray-500');
    $('button').addClass('text-gray-400');
  </script>
