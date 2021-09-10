<div class="box-body">
{!! Form::i18nInput('name', trans('news::news_categories.form.name'), $errors, $lang, $news_categories) !!}
{!! Form::i18nInput('slug', trans('news::news_categories.form.slug'), $errors, $lang, $news_categories) !!}
{!! Form::i18nInput('description', trans('news::news_categories.form.description'), $errors, $lang, $news_categories) !!}
</div>