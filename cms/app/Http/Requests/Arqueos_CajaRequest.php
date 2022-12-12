<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Arqueos_CajaRequest extends FormRequest
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
            'id'=>'required|unique:arqueos_caja/id',
            'fecha'=>'required',
            'inicio'=>'required',
            'termino'=>'required',
            'inicio_caja'=>'required|numeric',
            'cierre_caja'=>'required|numeric',
        ];
    }

    public function messages(){
        return[
            'id.required'=>'Indique la ID del Arqueo de Caja',
            'id.unique'=>'El ID :input ya está registrado',

            'fecha.required'=>'Indique la fecha del Arqueo',

            'inicio.required'=>'Indique el inicio del turno',

            'termino.required'=>'Indique termino del turno',

            'inicio_caja.required'=>'Indique el monto inicial de la caja',
            'inicio_caja.numeric'=>'El monto debe ser numerico',

            'cierre_caja.required'=>'Indique el monto final de la caja',
            'cierre_caja.numeric'=>'El monto debe ser numerico',



        ];
    }
}
