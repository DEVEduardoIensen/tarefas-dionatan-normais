<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Curso;
use App\Models\Aluno;

class CursoSeeder extends Seeder
{
    /**
     * Popula cursos e vincula com alunos existentes.
     */
    public function run(): void
    {
        $curso1 = Curso::firstOrCreate(['nome' => 'Engenharia de Software'], ['duracao_semestres' => 10]);
        $curso2 = Curso::firstOrCreate(['nome' => 'Análise e Desenvolvimento de Sistemas'], ['duracao_semestres' => 5]);
        $curso3 = Curso::firstOrCreate(['nome' => 'Ciência da Computação'], ['duracao_semestres' => 8]);

        Aluno::where('curso', 'like', '%Software%')->update(['curso_id' => $curso1->id]);
        Aluno::where('curso', 'like', '%Análise%')->update(['curso_id' => $curso2->id]);
        Aluno::where('curso', 'like', '%Computação%')->update(['curso_id' => $curso3->id]);
    }
}
