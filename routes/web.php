<?php

use App\Http\Controllers\Admin\CMSController;
use App\Http\Controllers\Main\AuthController;
use App\Http\Livewire\Admin\Param\TipoOperacionComp;
use App\Http\Livewire\Admin\Param\TipoProductoComp;
use App\Http\Livewire\Admin\Security\Permisos\Roles;
use App\Http\Livewire\Admin\Security\Registros;
use App\Http\Livewire\Admin\Security\Usuarios;
use App\Http\Livewire\Admin\Transacciones\OrdenesComp;
use App\Http\Livewire\Admin\Transacciones\ProductoComp;
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
        Route::get('/usuarios', Usuarios::class)->name('usuario.listar')
            ->middleware('permission:usuario.listar|usuario.agregar|usuario.editar|usuario.cambiar|usuario.eliminar|usuario.reset');
        Route::get('/roles-permisos', Roles::class)->name('roles.listar')
            ->middleware('permission:roles.listar|roles.agregar|roles.editar|roles.cambiar|roles.eliminar');
        Route::get('/registros', Registros::class)->name('registro.listar')
            ->middleware('permission:registro.listar');
        Route::get('/exportar/xls/{inicio}/{final}/{usuario?}/{buscar?}', [CMSController::class, 'exportxls'])->name('export.xls');
    });

    Route::prefix('ventas')->group(function () {
        Route::get('/ordenes', OrdenesComp::class)->name('venta.listar')->middleware('permission:ventas.listar|ventas.agregar|ventas.editar|ventas.cambiar|ventas.eliminar');
        Route::get('/reportes', OrdenesComp::class)->name('reporte.listar')->middleware('permission:reporte.listar|reporte.generar|reporte.xls');
        Route::get('/productos', ProductoComp::class)->name('producto.listar')->middleware('permission:producto.listar|producto.agregar|producto.editar|producto.cambiar|producto.eliminar');
    });


    Route::prefix('parametros')->group(function () {
        Route::get('/tipo-producto', TipoProductoComp::class)->name('tipo-producto.listar')
            ->middleware('permission:tipo-producto.listar|tipo-producto.agregar|tipo-producto.editar|tipo-producto.cambiar|tipo-producto.eliminar');
        Route::get('/tipo-operacion', TipoOperacionComp::class)->name('tipo-operacion.listar')
            ->middleware('permission:tipo-operacion.listar');
    });


    Route::get('/exportar/xls/{solicitud}/vista/{textform}', [CMSController::class, 'PdfDetailsSolicitud'])->name('pdf.export');
});
