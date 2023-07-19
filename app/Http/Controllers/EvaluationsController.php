<?php

namespace App\Http\Controllers;

use App\Models\Authors;
use App\Models\Evaluations;
use App\Models\Files;
use App\Models\Projects;
use App\Models\ProjectsUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use SebastianBergmann\CodeCoverage\Report\Xml\Project;

class EvaluationsController extends Controller
{
    public function index()
    {
        $user = Auth::user()->id;

        $evaluados = ProjectsUsers::with('projects', 'user')
        ->whereHas('evaluations', function ($query) use ($user) {
            $query->where('user_id', $user);
        })
        ->get();

        $proyectos = ProjectsUsers::with('projects', 'user')
        ->whereDoesntHave('evaluations')
        ->orWhereDoesntHave('evaluations', function ($query) use ($user) {
            $query->where('user_id', $user);
        })
        ->get();
        $proyectosE = ProjectsUsers::with('projects', 'user')
        ->whereDoesntHave('evaluations')
        ->where('user_id', $user)
        ->get();
        $evaluadosE = ProjectsUsers::with('projects', 'user')
        ->wherehas('evaluations')
        ->where('user_id', $user)
        ->get();

        return view('evaluacion.index', compact('proyectos', 'evaluados','proyectosE', 'evaluadosE', 'user'));
    }

    public function show($id)
    {
        //$proyect = ProjectsUsers::with('user','projects')->where('id', $id)->first();
        $proyect = ProjectsUsers::find($id);
        $files = Files::where('project_id', $proyect->projects->id)->get();
        $authors = Authors::where('project_id', $proyect->projects->id)->get();
        //  dd($files);
        return view('evaluacion.evaluacion', compact('proyect', 'files', 'authors'));
    }

    public function edit($id)
    {
        //$proyect = ProjectsUsers::with('user','projects')->where('id', $id)->first();
        $proyect = ProjectsUsers::find($id);

        $id = Evaluations::join('projects_users', 'evaluations.project_id', '=', 'projects_users.project_id')
        ->where('projects_users.project_id', $proyect->id)
        ->pluck('evaluations.id')
        ->first();
        $files = Files::where('project_id', $proyect->projects->id)->get();
        //  dd($files);
        return view('evaluacion.evaluacion', compact('proyect', 'files', 'id'));
    }

    public function store(Request $request)
    {
        $user = Auth::user()->id;
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

        return redirect()->route('evaluacion.index');
    }

    public function asignEvaluator(Request $request) {

        $project_user = ProjectsUsers::where('project_id', $request->id_proyecto)->first();

        $asign = new Evaluations;
        $asign->user_id = $request->id_juez;
        $asign->project_user = $project_user->id;
        $asign->save();

        return redirect('usuarios')->with('status', 'Evaluador asignado al proyecto con exito!');
    }


    public function edit2(Request $request, Evaluations $id){
        $user = Auth::user()->id;
        $project = $request->input('project');
        $id = $request->input('id');

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

        DB::Evaluations('tabla')->where('id', $id)->update([
        'user_id' => $user,
        'project_id' => $project,
        'title' => $c1,
        'extension' => $c2,
        'key_words' => $c3,
        'abstract_keywords' => $c4,
        'problematic' => $c5,
        'theoretical' => $c6,
        'methodology' => $c7,
        'proposal' => $c8,
        'results' => $c9,
        'APA_table' => $c10,
        'APA_references' => $c11,
        'format' => $c12,
        'status' => $criterio,
        'comment' => $comentario,
            // Actualiza otros campos según sea necesario
        ]);

        return redirect()->route('evaluacion.index');
    }

    public function destroy($id) {
        Evaluations::findOrFail($id)->delete();
        return redirect('usuarios')->with('status', 'Registro Eliminado!');
    }
}
