@extends('layouts.app')

@section('title', 'Cadastrar Novo Aluno')

@section('content')
    <h2>Formulário de Cadastro de Aluno</h2>
    <p>Preencha os campos abaixo para cadastrar um novo aluno no sistema.</p>

    @if ($errors->any())
        <div style="background-color: #fed7d7; color: #9b2c2c; padding: 12px; border-radius: 6px; margin-bottom: 20px;">
            <strong>Atenção:</strong> Corrija os erros abaixo:
            <ul style="margin: 8px 0 0 0; padding-left: 20px;">
                @foreach ($errors->all() as $erro)
                    <li>{{ $erro }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('alunos.store') }}" method="POST" style="margin-top: 20px;">
        @csrf

        <div style="margin-bottom: 15px;">
            <label for="nome" style="display: block; font-weight: bold; margin-bottom: 5px;">Nome Completo:</label>
            <input type="text" id="nome" name="nome" value="{{ old('nome') }}" placeholder="Ex: João da Silva" style="width: 100%; padding: 8px; border: 1px solid #cbd5e0; border-radius: 4px; box-sizing: border-box;">
        </div>

        <div style="margin-bottom: 15px;">
            <label for="email" style="display: block; font-weight: bold; margin-bottom: 5px;">E-mail:</label>
            <input type="email" id="email" name="email" value="{{ old('email') }}" placeholder="Ex: joao.silva@email.com" style="width: 100%; padding: 8px; border: 1px solid #cbd5e0; border-radius: 4px; box-sizing: border-box;">
        </div>

        <div style="margin-bottom: 15px;">
            <label for="curso" style="display: block; font-weight: bold; margin-bottom: 5px;">Curso:</label>
            <input type="text" id="curso" name="curso" value="{{ old('curso') }}" placeholder="Ex: Engenharia de Software" style="width: 100%; padding: 8px; border: 1px solid #cbd5e0; border-radius: 4px; box-sizing: border-box;">
        </div>

        <div style="margin-bottom: 20px;">
            <label for="data_nascimento" style="display: block; font-weight: bold; margin-bottom: 5px;">Data de Nascimento:</label>
            <input type="date" id="data_nascimento" name="data_nascimento" value="{{ old('data_nascimento') }}" style="width: 100%; padding: 8px; border: 1px solid #cbd5e0; border-radius: 4px; box-sizing: border-box;">
        </div>

        <div style="display: flex; gap: 10px;">
            <button type="submit" class="btn" style="background-color: #3182ce; border: none; cursor: pointer;">Cadastrar Aluno</button>
            <a href="{{ route('alunos.index') }}" class="btn" style="background-color: #718096;">Cancelar</a>
        </div>
    </form>
@endsection
