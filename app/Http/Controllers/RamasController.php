<?php

namespace App\Http\Controllers;

use App\Models\Ramas;

use Illuminate\Http\Request;

class RamasController extends Controller
{

    public function index()
    {
        $Ramas = Ramas::all();
        return view('Ramas.index', compact('Ramas'));
    }

    public function store(Request $request)
    {
        $rules = [
            'nombre' => 'required',
            'descripcion' => 'required'
        ];

        $message = [
            'nombre.required' => 'Las credenciales son invalidas',
            'descripcion.required' => 'Las credenciales son invalidas'
        ];

        $this->validate($request, $rules, $message);
       
        Ramas::create(array(
            'nombre' => $request->input('nombre'),
            'descripcion' => $request->input('descripcion'),
        ));

        return redirect('tipos');
    }

   
    public function show($id)
    {
        $Ramas = Ramas::all();
        return view("lista")
            ->with(['ramas' => $Ramas]);
    }

    public function edit(Ramas $id, Request $request)
    {
        $query = Ramas::find($id->id);

        $query->nombre = trim($request->nombre);
        $query->descripcion = trim($request->descripcion);
        $query->save();
    }

   
    public function destroy($id)
    {
        //
    }
}
