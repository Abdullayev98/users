@extends("layouts.app")

@section('style')

    <style>
        .selectboxit-container .selectboxit, .selectboxit-container .selectboxit-options {
            width: 600px; /* Width of the dropdown button */
            border-radius: 0;
            max-height: 240px;
        }

        .selectboxit-options .selectboxit-option .selectboxit-option-anchor {
            white-space: normal;
            min-height: 30px;
            height: auto;
        }

    </style>
@endsection

@section("content")


    <script>
        let var_for_id_task = null;
    </script>
    <!-- Information section -->
    <!-- <form class="" action="" method="post"> -->

    {{--    Created Road map for Create a New Tast--}}
    <div class="mx-auto lg:w-2/3 w-4/5 my-16">
        <div class="grid grid-cols-3   lg:gap-x-8 md:gap-x-0.5 h-full">
            <div class="md:col-span-2  col-span-3">
                <div class="w-full text-center md:text-2xl text-xl">
                    @lang('lang.name_helpToFind')
                </div>
                <div class="w-full text-center my-4 text-gray-400">
                    @lang('lang.name_percent')
                </div>
                <div class="pt-1">
                    <div class="overflow-hidden h-2 text-xs flex rounded bg-gray-200 mx-auto ">
                        <div style="width: 14%"
                             class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-green-500"></div>
                    </div>
                </div>
                <div class="shadow-2xl w-full lg:p-16 p-4 mx-auto my-4 rounded-2xl	w-full">
                    <div class="py-4 md:w-1/2 w-full mx-auto px-auto text-center md:text-3xl text-xl texl-bold">
                        @lang('lang.name_howCanWeHelpU')
                    </div>
                    <form action="{{route("task.create.name.store")}}" method="post">
                        @csrf
                        <input type="hidden" name="category_id" value="{{$current_category->id}}">

                        <div class="py-4 w-11/12 mx-auto px-auto text-left my-4">
                            <div class="mb-4">
                                <label class="block text-gray-400 text-sm mb-2" for="username">
                                    @lang('lang.name_taskName')
                                </label>
                                <input
                                    class="shadow sm:text-base text-sm  border focus:shadow-orange-500 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none
                                    focus:border-yellow-500 "
                                    id="username" type="text"
                                    placeholder="@lang('lang.name_example') {{ $current_category->getTranslatedAttribute('name') }}"
                                    required name="name" value="{{session('neym')}}">
                            </div>
                            <p class="text-base text-gray-600 mt-10">@lang('lang.name_chooseOtherCat')</p>
                            <div id="categories">
                                <div class="flex ">
                                    <div class="w-1/2 pr-3 py-5">
                                        <select class="select2 parent-category "
                                                style="width: 100%"
                                        >
                                            @foreach(getCategoriesByParent(null) as $parentCategory)
                                                <option value="{{ $parentCategory->id }}">{{ $parentCategory->getTranslatedAttribute('name') }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="w-1/2 pl-3 py-5">
                                        @foreach(getCategoriesByParent(null) as $category)

                                            <div class="hidden child-category child-category-{{ $category->id }}">
                                                <select class="select2  child-category1"
                                                        style="width: 100%"
                                                >
                                                    @foreach($category->childs as $child)
                                                        <option value="{{ $child->id }}" class="hidden" data-parent="{{ $child->parent_id }}">{{ $child->getTranslatedAttribute('name') }}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                        @endforeach

                                    </div>
                                </div>



                        </div>
                        <input type="submit"
                               class="bg-green-500 hover:bg-green-500 w-full mx-0 my-4 cursor-pointer text-white font-bold md:py-5 py-1 px-5 rounded"
                               name="" value="@lang('lang.name_next')">
                        </div>

                    </form>
                </div>
            </div>

            <x-faq>
                {{--            Created Component for Frequently Asked Questions--}}
            </x-faq>
        </div>
    </div>
    <!-- </form> -->

    <script src="{{ asset('plugins/select2/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('plugins/select2/js/maximize-select2-height.min.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.min.css') }}">

    <script>
        $('.select2').select2({
            minimumResultsForSearch: Infinity,
        }).maximizeSelect2Height()

        let parentCategory = $(".parent-category").val();

        $(".parent-category").change(function (){
            $('.child-category').removeClass('hidden')
            $('.child-category').addClass('hidden')
            $('.child-category-'+$(this).val()).removeClass('hidden')

        })
        $('.child-category1').change(function (){
            window.location.href = "/task/create?category_id=" + $(this).val();

        })

        $('.child-category-'+parentCategory+'').removeClass('hidden')

    </script>

    <style>
        .select2-selection{
            height: 40px!important;
        }
        .select2-selection__rendered{
            padding: 5px 30px!important;
            font-size:16px;
        }
        ul.select2-results__options {
            min-height: 400px;
        }
        .select2-selection__arrow{
            margin: 5px;
        }
        .select2-results__option{
            font-size:16px;
        }
    </style>

@endsection


@section("javasript")

    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>

@endsection
