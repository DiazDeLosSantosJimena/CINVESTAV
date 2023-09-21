<?php

namespace App\Http\Controllers;

use App\Models\Evaluations;
use App\Models\Projects;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Exports\GeneralExport;
use Maatwebsite\Excel\Facades\Excel;


class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('auth/register');
    }

    public function indexView()
    {
        return view('layout.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        User::find($id)->delete();
        return redirect()->route('usuarios')->with('status', 'Registro eliminado con exito!');
    }

    public function usuarios()
    {
        $usuarios = \DB::select('SELECT users.id, users.name, users.apm, users.academic_degree, users.email, users.phone, users.country,
        users.state, users.municipality, users.assistance, users.rol_id FROM users, roles WHERE users.rol_id = roles.id AND
        roles.id = "2"');
        return view('usuarios.index', compact('usuarios'));
    }


    
    public function agregarjuez(Request $request)
    {
        $messages = [
            'name.required' => 'Es necesario colocar un nombre.',
            'app.required' => 'Es necesario colocar el primer apellido.',
            'apm.string' => 'Formato Invalido.',
            'alternative_contact.required' => 'Es necesario colocar el grado academico.',
            'email.required' => 'Es necesario colocar un correo.',
            'email.unique' => 'Este correo ya está asociado a una cuenta.',
            'phone.required' => 'Es necesario colocar un teléfono.',
            'country.required' => 'Es necesario colocar este campo.',
            'state.required' => 'Es necesario colocar este campo.',
            'municipality.required' => 'Es necesario colocar este campo.',
            'password.required' => 'Genere una contraseña',
        ];

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'app' => ['required', 'string', 'max:255'],
            'apm' => ['string', 'max:255'],
            'alternative_contact' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'unique:' . User::class],
            'phone' => ['required', 'string'],
            'country' => ['required', 'string', 'max:255'],
            'state' => ['required', 'string', 'max:255'],
            'municipality' => ['required', 'string', 'max:255'],
            'password' => ['required']
        ], $messages);

        User::create(array(
            'name' => $request->input('name'),
            'app' => $request->input('app'),
            'apm' => $request->input('apm'),
            'alternative_contact' => $request->input('alternative_contact'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'country' => $request->input('country'),
            'state' => $request->input('state'),
            'municipality' => $request->input('municipality'),
            'password' => Hash::make($request->input('password')),
            'rol_id' => 2,
        ));

        return redirect('usuarios')->with('status', 'Registro exitoso!');
    }

    
    public function salvarjuez(User $id, Request $request)
    {
         $query = User::find($id->id);

        //dd($request->all());
        $query = User::find($id->id);

        $query->name = trim($request->name);
        $query->app = trim($request->app);
        $query->apm = trim($request->apm);
        $query->alternative_contact = $request->alternative_contact;
        $query->email = trim($request->email);
        $query->phone = trim($request->phone);
        $query->country = trim($request->country);
        $query->state = trim($request->state);
        $query->municipality = trim($request->municipality);
        
        if($passValidate == true){
            $query->password = Hash::make(trim($request->password));
        }

        $query->save();
        return redirect()->route('usuarios')->with('status', 'Registro actualizado con exito!');
    }

    public function general() {
        return Excel::download(new GeneralExport, 'PublicoGeneral.xlsx');
    }
}

// ==================================== UTVT ====================================