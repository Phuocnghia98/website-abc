<?php

namespace Modules\Course\Http\Requests;

use Modules\Core\Internationalisation\BaseFormRequest;

class UpdateCourseRequest extends BaseFormRequest
{
    public function rules()
    {
        return [];
    }

    public function translationRules()
    {
        $id=$this->route()->parameter('course')->id;
        return [
            'title'=>'required',
            'slug' =>"required|unique:course__course_translations,slug,$id,course_id,locale,$this->localeKey",
            'price'=>'required|numeric',
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
            'title.required' =>trans('course::courses.validation.title is required'),
            'slug.required' =>trans('course::courses.validation.slug is required'),
             'price.required' =>trans('course::courses.validation.price is required'),
            'price.numeric' =>trans('course::courses.validation.Price is numeric'),
            'slug.unique' =>trans('course::courses.validation.slug unique'),
        ];
    }
}
