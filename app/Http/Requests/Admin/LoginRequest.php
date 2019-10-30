<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
        return [
            'username' => 'required|exists:user',
            'password' => 'required|min:3|max:255'
        ];
    }

    public function messages(){
        return [
            'username.required'=>'requerido',
            'username.exists'=>'el usuario no existe',
            'password.required'=>'requerido',
            'password.min'=>'min. :min caracteres',
            'password.max'=>'max. :max caracteres'
        ];
    }
}
