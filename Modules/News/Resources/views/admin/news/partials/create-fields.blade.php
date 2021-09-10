<div class="box-body">
{!! Form::i18nInput('title', trans('news::news.form.title'), $errors, $lang) !!}
{!! Form::i18nInput('slug', trans('news::news.form.slug'), $errors, $lang) !!}
@mediaSingle('image_news')
@if($errors->any())
    @if($errors->all()[0]=="Image required")
        <span class="text-danger" style="display:block;margin-top: -20px;">{{ trans('news::news.validation.error_image') }}</span>
    @endif               
@endif
{!! Form::i18nSelect('cat_id', trans('news::news.form.cat_id'), $errors, $lang, $arr_news_cat) !!}
{!! Form::i18nTextarea('content', trans('news::news.form.content'), $errors, $lang) !!}
{!! Form::i18nInput('description', trans('news::news.form.description'), $errors, $lang) !!}
</div>
