<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NotasController;
use App\Http\Controllers\CategoriasController;

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


       //INDEX
       
       Route::get('/',[NotasController::class,'index'])->name('nota.index');

       // SHOW
        
       Route::get('/nota/{id}/show',[NotasController::class,'show'])->name('nota.show');
       
      
       Route::get('/nota/crear',[NotasController::class,'create'])->name('nota.crear');
       Route::post('/nota/store',[NotasController::class,'store'])->name('nota.store');
       
       // CREATE CATEGORIA
       Route::post('/categoria/store',[CategoriasController::class,'store'])->name('categoria.store');
       
       // EDIT
       Route::get('/nota/{id}/editar',[NotasController::class,'edit'])->whereNumber('id')->name('nota.editar');
       Route::put('/nota/{id}/editar',[NotasController::class,'update'])->whereNumber('id')->name('nota.update');
       
       //DELETE
       Route::delete('/nota/{id}/borrar',[NotasController::class,'destroy'])->whereNumber('id')->name('nota.borrar');
       

require __DIR__.'/auth.php';
