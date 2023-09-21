<?php

namespace App\Http\Controllers;


use App\Http\Controllers\ProjectsController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Models\Projects;
use App\Http\Controllers\EvaluationsController;
use App\Http\Controllers\EmailController;
use App\Models\ProjectsUsers;
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

Route::get('tablas', function () {
    return view('layout.cruds.tables');
})->name('tablas');

Route::name('inicio')->get('inicio', [UsersController::class, 'indexView']);

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

    Route::name('soportemail')->get('soportemail', [EmailController::class, 'soportemail']);

    // ============================= Middleware =============================
    Route::name('evaluacion.index')->get('evaluacion', [EvaluationsController::class, 'index'])->middleware('visor');
    Route::name('proyectos.index')->get('proyectos', [ProjectsController::class, 'index'])->middleware('user');
    Route::name('proyectos.show')->get('proyectos/{id}', [ProjectsController::class, 'show']);

    // ================================ Excel ===============================
    Route::get('reportes', function () {
        return view('layout.reportes');
    })->name('reportes')->middleware('admin');
    Route::controller(ProjectsController::class)->group(function () {
        Route::name('project.export')->get('project-export', 'export');
    });
    Route::controller(ProjectsController::class)->group(function () {
        Route::name('project.exporta')->get('project-exporta', 'exporta');
    });
    Route::controller(ProjectsController::class)->group(function () {
        Route::name('project.exportar')->get('project-exportar', 'exportar');
    });
    Route::controller(WorkshopsController::class)->group(function () {
        Route::name('talleres.export')->get('talleres-export', 'export');
    });
    Route::controller(ProjectsController::class)->group(function () {
        Route::name('cartel.export')->get('cartel.export', 'carteles');
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