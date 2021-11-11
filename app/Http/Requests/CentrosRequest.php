<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CentrosRequest extends FormRequest
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
            'Denominacion' => 'required|unique:centros|max:50',
            'Codigo' => 'required|integer|min:9999|max:9999999',
        ];
    }

    public function messages()
    {
        return [
            'Denominacion.required' =>
                'Mamón, el campo denominación es requerido',
            'Codigo.integer' =>
                'Desgraciado, que tienes que poner un número entero',
        ];
    }
}
