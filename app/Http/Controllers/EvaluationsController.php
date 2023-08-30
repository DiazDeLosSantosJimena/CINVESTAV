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
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use SebastianBergmann\CodeCoverage\Report\Xml\Project;

class EvaluationsController extends Controller
{
    public function index()
    {
        if (Auth::user()->rol_id == 1) {
            $proyectos = DB::table('evaluations')
                ->join('projects_users', 'projects_users.id', '=', 'evaluations.project_user')
                ->join('projects', 'projects_users.project_id', '=', 'projects.id')
                ->join('users', 'evaluations.user_id', '=', 'users.id')
                ->select('projects.title', 'projects.modality', 'projects.thematic_area', 'users.email', 'evaluations.id as id_evaluar', 'evaluations.status')
                ->get();

            return view('evaluacion.indexAdmin', compact('proyectos'));
        }

        $user = Auth::user()->id;

        $evaluados  = DB::table('projects_users')
            ->join('projects', 'projects_users.project_id', '=', 'projects.id')
            ->join('users', 'projects_users.user_id', '=', 'users.id')
            ->join('evaluations', 'projects_users.id', '=', 'evaluations.project_user')
            ->select('projects_users.id', 'projects.title', 'projects.modality', 'projects.thematic_area', 'users.email', 'evaluations.id as id_evaluar')
            ->whereNotNull('evaluations.title')
            ->where('evaluations.user_id', $user)
            ->get();

        $proyectos = DB::table('projects_users')
            ->join('projects', 'projects_users.project_id', '=', 'projects.id')
            ->join('users', 'projects_users.user_id', '=', 'users.id')
            ->join('evaluations', 'projects_users.id', '=', 'evaluations.project_user')
            ->select('projects_users.id', 'projects.title', 'projects.modality', 'projects.thematic_area', 'users.email', 'evaluations.id as id_evaluar')
            ->whereNull('evaluations.title')
            ->where('evaluations.user_id', $user)
            ->get();

        return view('evaluacion.index', compact('proyectos', 'evaluados', 'user'));
    }

    public function show($id)
    {
        $evaluador_project = Evaluations::find($id);
        $proyectoF = ProjectsUsers::where('id', $evaluador_project->project_user)->first();

        if ($evaluador_project->user_id != Auth::user()->id) {
            return redirect()->route('evaluacion.index');
        } else {
            $user = DB::table('evaluations')
                ->join('projects_users', 'evaluations.project_user', '=', 'projects_users.id')
                ->join('users', 'projects_users.user_id', '=', 'users.id')
                ->join('projects', 'projects_users.project_id', '=', 'projects.id')
                ->select('users.name', 'users.app', 'users.apm', 'users.alternative_contact', 'users.email', 'users.phone', 'users.country', 'users.state', 'users.municipality', 'projects.modality', 'projects.title', 'projects.thematic_area')
                ->where('evaluations.id', $id)
                ->get();

            $autores = DB::table('projects_users')
                ->join('authors', 'projects_users.project_id', '=', 'authors.project_id')
                ->select('authors.name', 'authors.app', 'authors.apm', 'authors.institution_of_origin')
                ->where('authors.project_id', $proyectoF->project_id)
                ->get();

            $files = DB::table('files')
                ->select('id', 'name')
                ->where('project_id', $proyectoF->project_id)
                ->get();

            $evaluacion = Evaluations::find($id);
            return view('evaluacion.evaluacion', compact('user', 'autores', 'files', 'evaluacion'))->with('Evaluations', $evaluacion);
        }
    }

