<?php

use App\Http\Controllers\Admin\CMSController;
use App\Http\Controllers\Main\AuthController;
use App\Http\Livewire\Admin\Actas\FormActasComponent;
use App\Http\Livewire\Admin\Actas\ListarActasComponent;
use App\Http\Livewire\Admin\Param\DependenciaComp;
use App\Http\Livewire\Admin\Param\TipoReunionComponent;
use App\Http\Livewire\Admin\Security\Permisos\Roles;
use App\Http\Livewire\Admin\Security\Registros;
use App\Http\Livewire\Admin\Security\Usuarios;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::post('/forgot-password', [AuthController::class, 'password'])->middleware('guest')->name('password.email');
Route::get('/reset-password/{token}/email/{email}', [AuthController::class, 'getPassword'])->name('password.reset');

Route::group(['return_type' => 'guest'], function () {
    Route::get('/', function () {
        return redirect()->route('login');
    });
});

Route::middleware(['auth:sanctum', 'verified', 'check-login', 'prevent-back-history'])->prefix('admin')->group(function () {

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::prefix('seguridad')->group(function () {
        Route::get('/usuarios', Usuarios::class)->name('security.usuarios')
            ->middleware('permission:usuarios.listar|usuarios.agregar|usuarios.editar|usuarios.cambiar|usuarios.eliminar|usuarios.reset');
        Route::get('/roles-permisos', Roles::class)->name('roles.listar')
            ->middleware('permission:roles.listar|roles.agregar|roles.editar|roles.cambiar|roles.eliminar');
        Route::get('/registros', Registros::class)->name('security.logs')
            ->middleware('permission:registros.listar');
    });


    Route::prefix('reuniones')->group(function () {
        Route::get('/actas', ListarActasComponent::class)->name('actas.listar');
        Route::get('/actas/agregar', FormActasComponent::class)->name('actas.agregar');
        Route::get('/actas/editar/{reunion}', FormActasComponent::class)->name('actas.editar');
    });

    Route::prefix('params')->group(function () {
        Route::get('tipo-reunion', TipoReunionComponent::class)
            ->middleware('permission:tipo-reunion.listar|tipo-reunion.agregar|tipo-reunion.editar|tipo-reunion.cambiar|tipo-reunion.eliminar')
            ->name('tipo-reunion.listar');
        Route::get('dependencias', DependenciaComp::class)
            ->middleware('permission:dependencia.listar|dependencia.agregar|dependencia.editar|dependencia.cambiar|dependencia.eliminar')
            ->name('dependencia.listar');
    });

    Route::get('/exportar/pdf/{solicitud}/vista/{textform}', [CMSController::class, 'PdfDetailsSolicitud'])->name('pdf.export');
});
