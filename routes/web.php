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

Route::get('/', function () {
    return view('welcome');
});



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['role:super-admin']], function() {
	
Route::get('/administracion_usuarios', [App\Http\Controllers\Usuarios\UsuariosController::class, 'index'])->name('admin_users');
Route::post('/store_usuarios', [App\Http\Controllers\Usuarios\UsuariosController::class, 'store'])->name('store_users');
Route::get('/edit_usuarios/{id}', [App\Http\Controllers\Usuarios\UsuariosController::class, 'edit'])->name('edit_users');
Route::post('/update_usuarios/{id}', [App\Http\Controllers\Usuarios\UsuariosController::class, 'update'])->name('update_users');
Route::get('/delete_usuarios/{id}', [App\Http\Controllers\Usuarios\UsuariosController::class, 'destroy'])->name('delete_users');

});
