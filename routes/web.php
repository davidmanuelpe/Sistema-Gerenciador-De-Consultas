<?php

use Illuminate\Support\Facades\Route;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\EditPacienteController;
use App\Http\Controllers\Auth\AdminRegisterController;
use App\Http\Controllers\Auth\EditMedicoController;
use App\Http\Controllers\Auth\EditRecepcionistaController;
use App\Http\Controllers\EditPacienteController as ControllersEditPacienteController;

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

#Route::resource('admin', App\Http\Controllers\AdminController::class);

Route::get('paciente', ['middleware' => 'auth', function () {
    return view('paciente/pacientewelcome');
}]);

Route::get('admin/cadastroAdmin', [AdminRegisterController::class, 'create']);
Route::get('admin', [AdminRegisterController::class, 'index']);
Route::get('admin/editAdmin', [AdminRegisterController::class, 'edit']);
Route::post('editaradmin', [AdminRegisterController::class, 'update']);
Route::post('save', [AdminRegisterController::class, 'store']);

Route::get('paciente/edit', [EditPacienteController::class, 'edit']);
Route::post('editarpaciente', [EditPacienteController::class, 'update']);
Route::get('paciente/delete', [EditPacienteController::class, 'destroy']);

Route::get('medico', [EditMedicoController::class, 'index']);
Route::get('medico/edit', [EditMedicoController::class, 'edit']);
Route::post('editarmedico', [EditMedicoController::class, 'update']);
Route::get('medico/delete', [EditMedicoController::class, 'destroy']);

Route::get('recepcionista', [EditRecepcionistaController::class, 'index']);
Route::get('recepcionista/edit', [EditRecepcionistaController::class, 'edit']);
Route::post('editarrecepcionista', [EditRecepcionistaController::class, 'update']);
Route::get('recepcionista/delete', [EditRecepcionistaController::class, 'destroy']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
