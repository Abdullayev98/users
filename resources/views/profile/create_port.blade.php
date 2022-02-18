@extends("layouts.app")

@section("content")


    <div class="w-10/12 mx-auto mt-8">
        <form action="{{ route('portfolio.create') }}" method="post">
            @csrf
            <div class="w-full">
                <div>
                    <a class="text-sm text-blue-500 hover:text-red-500" href="/profile"><i
                            class="fas fa-arrow-left"></i> @lang('lang.profile_text1')</a>
                    <h1 class="font-semibold md:text-2xl text-lg ">@lang('lang.profile_text2')</h1>
                </div>
                <div id="comdes" class="bg-yellow-100 p-8 rounded-md my-6">
                    <label class="text-sm" for="name">@lang('lang.profile_text3')</label><br>
                    <input name="comment"
                           class="border break-all focus:outline-none focus:border-yellow-500 mb-6 text-sm border-gray-200 rounded-md w-full px-4 py-2"
                           type="text" placeholder='@lang('lang.profile_text5')'>
                    @error('comment')
                    <p>{{ $message }}</p>
                    @enderror

                    <label class="text-sm" for="textarea">@lang('lang.profile_text4')</label><br>
                    <textarea name="description" placeholder='@lang('lang.profile_text6')' required
                              class="border break-all text-sm mb-8 focus:outline-none focus:border-yellow-500 border-gray-200 rounded-md w-full px-4 py-2"
                              cols="30" rows="10"></textarea>
                    <div class="text-center mx-auto text-base">
                        <input id="button1" type="button"
                               class="bg-green-500 hover:bg-green-700 text-white py-2 px-10 mb-4 rounded"
                               value="@lang('lang.profile_text7')">
                        @error('comment')
                        <p>{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div>
                    <div id="comdes1" class="text-center h-full w-full text-base hidden">
                        @csrf
                        <div id="photos" class="bg-yellow-50 p-8 rounded-md my-6"></div>
                        <input type="submit"
                               class="bg-green-500 hover:bg-green-700 text-white py-2 px-10 w-4/12 mb-4 rounded"
                               value="@lang('lang.profile_save')">
                    </div>
                </div>
            </div>
        </form>
    </div>

    <script src="{{ asset('js/profile/create_port.js') }}"></script>
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
