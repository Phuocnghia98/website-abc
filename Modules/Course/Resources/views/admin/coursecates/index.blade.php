@extends('layouts.master')

@section('content-header')
    <h1>
        {{ trans('course::coursecates.title.coursecates') }}
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('dashboard.index') }}"><i class="fa fa-dashboard"></i> {{ trans('core::core.breadcrumb.home') }}</a></li>
        <li class="active">{{ trans('course::coursecates.title.coursecates') }}</li>
    </ol>
@stop

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="row">
                <div class="btn-group pull-right" style="margin: 0 15px 15px 0;">
                    <a href="{{ route('admin.course.coursecate.create') }}" class="btn btn-primary btn-flat" style="padding: 4px 10px;">
                        <i class="fa fa-pencil"></i> {{ trans('course::coursecates.button.create coursecate') }}
                    </a>
                </div>
            </div>
            <div class="box box-primary">
                <div class="box-header">
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="table-responsive">
                        <table class="data-table table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>{{ trans('course::coursecates.table.name') }}</th>
                                <th>{{ trans('course::coursecates.table.slug') }}</th>
                                <th>{{ trans('course::coursecates.table.status') }}</th>
                                <th>{{ trans('course::coursecates.table.description') }}</th>
                                <th>{{ trans('core::core.table.created at') }}</th>
                                <th data-sortable="false">{{ trans('core::core.table.actions') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if (isset($coursecates)): ?>
                            <?php foreach ($coursecates as $coursecate): ?>
                            <tr>
                                <td>
                                    <a href="{{ route('admin.course.coursecate.edit', [$coursecate->id]) }}">
                                        {{ $coursecate->name }}
                                    </a>
                                </td>
                                <td>
                                    <a href="{{ route('admin.course.coursecate.edit', [$coursecate->id]) }}">
                                        {{ $coursecate->slug }}
                                    </a>
                                </td>
                                <td>
                                    <a href="{{ route('admin.course.coursecate.edit', [$coursecate->id]) }}">
                                       @if ($coursecate->status==0)
                                       <span class=""><i class="fa fa-circle text-danger"></i> Disable</span>
                                       @else
                                       <span class=""><i class="fa fa-circle text-success"></i> Active</span>
                                       @endif
                                    </a>
                                </td>

                                <td>
                                    <a href="{{ route('admin.course.coursecate.edit', [$coursecate->id]) }}">
                                        {{   str_limit($coursecate->description, $limit = 30) }}...
                                    </a>
                                </td>

                                <td>
                                    <a href="{{ route('admin.course.coursecate.edit', [$coursecate->id]) }}">
                                        {{ $coursecate->created_at }}
                                    </a>
                                </td>
                                <td>
                                    <div class="btn-group">
                                        <a href="{{ route('admin.course.coursecate.edit', [$coursecate->id]) }}" class="btn btn-default btn-flat"><i class="fa fa-pencil"></i></a>
                                        <button class="btn btn-danger btn-flat" data-toggle="modal" data-target="#modal-delete-confirmation" data-action-target="{{ route('admin.course.coursecate.destroy', [$coursecate->id]) }}"><i class="fa fa-trash"></i></button>
                                    </div>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                            <?php endif; ?>
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>{{ trans('course::coursecates.table.name') }}</th>
                                <th>{{ trans('course::coursecates.table.slug') }}</th>
                                <th>{{ trans('course::coursecates.table.status') }}</th>
                                <th>{{ trans('course::coursecates.table.description') }}</th>
                                <th>{{ trans('core::core.table.created at') }}</th>
                                <th data-sortable="false">{{ trans('core::core.table.actions') }}</th>
                            </tr>
                            </tfoot>
                        </table>
                        <!-- /.box-body -->
                    </div>
                </div>
                <!-- /.box -->
            </div>
        </div>
    </div>
    @include('core::partials.delete-modal')
@stop

@section('footer')
    <a data-toggle="modal" data-target="#keyboardShortcutsModal"><i class="fa fa-keyboard-o"></i></a> &nbsp;
@stop
@section('shortcuts')
    <dl class="dl-horizontal">
        <dt><code>c</code></dt>
        <dd>{{ trans('course::coursecates.title.create coursecate') }}</dd>
    </dl>
@stop

@push('js-stack')
    <script type="text/javascript">
        $( document ).ready(function() {
            $(document).keypressAction({
                actions: [
                    { key: 'c', route: "<?= route('admin.course.coursecate.create') ?>" }
                ]
            });
        });
    </script>
    <?php $locale = locale(); ?>
    <script type="text/javascript">
        $(function () {
            $('.data-table').dataTable({
                "paginate": true,
                "lengthChange": true,
                "filter": true,
                "sort": true,
                "info": true,
                "autoWidth": true,
                "order": [[ 0, "desc" ]],
                "language": {
                    "url": '<?php echo Module::asset("core:js/vendor/datatables/{$locale}.json") ?>'
                }
            });
        });
    </script>
@endpush
