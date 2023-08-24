<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckAdminRole
{

    public function handle(Request $request, Closure $next): Response
    {
        // Obtener el usuario autenticado
        $user = Auth::user();
        // Verificar el tipo de usuario (por ejemplo, role_id == 3 para el usuario)
        if ($user->rol_id === 1) {
            return $next($request);
        }
        // Si no es un usuario, redirigir al dashboard
        return redirect('/');
    }
}
