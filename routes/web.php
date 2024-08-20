<?php

use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\CobrosController;
use App\Http\Controllers\BeneficiariosController;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\ProfileController;
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

Route::get('/cobros', [CobrosController::class, 'index'])->name('cobros.index');

Route::get('/cobros/{id}', [CobrosController::class, 'show'])->name('cobros.show');

Route::post('/cobros/{beneficiario}', [CobrosController:: class, 'pagar'])->name('cobros.pagar');

Route::get('/cobros/tiket/{beneficiario}', [PdfController::class, 'ticket'])->name('cobros.ticket');

Route::get('/beneficiarios', [BeneficiariosController::class, 'index'])->name('beneficiarios.index');

Route::get('/beneficiarios/registro', [BeneficiariosController::class, 'create'])->name('beneficiarios.register');

Route::post('/beneficiarios', [BeneficiariosController::class, 'store'])->name('beneficiarios.create');

Route::get('/beneficiarios/{beneficiario}/edit', [BeneficiariosController::class, 'edit'])->name('beneficiarios.edit');

Route::put('/beneficiarios/{beneficiario}', [BeneficiariosController::class, 'update'])->name('beneficiarios.update');

Route::delete('/beneficiarios/{beneficiario}', [BeneficiariosController::class, 'destroy'])->name('beneficiarios.destroy');

Route::resource('users', UserController::class)->names('admin.users');

require __DIR__.'/auth.php';
