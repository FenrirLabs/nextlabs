<?php

use App\Http\Controllers\ClientesController;
use Illuminate\Support\Facades\Route;

Route::delete('admin/clientes/{id}', [ClientesController::class, 'destroy'])->name('clientes.destroy');
Route::get('admin/clientes/{id}', [ClientesController::class, 'show'])->name('clientes.show');
Route::post('admin/clientes', [ClientesController::class, 'store'])->name('clientes.store');
Route::get('admin/cliente', [ClientesController::class, 'index'])->name('clientes.index');
Route::get('/admin/cliente/create', [ClientesController::class, 'create'])->name('clientes.create');
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
