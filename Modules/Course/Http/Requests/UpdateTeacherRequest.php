<?php

namespace Modules\Course\Http\Requests;

use Modules\Core\Internationalisation\BaseFormRequest;

class UpdateTeacherRequest extends BaseFormRequest
{
    public function rules()
    {
        return [
            'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
        ];
    }

    public function translationRules()
    {
        $id=$this->route()->parameter('teacher')->id;
        return [
            'name'=> 'required',
            'email'=> "required|email|unique:course__teacher_translations,email, $id,teacher_id,locale,$this->localeKey",
            'address'=> 'required',
        ];
    }

    public function authorize()
    {
        return true;
    }

    public function messages()
    {
        return [
            'phone.required'=>trans('course::teachers.validation.Phone is required'),
            'phone.regex'=>trans('course::teachers.validation.Phone is invalid'),
            'Phone min'=>trans('course::teachers.validation.Phone is invalid'),
        ];
    }

    public function translationMessages()
    {
        return [
            'name.required'=>trans('course::teachers.validation.Name is required'),
            'address.required'=>trans('course::teachers.validation.Address is required'),
            'email.required'=>trans('course::teachers.validation.Email is required'),
            'email.email'=>trans('course::teachers.validation.Email is invalid'),
            'email.unique'=>trans('course::teachers.validation.Email unique'),
        ];
    }
}
