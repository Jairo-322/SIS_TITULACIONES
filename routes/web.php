<?php

use App\Http\Controllers\admin\DocenteController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\admin\ProgramaController;
use App\Http\Controllers\Admin\TitulacionController;
use App\Http\Controllers\ProfileController;

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

route::prefix ('admin')->name('admin.')->group(function (){
    Route::get ('Inicio', [HomeController::class, 'render'])->name('home.index');
    //PROGRAMAS
    Route::get ('Programas', [ProgramaController::class, 'index'])->name('programa.index');
    Route::post('Programas', [ProgramaController::class, 'store'])->name('programa.store');
    Route::put('Programas/{id}', [ProgramaController::class, 'update'])->name('programa.update');
    Route::delete('Programas/{id}', [ProgramaController::class, 'destroy'])->name('programa.destroy');
    Route::get('programa/search', [ProgramaController::class, 'search'])->name('programa.search');
    //DOCENTES
    Route::get ('Docentes', [DocenteController::class, 'index'])->name('docente.index');
    Route::post('Docentes', [DocenteController::class, 'store'])->name('docente.store');
    Route::put('Docentes/{id}', [DocenteController::class, 'update'])->name('docente.update');
    Route::delete('Docentes/{id}', [DocenteController::class, 'destroy'])->name('docente.destroy');
    Route::get('docente/search', [DocenteController::class, 'search'])->name('docente.search');
    //TITULACIONES
    Route::get('Titulaciones', [TitulacionController::class, 'index'])->name('titulacion.index');  
    Route::post('Titulaciones', [TitulacionController::class, 'store'])->name('titulacion.store');
    Route::put('Titulaciones/{id}', [TitulacionController::class, 'update'])->name('titulacion.update');
    Route::delete('Titulaciones/{id}', [TitulacionController::class, 'destroy'])->name('titulacion.destroy');
});

require __DIR__.'/auth.php';
