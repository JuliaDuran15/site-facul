<?php

use App\Http\Controllers\AlunoController;
use App\Http\Controllers\CursoController;
use App\Http\Controllers\ProfessorController;

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

Route::get('/alunos', [AlunoController::class, 'index'] )->name('alunos.index');
Route::get('/alunos/create', [AlunoController::class, 'create'] )->name('alunos.create');
Route::post('/alunos', [AlunoController::class, 'store'] )->name('alunos.store');
Route::get('/alunos/{id}', [AlunoController::class, 'show'] )->name('alunos.show');
Route::delete('/alunos/{id}', [AlunoController::class, 'destroy'] )->name('alunos.destroy');
Route::get('/alunos/{id}/edit', [AlunoController::class, 'edit'] )->name('alunos.edit');
Route::put('/alunos/{id}', [AlunoController::class, 'update'] )->name('alunos.update');
Route::get('/alunos/login', [AlunoController::class, 'login'] )->name('alunos.login');

Route::get('/professors', [ProfessorController::class, 'index'] )->name('professors.index');
Route::get('/professors/create', [ProfessorController::class, 'create'] )->name('professors.create');
Route::post('/professors', [ProfessorController::class, 'store'] )->name('professors.store');
Route::get('/professors/{id}', [ProfessorController::class, 'show'] )->name('professors.show');
Route::delete('/professors/{id}', [ProfessorController::class, 'destroy'] )->name('professors.destroy');
Route::get('/professors/{id}/edit', [ProfessorController::class, 'edit'] )->name('professors.edit');

Route::get('/cursos', [CursoController::class, 'index'] )->name('cursos.index');
Route::get('/cursos/create', [CursoController::class, 'create'] )->name('cursos.create');
Route::post('/cursos', [CursoController::class, 'store'] )->name('cursos.store');
Route::get('/cursos/{id}', [CursoController::class, 'show'] )->name('cursos.show');
Route::delete('/cursos/{id}', [CursoController::class, 'destroy'] )->name('cursos.destroy');
Route::get('/cursos/{id}/edit', [CursoController::class, 'edit'] )->name('cursos.edit');
Route::post('/cursos/join/{id}',[CursoController::class,'joinCurso'])->name('cursos.join');


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
