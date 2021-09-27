<div class="box-body">
    <div class="row">
        <div class="col-lg-10">
            <div class='form-group{{ $errors->has("{$lang}.title") ? ' has-error' : '' }}'>
                {!! Form::label("{$lang}[title]", trans('course::courses.form.title')) !!}
                {!! Form::text("{$lang}[title]", old("{$lang}[title]"), ['class' => 'form-control', 'data-slug' => 'source', 'placeholder' => trans('course::courses.form.title')]) !!}
                {!! $errors->first("{$lang}.title", '<span class="help-block">:message</span>') !!}
            </div>
            <div class='form-group{{ $errors->has("{$lang}.slug") ? ' has-error' : '' }}'>
               {!! Form::label("{$lang}[slug]", trans('course::courses.form.slug')) !!}
               {!! Form::text("{$lang}[slug]", old("{$lang}[slug]"), ['class' => 'form-control slug', 'data-slug' => 'target', 'placeholder' => trans('course::courses.form.slug')]) !!}
               {!! $errors->first("{$lang}.slug", '<span class="help-block">:message</span>') !!}
           </div>
           <div class='form-group{{ $errors->has("{$lang}.description") ? ' has-error' : '' }}'>
            {!! Form::label("{$lang}[description]", trans('course::courses.form.description')) !!}
            {!! Form::text("{$lang}[description]", old("{$lang}[description]"), ['class' => 'form-control', 'placeholder' => trans('course::courses.form.description')]) !!}
            {!! $errors->first("{$lang}.description", '<span class="help-block">:message</span>') !!}
            </div>
            {!! Form::i18nTextarea('content', trans('course::courses.form.content'), $errors, $lang) !!}           
        </div>
        <div class="col-lg-2">
            <div class='form-group{{ $errors->has("{$lang}.course_cates_id") ? ' has-error' : '' }}'>
                {!! Form::label("{$lang}[course_cates_id]", trans('course::courses.form.course_cates_id')) !!}
                {!! Form::select('course_cates_id',  $coursecate->pluck('name', 'id'),null, ['class' => 'form-control']) !!}
                {!! $errors->first("{$lang}.course_cates_id", '<span class="help-block">:message</span>') !!}
             </div>

             <div class='form-group{{ $errors->has("{$lang}.teacher_id") ? ' has-error' : '' }}'>
                {!! Form::label("{$lang}[teacher_id]", trans('course::courses.form.teacher_id')) !!}
                {!! Form::select("{$lang}[teacher_id]",  $teacher->pluck('name', 'id'),null, ['class' => 'form-control']) !!}
                {!! $errors->first("{$lang}.teacher_id", '<span class="help-block">:message</span>') !!}
             </div>
                {!! Form::i18nInputOfType('text','price', trans('course::courses.form.price'), $errors, $lang) !!}
                {!! Form::i18nInputOfType('text','promotion_price', trans('course::courses.form.promotion_price'), $errors, $lang) !!}
                        
        </div>
    </div>
   
</div>
