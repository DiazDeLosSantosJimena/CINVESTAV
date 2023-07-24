<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckVisorRole
{
    public function handle(Request $request, Closure $next): Response
    {
        // Obtener el usuario autenticado
        $user = Auth::user();
        // Verificar el tipo de usuario (por ejemplo, role_id == 2 para el visor)
        if ($user->rol_id === 2 || $user->rol_id === 1) {
            // Usuario es visor continua con la solicitud
            return $next($request);
        }
        // Si no es un usuario visor, redirigir al dashboard
        return redirect('/');
    }
}
