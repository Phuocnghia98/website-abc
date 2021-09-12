<?php

namespace Modules\Course\Http\Requests;

use Modules\Core\Internationalisation\BaseFormRequest;

class CreateCourseRequest extends BaseFormRequest
{
    public function rules()
    {
        return [
          
        ];
    }

    public function translationRules()
    {
        return [
            'title'=>'required',
            'slug'=>'required',
            'price'=>'required',
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
