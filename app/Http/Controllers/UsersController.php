<?php

namespace App\Http\Controllers;

use App\Models\Evaluations;
use App\Models\Projects;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('auth/register');
    }

    public function indexView() {
        return view('layout.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
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
        $usuariosG = User::where('rol_id', 3)->get();
        $usuarios = \DB::select('SELECT users.id, users.name, users.apm, users.app,users.academic_degree, users.email, users.phone, users.country,
        users.state, users.municipality, users.rol_id, users.deleted_at FROM users, roles WHERE users.rol_id = roles.id AND
        roles.id = "2"');
        //$proyects = Projects::where('status', '>', '1')->get();
        $proyects = \DB::SELECT('SELECT proUser.id, pro.title
        FROM projects AS pro 
            JOIN projects_users AS proUser ON pro.id = proUser.project_id
        WHERE pro.status > 1 AND proUser.id NOT IN (SELECT project_user
            FROM evaluations
            GROUP BY project_user
            HAVING COUNT(*) >= 3)');
        $proyectsEvaluators = \DB::SELECT('SELECT eva.id AS evaluationId, us.name, us.app, us.apm, us.academic_degree, us.email, pro.title
        FROM evaluations AS eva
            JOIN users AS us ON eva.user_id = us.id
            JOIN projects_users AS proUs ON proUs.id = eva.project_user
            JOIN projects AS pro ON pro.id = proUs.project_id');
        $users = User::where('rol_id', '2')->get();
        return view('usuarios.index', compact('usuarios', 'proyects', 'users', 'proyectsEvaluators', 'usuariosG'));
    }

    public function js_juez(Request $request) {

        $projects = $request->get('id_proyecto');
        $evaluador = \DB::SELECT('SELECT id, name, app, apm, email,deleted_at
        FROM users
        WHERE rol_id = 2 AND id NOT IN (
        SELECT us.id
        FROM evaluations AS eva
            JOIN users AS us ON us.id = eva.user_id
        WHERE eva.project_user = '.$projects.')');

        return view('usuarios.js_proyecto', compact('evaluador'));
    }

    public function agregarjuez(Request $request)
    {
        $messages = [
            'name.required' => 'Es necesario colocar un nombre.',
            'app.required' => 'Es necesario colocar el primer apellido.',
            'apm.string' => 'Formato Invalido.',
            'academic_degree.required' => 'Es necesario colocar el grado academico.',
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
            'academic_degree' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email'],
            'phone' => ['required', 'string'],
            'country' => ['required', 'string', 'max:255'],
            'state' => ['required', 'string', 'max:255'],
            'municipality' => ['required', 'string', 'max:255'],
        ], $messages);

        User::create(array(
            'name' => $request->input('name'),
            'app' => $request->input('app'),
            'apm' => $request->input('apm'),
            'academic_degree' => $request->input('academic_degree'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'country' => $request->input('country'),
            'state' => $request->input('state'),
            'municipality' => $request->input('municipality'),
            'password' => Hash::make('123123'), //$request->input('pass'),
            'rol_id' => 2,
        ));

        return redirect('usuarios');
    }

    
    public function salvarjuez(User $id, Request $request)
    {
        $messages = [
            'name.required' => 'Es necesario colocar un nombre.',
            'app.required' => 'Es necesario colocar el primer apellido.',
            'apm.string' => 'Formato Invalido.',
            'academic_degree.required' => 'Es necesario colocar el grado academico.',
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
            'academic_degree' => ['required', 'string', 'max:255'],
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
        $query->academic_degree = $request->academic_degree;
        $query->email = trim($request->email);
        $query->phone = trim($request->phone);
        $query->country = trim($request->country);
        $query->state = trim($request->state);
        $query->municipality = trim($request->municipality);

        $query->save();
        return redirect()->route('usuarios')->with('status', 'Registro actualizado con exito!');
    }

}
