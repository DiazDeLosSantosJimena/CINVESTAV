<?php

namespace App\Http\Controllers;

use App\Models\Evaluations;
use App\Models\Projects;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

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
        $usuariosG = User::where('rol_id', '=', 3)->orWhere('rol_id', '=', 4)->orWhere('rol_id', 5)->get();
        // $usuarios = \DB::select('SELECT users.id, users.name, users.apm, users.app,users.alternative_contact, users.email, users.phone, users.country,
        // users.state, users.municipality, users.rol_id, users.deleted_at FROM users, roles WHERE users.rol_id = roles.id AND
        // roles.id = "2"');
        $usuarios = User::with('roles')->where('rol_id', 2)->get();
        //$proyects = Projects::where('status', '>', '1')->get();
        $proyects = \DB::SELECT('SELECT proUser.id, pro.title
        FROM projects AS pro 
            JOIN projects_users AS proUser ON pro.id = proUser.project_id
        WHERE pro.status > 1 AND proUser.id NOT IN (SELECT project_user
            FROM evaluations
            GROUP BY project_user
            HAVING COUNT(*) >= 3)');
        $proyectsEvaluators = \DB::SELECT('SELECT eva.id AS evaluationId, eva.status, us.id, us.name, us.app, us.apm, us.alternative_contact, us.email, us.deleted_at, pro.title
        FROM evaluations AS eva
            JOIN users AS us ON eva.user_id = us.id
            JOIN projects_users AS proUs ON proUs.id = eva.project_user
            JOIN projects AS pro ON pro.id = proUs.project_id');
        $users = User::where('rol_id', '2')->get();
        return view('usuarios.index', compact('usuarios', 'proyects', 'users', 'proyectsEvaluators', 'usuariosG'));
    }

    public function js_juez(Request $request)
    {
        $projects = $request->get('id_proyecto');
        $evaluador = \DB::SELECT('SELECT id, name, app, apm, email, deleted_at
        FROM users
        WHERE rol_id = 2 AND id NOT IN (
            SELECT us.id
            FROM evaluations AS eva
                JOIN users AS us ON us.id = eva.user_id
            WHERE eva.project_user = ' . $projects . ')');

        return view('usuarios.js_proyecto', compact('evaluador'));
    }

    public function agregarInvitado(Request $request)
    {

        $messages = [
            'nameE.required' => 'Es necesario colocar un nombre.',
            'appE.required' => 'Es necesario colocar el primer apellido.',
            'apmE.string' => 'Formato Invalido.',
            'alternative_contact.required' => 'Es necesario colocar el grado academico.',
            'email.required' => 'Es necesario colocar un correo.',
            'email.unique' => 'El correo ya está registrado, ingrese un correo nuevo.',
            'phoneE.required' => 'Es necesario colocar un teléfono.',
            'countryE.required' => 'Es necesario colocar este campo.',
            'stateE.required' => 'Es necesario colocar este campo.',
            'municipalityE.required' => 'Es necesario colocar este campo.',
        ];

        $request->validate([
            'nameE' => ['required', 'string', 'max:255'],
            'appE' => ['required', 'string', 'max:255'],
            'apmE' => ['string', 'max:255'],
            'alternative_contact' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'unique:' . User::class],
            'phoneE' => ['required', 'string'],
            'countryE' => ['required', 'string', 'max:255'],
            'stateE' => ['required', 'string', 'max:255'],
            'municipalityE' => ['required', 'string', 'max:255'],
        ], $messages);

        User::create(array(
            'name' => $request->input('nameE'),
            'app' => $request->input('appE'),
            'apm' => $request->input('apmE'),
            'alternative_contact' => $request->input('alternative_contact'),
            'email' => $request->input('email'),
            'phone' => $request->input('phoneE'),
            'country' => $request->input('countryE'),
            'state' => $request->input('stateE'),
            'municipality' => $request->input('municipalityE'),
            'rol_id' => 5,
        ));
        /*$mail= $request->input('email');

        Mail::send('vista', function ($message) use ($mail) {
            $message->to($mail, 'CINVESTAV')
                ->subject('Invitación al Evento')
                ->from('hello@example.com', 'CINVESTAV');
        });*/

        return redirect('usuarios')->with('status', 'Registro exitoso!');
    }

    public function agregarjuez(Request $request)
    {
        $messages = [
            'name.required' => 'Es necesario colocar un nombre.',
            'app.required' => 'Es necesario colocar el primer apellido.',
            'apm.string' => 'Formato Invalido.',
            'alternative_contact.required' => 'Es necesario colocar el grado academico.',
            'email.required' => 'Es necesario colocar un correo.',
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
            'email' => ['required', 'email'],
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

    public function salvarPonente(User $id, Request $request) {
        $messages = [
            'name.required' => 'Es necesario colocar un nombre.',
            'app.required' => 'Es necesario colocar el primer apellido.',
            'apm.string' => 'Formato Invalido.',
            'alternative_contact.required' => 'Es necesario colocar otro medio de contacto.',
            'phone.required' => 'Es necesario colocar un teléfono.',
            'country.required' => 'Es necesario colocar este campo.',
            'state.required' => 'Es necesario colocar este campo.',
            'municipality.required' => 'Es necesario colocar este campo.',
        ];

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'app' => ['required', 'string', 'max:255'],
            'apm' => ['string', 'max:255'],
            'alternative_contact' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string'],
            'country' => ['required', 'string', 'max:255'],
            'state' => ['required', 'string', 'max:255'],
            'municipality' => ['required', 'string', 'max:255'],
        ], $messages);

        $query = User::find($id->id);
        $query->name = trim($request->name);
        $query->app = trim($request->app);
        $query->apm = trim($request->apm);
        $query->alternative_contact = $request->alternative_contact;
        $query->phone = trim($request->phone);
        $query->country = trim($request->country);
        $query->state = trim($request->state);
        $query->municipality = trim($request->municipality);

        $query->save();

        return redirect()->route('usuarios')->with('status', 'Registro actualizado con exito!');
    }

    public function salvarInvitado(User $id, Request $request)
    {
        $messages = [
            'name.required' => 'Es necesario colocar un nombre.',
            'app.required' => 'Es necesario colocar el primer apellido.',
            'apm.string' => 'Formato Invalido.',
            'alternative_contact.required' => 'Es necesario colocar otro medio de contacto.',
            'phone.required' => 'Es necesario colocar un teléfono.',
            'country.required' => 'Es necesario colocar este campo.',
            'state.required' => 'Es necesario colocar este campo.',
            'municipality.required' => 'Es necesario colocar este campo.',
        ];

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'app' => ['required', 'string', 'max:255'],
            'apm' => ['string', 'max:255'],
            'alternative_contact' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string'],
            'country' => ['required', 'string', 'max:255'],
            'state' => ['required', 'string', 'max:255'],
            'municipality' => ['required', 'string', 'max:255'],
        ], $messages);

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

        $query->save();
        return redirect()->route('usuarios')->with('status', 'Registro actualizado con exito!');
    }

    public function salvarjuez(User $id, Request $request)
    {
        if($request->input('password') != null || $request->input('password_current') != null){
            $messages = [
                'password.required' => 'Los campos no coinciden.',
                'password_current.required' => 'Los campos no coinciden.',
                'password_current.same' => 'Los campos no coinciden.',
            ];
            $request->validate([
                'password' => ['required', 'max:255'],
                'password_current' => 'required|same:password',
            ], $messages);

            $passValidate = true;
        }else{
            $passValidate = false;
        }

        $messages = [
            'name.required' => 'Es necesario colocar un nombre.',
            'app.required' => 'Es necesario colocar el primer apellido.',
            'apm.string' => 'Formato Invalido.',
            'alternative_contact.required' => 'Es necesario colocar otro medio de contacto.',
            'email.required' => 'Es necesario colocar un correo.',
            'phone.required' => 'Es necesario colocar un teléfono.',
            'country.required' => 'Es necesario colocar este campo.',
            'state.required' => 'Es necesario colocar este campo.',
            'municipality.required' => 'Es necesario colocar este campo.',
        ];

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'app' => ['required', 'string', 'max:255'],
            'apm' => ['string', 'max:255'],
            'alternative_contact' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email'],
            'phone' => ['required', 'string'],
            'country' => ['required', 'string', 'max:255'],
            'state' => ['required', 'string', 'max:255'],
            'municipality' => ['required', 'string', 'max:255'],
        ], $messages);

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
}
