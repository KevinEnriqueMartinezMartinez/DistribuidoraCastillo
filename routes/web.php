<?php

use App\Http\Controllers\ProductoController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\BodegasController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();
// O asegúrate que las rutas de registro están bajo el control del middleware 'auth'
Route::middleware(['auth'])->group(function () {
    Route::get('register', [App\Http\Controllers\Auth\RegisterController::class, 'showRegistrationForm']);
    Route::post('register', [App\Http\Controllers\Auth\RegisterController::class, 'register'])->name('register');
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    //RUTAS DE BODEGAS
Route::get('/bodegas', [\App\Http\Controllers\BodegasController::class, 'indexBodeg'])->name('bodegas.index');
Route::get('/bodegas/create', [App\Http\Controllers\BodegasController::class, 'createBodeg'])->name('bodegas.create');
Route::post('/bodegas/store', [App\Http\Controllers\BodegasController::class, 'storeBodeg'])->name('bodegas.store');
Route::get('/bodegas/{id}/show', [App\Http\Controllers\BodegasController::class, 'showBodeg'])->name('bodegas.show');
Route::delete('/bodegas/{id}/destroy', [App\Http\Controllers\BodegasController::class, 'destroyBodeg'])->name('bodegas.destroy');
Route::get('/bodegas/{id}/edit', [App\Http\Controllers\BodegasController::class, 'editBodeg'])->name('bodegas.edit');
Route::put('/bodegas/{id}/update', [App\Http\Controllers\BodegasController::class, 'updateBodeg'])->name('bodegas.update');
//RUTAS DE PRODUCTOS
Route::get('/home', [App\Http\Controllers\ProductoController::class, 'index'])->name('productos.index');
Route::get('/create', [App\Http\Controllers\ProductoController::class, 'create'])->name('productos.create');
Route::post('/store', [App\Http\Controllers\ProductoController::class, 'store'])->name('productos.store');
Route::get('/edit/{id}', [App\Http\Controllers\ProductoController::class, 'edit'])->name('productos.edit');
Route::get('/show/{id}', [App\Http\Controllers\ProductoController::class, 'show'])->name('productos.show');
Route::delete('/destroy/{id}', [App\Http\Controllers\ProductoController::class, 'destroy'])->name('productos.destroy');
Route::put('/update/{id}', [App\Http\Controllers\ProductoController::class, 'update'])->name('productos.update');
});

