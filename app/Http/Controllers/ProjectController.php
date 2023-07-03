<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Rama;
use Illuminate\Support\Facades\Auth;
use App\Models\Proposal;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Auth::user()->role_id !== 3) {
            $proposals = Proposal::with('user', 'project', 'rama')->paginate(20);

            return view('proyectos.index', compact('proposals'));
        }
        $proposals = Proposal::where('user_id', Auth::user()->id)->with('project', 'rama')->paginate(20);

        return view('proyectos.index', compact('proposals'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $ramas = Rama::all();
        return view('proyectos.addProyect', compact('ramas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
