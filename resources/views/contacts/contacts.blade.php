@extends("layouts.app")

@section("content")
        <div class="container pl-[16px] mx-auto flex flex-row mt-8 mb-8 text-color-[#222]">
            <div class="basis-4/6 flex flex-row">
                <div class="basis-5/6 flex flex-col">
                    <div class="basis-[100%] flex flex-row">
                        <div class="text-left basis-1/2 pb-[72px]">
                            <div class="text-[50px] font-bold pb-[32px]">
                                @lang('lang.contact_title')
                            </div>
                            <div class="pb-[24px]">
                                @lang('lang.contact_text')
                            </div>
                            <div>
                              <a href="#replain-link">
                                <button type="submit" class="text-white bg-[#6fc727] hover:bg-[#5ab82e] focus:ring-4 focus:ring-[#6fc727] font-medium rounded-lg text-sm px-5 py-2.5 text-center">@lang('lang.contact_text1')</button>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="basis-[100%] flex flex-row">
                        <div class="text-left grid grid-cols-1 gap-2 md:grid-cols-2">
                            <div class="pb-[48px]">
                                <div class="pb-[12px] font-bold">@lang('lang.contact_text2')</div>
                                <div>@lang('lang.contact_text3')</div>
                                <div class="text-[#4099fb]"><a href="mailto:pr@user.com">pr@User.com</a></div>
                            </div>
                            <div class="pb-[48px]">
                                <div class="pb-[12px] font-bold">@lang('lang.contact_text4')</div>
                                <div>@lang('lang.contact_text5')</div>
                                <div class="text-[#4099fb]"><a href="mailto:partner@user.com">partner@User.com</a></div>
                            </div>
                            <div class="pb-[48px]">
                                <div class="pb-[12px] font-bold">@lang('lang.contact_text6')</div>
                                <div>@lang('lang.contact_text7')</div>
                                <div class="text-[#4099fb]"><a href="mailto:marketing@user.com">marketing@User.com</a></div>
                            </div>
                            <div class="pb-[48px]">
                                <div class="pb-[12px] font-bold">@lang('lang.contact_text8')</div>
                                <div>@lang('lang.contact_text9')</div>
                                <div class="text-[#4099fb]"><a href="#">@lang('lang.contact_text10')</a></div>
                            </div>
                        </div>
                    </div>
                    <div class="basis-[100%]">
                        <div class="font-bold">
                            @lang('lang.contact_text11')
                        </div>
                        <div>
                        Общество с ограниченной ответственностью «Киберлогистик»

                        Адрес для корреспонденции, направления жалоб и предложений:
                        119021, Россия, г. Москва, а/я 21

                        Юридический адрес:
                        121205, Россия, г. Москва, Территория Инновационного Центра «Сколково», улица Нобеля 7, офис 47

                        ИНН 7730194136
                        КПП 773101001
                        ОГРН 5157746302434
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
