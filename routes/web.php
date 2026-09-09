<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlunoController;

Route::get('/', function () {
    return view('home');
});

Route::get('/home', function () {
    return view('home');
});


// ATV 1: Rotas simples retornando texto
Route::get('/sobre', function () {
    return 'Página Sobre: Informações do sistema';
});

Route::get('/contato', function () {
    return 'Página de Contato: Entre em contato conosco';
});

// TEMA 2 / ATV 4: 7 rotas principais de CRUD com AlunoController
Route::resource('alunos', AlunoController::class);


// ATV 2: Rotas com parâmetro retornando texto
Route::get('/produto/{id}', function ($id) {
    return "Visualizando Produto com ID: {$id}";
});

Route::get('/categoria/{id}', function ($id) {
    return "Visualizando Categoria com ID: {$id}";
});

Route::get('/usuario/{id}', function ($id) {
    return "Visualizando Usuário com ID: {$id}";
});

// TEMA 5 / ATV 11: Consultas com Eloquent
use App\Models\Aluno;

Route::prefix('consultas/alunos')->group(function () {
    // 1. Alunos de determinado curso
    Route::get('/curso/{curso}', function ($curso) {
        $alunos = Aluno::doCurso($curso)->get();
        return response()->json($alunos);
    });

    // 2. Alunos cujo nome contém determinada palavra
    Route::get('/nome/{termo}', function ($termo) {
        $alunos = Aluno::nomeContem($termo)->get();
        return response()->json($alunos);
    });

    // 3. Alunos cadastrados recentemente
    Route::get('/recentes', function () {
        $alunos = Aluno::recentes()->get();
        return response()->json($alunos);
    });

    // 4. Quantidade de alunos
    Route::get('/quantidade', function () {
        $quantidade = Aluno::quantidadeTotal();
        return "Quantidade total de alunos cadastrados: {$quantidade}";
    });
});

// TEMA 9 / DESAFIO: Rota para exibir todos os alunos vinculados a um curso
use App\Models\Curso;

Route::get('/cursos/{id}/alunos', function ($id) {
    $curso = Curso::with('alunos')->findOrFail($id);
    return view('cursos.alunos', compact('curso'));
})->name('cursos.alunos');




