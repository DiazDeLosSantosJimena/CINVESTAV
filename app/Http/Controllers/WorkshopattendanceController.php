<?php

namespace App\Http\Controllers;

use App\Models\Workshopattendance;
use App\Models\Workshops;
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
        if(count($talleres) > 0){
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
        $user_id = Auth::user()->id;
        $usuarios = $request->workshop_id;

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
}
