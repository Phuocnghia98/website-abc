@extends('layouts.master')

@section('content-header')
    <h1>
        {{ trans('course::courses.title.courses') }}
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('dashboard.index') }}"><i class="fa fa-dashboard"></i> {{ trans('core::core.breadcrumb.home') }}</a></li>
        <li class="active">{{ trans('course::courses.title.courses') }}</li>
    </ol>
@stop

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="row">
                <div class="btn-group pull-right" style="margin: 0 15px 15px 0;">
                    <a href="{{ route('admin.course.course.create') }}" class="btn btn-primary btn-flat" style="padding: 4px 10px;">
                        <i class="fa fa-pencil"></i> {{ trans('course::courses.button.create course') }}
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
                                <th>{{ trans('course::courses.table.image') }}</th>
                                <th>{{ trans('course::courses.table.title') }}</th>
                                <th>{{ trans('course::courses.table.slug') }}</th>
                                <th>{{ trans('course::courses.table.description') }}</th>
                                <th>{{ trans('course::courses.table.price') }}</th>
                                <th>{{ trans('course::courses.table.status') }}</th>
                                <th>{{ trans('course::courses.table.course_cates_id') }}</th>
                                <th>{{ trans('core::core.table.created at') }}</th>
                                <th data-sortable="false">{{ trans('core::core.table.actions') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if (isset($courses)): ?>
                            <?php foreach ($courses as $course): ?>
                            <tr>
                                <td>
                                    <a href="{{ route('admin.course.course.edit', [$course->id]) }}">
                                       @if ($course->filesByZone('image')->first())
                                       <img src="@thumbnail($course->filesByZone('image')->first()->path, 'mediumThumb')" alt="" /> 
                                       @endif
                                    </a>
                                </td>
                                <td>
                                    <a href="{{ route('admin.course.course.edit', [$course->id]) }}">
                                        {{ $course->title }}
                                    </a>
                                </td>
                                <td>
                                    <a href="{{ route('admin.course.course.edit', [$course->id]) }}">
                                        {{ $course->slug }}
                                    </a>
                                </td>
                    
                                <td>
                                    <a href="{{ route('admin.course.course.edit', [$course->id]) }}">
                                        {{   str_limit($course->description, $limit = 15) }}
                                    </a>
                                </td>
                                <td>
                                    <a href="{{ route('admin.course.course.edit', [$course->id]) }}">
                                       @if ( $course->promotion_price)
                                      $ {{ 	number_format($course->promotion_price)  }}
                                      @else
                                      $ {{ number_format($course->price)  }} 
                                       @endif  
                                    </a>
                                </td>
                                <td>
                                    <a href="{{ route('admin.course.course.edit', [$course->id]) }}">
                                        @if ($course->status==0)
                                        <span class=""><i class="fa fa-circle text-danger"></i> Disable</span>
                                        @else
                                        <span class=""><i class="fa fa-circle text-success"></i> Active</span>
                                        @endif
                                    </a>
                                </td>
                                <td>
                                    <a href="{{ route('admin.course.course.edit', [$course->id]) }}">
                                        {{ $course->Catename->name}}
                                    </a>
                                </td>
                                <td>
                                    <a href="{{ route('admin.course.course.edit', [$course->id]) }}">
                                        {{ $course->created_at }}
                                    </a>
                                </td>
                                <td>
                                    <div class="btn-group">
                                        <a href="{{ route('admin.course.course.edit', [$course->id]) }}" class="btn btn-default btn-flat"><i class="fa fa-pencil"></i></a>
                                        <button class="btn btn-danger btn-flat" data-toggle="modal" data-target="#modal-delete-confirmation" data-action-target="{{ route('admin.course.course.destroy', [$course->id]) }}"><i class="fa fa-trash"></i></button>
                                    </div>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                            <?php endif; ?>
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>{{ trans('course::courses.table.image') }}</th>
                                <th>{{ trans('course::courses.table.title') }}</th>
                                <th>{{ trans('course::courses.table.slug') }}</th>
                                <th>{{ trans('course::courses.table.description') }}</th>
                                <th>{{ trans('course::courses.table.price') }}</th>
                                <th>{{ trans('course::courses.table.status') }}</th>
                                <th>{{ trans('course::courses.table.categoryname') }}</th>
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
        <dd>{{ trans('course::courses.title.create course') }}</dd>
    </dl>
@stop

@push('js-stack')
    <script type="text/javascript">
        $( document ).ready(function() {
            $(document).keypressAction({
                actions: [
                    { key: 'c', route: "<?= route('admin.course.course.create') ?>" }
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
