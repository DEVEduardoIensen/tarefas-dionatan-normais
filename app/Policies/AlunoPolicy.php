<?php

namespace App\Policies;

use App\Models\Aluno;
use App\Models\User;

class AlunoPolicy
{
    /**
     * Qualquer usuário (mesmo visitante) pode visualizar a lista de alunos.
     */
    public function viewAny(?User $user): bool
    {
        return true;
    }

    /**
     * Qualquer usuário pode visualizar os detalhes de um aluno.
     */
    public function view(?User $user, Aluno $aluno): bool
    {
        return true;
    }

    /**
     * ATV 23: Apenas Admin pode cadastrar novo Aluno.
     */
    public function create(User $user): bool
    {
        return $user->isAdmin();
    }

    /**
     * ATV 23: Professor e Admin podem editar Aluno.
     */
    public function update(User $user, Aluno $aluno): bool
    {
        return $user->isAdmin() || $user->isProfessor();
    }

    /**
     * ATV 23: Apenas Admin pode excluir Aluno.
     */
    public function delete(User $user, Aluno $aluno): bool
    {
        return $user->isAdmin();
    }
}
