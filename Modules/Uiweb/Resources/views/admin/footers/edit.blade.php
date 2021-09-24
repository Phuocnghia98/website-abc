@extends('layouts.master')

@section('content-header')
    <h1>
        {{ trans('uiweb::footers.title.edit footer') }}
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('dashboard.index') }}"><i class="fa fa-dashboard"></i> {{ trans('core::core.breadcrumb.home') }}</a></li>
        <li><a href="{{ route('admin.uiweb.footer.index') }}">{{ trans('uiweb::footers.title.footers') }}</a></li>
        <li class="active">{{ trans('uiweb::footers.title.edit footer') }}</li>
    </ol>
@stop

@section('content')
    {!! Form::open(['route' => ['admin.uiweb.footer.update', $footer->id], 'method' => 'put', 'id' => 'form-footer']) !!}
    <div class="row">
        <div class="col-md-12">
            <div class="nav-tabs-custom">
                @include('partials.form-tab-headers')
                <div class="tab-content">
                    <?php $i = 0; ?>
                    @foreach (LaravelLocalization::getSupportedLocales() as $locale => $language)
                        <?php $i++; ?>
                        <div class="tab-pane {{ locale() == $locale ? 'active' : '' }}" id="tab_{{ $i }}">
                            @include('uiweb::admin.footers.partials.edit-fields', ['lang' => $locale])
                        </div>
                    @endforeach

                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary btn-flat">{{ trans('uiweb::footers.button.save') }}</button>
                    </div>
                </div>
            </div> {{-- end nav-tabs-custom --}}
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
    <script>
    $("#form-footer").validate({
        rules: {
        @foreach (LaravelLocalization::getSupportedLocales() as $locale => $language)
            "<?= $locale ?>[address]": { required: true},
            "<?= $locale ?>[email]": { required: true, email: true},
            "<?= $locale ?>[phone]": { required: true, maxlength: 15, digits: true},
            "<?= $locale ?>[copyright]": { required: true},
        @endforeach
        
        },
        messages: {
            @foreach (LaravelLocalization::getSupportedLocales() as $locale => $language)
            "<?= $locale ?>[address]": { required: "<?= trans('uiweb::footers.validation.address') ?>" },

            "<?= $locale ?>[email]": { required: "<?= trans('uiweb::footers.validation.email required') ?>", 

            email: "<?= trans('uiweb::footers.validation.email') ?>"},
            "<?= $locale ?>[phone]": { required: "<?= trans('uiweb::footers.validation.phone required') ?>" ,
            maxlength: "<?= trans('uiweb::footers.validation.phone length') ?>" ,
            digits: "<?= trans('uiweb::footers.validation.phone') ?>" },
            
            "<?= $locale ?>[copyright]": { required: "<?= trans('uiweb::footers.validation.copyright') ?>"},
            @endforeach
            
        }
    });
    </script>
@endpush