    public function edit($id)
    {
        $evaluador_project = Evaluations::find($id);
        $proyectoF = ProjectsUsers::where('id', $evaluador_project->project_user)->first();

        if ($evaluador_project->user_id == Auth::user()->id || Auth::user()->rol_id == 1) {
            $user = DB::table('evaluations')
                ->join('projects_users', 'evaluations.project_user', '=', 'projects_users.id')
                ->join('users', 'projects_users.user_id', '=', 'users.id')
                ->join('projects', 'projects_users.project_id', '=', 'projects.id')
                ->select('users.name', 'users.app', 'users.apm', 'users.alternative_contact', 'users.email', 'users.phone', 'users.country', 'users.state', 'users.municipality', 'projects.modality', 'projects.title', 'projects.thematic_area')
                ->where('evaluations.id', $id)
                ->get();

            $autores = DB::table('projects_users')
                ->join('authors', 'projects_users.project_id', '=', 'authors.project_id')
                ->select('authors.name', 'authors.app', 'authors.apm', 'authors.institution_of_origin')
                ->where('authors.project_id', $proyectoF->project_id)
                ->get();

            $files = DB::table('files')
                ->select('id', 'name')
                ->where('project_id', $proyectoF->project_id)
                ->get();

            $evaluacion = Evaluations::find($id);
            return view('evaluacion.edit', compact('user', 'autores', 'files', 'evaluacion'));
        } else {
            return redirect()->route('evaluacion.index');
        }
    }

    public function calificacion(Request $request, $id)
    {
        $messages = [
            'criterio.required' => 'Es necesario seleccionar un criterio.',
            'comentario.required' => 'Es necesario proporcionar un comentario para continuar con la evaluación.',
        ];

        $request->validate([
            'criterio' => ['required'],
            'comentario' => ['required', 'string', 'max:255'],
        ], $messages);

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

        $statusPro = Evaluations::where('status', '!=', 'null')->where('project_user', $evaluacion->project_user)->get();
        $projectUser = ProjectsUsers::where('id', $evaluacion->project_user)->first();
        $project = Projects::find($projectUser->project_id);

        if (count($statusPro) >= 2) {

            $statusPro = Evaluations::where('status', 'A')->orWhere('status', 'AC')->where('project_user', $evaluacion->project_user)->get();

            if (count($statusPro) >= 2) {
                if ($project->status != 3) {
                    // ======================== Correo de Notificación para subir el formato de pago ========================
                    $user = User::find($projectUser->user_id);

                    $data = [
                        'destinatario' => $user->email,
                        'usuario' => $user->name,
                        'proyecto' => $project->title,
                        'np' => $project->tracking_key,
                    ];

                    Mail::send('mail.evaluado', compact('data'), function ($message) use ($data) {
                        $message->to($data['destinatario'], 'CINVESTAV')
                            ->subject('Proyecto Evaluado')
                            ->from('hello@example.com', 'Información CINVESTAV');
                    });
                    // ==================================================
                    $project->status = 3;
                    $project->save();
                }else{

                }
            } else {
                $statusPro = Evaluations::where('status', 'R')->where('project_user', $evaluacion->project_user)->get();
                if (count($statusPro) >= 2) {
                    $project->status = 0;
                    $project->save();
                }
            }
        } else {

        }

        return redirect()->route('evaluacion.index')->with('status', 'Se ha asignado la calificación!');
    }

    public function asignEvaluator(Request $request)
    {
        $messages = [
            'id_proyecto.required' => 'Es necesario seleccionar al menos un proyecto.',
            'id_juez.required' => 'Es necesario seleccionar al menos un juez.',
        ];

        $request->validate([
            'id_proyecto' => ['required'],
            'id_juez' => ['required', 'min:1'],
        ], $messages);

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
        $statusPro = Evaluations::where('status', '!=', 'null')->where('project_user', $evaluacion->project_user)->get();
        $projectUser = ProjectsUsers::where('id', $evaluacion->project_user)->first();
        $project = Projects::find($projectUser->project_id);

        if (count($statusPro) === 3) {
            $statusPro = Evaluations::where('status', 'A')->where('project_user', $evaluacion->project_user)->get();
            if (count($statusPro) >= 2) {
                $project->status = 3;
                $project->save();
            } else {
                $project->status = 2;
                $project->save();
            }
        } else {
            $project->status = 2;
            $project->save();
        }

        return redirect()->route('evaluacion.index')->with('status', 'Se actualizó la calificación con exito!');
    }

    public function destroy($id)
    {
        Evaluations::findOrFail($id)->delete();
        return redirect('usuarios')->with('status', 'Registro Eliminado!');
    }
}
