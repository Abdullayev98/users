@extends('layouts.app')

@section('content')
<style>
    select {
  -webkit-appearance: none;
  -moz-appearance: none;
  appearance: none;
}
</style>
<div class="xl:w-10/12 mx-auto mt-16">
    <div class="grid grid-cols-3 ">

            {{-----------------------------------------------------------------------------------}}
            {{--                             Left column                                       --}}
            {{-----------------------------------------------------------------------------------}}

        <div class="lg:col-span-1 col-span-3 px-8">
            <div class="flex flex-row shadow-lg rounded-lg mb-8">
                <div class="basis-1/2 h-24 bg-contain bg-no-repeat bg-center" style="background-image: url({{asset('images/like.png')}});">
                </div>
                <div class="basis-1/2 text-xs text-gray-700 text-left my-auto">
                    @lang('lang.perfCat_becomePerf')
                </div>
            </div>

            <div>
                <div class="max-w-md mx-left">
                @foreach (\TCG\Voyager\Models\Category::query()->where('parent_id', null)->get() as $category)
                                    <div x-data={show:false} class="rounded-sm">
                                        <div class="border border-b-0 bg-gray-100 cursor-pointer" id="{{ str_replace(' ', '', $category->name) }}">
                                            <button class="underline text-blue-500 hover:text-blue-700 focus:outline-none" type="button">
                                                <svg class="w-4 h-4 rotate -rotate-90" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                                </svg>
                                            </button>
                                                {{ $category->getTranslatedAttribute('name',Session::get('lang') , 'fallbackLocale') }}
                                        </div>
                                        <div id="{{$category->slug}}" class="border border-b-0 px-8 py-1 hidden">
                                            @foreach (\TCG\Voyager\Models\Category::query()->where('parent_id', $category->id)->get() as $category2)

                                                <div>
                                                    <a href="/perf-ajax/{{ $category2->id }}">{{ $category2->getTranslatedAttribute('name',Session::get('lang') , 'fallbackLocale') }}</a>
                                                </div>

                                            @endforeach
                                        </div>
                                    </div>
                                @endforeach
                </div>
            </div>
        </div>

        <div class="lg:col-span-2 col-span-3 lg:mt-0 mt-16">
                <div class="bg-gray-100 h-40 rounded-xl w-4/5 sm:mx-0 mx-auto">
                        <div class="font-bold text-2xl mx-8 py-4">
                            <p>@lang('lang.perfCat_allPerf')</p>
                        </div>
                        <div class="form-check flex flex-row mx-8 mt-10">
                            <input class="form-check-input h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-black-600 checked:border-black-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer"
                            type="checkbox" value="1" onchange="check()" id="online">
                            <label class="form-check-label inline-block text-gray-800" for="online">
                                @lang('lang.perfCat_nowInSite')
                            </label>
                        </div>
                </div>
            @foreach($users as $user)
            <div class="w-12/12 m-5 h-[200px] flex md:flex-none overflow-hidden md:overflow-visible mb-10 " id="{{$user->id}}">
                <div class="w-34 float-left">
                    <img class="rounded-lg w-32 h-32 bg-black mb-4 mr-4" src="{{asset("AvatarImages/{$user->avatar}")}}" alt="user">
                    <div class="flex flex-row text-[12px]">
                        <p>@lang('lang.perfCat_feedbacks')</p>
                        <i class="far fa-thumbs-up m-1 text-gray-400"></i> 5128
                        <i class="far fa-thumbs-down m-1 text-gray-400"></i> 21
                    </div>
                    <div class="flex flex-row text-[12px]">
                        <i class="fas fa-star text-[#ffad00]"></i>
                        <i class="fas fa-star text-[#ffad00]"></i>
                        <i class="fas fa-star text-[#ffad00]"></i>
                        <i class="fas fa-star text-[#ffad00]"></i>
                        <i class="fas fa-star text-[#ffad00]"></i>
                    </div>
                </div>
                <div class="w-5/12 md:float-none md:float-none">
                    <div class="flex items-end gap-x-2">
                        <a href="/performers/{{$user->id}}">
                            <p class="lg:text-3xl text-2xl underline text-blue-500 hover:text-red-500 "> {{$user->name}} </p>
                        </a>
                        <a href="/badges">
                            <img class="w-7" src="{{ asset('images/insuranceIcon.png') }}" alt="#">
                        </a>
                        <a href="/badges" data-bs-toggle="popover" data-bs-placement="top" data-bs-content="Top popover">
                            <img class="w-7" src="{{ asset('images/goldenCup.png') }}" alt="#">
                        </a>
                    </div>
                    <div>
                           @if($user->active_status == 1)
                        <p class="text-sm text-green-500 my-3"><i class="fa fa-circle text-xs text-green-500 mr-2 mt-1"> </i> @lang('lang.exe_online')</p>

                        @else
                        <p class="text-sm text-gray-500 my-3">@lang('lang.exe_offline')</p>
                        @endif

                    </div>
                    <div>
                        <p class="text-base md:text-[14px] text-[0.9rem] leading-0 md:w-[600px] ">
                               {{$user->description}}
                        </p>
                    </div>
                    <div >
                        <a href="#" onclick="toggleModal12('modal-id12')" class="hidden lg:block">
                            <button class="rounded-lg py-2 px-3 font-bold bg-[#ffad00] hover:bg-[#ff9500] transition duration-300 text-white mt-3">@lang('lang.exe_giveTbtn')</button>
                        </a>

                    </div>
                </div>
            </div>

            @endforeach

            {{ $users->links() }}

        </div>
