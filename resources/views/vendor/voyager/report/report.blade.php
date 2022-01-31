@extends('voyager::master')


@section('content')
    <div class="page-content browse container-fluid">
        @include('voyager::alerts')
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-bordered">
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table id="dataTable" class="table table-hover">
                                <thead>
                                <tr>
                                        @foreach( $columns as $get_name_of )
                                            <th class="no-sort no-click bread-actions">
                                                {{ $get_name_of->Field }}
                                            </th>
                                        @endforeach
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($task_parent as $parent)
                                @php
                                    $categories_array = \App\Models\Category::where('parent_id', $parent->id)->pluck('id')->toarray();
                                    $category_count = \App\Models\Task::whereIn('category_id', $categories_array)->count();                                        
                                    $categories_array1 = \App\Models\Category::where('parent_id', $parent->id)->pluck('id')->toarray();
                                    $category_count1 = \App\Models\Task::whereIn('category_id', $categories_array1)->pluck('budget')->toArray();                                        
                                    $budgets = str_replace(array('до', 'сум', 'от'), '', $category_count1);
                                    $all_budget = array_sum($budgets);                                
                                @endphp
                                    <tr>
                                        <td>
                                            {{$parent->id}}
                                        </td>
                                        <td>
                                            {{$parent->name}}
                                        </td>
                                        <td>
                                            <!-- @if($parent->parent_id == !null)
                                                @foreach($parent->tasks as $task)
                                                    {{ $task->name }}
                                                @endforeach
                                            @endif -->
                                            
                                            {{$category_count}}
                                        </td>
                                        <td>
                                        {{$all_budget}}
                                        </td>
                                        <td>
                                            {{$parent->created_at}}
                                        </td>
                                        <td>
                                            {{$parent->updated_at}}
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="pull-left">
                        
                    </div>
                        <div class="pull-right">
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop
