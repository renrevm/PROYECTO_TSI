<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ComprasRequest extends FormRequest
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
            'id'=>'required|unique:compras/id',
            'id_usuario'=>'required',
            'id_proveedor'=>'required',
            'fecha'=>'required',
            'total'=>'required|numeric',

        ];
    }
    public function messages(){
        return[
            'id.required'=>'Indique la ID de la compra',
            'id.unique'=>'El ID :input ya está registrado',

            'id_usuario.required'=>'Indique el ID del usuario',
            'id_proveedor.required'=>'Indique el ID del proveedor',
            'fecha.required'=>'Indique la fecha de la compra',

            'total.required'=>'Indique el total de la compra',
            'total.numeric'=>'El total de la compra debe ser numerico',


            


        ];
    }
}
