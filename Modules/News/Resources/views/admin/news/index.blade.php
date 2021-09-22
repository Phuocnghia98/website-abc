@extends('layouts.master')

@section('content-header')
    <h1>
        {{ trans('news::news.title.news') }}
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('dashboard.index') }}"><i class="fa fa-dashboard"></i> {{ trans('core::core.breadcrumb.home') }}</a></li>
        <li class="active">{{ trans('news::news.title.news') }}</li>
    </ol>
@stop

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="row">
                <div class="btn-group pull-right" style="margin: 0 15px 15px 0;">
                    <a href="{{ route('admin.news.news.create') }}" class="btn btn-primary btn-flat" style="padding: 4px 10px;">
                        <i class="fa fa-pencil"></i> {{ trans('news::news.button.create news') }}
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
                                <th>{{ trans('news::news.table.title') }}</th>
                                <th>{{ trans('news::news.table.slug') }}</th>
                                <th>{{ trans('news::news.table.image') }}</th>
                                <th>{{ trans('news::news.table.description') }}</th>
                                <th>{{ trans('news::news.table.user_id') }}</th>
                                <th>{{ trans('news::news.table.cat_id') }}</th>
                                <th>{{ trans('core::core.table.created at') }}</th>
                                <th data-sortable="false">{{ trans('core::core.table.actions') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if (isset($news)): ?>
                            <?php foreach ($news as $news): ?>
                            <tr>
                            <td>
                                    <a href="{{ route('admin.news.news.edit', [$news->id]) }}">
                                        {{ $news->title }}
                                    </a>
                                </td>
                                <td>
                                    <a href="{{ route('admin.news.news.edit', [$news->id]) }}">
                                        {{ $news->slug }}
                                    </a>
                                </td>
                                <td>
                                    @if ($news->filesByZone('image_news')->first())
                                    <a href="{{ route('admin.news.news.edit', [$news->id]) }}">
                                        <img src="@thumbnail($news->filesByZone('image_news')->first()->path, 'smallThumb')" alt="News" />
                                    </a>
                                    @endif
                                
                                </td>
                                <td>
                                    <a href="{{ route('admin.news.news.edit', [$news->id]) }}">
                                        {{ $news->description }}
                                    </a>
                                </td>
                                <td>
                                {{ optional($news->getUser)->last_name.' '.optional($news->getUser)->first_name }}      
                                </td>
                                <td>
                                  {{ optional($news->getNewsCat)->name }}
                                </td>

                                <td>
                                    <a href="{{ route('admin.news.news.edit', [$news->id]) }}">
                                        {{ $news->created_at }}
                                    </a>
                                </td>
                                <td>
                                    <div class="btn-group">
                                    @if ($news->filesByZone('image_news')->first())
                                        <button class="btn btn-primary btn-flat mr-2" data-toggle="modal" data-target="#modaldetail" onclick="detailNews(
                                            {{$news}},'{{ optional($news->getUser)->last_name }}','{{ optional($news->getNewsCat)->name }}','{{$news->files()->first()->path}}' )">{{ trans('news::news.table.detail') }}</button>
                                    @else
                                    <button class="btn btn-primary btn-flat mr-2" data-toggle="modal" data-target="#modaldetail" onclick="detailNews({{$news}},'{{ optional($news->getUser)->last_name }}','{{ optional($news->getNewsCat)->name }}')">{{ trans('news::news.table.detail') }}</button>
                                    @endif
                                        <a href="{{ route('admin.news.news.edit', [$news->id]) }}" class="btn btn-default btn-flat"><i class="fa fa-pencil"></i></a>
                                        <button class="btn btn-danger btn-flat" data-toggle="modal" data-target="#modal-delete-confirmation" data-action-target="{{ route('admin.news.news.destroy', [$news->id]) }}"><i class="fa fa-trash"></i></button>
                                  
                                    </div>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                            <?php endif; ?>
                            </tbody>
                        </table>
                        <!-- /.box-body -->
                    </div>
                </div>
                <!-- /.box -->
            </div>
        </div>
    </div>
<div class="modal fade" id="modaldetail" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">{{ trans('news::news.table.detail') }}</h4>
      </div>
      <div class="modal-body">
      </div>
    </div>
  </div>
</div>
    @include('core::partials.delete-modal')
@stop
@push('css-stack')
    <style>
        .news-image {
            text-align: center;
            width: 100%;
        }
        .news-image img {
            max-width: 100%;
        }
        .news-title h5 {
            font-size: 2rem;
            font-weight: 700;
            margin-bottom: 20px;
            text-transform: uppercase;
        }
        .news-info {
            display: flex;
            align-items: center;
            justify-content:flex-start;
            position: relative;
        }
        .news-info::after {
            content: "";
            height: 4px;
            width: 50px;
            background-color: #abbfce;
            position: absolute;
            left: 0;
            top: 20px;
            border-radius: 3px;
        }
        .news-info span {
            margin-right: 15px;
        }
        .news-info span:last-child {
            margin-right: 0;
        }
        .news-info span i {
            margin-right: 5px;
            font-size: 1.5rem;
        }
        .content {
            text-align: justify;
        }
    </style>
@endpush
@section('footer')
    <a data-toggle="modal" data-target="#keyboardShortcutsModal"><i class="fa fa-keyboard-o"></i></a> &nbsp;
@stop
@section('shortcuts')
    <dl class="dl-horizontal">
        <dt><code>c</code></dt>
        <dd>{{ trans('news::news.title.create news') }}</dd>
    </dl>
@stop

@push('js-stack')
    <script type="text/javascript">
        $( document ).ready(function() {
            $(document).keypressAction({
                actions: [
                    { key: 'c', route: "<?= route('admin.news.news.create') ?>" }
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
    <script type="text/javascript">
        function detailNews(news,author,category,path="") {
           let html="";
           html=`
           <div class="news-image">
            <img src="${path}" alt="image news"/>
            </div>
            <div class="news-title text-center">
                <h5>${news.title}</h5>
            </div>
            <div class="news-info">
                <span><i class="fa fa-clock-o" aria-hidden="true"></i>${news.created_at}</span>
                <span><i class="fa fa-user" aria-hidden="true"></i>${author}</span>
                <span><i class="fa fa-book" aria-hidden="true"></i>${category}</span>
            </div>
            <div class="content">
                ${news.content}
            </div>
           `;
           $('#modaldetail .modal-body').html(html);
        }
    </script>
@endpush
