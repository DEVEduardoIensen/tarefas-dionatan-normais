<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// ATV 1: Rotas simples retornando texto
Route::get('/sobre', function () {
    return 'Página Sobre: Informações do sistema';
});

Route::get('/alunos', function () {
    return 'Página de Alunos: Lista de alunos cadastrados';
});

Route::get('/contato', function () {
    return 'Página de Contato: Entre em contato conosco';
});

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


