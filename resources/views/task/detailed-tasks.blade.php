@extends("layouts.app")

@section("content")
    
    <div class="container mx-auto w-9/12">
        <div class="grid grid-cols-3  grid-flow-row mt-8">
              
                {{-- left sidebar start --}}
            <div class="md:col-span-2 col-span-3">
                <h1 class="text-3xl font-bold mb-2">Почистить проектор</h1>
                <div class="flex flex-row">
                    <p class="py-2 px-3 bg-amber-200 text-black-500 rounded-lg">до 2 000 руб.</p>
                    <i class="far fa-credit-card text-green-400 mx-3 my-1 text-2xl"></i>
                    <h1 class="my-2 text-green-400">Сделка без риска</h1>
                    <i class="far fa-question-circle mx-3 my-1 text-2xl text-green-300"></i>
                </div>
                <div class="flex flex-row">
                    <p class="mt-4 text-lg text-gray-400 font-normal">Заказчик отдает предпочтение застрахованным исполнителям</p>
                    <i class="far fa-question-circle mx-3 my-3.5 text-2xl text-gray-400"></i>
                </div>
                <div class="flex flex-row text-gray-400 mt-4">
                    <p class="text-green-400 font-normal">Открыто</p>
                    <p class="mx-3 px-3 border-x-2 border-gray-400">7 просмотров</p>
                    <p class="mr-3 pr-3 border-r-2 border-gray-400">Создано вчера 21:48</p>
                    <p>Видео/фототехника</p>
                </div>


                <div class="mt-12 border-2 p-6 w-11/12 rounded-lg border-orange-100 shadow-lg">
                    <h1 class="text-3xl font-semibold py-3">Хотите найти надежного помощника?</h1>
                    <p class="text-lg mb-10">YouDo помогает быстро решать любые бытовые и бизнес-задачи.</p>
                    <a href="/categories/1">
                        <button  class="font-sans text-lg font-semibold bg-[#ff8a00] text-[#fff] hover:bg-orange-500 px-8 pt-2 pb-3 rounded">
                            Создайте свое задание
                        </button>
                      </a>
                </div>

                <div class="mt-12">
                    <h1 class="text-3xl font-medium ">Другие задания в категории</h1>
                   <div class="mt-4">
                        <a href="#" class="underline text-gray-800 hover:text-red-500 text-lg">Ремонт AV ресиверов</a>
                        <p class="text-gray-400 text-base">Максим Е. Цена договорная</p>
                   </div>

                   <div class="mt-4">
                        <a href="#" class="underline text-gray-800 hover:text-red-500 text-lg">Починить телевизор</a>
                        <p class="text-gray-400 text-base">Татьяна Цена договорная</p>
                   </div>

                   <div class="mt-4">
                        <a href="#" class="underline text-gray-800 hover:text-red-500 text-lg">Настройка телевизора</a>
                        <p class="text-gray-400 text-base">Тамара К. Цена договорная</p>
                   </div>

                    <div class="mt-4">
                        <a href="#" class="underline text-gray-800 hover:text-red-500 text-lg">Ремонт пленочных фотоаппаратов в Санкт-Петербурге</a>
                        <p class="text-gray-400 text-base">Ксения Цена договорная</p>
                    </div>

                   <div class="mt-4">
                        <a href="#" class="underline text-gray-800 hover:text-red-500 text-lg">Ремонт жк-телевизора philips 42'' (модель телевизора на фотографии)</a>
                        <p class="text-gray-400 text-base">Мария Т. Цена договорная</p>
                   </div>

                    <div class="mt-4">
                        <a href="#" class="underline text-gray-800 hover:text-red-500 text-lg">Ремонт apple tv</a>
                        <p class="text-gray-400 text-base">Сергей В. Цена договорная</p>
                    </div>
                </div>
            </div>
                {{-- left sidebar end --}}

                {{-- right sidebar start --}}
            <div class="md:col-span-1 col-span-3 px-8">
                <h1 class="text-lg">Заказчик этого задания</h1>
                <div class="flex flex-row mt-4">
                    <div class="mr-4">
                        <img src="{{ asset('images/avatar-avtor-image.png') }}" class="border-2 border-gray-400 w-32 h-32" alt="#">
                    </div>
                    <div class="">
                        <a href="#" class="text-2xl text-blue-500 hover:text-red-500">Павел С.</a>
                        <div class="flex flex-row">
                            <p>Отзывы:</p>
                            <i class="far fa-thumbs-up m-1 text-gray-400"></i>  2
                        </div>
                    </div>
                </div>
            </div>
                {{-- right sidebar end --}}
        </div>
    </div>

@endsection
