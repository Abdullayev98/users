@if($data->type == 'select')
    @if($data->title !== "")
        <div class="py-4 mx-auto px-auto text-center text-3xl texl-bold">
            {{ $data->getTranslatedAttribute('title')}}
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
                <select id="where" name="{{$data->name}}[]"
                        class="shadow appearance-none border focus:shadow-orange-500 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none"
                        required>

                    @foreach($data->options['options'] as $key => $option)
                        <option
                            @if(isset($task) && $task->custom_field_values()->where('custom_field_id', $data->id)->first() &&
    is_array( json_decode($task->custom_field_values()->where('custom_field_id', $data->id)->first()->value)) &&

    array_key_exists($key-1, json_decode($task->custom_field_values()->where('custom_field_id', $data->id)->first()->value)) &&
json_decode($task->custom_field_values()->where('custom_field_id', $data->id)->first()->value)[$key-1] == $option) selected
                            @endif
                            value="{{$option}}">{{$option}}</option>
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

                <div>

                    <div class="mb-3 xl:w-full">

                        @if(array_key_exists('options', $data->options))
                            @foreach($data->options['options'] as $key => $option)
                                <label class="md:w-2/3 block mt-6">
                                    <input
                                        @if(isset($task) && $task->custom_field_values()->where('custom_field_id', $data->id)->first() &&
    is_array( json_decode($task->custom_field_values()->where('custom_field_id', $data->id)->first()->value)) &&
    array_key_exists($key-1, json_decode($task->custom_field_values()->where('custom_field_id', $data->id)->first()->value)) &&
    json_decode($task->custom_field_values()->where('custom_field_id', $data->id)->first()->value, true)[$key-1] == $option) checked
                                        @endif
                                        class="mr-2  h-4 w-4" type="checkbox"
                                        value="{{$option}}" name="{{$data->name}}[]">

                                    <span class="text-slate-900">
                                                    {{$option}}
                                                    </span>
                                </label>
                            @endforeach
                        @endif

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
                                   @if(isset($task) && $task->custom_field_values()->where('custom_field_id', $data->id)->first() &&
    is_array( json_decode($task->custom_field_values()->where('custom_field_id', $data->id)->first()->value)) &&

    array_key_exists($key-1, json_decode($task->custom_field_values()->where('custom_field_id', $data->id)->first()->value)) &&
json_decode($task->custom_field_values()->where('custom_field_id', $data->id)->first()->value)[$key-1] == $option) checked
                                   @endif
                                   id="radio_{{$key}}" name="{{$data->name}}[]"
                                   value="{{$option}}">
                            <label for="radio_{{$key}}">{{$option}}</label>
                            <br>
                            <br>
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
                <?php

                $array = isset($task) && $task->custom_field_values()->where('custom_field_id', $data->id)->first() ? json_decode($task->custom_field_values()->where('custom_field_id', $data->id)->first()->value, true) : null;
                if (is_array($array) || is_array($array) && array_key_exists('_token', $array)) {

                    $array = end($array);

                }


                ?>
                <input
                    placeholder="{{ $data->getTranslatedAttribute('placeholder') }}"

                    id="car" name="{{$data->name}}[]" type="text" value="{{$array}}"
                    class="shadow appearance-none border focus:shadow-orange-500 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-yellow-500"
                    required>


            </div>
        </div>
    </div>
@endif
