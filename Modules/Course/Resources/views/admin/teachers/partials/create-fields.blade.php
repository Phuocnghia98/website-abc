<div class="box-body">
  <div class="row">
      <div class="col-lg-6">
          {!! Form::i18nInput('name', 'Name', $errors, $lang) !!}
          {!! Form::i18nInputOfType('email','email', 'Email', $errors, $lang) !!}
          {!! Form::i18nInputOfType('number','phone', 'Phone', $errors, $lang) !!}
          {!! Form::i18nInput('address', 'Address', $errors, $lang) !!}
      </div>
      <div class="col-lg-6">
        {!! Form::i18nTextarea('infor', 'Information', $errors, $lang) !!}

      </div>
  </div>
</div>
