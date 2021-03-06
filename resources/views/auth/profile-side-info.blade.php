<div class="lg:col-span-1 col-span-2 rounded-xl ring-1 ring-gray-300 h-auto text-gray-600 sm:ml-8 ml-0">
    @if(auth()->user()->role_id!=2)
            <a href="/verification" class="flex flex-row shadow-lg rounded-lg mb-8">
                <div class="w-1/2 h-24 bg-contain bg-no-repeat bg-center" style="background-image: url({{asset('images/like.png')}});">
                </div>
                <div class="font-bold text-xs text-gray-700 text-left my-auto">
                {{__('Станьте исполнителем')}}<br>{{__('U-ser. И начните')}}<br> {{__('зарабатывать.')}}        </div>
            </a>
        @endif
    <div class="mt-6 ml-4">
        @if (auth()->user()->role_id==2)
            <h3 class="font-medium text-gray-700 text-3xl">
                {{__('Исполнитель')}}
            </h3>
        @endif
    </div>
    <div class="contacts">
        <div class="ml-4 h-20 grid grid-cols-4 content-center">
            <div class="w-12 h-12 text-center mx-auto my-auto py-2 bg-gray-300 rounded-xl col-span-1"
                style="background-color: orange;">
                <i class="fas fa-phone-alt text-white text-2xl"></i>
            </div>
            <div class="ml-3 col-span-3">
                <h5 class="font-bold text-gray-700 block">{{__('Телефон')}}</h5>
                @if ($user->phone_number != '')
                    <p class="text-gray-600 block ">{{ $user->phone_number }}</p>
                @else
                    {{__('нет номера')}}
                @endif
            </div>
        </div>
        <div class="telefon ml-4 h-20 grid grid-cols-4 content-center">
            <div class="w-12 h-12 text-center mx-auto my-auto py-2 bg-gray-300 rounded-xl col-span-1"
                style="background-color: #0091E6;">
                <i class="far fa-envelope text-white text-2xl"></i>
            </div>
            <div class="ml-3 col-span-3">
                <h5 class="font-bold text-gray-700 block">Email</h5>
                <p class="text-sm break-all">{{ $user->email }}</p>
            </div>
        </div>
    </div>
        
    <div class="contacts">
        @if($user->google_id)

            <div class="telefon ml-4 h-20 grid grid-cols-4">
                <div class="w-12 h-12 text-center mx-auto my-auto py-2 bg-gray-300 rounded-xl col-span-1"
                     style="background-color: #f13636;">
                    <i class="fab fa-google text-white text-2xl"></i>
                </div>
                <div class="ml-3 col-span-3">
                    <h5 class="font-bold text-gray-700 block mt-2 text-md">Google</h5>
                    {{__('Подтвержден')}}
                </div>
            </div>
        @endif
        @if($user->facebook_id)
            <div class="telefon ml-4 h-20 grid grid-cols-4">
                <div class="w-12 h-12 text-center mx-auto my-auto py-2 bg-gray-300 rounded-xl col-span-1"
                     style="background-color: #4285F4;">
                    <i class="fab fa-facebook-f text-white text-2xl"></i>
                </div>
                <div class="ml-3 col-span-3">
                    <h5 class="font-bold text-gray-700 block mt-2 text-md">Facebook</h5>
                    <p>{{__('Подтвержден')}}</p>
                </div>
            </div>
        @endif
    </div>
    <p class="mx-5 my-4">
        {{__('Повысьте доверие пользователей к себе — привяжите ваши аккаунты социальных сетей к профилю Servicebox. Мы обязуемся не раскрывать ваши контакты.')}}
    </p>
    @if(!$user->google_id)

        <div class="telefon ml-4 h-20 grid grid-cols-4">
            <div class="w-12 h-12 text-center mx-auto my-auto py-2 bg-gray-300 rounded-xl col-span-1"
                 style="background-color: #f13636;">
                <i class="fab fa-google text-white text-2xl"></i>
            </div>
            <div class="ml-3 col-span-3">
                <h5 class="font-bold text-gray-700 block mt-4 text-md">Google</h5>
                <a href="{{route('social.googleRedirect')}}" target="_blank"
                   class="block text-sm">
                {{__('Привязать')}}
                </a></p></a>
            </div>
        </div>
    @endif
    @if(!$user->facebook_id)
        <div class="telefon ml-4 h-20 grid grid-cols-4">
            <div class="w-12 h-12 text-center mx-auto my-auto py-2 bg-gray-300 rounded-xl col-span-1"
                 style="background-color: #4285F4;">
                <i class="fab fa-facebook-f text-white text-2xl"></i>
            </div>
            <div class="ml-3 col-span-3">
                <h5 class="font-bold text-gray-700 block mt-4 text-md">Facebook</h5>
                <a href="{{route('social.facebookRedirect')}}" target="_blank"
                   class="block text-sm">
                {{__('Привязать')}}
                </a>
            </div>
        </div>
    @endif

</div>
