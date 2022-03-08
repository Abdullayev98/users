@extends("layouts.app")

@section('content')

<div class="container w-4/5 mx-auto mt-12">

        <div class="flex lg:flex-row flex-col justify-center mt-6">
            @include('components.footerpage')
            <div class="lg:w-4/5 w-full text-base lg:mt-0 mt-4">
                <div class="w-full">
                    <h1 class="font-medium text-4xl">{{__('Рейтинг исполнителей и награды')}}</h1>
                    <p class="mt-5"><a  class="text-blue-600 hover:text-red-400">{{__('Рейтинг исполнителей')}}</a>{{__(' считается в каждой категории отдельно и обновляется раз в сутки. От него зависит, на каком месте окажется отклик исполнителя в откликах на задание. Чем выше рейтинг в категории, тем выше размещается отклик и тем больше шансов получить задание.')}}</p>
                    <p class="mt-5">{{__('Основную роль в расчете рейтинга играет количество выполненных заданий. Чтобы занять высокую позицию, выполняйте как можно больше заданий и получайте хорошие оценки. ')}}<a  class="text-blue-600 hover:text-red-400">{{__('Подробнее о том, как считается рейтинг.')}}</a></p>
                    <p class="mt-5">{{__('Значки за различные достижения отображаются в профиле исполнителя, на ')}}<a href="" class="text-blue-600 hover:text-red-400">{{__('странице рейтинга')}}</a>{{__('и рядом с откликами в заданиях. Награды привлекают внимание заказчиков и вызывают больше доверия к их обладателям. Они подчеркивают статус исполнителя и качество оказываемых им услуг наравне с отзывами и оценками.')}}</p>
                    <div class="bg-gray-200 p-5">
                        <h2 class="text-3xl p-5">{{__('Типы значков')}}</h2>
                        <div class="grid grid-cols-5 gap-2">
                            <div class="col-span-1 bg-no-repeat w-50 h-50" >
                                <img src="{{asset('images/goldenCup.png')}}"  class="mx-auto" />
                            </div>
                            <div class="col-span-4">
                                <p class=""><span class="text-red-500 italic">{{__('Исполнитель года.')}}</span>{{__(' Присваивается исполнителям, которые заняли первое место в рейтинге по результатам года.')}}</p>
                            </div>
                        </div>
                        <div class="grid grid-cols-5 gap-2 mt-2">
                            <div class="col-span-1 bg-no-repeat w-50 h-50">
                                <img src="{{asset('images/insuranceIcon.png')}}"  class="mx-auto" />
                            </div>
                            <div class="col-span-4">
                                <p class=""><span class="text-red-500 italic">{{__('Услуги исполнителя застрахованы')}}</span>{{__('Исполнитель подключил услугу страхования материальной ответственности на Universal Services. Если во время выполнения задания что-то сломается или будет нанесён другой материальный ущерб, ВСК выплатит заказчикам компенсацию до 100 тыс. uzs.')}}</p>
                            </div>
                        </div>
                        <div></div>
                    </div>
                </div>
            </div>
        </div>
</div>
@endsection
