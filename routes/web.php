<?php

use App\Http\Controllers\EscolaController;
use App\Http\Controllers\TurmaController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('index');
})->name('index');

Route::get('/sobre', function(){
    return view('sobre');
})->name('sobre');

//Rotas Escolas
Route::get('/escolas', [EscolaController::class, 'index'])->name('escolas.index');
Route::get('/escolas/create', [EscolaController::class, 'create'])->name('escolas.create');
Route::post('/escolas', [EscolaController::class, 'store'])->name('escolas.store');
Route::get('/escolas/edit/{id}', [EscolaController::class, 'edit'])->name('escolas.edit');
Route::put('/escolas/{id}', [EscolaController::class, 'update'])->name('escolas.update');
Route::delete('/escolas/{escola}', [EscolaController::class, 'destroy'])->name('escolas.destroy');

//Rotas de Turmas
Route::get('/turmas', [TurmaController::class, 'index'])->name('turmas.index');
Route::get('/turmas/create', [TurmaController::class, 'create'])->name("turmas.create");
Route::post('/turmas', [TurmaController::class, 'store'])->name("turmas.store");
Route::get('/turmas/edit/{id}', [TurmaController::class, 'edit'])->name('turmas.edit');
Route::put('/turmas/{id}', [TurmaController::class, 'update'])->name('turmas.update');
Route::delete('/turmas/{turma}', [TurmaController::class, 'destroy'])->name('turmas.destroy');