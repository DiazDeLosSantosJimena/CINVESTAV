<?php
namespace App\Http\Controllers;

use App\Http\Controllers\ProjectsController;
use Illuminate\Support\Facades\Route;

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

Route::get('registro', function () {
    return view('auth/register');
})->name('registro');

Route::get('registroPonente', function () {
    return view('usuarios.registro');
})->name('registroPonente');

////////////////////////////////////////EMAILS///////////////////////////////////////
Route::get('recuperacion', function () {
    return view('mail/recuperacion');
});

Route::get('activacion', function () {
    return view('mail/activacion');
});

////////////////////////////////////////////////////////////////////////////////////////

Route::get('evaluacion', function () {
    return view('evaluacion.index');
})->name('evaluacion');

Route::get('calificacion', function () {
    return view('evaluacion.evaluacion');
});

Route::get('proyectos.index', function () {
    return view('proyectos.index');
})->name('proyectos.index');

Route::get('addProyect', function () {
    return view('proyectos.addProyect');
})->name('addProyect');

Route::get('/', function () {
    if(auth()->check()) {
        return redirect()->route('proyectos.index');
    }
    return redirect()->route('login');
});

Route::get('/dashboard', function () {
    return redirect('/');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::put('/profile/changePicture', [ProfileController::class, 'changePicture'])->name('profile.changePicture');
    Route::resource('users', UsersController::class);
    Route::put('/users/{user}/restore', [UsersController::class, 'restore'])->name('users.restore');
    Route::delete('/users/{user}/forceDelete', [UsersController::class, 'forceDelete'])->name('users.forceDelete');

    Route::get('tablas', function(){
        return view('layout.cruds.tables');
    })->name('tablas');

    Route::get('perfil', function () {
        return view('usuarios.perfil');
    })->name('perfil');

    Route::get('EditPerfil', function () {
        return view('usuarios.EditPerfil');
    });

});

Route::name('pdf')->get('pdf',[ProjectsController::class, 'pdf']);

require __DIR__.'/auth.php';






