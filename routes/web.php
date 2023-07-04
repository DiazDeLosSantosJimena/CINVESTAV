<?php
namespace App\Http\Controllers;

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
Route::get('/registro', function () {
    return view('sesiones/register');
});



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

Route::get('addProyect', function () {
    return view('proyectos.addProyect');
});

Route::get('/', function () {
    if(auth()->check()) {
        return redirect()->route('project.index');
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

    Route::resource('proposals', ProposalController::class);
    Route::put('/proposals/{proposal}/restore', [ProposalController::class, 'restore'])->name('proposals.restore');
    Route::delete('/proposals/{proposal}/forceDelete', [ProposalController::class, 'forceDelete'])->name('proposals.forceDelete');
    Route::get('/proposals/{proposal}/download', [ProposalController::class, 'downloadFile'])->name('proposals.download');
    Route::put('/proposals/{proposal}/evaluate', [ProposalController::class, 'evaluate'])->name('proposals.evaluateStore');


    Route::resource('evaluate-proposals', EvaluateProposal::class);
    Route::put('/evaluate-proposals/{evaluateProposal}/restore', [EvaluateProposal::class, 'restore'])->name('evaluate-proposals.restore');
    Route::delete('/evaluate-proposals/{evaluateProposal}/forceDelete', [EvaluateProposal::class, 'forceDelete'])->name('evaluate-proposals.forceDelete');

    Route::resource('ramas', RamaController::class);
    Route::put('/ramas/{rama}/restore', [RamaController::class, 'restore'])->name('ramas.restore');
    Route::delete('/ramas/{rama}/forceDelete', [RamaController::class, 'forceDelete'])->name('ramas.forceDelete');

    Route::resource('project', ProjectController::class);
    Route::put('/project/{project}/restore', [ProjectController::class, 'restore'])->name('project.restore');
    Route::delete('/project/{project}/forceDelete', [ProjectController::class, 'forceDelete'])->name('project.forceDelete');

    Route::resource('messages', MessagesController::class);
    Route::put('/messages/{message}/restore', [MessagesController::class, 'restore'])->name('messages.restore');
    Route::delete('/messages/{message}/forceDelete', [MessagesController::class, 'forceDelete'])->name('messages.forceDelete');

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

//RUTAS DE RAMAS
Route::resource('ramas', RamaController::class);
Route::name('editRama')->put('editRama/{id}', [RamaController::class, 'edit']);
Route::name('deleteRama')->put('deleteRama/{id}',[RamaController::class, 'destroy']);

require __DIR__.'/auth.php';
on');
});

Route::get('vista', function () {
    return view('ramas.index');
});




