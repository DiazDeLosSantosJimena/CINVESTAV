<?php

namespace App\Http\Controllers;

use App\Models\Workshopattendance;
use App\Models\Workshops;
use App\Models\Preattendances;
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
        if (count($talleres) > 0) {
            return view('taller.attendancePDF', compact('talleres'));
        }

        $work = Workshops::all();
        return view('taller.attendance', compact('work'));
    }

    public function show($opcion)
    {

        $talleres = Workshops::where('activity', $opcion)->get(['id', 'nameu', 'title', 'date', 'hour', 'site', 'participants', 'assistance']);

        return response()->json($talleres);
    }
    public function showProjectsData()
    {
        // Realiza la consulta SQL para obtener los datos de proyectos
        $projectsData = DB::select("SELECT presentations.id, projects.title, projects.thematic_area, users.name, users.app, users.apm, presentations.date, presentations.hour, presentations.site, presentations.assistance FROM projects_users INNER JOIN presentations ON projects_users.id = presentations.pro_users INNER JOIN projects ON projects_users.project_id = projects.id INNER JOIN users ON projects_users.user_id = users.id");

        return response()->json($projectsData);
    }
    public function create()
    {
        //
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
            }
        }
        return redirect('attendance');
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
