<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class TypeCommunicationRequest extends FormRequest
{
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
                        'type_comunication_fr' => 'required|max:255',
                        'type_comunication_ar' => 'required|max:255',
                        'link' => 'required|max:255',
                        'cover' => 'required|mimes:jpg,jpeg,png|max:2000',
                    ];
                }
            case 'PUT':
            case 'PATCH': {
                    return [
                        'status' => 'required|boolean',
                        'type_comunication_fr' => 'required|max:255',
                        'type_comunication_ar' => 'required|max:255',
                        'link' => 'required|max:255',
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
            'type_comunication_fr.required' => __('message.ce champ est obligatoire!'),
            'type_comunication_ar.required' => __('message.ce champ est obligatoire!'),
            'type_comunication_fr.max' => __('message.vous avez deppassez le max'),
            'type_comunication_ar.max' => __('message.vous avez deppassez le max'),
            'link.required' => __('message.ce champ est obligatoire!'),
            'link.max' => __('message.vous avez deppassez le max'),

        ];
    }
}
