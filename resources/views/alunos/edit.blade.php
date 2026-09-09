@extends('layouts.app')

@section('title', 'Editar Aluno')

@section('content')
    <h2>Editar Aluno: {{ $aluno->nome }}</h2>

    @if ($errors->any())
        <div style="background-color: #fed7d7; color: #9b2c2c; padding: 12px; border-radius: 6px; margin-bottom: 20px;">
            <ul style="margin: 0; padding-left: 20px;">
                @foreach ($errors->all() as $erro)
                    <li>{{ $erro }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('alunos.update', $aluno->id) }}" method="POST" style="margin-top: 20px;">
        @csrf
        @method('PUT')

        <div style="margin-bottom: 15px;">
            <label for="nome" style="display: block; font-weight: bold; margin-bottom: 5px;">Nome Completo:</label>
            <input type="text" id="nome" name="nome" value="{{ old('nome', $aluno->nome) }}" required style="width: 100%; padding: 8px; border: 1px solid #cbd5e0; border-radius: 4px; box-sizing: border-box;">
        </div>

        <div style="margin-bottom: 15px;">
            <label for="email" style="display: block; font-weight: bold; margin-bottom: 5px;">E-mail:</label>
            <input type="email" id="email" name="email" value="{{ old('email', $aluno->email) }}" required style="width: 100%; padding: 8px; border: 1px solid #cbd5e0; border-radius: 4px; box-sizing: border-box;">
        </div>

        <div style="margin-bottom: 15px;">
            <label for="curso" style="display: block; font-weight: bold; margin-bottom: 5px;">Curso:</label>
            <input type="text" id="curso" name="curso" value="{{ old('curso', $aluno->curso) }}" required style="width: 100%; padding: 8px; border: 1px solid #cbd5e0; border-radius: 4px; box-sizing: border-box;">
        </div>

        <div style="margin-bottom: 20px;">
            <label for="data_nascimento" style="display: block; font-weight: bold; margin-bottom: 5px;">Data de Nascimento:</label>
            <input type="date" id="data_nascimento" name="data_nascimento" value="{{ old('data_nascimento', $aluno->data_nascimento) }}" style="width: 100%; padding: 8px; border: 1px solid #cbd5e0; border-radius: 4px; box-sizing: border-box;">
        </div>

        <div style="display: flex; gap: 10px;">
            <button type="submit" class="btn" style="background-color: #38a169; border: none; cursor: pointer;">Salvar Alterações</button>
            <a href="{{ route('alunos.index') }}" class="btn" style="background-color: #718096;">Cancelar</a>
        </div>
    </form>
@endsection
