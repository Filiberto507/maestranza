<?php

use App\Http\Controllers\ExportController;
use App\Http\Livewire\AccesoriostallerController;
use App\Http\Livewire\AsignarController;
use App\Http\Livewire\ConductorController;
use App\Http\Livewire\PermisosController;
use App\Http\Livewire\RolesController;
use App\Http\Livewire\TallerController;
use App\Http\Livewire\UsersController;
use App\Http\Livewire\VehiculosController;
use App\Http\Livewire\DiagnosticoController;
use App\Http\Livewire\DiagnosticoAreaTransporteController;
use App\Http\Livewire\DependenciasController;
use App\Http\Livewire\AccesoriosController;
use App\Http\Livewire\ReporteTallerController;
use App\Http\Livewire\ReporteDiagnosticosController;
use App\Http\Livewire\TrabajoRealizadoTallerController;
use Illuminate\Support\Facades\Auth;
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
    if(Auth::user()=='')
    {
        return view('auth/login');
    }
    else{
        return view('home');
    }

});

Auth::routes();
Route::get('diagnostico/pdf/{id}', [DiagnosticoController::class, 'pdf']);
Route::get('diagnostico_area_transporte/pdf/{id}', [DiagnosticoAreaTransporteController::class, 'pdf']);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('dependencias', DependenciasController::class);
Route::get('vehiculos', VehiculosController::class);
Route::get('diagnostico',DiagnosticoController::class);
Route::get('diagnostico_area_transporte',DiagnosticoAreatransporteController::class);
Route::get('roles', RolesController::class)->middleware('role:Admin');
Route::get('permisos', PermisosController::class)->middleware('role:Admin');
Route::get('users', UsersController::class)->middleware('role:Admin');
Route::get('asignar', AsignarController::class)->middleware('role:Admin');  
Route::get('taller', TallerController::class);
Route::get('acctaller', AccesoriostallerController::class);
Route::get('conductor', ConductorController::class);
Route::get('trabajorealizadotaller', TrabajoRealizadoTallerController::class);
Route::get('reportemaestranza', ReporteTallerController::class);
Route::get('reporte_diagnosticos', ReporteDiagnosticosController::class);
//reporten PDF
Route::get('report/pdf/{id}', [ExportController::class, 'reportPDF']);
Route::get('reportrabajo/pdf/{id}', [ExportController::class, 'reportTrabajo']);

//redirect de taller cuando este habilitado salida
Route::get('/trabajotaller', TrabajoRealizadoTallerController::class);

