<div class="box-body">
<div class='form-group{{ $errors->has("{$lang}.title") ? ' has-error' : '' }}'>
        {!! Form::label("{$lang}[title]", trans('banner::banners.form.title')) !!}
        {!! Form::text("{$lang}[title]", old("{$lang}[title]", $banner->title), ['class' => 'form-control', 'data-slug' => 'source', 'placeholder' => trans('banner::banners.form.title')]) !!}
        {!! $errors->first("{$lang}.title", '<span class="help-block">:message</span>') !!}
    </div>
   <div class='form-group{{ $errors->has("{$lang}.description") ? ' has-error' : '' }}'>
    {!! Form::label("{$lang}[description]", trans('banner::banners.form.description')) !!}
    {!! Form::text("{$lang}[description]", old("{$lang}[description]",$banner->description), ['class' => 'form-control ', 'placeholder' => trans('banner::banners.form.description')]) !!}
    {!! $errors->first("{$lang}.description", '<span class="help-block">:message</span>') !!}
   </div>
   <!-- {!! Form::i18nCheckbox('status', trans('banner::banners.form.status'), $errors, $lang, $banner) !!} -->
   {!! Form:: normalCheckbox('status', trans('banner::banners.form.status'), $errors, $banner) !!}
   @mediaSingle('image_banner', $banner)
</div>
