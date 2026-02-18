<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\Admin\TemaController;
use App\Http\Controllers\Admin\ComandoController;
use App\Http\Controllers\Admin\GuiaController;
use App\Http\Controllers\Admin\GuiaItemController;
use Illuminate\Support\Facades\Route;

// Rota Pública
Route::get('/', [WelcomeController::class, 'index'])->name('home');

// Dashboard
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Grupo Admin
Route::middleware(['auth', 'verified'])->prefix('admin')->name('admin.')->group(function () {
    
    // CRUDs Padrão
    Route::resource('temas', TemaController::class);
    Route::resource('comandos', ComandoController::class);
    Route::resource('guias', GuiaController::class);

    // === CORREÇÃO AQUI ===
    // 1. Rota helper para criar (continua igual)
    Route::get('guias/{guia}/itens/create', [GuiaItemController::class, 'create'])->name('guias.itens.create');
    
    // 2. Resource com parâmetro nomeado explicitamente
    // Isso transforma o {guia_iten} em {guiaItem}, evitando o erro.
    Route::resource('guia-itens', GuiaItemController::class)
        ->parameters(['guia-itens' => 'guiaItem']) 
        ->except(['index', 'show', 'create']);
});

// Rotas Profile
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';