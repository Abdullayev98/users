<footer class=" w-10/12 mx-auto">
    <div class="md:flex sm:flex-row flex-col my-8 text-base">
        <div class="w-1/2 w-full flex md:flex-row flex-col md:text-left text-center md:my-0 my-10">
            <div class="w-3/4 flex flex-col lg:mx-8 mx-auto">
                <a class="delete-task verification cursor-pointer text-gray-700 hover:text-yellow-500 border-b-2 md:border-0 hover:border-yellow-500 verify" href="/verification">@lang('lang.footer_how')&nbsp;@lang('lang.footer_become')&nbsp;@lang('lang.footer_performer')</a>
                <a class="delete-task faq cursor-pointer text-gray-700 hover:text-yellow-500 border-b-2 md:border-0 hover:border-yellow-500" href="/faq">@lang('lang.footer_ownquestion')</a>
                <a class="delete-task contact cursor-pointer text-gray-700 hover:text-yellow-500 border-b-2 md:border-0 hover:border-yellow-500 contact" href="/contacts">@lang('lang.footer_contact')</a>
            </div>
            <div class="w-3/4 flex flex-col lg:mx-0 mx-auto">
                <a class="delete-task review cursor-pointer text-gray-700 hover:text-yellow-500 border-b-2 md:border-0 hover:border-yellow-500 rews" href="/author-reviews">@lang('lang.footer_costumersreviews')</a>
                <a class="text-gray-700 hover:text-yellow-500 border-b-2 md:border-0 hover:border-yellow-500" href="#replain-link">@lang('lang.footer_text')</a>
            </div>
        </div>
        <div class="md:flex w-6/12 text-center mx-auto md:flex md:flex-row justify-end flex-col md:my-0 md:my-4 my-0">
            <a class="rounded-md mx-2 sm:mx-0 mx-auto " rel="noopener noreferrer" href="#" target="_blank">
                <button type="button" class="bg-black rounded-md hover:bg-yellow-500 mx-2 sm:mb-0 mb-2"><img src="{{asset('images/download_ios.svg')}}" alt=""> </button>
            </a>
            <a class="rounded-md mx-2 sm:mx-0 mx-auto" rel="noopener noreferrer" href="#" target="_blank">
                <button type="button" class="bg-black rounded-md hover:bg-yellow-500 mx-2"><img src="{{asset('images/download_android.svg')}}" alt=""> </button>
            </a>
        </div>
    </div>
    <div class="md:flex md:mx-0 mx-auto border-t pt-4">
        <div class="container mx-auto sm:ml-4 ml-0 mb-4 md:text-left text-center">
            <span class="">
            @lang('lang.footer_foot') <br>
                <a class="hover:text-amber-500 m:mx-auto" rel="noopener noreferrer">
                    @lang('lang.footer_text1')
                </a>
            </span>
        </div>
        <div class="md:w-6/12 w-10/12 mx-auto text-center md:text-right mb-8">
            <a href="#">
                <i class="fab fa-instagram text-gray-500 hover:text-yellow-500 mx-2"></i>
            </a>
            <a href="#">
                <i class="fab fa-telegram text-gray-500 hover:text-yellow-500 mx-2"></i>
            </a>
            <a href="#">
                <i class="fab fa-whatsapp text-gray-500 hover:text-yellow-500 mx-2"></i>
            </a>
            <a href="#">
                <i class="fab fa-youtube text-gray-500 hover:text-yellow-500 mx-2"></i>
            </a>
            <a href="#">
                <i class="fab fa-facebook text-gray-500 hover:text-yellow-500 mx-2"></i>
            </a>
        </div>
    </div>

</footer>
