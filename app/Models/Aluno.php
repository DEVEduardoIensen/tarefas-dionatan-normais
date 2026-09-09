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
        'curso_id',
        'user_id',
        'data_nascimento',
    ];

    /**
     * Relacionamento 1 para 1 inverso: O aluno pertence a um usuário do sistema (ATV 19).
     */
    public function usuario()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Relacionamento N para 1: O aluno pertence a um curso (ATV 17).
     */
    public function cursoRelacionado()
    {
        return $this->belongsTo(Curso::class, 'curso_id');
    }

    // ATV 11: Consultas no Eloquent

    // 1. Alunos de determinado curso
    public function scopeDoCurso($query, $curso)
    {
        return $query->where('curso', $curso);
    }

    // 2. Alunos cujo nome contém determinada palavra
    public function scopeNomeContem($query, $termo)
    {
        return $query->where('nome', 'like', "%{$termo}%");
    }

    // 3. Alunos cadastrados recentemente
    public function scopeRecentes($query, $limite = 5)
    {
        return $query->latest()->take($limite);
    }

    // 4. Quantidade de alunos
    public static function quantidadeTotal()
    {
        return self::count();
    }
}

