@extends('layouts.app')

@section('title', 'Lista de Alunos')

@section('content')
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
        <h2>Alunos Cadastrados</h2>
        <a href="/alunos/create" class="btn">Cadastrar Novo Aluno</a>
    </div>

    {{-- Diretiva @if para verificar se existem alunos --}}
    @if(isset($alunos) && count($alunos) > 0)
        <ul>
            {{-- Diretiva @foreach para listar cada aluno --}}
            @foreach($alunos as $aluno)
                <li style="display: flex; justify-content: space-between; align-items: center;">
                    <div>
                        <strong>{{ $aluno['nome'] }}</strong> - Curso: {{ $aluno['curso'] }}
                    </div>
                    <div>
                        <a href="/alunos/{{ $aluno['id'] }}" style="color: #3182ce; margin-right: 10px; text-decoration: none;">Ver Detalhes</a>
                        <a href="/alunos/{{ $aluno['id'] }}/edit" style="color: #d69e2e; text-decoration: none;">Editar</a>
                    </div>
                </li>
            @endforeach
        </ul>
    @else
        <p>Nenhum aluno cadastrado no momento.</p>
    @endif
@endsection
