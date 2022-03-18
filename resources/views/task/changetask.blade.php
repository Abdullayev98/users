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
    <script>
        let userAddress;
        var myMap;
        var multiRoute;
        var place, place1="", place2="", place3="", place4="", place5="", place6="", place7="", place8="", place9="";
    </script>
    <form action="{{ route('task.update', $task->id) }}" method="post">
        @csrf
        @method('put')

        <div class="xl:w-8/12 lg:10/12  mx-auto lg:flex mt-4 md:mt-8">
            <div class="lg:w-8/12 w-11/12 mx-auto bg-yellow-50 py-6 px-12 rounded-md ">
                <h1 class="text-3xl font-semibold">{{__('Заполните заявку')}}</h1>
                <div>
                    <label class="text-sm">
                        {{__('Мне нужно')}}
                        <input type="text" name="name"
                               class="border border-gray-200 rounded-md shadow-sm focus:outline-none  focus:border-yellow-500 p-2 mb-4 w-full"
                               value="{{ $task->name }}">
                        @error('name')
                        <p class="text-red-500">{{ $message }}</p>
                        @enderror
                    </label>
                </div>

                @foreach($task->category->custom_fields as $data)
                    @include('create.custom-fields')
                @endforeach


                <div class="md:flex mt-5">
                    <select onchange="func_for_select(Number(this.options[this.selectedIndex].value));"
                            class="mr-4 form-select block w-full  px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding bg-no-repeat border border-solid border-gray-300 rounded transition ease-in-out focus:text-gray-700 focus:bg-white focus:border-yellow-500 focus:outline-none"
                            aria-label="Default select example">
                        <option disabled>{{__('Выберите один из пунктов')}}</option>
                        <option>{{ $task->category->name }}</option>
                    </select>

                    <select name="category_id"
                            onchange="func_for_select(Number(this.options[this.selectedIndex].value));"
                            class="form-select block w-full  px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding bg-no-repeat border border-solid border-gray-300 rounded transition ease-in-out focus:text-gray-700 focus:bg-white focus:border-yellow-500 focus:outline-none md:mt-0 mt-3"
                            aria-label="Default select example">
                        <option disabled>{{__('Выберите один из пунктов')}}</option>
                        @foreach($task->category->parent->childs as $category)
                            <option
                                value="{{ $category->id }}" {{ $category->id == $task->category_id ? 'selected' : null }} >{{ $category->name }}</option>
                        @endforeach
                    </select>
                    {{--                    @error('category_id')--}}
                    {{--                    <p class="text-red-500">{{ $message }}</p>--}}
                    {{--                    @enderror--}}
                </div>
                <div>
                    <label class="text-xs text-gray-500">
                        {{__(' Опишите пожелания и детали, чтобы исполнители лучше оценили вашеу задачу')}}
                        <textarea type="number"
                                  name="description"
                                  class="border border-gray-200 rounded-md shadow-sm focus:outline-none  focus:border-yellow-500 p-2 mb-4 w-full">{{ $task->description }}</textarea>
                        @error('description')
                        <p class="text-red-500">{{ $message }}</p>
                        @enderror
                    </label>
                </div>
                <div>
                    <label class="text-sm text-gray-500">
                        <input type="checkbox"> {{__('Забрать у получителя оплату за товар и вернуть заказчику?')}}
                    </label>
                </div>
                <div class="my-4">
                    <label class="text-sm text-gray-500 flex flex-col">
                        {{__('Дата и время')}} <br>
                        <div class="w-full">
                            <select name="date_type" id="periud"
                                    class="bg-gray-50 focus:outline-none border border-gray-300 text-gray-900 text-sm rounded-lg focus:border-yellow-500 w-full p-2.5 my-2"
                                    aria-label="Default select example">
                                <option value="1" {{ $task->date_type == 1 ? 'selected' : null }} id="1">
                                    {{__('Начать работу')}}
                                </option>
                                <option value="2" {{ $task->date_type == 2 ? 'selected' : null }}   id="2">
                                    {{__('Закончить работу')}}
                                </option>
                                <option value="3" {{ $task->date_type == 3 ? 'selected' : null }}  id="3">
                                    {{__(' Указать период')}}
                                </option>
                            </select>
                        </div>
                        <div class="grid-cols-2 gap-4">
                            @if($task->start_date)
                                <div class="col-span-1">
                                    <div class="flatpickr inline-block flex items-center sm:mb-0 mb-4 hidden" id="start-date">
                                        <div class="flex ">
                                            <input type="hidden" name="start_date" placeholder="Какой месяц.." data-input=""
                                                class="focus:outline-none w-full text-left bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm text-xs rounded-lg focus:ring-blue-500 focus:border-blue-500 block pl-3 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 flatpickr-input"
                                                required="" value="{{ $task->start_date }}">
                                        </div>
                                        <div class="flatpickr-calendar w-full sm:text-sm"></div>
                                        <div class="transform hover:scale-125 relative right-8">
                                            <a class="input-button w-1 h-1" title="toggle" data-toggle="">
                                                <i class="far fa-calendar-alt fa-2x fill-current text-green-600"></i>
                                            </a>
                                        </div>
                                        <div class="transform hover:scale-125 mr-4">
                                            <a class="input-button w-1 h-1" title="clear" data-clear="">
                                                <i class="fas fa-trash-alt fa-2x stroke-current text-red-600"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endif

                            @if($task->end_date)
                                <div class="col-span-1 mt-1">
                                    <div class="flatpickr inline-block flex items-center hidden" id="end-date">
                                        <div class="flex">
                                            <input type="hidden" name="end_date" placeholder="Какой месяц.." data-input=""
                                                class="focus:outline-none w-full text-left bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm text-xs rounded-lg focus:ring-blue-500 focus:border-blue-500 block pl-3 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 flatpickr-input"
                                                required="" value="{{ $task->end_date }}">
                                        </div>
                                        <div class="flatpickr-calendar w-full sm:text-sm"></div>
                                        <div class="transform hover:scale-125 relative right-8">
                                            <a class="input-button w-1 h-1" title="toggle" data-toggle="">
                                                <i class="far fa-calendar-alt fa-2x fill-current text-green-600"></i>
                                            </a>
                                        </div>
                                        <div class="transform hover:scale-125">
                                            <a class="input-button w-1 h-1" title="clear" data-clear="">
                                                <i class="fas fa-trash-alt fa-2x stroke-current text-red-600 "></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </label>
                </div>
                <div>
                    <div class="mb-4">
                        <div id="formulario" class="flex flex-col gap-y-4 text-base">

                            <div class="flex items-center bg-white hover:bg-gray-100 rounded-lg border py-1 mb-2">
                                <button
                                    class="flex-shrink-0 border-transparent text-teal-500 text-md py-1 px-2 rounded focus:outline-none"
                                    type="button">
                                    A
                                </button>
                                <ymaps
                                    style="z-index: 40000; display: block; position: absolute; width: 521px; top: 483.5px; left: 285.35px;">
                                </ymaps>

                                <input autocomplete="off" oninput="myMapFunction()" id="suggest0"
                                       class="appearance-none bg-transparent w-full text-gray-700 mr-3 py-1 px-2 leading-tight focus:outline-none focus:border-yellow-500"
                                       type="text" placeholder="Город, Улица, Дом" name="location0"
                                       value="{{ json_decode($task->address)->location }}">


                                @error('location0')

                                <p class="text-red-500">{{ $message }}</p>
                                @enderror
                                <button id="getlocal"
                                        class="flex-shrink-0 border-transparent border-4 text-teal-500 hover:text-teal-800 text-sm py-1 px-2 rounded"
                                        type="button">
                                    <svg class="h-4 w-4 text-purple-500" width="12" height="12" viewBox="0 0 24 24"
                                         stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                                         stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z"></path>
                                        <path
                                            d="M21 3L14.5 21a.55 .55 0 0 1 -1 0L10 14L3 10.5a.55 .55 0 0 1 0 -1L21 3"></path>
                                    </svg>
                                </button>
                            </div>

                            <input name="coordinates0" type="hidden" id="coordinate"
                                   value="{{json_decode($task->address)->latitude.",". json_decode($task->address)->longitude }}">

                        </div>
                        <div>

                            <div class="mb-4">
                                <div id="formulario" class="flex flex-col gap-y-4">

                                    <div id="addinput" class="flex gap-y-2 flex-col hover:bg-gray-100 ">

                                    </div>

                                </div>
                                <div class="mt-4">
                                    <button id="addbtn" type="button"
                                            class="w-full bg-white hover:bg-gray-100 border-dashed border border-black rounded-lg py-2 text-center flex justify-center items-center gap-2"
                                            name="button">
                                        <svg class="h-4 w-4 text-gray-500 " fill="none" viewBox="0 0 24 24"
                                             stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                  d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                  d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                        </svg>
                                        <span class="text-base">{{__('Добавить ещё адрес')}}</span>
                                    </button>
                                    <div id="map" class="h-60 mt-4 rounded-lg w-full"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <label class="text-base">
                            <input type="checkbox">
                            {{__('Отдаю предпочтение застрахованным исполнительям ?')}}
                        </label>
                    </div>
                    <div>
                        <div class="ml-4 md:ml-12 flex flex-wrap mt-8">
                            <h1 class="font-bold mb-2">{{__('Рисунок')}}</h1>
                            @foreach(json_decode($task->photos)??[] as $key => $image)
                                {{--                                            @if ($loop->first)--}}
                                @if($loop->first)
                                    <div class="relative boxItem">
                                        <a class="boxItem relative" href="{{ asset('storage/'.$image) }}"
                                           data-fancybox="img1"
                                           data-caption="<span>{{ $task->created_at }}</span>">
                                            <div class="mediateka_photo_content">
                                                <img src="{{ asset('storage/'.$image) }}" alt="">
                                            </div>
                                        </a>
                                    </div>
                                @endif
                                {{--                                            @endif--}}
                            @endforeach
                            @if($task->photos)
                                <div class="relative boxItem">
                                    @csrf
                                    <a href="{{ route('task.images.delete', $task->id) }}" type="submit">
                                        <div class="mediateka_photo_content text-center">
                                            <i class="fas fa-trash text-black-50" style="font-size: 72px"></i>
                                        </div>
                                    </a>
                                </div>
                            @endif
                        </div>
                        <div id="photos" class="w-full"></div>

                    </div>

                </div>
                <div class="text-base my-6 bg-white rounded-md shadow-md p-4">
                    <h1 class="text-xl font-semibold py-4">{{__('На какой бюджет вы рассчитываете?')}}</h1>
                    <div>
                        <select
                            class="border border-gray-300 rounded-md w-full focus:outline-none focus:border-yellow-500 py-2 px-4"
                            name="budget" id="budget">
                            <option value="{{$task->category->max/5}}">
                                {{$task->category->max/5}} UZS
                            </option>
                            <option value="{{$task->category->max/5*2}}">
                                {{$task->category->max/5*2}} UZS
                            </option>
                            <option value="{{$task->category->max/5*3}}">
                                {{$task->category->max/5*3}} UZS
                            </option>
                            <option value="{{$task->category->max/5*4}}">
                                {{$task->category->max/5*4}} UZS
                            </option>
                            <option value="{{$task->category->max}}">
                                {{$task->category->max/5}} UZS
                            </option>
                        </select>
                    </div>
                    <div class="my-4 text-base">
                        @error('budget')
                        <p class="text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="text-base my-4 ">
                    <h1 class="text-xl font-semibold py-2">{{__('Ваши контакты')}}</h1>
                    <input id="phone_number"
                           class="text-base border border-gray-200 md:w-1/2 focus:outline-none focus:border-yellow-500 py-2 px-3 rounded-md"
                           type="text" value="+998{{ $task->phone }}"
                           placeholder="+998(00)000-00-00">
                    <input type="hidden" id="phone" name="phone" value="{{ $task->phone }}">
                    @error('phone')
                    <p class="text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <div class="text-base my-5 mt-8">
                    <button type="submit"
                            class="text-2xl mr-5 bg-green-500 hover:bg-green-700 text-white px-4 py-2 rounded-md ">
                        {{__('Сохранить')}}
                    </button>
                    <a
                        class="text-xl text-blue-500 hover:text-red-500 border-b border-dotted border-blue-500 hover:border-red-500">{{__('Отмена')}}</a>
                </div>
            </div>
            <div class="lg:w-4/12 w-full md:block hidden lg:m-0 m-10">
                @include('components.faq')
            </div>
        </div>

    </form>


    <script src='https://unpkg.com/imask'></script>
    <script id="map_api"
            src="https://api-maps.yandex.ru/2.1/?apikey=f4b34baa-cbd1-432b-865b-9562afa3fcdb&lang={{__('ru_RU')}}"
            type="text/javascript">
    </script>
    <script src="https://releases.transloadit.com/uppy/v2.4.1/uppy.min.js"></script>
    <script src="https://releases.transloadit.com/uppy/v2.4.1/uppy.legacy.min.js" nomodule></script>
    <script src="https://releases.transloadit.com/uppy/locales/v2.0.5/ru_RU.min.js"></script>

    <script src="{{ asset('js/changetask.js') }}"></script>

    <script>
        function ch_task(){
            @php $host = request()->getHost();@endphp
            var settings = {
                "url": "http://{{$host}}/api/task/{{$task->id}}",
                "method": "GET",
                "timeout": 0,
            };
            $.ajax(settings).done(function (response) {
                ajax_location = $.parseJSON(response.address_add);
                // console.log(ajax_location);
                if (ajax_location.length != 0){
                    for (let i=0; i<=ajax_location.length; i++){
                    $("#addinput").append('<div class="flex items-center gap-x-2">' +
                        '<div class="flex items-center rounded-lg border  w-full py-1"> ' +
                        '<button class="Alfavit flex-shrink-0 border-transparent text-teal-500 text-md py-1 px-2 rounded focus:outline-none" type="button">  '+ alp[i] +' </button>' +
                        ' <input oninput="myMapFunction()" id="suggest'+(x)+'" class="appearance-none bg-transparent w-full text-gray-700 mr-3 py-1 px-2 leading-tight focus:outline-none"' +
                        ' type="search" name="location'+ x +'" placeholder="Город, Улица, Дом" aria-label="Full name" value="'+ajax_location[i].location+'"> ' +
                        '<button id="'+ x +'" onclick="getLocals(this.id)" class="flex-shrink-0 border-transparent border-4 text-teal-500 hover:text-teal-800 text-sm py-1 px-2 rounded" type="button">'+
                        '<svg className="h-4 w-4 text-purple-500" width="18" height="18" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">'+
                        '<path stroke="none" d="M0 0h24v24H0z"/><path d="M21 3L14.5 21a.55 .55 0 0 1 -1 0L10 14L3 10.5a.55 .55 0 0 1 0 -1L21 3"/></svg></button>'+
                        '</div><button id="remove_inputs" class="bg-white hover:bg-gray-100 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded shadow"> ' +
                        '<svg xmlns="http://www.w3.org/2000/svg" width="18" height="20" fill="none"><path fill-rule="evenodd" clip-rule="evenodd" d="M3.25 2.95v-.2A2.75 2.75 0 0 1 6 0h6a2.75 2.75 0 0 1 2.75 2.75v.2h2.45a.8.8 0 0 1 0 1.6H.8a.8.8 0 1 1 0-1.6h2.45zm10 .05v-.25c0-.69-.56-1.25-1.25-1.25H6c-.69 0-1.25.56-1.25 1.25V3h8.5z" fill="#666"/>' +
                        '<path d="M14.704 6.72a.8.8 0 1 1 1.592.16l-.996 9.915a2.799 2.799 0 0 1-2.8 2.802h-7c-1.55 0-2.8-1.252-2.796-2.723l-1-9.994a.8.8 0 1 1 1.592-.16L4.3 16.794c0 .668.534 1.203 1.2 1.203h7c.665 0 1.2-.536 1.204-1.282l1-9.995z" fill="#666"/>' +
                        '<path d="M12.344 7.178a.75.75 0 1 0-1.494-.13l-.784 8.965a.75.75 0 0 0 1.494.13l.784-8.965zm-6.779 0a.75.75 0 0 1 1.495-.13l.784 8.965a.75.75 0 0 1-1.494.13l-.785-8.965z" fill="#666"/></svg> </button> ' +
                        '<input name="coordinates'+ x +'" type="hidden" id="coordinate'+ x +'"> </div>    ');
                    x++;
                    }
                }
            });
        }
        ch_task();
    </script>

    <script>

        var element = document.getElementById('phone_number');
        var maskOptions = {
            mask: '+998(00)000-00-00',
            lazy: false
        }
        var mask = new IMask(element, maskOptions);

        $("#phone_number").keyup(function () {
            var text = $(this).val()
            text = text.replace(/[^0-9.]/g, "")
            text = text.slice(3)
            $("#phone").val(text)
        })
        var uppy = new Uppy.Core({
            debug: true,
            restrictions: {
                minFileSize: null,
                maxFileSize: 10000000,
                maxTotalFileSize: null,
                maxNumberOfFiles: 10,
                minNumberOfFiles: 0,
                allowedFileTypes: null,
                requiredMetaFields: [],
            },
            meta: {},
            onBeforeFileAdded: (currentFile, files) => currentFile,
            onBeforeUpload: (files) => {
            },
            locale: {},
            store: new Uppy.DefaultStore(),
            logger: Uppy.justErrorsLogger,
            infoTimeout: 5000,
        })
            .use(Uppy.Dashboard, {
                trigger: '.UppyModalOpenerBtn',
                inline: true,
                target: '#photos',
                showProgressDetails: true,
                note: 'Все типы файлов, до 10 МБ',
                width: 'auto',
                height: '400px',
                metaFields: [
                    {id: 'name', name: 'Name', placeholder: 'file name'},
                    {id: 'caption', name: 'Caption', placeholder: 'describe what the image is about'}
                ],
                browserBackButtonClose: true
            })
            .use(Uppy.XHRUpload, {
                endpoint: '{{route('task.create.images.store', $task->id)}}',
                formData: true,
                fieldName: 'images',
                headers: file => ({
                    'X-CSRF-TOKEN': '{{csrf_token()}}'
                }),
            });

        uppy.on('upload-success', (file, response) => {
            const httpStatus = response.status // HTTP status code
            const httpBody = response.body   // extracted response data

            // do something with file and response
        });


        uppy.on('file-added', (file) => {
            uppy.setFileMeta(file.id, {
                size: file.size,

            })
            console.log(file.name);
        });
        uppy.on('complete', result => {
            console.log('successful files:', result.successful)
            console.log('failed files:', result.failed)
        });

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

                locale: "{{__('ru')}}",
            },
        )
        $('#periud').change(function () {
            switch ($(this).val()) {
                case "1":
                    $('#start-date').removeClass('hidden')
                    $('#end-date').addClass('hidden')
                    break;
                case "2":
                    $('#start-date').addClass('hidden')
                    $('#end-date').removeClass('hidden')
                    break;
                case "3":
                    $('#start-date').removeClass('hidden')
                    $('#end-date').removeClass('hidden')
                    break;
            }
        })

        @if(!$errors->has('end_date'))
        $('#start-date').removeClass('hidden')
        @endif
    </script>
      <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
      <script src="https://npmcdn.com/flatpickr/dist/l10n/ru.js"></script>
      <script src="https://npmcdn.com/flatpickr/dist/l10n/uz_latn.js"></script>
    <script src="https://cdn.jsdelivr.net/picturefill/2.3.1/picturefill.min.js"></script>
    <script
        src="https://cdn.rawgit.com/sachinchoolur/lightgallery.js/master/dist/js/lightgallery.js"></script>
    <script src="https://cdn.rawgit.com/sachinchoolur/lg-pager.js/master/dist/lg-pager.js"></script>
    <script src="https://cdn.rawgit.com/sachinchoolur/lg-autoplay.js/master/dist/lg-autoplay.js"></script>
    <script
        src="https://cdn.rawgit.com/sachinchoolur/lg-fullscreen.js/master/dist/lg-fullscreen.js"></script>
    <script src="https://cdn.rawgit.com/sachinchoolur/lg-zoom.js/master/dist/lg-zoom.js"></script>
    <script src="https://cdn.rawgit.com/sachinchoolur/lg-hash.js/master/dist/lg-hash.js"></script>
    <script src="https://cdn.rawgit.com/sachinchoolur/lg-share.js/master/dist/lg-share.js"></script>
    <script type="text/javascript" src="{{ asset('js/lg-thumbnail.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/lg-rotate.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/lg-video.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/fancybox.min.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('css/mediateka.css') }}">
    <link rel="stylesheet" href="{{ asset('css/fancybox.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/lightgallery.css') }}">

    <div style="display: none;">

        @foreach(json_decode($task->photos)??[] as $key => $image)
            @if ($loop->first)

                @continue

            @else
                <a style="display: none;" class="boxItem" href="{{ asset('storage/'.$image) }}"
                   data-fancybox="img1"
                   data-caption="<span>{{ $task->created_at }}</span>">
                    <div class="mediateka_photo_content">
                        <img src="{{ asset('storage/'.$image)  }}" alt="">
                    </div>
                </a>
            @endif
        @endforeach
    </div>

@endsection


