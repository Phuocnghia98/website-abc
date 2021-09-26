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
            'slug' =>"required|unique:course__coursecate_translations,slug,null,course_cate_id,locale,$this->localeKey",
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
            'name.required' =>trans('course::coursecates.validation.name is required'),
            'slug.required' =>trans('course::coursecates.validation.slug is required'),
            'description.required' =>trans('course::coursecates.validation.description is required'),
            'slug.unique' =>trans('course::coursecates.validation.slug unique'),
        ];
    }
}
