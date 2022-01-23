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
                                        Reports
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        @foreach( $columns as $get_name_of )
                                            <td class="no-sort no-click bread-actions">
                                                {{ $get_name_of->Field }}
                                            </td>
                                        @endforeach
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="pull-left">
                        @foreach($task_parent as $parent_name)
                                <div role="status" class="show-res" aria-live="polite">
                                    {{ $parent_name->id }} {{ $parent_name->name }}
                                </div>
                        @endforeach
                    </div>
                        <div class="pull-right">
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop
