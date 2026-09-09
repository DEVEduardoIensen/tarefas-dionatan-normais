<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
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

    // 2. Exibir o formulário de cadastro de aluno (ATV 23: apenas Admin)
    public function create()
    {
        Gate::authorize('create', Aluno::class);
        return view('alunos.create');
    }

    // 3. Salvar um novo aluno no banco com validação (ATV 15 e 23)
    public function store(AlunoRequest $request)
    {
        Gate::authorize('create', Aluno::class);
        Aluno::create($request->validated());

        return redirect()->route('alunos.index')->with('sucesso', 'Aluno cadastrado com sucesso!');
    }

    // 4. Exibir detalhes de um aluno específico
    public function show(string $id)
    {
        $aluno = Aluno::findOrFail($id);
        return view('alunos.show', compact('aluno'));
    }

    // 5. Exibir o formulário de edição de um aluno (ATV 23: Admin ou Professor)
    public function edit(string $id)
    {
        $aluno = Aluno::findOrFail($id);
        Gate::authorize('update', $aluno);

        return view('alunos.edit', compact('aluno'));
    }

    // 6. Atualizar os dados do aluno no banco (ATV 23: Admin ou Professor)
    public function update(AlunoRequest $request, string $id)
    {
        $aluno = Aluno::findOrFail($id);
        Gate::authorize('update', $aluno);
        $aluno->update($request->validated());

        return redirect()->route('alunos.index')->with('sucesso', 'Aluno atualizado com sucesso!');
    }

    // 7. Excluir um aluno do banco (ATV 23: apenas Admin)
    public function destroy(string $id)
    {
        $aluno = Aluno::findOrFail($id);
        Gate::authorize('delete', $aluno);
        $aluno->delete();

        return redirect()->route('alunos.index')->with('sucesso', 'Aluno excluído com sucesso!');
    }
}

