<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AlunoController extends Controller
{
    // ATV 4: Implementação dos 7 métodos principais de CRUD

    // 1. Listar todos os alunos
    public function index()
    {
        // Dados de exemplo para demonstrar @if e @foreach nas views
        $alunos = [
            ['id' => 1, 'nome' => 'Ana Silva', 'curso' => 'Engenharia de Software'],
            ['id' => 2, 'nome' => 'Carlos Santos', 'curso' => 'Análise e Desenvolvimento de Sistemas'],
            ['id' => 3, 'nome' => 'Beatriz Lima', 'curso' => 'Ciência da Computação'],
        ];

        return view('alunos.index', compact('alunos'));
    }

    // 2. Formulário para criar novo aluno
    public function create()
    {
        return view('alunos.create');
    }

    // 3. Salvar novo aluno no banco de dados
    public function store(Request $request)
    {
        return 'Processando cadastro do aluno (store)';
    }

    // 4. Exibir detalhes de um aluno específico
    public function show(string $id)
    {
        return view('alunos.show', ['id' => $id]);
    }

    // 5. Formulário para editar um aluno existente
    public function edit(string $id)
    {
        return view('alunos.edit', ['id' => $id]);
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

