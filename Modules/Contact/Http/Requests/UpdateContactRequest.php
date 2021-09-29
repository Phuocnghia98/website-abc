<?php

namespace Modules\Contact\Http\Requests;

use Modules\Core\Internationalisation\BaseFormRequest;

class UpdateContactRequest extends BaseFormRequest
{
    public function rules()
    {
        return [
            'phone' => 'required',
        ];
    }

    public function translationRules()
    {
        return [
            'name' => 'required', 
            
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
