<?php

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

Route::get('/dashboard', 'DashboardController@index')->name('home');
Route::get('/login', 'AuthFakeController@authenticate');
Route::post('session/instituicao', 'SessionController@instituicao')->name('session.instituicao');

Route::resource('aluno', 'AlunoController');
Route::resource('instituicao', 'InstituicaoController');
Route::resource('curso', 'CursoController');

Route::get('aluno/curso/{curso}/cancel', 'AlunoCursoController@cancel')->name('aluno.curso.cancel');
Route::get('aluno/curso/{curso}/ok', 'AlunoCursoController@ok')->name('aluno.curso.ok');
Route::post('aluno/{aluno}/curso', 'AlunoCursoController@store')->name('aluno.curso.create');
