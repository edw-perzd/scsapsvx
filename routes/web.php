<?php

use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\CobrosController;
use App\Http\Controllers\BeneficiariosController;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReportesController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/cobros', [CobrosController::class, 'index'])->middleware(['auth', 'verified', 'can:cobros.index'])->name('cobros.index');

Route::get('/cobros/{id}', [CobrosController::class, 'show'])->middleware(['auth', 'verified', 'can:cobros.show'])->name('cobros.show');

Route::post('/cobros/{beneficiario}', [CobrosController:: class, 'pagar'])->middleware(['auth', 'verified', 'can:cobros.pagar'])->name('cobros.pagar');

Route::get('/cobros/{beneficiario}/tarjeta', [CobrosController:: class, 'imprimir'])->middleware(['auth', 'verified', 'can:cobros.imprimir'])->name('cobros.imprimir');

Route::get('/beneficiarios', [BeneficiariosController::class, 'index'])->middleware(['auth', 'verified', 'can:beneficiarios.index'])->name('beneficiarios.index');

Route::get('/beneficiarios/registro', [BeneficiariosController::class, 'create'])->middleware(['auth', 'verified', 'can:beneficiarios.register'])->name('beneficiarios.register');

Route::post('/beneficiarios', [BeneficiariosController::class, 'store'])->middleware(['auth', 'verified', 'can:beneficiarios.create'])->name('beneficiarios.create');

Route::get('/beneficiarios/{beneficiario}/edit', [BeneficiariosController::class, 'edit'])->middleware(['auth', 'verified', 'can:beneficiarios.edit'])->name('beneficiarios.edit');

Route::put('/beneficiarios/{beneficiario}', [BeneficiariosController::class, 'update'])->middleware(['auth', 'verified', 'can:beneficiarios.update'])->name('beneficiarios.update');

Route::delete('/beneficiarios/{beneficiario}', [BeneficiariosController::class, 'destroy'])->middleware(['auth', 'verified', 'can:beneficiarios.destroy'])->name('beneficiarios.destroy');

Route::resource('users', UserController::class)->middleware(['auth', 'verified', 'can:admin.users.index'])->names('admin.users');

Route::get('/reportes', [ReportesController::class, 'index'])->middleware(['auth', 'verified', 'can:reportes.index'])->name('reportes.index');

Route::post('/reportes/dia', [ReportesController::class, 'dia'])->middleware(['auth', 'verified', 'can:reportes.dia'])->name('reportes.dia');

Route::post('/reportes/mes', [ReportesController::class, 'mes'])->middleware(['auth', 'verified', 'can:reportes.mes'])->name('reportes.mes');

Route::get('/reportes/users', [ReportesController::class, 'users'])->middleware(['auth', 'verified', 'can:reportes.users'])->name('reportes.users');

require __DIR__.'/auth.php';
