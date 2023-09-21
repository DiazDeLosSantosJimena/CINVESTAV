<?php

namespace App\Http\Controllers;

use App\Models\Workshopattendance;
use App\Models\Workshops;
use App\Models\Preattendances;
use App\Models\Presentations;
use App\Models\User;
use PDF;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WorkshopattendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $talleres = Workshopattendance::where('user_id', Auth::user()->id)->get();
        $talleresUsuario = Preattendances::where('user_id', Auth::user()->id)->get();

        if (count($talleres) > 0 || count($talleresUsuario) > 0) {
            return view('taller.attendancePDF', compact('talleres'));
        }

        $work = Workshops::all();
        $status = "";
        return view('taller.attendance', compact('work', 'status'));
    }

    public function reingreso()
    {
        $work = Workshops::all();
        $status = "Los datos ingresados anteriormente serán eliminados, le solicitamos que realice nuevamente el proceso.";
        return view('taller.attendance', compact('work', 'status'));
    }

    public function show($opcion)
    {

        $talleres = Workshops::where('activity', $opcion)
            ->where('participants', '>', DB::raw('part'))
            ->where('status', 1)
            ->get(['id', 'nameu', 'title', 'date', 'hour', 'site', 'participants', 'assistance']);


        return response()->json($talleres);
    }
    public function showProjectsData()
    {

        $projectsData = DB::select("SELECT presentations.id, projects.title, projects.thematic_area, users.name, users.app, users.apm, presentations.date, presentations.hour, presentations.site, presentations.assistance 
        FROM projects_users INNER JOIN presentations ON projects_users.id = presentations.pro_users 
        INNER JOIN projects ON projects_users.project_id = projects.id 
        INNER JOIN users ON projects_users.user_id = users.id 
        WHERE presentations.participants > presentations.part");


        return response()->json($projectsData);
    }
    public function update($id, Request $request)
    {
        // dd($request->has('project_ids'));

        $talleresUsuario = Workshopattendance::where('user_id', Auth::user()->id)->get();
        if (count($talleresUsuario) > 0) {
            foreach ($talleresUsuario as $tUsuario) {
                // Cambia el numero de participantes actuales
                $talleres = Workshops::find($tUsuario->workshop_id);
                $talleres->part--;
                $talleres->save();

                // Elimina el registro de asistencia del usuario sobre un taller
                $talleres = Workshopattendance::find($tUsuario->id);
                if($talleres != null){
                    $talleres->delete();
                }
            }
        }

        $talleresUsuario = Preattendances::where('user_id', Auth::user()->id)->get();
        if (count($talleresUsuario) > 0) {
            foreach ($talleresUsuario as $tUsuario) {
                // Cambia el numero de participantes actuales
                $talleres = Presentations::find($tUsuario->presentation_id);
                $talleres->part--;
                $talleres->save();
                
                // Elimina el registro de asistencia del usuario sobre un taller
                $talleres = Preattendances::find($tUsuario->id);
                $talleres->delete();
            }
        }

        if ($request->has('workshop_ids')) {
            $rules = [
                'workshop_ids.*' => 'exists:workshops,id',
            ];

            $messages = [
                'workshop_ids.*.exists' => 'Algunos talleres seleccionados no son válidos.',
            ];

            $this->validate($request, $rules, $messages);

            $user_id = Auth::user()->id;
            $work = $request->workshop_ids[0];
            $separador = ',';
            $workshop_id = explode($separador, $work);

            $contador = count($workshop_id);

            for ($i = 0; $i < $contador; $i++) {
                Workshopattendance::create(array(
                    'workshop_id' => $workshop_id[$i],
                    'user_id' =>  $user_id,
                ));


                $workshop = Workshops::find($workshop_id[$i]);

                if ($workshop) {

                    if ($workshop->participants > $workshop->part) {
                        $workshop->part++;
                        $workshop->save();
                    }
                }
            }
        }

        if ($request->input('project_ids') != null) {

            $rules = [
                'project_ids.*' => 'exists:projects,id',
            ];

            $messages = [
                'project_ids.*.exists' => 'Algunos proyectos seleccionados no son válidos.',
            ];

            $this->validate($request, $rules, $messages);

            $user_id = Auth::user()->id;
            $pre = $request->project_ids[0];
            $separador = ',';
            $presentation_id = explode($separador, $pre);

            $contador = count($presentation_id);

            for ($i = 0; $i < $contador; $i++) {
                Preattendances::create(array(
                    'presentation_id' => $presentation_id[$i],
                    'user_id' =>  $user_id,
                ));

                $presentations = Presentations::find($presentation_id[$i]);

                if ($presentations) {

                    if ($presentations->participants > $presentations->part) {
                        $presentations->part++;
                        $presentations->save();
                    }
                }
            }
        }

        return redirect('attendance');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if ($request->has('workshop_ids')) {
            $rules = [
                'workshop_ids.*' => 'exists:workshops,id',
            ];

            $messages = [
                'workshop_ids.*.exists' => 'Algunos talleres seleccionados no son válidos.',
            ];

            $this->validate($request, $rules, $messages);

            $user_id = Auth::user()->id;
            $work = $request->workshop_ids[0];
            $separador = ',';
            $workshop_id = explode($separador, $work);

            $contador = count($workshop_id);

            for ($i = 0; $i < $contador; $i++) {
                Workshopattendance::create(array(
                    'workshop_id' => $workshop_id[$i],
                    'user_id' =>  $user_id,
                ));


                $workshop = Workshops::find($workshop_id[$i]);

                if ($workshop) {

                    if ($workshop->participants > $workshop->part) {
                        $workshop->part++;
                        $workshop->save();
                    }
                }
            }
        }

        if ($request->has('project_ids')) {
            $rules = [
                'project_ids.*' => 'exists:projects,id',
            ];

            $messages = [
                'project_ids.*.exists' => 'Algunos proyectos seleccionados no son válidos.',
            ];

            $this->validate($request, $rules, $messages);

            $user_id = Auth::user()->id;
            $pre = $request->project_ids[0];
            $separador = ',';
            $presentation_id = explode($separador, $pre);

            $contador = count($presentation_id);

            for ($i = 0; $i < $contador; $i++) {
                Preattendances::create(array(
                    'presentation_id' => $presentation_id[$i],
                    'user_id' =>  $user_id,
                ));

                $presentations = Presentations::find($presentation_id[$i]);

                if ($presentations) {

                    if ($presentations->participants > $presentations->part) {
                        $presentations->part++;
                        $presentations->save();
                    }
                }
            }
        }
        return redirect('attendance');
    }

    public function pdftaller()
    {
        $talleres = \DB::select('SELECT workshops.nameu, workshops.title, workshops.date, workshops.hour, workshops.site,  workshops.id
            FROM workshops 
            JOIN workshopattendances ON workshops.id = workshopattendances.workshop_id
        WHERE workshopattendances.user_id = ' . Auth::user()->id);

        $ponencias =\DB::select('SELECT presentations.id, projects.title, projects.thematic_area, users.name, users.app, users.apm, presentations.date, presentations.hour, presentations.site, presentations.assistance 
        FROM projects_users 
        INNER JOIN presentations ON projects_users.id = presentations.pro_users 
        INNER JOIN projects ON projects_users.project_id = projects.id 
        INNER JOIN users ON projects_users.user_id = users.id
        INNER JOIN preattendances ON presentations.id = preattendances.presentation_id
        WHERE preattendances.user_id = ' . Auth::user()->id
        );
                //dd($talleres);

        $pdf = PDF::loadView('Documentos.pdftalleres', ['talleres' => $talleres , 'ponencias' => $ponencias]);
        //----------Visualizar el PDF ------------------
        return $pdf->stream();
        // ------Descargar el PDF------
        //return $pdf->download('___libros.pdf');
    }

    public function pdfPagoTaller()
    {
        $pdf = PDF::loadView('Documentos.pdfDatosTalleres');
        $pdf->set_paper('A4', 'landscape');
        //----------Visualizar el PDF ------------------
        return $pdf->stream();
        // ------Descargar el PDF------
        //return $pdf->download('___libros.pdf');
    }
}

// ==================================== UTVT ====================================
