<div class="w-full bg-gradient-to-r from-white via-gray-400 to-white h-1 rounded-full"></div>
<div class="w-full bg-gradient-to-r from-white via-gray-100 to-white">
    <div class="container text-center mx-auto px-16">
        <div class="text-4xl mx-auto py-10 md:py-16">
            {{__('С Universal Services вы экономите на услугах до 70%.<br> Как это возможно')}}
        </div>
        <div class="grid md:grid-cols-2 grid-cols-1 mt-8 w-11/12 mx-auto">

            @php $cnt_for_hiw = 0; @endphp

            @foreach($howitworks as $howitwork)

                @if(($cnt_for_hiw % 2) == 0)

                    <div>
                        <img class="lg:ml-0  mx-auto  w-42 h-42" src="{{ asset('storage/'.$howitwork->image) }}" alt="">
                    </div>
                    <div class="md:text-left text-center">
                        <h3 class="text-3xl my-8">{{ $howitwork->getTranslatedAttribute('title',Session::get('lang') , 'fallbackLocale') }}</h3>
                        <a href="/categories/1" class="">
                            <button class="bg-transparent hover:bg-yellow-500 text-yellow-500 hover:text-white py-2 px-4 border border-yellow-500 hover:border-transparent rounded">
                                {{__('Создать задания')}}</button>
                        </a>
                    </div>

                @else

                    <div class="md:text-left text-center my-16 md:block hidden">
                        <h1 class="text-3xl my-8">{{ $howitwork->getTranslatedAttribute('title',Session::get('lang') , 'fallbackLocale') }}</h1>
                        <h2 class="text-xl">{{ strip_tags($howitwork->getTranslatedAttribute('description',Session::get('lang') , 'fallbackLocale')) }}</h2>
                    </div>
                    <div class="my-16 md:block hidden">
                        <img class="lg:ml-0  mx-auto w-42 h-42" src="{{ asset('storage/'.$howitwork->image) }}" alt="">
                    </div>

                    <div class="my-16 md:hidden block">
                        <img class="lg:ml-0 mx-auto w-42 h-42"
                             src="{{ asset('storage/'.$howitwork->image) }}"
                             alt="">
                    </div>
                    <div class="md:text-left text-center md:hidden block">и найдите <br> исполнителя за несколько минут
                        <h3 class="text-3xl mt-8">{{ $howitwork->getTranslatedAttribute('title',Session::get('lang') , 'fallbackLocale') }}</h3>
                        <a href="/categories/1" class="text-blue-500 underline text-xl">{{__('Создать задания')}}</a>
                    </div>
                @endif
                @php $cnt_for_hiw++; @endphp
            @endforeach
        </div>
    </div>
    <div class="text-center w-full mx-auto mt-12 pb-8">
        <a href="/task/create?category_id=31">
            <button class="text-center text-white py-4 px-5  bg-yellow-500 border-yellow-500 text-3xl rounded">
                {{__('Разместите задание прямо сейчас')}}
            </button>
        </a>
        <div class="text-center text-xl mt-4">
            {{__('и найдите <br> исполнителя за несколько минут')}}
        </div>
    </div>
</div>
