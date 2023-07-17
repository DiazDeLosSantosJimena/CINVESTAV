<?php

namespace App\Http\Controllers;

use App\Models\Workshops;
use Illuminate\Http\Request;

class WorkshopsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $talle = Workshops::all();
        return view('taller.index', compact('talle'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('taller.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required',
            'activity' => 'required',
            'date' => 'required',
            'hour' => 'required',
            'site' => 'required',

        ];

        $message = [
            'name.required' => 'El nombre es requerido',
            'activity.required' => 'La actividad es requerida',
            'date.required' => 'La fecha es requerida',
            'hour.required' => 'La hora es requerida',
            'site.required' => 'El sitio es requerido',

        ];

        $this->validate($request, $rules, $message);

        Workshops::create(array(
            'name' => $request->input('name'),
            'activity' => $request->input('activity'),
            'date' => $request->input('date'),
            'hour' => $request->input('hour'),
            'site' => $request->input('site'),
            'status' => 1
        ));

        return redirect('taller')->with('status', 'Taller registrado correctamente!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $workshop = Workshops::find($id);
        return view('taller.show', compact('workshop'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $workshop = Workshops::find($id);
        return view('taller.edit', compact('workshop'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $query = Workshops::find($id);


        $status = 1;

        if ($request->input('status') == '') {
            $status = 0;
        } else if ($request->input('status') == 'ON') {
            $status = 1;
        }


        $query->name = trim($request->name);
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
        $workshop = Workshops::findOrFail($id);

        $workshop->delete();
        return redirect('taller')->with('status', 'Se eliminó el registro con exito!');
    }
}
