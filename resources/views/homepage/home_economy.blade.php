<div class="w-4/5 mx-auto bg-gradient-to-r from-white via-gray-100 to-white">
    <div class="container text-center mx-auto">
        <div class="text-4xl mx-auto py-10 md:py-16">
            {!!__('С Universal Services вы экономите на услугах до 70%.<br> Как это возможно')!!}
        </div>
        <div class="grid md:grid-cols-3 grid-col-1 w-full mx-auto">
            <div class="grid-cols-1 text-left ">
                <div class="border border-gray-300  mx-3 p-4 rounded-xl">
                    <span class="font-semibold">
                    <span class="text-yellow-500">
                        1.
                    </span> {{__('Создать задания')}}
                </span>
                    <h1 class="my-02 text-base pb-2">
                       {{__(' Опишите своими словами задачу, которую требуется выполнить')}}
                    </h1>
                    <a href="/categories/1"
                       class="text-yellow-500 hover:text-white  p-3 rounded-lg transition duration-300 hover:bg-yellow-500">
                        {{__('Создать задания')}}
                    </a>
                </div>
            </div>
            <div class="grid-cols-1 text-left md:my-0 my-3">
                <div class="border border-gray-300  mx-3 p-4 rounded-xl">
                    <span class="font-semibold">
                    <span class="text-yellow-500">
                        2.
                    </span> {{__('Исполнители предложат вам свои услуги и цены')}}
                </span>
                    <h1 class="text-base my-02">
                        {{__('Уже через пару минут вы начнете получать отклики от исполнителей, готовых выполнить ваше задание.')}}
                    </h1>
                </div>
            </div>
            <div class="grid-cols-1 text-left">
                <div class="border border-gray-300  mx-3 p-4 rounded-xl">
                    <span class="font-semibold">
                    <span class="text-yellow-500">
                        3.
                    </span> {{__('Выберите лучший отклик')}}
                </span>
                    <h1 class="text-base my-02">
                        {{__('Вы сможете выбрать подходящего исполнителя, по разным критериям:')}}
                    </h1>
                    <div class="flex">
                        <i class="fas fa-thumbs-up text-yellow-400 mx-2 pr-3"></i>
                        <p class="text-lg">{{__('Отзывы заказчиков')}}</p>
                    </div>
                    <div class="flex">
                        <i class="fas fa-user-alt text-yellow-400 mx-2 pr-3"></i>
                        <p class="text-lg">{{__('Примеры работ')}}</p>
                    </div>
                    <div class="flex">
                        <i class="fas fa-dollar-sign text-yellow-400 mx-2 pl-1 pr-4"></i>
                        <p class="text-lg">{{__('Стоимость услуг')}}</p>
                    </div>
                    <div class="flex">
                        <i class="fas fa-star text-yellow-400 mx-2 pr-3"></i>
                        <p class="text-lg">{{__('Рейтинг')}}</p>
                    </div>
                </div>
            </div>

        </div>

        <div class="w-8/12 mx-auto -mt-16 lg:block hidden">
            <img src="{{ asset('/images/Vector.png') }}" alt="">
        </div>
    </div>
{{--    <div class="text-center w-full mx-auto mt-12 pb-8">--}}
{{--        <a href="/task/create?category_id=31">--}}
{{--            <button class="text-center text-white py-4 px-5  bg-yellow-500 border-yellow-500 text-3xl rounded">--}}
{{--                {{__('Разместите задание прямо сейчас')}}--}}
{{--            </button>--}}
{{--        </a>--}}
{{--        <div class="text-center text-xl mt-4">--}}
{{--            {!!__('и найдите <br> исполнителя за несколько минут')!!}--}}
{{--        </div>--}}
{{--    </div>--}}
</div>
