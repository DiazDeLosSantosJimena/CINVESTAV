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

Route::get('tablas', function () {
    return view('layout.cruds.tables');
})->name('tablas');

Route::middleware('auth')->group(function () {
    // --------------------- Resource --------------------- 
    Route::resource('usuario', UsersController::class);
    Route::resource('proyectos', ProjectsController::class);
    Route::resource('authors', AuthorsController::class);
    Route::resource('evaluacion', EvaluationsController::class);
    Route::resource('taller', WorkshopsController::class);
    Route::resource('attendance', WorkshopattendanceController::class);
    //----------------------------------JUEZ-------------------------------
    Route::name('usuarios')->get('usuarios', [UsersController::class, 'usuarios']);
    Route::name('agregarjuez')->post('agregarjuez',[UsersController::class, 'agregarjuez']);
    Route::name('salvarjuez')->put('salvarjuez/{id}',[UsersController::class, 'salvarjuez']);
    //---------------------------------------------------------------------
    Route::get('/proyectos/{proposal}/download', [ProjectsController::class, 'downloadFile'])->name('proyectos.download');
    Route::name('proyectos.update')->put('proyectos.update/{id}', [ProjectsController::class, 'update']);
    Route::name('proyectos.delete')->delete('proyectos.delete/{id}', [ProjectsController::class, 'destroy']);

    Route::name('evaluacion.delete')->delete('evaluacion.delete/{id}', [EvaluationsController::class, 'destroy']);
    Route::name('evaluacion.asignEvaluator')->post('evaluacion.asignEvaluator', [EvaluationsController::class, 'asignEvaluator']);

    Route::name('subirPago')->post('proyectos/{id}', [ProjectsController::class, 'pagoCreate']);
    Route::get('/proyectos/{proposal}/pago', [ProjectsController::class, 'pagoView'])->name('proyectos.pagoView');
    Route::get('/proyectos/{proposal}/verifyProject', [ProjectsController::class, 'verifyProject'])->name('proyectos.verifyProject');
    Route::name('proyectos.accept')->put('proyectos.accept/{id}', [ProjectsController::class, 'accept']);
    Route::get('pago', function () {
        return view('proyectos.pago');
    })->name('pago');

    Route::name('inicio')->get('inicio', [UsersController::class, 'indexView']);

    Route::get('encuentro', function () {
        return view('layout.encuentro');
    })->name('encuentro');

    Route::get('perfil', function () {
        return view('usuarios.perfil');
    })->name('perfil');

    Route::get('EditPerfil', function () {
        return view('usuarios.EditPerfil');
    });

});

    Route::name('js_juez')->get('js_juez', [AreasMetasController::class, 'js_juez']);
    Route::name('pdf')->get('pdf',[ProjectsController::class, 'pdf']);

///////////////////////////////////////CORREOS//////////////////////////////////
Route::get('forgotpass', [EmailController::class, 'forgotpass'])->name('forgotpass');
Route::name('recuperar')->get('recuperar', [EmailController::class, 'recuperar']);
Route::name('reset')->get('reset', [EmailController::class, 'reset'])->middleware('signed');


require __DIR__.'/auth.php';
