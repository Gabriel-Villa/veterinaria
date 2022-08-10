<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\FeedBackController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrdenController;
use App\Http\Controllers\ProductoController;
use Illuminate\Support\Facades\Route;


Route::get('/', [HomeController::class, 'index'])->name('index');

Route::view('/login', 'auth.login')->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('post-login');

Route::view('/register', 'auth.register')->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('post-register');

Route::get('/politicas', function(){
    $file = storage_path('/app/POLITICAS.pdf'); 
    return \Response::make(file_get_contents($file), 200, [
        'Content-Type' => 'application/pdf',
        'Content-Disposition' => 'inline; filename="'.$file.'"'
    ]); 
})->name('politicas');

Route::resource('producto', ProductoController::class);

Route::group(['middleware' => ['auth']], function() {

    Route::get('logout', [AuthController::class, 'logout'])->name('logout');

    Route::get('/dashboard', [AuthController::class, 'dashboard'])->name('dashboard');
    Route::get('/mis/pedidos', [OrdenController::class, 'mis_pedidos'])->name('mis_pedidos');

    Route::resource('categoria', CategoriaController::class)->except(['edit']);;
    Route::resource('orden', OrdenController::class);
    Route::resource('feedback', FeedBackController::class);

});