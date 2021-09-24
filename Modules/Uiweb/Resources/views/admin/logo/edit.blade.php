@extends('layouts.master')

@section('content-header')
    <h1>
        {{ trans('uiweb::footers.title.edit logo') }}
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('dashboard.index') }}"><i class="fa fa-dashboard"></i> {{ trans('core::core.breadcrumb.home') }}</a></li>
        <li><a href="{{ route('admin.uiweb.footer.index') }}">{{ trans('uiweb::footers.title.logo') }}</a></li>
        <li class="active">{{ trans('uiweb::footers.title.edit logo') }}</li>
    </ol>
@stop

@section('content')
    {!! Form::open(['route' => ['admin.uiweb.logo.update'], 'method' => 'put']) !!}
    <div class="row">
        <div class="col-md-12">
            <div>
                <div class="box-body" style="background-color: #ffffff;">
                    @mediaSingle('logo', $logo)
                    @if($errors->any())
                        @if($errors->all()[0]=="Image required")
                            <span class="text-danger" style="display:block;margin-top: -20px;">{{ trans('banner::banners.validation.error_image') }}</span>
                        @endif               
                    @endif
                </div>

                <div class="box-footer">
                        <button type="submit" class="btn btn-primary btn-flat">{{ trans('uiweb::footers.button.save') }}</button>
                </div>
            </div>
        </div>
    </div>
    {!! Form::close() !!}
@stop

@section('footer')
    <a data-toggle="modal" data-target="#keyboardShortcutsModal"><i class="fa fa-keyboard-o"></i></a> &nbsp;
@stop
@section('shortcuts')
    <dl class="dl-horizontal">
        <dt><code>b</code></dt>
        <dd>{{ trans('core::core.back to index') }}</dd>
    </dl>
@stop

@push('js-stack')
    <script type="text/javascript">
        $( document ).ready(function() {
            $(document).keypressAction({
                actions: [
                    { key: 'b', route: "<?= route('admin.uiweb.footer.index') ?>" }
                ]
            });
        });
    </script>
    <script>
        $( document ).ready(function() {
            $('input[type="checkbox"].flat-blue, input[type="radio"].flat-blue').iCheck({
                checkboxClass: 'icheckbox_flat-blue',
                radioClass: 'iradio_flat-blue'
            });
        });
    </script>
@endpush
