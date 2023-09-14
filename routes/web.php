<?php

namespace App\Http\Controllers;

// <<<<<<< HEAD
use App\Http\Controllers\ProjectsController;
use App\Http\Controllers\WorkshopattendanceController;
// =======
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Models\Projects;
use App\Http\Controllers\EvaluationsController;
use App\Http\Controllers\EmailController;
use App\Models\ProjectsUsers;
use App\Models\Workshops;
// >>>>>>> ebba7e5cd21259431e905bb537c3b983432eddc5
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use SebastianBergmann\CodeCoverage\Report\Xml\Project;

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
// ========================================================

Route::get('/', function () {
    if (auth()->check()) {
        return redirect()->route('inicio');
    }
    return redirect()->route('login');
})->middleware(['auth', 'verified'])->name('inicio');

Route::get('tablas', function () {
    return view('layout.cruds.tables');
})->name('tablas');

Route::name('inicio')->get('inicio', [UsersController::class, 'indexView']);

Route::middleware('auth')->group(function () {
    // --------------------- Resource --------------------- 
    Route::resource('usuario', UsersController::class);
    Route::resource('proyectos', ProjectsController::class);
    Route::resource('authors', AuthorsController::class);
    Route::get('/proyectos/{proposal}/download', [ProjectsController::class, 'downloadFile'])->name('proyectos.download');
    Route::name('proyectos.update')->put('proyectos.update/{id}', [ProjectsController::class, 'update']);
    Route::name('proyectos.delete')->delete('proyectos.delete/{id}', [ProjectsController::class, 'destroy']);
    Route::resource('evaluacion', EvaluationsController::class);
    Route::resource('usuario', UsersController::class);
    Route::name('registrar')->post('registrar', [RegisteredUserController::class, 'store']);
    Route::resource('taller', WorkshopsController::class);
    Route::resource('attendance', WorkshopattendanceController::class);
    Route::get('pago', function () {
        return view('proyectos.pago');
    })->name('pago');

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

    Route::get('EditPerfil', function () {
        return view('usuarios.EditPerfil');
    });
});

    Route::name('pdf')->get('pdf',[ProjectsController::class, 'pdf']);
    Route::name('pdftaller')->get('pdftaller',[WorkshopattendanceController::class, 'pdftaller']);

    Route::controller(ProjectsController::class)->group(function(){
        Route::name('project.export')->get('project-export','export');
        });
        Route::controller(ProjectsController::class)->group(function(){
            Route::name('project.exporta')->get('project-exporta','exporta');
            });
            Route::controller(ProjectsController::class)->group(function(){
                Route::name('project.exportar')->get('project-exportar','exportar');
                });

Route::controller(WorkshopsController::class)->group(function(){
Route::name('talleres.export')->get('talleres-export','export');
 });               



        
require __DIR__ . '/auth.php';