@extends('layouts.app')


@section('content')
<div class="h-screen bg-no-repeat mb-32 bg-[url('https://images.pexels.com/photos/5588400/pexels-photo-5588400.jpeg?auto=compress&amp;cs=tinysrgb&amp;fit=crop&amp;h=768&amp;w=1688')] h-90">
  <div class="text-center my-auto pt-48">
    <p class="text-5xl font-bold text-[#fff] ">@lang('lang.ver_becomePerf')</p>
    <p class="mt-8 mb-12 text-[#fff] text-2xl">@lang('lang.ver_uSerHelps')</p>
      @auth
        <a href="{{ route('task.search') }}">
            @else
                <a href="/register">
            @endauth
          <button  class="px-10 py-4 font-sans  text-lg  font-semibold bg-[#ff8a00] text-[#fff] hover:bg-orange-500 rounded-md text-xl">
            @lang('lang.ver_becomePrefBtn')
          </button>
        </a>
  </div>
</div>


    <div class="w-10/12 mx-auto text-center mb-16">
      <h1 class="text-5xl font-bold">@lang('lang.ver_advantage')</h1>
      <p class="font-bold mt-16">@lang('lang.ver_becomePref2')</p>
        <div class="grid md:grid-cols-4 grid-cols-1 gap-4 pt-16 container mx-auto font-bold text-xl">
          <div>
            <img class="mx-auto" src="{{asset('images/User_money.png')}}" alt="#">
             <p>@lang('lang.ver_goodSalary')</p>
          </div>
          <div>
            <img class="mx-auto" src="{{asset('images/User_watch.png')}}" alt="#">
            <p>@lang('lang.ver_freeTime')</p>
          </div>
          <div>
            <img class="mx-auto" src="{{asset('images/User_security.png')}}" alt="#">
            <p>@lang('lang.ver_safeService')</p>
          </div>
          <div>
            <img class="mx-auto" src="{{asset('images/User_cash.png')}}" alt="#">
            <p>@lang('lang.ver_addsEconomy')</p>
          </div>
        </div>
    </div>

        <div class="zakza w-9/12 mx-auto text-center font-serif mb-32 mt-32">
          <div class="info">
              <h2 class="zakaz_title font-sans text-5xl pb-8 font-bold">@lang('lang.ver_howToGetTask')</h2>
              <p class="zakaz_text font-sans text-xl pb-16 font-medium">@lang('lang.ver_perfsChoose')</p>
              <div class="process grid lg:grid-cols-5 grid-cols-1 items-center">
                  <div class="info ">
                      <div>
                      <p class="process_number text-[#9e69c7] text-[56px] pb-[22px]">1</p>
                      <p class="process_text text-lg text-black">@lang('lang.ver_becomePerf3')</p>
                      </div>
                  </div>
                  <div>
                      <img class="object-cover lg:block hidden   w-10/12 shrink" src="{{asset('images/arrow.svg')}}" alt="">
                  </div>
                  <div class="info ">
                      <div>
                          <p class="process_number text-[#9e69c7] text-[56px] pb-[22px]">2</p>
                          <p class="process_text text-lg text-black">@lang('lang.ver_chooseTask')</p>
                      </div>
                  </div>
                  <div>
                      <img class="object-cover lg:block hidden   w-10/12 shrink" src="{{asset('images/arrow.svg')}}" alt="">
                  </div>
                  <div class="info ">
                      <div>
                          <p class="process_number text-[#9e69c7] text-[56px] pb-[22px]">3</p>
                          <p class="process_text text-lg text-black">@lang('lang.ver_takeMoney')</p>
                      </div>
                  </div>


              </div>
          </div>
            @auth
                <a href="{{ route('task.search') }}">
                    @else
                        <a href="/register">
                            @endauth
                            <button  class="font-sans mt-8 text-lg  font-semibold bg-[#ff8a00] text-[#fff] hover:bg-orange-500 px-10 py-4 rounded">
                              @lang('lang.ver_becomePrefBtn')
                            </button>
                        </a>
      </div>


    {{-- 1 --}}
    <div class="grid lg:grid-cols-3 grid-cols-2 container mx-auto">
        <div class="col-span-2 xl:mr-0 mr-8 md:mx-0 mx-6">
          <img  src="{{asset('images/performer1.jpg')}}" alt="#">
        </div>
        <div class="col-span-2 lg:col-span-1 lg:mt-0 mt-8  lg:text-left text-center">
          <h1 class="font-bold text-3xl">@lang('lang.ver_goodSalary')</h1>
          <p class="mt-6 text-lg">@lang('lang.ver_earnByTasks')</p>
            <div>
              <hr class="mt-8 mb-8">
              <p class="mb-16">@lang('lang.ver_maxOrder')</p>
                @auth
                    <a href="{{ route('task.search') }}">
                        @else
                            <a href="/register">
                                @endauth
                <button  class="font-sans  text-lg  font-semibold bg-[#ff8a00] text-[#fff] hover:bg-orange-500 px-10 py-4 rounded">
                  @lang('lang.ver_startEarning')
                </button>
              </a>
            </div>
        </div>
    </div>

    {{-- 2 --}}
    <div class="grid lg:grid-cols-3 grid-cols-2 container mx-auto mt-32 ">
      <div class="col-span-2 lg:col-span-1 lg:mt-0 mt-8 lg:block hidden lg:text-left text-center xl:mr-0 mr-8">
        <h1 class="font-bold text-3xl">@lang('lang.ver_freeTime')</h1>
        <p class="mt-6 text-lg">.@lang('lang.ver_workForYourserf')</p>
          <div>
            <hr class="mt-12 mb-8">
            <p class="mb-24">@lang('lang.ver_opinion')</p>
              @auth
                  <a href="{{ route('task.search') }}">
                      @else
                          <a href="/register">
                              @endauth
              <button  class="font-sans  text-lg  font-semibold bg-[#ff8a00] text-[#fff] hover:bg-orange-500 px-10 py-4 rounded">
                @lang('lang.ver_startEarningForY')
              </button>
            </a>
          </div>
      </div>
      <div class="col-span-2 mx-auto mr-8 lg:block hidden">
        <img  src="{{asset('images/performer2.jpg')}}" alt="#">
      </div>

      <div class="col-span-2 mx-auto mr-8 lg:hidden block md:ml-0 ml-6">
        <img  src="{{asset('images/performer2.jpg')}}" alt="#">
      </div>
      <div class="col-span-2 lg:col-span-1 lg:mt-0 mt-8 lg:hidden block lg:text-left text-center">
        <h1 class="font-bold text-3xl">@lang('lang.ver_freeTime')</h1>
        <p class="mt-6 text-lg">@lang('lang.ver_workForYourserf')</p>
          <div>
            <hr class="mt-12 mb-8">
            <p class="mb-24">@lang('lang.ver_opinion')</p>
              @auth
                  <a href="{{ route('task.search') }}">
                      @else
                          <a href="/register">
                              @endauth
              <button  class="font-sans  text-lg  font-semibold bg-[#ff8a00] text-[#fff] hover:bg-orange-500 px-10 py-4 rounded">
                @lang('lang.ver_startEarningForY')
              </button>
            </a>
          </div>
      </div>
    </div>

    {{-- 3 --}}
    <div class="grid lg:grid-cols-3 grid-cols-2 container mx-auto mt-32 ">
      <div class="col-span-2 xl:mr-0 mr-8 md:mx-0 mx-6">
        <img  src="{{asset('images/performer3.jpg')}}" alt="#">
      </div>
      <div class="col-span-2 lg:col-span-1 lg:mt-0 mt-8 lg:text-left text-center">
        <h1 class="font-bold text-3xl">@lang('lang.ver_serviceSec')</h1>
        <p class="mt-6 text-lg">Ч@lang('lang.ver_readFeedbacks')</p>
          <div>
            <hr class="mt-12 mb-8">
            <p class="mb-24">@lang('lang.ver_securityDescr')</p>
              @auth
                  <a href="{{ route('task.search') }}">
                      @else
                          <a href="/register">
                              @endauth
              <button  class="font-sans  text-lg  font-semibold bg-[#ff8a00] text-[#fff] hover:bg-orange-500 px-10 py-4 rounded">
                @lang('lang.ver_getPerfStatus')
              </button>
            </a>
          </div>
      </div>
    </div>

    {{-- 4 --}}
    <div class="grid lg:grid-cols-3 grid-cols-2 container mx-auto mt-32 ">
      <div class="col-span-2 lg:col-span-1 lg:mt-0 mt-8 lg:block hidden lg:text-left text-center xl:mr-0 mr-8">
        <h1 class="font-bold text-3xl">@lang('lang.ver_addsEconomy')</h1>
        <p class="mt-6 text-lg">@lang('lang.ver_addsDescr')</p>
          <div>
            <hr class="mt-12 mb-8">
            <p class="mb-24">@lang('lang.ver_opinion2')</p>
              @auth
                  <a href="{{ route('task.search') }}">
                      @else
                          <a href="/register">
                              @endauth
              <button  class="font-sans  text-lg  font-semibold bg-[#ff8a00] text-[#fff] hover:bg-orange-500 px-10 py-4 rounded">
                @lang('lang.ver_becomePrefBtn')
              </button>
            </a>
          </div>
      </div>
      <div class="col-span-2  mx-auto mr-8 lg:block hidden ">
        <img  src="{{asset('images/performer4.jpg')}}" alt="#">
      </div>

      <div class="col-span-2  mx-auto mr-8 lg:hidden block md:ml-0 ml-6">
        <img  src="{{asset('images/performer4.jpg')}}" alt="#">
      </div>
      <div class="col-span-2 lg:col-span-1 lg:mt-0 mt-8 lg:hidden block lg:text-left text-center">
        <h1 class="font-bold text-3xl">@lang('lang.ver_addsEconomy')</h1>
        <p class="mt-6 text-lg">@lang('lang.ver_addsDescr')</p>
          <div>
            <hr class="mt-12 mb-8">
            <p class="mb-24"> клиентами.@lang('lang.ver_opinion2')</p>
              @auth
                  <a href="{{ route('task.search') }}">
                      @else
                          <a href="/register">
                              @endauth
              <button  class="font-sans  text-lg  font-semibold bg-[#ff8a00] text-[#fff] hover:bg-orange-500 px-10 py-4 rounded">
                @lang('lang.ver_becomePrefBtn')
              </button>
            </a>
          </div>
      </div>
    </div>




        <div class="w-10/12 mx-auto text-center sm:mt-48 mt-16 mb-16">
          <h1 class="font-bold text-5xl">@lang('lang.ver_partnershipT')</h1>
          <p class="text-xl mt-8 font-medium">@lang('lang.ver_noTaxes')</p>
        </div>

        <div class="w-10/12 mx-auto grid md:grid-cols-2 grid-cols-1 container mx-auto mb-16">
            <div class="grid-cols-1  float-left p-8 rounded-lg w-5/6 shadow-2xl md:ml-0 mx-auto md:mb-0 mb-8">
                <div class="float-left">
                  <h1 class="font-medium text-2xl">@lang('lang.ver_unlim')</h1>
                  <p class="mt-4">@lang('lang.ver_unlimFeedbacks')</p>
                  <button class="bg-transparent mt-10  text-black-700 font-semibold  py-2 px-4 border border-slate-400 hover:border-slate-900 rounded">
                      @lang('lang.ver_chooseTariff')
                  </button>
                </div>
                  <div class="float-right ">
                      <img class="w-24 h-24" src="{{asset('images/unlim_User.svg')}}" alt="#">
                  </div>
            </div>

            <div class="grid-cols-1 float-right p-8 rounded-lg w-5/6 shadow-2xl md:mr-0  mx-auto ">
              <div class="float-left">
                <h1 class="font-medium text-2xl">@lang('lang.ver_basicTariff')</h1>
                <p class="mt-4">@lang('lang.ver_fixedFeedbacks')</p>
                <button class="bg-transparent mt-10  text-black-700 font-semibold  py-2 px-4 border border-slate-400 hover:border-slate-900 rounded">
                   @lang('lang.ver_chooseTariff')
                </button>
              </div>
                <div class="float-right">
                    <img class="w-24 h-24" src="{{asset('images/basic_User.svg')}}" alt="#">
                </div>
            </div>
        </div>


       <div class="text-center sm:mt-48 mt-16 mb-16">
            <h1 class="font-bold text-5xl">@lang('lang.ver_getYourGoals')</h1>
            <p class="text-xl mt-8 font-medium">@lang('lang.ver_everyday')</p>
       </div>

      <div class="grid lg:grid-cols-3 grid-cols-2 container mx-auto">
          <div class="col-span-2">
            <iframe class="rounded-lg h-full w-5/6 mx-auto" width="644" height="362" src="https://www.youtube.com/embed/2J7xlDH4QkA" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
          </div>
          <div class="col-span-2 lg:col-span-1 lg:mt-0 mt-8 lg:text-left text-center">
            <p class=" text-lg">@lang('lang.ver_independance')</p>
              <h1 class="font-bold text-6xl mt-4">65 000</h1>
           <p class="text-lg font-medium mt-4">@lang('lang.ver_avarageSCour')</p>
            <div class="mt-16">
                @auth
                    <a href="{{ route('task.search') }}">
                        @else
                            <a href="/register">
                                @endauth
                <button  class="font-sans  text-lg  font-semibold bg-[#ff8a00] text-[#fff] hover:bg-orange-500 px-10 py-4 rounded">
                  @lang('lang.ver_becomePrefBtn')
                </button>
              </a>
            </div>
          </div>
      </div>


        <div class="grid md:grid-cols-3 grid-cols-1 container mx-auto  md:mt-32 mt-16 md:mb-32 mb-16">
            <div class="grid-cols-1 shadow-2xl p-8 rounded-lg md:mt-0 mt-8">
                <p class="text-lg">@lang('lang.ver_opinion3')</p>
                <a class="text-lg text-slate-400 hover:text-cyan-400 underline" href="#">@lang('lang.ver_readMore')</a>
            </div>
            <div class="grid-cols-1 shadow-2xl p-8 rounded-lg ml-4 mr-4 md:mt-0 mt-8">
                <p class="text-lg">@lang('lang.ver_opinion4')</p>
                <a class="text-lg text-slate-400 hover:text-cyan-400 underline" href="#">@lang('lang.ver_readMore')</a>
            </div>
            <div class="grid-cols-1 shadow-2xl p-8 rounded-lg md:mt-0 mt-8">
              <p class="text-lg">@lang('lang.ver_opinion5')</p>
              <a class="text-lg text-slate-400 hover:text-cyan-400 underline" href="#">@lang('lang.ver_readMore')</a>
            </div>
        </div>

      <div class="grid lg:grid-cols-3 grid-cols-2 container mx-auto mt-16  mb-0">
        <div class="col-span-2 lg:col-span-1 lg:mt-0 mt-8 lg:block hidden lg:text-left text-center">
          <p class=" text-lg">@lang('lang.ver_opinion6')</p>
            <h1 class="font-bold text-6xl mt-4">70 000</h1>
         <p class="text-lg font-medium mt-4">@lang('lang.ver_avarageSPhoto')</p>
          <div class="mt-16">
              @auth
                  <a href="{{ route('task.search') }}">
                      @else
                          <a href="/register">
                              @endauth
              <button  class="font-sans  text-lg  font-semibold bg-[#ff8a00] text-[#fff] hover:bg-orange-500 px-10 py-4 rounded">
                @lang('lang.ver_becomePrefBtn')
              </button>
            </a>
          </div>
        </div>
        <div class="col-span-2 lg:block hidden mx-auto mr-8">
          <iframe class="rounded-lg h-full" width="644" height="362" src="https://www.youtube.com/embed/2J7xlDH4QkA" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>

        <div class="col-span-2 lg:hidden block mx-auto ">
        <iframe class="rounded-lg h-full sm:h-[300px] w-full sm:w-[600px]" src="https://www.youtube.com/embed/2J7xlDH4QkA" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>
        <div class="col-span-2 lg:col-span-1 lg:mt-0 mt-8 lg:hidden block lg:text-left text-center">
          <p class="mt-6 text-lg">@lang('lang.ver_opinion7')</p>
            <h1 class="font-bold text-6xl mt-4">70 000</h1>
         <p class="text-lg font-medium mt-4">@lang('lang.ver_avarageS3')</p>
          <div class="mt-16">
              @auth
                  <a href="{{ route('task.search') }}">
                      @else
                          <a href="/register">
                              @endauth
              <button  class="font-sans  text-lg  font-semibold bg-[#ff8a00] text-[#fff] hover:bg-orange-500 px-10 py-4 rounded">
                @lang('lang.ver_becomePrefBtn')
              </button>
            </a>
          </div>
        </div>
    </div>



@endsection
