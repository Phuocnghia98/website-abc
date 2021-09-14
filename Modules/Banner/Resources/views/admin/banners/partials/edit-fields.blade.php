<div class="box-body">
{!! Form::i18nInput('title', trans('banner::banners.form.title'), $errors, $lang, $banner) !!}
{!! Form::i18nInput('description', trans('banner::banners.form.description'), $errors, $lang, $banner) !!}
   <!-- {!! Form::i18nCheckbox('status', trans('banner::banners.form.status'), $errors, $lang, $banner) !!} -->
   {!! Form:: normalCheckbox('status', trans('banner::banners.form.status'), $errors, $banner) !!}
   @mediaSingle('image_banner', $banner)
   @if($errors->any())
    @if($errors->all()[0]=="Image required")
        <span class="text-danger" style="display:block;margin-top: -20px;">{{ trans('banner::banners.validation.error_image') }}</span>
    @endif               
@endif
</div>
