<div class="container mx-auto md:w-2/3 w-11/12">
    <div class="w-full my-16">
        <h1 class="text-4xl">@lang('lang.body_whatOthersDoing')</h1>
    </div>
    <div class="grid md:grid-cols-3 grid-cols-2 mx-auto mb-56">
        <div id="scrollbar" class="col-span-2 md:w-10/12 w-full h-screen blog1 mt-8">
            <div class="w-full overflow-y-scroll h-screen">
                @foreach($tasks as $task)
                    <div class="w-full border-b-2 h-28 hover:bg-blue-100 overflow-hidden">
                        <div class="icon pt-4">
                            <i class="{{$task->category->ico}} text-3xl ml-4 float-left text-blue-400"></i>
                        </div>
                        <div class="mx-auto w-2/3">
                            <a href="/detailed-tasks/{{$task->id}}" class="xl:text-2xl md:text-xl text-2xl text-blue-400 hover:text-red-400">
                                {{$task->name}}
                            </a>
                            <p class="text-xl mt-2 overflow-hidden whitespace-nowrap text-ellipsis">
                                {{$task->description}}
                            </p>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="mt-8 flex justify-center">
                <a href="{{route('task.search')}}" type="button"
                   class="text-center p-4 bg-blue-500 border-blue-500 text-white text-base  rounded-lg">
                    @lang('lang.body_showAllTasks')
                </a>

            </div>
        </div>
        <div class="w-full md:col-span-1 h-full col-span-2">
            <a href="{{route('verification')}}">
                <div
                    class="md:w-full w-full h-1/3 md:my-8 mt-32 mb-8 bg-center bg-cover" style="background: url('https://www.roi-selling.com/hs-fs/hub/444749/file-1929610769-jpg/blog-files/team-.jpg');">
                    <div class="w-full h-full bg-black bg-opacity-40 text-center">
                        <i class="fas fa-user text-green-300 text-5xl pt-8"></i>
                        <p class="lg:text-4xl xl:text-4xl md:text-2xl text-4xl font-medium text-white">@lang('lang.body_howToJoin')</p>
                    </div>
                </div>
            </a>
            <a href="{{route('security')}}">
                <div
                    class="md:w-full w-full h-1/3 my-8 bg-center bg-cover" style="background: url('https://3blaws.s3.amazonaws.com/images/bigstock-Green-energy-biofuel-electric-74257315.jpg');">
                    <div class="w-full h-full bg-black bg-opacity-40 text-center">
                        <i class="fas fa-shield-alt text-blue-400 text-5xl pt-8"></i>
                        <p class="lg:text-4xl xl:text-4xl md:text-2xl text-4xl text-white">@lang('lang.body_security')</p>
                    </div>
                </div>
            </a>
            <a href="{{route('performers')}}">
                <div
                    class="md:w-full w-full h-1/3 my-8 bg-center bg-cover" style="background: url('https://wallpapercave.com/wp/wp4002616.jpg');">
                    <div class="w-full h-full bg-black bg-opacity-40 text-center">
                        <p class="lg:text-4xl xl:text-4xl md:text-2xl text-4xl pt-12 text-yellow-500">@lang('lang.body_perForBusines')</p>
                    </div>
                </div>
            </a>
        </div>
    </div>
</div>
