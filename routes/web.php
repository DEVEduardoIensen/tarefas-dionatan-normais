<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AlunoController;
use App\Models\Aluno;
use App\Models\Curso;
use Illuminate\Support\Facades\Route;

// Página Inicial
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
Route::prefix('consultas/alunos')->group(function () {
    Route::get('/curso/{curso}', function ($curso) {
        $alunos = Aluno::doCurso($curso)->get();
        return response()->json($alunos);
    });

    Route::get('/nome/{termo}', function ($termo) {
        $alunos = Aluno::nomeContem($termo)->get();
        return response()->json($alunos);
    });

    Route::get('/recentes', function () {
        $alunos = Aluno::recentes()->get();
        return response()->json($alunos);
    });

    Route::get('/quantidade', function () {
        $quantidade = Aluno::quantidadeTotal();
        return "Quantidade total de alunos cadastrados: {$quantidade}";
    });
});

// TEMA 9 / DESAFIO: Rota para exibir todos os alunos vinculados a um curso
Route::get('/cursos/{id}/alunos', function ($id) {
    $curso = Curso::with('alunos')->findOrFail($id);
    return view('cursos.alunos', compact('curso'));
})->name('cursos.alunos');

// TEMA 10 / ATV 18: Rotas do Laravel Breeze (Autenticação e Dashboard)
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
