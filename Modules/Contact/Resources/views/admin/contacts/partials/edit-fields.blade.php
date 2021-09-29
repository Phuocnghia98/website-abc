<div class="box-body">
    {{-- {!! Form::i18nInput('name', 'Name', $errors, $lang,$contact) !!} --}}
    {!! Form::i18nInput('name', trans('contact::contacts.form.name'), $errors, $lang, $contact) !!}
</div>
