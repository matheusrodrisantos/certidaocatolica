<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCertidaoRequest extends FormRequest
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
            'data_batismo'=>'required',
            'celebrante'=>'required|email',
            'batizando'=>'required|email',
            'data_nascimento'=>'required',
            'nome_mae'=>'required',
            'nome_pai'=>'required',
            'livro'=>'required',
            'folha'=>'required',
            'numero'=>'required',
            'paroco'=>'required',
            'paroquia_id'=>'required'
        ];
    }
}
