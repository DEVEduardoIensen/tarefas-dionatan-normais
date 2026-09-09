<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aluno extends Model
{
    use HasFactory;

    // Nome da tabela correspondente no banco de dados
    protected $table = 'alunos';

    // Campos liberados para preenchimento em massa
    protected $fillable = [
        'nome',
        'email',
        'curso',
        'data_nascimento',
    ];
}

