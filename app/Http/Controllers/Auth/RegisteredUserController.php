<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $messages = [
            'name.required' => 'Se requiere del nombre.',
            'apm.required' => 'Se requiere del apellido paterno.',
            'app.required' => 'Se requiere del apellido paterno.',
            'country.required' => 'Se requiere colocar el país de procedencia.',
            'state.required' => 'Se requiere colocar el estado de procedencia.',
            'municipality.required' => 'Se requiere colocar el municipio de procedencia.',
            'phone.required' => 'Se requiere colocar el número de contacto.',
            'academic_degree.required' => 'Se requiere colocar el grado academico.',
            'email.required' => 'Se requiere un correo de contacto.',
            'email.unique' => 'Correo ya registrado, intente nuevamente o ingrese un correo diferente.',
        ];

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'apm' => ['required', 'string', 'max:255'],
            'app' => ['required', 'string', 'max:255'],
            'country' => ['required', 'string', 'max:255'],
            'state' => ['required', 'string', 'max:255'],
            'municipality' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:255'],
            'academic_degree' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', Rules\Password::defaults()],
        ], $messages);

        $user = User::create([
            'name' => $request->input('name'),
            'app' => $request->input('app'),
            'apm' => $request->input('apm'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'phone' => $request->input('phone'),
            'academic_degree' =>  $request->input('academic_degree'),
            'country' => $request->input('country'),
            'state' => $request->input('state'),
            'municipality' => $request->input('municipality'),
            'assistance' => $request->input('assistance'),
            'rol_id' => $request->input('role_id'),
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }   
}
