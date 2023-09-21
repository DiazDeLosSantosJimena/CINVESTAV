<?php

namespace App\Http\Controllers;


use App\Models\Projects;
use Illuminate\Http\Request;
use PDF;
use App\Models\Authors;
use App\Models\Files;
use App\Models\ProjectsUsers;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use PhpParser\Node\Stmt\Return_;
use SebastianBergmann\CodeCoverage\Report\Xml\Project;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ProjectsExport;
use App\Exports\ProjectsAceptadasExport;
use App\Exports\ProjectsRechazadasExport;
use App\Exports\CartelesExport;

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
            $proyectos2 = Projects::select('files.archive', 'files.project_id')
                ->join('files', 'files.project_id', 'projects.id')
                ->where('files.archive', '3')
                ->get();
            return view('proyectos.index', compact('proyectos', 'modales', 'proyectos2'));
        }
        $proyectos = ProjectsUsers::where('user_id', Auth::user()->id)->with('projects')->get();

        $proyectos2 = Projects::select('files.archive', 'projects.id')
            ->join('files', 'files.project_id', 'projects.id')
            ->join('projects_users', 'projects_users.project_id', 'projects.id')
            ->join('users', 'users.id', 'projects_users.user_id')
            ->where('projects_users.user_id', Auth::user()->id)
            ->get();

        $modales = Projects::get();
        return view('proyectos.index', compact('proyectos', 'modales', 'proyectos2'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('proyectos.addProyect');
    }

    public function pagoView($id)
    {
        $registroPago = Files::where('project_id', $id)->where('archive', 3)->get();
        if(count($registroPago) > 0){
            return redirect()->route('proyectos.index');
        }else{
            $project = Projects::find($id);
            return view('proyectos.pago', compact('project'));
        }
    }

    public function verifyProject($id)
    {
        $proyect = ProjectsUsers::find($id);
        $files = Files::where('project_id', $proyect->projects->id)->get();
        $authors = Authors::where('project_id', $proyect->projects->id)->get();
        return view('proyectos.verifyProject', compact('proyect', 'files', 'authors'));
    }

    public function accept(Request $request, $id)
    {

        $project = Projects::find($id);
        $project->status = $request->status;
        $project->save();

        /* CORREO */

        $project_user = ProjectsUsers::where('project_id', $project->id)->get('user_id');
        $user = User::find($project_user)->value('email', 'id');

        if ($request->input('status') == 0) {
            $data = array(
                'destinatario' => $user,
                'asunto' => 'Información acerca del registro del proyecto.',
                'nombre' => $project->title,
                'comentario' => $request->comentario,
                'comentario2' => 'Le pedímos revise nuevamente su registro correspondiente al proyecto de '
            );
        } else {
            $data = array(
                'destinatario' => $user,
                'asunto' => 'Información acerca del registro del proyecto.',
                'nombre' => $project->title,
                'comentario' => $request->comentario,
                'comentario2' => 'Nos complace informarle que hemos recibido su registro correspondiente a '
            );
        }

        Mail::send('mail.comprobante', compact('data'), function ($message) use ($data) {
            $message->to($data['destinatario'], 'CINVESTAV')
                ->subject($data['asunto']);
            $message->from('hello@example.com', 'Información CINVESTAV');
        });

        return redirect('proyectos')->with('status', 'Estatus del proyecto actualizado, notificación al ponente!');
    }

    public function pagoCreate(Request $request, $id) {

        $messages = [
            'pago.required' => 'Suba el archivo requerido.',
            'pago.max' => 'Sobrepasa el tamaño establecido, por favor ingrese el documento con el tamaño especificado.',
        ];
        $request->validate([
            'pago' => ['required', 'file', 'mimes:pdf', 'max:2048'],
        ], $messages);

        $archive3 = Files::create([
            'project_id' => $id,
            'name' => 'proposals/' . $id . '_' . date('Y-m-d') . '_' . $request->file('pago')->getClientOriginalName(),
            'type' => $request->file('pago')->extension(),
            'archive' => 3,
        ]);
        $request->file('pago')->storeAs('public', $archive3->name);
        $archive3->save();

        return redirect()->route('proyectos.index')->with('status', 'Formato de Pago subido con exito!');
    }

    public function statusPago(Request $request, $id) {
        // dd($request->all());
        $message = [
            'verify.required' => 'Es necesario marcar la casilla para poder registrar el formato de pago.',
        ];

        $request->validate([
            'verify' => ['required']
        ], $message);
        
        $project = Projects::find($id);
        $project->status = "4";
        $project->save();

        return redirect()->route('proyectos.index')->with('status', 'Formato de Pago registrado con exito!');;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //dd($request->all());
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
            'pago.mimes' => 'Formato de archivo incorrecto, por favor suba el formato indicado.',
            'g-recaptcha-response' => 'Error en el captcha, favor de resolverlo nuevamente.',
        ];
        if ($request->modality === 'P') {
            $request->validate([
                'titulo' => ['required', 'string', 'max:255'],
                'eje' => ['required', 'string'],
                'modality' => ['required', 'string'],
                'resumen' => ['required', 'file', 'mimes:docx', 'max:1024'],
                'extenso' => ['required', 'file', 'mimes:docx', 'max:1024'],
                'g-recaptcha-response' => ['required'],
                //'pago' => ['required', 'file', 'mimes:pdf', 'max:2048'],
            ], $messages);

            $follow_key = "pon-". date('Ymd');
        } else if ($request->modality === 'C') {
            $messages = [
                'titulo.required' => 'El título es obligatorio.',
                'eje.required' => 'Seleccione al menos 1 eje tematico.',
                'resumen.required' => 'Suba el archivo requerido.',
                'modality.required' => 'Seleccione una de las modalidades de participación.',
                'resumen.mimes' => 'Formato de archivo incorrecto, por favor suba el formato indicado.',
                'resumen.max' => 'Sobrepasa el tamaño establecido, por favor ingrese el documento con el tamaño especificado.',
                'extenso.required' => 'Suba el archivo requerido.',
                'extenso.mimes' => 'Formato de archivo incorrecto, por favor suba el formato (.jpg) indicado.',
                'pago.mimes' => 'Formato de archivo incorrecto, por favor suba el formato indicado.',
                'g-recaptcha-response' => 'Error en el captcha, favor de resolverlo nuevamente.',
            ];
            $request->validate([
                'titulo' => ['required', 'string', 'max:255'],
                'eje' => ['required', 'string'],
                'modality' => ['required', 'string'],
                'resumen' => ['required', 'file', 'mimes:docx', 'max:1024'],
                'extenso' => ['required', 'file', 'mimes:jpg', 'max:2048'],
                'g-recaptcha-response' => ['required'],
                //'pago' => ['required', 'file', 'mimes:pdf', 'max:2048'],
            ], $messages);

            $follow_key = "car-". date('Ymd');
        } else {
            $request->validate([
                'titulo' => ['required', 'string', 'max:255'],
                'eje' => ['required', 'string'],
                'modality' => ['required', 'string'],
                'resumen' => ['required', 'file'],
                'extenso' => ['required', 'file'],
                'g-recaptcha-response' => ['required'],
            ], $messages);
            $follow_key = "pro-". date('Ymd');
        }

        $proyect = Projects::create([
            'modality' => $request->modality,
            'title' => $request->titulo,
            'thematic_area' => $request->eje,
            //'sending_institution' => $request->inst_pro,
            'status' => 1
        ]);

        $proyect->tracking_key = $follow_key."-".$proyect->id;

        $proyect->save();

        $registro = $request->input('registroA');
        $datos = json_decode($registro, true);
        if ($datos !== null) {
            foreach ($datos as $dato) {
                $names = $dato['nombre'];
                $app = $dato['apellidoPaterno'];
                $apm = $dato['apellidoMaterno'];
                $title = $dato['titulo'];
                $state = $dato['pais'];

                $author = new Authors();

                $author->project_id = $proyect->id;
                $author->name = $names;
                $author->app = $app;
                $author->apm = $apm;
                $author->institution_of_origin = $title;
                $author->state = $state;

                $author->save();
            }
        }

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
        $proUser = ProjectsUsers::find($id);
        $user = Auth::user();

        if ($proUser->user_id == $user->id || $user->rol_id == 1) {
            $uni = ProjectsUsers::with('user', 'projects')->where('id', $id)->first();
            //$proyect = ProjectsUsers::find($id);
            $authors = Authors::where('project_id', $id)->get();
            $files = Files::where('project_id', $uni->projects->id)->get();
            return view('proyectos.show', compact('uni', 'files', 'authors'));
        } else {
            return redirect('/');
        }
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

        $messages = [
            'titulo.required' => 'El título es obligatorio.',
            'eje.required' => 'Seleccione al menos 1 eje tematico.',
            'modality.required' => 'Seleccione una de las modalidades de participación.',
            'g-recaptcha-response' => 'Error en el captcha, favor de resolverlo nuevamente.',
            //'inst_pro.required' => 'Ingrese el instituto de procedencia.',
        ];

        $request->validate([
            'titulo' => ['required', 'string', 'max:255'],
            'eje' => ['required', 'string'],
            'modality' => ['required', 'string'],
            'g-recaptcha-response' => ['required'],
            //'inst_pro' => ['required', 'string', 'max:255'],
        ], $messages);

        $authors = Authors::where('project_id', $id->id)->get();

        foreach ($authors as $author) {
            $auth = Authors::find($author->id);
            $auth->delete();
        }

        // ============= Authors =============
        $registro = $request->input('registroA');
        $datos = json_decode($registro, true);
        //dd($datos);
        if($datos != null){
            foreach ($datos as $dato) {
                $names = $dato['nombre'];
                $app = $dato['apellidoPaterno'];
                $apm = $dato['apellidoMaterno'];
                $title = $dato['titulo'];
                $state = $dato['pais'];
    
                $author = new Authors();
    
                $author->project_id = $id->id;
                $author->name = $names;
                $author->app = $app;
                $author->apm = $apm;
                $author->institution_of_origin = $title;
                $author->state = $state;
                $author->save();
            }
        }

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

        $project = Projects::find($id->id);

        $project->modality = $request->modality;
        $project->title = trim($request->titulo);
        $project->thematic_area = $request->eje;
        //$project->sending_institution = trim($request->inst_pro);

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

        $pAuthors = Authors::where('project_id', $id)->delete();

        $pUsers = ProjectsUsers::where('project_id', $id)->where('user_id', Auth::user()->id)->delete();

        $query = Projects::findOrFail($id);
        $query->delete();

        return redirect()->route('proyectos.index')->with('status', 'El registro se ha eliminado correctamente.');
    }
    public function pdf($id)
    {


        $Projects= Projects::all();

        $pdf = PDF::loadView('Documentos.pdf',['Projects'=>$Projects]);
        // return view ('Documentos.pdf', compact('Projects'));
        //----------Visualizar el PDF ------------------
        return $pdf->stream();
        // ------Descargar el PDF------
        //return $pdf->download('___libros.pdf');


    }

    public function export() 
    {
        return Excel::download(new ProjectsExport, 'Ponencias.xlsx');
    }
    public function exporta() 
    {
        return Excel::download(new ProjectsAceptadasExport, 'Ponencias Aceptadas.xlsx');
    }
    public function exportar() 
    {
        return Excel::download(new ProjectsRechazadasExport, 'Ponencias Rechazadas.xlsx');
    }

    public function carteles() {
        return Excel::download(new CartelesExport, 'Carteles.xlsx');
    }

}
