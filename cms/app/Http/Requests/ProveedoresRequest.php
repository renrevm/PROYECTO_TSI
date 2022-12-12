<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProveedoresRequest extends FormRequest
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
            'id'=>'required|unique:proveedores/id',
            'nombre'=>'required',
            'telefono'=>'required|numeric',
            'direccion'=>'required',
        ];
    }

    public function messages(){
        return[
            'id.required'=>'Indique la ID del proveedor',
            'id.unique'=>'El ID :input ya está registrado',

            'nombre.required'=>'Indique el nombre del proveedor',

            'telefono.required'=>'Indique el telefono del proveedor',
            'telefono.numeric'=>'El telefono debe ser numerico',

            'direccion.required'=>'Indique la direccion del proveedor',


        ];
    }
}
