<?php

namespace Modules\Uiweb\Http\Requests;

use Modules\Core\Internationalisation\BaseFormRequest;

class UpdateFooterRequest extends BaseFormRequest
{
    public function rules()
    {
        return [];
    }

    public function translationRules()
    {
        return [
            'address' =>'required',
            'phone' => 'required|regex:/(01)[0-9]{9}/',
            'copyright' => 'required',
            'email' => 'required|email'
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
