<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    use HasFactory;

    // Nome da tabela correspondente no banco de dados
    protected $table = 'cursos';

    // Campos liberados para preenchimento em massa
    protected $fillable = [
        'nome',
        'duracao_semestres',
    ];

    /**
     * Relacionamento 1 para N: Um curso possui muitos alunos (ATV 17).
     */
    public function alunos()
    {
        return $this->hasMany(Aluno::class, 'curso_id');
    }
}
