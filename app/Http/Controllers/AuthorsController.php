<?php

namespace App\Http\Controllers;

use App\Models\Authors;
use Illuminate\Http\Request;

class AuthorsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        // dd($datos);

        ///decodificar cadena de textos true adelnate pa
        // $datos = json_decode($registro, true);
/////decodificar cadena de texto
        $registro = $request->input('registro');
        $datos = json_decode($registro, true);
if ($datos !== null) {
    foreach ($datos as $dato) {
        $name = $dato['titulo'];
        $names = $dato['nombre'];
        $app = $dato['apellidoPaterno'];
        $apm = $dato['apellidoMaterno'];

     $author = new Authors();

            $author->project_id = "1";
            $author->name = $name;
            $author->app = $names;
            $author->apm = $app;
            $author->academic_degree = $apm;

            $author->save();
        }

        // dd($author);
        // dd($author);
            return redirect()->route('proyectos.index');
    }

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
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
}
