@extends("layouts.app")



@section("content")


    <script>
        let var_for_id_task = null;
    </script>
    <!-- Information section -->
    <!-- <form class="" action="" method="post"> -->

    {{--    Created Road map for Create a New Tast--}}
    <x-roadmap/>
    <div class="mx-auto lg:w-2/3 w-4/5 my-16">
        <div class="grid grid-cols-3  lg:gap-x-20 md:gap-x-14 h-full">
            <div class="md:col-span-2 col-span-3">
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
                <div class="shadow-2xl w-full md:p-16 p-4 mx-auto my-4 rounded-2xl	w-full">
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
                                    class="shadow sm:text-base text-sm  border focus:shadow-orange-500 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none "
                                    id="username" type="text" placeholder="@lang('lang.name_example')" required name="name" value="{{session('neym')}}">
                            </div>
                            <p class="text-base text-gray-600 mt-10">@lang('lang.name_chooseOtherCat')</p>
                            <div id="categories">

                            <div class="justify-center flex md:flex-row flex-col">
  <div class="my-3 xl:w-50 pr-0 md:pr-2">
    <select onchange="func_for_select(Number(this.options[this.selectedIndex].value));" class="form-select
      block
      w-full
      px-3
      py-1.5
      text-base
      font-normal
      text-gray-700
      bg-white bg-clip-padding bg-no-repeat
      border border-solid border-gray-300
      rounded
      transition
      ease-in-out
      m-0
      focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" aria-label="Default select example">

        <option  disabled>@lang('lang.name_chooseOne')</option>
        @foreach (\TCG\Voyager\Models\Category::withTranslations(['ru', 'uz'])->where('parent_id', null)->get() as $cat_for_p)
        <option  {{$current_category->parent_id == $cat_for_p->id? 'selected':''}} value="{{$cat_for_p->id}}">{{ $cat_for_p->getTranslatedAttribute('name',Session::get('lang') , 'fallbackLocale') }}</option>
        @endforeach
    </select>
  </div>
  @foreach (\TCG\Voyager\Models\Category::withTranslations(['ru', 'uz'])->where('parent_id', null)->get() as $cat_for_ch)
  <div id="for_filter_select{{ $cat_for_ch->id }}" class="my-3 xl:w-50 for_all_hid_ch">
    <select onchange="window.location.href = this.options[this.selectedIndex].value" class="form-select
      block
      w-full
      px-3
      py-1.5
      text-base
      font-normal
      text-gray-700
      bg-white bg-clip-padding bg-no-repeat
      border border-solid border-gray-300
      rounded
      transition
      ease-in-out
      m-0
      focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" aria-label="Default select example">
        <option  disabled>Выберите один из пунктов</option>
        @foreach (\TCG\Voyager\Models\Category::withTranslations(['ru', 'uz'])->where('parent_id', $cat_for_ch->id)->get() as $category2)
        <option {{$current_category->id == $category2->id? 'selected':''}} value="/task/create?category_id={{ $category2->id }}">{{ $category2->getTranslatedAttribute('name',Session::get('lang') , 'fallbackLocale') }}</option>
        @endforeach
    </select>
  </div>
  @endforeach
</div>

<script>

    func_for_select(Number(<? echo $current_category->parent_id ?>));

function func_for_select(id) {

$('.for_all_hid_ch').addClass('hidden');

$('#for_filter_select'+ id +'').removeClass('hidden');
};
</script>


                            </div>
                        </div>
                        <input type="submit"
                               class="bg-green-500 hover:bg-green-500 w-11/12 md:ml-5 ml-2 my-4 cursor-pointer text-white font-bold md:py-5 py-1 px-5 rounded"
                               name="" value="@lang('lang.name_next')">
                    </form>
                </div>
            </div>

            <x-faq>
            {{--            Created Component for Frequently Asked Questions--}}
            </x-faq>
        </div>
    </div>
    <!-- </form> -->


@endsection


@section("javasript")

    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>

@endsection
