<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AlunoRequest;
use App\Models\Aluno;

class AlunoController extends Controller
{
    // TEMA 7 / ATV 13: CRUD completo com Aluno

    // 1. Listar todos os alunos do banco
    public function index()
    {
        $alunos = Aluno::all();
        return view('alunos.index', compact('alunos'));
    }

    // 2. Exibir o formulário de cadastro de aluno
    public function create()
    {
        return view('alunos.create');
    }

    // 3. Salvar um novo aluno no banco com validação (ATV 15)
    public function store(AlunoRequest $request)
    {
        Aluno::create($request->validated());

        return redirect()->route('alunos.index')->with('sucesso', 'Aluno cadastrado com sucesso!');
    }

    // 4. Exibir detalhes de um aluno específico
    public function show(string $id)
    {
        $aluno = Aluno::findOrFail($id);
        return view('alunos.show', compact('aluno'));
    }

    // 5. Exibir o formulário de edição de um aluno
    public function edit(string $id)
    {
        $aluno = Aluno::findOrFail($id);
        return view('alunos.edit', compact('aluno'));
    }

    // 6. Atualizar os dados do aluno no banco com validação (ATV 15)
    public function update(AlunoRequest $request, string $id)
    {
        $aluno = Aluno::findOrFail($id);
        $aluno->update($request->validated());

        return redirect()->route('alunos.index')->with('sucesso', 'Aluno atualizado com sucesso!');
    }

    // 7. Excluir um aluno do banco
    public function destroy(string $id)
    {
        $aluno = Aluno::findOrFail($id);
        $aluno->delete();

        return redirect()->route('alunos.index')->with('sucesso', 'Aluno excluído com sucesso!');
    }
}

