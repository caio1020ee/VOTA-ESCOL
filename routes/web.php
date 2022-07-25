<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CandidatoController;

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

Route::middleware(['auth'])->group(function () {
    Route::get('/', [App\Http\Controllers\CandidatoController::class, 'index'])->name('candidatos.votar');
    Route::post('/votacao/create', [App\Http\Controllers\VotacaoController::class, 'store'])->name('votacao.create');
    Route::any("candidatos/search", [App\Http\Controllers\CandidatoController::class, 'search'])->name('candidatos.search');
});
Auth::routes();
Route::get('/home', [App\Http\Controllers\CandidatoController::class, 'home'])->name('home');
#Route::get('/c-candidato', [App\Http\Controllers\CandidatoController::class, 'create'])->name('candidato.create');
#Route::post('/c-candidato', [App\Http\Controllers\CandidatoController::class, 'store'])->name('candidato.store');