<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SolicitudController;
use App\Http\Controllers\ResultadoController;
use App\Http\Controllers\PacienteController;
use App\Http\Controllers\AdminController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

/*
|--------------------------------------------------------------------------
| RUTAS PROTEGIDAS
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])->group(function () {

    // PERFIL USUARIO
    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');

    // SOLICITUDES
    Route::get('/solicitudes/nueva', [SolicitudController::class, 'create'])
        ->name('solicitudes.create');

    Route::post('/solicitudes', [SolicitudController::class, 'store'])
        ->name('solicitudes.store');

    Route::get('/mis-solicitudes', [SolicitudController::class, 'index'])
        ->name('solicitudes.index');

    Route::get('/solicitudes/{id}', [SolicitudController::class, 'show'])
        ->name('solicitudes.show');

    Route::post('/solicitudes/{id}/estado', [SolicitudController::class, 'actualizarEstado'])
        ->name('solicitudes.estado');

    Route::post('/solicitudes/{id}/pago', [SolicitudController::class, 'actualizarPago'])
        ->name('solicitudes.pago');

    // RESULTADOS
    Route::get('/resultados/{id}/captura', [ResultadoController::class, 'captura'])
        ->middleware('role:laboratorista')
        ->name('resultados.captura');

    Route::get('/resultados/{id}', [ResultadoController::class, 'show'])
        ->name('resultados.show');

    Route::post('/resultados/guardar', [ResultadoController::class, 'guardar'])
        ->name('resultados.guardar');

    Route::get('/resultados/{id}/pdf', [ResultadoController::class, 'pdf'])
        ->name('resultados.pdf');

    // PACIENTE
    Route::get('/mi-perfil-clinico', [PacienteController::class, 'perfil'])
        ->name('pacientes.perfil');

    Route::post('/mi-perfil-clinico', [PacienteController::class, 'actualizarPerfil'])
        ->name('pacientes.perfil.actualizar');

    Route::get('/mi-historial-clinico', [PacienteController::class, 'historial'])
        ->name('pacientes.historial');

    // ADMINISTRADOR
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])
        ->middleware('role:administrador')
        ->name('admin.dashboard');

        Route::get('/admin/reportes/produccion', [AdminController::class, 'reporteProduccion'])
    ->middleware('role:administrador')
    ->name('admin.reportes.produccion');

});

require __DIR__.'/auth.php';