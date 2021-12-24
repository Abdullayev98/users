@extends("layouts.app")

@section("content")
  @foreach($tasks as $task)
    <div class="container mx-auto w-9/12">
        <div class="grid grid-cols-3  grid-flow-row mt-8 mb-8">

                {{-- left sidebar start --}}
            <div class="lg:col-span-2 col-span-3">
                <h1 class="text-3xl font-bold mb-2">{{$task->name}}</h1>
                <div class="flex flex-row">
                    <p class="py-2 px-3 bg-amber-200 text-black-500 rounded-lg">до {{$task->budget}}</p>
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
                    <!-- <p class="mx-3 px-3 border-x-2 border-gray-400">7 просмотров</p> -->
                    <p class="mr-3 pr-3 border-r-2 border-gray-400">{{$task->created_at}}</p>
                    @foreach($categories as $category)
                    <p>{{$category->name}}</p>
                    @endforeach
                </div>

                <div class="mt-12 border-2 p-6 w-11/12 rounded-lg border-orange-100 shadow-2xl">
                    <div class="ml-12 flex flex-row">
                        <h1 class="text-lg font-bold h-auto w-48">{{$task->data_type}}</h1>
                        <p class="text-lg  h-auto w-96">{{$task->start_date}}</p>
                    </div>
                    <!-- <div class="ml-12 flex flex-row mt-4">
                        <h1 class="text-lg font-bold h-auto w-48">Завершить</h1>
                        <p class="text-lg  h-auto w-96">26 декабря 2021, 23:00</p>
                    </div> -->
                    <div class="ml-12 flex flex-row mt-8">
                        <h1 class="text-lg font-bold h-auto w-48">Бюджет</h1>
                        <p class="text-lg  h-auto w-96">до {{$task->budget}}</p>
                    </div>
                    <div class="ml-12 flex flex-row mt-4">
                        <h1 class="text-lg font-bold h-auto w-48">Оплата задания</h1>
                        <!-- <div class="flex flex-row  h-auto w-96">
                            <i class="far fa-credit-card text-green-400 text-2xl mr-3"></i>
                            <p class="text-lg">Банковской картой через</p>
                        </div> -->
                    </div>
                    <div class="ml-12 flex flex-row mt-4">
                        <h1 class="text-lg font-bold h-auto w-48">Место</h1>
                        <p class="text-lg  h-auto w-96">{{$task->address}}</p>
                    </div>
                    <div class="ml-12 flex flex-row mt-8">
                        <h1 class="text-lg font-bold h-auto w-48">Нужно</h1>
                        <p class="text-lg  h-auto w-96">{{$task->description}}</p>
                    </div>
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
                    @foreach($same_tasks as $same_task)
                    <div class="mt-4">
                        <a href="#" class="underline text-gray-800 hover:text-red-500 text-lg">{{$same_task->name}}</a>
                        @foreach($users as $user)
                        @if($user->id == $same_task->user_id)
                        <p class="text-gray-400 text-base">{{$user->name}}, до {{$same_task->budget}}</p>
                        @endif
                        @endforeach
                    </div>
                    @endforeach
                </div>
            </div>
                {{-- left sidebar end --}}

                {{-- right sidebar start --}}
            <div class="lg:col-span-1 col-span-3 lg:mt-0 mt-8">
                <h1 class="text-lg">Заказчик этого задания</h1>
                <div class="flex flex-row mt-4">
                    <div class="mr-4">
                        <img src="{{ asset($current_user->avatar) }}" class="border-2 border-gray-400 w-32 h-32" alt="#">
                    </div>
                    <div class="">
                        <a href="#" class="text-2xl text-blue-500 hover:text-red-500">{{$current_user->name}}</a>
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
@endforeach
@endsection
