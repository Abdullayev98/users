@extends("layouts.app")

@section("content")
        <div class="container mx-auto flex flex-row mt-8 mb-8 text-color-[#222]">
            <div class="basis-4/6 flex flex-row">
                <div class="basis-5/6 flex flex-col">
                    <div class="basis-[100%] flex flex-row">
                        <div class="text-left basis-1/2 pb-[72px]">
                            <div class="text-[50px] font-bold pb-[32px]">
                                Контакты
                            </div>
                            <div class="pb-[24px]">
                                Наша служба поддержки работает каждый день.
                                Ответим на любые вопросы и пожелания в чате.
                            </div>
                            <div>
                              <a href="#replain-link">
                                <button type="submit" class="text-white bg-[#6fc727] hover:bg-[#5ab82e] focus:ring-4 focus:ring-[#6fc727] font-medium rounded-lg text-sm px-5 py-2.5 text-center">Напмсать в поддержку</button>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="basis-[100%] flex flex-row">
                        <div class="text-left grid grid-cols-1 gap-2 md:grid-cols-2">
                            <div class="pb-[48px]">
                                <div class="pb-[12px] font-bold">Для СМИ и PR-служб</div>
                                <div>Даём комментарии и пишем статьи про IT. Хотите написать про YouDo?</div>
                                <div class="text-[#4099fb]"><a href="mailto:pr@youdo.com">pr@youdo.com</a></div>
                            </div>
                            <div class="pb-[48px]">
                                <div class="pb-[12px] font-bold">Для партнёров</div>
                                <div>Запускаем проекты, которые делают жизнь в городе лучше. Есть идеи?</div>
                                <div class="text-[#4099fb]"><a href="mailto:partner@youdo.com">partner@youdo.com</a></div>
                            </div>
                            <div class="pb-[48px]">
                                <div class="pb-[12px] font-bold">Для контрагентов</div>
                                <div>Начать сотрудничество или связаться с отделом маркетинга</div>
                                <div class="text-[#4099fb]"><a href="mailto:marketing@youdo.com">marketing@youdo.com</a></div>
                            </div>
                            <div class="pb-[48px]">
                                <div class="pb-[12px] font-bold">Для соискателей</div>
                                <div>Ищем людей, которые хотят работать над большим IT-проектом</div>
                                <div class="text-[#4099fb]"><a href="#">Посмотреть вакансии</a></div>
                            </div>
                        </div>
                    </div>
                    <div class="basis-[100%]">
                        <div class="font-bold">
                            Реквизиты
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
            <div class="basis-2/6 invisible md:visible"><img src="https://youdo.com/_next/static/media/bardak.35854b6bb5e4459530827de9e859c853.png" alt=""></div>
        </div>
@endsection
