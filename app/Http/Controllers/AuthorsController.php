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
        $registro = $request->input('registro');

        /////intento de foreach para array
        // foreach ($registro as $data) {
        //     $author = new Authors();

        //     $author->project_id = "1";
        //     $author->name = $data['titulo'];
        //     $author->app = $data['nombre'];
        //     $author->apm = $data['apellidoPaterno'];
        //     $author->academic_degree = $data['apellidoMaterno'];

        //     // dd($author);
        //     $author->save();
        // }
        $author = new Authors();

            $author->project_id = "1";
            $author->name = "kb";
            $author->app = "kb";
            $author->apm = "kb";
            $author->academic_degree = "kb";

            // dd($author);
            $author->save();
            return redirect()->route('proyectos.index');
        // $titulo = $request->input('tituloA');
        $titulo = $request->input('registro');
$nombre = $request->input('nombreA');
$app = $request->input('apellidoPaternoA');
$apellidoMaternoA = $request->input('apellidoMaternoA');

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
