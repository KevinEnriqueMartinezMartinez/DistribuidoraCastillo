<?php
use App\http\Controller\ProductoController;
use App\http\Controller\HomeController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('auth.login');    
});

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', [App\Http\Controllers\ProductoController::class, 'index'])->name('productos.index');
Route::get('/create',[App\Http\Controllers\ProductoController::class, 'create'])->name('productos.create');
Route::post('/store', [App\Http\Controllers\ProductoController::class, 'store'])->name('productos.store');
Route::get('/edit/{id}', [App\Http\Controllers\ProductoController::class, 'edit'])->name('productos.edit');
Route::get('/show/{id}', [App\Http\Controllers\ProductoController::class, 'show'])->name('productos.show');
Route::delete('/destroy/{id}',[App\Http\Controllers\ProductoController::class, 'destroy'])->name('productos.destroy');
Route::put('/update/{id}', [App\Http\Controllers\ProductoController::class, 'update'])->name('productos.update');
