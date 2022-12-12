<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoriasRequest extends FormRequest
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
            'id'=>'required|unique:categorias/id',
            'nombre_categoria'=>'required',
        ];
    }

    public function messages(){
        return[
            'id.required'=>'Indique la ID de la categoria',
            'id.unique'=>'El ID :input ya está registrado',

            'nombre_categoria.required'=>'Indique el nombre de la categoria',

        ];
    }
}
