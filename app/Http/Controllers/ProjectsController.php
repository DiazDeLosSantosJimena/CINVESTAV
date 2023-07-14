<?php

namespace App\Http\Controllers;

use App\Models\Authors;
use App\Models\Files;
use App\Models\Projects;
use App\Models\ProjectsUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
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
            $modales = Projects::get();
            //dd($proyectos);
            return view('proyectos.index', compact('proyectos', 'modales'));
        }
        $proyectos = ProjectsUsers::where('user_id', Auth::user()->id)->with('projects')->get();
        $modales = Projects::get();
        return view('proyectos.index', compact('proyectos', 'modales'));
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
            'modality.required' => 'Seleccione una de las modalidades de participación.',
            'resumen.required' => 'Suba el archivo requerido.',
            'resumen.mimes' => 'Formato de archivo incorrecto, por favor suba el formato indicado.',
            'resumen.max' => 'Sobrepasa el tamaño establecido, por favor ingrese el documento con el tamaño especificado.',
            'extenso.required' => 'Suba el archivo requerido.',
            'extenso.max' => 'Sobrepasa el tamaño establecido, por favor ingrese el documento con el tamaño especificado.',
            'extenso.mimes' => 'Formato de archivo incorrecto, por favor suba el formato indicado.',
            'pago.required' => 'Suba el archivo requerido.',
            'pago.max' => 'Sobrepasa el tamaño establecido, por favor ingrese el documento con el tamaño especificado.',
            'pago.mimes' => 'Formato de archivo incorrecto, por favor suba el formato indicado.',
            'inst_pro.required' => 'Ingrese el instituto de procedencia.',
        ];
        if ($request->modality === 'P') {
            $request->validate([
                'titulo' => ['required', 'string', 'max:255'],
                'eje' => ['required', 'string'],
                'modality' => ['required', 'string'],
                'resumen' => ['required', 'file', 'mimes:docx', 'max:1024'],
                'extenso' => ['required', 'file', 'mimes:docx', 'max:1024'],
                'pago' => ['required', 'file', 'mimes:pdf', 'max:2048'],
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
                'pago.required' => 'Suba el archivo requerido.',
                'pago.max' => 'Sobrepasa el tamaño establecido, por favor ingrese el documento con el tamaño especificado.',
                'pago.mimes' => 'Formato de archivo incorrecto, por favor suba el formato indicado.',
            ];
            $request->validate([
                'titulo' => ['required', 'string', 'max:255'],
                'eje' => ['required', 'string'],
                'modality' => ['required', 'string'],
                'resumen' => ['required', 'file', 'mimes:docx', 'max:1024'],
                'extenso' => ['required', 'file', 'mimes:jpg', 'max:2048'],
                'pago' => ['required', 'file', 'mimes:pdf', 'max:2048'],
                'inst_pro' => ['required', 'string', 'max:255'],
            ], $messages);
        } else {
            $request->validate([
                'titulo' => ['required', 'string', 'max:255'],
                'eje' => ['required', 'string'],
                'modality' => ['required', 'string'],
                'resumen' => ['required', 'file'],
                'extenso' => ['required', 'file'],
                'pago' => ['required', 'file', 'mimes:pdf', 'max:2048'],
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
        $registro = $request->input('registroA');
        $datos = json_decode($registro, true);
        if ($datos !== null) {
            foreach ($datos as $dato) {
                $title = $dato['titulo'];
                $names = $dato['nombre'];
                $app = $dato['apellidoPaterno'];
                $apm = $dato['apellidoMaterno'];

                $author = new Authors();

                $author->project_id = $proyect->id;
                $author->name = $names;
                $author->app = $app;
                $author->apm = $apm;
                $author->academic_degree = $title;

                $author->save();
            }
        }
        // ===================================

        $archive = Files::create([
            'project_id' => $proyect->id,
            'name' => 'proposals/' . $proyect->id . '_' . date('Y-m-d') . '_' . $request->file('resumen')->getClientOriginalName(),
            'type' => $request->file('resumen')->extension(),
            'archive' => 1,
        ]);
        $request->file('resumen')->storeAs('public', $archive->name);
        $archive->save();

        $archive2 = Files::create([
            'project_id' => $proyect->id,
            'name' => 'proposals/' . $proyect->id . '_' . date('Y-m-d') . '_' . $request->file('extenso')->getClientOriginalName(),
            'type' => $request->file('extenso')->extension(),
            'archive' => 2,
        ]);
        $request->file('extenso')->storeAs('public', $archive2->name);
        $archive2->save();

        $archive3 = Files::create([
            'project_id' => $proyect->id,
            'name' => 'proposals/' . $proyect->id . '_' . date('Y-m-d') . '_' . $request->file('pago')->getClientOriginalName(),
            'type' => $request->file('extenso')->extension(),
            'archive' => 3,
        ]);
        $request->file('pago')->storeAs('public', $archive3->name);
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
        $authors = Authors::where('project_id', $id)->get();
        $files = Files::where('project_id', $proyect->projects->id)->get();
        return view('evaluacion.evaluacion', compact('proyect', 'files', 'authors'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $proyect = ProjectsUsers::with('user', 'projects')->where('id', $id)->first();
        $files = Files::where('project_id', $proyect->projects->id)->get();
        $authors = Authors::where('project_id', $id)->get();
        return view('proyectos.edit', compact('proyect', 'files', 'authors'));
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

        // ============= Authors =============
        $registro = $request->input('registroA');
        $datos = json_decode($registro, true);
        //dd($datos);
        foreach ($datos as $dato) {
            //dd(intval($dato['idAuthor']));
            $idAuthor = $dato['id'];
            $title = $dato['titulo'];
            $names = $dato['nombre'];
            $app = $dato['apellidoPaterno'];
            $apm = $dato['apellidoMaterno'];

            $authors = Authors::find($idAuthor);

            if($authors != null){
                $authors = Authors::find($idAuthor)->where('project_id', $id->id)->first();

                $authors->academic_degree = $title;
                $authors->name = $names;
                $authors->app = $app;
                $authors->apm = $apm;

                $authors->save();

            }else{
                $author = new Authors();

                $author->project_id = $id->id;
                $author->name = $names;
                $author->app = $app;
                $author->apm = $apm;
                $author->academic_degree = $title;
    
                $author->save();
            }
        }

        dd($request->all());

        // ===================================
        if ($request->file('resumen')) {
            $messages = [
                'resumen.required' => 'Suba el archivo requerido.',
                'resumen.mimes' => 'Formato de archivo incorrecto, por favor suba el formato indicado.',
                'resumen.max' => 'Sobrepasa el tamaño establecido, por favor ingrese el documento con el tamaño especificado.',
            ];
            $request->validate([
                'resumen' => ['required', 'file', 'mimes:docx', 'max:1024'],
            ], $messages);
        }

        if ($request->file('extenso')) {
            $messages = [
                'extenso.required' => 'Suba el archivo requerido.',
                'extenso.mimes' => 'Formato de archivo incorrecto, por favor suba el formato (.jpg) indicado.',
                'extenso.max' => 'Sobrepasa el tamaño establecido, por favor ingrese el documento con el tamaño especificado.',
            ];
            $request->validate([
                'extenso' => ['required', 'file', 'mimes:jpg', 'max:2048'],
            ], $messages);
        }

        if ($request->file('pago')) {
            $messages = [
                'pago.required' => 'Suba el archivo requerido.',
                'pago.max' => 'Sobrepasa el tamaño establecido, por favor ingrese el documento con el tamaño especificado.',
                'pago.mimes' => 'Formato de archivo incorrecto, por favor suba el formato indicado.',
            ];
            $request->validate([
                'pago' => ['required', 'file', 'mimes:pdf', 'max:2048'],
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

        $project->modality = $request->modality;
        $project->title = trim($request->titulo);
        $project->thematic_area = $request->eje;
        $project->sending_institution = trim($request->inst_pro);

        $project->save();

        if ($request->file('resumen')) {
            $files = Files::where('project_id', $project->id)->where('archive', 1)->first();
            //busca en el storage la ruta del archivo y lo elimina
            $path = Storage::path('public/' . $files->name);
            unlink($path);
            $exists = Storage::disk('public')->exists($files->name);
            if ($exists) {
                Storage::disk('public')->delete($files->name);
            }
            //guarda el nuevo archivo
            $files->name = $request->file('resumen');
            $files->name = 'proposals/' . $project->id . '_' . date('Y-m-d') . '_' . $request->file('resumen')->getClientOriginalName();
            $files->type = $request->file('resumen')->extension();
            $request->file('resumen')->storeAs('public', $files->name);

            $files->save();
        }

        if ($request->file('extenso')) {
            $files = Files::where('project_id', $project->id)->where('archive', 2)->first();
            //busca en el storage la ruta del archivo y lo elimina
            $path = Storage::path('public/' . $files->name);
            unlink($path);
            $exists = Storage::disk('public')->exists($files->name);
            if ($exists) {
                Storage::disk('public')->delete($files->name);
            }

            //guarda el nuevo archivo
            $files->name = $request->file('extenso');
            $files->name = 'proposals/' . $project->id . '_' . date('Y-m-d') . '_' . $request->file('extenso')->getClientOriginalName();
            $files->type = $request->file('extenso')->extension();
            $request->file('extenso')->storeAs('public', $files->name);

            $files->save();
        }

        if ($request->file('pago')) {
            $files = Files::where('project_id', $project->id)->where('archive', 3)->first();
            //busca en el storage la ruta del archivo y lo elimina
            $path = Storage::path('public/' . $files->name);
            unlink($path);
            $exists = Storage::disk('public')->exists($files->name);
            if ($exists) {
                Storage::disk('public')->delete($files->name);
            }

            //guarda el nuevo archivo
            $files->name = $request->file('pago');
            $files->name = 'proposals/' . $project->id . '_' . date('Y-m-d') . '_' . $request->file('pago')->getClientOriginalName();
            $files->type = $request->file('pago')->extension();
            $request->file('pago')->storeAs('public', $files->name);

            $files->save();
        }

        return redirect()->route('proyectos.index')->with('status', 'El registro se actualizo correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //====== ARCHIVO 1
        $files = Files::where('project_id', $id)->where('archive', 1)->first();
        //busca en el storage la ruta del archivo y lo elimina
        $path = Storage::path('public/' . $files->name);
        unlink($path);
        $exists = Storage::disk('public')->exists($files->name);
        if ($exists) {
            Storage::disk('public')->delete($files->name);
        }
        $files->delete();
        //====== ARCHIVO 2
        $files = Files::where('project_id', $id)->where('archive', 2)->first();
        //busca en el storage la ruta del archivo y lo elimina
        $path = Storage::path('public/' . $files->name);
        unlink($path);
        $exists = Storage::disk('public')->exists($files->name);
        if ($exists) {
            Storage::disk('public')->delete($files->name);
        }
        $files->delete();
        //====== ARCHIVO 3
        $files = Files::where('project_id', $id)->where('archive', 3)->first();
        //busca en el storage la ruta del archivo y lo elimina
        $path = Storage::path('public/' . $files->name);
        unlink($path);
        $exists = Storage::disk('public')->exists($files->name);
        if ($exists) {
            Storage::disk('public')->delete($files->name);
        }
        $files->delete();

        $pAuthors = Authors::where('project_id', $id)->delete();

        $pUsers = ProjectsUsers::where('project_id', $id)->where('user_id', Auth::user()->id)->delete();

        $query = Projects::findOrFail($id);
        $query->delete();

        return redirect()->route('proyectos.index')->with('status', 'El registro se ha eliminado correctamente.');
    }
}
