@extends('layouts.app')

@section('title', 'Detalhes do Aluno')

@section('content')
    <h2>Ficha do Aluno: {{ $aluno->nome }}</h2>

    <div style="background-color: #f7fafc; border: 1px solid #e2e8f0; padding: 20px; border-radius: 6px; margin: 20px 0;">
        <p><strong>ID:</strong> {{ $aluno->id }}</p>
        <p><strong>Nome Completo:</strong> {{ $aluno->nome }}</p>
        <p><strong>E-mail:</strong> {{ $aluno->email }}</p>
        <p><strong>Curso:</strong> {{ $aluno->curso }}</p>
        <p><strong>Data de Nascimento:</strong> {{ $aluno->data_nascimento ? \Carbon\Carbon::parse($aluno->data_nascimento)->format('d/m/Y') : 'Não informada' }}</p>
        <p><strong>Cadastrado em:</strong> {{ $aluno->created_at->format('d/m/Y H:i') }}</p>
    </div>

    <div style="display: flex; gap: 10px;">
        <a href="{{ route('alunos.edit', $aluno->id) }}" class="btn" style="background-color: #d69e2e;">Editar Aluno</a>
        <a href="{{ route('alunos.index') }}" class="btn" style="background-color: #718096;">Voltar para a Lista</a>
    </div>
@endsection
