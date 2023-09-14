<?php

namespace App\Http\Controllers;

use App\Models\Workshops;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\TalleresExport;

class WorkshopsController extends Controller
{
    
    public function index()
    {
        
        $talle = Workshops::all();
        return view('taller.index', compact('talle'));
    }

  
    public function store(Request $request)
    {
        $rules = [
            'nameu' => 'required',
            'title' => 'required',
            'activity' => 'required',
            'date' => 'required',
            'hour' => 'required',
            'site' => 'required',
            'level'=> 'required',
            'participants'=>'required',
            'assistance' =>'required'

        ];

        $message = [
            'nameu.required' => 'El nombre del presentador es requerido',
            'title.required' => 'El titulo de la actividad es requerido',
            'activity.required' => 'La actividad es requerida',
            'date.required' => 'La fecha es requerida',
            'hour.required' => 'La hora es requerida',
            'site.required' => 'El sitio es requerido',
            'level.required' => 'El nivel es requerido',
            'participants.required' => 'El numero de personas es requerido',
            'assistance.required' => 'La asistencia es requerida',

        ];

        $this->validate($request, $rules, $message);

        Workshops::create(array(
            'nameu' => $request->input('nameu'),
            'title' => $request->input('title'),
            'activity' => $request->input('activity'),
            'date' => $request->input('date'),
            'hour' => $request->input('hour'),
            'site' => $request->input('site'),
            'status' => 1,
            'level' => $request->input('level'),
            'participants' => $request->input('participants'),
            'part' => 0,
            'assistance' => $request->input('assistance')
        ));

        return redirect('taller')->with('status', 'Taller registrado correctamente!');
    }

   
    public function show($id)
    {
        $workshop = Workshops::find($id);
        return view('taller.show', compact('workshop'));
    }

   
    public function edit(Workshops $id, Request $request)
    {
        
        $query = Workshops::find($id->id);


        $status = 1;

        if ($request->input('status') == '') {
            $status = 0;
        } else if ($request->input('status') == 'ON') {
            $status = 1;
        }


        $query->nameu = trim($request->nameu);
        $query->title = trim($request->title);
        $query->activity = trim($request->activity);
        $query->date = trim($request->date);
        $query->hour = trim($request->hour);
        $query->site = trim($request->site);
        $query->status = $status;
        $query->save();

        return redirect('taller')->with('status', 'El registro se actualizó con exito!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Workshops::find($id)->delete();
        return redirect('taller')->with('status', 'Registro eliminado con exito!');
    }


    public function export() 
    {
        return Excel::download(new TalleresExport, 'Ponencias.xlsx');
    }
}
