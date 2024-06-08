<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePedidoRequest extends FormRequest
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
            'nome_completo'=>'required',
            'nome_mae'=>'required',
            'email'=>'required',
            'data_nascimento'=>'required|date_format:Y-m-d',
            'data_batismo'=>'nullable|date_format:Y-m-d',
            'finalidade'=>'required',
            'status'=>'required|in:aprovado,recusado,espera,pagamento pendente',
            'diocese_id'=>'nullable|numeric',
            'cidade_id'=>'nullable|numeric',
            'paroquia_id'=>'nullable|numeric'
        ];
    }
}
