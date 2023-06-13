<?php

use App\Http\Livewire\AccesoriostallerController;
use App\Http\Livewire\AsignarController;
use App\Http\Livewire\PermisosController;
use App\Http\Livewire\RolesController;
use App\Http\Livewire\TallerController;
use App\Http\Livewire\UsersController;
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
Route::get('roles', RolesController::class);
Route::get('permisos', PermisosController::class);
Route::get('users', UsersController::class);
Route::get('asignar', AsignarController::class);
Route::get('taller', TallerController::class);
Route::get('acctaller', AccesoriostallerController::class);