<footer>
    <div class="p-10 text-gray-800">
       <div class="mx-auto text-center md:text-left">
           <div class="grid-col-1 md:grid-col-2 lg:grid-col-4 gap-x-2">
               <div class="mb-5 md:w-2/12 md:float-left md:mr-20 md:ml-24">
                   <a class="delete-task verification cursor-pointer text-[#5f5869] hover:text-[#ffa200] border-b-2 md:border-0 border-b-[#ffa200]" href="/verification">@lang('lang.footer_how')&nbsp;@lang('lang.footer_become')&nbsp;@lang('lang.footer_performer')</a><br>
                   <a class="delete-task faq cursor-pointer text-[#5f5869] hover:text-[#ffa200] border-b-2 md:border-0 border-b-[#ffa200]" href="/faq">@lang('lang.footer_ownquestion')</a><br>
                   <a class="delete-task contact cursor-pointer text-[#5f5869] hover:text-[#ffa200] border-b-2 md:border-0 border-b-[#ffa200]" href="/contacts">@lang('lang.footer_contact')</a><br>
               </div>
               <div class="mb-5 md:w-2/12 md:float-left -mt-5 md:m-0">
                   <a class="delete-task review cursor-pointer text-[#5f5869] hover:text-[#ffa200] border-b-2 md:border-0 border-b-[#ffa200]" href="/author-reviews">@lang('lang.footer_costumersreviews')</a><br>
                   <a class="text-[#5f5869] hover:text-[#ffa200] border-b-2 md:border-0 border-b-[#ffa200]" href="#replain-link">@lang('lang.footer_text')</a>
               </div>
               <div class="mb-5 md:float-left mx-auto lg:float-none md:w-6/16">
                   <div class="w-1/1 ml-auto px-auto">
                       <a class="md:mr-2 rounded-md md:inline-block lg:inline-block xl:inline-block" rel="noopener noreferrer" href="#" target="_blank">
                           <button type="button" class="w-3/10 bg-[#000] rounded-md mt-8 hover:bg-[#ffa200]"><img src="{{asset('images/download_ios.svg')}}" alt=""> </button>
                       </a>
                       <a class="md:mr-2 rounded-md md:inline-block md:px-3" rel="noopener noreferrer" href="#" target="_blank">
                           <button type="button" class="w-3/10 bg-[#000] rounded-md mt-8 hover:bg-[#ffa200]"><img src="{{asset('images/download_android.svg')}}" alt=""> </button>
                       </a>
                   </div>
               </div>
               <div class="mb-5 md:float-left lg:float-none md:w-6/16 md:ml-24 pt-5">
                   <span class="">
                   @lang('lang.footer_foot')
                       <a class="delete-task cursor-pointer md:mr-2 rounded-md md:inline-block lg:inline-block xl:inline-block hover:text-amber-500" rel="noopener noreferrer">
                           @lang('lang.footer_text1')
                       </a>
                   </span>
               </div>
           </div>
       </div>
   </div>
</footer>


{{--<div class="bg-[#333] text-[#a4a4a4] text-center lg:py-[60px] lg:px-[40px] invisible xl:vismd:mr-2 rounded-md md:inline-block lg:inline-block xl:inline-block hover:text-amber-500ible -ml-1">--}}
{{--   <div>--}}

{{--       <span class="inline-block text-[5rem] leading-4 tracking-[4px] mr-[20px]">--}}
{{--    </span>--}}
{{--   </div>--}}
{{--   <p class="inline text-[2rem] leading-[2]">@lang('lang.footer_text2') <span>@lang('lang.footer_text3')</span></p>--}}
{{--</div>--}}

<script>
    var link = document.location.href.split('/');
    if(link[3] == 'task'){
        $(".verification").removeAttr("href");
        $(".faq").removeAttr("href");
        $(".contact").removeAttr("href");
        $(".review").removeAttr("href");
    }
</script>