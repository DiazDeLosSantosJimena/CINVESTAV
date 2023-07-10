<?php
namespace App\Http\Controllers;

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

/////resource//////////
Route::resource('users',UsersController::class);


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

////////////////////////////////////////////////////////////////////////////////////////

Route::get('calificacion', function () {
    return view('evaluacion.evaluacion');
});

Route::get('/', function () {
    if(auth()->check()) {
        if(Auth::user()->rol_id == 1 || Auth::user()->rol_id == 3){
            return redirect()->route('encuentro');
        }else if(Auth::user()->rol_id == 2){
            return redirect()->route('encuentro');
        }
    }
    return redirect()->route('login');
});

Route::get('/dashboard', function () {
    return redirect('/');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('tablas', function(){
    return view('layout.cruds.tables');
})->name('tablas');

    Route::resource('proyectos', ProjectsController::class);
    Route::resource('authors', AuthorsController::class);
    Route::get('/proyectos/{proposal}/download', [ProjectsController::class, 'downloadFile'])->name('proyectos.download');
    Route::name('proyectos.update')->put('proyectos.update/{id}', [ProjectsController::class, 'update']);
    Route::name('proyectos.delete')->delete('proyectos.delete/{id}', [ProjectsController::class, 'destroy']);
    Route::resource('evaluacion', EvaluationsController::class);
    Route::resource('usuario', UsersController::class);

    Route::get('encuentro', function(){
        return view('layout.encuentro');
    })->name('encuentro');

    Route::get('perfil', function () {
        return view('usuarios.perfil');
    })->name('perfil');

    Route::get('EditPerfil', function () {
        return view('usuarios.EditPerfil');
    });
Route::get('perfil', function () {
    return view('usuarios.perfil');
})->name('perfil');

Route::get('EditPerfil', function () {
    return view('usuarios.EditPerfil');
});


require __DIR__.'/auth.php';






