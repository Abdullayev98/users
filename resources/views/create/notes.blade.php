@extends('layouts.app')

@include('layouts.fornewtask')

@section('content')

<!-- Information section -->
<link href="https://releases.transloadit.com/uppy/v2.1.0/uppy.min.css" rel="stylesheet">
<x-roadmap/>
<form class="" action="{{route('task.create.note.store', $task->id)}}" method="post" enctype="multipart/form-data">
  @csrf
<div class="mx-auto sm:w-9/12 w-11/12 my-8">
<div class="grid md:grid-cols-3 lg:gap-x-20 md:gap-x-14">
  <div class="lg:col-span-2 col-span-3">
    <div class="w-full text-center text-2xl">
    {{__('Ищем исполнителя для задания')}} "{{$task->name}}"
    </div>
    <div class="w-full text-center my-4 text-gray-400">
      {{__('Задание заполнено на 90%')}}
    </div>
    <div class="relative pt-1">
      <div class="overflow-hidden h-1  flex rounded bg-gray-200  mx-auto ">
        <div style="width: 90%" class="shadow-none  flex flex-col text-center whitespace-nowrap text-white justify-center bg-yellow-500"></div>
      </div>
    </div>
    <div class="shadow-xl w-full mx-auto mt-7 rounded-2xl px-6 mb-6 p-6 md:px-20">
      <div class="py-4 mx-auto px-auto text-center text-3xl texl-bold">
        {{__('Уточните детали')}}
      </div>

      <div class="py-4 mx-auto  text-left ">
        <div class="mb-4">
          <div id="formulario" class="flex flex-col gap-y-4">

        <div class="">
            <div class="mb-3 xl:w-full">
                <label for="exampleFormControlTextarea1" class="form-label inline-block mb-2 text-gray-700">
                    {{__('Описание')}}</label>
                <textarea name="description" autofocus="autofocus"
                  class="form-control block resize-none w-full h-36  px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:outline-none focus:border-yellow-500"
                   placeholder="{{__('Например')}}{{$task->category->placeholder}}"></textarea>
              </div>
        </div>

          </div>
          <div class="mt-4 ">
                <div class="w-full text-center flex justify-center items-center gap-2" type="button">
                    <div id="photos" class="w-full"></div>
                </div>
             <div class="my-6">
                <label class="md:w-2/3 block mt-6">
                    <input class="focus:outline-none  mr-2 h-4 w-4" type="checkbox" name="docs">
                    <span class="text-slate- 900">
                        {{__('Предоставить документы')}}
                        <br><p class="text-sm text-slate-500">{{__('Для оформления расписки/доверенности')}}</p>
                    </span>
                  </label>
                  <label class="md:w-2/3 block mt-6">
                    <input class="focus:outline-none  mr-2 h-4 w-4" type="radio" checked name="oplata" value="0">
                    <span class="text-slate- 900">
                        {{__('Оплата через карту')}}
                    </span>
                  </label>
                  <label class="md:w-2/3 block mt-6">
                    <input class="focus:outline-none  mr-2 h-4 w-4" type="radio" name="oplata" value="1">
                    <span class="text-slate- 900">
                        {{__('Оплата наличными')}}
                    </span>
                  </label>
                 @foreach($task->category->customFieldsInNote as $data)
                     @include('create.custom-fields')
                 @endforeach
             </div>
             <div class="flex w-full gap-x-4 mt-4">
             <a onclick="myFunction()" 
             class="bg-white my-4 cursor-pointer hover:border-yellow-500 text-gray-600 hover:text-yellow-500 transition duration-300 font-normal text-base py-3 sm:px-8 px-6 rounded-2xl  border border-2">
                                            <!-- <button type="button"> -->
                                            {{__('Назад')}}
                                            <!-- </button> -->
                                            <script>
                                                function myFunction() {
                                                    window.history.back();
                                                }
                                            </script>
                                        </a>

               <input type="submit"
               style="background: linear-gradient(164.22deg, #FDC4A5 4.2%, #FE6D1D 87.72%);"
               class="bg-yellow-500 hover:bg-yellow-600 m-4 cursor-pointer text-white font-normal text-xl py-3 sm:px-14 px-8 rounded-2xl "
                name="" value="{{__('Далее')}}">
             </div>


          </div>
        </div>
      </div>
    </div>

  </div>
        <x-faq/>

