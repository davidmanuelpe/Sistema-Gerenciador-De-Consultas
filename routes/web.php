<?php

use Illuminate\Support\Facades\Route;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\EditPacienteController;
use App\Http\Controllers\Auth\AdminRegisterController;
use App\Http\Controllers\Auth\EditMedicoController;
use App\Http\Controllers\Auth\EditRecepcionistaController;
use App\Http\Controllers\AgendaController;
use App\Http\Controllers\AgendamentosController;
use App\Http\Controllers\MedicoAgendaController;
use App\Http\Controllers\RecepcionistaAgendasController;
use App\Http\Controllers\EditPacienteController as ControllersEditPacienteController;
use App\Http\Controllers\RecepcionistaAgendamentosController;

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

#Cadastrar/Editar todo tipo de usuário a partir do menu admin

Route::get('admin/cadastroAdmin', [AdminRegisterController::class, 'create']);
Route::get('admin', [AdminRegisterController::class, 'index']);
Route::get('admin/editAdmin', [AdminRegisterController::class, 'edit']);
Route::post('editaradmin', [AdminRegisterController::class, 'update']);
Route::post('save', [AdminRegisterController::class, 'store']);

#Editar/Remover Paciente a partir do menu paciente

Route::get('paciente/edit', [EditPacienteController::class, 'edit']);
Route::post('editarpaciente', [EditPacienteController::class, 'update']);
Route::get('paciente/delete', [EditPacienteController::class, 'destroy']);

#Editar/Remover Médico a partir do menu Médico

Route::get('medico', [EditMedicoController::class, 'index']);
Route::get('medico/edit', [EditMedicoController::class, 'edit']);
Route::post('editarmedico', [EditMedicoController::class, 'update']);
Route::get('medico/delete', [EditMedicoController::class, 'destroy']);

#Editar/Remover Recepcionista a partir do menu Recepcionista

Route::get('recepcionista', [EditRecepcionistaController::class, 'index']);
Route::get('recepcionista/edit', [EditRecepcionistaController::class, 'edit']);
Route::post('editarrecepcionista', [EditRecepcionistaController::class, 'update']);
Route::get('recepcionista/delete', [EditRecepcionistaController::class, 'destroy']);

#Cadastrar Horário em Agenda

Route::get('agendamedicos', [AgendaController::class, 'create']);
Route::post('criaragenda', [AgendaController::class, 'store']);

#Exibir Agenda e Horários a partir do menu Médico

Route::get('medico/agenda', [MedicoAgendaController::class, 'index']);
Route::get('/medico/agenda/horario/{id}', [MedicoAgendaController::class, 'show']);

#Exibir/Editar/Remover Agenda e Horários a partir do menu Recepcionista

Route::get('recepcionista/agendas', [RecepcionistaAgendasController::class, 'index']);
Route::post('recepcionista/agendas/medico', [RecepcionistaAgendasController::class, 'show']);
Route::get('recepcionista/agendas/editar-horario/{id}', [RecepcionistaAgendasController::class, 'edit']);
Route::get('recepcionista/agendas/remover-horario/{id}', [RecepcionistaAgendasController::class, 'destroy']);
Route::post('editaragenda', [RecepcionistaAgendasController::class, 'update']);

Route::get('paciente/medicos', [AgendamentosController::class, 'index']);
Route::post('paciente/medicos', [AgendamentosController::class, 'medicos']);
Route::post('paciente/medicos/dias', [AgendamentosController::class, 'create']);
Route::post('agendar', [AgendamentosController::class, 'store']);
Route::get('paciente/agendamentos', [AgendamentosController::class, 'show']);
Route::get('paciente/agendamentos/remover-agendamento/{id}', [AgendamentosController::class, 'destroy']);

Route::get('recepcionista/agendamentos', [RecepcionistaAgendamentosController::class, 'index']);
Route::post('recepcionista/agendamentos/paciente', [RecepcionistaAgendamentosController::class, 'show']);
Route::get('recepcionista/agendamentos/cancelar-agendamento/{id}', [RecepcionistaAgendamentosController::class, 'destroy']);


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
