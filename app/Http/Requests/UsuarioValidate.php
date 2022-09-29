<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsuarioValidate extends FormRequest
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
                'password' => 'nullable|min:3',
                're_password' => 'nullable|required_with:password|min:3|same:password'
            ];
        } else {
            return [
                'usuario' => 'nullable|unique:usuario,usuario,' . $this->route('id'),
                'password' => 'required|min:3',
                're_password' => 'required|min:3|same:password'
            ];
        }
    }
}
