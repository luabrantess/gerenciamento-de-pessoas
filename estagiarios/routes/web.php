<?php

use App\Http\Controllers\EstagiarioController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Lista de estagiários cadastrados no sistema
Route::get('/', [EstagiarioController::class, 'index'])->name('estagiario.index');

// Abre a página de formulário para cadastrar um novo estagiário
Route::get('/create', [EstagiarioController::class, 'create'])->name('estagiario.create');

// Função que grava no banco de dados o novo estagiário
Route::post('/post/estagiario', [EstagiarioController::class, 'store'])->name('estagiario.store');

// Abre a página de formulário de edição do estagiário
Route::get('/edit/{estagiario}', [EstagiarioController::class, 'edit'])->name('estagiario.edit');

// Função que atualiza no banco de dados o estagiário
Route::put('/update/{estagiario}', [EstagiarioController::class, 'update'])->name('estagiario.update');

// Função que apaga no banco de dados o estagiário
Route::delete('/delete/{estagiario}', [EstagiarioController::class, 'delete'])->name('estagiario.delete');
