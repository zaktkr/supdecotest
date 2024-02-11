<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class ServiceRequest extends FormRequest
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

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        switch ($this->method()) {
            case 'POST': {
                    return [
                        'status' => 'required|boolean',
                        'name_ar' => 'required|max:255',
                        'description_fr' => 'required',
                        'description_ar' => 'required',
                        'name_fr' => 'required|max:255',
                        'cover' => 'required|mimes:jpg,jpeg,png|max:2000',
                    ];
                }
            case   'PUT':
            case 'PATCH': {
                    return [
                        'status' => 'required|boolean',
                        'name_ar' => 'required|max:255',
                        'description_fr' => 'required',
                        'description_ar' => 'required',
                        'name_fr' => 'required|max:255',
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
            'cover.max' => __('message.vous avez deppassez le max'),
            'name_fr.required' => __('message.ce champ est obligatoire!'),
            'name_ar.required' => __('message.ce champ est obligatoire!'),
            'name_fr.max' => __('message.vous avez deppassez le max'),
            'name_ar.max' => __('message.vous avez deppassez le max'),
            'description_fr.required' => __('message.ce champ est obligatoire!'),
            'description_ar.required' => __('message.ce champ est obligatoire!'),

        ];
    }
}
