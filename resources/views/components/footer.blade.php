<footer class=" w-10/12 mx-auto">
    <div class="md:flex sm:flex-row flex-col my-12 text-base">
        <div class="w-1/2 w-full flex md:flex-row flex-col md:text-left text-center md:my-0 my-4">
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
        <div class="md:flex w-6/12 text-center mx-auto md:flex md:flex-row justify-end flex-col md:my-0 my-4">
            <a class="rounded-md mx-2 sm:mx-0 mx-auto" rel="noopener noreferrer" href="#" target="_blank">
                <button type="button" class="bg-black rounded-md hover:bg-yellow-500 mx-2"><img src="{{asset('images/download_ios.svg')}}" alt=""> </button>
            </a>
            <a class="rounded-md mx-2 sm:mx-0 mx-auto" rel="noopener noreferrer" href="#" target="_blank">
                <button type="button" class="bg-black rounded-md hover:bg-yellow-500 mx-2"><img src="{{asset('images/download_android.svg')}}" alt=""> </button>
            </a>
        </div>
    </div>
    <div class="md:flex md:mx-0 mx-auto border-t pt-4 w-11/12">
        <div class="container mx-auto ml-4 mb-4 text-base">
            <span class="">
            @lang('lang.footer_foot')
                <a class=" hover:text-amber-500" rel="noopener noreferrer">
                    @lang('lang.footer_text1')
                </a>
            </span>
        </div>
        <div class="w-6/12 mx-auto text-right">
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
{{-- <div class="bg-gray-500 text-gray-100 text-center lg:py-16 w-full justify-center hidden xl:block mx-auto">
    <div class="w-8/12 mx-auto">
        <a href="/press">
            <span class="lazyload-wrapper"><svg width="911" height="68" fill="none" xmlns="http://www.w3.org/2000/svg" class="Press_img__1PE3o" alt="">
                    <path fill="#5C5C5C" d="M0 0h911v68H0z"></path>
                    <path d="M31.8 43.26h-9.2l-5.63-9.34-1.83 1.9v7.44H7.46v-23.5h7.68v7.59l6.6-7.58h9l-8.45 8.76 9.5 14.73zm10.29-8.72c0-1.07-.26-2.05-.76-2.9a2.53 2.53 0 00-2.35-1.3c-.95 0-1.66.43-2.15 1.3a5.9 5.9 0 00-.72 2.9 7 7 0 00.77 3.23c.51 1.01 1.3 1.52 2.36 1.52 1.02 0 1.75-.5 2.19-1.48.44-.98.66-2.07.66-3.27zm5.33 5.3c-1.82 2.69-4.93 3.95-8.15 3.95-3.32 0-6.52-1.25-8.37-4.05a10.2 10.2 0 01-.49-9.5 8.63 8.63 0 015.44-4.25c2.55-.71 5.32-.56 7.77.45 2.29.94 3.99 2.88 4.73 5.18.81 2.52.52 6.05-.93 8.21zm59.56-7.02c-.24-1.12-.64-1.9-1.19-2.33a3.25 3.25 0 00-2.09-.65c-.82 0-1.48.2-1.96.63-.48.42-.84 1.2-1.1 2.35h6.34zm6.57 3.32h-12.84c0 .52.1.99.28 1.4.55 1.22 1.55 2.05 2.98 2.05 1.05 0 2.26-.42 2.49-1.56h6.57a6.17 6.17 0 01-2.61 3.99 10.05 10.05 0 01-4.62 1.65c-2.09.26-4.5.19-6.44-.62a8.84 8.84 0 01-4.84-4.9 9.56 9.56 0 01-.04-6.77 8.6 8.6 0 014.84-4.96 12.05 12.05 0 019.23.27 8.69 8.69 0 014.63 5.67c.33 1.27.45 2.48.37 3.78zm18.42 3.73a7.1 7.1 0 01-6.41 3.9 6 6 0 01-4.72-2.05v7.37H114v-22.9h6.06v2.56c1.32-2.62 4.57-3.57 7.2-2.91 2.86.71 4.79 3.12 5.47 5.82.64 2.52.42 5.96-.76 8.2zm-5.58-5.57c0-.72-.24-1.51-.73-2.36a2.3 2.3 0 00-2.1-1.28c-.92 0-1.62.4-2.11 1.2-.5.8-.74 1.6-.74 2.44 0 1.02.2 1.98.58 2.86.38.89 1.14 1.33 2.27 1.33 1.1 0 1.84-.46 2.24-1.38.36-.88.59-1.85.59-2.8zm21.43 8.76c-2.66.93-6.28 1.07-8.93-.03a8.56 8.56 0 01-4.08-3.42 9.54 9.54 0 01-.73-8.38c.96-2.45 2.61-3.86 5-4.83 2.74-1.12 6.8-1.08 9.4.34a7.3 7.3 0 014.1 5.93h-7a3.56 3.56 0 00-.7-1.8c-.99-1.26-3.21-.65-3.92.6a7.5 7.5 0 00-.48 5.65 3.2 3.2 0 002.82 2.11c1.71 0 2.07-1.15 2.51-2.58h6.78a6.86 6.86 0 01-4.77 6.4zm17.26-6.51c0-.32-.03-.58-.09-.78-.47.26-1.2.49-2.2.68a7.5 7.5 0 00-2.24.68c-.97.48-.92 1.84-.07 2.4.97.58 2.6.53 3.42-.29a3.59 3.59 0 001.18-2.7zm7.62 6.7h-7.01l-.27-1.8c-.51.66-1.65 1.2-2.8 1.65a9.73 9.73 0 01-3.61.65c-1.18 0-2.26-.2-3.24-.62a4.57 4.57 0 01-2.24-1.94 6.72 6.72 0 01-.68-2.92c0-1.26.58-2.3 1.39-3.22.45-.53.9-.83 1.71-1.14.39-.15.77-.28 1.14-.38.37-.1.72-.21 1.05-.26l2.87-.43c1.22-.18 2.4-.34 2.92-.51.32-.11.7-.46.88-.67.19-.22.16-.45.16-.69 0-.32-.16-.59-.47-.8a2.33 2.33 0 00-1.34-.33c-.7 0-1.57.1-1.99.3-.42.22-.69.63-.82 1.25h-6.5c.23-1.12.19-1.77.5-2.46.32-.68.82-1.26 1.5-1.75a7.47 7.47 0 012.82-1.11c.58-.12 1.27-.2 2.05-.27.79-.06 1.66-.1 2.63-.1 2.36 0 4.13.28 5.3.84 1.18.56 1.95 1.01 2.3 1.85.36.84.6 1.92.72 3.25v9.02c0 .93.34 1.62 1.03 2.07v.53zm19.05 0h-6.76v-6.37h-5.01v6.38h-6.7V26.2h6.7v5.7h4.93v-5.7h6.84v17.04zm18.79-12.02h-5.83v12.03h-6.78V31.23h-5.87v-5.02h18.48v5.02zm21.96 6.57c0 1.5-.71 2.81-1.86 3.75-1.5 1.25-3.6 1.7-5.5 1.7h-10.47V31.24h-3.91v-5.02h10.43v5.98h3.57c2 0 4.2.39 5.77 1.7a5.1 5.1 0 011.97 3.91zm-6.74.02c0-1.08-.6-1.53-1.62-1.65l-1.23-.05a42.9 42.9 0 00-1.72-.04v3.3l1.7.03c.46 0 .84-.01 1.14-.03 1.04-.08 1.73-.36 1.73-1.56zM61.92 43.26h-3.29l-3.59-11.4.56 4.47v6.93h-6V26.1h7.7l2.98 9.47 2.98-9.47h7.7v17.15h-6v-6.93l.55-4.46-3.59 11.39zm22.46 0h-3.29l-3.59-11.4.56 4.47v6.93h-6V26.1h7.69l2.99 9.47 2.98-9.47h7.7v17.15h-6v-6.93l.55-4.46-3.59 11.39z" fill="#A0A0A0"></path>
                    <g clip-path="url(#clip0)" fill-rule="evenodd" clip-rule="evenodd" fill="#A0A0A0">
                        <path d="M275.57 22v22.5L297.7 22h-22.13zm1.58 24.11h22.13v-22.5l-22.13 22.5zm34.57-12.58c2.57 0 3.94-1.28 3.94-3.67v-.14c0-2.56-1.44-3.57-3.94-3.57h-2.68v7.38h2.68zM303.8 22h8.05c5.66 0 8.89 2.6 8.89 7.69v.13c0 5.1-3.42 7.53-8.73 7.53h-2.96v8.76h-5.25V22zm27.38 19.97c2.52 0 3.8-1.15 3.8-3.34v-.14c0-2.16-1.28-3.34-3.93-3.34h-2.94v6.82h3.07zm.19 4.14H323V22h14.89v4.25h-9.75l-.03 5.06h3.42c5.27 0 8.4 2.4 8.4 7.22v.13c0 4.72-2.9 7.45-8.56 7.45zm12.38-24.08h5.5v10.38l8.5-10.41h5.85l-9.62 11.42 10.1 12.7h-6.43l-8.4-10.82v10.81h-5.5V22.03z"></path>
                    </g>
                    <g clip-path="url(#clip1)">
                        <path d="M452.07 10h-48v48h48V10z" fill="#A0A0A0"></path>
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M407.35 42.43h10.72L416.6 45h-2.8v8.48h-2.7V45h-3.75v-2.57zM432.92 45c-.31 0-.53.2-.53.52v4.9c0 .31.22.49.53.49h5.55v2.57h-5.56c-1.94 0-3.2-1.19-3.2-3.07v-4.9c0-1.86 1.26-3.08 3.2-3.08h6.22L437.68 45h-4.75zm-7.54 5.99h-3.87a.93.93 0 01-.96-.97c0-.58.4-.99.96-.99h3.87V51zm-.5-8.56h-5.02L418.39 45h6.49c.31 0 .5.2.5.52v1.17h-4.2a3.27 3.27 0 00-3.35 3.4c0 1.95 1.42 3.4 3.35 3.4h6.88v-7.97c0-1.87-1.26-3.09-3.19-3.09zM442.87 45c-.3 0-.52.2-.52.52v4.9c0 .31.21.49.52.49h5.55v2.57h-5.55c-1.94 0-3.2-1.19-3.2-3.07v-4.9c0-1.86 1.26-3.08 3.2-3.08h6.22L447.63 45h-4.76z" fill="#5C5C5C"></path>
                    </g>
                    <g clip-path="url(#clip2)" fill="#A0A0A0">
                        <path d="M492.07 22v5.5h3.06v12.92h-3.06v5.2h16.43v-5.2h-3.13V27.5h3.13V22h-16.43zm17.28 5.58v5.12h2.29v7.72h-2.3v5.12h12.85v-5.12h-2.45v-4.43a3.22 3.22 0 013.29-3.29c1.45 0 2.67.76 2.67 2.37v5.35h-2.37v5.12h12.54v-5.12h-2.07v-6.8c0-4.36-3.2-5.96-7.1-5.96-2.76 0-4.9.76-6.73 2.9-.15.15-.3.38-.46.46v-3.44h-10.16z"></path>
                        <path d="M546.41 27.66c-5.73 0-11.3 2.82-11.38 9.17 0 1.37.23 2.52.69 3.59v.08c1.68 3.82 6.1 5.5 10.62 5.5 3.67 0 8.71-.84 9.86-6.5l.07-.6h-6.87c0 1.9-1.38 2.82-2.9 2.82-2.99 0-3.22-2.52-3.22-4.9v-.07c0-2.37.23-4.89 3.21-4.89 2.37 0 2.75 2.06 2.83 3.97l6.95-.76c-.76-6.96-7.71-7.41-9.47-7.41h-.38zm9.41 15.05a2.9 2.9 0 105.8 0 2.9 2.9 0 00-5.8 0z"></path>
                    </g>
                    <g clip-path="url(#clip3)" fill="#A0A0A0">
                        <path d="M609.77 22.14h-1.96a.38.38 0 00-.38.38v1.88l-3.09 5.35v-7.23a.38.38 0 00-.38-.38h-1.95a.38.38 0 00-.38.38v23.1c0 .2.16.37.38.37h1.95c.21 0 .38-.17.38-.38v-8.54l3.1-5.36v13.9c0 .21.16.38.37.38h1.96c.2 0 .38-.17.38-.38V22.52a.38.38 0 00-.38-.38zm62.31-.14h-1.96a.38.38 0 00-.38.38v1.88l-3.09 5.35v-7.23a.38.38 0 00-.38-.38h-1.95a.38.38 0 00-.38.38v23.1c0 .2.17.37.38.37h1.95c.21 0 .38-.17.38-.38v-8.55l3.1-5.36v13.91c0 .21.16.38.38.38h1.95c.2 0 .38-.17.38-.38V22.38a.38.38 0 00-.38-.38zm-44.04 19.67H626a.27.27 0 01-.27-.27v-4.22c.33-.57.7-1.23 1.1-1.9l1.52 2.65s.36.53.36 1.21v2c-.04.19-.19.53-.68.53zm-.28-14.7c.68 0 .73.67.6.95-.07.18-1.36 2.54-2.62 4.83v-5.52c0-.15.12-.27.27-.27h1.75zm.33 6.14l.87-1.5c.86-1.51 1.67-2.74 1.67-4.02v-3.13c-.03-1.67-1.66-2.4-2.47-2.38h-4.75c-.21 0-.38.16-.38.37v23.1c0 .2.17.37.38.37h5.55c.82.01 2.45-.72 2.48-2.4v-3.8c0-.82-.34-1.38-.34-1.38l-3.01-5.22zM677.65 28c-.12-.28-.07-.96.6-.97h2.25c.2 0 .38.17.38.38v6.5a311.33 311.33 0 01-3.23-5.91zm.2-5.85c-.8-.02-2.44.72-2.47 2.38v3.13c0 1.28.82 2.5 1.68 4.02l.63 1.1-1.85 3.2s-.33.56-.33 1.38v8.26c0 .2.17.37.38.37h1.96c.2 0 .38-.16.38-.37v-7.88c0-.68.36-1.2.36-1.2l.63-1.11 1.66 2.86v7.32c0 .21.17.38.38.38h2.06c.15 0 .27-.12.27-.27v-23.3a.27.27 0 00-.27-.28h-5.46m-25.44 19.92a.27.27 0 00-.27-.31h-4.5a.76.76 0 01-.77-.76v-13.2c0-.41.34-.75.76-.75h3.42c.17 0 .3-.15.27-.32l-.68-4.2a.44.44 0 00-.43-.37h-3.36c-.74-.05-2.7.4-2.69 2.7V43.3a2.55 2.55 0 002.7 2.7h4.55c.21 0 .4-.16.43-.37l.57-3.56zm-39.79-.31c-.17 0-.3.15-.27.31l.57 3.55c.04.21.22.37.43.37h4.3c.74.05 2.7-.4 2.69-2.7v-7.5c0-3.14-2.15-3.28-2.15-3.28l.77-1.34c.86-1.51 1.37-2.22 1.37-3.5v-3.13c-.03-1.66-1.66-2.4-2.47-2.39h-4.15c-.21 0-.4.16-.43.37l-.67 4.2c-.03.17.1.32.26.32h4.08c.27 0 .6.14.69.57v.34s-.04 1.28-.64 2.26l-1.41 2.3h-.98a.38.38 0 00-.38.32l-.32 2.03c-.03.16.1.31.27.31h2.33c.4.02 1.13.23 1.13 1.29v4.54c0 .42-.35.76-.77.76h-4.25zm29.03 0h-4.73v-6.61h2.22c.16 0 .29-.15.26-.32l-.32-2.03a.43.43 0 00-.43-.37h-1.73v-5.39h4.78c.17 0 .3-.15.27-.31l-.67-4.2a.43.43 0 00-.43-.37h-6.39a.27.27 0 00-.27.27v23.3c0 .15.12.27.27.27h6.44c.21 0 .4-.16.43-.37l.57-3.56a.27.27 0 00-.27-.31m20.31-15.05l-.68-4.19a.43.43 0 00-.43-.36h-7.24c-.21 0-.4.15-.43.36l-.67 4.2c-.03.16.1.31.26.31h3.1v18.6c0 .21.17.38.38.38h1.95c.21 0 .38-.17.38-.38v-18.6h3.1c.17 0 .3-.15.27-.31"></path>
                    </g>
                    <g clip-path="url(#clip4)">
                        <path d="M771.43 10.16h-47.68v47.68h47.68V10.16z" fill="#A0A0A0" stroke="#A0A0A0"></path>
                        <path d="M771.38 26.94v1.75h-6.4v12.37h-8.1V28.69h-6.4v-1.75h20.9z" fill="#5C5C5C"></path>
                        <path d="M748.33 34.95a4.1 4.1 0 00-1.21-8h.01-17.18v14.1h8.1v-6.01h2.35l4.22 6.02h8.44l-4.73-6.11zm-7.66-1.52h-2.63v-4.88h2.63a2.44 2.44 0 110 4.88z" fill="#5C5C5C"></path>
                    </g>
                    <g clip-path="url(#clip5)"><path fill-rule="evenodd" clip-rule="evenodd" d="M862.7 45.93a45.9 45.9 0 01-3.34-.55l-.49-.11.04-2.58c.1-6.22.1-9.6.04-12.9-.05-3.24-.07-3.58-.2-4.06-.15-.6-.38-1.02-.65-1.22-.11-.08-.4-.18-.65-.24l-.12-.02c-.42-.1-.57-.13-.63-.23a.432.432 0 01-.04-.22v-.06c-.02-.21 0-.36.06-.4.07-.06 6.81-1.34 7.02-1.34.07 0 .08.86.04 3.83-.02 2.1-.02 3.82 0 3.82s.26-.1.54-.24c.85-.39 1.64-.56 2.77-.6.76-.02 1.11 0 1.5.07 2.54.53 4.42 2.6 5.08 5.62.17.78.23 2.74.12 3.71-.1.84-.37 1.96-.66 2.69a7.98 7.98 0 01-6.51 5.01c-.72.1-2.95.12-3.91.02zm-28.32 0a7.16 7.16 0 01-5.96-5.15 11.77 11.77 0 010-6.78 7.96 7.96 0 013.87-4.57 9.17 9.17 0 018.2.18c2.04 1.2 3.28 3.35 3.63 6.28.1.89.03 2.78-.13 3.56-.68 3.18-2.66 5.41-5.56 6.25-.31.1-.8.2-1.08.24-.59.08-2.4.08-2.97 0zm40.91-6.35c.77 3.41 3.1 5.73 6.38 6.32.72.13 2.36.13 3.08 0a8.47 8.47 0 003-1.15c.92-.62 1.87-1.56 1.87-1.85 0-.18-.32-.59-.46-.59-.06 0-.31.14-.57.3-.9.59-1.76.82-2.96.82-1.66 0-2.7-.4-3.76-1.47a4.22 4.22 0 01-.9-1.2 8.2 8.2 0 01-.87-3.54l-.01-.58 4.88-.01 4.88-.02.02-.33a8.6 8.6 0 00-.05-1.06c-.3-2.96-1.5-5-3.55-6.02-1.8-.9-4.6-.84-6.65.15a7.74 7.74 0 00-4.02 4.75 9.42 9.42 0 00-.47 3.6c.02.95.07 1.44.16 1.88zm19.57 6.38a18.2 18.2 0 01-3.67-.8l-.3-.13-.04-1.5-.06-2.47-.02-.95.18-.1c.1-.04.3-.08.45-.09l.27-.01.23.56c.89 2.18 1.93 3.36 3.29 3.72.52.14 1.5.14 1.88 0a2.33 2.33 0 001.67-2.3c0-1.32-.72-1.96-3.46-3.03-1.7-.66-2.29-1-3-1.72a4.18 4.18 0 01-1.19-2.9 4.86 4.86 0 011.42-3.82 6.34 6.34 0 014.23-1.83c1.62-.15 4.11.2 5.41.75l.24.1.04 1.34.06 2.2v.86l-.31.12c-.5.19-.54.16-.82-.58-.79-2.09-1.7-3.07-3.13-3.38-.86-.18-1.59.02-2.12.58a2.1 2.1 0 00-.6 1.49c-.05.7.08 1.1.51 1.57.54.58 1.41 1.09 3.16 1.82 2.14.9 3.16 1.65 3.71 2.76.37.72.47 1.3.43 2.4-.03.83-.05 1-.24 1.56-.62 1.82-2.01 3.02-4.16 3.58-.73.2-.83.2-2.28.22-.83 0-1.63 0-1.78-.02zm-83.26-.88c0 .3.02.47.08.49.12.05 11.76.05 11.88 0 .16-.06.15-.92-.01-1a6.12 6.12 0 00-.87-.18 5.86 5.86 0 01-1.03-.22c-.76-.34-1.18-1.25-1.34-2.91a63.5 63.5 0 01-.2-5.01v-1.49l.7.02c1.51.05 2.3.13 2.6.27.7.3 1.24 1.14 1.53 2.32l.15.62.54.02.54.02v-7.92l-.54.02-.53.02-.16.62c-.3 1.22-.8 1.96-1.54 2.3-.3.14-.5.17-1.22.22-.47.02-1.13.05-1.47.05h-.6v-1.96c0-1.96.1-6.14.16-6.79l.04-.35h2.08c2.38 0 2.77.05 3.62.47 1.22.6 2.12 1.79 2.9 3.85v.01c.17.45.24.65.39.71.12.06.3 0 .62-.09l.48-.15-.05-3.04a80.8 80.8 0 00-.08-3.3l-.05-.27-9.1-.02c-5 0-9.2 0-9.31.02l-.22.04.02.54.02.54.7.08c.9.11 1.43.36 1.75.83.71 1.05.84 2.47.84 9.25 0 7.21-.15 8.97-.84 9.88-.36.47-.65.62-1.46.77l-.1.02c-.57.1-.79.14-.87.27-.05.08-.05.2-.05.38v.05zm32.59.48c-.06-.04-.08-.2-.07-.51l.02-.46.23-.05.61-.12c.64-.12 1-.46 1.21-1.14.17-.56.24-2.33.25-5.88 0-4.34-.09-5.37-.53-5.95-.24-.32-.4-.4-.99-.52a66.1 66.1 0 01-.66-.13c-.13-.03-.15-.07-.15-.4 0-.3.02-.36.15-.42.2-.08 6.73-1.38 6.94-1.38h.16l-.03.97-.06 1.73-.03.76.23-.43a5.91 5.91 0 012.74-2.73 3.71 3.71 0 011.8-.37c.91 0 1.82.3 1.82.6 0 .2-1.6 4.42-1.7 4.46-.03.01-.35-.1-.69-.27a4.6 4.6 0 00-2.01-.5c-.8 0-1.7.3-2.05.67-.15.17-.15.18-.2 2.6-.03 2.4.05 5.33.19 6.5.11 1 .38 1.5.93 1.73.18.08 1.34.24 1.72.24.03 0 .05.23.03.5l-.01.52-4.88.01c-2.69.01-4.92 0-4.97-.03zm-6.06-2.17c-.31.58-.89 1.12-1.35 1.26-1.8.54-3.1-1.18-3.6-4.78a33.11 33.11 0 010-5.66c.36-2.89 1.25-4.36 2.66-4.36.63 0 .98.15 1.48.65 1.18 1.2 1.74 3.46 1.73 7.03 0 2.85-.29 4.64-.92 5.86zm28.47.6c-.4.35-.77.54-1.25.63-.35.07-.45.07-1.08.02-.26-.02-.32-.05-.38-.2-.08-.21-.18-7.94-.14-11.03l.03-2.41.44-.13c.29-.09.63-.13 1.03-.13.56 0 .63.02 1.1.25 1.14.56 1.91 1.95 2.27 4.07.14.78.15 2.92.03 3.86-.3 2.3-1.05 4.16-2.05 5.06zm17.14-8.84l1.15-.04-.04-.81c-.15-2.88-.85-4.45-2-4.45-1.23 0-2.22 1.6-2.64 4.25-.05.33-.09.72-.09.86v.27l1.24-.02 2.38-.06z" fill="#A0A0A0"></path>
                    </g>
                    <defs>
                        <clipPath id="clip0">
                            <path fill="#fff" transform="translate(275.57 22)" d="M0 0h88.5v24H0z"></path>
                        </clipPath>
                        <clipPath id="clip1"><path fill="#fff" transform="translate(404.07 10)" d="M0 0h48v48H0z"></path>
                        </clipPath>
                        <clipPath id="clip2">
                            <path fill="#fff" transform="translate(492.07 22)" d="M0 0h69.55v24H0z"></path>
                        </clipPath>
                        <clipPath id="clip3">
                            <path fill="#fff" transform="translate(601.63 22)" d="M0 0h81.97v24H0z"></path>
                        </clipPath>
                        <clipPath id="clip4">
                            <path fill="#fff" transform="translate(723.6 10)" d="M0 0h48v48H0z"></path>
                        </clipPath>
                        <clipPath id="clip5">
                            <path fill="#fff" transform="translate(811.6 22)" d="M0 0h91.74v24H0z"></path>
                        </clipPath>
                    </defs>
                </svg></span>
        </a>
    </div>
</div> --}}

<script>
    var link = document.location.href.split('/');
    if(link[3] == 'task'){
        $(".verification").removeAttr("href");
        $(".faq").removeAttr("href");
        $(".contact").removeAttr("href");
        $(".review").removeAttr("href");
    }

            var link = document.location.href.split('/');
            if(link[3] == 'verification'){
                $(".verify").addClass("text-yellow-400");
            }
            else if(link[3] == 'contacts'){
                $(".contact").addClass("text-yellow-400");
            }
            else if(link[3] == 'author-reviews'){
                $(".rews").addClass("text-yellow-400");
            }
</script>
