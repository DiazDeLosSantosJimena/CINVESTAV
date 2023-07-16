<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

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
    public function destroy(string $id)
    {
        //
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
                //dd($request->all());

        User::create(array(
            'name' => $request->input('name'),
            'app' => "null",
            'apm' => $request->input('apm'),
            'academic_degree' => $request->input('academic_degree'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'country' => $request->input('country'),
            'state' => $request->input('state'),
            'municipality' => $request->input('municipality'),
            'assistance' => $request->input('assistance'),
            'password' => "123123", //$request->input('pass'),
            'rol_id' => 2,
        ));

        return redirect('usuarios');
    }

    
    public function salvarjuez(User $id, Request $request)
    {
         $query = User::find($id->id);

        //dd($request->all());
        $query = User::find($id->id);
        $query->name = trim($request->name);
        $query->apm = trim($request->apm);
        $query->academic_degree = $request->academic_degree;
        $query->email = trim($request->email);
        $query->phone = trim($request->phone);
        $query->country = trim($request->country);
        $query->state = trim($request->state);
        $query->municipality = trim($request->municipality);
        

        $query->save();
        return redirect()->route("usuarios", ['id' => $id->id]);
    }


}
