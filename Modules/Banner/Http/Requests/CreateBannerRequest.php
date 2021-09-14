<?php

namespace Modules\Banner\Http\Requests;

use Modules\Core\Internationalisation\BaseFormRequest;

class CreateBannerRequest extends BaseFormRequest
{
    public function rules()
    {
        return [
            
        ];
    }

    public function translationRules()
    {
        return [
            'title' => 'required',
            'description' => 'required',
            // 'medias_single*image_banner' => 'required'
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
