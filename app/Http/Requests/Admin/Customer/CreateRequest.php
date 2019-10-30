<?php

namespace App\Http\Requests\Admin\Customer;

use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
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
            'first_name' => 'required',
            'last_name' => 'required',
            'nick_name' => 'required',
            'phone' => 'required|numeric',
            'company_id' => 'required',
            'position_id' => 'required',
            'address' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'first_name.required'=>'El nombre es requerido',
            'last_name.required'=>'El apellido es requerido',
            'nick_name.required'=>'El apodo es requerido',
            'phone.required'=>'El teléfono es requerido',
            'phone.numeric'=>'El teléfono es solo números',
            'company.required'=>'La compañía es requerido',
            'function.required'=>'La función es requerido',
            'address.required'=>'La dirección es requerido',
        ];
    }
}
