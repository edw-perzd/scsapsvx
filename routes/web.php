<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CobrosController;
use App\Http\Controllers\BeneficiariosController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/cobros', [CobrosController::class, 'index'])->name('cobros.index');

Route::get('/cobros/{id}', [CobrosController::class, 'show'])->name('cobros.show');

Route::get('/beneficiarios', [BeneficiariosController::class, 'index'])->name('beneficiarios.index');

Route::get('/beneficiarios/registro', [BeneficiariosController::class, 'create'])->name('beneficiarios.register');

Route::post('/beneficiarios', [BeneficiariosController::class, 'store'])->name('beneficiarios.create');

Route::get('/beneficiarios/{beneficiario}/edit', [BeneficiariosController::class, 'edit'])->name('beneficiarios.edit');

Route::put('/beneficiarios/{beneficiario}', [BeneficiariosController::class, 'update'])->name('beneficiarios.update');

Route::delete('/beneficiarios/{beneficiario}', [BeneficiariosController::class, 'destroy'])->name('beneficiarios.destroy');
