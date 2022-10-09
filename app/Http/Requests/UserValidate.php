<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserValidate extends FormRequest
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
                'usuario' => 'nullable|unique:usuario,usuario,' . $this->route('id'),
                'telefono' => 'nullable|unique:usuario,telefono,' . $this->route('id'),
                'password' => 'nullable|min:8',
                're_password' => 'nullable|required_with:password|min:8|same:password'
            ];
        } else {
            return [
                'usuario' => 'nullable|unique:usuario,usuario,' . $this->route('id'),
                'telefono' => 'nullable|unique:usuario,telefono,' . $this->route('id'),
                'password' => 'required|min:8',
                're_password' => 'required|min:8|same:password'
            ];
        }
    }

    public function messages()
    {
        return [
            'usuario.unique' => 'El usuario ya esta en uso. Por favor escriba uno nuevo para poder ser registrado',
            'telefono.unique' => 'Este número de teléfono ya esta en uso. Por favor escriba uno nuevo para poder ser registrado',
            're_password.same' => 'Las contraseñas no coincide',
        ];
    }

}