</div>

     {{-- Modal start --}}
     <div class="hidden overflow-x-hidden overflow-y-auto fixed inset-0 z-50 outline-none focus:outline-none justify-center items-center" id="modal-id12">
        <div class="relative w-auto my-6 mx-auto max-w-3xl"  id="modal-id12">
          <div class="border-0 rounded-lg shadow-lg relative flex flex-col w-full bg-white outline-none focus:outline-none">
            <div class=" text-center p-12  rounded-t">
                  <button type="submit"  onclick="toggleModal12('modal-id12')" class="rounded-md w-100 h-16 absolute top-1 right-4">
                    <i class="fas fa-times  text-slate-400 hover:text-slate-600 text-xl w-full"></i>
                  </button>
                <h3 class="font-medium text-4xl block mt-4">
                    @lang('lang.exe_youHaventT')
                </h3>
            </div>
            <!--body-->
            <div class="relative p-6 flex-auto">
              <p class="my-4  text-lg  text-center">
                @lang('lang.exe_createTFirst')
              </p>
            </div>
            <!--footer-->
            <div class="flex mx-auto items-center justify-end p-6 rounded-b mb-8">
                <div class="mt-4 ">
                    <a class="px-10 py-4 text-center font-sans  text-xl  font-semibold bg-lime-500 text-[#fff] hover:bg-lime-600  h-12 rounded-md text-xl" href="/categories/1" >@lang('lang.exe_createTask')</a>
                </div>
            </div>
          </div>
        </div>
      </div>
      <div class="hidden opacity-25 fixed inset-0 z-40 bg-black" id="modal-id12-backdrop"></div>
      </div>
      <script>
     @foreach (\TCG\Voyager\Models\Category::query()->where('parent_id', null)->get() as $category)
        $( "#{{ str_replace(' ', '', $category->name) }}" ).click(function() {
            if ($("#{{$category->slug}}").hasClass("hidden")) {
                $("#{{$category->slug}}").removeClass('hidden');
            }else{
                $("#{{$category->slug}}").addClass('hidden');
            }
        });
        @endforeach
      </script>
      <script type="text/javascript">
        function toggleModal12(modalID12){
          document.getElementById(modalID12).classList.toggle("hidden");
          document.getElementById(modalID12 + "-backdrop").classList.toggle("hidden");
          document.getElementById(modalID12).classList.toggle("flex");
          document.getElementById(modalID12 + "-backdrop").classList.toggle("flex");
        }
      </script>
      <script>
      function check() {
        // Get the checkbox
        var checkBox = document.getElementById("online");
        // Get the output text
        @foreach($users as $user)
        var {{ str_replace(' ', '', $user->name) }} = document.getElementById("{{$user->id}}");


        // If the checkbox is checked, display the output text
        if (checkBox.checked == true){
          if ({{$user->active_status}} == 0) {
            {{ str_replace(' ', '', $user->name) }}.classList.add("hidden");
          }
        } else {
            {{ str_replace(' ', '', $user->name) }}.classList.remove("hidden");
        }
        @endforeach
        }
      </script>
    {{-- Modal end --}}

@endsection

@section('javasript')
    <script src="//unpkg.com/alpinejs" defer></script>
@endsection
