<?php

namespace Modules\Course\Http\Requests;

use Modules\Core\Internationalisation\BaseFormRequest;

class UpdateTeacherRequest extends BaseFormRequest
{
    public function rules()
    {
        return [];
    }

    public function translationRules()
    {
        return [
            'name'=> 'required',
            'email'=> 'required|email',
            'phone'=> 'required',
            'address'=> 'required',
        ];
    }

    public function authorize()
    {
        return true;
    }

    public function messages()
    {
        return [];
    }

    public function translationMessages()
    {
        return [];
    }
}
