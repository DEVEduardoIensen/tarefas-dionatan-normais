<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Aluno;

class AlunoSeeder extends Seeder
{
    /**
     * Executa a população de dados de Alunos.
     */
    public function run(): void
    {
        $alunos = [
            [
                'nome' => 'Lucas Gabriel Oliveira',
                'email' => 'lucas.oliveira@email.com',
                'curso' => 'Engenharia de Software',
                'data_nascimento' => '2001-03-15',
            ],
            [
                'nome' => 'Mariana Costa Souza',
                'email' => 'mariana.souza@email.com',
                'curso' => 'Análise e Desenvolvimento de Sistemas',
                'data_nascimento' => '2002-07-22',
            ],
            [
                'nome' => 'Guilherme Santos Pereira',
                'email' => 'guilherme.pereira@email.com',
                'curso' => 'Ciência da Computação',
                'data_nascimento' => '2000-11-09',
            ],
            [
                'nome' => 'Beatriz Ferreira Lima',
                'email' => 'beatriz.lima@email.com',
                'curso' => 'Engenharia de Software',
                'data_nascimento' => '2003-01-30',
            ],
            [
                'nome' => 'Rafael Alves Ribeiro',
                'email' => 'rafael.ribeiro@email.com',
                'curso' => 'Sistemas de Informação',
                'data_nascimento' => '2001-09-18',
            ],
            [
                'nome' => 'Juliana Martins Barbosa',
                'email' => 'juliana.barbosa@email.com',
                'curso' => 'Análise e Desenvolvimento de Sistemas',
                'data_nascimento' => '2002-05-12',
            ],
            [
                'nome' => 'Felipe Rocha Carvalho',
                'email' => 'felipe.carvalho@email.com',
                'curso' => 'Ciência da Computação',
                'data_nascimento' => '2000-08-25',
            ],
            [
                'nome' => 'Camila Gomes Cardoso',
                'email' => 'camila.cardoso@email.com',
                'curso' => 'Engenharia de Software',
                'data_nascimento' => '2003-12-04',
            ],
            [
                'nome' => 'Thiago Dias Moreira',
                'email' => 'thiago.moreira@email.com',
                'curso' => 'Sistemas de Informação',
                'data_nascimento' => '2001-04-14',
            ],
            [
                'nome' => 'Larissa Fernandes Castro',
                'email' => 'larissa.castro@email.com',
                'curso' => 'Análise e Desenvolvimento de Sistemas',
                'data_nascimento' => '2002-10-01',
            ],
        ];

        foreach ($alunos as $aluno) {
            Aluno::updateOrCreate(['email' => $aluno['email']], $aluno);
        }
    }
}
