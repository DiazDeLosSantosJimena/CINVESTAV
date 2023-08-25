<?php

namespace App\Http\Controllers;

use App\Models\Presentations;
use App\Models\ProjectsUsers;
use App\Models\Projects;
use App\Models\User;

use Illuminate\Http\Request;

class PresentationsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $pre = Presentations::select(
            'presentations.id',
            'projects.title',
            'projects.modality',
            'projects.status',
            'users.name',
            'users.app',
            'users.apm',
            'presentations.date',
            'presentations.hour',
            'presentations.site',
            'presentations.assistance',
            'presentations.status as estado',
            'presentations.pro_users'
        )
            ->join('projects_users', 'presentations.pro_users', '=', 'projects_users.id')
            ->join('projects', 'projects_users.project_id', '=', 'projects.id')
            ->join('users', 'projects_users.user_id', '=', 'users.id')
            ->get();
        
        $projects = ProjectsUsers::select(
            'projects_users.id',
            'projects.title',
            'projects.thematic_area',
            'users.name',
            'users.app',
            'users.apm'
        )
        ->join('projects', 'projects_users.project_id', '=', 'projects.id')
        ->join('users', 'projects_users.user_id', '=', 'users.id')
        ->where('projects.status', 4) //Modificar el 2 por el 4
        ->whereNotIn('projects_users.id', function ($query) {
            $query->select('presentations.pro_users')
                ->from('presentations')
                ->join('projects_users', 'presentations.pro_users', '=', 'projects_users.id')
                ->whereColumn('projects_users.id', 'presentations.pro_users');
        })
        ->get();

        $pro = ProjectsUsers::select(
            'projects_users.id',
            'projects.title',
            'projects.thematic_area',
            'users.name',
            'users.app',
            'users.apm'
        )
        ->join('projects', 'projects_users.project_id', '=', 'projects.id')
        ->join('users', 'projects_users.user_id', '=', 'users.id')
        ->get();

        return view('ponencias.index', compact('pre', 'projects','pro'));
    }


    public function store(Request $request)
    {
        $rules = [
            'pro_users' => 'required',
            'date' => 'required',
            'hour' => 'required',
            'site' => 'required',
            'assistance' =>'required',
            'participants' => 'required'
            

        ];

        $message = [
            'pro_users.required' => 'El proyecto',
            'date.required' => 'La fecha es requerida',
            'hour.required' => 'La hora es requerida',
            'site.required' => 'El sitio es requerido',
            'assistance.required' => 'La asistencia es requerida',
            'participants.required' => 'El numero de participnates es requerido',

        ];

        $this->validate($request, $rules, $message);

        Presentations::create(array(
            'pro_users' => $request->input('pro_users'),
            'date' => $request->input('date'),
            'hour' => $request->input('hour'),
            'site' => $request->input('site'),
            'status' => 1,
            'assistance' => $request->input('assistance'),
            'participants' => $request->input('participants'),
            'part' => 0
        ));

        return redirect('presentation')->with('status', 'Horario asignado correctamente!');
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
    public function edit(Presentations $id, Request $request)
    {
         
        $query = Presentations::find($id->id);


        $status = 1;

        if ($request->input('status') == '') {
            $status = 0;
        } else if ($request->input('status') == 'ON') {
            $status = 1;
        }


        $query->pro_users = trim($request->pro_users);
        $query->date = trim($request->date);
        $query->hour = trim($request->hour);
        $query->site = trim($request->site);
        $query->status = $status;
        $query->assistance = trim($request->assistance);
        $query->participants = trim($request->participants);
        $query->part = trim($request->participants);
        $query->save();

        return redirect('presentation')->with('status', 'El registro se actualizó con exito!');
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
    public function destroy($id)
    {
        Presentations::find($id)->delete();
        return redirect('presentation')->with('status', 'Registro eliminado con exito!');
    }
}
