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

// ======================= Errors =======================
Route::get('error', function () {
    abort('404');
});
Route::get('error', function () {
    abort('401');
});
Route::get('error', function () {
    abort('429');
});
Route::get('error', function () {
    abort('500');
});
Route::get('error', function () {
    abort('503');
});
Route::get('/', function () {
    return view('sesiones/login');
});
// ========================================================

Route::get('/', function () {
    if (auth()->check()) {
        return redirect()->route('inicio');
    }
    return redirect()->route('login');
})->middleware(['auth', 'verified'])->name('inicio');

// ============================ REGISTRO ============================
Route::get('registroPonente', function () {
    return view('usuarios.registro');
})->name('registroPonente');
Route::get('registroGeneral', function () {
    return view('usuarios.registroG');
})->name('registroGeneral');
Route::get('registroInvitado', function () {
    return view('usuarios.registroInvitado');
})->name('registroInvitado');
Route::name('registrar')->post('registrar', [RegisteredUserController::class, 'store']);
//===================================================================

Route::middleware('auth')->group(function () {
    // --------------------- Resource --------------------- 
    Route::resource('usuario', UsersController::class);
    Route::resource('proyectos', ProjectsController::class);
    Route::resource('authors', AuthorsController::class);
    Route::resource('evaluacion', EvaluationsController::class);
    //---------------------TALLERES-------------------------------------------
    Route::resource('taller', WorkshopsController::class)->middleware('admin');
    Route::name('editTaller')->put('editTaller/{id}', [WorkshopsController::class, 'edit']);
    Route::resource('presentation', PresentationsController::class);
    Route::name('editPre')->put('editPre/{id}', [PresentationsController::class, 'edit']);
    Route::resource('attendance', WorkshopattendanceController::class);
    Route::get('/projects-data', [WorkshopattendanceController::class, 'showProjectsData']);
    Route::name('pdftaller')->get('pdftaller', [WorkshopattendanceController::class, 'pdftaller']);
    Route::name('pdfPagoTaller')->get('pdfPagoTaller', [WorkshopattendanceController::class, 'pdfPagoTaller']);
    Route::name('attendance.reingreso')->get('attendance.reingreso', [WorkshopattendanceController::class, 'reingreso']);
    Route::name('attendance.update')->put('attendance.update/{id}', [WorkshopattendanceController::class, 'update']);


    //----------------------------------JUEZ-------------------------------
    Route::name('usuarios')->get('usuarios', [UsersController::class, 'usuarios'])->middleware('admin');
    Route::name('agregarjuez')->post('agregarjuez', [UsersController::class, 'agregarjuez']);
    Route::name('salvarjuez')->put('salvarjuez/{id}', [UsersController::class, 'salvarjuez']);
    Route::name('agregarInvitado')->post('agregarInvitado', [UsersController::class, 'agregarInvitado']);
    Route::name('salvarInvitado')->put('salvarInvitado/{id}', [UsersController::class, 'salvarInvitado']);
    Route::name('salvarPonente')->put('salvarPonente/{id}', [UsersController::class, 'salvarPonente']);
    //---------------------------------------------------------------------
    Route::get('/proyectos/{proposal}/download', [ProjectsController::class, 'downloadFile'])->name('proyectos.download');
    Route::name('proyectos.update')->put('proyectos.update/{id}', [ProjectsController::class, 'update']);
    Route::name('proyectos.delete')->delete('proyectos.delete/{id}', [ProjectsController::class, 'destroy']);
    Route::name('proyectos.statusPago')->put('proyectos.statusPago/{id}', [ProjectsController::class, 'statusPago']);

    Route::name('evaluacion.delete')->delete('evaluacion.delete/{id}', [EvaluationsController::class, 'destroy']);
    Route::name('evaluacion.asignEvaluator')->post('evaluacion.asignEvaluator', [EvaluationsController::class, 'asignEvaluator']);
    Route::name('evaluacion.calificacion')->put('evaluacion.calificacion/{id}', [EvaluationsController::class, 'calificacion']);

    Route::name('subirPago')->post('proyectos/{id}', [ProjectsController::class, 'pagoCreate']);
    Route::get('/proyectos/{proposal}/pago', [ProjectsController::class, 'pagoView'])->name('proyectos.pagoView');
    Route::get('/proyectos/{proposal}/verifyProject', [ProjectsController::class, 'verifyProject'])->name('proyectos.verifyProject')->middleware('admin');
    Route::name('proyectos.accept')->put('proyectos.accept/{id}', [ProjectsController::class, 'accept']);

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
Route::get('recuperacion', function () {
    return view('mail/recuperacion');
});
Route::get('activacion', function () {
    return view('mail/activacion');
});
Route::get('forgotpass', [EmailController::class, 'forgotpass'])->name('forgotpass');
Route::name('recuperar')->get('recuperar', [EmailController::class, 'recuperar']);
Route::name('reset')->get('reset', [EmailController::class, 'reset'])->middleware('signed');
Route::name('passchange')->get('passchange', [EmailController::class, 'passchange']);


require __DIR__ . '/auth.php';
