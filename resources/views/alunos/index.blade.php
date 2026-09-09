@extends('layouts.app')

@section('title', 'Lista de Alunos')

@section('content')
    <h2>Alunos Cadastrados</h2>
    <p>Aqui você pode visualizar todos os alunos matriculados.</p>
    <a href="/alunos/create" class="btn">Cadastrar Novo Aluno</a>
@endsection
