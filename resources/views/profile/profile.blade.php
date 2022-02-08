@extends("layouts.app")

@section("content")

    <link rel="stylesheet" href="{{ asset('/css/profile.css') }}">
    <link href="https://releases.transloadit.com/uppy/v2.1.0/uppy.min.css" rel="stylesheet">
    <div class="w-11/12  mx-auto text-base mt-4">
        <div class="grid lg:grid-cols-3 grid-cols-2 lg:w-5/6 w-full mx-auto">
            {{-- user ma'lumotlari --}}
            <div class="col-span-2 w-full md:mx-auto mx-4">
                <figure class="w-full">

                    <h2 class="font-bold text-2xl text-gray-800 mb-2">@lang('lang.cash_hello'), {{$user->name}}!</h2>
                    <div class="flex flex-row 2xl:w-11/12 w-full mt-6">

                    <div class="flex flex-row w-80 mt-6" style="width:500px">
                        <div class="sm:w-1/3 w-full">
                            <img class="border border-3 border-gray-400 h-40 w-40"
                                 @if ($user->avatar == Null)
                                 src='{{asset("storage/images/default.jpg")}}'
                                 @else
                                 src="{{asset("storage/{$user->avatar}")}}"
                                 @endif alt="avatar">
                            <form action="{{route('updateSettingPhoto')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="rounded-md bg-gray-200 w-40 mt-2 py-1" type="button">
                                    <input type="file" id="file" name="avatar" onclick="fileupdate()" class="hidden">
                                    <label for="file" class="p-1">
                                        <i class="fas fa-camera"></i>
                                        <span>@lang('lang.cash_changeImg')</span>
                                    </label>
                                </div>
                                <div class="rounded-md bg-green-400 w-40 hidden mt-3 py-1" type="button" id="buttons" onclick="fileadd()">
                                    <input type="submit" id="sub1" class="hidden">
                                    <label for="sub1" class="p-1">
                                        <i class="fas fa-save"></i>
                                        <span>@lang('lang.cash_addImg')</span>
                                    </label>
                                </div>
                            </form>
                        </div>

                        <div class="sm:w-2/3 w-full text-base text-gray-500 ml-4">
                            @if($user->age != "")
                                <p class="inline-block mr-2">
                                    {{$user->age}}
                                    @if($user->age>20 && $user->age%10==1) @lang('lang.cash_rusYearGod')
                                    @elseif ($user->age>20 && ($user->age%10==2 || $user->age%10==3 || $user->age%10==1)) @lang('lang.cash_rusYearGoda')
                                    @else @lang('lang.cash_rusYearLet')
                                    @endif
                                </p>
                            @endif

                            <span class="inline-block">
                                <p class="inline-block text-m">
                                    @if($user->location!="")
                                        <i class="fas fa-map-marker-alt"></i>
                                        @lang('lang.cash_city') {{$user->location}}
                                    @else @lang('lang.cash_cityNotGiven')
                                    @endif
                                </p>
                            </span>

                            <p class="mt-2">@lang('lang.cash_created') <a href="#">
                                <span>
                                    @if ($task == Null) 0
                                    @else {{$task}}
                                    @endif
                                </span> @lang('lang.cash_task')</a></p>
                            {{-- <p class="mt-4">@lang('lang.cash_rate'): 3.6 </p> --}}
                                <div class="flex mt-6">
                                    <div data-tooltip-target="tooltip-animation_1" class="mx-4 tooltip-1">
                                        <img @if ($user->is_email_verified !== Null && $user->is_phone_number_verified !== Null)
                                             src="{{ asset('images/verify.png') }}"
                                             @else
                                             src="{{ asset('images/verify_gray.png') }}"
                                             @endif  alt="" class="w-24">
                                        <div id="tooltip-animation_1" role="tooltip" class="inline-block sm:w-2/12 w-1/2 absolute invisible z-10 py-2 px-3 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-sm opacity-0 transition-opacity duration-300 tooltip dark:bg-gray-700">
                                            <p class="text-center">
                                                @if ($user->is_email_verified !== Null && $user->is_phone_number_verified !== Null)
                                                    @lang('lang.profile_icon_verify')
                                                @else
                                                    @lang('lang.profile_icon_not_verify')
                                                @endif
                                            </p>
                                            <div class="tooltip-arrow" data-popper-arrow></div>
                                        </div>
                                    </div>
                                    @if($user->role_id == 2)
                                    @foreach($about as $rating)
                                        @if($rating->id == $user->id)
                                            <div data-tooltip-target="tooltip-animation_2" class="mx-4 tooltip-2" >
                                                <img src="{{ asset('images/best.png') }}"alt="" class="w-24">
                                                <div id="tooltip-animation_2" role="tooltip" class="inline-block  sm:w-2/12 w-1/2 absolute invisible z-10 py-2 px-3 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-sm opacity-0 transition-opacity duration-300 tooltip dark:bg-gray-700">
                                                    <p class="text-center">
                                                        @lang('lang.profile_icon_best')
                                                    </p>
                                                    <div class="tooltip-arrow" data-popper-arrow></div>
                                                </div>
                                            </div>
                                        @else
                                            @continue
                                        @endif
                                    @endforeach
                                    <div data-tooltip-target="tooltip-animation_3" class="mx-4" >
                                        @if($task_count >= 50)
                                        <img src="{{ asset('images/50.png') }}" alt="" class="w-24">
                                        @else
                                            <img src="{{ asset('images/50_gray.png') }}" alt="" class="w-24">
                                        @endif
                                        <div id="tooltip-animation_3" role="tooltip" class="inline-block  sm:w-2/12 w-1/2 absolute invisible z-10 py-2 px-3 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-sm opacity-0 transition-opacity duration-300 tooltip dark:bg-gray-700">
                                            <p class="text-center">
                                                @lang('lang.profile_icon_50')
                                            </p>
                                            <div class="tooltip-arrow" data-popper-arrow></div>
                                        </div>
                                    </div>
                                        @endif
                                </div>
                        </div>
                    </div>
                    </div>
                </figure>
                {{-- user ma'lumotlari tugashi --}}
                <div class="content mt-20 ">
                    <div class= "grid md:grid-cols-10 w-full">
                        <ul class=" md:col-span-9 items-center w-3/4 md:w-full" id="tabs">
                            <li class=" md:mr-5 mr-1 inline-block"><a href="/profile" class=" md:text-[18px] text-[14px] font-bold block text-gray-700" id="default-tab">@lang('lang.cash_aboutMe')</a></li>
                            <li class=" md:mr-5 mr-1 inline-block"><a href="/profile/cash" class=" md:text-[18px] text-[14px] text-gray-600">@lang('lang.cash_check')</a></li>
                            <li class=" md:mr-5 mr-1 inline-block md:hidden block"><a href="/profile/settings" class="md:text-[18px] text-[14px] text-gray-600" id="settingsText">@lang('lang.cash_settings')</a></li>

                        </ul>
                        <div class="md:col-span-1 md:block hidden text-gray-600" id="settingsIcon"><a href="/profile/settings"><i class="fas fa-user-cog text-3xl" ></i></a></div>

                    </div>
                    <hr>
                    {{-- ABOUT-ME start --}}
                    <div class="about-me block" id="tab-profile">
                        <div class="about-a-bit mt-10">
                            <h4 class="inline font-bold text-lg text-gray-700">@lang('lang.profile_aboutMe')</h4>
                                @if ($user->description == Null)
                                    <span class="ml-10">
                                        <i class="fas fa-pencil-alt inline text-gray-700"></i>
                                        <p class="inline text-gray-500 cursor-pointer" id="padd">@lang('lang.profile_add')</p>
                                    </span>
                                    <p class="text-red-400 desc mt-4" >@lang('lang.profile_description')</p>
                                @else
                                    <span class="ml-10">
                                        <i class="fas fa-pencil-alt inline text-gray-700"></i>
                                        <p class="inline text-gray-500 cursor-pointer" id="padd">@lang('lang.profile_edit')</p>
                                    </span>
                                    <p class="mt-3 w-4/5 desc">{{$user->description}}</p>
                                @endif
                                <form action="{{route('edit.description')}}" method="POST" class="formdesc hidden">
                                    @csrf
                                    <textarea name="description" name="description"
                                              class="w-full h-32 border border-gray-400 py-2 px-4 mt-3"
                                              @if (!$user->description) placeholder="@lang('lang.profile_enterDesc')"@endif
                                    >@if ($user->description){{$user->description}}@endif</textarea><br>
                                    <input type="submit" class="bg-blue-400 hover:bg-blue-500 text-white py-2 px-6 rounded cursor-" id="s1" value="@lang('lang.profile_save')">
                                    <a id="s2" class="border-dotted border-b-2 mx-4 pb-1 text-gray-500 hover:text-red-500 hover:border-red-500" href="">@lang('lang.profile_cancel')</a>
                                </form>
                        </div>
                        <h4 class="font-bold mt-5 text-gray-700">@lang('lang.profile_workExample')</h4>
                        <div class="example-of-works w-96 my-10">
                           <a class="bg-green-500 px-8 py-3 rounded-md text-white text-2xl" href="/profile/create">
                            <i class="fas fa-camera"></i>
                            <span>@lang('lang.profile_createAlbum')</span>
                           </a>
                        </div>
                        <div class="grid md:grid-cols-3 grid-cols-1 w-full mx-auto">
                        @foreach($comment as $comments)
                        @php
                            $images = explode(',', $comments->image);
                        @endphp
                            <a href="/profile/portfolio/{{$comments->id}}" class="border my-6 border-gray-400 mx-auto w-56 h-48 mr-6 sm:mb-0 mb-8">
                                <img src="{{$images[0]}}" alt="#" class="w-56 h-48">
                                <div class="h-12 flex relative bottom-12 w-full bg-black opacity-75 hover:opacity-100 items-center">
                                    <p class="w-2/3 text-center text-base text-white">{{$comments->comment}}</p>
                                   <div class="w-1/3 flex items-center">
                                        <i class="fas fa-camera float-right text-white text-2xl m-2"></i>
                                        <span class="text-white">{{count($images)}}</span>
                                   </div>
                                </div>
                            </a>
                        @endforeach


                        </div>
                    </div>
                    <div class="">
                                <p class="text-2xl font-semibold">
                                    @lang('lang.exe_typeOfDone')
                                </p>
                                <div class="my-4">
                                    <ul class="pl-10 leading-7">
                                        @foreach(explode(',', $user->category_id) as $user_cat)
                                            @foreach($categories as $cat)
                                                @if($cat->id == $user_cat)
                                        <li>
                                            <a href="/categories/{{$cat->parent_id}}" class="underline">
                                                {{ $cat->getTranslatedAttribute('name',Session::get('lang') , 'fallbackLocale') }}
                                            </a>
                                        </li>
                                                @endif
                                            @endforeach
                                            @endforeach
                                    </ul>
                                </div>
                            </div>
                    {{-- about-me end --}}
                </div>
            </div>
                {{-- right-side-bar --}}

            @include('auth.profile-side-info')
                {{-- tugashi o'ng tomon ispolnitel --}}
        </div>
    </div>

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

    <script>
        function fileupdate(){
            var x = document.getElementById("buttons");
            x.style.display = "block";
        }
        function fileadd(){
            var x = document.getElementById("buttons");
            x.classList.add("hidden");
        }
        $('#padd').click(function(){
            $('.desc').addClass('hidden')
            $('.formdesc').removeClass('hidden').addClass('block')
        });
        $('#s2').click(function(event){
            event.preventDefault();
            $('.desc').addClass('block').removeClass('hidden');
            $('.formdesc').removeClass('block').addClass('hidden')
        });
        $("#button_comment").click(function(event){
                let comment = $("input[name=comment]").val();
                $.ajax({
                    url: "{{route('comment')}}",
                    type:"POST",
                    data:{
                        comment:comment,
                        _token:$('meta[name="csrf-token"]').attr('content'),
                    },
                });
                toggleModal6('modal-id6');
            });
    </script>
    @if($user->role_id == 2)
        <script>
        if($('.tooltip-2').length === 0){
            $( "<div data-tooltip-target='tooltip-animation_2' class='mx-4 tooltip-2' ><img src='{{ asset("images/best_gray.png") }}'alt='' class='w-24'><div id='tooltip-animation_2' role='tooltip' class='inline-block  sm:w-2/12 w-1/2 absolute invisible z-10 py-2 px-3 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-sm opacity-0 transition-opacity duration-300 tooltip dark:bg-gray-700'><p class='text-center'>@lang('lang.profile_icon_best')</p><div class='tooltip-arrow' data-popper-arrow></div> </div></div>" ).insertAfter( $( ".tooltip-1" ) );
        }
    </script>
    @endif
    @include('sweetalert::alert')
@endsection
