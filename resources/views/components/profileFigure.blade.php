<figure class="w-full">
    <div class="hidden md:block float-right mr-8 text-gray-500">
        <i class="far fa-eye"> {{$views}}  @lang('lang.profile_view')</i>
    </div>
    <br>
    <h2 class="font-bold text-2xl text-gray-800 mb-2">@lang('lang.cash_hello'), {{$user->name}}!</h2>
    <div class="flex flex-row mt-6">
        <div class="sm:w-1/3 w-full">
            <img class="border border-3 border-gray-400 h-40 w-40"
                @if ($user->avatar == Null)
                src='{{asset("storage/images/default.jpg")}}'
                @else
                src="{{asset("storage/{$user->avatar}")}}"
                @endif alt="avatar">
                <input type="file" name="file" id="file" class="mt-2">
                <button onclick="btn2" class="my-2 bg-gray-300 px-3 py-1 rounded-md hidden">
                    <i class="fas fa-camera mr-1"></i>
                    <span>@lang('lang.cash_changeImg')</span>
                </button>
        </div>

        <div class="sm:w-2/3 w-full text-base text-gray-500 ml-4">
            @isset($user->age)
                <p class="inline-block mr-2">
                    {{$user->age}}
                    @if($user->age>20 && $user->age%10==1) @lang('lang.cash_rusYearGod')
                    @elseif ($user->age>20 && ($user->age%10==2 || $user->age%10==3 || $user->age%10==1)) @lang('lang.cash_rusYearGoda')
                    @else @lang('lang.cash_rusYearLet')
                    @endif
                </p>
            @endisset

            <span class="inline-block">
                                <p class="inline-block text-m">
                                    @isset($user->location)
                                        <i class="fas fa-map-marker-alt"></i>
                                        @lang('lang.cash_city') {{$user->location}}
                                    @else @lang('lang.cash_cityNotGiven')
                                    @endisset
                                </p>
                            </span>
            <p class="mt-2">@lang('lang.cash_created') <a href="#">
                                <span>
                                    {{count($user->tasks??[])}}
                                </span> @lang('lang.cash_task')</a></p>
            {{-- <p class="mt-4">@lang('lang.cash_rate'): 3.6 </p> --}}
            <div class="flex mt-6 items-center">
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
                                <img src="{{ asset('images/best.png') }}" alt="" class="w-24">
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
</figure>

<link rel="stylesheet" href="{{ asset('path/ijaboCropTool.min.css') }}">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> 
<script src="{{ asset('path/ijaboCropTool.min.js') }}"></script> 
<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.css" rel="stylesheet">
<script>
    $('#file').ijaboCropTool({
       preview : '.image-previewer',
       setRatio:1,
       allowedExtensions: ['jpg', 'jpeg','png'],
       buttonsText:['@lang('lang.profile_save')','@lang('lang.profile_cancel')'],
       buttonsColor:['#30bf7d','#ee5155', -15],
       processUrl:'',
       withCSRF:['_token','{{ csrf_token() }}'],
       onSuccess:function(message, element, status){
          alert(message);
       },
       onError:function(message, element, status){
         alert(message);
       }
    });
</script>