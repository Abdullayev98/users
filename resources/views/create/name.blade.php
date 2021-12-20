@extends("layouts.app")





@section("content")




    <!-- Information section -->
    <!-- <form class="" action="" method="post"> -->

    {{--    Created Road map for Create a New Tast--}}
    <x-roadmap/>
    <div class="mx-auto w-2/3 my-16">
        <div class="grid grid-cols-3 h-full">
            <div class="col-span-2">
                <div class="w-full text-center text-2xl">
                    Поможем найти исполнителя для вашего задания
                </div>
                <div class="w-full text-center my-4 text-[#5f5869]">
                    Задание заполнено на 14%
                </div>
                <div class="pt-1">
                    <div class="overflow-hidden h-2 text-xs flex rounded bg-gray-200 mx-auto ">
                        <div style="width: 14%"
                                 class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-[#6fc727]"></div>
                    </div>
                </div>
                <div class="shadow-2xl w-full p-16 mx-auto my-4 rounded-2xl	w-full">
                    <div class="py-4 w-1/2 mx-auto px-auto text-center text-3xl texl-bold">
                        Чем вам помочь?
                    </div>
                    <form action="{{route('task.create.name')}}" method="post">
                        @csrf
                        <div class="py-4 w-11/12 mx-auto px-auto text-left my-4">
                            <div class="mb-4">
                                <label class="block text-[#5f5869] text-sm mb-2" for="username">
                                    Название задания
                                </label>
                                <input
                                    class="shadow appearance-none border focus:shadow-orange-500 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none "
                                    id="username" type="text" placeholder="Например, нужен курьер на несколько доставок" required name="name">
                            </div>
                        </div>
                        <input type="submit"
                               class="bg-[#6fc727] hover:bg-[#5ab82e] w-11/12 ml-5 my-4 cursor-pointer text-white font-bold py-5 px-5 rounded"
                               name="" value="Далее">
                    </form>
                </div>
            </div>

            <x-faq>
            {{--            Created Component for Frequently Asked Questions--}}
            </x-faq>
        </div>
    </div>
    <!-- </form> -->






@endsection


@section("javasript")

    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>


    <script>


        $(".delete-task").click(function (){
            Swal.fire({
                title: 'Введённые данные будут потеряны. <br> Удалить задание?',
                showDenyButton: true,
                confirmButtonText: 'Продожить',
                denyButtonText: `Удалить`,
                cancelButtonText: `Отмена`,
            }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                    Swal.close()
                } else if (result.isDenied) {
                }
            })
        })

    </script>

@endsection
