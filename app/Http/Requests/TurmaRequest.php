<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TurmaRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'nome'      => 'required|min:3|max:100',
            'descricao' => 'max:300',
            'escola'    => 'required',
        ];
    }

    public function messages() {
        return [
            'nome.required'   => "Nome é obrigatório",
            'nome.min'        => "Nome deve possuir no mínimo 3 caracteres",
            'nome.max'        => "Nome deve possuir no máximo 100 caracteres",
            'descricao.max'   => "Descrição deve possuir no máximo 300 caracteres",
            'escola.required' => "Uma Escola deve ser definida para a turma",
        ];
    }
}
