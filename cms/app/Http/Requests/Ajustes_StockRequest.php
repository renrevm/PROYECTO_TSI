<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Ajustes_StockRequest extends FormRequest
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
            'id'=>'required|unique:ajustes_stock/id',
            'fecha'=>'required',
            'tipo_ajuste'=>'required',
            'motivo'=>'required',
            'cantidad'=>'required|numeric',

        ];
    }
    public function messages(){
        return[
            'id.required'=>'Indique la ID del Ajuste de Stock',
            'id.unique'=>'El ID :input ya está registrado',

            'fecha.required'=>'Indique la fecha del ajuste',

            'tipo_ajuste.required'=>'Indique el tipo de Ajuste',

            'motivo.required'=>'Indique el motivo del ajuste',

            'cantidad.required'=>'Indique la cantidad del ajuste',
            'cantidad.numeric'=>'La cantidad debe ser numerica',

        ];
    }
}
