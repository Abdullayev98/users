<div class="lg:col-span-1 col-span-2 full rounded-xl ring-1 ring-gray-300 h-auto w-80 text-gray-600 lg:ml-8 ml-0">
    <div class="mt-6 ml-4">
        <h3 class="font-medium text-gray-700 text-3xl">@lang('lang.profile_performer')</h3>
        <p>@lang('lang.profile_since')</p>
    </div>
    <div class="contacts">
        @if($user->google_id)

            <div class="telefon ml-4 h-20 grid grid-cols-4">
                <div class="w-12 h-12 text-center mx-auto my-auto py-2 bg-gray-300 rounded-xl col-span-1"
                     style="background-color: #4285F4;">
                    <i class="fab fa-google text-white"></i>
                </div>
                <div class="ml-3 col-span-3">
                    <h5 class="font-bold text-gray-700 block mt-2 text-md">Google</h5>
                    Подтвержден
                </div>
            </div>
        @endif
        @if($user->facebook_id)
            <div class="telefon ml-4 h-20 grid grid-cols-4">
                <div class="w-12 h-12 text-center mx-auto my-auto py-2 bg-gray-300 rounded-xl col-span-1"
                     style="background-color: #4285F4;">
                    <i class="fab fa-facebook-f text-white"></i>
                </div>
                <div class="ml-3 col-span-3">
                    <h5 class="font-bold text-gray-700 block mt-2 text-md">Facebook</h5>
                    <p>Подтвержден</p>
                </div>
            </div>
        @endif
    </div>
    <p class="mx-5 my-4">@lang('lang.cash_boost')</p>
    @if(!$user->google_id)

        <div class="telefon ml-4 h-20 grid grid-cols-4">
            <div class="w-12 h-12 text-center mx-auto my-auto py-2 bg-gray-300 rounded-xl col-span-1"
                 style="background-color: #4285F4;">
                <i class="fab fa-google text-white"></i>
            </div>
            <div class="ml-3 col-span-3">
                <h5 class="font-bold text-gray-700 block mt-2 text-md">Google</h5>
                <a href="{{route('auth.google')}}" target="_blank"
                   class="block text-sm">@lang('lang.cash_bind')</a></p></a>
            </div>
        </div>
    @endif
    @if(!$user->facebook_id)
        <div class="telefon ml-4 h-20 grid grid-cols-4">
            <div class="w-12 h-12 text-center mx-auto my-auto py-2 bg-gray-300 rounded-xl col-span-1"
                 style="background-color: #4285F4;">
                <i class="fab fa-facebook-f text-white"></i>
            </div>
            <div class="ml-3 col-span-3">
                <h5 class="font-bold text-gray-700 block mt-2 text-md">Facebook</h5>
                <a href="{{route('auth.facebook')}}" target="_blank"
                   class="block text-sm">@lang('lang.cash_bind')</a>
            </div>
        </div>
    @endif
</div>