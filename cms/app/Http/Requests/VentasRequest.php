<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VentasRequest extends FormRequest
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
            'id'=>'required|unique:ventas/id',
            'id_usuario'=>'required',
            'id_cliente'=>'required',
            'fecha'=>'required',
            'total'=>'required|numeric',

        ];
    }
    public function messages(){
        return[
            'id.required'=>'Indique la ID de la venta',
            'id.unique'=>'El ID :input ya está registrado',

            'id_usuario.required'=>'Indique el ID del usuario',
            'id_cliente.required'=>'Indique el ID del cliente',
            'fecha.required'=>'Indique la fecha de la venta',

            'total.required'=>'Indique el total de la venta',
            'total.numeric'=>'El total de la venta debe ser numerico',
        ];
    }
}
