<div class="box-body">

    <div class='form-group{{ $errors->has("{$lang}.name") ? ' has-error' : '' }}'>
        <?php $coursecate_name = isset($coursecate->translate($lang)->name) ? $coursecate->translate($lang)->name : ''; ?>

        {!! Form::label("{$lang}[name]", trans('course::coursecates.form.name')) !!}
        {!! Form::text("{$lang}[name]", old("{$lang}[name]",$coursecate_name), ['class' => 'form-control', 'data-slug' => 'source', 'placeholder' => trans('course::coursecates.form.name')]) !!}
        {!! $errors->first("{$lang}.name", '<span class="help-block">:message</span>') !!}
    </div>
    <div class='form-group{{ $errors->has("{$lang}.slug") ? ' has-error' : '' }}'>
        <?php $coursecate_slug = isset($coursecate->translate($lang)->slug) ? $coursecate->translate($lang)->slug : ''; ?>

       {!! Form::label("{$lang}[slug]", trans('course::coursecates.form.slug')) !!}
       {!! Form::text("{$lang}[slug]", old("{$lang}[slug]",$coursecate_slug), ['class' => 'form-control slug', 'data-slug' => 'target', 'placeholder' => trans('course::coursecates.form.slug')]) !!}
       {!! $errors->first("{$lang}.slug", '<span class="help-block">:message</span>') !!}
   </div>
   <div class='form-group{{ $errors->has("{$lang}.description") ? ' has-error' : '' }}'>
    <?php $coursecate_description = isset($coursecate->translate($lang)->description) ? $coursecate->translate($lang)->description : ''; ?>

    {!! Form::label("{$lang}[description]", trans('course::coursecates.form.description')) !!}
    {!! Form::text("{$lang}[description]", old("{$lang}[description]",$coursecate_description), ['class' => 'form-control ', 'placeholder' => trans('course::coursecates.form.description')]) !!}
    {!! $errors->first("{$lang}.description", '<span class="help-block">:message</span>') !!}
  
</div>
{!! Form::normalCheckbox('status', 'Status', $errors,$coursecate) !!}

</div>
