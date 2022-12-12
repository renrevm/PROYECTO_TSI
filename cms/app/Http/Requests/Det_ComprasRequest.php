<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Det_ComprasRequest extends FormRequest
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
            'compra_id'=>'required|unique:compras/id',
            'producto_id'=>'required|unique:productos/id',
            'cantidad'=>'required|numeric',
            'precio_unitario'=>'required|numeric',
            'sub_total'=>'required|numeric',
            'medio_pago'=>'required',
  
        ];
    }

    public function messages(){
        return[
            'compra_id.required'=>'Indique la ID de la compra',
            'compra_id.unique'=>'El ID :input ya está registrado',

            'producto_id.required'=>'Indique la ID del producto',
            'producto_id.unique'=>'El ID :input ya está registrado',

            'cantidad.required'=>'Indique la cantidad',
            'cantidad.numeric'=>'La cantidad debe ser numerica',

            'precio_unitario.required'=>'Indique el precio unitario',
            'precio_unitario.numeric'=>'El precio unitario debe ser numerico',

            'sub_total.required'=>'Indique el subtotal de la compra',
            'sub_total.numeric'=>'el subtotal de la compra debe ser numerico',

            'medio_pago.required'=>'Indique el medio de pago de la compra',
            


            


        ];
    }

}
