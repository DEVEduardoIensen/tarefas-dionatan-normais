@extends('layouts.app')

@section('title', 'Página Inicial')

@section('content')
    <h2>Bem-vindo ao Sistema de Gestão Escolar</h2>
    <p>Esta é a página inicial da aplicação desenvolvida em Laravel.</p>
    <p>Utilize o menu para navegar entre as seções do sistema.</p>
    <a href="/alunos" class="btn">Ver Lista de Alunos</a>
@endsection
