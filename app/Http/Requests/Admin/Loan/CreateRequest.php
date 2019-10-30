<?php

namespace App\Http\Requests\Admin\Loan;

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
            'customer_id' => 'required',
            'amount' => 'required',
            'percentaje_id' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'customer_id.required'=>'El cliente es requerido',
            'amount.required'=>'El monto del préstamo es requerido',
            'interest_id.required'=>'El interés es requerido'
        ];
    }
}
