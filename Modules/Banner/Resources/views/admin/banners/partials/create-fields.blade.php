<div class="box-body">
{!! Form::i18nInput('title', trans('banner::banners.form.title'), $errors, $lang) !!}
{!! Form::i18nInput('description', trans('banner::banners.form.description'), $errors, $lang) !!}
 @mediaSingle('image_banner')
 @if($errors->any())
    @if($errors->all()[0]=="Image required")
        <span class="text-danger" style="display:block;margin-top: -20px;">{{ trans('banner::banners.validation.error_image') }}</span>
    @endif               
@endif
</div>