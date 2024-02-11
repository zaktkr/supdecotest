<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class MenuRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        switch ($this->method()) {
            case 'POST': {
                    return [
                        'name_fr' => 'required|max:255',
                        'name_ar' => 'required|max:255',
                        'status' => 'required|boolean',
                        'cover' => 'required|mimes:jpg,jpeg,png|max:2000'
                    ];
                }
            case   'PUT':
            case 'PATCH': {
                    return [
                        'name_fr' => 'required|max:255',
                        'name_ar' => 'required|max:255',
                        'status' => 'required|boolean',
                        'cover' => 'nullable|mimes:jpg,jpeg,png|max:2000',
                    ];
                }

            default:
                break;
        }
    }

    public function messages()
    {
        return [
            'status.required' => __('message.ce champ est obligatoire!'),
            'status.boolean' => __('message.donne incorrect !'),
            'cover.required' => __('message.ce champ est obligatoire!'),
            'cover.mimes' => __('message.inserer un photo de format "jpg" "jpeg" "png"'),
            'cover.max' => __('message.vous avez deppassez le max du photo'),
            'name_fr.required' => __('message.ce champ est obligatoire!'),
            'name_ar.required' => __('message.ce champ est obligatoire!'),
            'name_fr.max' => __('message.vous avez deppassez le max du nom francais'),
            'name_ar.max' => __('message.vous avez deppassez le max du nom arabe'),

        ];
    }
}
