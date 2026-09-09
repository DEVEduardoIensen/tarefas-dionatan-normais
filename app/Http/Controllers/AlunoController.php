<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AlunoController extends Controller
{
    // ATV 4: Implementação dos 7 métodos principais de CRUD

    // 1. Listar todos os alunos
    public function index()
    {
        return 'Página de Listagem de Alunos (index)';
    }

    // 2. Formulário para criar novo aluno
    public function create()
    {
        return 'Formulário de Cadastro de Aluno (create)';
    }

    // 3. Salvar novo aluno no banco de dados
    public function store(Request $request)
    {
        return 'Processando cadastro do aluno (store)';
    }

    // 4. Exibir detalhes de um aluno específico
    public function show(string $id)
    {
        return "Exibindo detalhes do Aluno ID: {$id} (show)";
    }

    // 5. Formulário para editar um aluno existente
    public function edit(string $id)
    {
        return "Formulário de Edição do Aluno ID: {$id} (edit)";
    }

    // 6. Atualizar os dados do aluno no banco de dados
    public function update(Request $request, string $id)
    {
        return "Atualizando dados do Aluno ID: {$id} (update)";
    }

    // 7. Excluir um aluno do banco de dados
    public function destroy(string $id)
    {
        return "Excluindo Aluno ID: {$id} (destroy)";
    }
}

