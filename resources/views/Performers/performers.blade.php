@extends('layouts.app')

@section('content')

    <div class="flex flex-row container mx-auto mx-40 my-8">

{{-----------------------------------------------------------------------------------}}
{{--                             Left column                                       --}}
{{-----------------------------------------------------------------------------------}}

        <div class="flex flex-col basis-1/3 px-8">
            <div class="flex flex-row shadow-lg rounded-lg mb-8">
                <div class="basis-1/2 h-24 bg-contain bg-no-repeat bg-center" style="background-image: url(images/like.png);">
                </div>
                <div class="basis-1/2 text-xs text-gray-700 text-left my-auto">
                    Станьте исполнителем <br> U-ser. И начните <br> зарабатывать.   
                </div>
            </div>

            <div>
                <div class="bg-white max-w-xl mx-auto">
                    @foreach($categories as $category)
                        @if ($category->parent_id == NULL)     
                            <label for="categories"></label>
                            <select name="categories" id="categories" class="relative">
                                <option value="{{ $category->id }}">
                                    <div class="flex items-center justify-between mb-4">
                                        <span class="text-left font-bold text-blue-500 focus:text-[#000]">
                                            {{$category->name}}				
                                        </span>
                                    </div>		
                                </option>
                                
                                @foreach($child_categories as $child_category)
                                    @if ($category->id == $child_category->parent_id)
                                        <option value="{{ $child_category->id }}">
                                            <div>
                                                <div class="ml-4 text-blue-500">
                                                    <a href="#" class="hover:text-[#ff0000]">{{ $child_category->name }}</a>  
                                                </div>
                                            </div>
                                        </option>
                                    @endif
                                @endforeach
                            </select>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>

{{-----------------------------------------------------------------------------------}}
{{--                             Right column                                      --}}
{{-----------------------------------------------------------------------------------}}

        <div class="flex flex-col basis-2/3">
            <div class="bg-gray-100 flex flex-row h-40 mb-10" style="width: 700px;">
                <div class="flex flex-col relative">
                    <div class="flex flex-row font-bold text-2xl m-4">
                        <p>Курьерские услуги: рейтинг исполнителей</p>
                    </div> 
                    <div class="flex flex-row m-4 absolute bottom-0 left-0">
                        <div class="form-check flex flex-row mr-6">
                            <input class="form-check-input h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-yellow-600 checked:border-yellow-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" value="" id="verified">
                            <label class="form-check-label inline-block text-gray-800" for="verified">
                                Только проверенные
                            </label>
                        </div>
                        <div class="form-check flex flex- mr-6">
                            <input class="form-check-input h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-black-600 checked:border-black-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" value="" id="online">
                            <label class="form-check-label inline-block text-gray-800" for="online">
                                Сейчас на сайте
                            </label>
                        </div>
                    </div>
                </div>
                <div class="flex flex-col m-4 relative">
                    <div>
                        <p>Город: <a href="#"> Москва </a> </p>
                    </div>
                    <div class="absolute bottom-0 right-0">
                        <p>Указать метро</p>
                    </div>
                </div>
            </div>
            
            <div class="flex flex-row">
                <div class="m-10">
                    <img class="rounded-lg w-40 h-40" src="{{ asset('images/user1.jpg') }}" alt="user">
                    <div class="flex flex-row">
                        <p>Отзывы:</p>
                        <i class="far fa-thumbs-up m-1 text-gray-400"></i>    5128
                        <i class="far fa-thumbs-down m-1 text-gray-400"></i>  21
                    </div>
                    <div class="flex flex-row">
                        <i class="fas fa-star text-yellow-500"></i>
                        <i class="fas fa-star text-yellow-500"></i>
                        <i class="fas fa-star text-yellow-500"></i>
                        <i class="fas fa-star text-yellow-500"></i>
                        <i class="fas fa-star text-yellow-500"></i>
                    </div>
                </div>
                <div class="my-10">
                    <div class="flex flex-row">
                        <p class="text-3xl underline text-blue-500">Денис Б.</p>
                        <img class="h-8 ml-2" src="{{ asset('images/icon_year.svg') }}">
                        <img class="h-8 ml-2" src="{{ asset('images/icon_shield.png') }}">
                        <img class="h-8 ml-2" src="{{ asset('images/icon_bag.png') }}">
                    </div>
                    <div>
                        <p class="text-sm text-gray-500 my-3">Был на сайте 9 мин. назад</p>
                    </div>
                    <div>
                        <p class="text-base" style="width: 500px;">
                            Добрый день! В штате опытные и проверенные курьеры . 
                            На практике прошли все виды курьерских доставок . 
                            За всех курьеров несу материальную ответственность . Способы опл…
                        </p>
                    </div>
                    <div>
                        <button class="rounded-lg py-2 px-3 font-bold bg-yellow-500 text-white mt-3">Предложить задание</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('javasript')
    <script src="//unpkg.com/alpinejs" defer></script>
@endsection