</div>
</div>

</form>
<script src="https://releases.transloadit.com/uppy/v2.4.1/uppy.min.js"></script>
<script src="https://releases.transloadit.com/uppy/v2.4.1/uppy.legacy.min.js" nomodule></script>
<script src="https://releases.transloadit.com/uppy/locales/v2.0.5/ru_RU.min.js"></script>

<script>
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
</script>
@endsection

@section("javasript")

    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>

    <script type="text/javascript">

    ymaps.ready(init);

    function init() {
        var suggestView1 = new ymaps.SuggestView('suggest');



        var myMap = new ymaps.Map('map', {
            center: [55.74, 37.58],
            zoom: 15,
            controls: []
        });
        var searchControl = new ymaps.control.SearchControl({


        });
        myMap.controls.add(searchControl);


        $("#mpshow").click(function(){


        searchControl.search(document.getElementById('suggest').value);




    });

    }








    </script>

<script>
  var x = 1;
  const alp = ["B", "C", "D", "E", "F"];
$("#addbtn").click(function(){
    if(x < 6){
        $("#addinput").append('<div class="flex items-center gap-x-2"><div class="flex items-center rounded-lg border  w-full py-1"> <button class="flex-shrink-0 border-transparent text-teal-500 text-md py-1 px-2 rounded focus:outline-none" type="button">  '+ alp[x-1] +' </button> <input id="suggest'+x+'" class="appearance-none bg-transparent w-full text-gray-700 mr-3 py-1 px-2 leading-tight focus:outline-none" type="text" placeholder="Город, Улица, Дом" aria-label="Full name">  <button id="addinput'+x+'" class="flex-shrink-0 border-transparent border-4 text-teal-500 hover:text-teal-800 text-sm py-1 px-2 rounded" type="button">   <svg class="h-4 w-4 text-purple-500"  width="12" height="12" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">  <path stroke="none" d="M0 0h24v24H0z"/>  <path d="M21 3L14.5 21a.55 .55 0 0 1 -1 0L10 14L3 10.5a.55 .55 0 0 1 0 -1L21 3" /></svg>  </button> </div><button id="remove_textareas" class="bg-white hover:bg-gray-100 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded shadow">  <svg xmlns="http://www.w3.org/2000/svg" width="18" height="20" fill="none"><path fill-rule="evenodd" clip-rule="evenodd" d="M3.25 2.95v-.2A2.75 2.75 0 0 1 6 0h6a2.75 2.75 0 0 1 2.75 2.75v.2h2.45a.8.8 0 0 1 0 1.6H.8a.8.8 0 1 1 0-1.6h2.45zm10 .05v-.25c0-.69-.56-1.25-1.25-1.25H6c-.69 0-1.25.56-1.25 1.25V3h8.5z" fill="#666"/><path d="M14.704 6.72a.8.8 0 1 1 1.592.16l-.996 9.915a2.799 2.799 0 0 1-2.8 2.802h-7c-1.55 0-2.8-1.252-2.796-2.723l-1-9.994a.8.8 0 1 1 1.592-.16L4.3 16.794c0 .668.534 1.203 1.2 1.203h7c.665 0 1.2-.536 1.204-1.282l1-9.995z" fill="#666"/><path d="M12.344 7.178a.75.75 0 1 0-1.494-.13l-.784 8.965a.75.75 0 0 0 1.494.13l.784-8.965zm-6.779 0a.75.75 0 0 1 1.495-.13l.784 8.965a.75.75 0 0 1-1.494.13l-.785-8.965z" fill="#666"/></svg> </button></div> ');
        {{__('Город,Улица,Дом')}},
        x++;

    }else{
        alert("max ten field allowed");
    }
});
$("#addinput").on("click" ,"#remove_inputs" , function(){
    $(this).parent("div").remove();
        x--;
});
console.log(x);
</script>


@endsection
