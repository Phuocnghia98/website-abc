<div class="box-body">
{!! Form::i18nInput('title', trans('banner::banners.form.title'), $errors, $lang, $banner) !!}
{!! Form::i18nInput('description', trans('banner::banners.form.description'), $errors, $lang, $banner) !!}
   <!-- {!! Form::i18nCheckbox('status', trans('banner::banners.form.status'), $errors, $lang, $banner) !!} -->
  
   <div class="checkbox">
    <?php $old = $banner->hasTranslation($lang) ? $banner->translate($lang)->status : false ?>
    <label for="{{$lang}}[status]">
        <input id="{{$lang}}[status]"
                name="{{$lang}}[status]"
                type="checkbox"
                class="flat-blue"
                {{ ((bool) $old) ? 'checked' : '' }}
                value="1" />
        {{ trans('banner::banners.form.status') }}
    </label>
</div>
   @mediaSingle('image_banner', $banner)
   @if($errors->any())
    @if($errors->all()[0]=="Image required")
        <span class="text-danger" style="display:block;margin-top: -20px;">{{ trans('banner::banners.validation.error_image') }}</span>
    @endif               
@endif
</div>
