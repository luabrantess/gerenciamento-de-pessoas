<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EstagiarioController;
use App\Http\Controllers\ListaEstagiario;

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

Route::get('/', function () {
    return view('welcome');
});

Route::view('/estagios', 'estagios');

Route::post('/estagiario', [EstagiarioController::class, 'store'])->name('estagiario.store');

Route::get('/estagiarios', [ListaEstagiario::class], 'store')->name('get.store');