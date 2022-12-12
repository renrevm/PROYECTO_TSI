<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegistrosRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'id'=>'required|unique:registros/id',
            'rol'=>'required',
            'nombre'=>'required',
            'contraseña'=>'required',
            'email'=>'required',
            'id_arqueo'=>'required',
        ];
    }

    public function messages(){
        return[
            'id.required'=>'Indique la ID del registro',
            'id.unique'=>'El ID :input ya está registrado',

            'rol.required'=>'Debe indicar el rol',

            'nombre.required'=>'Debe indicar el nombre',

            'contraseña.required'=>'Indique la contraseña',

            'email.required'=>'Indique la direccion de correo',

            'id_arqueo.required'=>'Indique la id de el arqueo de caja',


        ];
    }
}
