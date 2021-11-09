<?php

use App\Http\Controllers\ClientesController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::delete('admin/clientes/{id}', [ClientesController::class, 'destroy'])->name('clientes.destroy');
Route::get('admin/clientes/{id}', [ClientesController::class, 'show'])->name('clientes.show');
Route::post('admin/clientes', [ClientesController::class, 'store'])->name('clientes.store');
Route::get('admin/cliente', [ClientesController::class, 'index'])->name('clientes.index');
Route::get('admin/cliente/edit/{id}', [ClientesController::class, 'edit'])->name('clientes.edit');
Route::post('admin/cliente/update', [ClientesController::class, 'update'])->name('clientes.update');
Route::get('/admin/cliente/create', [ClientesController::class, 'create'])->name('clientes.create');

//User
Route::get('admin/usuarios', [UserController::class, 'index'])->name('user.index');
Route::get('admin/usuarios/create', [UserController::class, 'create'])->name('user.create');
Route::post('admin/usuarios/store', [UserController::class, 'store'])->name('user.store');
Route::get('admin/usuarios/{id}', [UserController::class, 'show'])->name('user.show');
Route::get('admin/usuarios/edit/{id}', [UserController::class, 'edit'])->name('user.edit');
Route::post('admin/usuarios/update', [UserController::class, 'update'])->name('user.update');
Route::delete('admin/usuarios/{id}', [UserController::class, 'destroy'])->name('user.destroy');

Route::get('/home', function () {
    return view('dash.index');
})->name('dash');


//Route::get('/user/register', function(){
//    return view('auth.register');
//});
Route::get('/', function () {
    return view('auth.login');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dash', function () {
    return view('dash.index');
})->name('dash');
