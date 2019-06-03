<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CrearAlumno extends FormRequest
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
            'nombre'=>'required|string',
            'email'=>'required|e-mail|unique:users,email',
            'rut'=>'required|unique:users,rut|min:10|max:10',
            'telefono' => 'required|min:12|max:12'
        ];
    }
    public function messages()
    {
        return [
        'email.unique' => 'Ya existe un usuario con el email'
        ];
    }
}
