<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductosRequest extends FormRequest
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
            'id'=>'required|unique:productos/id',
            'id_categoria'=>'required',
            'id_ajuste'=>'required',
            'nombre_producto'=>'required',
            'precio_costo'=>'required|numeric|gte:0',
            'precio_venta'=>'required|numeric|gte:0',
            'stock'=>'required|numeric|gt:0',

        ];
    }
    public function messages(){
        return[
            'id.required'=>'Indique la ID del producto',
            'id.unique'=>'El ID :input ya está registrado',

            'id_categoria.required'=>'Indique el ID de la categoria del producto',

            'id_ajuste.required'=>'Indique el ID del Ajuste',

            'nombre_producto.required'=>'Indique el nombre del producto',

            'precio_costo.required'=>'Indique el precio de costo del producto',
            'precio_costo.numeric'=>'El precio de costo del producto debe ser numerico',
            'precio_costo.gte'=>'El precio costo debe ser mayor o igual a 0',

            'precio_venta.required'=>'Indique el precio de venta del producto',
            'precio_venta.numeric'=>'El precio venta del producto debe ser numerico',
            'precio_venta.gte'=>'El precio venta debe ser mayor o igual a 0',

            'stock.required'=>'Indique el Stock del producto',
            'stock.numeric'=>'stock debe ser un número',
            'stock.gt'=> 'El stock debe ser mayor a 0',

        ];
    }
}
