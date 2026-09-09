@extends('layouts.app')

@section('title', 'Alunos do Curso: ' . $curso->nome)

@section('content')
    <div style="margin-bottom: 20px;">
        <h2>Curso: {{ $curso->nome }}</h2>
        <p><strong>Duração:</strong> {{ $curso->duracao_semestres }} semestres</p>
        <p><strong>Total de Alunos Matriculados:</strong> {{ $curso->alunos->count() }}</p>
    </div>

    <h3>Lista de Alunos Vinculados</h3>

    @if($curso->alunos->count() > 0)
        <table style="width: 100%; border-collapse: collapse; margin-top: 10px;">
            <thead>
                <tr style="background-color: #edf2f7; text-align: left;">
                    <th style="padding: 10px; border-bottom: 2px solid #cbd5e0;">ID</th>
                    <th style="padding: 10px; border-bottom: 2px solid #cbd5e0;">Nome do Aluno</th>
                    <th style="padding: 10px; border-bottom: 2px solid #cbd5e0;">E-mail</th>
                    <th style="padding: 10px; border-bottom: 2px solid #cbd5e0;">Data de Cadastro</th>
                </tr>
            </thead>
            <tbody>
                @foreach($curso->alunos as $aluno)
                    <tr style="border-bottom: 1px solid #e2e8f0;">
                        <td style="padding: 10px;">{{ $aluno->id }}</td>
                        <td style="padding: 10px;"><strong>{{ $aluno->nome }}</strong></td>
                        <td style="padding: 10px;">{{ $aluno->email }}</td>
                        <td style="padding: 10px;">{{ $aluno->created_at ? $aluno->created_at->format('d/m/Y') : '-' }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <div style="background-color: #feebc8; color: #7b341e; padding: 12px; border-radius: 6px; margin-top: 15px;">
            Nenhum aluno está vinculado a este curso no momento.
        </div>
    @endif

    <div style="margin-top: 25px;">
        <a href="{{ route('alunos.index') }}" class="btn" style="background-color: #718096;">Voltar para Lista de Alunos</a>
    </div>
@endsection
