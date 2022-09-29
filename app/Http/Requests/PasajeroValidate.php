<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PasajeroValidate extends FormRequest
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
        if ($this->route('id')) {
            return [
                'telefono' => 'nullable|unique:pasajero,telefono'. $this->route('id'),
                'dpi' => 'nullable|unique:pasajero,dpi,' . $this->route('id'),
            ];
        } else {
            return [
                'telefono' => 'nullable|unique:pasajero,telefono,'. $this->route('id'),
                'dpi' => 'nullable|unique:pasajero,dpi,' . $this->route('id'),
            ];
        }
    }

    public function messages()
    {
        return [
            'telefono.unique' => 'El teléfono ya esta en uso. Por favor escriba uno nuevo para poder ser registrado',
            'dpi.unique' => 'Este Documento de Identificacion Personal ya esta en uso. Por favor escriba uno nuevo para poder ser registrado',
        ];
    }
}
