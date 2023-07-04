<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('evaluacion', function () {
    return view('evaluacion.index');
})->name('evaluacion');

Route::get('project.create', function () {
    return view('proyectos.addProyect');
})->name('project.create');

Route::get('project.index', function () {
    return view('proyectos.index');
})->name('project.index');

Route::get('calificacion', function () {
    return view('evaluacion.evaluacion');
});

Route::get('addProyect', function () {
    return view('proyectos.addProyect');
});

Route::get('/', function () {
    if(auth()->check()) {
        return redirect()->route('project.index');
    }
    return redirect()->route('login');
});

Route::name('registroPonente')->get('registroPonente', function () {
    return view('usuarios.registro');
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

    Route::get('perfil', function () {
        return view('usuarios.perfil');
    })->name('perfil');
    
    Route::get('EditPerfil', function () {
        return view('usuarios.EditPerfil');
    });

});

Route::get('register', function () {
    return view('sesiones/register');
});


Route::name('registro')->get('registro', function () {
    return view('auth.register');
});

////////////////////////////////////////EMAILS///////////////////////////////////////
Route::get('recuperacion', function () {
    return view('mail/recuperacion');
});

Route::get('activacion', function () {
    return view('mail/activacion');
});

Route::get('vista', function () {
    return view('ramas.index');
});




