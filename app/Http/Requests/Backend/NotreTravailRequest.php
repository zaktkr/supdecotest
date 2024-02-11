<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class NotreTravailRequest extends FormRequest
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
                        'link' => 'required|max:255',
                        'description_ar' => 'required',
                        'description_fr' => 'required',
                        'status' => 'required|boolean',
                    ];
                }
            case   'PUT':
            case 'PATCH': {
                    return [
                        'link' => 'required|max:255',
                        'description_ar' => 'required',
                        'description_fr' => 'required',
                        'status' => 'required|boolean',
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
            'description_fr.required' => __('message.ce champ est obligatoire!'),
            'description_ar.required' => __('message.ce champ est obligatoire!'),
            'link.required' => __('message.ce champ est obligatoire!'),
            'link.max' => __('message.vous avez deppassez le max'),

        ];
    }
}
