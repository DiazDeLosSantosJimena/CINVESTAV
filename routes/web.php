<?php

namespace App\Http\Controllers;

// <<<<<<< HEAD
use App\Http\Controllers\ProjectsController;
// =======
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Models\Projects;
use App\Http\Controllers\EvaluationsController;
use App\Http\Controllers\EmailController;
use App\Models\ProjectsUsers;
// >>>>>>> ebba7e5cd21259431e905bb537c3b983432eddc5
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('sesiones/login');
});

Route::get('registroPonente', function () {
    return view('usuarios.registro');
})->name('registroPonente');

Route::get('registroGeneral', function () {
    return view('usuarios.registroG');
})->name('registroGeneral');

////////////////////////////////////////EMAILS///////////////////////////////////////
Route::get('recuperacion', function () {
    return view('mail/recuperacion');
});

Route::get('activacion', function () {
    return view('mail/activacion');
});

Route::name('registrar')->post('registrar', [RegisteredUserController::class, 'store']);

Route::get('/', function () {
    if (auth()->check()) {
        return redirect()->route('inicio');
    }
    return redirect()->route('login');
})->middleware(['auth', 'verified'])->name('inicio');

Route::middleware('auth')->group(function () {
    // --------------------- Resource --------------------- 
    Route::resource('usuario', UsersController::class);
    Route::resource('proyectos', ProjectsController::class);
    Route::resource('authors', AuthorsController::class);
    Route::resource('evaluacion', EvaluationsController::class);
    Route::resource('taller', WorkshopsController::class);
    Route::resource('attendance', WorkshopattendanceController::class);
    //----------------------------------JUEZ-------------------------------
    Route::name('usuarios')->get('usuarios', [UsersController::class, 'usuarios'])->middleware('admin');
    Route::name('agregarjuez')->post('agregarjuez', [UsersController::class, 'agregarjuez']);
    Route::name('salvarjuez')->put('salvarjuez/{id}', [UsersController::class, 'salvarjuez']);
    Route::name('agregarInvitado')->post('agregarInvitado', [UsersController::class, 'agregarInvitado']);
    //---------------------------------------------------------------------
    Route::get('/proyectos/{proposal}/download', [ProjectsController::class, 'downloadFile'])->name('proyectos.download');
    Route::name('proyectos.update')->put('proyectos.update/{id}', [ProjectsController::class, 'update']);
    Route::name('proyectos.delete')->delete('proyectos.delete/{id}', [ProjectsController::class, 'destroy']);

    Route::name('evaluacion.delete')->delete('evaluacion.delete/{id}', [EvaluationsController::class, 'destroy']);
    Route::name('evaluacion.asignEvaluator')->post('evaluacion.asignEvaluator', [EvaluationsController::class, 'asignEvaluator']);
    Route::name('evaluacion.calificacion')->put('evaluacion.calificacion/{id}', [EvaluationsController::class, 'calificacion']);

    Route::name('subirPago')->post('proyectos/{id}', [ProjectsController::class, 'pagoCreate']);
    Route::get('/proyectos/{proposal}/pago', [ProjectsController::class, 'pagoView'])->name('proyectos.pagoView');
    Route::get('/proyectos/{proposal}/verifyProject', [ProjectsController::class, 'verifyProject'])->name('proyectos.verifyProject')->middleware('admin');
    Route::name('proyectos.accept')->put('proyectos.accept/{id}', [ProjectsController::class, 'accept']);
    Route::get('pago', function () {
        return view('proyectos.pago');
    })->name('pago');

    Route::name('inicio')->get('inicio', [UsersController::class, 'indexView']);

    Route::get('encuentro', function () {
        return view('layout.encuentro');
    })->name('encuentro');

    Route::get('EditPerfil', function () {
        return view('usuarios.EditPerfil');
    });

    Route::name('js_juez')->get('js_juez', [UsersController::class, 'js_juez']);
    Route::name('pdf')->get('pdf/{id}', [ProjectsController::class, 'pdf']);

    //////Cambios en el perfil
    Route::get('perfil', function () {
        return view('usuarios.perfil');
    })->name('perfil');

    Route::name('soportemail')->get('soportemail', [EmailController::class, 'soportemail']);

    // ============================= Middleware =============================
    Route::name('evaluacion.index')->get('evaluacion', [EvaluationsController::class, 'index'])->middleware('visor');
    Route::name('proyectos.index')->get('proyectos', [ProjectsController::class, 'index'])->middleware('user');
    Route::name('proyectos.show')->get('proyectos/{id}', [ProjectsController::class, 'show']);
});

///////////////////////////////////////CORREOS////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
Route::get('forgotpass', [EmailController::class, 'forgotpass'])->name('forgotpass');
Route::name('recuperar')->get('recuperar', [EmailController::class, 'recuperar']);
Route::name('reset')->get('reset', [EmailController::class, 'reset'])->middleware('signed');
Route::name('passchange')->get('passchange', [EmailController::class, 'passchange']);


require __DIR__ . '/auth.php';
