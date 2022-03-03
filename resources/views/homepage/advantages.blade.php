{{--<div class="bg-blue-100">--}}
{{--    <div class="w-11/12 md:w-9/12 mx-auto pb-24">--}}
{{--        <div class="text-3xl md:text-4xl mx-auto py-16 text-center">--}}
{{--            {{__('Основные преимущества Universal Services')}}--}}
{{--        </div>--}}
{{--        <div class="grid lg:grid-cols-4 grid-cols-4 grid-cols-1 w-full md:w-11/12 mx-auto gap-y-12">--}}
{{--            @foreach ($advants as $advant )--}}
{{--                <div class="col-span-1 md:my-auto sm:mr-0 mr-4 rounded-lg">--}}
{{--                    <img src="{{ asset('storage/'.$advant->image) }}" class="md:w-32 md:h-32 h-24 w-24 rounded-lg"  alt="">--}}
{{--                </div>--}}
{{--                <div class="col-span-3 ml-5">--}}
{{--                    <h4 class="font-semibold text-xl md:text-2xl">{{$advant->getTranslatedAttribute('title',Session::get('lang') , 'fallbackLocale')}}</h4>--}}
{{--                    <p class="text-base">{{$advant->getTranslatedAttribute('description',Session::get('lang') , 'fallbackLocale')}}</p>--}}
{{--                </div>--}}
{{--            @endforeach--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
<div class="w-4/5 mx-auto grid lg:grid-cols-2 grid-cols-1 mt-12">
    <div class="grid-col-1 w-11/12">
        <img src="{{ asset('/images/advantages.png') }}" alt="">
    </div>
    <div class="grid-col-1 -ml-8">
        <div class="md:text-xl font-semibold mx-auto py-6 text-center">
            {{__('Основные преимущества Universal Services')}}
        </div>
        <div>
            <span class="font-semibold">Выгодные цены</span>
            <p class="text-base">
                У частных исполнителей нет расходов на офис, рекламу, зарплату секретарю и других затрат, которые сервисные компании обычно включают в стоимость своих услуг.
            </p>

            <span class="font-semibold">
                Проверенные исполнители
            </span>
            <p class="text-base">
                Все исполнители Universal Services проходят процедуру верификации, мы проверяем отзывы, разбираемся с жалобами и контролируем качество их работы.
            </p>

            <span class="font-semibold">
                Экономия времени
            </span>
            <p class="text-base pb-4">
                На Universal Services вы можете найти подходящего исполнителя за несколько минут. Многие из них готовы приступить к работе в тот же день, а иногда в тот же час.
            </p>
        </div>
        <hr>
        <div>
            <div class="float-left mr-5">
                <span class="text-yellow-500 font-semibold">
                    2 419 658
                </span>
                <p class="text-base">
                    заданий уже выполнены
                </p>
            </div>
            <div>
                <span class="text-yellow-500 font-semibold">
                    617 014
                </span>
                <p class="text-base">
                    исполнителей готовы помочь вам
                </p>
            </div>
            <div class="mt-4">
                <span class="text-yellow-500 font-semibold">
                    35 секунд
                </span>
                <p class="text-base">
                    до первого отклика на ваше задание
                </p>
            </div>
        </div>
    </div>
</div>

