<div class="w-4/5 mx-auto my-16">
    <div class="w-full">
        <h1 class="text-2xl font-bold">{{__('Что заказывают на «Универсал Сервис» прямо сейчас')}}</h1>
    </div>
    <div class="grid md:grid-cols-3 grid-cols-2 mx-auto mb-56">
        <div id="scrollbar" class="col-span-2 md:w-10/12 w-full h-screen blog1 mt-8">
            <div class="w-full overflow-y-scroll h-screen border rounded-lg px-4 scrollbar" id="style-3">
                @foreach($tasks as $task)
                    <div class="w-full border rounded-lg my-2 h-28 overflow-hidden force-overflow">
                        <div class="icon pt-4">
                            <i class="{{$task->category->ico}} text-3xl ml-4 float-left"></i>
                        </div>
                        <div class="mx-auto w-2/3">
                            <a href="/detailed-tasks/{{$task->id}}" class="xl:text-2xl md:text-xl text-xl">
                                {{$task->name}}
                            </a>
                            <p class="text-base mt-2 overflow-hidden whitespace-nowrap text-ellipsis text-gray-400">
                                {{$task->description}}
                            </p>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="mt-8 flex justify-center">
                <a href="{{route('task.search')}}" type="button"
                   class="text-center p-4 bg-blue-500 border-blue-500 text-white text-base  rounded-lg">
                    {{__('Показать ещё задания')}}
                </a>

            </div>
        </div>
        <div class="w-full md:col-span-1  col-span-2 mt-10">
            <a href="{{route('verification')}}">
                <div class="w-96 h-48 rounded-xl" style="background: url({{asset('images/kak1.png')}});">
                    <div class="w-full text-center">
                        <p class="text-2xl font-bold text-yellow-400 pt-16">
                           Как стать <br/> исполнителем</p>
                    </div>
                </div>
            </a>
            <a href="{{route('security')}}">
                <div class="w-96 h-48 rounded-xl my-8" style="background: url({{asset('images/security.png')}});">
                    <div class="w-full text-center">
                        <p class="text-2xl font-bold text-yellow-400 pt-12">
                           Безопасность и <br/> гарантии</p>
                    </div>
                </div>
            </a>
            <a href="{{route('performers')}}">
                <div class="w-96 h-48 rounded-xl" style="background: url({{asset('images/perform.png')}});">
                    <div class="w-full text-center">
                        <p class="text-2xl font-bold text-yellow-400 pt-12">
                           Надежные <br/> исполнители <br/> бизнеса</p>
                    </div>
                </div>
            </a>
        </div>
    </div>
</div>
