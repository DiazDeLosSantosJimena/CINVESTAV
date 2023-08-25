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
            'app.required' => 'Se requiere del apellido paterno.',
            'country.required' => 'Se requiere colocar el país de procedencia.',
            'state.required' => 'Se requiere colocar el estado de procedencia.',
            'municipality.required' => 'Se requiere colocar el municipio de procedencia.',
            'phone.required' => 'Se requiere colocar el número de contacto.',
            'alternative_contact.required' => 'Se requiere colocar otro medio de contacto.',
            'email.required' => 'Se requiere un correo de contacto.',
            'email.unique' => 'Correo ya registrado, intente nuevamente o ingrese un correo diferente.',
            'foto.required' => 'Es necesario ingresar una foto para el ponente.',
            'foto.mimes' => 'Ingrese el formato solicitado.',
            //'g-recaptcha-response' => 'Se requiere realizar el captcha.',
        ];

        if ($request->input('role_id') == "3") {
            $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'app' => ['required', 'string', 'max:255'],
                'country' => ['required', 'string', 'max:255'],
                'state' => ['required', 'string', 'max:255'],
                'municipality' => ['required', 'string', 'max:255'],
                'phone' => ['required', 'string', 'max:255'],
                'alternative_contact' => ['required', 'regex:/^(\d{10}|\S+@\S+\.\S+)$/','max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:' . User::class],
                'foto' => 'required|mimes:jpeg,png,jpg',
                'password' => ['required', 'confirmed', Rules\Password::defaults()],
                //'g-recaptcha-response' => ['required'],
            ], $messages);
        } else if ($request->input('role_id') == "4" || $request->input('role_id') == "5") {
            $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'app' => ['required', 'string', 'max:255'],
                'country' => ['required', 'string', 'max:255'],
                'state' => ['required', 'string', 'max:255'],
                'municipality' => ['required', 'string', 'max:255'],
                'phone' => ['required', 'string', 'max:255'],
                'alternative_contact' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:' . User::class],
                'password' => ['required', 'confirmed', Rules\Password::defaults()],
            ], $messages);
        } else {
            $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'app' => ['required', 'string', 'max:255'],
                'country' => ['required', 'string', 'max:255'],
                'state' => ['required', 'string', 'max:255'],
                'municipality' => ['required', 'string', 'max:255'],
                'phone' => ['required', 'string', 'max:255'],
                'alternative_contact' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:' . User::class],
                'password' => ['required', 'confirmed', Rules\Password::defaults()],
            ], $messages);
        }

        if ($request->file('foto')  !=  '') {
            $file = $request->file('foto');
            $name = $request->file('foto')->getClientOriginalName();
            $dates = date('YmdHis');
            $foto2 = $dates . $name;
            \Storage::disk('img_Perfil')->put($foto2, \File::get($file));
        } else {
            $foto2 = 'default.jpg';
        }

        $user = User::create([
            'name' => $request->input('name'),
            'app' => $request->input('app'),
            'apm' => $request->input('apm'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'phone' => $request->input('phone'),
            'photo' =>  $foto2,
            'alternative_contact' => $request->input('alternative_contact'),
            'country' => $request->input('country'),
            'state' => $request->input('state'),
            'municipality' => $request->input('municipality'),
            'rol_id' => $request->input('role_id'),
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
