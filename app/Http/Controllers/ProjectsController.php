<?php

namespace App\Http\Controllers;

use App\Models\Projects;
use Illuminate\Http\Request;
use PDF;
class ProjectsController extends Controller
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
    public function pdf()
    {


        $Projects= Projects::all();

        $pdf = PDF::loadView('Documentos.pdf',['Projects'=>$Projects]);
        // return view ('Documentos.pdf', compact('Projects'));
        //----------Visualizar el PDF ------------------
       return $pdf->stream();
       // ------Descargar el PDF------
       //return $pdf->download('___libros.pdf');


    }
}
