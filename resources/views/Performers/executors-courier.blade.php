@extends("layouts.app")

@section("content")
    {{--@foreach($users as $user)--}}
    <div class="xl:w-9/12 w-10/12 mx-auto">
        <div class="grid grid-cols-3 grid-flow-row mt-10">
            {{-- left sidebar start --}}
            <div class="lg:col-span-2 col-span-3">
                <figure class="w-full">
                    <div class="float-right text-gray-500 text-sm">
                        <i class="far fa-eye"> {{$views}}  @lang('lang.profile_view')</i>
                    </div>
                    <div>
                        @if($user->active_status == 1)
                            <p class="text-green-500"><i class="fa fa-circle text-xs text-green-500 float-left mr-2 mt-[5px]" > </i>@lang('lang.exe_online')</p>
                        @else
                            <p class="text-gray-500">@lang('lang.exe_offline')</p>
                        @endif
                        <h1 class="text-3xl font-bold ">{{$user->name}}</h1>
                    </div>

                    <div class="flex sm:flex-row flex-col w-full mt-6">
                        <div class="flex-initial sm:w-1/3 w-full">
                            <img class="h-48 w-44"
                                 @if ($user->avatar == Null)
                                 src='{{asset("storage/images/default.jpg")}}'
                                 @else
                                 src="{{asset("storage/{$user->avatar}")}}"
                                 @endif alt="avatar">
                        </div>
                        <div class="flex-initial sm:w-2/3 w-full sm:mt-0 mt-6 sm:ml-8 ml-0">
                            <div class="font-medium text-lg">
                                @if($user->phone_verified_at && $user->email_verified_at)
                                    <i class="fas fa-check-circle text-green-500 text-2xl"></i>
                                    <span>@lang('lang.exe_docsAccept')</span>
                                @endif
                            </div>
                            <div class="w-2/3 text-base text-gray-500 lg:ml-0 ml-4">
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

                            </div>
                            <div class="text-gray-500 text-base mt-6">
                                <span>@lang('lang.exe_create') {{$task_count}} @lang('lang.exe_counttask')</span> ,
                                @if ($user->reviews()->count() == 1)
                                    <span>@lang('lang.exe_get') {{$user->reviews()->count()}} @lang('lang.exe_rusOtziv')</span>
                                @elseif ($user->reviews()->count() > 1 && $user->reviews()->count() > 5)
                                    <span>@lang('lang.exe_get') {{$user->reviews()->count()}} @lang('lang.exe_rusOtziva')</span>
                                @else
                                    <span>@lang('lang.exe_get') {{$user->reviews()->count()}} @lang('lang.exe_rusOtzivov')</span>
                                @endif
                            </div>
                            {{-- <div class="text-gray-500 text-base mt-1">
                                <span>@lang('lang.exe_averageRating'): 4,9</span>
                                 <i  class="fas fa-star text-amber-500"></i><i  class="fas fa-star text-amber-500"></i><i  class="fas fa-star text-amber-500"></i><i  class="fas fa-star text-amber-500"></i><i  class="fas fa-star text-amber-500"></i>
                                <span class="text-cyan-500 hover:text-red-600">(197 @lang('lang.exe_feedbacks'))</span>
                            </div> --}}
                            <div class="flex mt-6 items-center">

                                <div data-tooltip-target="tooltip-animation_1" class="mx-4 tooltip-1">
                                    <img @if ($user->is_email_verified !== Null && $user->is_phone_number_verified !== Null)
                                         src="{{ asset('images/verify.png') }}"
                                         @else
                                         src="{{ asset('images/verify_gray.png') }}"
                                         @endif  alt="" class="w-16">
                                    <div id="tooltip-animation_1" role="tooltip" class="inline-block w-2/12 absolute invisible z-10 py-2 px-3 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-sm opacity-0 transition-opacity duration-300 tooltip dark:bg-gray-700">
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
                                                <img src="{{ asset('images/best.png') }}"alt="" class="w-16">
                                                <div id="tooltip-animation_2" role="tooltip" class="inline-block  w-2/12 absolute invisible z-10 py-2 px-3 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-sm opacity-0 transition-opacity duration-300 tooltip dark:bg-gray-700">
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
                                            <img src="{{ asset('images/50.png') }}" alt="" class="w-16">
                                        @else
                                            <img src="{{ asset('images/50_gray.png') }}" alt="" class="w-16">
                                        @endif
                                        <div id="tooltip-animation_3" role="tooltip" class="inline-block  w-2/12 absolute invisible z-10 py-2 px-3 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-sm opacity-0 transition-opacity duration-300 tooltip dark:bg-gray-700">
                                            <p class="text-center">
                                                @lang('lang.profile_icon_50')
                                            </p>
                                            <div class="tooltip-arrow" data-popper-arrow></div>
                                        </div>
                                        @endif
                                    </div>
                            </div>
                            <a class="md:hidden block mt-8" href="#">
                                <button  class="bg-amber-600 hover:bg-amber-500 md:text-2xl text-white font-medium py-4 md:px-12  rounded">
                                    @lang('lang.exe_giveTask')
                                </button>
                            </a>
                        </div>
                    </div>
                </figure>

                {{-- right sidebar end --}}
                <div class="col-span-2">
                    <h1 class="text-3xl font-semibold text-gray-700">@lang('lang.exe_aboutMe')</h1>
                    <p>{{$user->description}}</p>
                </div>
                <div class="py-12 col-span-2">
                    <ul class="d-flex flex-col gap-y-5">
                        @isset($reviews)
                            @foreach ($reviews as $review)
                                @if($review->user_id == $user->id && $review->task)
                                    <li class="d-flex flex-col my-10 rounded-lg">
                                        <a href="{{route('performer.main', $review->user->id)}}" target="_blank" rel="noreferrer noopener" class="w-24 h-24 overflow-hidden rounded-full border-b-0 float-left">
                                            <img class="UsersReviews_picture__aB22p"
                                                 @if ($user->avatar == Null)
                                                 src='{{asset("storage/images/default.jpg")}}'
                                                 @else
                                                 src="{{asset("storage/{$review->user->avatar}")}}"
                                                 @endif alt="avatar">
                                        </a>
                                        <div class="align-top ml-12 h-16">
                            <span>
                                <a href="{{route('performer.main', $review->user->id)}}" target="_blank" rel="noreferrer noopener" class="text-blue-500 ">{{$review->user->name}}</a>
                            </span>
                                            <div class="text-4 text-[rgba(78,78,78,.5)]">
                                <span class="align-middle">
                                    @if ($user->id == $review->user_id)
                                        @if ($user->role_id == 2)
                                            @lang('lang.exe_feedB'):
                                            @if ($review->good_bad == 1)
                                                <i class="far fa-thumbs-up"></i>
                                            @else
                                                <i class="far fa-thumbs-down"></i>
                                            @endif
                                        @else
                                            @lang('lang.exe_feedB'):
                                            @if ($review->good_bad == 1)
                                                <i class="far fa-thumbs-up"></i>
                                            @else
                                                <i class="far fa-thumbs-down"></i>
                                            @endif
                                        @endif
                                    @endif
                                </span>
                                            </div>
                                        </div>
                                        <div class="p-5 mt-3 mr-0 mb-8 bg-yellow-50 shadow-[-1px_1px_2px] shadow-gray-300 rounded-2.5 relative text-gray-600 text-[14.7px] leading-[1.1rem] before:content-[''] before:w-0 before:h-0 before:absolute before:top-[-11px] before:left-[-9px] before:z-[2] before:rotate-[-45deg before:border-transparent border-b-gray-100 border-solid rounded-md">
                                            <div class="text-gray-500 py-4">
                                                @if ($review->good_bad == 1)
                                                      <i class="far fa-thumbs-up"></i>
                                                @else
                                                    <i class="far fa-thumbs-down"></i>
                                                @endif
                                                Задание "{{ Arr::get('name',$review->task)}}"

                                            </div>
                                            <hr>
                                            <div class="py-4">
                                                {{$review->description}}
                                            </div>
                                        </div>
                                    </li>
                                @endif
                            @endforeach
                        @endisset
                    </ul>
                </div>
            </div>

            <div class="lg:col-span-1 col-span-2 w-80">
                <div class="mt-16 border p-8 rounded-lg border-gray-300">
                    <div>
                        <h1 class="font-medium text-2xl">@lang('lang.exe_performer')</h1>
                        <p class="text-gray-400">@lang('lang.exe_since') {{date('d-m-Y', strtotime($user->created_at))}}</p>
                    </div>
                    <div class="">
                        <div class="flex w-full mt-4">
                            <div class="flex-initial w-1/4">
                                <i class="fas fa-phone-alt text-white text-2xl bg-yellow-500 py-1 px-2 rounded-lg"></i>
                            </div>
                            <div class="flex-initial w-3/4">
                                <h2 class="font-medium text-lg">@lang('lang.exe_phone')</h2>
                                @if($user->phone_verified_at)
                                    <p>@lang('lang.exe_verified')</p>
                                @else
                                    <p>@lang('lang.exe_notVerified')</p>
                                @endif
                            </div>
                        </div>
                        <div class="flex w-full mt-4">
                            <div class="flex-initial w-1/4">
                                <i class="text-white far fa-envelope text-2xl bg-blue-500 py-1 px-2 rounded-lg"></i>
                            </div>
                            <div class="flex-initial w-3/4">
                                <h2 class="font-medium text-lg">Email</h2>
                                @if($user->email_verified_at)
                                    <p>@lang('lang.exe_verified')</p>
                                @else
                                    <p>@lang('lang.exe_notVerified')</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-8">
                    <h1 class="text-3xl font-medium">@lang('lang.exe_typeOfDone')</h1>
                    <ul>
                        @foreach(explode(',', $user->category_id) as $user_cat)
                            @foreach($categories as $cat)
                                @if($cat->id == $user_cat)
                                    <li class="mt-2 text-gray-500"><a class="hover:text-red-500 underline underline-offset-4"  href="{{route('categories',$cat->parent_id)}}">{{ $cat->getTranslatedAttribute('name',Session::get('lang') , 'fallbackLocale') }}</a> </li>
                                @endif
                            @endforeach
                        @endforeach
                    </ul>
                </div>
            </div>

        </div>

            </div>
        </div>
    </div>


    @if($user->role_id == 2)
        <script>
            if($('.tooltip-2').length === 0){
                $( "<div data-tooltip-target='tooltip-animation_2' class='mx-4 tooltip-2' ><img src='{{ asset("images/best_gray.png") }}'alt='' class='w-16'><div id='tooltip-animation_2' role='tooltip' class='inline-block  w-2/12 absolute invisible z-10 py-2 px-3 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-sm opacity-0 transition-opacity duration-300 tooltip dark:bg-gray-700'><p class='text-center'>@lang('lang.profile_icon_best')</p><div class='tooltip-arrow' data-popper-arrow></div> </div></div>" ).insertAfter( $( ".tooltip-1" ) );
            }
        </script>
    @endif

@endsection
