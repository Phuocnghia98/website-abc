<div class="box-body">
  <div class="row">
      <div class="col-lg-6">
          {!! Form::i18nInput('name', trans('course::teachers.form.name'), $errors, $lang) !!}
          {!! Form::i18nInputOfType('email','email', 'Email', $errors, $lang) !!}
          {!! Form::i18nInput('address',  trans('course::teachers.form.address'), $errors, $lang) !!}
      </div>
      <div class="col-lg-6">
        {!! Form::i18nTextarea('infor', trans('course::teachers.form.Information'), $errors, $lang) !!}

      </div>
  </div>
</div>
