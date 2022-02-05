@extends("layouts.app")

@section("content")

    <div class="w-10/12 mx-auto mt-8">
        <div class="w-7/12">
            <div>
                <a class="text-sm text-blue-500 hover:text-red-500" href="/profile"><i class="fas fa-arrow-left"></i> Венруться в профиль</a>
                <h1 class="font-semibold md:text-2xl text-lg ">Создание нового альбома</h1>
            </div>
            <div class="bg-yellow-50 p-8 rounded-md my-6">
                <label class="text-sm text-gray-500 " for="name">Название</label><br>
                <input class="border focus:outline-none mb-6 text-sm border-gray-200 rounded-md w-full px-4 py-2" type="text" placeholder='Например "Ремонт кухни" или "Свадебная фотосессия"'>

                <label class="text-sm text-gray-500" for="textarea">Описание</label><br>
                <textarea required class="border text-sm mb-8 focus:outline-none border-gray-200 rounded-md w-full px-4 py-2" type="textarea" placeholder='Опишите какие работы представлены в этом альбоме, в чем их особенность, когда они были выполнены, в каких целях и т.д.'></textarea>
            </div>
            <div>
{{--                <div  onclick="toggleModal123('modal-id123')"  class="flex flex-col border-dashed border-4 border-gray-400 hover:border-blue-300 text-gray-400 hover:text-blue-300 w-56 h-48 cursor-pointer">--}}
{{--                    <i class="fas fa-plus mx-auto text-7xl mt-14"></i>--}}
{{--                    <span class="mx-auto text-xs mt-2">@lang('lang.profile_newAlbum')</span>--}}
{{--                </div>--}}
                <div class="text-center h-full w-full text-base">
                    <form enctype="multipart/form-data">
                        <input type="submit" class="bg-green-500 hover:bg-green-700 text-white py-2 px-10 w-4/12 mb-4 rounded " value="@lang('lang.profile_save')">
                        <div id="photos"></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    <script>
        $(function(){
            $('.input-images').imageUploader();
        });
        $('.input-images').imageUploader({
            preloaded: preloaded
        });
        $('.input-images').imageUploader({
            extensions: ['.jpg', '.jpeg', '.png', '.svg'],
            mimes: ['image/jpeg', 'image/png', 'image/svg+xml'],
            maxSize: undefined,
            maxFiles: undefined,
        });
        $('.input-images').imageUploader({
            imagesInputName: 'images',
            preloadedInputName: 'preloaded',
            label: ''
        });
    </script>
    <script src="https://releases.transloadit.com/uppy/v2.4.1/uppy.min.js"></script>
    <script src="https://releases.transloadit.com/uppy/v2.4.1/uppy.legacy.min.js" nomodule></script>
    <script src="https://releases.transloadit.com/uppy/locales/v2.0.5/ru_RU.min.js"></script>
    <script>
        var uppy = new Uppy.Core({
            debug: true,
            autoProceed: true,
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
                height: 300,
                metaFields: [
                    {id: 'name', name: 'Name', placeholder: 'file name'},
                    {id: 'caption', name: 'Caption', placeholder: 'describe what the image is about'}
                ],
                browserBackButtonClose: true
            })

            .use(Uppy.ImageEditor, {target: Uppy.Dashboard})
            .use(Uppy.DropTarget, {target: document.body})
            .use(Uppy.GoldenRetriever)
            .use(Uppy.XHRUpload, {
                endpoint: '/profile/storepicture',
                fieldName: 'file',
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
