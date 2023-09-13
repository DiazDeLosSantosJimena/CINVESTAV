<?php

namespace App\Http\Controllers;

use App\Models\Workshopattendance;
use App\Models\Workshops;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PDF;

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

        $contador = count($usuarios);
        for ($i = 0; $i < $contador; $i++) {
            Workshopattendance::create(array(
                'user_id' => $user_id,
                'workshop_id' => $usuarios[$i],
            ));
        }
        return redirect('attendance');
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







    public function pdftaller()
    {
        $talleres =\DB::select('SELECT workshops.nameu, workshops.title, workshops.date, workshops.hour, workshops.site,  workshops.id
        FROM workshops, workshopattendances
        WHERE  workshops.id = workshopattendances.workshop_id');

        $pdf = PDF::loadView('taller.pdftalleres',['talleres'=>$talleres]);
        //----------Visualizar el PDF ------------------
       return $pdf->stream(); 
       // ------Descargar el PDF------
       //return $pdf->download('___libros.pdf');

    
    }
}
