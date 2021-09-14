<div class="box-body">
    <div class="row">
        <div class="col-lg-10">
            <div class='form-group{{ $errors->has("{$lang}.title") ? ' has-error' : '' }}'>
                {!! Form::label("{$lang}[title]", trans('course::courses.form.title')) !!}
                <?php $oldTitle = isset($course->translate($lang)->title) ? $course->translate($lang)->title : ''; ?>
                {!! Form::text("{$lang}[title]", old("{$lang}[title]",$oldTitle), ['class' => 'form-control', 'data-slug' => 'source', 'placeholder' => trans('course::courses.form.title')]) !!}
                {!! $errors->first("{$lang}.title", '<span class="help-block">:message</span>') !!}
            </div>
            <div class='form-group{{ $errors->has("{$lang}.slug") ? ' has-error' : '' }}'>
               {!! Form::label("{$lang}[slug]", trans('course::courses.form.slug')) !!}
               <?php $oldSlug = isset($course->translate($lang)->slug) ? $course->translate($lang)->slug : ''; ?>

               {!! Form::text("{$lang}[slug]", old("{$lang}[slug]",$oldSlug), ['class' => 'form-control slug', 'data-slug' => 'target', 'placeholder' => trans('course::courses.form.slug')]) !!}
               {!! $errors->first("{$lang}.slug", '<span class="help-block">:message</span>') !!}
           </div>
           {!! Form::i18nInput('description', 'Description', $errors, $lang,$course) !!}
     
            {!! Form::i18nTextarea('content', 'Content', $errors, $lang,$course) !!}
            
            {!! Form::normalCheckbox('status', 'Status', $errors,$course) !!}
          
            

        </div>
        <div class="col-lg-2">
  
                
            <div class='form-group{{ $errors->has("{$lang}.course_cates_id") ? ' has-error' : '' }}'>
                {!! Form::label("{$lang}[course_cates_id]", trans('course::courses.form.course_cates_id')) !!}
                {!! Form::select("{$lang}[course_cates_id]",  $coursecate->pluck('name', 'id'), old("{$lang}[course_cates_id]",$course->course_cates_id ), ['class' => 'form-control']) !!}
                {!! $errors->first("{$lang}.course_cates_id", '<span class="help-block">:message</span>') !!}
             </div>
             <div class='form-group{{ $errors->has("{$lang}.teacher_id") ? ' has-error' : '' }}'>
                {!! Form::label("{$lang}[teacher_id]", trans('course::courses.form.teacher_id')) !!}
                {!! Form::select("{$lang}[teacher_id]",  $teacher->pluck('name', 'id'), old("{$lang}[teacher_id]",$course->teacher_id ), ['class' => 'form-control']) !!}
                {!! $errors->first("{$lang}.teacher_id", '<span class="help-block">:message</span>') !!}
             </div>
                {!! Form::i18nInputOfType('number','price', 'Price', $errors, $lang,$course) !!}
                {!! Form::i18nInputOfType('number','promotion_price', 'Promotion price', $errors, $lang,$course) !!}
                @mediaSingle('image', $course)
               
        </div>
    </div>
   
</div>
