<?php

namespace App\Http\Controllers;

use App\Models\Authors;
use App\Models\Evaluations;
use App\Models\Files;
use App\Models\Projects;
use App\Models\ProjectsUsers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use SebastianBergmann\CodeCoverage\Report\Xml\Project;

class EvaluationsController extends Controller
{
    public function index()
    {
        $user = Auth::user()->id;

        $evaluados  = DB::table('projects_users')
        ->join('projects', 'projects_users.project_id', '=', 'projects.id')
        ->join('users', 'projects_users.user_id', '=', 'users.id')
        ->join('evaluations', 'projects_users.id', '=', 'evaluations.project_user')
        ->select('projects_users.id', 'projects.title', 'projects.modality', 'projects.thematic_area', 'users.email','evaluations.id as id_evaluar')
        ->whereNotNull('evaluations.title')
        ->where('evaluations.user_id', $user)
        ->get();

        $proyectos = DB::table('projects_users')
            ->join('projects', 'projects_users.project_id', '=', 'projects.id')
            ->join('users', 'projects_users.user_id', '=', 'users.id')
            ->join('evaluations', 'projects_users.id', '=', 'evaluations.project_user')
            ->select('projects_users.id', 'projects.title', 'projects.modality', 'projects.thematic_area', 'users.email','evaluations.id as id_evaluar')
            ->whereNull('evaluations.title')
            ->where('evaluations.user_id', $user)
            ->get();
           
        return view('evaluacion.index', compact('proyectos', 'evaluados', 'user'));
    }

    public function show($id)
    {
        //$pro = ProjectsUsers::find('user_id');

        $user = DB::table('evaluations')
        ->join('projects_users', 'evaluations.project_user', '=', 'projects_users.id')
        ->join('users', 'projects_users.user_id', '=', 'users.id')
        ->join('projects', 'projects_users.project_id', '=', 'projects.id')
        ->select('users.name', 'users.app', 'users.apm', 'users.academic_degree', 'users.email', 'users.phone','users.country', 'users.state', 'users.municipality', 'projects.modality', 'projects.title', 'projects.thematic_area', 'projects.sending_institution')
        ->where('evaluations.id', $id)
        ->get();

        $autores = DB::table('projects_users')
        ->join('authors', 'projects_users.project_id', '=', 'authors.project_id')
        ->select('authors.name', 'authors.app', 'authors.apm')
        ->get();

        $files = DB::table('projects_users')
        ->join('files', 'projects_users.project_id', '=', 'files.project_id')
        ->select('files.id','files.name')
        ->get();

        $evaluacion = Evaluations::find($id);
        return view('evaluacion.evaluacion', compact('user','autores','files','evaluacion'))->with('Evaluations', $evaluacion);
        
        
        // //  dd($evaluacion);
       
    }

    public function edit($id)
    {
        
        //$proyect = ProjectsUsers::with('user','projects')->where('id', $id)->first();
        $user = DB::table('evaluations')
        ->join('projects_users', 'evaluations.project_user', '=', 'projects_users.id')
        ->join('users', 'projects_users.user_id', '=', 'users.id')
        ->join('projects', 'projects_users.project_id', '=', 'projects.id')
        ->select('users.name', 'users.app', 'users.apm', 'users.academic_degree', 'users.email', 'users.phone','users.country', 'users.state', 'users.municipality', 'projects.modality', 'projects.title', 'projects.thematic_area', 'projects.sending_institution')
        ->where('evaluations.id', $id)
        ->get();

        $autores = DB::table('projects_users')
        ->join('authors', 'projects_users.project_id', '=', 'authors.project_id')
        ->select('authors.name', 'authors.app', 'authors.apm')
        ->get();

        $files = DB::table('projects_users')
        ->join('files', 'projects_users.project_id', '=', 'files.project_id')
        ->select('files.id','files.name')
        ->get();

        $evaluacion = Evaluations::find($id);
        return view('evaluacion.edit', compact('user','autores','files','evaluacion'));
    }

    public function calificacion(Request $request, $id)
    {
        $evaluacion = Evaluations::findOrFail($id);
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

        $evaluacion->title = $c1;
        $evaluacion->extension = $c2;
        $evaluacion->key_words = $c3;
        $evaluacion->abstract_keywords = $c4;
        $evaluacion->problematic = $c5;
        $evaluacion->theoretical = $c6;
        $evaluacion->methodology = $c7;
        $evaluacion->proposal = $c8;
        $evaluacion->results = $c9;
        $evaluacion->APA_table = $c10;
        $evaluacion->APA_references = $c11;
        $evaluacion->format = $c12;
        $evaluacion->status = $criterio;
        $evaluacion->comment = $comentario;

        $evaluacion->save();

        return redirect()->route('evaluacion.index')->with('status', 'Se ha asignado la calificación!');
    }

    public function asignEvaluator(Request $request)
    {

        $project_user = ProjectsUsers::where('project_id', $request->id_proyecto)->first();

        $asign = new Evaluations;
        $asign->user_id = $request->id_juez;
        $asign->project_user = $project_user->id;
        $asign->save();

        return redirect('usuarios')->with('status', 'Evaluador asignado al proyecto con exito!');
    }


    public function update(Request $request, $id)
    {
        $evaluacion = Evaluations::findOrFail($id);
        $input = $request->all();
        $evaluacion->update($input);
        return redirect()->route('evaluacion.index')->with('status', 'Se actualizó la calificación con exito!');
    }

    public function destroy($id)
    {
        Evaluations::findOrFail($id)->delete();
        return redirect('usuarios')->with('status', 'Registro Eliminado!');
    }
}
