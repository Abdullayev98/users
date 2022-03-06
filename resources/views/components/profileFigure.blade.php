<figure class="w-full">
    <div class="hidden md:block float-right mr-8 text-gray-500">
        <i class="far fa-eye"> {{$views}}  {{__('просмотр')}}</i>
    </div>
    <br>
    <h2 class="font-bold text-2xl text-gray-800 mb-2">{{__('Здравствуйте')}}, {{$user->name}}!</h2>
    <div class="flex flex-row mt-6">
        <div class="sm:w-1/3 w-full">
            <img class="border border-3 border-gray-400 h-44 w-44"
                 @if ($user->avatar == Null)
                 src='{{asset("storage/images/default.jpg")}}'
                 @else
                 src="{{asset("storage/{$user->avatar}")}}"
                 @endif alt="avatar">
            <div class="rounded-md bg-gray-200 w-44 mt-2 py-1 border-2 border-gray-700" type="button">
                <input type="file" name="file" id="file" onclick="fileupdate()" class="hidden">
                <label for="file" class="p-1 cursor-pointer">
                    <i class="fas fa-camera mx-1"></i>
                    <span>{{__('Изменить фото')}}</span>
                </label>
            </div>
        </div>

        <div class="sm:w-2/3 w-full text-base text-gray-500 ml-4">
            @isset($user->age)
                <p class="inline-block mr-2">
                    {{$user->age}}
                    @if($user->age>20 && $user->age%10==1) {{__('года')}}
                    @elseif ($user->age>20 && ($user->age%10==2 || $user->age%10==3 || $user->age%10==1)) {{__('года')}}
                    @else {{__('лет')}}
                    @endif
                </p>
            @endisset

            <span class="inline-block">
                                <p class="inline-block text-m">
                                    @isset($user->location)
                                        <i class="fas fa-map-marker-alt"></i>
                                        {{__('Местоположение')}} {{$user->location}}
                                    @else {{__('город не включен')}}
                                    @endisset
                                </p>
                            </span>
            <p class="mt-2">{{__('Создал')}} <a >
                                <span>
                                    {{count($user->tasks??[])}}
                                </span> {{__('задание')}}</a></p>
            {{-- <p class="mt-4">{{__('Оценка')}}: 3.6 </p> --}}
            <div class="flex mt-6 items-center">
                <div data-tooltip-target="tooltip-animation_1" class="mx-4 tooltip-1">
                    <img @if ($user->is_email_verified !== Null && $user->is_phone_number_verified !== Null)
                         src="{{ asset('images/verify.png') }}"
                         @else
                         src="{{ asset('images/verify_gray.png') }}"
                         @endif  alt="" class="w-24">
                    <div id="tooltip-animation_1" role="tooltip"
                         class="inline-block sm:w-2/12 w-1/2 absolute invisible z-10 py-2 px-3 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-sm opacity-0 transition-opacity duration-300 tooltip dark:bg-gray-700">
                        <p class="text-center">
                            @if ($user->is_email_verified !== Null && $user->is_phone_number_verified !== Null)
                                {{__('Номер телефона и Е-mail пользователя подтверждены')}}
                            @else
                                {{__('Номер телефона и Е-mail пользователя неподтверждены')}}
                            @endif
                        </p>
                        <div class="tooltip-arrow" data-popper-arrow></div>
                    </div>
                </div>
                @if($user->role_id == 2)
                    @foreach($about as $rating)
                        @if($rating->id == $user->id)
                            <div data-tooltip-target="tooltip-animation_2" class="mx-4 tooltip-2">
                                <img src="{{ asset('images/best.png') }}" alt="" class="w-24">
                                <div id="tooltip-animation_2" role="tooltip"
                                     class="inline-block  sm:w-2/12 w-1/2 absolute invisible z-10 py-2 px-3 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-sm opacity-0 transition-opacity duration-300 tooltip dark:bg-gray-700">
                                    <p class="text-center">
                                        {{__('Невходит в ТОП-20 всех исполнителей User.uz')}}
                                    </p>
                                    <div class="tooltip-arrow" data-popper-arrow></div>
                                </div>
                            </div>
                        @else
                            @continue
                        @endif
                    @endforeach
                    <div data-tooltip-target="tooltip-animation_3" class="mx-4">
                        @if($task_count >= 50)
                            <img src="{{ asset('images/50.png') }}" alt="" class="w-24">
                        @else
                            <img src="{{ asset('images/50_gray.png') }}" alt="" class="w-24">
                        @endif
                        <div id="tooltip-animation_3" role="tooltip"
                             class="inline-block  sm:w-2/12 w-1/2 absolute invisible z-10 py-2 px-3 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-sm opacity-0 transition-opacity duration-300 tooltip dark:bg-gray-700">
                            <p class="text-center">
                                {{__('Более 50 выполненных заданий')}}
                            </p>
                            <div class="tooltip-arrow" data-popper-arrow></div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</figure>

<link rel="stylesheet" href="{{ asset('path/ijaboCropTool.min.css') }}">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="{{ asset('path/ijaboCropTool.min.js') }}"></script>
<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.css" rel="stylesheet">
<script>
    $('#file').ijaboCropTool({
        preview: '.image-previewer',
        setRatio: 1,
        allowedExtensions: ['jpg', 'jpeg', 'png'],
        buttonsText: ['{{__('Сохранить')}}', '{{__('Отмена')}}'],
        buttonsColor: ['#30bf7d', '#ee5155', -15],
        processUrl: '{{ route('profile.image.store') }}',
        withCSRF: ['_token', '{{ csrf_token() }}'],
        fileName: 'image',
        onSuccess: function (message, element, status) {
            window.location.href = "{{ route('userprofile') }}";
        },
        onError: function (message, element, status) {
            alert(message);
        }
    });
</script>
