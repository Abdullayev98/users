@extends("layouts.app")

@section("content")
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link rel="stylesheet" type="text/css" href="https://npmcdn.com/flatpickr/dist/themes/material_blue.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
          integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <script src="https://npmcdn.com/flatpickr/dist/l10n/ru.js"></script>
    <script src="https://npmcdn.com/flatpickr/dist/l10n/uz_latn.js"></script>
    {{--    <style>.flatpickr-calendar{width:230px;} </style>--}}
    <style>.flatpickr-calendar{max-width: 295px; width: 100%;} </style>
    <div class="w-8/12 mx-auto flex mt-8">
        <div class="w-8/12 bg-yellow-50 py-6 px-12 rounded-md ">
            <h1 class="text-3xl font-semibold">Заполните заявку</h1>
            <div>
                <label class="text-sm">
                    Мне нужно
                    <input type="text" class="border border-gray-200 rounded-md shadow-sm focus:outline-none p-2 mb-4 w-full">
                </label>
            </div>
            <div class="flex">
                <select onchange="func_for_select(Number(this.options[this.selectedIndex].value));" class="mr-4 form-select block w-full  px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding bg-no-repeat border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" aria-label="Default select example"">
                    <option  disabled>@lang('lang.name_chooseOne')</option>
                    @foreach($categories as $category)
                        <option>{{ $category->name }}</option>
                    @endforeach
                </select>
                <select onchange="func_for_select(Number(this.options[this.selectedIndex].value));" class="form-select block w-full  px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding bg-no-repeat border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" aria-label="Default select example"">
                    <option  disabled>@lang('lang.name_chooseOne')</option>
                    @foreach($categories2 as $category)
                        <option>{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="my-2">
                <label class="text-xs text-gray-500">
                    Ценность покупки, SUM
                    <input type="number" class="border border-gray-200 rounded-md shadow-sm focus:outline-none p-2 mb-4 w-full">
                </label>
            </div>
            <div>
                <label class="text-xs text-gray-500">
                    Опишите пожелания и детали, чтобы исполнители лучше оценили вашеу задачу
                    <textarea type="number" class="border border-gray-200 rounded-md shadow-sm focus:outline-none p-2 mb-4 w-full"></textarea>
                </label>
            </div>
            <div>
                <label class="text-sm text-gray-500">
                    <input type="checkbox"> Забрать у получителя оплату за товар и вернуть заказчику?
                </label>
            </div>
            <div class="my-4">
                <label class="text-sm text-gray-500">
                    Дата и время <br>
                    <div id="start-date" class=" hidden " style="display: inline-block;">
                        <div class="flatpickr inline-block flex">
                            <div class="flex ">
                                <input type="hidden" name="start_date" placeholder="Какой месяц.." data-input="" class="w-full max-w-[295px] text-left bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm text-xs rounded-lg focus:ring-blue-500 focus:border-blue-500 block pl-3 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 flatpickr-input" required="" value="2022-02-17 12:00:0">
                            </div>
                            <div class="flatpickr-calendar max-w-[295px] w-full sm:text-sm text-[10px]"></div>
                            <div class="transform hover:scale-125">
                                <a class="input-button w-1 h-1  pl-1 " title="toggle" data-toggle="">
                                    <i class="far fa-calendar-alt fa-2x mt-1 fill-current text-green-600"></i>
                                </a>
                            </div>
                            <div class="transform hover:scale-125">
                                <a class="input-button w-1 h-1 md:pl-2 pl-1 " title="clear" data-clear="">
                                    <i class="fas fa-trash-alt fa-2x mt-1 stroke-current text-red-600 "></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </label>
            </div>
            <div>

            </div>
        </div>
        <div class="w-4/12">
            @include('components.faq')
        </div>
    </div>

    <script>

        flatpickr.localize(flatpickr.l10ns.uz_latn);
        flatpickr.localize(flatpickr.l10ns.ru);
        flatpickr(".flatpickr",
            {
                wrap: true,
                enableTime: true,
                allowInput: true,
                altInput: true,
                minDate: "today",
                dateFormat: "Y-m-d H:i:s",
                altFormat: "Y-m-d H:i:s",

                locale: "@lang('lang.dateLang')",
            },
        )
        $('#periud').change(function () {
            switch ($(this).val()) {
                case "1":
                    $('#start-date').css('display', 'inline-block');
                    $('#end-date').css('display', 'none');
                    break;
                case "2":
                    $('#start-date').css('display', 'none');
                    $('#end-date').css('display', 'inline-block');
                    break;
                case "3":
                    $('#start-date').css('display', 'inline-block');
                    $('#end-date').css('display', 'inline-block');
                    break;
            }
        })

        @if(!$errors->has('end_date'))
        $('#start-date').css('display', 'inline-block');
        @endif

    </script>

    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="https://npmcdn.com/flatpickr/dist/l10n/ru.js"></script>
    <script src="https://npmcdn.com/flatpickr/dist/l10n/uz_latn.js"></script>
@endsection
