<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePedidoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nome_completo'=>'required|string|max:255',
            'nome_mae'=>'required|string|max:255',
            'email'=>'required|email',
            'data_nascimento'=>'required',
            'data_batismo'=>'required',
            'finalidade'=>'nullable',
            'diocese_id'=>'nullable',
            'cidade_id'=>'nullable',
            'paroquia_id'=>'nullable'
        ];
    }
}
