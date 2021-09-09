<?php

namespace Modules\Course\Http\Requests;

use Modules\Core\Internationalisation\BaseFormRequest;

class CreateCourseCateRequest extends BaseFormRequest
{
    public function rules()
    {
        return [];
    }

    public function translationRules()
    {
        return [
            'name' =>'required',
            'slug' =>'required',
            'description' =>'required',
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
        return [
            'name.required' =>trans('name is required'),
            'slug.required' =>trans('slug  is unique'),
        ];
    }
}
