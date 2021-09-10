<div class="box-body">
    <div class='form-group{{ $errors->has("{$lang}.name") ? ' has-error' : '' }}'>
        {!! Form::label("{$lang}[name]", trans('course::coursecates.form.name')) !!}
        {!! Form::text("{$lang}[name]", old("{$lang}[name]"), ['class' => 'form-control', 'data-slug' => 'source', 'placeholder' => trans('course::coursecates.form.name')]) !!}
        {!! $errors->first("{$lang}.name", '<span class="help-block">:message</span>') !!}
    </div>
    <div class='form-group{{ $errors->has("{$lang}.slug") ? ' has-error' : '' }}'>
       {!! Form::label("{$lang}[slug]", trans('course::coursecates.form.slug')) !!}
       {!! Form::text("{$lang}[slug]", old("{$lang}[slug]"), ['class' => 'form-control slug', 'data-slug' => 'target', 'placeholder' => trans('course::coursecates.form.slug')]) !!}
       {!! $errors->first("{$lang}.slug", '<span class="help-block">:message</span>') !!}
   </div>
   <div class='form-group{{ $errors->has("{$lang}.description") ? ' has-error' : '' }}'>
    {!! Form::label("{$lang}[description]", trans('course::coursecates.form.description')) !!}
    {!! Form::text("{$lang}[description]", old("{$lang}[description]"), ['class' => 'form-control ', 'placeholder' => trans('course::coursecates.form.description')]) !!}
    {!! $errors->first("{$lang}.description", '<span class="help-block">:message</span>') !!}
  
</div>
{!! Form::i18nCheckbox('status', 'Status', $errors, $lang) !!}
</div>
