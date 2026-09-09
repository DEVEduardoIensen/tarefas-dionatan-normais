<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class VerificarPerfil
{
    /**
     * Trata uma requisição para verificar se o usuário logado possui perfil de acesso autorizado (ATV 21).
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     * @param  string  ...$perfisPermitidos
     */
    public function handle(Request $request, Closure $next, string ...$perfisPermitidos): Response
    {
        // Verifica se o usuário está autenticado
        if (!auth()->check()) {
            return redirect()->route('login')->with('erro', 'Você precisa estar logado para acessar esta página.');
        }

        // Verifica se o role do usuário está na lista de perfis permitidos
        if (!in_array($request->user()->role, $perfisPermitidos)) {
            abort(403, 'Acesso não autorizado para o seu tipo de usuário (' . $request->user()->role . ').');
        }

        return $next($request);
    }
}
