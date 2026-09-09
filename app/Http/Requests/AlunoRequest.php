<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AlunoRequest extends FormRequest
{
    /**
     * Determina se o usuário tem autorização para fazer esta requisição.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Regras de validação aplicadas aos dados do aluno (ATV 15).
     */
    public function rules(): array
    {
        $alunoId = $this->route('aluno');

        return [
            'nome' => 'required|string|min:3|max:255',
            'email' => 'required|email|unique:alunos,email,' . ($alunoId ?? 'NULL') . ',id',
            'curso' => 'required|string|max:255',
            'data_nascimento' => 'nullable|date|before:today',
        ];
    }

    /**
     * Mensagens personalizadas para as validações (DESAFIO Tema 8).
     */
    public function messages(): array
    {
        return [
            'nome.required' => 'O campo nome do aluno é obrigatório.',
            'nome.min' => 'O nome do aluno deve ter pelo menos 3 caracteres.',
            'email.required' => 'O endereço de e-mail é obrigatório.',
            'email.email' => 'Por favor, informe um endereço de e-mail válido.',
            'email.unique' => 'Este e-mail já está cadastrado para outro aluno no sistema.',
            'curso.required' => 'O campo curso é obrigatório.',
            'data_nascimento.date' => 'A data de nascimento informada não é válida.',
            'data_nascimento.before' => 'A data de nascimento deve ser uma data anterior ao dia de hoje.',
        ];
    }
}
