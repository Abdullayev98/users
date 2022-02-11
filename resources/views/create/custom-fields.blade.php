@if($data->type == 'select')
    @if($data->title !== "")
        <div class="py-4 mx-auto px-auto text-center text-3xl texl-bold">
            {{ $data->getTranslatedAttribute('title',Session::get('lang') , 'fallbackLocale') }}
        </div>
    @endif
    @if($data->description !== "")
        <div class="py-4 mx-auto px-auto text-center text-sm texl-bold">
            {{ $data->getTranslatedAttribute('description',Session::get('lang') , 'fallbackLocale') }}
        </div>
    @endif
    <div class="py-4 mx-auto  text-left ">
        <div class="mb-4">
            <div id="formulario" class="flex flex-col gap-y-4">

                {{ $data->getTranslatedAttribute('label',Session::get('lang') , 'fallbackLocale') }}
                <select id="where" name="{{$data->name}}[]"
                        class="shadow appearance-none border focus:shadow-orange-500 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none"
                        required>

                    @foreach($data->options['options'] as $key => $option)
                        <option @if($key == $data->values) selected
                                @endif value="{{$option}}">{{$option}}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
    <div class="border-b-4"></div>
@endif
@if($data->type == 'checkbox')


    @if($data->title !== "")
        <div class="py-4 mx-auto px-auto text-center text-3xl texl-bold">
            {{ $data->getTranslatedAttribute('title',Session::get('lang') , 'fallbackLocale') }}
        </div>
    @endif
    @if($data->description !== "")
        <div class="py-4 mx-auto px-auto text-center text-sm texl-bold">
            {{ $data->getTranslatedAttribute('description',Session::get('lang') , 'fallbackLocale') }}
        </div>
    @endif

    <div class="py-4 mx-auto  text-left ">
        <div class="mb-4">
            <div id="formulario" class="flex flex-col gap-y-4">

                <div>

                    <div class="mb-3 xl:w-full">

                        @foreach($data->options['options'] as $key => $option)
                            <label class="md:w-2/3 block mt-6">
                                <input @if($key == $data->values) checked
                                       @endif class="mr-2  h-4 w-4" type="checkbox"
                                       value="{{$option}}" name="{{$data->name}}[]">
                                <span class="text-slate-900">
                                                    {{$option}}
                                                    </span>
                            </label>
                        @endforeach

                    </div>
                </div>

                <div>
                    <!-- <span class="underline hover:text-gray-400 decoration-dotted cursor-pointer float-right">Приватная информация</span> -->
                </div>


            </div>
        </div>
    </div>

    <div class="border-b-4"></div>
@endif
@if($data->type == 'radio')


    @if($data->title !== "")
        <div class="py-4 mx-auto px-auto text-center text-3xl texl-bold">
            {{ $data->getTranslatedAttribute('title',Session::get('lang') , 'fallbackLocale') }}
        </div>
    @endif
    @if($data->description !== "")
        <div class="py-4 mx-auto px-auto text-center text-sm texl-bold">
            {{ $data->getTranslatedAttribute('description',Session::get('lang') , 'fallbackLocale') }}
        </div>
    @endif

    <div class="py-4 mx-auto  text-left ">
        <div class="mb-4">
            <div id="formulario" class="flex flex-col gap-y-4">

                <div>

                    <div name="glassSht" class="mb-3 xl:w-full">

                        @foreach($data->options['options'] as $key => $option)

                            <input @if($key == $data->values) checked
                                   @endif type="radio"
                                   id="{{$key}}" name="{{$data->name}}[]"
                                   value="{{$option}}">
                            <label for="1">{{$option}}</label>
                            <br><br>
                        @endforeach

                    </div>
                </div>

                <div>
                    <!-- <span class="underline hover:text-gray-400 decoration-dotted cursor-pointer float-right">Приватная информация</span> -->
                </div>


            </div>
        </div>
    </div>

    <div class="border-b-4"></div>
@endif
@if($data->type == 'input')
    @if($data->title !== "")
        <div class="py-4 mx-auto px-auto text-center text-3xl texl-bold">
            {{ $data->getTranslatedAttribute('title') }}
        </div>
    @endif
    @if($data->description !== "")
        <div class="py-4 mx-auto px-auto text-center text-sm texl-bold">
            {{ $data->getTranslatedAttribute('description') }}
        </div>
    @endif

    <div class="py-4 mx-auto  text-left ">
        <div class="mb-4">
            <div id="formulario" class="flex flex-col gap-y-4">
                {{ $data->getTranslatedAttribute('label') }}
                <input
                    placeholder="{{ $data->getTranslatedAttribute('placeholder') }}"
                    id="car" name="{{$data->name}}[]" type="text"
                    class="shadow appearance-none border focus:shadow-orange-500 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none"
                    required>

            </div>
        </div>
    </div>
@endif
