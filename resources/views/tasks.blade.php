@extends('layouts.app')

@section('content')
    <div class="container d-flex justify-content-center">
        <div class="col-6">
            <div class="panel-body">
                @include('common.errors')

                <form action="{{ route('tasks.store') }}" method="POST" class="form-horizontal">
                    @csrf
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="task" class="col-sm-12 control-label">{{ trans('tasks.task') }}</label>

                                <div class="col-sm-12">
                                    <input type="text" name="name" id="task-name" class="form-control" placeholder="{{ trans('tasks.input') }}...">
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <div class="col-sm-offset-12 col-sm-12">
                                    <button type="submit" class="btn btn-light">
                                        <i class="fa fa-plus"></i> {{ trans('tasks.add_task') }}
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            @if (isset($tasks) && count($tasks) > 0)
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('tasks.current_tasks') }}
                </div>

                <div class="panel-body">
                    <table class="table table-striped task-table">
                        <thead>
                            <th>{{ trans('tasks.task') }}</th>
                            <th>&nbsp;</th>
                        </thead>
                        <tbody>
                        @foreach ($tasks as $task)
                            <tr>
                                <td class="table-text">
                                    <div>{{ $task->name }}</div>
                                </td>
                                <td>
                                    <form action="{{ route('tasks.destroy', ['task' => $task->id]) }}" method="POST">
                                        @csrf
                                        @method('delete')

                                        <button type="submit" class="btn btn-danger">
                                            <i class="fa fa-trash"></i> {{ trans('tasks.delete') }}
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @endif
@endsection
