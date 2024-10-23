<?php
use App\http\Controller\ProductoController;
use App\http\Controller\HomeController;
use App\http\Controller\RegisterController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('auth.login');    
});

Auth::routes();
// O asegúrate que las rutas de registro están bajo el control del middleware 'auth'
Route::middleware(['auth'])->group(function () {
    Route::get('register', [App\Http\Controllers\Auth\RegisterController::class, 'showRegistrationForm'])->name('register');
    Route::post('register', [App\Http\Controllers\Auth\RegisterController::class, 'register']);
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
});

Route::get('/home', [App\Http\Controllers\ProductoController::class, 'index'])->name('productos.index');
Route::get('/create',[App\Http\Controllers\ProductoController::class, 'create'])->name('productos.create');
Route::post('/store', [App\Http\Controllers\ProductoController::class, 'store'])->name('productos.store');
Route::get('/edit/{id}', [App\Http\Controllers\ProductoController::class, 'edit'])->name('productos.edit');
Route::get('/show/{id}', [App\Http\Controllers\ProductoController::class, 'show'])->name('productos.show');
Route::delete('/destroy/{id}',[App\Http\Controllers\ProductoController::class, 'destroy'])->name('productos.destroy');
Route::put('/update/{id}', [App\Http\Controllers\ProductoController::class, 'update'])->name('productos.update');
