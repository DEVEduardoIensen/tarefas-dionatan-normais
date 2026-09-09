@extends('layouts.app')

@section('title', 'Lista de Alunos')

@section('content')
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
        <h2>Alunos Cadastrados</h2>
        <a href="{{ route('alunos.create') }}" class="btn">Cadastrar Novo Aluno</a>
    </div>

    @if(session('sucesso'))
        <div style="background-color: #c6f6d5; color: #22543d; padding: 12px; border-radius: 6px; margin-bottom: 20px;">
            {{ session('sucesso') }}
        </div>
    @endif

    @if(isset($alunos) && count($alunos) > 0)
        <table style="width: 100%; border-collapse: collapse; margin-top: 10px;">
            <thead>
                <tr style="background-color: #edf2f7; text-align: left;">
                    <th style="padding: 10px; border-bottom: 2px solid #cbd5e0;">ID</th>
                    <th style="padding: 10px; border-bottom: 2px solid #cbd5e0;">Nome</th>
                    <th style="padding: 10px; border-bottom: 2px solid #cbd5e0;">Email</th>
                    <th style="padding: 10px; border-bottom: 2px solid #cbd5e0;">Curso</th>
                    <th style="padding: 10px; border-bottom: 2px solid #cbd5e0; text-align: right;">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($alunos as $aluno)
                    <tr style="border-bottom: 1px solid #e2e8f0;">
                        <td style="padding: 10px;">{{ $aluno->id }}</td>
                        <td style="padding: 10px;"><strong>{{ $aluno->nome }}</strong></td>
                        <td style="padding: 10px;">{{ $aluno->email }}</td>
                        <td style="padding: 10px;">{{ $aluno->curso }}</td>
                        <td style="padding: 10px; text-align: right;">
                            <a href="{{ route('alunos.show', $aluno->id) }}" style="color: #3182ce; margin-right: 8px; text-decoration: none;">Ver</a>
                            <a href="{{ route('alunos.edit', $aluno->id) }}" style="color: #d69e2e; margin-right: 8px; text-decoration: none;">Editar</a>
                            <form action="{{ route('alunos.destroy', $aluno->id) }}" method="POST" style="display: inline-block;" onsubmit="return confirm('Deseja realmente excluir este aluno?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" style="background: none; border: none; color: #e53e3e; cursor: pointer; padding: 0;">Excluir</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>Nenhum aluno cadastrado no momento.</p>
    @endif
@endsection
