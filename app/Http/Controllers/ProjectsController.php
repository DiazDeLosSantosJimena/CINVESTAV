<?php

namespace App\Http\Controllers;

use App\Models\Files;
use App\Models\Projects;
use App\Models\ProjectsUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Auth::user()->rol_id !== 3) {
            $proyectos = ProjectsUsers::with('projects', 'user')->get();
            //dd($proyectos);
            return view('proyectos.index', compact('proyectos'));
        }
        $proyectos = ProjectsUsers::where('user_id', Auth::user()->id)->with('projects')->get();
        return view('proyectos.index', compact('proyectos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('proyectos.addProyect');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $messages = [
            'titulo.required' => 'El título es obligatorio.',
            'eje.required' => 'Seleccione al menos 1 eje tematico.',
            'resumen.required' => 'Suba el archivo requerido.',
            'modality.required' => 'Seleccione una de las modalidades de participación.',
            'resumen.mimes' => 'Formato de archivo incorrecto, por favor suba el formato indicado.',
            'resumen.max' => 'Sobrepasa el tamaño establecido, por favor ingrese el documento con el tamaño especificado.',
            'extenso.required' => 'Suba el archivo requerido.',
            'extenso.max' => 'Sobrepasa el tamaño establecido, por favor ingrese el documento con el tamaño especificado.',
            'extenso.mimes' => 'Formato de archivo incorrecto, por favor suba el formato indicado.',
            'inst_pro.required' => 'Ingrese el instituto de procedencia.',
        ];
        if ($request->modality === 'P') {
            $request->validate([
                'titulo' => ['required', 'string', 'min:10', 'max:255'],
                'eje' => ['required', 'string'],
                'modality' => ['required', 'string'],
                'resumen' => ['required', 'file', 'mimes:docx', 'max:1024'],
                'extenso' => ['required', 'file', 'mimes:docx', 'max:1024'],
                'inst_pro' => ['required', 'string', 'max:255'],
            ], $messages);
        } else if ($request->modality === 'C') {
            $messages = [
                'titulo.required' => 'El título es obligatorio.',
                'eje.required' => 'Seleccione al menos 1 eje tematico.',
                'resumen.required' => 'Suba el archivo requerido.',
                'modality.required' => 'Seleccione una de las modalidades de participación.',
                'resumen.mimes' => 'Formato de archivo incorrecto, por favor suba el formato indicado.',
                'resumen.max' => 'Sobrepasa el tamaño establecido, por favor ingrese el documento con el tamaño especificado.',
                'extenso.required' => 'Suba el archivo requerido.',
                'inst_pro.required' => 'Ingrese el instituto de procedencia.',
                'extenso.mimes' => 'Formato de archivo incorrecto, por favor suba el formato (.jpg) indicado.',
            ];
            $request->validate([
                'titulo' => ['required', 'string', 'min:10', 'max:255'],
                'eje' => ['required', 'string'],
                'modality' => ['required', 'string'],
                'resumen' => ['required', 'file', 'mimes:docx', 'max:1024'],
                'extenso' => ['required', 'file', 'mimes:jpg', 'max:2048'],
                'inst_pro' => ['required', 'string', 'max:255'],
            ], $messages);
        } else {
            $request->validate([
                'titulo' => ['required', 'string', 'min:10', 'max:255'],
                'eje' => ['required', 'string'],
                'modality' => ['required', 'string'],
                'resumen' => ['required', 'file'],
                'extenso' => ['required', 'file'],
                'inst_pro' => ['required', 'string', 'max:255'],
            ], $messages);
        }

        $proyect = Projects::create([
            'modality' => $request->modality,
            'title' => $request->titulo,
            'thematic_area' => $request->eje,
            'sending_institution' => $request->inst_pro,
            'status' => 0
        ]);
        $proyect->save();

        // ============= Authors =============

        // ===================================

        $archive = Files::create([
            'project_id' => $proyect->id,
            'name' => 'proposals/' . $proyect->id . '_' . date('Y-m-d') . '_' . $request->file('resumen')->getClientOriginalName(),
            'type' => $request->file('resumen')->extension(),
        ]);
        $request->file('resumen')->storeAs('public', $archive->name);
        $archive->save();

        $archive2 = Files::create([
            'project_id' => $proyect->id,
            'name' => 'proposals/' . $proyect->id . '_' . date('Y-m-d') . '_' . $request->file('extenso')->getClientOriginalName(),
            'type' => $request->file('extenso')->extension(),
        ]);
        $request->file('extenso')->storeAs('public', $archive->name);
        $archive2->save();

        $proyectUser = ProjectsUsers::create([
            'project_id' => $proyect->id,
            'user_id' => Auth::user()->id
        ]);

        $proyectUser->save();

        return redirect()->route('proyectos.index')->with('status', 'Proyecto registrado.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //$proyect = ProjectsUsers::with('user','projects')->where('id', $id)->first();
        $proyect = ProjectsUsers::find($id);
        $files = Files::where('project_id', $proyect->projects->id)->get();
        //  dd($files);
        return view('evaluacion.evaluacion', compact('proyect', 'files'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $proyect = ProjectsUsers::find($id);
        $files = Files::where('project_id', $proyect->projects->id)->get();
        return view('proyectos.addProyect');
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
