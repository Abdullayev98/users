@extends("layouts.app")

@section("content")
    <div class="flex flex-row">
        <a class="b-tasks__tab i-active" data-tab="all">Все задания</a>
        <li class="b-tasks__tab" data-tab="recommended">Рекомендованные</li>

    </div>
    <div class="f-1 w-full bg-gray-200"></div>
@endsection
