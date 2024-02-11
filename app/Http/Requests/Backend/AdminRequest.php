<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class AdminRequest extends FormRequest
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

        switch($this -> method())
       {
        case 'POST' :
            {
                return [
                    'name' => 'required', 'string', 'max:255',
                    'email' => 'required', 'string', 'email', 'max:255', 'unique:users',
                    'user_img' => 'required|mimes:png,jpg,jpeg|max:2000',
                    'password' => 'required', 'string', 'min:8', 'confirmed',
                ];
            }
        case   'PUT':
        case 'PATCH':
            {
                return [
                    'name' => 'required', 'string', 'max:255',
                    'email' => 'required', 'string', 'email', 'max:255', 'unique:users,email'.$this->route()->admin_id,
                    'user_img' => 'nullable|mimes:png,jpg,jpeg|max:2000',
                    'password' => 'nullable', 'string', 'min:8', 'confirmed',
                        ];
            }

            default:break;
       }
    }
}



