<?php

namespace App\Http\Controllers;

use App\Models\Files;
use App\Models\Projects;
use App\Models\ProjectsUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Stmt\Return_;
use SebastianBergmann\CodeCoverage\Report\Xml\Project;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

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
        $proyect = ProjectsUsers::with('user', 'projects')->where('id', $id)->first();
        $files = Files::where('project_id', $proyect->projects->id)->get();
        return view('proyectos.edit', compact('proyect', 'files'));
    }

    public function downloadFile($id): BinaryFileResponse
    {
        $file = Files::where('id', $id)->first();
        $path = storage_path('app/public/' . $file->name);

        return response()->download($path);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Projects $id)
    {

        if ($request->file('resumen')) {
            $messages = [
                'resumen.required' => 'Suba el archivo requerido.',
                'resumen.mimes' => 'Formato de archivo incorrecto, por favor suba el formato indicado.',
                'resumen.max' => 'Sobrepasa el tamaño establecido, por favor ingrese el documento con el tamaño especificado.',
                'extenso.required' => 'Suba el archivo requerido.',
                'extenso.mimes' => 'Formato de archivo incorrecto, por favor suba el formato (.jpg) indicado.',
                'extenso.max' => 'Sobrepasa el tamaño establecido, por favor ingrese el documento con el tamaño especificado.',
            ];
            $request->validate([
                'resumen' => ['required', 'file', 'mimes:docx', 'max:1024'],
                'extenso' => ['required', 'file', 'mimes:docx', 'max:1024'],
            ], $messages);
        }

        if ($request->file('extenso')) {
            $messages = [
                'resumen.required' => 'Suba el archivo requerido.',
                'resumen.mimes' => 'Formato de archivo incorrecto, por favor suba el formato indicado.',
                'resumen.max' => 'Sobrepasa el tamaño establecido, por favor ingrese el documento con el tamaño especificado.',
                'extenso.required' => 'Suba el archivo requerido.',
                'extenso.mimes' => 'Formato de archivo incorrecto, por favor suba el formato (.jpg) indicado.',
                'extenso.max' => 'Sobrepasa el tamaño establecido, por favor ingrese el documento con el tamaño especificado.',
            ];
            $request->validate([
                'resumen' => ['required', 'file', 'mimes:docx', 'max:1024'],
                'extenso' => ['required', 'file', 'mimes:jpg', 'max:2048'],
            ], $messages);
        }

        $messages = [
            'titulo.required' => 'El título es obligatorio.',
            'eje.required' => 'Seleccione al menos 1 eje tematico.',
            'modality.required' => 'Seleccione una de las modalidades de participación.',
            'inst_pro.required' => 'Ingrese el instituto de procedencia.',
        ];

        $request->validate([
            'titulo' => ['required', 'string', 'min:10', 'max:255'],
            'eje' => ['required', 'string'],
            'modality' => ['required', 'string'],
            'inst_pro' => ['required', 'string', 'max:255'],
        ], $messages);

        $project = Projects::find($id->id);
        //$files = Files::where('project_id', $project->id);

        $project->modality = $request->modality;
        $project->title = trim($request->titulo);
        $project->thematic_area = $request->eje;
        $project->sending_institution = trim($request->inst_pro);

        $project->save();

        // if ($request->file('resumen')) {
        //     //busca en el storage la ruta del archivo y lo elimina
        //     $path=Storage::path('public/' . $project->files->name);
        //     unlink($path);
        //     $exists = Storage::disk('public')->exists($project->files->name);
        //     if ($exists) {
        //         Storage::disk('public')->delete($project->files->name);
        //     }

        //     //guarda el nuevo archivo
        //     $files->name = $request->file('resumen');
        //     $files->name = 'proposals/' . $project->id . '_' . date('Y-m-d') . '_' . $request->file('resumen')->getClientOriginalName();
        //     $files->type = $request->file('resumen')->extension();
        //     $request->file('resumen')->storeAs('public', $files->name);

        //     $files->save();
        // }

        // if ($request->file('extenso')) {
        //     //busca en el storage la ruta del archivo y lo elimina
        //     $path=Storage::path('public/' . $project->files->name);
        //     unlink($path);
        //     $exists = Storage::disk('public')->exists($project->files->name);
        //     if ($exists) {
        //         Storage::disk('public')->delete($project->files->name);
        //     }

        //     //guarda el nuevo archivo
        //     $files->name = $request->file('extenso');
        //     $files->name = 'proposals/' . $project->id . '_' . date('Y-m-d') . '_' . $request->file('extenso')->getClientOriginalName();
        //     $files->type = $request->file('extenso')->extension();
        //     $request->file('extenso')->storeAs('public', $files->name);

        //     $files->save();
        // }

        return redirect()->route('proyectos.index')->with('status', 'El registro se actualizo correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
