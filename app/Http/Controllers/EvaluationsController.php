<?php

namespace App\Http\Controllers;

use App\Models\Files;
use App\Models\Projects;
use App\Models\Evaluations;
use App\Models\ProjectsUsers;
use Illuminate\Http\Request;
use SebastianBergmann\CodeCoverage\Report\Xml\Project;

class EvaluationsController extends Controller
{
    public function index()
    {
        $proyectos = ProjectsUsers::with('projects', 'user')->get();
        return view('evaluacion.index', compact('proyectos'));
    }

    public function show($id)
    {
        //$proyect = ProjectsUsers::with('user','projects')->where('id', $id)->first();
        $proyect = ProjectsUsers::find($id);
        $files = Files::where('project_id', $proyect->projects->id)->get();
        //  dd($files);
        return view('evaluacion.evaluacion', compact('proyect', 'files'));
    }

    public function reg(Request $request){
        $user = $request->input('user');
        $project = $request->input('project');
        $nombre = $request->input('nombre');

        $c1 = $request->input('c1');
        $c2 = $request->input('c2');
        $c3 = $request->input('c3');
        $c4 = $request->input('c4');
        $c5 = $request->input('c5');
        $c6 = $request->input('c6');
        $c7 = $request->input('c7');
        $c8 = $request->input('c8');
        $c9 = $request->input('c9');
        $c10 = $request->input('c10');
        $c11 = $request->input('c11');
        $c12 = $request->input('c12');

        $criterio = $request->input('criterio');

        $comentario = $request->input('comentario');

        $calificacion = new Evaluations;
        $calificacion->user_id = $user;
        $calificacion->project_id = $project;
        $calificacion->title = $c1;
        $calificacion->extension = $c2;
        $calificacion->key_words = $c3;
        $calificacion->abstract_keywords = $c4;
        $calificacion->problematic = $c5;
        $calificacion->theoretical = $c6;
        $calificacion->methodology = $c7;
        $calificacion->proposal = $c8;
        $calificacion->results = $c9;
        $calificacion->APA_table = $c10;
        $calificacion->APA_references = $c11;
        $calificacion->format = $c12;
        $calificacion->status = $criterio;
        $calificacion->comment = $comentario;

        $calificacion->save();

        return view('evaluacion.index');
    }
}
